<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("hoteldruid");

$elem["hoteldruid/configure-apache"]["type"]="boolean";
$elem["hoteldruid/configure-apache"]["description"]="Automatically configure the Apache web server for HotelDruid?
 HotelDruid runs on any web server supporting PHP, but automatic
 configuration can only be performed for Apache.
 .
 Once configured, HotelDruid can be accessed locally at
 \"http://localhost/hoteldruid\".
 .
 Please choose whether automatic configuration should be performed now.
";
$elem["hoteldruid/configure-apache"]["descriptionde"]="Den Apache-Webserver automatisch für HotelDruid konfigurieren?
 HotelDruid läuft auf jedem Webserver, der PHP unterstützt. Das Programm kann aber nur für Apache automatisch konfiguriert werden.
 .
 Nach der Konfiguration kann auf HotelDruid lokal unter »http://localhost/hoteldruid« zugegriffen werden.
 .
 Bitte wählen Sie, ob die automatische Konfiguration jetzt durchgeführt werden soll.
";
$elem["hoteldruid/configure-apache"]["descriptionfr"]="Faut-il configurer automatiquement le serveur web Apache pour HotelDruid ?
 HotelDruid fonctionne avec n'importe quel serveur qui gère PHP, mais seul Apache peut être configuré automatiquement.
 .
 Une fois configuré, HotelDruid est accessible localement à l'adresse « http://localhost/hoteldruid ».
 .
 Veuillez choisir si la configuration automatique doit être réalisée maintenant.
";
$elem["hoteldruid/configure-apache"]["default"]="true";
$elem["hoteldruid/restrict-localhost"]["type"]="boolean";
$elem["hoteldruid/restrict-localhost"]["description"]="Restrict HotelDruid access to localhost?
 The Apache web server can be configured to forbid HotelDruid
 connections from other machines.
 .
 It is recommended to activate this setting if HotelDruid is
 going to be used only from this machine.
";
$elem["hoteldruid/restrict-localhost"]["descriptionde"]="Den Zugriff auf HotelDruid auf den eigenen Rechner (localhost) beschränken?
 Der Apacher-Webserver kann so eingerichtet werden, dass HotelDruid-Verbindungen von anderen Maschinen nicht möglich sind.
 .
 Falls HotelDruid nur auf diesem Rechner genutzt werden soll, wird die Aktivierung dieser Einstellung empfohlen.
";
$elem["hoteldruid/restrict-localhost"]["descriptionfr"]="Faut-il restreindre l'accès à HotelDruid depuis l'hôte local ?
 Le serveur web Apache peut être configuré pour interdire les connexions à HotelDruid depuis d'autres machines.
 .
 Ce réglage devrait être activé si HotelDruid ne doit être utilisé que depuis cette machine.
";
$elem["hoteldruid/restrict-localhost"]["default"]="true";
$elem["hoteldruid/restart-webserver"]["type"]="boolean";
$elem["hoteldruid/restart-webserver"]["description"]="Reload the web server configuration for HotelDruid?
 In order to activate the new configuration for HotelDruid,
 the web server has to reload its configuration files.
";
$elem["hoteldruid/restart-webserver"]["descriptionde"]="Webserver-Konfiguration für HotelDruid erneut laden?
 Um die neue Konfiguration für HotelDruid zu aktivieren, muss der Webserver seine Konfigurationsdateien erneut laden.
";
$elem["hoteldruid/restart-webserver"]["descriptionfr"]="Faut-il recharger la configuration du serveur web pour HotelDruid ?
 Pour activer la nouvelle configuration d'HotelDruid, le serveur web doit recharger ses fichiers de configuration.
";
$elem["hoteldruid/restart-webserver"]["default"]="true";
$elem["hoteldruid/administrator-username"]["type"]="string";
$elem["hoteldruid/administrator-username"]["description"]="HotelDruid administrator username:
 Please enter a name for the administrator user, which will be able to
 manage HotelDruid's configuration and create new users. The
 username should be composed of ASCII letters and numbers only.
 .
 You can later change the administrator username and password from
 the \"User management\" page in HotelDruid. If this field is left blank,
 no user login will be required to access HotelDruid.
";
$elem["hoteldruid/administrator-username"]["descriptionde"]="Benutzername für den HotelDruid-Administrator:
 Geben Sie bitte den Namen für den Nutzer an, der HotelDruid konfigurieren und neue Benutzerkonten einrichten darf. Der Benutzername sollte nur aus ASCII-Buchstaben und -Zahlen bestehen.
 .
 Sie können später den Benutzernamen des Administrators und sein Passwort auf der HotelDruid-Seite »User management« ändern. Wenn in diesem Feld kein Wert eingetragen ist, kann auf HotelDruid ohne Anmeldung zugegriffen werden.
";
$elem["hoteldruid/administrator-username"]["descriptionfr"]="Identifiant de l'administrateur d'HotelDruid :
 Veuillez indiquer l'identifiant de l'administrateur, qui pourra gérer la configuration d'HotelDruid et créer de nouveaux utilisateurs. L'identifiant ne peut être constitué que de lettres ASCII et de chiffres.
 .
 Vous pourrez modifier l'identifiant et le mot de passe de l'administrateur plus tard depuis la page « User management » d'HotelDruid. Si ce champ est laissé vide, aucun identifiant de connexion ne sera nécessaire pour se connecter à HotelDruid.
";
$elem["hoteldruid/administrator-username"]["default"]="admin";
$elem["hoteldruid/administrator-password"]["type"]="password";
$elem["hoteldruid/administrator-password"]["description"]="HotelDruid administrator password:
 Please choose a password for the HotelDruid administrator.
";
$elem["hoteldruid/administrator-password"]["descriptionde"]="Passwort für den HotelDruid-Administrator:
 Wählen Sie bitte ein Passwort für den HotelDruid-Administrator:
";
$elem["hoteldruid/administrator-password"]["descriptionfr"]="Mot de passe de l'administrateur d'HotelDruid :
 Veuillez choisir un mot de passe pour l'administrateur d'HotelDruid.
";
$elem["hoteldruid/administrator-password"]["default"]="";
$elem["hoteldruid/confirm-password"]["type"]="password";
$elem["hoteldruid/confirm-password"]["description"]="Re-enter password to verify:
 Please enter the same \"admin\" password again to verify
 you have typed it correctly.
";
$elem["hoteldruid/confirm-password"]["descriptionde"]="Passwort zur Kontrolle erneut eingeben:
 Bitte geben Sie das gleiche Administrator-Passwort erneut ein, um sicherzustellen, dass Sie sich nicht vertippt haben.
";
$elem["hoteldruid/confirm-password"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez indiquer le même mot de passe pour l'administrateur, pour vérification.
";
$elem["hoteldruid/confirm-password"]["default"]="";
$elem["hoteldruid/administrator-failpass"]["type"]="error";
$elem["hoteldruid/administrator-failpass"]["description"]="Password input error
 The two passwords you entered were not the same. Please try again.
";
$elem["hoteldruid/administrator-failpass"]["descriptionde"]="Passwort-Eingabefehler
 Die beiden Passwörter, die Sie eingegeben haben, sind nicht identisch. Bitte versuchen Sie es erneut.
";
$elem["hoteldruid/administrator-failpass"]["descriptionfr"]="Erreur de mot de passe
 Les deux mots de passe sont différents. Veuillez recommencer.
";
$elem["hoteldruid/administrator-failpass"]["default"]="";
$elem["hoteldruid/purgedata"]["type"]="boolean";
$elem["hoteldruid/purgedata"]["description"]="Erase HotelDruid data when purging the package?
 The hoteldruid package is about to be purged from this system.
 .
 HotelDruid stores its data in \"/var/lib/hoteldruid\".
 If you choose this option, these data files will be erased now.
 .
 Refuse this option if there is operational information which should be
 kept after HotelDruid is purged.
";
$elem["hoteldruid/purgedata"]["descriptionde"]="Die Daten von HotelDruid löschen, wenn das Paket *vollständig* entfernt wird (purge)?
 Das Paket HotelDruid soll vollständig von Ihrem System entfernt werden.
 .
 HotelDruid speichert seine Daten in »/var/lib/hoteldruid«. Falls Sie diese Option wählen, werden diese Datendateien jetzt gelöscht.
 .
 Wählen Sie diese Option nicht, wenn wichtige Informationen für den Betrieb nach dem vollständigen Entfernen von HotelDruid erhalten bleiben sollen.
";
$elem["hoteldruid/purgedata"]["descriptionfr"]="Faut-il effacer les données d'HotelDuid lors de la purge du paquet ?
 Le paquet hoteldruid est sur le point d'être purgé du système.
 .
 Les données d'HotelDruid sont dans « /var/lib/hoteldruid ». Si vous acceptez cette proposition, ces fichiers de données seront effacés maintenant.
 .
 Refusez cette proposition si des renseignements opérationnels doivent être conservés après avoir purgé HotelDruid.
";
$elem["hoteldruid/purgedata"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
