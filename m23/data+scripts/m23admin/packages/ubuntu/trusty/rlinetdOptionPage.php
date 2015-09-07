<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rlinetd");

$elem["rlinetd/convert_from_inetd"]["type"]="boolean";
$elem["rlinetd/convert_from_inetd"]["description"]="Convert inetd's configuration file to rlinetd's?
 Currently, there are no services defined in your rlinetd's configuration
 files. You can import services from /etc/inetd.conf by using inetd2rlinetd
 program.
";
$elem["rlinetd/convert_from_inetd"]["descriptionde"]="Die Inetd-Konfiguration nach rlinetd importieren?
 Im Moment haben Sie in Ihrer rlinet-Konfiguration noch keine Dienste angegeben. Sie können die in der Datei /etc/inetd.conf angegebenen Dienste mit dem Programm inetd2rlinetd importieren.
";
$elem["rlinetd/convert_from_inetd"]["descriptionfr"]="Souhaitez-vous convertir votre fichier de configuration d'inetd vers rlinetd ?
 Actuellement, aucun service n'est défini dans vos fichiers de configuration de rlinetd. Vous pouvez importer ces services depuis /etc/inetd.conf avec le programme inetd2rlinetd.
";
$elem["rlinetd/convert_from_inetd"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
