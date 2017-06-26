<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jove");

$elem["jove/upgradewarn-1"]["type"]="note";
$elem["jove/upgradewarn-1"]["description"]="Found old version of /etc/jove.rc. Moved it to /etc/jove/jove.rc
";
$elem["jove/upgradewarn-1"]["descriptionde"]="Alte Version von /etc/jove.rc gefunden. Datei wird nach /etc/jove/jove.rc verschoben
";
$elem["jove/upgradewarn-1"]["descriptionfr"]="Ancien fichier /etc/jove.rc renommé en /etc/jove/jove.rc
";
$elem["jove/upgradewarn-1"]["default"]="";
$elem["jove/upgradewarn-2"]["type"]="note";
$elem["jove/upgradewarn-2"]["description"]="Old version of /etc/jove.rc and new version /etc/jove/jove.rc found
 Moving old version to /etc/jove/jove.rc.old
";
$elem["jove/upgradewarn-2"]["descriptionde"]="Alte Version von /etc/jove.rc und neue Version von /etc/jove/jove.rc gefunden
 Die alte Version wird nach /etc/jove/jove.rc.old verschoben
";
$elem["jove/upgradewarn-2"]["descriptionfr"]="Ancien /etc/jove.rc et nouveau /etc/jove/jove.rc trouvés simultanément
 Une ancienne version de /etc/jove.rc et une nouvelle version /etc/jove/jove.rc existaient déjà sur votre système. L'ancienne version est renommée /etc/jove/jove.rc.old
";
$elem["jove/upgradewarn-2"]["default"]="";
PKG_OptionPageTail2($elem);
?>
