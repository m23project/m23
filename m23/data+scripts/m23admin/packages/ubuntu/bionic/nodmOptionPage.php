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
$elem["nodm/enabled"]["descriptionde"]="";
$elem["nodm/enabled"]["descriptionfr"]="";
$elem["nodm/enabled"]["default"]="true";
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
$elem["nodm/first_vt"]["descriptionde"]="Virtuelles Terminal mit der niedrigsten Nummer, in dem X starten darf:
 Nodm muss ein freies, virtuelles Terminal (vt) finden, auf dem der X-Server gestartet werden kann.
 .
 Wegen des Konflikts zwischen X und Getty gibt dieser Parameter die niedrigste Nummer des virtuellen Terminals an, ab dem mit der Suche begonnen wird.
 .
 Dieser Wert sollte um eins höher sein als die höchste Nummer des virtuellen Terminals, in dem Getty starten darf.
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
 Please enter the options to pass to the X server when starting it.
 .
 Format: [/usr/bin/<Xserver>] [:<disp>] <Xserver-options>
 .
 The Xserver executable and the display name can be omitted, but should
 be placed in front, if nodm's defaults shall be overridden.
 .
 If no vtN option is used, nodm will perform automatic vt allocation.

";
$elem["nodm/x_options"]["descriptionde"]="";
$elem["nodm/x_options"]["descriptionfr"]="";
$elem["nodm/x_options"]["default"]="-nolisten tcp";
$elem["nodm/min_session_time"]["type"]="string";
$elem["nodm/min_session_time"]["description"]="Minimum time (in seconds) for a session to be considered OK:
 If an X session will run for less than this time in seconds, nodm will wait an
 amount of time before restarting the session. The waiting time will grow
 until a session lasts longer than this amount.
";
$elem["nodm/min_session_time"]["descriptionde"]="Mindestzeit (in Sekunden) für eine Sitzung, um als »In Ordnung« zu gelten:
 Falls eine X-Sitzung kürzer als diese Zeit in Sekunden existiert, wird Nodm eine gewisse Zeit warten, bevor die Sitzung erneut gestartet wird. Die Wartezeit verlängert sich bis eine Sitzung länger als dieser Wert existiert.
";
$elem["nodm/min_session_time"]["descriptionfr"]="Durée minimale (en secondes) d'une session opérationnelle :
 Si une session X se referme après une durée plus courte qu'une valeur prédéterminée, nodm attendra un certain temps avant de la redémarrer. Ce temps d'attente augmentera progressivement tant qu'une session n'aura pas duré suffisamment longtemps pour être considérée comme opérationnelle.
";
$elem["nodm/min_session_time"]["default"]="60";
$elem["nodm/x_timeout"]["type"]="string";
$elem["nodm/x_timeout"]["description"]="Maximum time (in seconds) to wait for X to start:
 Timeout (in seconds) to wait for X to be ready to accept connections. If X is
 not ready before this timeout, it is killed and restarted.

";
$elem["nodm/x_timeout"]["descriptionde"]="";
$elem["nodm/x_timeout"]["descriptionfr"]="";
$elem["nodm/x_timeout"]["default"]="300";
$elem["nodm/xsession"]["type"]="string";
$elem["nodm/xsession"]["description"]="X session to use:
 Please choose the name of the X session script to use with nodm.
";
$elem["nodm/xsession"]["descriptionde"]="Zu benutzende X-Sitzung:
 Bitte wählen Sie den Namen des X-Sitzung-Skripts, welches Nodm nutzen soll.
";
$elem["nodm/xsession"]["descriptionfr"]="Session X à utiliser :
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
$elem["shared/default-x-display-manager"]["descriptionde"]="";
$elem["shared/default-x-display-manager"]["descriptionfr"]="";
$elem["shared/default-x-display-manager"]["default"]="";
PKG_OptionPageTail2($elem);
?>
