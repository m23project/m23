<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aladin");

$elem["aladin/create-link"]["type"]="boolean";
$elem["aladin/create-link"]["description"]="Should aladin create an aladin symlink?
 Aladin uses /usr/lib/aladin/device as the default port for downloading
 data. If you accept here, /usr/lib/aladin/device will be created as
 a symlink to the port you specify. If you refuse, you will need
 to edit /etc/aladinrc, or create the symlink yourself.
";
$elem["aladin/create-link"]["descriptionde"]="Soll aladin einen symbolischen Verweis aladin anlegen?
 Aladin nutzt /usr/lib/aladin/device als Standardanschluss, um Daten herunter zu laden. Wenn Sie jetzt zustimmen, wird /usr/lib/aladin/device als symbolischer Verweis auf den Anschluss, den Sie angeben, erstellt. Wenn Sie nicht zustimmen, müssen Sie die Datei /etc/aladinrc anpassen , oder den symbolischen Verweis selbst erstellen.
";
$elem["aladin/create-link"]["descriptionfr"]="Faut-il créer un lien symbolique pour aladin ?
 Aladin utilise /usr/lib/aladin/device comme port par défaut pour le téléchargement de données. Si vous acceptez ici, ce fichier sera un lien symbolique vers le port que vous allez indiquer. Si vous refusez, vous devrez modifier /etc/aladinrc ou créer le lien symbolique vous-même.
";
$elem["aladin/create-link"]["default"]="true";
$elem["aladin/port"]["type"]="string";
$elem["aladin/port"]["description"]="To what serial port is your Aladin connected?
 /usr/lib/aladin/device will be created as symlink to this port. Serial
 ports typically have a name of the form ttyXX.
";
$elem["aladin/port"]["descriptionde"]="An welchem seriellen Anschluss ist Ihr Aladin angeschlossen?
 /usr/lib/aladin/device wird als symbolischer Verweis auf diesen Anschluss erstellt. Serielle Anschlüsse werden typischerweise in der Form ttyXX benannt.
";
$elem["aladin/port"]["descriptionfr"]="À quel port série votre Aladin est-il connecté ?
 Un lien symbolique sera créé de ce port vers /usr/lib/aladin/device. Les ports série ont en général un nom de la forme ttyXX.
";
$elem["aladin/port"]["default"]="ttyS0";
PKG_OptionPageTail2($elem);
?>
