<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("webalizer");

$elem["webalizer/upgrading"]["type"]="note";
$elem["webalizer/upgrading"]["description"]="Upgrading from a version < 2.01.6
 WARNING: If you're upgrading from a version < 2.01.6, see
 /usr/share/doc/webalizer/README.FIRST.gz for details on upgrading your old
 data!!
";
$elem["webalizer/upgrading"]["descriptionde"]="Aktualisierung einer Version < 2.01.6
 ACHTUNG: Wenn Sie eine Version < 2.01.6 aktualisieren, sehen Sie sich die Datei /usr/share/doc/webalizer/README.FIRST.gz für Einzelheiten der Aktualisierung Ihrer alten Daten an!!
";
$elem["webalizer/upgrading"]["descriptionfr"]="Mise à niveau depuis une version inférieure à 2.01.6
 ATTENTION : si vous mettez à niveau le programme depuis une version inférieure à 2.01.6, veuillez consulter /usr/share/doc/webalizer/README.FIRST.gz pour obtenir des informations sur la méthode de mise à niveau de vos anciennes données.
";
$elem["webalizer/upgrading"]["default"]="";
$elem["webalizer/upgrade2011030"]["type"]="note";
$elem["webalizer/upgrade2011030"]["description"]="Upgrading from a version < 2.01.10-30
 WARNING: This release will move webalizer.conf file to /etc/webalizer 
 directory.  New features have been included, too. Please read README.FIRST.gz,
 README.gz and new examples/sample.conf.gz in /usr/share/doc/webalizer directory.
";
$elem["webalizer/upgrade2011030"]["descriptionde"]="Aktualisierung einer Version < 2.01.10-30
 ACHTUNG: Diese Aktualisierung wird die Datei webalizer.conf in das Verzeichnis /etc/webalizer verschieben. Es wurden auch neue Funktionen hinzugefügt. Bitte lesen Sie die Dateien README.FIRST.gz, README.gz und die neue examples/sample.conf.gz im Verzeichnis /usr/share/doc/webalizer.
";
$elem["webalizer/upgrade2011030"]["descriptionfr"]="Mise à niveau depuis une version inférieure à 2.01.10-30
 ATTENTION : cette version déplace le fichier webalizer.conf vers le répertoire /etc/webalizer. De nouvelles fonctionnalités apparaissent également. Veuillez lire les fichiers README.FIRST.gz, README.gz et le nouveau fichier examples/sample.conf.gz situés dans le répertoire /usr/share/doc/webalizer.
";
$elem["webalizer/upgrade2011030"]["default"]="";
$elem["webalizer/directory"]["type"]="string";
$elem["webalizer/directory"]["description"]="Directory to put the output in:
";
$elem["webalizer/directory"]["descriptionde"]="Verzeichnis, in dem die Ausgaben abgelegt werden:
";
$elem["webalizer/directory"]["descriptionfr"]="Répertoire où sera stockée la sortie de webalizer :
";
$elem["webalizer/directory"]["default"]="/var/www/webalizer";
$elem["webalizer/doc_title"]["type"]="string";
$elem["webalizer/doc_title"]["description"]="Title of the reports webalizer will generate:
 (your system's hostname will be appended to it)
";
$elem["webalizer/doc_title"]["descriptionde"]="Titel der Berichte, die Webalizer erstellen wird:
 (Ihr Rechnername wird daran angehängt.)
";
$elem["webalizer/doc_title"]["descriptionfr"]="Titre des rapports créés par webalizer :
 Le nom de votre machine sera ajouté à ce titre.
";
$elem["webalizer/doc_title"]["default"]="Usage Statistics for";
$elem["webalizer/logfile"]["type"]="string";
$elem["webalizer/logfile"]["description"]="Webserver's rotated log filename:
";
$elem["webalizer/logfile"]["descriptionde"]="Dateiname der rotierten Protokolldateien des Webservers:
";
$elem["webalizer/logfile"]["descriptionfr"]="Nom du journal du serveur web après rotation :
";
$elem["webalizer/logfile"]["default"]="/var/log/apache/access.log.1";
$elem["webalizer/dnscache"]["type"]="boolean";
$elem["webalizer/dnscache"]["description"]="Enable DNSCache Option?
 Speed up name resolving with the DNSCache option enabled. See
 /usr/share/doc/webalizer/DNS.README.gz for more information.
";
$elem["webalizer/dnscache"]["descriptionde"]="DNSCache-Option aktivieren?
 Die Namensauflösung wird durch Aktivieren der DNSCache-Option beschleunigt. Mehr Informationen finden Sie in der Datei /usr/share/doc/webalizer/DNS.README.gz.
";
$elem["webalizer/dnscache"]["descriptionfr"]="Faut-il activer l'option DNSCache ?
 Choisir l'option DNSCache accélère la résolution de noms. Veuillez lire le fichier /usr/share/doc/webalizer/DNS.README.gz pour plus d'informations.
";
$elem["webalizer/dnscache"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
