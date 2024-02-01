let targetDir = "./target"

def build [arg] {
    let file_path = match $arg {
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
    let os = uname -sr
    match $os {
        "Darwin*" => {
            echo 'Mac OS X'
        },
        "Linux*Microsoft*" => {
            echo 'WSL'
        },
        "Linux*" => {
            echo 'Linux'
            xdg-open ($targetDir + /output.docx)
        },
        "CYGWIN*|MINGW*|MINGW32*|MSYS*" => {
            echo 'MS Windows'
            start ($targetDir + /output.docx)
        },
        _ => {
            echo 'Other OS'
        }
    }
}

def main [arg] {
    build $arg
}
