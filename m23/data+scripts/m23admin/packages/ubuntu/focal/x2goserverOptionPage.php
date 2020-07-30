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
$elem["x2goserver/postgresql-upgrade-3_1_0_0"]["descriptionde"]="X2Go-Server- / PostgreSQL-Upgrade
 Sie haben den X2Go-Server mit PostgreSQL als Sitzungsdatenbank-Backend konfiguriert und führen ein Upgrade von X2goserver von einer Version kleiner als 3.1.0.0 durch.
 .
 Bitte befolgen Sie die PostgreSQL-Aktualisierungshinweise, bevor sie Ihren X2Go-Server weiter benutzen: /usr/share/doc/x2goserver/README.upgrade-pgsl-database.gz
";
$elem["x2goserver/postgresql-upgrade-3_1_0_0"]["descriptionfr"]="Mise à niveau du serveur X2Go et de PostgreSQL
 Vous avez configuré le serveur X2Go avec PostgreSQL comme moteur de session de base de données et vous mettez à niveau x2goserver depuis une version inférieure à 3.1.0.0.
 .
 Veuillez suivre les instructions suivantes de mise à niveau de la base de données PostgreSQL avant de poursuivre l'utilisation de votre serveur X2Go : /usr/share/doc/x2goserver/README.upgrade-pgsql-database.gz.
";
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
$elem["x2goserver/upgrade-4_1_0_0"]["descriptionde"]="X2Go-Server-Upgrade
 Sie aktualisieren X2Go-Server von einer Version < 4.1.0.0. Zwischen 4.1.0.0 und 4.0.0.x hat die Paketstruktur einige große Änderungen erfahren.
 .
 Beachten Sie, dass der größte Anteil des Perl-Codes in X2Go-Server in die neue Perl-API X2Go::Server verschoben worden ist.
";
$elem["x2goserver/upgrade-4_1_0_0"]["descriptionfr"]="Mise à niveau du serveur X2Go
 Vous effectuez une mise à niveau à partir d'une version du serveur X2Go (< 4.1.0.0). Entre les versions 4.0.0.x et 4.1.0.0, la structure du paquet a subi un changement majeur.
 .
 Veuillez noter que l'essentiel du code en Perl dans le serveur X2Go a migré vers sa propre API Perl X2Go::Server.
";
$elem["x2goserver/upgrade-4_1_0_0"]["default"]="";
PKG_OptionPageTail2($elem);
?>
