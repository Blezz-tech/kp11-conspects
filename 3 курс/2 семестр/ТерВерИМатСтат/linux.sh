pandoc $1 \
    -o output.docx \
    --from markdown \
    --to docx \
    && xdg-open ./output.docx 
