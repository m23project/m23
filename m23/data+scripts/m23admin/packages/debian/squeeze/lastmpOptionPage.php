<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lastmp");

$elem["lastmp/host"]["type"]="string";
$elem["lastmp/host"]["description"]="Host where MPD is running:
 LastMP will connect to the MPD on this host.
";
$elem["lastmp/host"]["descriptionde"]="Rechner auf dem MPD läuft:
 LastMP wird sich mit dem MPD auf diesem Rechner verbinden.
";
$elem["lastmp/host"]["descriptionfr"]="Hôte sur lequel MPD est exécuté :
 LastMP se connectera au MPD de l'hôte indiqué.
";
$elem["lastmp/host"]["default"]="localhost";
$elem["lastmp/port"]["type"]="string";
$elem["lastmp/port"]["description"]="Port on which MPD is listening:
 The connection to MPD will be made on this port.
";
$elem["lastmp/port"]["descriptionde"]="Port auf dem MPD auf Anfragen wartet:
 Die Verbindung zu MPD wird über diesen Port erfolgen.
";
$elem["lastmp/port"]["descriptionfr"]="Port sur lequel MPD est à l'écoute :
 La connexion à MPD se fera sur le port indiqué.
";
$elem["lastmp/port"]["default"]="6600";
$elem["lastmp/password"]["type"]="password";
$elem["lastmp/password"]["description"]="Password for MPD:
 If MPD requires a password to connect, this value will be used. If no
 password is required, it may be left blank.
";
$elem["lastmp/password"]["descriptionde"]="Passwort für MPD:
 Falls der MPD ein Passwort für die Verbindung benötigt, wird dieser Wert benutzt. Falls kein Passwort benötigt wird, darf er leer bleiben.
";
$elem["lastmp/password"]["descriptionfr"]="Mot de passe pour MPD :
 Si MPD demande un mot de passe pour la connexion, cette valeur sera utilisée. Si aucun mot de passe n'est nécessaire, laissez ce champ vide.
";
$elem["lastmp/password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
