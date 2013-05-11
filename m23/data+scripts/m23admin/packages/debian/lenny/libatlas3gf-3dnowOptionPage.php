<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libatlas3gf-3dnow");

$elem["libatlas3gf-3dnow/no_3dnow"]["type"]="note";
$elem["libatlas3gf-3dnow/no_3dnow"]["description"]="The running cpu cannot execute 3dnow code
 You are installing 3dnow enhanced atlas libs on a system which cannot
 execute them.  This is most likely because your processor is not an AMD K6
 or higher.  This package will go ahead and install the libs, but not set
 the runtime linker on this machine to use them.  You can later perform
 this configuration with dpkg-reconfigure libatlas3gf-3dnow.
";
$elem["libatlas3gf-3dnow/no_3dnow"]["descriptionde"]="Die laufende CPU kann keinen 3dnow-Code ausführen
 Sie installieren 3dnow-erweiterte Atlas-Bibliotheken auf einem System, das diese nicht ausführen kann. Dies ist sehr wahrscheinlich der Fall, da Ihr Prozessor kein AMD K6 oder höher ist. Dieses Paket wird damit fortfahren, die Bibliotheken zu installieren, aber es wird den Laufzeit-Linker nicht dahingehend einrichten, dass er sie verwendet. Sie können diese Konfiguration später durch »dpkg-reconfigure libatlas3gf-3dnow« ändern.
";
$elem["libatlas3gf-3dnow/no_3dnow"]["descriptionfr"]="Le processeur actuellement utilisé ne peut pas exécuter de code 3DNow
 Vous êtes en train d'installer les bibliothèques atlas avec gestion des instructions 3DNow sur un système qui ne peut pas les gérer. Votre processeur n'est probablement pas un AMD K6 ou supérieur. Ce paquet va ignorer cela et installer les bibliothèques mais l'éditeur de liens ne sera pas configuré pour s'en servir. Vous pourrez effectuer cette configuration ultérieurement avec la commande « dpkg-reconfigure libatlas3gf-3dnow ».
";
$elem["libatlas3gf-3dnow/no_3dnow"]["default"]="";
PKG_OptionPageTail2($elem);
?>
