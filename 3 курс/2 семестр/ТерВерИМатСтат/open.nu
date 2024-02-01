let targetDir = "./target"

def build [arg] {
    let file_path = match $arg {
        0 => "Конспект.md",
        11 => "Работа_1.md",
        12 => "Работа_2.md",
        21 => "ПР_1.md",
        _ => {
            echo "Передайте привильный аргемент в скрипт";
            exit
        }
    }

    echo ("Билдится " + $file_path)
    mkdir $targetDir
    let srcDir = ("./src/" + $file_path) 
    (pandoc $srcDir
        -o ($targetDir + /output.docx)
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
            xdg-open ($targetDir + /output.docx)
        },
        "Windows" => {
            print 'MS Windows'
            start ($targetDir + /output.docx)
        },
        _ => {
            print 'Other OS'
        }
    }
}

def main [arg] {
    build $arg
}
