<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("webfs");

$elem["webfsd/web_ip"]["type"]="string";
$elem["webfsd/web_ip"]["description"]="IP address webfsd should listen to:
 On a system with multiple IP addresses, webfsd can be configured to
 listen to only one of them.
 .
 If you leave this empty, webfsd will listen to all IP addresses.
";
$elem["webfsd/web_ip"]["descriptionde"]="IP-Adresse, an der Webfsd auf Anfragen wartet:
 Auf einem System mit mehreren IP-Adressen kann Webfsd so konfiguriert werden, dass er nur eine von ihnen abhört.
 .
 Wenn Sie hier nichts eintragen, wird an allen IP-Adressen auf Anfragen gewartet.
";
$elem["webfsd/web_ip"]["descriptionfr"]="
 Sur les systèmes qui utilisent plusieurs adresses IP, webfsd peut être configuré pour n'écouter qu'une seule d'entre elles.
 .
 Si vous laissez ce champ vide, webfsd sera à l'écoute sur toutes les adresses IP.
";
$elem["webfsd/web_ip"]["default"]="";
$elem["webfsd/web_timeout"]["type"]="string";
$elem["webfsd/web_timeout"]["description"]="Timeout for network connections:
";
$elem["webfsd/web_timeout"]["descriptionde"]="Zeitbeschränkung (engl. »Timeout«) für Netzwerkverbindungen:
";
$elem["webfsd/web_timeout"]["descriptionfr"]="Délai maximal d'attente pour les connexions réseau :
";
$elem["webfsd/web_timeout"]["default"]="";
$elem["webfsd/pending"]["type"]="string";
$elem["webfsd/pending"]["description"]="for internal use only

";
$elem["webfsd/pending"]["descriptionde"]="";
$elem["webfsd/pending"]["descriptionfr"]="";
$elem["webfsd/pending"]["default"]="no";
$elem["webfsd/web_conn"]["type"]="string";
$elem["webfsd/web_conn"]["description"]="Number of parallel network connections:
 For small private networks, the default number of parallel network
 connections should be fine. This can be increased for larger networks.
";
$elem["webfsd/web_conn"]["descriptionde"]="Anzahl paralleler Netzwerkverbindungen:
 Für kleine, private Netze sollte der Standardwert für parallele Verbindungen eine gute Wahl sein. Die Anzahl der Verbindungen kann für größere Netze heraufgesetzt werden.
";
$elem["webfsd/web_conn"]["descriptionfr"]="Nombre de connexions réseaux en parallèle :
 Pour des réseaux privés simples, la valeur par défaut du nombre de connexions réseau en parallèle devrait être adaptée. Cette valeur peut être augmentée pour des réseaux de taille plus importante.
";
$elem["webfsd/web_conn"]["default"]="";
$elem["webfsd/web_dircache"]["type"]="string";
$elem["webfsd/web_dircache"]["description"]="Directory cache size:
 Directory listings can be cached by webfsd. By default, the size of
 the cache is limited to 128 entries. If the web server has
 very big directory trees, you might want to raise this value.
";
$elem["webfsd/web_dircache"]["descriptionde"]="Größe des Zwischenspeichers (Cache) für Verzeichnisinhalte:
 Webfsd kann erstellte Auflistungen von Verzeichnisinhalten zwischenspeichern. Standardmäßig ist dieser Zwischenspeicher auf 128 Einträge begrenzt. Wenn Sie einen sehr großen Verzeichnisbaum haben, dann sollten Sie diesen Wert erhöhen.
";
$elem["webfsd/web_dircache"]["descriptionfr"]="Taille du répertoire de cache :
 Les dernières énumérations de répertoires peuvent être mises en cache par webfsd. Par défaut, la taille de ce cache est limitée à 128 éléments. Si l'arborescence du serveur web est de grande taille, vous devriez augmenter cette valeur.
";
$elem["webfsd/web_dircache"]["default"]="";
$elem["webfsd/web_port"]["type"]="string";
$elem["webfsd/web_port"]["description"]="Incoming port number for webfsd:
 Please enter the port number for webfsd to listen to. If you leave
 this blank, the default port (8000) will be used.
";
$elem["webfsd/web_port"]["descriptionde"]="Port-Nummer für eingehende Verbindungen:
 Geben Sie bitte den Port ein, an dem Webfsd auf Anfragen warten soll. Wenn Sie hier nichts eintragen, wird der Standard-Port (8000) verwendet.
";
$elem["webfsd/web_port"]["descriptionfr"]="Port d'entrée utilisé par webfsd :
 Veuillez indiquer le numéro du port sur lequel webfsd sera à l'écoute. Si ce champ est laissé vide, le port par défaut (8000) sera utilisé.
";
$elem["webfsd/web_port"]["default"]="";
$elem["webfsd/web_virtual"]["type"]="boolean";
$elem["webfsd/web_virtual"]["description"]="Enable virtual hosts?
 This option allows webfsd to support name-based virtual hosts, taking
 the directories immediately below the document root as host names.
";
$elem["webfsd/web_virtual"]["descriptionde"]="Virtuelle Server aktivieren?
 Diese Option ermöglicht Webfsd die Unterstützung von namensbasierten virtuellen Servern. Die Verzeichnisse direkt unterhalb des Dokumenten-Wurzelverzeichnisses werden dann als Servernamen verwendet.
";
$elem["webfsd/web_virtual"]["descriptionfr"]="Faut-il activer la gestion des hôtes virtuels ?
 Veuillez choisir si webfsd doit gérer les hôtes virtuels basés sur le nom. Les répertoires qui se trouvent immédiatement sous la racine seront alors considérés comme des hôtes dont le nom sera celui du répertoire.
";
$elem["webfsd/web_virtual"]["default"]="false";
$elem["webfsd/web_root"]["type"]="string";
$elem["webfsd/web_root"]["description"]="Document root for webfsd:
 Webfsd is a lightweight HTTP server for mostly static content. Its
 most obvious use is to provide HTTP access to an anonymous FTP server.
 .
 Please specify the document root for the webfs daemon.
 .
 If you leave this field blank, webfsd will not be started at boot time.
";
$elem["webfsd/web_root"]["descriptionde"]="Dokumenten-Wurzelverzeichnis für Webfsd:
 Webfsd ist ein leichtgewichtiger HTTP-Server für hauptsächlich statischen Inhalt. Seine gebräuchlichste Verwendung ist es, HTTP-Zugriff auf einen anonymen FTP-Server zu gewähren.
 .
 Geben Sie bitte ein Dokumenten-Wurzelverzeichnis für den Webfs-Daemon an.
 .
 Wenn Sie dieses Feld leer lassen, wird Webfsd beim Hochfahren des Systems nicht gestartet.
";
$elem["webfsd/web_root"]["descriptionfr"]="Racine de webfsd :
 Webfsd est un serveur HTTP léger qui ne sert que des fichiers statiques. Vous pouvez par exemple l'utiliser pour fournir un accès HTTP à un serveur FTP anonyme.
 .
 Veuillez indiquer l'emplacement de la racine du serveur web de webfs.
 .
 Si vous laissez ce champ vide, webfsd ne sera pas lancé au démarrage du système.
";
$elem["webfsd/web_root"]["default"]="/srv/ftp";
$elem["webfsd/web_host"]["type"]="string";
$elem["webfsd/web_host"]["description"]="Host name for webfsd:
 By default, webfsd uses the machine name as host name.
 .
 You can specify an alternate host name to be used as an external
 alias name (for instance \"ftp.example.org\") instead of the machine's
 fully qualified domain name.
";
$elem["webfsd/web_host"]["descriptionde"]="Rechnername für Webfsd:
 Als Voreinstellung verwendet Webfsd den Namen des Rechners als Server-Namen.
 .
 Sie können einen anderen Server-Namen angeben, der anstelle des vollständigen Domain-Namens als externer Alias (zum Beispiel »ftp.example.org«) verwendet werden soll.
";
$elem["webfsd/web_host"]["descriptionfr"]="Nom d'hôte utilisé par webfsd :
 Par défaut, webfsd utilise le nom de la machine comme nom d'hôte.
 .
 Vous pouvez choisir un autre nom d'hôte qui sera utilisé comme alias externe (par exemple, « ftp.example.org ») en lieu et place du nom réseau complètement qualifié de cette machine.
";
$elem["webfsd/web_host"]["default"]="";
$elem["webfsd/web_user"]["type"]="string";
$elem["webfsd/web_user"]["description"]="User running the webfsd daemon:
";
$elem["webfsd/web_user"]["descriptionde"]="Benutzerkennung, unter der der Webfsd-Daemon laufen soll:
";
$elem["webfsd/web_user"]["descriptionfr"]="Identifiant utilisé pour l'exécution du démon webfsd :
";
$elem["webfsd/web_user"]["default"]="www-data";
$elem["webfsd/web_syslog"]["type"]="boolean";
$elem["webfsd/web_syslog"]["description"]="Log webfsd events (start, stop, etc.) to syslog?
";
$elem["webfsd/web_syslog"]["descriptionde"]="Soll der Dienst »syslog« Webfsd-Vorkommnisse (start, stop, usw.) protokollieren?
";
$elem["webfsd/web_syslog"]["descriptionfr"]="Faut-il enregistrer les événements (démarrage, arrêt, etc.) dans le journal système ?
";
$elem["webfsd/web_syslog"]["default"]="false";
$elem["webfsd/web_accesslog"]["type"]="string";
$elem["webfsd/web_accesslog"]["description"]="Access log file:
 Access to webfsd is logged in common log format.
 .
 If this field is left empty, no logging of incoming connections will
 be done.
";
$elem["webfsd/web_accesslog"]["descriptionde"]="Protokolldatei für Zugriffe:
 Zugriffe auf Webfsd werden im »common log format« protokolliert.
 .
 Wenn Sie dieses Feld leer lassen, werden die eingehenden Verbindungen nicht protokolliert.
";
$elem["webfsd/web_accesslog"]["descriptionfr"]="Fichier de journalisation des accès :
 Les accès à webfsd sont enregistrés dans le format commun de journalisation (« common log format »).
 .
 Si ce champ est laissé vide, aucun enregistrement des connexions entrantes ne sera effectué.
";
$elem["webfsd/web_accesslog"]["default"]="";
$elem["webfsd/web_logbuffering"]["type"]="boolean";
$elem["webfsd/web_logbuffering"]["description"]="Should logging be buffered?
 With buffered logging, entries will be written in chunks, not as soon
 as they are accepted as client calls.
";
$elem["webfsd/web_logbuffering"]["descriptionde"]="Soll das Protokoll gepuffert werden?
 Bei gepufferter Protokollierung werden die Einträge stückweise festgehalten und nicht nach jeder Annahme einer Klient-Anfrage geschrieben.
";
$elem["webfsd/web_logbuffering"]["descriptionfr"]="Faut-il activer la mise en tampon (« buffer ») de la journalisation ?
 Si la mise en tampon, de la journalisation est activée, les entrées de journaux seront écrites par paquets au lieu de l'être dès que les requêtes de clients sont reçues.
";
$elem["webfsd/web_logbuffering"]["default"]="true";
$elem["webfsd/web_group"]["type"]="string";
$elem["webfsd/web_group"]["description"]="Group running the webfsd daemon:
";
$elem["webfsd/web_group"]["descriptionde"]="Gruppenkennung, unter der der Webfsd-Daemon laufen soll:
";
$elem["webfsd/web_group"]["descriptionfr"]="Groupe utilisé par le démon webfsd :
";
$elem["webfsd/web_group"]["default"]="www-data";
$elem["webfsd/web_index"]["type"]="string";
$elem["webfsd/web_index"]["description"]="Directory index filename:
 If webfsd receives a request for a directory, it can optionally look for an
 index file to be sent to the client. Common names are \"index.html\" and
 \"default.html\".
 .
 If you leave this field empty, webfsd will send a directory listing to the
 client.
";
$elem["webfsd/web_index"]["descriptionde"]="Name der Indexdatei für Verzeichnisse:
 Falls Webfsd eine Anfrage für ein Verzeichnis erhält, kann er wahlweise nach einer Indexdatei suchen, die an den Client gesendet werden soll. Gebräuchliche Namen sind »index.html« und »default.html«.
 .
 Wenn Sie dieses Feld leer lassen, wird Webfsd eine Verzeichnisliste an den Client schicken.
";
$elem["webfsd/web_index"]["descriptionfr"]="Fichier contenant les index des répertoires :
 Lorsque webfsd reçoit une requête sur un répertoire, il peut de manière optionnelle rechercher un fichier d'index à envoyer au client. Les noms usuels pour de tels fichiers d'index sont « index.html » et « default.html ».
 .
 Si vous laissez ce champ vide, webfsd enverra au client une énumération du contenu du répertoire.
";
$elem["webfsd/web_index"]["default"]="";
$elem["webfsd/web_cgipath"]["type"]="string";
$elem["webfsd/web_cgipath"]["description"]="CGI script catalog:
 Please specify the location for CGI scripts to be served by webfsd. This
 path should be located immediately below the document root.
 .
 Please specify the full path name, not a relative path. If this
 field is left empty, CGI scripts will be disabled.
";
$elem["webfsd/web_cgipath"]["descriptionde"]="Katalog von CGI-Skripten:
 Geben Sie bitte den Pfad zu den CGI-Skripten an, die Webfsd aufrufen darf. Der Pfad sollte sich unmittelbar unter dem Dokumenten-Wurzelverzeichnis befinden.
 .
 Geben Sie bitte den vollständigen Pfad an und keinen relativen. Wenn Sie dieses Feld leer lassen, werden keine CGI-Skripte ausgeführt.
";
$elem["webfsd/web_cgipath"]["descriptionfr"]="Répertoire pour les scripts CGI :
 Veuillez indiquer l'emplacement des scripts CGI qui seront publiés par webfsd. Ce chemin doit être situé directement sous la racine des documents du serveur web.
 .
 Veuillez indiquer un nom de répertoire complet et pas un nom relatif. Si ce champ est laissé vide, les scripts CGI seront désactivés.
";
$elem["webfsd/web_cgipath"]["default"]="";
$elem["webfsd/web_extras"]["type"]="string";
$elem["webfsd/web_extras"]["description"]="Extra options to include:
 Please specify any webfsd options you want to use with the main
 daemon.
 .
 For instance, webfsd can run chrooted, provide timed expiration of
 files, and bind either IPv4 or IPv6 addresses.
 .
 See webfsd's manual page for further options and details.
";
$elem["webfsd/web_extras"]["descriptionde"]="Zusätzliche Optionen:
 Geben Sie alle Optionen für Webfsd an, die für den Dienst gelten sollen.
 .
 Beispielsweise kann Webfsd in einer »chroot«-Umgebung laufen, mit Dateiverfallsdaten umgehen und mit IPv4- oder IPv6-Adressen arbeiten.
 .
 Die Handbuchseite zu Webfsd beschreibt weitere Optionen und Einzelheiten.
";
$elem["webfsd/web_extras"]["descriptionfr"]="Options supplémentaires à utiliser :
 Veuillez indiquer les options de webfsd que vous souhaitez utiliser avec le démon principal.
 .
 Par exemple, webfsd peut être utilisé dans un environnement fermé d'exécution (« chroot »), utiliser une expiration temporelle des fichiers ou utiliser à la fois des adresses IPv4 et IPv6.
 .
 Veuillez consulter la page de manuel de webfsd pour une explication complète sur les différentes options utilisables.
";
$elem["webfsd/web_extras"]["default"]="";
PKG_OptionPageTail2($elem);
?>
