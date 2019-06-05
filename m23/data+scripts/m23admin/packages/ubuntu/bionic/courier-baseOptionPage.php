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
$elem["courier-base/certnotice"]["type"]="note";
$elem["courier-base/certnotice"]["description"]="SSL certificate required
 POP and IMAP over SSL requires a valid, signed, X.509 certificate. During
 the installation of courier-pop or courier-imap, a self-signed
 X.509 certificate will be generated if necessary. 
 .
 For production use, the
 X.509 certificate must be signed by a recognized certificate authority, in
 order for mail clients to accept the certificate. The default location
 for this certificate is /etc/courier/pop3d.pem or
 /etc/courier/imapd.pem.
";
$elem["courier-base/certnotice"]["descriptionde"]="SSL-Zertifikat erforderlich
 Für POP und IMAP per SSL ist ein gültiges und signiertes X.509-Zertifikat erforderlich. Während der Installation von courier-pop bzw. courier-imap-ssl wird ein selbst signiertes X.509-Zertifikat erstellt, wenn nicht bereits ein Zertifikat vorhanden ist.
 .
 Für den Produktionsbetrieb muß das X.509-Zertifikat von einer anerkannten Zertifizierungsstelle signiert werden, damit das Zertifikat von Mailprogrammen akzeptiert wird. Das Zertifikat wird standardmäßig in /etc/courier/pop3d.pem bzw. /etc/courier/imapd.pem abgelegt.
";
$elem["courier-base/certnotice"]["descriptionfr"]="Certificat SSL requis
 L'utilisation des protocoles POP et IMAP avec SSL nécessite de posséder un certificat X.509 valide et signé. Lors de l'installation de courier-pop et courier-imap, un certificat X.509 autosigné sera généré si nécessaire.
 .
 Sur un site de production, le certificat X.509 doit être signé par une autorité de certification reconnue afin que les clients de courriel l'acceptent. Les emplacements par défaut de ces certificats sont respectivement /etc/courier/pop3d.pem et /etc/courier/imapd.pem.
";
$elem["courier-base/certnotice"]["default"]="";
$elem["courier-base/courier-user"]["type"]="note";
$elem["courier-base/courier-user"]["description"]="Courier MTA under courier user
 The Courier MTA packaging has been extensively rewritten and major
 changes had been done to the default setup of Courier MTA.
 .
 The default user and group for Courier MTA has been changed to
 courier:courier.  The package tries hard to make all files belong to
 correct user:group and the permissions on those files are correct,
 but if you have a non-default setup, you will have to make sure that:
 .
  + All file owners and file in /etc/courier and /var/lib/courier
    are correctly set.
  + MAILUSER and MAILGROUP settings in /etc/courier/esmtpd is set to
    correct user and group, both has to be set to `courier'.
";
$elem["courier-base/courier-user"]["descriptionde"]="";
$elem["courier-base/courier-user"]["descriptionfr"]="";
$elem["courier-base/courier-user"]["default"]="";
PKG_OptionPageTail2($elem);
?>
