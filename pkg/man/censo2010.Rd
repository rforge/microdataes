\name{censo2010}
\alias{censo2010}
\title{
Reads microdata for the 2010 decennial census provided by the INE
}
\description{
This function reads the microdata file for the Spanish 2010 Census.
}
\usage{
censo2010(census.file)
}

\arguments{
  \item{census.file}{ The name of the microdata file }
}
\details{
This function reads microdadata file for the 2010 decennial census in Spain.

Mind that a powerful computer may be needed to read the full census file.
}
\value{
A dataframe.
}
\references{
}
\author{
Carlos J. Gil Bellosta
}
%\seealso{
%  \code{\link{as.data.frame.px}},
%}
\examples{
# This line reads 1000 lines from the census file (provided within the package)
sample.censo.data <- censo2010(system.file("extdata", "sampleCenso.txt", package = "MicroDatosEs") )
}

\keyword{ manip }
