<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dokuwiki");

$elem["dokuwiki/system/documentroot"]["type"]="string";
$elem["dokuwiki/system/documentroot"]["description"]="Wiki location:
 DokuWiki will be accessible through a directory of your website.
 By default, this is http://yourserver/dokuwiki, but you can
 change it to be anything within your server.  Enter just the directory
 portion below.
";
$elem["dokuwiki/system/documentroot"]["descriptionde"]="Wiki-Speicherort:
 Als Zugang zu DokuWiki wird ein Verzeichnis Ihrer Web-Seite benutzt. Standardmäßig ist das http://IhrServer/dokuwiki, aber Sie können das für Ihren Server anpassen. Geben Sie hier nur das Verzeichnis ein.
";
$elem["dokuwiki/system/documentroot"]["descriptionfr"]="Emplacement du Wiki :
 DokuWiki sera accessible via un répertoire de votre site web. La valeur par défaut est « http://votreserveur/dokuwiki », mais elle est modifiable à volonté. Veuillez n'indiquer que la partie répertoire.
";
$elem["dokuwiki/system/documentroot"]["default"]="/dokuwiki";
$elem["dokuwiki/system/accessible"]["type"]="select";
$elem["dokuwiki/system/accessible"]["choices"][1]="localhost only";
$elem["dokuwiki/system/accessible"]["choices"][2]="local network";
$elem["dokuwiki/system/accessible"]["choicesde"][1]="nur lokaler Rechner";
$elem["dokuwiki/system/accessible"]["choicesde"][2]="lokales Netzwerk";
$elem["dokuwiki/system/accessible"]["choicesfr"][1]="Hôte local seulement";
$elem["dokuwiki/system/accessible"]["choicesfr"][2]="Réseau local";
$elem["dokuwiki/system/accessible"]["description"]="Authorized network:
 A Wiki is normally used to provide unlimited access to information, which
 can be freely modified by anyone.  Since this is not always wanted, 
 it is possible to restrict access to the site on the basis of the
 originating IP address.
 .
 If you select 'localhost only', only people on the localhost (the machine
 the Wiki is running on) will be able to connect.  'local network' will
 allow people on machines in a local network (which you will need to
 specify) to talk to the Wiki.  'global' will allow anyone, any where, to
 connect to the Wiki.
 .
 For security, this is set to 'localhost only' by default.  Unless you have
 a particular need for privacy on your Wiki, you should be able to allow
 access globally without compromising site security.
";
$elem["dokuwiki/system/accessible"]["descriptionde"]="Zugelassenes Netzwerk:
 Ein Wiki bietet normalerweise uneingeschränkten Zugang zu Informationen, die völlig frei von Jedem geändert werden können. Weil das manchmal nicht gewünscht ist, kann der Zugang zur Web-Seite anhand der entfernten IP-Adresse eingeschränkt werden.
 .
 Wenn Sie 'nur lokaler Rechner' wählen, können sich nur Benutzer verbinden, die direkt an dem Rechner arbeiten, auf dem das Wiki läuft. 'Lokales Netzwerk' erlaubt es, von den Rechnern des lokalen Netzwerks (das Sie angeben müssen) mit dem Wiki zu arbeiten. 'Alle' bedeutet, dass sich jeder von überall mit dem Wiki verbinden kann.
 .
 Aus Sicherheitsgründen ist die Standardeinstellung 'nur lokaler Rechner'. Sie können den Zugang für alle erlauben, ohne die Sicherheit Ihrer Web-Seite zu beeinträchtigen, es sei denn, Sie möchten das Wiki nicht öffentlich betreiben.
";
$elem["dokuwiki/system/accessible"]["descriptionfr"]="Réseau autorisé :
 On utilise en général un wiki pour fournir un accès non restreint à des informations qui peuvent être librement modifiées par quiconque. Comme ce n'est pas toujours souhaité, il est possible de restreindre l'accès au site en fonction de l'IP d'origine.
 .
 Le choix « Hôte local seul » restreint la connexion aux utilisateurs locaux. « Réseau local » permet la connexion aux personnes du réseau local (qu'il vous incombe de spécifier) et « Sans restriction » permet à tout le monde de se connecter.
 .
 Pour des raisons de sécurité, la connexion est limitée à l'hôte local. À moins que vous n'ayez des raisons particulières de confidentialité, vous pouvez permettre l'accès global sans compromettre la sécurité.
";
$elem["dokuwiki/system/accessible"]["default"]="localhost only";
$elem["dokuwiki/system/localnet"]["type"]="string";
$elem["dokuwiki/system/localnet"]["description"]="Local network:
 The specification of your local network should either be
 an IP network in CIDR format (x.x.x.x/y) or a domain specification (like
 .mydomain.com).
 .
 Anyone who matches the specification given below will be given full and
 complete access to the DokuWiki.
";
$elem["dokuwiki/system/localnet"]["descriptionde"]="Lokales Netzwerk:
 Die Angabe Ihres lokalen Netzwerks sollte eine IP-Netzwerkadresse im CIDR-Format (x.x.x.x/y) oder ein Domänenname (wie meinedomäne.de) sein.
 .
 Jeder, der die unten eingegebene Vorgabe erfüllt, erhält vollständigen Zugang zum DokuWiki.
";
$elem["dokuwiki/system/localnet"]["descriptionfr"]="Réseau local :
 Veuillez indiquer quel est votre réseau local. Vous pouvez l'indiquer soit avec le format CIDR (x.x.x.x/y), soit sous forme de domaine (tel que « mondomaine.com »).
 .
 Toute adresse répondant à ce critère aura accès à DokuWiki.
";
$elem["dokuwiki/system/localnet"]["default"]="10.0.0.0/24";
$elem["dokuwiki/system/purgepages"]["type"]="boolean";
$elem["dokuwiki/system/purgepages"]["description"]="Purge pages on package removal?
 By default, DokuWiki stores all its pages in a file database in
 /var/lib/dokuwiki.
 .
 Accepting this option will leave you with a tidier system when the
 DokuWiki package is removed, but may cause information loss if you have an
 operational Wiki that gets removed.
";
$elem["dokuwiki/system/purgepages"]["descriptionde"]="Seiten beim Löschen des Pakets vollständig entfernen?
 Standardmäßig speichert DokuWiki alle seine Seiten in einer Datei-Datenbank im Verzeichnis /var/lib/dokuwiki.
 .
 Wenn Sie zustimmen, haben Sie ein aufgeräumteres System, falls das Paket DokuWiki entfernt wird, aber es können Informationen verloren gehen, wenn Sie ein Wiki löschen, das noch benutzt wird.
";
$elem["dokuwiki/system/purgepages"]["descriptionfr"]="Faut-il purger les pages à la suppression du paquet ?
 Par défaut DokuWiki enregistre toutes ses pages dans une base de données située dans /var/lib/dokuwiki.
 .
 En choisissant cette option, le système sera complètement nettoyé à la suppression de DokuWiki mais cela risque de causer une perte d'information si vous aviez un Wiki opérationnel.
";
$elem["dokuwiki/system/purgepages"]["default"]="true";
$elem["dokuwiki/webservers"]["type"]="multiselect";
$elem["dokuwiki/webservers"]["choices"][1]="apache";
$elem["dokuwiki/webservers"]["choices"][2]="apache2";
$elem["dokuwiki/webservers"]["choices"][3]="apache-ssl";
$elem["dokuwiki/webservers"]["choicesde"][1]="apache";
$elem["dokuwiki/webservers"]["choicesde"][2]="apache2";
$elem["dokuwiki/webservers"]["choicesde"][3]="apache-ssl";
$elem["dokuwiki/webservers"]["choicesfr"][1]="Apache";
$elem["dokuwiki/webservers"]["choicesfr"][2]="Apache2";
$elem["dokuwiki/webservers"]["choicesfr"][3]="Apache-ssl";
$elem["dokuwiki/webservers"]["description"]="Web servers:
 DokuWiki can be used with any of the given web servers.  Select the servers
 which you would like DokuWiki to be installed into.
";
$elem["dokuwiki/webservers"]["descriptionde"]="Web-Server:
 DokuWiki kann auf jedem der vorgegebenen Web-Server benutzt werden. Wählen Sie die Server aus, auf welchen DokuWiki installiert werden soll.
";
$elem["dokuwiki/webservers"]["descriptionfr"]="Serveurs web :
 DokuWiki peut être utilisé avec plusieurs serveurs différents. Veuillez choisir celui ou ceux où DokuWiki doit être installé.
";
$elem["dokuwiki/webservers"]["default"]="apache";
PKG_OptionPageTail2($elem);
?>
