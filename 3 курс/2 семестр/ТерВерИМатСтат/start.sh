case $1 in
   "11")
   FILE_PATH="Работа_1.md"
   ;;

   "12")
   FILE_PATH="Работа_2.md"
   ;;

   "21")
   FILE_PATH="ПР_1.md"
   ;;

   *)
   echo "Непонятно что"
   exit
   ;;
esac

if [[ -v FILE_PATH ]]; then
  echo "Билдится $FILE_PATH"
  mkdir -p output
  pandoc $FILE_PATH \
      -o ./output/output.docx \
      --from markdown \
      --to docx \
      --reference-doc ./custom-reference.docx
else 
    echo "FILE_PATH $FILE_PATH не существует."
fi

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