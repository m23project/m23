<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openvas-plugins-dfsg");

$elem["openvas-plugins-dfsg/remove-var-lib"]["type"]="boolean";
$elem["openvas-plugins-dfsg/remove-var-lib"]["description"]="Do you want to remove /var/lib/openvas/plugins?
 The /var/lib/openvas/plugins directory still exists.
 This might occur if you have used the OpenVAS' openvas-nvt-sync script
 to update and install new plugins in that location or because the
 openvas-server package is still installed and has not been fully purged.
 .
 The package can remove it now or you can select to remove it later on
 manually.
";
$elem["openvas-plugins-dfsg/remove-var-lib"]["descriptionde"]="Möchten Sie /var/lib/openvas/plugins entfernen?
 Das Verzeichnis /usr/lib/openvas/plugins existiert noch. Das liegt wahrscheinlich daran, dass Sie mit dem OpenVAS-Skript »openvas-nvt-sync« Plugins in dieses Verzeichnis installiert bzw. aktualisiert haben oder das Paket Openvas-server noch installiert ist und nicht vollständig entfernt (purge) wurde.
 .
 Sie können es jetzt löschen lassen oder auswählen, es später selbst zu entfernen.
";
$elem["openvas-plugins-dfsg/remove-var-lib"]["descriptionfr"]="Faut-il supprimer /var/lib/openvas/plugins ?
 Le répertoire /usr/lib/openvas/plugins existe toujours. Cela peut se produire si vous avez utilisé le script openvas-nvt-sync d'OpenVAS pour mettre à jour et installer de nouveaux greffons à cet endroit ou parce que le paquet openvas-server est toujours installé et n'a pas été purgé.
 .
 Ce répertoire peut être supprimé maintenant ou bien par vous-même plus tard.
";
$elem["openvas-plugins-dfsg/remove-var-lib"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
