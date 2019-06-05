<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("radiusd-livingston");

$elem["radiusd-livingston/configure_clients"]["type"]="note";
$elem["radiusd-livingston/configure_clients"]["description"]="Mandatory configuration of clients for the RADIUS server
 Please copy the example file /usr/share/doc/radiusd-livingston/examples/clients
 to /etc/radiusd-livingston/clients and edit it, adding an entry for each client
 system.
";
$elem["radiusd-livingston/configure_clients"]["descriptionde"]="Zwingend erforderliche Konfiguration von Clients für den RADIUS-Server
 Bitte kopieren Sie die Beispieldatei /usr/share/doc/radiusd-livingston/examples/clients nach /etc/radiusd-livingston/clients und fügen Sie darin einen Eintrag für jedes Client-System hinzu.
";
$elem["radiusd-livingston/configure_clients"]["descriptionfr"]="Configuration obligatoire des clients RADIUS
 Veuillez copier le fichier d'exemple /usr/share/doc/radiusd-livingston/examples/clients vers /etc/radiusd-livingston/clients et modifiez-le en ajoutant une entrée pour chaque système client.
";
$elem["radiusd-livingston/configure_clients"]["default"]="";
$elem["radiusd-livingston/configure_users"]["type"]="note";
$elem["radiusd-livingston/configure_users"]["description"]="Mandatory configuration of users for the RADIUS server
 Please copy the example file /usr/share/doc/radiusd-livingston/examples/users
 to /etc/radiusd-livingston/users and edit it, adding an entry for each user
 account.
";
$elem["radiusd-livingston/configure_users"]["descriptionde"]="Zwingend erforderliche Konfiguration von Benutzern für den RADIUS-Server
 Bitte kopieren Sie die Beispieldatei /usr/share/doc/radiusd-livingston/examples/users nach /etc/radiusd-livingston/users und fügen Sie darin einen Eintrag für jedes Benutzerkonto hinzu.
";
$elem["radiusd-livingston/configure_users"]["descriptionfr"]="Configuration obligatoire des utilisateurs RADIUS
 Veuillez copier le fichier d'exemple /usr/share/doc/radiusd-livingston/examples/users vers /etc/radiusd-livingston/users et modifiez-le en ajoutant une entrée pour chaque compte utilisateur.
";
$elem["radiusd-livingston/configure_users"]["default"]="";
PKG_OptionPageTail2($elem);
?>
