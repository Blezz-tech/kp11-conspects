pandoc "./Работа 1.md" \
    -o output.docx \
    --from markdown \
    --to docx \
    && start ./output.docx 
