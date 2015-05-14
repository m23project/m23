<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("vdr");

$elem["vdr/select_dvb_card"]["type"]="select";
$elem["vdr/select_dvb_card"]["choices"][1]="Satellite";
$elem["vdr/select_dvb_card"]["choices"][2]="Terrestrial";
$elem["vdr/select_dvb_card"]["choicesde"][1]="Satellit";
$elem["vdr/select_dvb_card"]["choicesde"][2]="Terrestrisch";
$elem["vdr/select_dvb_card"]["choicesfr"][1]="Satellite";
$elem["vdr/select_dvb_card"]["choicesfr"][2]="Terrestre";
$elem["vdr/select_dvb_card"]["description"]="DVB card type:
 VDR needs to know your DVB card type to work correctly.
 Using your selection, a channels.conf file will be installed to /var/lib/vdr. 
 You may have to change this file depending on your setup.
";
$elem["vdr/select_dvb_card"]["descriptionde"]="DVB-Karten-Typ:
 VDR muss den Typ Ihrer DVB-Karte kennen, um korrekt zu funktionieren. Mit Hilfe ihrer Auswahl wird eine channels.conf-Datei in /var/lib/vdr installiert.  Eventuell werden Sie diese Datei an Ihre Umgebung anpassen müssen.
";
$elem["vdr/select_dvb_card"]["descriptionfr"]="Type de carte DVB :
 VDR a besoin de connaître le type de votre carte DVB pour fonctionner correctement. Un fichier channels.conf correspondant au type que vous choisirez sera installé dans le répertoire /var/lib/vdr. En fonction de votre configuration, il est possible que vous ayez besoin de modifier ce fichier par la suite.
";
$elem["vdr/select_dvb_card"]["default"]="Satellite";
$elem["vdr/create_video_dir"]["type"]="boolean";
$elem["vdr/create_video_dir"]["description"]="Create /var/lib/video.00?
 By default VDR is configured to use /var/lib/video.00 to store recordings.
 You can either create this directory now, or change this behavior later 
 by modifying the VIDEO_DIR variable in /etc/default/vdr.
";
$elem["vdr/create_video_dir"]["descriptionde"]="Soll /var/lib/video.00 erstellt werden?
 Standardmäßig ist VDR so konfiguriert, dass Aufnahmen in /var/lib/video.00 gespeichert werden. Sie können dieses Verzeichnis entweder jetzt erstellen, oder diese Konfiguration später ändern, indem Sie die Variable VIDEO_DIR in /etc/default/vdr anpassen.
";
$elem["vdr/create_video_dir"]["descriptionfr"]="Créer le répertoire /var/lib/video.00 ?
 Par défaut, VDR sauvegarde les enregistrements dans le répertoire /var/lib/video.00. Vous pouvez changer ce répertoire en modifiant la variable VIDEO_DIR dans le fichier /etc/default/vdr, ou créer ce répertoire maintenant.
";
$elem["vdr/create_video_dir"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
