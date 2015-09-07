<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("liblapack3gf");

$elem["liblapack3gf/crit"]["type"]="note";
$elem["liblapack3gf/crit"]["description"]="Critical lapack errors
 One or more critical lapack library errors were discovered when this
 package was built.  As of the time of this writing, all known such
 errors are due to compiler and/or ld.so errors on the affected
 architectures.  The lapack libraries in this set of packages then,
 while practically useless for serious numerical research, are
 provided here nonetheless to facilitate smooth upgrades of lapack
 into Debian as a whole.

";
$elem["liblapack3gf/crit"]["descriptionde"]="";
$elem["liblapack3gf/crit"]["descriptionfr"]="";
$elem["liblapack3gf/crit"]["default"]="";
$elem["liblapack3gf/sig"]["type"]="note";
$elem["liblapack3gf/sig"]["description"]="Significant lapack errors
 One or more significant lapack library errors were discovered when
 this package was built.  As of the time of this writing, all known
 such errors are due to compiler and/or ld.so errors on the affected
 architectures.  The lapack libraries in this set of packages then,
 while questionable for serious numerical research, are
 provided here nonetheless to facilitate smooth upgrades of lapack
 into Debian as a whole.

";
$elem["liblapack3gf/sig"]["descriptionde"]="";
$elem["liblapack3gf/sig"]["descriptionfr"]="";
$elem["liblapack3gf/sig"]["default"]="";
$elem["liblapack3gf/minor"]["type"]="note";
$elem["liblapack3gf/minor"]["description"]="Minor lapack errors
 One or more minor lapack library errors were discovered when
 this package was built.  As of the time of this writing, the cause of
 these errors are unknown. These errors are typically similar to those
 routinely reported by other lapack users, and are often manifested by
 a loss of a few decimal places of precision in certain routines under
 conditions near overflow or underflow.  One should nevertheless
 review the discrepancies before using lapack for serious numerical
 research. 

";
$elem["liblapack3gf/minor"]["descriptionde"]="";
$elem["liblapack3gf/minor"]["descriptionfr"]="";
$elem["liblapack3gf/minor"]["default"]="";
PKG_OptionPageTail2($elem);
?>
