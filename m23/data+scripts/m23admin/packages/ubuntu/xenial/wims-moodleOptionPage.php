<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wims-moodle");

$elem["wims-moodle/remoteurl"]["type"]="string";
$elem["wims-moodle/remoteurl"]["description"]="URL to access Wims from remote machines:
 Please specify the URL that will allow users to access Wims assignments
 from Moodle.
 .
 It should include the server hostname, but not the path, and must use the
 HTTPS protocol (with the web server configured to answer HTTPS requests).
 For instance, if Wims is accessed from https://wims.example.org/wims/
 then you should enter https://wims.example.org here.
";
$elem["wims-moodle/remoteurl"]["descriptionde"]="URL um von entfernten Maschinen auf Wims zuzugreifen:
 Bitte geben Sie die URL an, die es den Benutzern erlaubt von Moodle auf Wims Aufgaben zuzugreifen.
 .
 Dies sollte nur den Rechnernamen des Servers enthalten, jedoch nicht den Pfad. Dabei muss das https-Protokoll verwendet werden (und der Webserver konfiguriert sein um https Anfragen zu beantworten). Beispielsweise, falls auf Wims von https://wims.example.org/wims/ zugegriffen wird, sollten Sie hier https://wims.example.org eingeben.
";
$elem["wims-moodle/remoteurl"]["descriptionfr"]="Adresse URL pour accéder à Wims depuis les machines distantes :
 Veuillez indiquer l'adresse URL qui autorisera les utilisateurs à accéder aux assignations Wims depuis Moodle.
 .
 Celle-ci doit inclure le nom d'hôte du serveur, sans le chemin, et doit utiliser le protocole HTTPS (le serveur web doit pouvoir répondre aux requêtes HTTPS). Par exemple, si Wims est accessible à l'adresse https://wims.example.org/wims/ alors vous devez indiquer https://wims.example.org ici.
";
$elem["wims-moodle/remoteurl"]["default"]="https://wims.domain";
PKG_OptionPageTail2($elem);
?>
