pandoc "./3 курс/2 семестр/ТерВерИМатСтат/README.md" \
    -o output.docx \
    --from markdown \
    --to docx \
    && start ./output.docx 
