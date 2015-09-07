<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tin");

$elem["shared/news/server"]["type"]="string";
$elem["shared/news/server"]["description"]="Enter the fully qualified domain name of your news server
 What news server (NNTP server) should be used for reading and posting
 news?
";
$elem["shared/news/server"]["descriptionde"]="Bitte geben Sie den vollständigen Domainnamen (FQDN) Ihres Servers ein.
 Welcher Newsserver (NNTP-Server) soll für Lesen und Posten von News genutzt werden?
";
$elem["shared/news/server"]["descriptionfr"]="Nom de domaine pleinement qualifié du serveur de nouvelles :
 Quel est le serveur de nouvelles (serveur NNTP) qui sera utilisé pour lire et poster des nouvelles ?
";
$elem["shared/news/server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
