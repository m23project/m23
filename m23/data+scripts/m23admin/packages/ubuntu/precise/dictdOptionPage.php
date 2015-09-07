<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dictd");

$elem["dictd/run_mode"]["type"]="select";
$elem["dictd/run_mode"]["choices"][1]="daemon";
$elem["dictd/run_mode"]["choices"][2]="inetd";
$elem["dictd/run_mode"]["choicesde"][1]="Daemon";
$elem["dictd/run_mode"]["choicesde"][2]="Inetd";
$elem["dictd/run_mode"]["choicesfr"][1]="démon";
$elem["dictd/run_mode"]["choicesfr"][2]="inetd";
$elem["dictd/run_mode"]["description"]="Method for running dictd:
 The dictd server can be run either as a stand-alone daemon or from inetd. You can also
 disable it entirely.
 .
 It is recommended to run it as a daemon.
";
$elem["dictd/run_mode"]["descriptionde"]="Betriebsart für Dictd:
 Der Dictd-Server kann entweder als unabhängiger Daemon laufen oder von Inetd ausgeführt werden. Sie können ihn auch komplett deaktivieren.
 .
 Es wird empfohlen, ihn als Daemon zu betreiben.
";
$elem["dictd/run_mode"]["descriptionfr"]="Méthode d'exécution de dictd :
 Le serveur dictd peut être exécuté soit comme démon autonome, soit par inetd. Il est aussi possible de le désactiver complètement.
 .
 Il est recommandé de l'exécuter comme démon.
";
$elem["dictd/run_mode"]["default"]="daemon";
PKG_OptionPageTail2($elem);
?>
