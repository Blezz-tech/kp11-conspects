module Lib.Task.Days
  ( writeList,
  )
where

import Data.Foldable (Foldable (foldl'))
import Lib.NormIO (writeFile)
import Prelude hiding (writeFile)

getList :: String
getList = generateList months

generateList :: [(String, Int)] -> String
generateList = concatMap generateMonth

generateMonth :: (String, Int) -> String
generateMonth (month, days) = "## " ++ month ++ "\n\n" ++ generateDays days

generateDays :: Int -> String
generateDays day = foldl' (\a x -> a ++ "### День " ++ show x ++ "\n\n- [ ] \n- [ ] \n\n") "" [1 .. day]

months :: [(String, Int)]
months =
  [ ("Январь", 31),
    ("Февраль", 28),
    ("Март", 31),
    ("Апрель", 30),
    ("Май", 31),
    ("Июнь", 30),
    ("Июль", 31),
    ("Август", 31),
    ("Сентябрь", 30),
    ("Октябрь", 31),
    ("Ноябрь", 30),
    ("Декабрь", 31)
  ]

writeList :: FilePath -> IO ()
writeList = flip writeFile getList
