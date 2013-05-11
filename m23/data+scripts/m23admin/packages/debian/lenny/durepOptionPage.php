<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("durep");

$elem["durep/makereports"]["type"]="boolean";
$elem["durep/makereports"]["description"]="Do you want to enable daily report generation?
 If you wish, a daily script will create disk usage statistics of chosen
 filesystems. They will be kept for seven days.
 .
 WARNING: with the default configuration, the statistics are stored in the
 public httpd directory, /var/www/durep. This may breach the privacy of the
 users.
";
$elem["durep/makereports"]["descriptionde"]="Möchten Sie tägliche Berichte erstellen?
 Auf ihren Wunsch erstellt ein täglich ausgeführter Skript Statistiken der Dateisystem-Belegung und hält diese für sieben Tage gespeichert.
 .
 ACHTUNG: In der Standard-Konfiguration werden die Statistiken im öffentlichen Verzeichnis des HTTP-Servers gespeichert, /var/www/durep.  Dies kann eine Verletzung ihrer Privatsphäre bedeuten, da fremde Benutzer in die Verzeichnisstruktur einsehen können.
";
$elem["durep/makereports"]["descriptionfr"]="Souhaitez-vous des comptes-rendus quotidiens ?
 Si vous le désirez, un script peut créer chaque jour un rapport contenant les statistiques d'utilisation des systèmes de fichiers que vous aurez choisis. Ces rapport seront conservés pendant sept jours.
 .
 ATTENTION : en laissant la configuration par défaut, les statistiques sont conservées dans le répertoire public du démon httpd /var/www/durep. Ceci représente un risque quant au respect de la vie privée des utilisateurs.
";
$elem["durep/makereports"]["default"]="false";
$elem["durep/filesystems"]["type"]="string";
$elem["durep/filesystems"]["description"]="List of filesystems for durep reports
 To specify single filesystems to report on, enter their mount points
 separated by spaces (eg. \"/data /var\"). A single dot (\".\") means scanning
 of the whole UNIX filesystem tree.
";
$elem["durep/filesystems"]["descriptionde"]="Liste der Dateisysteme für Durep-Statistiken
 Um bestimmte Dateisysteme zu erfassen, geben Sie diese durch die entsprechenden Einhängepunkte an (als getrennte Wörter, z.B. \"/data /var\"). Ein einzelner Punkt (\".\") steht für das gesamte Unix-Dateisystem.
";
$elem["durep/filesystems"]["descriptionfr"]="Systemes de fichiers choisis pour les comptes-rendus de Durep
 Indiquez les systèmes de fichiers pour lesquels vous voulez des comptes-rendus en les séparant par des espaces (par exemple « /data /var »). Si vous entrez seulement un point (« . »), les comptes-rendus concerneront la totalité de l'arborescence.
";
$elem["durep/filesystems"]["default"]=".";
PKG_OptionPageTail2($elem);
?>
