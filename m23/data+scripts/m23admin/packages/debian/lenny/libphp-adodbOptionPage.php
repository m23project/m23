<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libphp-adodb");

$elem["libphp-adodb/pathmove"]["type"]="note";
$elem["libphp-adodb/pathmove"]["description"]="WARNING: include path for php has changed!
 libphp-adodb is no longer installed in /usr/share/adodb. New installation
 path is now /usr/share/php/adodb.
 .
 Please update your php.ini file. Maybe you must also change your
 web-server configuraton.
";
$elem["libphp-adodb/pathmove"]["descriptionde"]="Der Pfad für PHP hat sich geändert!
 libphp-adodb wird nicht mehr in /usr/share/adodb installiert. Der neue Installations-Pfad ist jetzt /usr/share/php/adodb.
 .
 Bitte aktualisieren Sie Ihre Datei php.ini. Eventuell müssen Sie auch Ihre Web-Server-Konfiguration ändern.
";
$elem["libphp-adodb/pathmove"]["descriptionfr"]="le répertoire d'installation a changé !
 libphp-adodb n'est plus installé dans /usr/share/adodb. Le nouveau chemin d'installation (« include path » pour php) est maintenant /usr/share/php/adodb.
 .
 Veuillez mettre à jour votre fichier php.ini. Par ailleurs, vous devrez peut-être également modifier la configuration de votre serveur web.
";
$elem["libphp-adodb/pathmove"]["default"]="";
PKG_OptionPageTail2($elem);
?>
