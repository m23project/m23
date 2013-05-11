<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("flashybrid");

$elem["flashybrid/remove"]["type"]="note";
$elem["flashybrid/remove"]["description"]="Note about removal of flashybrid package
 Please be warned, this package  changes the way your system behaves in a really 
 intrusive way. This package is not enabled by default so it should not make any
 problems by just installing it. If you want to enable it, please read the 
 documentation. 
 .
 If you want to remove this package, you should first disable it,
 boot the machine, and ONLY WHEN THE MACHINE HAS BEEN REBOOTED WITHOUT FLASHYBRID
 RUNNING YOU CAN REMOVE THE PACKAGE ITSELF. If you do not to do it this way,
 you can potentially lose data (things like configuration files in /etc/ will
 not get synced to the real drive, stay only in the tmpfs and lost on reboot).
 .
 Please read the Debian documentation found in /usr/share/doc/flashybrid/
 specially README.debian
";
$elem["flashybrid/remove"]["descriptionde"]="Hinweis zum Entfernen des Flashybrid-Pakets
 Bitte beachten Sie, dass dieses Paket die Art und Weise, wie sich Ihr System verhält, wirklich einschneidend verändert. Dieses Paket ist in der Voreinstellung nicht aktiviert, so dass die reine Installation keine Probleme verursachen sollte. Lesen Sie bitte die Dokumentation, falls Sie es aktivieren möchten.
 .
 Falls Sie das Paket entfernen möchten, sollten Sie es zuerst deaktivieren und den Rechner neu starten. NUR WENN DER RECHNER OHNE LAUFENDES FLASHYBIRD NEU GESTARTET WURDE, KÖNNEN SIE DAS PAKET SELBST ENTFERNEN. Falls Sie nicht in dieser Weise verfahren, könnten Sie Daten verlieren (Dateien wie Konfigurationsdateien in /etc/ werden nicht mit dem wirklichen Laufwerk synchronisiert, verbleiben nur im tmpfs und sind beim Neustart verloren).
 .
 Bitte lesen Sie die Debian-Dokumentation, die in /usr/share/doc/flashybrid/ gefunden werden kann, speziell README.Debian.
";
$elem["flashybrid/remove"]["descriptionfr"]="Note concernant la suppression du paquet flashybrid
 Attention, ce paquet modifie de manière importante le comportement de votre système. Ce paquet n'est pas activé par défaut, il ne doit donc provoquer aucun problème si vous vous contentez de l'installer. Si vous désirez l'activer, veuillez lire la documentation.
 .
 Si vous désirez supprimer ce paquet, vous devrez d'abord le désactiver, redémarrer l'ordinateur, et SEULEMENT APRÈS QUE LE SYSTÈME AURA REDÉMARRÉ SANS QUE FLASHYBRID NE TOURNE, VOUS POURREZ SUPPRIMER LE PAQUET LUI-MÊME. Si vous ne procédez pas de cette manière, vous courez le risque de perdre des données (par exemple des fichiers de configuration dans /etc/ ne seront plus en phase avec ce qui se trouve sur le disque physique, ils resteront sur le système de fichiers tmpfs et seront perdus lors du redémarrage).
 .
 Veuillez lire la documentation Debian qui se trouve dans /usr/share/doc/flashybrid/, plus particulièrement README.Debian
";
$elem["flashybrid/remove"]["default"]="";
PKG_OptionPageTail2($elem);
?>
