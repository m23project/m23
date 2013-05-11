<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nodm");

$elem["nodm/enabled"]["type"]="boolean";
$elem["nodm/enabled"]["description"]="Start nodm on boot?
 Designed for embedded or kiosk systems, nodm starts an X session
 for a user without asking for authentication. On regular
 machines, this has security implications and is therefore disabled
 by default.
 .
 You should enable nodm only if you need autologin on this machine.
";
$elem["nodm/enabled"]["descriptionde"]="Soll Nodm beim Booten gestartet werden?
 Nodm startet ein X-Sitzung ohne Authentisierung für den Benutzer, da es für Embedded- bzw. Kiosk-Systeme entwickelt wurde. Auf normalen Systemen hat das Auswirkungen auf die Sicherheit und ist deshalb standardmäßig deaktiviert.
 .
 Sie sollten Nodm nur aktivieren, falls Sie automatisiertes Anmelden auf diesem System benötigen.
";
$elem["nodm/enabled"]["descriptionfr"]="Faut-il lancer nodm au démarrage ?
 Conçu pour les systèmes embarqués ou les bornes interactives, nodm démarre une session X pour un utilisateur sans demander d'authentification. Dans un environnement standard, cela a des conséquences sur la sécurité du système et ce choix est donc désactivé par défaut.
 .
 Vous devriez activer nodm seulement si vous avez besoin d'authentification automatique sur cette machine.
";
$elem["nodm/enabled"]["default"]="false";
$elem["nodm/user"]["type"]="string";
$elem["nodm/user"]["description"]="User to start a session for:
 Please enter the login name of the user that will automatically be logged into X by nodm.
";
$elem["nodm/user"]["descriptionde"]="Benutzer für den die Sitzung gestartet werden soll:
 Bitte geben Sie den Anmeldenamen des Benutzers an, der automatisch durch Nodm an X angemeldet werden soll.
";
$elem["nodm/user"]["descriptionfr"]="Identifiant à utiliser pour la session ouverte automatiquement :
 Veuillez indiquer l'identifiant de l'utilisateur dont la session sera ouverte automatiquement par nodm.
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
$elem["nodm/first_vt"]["descriptionde"]="Virtuelles Terminal mit der niedrigsten Nummer in dem X starten könnte:
 Nodm muss ein freies, virtuelles Terminal (vt) finden, auf dem der X-Server gestartet werden kann.
 .
 Wegen des Konflikts zwischen X und getty gibt dieser Parameter die niedrigste Nummer des virtuellen Terminals an, ab dem mit der Suche begonnen wird.
 .
 Dieser Wert sollte um eins höher sein als die höchste Nummer des virtuellen Terminals, in dem getty starten darf.
";
$elem["nodm/first_vt"]["descriptionfr"]="Premier terminal virtuel disponible où X peut être lancé :
 Il est nécessaire d'utiliser un terminal virtuel disponible pour que nodm puisse y lancer X.
 .
 Comme X et getty peuvent entrer en conflit, ce paramètre permet d'indiquer à partir de quel terminal virtuel nodm doit commencer cette recherche.
 .
 Il est suggéré d'utiliser une valeur supérieure d'une unité au nombre de terminaux virtuels où getty est utilisé.
";
$elem["nodm/first_vt"]["default"]="7";
$elem["nodm/x_options"]["type"]="string";
$elem["nodm/x_options"]["description"]="Options for the X server:
 Please enter the options to pass to the X server when starting the session.
 These options will be used in the NODM_X_OPTIONS variable in the command line used
 by nodm to start the X session:
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/x_options"]["descriptionde"]="Optionen für den X-Server:
 Bitte geben Sie die Optionen an, die an den X-Server zum Starten der Sitzung übergeben werden sollen. Diese Optionen werden in der Variablen NODM_X_OPTIONS in der Befehlszeile von Nodm verwendet, um die X-Sitzung zu starten.
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/x_options"]["descriptionfr"]="Options pour le serveur X :
 Veuillez indiquer les options à passer au serveur X lorsqu'il démarre la session. Ces options seront utilisées avec la variable NODM_X_OPTIONS dans la commande utilisée par nodm pour démarrer la session X :
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/x_options"]["default"]="vt7 -nolisten tcp";
$elem["nodm/min_session_time"]["type"]="string";
$elem["nodm/min_session_time"]["description"]="Minimum time (in seconds) for a session to be considered OK:
 If an X session will run for less than this time in seconds, nodm will wait an
 amount of time before restarting the session. The waiting time will grow
 until a session lasts longer than this amount.
";
$elem["nodm/min_session_time"]["descriptionde"]="Mindestzeit (in Sekunden) für eine Sitzung, um als »In Ordnung« zu gelten:
 Falls eine X-Sitzung kürzer als diese Zeit in Sekunden existiert wird Nodm eine gewisse Zeit warten, bevor die Sitzung erneut gestartet wird. Die Wartezeit verlängert sich bis eine Sitzung länger als dieser Wert existiert.
";
$elem["nodm/min_session_time"]["descriptionfr"]="Durée minimale (en secondes) d'une session opérationnelle :
 Si une session X se referme après une durée plus courte qu'une valeur prédéterminée, nodm attendra un certain temps avant de la redémarrer. Ce temps d'attente augmentera progressivement tant qu'une session n'aura pas duré suffisamment longtemps pour être considérée comme opérationnelle.
";
$elem["nodm/min_session_time"]["default"]="60";
$elem["nodm/xinit"]["type"]="string";
$elem["nodm/xinit"]["description"]="xinit program to use:
 Please choose the name of the \"xinit\" program to use with nodm. This
 name will be stored in the NODM_XINIT variable in the command line used
 by nodm to start the X session:
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/xinit"]["descriptionde"]="Zu benutzendes Xinit-Programm:
 Bitte wählen Sie den Namen des »xinit«-Programms, welches Nodm nutzen soll. Dieser Name wird in der Variablen NODM_XINIT in der Befehlszeile gespeichert, welche Nodm nutzt, um die X-Sitzung zu starten:
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/xinit"]["descriptionfr"]="Programme xinit à utiliser :
 Veuillez choisir le nom du programme « xinit » à utiliser avec nodm. Ce nom sera enregistré dans la variable NODM_XINIT dans la ligne de commande utilisée par nodm pour démarrer la session X :
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/xinit"]["default"]="/usr/bin/xinit";
$elem["nodm/xsession"]["type"]="string";
$elem["nodm/xsession"]["description"]="X session to use:
 Please choose the name of the X session script to use with nodm. This
 name will be stored in the NODM_XSESSION variable in the command line used
 by nodm to start the X session:
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/xsession"]["descriptionde"]="Zu benutzende X-Sitzung:
 Bitte wählen Sie den Namen des X-Sitzung-Skripts, welches Nodm nutzen soll. Dieser Name wird in der Variablen NODM_XSESSION in der Befehlszeile gespeichert, welche Nodm nutzt, um die X-Sitzung zu starten.
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/xsession"]["descriptionfr"]="Session X à utiliser :
 Veuillez choisir le nom du script de session X à utiliser avec nodm. Ce nom sera enregistré dans la variable NODM_XSESSION dans la ligne de commande utilisée par nodm pour démarrer la session X :
 .
 $NODM_XINIT $NODM_XSESSION -- $NODM_X_OPTIONS
";
$elem["nodm/xsession"]["default"]="/etc/X11/Xsession";
PKG_OptionPageTail2($elem);
?>
