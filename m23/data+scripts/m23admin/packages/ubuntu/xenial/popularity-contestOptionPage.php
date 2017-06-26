<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("popularity-contest");

$elem["popularity-contest/participate"]["type"]="boolean";
$elem["popularity-contest/participate"]["description"]="Participate in the package usage survey?
 The system may anonymously supply the distribution developers with
 statistics about the most used packages on this system.  This
 information influences decisions such as which packages should go on
 the first distribution CD.
 .
 If you choose to participate, the automatic submission script will
 run once every week, sending statistics to the distribution developers.
 The collected statistics can be viewed on http://popcon.ubuntu.com/.
 .
 This choice can be later modified by running \"dpkg-reconfigure
 popularity-contest\".

";
$elem["popularity-contest/participate"]["descriptionde"]="";
$elem["popularity-contest/participate"]["descriptionfr"]="";
$elem["popularity-contest/participate"]["default"]="false";
$elem["popularity-contest/submiturls"]["type"]="string";
$elem["popularity-contest/submiturls"]["description"]="for internal use
 Preseed this during installation to replace the URL used for
 submitting reports.
";
$elem["popularity-contest/submiturls"]["descriptionde"]="";
$elem["popularity-contest/submiturls"]["descriptionfr"]="";
$elem["popularity-contest/submiturls"]["default"]="";
PKG_OptionPageTail2($elem);
?>
