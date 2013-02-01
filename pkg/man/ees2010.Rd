\name{ees2010}
\alias{ees2010}
\title{
Reads microdata for the EES as provided by the INE
}
\description{
This function reads the microdata file for the "Encuesta de Estructura Salarial", ESS, survey in Spain.
}
\usage{
ees2010( ees.file )
}

\arguments{
  \item{ees.file}{ The name of the microdata file }
}
\details{
This function reads microdadata files for the "Encuesta de Estructura Salarial" survey by 
the Spanish Statistical Office, INE.
The survey data can be downloaded from \url{http://www.ine.es/prodyser/micro_epa.htm}.

It can read the files for the 2010 survey. It might work for microdata from previous surveys (1995, 2002, 2006). 

As of today, the function has a problem (related to upstream packages) in variables CNACE and CNO1.
They will be solved soon.
}
\value{
A dataframe.
}
\references{
  \url{http://www.ine.es/prodyser/micro_salarial.htm}
}
\author{
Carlos J. Gil Bellosta, with major contributions from Jos\'e Luis Ca\~nadas Reche
}
%\seealso{
%  \code{\link{as.data.frame.px}},
%}
\examples{
# This command reads a few lines sampled from the EPA for the 1Q 2011
sample.ees.data <- ees2010(system.file( "extdata", "sampleEES2010.txt", package = "MicroDatosEs") )
}

\keyword{ manip }
