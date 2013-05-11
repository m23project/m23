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
 Laufende Dienste und Programme, die NSS verwenden, müssen neu gestartet werden, da sie andernfalls keine Überprüfungen oder Authentisierung mehr durchführen können. Der Installationsprozess kann einige Dienste neu starten (wie Ssh oder Telnetd), aber andere Programme können nicht automatisch neu gestartet werden. Eines dieser Programme, die nach dem Upgrade von Glibc ein manuelles Stoppen und Neustarten benötigen ist Xdm, da ein automatischer Neustart Sie von Ihren aktiven X11-Sitzung trennen könnte.
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
 Laufende Dienste und Programme, die NSS verwenden, müssen neu gestartet werden, da sie andernfalls keine Überprüfungen oder Authentisierung mehr durchführen können (für Dienste wie ssh kann dies die Möglichkeit der Anmeldung betreffen). Bitte prüfen Sie, welche der Dienste in der folgenden, durch Leerzeichen getrennte Liste von init.d-Skripten neu gestartet werden sollen, und korrigieren Sie diese falls notwendig.
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
PKG_OptionPageTail2($elem);
?>
