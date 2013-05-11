<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("clamav-base");

$elem["clamav-base/debconf"]["type"]="boolean";
$elem["clamav-base/debconf"]["description"]="Handle the configuration file automatically?
 Some options must be configured for clamav-base.
 .
 The ClamAV suite won't work if it isn't configured. If you do not
 configure it automatically, you'll have to configure
 /etc/clamav/clamd.conf manually or run 'dpkg-reconfigure clamav-base'
 later. In any case, manual changes in /etc/clamav/clamd.conf will
 be respected.
";
$elem["clamav-base/debconf"]["descriptionde"]="Soll die Konfigurationsdatei automatisch verwaltet werden?
 Einige Optionen für clamav-base müssen noch konfiguriert werden.
 .
 ClamAV ist nicht betriebsbereit, solange es nicht eingerichtet ist. Falls Sie es nicht automatisch konfigurieren lassen, müssen Sie die Datei /etc/clamav/clamd.conf manuell ändern oder später den Befehl »dpkg-reconfigure clamav-base« aufrufen. Auf jeden Fall werden aber manuelle Änderungen in der Datei /etc/clamav/clamd.conf werden beachtet.
";
$elem["clamav-base/debconf"]["descriptionfr"]="Faut-il gérer le fichier de configuration automatiquement ?
 Certaines options de clamav-base doivent être configurées.
 .
 La suite ClamAV ne fonctionnera pas si elle n'est pas configurée. Si vous choisissez de ne pas configurer automatiquement ce paquet, vous devrez modifier le fichier /etc/clamav/clamav.conf vous-même ou utiliser la commande « dpkg-reconfigure clamav-base » plus tard. Dans tous les cas, les modifications manuelles de /etc/clamav/clamav.conf seront préservées.
";
$elem["clamav-base/debconf"]["default"]="true";
$elem["clamav-base/TcpOrLocal"]["type"]="select";
$elem["clamav-base/TcpOrLocal"]["choices"][1]="TCP";
$elem["clamav-base/TcpOrLocal"]["description"]="Socket type:
 Please choose the type of socket clamd will be listening on.
 .
 If you choose TCP, clamd can be accessed remotely. If you choose local
 UNIX sockets, clamd can be accessed through a file. Local UNIX sockets
 are recommended for security reasons.
";
$elem["clamav-base/TcpOrLocal"]["descriptionde"]="Socket-Typ:
 Bitte wählen Sie den Socket-Typ, an dem clamd lauschen soll.
 .
 Falls Sie TCP auswählen, kann von entfernten Rechnern auf clamd zugegriffen werden. Falls Sie lokale UNIX-Sockets auswählen, kann über eine Datei auf clamd zugegriffen werden. Aus Sicherheitsgründen werden lokale UNIX-Sockets empfohlen.
";
$elem["clamav-base/TcpOrLocal"]["descriptionfr"]="Type de « socket » :
 Veuillez choisir le type de « socket » où clamd sera à l'écoute.
 .
 Si vous choisissez « TCP », clamd pourra être utilisé à distance. Si vous choisissez des « sockets » UNIX locales, clamd peut être utilisé par l'intermédiaire d'un fichier. Ce choix est recommandé pour des raisons de sécurité.
";
$elem["clamav-base/TcpOrLocal"]["default"]="UNIX";
$elem["clamav-base/LocalSocket"]["type"]="string";
$elem["clamav-base/LocalSocket"]["description"]="Local (UNIX) socket clamd will listen on:
";
$elem["clamav-base/LocalSocket"]["descriptionde"]="Lokaler (UNIX-)Socket, an dem clamd auf Verbindungen warten soll:
";
$elem["clamav-base/LocalSocket"]["descriptionfr"]="« Socket » locale (UNIX) où clamd sera à l'écoute :
";
$elem["clamav-base/LocalSocket"]["default"]="/var/run/clamav/clamd.ctl";
$elem["clamav-base/FixStaleSocket"]["type"]="boolean";
$elem["clamav-base/FixStaleSocket"]["description"]="Gracefully handle left-over UNIX socket files?
";
$elem["clamav-base/FixStaleSocket"]["descriptionde"]="Großzügiger Umgang mit übrig gebliebenen UNIX-Socket-Dateien?
";
$elem["clamav-base/FixStaleSocket"]["descriptionfr"]="Faut-il gérer correctement les fichiers « socket » Unix restés ouverts ?
";
$elem["clamav-base/FixStaleSocket"]["default"]="true";
$elem["clamav-base/TCPSocket"]["type"]="string";
$elem["clamav-base/TCPSocket"]["description"]="TCP port clamd will listen on:
";
$elem["clamav-base/TCPSocket"]["descriptionde"]="TCP-Port, an dem clamd lauschen soll:
";
$elem["clamav-base/TCPSocket"]["descriptionfr"]="Port TCP où clamd sera à l'écoute :
";
$elem["clamav-base/TCPSocket"]["default"]="3310";
$elem["clamav-base/TCPAddr"]["type"]="string";
$elem["clamav-base/TCPAddr"]["description"]="IP address clamd will listen on:
 Enter \"any\" to listen on every IP address configured. If you want
 to listen on a single address or host name, enter it here.
";
$elem["clamav-base/TCPAddr"]["descriptionde"]="IP-Adresse, an der clamd lauschen soll:
 Geben Sie »any« ein, damit auf allen eingerichteten IP-Adressen auf Anfragen gewartet wird. Falls an genau einer Adresse bzw. einem Rechnernamen auf Anfragen gewartet werden soll, geben Sie diese hier ein.
";
$elem["clamav-base/TCPAddr"]["descriptionfr"]="Adresse IP où clamd sera à l'écoute :
 Vous pouvez indiquer « any » (n'importe laquelle) pour que le démon soit à l'écoute sur toutes les adresses IP configurées. Vous pouvez également indiquer une adresse IP unique ou un nom d'hôte.
";
$elem["clamav-base/TCPAddr"]["default"]="any";
$elem["clamav-base/numinfo"]["type"]="error";
$elem["clamav-base/numinfo"]["description"]="Mandatory numeric value
 This question requires a numeric answer.
";
$elem["clamav-base/numinfo"]["descriptionde"]="Zwingend numerischer Wert
 Diese Frage erwartet eine numerische Antwort.
";
$elem["clamav-base/numinfo"]["descriptionfr"]="Valeur numérique obligatoire
 La valeur de ce réglage doit être numérique.
";
$elem["clamav-base/numinfo"]["default"]="";
$elem["clamav-base/ScanMail"]["type"]="boolean";
$elem["clamav-base/ScanMail"]["description"]="Do you want to enable mail scanning?
 This option enables scanning mail contents for viruses.
 You need this option
 enabled if you want to use clamav-milter. It is recommended that you use
 a separate unpacker to extract any MIME parts of email messages if you want
 to scan email.
";
$elem["clamav-base/ScanMail"]["descriptionde"]="Soll E-Mail-Überprüfung aktiviert werden?
 Diese Auswahl ermöglicht, den Inhalt von E-Mails auf Viren zu prüfen. Sie benötigen diese Option, falls Sie clamav-milter nutzen wollen. Sie sollten einen separaten Entpacker benutzen, um MIME-Teile aus E-Mails heraus zu nehmen, falls Sie E-Mails überprüfen wollen.
";
$elem["clamav-base/ScanMail"]["descriptionfr"]="Faut-il activer la vérification du courriel ?
 Cette option active la recherche de virus dans les courriels par le démon. Cett option n'est utile que si vous utilisez clamav-milter. Vous devriez utiliser un outil supplémentaire pour extraire les parties MIME des courriels si vous souhaitez les examiner.
";
$elem["clamav-base/ScanMail"]["default"]="true";
$elem["clamav-base/ScanArchive"]["type"]="boolean";
$elem["clamav-base/ScanArchive"]["description"]="Do you want to enable archive scanning?
 If archive scanning is enabled, the daemon will extract archives such as
 bz2, tar.gz, deb and many more, to check their contents for viruses.
 .
 For more information about what archives are supported, see
 /usr/share/doc/clamav-docs/clamdoc.pdf or the manpage clamscan(5).
";
$elem["clamav-base/ScanArchive"]["descriptionde"]="Sollen Archive überprüft werden?
 Falls die Archiv-Überprüfung aktiviert ist, wird der Dienst Archive wie bz2, tar.gz, deb und viele andere auspacken, um den Inhalt auf Viren zu überprüfen.
 .
 Mehr Informationen darüber, welche Archive unterstützt werden, finden Sie in der Datei /usr/share/doc/clamav-docs/clamdoc.pdf oder in der Handbuchseite clamscan(5).
";
$elem["clamav-base/ScanArchive"]["descriptionfr"]="Souhaitez-vous activer la vérification des archives ?
 Si l'analyse des archives est activée, le démon extraira le contenu des archives bz2, tar.gz, deb ainsi que de nombreux autres formats, puis vérifiera l'absence de virus dans leur contenu.
 .
 Pour plus d'informations sur les formats d'archives gérés, veuillez consulter /usr/share/doc/clamav-docs/clamdoc.pdf.gz ou la page de manuel clamscan (5).
";
$elem["clamav-base/ScanArchive"]["default"]="true";
$elem["clamav-base/StreamMaxLength"]["type"]="string";
$elem["clamav-base/StreamMaxLength"]["description"]="Maximum stream length (unit Mb) allowed:
 You can set a limit on the stream length that can be scanned.
 .
 Entering '0' will disable this limit.
";
$elem["clamav-base/StreamMaxLength"]["descriptionde"]="Maximale Datenstromlänge (in MByte) zulassen:
 Sie können eine Obergrenze der Datenstromlänge setzen, die überprüft werden kann.
 .
 Der Eingabe von »0« hebt die Begrenzung auf.
";
$elem["clamav-base/StreamMaxLength"]["descriptionfr"]="Longueur maximale (en Mo) autorisée pour les flux :
 Vous pouvez, limiter la taille des flux qui seront analysés.
 .
 Une valeur nulle désactivera cette limite.
";
$elem["clamav-base/StreamMaxLength"]["default"]="0";
$elem["clamav-base/MaxDirectoryRecursion"]["type"]="string";
$elem["clamav-base/MaxDirectoryRecursion"]["description"]="Maximum directory depth that will be allowed:
 This value must be set if you want to allow the daemon to follow
 directory symlinks.
 .
 Entering '0' will disable this limit.
";
$elem["clamav-base/MaxDirectoryRecursion"]["descriptionde"]="Maximale Verzeichnistiefe, die Sie erlauben wollen:
 Dieser Wert muss gesetzt werden, falls dem Dienst erlaubt werden soll, symbolischen Verzeichnis-Verweisen zu folgen.
 .
 Der Eingabe von »0« hebt die Begrenzung auf.
";
$elem["clamav-base/MaxDirectoryRecursion"]["descriptionfr"]="Profondeur maximale autorisée pour les répertoires :
 Cette valeur doit être indiquée si vous souhaitez autoriser le démon à suivre les liens symboliques de répertoires.
 .
 Une valeur nulle désactivera cette limite.
";
$elem["clamav-base/MaxDirectoryRecursion"]["default"]="0";
$elem["clamav-base/FollowDirectorySymlinks"]["type"]="boolean";
$elem["clamav-base/FollowDirectorySymlinks"]["description"]="Do you want the daemon to follow directory symlinks?
";
$elem["clamav-base/FollowDirectorySymlinks"]["descriptionde"]="Soll der Dienst symbolischen Verzeichnis-Verweisen folgen?
";
$elem["clamav-base/FollowDirectorySymlinks"]["descriptionfr"]="Faut-il autoriser le démon à suivre les liens symboliques de répertoires ?
";
$elem["clamav-base/FollowDirectorySymlinks"]["default"]="false";
$elem["clamav-base/FollowFileSymlinks"]["type"]="boolean";
$elem["clamav-base/FollowFileSymlinks"]["description"]="Do you want the daemon to follow regular file symlinks?
";
$elem["clamav-base/FollowFileSymlinks"]["descriptionde"]="Soll der Dienst normalen symbolischen Datei-Verweisen folgen?
";
$elem["clamav-base/FollowFileSymlinks"]["descriptionfr"]="Faut-il autoriser le démon à suivre les liens symboliques de fichiers ?
";
$elem["clamav-base/FollowFileSymlinks"]["default"]="false";
$elem["clamav-base/ReadTimeout"]["type"]="string";
$elem["clamav-base/ReadTimeout"]["description"]="Timeout for stopping the thread-scanner (seconds):
 Entering '0' will disable the timeout.
";
$elem["clamav-base/ReadTimeout"]["descriptionde"]="Zeitbeschränkung für den Stopp des Thread-Scanners (in Sekunden):
 Die Eingabe von »0« hebt die Zeitbeschränkung auf.
";
$elem["clamav-base/ReadTimeout"]["descriptionfr"]="Délai d'attente (en secondes) avant l'arrêt de l'analyse avec processus légers :
 Une valeur nulle désactive le délai d'expiration.
";
$elem["clamav-base/ReadTimeout"]["default"]="180";
$elem["clamav-base/MaxThreads"]["type"]="string";
$elem["clamav-base/MaxThreads"]["description"]="Number of threads for the daemon:
";
$elem["clamav-base/MaxThreads"]["descriptionde"]="Anzahl der Threads für den Dienst:
";
$elem["clamav-base/MaxThreads"]["descriptionfr"]="Nombre de processus légers (« threads ») du démon :
";
$elem["clamav-base/MaxThreads"]["default"]="12";
$elem["clamav-base/MaxConnectionQueueLength"]["type"]="string";
$elem["clamav-base/MaxConnectionQueueLength"]["description"]="Number of pending connections allowed:
";
$elem["clamav-base/MaxConnectionQueueLength"]["descriptionde"]="Anzahl der wartenden Verbindungen:
";
$elem["clamav-base/MaxConnectionQueueLength"]["descriptionfr"]="Nombre maximal de connexions en attente autorisées :
";
$elem["clamav-base/MaxConnectionQueueLength"]["default"]="15";
$elem["clamav-base/LogSyslog"]["type"]="boolean";
$elem["clamav-base/LogSyslog"]["description"]="Do you want to use the system logger?
 It is possible to log the daemon activity to the system logger. This can be
 done independently of whether you want to log activity to a special file.
";
$elem["clamav-base/LogSyslog"]["descriptionde"]="Wollen Sie den Protokolldienst des Systems (syslog) nutzen?
 Es ist möglich, Meldungen des Dienstes an den Protokolldienst des Systems weiterzuleiten. Das ist unabhängig davon, ob Sie Meldungen in eine spezielle Datei schreiben wollen.
";
$elem["clamav-base/LogSyslog"]["descriptionfr"]="Souhaitez-vous utiliser la journalisation du système ?
 L'activité du démon peut être envoyée au processus de journalisation du système. Cela peut être indépendant de la journalisation dans un fichier dédié.
";
$elem["clamav-base/LogSyslog"]["default"]="false";
$elem["clamav-base/LogFile"]["type"]="string";
$elem["clamav-base/LogFile"]["description"]="Log file for clamav-daemon (enter none to disable):
";
$elem["clamav-base/LogFile"]["descriptionde"]="Protokolldatei für den clamav-Dienst (»none« eingeben für keine):
";
$elem["clamav-base/LogFile"]["descriptionfr"]="Fichier de journalisation de clamav-daemon (« none » pour désactiver) :
";
$elem["clamav-base/LogFile"]["default"]="/var/log/clamav/clamav.log";
$elem["clamav-base/LogTime"]["type"]="boolean";
$elem["clamav-base/LogTime"]["description"]="Do you want to log time information with each message?
";
$elem["clamav-base/LogTime"]["descriptionde"]="Sollen mit jeder Meldung auch Zeitangaben mit protokolliert werden?
";
$elem["clamav-base/LogTime"]["descriptionfr"]="Souhaitez-vous indiquer l'heure pour chaque entrée du journal ?
";
$elem["clamav-base/LogTime"]["default"]="true";
$elem["clamav-base/SelfCheck"]["type"]="string";
$elem["clamav-base/SelfCheck"]["description"]="Delay in seconds between daemon self checks:
 During the SelfCheck the daemon checks if it needs to reload the virus
 database. It also tries to repair problems caused by bugs in the daemon,
 (that is, in some cases it's able to repair broken data structures).
";
$elem["clamav-base/SelfCheck"]["descriptionde"]="Zeitspanne in Sekunden zwischen Selbsttests des Dienstes:
 Während des Selbsttests prüft der Dienst, ob es nötig ist, die Virus-Datenbank neu einzulesen. Er versucht auch Probleme zu beheben, die von Fehlern im Daemon erzeugt werden, so können z. B. manchmal defekte Datenstrukturen repariert werden.
";
$elem["clamav-base/SelfCheck"]["descriptionfr"]="Délai en secondes entre les autovérifications du démon :
 L'autovérification du démon lui permet de vérifier s'il est nécessaire de recharger la base de données des virus. Cette opération tente également de contourner des problèmes posés par des bogues du démon : il est ainsi, dans certains cas, possible de réparer des structures de données endommagées.
";
$elem["clamav-base/SelfCheck"]["default"]="3600";
$elem["clamav-base/User"]["type"]="string";
$elem["clamav-base/User"]["description"]="User to run clamav-daemon as:
 It is recommended to run the ClamAV programs as a non-privileged user.
 This will work with most MTAs with a little tweaking, but if you want to
 use clamd for filesystem scans, running as root is probably unavoidable.
 Please see README.Debian in the clamav-base package for details.
";
$elem["clamav-base/User"]["descriptionde"]="Benutzernamen, unter dem der clamav-Dienst laufen soll:
 Es wird empfohlen, dass die ClamAV-Programme als eingeschränkter Benutzer laufen. Das funktioniert mit den meisten MTAs mit minimalen Anpassungen, aber falls Sie clamd nutzen wollen, um Dateisystem zu überprüfen, ist der Betrieb mit root-Rechten wahrscheinlich unvermeidlich. Einzelheiten entnehmen Sie bitte der Datei README.Debian im Paket clamav-base.
";
$elem["clamav-base/User"]["descriptionfr"]="Identifiant qui exécutera le démon :
 Il est conseillé d'exécuter les programmes de ClamAV avec les droits d'un utilisateur non privilégié. Avec la plupart des agents de transport de courriel, cela demandera quelques adaptations pour fonctionner mais si vous utilisez clamd pour l'examen des systèmes de fichiers, il est conseillé de ne pas l'exécuter avec les privilèges du superutilisateur. Veuillez consulter le fichier README.Debian du paquet clamav-base pour plus d'informations.
";
$elem["clamav-base/User"]["default"]="clamav";
$elem["clamav-base/AddGroups"]["type"]="string";
$elem["clamav-base/AddGroups"]["description"]="Groups for clamav-daemon (space-separated):
 Please enter any extra groups for clamd.
 .
 By default, clamd runs as a non-privileged user. If you need clamd to
 be able to access files owned by another user (e.g., in combination with
 an MTA), then you will need to add clamd to the group for that piece of
 software. Please see README.Debian in the clamav-base package for details.
";
$elem["clamav-base/AddGroups"]["descriptionde"]="Gruppen des clamav-Dienstes (durch Leerzeichen getrennt):
 Bitte jede zusätzliche Gruppe für clamd angeben.
 .
 Clamd läuft standardmäßig als nicht privilegierter Benutzer.  Falls es nötig ist, dass clamd auf Dateien zugreifen muss, die anderen Benutzern gehören (z. B. zusammen mit einem MTA), dann müssen Sie clamd den Gruppen für diese Software hinzufügen. Einzelheiten entnehmen Sie bitte der Datei README.Debian im Paket clamav-base.
";
$elem["clamav-base/AddGroups"]["descriptionfr"]="Groupes de clamav-daemon (séparés par des espaces) :
 Veuillez indiquer tous les groupes supplémentaires auxquels appartient clamd.
 .
 Clamd se lance par défaut sans privilège particulier. S'il faut que clamd accède aux fichiers d'un autre utilisateur (par exemple en combinaison avec un agent de transport de courriel), vous devez mettre clamd dans un groupe qui peut accéder à ces fichiers. Veuillez consulter le fichier README.Debian du paquet clamav-base pour plus d'informations.
";
$elem["clamav-base/AddGroups"]["default"]="";
PKG_OptionPageTail2($elem);
?>
