module Lib.NormIO
  ( writeFile,
  )
where

import System.IO hiding (writeFile)
import Prelude hiding (writeFile)

writeFile :: FilePath -> String -> IO ()
writeFile path text = do
  outputHandle <- openFile path WriteMode
  hSetEncoding outputHandle utf8
  hPutStr outputHandle text
  hClose outputHandle