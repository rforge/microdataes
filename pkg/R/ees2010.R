###################################################################
# cjgb
# 20120305
# Reads the "Encuesta de Estructura Salarial" with 2010 format
###################################################################

ees2010 <- function( ees.file ){
  
  file.column  <- create.spss.column(system.file( "metadata", "ees_mdat1.txt", package = "MicroDatosEs" ), encoding = "latin1")
  file.var     <- create.spss.var(system.file( "metadata", "ees_mdat1.txt", package = "MicroDatosEs" ), encoding = "latin1")
  file.vals    <- create.spss.vals(system.file( "metadata", "ees_mdat2.txt", package = "MicroDatosEs" ), encoding = "latin1")
  file.missing <- system.file( "metadata", "ees_mdat3.txt", package = "MicroDatosEs" )
  
  ees2010 <- spss.fixed.file( 
                              file = ees.file,
                              columns.file = file.column,
                              varlab.file = file.var,
                              missval.file = file.missing,
                              codes.file  = file.vals )
  
  cat("As of today, there is an error in the variables CNACE and CNO1.\n")

  as.data.set(ees2010)
}

