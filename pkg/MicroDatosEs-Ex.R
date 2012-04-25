pkgname <- "MicroDatosEs"
source(file.path(R.home("share"), "R", "examples-header.R"))
options(warn = 1)
library('MicroDatosEs')

assign(".oldSearch", search(), pos = 'CheckExEnv')
cleanEx()
nameEx("epa2005")
### * epa2005

flush(stderr()); flush(stdout())

### Name: epa2005
### Title: Reads microdata for the EPA as provided by the INE
### Aliases: epa2005
### Keywords: manip

### ** Examples

# This command reads a few lines sampled from the EPA for the 1Q 2011
sample.epa.data <- epa2005(system.file( "extdata", "sampleEPA0111.txt", package = "pxR") )



### * <FOOTER>
###
cat("Time elapsed: ", proc.time() - get("ptime", pos = 'CheckExEnv'),"\n")
grDevices::dev.off()
###
### Local variables: ***
### mode: outline-minor ***
### outline-regexp: "\\(> \\)?### [*]+" ***
### End: ***
quit('no')
