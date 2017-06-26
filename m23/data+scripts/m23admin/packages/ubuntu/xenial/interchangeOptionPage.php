<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("interchange");

$elem["interchange/mode"]["type"]="select";
$elem["interchange/mode"]["choices"][1]="unix mode";
$elem["interchange/mode"]["choices"][2]="internet mode";
$elem["interchange/mode"]["choicesde"][1]="Unixmodus";
$elem["interchange/mode"]["choicesde"][2]="Internetmodus";
$elem["interchange/mode"]["choicesfr"][1]="Mode UNIX";
$elem["interchange/mode"]["choicesfr"][2]="Mode Internet";
$elem["interchange/mode"]["description"]="Start mode:
 Unix mode is is the most secure way to run Interchange, for there is no
 way for systems on the internet to interact with the Interchange server.
";
$elem["interchange/mode"]["descriptionde"]="Startmodus:
 Unixmodus ist die sicherste Betriebsart für Interchange, da keine Rechner im Internet mit dem Interchange-Server in Berührung kommen können.
";
$elem["interchange/mode"]["descriptionfr"]="Mode de démarrage 
 Le mode UNIX est la façon la plus sûre de lancer Interchange car les systèmes situés sur l'Internet n'ont alors aucune possibilité d'interagir avec le serveur.
";
$elem["interchange/mode"]["default"]="unix mode";
$elem["interchange/user"]["type"]="string";
$elem["interchange/user"]["description"]="Username to run the server as:
 This determines the user for the interchange server and for file
 permissions. Please note that using another user has serious security
 implications. Don't choose root, it is not recommended and will be
 discarded anyway.
";
$elem["interchange/user"]["descriptionde"]="Benutzernamen, unter dem der Interchange-Server laufen soll:
 Hier legen Sie den Benutzer für den Interchange-Server und Dateirechte fest. Wenn Sie einen anderen Benutzer auswählen, kann das zu ernsten Sicherheitsproblemen führen. Bitte nicht »root« auswählen, dies wird nicht empfohlen und würde sowieso ignoriert werden.
";
$elem["interchange/user"]["descriptionfr"]="Identifiant qui exécutera le serveur :
 Veuillez indiquer l'identifiant qui servira à l'exécution du serveur Interchange et qui sera propriétaire des fichiers. Utiliser une valeur différente de la valeur par défaut peut avoir des conséquences importantes sur la sécurité. Ne choisissez pas « root », le superutilisateur, car ce choix déconseillé sera de toute manière refusé.
";
$elem["interchange/user"]["default"]="interchange";
$elem["interchange/createuser"]["type"]="boolean";
$elem["interchange/createuser"]["description"]="Create the user ${USER}?
";
$elem["interchange/createuser"]["descriptionde"]="Benutzer ${USER} anlegen?
";
$elem["interchange/createuser"]["descriptionfr"]="Faut-il créer l'identifiant ${USER} ?
";
$elem["interchange/createuser"]["default"]="true";
$elem["interchange/usernoroot"]["type"]="error";
$elem["interchange/usernoroot"]["description"]="Impossible to run interchange as root !
 You have been warned. Either choose an appropriate user or stay with the
 default.
";
$elem["interchange/usernoroot"]["descriptionde"]="Interchange kann nicht als Benutzer root gestartet werden!
 Sie sind gewarnt worden. Bitte wählen Sie entweder einen geeigneten Benutzer aus oder akzeptieren Sie die Voreinstellung.
";
$elem["interchange/usernoroot"]["descriptionfr"]="Impossible d'exécuter Interchange par le superutilisateur
 Il n'est pas possible (et il serait dangereux pour la sécurité du système) d'exécuter Interchange avec les privilèges du superutilisateur. Veuillez choisir un utilisateur approprié ou conserver la valeur par défaut.
";
$elem["interchange/usernoroot"]["default"]="";
$elem["interchange/group"]["type"]="string";
$elem["interchange/group"]["description"]="Group name to run the server as:
 This determines the group for the interchange server and for file
 permissions. Please note that using another user has serious security
 implications. Don't choose root, it is not recommended and will be
 discarded anyway.
";
$elem["interchange/group"]["descriptionde"]="Gruppennamen, unter dem Interchangeserver laufen soll:
 Hier legen Sie die Benutzergruppe für den Interchange-Server und Dateirechte fest. Wenn Sie eine andere Benutzergruppe auswählen, kann das zu ernsten Sicherheitsprobleme führen. Bitte nicht »root« auswählen, dies wird nicht empfohlen und würde sowieso ignoriert werden.
";
$elem["interchange/group"]["descriptionfr"]="Groupe qui exécutera le serveur :
 Veuillez indiquer le groupe qui servira à l'exécution du serveur Interchange et qui sera propriétaire des fichiers. Utiliser une valeur différente de la valeur par défaut peut avoir des conséquences importantes sur la sécurité. Ne choisissez pas « root », le groupe du superutilisateur car ce choix déconseillé sera de toute manière refusé.
";
$elem["interchange/group"]["default"]="interchange";
$elem["interchange/groupnoroot"]["type"]="error";
$elem["interchange/groupnoroot"]["description"]="Impossible to run interchange as root !
 You have been warned. Either choose an appropriate group or stay with the
 default.
";
$elem["interchange/groupnoroot"]["descriptionde"]="Interchange kann nicht als Benutzer root gestartet werden!
 Sie sind gewarnt worden. Bitte wählen Sie entweder eine geeignete Benutzergruppe aus oder akzeptieren Sie die Voreinstellung.
";
$elem["interchange/groupnoroot"]["descriptionfr"]="Impossible d'exécuter Interchange par le superutilisateur
 Il n'est pas possible (et il serait dangereux pour la sécurité du système) d'exécuter Interchange avec les privilèges du groupe du superutilisateur. Veuillez choisir un groupe approprié ou conservez la valeur par défaut.
";
$elem["interchange/groupnoroot"]["default"]="";
$elem["interchange/creategroup"]["type"]="boolean";
$elem["interchange/creategroup"]["description"]="Create the group ${GROUP}?
";
$elem["interchange/creategroup"]["descriptionde"]="Gruppe ${GROUP} anlegen?
";
$elem["interchange/creategroup"]["descriptionfr"]="Faut-il créer le groupe ${GROUP} ?
";
$elem["interchange/creategroup"]["default"]="true";
$elem["interchange/olduser"]["type"]="string";
$elem["interchange/olduser"]["description"]="

";
$elem["interchange/olduser"]["descriptionde"]="";
$elem["interchange/olduser"]["descriptionfr"]="";
$elem["interchange/olduser"]["default"]="\"\"";
$elem["interchange/docroot"]["type"]="string";
$elem["interchange/docroot"]["description"]="Static HTML files location:
 Catalog installations need a directory where HTML files can be placed.
";
$elem["interchange/docroot"]["descriptionde"]="Pfad für statische HTML-Dateien:
 Kataloginstallationen benötigen ein Verzeichnis für die Ablage von HTML-Dateien.
";
$elem["interchange/docroot"]["descriptionfr"]="Emplacement des fichiers HTML statiques :
 Les installations de catalogue doivent choisir un répertoire où seront gardées les fichiers HTML.
";
$elem["interchange/docroot"]["default"]="/var/www/shops";
$elem["interchange/gpghome"]["type"]="string";
$elem["interchange/gpghome"]["description"]="Directory for GnuPG public keyring:
 For enhanced security, credit card information retrieved from customers
 will be encrypted and mailed to the shop owner instead of storing it on
 the server.
 .
 Please choose the directory Interchange uses for the GnuPG
 public keyring.
";
$elem["interchange/gpghome"]["descriptionde"]="Verzeichnis für den öffentlichen Schlüsselbund für GnuPG:
 Zur Erhöhung der Sicherheit werden Kreditkarteninformationen von Kunden verschlüsselt und an den Eigentümer des Ladens per E-Mail versandt, statt auf dem Server gespeichert zu werden.
 .
 Bitte wählen Sie das Verzeichnis aus, das GnuPG für den öffentlichen Schlüsselbund verwendet.
";
$elem["interchange/gpghome"]["descriptionfr"]="Répertoire pour le trousseau de clés publiques de GnuPG :
 Pour une meilleure sécurité, les informations sur les cartes de crédit envoyées par les clients seront chiffrées et envoyées par courriel au propriétaire du magasin virtuel sans être conservées sur le serveur.
 .
 Veuillez choisir le répertoire où Interchange conservera le trousseau de clés publiques GnuPG.
";
$elem["interchange/gpghome"]["default"]="/var/lib/interchange/.gnupg";
$elem["interchange/traffic"]["type"]="select";
$elem["interchange/traffic"]["choices"][1]="low";
$elem["interchange/traffic"]["choices"][2]="high";
$elem["interchange/traffic"]["choicesde"][1]="niedrig";
$elem["interchange/traffic"]["choicesde"][2]="hoch";
$elem["interchange/traffic"]["choicesfr"][1]="Bas";
$elem["interchange/traffic"]["choicesfr"][2]="Haut";
$elem["interchange/traffic"]["description"]="Set of server parameters:
 You can choose different sets of server parameters. Any store based on the
 foundation demo will change its behaviour too. If rpc is selected, the
 Interchange server will run in PreFork mode.
";
$elem["interchange/traffic"]["descriptionde"]="Satz an Serverparametern:
 Es können verschiedene Gruppen von Serverparametern ausgewählt werden. Jeder Laden, der auf dem Foundation-Demo beruht, ist ebenso betroffen. Bei Auswahl von rpc wird der Interchange-Server im PreFork-Modus gestartet.
";
$elem["interchange/traffic"]["descriptionfr"]="Jeu de paramètres du serveur :
 Veuillez choisir l'un des jeux de paramètres du serveur. Tout magasin construit à partir de la démonstration verra son comportement modifié également. Si « RPC » est choisi, le serveur fonctionnera en mode « PreFork ».
";
$elem["interchange/traffic"]["default"]="low";
$elem["interchange/full_url"]["type"]="boolean";
$elem["interchange/full_url"]["description"]="Enable the FullURL directive?
 This setting determines if the whole URL is considered while checking for
 the corresponding catalog.
";
$elem["interchange/full_url"]["descriptionde"]="FullURL-Direktive aktivieren?
 Diese Einstellung legt fest, ob die komplette URL für die Auswahl des Katalogs herangezogen wird.
";
$elem["interchange/full_url"]["descriptionfr"]="Faut-il activer la directive « FullURL » ?
 Veuillez choisir si l'URL entière est prise en compte lors de la vérification du catalogue correspondant.
";
$elem["interchange/full_url"]["default"]="false";
$elem["interchange/cansoap"]["type"]="note";
$elem["interchange/cansoap"]["description"]="SOAP server not available
 Because the Perl module SOAP::Lite is not installed, you are unable to run
 the Interchange SOAP server. To change this, install the libsoap-lite-perl
 Debian package and run interchangeconfig SOAP=1.
";
$elem["interchange/cansoap"]["descriptionde"]="SOAP-Server ist nicht verfügbar
 Da das Perl-Modul SOAP::Lite nicht installiert ist, können Sie den Interchange SOAP-Server nicht ausführen. Um dies zu ändern, installieren Sie das Debian-Paket libsoap-lite-perl und führen sie »interchangeconfig SOAP=1« aus.
";
$elem["interchange/cansoap"]["descriptionfr"]="Serveur SOAP indisponible
 Vous ne pouvez pas utiliser le serveur SOAP d'Interchange car le module Perl SOAP::Lite n'est pas installé. Pour corriger cela, veuillez installer le paquet libsoap-lite-perl et utiliser la commande « interchangeconfig SOAP=1 ».
";
$elem["interchange/cansoap"]["default"]="";
$elem["interchange/soap"]["type"]="boolean";
$elem["interchange/soap"]["description"]="Enable the SOAP server?
 This setting determines if the SOAP server is started or not.
";
$elem["interchange/soap"]["descriptionde"]="SOAP-Server aktivieren?
 Mit dieser Einstellung entscheiden Sie, ob der SOAP-Server gestartet wird oder nicht.
";
$elem["interchange/soap"]["descriptionfr"]="Faut-il activer le serveur SOAP ?
 Veuillez choisir si le serveur SOAP sera démarré.
";
$elem["interchange/soap"]["default"]="false";
$elem["interchange/robots"]["type"]="boolean";
$elem["interchange/robots"]["description"]="Enable robots settings?
 The Interchange Debian package uses a separate configuration file
 /etc/interchange/robots.cfg for the directives RobotUA, RobotIP and
 RobotHost. It is recommended to include these settings so that Interchange can
 distinguish between robots and ordinary users.
";
$elem["interchange/robots"]["descriptionde"]="Robot-Einstellungen aktivieren?
 Das Interchange-Debian-Paket benutzt eine zusätzliche Konfigurationsdatei /etc/interchange/robots.cfg für die Direktiven RobotUA, RobotIP und RobotHost. Das Einbinden dieser Einstellungen wird empfohlen, damit Interchange zwischen normalen Benutzern und Robots unterscheiden kann.
";
$elem["interchange/robots"]["descriptionfr"]="Faut-il activer les réglages pour les robots ?
 Le paquet d'Interchange utilise un fichier de configuration distinct /etc/interchange/robots.cfg pour les directives RobotUA, RobotIP et RobotHost. Vous devriez activer ces réglages afin qu'Interchange puisse faire la différence entre les robots et les utilisateurs ordinaires.
";
$elem["interchange/robots"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
