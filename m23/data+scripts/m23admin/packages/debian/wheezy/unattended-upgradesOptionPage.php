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
 automatically download and install security updates.
";
$elem["unattended-upgrades/enable_auto_updates"]["descriptionde"]="Aktualisierungen für Stable automatisch herunterladen und installieren?
 Das häufige Anwenden von Aktualisierungen ist ein wichtiger Aspekt beim Erhalt der Sicherheit von Systemen. Standardmäßig müssen Aktualisierungen manuell mit den Paketverwaltungswerkzeugen eingespielt werden. Alternativ können Sie wählen, dass das System automatisch die Sicherheitsaktualisierungen herunterlädt und installiert.
";
$elem["unattended-upgrades/enable_auto_updates"]["descriptionfr"]="Faut-il automatiquement télécharger et installer les mises à jour de la version stable ?
 Il est important de mettre régulièrement son système à jour pour maintenir un haut niveau de sécurité. Par défaut, les mises à jour doivent être appliquées manuellement à l'aide d'un outil de gestion de paquets. À l'inverse, vous pouvez choisir d'automatiser ce processus avec unattended-upgrades.
";
$elem["unattended-upgrades/enable_auto_updates"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
