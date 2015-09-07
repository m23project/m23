<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("durep");

$elem["durep/httpfileroot"]["type"]="string";
$elem["durep/httpfileroot"]["description"]="HTTP directory for supplementary files:
 If this package shall provide disk usage information through a HTTP
 CGI-service, it needs a public web directory containing additional files like
 style sheet and images. This directory should be visible as '/durep' on the
 web site where the durep.cgi page is located.
 .
 Due to FHS policy these files are not automatically installed to system
 directories. To make them accessible, they can either be copied into a
 location inside the HTTP root directory, or the web server needs to be
 configured accordingly.
 .
 To configure the Apache webserver (for example), the following directive
 creates the needed directory alias:
 .
       Alias /durep /usr/share/durep/www
 .
 To install supplementary files into another root directory please specify its
 path here. The directory must already exist. A typical answer would be
 '/var/www'. The subdirectory '/durep' with files will be created
 automatically, the files will be installed from '/usr/share/durep/www' unless
 they already exist.
";
$elem["durep/httpfileroot"]["descriptionde"]="HTTP-Verzeichnis für Hilfsdateien:
 Sollte das Paket Informationen über Dateisystembelegung über ein HTTP-CGI-Dienst bereitstellen, so wird hier dafür ein öffentliches Verzeichnis mit zusätzlichen Dateien wie CSS und Bilddaten. Dieses Verzeichnis sollte als '/durep' auf der gleichen Webseite die durep.cgi zugänglich sein.
 .
 Aufgrund der FHS-Richtlinien sollten diese Dateien nicht automatisch in die Systemverzeichnisse installiert werden. Um sie zugänglich zu machen, können sie ins HTTP-Hauptverzeichnis kopiert werden, oder der Webserver muss entsprechend konfiguriert werden.
 .
 Um z.B. den Apache-Webserver zu konfigurieren, erzeugt eine Direktive wie folgenden den benötigten Alias:
 .
       Alias /durep /usr/share/durep/www
 .
 Um die Hilfsdateien ins HTTP-Hauptverzeichnis zu kopieren geben Sie dessen Pfad hier an. Dieses Verzeichnis muss bereits existieren. Die typische Antwort ist '/var/www'. Das Unterverzeichnis '/durep' wird automatisch angelegt, die Dateien werden von '/usr/share/durep/www' kopiert, sofern nicht bereits vorhanden.
";
$elem["durep/httpfileroot"]["descriptionfr"]="Répertoire HTTP pour les fichiers supplémentaires :
 Dans le cas où ce paquet doit fournir des informations sur l'utilisation des disques à travers un service CGI HTTP, celui-ci a besoin d'un répertoire web public contenant des fichiers additionnels tels que des feuilles de styles et des images. Ce répertoire doit être visible en tant que « /durep » sur le site web où la page durep.cgi est située.
 .
 En raison des règles sur l'organisation standard des fichiers (FHS), ces fichiers ne sont pas automatiquement installés dans des répertoires systèmes. Pour les rendre accessibles, soit ils doivent être copiés quelque part à l'intérieur du répertoire HTTP racine, soit le serveur web doit être configuré de manière appropriée.
 .
 Pour configurer le serveur web Apache (par exemple), la directive suivante crée l'alias de répertoire nécessaire :
 .
       Alias /durep /usr/share/durep/www
 .
 Pour installer les fichiers supplémentaires à l'intérieur d'un autre répertoire racine, merci d'en indiquer le chemin ici. Ce répertoire doit déjà exister. Une réponse typique pourrait être « /var/www ». Le sous-répertoire « /durep » contenant les fichiers sera automatiquement créé, les fichiers seront installés depuis « /usr/share/durep/www », à moins qu'ils n'existent déjà.
";
$elem["durep/httpfileroot"]["default"]="Default:";
$elem["durep/makereports"]["type"]="boolean";
$elem["durep/makereports"]["description"]="Do you want to enable daily report generation?
 If you wish, a daily script will create disk usage statistics of chosen
 filesystems. They will be kept for seven days.
 .
 WARNING: with the default configuration, the statistics are stored in the
 public httpd directory, /var/www/durep. This may breach the privacy of the
 users.
";
$elem["durep/makereports"]["descriptionde"]="Möchten Sie tägliche Berichte erstellen?
 Auf ihren Wunsch erstellt ein täglich ausgeführter Skript Statistiken der Dateisystem-Belegung und hält diese für sieben Tage gespeichert.
 .
 ACHTUNG: In der Standard-Konfiguration werden die Statistiken im öffentlichen Verzeichnis des HTTP-Servers gespeichert, /var/www/durep.  Dies kann eine Verletzung ihrer Privatsphäre bedeuten, da fremde Benutzer in die Verzeichnisstruktur einsehen können.
";
$elem["durep/makereports"]["descriptionfr"]="Souhaitez-vous des comptes-rendus quotidiens ?
 Si vous le désirez, un script peut créer chaque jour un rapport contenant les statistiques d'utilisation des systèmes de fichiers que vous aurez choisis. Ces rapport seront conservés pendant sept jours.
 .
 Attention, en laissant la configuration par défaut, les statistiques sont conservées dans le répertoire public du démon httpd /var/www/durep. Ceci représente un risque quant au respect de la vie privée des utilisateurs.
";
$elem["durep/makereports"]["default"]="false";
$elem["durep/filesystems"]["type"]="string";
$elem["durep/filesystems"]["description"]="List of filesystems for durep reports:
 To specify single filesystems to report on, enter their mount points
 separated by spaces (eg. \"/data /var\"). A single dot (\".\") means scanning
 of the whole UNIX filesystem tree.
";
$elem["durep/filesystems"]["descriptionde"]="Liste der Dateisysteme für Durep-Statistiken:
 Um bestimmte Dateisysteme zu erfassen, geben Sie diese durch die entsprechenden Einhängepunkte an (als getrennte Wörter, z.B. \"/data /var\"). Ein einzelner Punkt (\".\") steht für das gesamte Unix-Dateisystem.
";
$elem["durep/filesystems"]["descriptionfr"]="Systèmes de fichiers choisis pour les comptes-rendus de Durep :
 Indiquez les systèmes de fichiers pour lesquels vous voulez des comptes-rendus en les séparant par des espaces (par exemple « /data /var »). Si vous entrez seulement un point (« . »), les comptes-rendus concerneront la totalité de l'arborescence.
";
$elem["durep/filesystems"]["default"]=".";
PKG_OptionPageTail2($elem);
?>
