<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("opendmarc");

$elem["opendmarc/dbconfig-install"]["type"]="boolean";
$elem["opendmarc/dbconfig-install"]["description"]="Configure database for OpenDMARC with dbconfig-common?
 To generate aggregate feedback reports a database is needed. This can
 be optionally handled with dbconfig-common.
 .
 If you are an advanced database administrator and know that you want to
 perform this configuration manually, or if your database has already
 been installed and configured, you should refuse this option. Details
 on what needs to be done are provided in
 /usr/share/doc/opendmarc/README.Debian.
 .
 Otherwise, you should probably choose this option.
";
$elem["opendmarc/dbconfig-install"]["descriptionde"]="Soll die Datenbank für OpenDMARC mit dbconfig-common konfiguriert werden?
 Um zusammengestellte Rückmeldungsberichte zu erzeugen, wird eine Datenbank benötigt. Diese kann wahlweise mit dbconfig-common gehandhabt werden.
 .
 Falls Sie ein fortgeschrittener Datenbankadminstrator sind und wissen, was Sie wollen, sollten Sie diese Konfiguration manuell durchführen. Sie können diese Option auch ablehnen, falls Ihre Datenbank bereits installiert und konfiguriert wurde. Einzelheiten, was erledigt werden muss, finden Sie in /usr/share/doc/opendmarc/README.Debian.
 .
 Andernfalls sollten sie wahrscheinlich diese Option auswählen.
";
$elem["opendmarc/dbconfig-install"]["descriptionfr"]="Faut-il configurer une base de données pour OpenDMARC avec dbconfig-common ?
 Une base de données est nécessaire pour créer des rapports d'information globale. Cela peut, de façon facultative, être géré avec dbconfig-common.
 .
 Si vous êtes un administrateur de base de données expérimenté et êtes sûr de vouloir faire la configuration vous-même, ou si la base de données est déjà installée et configurée, vous devriez refuser cette option. Des détails sur ce qu'il est nécessaire de faire sont fournis par le fichier /usr/share/doc/opendmarc/README.Debian.
 .
 Sinon, vous devriez probablement choisir cette option.
";
$elem["opendmarc/dbconfig-install"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
