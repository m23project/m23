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
 Le nom du répertoire Maildir est désormais obtenu à l’aide de la variable MAILDIRPATH dans les fichiers de configuration de Courier. Le réglage MAILDIR dans /etc/default/courier est donc obsolète et ne sera pas utilisé.
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
 L'utilisation des protocoles POP et IMAP avec SSL nécessite de posséder un certificat X.509 valable et signé. Lors de l'installation de courier-pop et courier-imap, un certificat X.509 autosigné sera généré si nécessaire.
 .
 Sur un site de production, le certificat X.509 doit être signé par une autorité de certification reconnue afin que les clients de courriel l'acceptent. L’emplacement par défaut de ce certificat est /etc/courier/pop3d.pem ou /etc/courier/imapd.pem.
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
$elem["courier-base/courier-user"]["descriptionde"]="Courier-MTA (Mail Transport Agent) unter Benutzer »courier«
 Das Courier-MTA-Paket wurde zu großen Teilen überarbeitet und es wurden grundlegende Änderungen eingepflegt, die die Standardeinrichtung des Courier-MTA betreffen.
 .
 Standardbenutzer und -gruppe für den Courier-MTA wurden in »courier:courier« geändert. Im Paket wird sehr darauf geachtet sicherzustellen, dass alle Dateien der richtigen Benutzer:Gruppe-Kombination gehören und deren Berechtigungen korrekt sind; falls Ihre Courier-Einrichtung jedoch nicht der Standardeinstellung entspricht, müssen Sie folgendes sicherstellen:
 .
  + Die Dateieigentümer und -berechtigungen aller Dateien in /etc/courier
    und /var/lib/courier sind korrekt eingestellt.
  + MAILUSER- und MAILGROUP-Einstellungen in /etc/courier/esmtpd sind korrekt
    eingestellt, Benutzer und Gruppe müssen beide auf »courier« gesetzt sein.
";
$elem["courier-base/courier-user"]["descriptionfr"]="Messagerie utilisateur Courier MTA (Courier Mail Transfer Agent)
 Le paquet Courier MTA a été amplement réécrit et des changements majeurs ont été appliqués dans la configuration par défaut.
 .
 L’utilisateur et le groupe par défaut pour Courrier MTA ont été modifiés en « courier:courier ». Le paquet tente de créer tous les fichiers en conservant les « utilisateur:groupe » corrects et avec les permissions de ces fichiers correctes. Par contre, si vous avez une installation personnalisée, vous devez vous assurer des éléments suivants :
 .
  + le propriétaire des fichiers, et les fichiers présents dans les répertoires /etc/courier et /var/lib/courier sont correctement configurés.
  + les paramètres MAILUSER et MAILGROUP dans le fichier de configuration /etc/courier/esmtpd sont définis avec un utilisateur et un groupe correct, les deux doivent être configurés en « courier ».
";
$elem["courier-base/courier-user"]["default"]="";
$elem["courier-base/unicode-maildir"]["type"]="note";
$elem["courier-base/unicode-maildir"]["description"]="Encoding for Maildirs changed to Unicode
 Since Courier MTA version 1.0, Courier-IMAP 5.0, and SqWebmail 6.0,
 Courier uses UTF-8 to encode folder names in Maildirs.  This will
 require a manual conversion of existing directories
 .
 Updating from pre-unicode versions involves:
  + Renaming the actual maildir folders into unicode names (using UTF8).
  + Updating the $HOME/Maildir/courierimapsubscribed file, which is a
    list of subscribed IMAP folders, if it exists.
  + Updating any maildrop mail filtering recipes, $HOME/.mailfilter,
    if it exists, to reference the unicode maildir folders; or
    updating any custom site mail filtering engine that delivers to
    maildir folders, to reference the correct subdirectory names.
 .
 Please consult the manpage of maildirmake for more details on
 converting pre-unicode format maildirs.
";
$elem["courier-base/unicode-maildir"]["descriptionde"]="Zeichenkodierung für Maildir-Verzeichnisse in Unicode geändert
 Seit Courier-MTA Version 1.0, Courier-IMAP 5.0 und SqWebmail 6.0 verwendet Courier UTF-8 für die Zeichenkodierung von Maildir-Verzeichnisnamen. Dies erfordert eine händische Konvertierung bereits vorhandener Verzeichnisse.
 .
 Diese Konvertierung von Unicode-Versionen vor UTF-8 beinhaltet:
  + die Umbenennung der aktuellen Maildir-Verzeichnisse in Unicode-Namen
    (unter Verwendung von UTF-8);
  + die Aktualisierung der Datei $HOME/Maildir/courierimapsubscribed
    (falls vorhanden), dies ist eine Liste aller abonnierten IMAP-
    Verzeichnisse;
  + die Aktualisierung aller maildrop-Rezepte zur E-Mail-Filterung (in
    $HOME/.mailfilter; falls vorhanden), so dass sie auf die neuen
    Unicode-Verzeichnisnamen verweisen; oder das Aktualisieren aller
    benutzerspezifischen Mail-Filterungs-Programme, die Nachrichten in
    solche Maildir-Verzeichnisse ausliefern, so dass auch diese die neuen
    Unicode-Verzeichnisse verwenden.
 .
 Bitte konsultieren Sie die Handbuchseite von maildirmake bezüglich weiterer Details zur Maildir-Konvertierung.
";
$elem["courier-base/unicode-maildir"]["descriptionfr"]="L'encodage de répertoires des courriels « Maildirs » a été modifié en Unicode
 Depuis la version 1.0 de Courier MTA, la version 5.0 de Courier-IMAP, et la version 6.0 de SqWebmail, Courier utilise l'UTF-8 comme encodage pour le nom des répertoires des courriels « Maildirs ». Cela nécessite une conversion manuelle des répertoires déjà existants.
 .
 La mise à jour depuis une version pré-unicode implique de :
  + renommer les répertoires des courriels existants avec des noms unicode (utilisation d'UTF-8).
  + mettre à jour le fichier $HOME/Maildir/courierimapsubscribed qui est une liste des répertoires IMAP suivis, s'ils existent.
  + mettre à jour chaque filtre de réception « maildrop » dans $HOME/.mailfilter, s'il existe, pour référencer le répertoire « maildir » en unicode ; ou mettre à jour les moteurs de filtres personnalisés qui distribuent dans les répertoires « maildir », pour référencer correctement le nom des sous-répertoires.
 .
 Veuillez consulter la page de manuel de maildirmake pour plus de détails sur la conversion des répertoires de courriels « maildirs » depuis le format pré-unicode.
";
$elem["courier-base/unicode-maildir"]["default"]="";
PKG_OptionPageTail2($elem);
?>
