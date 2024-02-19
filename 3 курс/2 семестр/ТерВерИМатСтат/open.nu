let targetName = "./output.docx"

def main [arg] {
    nu generate-img.nu
    cd target

    let file_path = match $arg {
        0 => "Конспект.md",
        11 => "Работа_1.md",
        12 => "Работа_2.md",
        13 => "Работа_3.md",
        21 => "ПР_1.md",
        22 => "ПР_2.md",
        23 => "ПР_3.md",
        _ => {
            print "Передайте правильный аргумент в скрипт";
            exit
        }
    }

    echo ("Билдится " + $file_path)

    (pandoc ("./src/" + $file_path)
        -o $targetName
        --from markdown
        --to docx
        --reference-doc ./custom-reference.docx)
    
    let os = sys | get host | get name
    match $os {
        "Linux" => {
            print 'Linux'
            xdg-open $targetName
        },
        "Windows" => {
            print 'MS Windows'
            start ("target" + $targetName)
        },
        "NixOS" => {
            print 'NixOS'
            xdg-open $targetName
        },
        _ => {
            print 'Other OS'
        }
    }
}


