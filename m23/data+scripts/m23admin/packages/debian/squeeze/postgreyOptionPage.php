<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("postgrey");

$elem["postgrey/1.32-3_changeport"]["type"]="error";
$elem["postgrey/1.32-3_changeport"]["description"]="Default TCP port change
 Postgrey is now listening on port 10023 (rather than 60000), which
 brings its behavior closer to the default upstream settings.
 .
 You will need to adjust its configuration (usually in
 /etc/postfix/main.cf) accordingly.
";
$elem["postgrey/1.32-3_changeport"]["descriptionde"]="Änderung des voreingestellten TCP-Ports
 Postgrey nimmt Verbindungen nun an Port 10023 entgegen (und nicht 60000). Dies bringt sein Verhalten näher an die Voreinstellungen der Programmautoren.
 .
 Sie müssen seine Konfiguration entsprechend anpassen (normalerweise /etc/postfix/main.cf).
";
$elem["postgrey/1.32-3_changeport"]["descriptionfr"]="Modification du port TCP par défaut
 Postgrey est dorénavant à l'écoute sur le port 10023 (au lieu de 60000) ce qui rend son comportement plus proche de la configuration par défaut.
 .
 Vous devrez adapter la configuration du fichier « /etc/postfix/main.cf » en conséquence.
";
$elem["postgrey/1.32-3_changeport"]["default"]="";
PKG_OptionPageTail2($elem);
?>
