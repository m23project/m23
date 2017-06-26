<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phonon4qt5-backend-null");

$elem["phonon4qt5-backend-null/isnt_functional_title"]["type"]="title";
$elem["phonon4qt5-backend-null/isnt_functional_title"]["description"]="Warning: Phonon4Qt5 is not functional

";
$elem["phonon4qt5-backend-null/isnt_functional_title"]["descriptionde"]="";
$elem["phonon4qt5-backend-null/isnt_functional_title"]["descriptionfr"]="";
$elem["phonon4qt5-backend-null/isnt_functional_title"]["default"]="";
$elem["phonon4qt5-backend-null/isnt_functional"]["type"]="note";
$elem["phonon4qt5-backend-null/isnt_functional"]["description"]="Missing back-end for Phonon4Qt5
 Applications using Phonon4Qt5 (the KF 5 multimedia framework) will produce
 no audio or video output, because only a dummy Phonon back-end is
 installed on this system. This is typically an unintended configuration.
 .
 To restore full Phonon4Qt5 multimedia capabilities, install one of the real
 Phonon4Qt5 back-end packages which are currently available for this system:
 .
 ${recommended4qt5_backend} (recommended)${other_backends}
";
$elem["phonon4qt5-backend-null/isnt_functional"]["descriptionde"]="";
$elem["phonon4qt5-backend-null/isnt_functional"]["descriptionfr"]="";
$elem["phonon4qt5-backend-null/isnt_functional"]["default"]="";
PKG_OptionPageTail2($elem);
?>
