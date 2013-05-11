<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("uqwk");

$elem["shared/news/server"]["type"]="string";
$elem["shared/news/server"]["description"]="What news server should be used for reading and posting news?
 What news server (NNTP server) should be used for reading and posting
 news?
 .
 Enter the fully qualified domain name of the server.
";
$elem["shared/news/server"]["descriptionde"]="Welcher Newsserver soll zum Lesen und Senden benutzt werden?
 Welcher Newsserver (NNTP Server) soll zum Lesen und Senden von News benutzt werden?
 .
 Bitte den Domainnamen (Fully Qualified Domain Name) des Servers eingeben.
";
$elem["shared/news/server"]["descriptionfr"]="Quel serveur de nouvelles faut-il utiliser pour lire et poster des nouvelles ?
 Quel est le serveur de nouvelles (serveur NNTP) qui sera utilisé pour lire et poster des nouvelles ?
 .
 Indiquez le nom de domaine pleinement qualifié du serveur.
";
$elem["shared/news/server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
