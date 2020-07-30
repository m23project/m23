<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("open-isns-discoveryd");

$elem["open-isns-discoveryd/isns-server"]["type"]="string";
$elem["open-isns-discoveryd/isns-server"]["description"]="iSNS server name:
 The iSNS discovery daemon will connect to an iSNS server at startup.
 .
 If left blank, the discovery daemon will not be started after
 package installation, and you will have an opportunity to modify
 the configuration file, /etc/isns/isnsdd.conf.
";
$elem["open-isns-discoveryd/isns-server"]["descriptionde"]="iSNS-Servername:
 Der iSNS-Auffinde-Daemon wird sich beim Start mit einem iSNS-Server verbinden.
 .
 Falls dies leer gelassen wird, wird der iSNS-Auffinde-Daemon nicht nach der Paketinstallation gestartet und Sie werden eine Gelegenheit erhalten, die Konfigurationsdatei /etc/isns/isnsdd.conf zu ändern.
";
$elem["open-isns-discoveryd/isns-server"]["descriptionfr"]="Nom du serveur iSNS :
 Le démon de découverte iSNS se connectera à un serveur iSNS au démarrage.
 .
 Si ce champ reste vide, le démon de découverte ne sera pas démarré après l'installation du paquet et vous aurez une possibilité de modifier le fichier de configuration, /etc/isns/isnsdd.conf.
";
$elem["open-isns-discoveryd/isns-server"]["default"]="";
$elem["open-isns-discoveryd/server-pubkey"]["type"]="string";
$elem["open-isns-discoveryd/server-pubkey"]["description"]="iSNS server public key file:
 When authentication is enabled, the iSNS discovery daemon needs to
 know the public key of the iSNS server. Please provide a file name
 that contains the public key. It will then be copied to
 /etc/isns/server_key.pub.
 .
 Alternatively, you may copy the server's public key to that location
 yourself.
 .
 If left blank and /etc/isns/server_key.pub does not exist,
 authentication will remain disabled.
";
$elem["open-isns-discoveryd/server-pubkey"]["descriptionde"]="Öffentliche Schlüsseldatei des iSNS-Servers:
 Wenn Authentifizierung aktiviert ist, muss der iSNS-Auffinde-Daemon den öffentlichen Schlüssel des iSNS-Servers kennen. Bitte stellen Sie den Namen einer Datei bereit, die den öffentlichen Schlüssel enthält. Er wird dann nach /etc/isns/server_key.pub kopiert.
 .
 Alternativ könnten Sie selbst den öffentlichen Schlüssel des Servers an diese Stelle kopieren.
 .
 Falls dies leer gelassen wird und /etc/isns/server_key.pub nicht existiert, wird die Authentifizierung deaktiviert bleiben.
";
$elem["open-isns-discoveryd/server-pubkey"]["descriptionfr"]="Fichier de la clé publique du serveur iSNS :
 Quand l'authentification est activée, le démon de découverte d'iSNS doit connaître la clé publique du serveur iSNS. Veuillez fournir le nom du fichier qui contient la clé publique. Elle sera alors copiée dans /etc/isns/server_key.pub.
 .
 Autrement, vous pouvez vous-même copier la clé publique du serveur à cet emplacement.
 .
 Si ce champ reste vide, et si /etc/isns/server_key.pub n'existe pas, l'authentification ne sera pas activée.
";
$elem["open-isns-discoveryd/server-pubkey"]["default"]="";
$elem["open-isns-discoveryd/own-key"]["type"]="string";
$elem["open-isns-discoveryd/own-key"]["description"]="iSNS discovery daemon private key file:
 When authentication is enabled, the iSNS discovery daemon needs to
 have a private key, where the corresponding public key is enrolled
 with the iSNS server. Please provide a file name that contains the
 private key. It will then be copied to /etc/isns/auth_key.
 .
 Alternatively, you may copy the discovery daemon's private key to that
 location yourself.
 .
 If left blank and /etc/isns/auth_key does not exist, authentication
 will remain disabled.
";
$elem["open-isns-discoveryd/own-key"]["descriptionde"]="Private Schlüsseldatei des iSNS-Auffinde-Daemons:
 Wenn Authentifizierung aktiviert ist, muss der iSNS-Auffinde-Daemon einen privaten Schlüssel haben, wobei der zugehörige öffentliche Schlüssel mit dem iSNS-Server registriert wurde. Bitte stellen Sie einen Namen der Datei bereit, die den privaten Schlüssel enthält. Er wird nach /etc/isns/auth_key kopiert.
 .
 Alternativ können Sie den privaten Schlüssel des Auffinde-Daemons selbst an diese Stelle kopieren.
 .
 Falls dies leer gelassen wird und /etc/isns/auth_key nicht existiert, wird die Authentifizierung deaktiviert bleiben.
";
$elem["open-isns-discoveryd/own-key"]["descriptionfr"]="Fichier de la clé privée du démon de découverte iSNS :
 Quand l'authentification est activée, le démon de découverte iSNS doit avoir une clé privée dont la clé publique correspondante est inscrite dans le serveur iSNS. Veuillez fournir le nom du fichier qui contient la clé privée. Elle sera alors copiée dans /etc/isns/auth_key.
 .
 Autrement, vous pouvez vous-même copier la clé privée du démon de découverte à cet emplacement.
 .
 Si ce champ reste vide, et si /etc/isns/auth_key n'existe pas, l'authentification ne sera pas activée.
";
$elem["open-isns-discoveryd/own-key"]["default"]="";
$elem["open-isns-discoveryd/no-start"]["type"]="note";
$elem["open-isns-discoveryd/no-start"]["description"]="iSNS discovery daemon will not be started at installation
 You have not provided an iSNS server, and the configuration file
 /etc/isns/isnsdd.conf does not contain a setting either. The discovery
 daemon will therefore not be started at installation. Please configure
 the discovery daemon manually.
 .
 It will nevertheless be configured to start at boot.
";
$elem["open-isns-discoveryd/no-start"]["descriptionde"]="Der iSNS-Auffinde-Daemon wird bei der Installation nicht gestartet.
 Sie haben keinen iSNS-Server angegeben und auch die Konfigurationsdatei /etc/isns/isnsdd.conf enthält keine Einstellung. Daher wird der Auffinde-Daemon bei der Installation nicht gestartet. Bitte richten Sie den Auffinde-Daemon manuell ein.
 .
 Er wird dennoch eingerichtet, um beim Hochfahren zu starten.
";
$elem["open-isns-discoveryd/no-start"]["descriptionfr"]="Le démon de découverte iSNS ne sera pas lancé à l'installation.
 Vous n'avez pas indiqué de serveur iSNS et le fichier de configuration /etc/isns/isnsdd.conf ne renferme aucun paramètre. Le démon de découverte ne sera pas lancé à l'installation. Veuillez configurer le démon de découverte vous-même.
 .
 Il sera néanmoins configuré pour être lancé au démarrage.
";
$elem["open-isns-discoveryd/no-start"]["default"]="";
$elem["open-isns-discoveryd/purge-auth-key"]["type"]="boolean";
$elem["open-isns-discoveryd/purge-auth-key"]["description"]="Remove /etc/isns/auth_key?
 The private authentication key /etc/isns/auth_key was likely copied
 there during the installation of the open-isns-discoveryd package. If
 you are using other iSNS-related utilities (such as the iSNS server or
 isnsadm) that require this authentication key, you should not remove
 it.
 .
 Otherwise, it is safe to remove it.
";
$elem["open-isns-discoveryd/purge-auth-key"]["descriptionde"]="/etc/isns/auth_key entfernen?
 Der private Authentifizierungsschlüssel /etc/isns/auth_key wurde wahrscheinlich während der Installation des Pakets »open-isns-discoveryd« dorthin kopiert. Falls Sie andere zu iSNS gehörige Hilfswerkzeuge (wie den iSNS-Server oder isnsadm) verwenden, die diesen Authentifizierungsschlüssel benötigen, sollten Sie ihn nicht entfernen.
 .
 Andernfalls können Sie ihn gefahrlos entfernen.
";
$elem["open-isns-discoveryd/purge-auth-key"]["descriptionfr"]="Supprimer /etc/isns/auth_key ?
 La clé privée d'authentification /etc/isns/auth_key a été vraisemblablement copiée ici lors de l'installation du paquet open-isns-discoveryd. Si vous utilisez d'autres utilitaires liés à iSNS (tels que le serveur iSNS ou isnsadm) qui ont besoin de cette clé d'authentification, vous ne devez pas la supprimer.
 .
 Autrement, il est plus sûr de la supprimer.
";
$elem["open-isns-discoveryd/purge-auth-key"]["default"]="true";
$elem["open-isns-discoveryd/purge-server-key-pub"]["type"]="boolean";
$elem["open-isns-discoveryd/purge-server-key-pub"]["description"]="Remove /etc/isns/server_key.pub?
 The iSNS server's public key /etc/isns/server_key.pub was likely
 copied there during the installation of the open-isns-discoveryd
 package. If you are using other iSNS-related utilities (such as
 isnsadm) that require this public key, you should not remove it.
 .
 Otherwise, it is safe to remove it.
";
$elem["open-isns-discoveryd/purge-server-key-pub"]["descriptionde"]="/etc/isns/server_key.pub entfernen?
 Der öffentliche Schlüssel des iSNS-Servers /etc/isns/server_key.pub wurde wahrscheinlich während der Installation des Pakets »open-isns-discoveryd« dorthin kopiert. Falls Sie andere zu iSNS gehörige Hilfswerkzeuge (wie isnsadm) verwenden, die diesen Authentifizierungsschlüssel benötigen, sollten Sie ihn nicht entfernen.
 .
 Andernfalls können Sie ihn gefahrlos entfernen.
";
$elem["open-isns-discoveryd/purge-server-key-pub"]["descriptionfr"]="Supprimer /etc/isns/server_key.pub ?
 La clé publique du serveur iSNS /etc/isns/server_key.pub a été vraisemblablement copiée ici durant l'installation du paquet open-isns-discoveryd. Si vous utilisez d'autres utilitaires liés à iSNS (tel que isnsadm) qui ont besoin de cette clé publique, vous ne devez pas la supprimer.
 .
 Autrement, il est plus sûr de la supprimer.
";
$elem["open-isns-discoveryd/purge-server-key-pub"]["default"]="true";
$elem["open-isns-discoveryd/isns-server-override"]["type"]="boolean";
$elem["open-isns-discoveryd/isns-server-override"]["description"]="for internal use
 Whether the postinst script should override the ServerAddress setting
 in isnsdd.conf. Will be set by the config script.
";
$elem["open-isns-discoveryd/isns-server-override"]["descriptionde"]="";
$elem["open-isns-discoveryd/isns-server-override"]["descriptionfr"]="";
$elem["open-isns-discoveryd/isns-server-override"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
