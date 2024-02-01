mkdir target
ls ./src -s | find md | select name | each { |it|
    print $it.name
    let dir = ("src/" + $it.name)
    (pandoc $dir
        -o ("target/" + $it.name)
        --from markdown
        --to docx
        --reference-doc ./custom-reference.docx)
}