<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("trn4");

$elem["shared/news/server"]["type"]="string";
$elem["shared/news/server"]["description"]="What news server should be used for reading and posting news?
 trn is configured to read news via an NNTP connection, and needs to know
 the fully-qualified host name of the server (such as news.example.com). If
 you have a local news spool, you should consider installing some NNTP
 server like inn2; in that case, enter \"localhost\" as your news server.
";
$elem["shared/news/server"]["descriptionde"]="Welcher Server soll benutzt werden?
 trn wird konfiguriert, News über eine NNTP-Verbindung zu lesen und muss den vollständigen Rechnernamen des Servers wissen (zum Beispiel news.beispiel.de). Wenn Sie einen lokalen News-Spool haben, sollten Sie wahrscheinlich irgendeinen NNTP-Server wie inn2 installieren. In diesem Fall geben Sie \"localhost\" als Ihren News-Server an.
";
$elem["shared/news/server"]["descriptionfr"]="Nom du serveur de nouvelles :
 Trn est configuré pour lire les nouvelles via une connexion NNTP, et doit connaître le nom complètement qualifié du serveur de nouvelles (par exemple news.exemple.com). Si vous désirez utiliser un serveur local NNTP tel que inn2, vous devez dans ce cas indiquer « localhost » comme serveur de nouvelles.
";
$elem["shared/news/server"]["default"]="";
$elem["trn4/mail-name"]["type"]="string";
$elem["trn4/mail-name"]["description"]="What is your system's mail name?
 Please enter the 'mail name' of your system. This is the hostname portion
 of the address to be shown on outgoing news and mail messages, and is used
 by many packages. trn4 users may override this individually by setting the
 FROM environment variable.
";
$elem["trn4/mail-name"]["descriptionde"]="Was ist der Mailname Ihres Systems?
 Bitte geben Sie den 'Mailnamen' Ihres Systems an. Dieser ist der erste Teil des Rechnernamens, die bei abgeschickten News- und Mailmeldungen verwendet werden und wird von mehreren Paketen verwendet. trn4-Benutzer können durch Setzen der FROM-Variable diese Einstellung abändern.
";
$elem["trn4/mail-name"]["descriptionfr"]="Nom de votre système de courrier :
 Veuillez indiquer le nom de courrier de votre système. C'est la partie de l'adresse correspondant au nom d'hôte qui est affichée sur les nouvelles et les courriels envoyés, et elle est utilisée par de nombreux paquets.
";
$elem["trn4/mail-name"]["default"]="";
$elem["trn4/whoami-change"]["type"]="error";
$elem["trn4/whoami-change"]["description"]="/etc/news/whoami and /etc/mailname differ
 Some versions of Debian's various trn packages used /etc/news/whoami to
 construct the default From: line of outgoing mail and news messages. This
 package uses /etc/mailname instead, to comply with Debian policy.
 .
 However, /etc/news/whoami says that addresses on your system are in the
 domain ${whoami}, while /etc/mailname says that they are in the domain
 ${mailname}. In common with your mail configuration, trn4 will use
 /etc/mailname from now on anyway; if you need to change this, you might
 consider setting the FROM environment variable for each user to be that
 user's e-mail address.
";
$elem["trn4/whoami-change"]["descriptionde"]="/etc/news/whoami und /etc/mailname unterscheiden sich
 Einige Versionen von Debians trn-Paketen haben /etc/news/whoami verwendet, um die From:-Zeile abzuschickender Mail- und Newsmeldungen zu erzeugen. Statt dessen benutzt dieses Paket /etc/mailname, damit die Debian-Policy beachtet wird.
 .
 /etc/news/whoami sagt aber, dass Adressen bei Ihrem System in der Domain ${whoami} sind, während /etc/mailname sagt, die Adressen sind in der Domain ${mailname}. Gemeinsam mit Ihrer Mail-Konfiguration wird trn4 ab jetzt jedenfalls /etc/mailname benutzen. Wenn Sie dieses ändern wollen, sollten Sie vielleicht die Umgebungsvariable FROM jedes Benutzers auf seine E-Mail-Adresse setzen.
";
$elem["trn4/whoami-change"]["descriptionfr"]="Les fichiers /etc/news/whoami et /etc/mailname diffèrent
 Des anciennes versions du paquet trn utilisaient le fichier /etc/news/whoami pour mettre en forme le champ origine (« From: ») des courriels et des messages de news envoyés. Trn utilise désormais le fichier /etc/mailname pour se conformer à la Charte Debian.
 .
 Cependant, le fichier /etc/news/whoami de votre système mentionne le domaine ${whoami} alors que le fichier /etc/mailname indique le domaine ${mailname}. Par cohérence avec la configuration de votre système de courrier, trn4 utilisera désormais le fichier /etc/mailname. Pour passer outre ces réglages, les utilisateurs peuvent positionner la variable d'environnement « FROM » sur leur adresse électronique.
";
$elem["trn4/whoami-change"]["default"]="";
PKG_OptionPageTail2($elem);
?>
