<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("courier-base");

$elem["courier-base/webadmin-configmode"]["type"]="boolean";
$elem["courier-base/webadmin-configmode"]["description"]="Create directories for web-based administration?
 Courier uses several configuration files in /etc/courier. Some of
 these files can be replaced by a subdirectory whose contents are
 concatenated and treated as a single, consolidated, configuration
 file.
 .
 The web-based administration provided by the courier-webadmin package
 relies on configuration directories instead of configuration files. 
 If you agree, any directories needed for the web-based
 administration tool will be created unless there is already a
 plain file in place.
";
$elem["courier-base/webadmin-configmode"]["descriptionde"]="Verzeichnisse für WWW-Administration anlegen?
 Courier benutzt verschiedene Konfigurationsdateien in /etc/courier. Einige dieser Dateien können durch ein Unterverzeichnis ersetzt werden, dessen Inhalt dann als eine vereinigte Konfigurationsdatei betrachtet wird.
 .
 Die von dem courier-webadmin-Paket zur Verfügung gestellte WWW-Administration ist angewiesen auf Konfigurationsverzeichnisse statt Konfigurationsdateien. Wenn Sie zustimmen, werden alle vom Administrationstool benötigten Verzeichnisse erzeugt, außer es existiert bereits eine gleichnamige Konfigurationsdatei.
";
$elem["courier-base/webadmin-configmode"]["descriptionfr"]="Faut-il créer les répertoires nécessaires à l'administration web ?
 Courier utilise de nombreux fichiers de configuration dans /etc/courier. Certains de ces fichiers peuvent être remplacés par un sous-répertoire contenant des fichiers qui seront concaténés et seront considérés ensemble comme un seul fichier de configuration.
 .
 L'outil d'administration par le web fourni par le paquet courier-webadmin n'utilise pas de fichier pour la configuration, mais des répertoires. Si vous le souhaitez, tous les répertoires nécessaires pour cet outil seront créés, sauf si un fichier est déjà présent.
";
$elem["courier-base/webadmin-configmode"]["default"]="false";
$elem["courier-base/maildir"]["type"]="string";
$elem["courier-base/maildir"]["description"]="Path to Maildir directory:
 Please give the relative path name from each user's home directory to the
 Maildir directory where the Courier servers store and access the
 user's email. Please refer to the maildir.courier(5) manual page if you are
 unfamiliar with the mail storage format used by Courier.
";
$elem["courier-base/maildir"]["descriptionde"]="Pfad zum Maildir-Verzeichnis:
 Bitte geben Sie einen relativen Pfadnamen vom Home-Verzeichnis eines jeden Benutzers zu dem Maildir-Verzeichnis an, in dem die Courier-Server die E-Mail der Benutzer speichern und darauf zugreifen. Bitte lesen Sie die maildir.courier(5)-Handbuchseite (Manpage), wenn Sie mit dem Format zum Speichern von E-Mails, das Courier benutzt, nicht vertraut sind.
";
$elem["courier-base/maildir"]["descriptionfr"]="Chemin des répertoires de courriel (« Maildir ») des utilisateurs :
 Veuillez indiquer un chemin, relatif à leur répertoire personnel, pour le répertoire « Maildir » des utilisateurs, où les serveurs Courier enregistreront les courriels. Veuillez consulter la page de manuel de maildir.courier(5) si vous n'avez pas l'habitude du format de stockage des courriels qu'utilise Courier.
";
$elem["courier-base/maildir"]["default"]="Maildir";
$elem["courier-base/maildirpath"]["type"]="note";
$elem["courier-base/maildirpath"]["description"]="Obsolete setting of MAILDIR
 The name of the Maildir directory is now recognized through the variable
 MAILDIRPATH in Courier configuration files. The MAILDIR setting in
 /etc/default/courier is therefore obsolete and will be not recognized.
";
$elem["courier-base/maildirpath"]["descriptionde"]="Veraltete Einstellung für MAILDIR
 Der Name des Maildir-Verzeichnisses wird jetzt in den Courier-Konfigurationsdateien durch die Variable MAILDIRPATH festgelegt. Die Einstellung für MAILDIR in /etc/default/courier ist daher veraltet und wird nicht nicht beachtet.
";
$elem["courier-base/maildirpath"]["descriptionfr"]="Réglage obsolète de MAILDIR
 Le nom du répertoire Maildir est désormais obtenu via la variable MAILDIRPATH dans les fichiers de configuration de Courier. Le réglage MAILDIR dans /etc/default/courier est donc obsolète et ne sera pas utilisé.
";
$elem["courier-base/maildirpath"]["default"]="";
PKG_OptionPageTail2($elem);
?>
