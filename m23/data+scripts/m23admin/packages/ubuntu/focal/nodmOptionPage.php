<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nodm");

$elem["nodm/enabled"]["type"]="boolean";
$elem["nodm/enabled"]["description"]="Enable nodm?
 Designed for embedded or kiosk systems, nodm starts an X session
 for a user without asking for authentication. On regular
 machines, this has security implications and is therefore disabled
 by default.
 .
 You should enable nodm only if you need autologin on this machine.
";
$elem["nodm/enabled"]["descriptionde"]="Nodm aktivieren?
 Nodm startet eine X-Sitzung ohne Authentisierung für den Benutzer, da es für eingebettete bzw. Kiosk-Systeme entwickelt wurde. Auf normalen Systemen hat das Auswirkungen auf die Sicherheit und ist deshalb standardmäßig deaktiviert.
 .
 Sie sollten Nodm nur aktivieren, falls Sie automatisiertes Anmelden auf diesem System benötigen.
";
$elem["nodm/enabled"]["descriptionfr"]="Voulez-vous activer nodm ?
 Conçu pour les systèmes embarqués ou les bornes interactives, nodm démarre une session X pour un utilisateur sans demander d'authentification. Dans un environnement standard, cela a des conséquences sur la sécurité du système et ce choix est donc désactivé par défaut.
 .
 Vous devriez activer nodm seulement si vous avez besoin d'une authentification automatique sur cette machine.
";
$elem["nodm/enabled"]["default"]="true";
$elem["nodm/user"]["type"]="string";
$elem["nodm/user"]["description"]="User to start a session for:
 Please enter the login name of the user that will automatically be logged into X by nodm.
";
$elem["nodm/user"]["descriptionde"]="Benutzer für den die Sitzung gestartet werden soll:
 Bitte geben Sie den Anmeldenamen des Benutzers an, der automatisch durch Nodm an X angemeldet werden soll.
";
$elem["nodm/user"]["descriptionfr"]="Identifiant à utiliser pour la session ouverte automatiquement :
 Veuillez indiquer l'identifiant de l'utilisateur dont la session X sera ouverte automatiquement par nodm.
";
$elem["nodm/user"]["default"]="root";
$elem["nodm/first_vt"]["type"]="string";
$elem["nodm/first_vt"]["description"]="Lowest numbered vt on which X may start:
 nodm needs to find a free virtual terminal on which to start the X server.
 .
 Since X and getty get to conflict, this parameter will specify the lowest
 numbered virtual terminal on which to start the search.
 .
 This value should be set to one higher than the highest numbered virtual
 terminal on which a getty may start.
";
$elem["nodm/first_vt"]["descriptionde"]="Virtuelles Terminal mit der niedrigsten Nummer, in dem X starten darf:
 Nodm muss ein freies, virtuelles Terminal (VT) finden, auf dem der X-Server gestartet werden kann.
 .
 Wegen des Konflikts zwischen X und Getty gibt dieser Parameter die niedrigste Nummer des virtuellen Terminals an, ab dem mit der Suche begonnen wird.
 .
 Dieser Wert sollte um eins höher als die höchste Nummer des virtuellen Terminals, in dem Getty starten darf, sein.
";
$elem["nodm/first_vt"]["descriptionfr"]="Premier terminal virtuel disponible où X peut être lancé :
 Il est nécessaire d'utiliser un terminal virtuel disponible pour que nodm puisse y lancer X.
 .
 Comme X et getty peuvent entrer en conflit, ce paramètre permet d'indiquer à partir de quel terminal virtuel nodm doit commencer cette recherche.
 .
 Il est suggéré d'utiliser une valeur supérieure d'une unité au nombre de terminaux virtuels où getty est utilisé.
";
$elem["nodm/first_vt"]["default"]="7";
$elem["nodm/x_options"]["type"]="string";
$elem["nodm/x_options"]["description"]="Options for the X server:
 Please enter the options to pass to the X server when starting it.
 .
 Format: [/usr/bin/<Xserver>] [:<disp>] <Xserver-options>
 .
 The Xserver executable and the display name can be omitted, but should
 be placed in front, if nodm's defaults shall be overridden.
 .
 If no vtN option is used, nodm will perform automatic vt allocation.
";
$elem["nodm/x_options"]["descriptionde"]="Optionen für den X-Server:
 Bitte geben Sie die Optionen an, die an den X-Server zum Starten übergeben werden.
 .
 Format: [/usr/bin/<Xserver>] [:<disp>] <Xserver-options>
 .
 Das Xserver-Programm und der Display-Name können weggelassen werden, sollten aber vorne angestellt werden, falls die Vorgaben von Nodem außer Kraft gesetzt werden sollen.
 .
 Falls keine Option vtN verwandt wird, wird eine automatische VT-Zuteilung erfolgen
";
$elem["nodm/x_options"]["descriptionfr"]="Options pour le serveur X :
 Veuillez indiquer les options à utiliser avec le serveur X quand il est lancé.
 .
 Format: [/usr/bin/<Xserver>] [:<disp>] <Xserver-options>
 .
 L’exécutable Xserver et le nom d’affichage peuvent être omis, mais doivent être placés devant, si les valeurs par défaut de nodm doivent être remplacées.
 .
 Si l’option vtN n’est pas utilisée, nodm fera une attribution automatique de terminal virtuel.
";
$elem["nodm/x_options"]["default"]="-nolisten tcp";
$elem["nodm/min_session_time"]["type"]="string";
$elem["nodm/min_session_time"]["description"]="Minimum time (in seconds) for a session to be considered OK:
 If an X session will run for less than this time in seconds, nodm will wait an
 amount of time before restarting the session. The waiting time will grow
 until a session lasts longer than this amount.
";
$elem["nodm/min_session_time"]["descriptionde"]="Mindestzeit (in Sekunden) für eine Sitzung, um als »In Ordnung« zu gelten:
 Falls eine X-Sitzung kürzer als diese Zeit in Sekunden existiert, wird Nodm eine gewisse Zeit warten, bevor die Sitzung erneut gestartet wird. Die Wartezeit verlängert sich, bis eine Sitzung länger als dieser Wert existiert.
";
$elem["nodm/min_session_time"]["descriptionfr"]="Durée minimale (en secondes) d'une session opérationnelle :
 Si une session X se referme après une durée plus courte qu'une valeur prédéterminée, nodm attendra un certain temps avant de la redémarrer. Ce temps d'attente augmentera progressivement tant qu'une session n'aura pas duré suffisamment longtemps pour être considérée comme opérationnelle.
";
$elem["nodm/min_session_time"]["default"]="60";
$elem["nodm/x_timeout"]["type"]="string";
$elem["nodm/x_timeout"]["description"]="Maximum time (in seconds) to wait for X to start:
 Timeout (in seconds) to wait for X to be ready to accept connections. If X is
 not ready before this timeout, it is killed and restarted.
";
$elem["nodm/x_timeout"]["descriptionde"]="Maximalzeit (in Sekunden) die auf das Starten von X gewartet werden soll:
 Zeitüberschreitung (in Sekunden), die gewartet werden soll, damit X bereit zum Akzeptieren von Verbindungen ist. Falls X nicht vor Ablauf dieser Zeitüberschreitung bereit ist, wird es getötet und neu gestartet.
";
$elem["nodm/x_timeout"]["descriptionfr"]="Durée maximale (en secondes) pour attendre le démarrage de X :
 Délai (en secondes) pour attendre que X soit prêt à accepter les connexions. Si X n’est pas prêt avant ce délai, il sera arrêté et redémarré.
";
$elem["nodm/x_timeout"]["default"]="300";
$elem["nodm/xsession"]["type"]="string";
$elem["nodm/xsession"]["description"]="X session to use:
 Please choose the name of the X session script to use with nodm.
";
$elem["nodm/xsession"]["descriptionde"]="Zu benutzende X-Sitzung:
 Bitte wählen Sie den Namen des X-Sitzungskripts, welches Nodm nutzen soll.
";
$elem["nodm/xsession"]["descriptionfr"]="Session X à utiliser :
 Veuillez indiquer le nom du script de session X à utiliser avec nodm.
";
$elem["nodm/xsession"]["default"]="/etc/X11/Xsession";
$elem["nodm/daemon_name"]["type"]="string";
$elem["nodm/daemon_name"]["description"]="for internal use only

";
$elem["nodm/daemon_name"]["descriptionde"]="";
$elem["nodm/daemon_name"]["descriptionfr"]="";
$elem["nodm/daemon_name"]["default"]="/usr/sbin/nodm";
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
$elem["shared/default-x-display-manager"]["descriptionde"]="Standard-Display-Manager
 Ein Display-Manager ist ein Programm, dass die graphischen Anmeldefähigkeiten für das X-Window-System bereitstellt.
 .
 Nur ein Display-Manager kann einen gegebenen X-Server verwalten, aber mehrere Display-Manager sind installiert. Bitte wählen Sie, welcher Display-Manager standardmäßig ausgeführt werden soll.
 .
 Mehrere Display-Manager können gleichzeitig laufen, falls sie zur Verwaltung verschiedener Server konfiguriert sind. Um dies zu erreichen, konfigurieren Sie die Display-Manager entsprechend, bearbeiten Sie jedes ihrer Init-Skripte in /etc/init.d und deaktivieren Sie die Prüfung auf einen Standard-Display-Manager.
";
$elem["shared/default-x-display-manager"]["descriptionfr"]="Gestionnaire de session par défaut :
 Un gestionnaire de session est un programme qui fournit une fenêtre de connexion graphique pour le système de fenêtre X.
 .
 Un gestionnaire de session seulement peut gérer un serveur X donné, mais plusieurs paquets de gestionnaire de session sont installés. Veuillez sélectionner le gestionnaire de session que vous souhaitez démarrer par défaut.
 .
 Plusieurs gestionnaires de session peuvent être démarrés en même temps s'ils sont configurés pour gérer des serveurs différents ; pour cela, configurez les gestionnaires de session en conséquence, pour chacun d’entre eux éditez le script d’initialisation présent dans /etc/init.d, et désactivez la vérification de gestionnaire de session par défaut.
";
$elem["shared/default-x-display-manager"]["default"]="";
PKG_OptionPageTail2($elem);
?>
