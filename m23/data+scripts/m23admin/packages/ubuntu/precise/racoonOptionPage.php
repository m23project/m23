<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("racoon");

$elem["racoon/config_mode"]["type"]="select";
$elem["racoon/config_mode"]["choices"][1]="direct";
$elem["racoon/config_mode"]["choicesde"][1]="direkt";
$elem["racoon/config_mode"]["choicesfr"][1]="Modification directe";
$elem["racoon/config_mode"]["description"]="Configuration mode for racoon IKE daemon.
 Racoon can be configured two ways, either by directly editing
 /etc/racoon/racoon.conf or using the racoon-tool administrative front end.
 racoon-tool is now deprecated and is only available for backward
 compatibility. New installations should always use the \"direct\" method.
";
$elem["racoon/config_mode"]["descriptionde"]="Art der Einrichtung des Racoon-IKE-Diensts.
 Racoon kann auf zwei Arten eingerichtet werden, entweder durch direktes Ändern der Datei /etc/racoon/racoon.conf oder mit Hilfe der Systemverwaltungsoberfläche »Racoon-tool«. Racoon-tool ist veraltet und nur noch wegen der Rückwärtsverträglichkeit dabei. Neuinstallationen sollten immer die Methode »direkt« verwenden.
";
$elem["racoon/config_mode"]["descriptionfr"]="Mode de configuration pour le démon IKE racoon :
 Racoon peut être configuré de deux façons, soit en modifiant directement le fichier /etc/racoon/racoon.conf, soit en utilisant l'outil d'administration racoon-tool. Racoon-tool est désormais obsolète et est seulement disponible pour la rétrocompatibilité. Les nouvelles installations ne doivent utiliser que la méthode « directe ».
";
$elem["racoon/config_mode"]["default"]="direct";
PKG_OptionPageTail2($elem);
?>
