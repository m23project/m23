<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("knews");

$elem["shared/news/server"]["type"]="string";
$elem["shared/news/server"]["description"]="What news server should be used for reading and posting news?
 knews is configured to read news via an NNTP connection, and needs to know
 the fully-qualified host name of the server (such as news.example.com). If
 you have a local news spool, you should consider installing some NNTP
 server like inn2; in that case, enter \"localhost\" as your news server.
";
$elem["shared/news/server"]["descriptionde"]="Welcher Server soll benutzt werden?
 knews wird konfiguriert, News über eine NNTP-Verbindung zu lesen und muss den vollständigen Rechnernamen des Servers wissen (zum Beispiel news.beispiel.de). Wenn Sie einen lokalen News-Spool haben, sollten Sie wahrscheinlich irgendeinen NNTP-Server wie inn2 installieren. In diesem Fall geben Sie \"localhost\" als Ihren News-Server an.
";
$elem["shared/news/server"]["descriptionfr"]="Nom du serveur de nouvelles utilisé :
 Knews est configuré pour lire les nouvelles via une connexion NNTP, et doit connaître le nom complètement qualifié du serveur de nouvelles (par exemple news.exemple.com). Si vous avez un répertoire local pour les nouvelles, vous devriez installer un serveur NNTP tel que inn2 ; dans ce cas, indiquez « localhost » comme serveur de nouvelles.
";
$elem["shared/news/server"]["default"]="";
$elem["knews/mail-name"]["type"]="string";
$elem["knews/mail-name"]["description"]="What is your system's mail name?
 Please enter the 'mail name' of your system. This is the hostname portion
 of the address to be shown on outgoing news and mail messages, and is used
 by many packages.
";
$elem["knews/mail-name"]["descriptionde"]="Was ist der Mailname Ihres Systems?
 Bitte geben Sie den 'Mailnamen' Ihres Systems an. Dieser ist der erste Teil des Rechnernamens, die bei abgeschickten News- und Mailmeldungen verwendet werden und wird von mehreren Paketen verwendet.
";
$elem["knews/mail-name"]["descriptionfr"]="Nom de votre système de courrier :
 Veuillez indiquer le nom de courrier de votre système. C'est la partie de l'adresse correspondant au nom d'hôte qui est affichée sur les nouvelles et les courriels envoyés, et elle est utilisée par de nombreux paquets.
";
$elem["knews/mail-name"]["default"]="";
PKG_OptionPageTail2($elem);
?>
