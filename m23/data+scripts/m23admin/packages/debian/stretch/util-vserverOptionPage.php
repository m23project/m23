<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("util-vserver");

$elem["util-vserver/postrm_remove_vserver_configs"]["type"]="boolean";
$elem["util-vserver/postrm_remove_vserver_configs"]["description"]="Remove local Linux-Vserver guest configurations?
 Choose this option if you want the /etc/vservers directory, containing 
 your local Linux-Vserver guest configurations, to be removed. If you wish to keep 
 these configurations, do not choose this option.
";
$elem["util-vserver/postrm_remove_vserver_configs"]["descriptionde"]="Entferne lokale Linux-Vserver Gäste-Konfigurationen?
 Wählen Sie diese Option, falls Sie möchten, dass das /etc/vservers-Verzeichnis, das Ihre lokalen Linux-Vserver-Gast-Konfigurationen enthält, entfernt werden soll. Falls Sie diese Konfigurationen behalten möchten, wählen Sie diese Option nicht.
";
$elem["util-vserver/postrm_remove_vserver_configs"]["descriptionfr"]="Faut-il supprimer les configurations locales des serveurs Linux-Vserver ?
 Choisissez cette option si vous voulez supprimer le répertoire de configuration /etc/vservers des serveurs Linux-Vserver. Si vous souhaitez garder ces fichiers de configuration, ne choisissez pas cette option.
";
$elem["util-vserver/postrm_remove_vserver_configs"]["default"]="false";
$elem["util-vserver/prerm_stop_running_vservers"]["type"]="boolean";
$elem["util-vserver/prerm_stop_running_vservers"]["description"]="Stop running Linux-Vserver guests?
 Running Vserver guests were detected! If you remove util-vserver without 
 stopping these vservers they will continue to run and you will not be able 
 to manage them from the host, unless you reinstall util-vserver.  Choose 
 this option to stop any running Vserver guests now, otherwise they will 
 continue to run.
";
$elem["util-vserver/prerm_stop_running_vservers"]["descriptionde"]="Laufende Linux-Vserver-Gäste anhalten?
 Es wurden laufende Vserver-Gäste erkannt! Falls Sie util-vserver entfernen, ohne diese Vserver zu beenden, werden diese weiterlaufen und Sie werden nicht in der Lage sein, sie von diesem Rechner aus zu verwalten, es sei den, Sie installieren util-vserver erneut. Wählen Sie diese Option, um alle laufenden Vserver-Gäste jetzt zu beenden, andernfalls werden sie weiterlaufen.
";
$elem["util-vserver/prerm_stop_running_vservers"]["descriptionfr"]="Faut-il arrêter les serveurs Linux-Vserver ?
 Des serveurs Linux-Vserver actifs ont été détectés. Si vous supprimez util-vserver sans les arrêter, ils continueront à s'exécuter et vous ne pourrez pas les contrôler depuis cet hôte à moins de réinstaller util-vserver. Choisissez cette option pour arrêter tous les serveurs Linux-Vserver actifs à cet instant, sinon ils continueront à s'exécuter.
";
$elem["util-vserver/prerm_stop_running_vservers"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
