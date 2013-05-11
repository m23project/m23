<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mumble-server");

$elem["mumble-server/password"]["type"]="password";
$elem["mumble-server/password"]["description"]="Password to set on SuperUser account:
 Murmur has a special account called \"SuperUser\" which bypasses all
 privilege checks.
 .
 If you set a password here, the password for the \"SuperUser\" account will
 be updated.
 .
 If you leave this blank, the password will not be changed.
";
$elem["mumble-server/password"]["descriptionde"]="Passwort für den SuperUser Benutzer:
 Murmur hat einen administrativen Benutzer, der \"SuperUser\" heisst, der alle administrativen Privilegien besitzt.
 .
 Wenn du ein Passwort nun setzt, wird das Passwort für den \"SuperUser\" Benutzer neu gesetzt.
 .
 Wenn du dieses Feld leer lässt, wird das Passwort nicht geändert.
";
$elem["mumble-server/password"]["descriptionfr"]="Mot de passe du superutilisateur de Murmur :
 Murmur utilise un compte spécial appelé \"SuperUser\" qui contourne toutes les vérifications usuelles de privilèges.
 .
 Le mot de passe indiqué ici sera affecté au compte \"SuperUser\".
 .
 Si vous laissez ce champ vide, le mot de passe ne sera pas modifié.
";
$elem["mumble-server/password"]["default"]="";
$elem["mumble-server/start_daemon"]["type"]="boolean";
$elem["mumble-server/start_daemon"]["description"]="Autostart mumble-server on server boot?
 Mumble-server (murmurd) can start automatically when the server is booted.
";
$elem["mumble-server/start_daemon"]["descriptionde"]="Mumble-server beim Booten automatisch starten?
 Mumble-server (murmurd) kann automatisch gestartet werden, wenn der Server neu gestartet wird.
";
$elem["mumble-server/start_daemon"]["descriptionfr"]="Faut-il démarrer automatiquement mumble-server au lancement de la machine ?
 Le démon de mumble (murmurd) peut être démarré automatiquement lors du lancement de la machine.
";
$elem["mumble-server/start_daemon"]["default"]="false";
$elem["mumble-server/emailfrom"]["type"]="string";
$elem["mumble-server/emailfrom"]["description"]="Email address to send registration emails from:
 Murmur comes with a web-based registration script, which will send an
 authentication code to the user by email before registration can be
 completed.
 .
 Set this to the email address you wish such authentication emails to
 come from. If you set it blank, registration will be disabled.
";
$elem["mumble-server/emailfrom"]["descriptionde"]="E-Mail Adresse von der die Registrationsemails gesendet werden sollen:
 Murmur enthält ein webbasiertes Regiestrierungsskript, welches einen Authentifizierungscode an den Benutzer über eine E-Mail sendet, damit die Registrierung abgeschlossen werden kann.
 .
 Setze dieses Feld zu der E-Mail Adresse von der die Authentifizierungs E-Mails kommen sollen. Wenn du das Feld leer lässt, wird die Registrierung deaktiviert.
";
$elem["mumble-server/emailfrom"]["descriptionfr"]="Adresse de courriel utilisée pour envoyer les souscriptions :
 Murmur est livré avec un script d'enregistrement qui enverra par courriel un code d'authentification à l'utilisateur, ce qui permet de terminer l'enregistrement.
 .
 Veuillez indiquer l'adresse électronique qui émettra les messages d'authentification. Si ce champ est laissé vide, l'enregistrement sera désactivée.
";
$elem["mumble-server/emailfrom"]["default"]="";
PKG_OptionPageTail2($elem);
?>
