pandoc "./ПР_1.md" \
    -o output.docx \
    --from markdown \
    --to docx \
    --reference-doc ./custom-reference.docx \
    && start ./output.docx 
