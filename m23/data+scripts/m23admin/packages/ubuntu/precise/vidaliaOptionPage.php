<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("vidalia");

$elem["vidalia/users"]["type"]="multiselect";
$elem["vidalia/users"]["description"]="Users to add to the debian-tor group:
 Users who should be able to control Tor daemon need to be added to the
 group \"debian-tor\".
";
$elem["vidalia/users"]["descriptionde"]="Benutzer, die Mitglied der Gruppe debian-tor werden sollen:
 Benutzer, die den Tor-Daemon steuern dürfen, müssen Mitglieder der Gruppe »debian-tor« werden.
";
$elem["vidalia/users"]["descriptionfr"]="Identifiants à ajouter au groupe debian-tor :
 Pour autoriser des utilisateurs à contrôler le démon Tor, il est nécessaire d'ajouter leurs identifiants dans le groupe « debian-tor ».
";
$elem["vidalia/users"]["default"]="";
PKG_OptionPageTail2($elem);
?>
