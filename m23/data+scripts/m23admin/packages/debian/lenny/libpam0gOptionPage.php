<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam0g");

$elem["libpam0g/restart-services"]["type"]="string";
$elem["libpam0g/restart-services"]["description"]="Services to restart for PAM library upgrade:
 Most services that use PAM need to be restarted to use modules built for
 this new version of libpam.  Please review the following space-separated
 list of init.d scripts for services to be restarted now, and correct it
 if needed.
";
$elem["libpam0g/restart-services"]["descriptionde"]="Neu zu startende Dienste für das Upgrade der PAM-Bibliothek:
 Die meisten Dienste, die PAM verwenden, müssen neu gestartet werden, um Module dieser neuen Version von libpam verwenden zu können. Bitte überprüfen Sie die folgende, Leerzeichen-getrennte Liste von init.d-Skripten für Dienste, die jetzt neu zu starten sind, und korrigieren Sie diese Liste nötigenfalls.
";
$elem["libpam0g/restart-services"]["descriptionfr"]="Services à redémarrer lors de la mise à niveau de la bibliothèque PAM :
 La plupart des services utilisant PAM doivent être redémarrés pour utiliser les modules compilés pour cette nouvelle version de libpam. Veuillez vérifier la liste suivante de scripts de démarrage à relancer maintenant, et la corriger si nécessaire.
";
$elem["libpam0g/restart-services"]["default"]="";
$elem["libpam0g/xdm-needs-restart"]["type"]="error";
$elem["libpam0g/xdm-needs-restart"]["description"]="Display manager must be restarted manually
 The kdm, wdm, and xdm display managers require a restart for the new
 version of libpam, but there are X login sessions active on your system that
 would be terminated by this restart.  You will therefore need to restart
 these services by hand before further X logins will be possible.
";
$elem["libpam0g/xdm-needs-restart"]["descriptionde"]="Display-Manager müssen manuell neu gestartet werden
 Die Display-Manager kdm, wdm und xdm erfordern einen Neustart für die neue Version von libpam, aber auf Ihrem System sind X-Login-Sitzungen aktiv, die von diesem Neustart beendet werden würden. Sie müssen diese Dienste daher von Hand neu starten, bevor Logins unter X wieder möglich sind.
";
$elem["libpam0g/xdm-needs-restart"]["descriptionfr"]="Pas de redémarrage automatique du gestionnaire graphique de sessions
 Les gestionnaires graphiques de session kdm, wdm et xdm nécessitent un redémarrage lors de la mise à niveau de libpam, mais il existe des sessions X actives sur ce système, qui seraient fermées par ce redémarrage. Vous devez donc redémarrer ces services vous-même avant de pouvoir effectuer à nouveau une connexion au serveur graphique.
";
$elem["libpam0g/xdm-needs-restart"]["default"]="";
$elem["libpam0g/restart-failed"]["type"]="error";
$elem["libpam0g/restart-failed"]["description"]="Failure restarting some services for PAM upgrade
 The following services could not be restarted for the PAM library upgrade:
 .
 ${services}
 .
 You will need to start these manually by running
 '/etc/init.d/<service> start'.
";
$elem["libpam0g/restart-failed"]["descriptionde"]="Fehler beim Neustart einiger Dienste für das PAM-Upgrade
 Die folgenden Dienste konnten für das Upgrade der PAM-Bibliothek nicht neu gestartet werden:
 .
 ${services}
 .
 Sie müssen diese manuell neu starten, indem Sie »/etc/init.d/<Dienst> start« ausführen.
";
$elem["libpam0g/restart-failed"]["descriptionfr"]="Erreur du redémarrage de certains services pour la mise à niveau de PAM
 Les services suivants n'ont pas pu être redémarrés lors de la mise à niveau de la bibliothèque PAM :
 .
 ${services}
 .
 Vous devez les démarrer vous-même avec la commande « /etc/init.d/<service> start ».
";
$elem["libpam0g/restart-failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
