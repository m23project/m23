<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("publicfile-installer");

$elem["publicfile-installer/build"]["type"]="boolean";
$elem["publicfile-installer/build"]["description"]="Download and build publicfile now?
 Please choose whether publicfile should be downloaded and built now.
 If you choose not to do this now, you can perform the actions manually later,
 by running the \"get-publicfile\" command (as an unpriviliged user, not
 as root) and
 following the instructions.
 .
 If you choose to download and build publicfile now, both these actions will be performed
 as root. For security-aware sites, this might be not appropriate.
 .
 Once the software has been built, run the \"install-publicfile\" command
 (as root) to install the package.
";
$elem["publicfile-installer/build"]["descriptionde"]="Publicfile nun herunterladen und bauen?
 Bitte wählen Sie, ob Publicfile nun heruntergeladen und gebaut werden soll. Falls Sie sich dagegen entscheiden, können Sie die Aktionen später manuell durchführen, indem Sie (als nicht privilegierter Benutzer, nicht als Root) den Befehl »get-publicfile« ausführen und den Anweisungen folgen.
 .
 Falls Sie sich entscheiden, Publicfile nun herunterzuladen und zu bauen, werden diese beiden Aktionen als Root ausgeführt. Für sicherheitsbewusste Sites ist dies möglicherweise nicht angebracht.
 .
 Führen Sie den Befehl »install-publicfile« (als Root) aus, sobald die Software gebaut wurde, um das Paket zu installieren.
";
$elem["publicfile-installer/build"]["descriptionfr"]="";
$elem["publicfile-installer/build"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
