<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-listdifferences");

$elem["apt-listdifferences/initialize"]["type"]="boolean";
$elem["apt-listdifferences/initialize"]["description"]="Would you like to initialize the apt-listdifferences database now?
 apt-listdifferences can initialize its database of source packages now.
 Depending on your internet connection, this may take a while, but it will also
 provide immediate functionality for the tool.
 .
 If you select No, apt-list-differences will instead become functional slowly
 over time as more and more reference source packages get added to its database
 when they are first seen.

";
$elem["apt-listdifferences/initialize"]["descriptionde"]="";
$elem["apt-listdifferences/initialize"]["descriptionfr"]="";
$elem["apt-listdifferences/initialize"]["default"]="true";
$elem["apt-listdifferences/purge"]["type"]="boolean";
$elem["apt-listdifferences/purge"]["description"]="Would you like to remove the apt-listdifferences database?
 The apt-listdifferences database is currently still on disk.  You can save
 a lot of space by removing it now, but if you ever plan to reinstall
 apt-listdifferences, the database will need to be fully downloaded again.
";
$elem["apt-listdifferences/purge"]["descriptionde"]="";
$elem["apt-listdifferences/purge"]["descriptionfr"]="";
$elem["apt-listdifferences/purge"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
