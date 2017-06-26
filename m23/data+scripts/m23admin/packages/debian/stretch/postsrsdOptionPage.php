<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("postsrsd");

$elem["postsrsd/domain"]["type"]="string";
$elem["postsrsd/domain"]["description"]="Local domain name to use as origin:
 Please enter the domain name to use in rewritten addresses of
 forwarded mail. The SPF policy for that domain should allow this
 mail server to send mail.
 .
 Without a configured local domain name, postsrsd will not start.
";
$elem["postsrsd/domain"]["descriptionde"]="Lokaler Domain-Name, der als Ursprung benutzt werden soll:
 Bitte geben Sie den Domain-Namen ein, der in neu geschriebenen Adressen weitergeleiteter E-Mails verwendet werden soll. Die SPF-Richtlinie für diese Domain sollte diesem Server das Versenden von E-Mails erlauben.
 .
 Ohne einen eingerichteten lokalen Domain-Namen wird Postsrsd nicht starten.
";
$elem["postsrsd/domain"]["descriptionfr"]="Nom de domaine local à utiliser comme origine :
 Veuillez entrer le nom de domaine à utiliser pour les adresses réécrites dans les courriers électroniques transférés. La règle SPF pour ce domaine doit autoriser ce serveur de courrier à envoyer du courrier.
 .
 Sans un nom de domaine local configuré, postsrsd ne démarrera pas.
";
$elem["postsrsd/domain"]["default"]="";
PKG_OptionPageTail2($elem);
?>
