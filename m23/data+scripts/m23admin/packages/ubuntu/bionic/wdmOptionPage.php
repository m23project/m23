<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wdm");

$elem["shared/default-x-display-manager"]["type"]="select";
$elem["shared/default-x-display-manager"]["description"]="Desired default display manager.
 A display manager is a program that provides graphical login capabilities
 for the X Window System.
 .
 Only one display manager can manage a given X server, but multiple display
 manager packages are installed.  Please select which display manager
 should run by default.
 .
 (Multiple display managers can run simultaneously if they are configured
 to manage different servers; to achieve this, configure the display
 managers accordingly, edit each of their init scripts in /etc/init.d, and
 disable the check for a default display manager.)
";
$elem["shared/default-x-display-manager"]["descriptionde"]="";
$elem["shared/default-x-display-manager"]["descriptionfr"]="Choix du gestionnaire de session par défaut :
 Un gestionnaire de session est un programme qui fournit une fenêtre de connexion graphique pour le système de fenêtrage X.
 .
 Un seul gestionnaire de session peut gérer un serveur X donné, mais plusieurs paquets de gestionnaire de session sont installés. Veuillez sélectionner le gestionnaire de session que vous souhaitez lancer par défaut.
 .
 Plusieurs gestionnaires de session peuvent être démarrés en même temps s'ils sont configurés pour gérer des serveurs différents. Pour cela, configurez les gestionnaires de session en conséquence, pour chacun d'entre eux éditez le script d'initialisation présent dans /etc/init.d, et désactivez la vérification de gestionnaire de session par défaut.
";
$elem["shared/default-x-display-manager"]["default"]="";
$elem["wdm/daemon_name"]["type"]="string";
$elem["wdm/daemon_name"]["description"]="for internal use
 This template is never shown to the user and does not require translation.
";
$elem["wdm/daemon_name"]["descriptionde"]="";
$elem["wdm/daemon_name"]["descriptionfr"]="";
$elem["wdm/daemon_name"]["default"]="/usr/bin/wdm";
PKG_OptionPageTail2($elem);
?>
