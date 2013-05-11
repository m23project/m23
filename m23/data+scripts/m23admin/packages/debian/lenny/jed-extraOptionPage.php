<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jed-extra");

$elem["jed-extra/rm-site-defaults"]["type"]="boolean";
$elem["jed-extra/rm-site-defaults"]["description"]="Remove old files in /etc/jed-init.d/?
 Former versions of the jed-extra package put configuration files in
 /etc/jed-init.d/, namely 05home-lib.sl, 50jed-extra.sl, and
 55ispell.sl. These files are not used anymore and should be deleted
 from the file system.
 .
 However, some of these files appear to have been manually
 modified. Please confirm whether you want these files to be removed.
";
$elem["jed-extra/rm-site-defaults"]["descriptionde"]="Alte Dateien in /etc/jed-init.d/ entfernen?
 Frühere Versionen des jed-extra-Pakets legten die Konfigurationsdateien 05home-lib.sl, 50jed-extra.sl und 55ispell.sl in /etc/jed-init.d/ ab. Diese Dateien werden nicht mehr verwendet und sollten aus dem Dateisystem gelöscht werden.
 .
 Allerdings scheinen einige Dateien manuell verändert worden zu sein. Bitte bestätigen Sie, ob Sie möchten, dass diese Dateien entfernt werden.
";
$elem["jed-extra/rm-site-defaults"]["descriptionfr"]="Faut-il supprimer les anciens fichiers dans /etc/jed-init.d ?
 Des versions précédentes du paquet de jed-extra plaçaient des fichiers de configuration dans /etc/jed-init.d. Il s'agit des fichiers 05home-lib.sl, 50jed-extra.sl, and 55ispell.sl. Ces fichiers ne sont plus utilisés et devraient être supprimés.
 .
 Cependant, certains de ces fichiers semblent avoir été modifiés manuellement. Veuillez confirmer s'ils doivent être supprimés.
";
$elem["jed-extra/rm-site-defaults"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
