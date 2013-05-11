<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pixelpost");

$elem["pixelpost/admin_password"]["type"]="password";
$elem["pixelpost/admin_password"]["description"]="Administrative user's password:
 Please enter the password of the administrative user ('admin').  This
 password is needed to connect to the administrative screens of
 pixelpost.
 .
 It won't be possible to post any picture in pixelpost until this
 password is set.
";
$elem["pixelpost/admin_password"]["descriptionde"]="Passwort des administrativen Benutzers:
 Bitte geben Sie das Passwort für den administrativen Benutzer (»admin«) ein. Dieses Passwort wird für die Verbindung zu den administrativen Bildschirmen von Pixelpost benötigt.
 .
 Es können keine Bilder in Pixelpost veröffentlicht werden, bevor dieses Passwort nicht gesetzt wurde.
";
$elem["pixelpost/admin_password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez définir le mot de passe de l'administrateur (« admin »). Il est indispensable pour l'accès aux écrans d'administration de pixelpost.
 .
 Il ne sera pas possible d'envoyer de photos dans pixelpost tant que ce mot de passe n'a pas été défini.
";
$elem["pixelpost/admin_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
