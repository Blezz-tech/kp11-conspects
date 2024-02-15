let targetDir = "./target"
let targetName = "/output.docx"

def build [arg] {
    let file_path = match $arg {
        0 => "Конспект.md",
        11 => "Работа_1.md",
        12 => "Работа_2.md",
        13 => "Работа_3.md",
        21 => "ПР_1.md",
        22 => "ПР_2.md",
        23 => "ПР_3.md",
        _ => {
            echo "Передайте привильный аргемент в скрипт";
            exit
        }
    }

    echo ("Билдится " + $file_path)
    mkdir $targetDir
    let srcDir = ("./src/" + $file_path) 
    (pandoc $srcDir
        -o ($targetDir + $targetName)
        --from markdown
        --to docx
        --reference-doc ./custom-reference.docx)

    open $arg
}

def open [arg] {

    let os = sys | get host | get name
    match $os {
        "Linux" => {
            print 'Linux'
            xdg-open ($targetDir + $targetName)
        },
        "Windows" => {
            print 'MS Windows'
            start ($targetDir + $targetName)
        },
        "NixOS" => {
            print 'NixOS'
            xdg-open ($targetDir + $targetName)
        },
        _ => {
            print 'Other OS: ' + $os 
        }
    }
}

def main [arg] {
    build $arg
}
