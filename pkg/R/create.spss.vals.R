###################################################################
# cjgb
# 20120305
# Transforms metadata file into data list spss file
###################################################################

create.spss.vals <- function(file,...){
  mdat.2 <- read.table(file, header = T, sep = "\t",...)
  
  spss.vals.file <- tempfile(pattern = "file", tmpdir = tempdir(), fileext = ".sps")
  
  value.labels <- mdat.2[mdat.2$tipo == "D",]
  value.labels$valor <- paste( '"', value.labels$valor, '"', sep = "")
  value.labels$valor <- paste(value.labels$llave, value.labels$valor, sep = " ")
  
  tmp <- tapply(value.labels$valor, value.labels$var, function(x) paste(x, collapse = " "))
  tmp <- tmp[! is.na(tmp)]
  tmp.names <- paste( "/", names(tmp), " \n", sep = " ")
  
  tmp <- paste( tmp.names, tmp, " \n", sep ="")
  
  cat('VALUE LABELS  \n',
      tmp,
      '.',
      file = spss.vals.file )
  
  spss.vals.file
}