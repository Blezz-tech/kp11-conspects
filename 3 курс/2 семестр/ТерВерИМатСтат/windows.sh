pandoc "./Конспект.md" \
    -o output.docx \
    --from markdown \
    --to docx \
    --reference-doc ./custom-reference.docx \
    && start ./output.docx 
