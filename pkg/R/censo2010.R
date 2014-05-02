###################################################################
# cjgb
# 20140428
# Reads the microdata for the 2010 Spanish Census
###################################################################

censo2010 <- function(census.file){
  
  file.column  <- create.spss.column(system.file( "metadata", "censo_2010_mdat1.txt", package = "MicroDatosEs" ), 
                                     system.file( "metadata", "censo_2010_mdat2.txt", package = "MicroDatosEs" ), encoding = "utf8")
  file.var     <- create.spss.var(system.file( "metadata", "censo_2010_mdat1.txt", package = "MicroDatosEs" ), encoding = "utf8")
  file.vals    <- create.spss.vals(system.file( "metadata", "censo_2010_mdat2.txt", package = "MicroDatosEs" ), encoding = "utf8")
  file.missing <- system.file( "metadata", "censo_2010_mdat3.txt", package = "MicroDatosEs" )
  
  censo_2010 <- spss.fixed.file( 
                              file = census.file,
                              columns.file = file.column,
                              varlab.file = file.var,
                              missval.file = file.missing,
                              codes.file  = file.vals )
  
  cat("As of today, there is an error in the variables CNACE and CNO1.\n")

  as.data.set(censo_2010)
}

