<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wims-moodle");

$elem["wims-moodle/remoteurl"]["type"]="string";
$elem["wims-moodle/remoteurl"]["description"]="Please type the base address to access Wims from remote machines:
 The base address to access Wims will be needed to enable users to access
 their Wims assignments from Moodle.
 .
 If you can access Wims at https://wims.mycollege.uk/wims/, you should
 answer https://wims.mycollege.uk
 .
 Please notice that the protocol should be https. Apache must be configured
 to be able to answer https requests.
";
$elem["wims-moodle/remoteurl"]["descriptionde"]="";
$elem["wims-moodle/remoteurl"]["descriptionfr"]="Veuillez donner l'adresse de base pour accéder à Wims depuis des machines distantes :
 On va avoir besoin de l'adresse de base de Wims pour permettre aux utilisateurs d'accéder à leurs devoirs Wims depuis Moodle.
 .
 Si on accède à Wims par https://wims.monlycee.fr/wims/, la réponse devrait être https://wims.monlycee.fr
 .
 Veuillez noter que le protocole devrait être https. Apache doit être configué pour pouvoir honorer des requêtes https.
";
$elem["wims-moodle/remoteurl"]["default"]="https://wims.domain";
PKG_OptionPageTail2($elem);
?>
