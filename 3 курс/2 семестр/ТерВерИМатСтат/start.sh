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
   echo "Передайте привильный аргемент в скрипт"
   exit
   ;;
esac


echo "Билдится $FILE_PATH"
mkdir -p target
pandoc "src/$FILE_PATH" \
    -o ./target/output.docx \
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
     xdg-open ./target/output.docx 
     ;;

   CYGWIN*|MINGW*|MINGW32*|MSYS*)
     echo 'MS Windows'
     start ./target/output.docx
     ;;

   *)
     echo 'Other OS' 
     ;;
esac