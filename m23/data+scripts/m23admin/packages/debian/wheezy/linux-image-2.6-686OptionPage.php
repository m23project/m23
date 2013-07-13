<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("linux-image-2.6-686");

$elem["linux-image-686/no-pae"]["type"]="error";
$elem["linux-image-686/no-pae"]["description"]="This system requires a different kernel configuration
 Debian's '686' kernel configuration has been replaced by the '686-pae'
 configuration, which uses PAE (Physical Address Extension).  However,
 the CPU in this system does not support PAE.
 .
 You should install linux-image-486 and remove linux-image-686 and/or
 linux-image-2.6-686 if they are currently installed.
";
$elem["linux-image-686/no-pae"]["descriptionde"]="Dieses System erfordert eine andere Kernel-Konfiguration
 Debians »686«-Kernel-Konfiguration wurde durch die »686-pae«-Konfiguration ersetzt, welche PAE (Physical Address Extension) verwendet. Allerdings wird PAE von der CPU in diesem System nicht unterstützt.
 .
 Sie sollten linux-image-486 installieren und linux-image-686 und/oder linux-image-2.6-686 entfernen, falls diese derzeit installiert sind.
";
$elem["linux-image-686/no-pae"]["descriptionfr"]="Modification indispensable de la configuration du noyau
 La configuration « 686 » du noyau de Debian a été remplacée par la configuration « 686-pae » qui utilise PAE (« Physical Address Extension » : extension des adresses physiques). Cependant, le micro-processeur de ce système ne gère pas PAE.
 .
 Vous devriez installer le paquet linux-image-486 et supprimer linux-image-686 ou linux-image-2.6-686 s'ils sont actuellement installés.
";
$elem["linux-image-686/no-pae"]["default"]="";
PKG_OptionPageTail2($elem);
?>
