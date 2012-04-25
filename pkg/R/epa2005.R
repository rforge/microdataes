###################################################################
# cjgb
# 20120305
# Reads the EPA microdata in its 2005 version
###################################################################

epa2005 <- function( epa.file ){
  
  file.column  <- create.spss.column(system.file( "metadata", "epa_mdat1.txt", package = "MicroDatosEs" ), encoding = "latin1")
  #file.column  <- create.spss.column("/home/carlos/src/r/MicroDatosEs/inst/metadata/epa_mdat1.txt", encoding = "latin1")
  file.var     <- create.spss.var(system.file( "metadata", "epa_mdat1.txt", package = "MicroDatosEs" ), encoding = "latin1")
  #file.var     <- create.spss.var("/home/carlos/src/r/MicroDatosEs/inst/metadata/epa_mdat1.txt", encoding = "latin1")
  file.vals    <- create.spss.vals(system.file( "metadata", "epa_mdat2.txt", package = "MicroDatosEs" ), encoding = "latin1")
  file.missing <- system.file( "metadata", "epa_mdat3.txt", package = "MicroDatosEs" )
  
  epa2005 <- spss.fixed.file( #file = system.file( "extdata", "sampleEPA0111.txt", package = "MicroDatosEs" ),
                              file = epa.file,
                              columns.file = file.column,
                              varlab.file = file.var,
                              missval.file = file.missing,
                              codes.file  = file.vals )
  
  as.data.set(epa2005)

	#file.mdat.1 <- system.file( "metadata", "epa_mdat1.txt", package = "MicroDatosEs" )
	#file.mdat.2 <- system.file( "metadata", "epa_mdat2.txt", package = "MicroDatosEs", encoding = "latin1" )
	
	#read.fwf.microdata( epa.file, file.mdat.1, file.mdat.2 )
}

