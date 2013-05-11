<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libapache2-mod-python");

$elem["libapache2-mod-python/enable_module"]["type"]="boolean";
$elem["libapache2-mod-python/enable_module"]["description"]="Enable the Apache 2 mod_python module?
 The mod_python module must be enabled if hosted web sites are using
 its features.
 .
 If you choose this option, a symbolic link for mod_python will be created
 in /etc/apache2/mods_enabled/. If you refuse this option, this link
 will be removed if it exists.
 .
 Apache 2 must be restarted manually after changing this option.
";
$elem["libapache2-mod-python/enable_module"]["descriptionde"]="Mod_python-Modul für Apache 2 aktivieren?
 Das mod_python-Modul muss aktiviert sein, falls gehostete Websites dessen Fähigkeiten nutzen.
 .
 Falls Sie diese Option wählen, wird ein symbolischer Link in /etc/apache2/mods_enabled/ angelegt. Falls Sie diese Option ablehnen, wird der Link entfernt, sofern er existiert.
 .
 Apache 2 muss manuell neu gestartet werden, nachdem diese Option geändert wurde.
";
$elem["libapache2-mod-python/enable_module"]["descriptionfr"]="Faut-il activer le module mod_python pour Apache2 ?
 Le module mod_python devra être activé pour pouvoir utiliser des sites web qui utilisent ses fonctionnalités.
 .
 Si vous choisissez cette option, un lien symbolique sera créé pour mod_python dans /etc/apache2/mods-enabled/. Ce lien sera supprimé dans le cas contraire.
 .
 Apache2 devra être redémarré après la modification de cette option.
";
$elem["libapache2-mod-python/enable_module"]["default"]="";
PKG_OptionPageTail2($elem);
?>
