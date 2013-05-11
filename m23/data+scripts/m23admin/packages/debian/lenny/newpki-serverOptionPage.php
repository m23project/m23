<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("newpki-server");

$elem["newpki-server/server"]["type"]="string";
$elem["newpki-server/server"]["description"]="Host running MySQL server:
 NewPKI requires its own MySQL engine and an administrator login, as the
 server will be dynamically creating and destroying databases and schema at
 will.
";
$elem["newpki-server/server"]["descriptionde"]="Rechner, auf welchem der MySQL-Server läuft:
 NewPKI benötigt seine eigene MySQL-Umgebung sowie einen Administrator-Zugang, da der Server dynamisch bei Bedarf Datenbanken und Tabellen erstellt und löscht.
";
$elem["newpki-server/server"]["descriptionfr"]="Serveur MySQL :
 NewPKI a besoin de son propre serveur MySQL et d'un compte administrateur car il créera et supprimera dynamiquement les bases de données et modèles nécessaires.
";
$elem["newpki-server/server"]["default"]="localhost";
$elem["newpki-server/port"]["type"]="string";
$elem["newpki-server/port"]["description"]="MySQL server port:
";
$elem["newpki-server/port"]["descriptionde"]="MySQL-Server-Port:
";
$elem["newpki-server/port"]["descriptionfr"]="Port du serveur MySQL :
";
$elem["newpki-server/port"]["default"]="3306";
$elem["newpki-server/username"]["type"]="string";
$elem["newpki-server/username"]["description"]="Administrative login for MySQL server:
 There is no reason to create a login specifically for NewPKI other than
 the \"root\" administrative login provided by MySQL (although you should
 assign a password).
";
$elem["newpki-server/username"]["descriptionde"]="Administrator-Zugang für MySQL-Server:
 Es ist nicht nötig, zum vorhandenen von MySQL bereitgestellten »root« Administrator-Zugang einen Weiteren für NewPKI anzulegen (trotzdem sollten Sie ein Passwort setzen).
";
$elem["newpki-server/username"]["descriptionfr"]="Compte administrateur pour le serveur MySQL :
 Il n'est pas nécessaire de créer un compte particulier pour NewPKI autre que celui de l'administrateur « root » de MySQL auquel vous devriez assigner un mot de passe.
";
$elem["newpki-server/username"]["default"]="root";
$elem["newpki-server/password"]["type"]="password";
$elem["newpki-server/password"]["description"]="Password for administrative login:
";
$elem["newpki-server/password"]["descriptionde"]="Passwort für den Administrator-Zugang:
";
$elem["newpki-server/password"]["descriptionfr"]="Mot de passe du compte administrateur MySQL :
";
$elem["newpki-server/password"]["default"]="";
$elem["newpki-server/bindaddress"]["type"]="string";
$elem["newpki-server/bindaddress"]["description"]="Listen address for NewPKI server:
";
$elem["newpki-server/bindaddress"]["descriptionde"]="Adresse, an welcher der NewPKI-Server Verbindungen erwartet:
";
$elem["newpki-server/bindaddress"]["descriptionfr"]="Adresse d'écoute du serveur NewPKI :
";
$elem["newpki-server/bindaddress"]["default"]="127.0.0.1";
$elem["newpki-server/localport"]["type"]="string";
$elem["newpki-server/localport"]["description"]="NewPKI server port:
";
$elem["newpki-server/localport"]["descriptionde"]="NewPKI-Server-Port:
";
$elem["newpki-server/localport"]["descriptionfr"]="Port du serveur NewPKI :
";
$elem["newpki-server/localport"]["default"]="3333";
$elem["newpki-server/logfile"]["type"]="string";
$elem["newpki-server/logfile"]["description"]="Log file location:
";
$elem["newpki-server/logfile"]["descriptionde"]="Ort des Protokolls:
";
$elem["newpki-server/logfile"]["descriptionfr"]="Emplacement des fichiers journaux :
";
$elem["newpki-server/logfile"]["default"]="/var/log/newpki.log";
$elem["newpki-server/debuglevel"]["type"]="string";
$elem["newpki-server/debuglevel"]["description"]="Debug level of NewPKI [1-4]:
";
$elem["newpki-server/debuglevel"]["descriptionde"]="Debug-Stufe von NewPKI [1-4]:
";
$elem["newpki-server/debuglevel"]["descriptionfr"]="Niveau de débogage de NewPKI [1-4] :
";
$elem["newpki-server/debuglevel"]["default"]="3";
$elem["newpki-server/launch_at_start"]["type"]="boolean";
$elem["newpki-server/launch_at_start"]["description"]="Start NewPKI on boot ?
 The NewPKI can start on boot time or only if you type
 '/etc/init.d/newpki-server start' manually. Choose if you want
 it to start automatically.
";
$elem["newpki-server/launch_at_start"]["descriptionde"]="NewPKI beim Hochfahren starten?
 NewPKI kann beim Hochfahren gestartet werden oder indem Sie manuell »/etc/init.d/newpki-server start« eingeben. Wählen Sie, ob Sie es automatisch starten wollen.
";
$elem["newpki-server/launch_at_start"]["descriptionfr"]="Faut-il démarrer NewPKI au démarrage du système ?
 NewPKI peut se lancer au démarrage ou uniquement si vous tapez « /etc/init.d/newpki-server start ». Choisissez cette option si vous voulez qu'il se lance automatiquement.
";
$elem["newpki-server/launch_at_start"]["default"]="true";
$elem["newpki-server/remove_database"]["type"]="note";
$elem["newpki-server/remove_database"]["description"]="Removing databases
 ATTENTION ! You will have to remove all databases after \"purging\" the newpki-server package.
";
$elem["newpki-server/remove_database"]["descriptionde"]="Entferne Datenbanken
 ACHTUNG! Sie müssen alle Datenbanken nach dem »vollständigen Entfernen (purge)« des newpki-sever-Pakets entfernen.
";
$elem["newpki-server/remove_database"]["descriptionfr"]="Retrait des bases de données
 Attention, vous devrez manuellement supprimer toutes les bases de données après avoir retiré complètement le paquet newpki-server.
";
$elem["newpki-server/remove_database"]["default"]="";
$elem["newpki-server/newpki_user"]["type"]="string";
$elem["newpki-server/newpki_user"]["description"]="User running NewPKI:
";
$elem["newpki-server/newpki_user"]["descriptionde"]="Benutzer unter welchem NewPKI läuft:
";
$elem["newpki-server/newpki_user"]["descriptionfr"]="Utilisateur exécutant NewPKI :
";
$elem["newpki-server/newpki_user"]["default"]="newpki";
PKG_OptionPageTail2($elem);
?>
