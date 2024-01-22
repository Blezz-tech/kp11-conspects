pandoc $1 \
    -o output.docx \
    --from markdown \
    --to docx \
    --reference-doc ./custom-reference.docx \
    && xdg-open ./output.docx 
