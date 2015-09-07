<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ubuntu-drivers-common");

$elem["ubuntu-drivers-common/obsolete-driver"]["type"]="error";
$elem["ubuntu-drivers-common/obsolete-driver"]["description"]="Obsolete NVIDIA Driver version
 The system has detected an obsolete NVIDIA driver in your system.
 .
 Please install ${latest} at the end of the installation with the following command:
 .
 sudo apt-get install ${latest} 
 .
 The removal of other NVIDIA drivers will be dealt with automatically.
";
$elem["ubuntu-drivers-common/obsolete-driver"]["descriptionde"]="";
$elem["ubuntu-drivers-common/obsolete-driver"]["descriptionfr"]="";
$elem["ubuntu-drivers-common/obsolete-driver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
