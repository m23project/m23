<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jove");

$elem["jove/upgradewarn-1"]["type"]="note";
$elem["jove/upgradewarn-1"]["description"]="Found old version of /etc/jove.rc. Moved it to /etc/jove/jove.rc
";
$elem["jove/upgradewarn-1"]["descriptionde"]="Alte Version von /etc/jove.rc gefunden. Datei wird nach /etc/jove/jove.rc verschoben.
";
$elem["jove/upgradewarn-1"]["descriptionfr"]="Un ancien fichier /etc/jove.rc a été trouvé et renommé en /etc/jove/jove.rc
";
$elem["jove/upgradewarn-1"]["default"]="";
$elem["jove/upgradewarn-2"]["type"]="note";
$elem["jove/upgradewarn-2"]["description"]="Old version of /etc/jove.rc and new version /etc/jove/jove.rc found
 Moving old version to /etc/jove/jove.rc.old
";
$elem["jove/upgradewarn-2"]["descriptionde"]="Alte Version von /etc/jove.rc und neue Version von /etc/jove/jove.rc gefunden.
 Die alte Version wird nach /etc/jove/jove.rc.old verschoben.
";
$elem["jove/upgradewarn-2"]["descriptionfr"]="Un ancien /etc/jove.rc et un nouveau /etc/jove/jove.rc ont été trouvés simultanément
 L'ancienne version est renommée /etc/jove/jove.rc.old
";
$elem["jove/upgradewarn-2"]["default"]="";
$elem["jove/removeinitd"]["type"]="note";
$elem["jove/removeinitd"]["description"]="Removed obsolete /etc/init.d/jove script
 Check NEWS.Debian for more information
";
$elem["jove/removeinitd"]["descriptionde"]="Es wurde das veraltete Skript /etc/init.d/jove entfernt.
 Bitte lesen Sie NEWS.Debian fÃŒr weitere Informationen.
";
$elem["jove/removeinitd"]["descriptionfr"]="Une version obsolète du script /etc/init.d/jove a été supprimée
 Consultez NEWS.Debian pour plus d'informations
";
$elem["jove/removeinitd"]["default"]="";
$elem["jove/preservefiles"]["type"]="note";
$elem["jove/preservefiles"]["description"]="Found old files in /var/lib/jove/preserve/
 You can recover those by running jove -r
 Check NEWS.Debian for more information.
";
$elem["jove/preservefiles"]["descriptionde"]="Es wurden alte Dateien in /var/lib/jove/preserve/ gefunden.
 Sie kÃ¶nnen diese mittels Â»jove -rÂ« wiederherstellen. Bitte lesen Sie NEWS.Debian fÃŒr weitere Informationen.
";
$elem["jove/preservefiles"]["descriptionfr"]="Des anciens fichiers ont été découverts dans /var/lib/jove/preserve/
 Il est possible de les récupérer en exécutant jove -r. Consultez NEWS.Debian pour plus d'informations
";
$elem["jove/preservefiles"]["default"]="";
PKG_OptionPageTail2($elem);
?>
