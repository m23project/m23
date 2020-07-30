<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("unattended-upgrades");

$elem["unattended-upgrades/enable_auto_updates"]["type"]="boolean";
$elem["unattended-upgrades/enable_auto_updates"]["description"]="Automatically download and install stable updates?
 Applying updates on a frequent basis is an important part of keeping
 systems secure. By default, updates need to be applied manually using package 
 management tools. Alternatively, you can choose to have this system 
 automatically download and install important updates.
";
$elem["unattended-upgrades/enable_auto_updates"]["descriptionde"]="Aktualisierungen für Stable automatisch herunterladen und installieren?
 Häufige Aktualisierungen sind wichtig, um Systeme sicher zu halten. Standardmäßig müssen Aktualisierungen manuell mittels Paketverwaltungswerkzeugen durchgeführt werden. Alternativ können Sie auswählen, dass dieses System wichtige Aktualisierungen automatisch herunterlädt und installiert.
";
$elem["unattended-upgrades/enable_auto_updates"]["descriptionfr"]="Faut-il automatiquement télécharger et installer les mises à jour de la version stable ?
 Il est important de mettre régulièrement son système à jour pour maintenir un haut niveau de sécurité. Par défaut, les mises à jour doivent être appliquées manuellement à l'aide d'un outil de gestion de paquets. Autrement, vous pouvez choisir d'automatiser ce processus de téléchargement et d'installation des mises à jour de sécurité.
";
$elem["unattended-upgrades/enable_auto_updates"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
