let targetName = "./output.docx"

def generate-img [] {
    mkdir target/Картинки
    mkdir target/src

    mkdir target/Картинки/Главы

    cp Картинки/* target/Картинки -r
    cp src/* target/src -r
    cp custom-reference.docx target

    cd target
    
    (circo ./src/Главы/Введение.dot
        -Tpng
        -o ./Картинки/Главы/Введение.png )
    
    let none_none = ls src/Главы/*.dot
        | par-each { 
            |it|
            print $it.name
            let name = "./Картинки/Главы/" + ($it.name
                | path basename
                | str replace ".dot" ".png") 
            
            print $name
            (dot $it.name
                -Tpng
                -o $name )
        }
}

def main [] {

}

# Создание всех конкретного документов
def "main build-all" [] {
    generate-img
    cd target

    # Генерация Документов
    let none_none = ls src/*.md
        | par-each { 
            |it|
            print $it.name
            let name = echo $it.name
                | path basename
                | str replace ".md" ".docx" 
            (pandoc $it.name
                -o $name
                --from markdown
                --to docx
                --reference-doc ./custom-reference.docx)
        }
}

# Создание и открытие конкретного документа
def "main open" [arg] {
    generate-img
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

    print ("Билдится " + $file_path)

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


