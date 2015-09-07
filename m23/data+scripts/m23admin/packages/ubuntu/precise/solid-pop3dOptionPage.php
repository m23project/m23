<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("solid-pop3d");

$elem["solid-pop3d/run_mode"]["type"]="select";
$elem["solid-pop3d/run_mode"]["choices"][1]="inetd";
$elem["solid-pop3d/run_mode"]["choicesde"][1]="inetd";
$elem["solid-pop3d/run_mode"]["choicesfr"][1]="inetd";
$elem["solid-pop3d/run_mode"]["description"]="How do you want to run solid-pop3d?
 The solid-pop3d POP server can run as a standalone daemon or from inetd.
 Running from inetd is the recommended approach.
";
$elem["solid-pop3d/run_mode"]["descriptionde"]="Wie soll solid-pop3d gestartet werden?
 Der POP-Server solid-pop3d kann als eigener Daemon oder über inetd gestartet werden. Das Starten über inetd ist die empfohlene Art.
";
$elem["solid-pop3d/run_mode"]["descriptionfr"]="Méthode de démarrage de solid-pop3d :
 Le serveur POP solid-pop3d peut fonctionner comme un démon, ou bien être lancé depuis le superserveur inetd. Utiliser inetd est le choix recommandé.
";
$elem["solid-pop3d/run_mode"]["default"]="inetd";
PKG_OptionPageTail2($elem);
?>
