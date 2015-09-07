<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cfengine2");

$elem["cfengine2/run_cfexecd"]["type"]="boolean";
$elem["cfengine2/run_cfexecd"]["description"]="Start cfexecd at boot-time?
 cfexecd is a scheduler that periodically runs cfagent, the program that
 actually does the work.
 .
 If you invoke cfagent by hand or choose to run it from cron instead, you
 may not require this.
";
$elem["cfengine2/run_cfexecd"]["descriptionde"]="Soll cfexecd beim Hochfahren gestartet werden?
 Cfexecd ist ein Steuerprogramm, welches periodisch Cfagent ausführt. Cfagent erledigt die eigentliche Arbeit.
 .
 Falls Sie Cfagent von Hand aufrufen oder es stattdessen vom cron ausführen, dann könnten Sie dies nicht benötigen.
";
$elem["cfengine2/run_cfexecd"]["descriptionfr"]="Faut-il lancer cfexecd au démarrage ?
 cfexecd est un programmateur qui lance périodiquement cfagend, le programme qui réalise réellement le travail.
 .
 Si vous lancez cfagent vous-même ou si vous préférez le lancer via « cron », vous n'en avez pas besoin.
";
$elem["cfengine2/run_cfexecd"]["default"]="false";
$elem["cfengine2/run_cfservd"]["type"]="boolean";
$elem["cfengine2/run_cfservd"]["description"]="Start cfservd at boot-time?
 cfservd manages file-serving to remote cfagent processes.
 .
 It also provides a facility for remote hosts (after authenticating) to ask
 cfservd to run cfagent.
";
$elem["cfengine2/run_cfservd"]["descriptionde"]="Soll Cfservd beim Hochfahren gestartet werden?
 Cfservd ist ein Datei-Server für nicht-lokale Cfagent-Prozesse.
 .
 Für nicht-lokale Rechner stellt es außerdem (nach Authentifizierung) eine Möglichkeit zur Verfügung, Cfservd darum zu bitten, Cfagent auszuführen.
";
$elem["cfengine2/run_cfservd"]["descriptionfr"]="Faut-il lancer cfservd au démarrage ?
 cfservd gère le partage des fichiers pour les processus distants cfagent.
 .
 Il fournit également aux hôtes distants (après authentification) la possibilité de demander à cfservd le lancement de cfagent.
";
$elem["cfengine2/run_cfservd"]["default"]="false";
$elem["cfengine2/run_cfenvd"]["type"]="boolean";
$elem["cfengine2/run_cfenvd"]["description"]="Start cfenvd at boot-time?
 cfenvd monitors the system environment (disk usage, run queue length etc.)
 and notes the mean and standard deviation for each.
 .
 Information gathered here is easily available to cfagent, and can be
 output using cfenvgraph.
";
$elem["cfengine2/run_cfenvd"]["descriptionde"]="Soll Cfenvd beim Hochfahren gestartet werden?
 Cfenvd beobachtet ihre Systemumgebung - Plattennutzung, Länge der Prozesswarteschlange (run queue length) usw. - und notiert jeweils den Durchschnitt und die Standard-Abweichung.
 .
 Hier zusammengetragene Informationen sind für cfagent problemlos verfügbar, und können mittels Cfenvgraph ausgegeben werden.
";
$elem["cfengine2/run_cfenvd"]["descriptionfr"]="Faut-il lancer cfenvd au démarrage ?
 cfenvd surveille l'environnement du système (utilisation des disques, vérification de la longueur de la file d'attente, etc.) et note la moyenne et l'écart-type de chacun des paramètres.
 .
 Les informations recueillies ici peuvent être facilement accédées par cfagent et représentées graphiquement par cfenvgraph.
";
$elem["cfengine2/run_cfenvd"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
