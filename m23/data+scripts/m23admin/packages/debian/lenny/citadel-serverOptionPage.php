<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("citadel-server");

$elem["citadel/ServerIPAddress"]["type"]="string";
$elem["citadel/ServerIPAddress"]["description"]="Listening address for the Citadel server:
 Please specify the IP address which the server should be listening to. If you
 specify 0.0.0.0, the server will listen on all addresses.
 .
 This can usually be left to the default unless multiple instances
 of Citadel are running on the same computer.
";
$elem["citadel/ServerIPAddress"]["descriptionde"]="Adresse, auf der Citadel auf Anfragen wartet:
 Bitte geben Sie die IP-Adressen an, auf der der Server auf Anfragen warten soll. Falls Sie 0.0.0.0 angeben, wird der Server auf allen Adressen auf Anfragen warten.
 .
 Normalerweise können Sie die Vorgabe beibehalten, falls Sie nicht mehrere Instanzen von Citadel auf dem gleichen Computer betreiben.
";
$elem["citadel/ServerIPAddress"]["descriptionfr"]="Adresse IP où Citadel sera à l'écoute :
 Veuillez indiquer l'adresses IP sur laquelle le serveur sera actif. Si vous indiquez 0.0.0.0, Citadel sera à l'écoute de toutes les adresses.
 .
 Vous pouvez normalement sauter cette étape à moins que plusieurs instances de Citadel ne tournent sur le même ordinateur.
";
$elem["citadel/ServerIPAddress"]["default"]="0.0.0.0";
$elem["citadel/LoginType"]["type"]="boolean";
$elem["citadel/LoginType"]["description"]="Enable external authentication mode?
 Please choose the user authentication mode. By default Citadel will
 use its own internal user accounts database. If you accept this
 option, Citadel users will have accounts on the host system,
 authenticated via /etc/passwd (or LDAP).
 .
 Do not accept this option unless you are sure it is required, since
 changing back requires a full reinstall of Citadel.
";
$elem["citadel/LoginType"]["descriptionde"]="Externen Authentifizierungsmodus aktivieren?
 Bitte wählen Sie die Authentifizierungsmethode für Benutzer. Standardmäßig wird Citadel seine interne Benutzerkontendatenbank verwenden. Falls Sie dieser Option zustimmen, werden die Benutzer von Citadel Konten auf dem Gastsystem haben und via /etc/passwd (oder LDAP) authentifiziert werden.
 .
 Stimmen Sie dieser Option nur zu, wenn Sie sich sicher sind, dass Sie sie benötigen. Das Zurücksetzen dieser Option benötigt eine komplette Neuinstallation von Citadel.
";
$elem["citadel/LoginType"]["descriptionfr"]="Faut-il activer le mode d'authentification ?
 Veuille choisir le mode d'authentification des utilisateurs. Par défaut, Citadel utilise son système interne de comptes. Si vous choisissez cette option, les comptes du système hôte seront utilisés, avec authentification par /etc/passwd (ou LDAP).
 .
 Ne choisissez cette option que si elle est indispensable car il n'est pas possible de la modifier sans entièrement réinstaller Citadel.
";
$elem["citadel/LoginType"]["default"]="false";
$elem["citadel/Administrator"]["type"]="string";
$elem["citadel/Administrator"]["description"]="Citadel administrator username:
 Please enter the name of the Citadel user account that should be granted
 administrative privileges once created.
";
$elem["citadel/Administrator"]["descriptionde"]="Benutzername des Citadel-Administrators:
 Geben Sie den Namen des Citadel-Benutzerkontos ein, dem nach der Erstellung administrative Privilegien gewährt werden sollen.
";
$elem["citadel/Administrator"]["descriptionfr"]="Identifiant de l'administrateur de Citadel :
 Veuillez indiquer l'identifiant qui bénéficiera des privilèges d'administration de Citadel.
";
$elem["citadel/Administrator"]["default"]="Administrator";
PKG_OptionPageTail2($elem);
?>
