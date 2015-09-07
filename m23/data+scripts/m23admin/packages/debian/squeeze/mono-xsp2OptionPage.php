<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mono-xsp2");

$elem["xsp2/xsp2_autostart"]["type"]="boolean";
$elem["xsp2/xsp2_autostart"]["description"]="Start on boot?
 If this is true, then XSP2 will automatically start when the computer
 is turned on.
";
$elem["xsp2/xsp2_autostart"]["descriptionde"]="Beim Systemstart starten?
 Falls dies stimmt, wird XSP2 automatisch gestartet, wenn Ihr Computer eingeschaltet wird.
";
$elem["xsp2/xsp2_autostart"]["descriptionfr"]="Faut-il le lancer au démarrage ?
 Si vous acceptez ici, XSP2 sera lancé automatiquement au démarrage du système
";
$elem["xsp2/xsp2_autostart"]["default"]="true";
$elem["xsp2/xsp2_bind"]["type"]="string";
$elem["xsp2/xsp2_bind"]["description"]="Bind to address:
 To function properly, XSP2 needs to be bound to an IP address. The
 default (\"0.0.0.0\") binds to all addresses of the server, but a
 specific port can be selected. To use XSP2 only locally, use
 \"127.0.0.1\" for the address.
";
$elem["xsp2/xsp2_bind"]["descriptionde"]="Binde an Adresse:
 Um korrekt zu funktionieren, muss XSP2 sich an eine IP-Adresse binden. Der Standard (»0.0.0.0«) bindet sich an alle Adressen auf dem Server, aber ein spezieller Port kann ausgewählt werden. Um XSP2 lokal zu verwenden, verwenden Sie »127.0.0.1« für diese Adresse.
";
$elem["xsp2/xsp2_bind"]["descriptionfr"]="Adresse à laquelle le processus doit être lié :
 Afin de fonctionner correctement, XSP2 doit être lié à une adresse IP. La valeur par défaut (0.0.0.0) le lie à toutes les adresses du serveur, mais un port spécifique peut être choisi. Pour n'utiliser XSP2 que localement, veuillez indiquer l'adresse 127.0.0.1.
";
$elem["xsp2/xsp2_bind"]["default"]="0.0.0.0";
$elem["xsp2/xsp2_port"]["type"]="string";
$elem["xsp2/xsp2_port"]["description"]="Bind to port:
 XSP is bound to a specific port on the server. Common values are 80,
 8080, or 8081.
";
$elem["xsp2/xsp2_port"]["descriptionde"]="Binde an Port:
 XSP bindet sich an einen speziellen Port auf dem Server. Typische Werte sind 80, 8080 oder 8081.
";
$elem["xsp2/xsp2_port"]["descriptionfr"]="Port auquel le processus doit être lié :
 XSP doit être lié a un port particulier du serveur. Des valeurs courantes sont 80, 8080 et 8081.
";
$elem["xsp2/xsp2_port"]["default"]="8082";
PKG_OptionPageTail2($elem);
?>
