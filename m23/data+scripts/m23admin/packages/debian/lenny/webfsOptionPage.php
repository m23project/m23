<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("webfs");

$elem["webfsd/web_ip"]["type"]="string";
$elem["webfsd/web_ip"]["description"]="IP address webfsd should listen on:
 If your box has more than one IP address, you can pick one here for webfsd.
 Leaving this field blank will allow webfsd to listen on all IP addresses.
";
$elem["webfsd/web_ip"]["descriptionde"]="IP-Adresse, auf der Webfsd lauschen soll:
 Wenn dieser Rechner mehr als eine IP-Adresse hat, dann können Sie hier eine Adresse für Webfsd angeben. Wenn Sie dieses Feld leer lassen, dann wird Webfsd auf allen IP-Adressen lauschen.
";
$elem["webfsd/web_ip"]["descriptionfr"]="
 Si votre ordinateur utilise plus d'une adresse IP, vous pouvez choisir celle que webfs utilisera. Le comportement par défaut est d'écouter toutes les adresses IP. Laissez ce champ vide si c'est ce que vous souhaitez.
";
$elem["webfsd/web_ip"]["default"]="";
$elem["webfsd/web_timeout"]["type"]="string";
$elem["webfsd/web_timeout"]["description"]="Timeout for network connections:
 The default timeout is 60 seconds.  You can pick another value here if you
 want.
";
$elem["webfsd/web_timeout"]["descriptionde"]="Zeitüberschreitung (engl. »Timeout«) für Netzverbindungen:
 Der normale Wert für Zeitüberschreitungen beträgt 60 Sekunden. Sie können hier einen anderen Wert eingeben, wenn Sie möchten.
";
$elem["webfsd/web_timeout"]["descriptionfr"]="Délai maximal d'attente pour les connexions réseau :
 La durée maximale d'attente est par défaut de 60 secondes. Vous pouvez indiquer une autre valeur si vous le souhaitez.
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
 By default, webfsd allows 32 network connections. For private/small
 networks, the default should be fine. If you are running a big server, you
 probably want to use a higher number.
";
$elem["webfsd/web_conn"]["descriptionde"]="Anzahl paralleler Netz-Verbindungen:
 Standardmäßig erlaubt Webfsd 32 Netz-Verbindungen. Für private oder kleine Netzwerke sollte dieser Wert ausreichen. Wenn Sie einen großen Server betreiben, dann sollten Sie wahrscheinlich einen größeren Wert verwenden.
";
$elem["webfsd/web_conn"]["descriptionfr"]="Nombre de connexions réseaux en parallèle :
 Par défaut, 32 connexions sont autorisées. Pour des réseaux privés ou de petite taille, cette valeur devrait convenir. Si vous administrez un serveur de plus grande dimension, vous devriez probablement augmenter cette valeur.
";
$elem["webfsd/web_conn"]["default"]="";
$elem["webfsd/web_dircache"]["type"]="string";
$elem["webfsd/web_dircache"]["description"]="Directory cache size:
 webfsd can keep cached directory listings.  By default, the size of
 the cache is limited to 128 entries.  If you have a very big
 directory tree, you might want to raise this value.
";
$elem["webfsd/web_dircache"]["descriptionde"]="Cache für Verzeichnisinhalte:
 Webfsd kann erstellte Auflistungen von Verzeichnisinhalten zwischenspeichern. Standardmäßig ist dieser Zwischenspeicher auf 128 Einträge begrenzt. Wenn Sie einen sehr großen Verzeichnisbaum haben, dann sollten Sie diesen Wert erhöhen.
";
$elem["webfsd/web_dircache"]["descriptionfr"]="Taille du répertoire de cache :
 Webfsd met en cache les dernières énumérations de répertoires. Par défaut, la taille de ce cache est limitée à 128 éléments. Si vous avez une arborescence de grande taille, vous devriez augmenter cette valeur.
";
$elem["webfsd/web_dircache"]["default"]="";
$elem["webfsd/web_port"]["type"]="string";
$elem["webfsd/web_port"]["description"]="Port number webfsd should listen on:
 By default, webfsd listens on port 8000.  If you want to use another port, enter
 it here.
";
$elem["webfsd/web_port"]["descriptionde"]="Portnummer, auf der Webfsd lauschen soll:
 Standardmäßig lauscht Webfsd auf Port 8000. Wenn Sie einen anderen Port verwenden wollen, dann geben Sie ihn hier an.
";
$elem["webfsd/web_port"]["descriptionfr"]="Numéro du port que webfsd écoutera :
 Par défaut webfsd écoute le port 8000. Si vous souhaitez utiliser un autre port, indiquez ici son numéro.
";
$elem["webfsd/web_port"]["default"]="";
$elem["webfsd/web_virtual"]["type"]="boolean";
$elem["webfsd/web_virtual"]["description"]="Should virtual host support be enabled?
 Please choose this option if you want webfsd support name-based
 virtual hosts.  The first directory level below your document root
 will then be used as hostname.
";
$elem["webfsd/web_virtual"]["descriptionde"]="Soll die Unterstützung virtueller Server aktiviert werden?
 Bitte wählen Sie diese Option, falls Sie eine Unterstützung von namensbasierten virtuellen Servern durch Webfsd möchten. Die erste Verzeichnisebene unterhalb des Dokumenten-Wurzelverzeichnisses wird dann als Rechnernamen benutzt.
";
$elem["webfsd/web_virtual"]["descriptionfr"]="Faut-il gérer les hôtes virtuels ?
 Veuillez choisir si webfsd doit gérer les hôtes virtuels. Les répertoires qui se trouvent immédiatement sous la racine seront alors considérés comme des hôtes dont le nom sera celui du répertoire.
";
$elem["webfsd/web_virtual"]["default"]="false";
$elem["webfsd/web_root"]["type"]="string";
$elem["webfsd/web_root"]["description"]="Document root for webfsd:
 webfsd is a lightweight HTTP server which only serves static files.  You
 can use it for example to provide HTTP access to your anonymous FTP
 server.
 .
 You need to specify the document root for the webfs daemon, i.e. the
 directory tree which will be exported.
 .
 Leave this blank if you don't want webfsd started by the system at boot time.
";
$elem["webfsd/web_root"]["descriptionde"]="Dokumenten-Wurzelverzeichnis für Webfsd:
 Webfsd ist ein leichtgewichtiger HTTP-Server, der nur statische Dateien ausliefert. Sie können diesen Server z.B. verwenden, um HTTP-Zugriff auf Ihren anonymen FTP-Server zu gewähren.
 .
 Sie müssen ein Dokumenten-Wurzelverzeichnis für den Webfs-Daemon angeben. Das ist das Verzeichnis, in dem sich die auszuliefernden Dateien befinden.
 .
 Wenn Sie Webfsd nicht beim Hochfahren des Systems starten möchten, dann lassen Sie dieses Feld frei.
";
$elem["webfsd/web_root"]["descriptionfr"]="Racine de webfsd :
 Webfsd est un serveur HTTP léger qui ne sert que des fichiers statiques. Vous pouvez par exemple l'utiliser pour fournir un accès HTTP à votre serveur FTP anonyme.
 .
 Vous devez indiquer l'emplacement de la racine du démon webfs, c'est à dire le répertoire contenant l'arborescence devant être exportée.
 .
 Si vous ne souhaitez pas que webfsd soit lancé au démarrage du système, laissez ce champ vide.
";
$elem["webfsd/web_root"]["default"]="/var/ftp";
$elem["webfsd/web_host"]["type"]="string";
$elem["webfsd/web_host"]["description"]="Host name for webfsd:
 webfsd will use the machine's hostname by default. If this box has an alias
 name (like ftp.domain.org) which should be visible outside instead of the
 real hostname (say debian.domain.org), then enter this name here.
 Otherwise you can leave this blank.
";
$elem["webfsd/web_host"]["descriptionde"]="Rechnername für Webfsd:
 Webfsd wird standardmäßig den Rechnernamen des Rechners benutzen. Wenn dieser Rechner einen Aliasnamen (wie z.B. ftp.domain.org) hat, der statt des Rechnernamens (z.B. debian.domain.org) benutzt werden soll, dann geben Sie diesen Namen hier ein. Andernfalls lassen Sie dieses Feld frei.
";
$elem["webfsd/web_host"]["descriptionfr"]="Nom d'hôte utilisé par webfsd :
 Webfsd utilisera par défaut le nom d'hôte de votre ordinateur. Si cette machine utilise un alias (comme p. ex. ftp.domaine.org) devant être visible depuis l'extérieur à la place du nom réel (p. ex. debian.domaine.org), alors indiquez ce nom ici. Dans les autres cas, vous pouvez laisser ce champ vide.
";
$elem["webfsd/web_host"]["default"]="";
$elem["webfsd/web_user"]["type"]="string";
$elem["webfsd/web_user"]["description"]="User running the webfsd daemon:
";
$elem["webfsd/web_user"]["descriptionde"]="Benutzer, unter dem der Webfsd-Daemon laufen soll:
";
$elem["webfsd/web_user"]["descriptionfr"]="Identifiant utilisé par webfsd :
";
$elem["webfsd/web_user"]["default"]="www-data";
$elem["webfsd/web_syslog"]["type"]="boolean";
$elem["webfsd/web_syslog"]["description"]="Should webfsd log events (start/stop/...) to syslog?
";
$elem["webfsd/web_syslog"]["descriptionde"]="Soll Webfsd Vorkommnisse (start/stop/...) ins Syslog protokollieren?
";
$elem["webfsd/web_syslog"]["descriptionfr"]="Enregistrer les événements (démarrage, arrêt, ...) dans le journal système ?
";
$elem["webfsd/web_syslog"]["default"]="false";
$elem["webfsd/web_accesslog"]["type"]="string";
$elem["webfsd/web_accesslog"]["description"]="Access log file:
 webfsd can write an access log in common log format. If you want this,
 enter the log file name here.  By default, no logfile will be written.
";
$elem["webfsd/web_accesslog"]["descriptionde"]="Protokolldatei für Zugriffe:
 Webfsd kann eine Protokolldatei für Zugriffe (engl. »access log«) im »common log format« schreiben. Wenn Sie dies möchten, dann geben Sie hier den Namen ein, den diese Protokolldatei haben soll. Standardmäßig wird keine Protokolldatei geschrieben.
";
$elem["webfsd/web_accesslog"]["descriptionfr"]="Fichier de journalisation des accès :
 Webfsd peut journaliser les accès en utilisant un format standard. Si c'est ce que vous souhaitez, indiquez ici le nom du fichier du journal. Par défaut, aucun journal ne sera utilisé.
";
$elem["webfsd/web_accesslog"]["default"]="";
$elem["webfsd/web_group"]["type"]="string";
$elem["webfsd/web_group"]["description"]="Group running the webfsd daemon:
";
$elem["webfsd/web_group"]["descriptionde"]="Gruppe, unter dem der Webfsd-Daemon laufen soll:
";
$elem["webfsd/web_group"]["descriptionfr"]="Groupe utilisé par le démon webfsd :
";
$elem["webfsd/web_group"]["default"]="www-data";
$elem["webfsd/web_index"]["type"]="string";
$elem["webfsd/web_index"]["description"]="Directory index filename:
 If webfsd receives a request for a directory, it can optionally look for an
 index file it should send to the client.  Common names are index.html and
 default.html. If you want this, enter the filename here.  If you leave it
 blank or no such file exists, webfsd will send a directory listing to the
 client.
";
$elem["webfsd/web_index"]["descriptionde"]="Indexdatei für Verzeichnisse:
 Falls Webfsd eine Anfrage für ein Verzeichnis erhält, kann er optional nach einer Indexdatei suchen, die er zum Client senden soll. Normalerweise heißt eine solche Datei index.html oder default.html. Wenn Sie diese Funktionalität wünschen, dann geben Sie hier einen Dateinamen für Indexdateien an. Wenn Sie dieses Feld leer lassen oder aber keine Indexdatei existiert, dann wird Webfsd eine Verzeichnisauflistung zum Client senden.
";
$elem["webfsd/web_index"]["descriptionfr"]="Fichier contenant les indexes des répertoires :
 Lorsque webfsd reçoit une requête sur un répertoire, il peut de manière optionnelle rechercher un fichier d'index à envoyer au client. « index.html » et « default.html » sont des noms couramment employés. Indiquez le nom du fichier à employer. Si vous laissez le champ vide, ou si le fichier spécifié n'existe pas, webfsd enverra au client une énumération du contenu du répertoire.
";
$elem["webfsd/web_index"]["default"]="";
PKG_OptionPageTail2($elem);
?>
