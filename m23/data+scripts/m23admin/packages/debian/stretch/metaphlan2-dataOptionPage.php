<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("metaphlan2-data");

$elem["metaphlan2-data/createnow"]["type"]="boolean";
$elem["metaphlan2-data/createnow"]["description"]="Should the database be created right now?
 This binary Debian package is using a different dataformat than it
 is used by the package metaphlan2.  To use the data with metaphlan2
 a conversion is needed.  The conversion script takes about 20min.
 If you decide to delay this conversion you need to manually call
 .
    /usr/sbin/metaphlan2-data-convert
 .
 after the installation process has finished.  Otherwise metaphlan2
 is not usable.
";
$elem["metaphlan2-data/createnow"]["descriptionde"]="Soll die Datenbank sofort erzeugt werden?
 Dieses Debianpaket benutzt ein anderes Datenformat als das vom Paketmetaphlan2 benutzt wird.  Damit die Daten von metaphlan2 benutzt werdenkönnen ist eine Konvertierung nötig.  Das Script zur Konvertierungbenötigt etwa 20min.  Falls diese später durchgeführt werden soll, mußmanuell
 .
    /usr/sbin/metaphlan2-data-convert
 .
 aufgerufen werden, nach dem der Installationsprozess beendet ist.  Ansonsten ist metaphlan2 nicht benutzbar.
";
$elem["metaphlan2-data/createnow"]["descriptionfr"]="Faut-il créer la base de données maintenant ?
 Le paquet binaire Debian utilise un format de données différent de celui utilisé par le paquet metaphlan2. Il est par conséquent nécessaire d'opérer une conversion afin d'utiliser les données avec metaphlan2. Le script de conversion dure environ 20 minutes. Si vous décidez de repousser cette conversion, vous devrez exécuter manuellement
 .
 /usr/sbin/metaphlan2-data-convert
 .
 après que le processus d'installation se soit terminé. Autrement, metaphlan2 ne sera pas utilisable.
";
$elem["metaphlan2-data/createnow"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
