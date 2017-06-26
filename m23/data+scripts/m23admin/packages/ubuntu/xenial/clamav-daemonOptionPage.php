<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamav-daemon");

$elem["clamav-daemon/debconf"]["type"]="boolean";
$elem["clamav-daemon/debconf"]["description"]="Handle the configuration file automatically?
 Some options must be configured for clamav-daemon.
 .
 The ClamAV suite won't work if it isn't configured. If you do not
 configure it automatically, you'll have to configure
 /etc/clamav/clamd.conf manually or run 'dpkg-reconfigure clamav-daemon'
 later. In any case, manual changes in /etc/clamav/clamd.conf will
 be respected.
";
$elem["clamav-daemon/debconf"]["descriptionde"]="Soll die Konfigurationsdatei automatisch verwaltet werden?
 Einige Optionen für clamav-daemon müssen noch konfiguriert werden.
 .
 Die ClamAV-Suite ist nicht betriebsbereit, solange sie nicht eingerichtet ist. Falls Sie sie nicht automatisch konfigurieren lassen, müssen Sie die Datei /etc/clamav/clamd.conf manuell ändern oder später den Befehl »dpkg-reconfigure clamav-daemon« aufrufen. Auf jeden Fall werden aber manuelle Änderungen in der Datei /etc/clamav/clamd.conf beachtet.
";
$elem["clamav-daemon/debconf"]["descriptionfr"]="Faut-il gérer le fichier de configuration automatiquement ?
 Certaines options pour clamav-daemon doivent être configurées.
 .
 La suite ClamAV ne fonctionnera pas si elle n'est pas configurée. Si vous ne la configurez pas automatiquement, vous devrez configurer /etc/clamav/clamd.conf manuellement ou utiliser la commande « dpkg-reconfigure clamav-daemon » plus tard. Dans tous les cas, les modifications manuelles de /etc/clamav/clamd.conf seront préservées.
";
$elem["clamav-daemon/debconf"]["default"]="true";
$elem["clamav-daemon/TcpOrLocal"]["type"]="select";
$elem["clamav-daemon/TcpOrLocal"]["choices"][1]="TCP";
$elem["clamav-daemon/TcpOrLocal"]["description"]="Socket type:
 Please choose the type of socket clamd will be listening on.
 .
 If you choose TCP, clamd can be accessed remotely. If you choose local
 UNIX sockets, clamd can be accessed through a file. Local UNIX sockets
 are recommended for security reasons.
";
$elem["clamav-daemon/TcpOrLocal"]["descriptionde"]="Socket-Typ:
 Bitte wählen Sie den Typ des Sockets, an dem Clamd auf Verbindungen warten soll.
 .
 Falls Sie TCP auswählen, kann von Rechnern aus der Ferne auf Clamd zugegriffen werden. Falls Sie lokale UNIX-Sockets auswählen, kann über eine Datei auf Clamd zugegriffen werden. Aus Sicherheitsgründen werden lokale UNIX-Sockets empfohlen.
";
$elem["clamav-daemon/TcpOrLocal"]["descriptionfr"]="Type de « socket » :
 Veuillez choisir le type de « socket » où clamd sera à l'écoute.
 .
 Si vous choisissez « TCP », clamd pourra être utilisé à distance. Si vous choisissez des « sockets » UNIX locales, clamd peut être utilisé par l'intermédiaire d'un fichier. Ce dernier choix est recommandé pour des raisons de sécurité.
";
$elem["clamav-daemon/TcpOrLocal"]["default"]="UNIX";
$elem["clamav-daemon/LocalSocket"]["type"]="string";
$elem["clamav-daemon/LocalSocket"]["description"]="Local (UNIX) socket clamd will listen on:
";
$elem["clamav-daemon/LocalSocket"]["descriptionde"]="Lokaler (UNIX-)Socket, an dem Clamd auf Verbindungen warten soll:
";
$elem["clamav-daemon/LocalSocket"]["descriptionfr"]="« Socket » où clamd sera à l'écoute :
";
$elem["clamav-daemon/LocalSocket"]["default"]="/var/run/clamav/clamd.ctl";
$elem["clamav-daemon/FixStaleSocket"]["type"]="boolean";
$elem["clamav-daemon/FixStaleSocket"]["description"]="Gracefully handle left-over UNIX socket files?
";
$elem["clamav-daemon/FixStaleSocket"]["descriptionde"]="Großzügiger Umgang mit übrig gebliebenen UNIX-Socket-Dateien?
";
$elem["clamav-daemon/FixStaleSocket"]["descriptionfr"]="Faut-il gérer correctement les fichiers « socket » Unix restés ouverts ?
";
$elem["clamav-daemon/FixStaleSocket"]["default"]="true";
$elem["clamav-daemon/LocalSocketGroup"]["type"]="string";
$elem["clamav-daemon/LocalSocketGroup"]["description"]="Group owner of clamd local (UNIX) socket:
";
$elem["clamav-daemon/LocalSocketGroup"]["descriptionde"]="Benutzergruppe des lokalen Clamd-(UNIX)-Sockets:
";
$elem["clamav-daemon/LocalSocketGroup"]["descriptionfr"]="Groupe propriétaire du fichier « socket » de clamd :
";
$elem["clamav-daemon/LocalSocketGroup"]["default"]="clamav";
$elem["clamav-daemon/LocalSocketMode"]["type"]="string";
$elem["clamav-daemon/LocalSocketMode"]["description"]="Creation mode for clamd local (UNIX) socket:
";
$elem["clamav-daemon/LocalSocketMode"]["descriptionde"]="Erzeugungsmodus für den lokalen Clamd-(UNIX)-Socket:
";
$elem["clamav-daemon/LocalSocketMode"]["descriptionfr"]="Autorisations du fichier « socket » de clamd :
";
$elem["clamav-daemon/LocalSocketMode"]["default"]="666";
$elem["clamav-daemon/TCPSocket"]["type"]="string";
$elem["clamav-daemon/TCPSocket"]["description"]="TCP port clamd will listen on:
";
$elem["clamav-daemon/TCPSocket"]["descriptionde"]="TCP-Port, an dem Clamd Verbindungen erwarten soll:
";
$elem["clamav-daemon/TCPSocket"]["descriptionfr"]="Port TCP où clamd sera à l'écoute :
";
$elem["clamav-daemon/TCPSocket"]["default"]="3310";
$elem["clamav-daemon/TCPAddr"]["type"]="string";
$elem["clamav-daemon/TCPAddr"]["description"]="IP address clamd will listen on:
 Enter \"any\" to listen on every IP address configured. If you want
 to listen on a single address or host name, enter it here.
";
$elem["clamav-daemon/TCPAddr"]["descriptionde"]="IP-Adresse, an der Clamd Verbindungen erwarten soll:
 Geben Sie »any« ein, damit auf allen eingerichteten IP-Adressen auf Anfragen gewartet wird. Falls an genau einer Adresse bzw. einem Rechnernamen auf Anfragen gewartet werden soll, geben Sie diese hier ein.
";
$elem["clamav-daemon/TCPAddr"]["descriptionfr"]="Adresse IP où clamd sera à l'écoute :
 Vous pouvez indiquer « any » (n'importe laquelle) pour que le démon soit à l'écoute sur toutes les adresses IP configurées. Vous pouvez également indiquer une adresse IP unique ou un nom d'hôte.
";
$elem["clamav-daemon/TCPAddr"]["default"]="any";
$elem["clamav-daemon/ScanMail"]["type"]="boolean";
$elem["clamav-daemon/ScanMail"]["description"]="Do you want to enable mail scanning?
 This option enables scanning mail contents for viruses.
 You need this option enabled if you want to use clamav-milter, or if
 you want to enable phishing checks.
";
$elem["clamav-daemon/ScanMail"]["descriptionde"]="Soll E-Mail-Überprüfung aktiviert werden?
 Diese Option ermöglicht, den Inhalt von E-Mails auf Viren zu prüfen. Sie benötigen diese Option, falls Sie Clamav-Milter nutzen oder Phishing-Prüfungen einschalten wollen.
";
$elem["clamav-daemon/ScanMail"]["descriptionfr"]="Faut-il activer la vérification du courriel ?
 Cette option active la recherche de virus dans les courriels par le démon. Elle est nécessaire si vous voulez utiliser clamav-milter ou si vous voulez vous protéger contre les hameçonnages (« phishing »).
";
$elem["clamav-daemon/ScanMail"]["default"]="true";
$elem["clamav-daemon/ScanArchive"]["type"]="boolean";
$elem["clamav-daemon/ScanArchive"]["description"]="Do you want to enable archive scanning?
 If archive scanning is enabled, the daemon will extract archives such as
 bz2, tar.gz, deb and many more, to check their contents for viruses.
 .
 For more information about what archives are supported, see
 /usr/share/doc/clamav-docs/clamdoc.pdf or the manpage clamscan(5).
";
$elem["clamav-daemon/ScanArchive"]["descriptionde"]="Soll die Überprüfung von Archiven aktiviert werden?
 Falls die Archiv-Überprüfung aktiviert ist, wird der Daemon Archive wie bz2, tar.gz, deb und viele andere auspacken, um den Inhalt auf Viren zu überprüfen.
 .
 Mehr Informationen darüber, welche Archive unterstützt werden, finden Sie in der Datei /usr/share/doc/clamav-docs/clamdoc.pdf oder in der Handbuchseite clamscan(5).
";
$elem["clamav-daemon/ScanArchive"]["descriptionfr"]="Souhaitez-vous activer la vérification des archives ?
 Si l'analyse des archives est activée, le démon extraira le contenu des archives bz2, tar.gz, deb ainsi que de nombreux autres formats, puis vérifiera l'absence de virus dans leur contenu.
 .
 Pour plus d'informations sur les formats d'archives gérés, veuillez consulter /usr/share/doc/clamav-docs/clamdoc.pdf ou la page de manuel clamscan(5).
";
$elem["clamav-daemon/ScanArchive"]["default"]="true";
$elem["clamav-daemon/StreamMaxLength"]["type"]="string";
$elem["clamav-daemon/StreamMaxLength"]["description"]="Maximum stream length (unit Mb) allowed:
 You can set a limit on the stream length that can be scanned.
";
$elem["clamav-daemon/StreamMaxLength"]["descriptionde"]="Maximale zugelassene Datenstromlänge (in MB):
 Sie können eine Obergrenze der Datenstromlänge setzen, die überprüft werden darf.
";
$elem["clamav-daemon/StreamMaxLength"]["descriptionfr"]="Longueur maximale (en Mo) autorisée pour les flux :
 Vous pouvez limiter la taille des flux qui seront analysés.
";
$elem["clamav-daemon/StreamMaxLength"]["default"]="25";
$elem["clamav-daemon/MaxDirectoryRecursion"]["type"]="string";
$elem["clamav-daemon/MaxDirectoryRecursion"]["description"]="Maximum directory depth that will be allowed:
 This value must be set if you want to allow the daemon to follow
 directory symlinks.
 .
 Entering '0' will disable this limit.
";
$elem["clamav-daemon/MaxDirectoryRecursion"]["descriptionde"]="Maximale erlaubte Verzeichnistiefe:
 Dieser Wert muss gesetzt werden, falls dem Daemon erlaubt werden soll, symbolischen Verzeichnis-Verweisen zu folgen.
 .
 Die Eingabe von »0« hebt die Begrenzung auf.
";
$elem["clamav-daemon/MaxDirectoryRecursion"]["descriptionfr"]="Profondeur maximale autorisée pour les répertoires :
 Cette valeur doit être indiquée si vous souhaitez autoriser le démon à suivre les liens symboliques de répertoires.
 .
 Une valeur nulle désactivera cette limite.
";
$elem["clamav-daemon/MaxDirectoryRecursion"]["default"]="0";
$elem["clamav-daemon/FollowDirectorySymlinks"]["type"]="boolean";
$elem["clamav-daemon/FollowDirectorySymlinks"]["description"]="Do you want the daemon to follow directory symlinks?
";
$elem["clamav-daemon/FollowDirectorySymlinks"]["descriptionde"]="Soll der Daemon symbolischen Verzeichnis-Verweisen folgen?
";
$elem["clamav-daemon/FollowDirectorySymlinks"]["descriptionfr"]="Faut-il autoriser le démon à suivre les liens symboliques de répertoires ?
";
$elem["clamav-daemon/FollowDirectorySymlinks"]["default"]="false";
$elem["clamav-daemon/FollowFileSymlinks"]["type"]="boolean";
$elem["clamav-daemon/FollowFileSymlinks"]["description"]="Do you want the daemon to follow regular file symlinks?
";
$elem["clamav-daemon/FollowFileSymlinks"]["descriptionde"]="Soll der Daemon normalen symbolischen Datei-Verweisen folgen?
";
$elem["clamav-daemon/FollowFileSymlinks"]["descriptionfr"]="Faut-il autoriser le démon à suivre les liens symboliques de fichiers ?
";
$elem["clamav-daemon/FollowFileSymlinks"]["default"]="false";
$elem["clamav-daemon/ReadTimeout"]["type"]="string";
$elem["clamav-daemon/ReadTimeout"]["description"]="Timeout for stopping the thread-scanner (seconds):
 Entering '0' will disable the timeout.
";
$elem["clamav-daemon/ReadTimeout"]["descriptionde"]="Zeitbeschränkung für den Stopp des Thread-Scanners (in Sekunden):
 Eine Eingabe von »0« hebt die Zeitbeschränkung auf.
";
$elem["clamav-daemon/ReadTimeout"]["descriptionfr"]="Délai d'attente (en secondes) avant l'arrêt de l'analyse avec processus légers :
 Une valeur nulle désactive le délai d'expiration.
";
$elem["clamav-daemon/ReadTimeout"]["default"]="180";
$elem["clamav-daemon/MaxThreads"]["type"]="string";
$elem["clamav-daemon/MaxThreads"]["description"]="Number of threads for the daemon:
";
$elem["clamav-daemon/MaxThreads"]["descriptionde"]="Anzahl der Threads für den Daemon:
";
$elem["clamav-daemon/MaxThreads"]["descriptionfr"]="Nombre de processus légers (« threads ») du démon :
";
$elem["clamav-daemon/MaxThreads"]["default"]="12";
$elem["clamav-daemon/MaxConnectionQueueLength"]["type"]="string";
$elem["clamav-daemon/MaxConnectionQueueLength"]["description"]="Number of pending connections allowed:
";
$elem["clamav-daemon/MaxConnectionQueueLength"]["descriptionde"]="Erlaubte Anzahl der wartenden Verbindungen:
";
$elem["clamav-daemon/MaxConnectionQueueLength"]["descriptionfr"]="Nombre maximal de connexions en attente autorisées :
";
$elem["clamav-daemon/MaxConnectionQueueLength"]["default"]="15";
$elem["clamav-daemon/LogSyslog"]["type"]="boolean";
$elem["clamav-daemon/LogSyslog"]["description"]="Do you want to use the system logger?
 It is possible to log the daemon activity to the system logger. This can be
 done independently of whether you want to log activity to a special file.
";
$elem["clamav-daemon/LogSyslog"]["descriptionde"]="Soll der Protokolldienst des Systems (syslog) genutzt werden?
 Es ist möglich, Meldungen des Daemons an den Protokolldienst des Systems weiterzuleiten. Das ist unabhängig davon, ob Sie Meldungen in eine spezielle Datei schreiben wollen.
";
$elem["clamav-daemon/LogSyslog"]["descriptionfr"]="Souhaitez-vous utiliser la journalisation du système ?
 L'activité du démon peut être envoyée au processus de journalisation du système. Cela peut être indépendant de la journalisation dans un fichier dédié.
";
$elem["clamav-daemon/LogSyslog"]["default"]="false";
$elem["clamav-daemon/LogFile"]["type"]="string";
$elem["clamav-daemon/LogFile"]["description"]="Log file for clamav-daemon (enter none to disable):
";
$elem["clamav-daemon/LogFile"]["descriptionde"]="Protokolldatei für den Clamav-Daemon (zum Deaktivieren »none« eingeben):
";
$elem["clamav-daemon/LogFile"]["descriptionfr"]="Fichier de journalisation de clamav-daemon (« none » pour désactiver) :
";
$elem["clamav-daemon/LogFile"]["default"]="/var/log/clamav/clamav.log";
$elem["clamav-daemon/LogTime"]["type"]="boolean";
$elem["clamav-daemon/LogTime"]["description"]="Do you want to log time information with each message?
";
$elem["clamav-daemon/LogTime"]["descriptionde"]="Sollen mit jeder Meldung auch Zeitangaben protokolliert werden?
";
$elem["clamav-daemon/LogTime"]["descriptionfr"]="Souhaitez-vous indiquer l'heure pour chaque entrée du journal ?
";
$elem["clamav-daemon/LogTime"]["default"]="true";
$elem["clamav-daemon/LogRotate"]["type"]="boolean";
$elem["clamav-daemon/LogRotate"]["description"]="Do you want to enable log rotation?
";
$elem["clamav-daemon/LogRotate"]["descriptionde"]="Soll das Rotieren der Protokolldateien aktiviert werden?
";
$elem["clamav-daemon/LogRotate"]["descriptionfr"]="Souhaitez-vous activer la rotation des journaux ?
";
$elem["clamav-daemon/LogRotate"]["default"]="true";
$elem["clamav-daemon/ScanOnAccess"]["type"]="boolean";
$elem["clamav-daemon/ScanOnAccess"]["description"]="Do you want to enable on-access scanning?
";
$elem["clamav-daemon/ScanOnAccess"]["descriptionde"]="Soll die Bei-Zugriff-Überprüfung aktiviert werden?
";
$elem["clamav-daemon/ScanOnAccess"]["descriptionfr"]="Souhaitez-vous activer la vérification des archives ?
";
$elem["clamav-daemon/ScanOnAccess"]["default"]="false";
$elem["clamav-daemon/OnAccessMaxFileSize"]["type"]="string";
$elem["clamav-daemon/OnAccessMaxFileSize"]["description"]="Maximum file size to scan:
 A value of 0 disables the limit.
";
$elem["clamav-daemon/OnAccessMaxFileSize"]["descriptionde"]="Maximale Dateigröße beim Prüfen:
 Die Eingabe von »0« hebt die Begrenzung auf.
";
$elem["clamav-daemon/OnAccessMaxFileSize"]["descriptionfr"]="Taille maximale des fichiers à analyser :
 Une valeur nulle désactivera cette limite.
";
$elem["clamav-daemon/OnAccessMaxFileSize"]["default"]="5M";
$elem["clamav-daemon/AllowAllMatchScan"]["type"]="boolean";
$elem["clamav-daemon/AllowAllMatchScan"]["description"]="Do you want to permit the use of the ALLMATCHSCAN command?
 If set to no, clamd will reject any ALLMATCHSCAN command as invalid.
";
$elem["clamav-daemon/AllowAllMatchScan"]["descriptionde"]="Soll die Benutzung des Befehls ALLMATCHSCAN erlaubt werden?
 Wenn »Nein« eingestellt wird, wird Clamd alle ALLMATCHSCAN-Befehle als ungültig zurückweisen.
";
$elem["clamav-daemon/AllowAllMatchScan"]["descriptionfr"]="Voulez-vous permettre l'utilisation de la commande ALLMATCHSCAN ?
 Si vous ne choisissez pas cette option, clamd rejettera toute commande ALLMATCHSCAN comme invalide.
";
$elem["clamav-daemon/AllowAllMatchScan"]["default"]="true";
$elem["clamav-daemon/ForceToDisk"]["type"]="boolean";
$elem["clamav-daemon/ForceToDisk"]["description"]="Do you want memory or nested map scans to dump the content to disk?
 If you turn on this option, more data is written to disk and is available
 when the LeaveTemporaryFiles option is enabled.
";
$elem["clamav-daemon/ForceToDisk"]["descriptionde"]="Soll bei Speicher- oder Nested-Map-Überprüfungen der Inhalt auf Platte gespeichert werden?
 Wenn Sie diese Option aktivieren, werden mehr Daten auf Platte geschrieben und verfügbar sein, sofern die LeaveTemporaryFiles-Einstellung aktiviert ist.
";
$elem["clamav-daemon/ForceToDisk"]["descriptionfr"]="Voulez-vous les analyses d’images mémoire ou internes pour copier le contenu sur le disque ?
 Si vous activez cette option, il y aura beaucoup de données écrites sur le disque. L'espace utilisé sera disponible quand l'option LeaveTemporaryFiles sera activée.
";
$elem["clamav-daemon/ForceToDisk"]["default"]="false";
$elem["clamav-daemon/DisableCertCheck"]["type"]="boolean";
$elem["clamav-daemon/DisableCertCheck"]["description"]="Do you want to completely turn off authenticode verification?
 Certain PE files contain an authenticode signature. By default the signature
 chain in the PE file is checked against a database of trusted and
 revoked certificates if the file being scanned is marked as a virus.
 If any certificate in the chain validates against any trusted root, but
 does not match any revoked certificate, the file is marked as whitelisted.
 If the file does match a revoked certificate, the file is marked as virus.
";
$elem["clamav-daemon/DisableCertCheck"]["descriptionde"]="Möchten Sie die komplette »authenticode«-Verifikation ausschalten?
 Gewisse PE-Dateien enthalten eine authenticode-Signatur. Standardmäßig wird die Signatur der PE-Datei gegen eine Datenbank von vertrauenswürdigen bzw. zurückgezogenen Zertifikaten überprüft, sofern die gerade überprüfte Datei als Virus markiert wurde. Diese Datei wird dann auf eine Positivliste gesetzt, sofern das Zertifikat in der Kette gegen irgendein Wurzelzertifikat gültig validiert ist und auch nicht in der Liste der zurückgezogenen Zertifikate enthalten ist. Falls die Datei zu einem zurückgezogenen Zertifikat passt, wird es als Virus eingestuft.
";
$elem["clamav-daemon/DisableCertCheck"]["descriptionfr"]="Voulez-vous désactiver complètement la vérification authenticode ?
 Certains fichiers PE contiennent une signature authenticode. Par défaut, la chaîne de signature du fichier PE est analysée avec une base de données de certificats connus et révoqués si le fichier analysé est marqué comme infecté. Si un des certificats de la chaîne est validé avec une racine de confiance, mais ne correspond pas à un certificat révoqué, le fichier est inscrit sur la liste blanche. Si le fichier correspond à un certificat révoqué, il est marqué comme infecté.
";
$elem["clamav-daemon/DisableCertCheck"]["default"]="false";
$elem["clamav-daemon/ScanSWF"]["type"]="boolean";
$elem["clamav-daemon/ScanSWF"]["description"]="Do you want to enable scanning within SWF files?
 If you turn off this option, the original files will still be scanned, but
 without decoding and additional processing.
";
$elem["clamav-daemon/ScanSWF"]["descriptionde"]="Soll die Überprüfung innerhalb von SWF-Dateien aktiviert werden?
 Falls Sie diese Option ausschalten, werden die Originaldateien dennoch überprüft, jedoch ohne dass sie dekodiert oder weitergehend verarbeitet werden.
";
$elem["clamav-daemon/ScanSWF"]["descriptionfr"]="Voulez-vous activer la recherche dans les fichiers SWF ?
 Si vous désactivez cette option, les fichiers originaux seront toujours analysés, mais sans décodage et traitement supplémentaire.
";
$elem["clamav-daemon/ScanSWF"]["default"]="true";
$elem["clamav-daemon/MaxEmbeddedPE"]["type"]="string";
$elem["clamav-daemon/MaxEmbeddedPE"]["description"]="Maximum size of a file to check for embedded PE:
 Files larger than this value will skip the additional analysis step.
 Note: disabling this limit or setting it too high may result in severe damage
 to the system.
";
$elem["clamav-daemon/MaxEmbeddedPE"]["descriptionde"]="Maximale Dateigröße, um eingebettete PE zu prüfen:
 Bei Dateien, die größer sind als diese Grenze, werden die zusätzlichen Analyseschritte übersprungen. Achtung: Ausschalten dieser Grenze oder das Einstellen eines zu großen Wertes kann zu schwerwiegenden Systemschäden führen.
";
$elem["clamav-daemon/MaxEmbeddedPE"]["descriptionfr"]="Taille maximale d'un fichier à vérifier intégrant un PE :
 Les fichiers plus volumineux que cette valeur vont sauter l'étape d'analyse supplémentaire. Remarque : désactiver cette limite ou la mettre à un niveau trop élevé peut entraîner de graves dommages au système.
";
$elem["clamav-daemon/MaxEmbeddedPE"]["default"]="10M";
$elem["clamav-daemon/MaxHTMLNormalize"]["type"]="string";
$elem["clamav-daemon/MaxHTMLNormalize"]["description"]="Maximum size of a HTML file to normalize:
 HTML files larger than this value will not be normalized or scanned.
 Note: disabling this limit or setting it too high may result in severe damage
 to the system.
";
$elem["clamav-daemon/MaxHTMLNormalize"]["descriptionde"]="Maximale HTML-Dateigröße, die normalisiert wird:
 HTML-Dateien größer als dieser Wert werden nicht normalisiert oder überprüft. Achtung: Ausschalten dieser Grenze oder das Einstellen eines zu großen Wertes kann zu schwerwiegenden Systemschäden führen.
";
$elem["clamav-daemon/MaxHTMLNormalize"]["descriptionfr"]="Taille maximale d'un fichier HTML à normaliser :
 Les fichiers HTML plus volumineux que cette valeur ne seront pas normalisés ou analysés. Remarque : désactiver cette limite ou la mettre à un niveau trop élevé peut entraîner de graves dommages au système.
";
$elem["clamav-daemon/MaxHTMLNormalize"]["default"]="10M";
$elem["clamav-daemon/MaxHTMLNoTags"]["type"]="string";
$elem["clamav-daemon/MaxHTMLNoTags"]["description"]="Maximum size of a normalized HTML file to scan:
 HTML files larger than this value after normalization will not be scanned.
 Note: disabling this limit or setting it too high may result in severe damage
 to the system.
";
$elem["clamav-daemon/MaxHTMLNoTags"]["descriptionde"]="Maximale Größe der zu überprüfenden normalisierten HTML-Datei:
 HTML-Dateien, die nach der Normalisierung größer als dieser Wert sind, werden nicht überprüft. Achtung: Ausschalten dieser Grenze oder das Einstellen eines zu großen Wertes kann zu schwerwiegenden Systemschäden führen.
";
$elem["clamav-daemon/MaxHTMLNoTags"]["descriptionfr"]="Taille maximale d'un fichier HTML normalisé à analyser :
 Les fichiers HTML plus volumineux que cette valeur après normalisation ne seront pas analysés. Remarque : désactiver cette limite ou la mettre à un niveau trop élevé peut entraîner de graves dommages au système.
";
$elem["clamav-daemon/MaxHTMLNoTags"]["default"]="2M";
$elem["clamav-daemon/MaxScriptNormalize"]["type"]="string";
$elem["clamav-daemon/MaxScriptNormalize"]["description"]="Maximum size of a script file to normalize:
 Script content larger than this value will not be normalized or scanned.
 Note: disabling this limit or setting it too high may result in severe damage
 to the system.
";
$elem["clamav-daemon/MaxScriptNormalize"]["descriptionde"]="Maximale Größe einer Skriptdatei, die normalisiert wird:
 Skript-Dateien, die größer als dieser Wert sind, werden nicht normalisiert oder überprüft. Achtung: Ausschalten dieser Grenze oder das Einstellen eines zu großen Wertes kann zu schwerwiegenden Systemschäden führen.
";
$elem["clamav-daemon/MaxScriptNormalize"]["descriptionfr"]="Taille maximale d'un fichier de script à normaliser :
 Le contenu d'un script plus volumineux que cette valeur ne sera pas normalisé ou numérisé. Remarque : désactiver cette limite ou la mettre à un niveau trop élevé peut entraîner de graves dommages au système.
";
$elem["clamav-daemon/MaxScriptNormalize"]["default"]="5M";
$elem["clamav-daemon/MaxZipTypeRcg"]["type"]="string";
$elem["clamav-daemon/MaxZipTypeRcg"]["description"]="Maximum size of a ZIP file to reanalyze type recognition:
 ZIP files larger than this value will skip the step to potentially reanalyze as PE.
 Note: disabling this limit or setting it too high may result in severe damage
 to the system.
";
$elem["clamav-daemon/MaxZipTypeRcg"]["descriptionde"]="Maximale Größe einer ZIP-Datei für die erneute Typerkennungsanalyse:
 ZIP-Dateien, die größer als dieser Wert sind, werden nicht erneut als PE analysiert. Achtung: Ausschalten dieser Grenze oder das Einstellen eines zu großen Wertes kann zu schwerwiegenden Systemschäden führen.
";
$elem["clamav-daemon/MaxZipTypeRcg"]["descriptionfr"]="Taille maximale d'un fichier ZIP pour réanalyser la reconnaissance de type :
 Les fichiers ZIP plus volumineux que cette valeur vont potentiellement ignorer l'étape de réanalyse comme PE. Désactiver cette limite ou la mettre à un niveau trop élevé peut entraîner de graves dommages au système.
";
$elem["clamav-daemon/MaxZipTypeRcg"]["default"]="1M";
$elem["clamav-daemon/SelfCheck"]["type"]="string";
$elem["clamav-daemon/SelfCheck"]["description"]="Delay in seconds between daemon self checks:
 During the SelfCheck the daemon checks if it needs to reload the virus
 database. It also tries to repair problems caused by bugs in the daemon,
 (that is, in some cases it's able to repair broken data structures).
";
$elem["clamav-daemon/SelfCheck"]["descriptionde"]="Zeitspanne in Sekunden zwischen Selbsttests des Daemons:
 Während des Selbsttests prüft der Daemon, ob es nötig ist, die Virus-Datenbank neu einzulesen. Er versucht auch, Probleme zu beheben, die von Fehlern im Daemon erzeugt werden, so können z. B. manchmal defekte Datenstrukturen repariert werden.
";
$elem["clamav-daemon/SelfCheck"]["descriptionfr"]="Délai en secondes entre les auto-vérifications du démon :
 L'auto-vérification du démon lui permet de vérifier s'il est nécessaire de recharger la base de données des virus. Cette opération tente également de contourner des problèmes posés par des bogues du démon : il est ainsi, dans certains cas, possible de réparer des structures de données endommagées.
";
$elem["clamav-daemon/SelfCheck"]["default"]="3600";
$elem["clamav-daemon/User"]["type"]="string";
$elem["clamav-daemon/User"]["description"]="User to run clamav-daemon as:
 It is recommended to run the ClamAV programs as a non-privileged user.
 This will work with most MTAs with a little tweaking, but if you want to
 use clamd for filesystem scans, running as root is probably unavoidable.
 Please see README.Debian in the clamav-base package for details.
";
$elem["clamav-daemon/User"]["descriptionde"]="Benutzername, unter dem der Clamav-Daemon laufen soll:
 Es wird empfohlen, dass die ClamAV-Programme unter nicht privilegierten Benutzerrechten laufen. Das funktioniert mit den meisten MTAs mit minimalen Anpassungen. Aber falls Sie Clamd zur Überprüfung von Dateisystemen verwenden wollen, ist der Betrieb mit Root-Rechten wahrscheinlich unvermeidlich. Einzelheiten entnehmen Sie bitte der Datei README.Debian im Paket clamav-base.
";
$elem["clamav-daemon/User"]["descriptionfr"]="Identifiant qui exécutera le démon :
 Il est conseillé d'exécuter les programmes de ClamAV avec les droits d'un utilisateur non privilégié. Avec la plupart des agents de transport de courriel, cela demandera quelques adaptations pour fonctionner mais si vous utilisez clamd pour l'examen des systèmes de fichiers, il sera probablement inévitable de l'exécuter avec les privilèges du superutilisateur. Veuillez consulter le fichier README.Debian du paquet clamav-base pour plus d'informations.
";
$elem["clamav-daemon/User"]["default"]="clamav";
$elem["clamav-daemon/AddGroups"]["type"]="string";
$elem["clamav-daemon/AddGroups"]["description"]="Groups for clamav-daemon (space-separated):
 Please enter any extra groups for clamd.
 .
 By default, clamd runs as a non-privileged user. If you need clamd to
 be able to access files owned by another user (e.g., in combination with
 an MTA), then you will need to add clamd to the group for that piece of
 software. Please see README.Debian in the clamav-base package for details.
";
$elem["clamav-daemon/AddGroups"]["descriptionde"]="Benutzergruppen für den ClamAV-Daemon (durch Leerzeichen getrennt):
 Bitte geben Sie jede zusätzliche Gruppe für Clamd an.
 .
 In der Voreinstellung läuft Clamd unter nicht privilegierten Benutzerrechten. Falls es bei Ihnen notwendig ist, dass Clamd auf Dateien zugreifen kann, die anderen Benutzern gehören (z. B. in Zusammenarbeit mit einem MTA), dann müssen Sie den Benutzer »clamd« den Gruppen für diese Software hinzufügen. Einzelheiten entnehmen Sie bitte der Datei README.Debian im Paket »clamav-base«.
";
$elem["clamav-daemon/AddGroups"]["descriptionfr"]="Groupes de clamav-daemon (séparés par des espaces) :
 Veuillez indiquer tous les groupes supplémentaires auxquels appartient clamd.
 .
 Clamd se lance par défaut sans privilège particulier. S'il faut que clamd accède aux fichiers d'un autre utilisateur (par exemple en combinaison avec un agent de transport de courriel), vous devez mettre clamd dans un groupe qui peut accéder à ces fichiers. Veuillez consulter le fichier README.Debian du paquet clamav-base pour plus d'informations.
";
$elem["clamav-daemon/AddGroups"]["default"]="";
$elem["clamav-daemon/Bytecode"]["type"]="boolean";
$elem["clamav-daemon/Bytecode"]["description"]="Do you want to load bytecode from the database?
";
$elem["clamav-daemon/Bytecode"]["descriptionde"]="Wollen Sie Bytecode aus der Datenbank laden?
";
$elem["clamav-daemon/Bytecode"]["descriptionfr"]="Faut-il charger le code intermédiaire (« bytecode ») depuis la base de données ?
";
$elem["clamav-daemon/Bytecode"]["default"]="true";
$elem["clamav-daemon/BytecodeSecurity"]["type"]="select";
$elem["clamav-daemon/BytecodeSecurity"]["choices"][1]="TrustSigned";
$elem["clamav-daemon/BytecodeSecurity"]["choicesde"][1]="TrustSigned";
$elem["clamav-daemon/BytecodeSecurity"]["choicesfr"][1]="Validation par signature électronique";
$elem["clamav-daemon/BytecodeSecurity"]["description"]="Security level to apply to the bytecode:
 .
  - TrustSigned : trust bytecode loaded from signed virus database files,
                  but insert runtime safety checks for bytecode loaded
                  from unsigned sources
  - Paranoid    : always insert runtime checks
";
$elem["clamav-daemon/BytecodeSecurity"]["descriptionde"]="Für den Bytecode anzuwendende Sicherheitsstufe:
 .
  - TrustSigned : der aus signierten Virus-Datenbanken geladene Bytecode
                  ist vertrauenswürdig, in Bytecode aus nicht-signierten
                  Quellen werden Laufzeitprüfungen eingefügt
  - Paranoid    : Laufzeitprüfungen werden immer eingefügt
";
$elem["clamav-daemon/BytecodeSecurity"]["descriptionfr"]="Niveau de sécurité à appliquer au code intermédiaire (« bytecode ») :
 .
  - Validation par signature électronique :
                  faire confiance au code intermédiaire chargé depuis des
                  fichiers d'une base de données de virus signée et
                  effectuer des vérifications à l'exécution pour le code
                  intermédiaire chargé depuis des sources non signées ;
  - Paranoïaque : toujours effectuer des vérifications à l'exécution.
";
$elem["clamav-daemon/BytecodeSecurity"]["default"]="TrustSigned";
$elem["clamav-daemon/BytecodeTimeout"]["type"]="string";
$elem["clamav-daemon/BytecodeTimeout"]["description"]="Bytecode execution timeout in milliseconds:
";
$elem["clamav-daemon/BytecodeTimeout"]["descriptionde"]="Timeout für die Ausführung von Bytecode (in Millisekunden):
";
$elem["clamav-daemon/BytecodeTimeout"]["descriptionfr"]="Délai d'attente (« timeout ») pour le code intermédiaire (ms) :
";
$elem["clamav-daemon/BytecodeTimeout"]["default"]="60000";
$elem["clamav-daemon/StatsEnabled"]["type"]="boolean";
$elem["clamav-daemon/StatsEnabled"]["description"]="Do you want to submit statistical information?
";
$elem["clamav-daemon/StatsEnabled"]["descriptionde"]="Sollen statistische Informationen übermittelt werden?
";
$elem["clamav-daemon/StatsEnabled"]["descriptionfr"]="Souhaitez-vous soumettre des informations statistiques ?
";
$elem["clamav-daemon/StatsEnabled"]["default"]="false";
$elem["clamav-daemon/StatsPEDisabled"]["type"]="boolean";
$elem["clamav-daemon/StatsPEDisabled"]["description"]="Do you want to disable submitting files flagged as malware?
 If this is enabled, individual PE sections of files flagged as malware
 will be submitted.
";
$elem["clamav-daemon/StatsPEDisabled"]["descriptionde"]="Wollen Sie die Übermittlung von Dateien deaktivieren, die als Malware gekennzeichnet sind?
 Falls dies aktiviert ist, werden individuelle PE-Abschnitte von Dateien übertragen, die als Malware gekennzeichnet sind.
";
$elem["clamav-daemon/StatsPEDisabled"]["descriptionfr"]="Souhaitez-vous désactiver la soumission de fichiers marqués comme logiciel malveillant ?
 Si cela est activé, les sections PE individuelles des fichiers marqués comme logiciel malveillant seront soumises.
";
$elem["clamav-daemon/StatsPEDisabled"]["default"]="true";
$elem["clamav-daemon/StatsHostID"]["type"]="string";
$elem["clamav-daemon/StatsHostID"]["description"]="HostID, a UUID to use when submitting statistical information:
";
$elem["clamav-daemon/StatsHostID"]["descriptionde"]="HostID, eine UUID, die beim Übermitteln statistischer Informationen verwendet werden soll:
";
$elem["clamav-daemon/StatsHostID"]["descriptionfr"]="HostID, un UUID à utiliser lors de la soumission des informations statistiques :
";
$elem["clamav-daemon/StatsHostID"]["default"]="auto";
$elem["clamav-daemon/StatsTimeout"]["type"]="string";
$elem["clamav-daemon/StatsTimeout"]["description"]="Time in seconds to wait for the stats server to come back with a response:
";
$elem["clamav-daemon/StatsTimeout"]["descriptionde"]="Zeit in Sekunden, die auf die Antwort des Statusservers gewartet werden soll:
";
$elem["clamav-daemon/StatsTimeout"]["descriptionfr"]="Temps d'attente en secondes pour que le serveur de statistiques retourne une réponse :
";
$elem["clamav-daemon/StatsTimeout"]["default"]="10";
PKG_OptionPageTail2($elem);
?>
