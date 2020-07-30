<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("refind");

$elem["refind/install_to_esp"]["type"]="boolean";
$elem["refind/install_to_esp"]["description"]="Automatically install rEFInd to the ESP?
 It is necessary to install rEFInd to the EFI System Partition (ESP) for
 it to control the boot process.
 .
 Not installing the new rEFInd binary on the ESP may leave the system in an
 unbootable state. Alternatives to automatically installing rEFInd include
 running /usr/sbin/refind-install by hand or installing the rEFInd binaries
 manually by copying them from subdirectories of /usr/share/refind-{version}.
";
$elem["refind/install_to_esp"]["descriptionde"]="rEFInd automatisch auf der ESP installieren?
 Es ist notwendig, rEFInd auf die EFI-Systempartition (ESP) zu installieren, damit es den Systemstart steuern kann.
 .
 Wenn das neue rEFInd-Programm nicht auf der ESP installiert wird, wird das System möglicherweise in einem nicht mehr startbaren Zustand verbleiben. Alternaitiv zur automatischen Installation können Sie /usr/sbin/refind-install von Hand ausführen oder die rEFInd-Programme manuell installieren, indem Sie sie manuell aus den Unterverzeichnissen von /usr/share/refind-{Version} kopieren.
";
$elem["refind/install_to_esp"]["descriptionfr"]="Faut-il installer automatiquement rEFInd sur l'ESP ?
 Il faut installer rEFInd sur la Partition Système EFI (ESP) pour qu'il puisse gérer le processus de démarrage.
 .
 Ne pas installer le nouvel exécutable rEFInd sur l'ESP pourrait laisser le système dans un état non amorçable. Les alternatives pour installer automatiquement rEFInd comprennent le lancement manuel de /usr/sbin/refind-install ou l'installation manuelle des exécutables de rEFInd en les copiant depuis les sous-répertoires de /usr/share/refind-{version}.
";
$elem["refind/install_to_esp"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
