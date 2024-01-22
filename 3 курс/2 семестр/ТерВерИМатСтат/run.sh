pandoc $1 \
    -o output.docx \
    --from markdown \
    --to docx \
    && start ./output.docx 
