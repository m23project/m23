<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libssl1.1");

$elem["libssl1.1/restart-services"]["type"]="string";
$elem["libssl1.1/restart-services"]["description"]="Services to restart to make them use the new libraries:
 This release of OpenSSL fixes some security issues. Services will not
 use these fixes until they are restarted. Please note that restarting
 the SSH server (sshd) should not affect any existing connections.
 .
 Please check the list of detected services that need to be restarted
 and correct it, if needed. The services names must be identical to the
 initialization script names in /etc/init.d and separated by
 spaces. No services will be restarted if the list is empty.
 .
 Any service that later fails unexpectedly after this upgrade should
 be restarted. It is recommended to reboot this host to avoid any
 SSL-related trouble.
";
$elem["libssl1.1/restart-services"]["descriptionde"]="Welche Dienste sollen erneut gestartet werden, damit sie die neuen Bibliotheken verwenden?
 In dieser Version von OpenSSL wurden Sicherheitsprobleme behoben. Dienste werden diese Aktualisierungen nicht nutzen, bis sie neugestartet werden. Hinweis: Den SSH-Server (sshd) neu zu starten, dürfte keine bestehenden Verbindungen beeinträchtigen.
 .
 Es folgt nun eine Liste der erkannten Dienste, die neu gestartet werden sollten. Bitte berichtigen Sie die Liste, falls Sie glauben, dass sie Fehler enthält. Die Namen der Dienste müssen den Namen der Skripte in /etc/init.d entsprechen und werden durch Leerzeichen getrennt. Es wird kein Dienst neu gestartet, falls die Liste leer bleibt.
 .
 Falls andere Dienste nach diesem Upgrade ein merkwürdiges Fehlverhalten zeigen, könnte es nötig werden, sie ebenfalls neu zu starten. Es wird empfohlen, den Rechner neu zu starten, um Probleme mit SSL zu vermeiden.
";
$elem["libssl1.1/restart-services"]["descriptionfr"]="Services à redémarrer afin d'utiliser les nouvelles bibliothèques :
 Cette version d'OpenSSL corrige certaines failles de sécurité. Les services n'utiliseront pas ces correctifs tant qu'ils n'auront pas été redémarrés. Veuillez noter que le redémarrage du serveur SSH (sshd) n'affectera aucune connexion existante.
 .
 Veuillez vérifier et corriger si nécessaire la liste des services devant être redémarrés. Les noms des services doivent être identiques aux noms des scripts présents dans /etc/init.d et doivent être séparés par des espaces. Si la liste est vide, aucun service ne sera redémarré.
 .
 Si d'autres services ne fonctionnent plus correctement après cette mise à jour, ils devront être redémarrés. Il est fortement recommandé de redémarrer le système pour éviter les problèmes liés à SSL.
";
$elem["libssl1.1/restart-services"]["default"]="";
$elem["libssl1.1/restart-failed"]["type"]="error";
$elem["libssl1.1/restart-failed"]["description"]="Failure restarting some services for OpenSSL upgrade
 The following services could not be restarted for the OpenSSL library upgrade:
 .
 ${services}
 .
 You will need to start these manually by running
 '/etc/init.d/<service> start'.
";
$elem["libssl1.1/restart-failed"]["descriptionde"]="Neustarten einiger Dienste beim OpenSSL-Upgrade fehlgeschlagen
 Die folgenden Dienste konnten beim Upgrade der OpenSSL-Bibliothek nicht neu gestartet werden:
 .
 ${services}
 .
 Sie werden sie manuell durch Aufruf von »/etc/init.d/<dienst> start« starten müssen.
";
$elem["libssl1.1/restart-failed"]["descriptionfr"]="Impossible de redémarrer certains services lors de la mise à jour d'OpenSSL
 Les services suivants ne peuvent pas être redémarrés lors de la mise à jour de la bibliothèque OpenSSL :
 .
 ${services}
 .
 Vous devrez les redémarrer vous-même avec la commande « /etc/init.d/<service> start ».
";
$elem["libssl1.1/restart-failed"]["default"]="";
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
$elem["libraries/restart-without-asking"]["descriptionfr"]="Redémarrer inconditionnellement les services lors des mises à niveau de paquets ?
 Certains services installés sur le système doivent être redémarrés lorsque certaines bibliothèques, comme libpam, libc ou libssl, sont mises à niveau. Comme ces redémarrages peuvent conduire à une interruption du service, le choix de les redémarrer ou non est en général offert lors de ces mises à niveau. Vous pouvez choisir ici que ce choix ne soit plus offert et que les redémarrages aient lieu systématiquement lors des mises à niveau de bibliothèques.
";
$elem["libraries/restart-without-asking"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
