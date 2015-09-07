<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("quake3-data");

$elem["quake3-data/install"]["type"]="boolean";
$elem["quake3-data/install"]["description"]="Do you want to install Quake III data files, now?
 For the installation process you will need your Quake III CD-ROM and you
 must be connected to the internet, except you have a mirror serving the
 latest Quake III Arena pointrelease.

";
$elem["quake3-data/install"]["descriptionde"]="";
$elem["quake3-data/install"]["descriptionfr"]="";
$elem["quake3-data/install"]["default"]="true";
$elem["quake3-data/cdrom"]["type"]="string";
$elem["quake3-data/cdrom"]["description"]="Mount location of the Quake III CD-ROM:
 Type the name of the mount point of your CD-ROM. If you have not yet
 mounted the CD-ROM, you should do that, now.

";
$elem["quake3-data/cdrom"]["descriptionde"]="";
$elem["quake3-data/cdrom"]["descriptionfr"]="";
$elem["quake3-data/cdrom"]["default"]="/media/cdrom0";
$elem["quake3-data/mirror"]["type"]="string";
$elem["quake3-data/mirror"]["description"]="Preferred mirror for the point release:
 Choose the default value if you are not sure where to download the latest
 Quake III point release. Your computer must be connected to the internet
 to make this work!
";
$elem["quake3-data/mirror"]["descriptionde"]="";
$elem["quake3-data/mirror"]["descriptionfr"]="";
$elem["quake3-data/mirror"]["default"]="ftp://ftp.idsoftware.com/idstuff/quake3/linux";
PKG_OptionPageTail2($elem);
?>
