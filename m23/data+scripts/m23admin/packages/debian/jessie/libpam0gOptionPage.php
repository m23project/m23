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
 Die meisten Dienste, die PAM verwenden, müssen neu gestartet werden, um Module dieser neuen Version von libpam verwenden zu können. Bitte überprüfen Sie die folgende, Leerzeichen-getrennte Liste von init.d-Skripten für Dienste, die jetzt neu zu starten sind, und korrigieren Sie diese Liste falls notwendig.
";
$elem["libpam0g/restart-services"]["descriptionfr"]="Services à redémarrer lors de la mise à niveau de la bibliothèque PAM :
 La plupart des services utilisant PAM doivent être redémarrés pour utiliser les modules compilés pour cette nouvelle version de libpam. Veuillez vérifier la liste suivante de scripts de démarrage à relancer maintenant, et la corriger si nécessaire.
";
$elem["libpam0g/restart-services"]["default"]="";
$elem["libpam0g/xdm-needs-restart"]["type"]="error";
$elem["libpam0g/xdm-needs-restart"]["description"]="Display manager must be restarted manually
 The wdm and xdm display managers require a restart for the new version of
 libpam, but there are X login sessions active on your system that would be
 terminated by this restart.  You will therefore need to restart these
 services by hand before further X logins will be possible.
";
$elem["libpam0g/xdm-needs-restart"]["descriptionde"]="Display-Manager müssen manuell neu gestartet werden
 Die Display-Manager wdm und xdm erfordern einen Neustart für die neue Version von libpam, aber auf Ihrem System sind X-Login-Sitzungen aktiv, die durch diesen Neustart beendet würden. Sie müssen diese Dienste daher von Hand neu starten, bevor Logins unter X wieder möglich sind.
";
$elem["libpam0g/xdm-needs-restart"]["descriptionfr"]="Pas de redémarrage automatique du gestionnaire graphique de sessions
 Les gestionnaires graphiques de session wdm et xdm nécessitent un redémarrage lors de la mise à niveau de libpam, mais il existe des sessions X actives sur ce système, qui seraient fermées par ce redémarrage. Vous devez donc redémarrer ces services vous-même avant de pouvoir effectuer à nouveau une connexion au serveur graphique.
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
$elem["libraries/restart-without-asking"]["type"]="boolean";
$elem["libraries/restart-without-asking"]["description"]="Restart services during package upgrades without asking?
 There are services installed on your system which need to be restarted
 when certain libraries, such as libpam, libc, and libssl, are upgraded.
 Since these restarts may cause interruptions of service for the system,
 you will normally be prompted on each upgrade for the list of services
 you wish to restart.  You can choose this option to avoid being prompted;
 instead, all necessary restarts will be done for you automatically so you
 can avoid being asked questions on each library upgrade.
";
$elem["libraries/restart-without-asking"]["descriptionde"]="Dienste bei Paket-Upgrades ohne Rückfrage neu starten?
 Auf Ihrem System sind Dienste installiert, die beim Upgrade bestimmter Bibliotheken, wie Libpam, Libc und Libssl, neu gestartet werden müssen. Da diese Neustarts zu Unterbrechungen der Dienste für dieses System führen können, werden Sie normalerweise bei jedem Upgrade über die Liste der neu zu startenden Dienste befragt. Sie können diese Option wählen, um diese Abfrage zu vermeiden; stattdessen werden alle notwendigen Dienste-Neustarts für Sie automatisch vorgenommen und die Beantwortung von Fragen bei jedem Upgrade von Bibliotheken vermieden.
";
$elem["libraries/restart-without-asking"]["descriptionfr"]="Redémarrer les services automatiquement lors des mises à jour ?
 Certains services installés sur le système demandent à être redémarrés lors de la mise à jour de certaines bibliothèques (par exemple libpam, libc ou encore libssl). Puisque de tels redémarrages peuvent causer des interruptions de service, une confirmation est habituellement demandée lors de chaque mise à jour, en présentant la liste des services à redémarrer. Vous pouvez sélectionner cette option pour éviter ces demandes interactives de confirmation. Tous les redémarrages nécessaires seront alors effectués automatiquement lors de chaque mise à jour de bibliothèque.
";
$elem["libraries/restart-without-asking"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
