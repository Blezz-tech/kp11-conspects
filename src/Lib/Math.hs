module Lib.Math
  ( digitCount,
    truncate,
  )
where

import Prelude hiding (truncate)

digitCount :: Integer -> Int
digitCount = go 1 . abs
  where
    go c n
      | n >= 10 = go (c + 1) (n `div` 10)
      | otherwise = c

truncate :: Double -> Int -> Double
truncate x n = (fromInteger . round $ x * t ) / t
  where
    t = 10 ^ n
