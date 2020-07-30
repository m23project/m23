<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("privoxy");

$elem["privoxy/listen-address"]["type"]="string";
$elem["privoxy/listen-address"]["description"]="Adresses on with Privoxy listens:
 Please enter a space separated list of address:port combinations on
 which Privoxy will listen for client requests.
";
$elem["privoxy/listen-address"]["descriptionde"]="Adressen, unter denen Privoxy auf Anfragen hört:
 Bitte geben Sie eine durch Leerzeichen getrennte Liste von Adresse:Port Kombinationen an, unter denen Privoxy auf Anfragen hört.
";
$elem["privoxy/listen-address"]["descriptionfr"]="Adresse(s) d'écoute pour Privoxy :
 Veuillez indiquer une liste séparée par des espaces des adresses de la forme adresse:port sur lesquelles Privoxy attend des requêtes de clients.
";
$elem["privoxy/listen-address"]["default"]="127.0.0.1:8118 [::1]:8118";
PKG_OptionPageTail2($elem);
?>
