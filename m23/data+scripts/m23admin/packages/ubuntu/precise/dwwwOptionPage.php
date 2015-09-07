<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dwww");

$elem["dwww/docrootdir"]["type"]="string";
$elem["dwww/docrootdir"]["description"]="Location of web server's document root:
 dwww needs to know the path of the directory which contains your web server's
 document root. The web standard suggests /var/www.
";
$elem["dwww/docrootdir"]["descriptionde"]="Wo ist das Dokument-Start-Verzeichnis?
 dwww muss den Pfad für das Dokument-Start-Verzeichnis des Webservers kennen. Standardmäßig ist dies das Verzeichnis /var/www.
";
$elem["dwww/docrootdir"]["descriptionfr"]="Où se trouve le document racine du serveur web ?
 dwww a besoin de connaître l'emplacement du répertoire où se trouve le document racine du serveur web. /var/www est l'emplacement standard.
";
$elem["dwww/docrootdir"]["default"]="/var/www";
$elem["dwww/cgidir"]["type"]="string";
$elem["dwww/cgidir"]["description"]="Location of web server's cgi directory:
 dwww needs to know the path of the directory which contains your web server's
 CGI scripts.  The web standard suggests /usr/lib/cgi-bin, but your web server
 may already be configured for a different location.
";
$elem["dwww/cgidir"]["descriptionde"]="Wo ist das CGI-Verzeichnis?
 dwww muss den Pfad für die CGI-Skripte kennen. Nach Web-Standard ist dies das Verzeichnis /usr/lib/cgi, aber Ihr Server könnte für ein anderes Verzeichnis konfiguriert sein.
";
$elem["dwww/cgidir"]["descriptionfr"]="Où se trouve le répertoire cgi du serveur web ?
 dwww a maintenant besoin de connaître l'emplacement du répertoire où se trouvent les scripts CGI de votre serveur web. /usr/lib/cgi-bin est l'emplacement standard, mais votre serveur peut avoir été configuré autrement.
";
$elem["dwww/cgidir"]["default"]="/usr/lib/cgi-bin";
$elem["dwww/cgiuser"]["type"]="string";
$elem["dwww/cgiuser"]["description"]="Name of CGI user:
 dwww needs to know what user will be running the dwww CGI script, as the cache
 directory must be owned by that user.
";
$elem["dwww/cgiuser"]["descriptionde"]="Name des CGI-Nutzers:
 dwww muss die Nutzerkennung wissen unter der dwww CGI-Skripte ausführen kann, da dieser Nutzer auch Eigner des Cache-Verzeichnisses sein muss.
";
$elem["dwww/cgiuser"]["descriptionfr"]="Nom de l'utilisateur CGI:
 dwww a maintenant besoin de savoir qui exécutera les scripts CGI car cet utilisateur doit être propriétaire du répertoire cache.
";
$elem["dwww/cgiuser"]["default"]="www-data";
$elem["dwww/servername"]["type"]="string";
$elem["dwww/servername"]["description"]="Host name of the web server:
 dwww needs to know the host name of your web server.
";
$elem["dwww/servername"]["descriptionde"]="Rechnername des Webservers:
 dwww muss den Rechnernamen Ihres Webservers kennen.
";
$elem["dwww/servername"]["descriptionfr"]="Quel est le nom d'hôte de votre serveur ?
 dwww doit connaître le nom d'hôte de votre serveur.
";
$elem["dwww/servername"]["default"]="localhost";
$elem["dwww/serverport"]["type"]="string";
$elem["dwww/serverport"]["description"]="Web server's port:
 dwww needs to know what port your web server is running on.  Normally web
 servers run on port 80.
";
$elem["dwww/serverport"]["descriptionde"]="Port des Webservers:
 Auf welchem Port läuft dwww? Normalerweise ist dies der Port 80.
";
$elem["dwww/serverport"]["descriptionfr"]="Quel est le port de votre serveur ?
 dwww doit connaître le port de votre serveur. Habituellement les serveurs web utilisent le port 80.
";
$elem["dwww/serverport"]["default"]="80";
$elem["dwww/nosuchdir"]["type"]="note";
$elem["dwww/nosuchdir"]["description"]="Directory does not exist!
 Directory ${dir} does not exist.
";
$elem["dwww/nosuchdir"]["descriptionde"]="Verzeichnis existiert nicht.
 Das Verzeichnis ${dir} existiert nicht.
";
$elem["dwww/nosuchdir"]["descriptionfr"]="Répertoire introuvable !
 Le répertoire ${dir} n'existe pas.
";
$elem["dwww/nosuchdir"]["default"]="";
$elem["dwww/nosuchuser"]["type"]="note";
$elem["dwww/nosuchuser"]["description"]="User not found!
 User ${user} does not exist.
";
$elem["dwww/nosuchuser"]["descriptionde"]="Benutzer nicht gefunden!
 Der Benutzer ${user} existiert nicht.
";
$elem["dwww/nosuchuser"]["descriptionfr"]="Utilisateur introuvable !
 L'utilisateur ${user} n'existe pas.
";
$elem["dwww/nosuchuser"]["default"]="";
$elem["dwww/badport"]["type"]="note";
$elem["dwww/badport"]["description"]="Port value should be a number!
 Value entered for port: ${port} is invalid.
";
$elem["dwww/badport"]["descriptionde"]="Der Port sollte eine Nummer sein!
 Der angegebene Wert (${port}) ist nicht zulässig.
";
$elem["dwww/badport"]["descriptionfr"]="Le numéro de port doit être un nombre !
 La valeur donnée pour le port ${port} n'est pas un nombre.
";
$elem["dwww/badport"]["default"]="";
$elem["dwww/index_docs"]["type"]="boolean";
$elem["dwww/index_docs"]["description"]="Should post-installation script index your documentation files?
 dwww-index++(8) program will be run once a week to index your documentation files
 registered with doc-base package.
 .
 The index can also be generated (in the background) by the post-installation script.
 This process needs quite a lot of computer resources, and can take several minutes
 so you can choose now if you would like to do this.
";
$elem["dwww/index_docs"]["descriptionde"]="Sollen nach der Installation Ihre Doc-Dateien indiziert werden?
 Das dwww-index++(8)-Programm wird jede Woche einmal aufgerufen und indiziert alle Ihre Dokumentations-Dateien, die beim doc-base-Paket angemeldet sind.
 .
 Dieser Index kann auch nach der Installation (im Hintergrund) erstellt werden. Dieser Prozess braucht viel Computerleistung und kann mehrere Minuten dauern. Daher können Sie jetzt wählen, ob Sie dies möchten.
";
$elem["dwww/index_docs"]["descriptionfr"]="Indexer vos fichiers de documentation après l'installation ?
 Le programme dwww-index++(8) sera exécuté toutes les semaines pour indexer vos fichiers de documentation enregistrés auprès du paquet doc-base.
 .
 L'index peut aussi être généré (en arrière-plan) par le script de post-installation. Ce processus prend beaucoup de ressources de la machine, et peut durer plusieurs minutes ; vous pouvez décider si vous souhaitez le faire maintenant ou non.
";
$elem["dwww/index_docs"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
