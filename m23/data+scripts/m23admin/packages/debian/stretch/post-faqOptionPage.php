<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("post-faq");

$elem["shared/news/server"]["type"]="string";
$elem["shared/news/server"]["description"]="News server:
 Please enter the fully qualified name of the NNTP server. This
 server will be used for reading and posting news.
";
$elem["shared/news/server"]["descriptionde"]="News-Server:
 Bitte geben Sie den Namen des NNTP-Servers ein. Dieser Server wird zum Lesen und Verschicken von News benutzt werden.
";
$elem["shared/news/server"]["descriptionfr"]="Serveur de nouvelles :
 Veuillez indiquer le nom complètement qualifié du serveur NNTP. Ce serveur sera utilisé pour la lecture et l'envoi des nouvelles.
";
$elem["shared/news/server"]["default"]="localhost";
PKG_OptionPageTail2($elem);
?>
