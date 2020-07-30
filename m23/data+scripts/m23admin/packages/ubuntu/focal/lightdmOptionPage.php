<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lightdm");

$elem["lightdm/daemon_name"]["type"]="string";
$elem["lightdm/daemon_name"]["description"]="for internal use only

";
$elem["lightdm/daemon_name"]["descriptionde"]="";
$elem["lightdm/daemon_name"]["descriptionfr"]="";
$elem["lightdm/daemon_name"]["default"]="/usr/sbin/lightdm";
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
$elem["shared/default-x-display-manager"]["descriptionde"]="Vorgegebene Anzeigenverwaltung:
 Eine Anzeigenverwaltung ist ein Programm, das eine grafische Anmeldefunktion für das X-Window-System bereitstellt.
 .
 Nur eine Anzeigenverwaltung kann einen bestimmten X-Server zu verwalten, aber mehrere Anzeigenverwaltungspakete sind installiert. Bitte die Anzeigenverwaltung auswählen, die standardmäßig ausgeführt werden soll.
 .
 Mehre Anzeigenverwaltungen können gleichzeitig ausgeführt werden, wenn sie so konfiguriert werden, um verschiedene Server zu verwalten; um das zu erreichen, bitte die Anzeigenverwaltungen entsprechend konfigurieren, bitte jedes ihrer Init-Skripte in /etc/init.d bearbeiten und das Überprüfen nach einer Standardanzeigenverwaltungs deaktivieren.
";
$elem["shared/default-x-display-manager"]["descriptionfr"]="Gestionnaire d'affichage par défaut :
 Un gestionnaire d'affichage est un programme qui propose un environnement graphique de(s) session(s) des utilisateurs pour le système X Window.
 .
 Seul un gestionnaire d'affichage peut gérer un serveur X donné. Cependant, plusieurs paquets de gestion de l'affichage sont installés. Veuillez sélectionner quel gestionnaire d'affichage devrait être utilisé par défaut.
 .
 Plusieurs gestionnaires d'affichage peuvent fonctionner simultanément s'ils sont configurés pour gérer différents serveurs. Pour ce faire, configurez les gestionnaires d'affichage en conséquence, modifiez chacun de leurs scripts d'initialisation dans /etc/init.d , et désactivez la vérification d'un gestionnaire d'affichage par défaut.
";
$elem["shared/default-x-display-manager"]["default"]="";
PKG_OptionPageTail2($elem);
?>
