<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnunet-server");

$elem["gnunet-server/username"]["type"]="string";
$elem["gnunet-server/username"]["description"]="GNUnet user:
 Please choose the user that the GNUnet server process will run as.
 .
 This should be a dedicated account. If the specified account does not
 already exist, it will automatically be created, with no login shell.
";
$elem["gnunet-server/username"]["descriptionde"]="GNUnet-Benutzer:
 Bitte wählen Sie den Benutzer aus, unter dessen Kennung der GNUnet-Daemonprozess laufen wird.
 .
 Dies sollte ein dediziertes Konto sein. Falls das angegebene Konto nicht bereits existiert wird es automatisch (ohne Login-Shell) erstellt.
";
$elem["gnunet-server/username"]["descriptionfr"]="Utilisateur GNUnet :
 Veuillez indiquer l'identifiant qu'utilisera le démon GNUnet pendant son fonctionnement.
 .
 Il est conseillé d'utiliser un identifiant dédié. S'il n'existe pas, il sera créé sans connexion interactive possible (pas de « shell »).
";
$elem["gnunet-server/username"]["default"]="gnunet";
$elem["gnunet-server/groupname"]["type"]="string";
$elem["gnunet-server/groupname"]["description"]="GNUnet group:
 Please choose the group that the GNUnet server process will run as.
 .
 This should be a dedicated group, not one that already owns data.
 Only the members of this group will have access to GNUnet data, and
 be allowed to start and stop the GNUnet server.
";
$elem["gnunet-server/groupname"]["descriptionde"]="GNUnet-Gruppe:
 Bitte wählen Sie die Gruppe, unter deren Kennung der GNUnet-Daemonprozess laufen wird.
 .
 Dies sollte eine dedizierte Gruppe sein, und keine, die bereits Daten besitzt. Nur die Mitglieder dieser Gruppe werden Zugriff auf GNUnet-Daten haben und nur ihnen wird es erlaubt, den GNUnet-Server zu starten und zu beenden.
";
$elem["gnunet-server/groupname"]["descriptionfr"]="Groupe de GNUnet :
 Veuillez indiquer le groupe sous l'identité duquel s'exécutera le démon GNUnet.
 .
 Il est conseillé d'utiliser un groupe dédié, qui ne possède pas déjà de données. Seuls les membres de ce groupe auront accès aux données de GNUnet et seront autorisés à démarrer et arrêter le serveur GNUnet.
";
$elem["gnunet-server/groupname"]["default"]="gnunet";
$elem["gnunet-server/autostart"]["type"]="boolean";
$elem["gnunet-server/autostart"]["description"]="Should the GNUnet server be launched on boot?
 If you choose this option, a GNUnet server will be launched each time
 the system is started. Otherwise, you will need to launch
 GNUnet each time you want to use it.
";
$elem["gnunet-server/autostart"]["descriptionde"]="Soll der GNUnet-Daemon beim Systemstart aktiviert werden?
 Falls Sie diese Option auswählen, wird ein GNUnet-Server jedes Mal gestartet, wenn Ihre Maschine startet. Andernfalls, müssen Sie GNUnet jedes Mal starten, wenn Sie es benutzen wollen.
";
$elem["gnunet-server/autostart"]["descriptionfr"]="Faut-il lancer le démon GNUnet au démarrage du système ?
 Si vous choisissez cette option, le serveur GNUnet sera lancé à chaque démarrage de votre machine. Dans le cas contraire, vous devrez lancer vous-même GNUnet chaque fois que vous souhaiterez l'utiliser.
";
$elem["gnunet-server/autostart"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
