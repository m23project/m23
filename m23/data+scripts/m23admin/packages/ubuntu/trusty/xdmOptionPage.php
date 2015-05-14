<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xdm");

$elem["shared/default-x-display-manager"]["type"]="select";
$elem["shared/default-x-display-manager"]["description"]="Default display manager:
 A display manager is a program that provides graphical login capabilities for
 the X Window System.
 .
 Only one display manager can manage a given X server, but multiple display
 manager packages are installed. Please select which display manager should
 run by default.
 .
 Multiple display managers can run simultaneously if they are configured to
 manage different servers; to achieve this, configure the display managers
 accordingly, edit each of their init scripts in /etc/init.d, and disable the
 check for a default display manager.
";
$elem["shared/default-x-display-manager"]["descriptionde"]="Standardmäßiger Display-Manager:
 Ein Display-Manager ist ein Programm, welches grafische Anmeldemöglichkeiten für das X Window System zur Verfügung stellt.
 .
 Nur ein einziger Display-Manager kann einen gegebenen X-Server verwalten, es sind allerdings mehrere Display-Manager installiert. Bitte wählen Sie den Display-Manager aus, der standardmäßig ausgeführt werden soll.
 .
 Es können mehrere Display-Manager gleichzeitig laufen, wenn diese so konfiguriert sind, dass sie verschiedene X-Server verwalten. Um dies zu erreichen, konfigurieren Sie die Display-Manager entsprechend, editieren Sie jedes ihrer Init-Skripte in /etc/init.d, und schalten Sie die Überprüfung auf einen Standard-Display-Manager ab.
";
$elem["shared/default-x-display-manager"]["descriptionfr"]="Gestionnaire graphique de session par défaut :
 Un gestionnaire graphique de session est un programme qui permet de se connecter depuis le système X Window.
 .
 Un seul gestionnaire graphique de session peut s'occuper d'un serveur X donné, bien que plusieurs gestionnaires puissent être installés simultanément. Veuillez choisir celui qui sera utilisé par défaut.
 .
 Plusieurs gestionnaires graphiques peuvent être lancés en même temps, s'ils gèrent des serveurs X différents ; pour cela, configurez correctement chacun des gestionnaires graphiques, modifiez leurs scripts de lancement dans /etc/init.d, et désactivez le test de gestionnaire graphique par défaut.
";
$elem["shared/default-x-display-manager"]["default"]="";
$elem["xdm/daemon_name"]["type"]="string";
$elem["xdm/daemon_name"]["description"]="internal use only
 This template is never shown to the user and does not require translation.

";
$elem["xdm/daemon_name"]["descriptionde"]="";
$elem["xdm/daemon_name"]["descriptionfr"]="";
$elem["xdm/daemon_name"]["default"]="/usr/bin/xdm";
$elem["xdm/stop_running_server_with_children"]["type"]="boolean";
$elem["xdm/stop_running_server_with_children"]["description"]="Stop the xdm daemon?
 The X display manager (xdm) daemon is typically stopped on package upgrade
 and removal, but it appears to be managing at least one running X session.
 .
 If xdm is stopped now, any X sessions it manages will be terminated.
 Otherwise, the new version will take effect the next time the daemon
 is restarted.
";
$elem["xdm/stop_running_server_with_children"]["descriptionde"]="Soll der xdm-Dienst gestoppt werden?
 Der X Display Manager (xdm) Dienst wird meist beim Aktualisieren oder Entfernen eines Pakets gestoppt, aber er scheint mindestens eine laufende X-Sitzung zu verwalten.
 .
 Wenn xdm jetzt gestoppt wird, werden alle Sitzungen beendet, die er gerade verwaltet. Alternativ können Sie xdm weiter laufen lassen, die neue Version wird dann aktiv, sobald der Dienst das nächste Mal gestartet wird.
";
$elem["xdm/stop_running_server_with_children"]["descriptionfr"]="Faut-il arrêter le démon xdm ?
 Le gestionnaire de sessions X (xdm) est généralement arrêté lors de la mise à jour ou de la suppression du paquet. Cependant, il semble qu'il gère actuellement encore au moins une session X.
 .
 Si xdm est arrêté maintenant, toutes les sessions X qu'il gère seront terminées. L'autre possibilité est de laisser fonctionner xdm, la nouvelle version ne devenant active qu'au prochain redémarrage du démon.
";
$elem["xdm/stop_running_server_with_children"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
