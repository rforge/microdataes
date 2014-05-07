###################################################################
# cjgb
# 20120305
# Reads the "Encuesta de Estructura Salarial" with 2010 format
###################################################################

ees2010 <- function( ees.file ){
  
  file.column  <- create.spss.column(system.file( "metadata", "ees_mdat1.txt", package = "MicroDatosEs" ), 
                                     system.file( "metadata", "ees_mdat2.txt", package = "MicroDatosEs" ), encoding = "latin1")
  file.var     <- create.spss.var(system.file( "metadata", "ees_mdat1.txt", package = "MicroDatosEs" ), encoding = "latin1")
  file.vals    <- create.spss.vals(system.file( "metadata", "ees_mdat2.txt", package = "MicroDatosEs" ), encoding = "latin1")
  file.missing <- system.file( "metadata", "ees_mdat3.txt", package = "MicroDatosEs" )
  
  ees2010 <- spss.fixed.file( 
                              file = ees.file,
                              columns.file = file.column,
                              varlab.file = file.var,
                              missval.file = file.missing,
                              codes.file  = file.vals )
  
  tmp <- as.data.set(ees2010)
  
  # temporary fix until character items can be properly parsed by memisc
  # as suggested by M. Elff in private communication
  labels(tmp$cnace) <- NULL
  labels(tmp$cno1)  <- NULL

  tmp
}

