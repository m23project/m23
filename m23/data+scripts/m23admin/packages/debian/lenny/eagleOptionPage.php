<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("eagle");

$elem["eagle/install-license"]["type"]="boolean";
$elem["eagle/install-license"]["description"]="Run eagle now to install the license key file?
 Eagle must be run once as root to install the license key file.
";
$elem["eagle/install-license"]["descriptionde"]="Eagle jetzt starten, um die Lizenzdatei zu installieren?
 Eagle muss einmal als root aufgerufen werden, um die Lizenzdatei zu installieren.
";
$elem["eagle/install-license"]["descriptionfr"]="Voulez-vous lancer eagle maintenant pour installer le fichier de licence ?
 Le programme eagle doit être lancé une première fois par le superutilisateur afin d'installer le fichier de licence ; tant que ce fichier ne sera pas créé les autres utilisateurs ne pourront pas utiliser ce programme.
";
$elem["eagle/install-license"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
