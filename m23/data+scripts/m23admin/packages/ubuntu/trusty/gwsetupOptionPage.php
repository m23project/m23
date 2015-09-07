<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gwsetup");

$elem["gwsetup/port"]["type"]="string";
$elem["gwsetup/port"]["description"]="Gwsetup daemon listening port:
 The port used by the gwsetup daemon for incoming connections may be configured here.
 .
 Choose a port number above 1023 for the port gwsetup will listen to.
 .
 If unsure, leave the default value of 2316.
";
$elem["gwsetup/port"]["descriptionde"]="Port für den gwsetup-Daemon:
 Der Port, der vom gwsetup-Daemon für ankommende Verbindungen genutzt wird, kann hier konfiguriert werden.
 .
 Wählen Sie eine Portnummer über 1023 für den Port, auf dem gwsetup »lauschen« soll.
 .
 Wenn Sie sich unsicher sind, belassen Sie den Standardwert auf 2316.
";
$elem["gwsetup/port"]["descriptionfr"]="Port d'écoute du démon gwsetup :
 Le port utilisé par le démon gwsetup pour les connexions entrantes peut être configuré ici.
 .
 Choisissez un numéro de port supérieur à 1023 pour le port où gwsetup écoutera.
 .
 Si vous avez des doutes, laissez la valeur par défaut de 2316.
";
$elem["gwsetup/port"]["default"]="2316";
$elem["gwsetup/run_mode"]["type"]="select";
$elem["gwsetup/run_mode"]["choices"][1]="Always on";
$elem["gwsetup/run_mode"]["choicesde"][1]="Immer aktiv";
$elem["gwsetup/run_mode"]["choicesfr"][1]="Toujours actif";
$elem["gwsetup/run_mode"]["description"]="Gwsetup start mode:
 The Gwsetup daemon can be launched automatically at startup,
 manually by the system administrator, or by any user when it is needed.
 .
 If you choose \"Always on\", gwsetup will be launched at the system startup.
 .
 If you want to prevent the automatic startup of gwsetup, then choose \"Manual\".
";
$elem["gwsetup/run_mode"]["descriptionde"]="Gwsetup Start-Modus:
 Der Gwsetup-Daemon gwd kann automatisch beim Startvorgang, manuell vom Systemadministrator oder bei Bedarf von einem Benutzer gestartet werden.
 .
 Wenn Sie »Immer aktiv« auswählen, wird gwsetup bei jedem Starvorgang gestartet.
 .
 Wenn Sie den automatischen Start von gwsetup verhindern möchten, z.B. weil Sie es vorziehen, das Programm als CGI laufen zu lassen, dann wählen Sie bitte »Manuell«.
";
$elem["gwsetup/run_mode"]["descriptionfr"]="Mode de démarrage de gwsetup :
 Le démon gwsetup peut être lancé automatiquement au démarrage du système, manuellement par l'administrateur du système ou par tout utilisateur quand il en a besoin.
 .
 Si vous choisissez « Toujours actif », gwsetup sera lancé au démarrage du système.
 .
 Si vous préférez éviter le démarrage automatique de gwsetup, choisissez alors « Démarrage manuel ».
";
$elem["gwsetup/run_mode"]["default"]="Always on";
PKG_OptionPageTail2($elem);
?>
