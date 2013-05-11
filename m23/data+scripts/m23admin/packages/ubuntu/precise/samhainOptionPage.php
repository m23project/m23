<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("samhain");

$elem["samhain/init-log"]["type"]="note";
$elem["samhain/init-log"]["description"]="Samhain initialization
 The database used for Samhain will be initialized now. Any errors/messages
 regarding this initialization can be recovered from
 /var/log/samhain/samhain-init.log
";
$elem["samhain/init-log"]["descriptionde"]="Initialisierung von Samhain
 Die Datenbank für Samhain wird jetzt initialisiert. Fehlermeldungen und Hinweise dazu können Sie in der Datei /var/log/samhain/samhain-init.log nachlesen.
";
$elem["samhain/init-log"]["descriptionfr"]="Initialisation de Samhain
 La base de données utilisée pour Samhain va maintenant être initialisée. Les messages et les erreurs relatifs à cette initialisation seront consignés dans /var/log/samhain/samhain-init.log.
";
$elem["samhain/init-log"]["default"]="";
PKG_OptionPageTail2($elem);
?>
