<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("samba");

$elem["samba-common/title"]["type"]="title";
$elem["samba-common/title"]["description"]="Samba server
";
$elem["samba-common/title"]["descriptionde"]="Samba-Server
";
$elem["samba-common/title"]["descriptionfr"]="Serveur Samba
";
$elem["samba-common/title"]["default"]="";
$elem["samba/run_mode"]["type"]="select";
$elem["samba/run_mode"]["choices"][1]="daemons";
$elem["samba/run_mode"]["choicesde"][1]="Daemon";
$elem["samba/run_mode"]["choicesfr"][1]="démons";
$elem["samba/run_mode"]["description"]="How do you want to run Samba?
 The Samba daemon smbd can run as a normal daemon or from inetd. Running as
 a daemon is the recommended approach.
";
$elem["samba/run_mode"]["descriptionde"]="Wie möchten Sie Samba starten?
 Der Samba-Prozess smbd kann als normaler Hintergrunddienst (Daemon) laufen oder über inetd gestartet werden. Ersteres wird jedoch empfohlen.
";
$elem["samba/run_mode"]["descriptionfr"]="Comment voulez-vous lancer Samba ?
 Le service de Samba smbd peut s'exécuter en tant que démon classique ou bien être lancé par inetd. Il est recommandé de l'exécuter en tant que démon.
";
$elem["samba/run_mode"]["default"]="daemons";
PKG_OptionPageTail2($elem);
?>
