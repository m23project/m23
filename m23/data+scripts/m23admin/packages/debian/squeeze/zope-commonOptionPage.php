<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zope-common");

$elem["shared/zope/restart"]["type"]="select";
$elem["shared/zope/restart"]["choices"][1]="configuring";
$elem["shared/zope/restart"]["choices"][2]="end";
$elem["shared/zope/restart"]["choicesde"][1]="beim Einrichten";
$elem["shared/zope/restart"]["choicesde"][2]="am Ende";
$elem["shared/zope/restart"]["choicesfr"][1]="Lors de la configuration";
$elem["shared/zope/restart"]["choicesfr"][2]="À la fin";
$elem["shared/zope/restart"]["description"]="Automatic restart of Zope instances:
 Zope offers an extensible, modular structure that allows for the easy
 addition of extra components (products) or features. These are
 provided as packages with names that start with a 'zope-' prefix.
 Each Zope instance needs to be restarted to use any new add-on.
 .
 Please choose the default behavior of Zope instances when Zope needs
 to be restarted:
 .
  - configuring: restart instances after each product configuration;
  - end:         restart instances only once at the end of the whole
                 installation/upgrading process;
  - manually:    no automated restart.
";
$elem["shared/zope/restart"]["descriptionde"]="Automatischer Neustart von Zope-Instanzen:
 Zope bietet einen erweiterbaren, modularen Aufbau, der eine leichte Hinzunahme von Zusatzkomponenten (Produkten) oder Funktionen erlaubt. Diese werden in Paketen angeboten, deren Namen mit der Vorsilbe »zope-« beginnt. Jede Zope-Instanz muss neu gestartet werden, um eine neue Ergänzung zu verwenden.
 .
 Bitte wählen Sie das Standardverhalten von Zope-Instanzen, wenn Zope neu gestartet werden muss.
 .
  * beim Einrichten: Neustart der Instanzen nach jeder Einrichtung
                     eines Produkts;
  * am Ende:         Neustart der Instanzen nur einmal am Ende der
                     gesamten Installation bzw. des Upgrades;
  * manuell:         kein automatisierter Neustart.
";
$elem["shared/zope/restart"]["descriptionfr"]="Méthode de redémarrage des instances Zope :
 Zope comporte une structure extensible qui vous permet d'ajouter facilement des parties (produits) ou des fonctionnalités supplémentaires. Chacune d'elles peut généralement être trouvée dans des paquets dont le nom commence par le préfixe « zope- ». Zope a besoin d'être redémarré afin d'utiliser ces nouvelles extensions.
 .
 Veuillez choisir le comportement par défaut des instances Zope lorsque celles-ci nécessitent son redémarrage :
 .
  - Lors de la configuration : redémarrer les instances après chaque
                               configuration ;
  - À la fin                 : redémarrer les instances uniquement
                               lorsque le processus d'installation ou
                               de mise à niveau sera terminé ;
  - Manuellement             : ne pas redémarrer.
";
$elem["shared/zope/restart"]["default"]="end";
$elem["zope-common/remove-instance-without-data"]["type"]="select";
$elem["zope-common/remove-instance-without-data"]["choices"][1]="abort";
$elem["zope-common/remove-instance-without-data"]["choicesde"][1]="Abbruch";
$elem["zope-common/remove-instance-without-data"]["choicesfr"][1]="Abandonner";
$elem["zope-common/remove-instance-without-data"]["description"]="Action on old/incomplete zope instance '${instance}':
 An old/incomplete ${instance} instance was found in
 /var/lib/zope${zver}/instance/${instance}, with no Data.fs file.
 This installation is either incomplete or incompletely removed.
 .
 Choosing 'abort' will allow you to inspect the state of the
 instance.
 .
 Choosing 'remove and continue' will remove /var/lib/zope${zver}/instance/${instance}
 and reinstall ${instance}. Existing log files in
 /var/log/zope${zver}/${instance} and configuration files in
 /etc/zope${zver}/${instance} will be preserved.
";
$elem["zope-common/remove-instance-without-data"]["descriptionde"]="Aktion für alte/unvollständige Zope-Instanz »${instance}«:
 Eine alte/unvollständige Instanz ${instance} wurde ohne Data.fs-Datei in /var/lib/zope${zver}/instance/${instance} gefunden. Diese Installation ist entweder unvollständig oder wurde nicht vollständig entfernt.
 .
 Wählen Sie »Abbruch«, um den Zustand der Instanz zu untersuchen.
 .
 Wählen Sie »löschen und weiter«, um /var/lib/zope${zver}/instance/${instance} zu entfernen und ${instance} neu zu installieren. Existierende Protokolldateien in /var/log/zope${zver}/${instance} und Konfigurationsdateien in /etc/zope${zver}/${instance} bleiben erhalten.
";
$elem["zope-common/remove-instance-without-data"]["descriptionfr"]="Action sur l'instance Zope « ${instance} » ancienne ou incomplète :
 Une instance ancienne ou incomplète (« ${instance} ») a été trouvée dans /var/lib/zope${zver}/instance/${instance}, sans fichier de données Data.fs. Cela signifie que l'installation n'a pas été achevée ou que sa suppression n'a pas été terminée.
 .
 Choisir l'abandon de l'installation vous permettra d'examiner l'état de cette instance.
 .
 Choisir de poursuivre le processus supprimera /var/lib/zope${zver}/instance/{instance} et réinstallera ${instance}. Les journaux situés dans /var/log/zope${zver}/${instance} ainsi que les fichiers de configuration de /etc/zope${zver}/${instance} seront préservés.
";
$elem["zope-common/remove-instance-without-data"]["default"]="abort";
$elem["zope-common/keep-data-on-purge"]["type"]="boolean";
$elem["zope-common/keep-data-on-purge"]["description"]="Keep data for ${instance} on package purge?
 Purging the data files of a Zope instance on package purge will
 result in the loss of all data for that instance. These data files
 are stored in /var/lib/zope${zver}/instance/${instance}.
";
$elem["zope-common/keep-data-on-purge"]["descriptionde"]="Daten von ${instance} beim vollständigen Löschen (purge) des Pakets behalten?
 Werden die Daten-Dateien einer Zope-Instanz beim vollständigen Löschen des Pakets entfernt, bedeutet das den Verlust aller Daten dieser Zope-Instanz. Diese Daten-Dateien liegen im Verzeichnis /var/lib/zope${zver}/instance/${instance}.
";
$elem["zope-common/keep-data-on-purge"]["descriptionfr"]="Conserver les données de l'instance « ${instance} » lors de la purge du paquet ?
 La suppression définitive des fichiers de données d'une instance Zope conduira à la perte de toutes les données de cette instance. Les fichiers de données de cette instance sont stockés dans /var/lib/zope${zver}/instance/${instance}.
";
$elem["zope-common/keep-data-on-purge"]["default"]="true";
$elem["zope-common/admin-user"]["type"]="string";
$elem["zope-common/admin-user"]["description"]="Administrative user for '${instance}' Zope instance:
 Please enter the login name of the administrative user for the
 '${instance}' Zope instance. Valid names must start with a letter and
 only include letters and digits.
 .
 This will only be used for instance creation. Please use the
 following command to change the administrative user login name and
 password at a later time:
 .
 /var/lib/zope${zver}/instance/${instance}/bin/zopectl adduser <user> <password>
";
$elem["zope-common/admin-user"]["descriptionde"]="Administrativer Benutzer der Zope-Instanz »${instance}«:
 Bitte geben Sie den Loginnamen für den administrativen Benutzer der Zope-Instanz »${instance}« ein. Gültige Namen beginnen mit einem Buchstaben, gefolgt von Buchstaben und Zahlen.
 .
 Dies wird nur für die Erstellung der Instanz verwendet. Bitte verwenden Sie den folgenden Befehl, um den Loginnamen des administrativen Benutzers und dessen Passwort später zu ändern:
 .
 /var/lib/zope${zver}/instance/${instance}/bin/zopectl adduser <Benutzer> <Passwort>
";
$elem["zope-common/admin-user"]["descriptionfr"]="Administrateur de l'instance Zope « ${instance} » :
 Veuillez indiquer l'identifiant de l'utilisateur qui administrera l'instance Zope « ${instance} ». Les identifiants valables commencent par une lettre, suivie par d'autres lettres ou chiffres.
 .
 Cet identifiant ne sera utilisé que pour la création de l'instance. Veuillez utiliser la commande suivante si vous souhaitez plus tard changer l'identifiant ou le mot de passe de l'administrateur :
 .
 /var/lib/zope${zver}/instance/${instance}/bin/zopectl adduser <utilisateur> <motdepasse>
";
$elem["zope-common/admin-user"]["default"]="admin";
$elem["zope-common/admin-password"]["type"]="password";
$elem["zope-common/admin-password"]["description"]="Password for the administrative user:
 Please enter a password for the administrative user. The password
 must not be empty. The password is deleted from the configuration
 database once the instance is successfully created and cannot be
 recovered.
 .
 This will only be used for instance creation. Please use the
 following command to change the administrative user login name and
 password at a later time:
 .
 /var/lib/zope${zver}/instance/${instance}/bin/zopectl adduser <user> <password>
";
$elem["zope-common/admin-password"]["descriptionde"]="Passwort für administrativen Benutzer:
 Bitte geben Sie ein Passwort für den administrativen Benutzer ein. Das Passwort darf nicht leer sein. Das Passwort wird nach erfolgreichem Erstellen der Instanz aus der Konfigurationsdatenbank gelöscht und kann nicht wiederhergestellt werden.
 .
 Dies wird nur für die Erstellung der Instanz verwendet. Bitte verwenden Sie den folgenden Befehl, um den Loginnamen des administrativen Benutzers und dessen Passwort später zu ändern:
 .
 /var/lib/zope${zver}/instance/${instance}/bin/zopectl adduser <Benutzer> <Passwort>
";
$elem["zope-common/admin-password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez choisir un mot de passe pour l'administrateur. Le mot de passe ne doit pas être vide. Il n'est pas conservé dans la base de données de configuration après la création de l'instance.
 .
 Cet identifiant ne sera utilisé que pour la création de l'instance. Veuillez utiliser la commande suivante si vous souhaitez plus tard changer l'identifiant ou le mot de passe de l'administrateur :
 .
 /var/lib/zope${zver}/instance/${instance}/bin/zopectl adduser <utilisateur> <motdepasse>
";
$elem["zope-common/admin-password"]["default"]="";
$elem["zope-common/admin-password-confirmation"]["type"]="password";
$elem["zope-common/admin-password-confirmation"]["description"]="Password confirmation:
 Please confirm the administrative user's password.
";
$elem["zope-common/admin-password-confirmation"]["descriptionde"]="Passwort-Bestätigung:
 Bitte bestätigen Sie das Passwort des administrativen Benutzers.
";
$elem["zope-common/admin-password-confirmation"]["descriptionfr"]="Confirmation du mot de passe :
 Veuillez confirmer le mot de passe de l'administrateur.
";
$elem["zope-common/admin-password-confirmation"]["default"]="";
$elem["zope-common/instance-http-port"]["type"]="string";
$elem["zope-common/instance-http-port"]["description"]="HTTP port for this instance:
 Please enter the HTTP port number for the ${instance} instance.
 .
 Other services (e.g. FTP, WebDAV, debug) will be disabled by default.
 They can be enabled by editing /etc/zope${zver}/${instance}/zope.conf.
";
$elem["zope-common/instance-http-port"]["descriptionde"]="HTTP-Port dieser Instanz:
 Bitte den HTTP-Port für die Instanz ${instance} eingeben.
 .
 Andere Dienste (z. B. FTP, WebDAV, debug) werden standardmäßig deaktiviert. Bearbeiten Sie die Datei /etc/zope${zver}/${instance}/zope.conf, um sie zu aktivieren.
";
$elem["zope-common/instance-http-port"]["descriptionfr"]="Port HTTP pour cette instance :
 Veuillez indiquer le numéro de port HTTP pour l'instance « ${instance} ».
 .
 Les autres services (p. ex. FTP, WebDAV, debug) sont désactivés par défaut. Vous pouvez les activer en modifiant /etc/zope${zver}/${instance}/zope.conf.
";
$elem["zope-common/instance-http-port"]["default"]="";
$elem["zope-common/instance-zeo-port"]["type"]="string";
$elem["zope-common/instance-zeo-port"]["description"]="TCP port for the ZEO instance:
 Please enter the TCP port number for the ${instance} ZEO instance.
";
$elem["zope-common/instance-zeo-port"]["descriptionde"]="TCP-Port für die ZEO-Instanz:
 Bitte den HTTP-Port für die ZEO-Instanz ${instance} eingeben.
";
$elem["zope-common/instance-zeo-port"]["descriptionfr"]="Port TCP pour l'instance ZEO :
 Veuillez indiquer le numéro de port TCP pour l'instance ZEO « ${instance} ».
";
$elem["zope-common/instance-zeo-port"]["default"]="";
$elem["zope-common/admin-automatic-password"]["type"]="note";
$elem["zope-common/admin-automatic-password"]["description"]="Automatically generated user and password for this instance
 No administrative user login name or password were provided for
 this instance. They have been automatically generated.
 .
 For ${instance} Zope${zver} logins, use the following values:
 .
  - User     : ${user}
  - Password : ${password}
";
$elem["zope-common/admin-automatic-password"]["descriptionde"]="Automatisch erstellter Benutzer und Passwort für diese Instanz
 Es wurde für diese Instanz kein Loginname für den administrativer Benutzer oder dessen Passwort angegeben, deshalb wurden diese Werte automatisch erstellt.
 .
 Für Anmeldungen an ${instance} Zope${zver} verwenden Sie die folgenden Werte:
 .
  - Benutzername: ${user}
  - Passwort    : ${password}
";
$elem["zope-common/admin-automatic-password"]["descriptionfr"]="Utilisateur et mot de passe créés automatiquement pour cette instance
 Aucun utilisateur ou mot de passe n'ont été indiqués pour cette instance. Ils ont été automatiquement créés.
 .
 Pour les connexions à l'instance Zope${zver} « ${instance} », veuillez utiliser les valeurs suivantes :
 .
  - Utilisateur  : ${user}
  - Mot de passe : ${password}
";
$elem["zope-common/admin-automatic-password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
