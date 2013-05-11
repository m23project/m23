<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wdm");

$elem["shared/default-x-display-manager"]["type"]="select";
$elem["shared/default-x-display-manager"]["description"]="Select the desired default display manager.
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
$elem["shared/default-x-display-manager"]["descriptionde"]="Den gewünschten Display-Manager auswählen.
 Der Display-Manager ist ein Programm, das das grafische Einloggen in das X-Window-System ermöglicht.
 .
 Es können mehrere Display-Manager installiert sein, aber nur einer kann einen übergebenen X-Server verwalten. Bitte wählen Sie den Display-Manager, der standardmäßig gestartet werden soll.
 .
 (Mehrere Display-Manager können gleichzeitig laufen, wenn sie so eingestellt sind, dass sie verschiedene Server verwalten können; um das zu erreichen, richten Sie die Display-Manager entsprechend ein, ändern Sie deren Init-Skripte im Verzeichnis /etc/init.d und deaktivieren Sie den Test auf einen Standard-Display-Manager.)
";
$elem["shared/default-x-display-manager"]["descriptionfr"]="Choisissez le gestionnaire graphique de session
 Un gestionnaire graphique de session est un programme qui permet de se connecter à la machine depuis le système « X Window ».
 .
 Un seul gestionnaire graphique de session peut s'occuper d'un serveur X donné, bien que plusieurs gestionnaires puissent être installés simultanément. Veuillez choisir celui qui sera utilisé par défaut.
 .
 Plusieurs gestionnaires graphiques peuvent être lancés en même temps, s'ils gèrent des serveurs X différents. Pour cela, configurez correctement chacun des gestionnaires graphiques, modifiez leurs scripts de lancement dans /etc/init.d, et désactivez le test de gestionnaire graphique par défaut.
";
$elem["shared/default-x-display-manager"]["default"]="";
$elem["wdm/daemon_name"]["type"]="string";
$elem["wdm/daemon_name"]["description"]="internal use only
 This template is never shown to the user and does not require translation.
";
$elem["wdm/daemon_name"]["descriptionde"]="";
$elem["wdm/daemon_name"]["descriptionfr"]="";
$elem["wdm/daemon_name"]["default"]="/usr/bin/wdm";
PKG_OptionPageTail2($elem);
?>
