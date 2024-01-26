mkdir -p output

pandoc ./ПР_1.md \
    -o ./output/output.docx \
    --from markdown \
    --to docx \
    --reference-doc ./custom-reference.docx


case "$(uname -sr)" in

   Darwin*)
     echo 'Mac OS X'
     ;;

   Linux*Microsoft*)
     echo 'WSL'
     ;;

   Linux*)
     echo 'Linux'
     xdg-open ./output/output.docx 
     ;;

   CYGWIN*|MINGW*|MINGW32*|MSYS*)
     echo 'MS Windows'
     start ./output/output.docx
     ;;

   *)
     echo 'Other OS' 
     ;;
esac