<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wmnetmon");

$elem["wmnetmon/setuid"]["type"]="note";
$elem["wmnetmon/setuid"]["description"]="wmnetmon must run setuid root
 wmnetmon needs to be setuid root to obtain a raw socket to send ICMP
 packages. If you don't like this, please deinstall wmnetmon right away.
";
$elem["wmnetmon/setuid"]["descriptionde"]="Wmnetmon muss Setuid-Root laufen
 Wmnetmon muss »setuid root« gesetzt werden, um einen rohen Socket zu erhalten, um ICMP-Pakete zu senden. Falls Sie dies nicht wollen, deinstallieren Sie Wmnetmon umgehend.
";
$elem["wmnetmon/setuid"]["descriptionfr"]="wmnetmon doit être « setuid root »
 wmnetmon nécessite d'être « setuid root » (le programme s'exécute avec les droits du super-utilisateur) afin d'obtenir un « socket » brut pour envoyer des paquets ICMP. Si vous n'aimez pas cela, vous devriez désinstaller wmnetmon immédiatement.
";
$elem["wmnetmon/setuid"]["default"]="";
PKG_OptionPageTail2($elem);
?>
