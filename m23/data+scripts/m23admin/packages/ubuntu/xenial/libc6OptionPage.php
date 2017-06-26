<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libc6");

$elem["glibc/upgrade"]["type"]="boolean";
$elem["glibc/upgrade"]["description"]="Do you want to upgrade glibc now?
 Running services and programs that are using NSS need to be restarted,
 otherwise they might not be able to do lookup or authentication any more.
 The installation process is able to restart some services (such as ssh or
 telnetd), but other programs cannot be restarted automatically. One such
 program that needs manual stopping and restart after the glibc upgrade by
 yourself is xdm - because automatic restart might disconnect your active
 X11 sessions.
 .
 This script detected the following installed services which must be
 stopped before the upgrade: ${services}
 .
 If you want to interrupt the upgrade now and continue later, please
 answer No to the question below.
";
$elem["glibc/upgrade"]["descriptionde"]="Möchten Sie das Upgrade von Glibc jetzt durchführen?
 Laufende Dienste und Programme, die NSS verwenden, müssen neu gestartet werden, da sie andernfalls keine Überprüfungen oder Authentisierung mehr durchführen können. Der Installationsprozess kann einige Dienste neu starten (wie Ssh oder Telnetd), aber andere Programme können nicht automatisch neu gestartet werden. Eines dieser Programme, die nach dem Upgrade von Glibc ein manuelles Stoppen und Neustarten benötigen, ist Xdm, da ein automatischer Neustart Sie von Ihren aktiven X11-Sitzung trennen könnte.
 .
 Dieses Skript erkannte die folgenden installierten Dienste, die vor dem Upgrade gestoppt werden müssen: ${services}
 .
 Falls Sie das Upgrade jetzt unterbrechen und später Fortfahren möchten, antworten Sie bitte auf die unten folgende Frage mit Nein.
";
$elem["glibc/upgrade"]["descriptionfr"]="Faut-il mettre à jour le paquet glibc maintenant ?
 Les services et programmes qui utilisent NSS (« Name Service Switch ») doivent être redémarrés car leur système d'authentification risque de ne plus fonctionner. Il est possible de redémarrer certains services (comme SSH ou telnetd) pendant l'installation, mais d'autres ne peuvent l'être automatiquement. Il est notamment indispensable d'arrêter et redémarrer manuellement xdm car un redémarrage automatique pourrait interrompre une session X11 active.
 .
 Les services identifiés comme devant être redémarrés et qui doivent être arrêtés avant la mise à jour sont les suivants : ${services}.
 .
 Si vous préférez interrompre la mise à jour maintenant et la reprendre plus tard, ne choisissez pas cette option.
";
$elem["glibc/upgrade"]["default"]="true";
$elem["glibc/restart-services"]["type"]="string";
$elem["glibc/restart-services"]["description"]="Services to restart for GNU libc library upgrade:
 Running services and programs that are using NSS need to be restarted,
 otherwise they might not be able to do lookup or authentication any more
 (for services such as ssh, this can affect your ability to login).
 Please review the following space-separated list of init.d scripts for
 services to be restarted now, and correct it if needed.
 .
 Note: restarting sshd/telnetd should not affect any existing connections.
";
$elem["glibc/restart-services"]["descriptionde"]="Dienste, die beim GNU Libc-Bibliotheks-Upgrade neu gestartet werden sollen:
 Laufende Dienste und Programme, die NSS verwenden, müssen neu gestartet werden, da sie andernfalls keine Überprüfungen oder Authentisierung mehr durchführen können (für Dienste wie ssh kann dies die Möglichkeit der Anmeldung betreffen). Bitte prüfen Sie, welche der Dienste in der folgenden, durch Leerzeichen getrennte Liste von init.d-Skripten neu gestartet werden sollen, und korrigieren Sie diese, falls notwendig.
 .
 Hinweis: das Neustarten von sshd/telnetd sollte existierende Verbindungen nicht beeinträchtigen.
";
$elem["glibc/restart-services"]["descriptionfr"]="Services à redémarrer lors de la mise à jour de la bibliothèque C :
 Les services et programmes qui utilisent NSS (« Name Service Switch ») doivent être redémarrés car leur système d'authentification risque de ne plus fonctionner (pour des services comme SSH, cela peut empêcher les connexions). Veuillez contrôler et éventuellement corriger la liste des services qui seront redémarrés maintenant (identifiés par le nom de leur script de démarrage).
 .
 Veuillez noter que le redémarrage de telnetd ou sshd n'affectera pas les connexions existantes.
";
$elem["glibc/restart-services"]["default"]="";
$elem["glibc/restart-failed"]["type"]="error";
$elem["glibc/restart-failed"]["description"]="Failure restarting some services for GNU libc upgrade
 The following services could not be restarted for the GNU libc library upgrade:
 .
 ${services}
 .
 You will need to start these manually by running
 '/etc/init.d/<service> start'.
";
$elem["glibc/restart-failed"]["descriptionde"]="Fehler beim Neustarten einiger Dienste für das GNU Libc-Upgrade
 Die folgenden Dienste konnten für das GNU Libc-Upgrade nicht neu gestartet werden:
 .
 ${services}
 .
 Sie müssen diese manuell starten, indem Sie »/etc/init.d/<service> start« ausführen.
";
$elem["glibc/restart-failed"]["descriptionfr"]="Échec du redémarrage de certains services
 Les services suivants n'ont pas pu être redémarrés lors de la mise à jour de la bibliothèque C :
 .
 ${services}
 .
 Il est nécessaire de les redémarrer vous-même avec la commande « /etc/init.d/<service> start ».
";
$elem["glibc/restart-failed"]["default"]="";
$elem["glibc/disable-screensaver"]["type"]="error";
$elem["glibc/disable-screensaver"]["description"]="xscreensaver and xlockmore must be restarted before upgrading
 One or more running instances of xscreensaver or xlockmore have been
 detected on this system. Because of incompatible library changes, the
 upgrade of the GNU libc library will leave you unable to
 authenticate to these programs. You should arrange for these programs
 to be restarted or stopped before continuing this upgrade, to avoid
 locking your users out of their current sessions.
";
$elem["glibc/disable-screensaver"]["descriptionde"]="Xscreensaver und Xlockmore müssen vor dem Upgrade neu gestartet werden
 Eine oder mehrere laufende Instanzen von Xscreensaver oder Xlockmore sind auf diesem System entdeckt worden. Aufgrund inkompatibler Änderungen in Bibliotheken wird das GNU Libc-Upgrade Sie außerstande setzen, sich gegenüber diesen Programmen zu authentifizieren. Sie sollten dafür sorgen, dass diese Programme neu gestartet oder beendet werden, bevor Sie dieses Upgrade fortsetzen, damit Ihre Benutzer nicht aus ihren laufenden Sitzungen ausgesperrt werden.
";
$elem["glibc/disable-screensaver"]["descriptionfr"]="Redémarrage nécessaire de xscreensaver et xlockmore avant mise à jour
 Une ou plusieurs instances de xscreensaver et/ou de xlockmore ont été détectées sur le système. À cause de la modification de certaines bibliothèques, la mise à niveau de la bibliothèque C entrainera l'impossibilité de s'authentifier. Avant de poursuivre la mise à niveau, ces programmes doivent être redémarrés ou arrêtés pour éviter que des utilisateurs ne puissent plus accéder à leurs sessions.
";
$elem["glibc/disable-screensaver"]["default"]="";
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
 Auf Ihrem System sind Dienste installiert, die beim Upgrade bestimmter Bibliotheken, wie Libpam, Libc und Libssl, neu gestartet werden müssen. Da diese Neustarts zu Unterbrechungen der Dienste für dieses System führen können, werden Sie normalerweise bei jedem Upgrade über die Liste der neu zu startenden Dienste befragt. Sie können diese Option wählen, um diese Abfrage zu vermeiden; stattdessen werden alle notwendigen Dienste-Neustarts für Sie automatisch vorgenommen und die Beantwortung dieser Fragen bei jedem Upgrade von Bibliotheken vermieden.
";
$elem["libraries/restart-without-asking"]["descriptionfr"]="Redémarrer inconditionnellement les services lors des mises à jour de paquets ?
 Certains services installés sur le système doivent être redémarrés lorsque certaines bibliothèques, comme libpam, libc ou libssl, sont mises à jour. Comme ces redémarrages peuvent conduire à une interruption du service, le choix de les redémarrer ou non est en général offert lors de ces mises à jour. Vous pouvez choisir ici que ce choix ne soit plus offert et que les redémarrages aient lieu systématiquement lors des mises à jour de bibliothèques.
";
$elem["libraries/restart-without-asking"]["default"]="false";
$elem["glibc/kernel-too-old"]["type"]="error";
$elem["glibc/kernel-too-old"]["description"]="Kernel must be upgraded
 This version of the GNU libc requires kernel version ${kernel_ver} or
 later.  Please upgrade your kernel before installing glibc.
";
$elem["glibc/kernel-too-old"]["descriptionde"]="Kernel muss aktualisiert werden.
 Diese Version der GNU-Libc benötigt Kernel Version ${kernel_ver} oder neuer. Bitte führen Sie vor der Installation der Glibc ein Upgrade durch.
";
$elem["glibc/kernel-too-old"]["descriptionfr"]="Mise à jour nécessaire du noyau
 Cette version de la bibliothèque C GNU nécessite au minimum la version ${kernel_ver} du noyau. Veuillez mettre le noyau à jour avant l'installation de glibc.
";
$elem["glibc/kernel-too-old"]["default"]="";
$elem["glibc/kernel-not-supported"]["type"]="note";
$elem["glibc/kernel-not-supported"]["description"]="Kernel version not supported
 This version of the GNU libc requires kernel version ${kernel_ver} or
 later.  Older versions might work but are not officially supported. 
 Please consider upgrading your kernel.
";
$elem["glibc/kernel-not-supported"]["descriptionde"]="Kernelversion wird nicht unterstützt
 Diese Version der GNU-Libc benötigt Kernel Version ${kernel_ver} oder neuer. Ältere Versionen können funktionieren, werden aber nicht offiziell unterstützt. Bitte prüfen Sie ein Upgrade Ihres Kernels.
";
$elem["glibc/kernel-not-supported"]["descriptionfr"]="Version du noyau non gérée
 Cette version de la bibliothèque C GNU nécessite au minimum la version ${kernel_ver} du noyau. Des versions antérieures pourraient fonctionner, mais ne sont pas officiellement gérées. Veuillez prévoir la mise à jour du noyau.
";
$elem["glibc/kernel-not-supported"]["default"]="";
PKG_OptionPageTail2($elem);
?>
