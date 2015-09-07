<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libssl0.9.8");

$elem["libssl0.9.8/restart-services"]["type"]="string";
$elem["libssl0.9.8/restart-services"]["description"]="Services to restart to make them use the new libraries:
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
$elem["libssl0.9.8/restart-services"]["descriptionde"]="Welche Dienste sollen erneut gestartet werden, damit sie die neuen Bibliotheken verwenden?
 In dieser Version von OpenSSL wurden Sicherheitsprobleme behoben. Dienste werden diese Aktualisierungen nicht nutzen, bis sie neugestartet werden. Hinweis: Den SSH-Server (sshd) neu zu starten, dürfte keine bestehenden Verbindungen beeinträchtigen.
 .
 Es folgt nun eine Liste der erkannten Dienste, die neu gestartet werden sollten. Bitte berichtigen Sie die Liste, falls Sie glauben, dass sie Fehler enthält. Die Namen der Dienste müssen den Namen der Skripte in /etc/init.d entsprechen und werden durch Leerzeichen getrennt. Es wird kein Dienst neu gestartet, falls die Liste leer bleibt.
 .
 Falls andere Dienste nach diesem Upgrade ein merkwürdiges Fehlverhalten zeigen, könnte es nötig werden, sie ebenfalls neu zu starten. Es wird empfohlen, den Rechner neu zu starten, um Probleme mit SSL zu vermeiden.
";
$elem["libssl0.9.8/restart-services"]["descriptionfr"]="Services à redémarrer afin d'utiliser les nouvelles bibliothèques :
 Cette version d'OpenSSL corrige certaines failles de sécurité. Les services n'utiliseront pas ces correctifs tant qu'ils n'auront pas été redémarrés. Veuillez noter que le redémarrage du serveur SSH (sshd) n'affectera aucune connexion existante.
 .
 Veuillez vérifier et corriger si nécessaire la liste des services devant être redémarrés. Les noms des services doivent être identiques aux noms des scripts présents dans /etc/init.d et doivent être séparés par des espaces. Si la liste est vide, aucun service ne sera redémarré.
 .
 Si d'autres services ne fonctionnent plus correctement après cette mise à jour, ils devront être redémarrés. Il est fortement recommandé de redémarrer le système pour éviter les problèmes liés à SSL.
";
$elem["libssl0.9.8/restart-services"]["default"]="";
$elem["libssl0.9.8/restart-failed"]["type"]="error";
$elem["libssl0.9.8/restart-failed"]["description"]="Failure restarting some services for OpenSSL upgrade
 The following services could not be restarted for the OpenSSL library upgrade:
 .
 ${services}
 .
 You will need to start these manually by running
 '/etc/init.d/<service> start'.
";
$elem["libssl0.9.8/restart-failed"]["descriptionde"]="Neustarten einiger Dienste beim OpenSSL-Upgrade fehlgeschlagen
 Die folgenden Dienste konnten beim Upgrade der OpenSSL-Bibliothek nicht neu gestartet werden:
 .
 ${services}
 .
 Sie werden sie manuell durch Aufruf von »/etc/init.d/<dienst> start« starten müssen.
";
$elem["libssl0.9.8/restart-failed"]["descriptionfr"]="Impossible de redémarrer certains services lors de la mise à jour d'OpenSSL
 Les services suivants ne peuvent pas être redémarrés lors de la mise à jour de la bibliothèque OpenSSL :
 .
 ${services}
 .
 Vous devrez les redémarrer vous-même avec la commande « /etc/init.d/<service> start ».
";
$elem["libssl0.9.8/restart-failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
