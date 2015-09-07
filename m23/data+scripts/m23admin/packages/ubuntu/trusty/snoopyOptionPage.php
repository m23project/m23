<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("snoopy");

$elem["snoopy/install-ld-preload"]["type"]="boolean";
$elem["snoopy/install-ld-preload"]["description"]="Install snoopy library to /etc/ld.so.preload?
 snoopy is a library that can only reliably do its work if it is
 mandatorily preloaded via /etc/ld.so.preload. Since this can potentially
 do harm to the system, your consent is needed.
";
$elem["snoopy/install-ld-preload"]["descriptionde"]="Snoopy-Library nach /etc/ld.so.preload installieren?
 Snoopy kann als preload-Bibliothek nur dann funktionieren, wenn siefür alle Programme vorgeladen wird. Dies kann in /etc/ld.so.preload eingestellt werden. Da diese Veränderung potentiell Schaden verursachen kann, ist Ihre Zustimmung notwendig.
";
$elem["snoopy/install-ld-preload"]["descriptionfr"]="Faut-il installer la bibliothèque snoopy dans /etc/ld.so.preload ?
 Snoopy est une bibliothèque qui ne peut être utile que si elle est préchargée via /etc/ld.so.preload. Puisque cela peut potentiellement détériorer le système, votre accord est nécessaire.
";
$elem["snoopy/install-ld-preload"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
