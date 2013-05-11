<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mcelog");

$elem["mcelog/unusable"]["type"]="note";
$elem["mcelog/unusable"]["description"]="mcelog is not usable on this machine
 mcelog is disabled. When setting up mcelog, the mcelog device node was
 not available or not usable; mcelog --debian-test returned the following
 message:
 .
    ${mcelogmsg}
 .
 Please refer to /usr/share/doc/mcelog/README.Debian for instructions;
 once this is done, you can enable mcelog by removing the file
 /etc/mcelog-disabled.
";
$elem["mcelog/unusable"]["descriptionde"]="mcelog kann auf diesem Computer nicht benutzt werden
 mcelog ist deaktiviert. Während der Einrichtung von mcelog war die mcelog-Gerätedatei nicht verfügbar oder nicht benutzbar. mcelog --debian-test gab folgende Nachricht zurück:
 .
    ${mcelogmsg}
 .
 Bitte lesen Sie /usr/share/doc/mcelog/README.Debian für weitere Anweisungen; sobald Sie fertig sind, können Sie mcelog aktivieren, indem Sie die Datei /etc/mcelog-disabled löschen.
";
$elem["mcelog/unusable"]["descriptionfr"]="Mcelog inutilisable sur cette machine
 Mcelog a été désactivé car, lors de sa configuration, le fichier de périphérique qu'il utilise n'était pas disponible ou utilisable. La commande mcelog --debian-test a renvoyé le message suivant :
 .
    ${mcelogmsg}
 .
 Veuillez suivre les instructions disponibles dans le fichier /usr/share/doc/mcelog/README.Debian. Ensuite, vous pourrez activer mcelog en supprimant le fichier /etc/mcelog-disabled.
";
$elem["mcelog/unusable"]["default"]="";
PKG_OptionPageTail2($elem);
?>
