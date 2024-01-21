pandoc "./3 курс/2 семестр/ТерВерИМатСтат/Работа 1.md" \
    -o output.docx \
    --from markdown \
    --to docx \
    && start ./output.docx 
