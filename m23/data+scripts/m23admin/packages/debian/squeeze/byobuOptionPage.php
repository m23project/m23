<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("byobu");

$elem["byobu/launch-by-default"]["type"]="boolean";
$elem["byobu/launch-by-default"]["description"]="Do you want to launch Byobu at shell login for all users?
 Byobu can launch automatically at login (e.g. console, ssh), providing
 an attachable/detachable window manager on the command line.
 .
 If you select this option, Byobu will install a symlink in /etc/profile.d.
 This setting is system-wide, for all users logging into the system.
 Individual users can disable this by touching ~/.byobu/disable-autolaunch,
 or configuring with 'byobu-config'.
";
$elem["byobu/launch-by-default"]["descriptionde"]="Soll Byobu bei allen Benutzern beim Anmelden in der Shell gestartet werden?
 Byobu kann beim Anmelden automatisch gestartet werden (z.B. Konsole, SSH), um einen anfügbaren/ablösbaren Fenstermanager in der Kommandozeile zu bieten.
 .
 Wird diese Option gewählt, wird Byobu einen Symlink in /etc/profile.d erstellen. Diese Einstellung ist Systemweit und gilt für jeden Benutzer, der sich an dieses System anmeldet. Die einzelnen Benutzer können dies abschalten, indem sie die Datei ~/.byobu/disable-autolaunch anlegen oder Byobu mit 'byobu-config' konfigurieren.
";
$elem["byobu/launch-by-default"]["descriptionfr"]="";
$elem["byobu/launch-by-default"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
