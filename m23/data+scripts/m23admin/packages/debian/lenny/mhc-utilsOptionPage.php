<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mhc-utils");

$elem["shared/pilot/port"]["type"]="select";
$elem["shared/pilot/port"]["choices"][1]="None";
$elem["shared/pilot/port"]["choices"][2]="ttyS0";
$elem["shared/pilot/port"]["choices"][3]="ttyS1";
$elem["shared/pilot/port"]["choices"][4]="ttyS2";
$elem["shared/pilot/port"]["choices"][5]="ttyS3";
$elem["shared/pilot/port"]["choices"][6]="ircomm0";
$elem["shared/pilot/port"]["choices"][7]="ttyUSB0";
$elem["shared/pilot/port"]["choicesde"][1]="Keiner";
$elem["shared/pilot/port"]["choicesde"][2]="ttyS0";
$elem["shared/pilot/port"]["choicesde"][3]="ttyS1";
$elem["shared/pilot/port"]["choicesde"][4]="ttyS2";
$elem["shared/pilot/port"]["choicesde"][5]="ttyS3";
$elem["shared/pilot/port"]["choicesde"][6]="ircomm0";
$elem["shared/pilot/port"]["choicesde"][7]="ttyUSB0";
$elem["shared/pilot/port"]["choicesfr"][1]="Aucun";
$elem["shared/pilot/port"]["choicesfr"][2]="ttyS0";
$elem["shared/pilot/port"]["choicesfr"][3]="ttyS1";
$elem["shared/pilot/port"]["choicesfr"][4]="ttyS2";
$elem["shared/pilot/port"]["choicesfr"][5]="ttyS3";
$elem["shared/pilot/port"]["choicesfr"][6]="ircomm0";
$elem["shared/pilot/port"]["choicesfr"][7]="ttyUSB0";
$elem["shared/pilot/port"]["description"]="Communication port to use with the Palm:
 A symbolic file /dev/pilot may be created to the port used to talk to
 the Palm.
 .
 ttyS? are the four serial ports, ircomm0 is the IrDA (infra red) port,
 ttyUSB? are the USB ports.
 .
 To ease the use of the Palm connected to the port its access rights
 will be lowered to allow access to any user.  If it is a security
 problem for you, select \"None\" and manage the link and its access
 rights yourself.
";
$elem["shared/pilot/port"]["descriptionde"]="Kommunikationsport für die Nutzung mit dem Palm:
 Es könnte eine symbolische Verknüpfung namens /dev/pilot zu dem Port erstellt werden, über den mit dem Palm kommuniziert wird.
 .
 ttyS? sind die vier seriellen Anschlüsse, ircomm0 ist der IrDA- (Infrarot-) Anschluss und ttyUSB? sind die USB-Anschlüsse.
 .
 Um die Benutzung des mit dem Port verbundenen Palms zu vereinfachen, werden die Zugriffsrechte gelockert, so dass jeder Benutzer darauf Zugriff hat. Falls dies für Sie ein Sicherheitsproblem ist, wählen Sie »Keiner« und legen Sie die Verknüpfung und die Zugriffsrechte selbst fest.
";
$elem["shared/pilot/port"]["descriptionfr"]="Quel port de communication utiliser avec le Palm ?
 Un lien symbolique /dev/pilot peut être créé vers le port utilisé pour communiquer avec le Palm.
 .
 ttyS? sont les quatre ports série, ircomm0 est le port IrDA (infra rouge), ttyUSB? sont les ports USB.
 .
 Pour faciliter l'utilisation du Palm connecté à ce port, sa sécurité va être affaiblie en permettant un accès pour tous les utilisateurs. Si cela représente un problème de sécurité pour vous, choisissez « Aucun » et gérer le lien et ses droits d'accès vous-même.
";
$elem["shared/pilot/port"]["default"]="";
PKG_OptionPageTail2($elem);
?>
