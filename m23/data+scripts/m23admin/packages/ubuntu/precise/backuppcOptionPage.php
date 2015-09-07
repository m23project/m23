<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("backuppc");

$elem["backuppc/configuration-note"]["type"]="note";
$elem["backuppc/configuration-note"]["description"]="Web administration default user created
 BackupPC can be managed through its web interface:
  http://${site}/backuppc/
 .
 For that purpose, a web user named 'backuppc' with '${pass}' as password
 has been created. You can change this password by
 running 'htpasswd /etc/backuppc/htpasswd backuppc'.
";
$elem["backuppc/configuration-note"]["descriptionde"]="Standard-Benutzer für die Web-Administration erstellt
 BackupPC kann mit seiner Web-Oberfläche verwaltet werden:
  http://${site}/backuppc/
 .
 Dafür wurde ein Benutzer namens »backuppc« mit »${pass}« als Passwort eingerichtet. Sie können dieses Passwort durch das Kommando 'htpasswd /etc/backuppc/htpasswd backuppc' ändern.
";
$elem["backuppc/configuration-note"]["descriptionfr"]="Création de l'utilisateur par défaut pour l'administration Web
 BackupPC peut être géré avec une interface Web :
  http://${site}/backuppc/
 .
 À cet effet, un utilisateur web nommé « backuppc » a été créé. Son mot de passe est actuellement « ${pass} ». Vous pouvez changer ce mot de passe avec la commande « htpasswd /etc/backuppc/htpasswd backuppc ».
";
$elem["backuppc/configuration-note"]["default"]="";
$elem["backuppc/reconfigure-webserver"]["type"]="multiselect";
$elem["backuppc/reconfigure-webserver"]["description"]="Which web server would you like to reconfigure automatically:
 BackupPC supports any web server with CGI enabled, but this automatic
 configuration process only supports Apache.
";
$elem["backuppc/reconfigure-webserver"]["descriptionde"]="Welche Webserver wollen Sie automatisch neu einrichten:
 BackupPC unterstützt jeden Webserver der CGI bietet, aber dieser automatische Einrichtungsvorgang unterstützt nur Apache.
";
$elem["backuppc/reconfigure-webserver"]["descriptionfr"]="Quel serveur WEB voulez-vous configurer automatiquement :
 BackupPC fonctionne sur tout serveur Web supportant les CGI, mais la configuration automatique ne supporte qu'Apache.
";
$elem["backuppc/reconfigure-webserver"]["default"]="Default:";
$elem["backuppc/restart-webserver"]["type"]="boolean";
$elem["backuppc/restart-webserver"]["description"]="Do you want to restart the webservers now if needed?
 Remember that in order to activate the new configuration
 the webservers have to be restarted.
";
$elem["backuppc/restart-webserver"]["descriptionde"]="Wollen Sie die Webserver wenn nötig jetzt neu starten?
 Denken Sie daran, dass die Webserver neu gestartet werden müssen, damit die neuen Einstellungen wirksam werden.
";
$elem["backuppc/restart-webserver"]["descriptionfr"]="Voulez-vous relancer les serveurs Web si nécessaire ?
 Veuillez noter que, pour mettre en service la nouvelle configuration, votre serveur Web doit être redémarré.
";
$elem["backuppc/restart-webserver"]["default"]="true";
$elem["backuppc/tmppass"]["type"]="password";
$elem["backuppc/tmppass"]["description"]="Temporary password for internal use
 Temporary password. Should not be translated.

";
$elem["backuppc/tmppass"]["descriptionde"]="";
$elem["backuppc/tmppass"]["descriptionfr"]="";
$elem["backuppc/tmppass"]["default"]="";
PKG_OptionPageTail2($elem);
?>
