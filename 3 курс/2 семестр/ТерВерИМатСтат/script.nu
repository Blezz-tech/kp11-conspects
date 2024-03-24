let targetName = "./output.docx"

def generate-img [] {
    # mkdir target/src
    # mkdir target/src/Картинки

    # cp src/Картинки/* target/src/Картинки -r
    # cp src/* target/src -r
    # cp custom-reference.docx target

    mkdir target
    mkdir target/src/Картинки/Главы

    cp src/ target/ --recursive

    cd target/src/
    
    let none_none = ls Главы/*.dot
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

    let none_none = ls ./*.ipynb
        | par-each { 
            |it|
            print $it.name
            
            (jupyter nbconvert
                --to markdown
                --execute $it.name)
        }
}

def main [] {

}

# Создание всех конкретного документов
def "main build-all" [] {
    generate-img
    cd target/src

    # Генерация Документов
    let none_none = ls *.md
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
    cd target/src/

    let file_path = match $arg {
        0 => "0.md",
        11 => "11.md",
        12 => "12.md",
        13 => "13.md",
        14 => "14.md",
        15 => "15.md",
        16 => "16.md",
        17 => "17.md",
        21 => "21.md",
        22 => "22.md",
        23 => "23.md",
        24 => "24.md",
        25 => "25.md",
        26 => "26.md",
        27 => "27.md",
        _ => {
            print "Передайте правильный аргумент в скрипт";
            exit
        }
    }

    print ("Билдится " + $file_path)

    (pandoc $file_path
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


