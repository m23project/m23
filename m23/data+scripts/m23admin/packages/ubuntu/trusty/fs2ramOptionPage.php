<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fs2ram");

$elem["fs2ram/main_install_type"]["type"]="select";
$elem["fs2ram/main_install_type"]["choices"][1]="Content-preserving";
$elem["fs2ram/main_install_type"]["choices"][2]="Structure-preserving";
$elem["fs2ram/main_install_type"]["choicesde"][1]="Inhalt erhalten";
$elem["fs2ram/main_install_type"]["choicesde"][2]="Struktur erhalten";
$elem["fs2ram/main_install_type"]["choicesfr"][1]="Préservation du contenu";
$elem["fs2ram/main_install_type"]["choicesfr"][2]="Préservation de la structure";
$elem["fs2ram/main_install_type"]["description"]="Configuration for fs2ram:
 Please select the fs2ram configuration that best meets your needs.
 .
  * Content-preserving: /var/tmp, /var/cache, and /var/log will be in 
    RAM, reducing writes to the hard drive, and fs2ram will preserve the
    contents of these file systems across reboots.
  * Structure-preserving: /var/tmp, /var/cache, and /var/log will be in
    RAM, but fs2ram will only preserve their directory structures across
    reboots, not their (potentially private) contents.
  * Unconfigured: the fs2ram configuration file will be left empty and
    must be filled manually.
";
$elem["fs2ram/main_install_type"]["descriptionde"]="Konfiguration für fs2ram:
 Bitte wählen Sie diejenige Konfiguration für fs2ram, die am besten Ihren Bedürfnissen entspricht.
 .
  * Inhalt erhalten: /var/tmp, /var/cache und /var/log werden im RAM
    gehalten, was Schreibzugriffe auf die Festplatte verringert, und
    fs2ram bewahrt die Inhalte dieser Dateisysteme über Neustarts hinweg.
  * Struktur erhalten: /var/tmp, /var/cache und /var/log werden im RAM
    gehalten, aber fs2ram bewahrt nur ihre Verzeichnisstrukturen zwischen
    Neustarts, nicht deren (möglicherweise privaten) Inhalte.
  * Nicht konfigurieren: die Konfigurationsdatei für fs2ram wird leer
    belassen und muss von Hand ausgefüllt werden.
";
$elem["fs2ram/main_install_type"]["descriptionfr"]="
 Veuillez choisir la configuration fs2ram la plus adaptée à vos besoins.
 .
  - Préservation du contenu : /var/tmp, /var/cache, et /var/log seront chargés
    en mémoire vive (RAM), ce qui réduira les écritures sur le disque dur, et
    fs2ram rendra persistant le contenu de ces fichiers après redémarrage.
  - Préservation de la structure : /var/tmp, /var/cache, et /var/log seront
    chargés en mémoire vive (RAM), mais fs2ram ne conservera que la structure
    des répertoires après le redémarrage de la machine, mais pas leur contenu
    (qui peut être confidentiel).
  - Non configuré : le fichier de configuration de fs2ram restera vide et
    devra être complété manuellement.
";
$elem["fs2ram/main_install_type"]["default"]="Content-preserving";
PKG_OptionPageTail2($elem);
?>
