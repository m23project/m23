<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("argus-server");

$elem["argus/startup"]["type"]="select";
$elem["argus/startup"]["choices"][1]="boot";
$elem["argus/startup"]["choices"][2]="dialup";
$elem["argus/startup"]["choices"][3]="both";
$elem["argus/startup"]["choicesde"][1]="Hochfahren";
$elem["argus/startup"]["choicesde"][2]="Einwahl";
$elem["argus/startup"]["choicesde"][3]="beides";
$elem["argus/startup"]["choicesfr"][1]="Au démarrage";
$elem["argus/startup"]["choicesfr"][2]="À la connexion PPP";
$elem["argus/startup"]["choicesfr"][3]="Au démarrage et à la connexion PPP";
$elem["argus/startup"]["description"]="Startup behaviour:
 It is possible to start argus at boot time, upon initiating a PPP
 connection, both, or never, which requires user intervention in order to
 start argus.
";
$elem["argus/startup"]["descriptionde"]="Startverhalten:
 Es ist möglich, Argus beim Hochfahren des Rechners, beim Aufbau einer PPP-Verbindung, in beiden Fällen oder nie zu starten. Dann muss der Benutzer Argus selbst starten.
";
$elem["argus/startup"]["descriptionfr"]="Méthode de lancement :
 Argus peut être lancé au démarrage, à l'établissement d'une connexion PPP, à l'un et l'autre ou bien jamais. Dans ce dernier cas, une action de l'utilisateur est nécessaire pour le lancer.
";
$elem["argus/startup"]["default"]="boot";
$elem["argus/overwrite_conffile"]["type"]="boolean";
$elem["argus/overwrite_conffile"]["description"]="Should /etc/default/argus-server be overwritten?
 If you select this option, the installation script will always overwrite
 /etc/default/argus-server. Otherwise, you will manage that file yourself.
";
$elem["argus/overwrite_conffile"]["descriptionde"]="Soll die Datei /etc/default/argus-server überschrieben werden?
 Wenn Sie zustimmen, wird während der Installation die Datei /etc/default/argus-server prinzipiell überschrieben. Andernfalls müssen Sie die Datei selbst verwalten.
";
$elem["argus/overwrite_conffile"]["descriptionfr"]="Faut-il écraser le fichier /etc/default/argus-server ?
 Si vous choisissez cette option, le script d'installation réécrira systématiquement ce fichier. Dans le cas contraire, vous devrez le gérer vous-même.
";
$elem["argus/overwrite_conffile"]["default"]="";
PKG_OptionPageTail2($elem);
?>
