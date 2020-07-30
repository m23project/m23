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
$elem["webalizer/upgrading"]["descriptionde"]="Upgrade einer Version < 2.01.6
 ACHTUNG: Sollte noch eine Programmversion vor 2.01.6 installiert sein, entnehmen Sie bitte der Datei /usr/share/doc/webalizer/README.FIRST.gz, wie mit den alten Daten verfahren wird.
";
$elem["webalizer/upgrading"]["descriptionfr"]="Mise à niveau depuis une version inférieure à 2.01.6
 ATTENTION : si vous mettez à niveau le programme depuis une version inférieure à 2.01.6, veuillez consulter /usr/share/doc/webalizer/README.FIRST.gz pour obtenir des informations sur la méthode de mise à niveau de vos anciennes données.
";
$elem["webalizer/upgrading"]["default"]="";
$elem["webalizer/upgrade2011030"]["type"]="note";
$elem["webalizer/upgrade2011030"]["description"]="Upgrading from a version < 2.01.10-30
 WARNING: This release will move webalizer.conf file to /etc/webalizer 
 directory.  New features have been included, too. Please read README.FIRST.gz,
 README.gz and new examples/sample.conf.gz in /usr/share/doc/webalizer directory.
";
$elem["webalizer/upgrade2011030"]["descriptionde"]="Upgrade einer Version < 2.01.10-30
 ACHTUNG: Ab dieser Version finden Sie die Datei webalizer.conf im Verzeichnis /etc/webalizer. Es wurden auch neue Funktionen hinzugefügt. Bitte lesen Sie die Dateien README.FIRST.gz, README.gz und die neue examples/sample.conf.gz im Verzeichnis /usr/share/doc/webalizer.
";
$elem["webalizer/upgrade2011030"]["descriptionfr"]="Mise à niveau depuis une version inférieure à 2.01.10-30
 ATTENTION : cette version déplace le fichier webalizer.conf vers le répertoire /etc/webalizer. De nouvelles fonctionnalités apparaissent également. Veuillez lire les fichiers README.FIRST.gz, README.gz et le nouveau fichier examples/sample.conf.gz, situés dans le répertoire /usr/share/doc/webalizer.
";
$elem["webalizer/upgrade2011030"]["default"]="";
$elem["webalizer/directory"]["type"]="string";
$elem["webalizer/directory"]["description"]="Directory to put the output in:
";
$elem["webalizer/directory"]["descriptionde"]="Verzeichnis, in dem die Ausgaben abgelegt werden:
";
$elem["webalizer/directory"]["descriptionfr"]="Veuillez indiquer le répertoire où sera stockée la sortie de webalizer :
";
$elem["webalizer/directory"]["default"]="/var/www/webalizer";
$elem["webalizer/create_conf"]["type"]="boolean";
$elem["webalizer/create_conf"]["description"]="Generate a default configuration file ?
 Note that webalizer always parses the default configuration, so if you plan
 on using more than one configuration or using the -c parameter, you probably
 want to say No here.
";
$elem["webalizer/create_conf"]["descriptionde"]="Eine Standard-Konfigurationsdatei erzeugen?
 Beachten Sie, dass webalizer immer die Standardkonfiguration auswertet. Wenn Sie also mit mehr als einer Konfiguration arbeiten oder den Parameter -c verwenden wollen, werden Sie hier wohl mit »Nein« antworten.
";
$elem["webalizer/create_conf"]["descriptionfr"]="Voulez-vous générer un fichier de configuration par défaut ?
 Notez que webalizer va toujours analyser le fichier de configuration par défaut, donc si vous prévoyez d'utiliser plus d'un fichier de configuration ou d'utiliser le paramètre -c, vous voulez probablement répondre « Non » à cette question.
";
$elem["webalizer/create_conf"]["default"]="true";
$elem["webalizer/doc_title"]["type"]="string";
$elem["webalizer/doc_title"]["description"]="Title of the reports webalizer will generate:
 (your system's hostname will be appended to it)
";
$elem["webalizer/doc_title"]["descriptionde"]="Titel der Berichte, die webalizer erstellen wird:
 (Ihr Rechnername wird daran angehängt.)
";
$elem["webalizer/doc_title"]["descriptionfr"]="Veuillez indiquer le titre des rapports créés par webalizer :
 (Le nom d'hôte de votre machine sera ajouté à ce titre à la place de [ NomDeMachine ])
";
$elem["webalizer/doc_title"]["default"]="Usage Statistics for";
$elem["webalizer/logfile"]["type"]="string";
$elem["webalizer/logfile"]["description"]="Webserver's rotated log filename:
";
$elem["webalizer/logfile"]["descriptionde"]="Dateiname der rotierten Protokolldateien des Webservers:
";
$elem["webalizer/logfile"]["descriptionfr"]="Veuillez indiquer le nom du journal du serveur web après rotation :
";
$elem["webalizer/logfile"]["default"]="/var/log/apache/access.log.1";
$elem["webalizer/dnscache"]["type"]="boolean";
$elem["webalizer/dnscache"]["description"]="Enable DNSCache Option?
 Speed up name resolving with the DNSCache option enabled. See
 /usr/share/doc/webalizer/DNS.README.gz for more information.
";
$elem["webalizer/dnscache"]["descriptionde"]="DNSCache-Option aktivieren?
 Die Namensauflösung wird durch die aktive DNSCache-Option beschleunigt. Mehr Informationen finden Sie in der Datei /usr/share/doc/webalizer/DNS.README.gz.
";
$elem["webalizer/dnscache"]["descriptionfr"]="Voulez-vous activer l'option DNSCache ?
 Choisir l'option DNSCache accélère la résolution de noms. Veuillez lire le fichier /usr/share/doc/webalizer/DNS.README.gz pour plus d'informations.
";
$elem["webalizer/dnscache"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
