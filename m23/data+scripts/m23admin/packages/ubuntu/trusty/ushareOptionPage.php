<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ushare");

$elem["ushare/name"]["type"]="string";
$elem["ushare/name"]["description"]="uShare's name:
 Set UPnP friendly name. This is the name of this computer shares, 
 seen by UPnP clients.
";
$elem["ushare/name"]["descriptionde"]="";
$elem["ushare/name"]["descriptionfr"]="Nom de uShare :
 Défini le nom UPnP. Ceci est le nom de partage de cet ordinateur, tel qu'il sera vu par les clients UPnP.

";
$elem["ushare/name"]["default"]="uShare";
$elem["ushare/iface"]["type"]="select";
$elem["ushare/iface"]["description"]="Network interface:
 Set network interface to use for sharing the content.
 If your interface is not on the list, please edit the file
 \"${configfile}\" manualy.
";
$elem["ushare/iface"]["descriptionde"]="";
$elem["ushare/iface"]["descriptionfr"]="Interface réseau :
 Défini l'interface réseau à utiliser pour partager le contenu. Si votre interface n'apparaît pas dans la liste, merci d'éditer le fichier \"${configfile}\" manuellement.

";
$elem["ushare/iface"]["default"]="eth0";
$elem["ushare/share"]["type"]="string";
$elem["ushare/share"]["description"]="Shared directories:
 Set the directories to share with uShare.
";
$elem["ushare/share"]["descriptionde"]="";
$elem["ushare/share"]["descriptionfr"]="Répertoires à partager :
 Défini les répertoires à partager par uShare.
";
$elem["ushare/share"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
