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
$elem["unattended-upgrades/origins_pattern"]["type"]="string";
$elem["unattended-upgrades/origins_pattern"]["description"]="Origins-Pattern that packages must match to be upgraded:
 Please specify a value for the unattended-upgrades Origins-Pattern.
 .
 A package will be upgraded only if its metadata values match all the supplied
 keywords in the origin line.
";
$elem["unattended-upgrades/origins_pattern"]["descriptionde"]="Ursprungsmuster, zu dem Pakete passen müssen, damit ein Upgrade von ihnen durchgeführt wird:
 Geben Sie bitte einen Wert für das Unattended-Upgrades-Ursprungsmuster an.
 .
 Es wird nur dann ein Upgrade eines Pakets durchgeführt, falls dessen Metadaten zu allen angegebenen Schlüsselworten in der Urpsrungszeile passen.
";
$elem["unattended-upgrades/origins_pattern"]["descriptionfr"]="Motif « Origin-Pattern » auquel les paquets doivent correspondre pour être mis à jour :
 Veuillez indiquer une valeur pour le motif de correspondance « Origin-Pattern » pour unattended-upgrades.
 .
 Un paquet sera mis à jour uniquement si ses métadonnées correspondent à tous les mots clés indiqués ici.
";
$elem["unattended-upgrades/origins_pattern"]["default"]="\"origin=Debian,codename=${distro_codename},label=Debian-Security\";";
PKG_OptionPageTail2($elem);
?>
