<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pine-tracker");

$elem["pine-tracker/note"]["type"]="note";
$elem["pine-tracker/note"]["description"]="New pine source available
  Some packages built from the pine source are out of date. To update
  these packages, make sure you have source URIs in /etc/apt/sources.list
  and run the following commands, as root, in a scratch directory:
 .
   # apt-get --only-source build-dep pine
   # apt-get --only-source -b source pine
 .
  And then use dpkg -i to install the generated debian packages.
";
$elem["pine-tracker/note"]["descriptionde"]="";
$elem["pine-tracker/note"]["descriptionfr"]="";
$elem["pine-tracker/note"]["default"]="";
PKG_OptionPageTail2($elem);
?>
