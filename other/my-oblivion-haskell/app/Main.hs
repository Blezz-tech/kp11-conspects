module Main (main) where

main :: IO ()
main = do
  putStrLn "Привет!"
  print $ foo (Just 1) (Just "!")
  print $ foo Nothing (Just "!")
  print $ foo (Just 1) Nothing
  print $ foo Nothing Nothing


foo :: Maybe Int -> Maybe String -> Maybe String
foo x y = do
  x' <- x
  y' <- y
  Just (show x' ++ y')