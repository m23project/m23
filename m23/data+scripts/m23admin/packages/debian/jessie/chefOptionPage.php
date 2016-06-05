<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("chef");

$elem["chef/chef_server_url"]["type"]="string";
$elem["chef/chef_server_url"]["description"]="URL of Chef server
 Please choose the full URI that clients will use to connect to the
 server (for instance: http://chef.example.com:4000).
 .
 This setting will be stored in /etc/chef/client.rb as
 \"chef_server_url\".
";
$elem["chef/chef_server_url"]["descriptionde"]="URL des Chef-Servers
 Bitte wählen Sie die vollständige URI, welche die Clients zur Verbindung mit dem Server verwenden (z. B. http://chef.example.com:4000).
 .
 Diese Einstellung wird unter »chef_server_url« in /etc/chef/client.rb gespeichert.
";
$elem["chef/chef_server_url"]["descriptionfr"]="URL du serveur Chef :
 Veuillez choisir l'URI complet que les clients utiliseront pour se connecterau serveur (par exemple : http://chef.example.com:4000).
 .
 Cette configuration est enregistrée dans le fichier /etc/chef/client.rbsous la directive « chef_server_url ».
";
$elem["chef/chef_server_url"]["default"]="";
PKG_OptionPageTail2($elem);
?>
