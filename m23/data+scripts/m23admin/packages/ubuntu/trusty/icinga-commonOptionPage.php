<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("icinga-common");

$elem["icinga/check_external_commands"]["type"]="boolean";
$elem["icinga/check_external_commands"]["description"]="Use external commands with Icinga?
 As a security feature, Icinga in its default configuration does not
 look for external commands. Enabling external commands will give
 the web server write access to the nagios command pipe and is required
 if you want to be able to use the CGI command interface.
 .
 If unsure, do not enable external commands.
";
$elem["icinga/check_external_commands"]["descriptionde"]="Externe Befehle mit Icinga verwenden?
 Aus Sicherheitsgründen schaut Icinga in seiner Standard-Konfiguration nicht nach externen Befehlen. Externe Befehle zu aktivieren würde dem Web-Server Schreibzugriff auf die Nagios-Befehlsweiterleitung geben und ist erforderlich, wenn Sie die CGI-Befehlsschnittstelle verwenden möchten.
 .
 Wenn Sie unsicher sind, aktivieren Sie nicht die Verwendung externer Befehle.
";
$elem["icinga/check_external_commands"]["descriptionfr"]="Faut-il utiliser des commandes externes avec Icinga ?
 Pour des raisons de sécurité, Icinga, dans sa configuration par défaut, n'autorise pas l'utilisation de commandes externes. L'activation de l'utilisation de commandes externes revient à autoriser le serveur web à lancer des commandes externes avec les privilèges de nagios et est requise si vous souhaitez utiliser l'interface de commandes CGI.
 .
 Dans le doute, il est déconseillé d'activer les commandes externes.
";
$elem["icinga/check_external_commands"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
