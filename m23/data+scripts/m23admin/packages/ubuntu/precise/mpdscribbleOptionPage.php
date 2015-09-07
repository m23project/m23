<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mpdscribble");

$elem["mpdscribble/systemwide"]["type"]="boolean";
$elem["mpdscribble/systemwide"]["description"]="Install system mpdscribble service?
 You can install mpdscribble as a system daemon.  The mpdscribble service will be started on boot.
 Note that is not necessary to run mpd as a system service as it runs fine
 when started manually using a regular user account.
";
$elem["mpdscribble/systemwide"]["descriptionde"]="Mpdscribble als Systemservice installieren?
 Sie können Mpdscribble als System-Daemon installieren. Der Mpdscribble-Service wird beim Systemstart gestartet. Beachten Sie, dass es nicht notwendig ist, Mpd als Systemservice zu betreiben, da es gut funktioniert, wenn es manuell unter Verwendung eines regulären Benutzerkontos gestartet wird.
";
$elem["mpdscribble/systemwide"]["descriptionfr"]="Faut-il installer le service système mpdscribble ?
 Vous pouvez installer mpdscribble en tant que démon. Le service mpdscribble sera activé au démarrage. Veuillez noter qu'il n'est pas nécessaire d'exécuter mpd comme un service système car il fonctionne correctement lorsqu'il est lancé manuellement sous un identifiant non privilégié.
";
$elem["mpdscribble/systemwide"]["default"]="false";
$elem["mpdscribble/user"]["type"]="string";
$elem["mpdscribble/user"]["description"]="Last.fm username:
 Enter username you use on Last.fm.
";
$elem["mpdscribble/user"]["descriptionde"]="Benutzername für Last.fm:
 Geben Sie einen Benutzernamen ein, den Sie für Last.fm verwenden.
";
$elem["mpdscribble/user"]["descriptionfr"]="Identifiant audioscrobbler :
 Veuillez indiquer votre identifiant pour audioscrobbler.
";
$elem["mpdscribble/user"]["default"]="";
$elem["mpdscribble/password"]["type"]="password";
$elem["mpdscribble/password"]["description"]="Last.fm password:
 Enter password you use on Last.fm.
";
$elem["mpdscribble/password"]["descriptionde"]="Passwort für Last.fm:
 Geben Sie das Passwort ein, das Sie für Last.fm verwenden.
";
$elem["mpdscribble/password"]["descriptionfr"]="Mot de passe audioscrobbler :
 Veuillez indiquer votre mot de passe pour audioscrobbler.
";
$elem["mpdscribble/password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
