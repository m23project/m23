<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("x2goserver");

$elem["x2goserver/postgresql-upgrade-3_1_0_0"]["type"]="text";
$elem["x2goserver/postgresql-upgrade-3_1_0_0"]["description"]="X2Go Server / PostgreSQL Upgrade
 You have configured X2Go Server with PostgreSQL as session DB backend and
 you are upgrading x2goserver from a version minor to 3.1.0.0.
 .
 Please follow these PostgreSQL DB upgrade instructions before you continue
 using your X2Go Server:
 /usr/share/doc/x2goserver/README.upgrade-pgsql-database.gz
";
$elem["x2goserver/postgresql-upgrade-3_1_0_0"]["descriptionde"]="X2Go Server / PostgreSQL Upgrade
 Ihr X2Go Server nutzt eine PostgreSQL Datenbank, um X2Go Sitzungsdaten zu verwalten, und Sie aktualisieren gerade das Paket x2goserver von einer Version kleiner als 3.1.0.0.
 .
 Bitte befolgen Sie daher die PostgreSQL-Aktualisierungshinweise bevor sie mit der Weiternutzung Ihres X2Go Servers fortfahren: /usr/share/doc/x2goserver/README.upgrade-pgsl-database.gz
";
$elem["x2goserver/postgresql-upgrade-3_1_0_0"]["descriptionfr"]="";
$elem["x2goserver/postgresql-upgrade-3_1_0_0"]["default"]="";
$elem["x2goserver/upgrade-4_1_0_0"]["type"]="text";
$elem["x2goserver/upgrade-4_1_0_0"]["description"]="X2Go Server Upgrade
 You are upgrading from an X2Go Server version (< 4.1.0.0). Between
 4.1.0.0 and 4.0.0.x the package structure has undergone a major
 change.
 .
 Note that most of the Perl code in X2Go Server has been moved into
 its own Perl API X2Go::Server.
";
$elem["x2goserver/upgrade-4_1_0_0"]["descriptionde"]="X2Go Server Upgrade
 Sie aktualisieren X2Go Server von einer Version (< 4.1.0.0). Seit 4.0.0.x wurde das Paket einigen strukturellen Änderungen unterzogen.
 .
 Der größte Anteil des Perl Codes in X2Go Server ist migriert worden in die neue Perl API X2Go::Server.
";
$elem["x2goserver/upgrade-4_1_0_0"]["descriptionfr"]="";
$elem["x2goserver/upgrade-4_1_0_0"]["default"]="";
PKG_OptionPageTail2($elem);
?>
