mkdir target
ls src/*.md | each { |it|
    print $it.name
    let name = echo $it.name | path basename | str replace ".md" ".docx" 
    (pandoc $it.name
        -o ("target/" + $name)
        --from markdown
        --to docx
        --reference-doc ./custom-reference.docx)
}