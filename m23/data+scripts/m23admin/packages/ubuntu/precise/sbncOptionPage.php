<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sbnc");

$elem["sbnc/start_daemon"]["type"]="boolean";
$elem["sbnc/start_daemon"]["description"]="Autostart shroudBNC on server boot?
 shroudBNC (sbnc) can start automatically when the server is booted.
";
$elem["sbnc/start_daemon"]["descriptionde"]="shroudBNC beim Server-Hochfahren automatisch starten?
 shroudBNC (sbnc) kann automatisch gestartet werden, wenn der Server hochfährt.
";
$elem["sbnc/start_daemon"]["descriptionfr"]="Faut-il démarrer automatiquement shroudBNC au lancement de la machine ?
 ShroudBNC (sbnc) peut être démarré automatiquement au lancement de la machine.
";
$elem["sbnc/start_daemon"]["default"]="true";
$elem["sbnc/host"]["type"]="string";
$elem["sbnc/host"]["description"]="IP on which shroudBNC should listen for connections:
 shroudBNC will only listen for new client connections on the given
 IP address.
 .
 If you choose 0.0.0.0 as address, shroudBNC will listen on all interfaces.
";
$elem["sbnc/host"]["descriptionde"]="IP auf der shroudBNC auf neue Verbindungen warten soll:
 shroudBNC wird nur auf der angegebenen IP-Adresse nach neuen Verbindungen suchen.
 .
 Falls Sie 0.0.0.0 als Adresse auswählen, wird shroudBNC auf allen Schnittstellen auf Verbindungen warten.
";
$elem["sbnc/host"]["descriptionfr"]="Adresse IP sur laquelle shroudBNC sera à l'écoute :
 Veuillez indiquer l'adresse IP sur laquelle SchroudBNC attendra les connexions des nouveaux clients.
 .
 Vous pouvez indiquer « 0.0.0.0 » pour que les connexions puissent être réalisées sur toutes les interfaces actives.
";
$elem["sbnc/host"]["default"]="0.0.0.0";
$elem["sbnc/port"]["type"]="string";
$elem["sbnc/port"]["description"]="TCP/IP port for shroudBNC:
 shroudBNC will listen on this port for new connections.
 .
 Please note that you have to choose a port which is higher than 1023 and
 which is not used by any other program.
";
$elem["sbnc/port"]["descriptionde"]="TCP/IP-Port für shroudBNC:
 shroudBNC wird nur auf dem angegebenen Port nach neuen Verbindungen suchen.
 .
 Sie muessen einen Port wählen, der höher als 1023 ist und bisher nicht von einem anderem Programm genutzt wird.
";
$elem["sbnc/port"]["descriptionfr"]="Port d'écoute TCP pour shroudBNC :
 Veuillez indiquer le port TCP sur lequel shroudBNC acceptera les connexions entrantes.
 .
 Veuillez noter que le port choisi doit être supérieur à 1023 et ne pas être déjà utilisé par un autre programme.
";
$elem["sbnc/port"]["default"]="9000";
$elem["sbnc/username"]["type"]="string";
$elem["sbnc/username"]["description"]="Username for the first administrative user:
 shroudBNC needs a first user with administrative rights.
 Enter here the login name for your administrator.
";
$elem["sbnc/username"]["descriptionde"]="Benutzername für den ersten administrativen Benutzer:
 shroudBNC benötigt einen ersten Benutzer mit administrativen Rechten.Geben Sie hier den Anmeldenamen fuer Ihren Administrator an.
";
$elem["sbnc/username"]["descriptionfr"]="Identifiant de l'administrateur :
 Le premier utilisateur créé pour ShroudBNC se voit attribué les privilèges d'administration. Veuillez choisir son identifiant.
";
$elem["sbnc/username"]["default"]="";
$elem["sbnc/password"]["type"]="password";
$elem["sbnc/password"]["description"]="Password to set for the first user:
 Enter here your password for your first administrative user account.
";
$elem["sbnc/password"]["descriptionde"]="Passwort für den ersten Benutzer:
 Geben Sie hier Ihr Passwort für den ersten administrativen Benutzer ein.
";
$elem["sbnc/password"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez entrer le mot de passe pour l'administrateur.
";
$elem["sbnc/password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
