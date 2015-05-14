<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mumble-django");

$elem["mumble-django/run-mumble-django-configure"]["type"]="note";
$elem["mumble-django/run-mumble-django-configure"]["description"]="In order to complete the installation of Mumble-Django, you need to
 run the following command:
 .
   mumble-django-configure
 .
 Please refer to /usr/share/doc/mumble-django/README.Debian for more information.
";
$elem["mumble-django/run-mumble-django-configure"]["descriptionde"]="Um die Installation von Mumble-Django abzuschließen, müssen Sie
 den folgenden Befehl ausführen:
 .
   mumble-django-configure
 .
 Bitte lesen Sie /usr/share/doc/mumble-django/README.Debian für weitere Informationen.
";
$elem["mumble-django/run-mumble-django-configure"]["descriptionfr"]="Configuration indispensable pour Mumble-Django
 Afin de terminer l'installation de Mumble-Django, il est nécessaire d'utiliser la commande suivante :
 .
   mumble-django-configure
 .
 Veuillez consulter le fichier /usr/share/doc/mumble-django/README.Debian pour plus d'informations.
";
$elem["mumble-django/run-mumble-django-configure"]["default"]="";
PKG_OptionPageTail2($elem);
?>
