<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("msmtp");

$elem["msmtp/sysconfig"]["type"]="boolean";
$elem["msmtp/sysconfig"]["description"]="Create a system wide configuration file?
 msmtp has a sendmail emulation mode which allow to create a default
 system account that can be used by any user.
";
$elem["msmtp/sysconfig"]["descriptionde"]="Soll eine systemweite Konfigurationsdatei erstellt werden?
 msmtp verfügt über einen sendmail-Emulationsmodus, welcher es erlaubt, ein Standard-Systemkonto anzulegen, das von jedem Benutzer verwendet werden kann.
";
$elem["msmtp/sysconfig"]["descriptionfr"]="Faut-il créer un fichier de configuration pour l'ensemble du système ?
 Msmtp comporte un mode d'émulation de sendmail permettant de créer un compte système par défaut qui peut servir à tout utilisateur.
";
$elem["msmtp/sysconfig"]["default"]="false";
$elem["msmtp/host"]["type"]="string";
$elem["msmtp/host"]["description"]="SMTP server hostname:
";
$elem["msmtp/host"]["descriptionde"]="SMTP-Servername:
";
$elem["msmtp/host"]["descriptionfr"]="Nom d'hôte du serveur SMTP :
";
$elem["msmtp/host"]["default"]="";
$elem["msmtp/port"]["type"]="string";
$elem["msmtp/port"]["description"]="SMTP port number:
";
$elem["msmtp/port"]["descriptionde"]="SMTP-Portnummer:
";
$elem["msmtp/port"]["descriptionfr"]="Numéro de port SMTP :
";
$elem["msmtp/port"]["default"]="25";
$elem["msmtp/auto_from"]["type"]="boolean";
$elem["msmtp/auto_from"]["description"]="Generate an envelope-from address?
 msmtp can generate an envelope-from address based on the login name and the
 \"maildomain\" configuration variable.
";
$elem["msmtp/auto_from"]["descriptionde"]="Erstelle eine envelope-from-Adresse?
 msmtp kann eine envelope-from-Adresse anhand des Anmeldenamens in Verbindung mit der Konfigurationsvariable »maildomain« erstellen.
";
$elem["msmtp/auto_from"]["descriptionfr"]="Faut-il créer une adresse « envelope-from » ?
 Msmtp peut créer une adresse « envelope-from » à partir de l'identifiant de l'utilisateur et de la variable de configuration « maildomain ».
";
$elem["msmtp/auto_from"]["default"]="true";
$elem["msmtp/maildomain"]["type"]="string";
$elem["msmtp/maildomain"]["description"]="Domain to use for the envelope-from address:
";
$elem["msmtp/maildomain"]["descriptionde"]="Domain, welche für die envelope-from-Adresse benutzt wird:
";
$elem["msmtp/maildomain"]["descriptionfr"]="Domaine à utiliser pour l'adresse « envelope-from » :
";
$elem["msmtp/maildomain"]["default"]="";
$elem["msmtp/tls"]["type"]="boolean";
$elem["msmtp/tls"]["description"]="Use TLS to encrypt connection?
 Connection to remote hosts can be encrypted using TLS. This option should be
 enabled if the remote server supports such connections.
";
$elem["msmtp/tls"]["descriptionde"]="Soll TLS zum Verschlüsseln der Verbindung verwendet werden?
 Verbindungen zu entfernten Rechnern können mit TLS verschlüsselt werden. Diese Option sollte aktiviert werden, falls die Gegenstelle solche Verbindungen unterstützt.
";
$elem["msmtp/tls"]["descriptionfr"]="Faut-il utiliser TLS pour chiffrer la connexion ?
 La connexion à un hôte distant peut être chiffrée en utilisant le protocole TLS (« Transport Layer Security », anciennement nommé « Secure Socket Layer » ou SSL). Vous devriez vérifier que le serveur distant accepte ce type de connexion avant de choisir cette option.
";
$elem["msmtp/tls"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
