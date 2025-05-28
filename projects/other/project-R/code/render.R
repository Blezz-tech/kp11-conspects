library(rmarkdown)

output_dir <- "output"

render("code/main.Rmd",
       output_dir = output_dir,
       output_format = "all")

