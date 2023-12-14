
case $1 in
  "build" ) stack build ;;
  "run"   ) stack exec my-oblivion-haskell-exe;;
  *       ) echo "Неизвестная команда";;
esac
