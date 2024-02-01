let targetDir = "target/";
mkdir target
ls ./src -s | find md | select name | each { |it|
    print $it
    let dir = ("src/" + $it.name)
    (pandoc $dir
        -o ($targetDir + $it.name)
        --from markdown
        --to docx
        --reference-doc ./custom-reference.docx)
}