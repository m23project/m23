<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mono-xsp");

$elem["xsp/xsp_autostart"]["type"]="boolean";
$elem["xsp/xsp_autostart"]["description"]="Start on boot?
 If this is true, then XSP will automatically start when the computer
 is turned on.
";
$elem["xsp/xsp_autostart"]["descriptionde"]="Beim Systemstart starten?
 Falls dies stimmt, dann wird XSP automatisch gestartet, wenn Ihr Computer eingeschaltet wird.
";
$elem["xsp/xsp_autostart"]["descriptionfr"]="Faut-il le lancer au démarrage ?
 Si vous acceptez ici, XSP sera lancé automatiquement au démarrage du système
";
$elem["xsp/xsp_autostart"]["default"]="true";
$elem["xsp/xsp_bind"]["type"]="string";
$elem["xsp/xsp_bind"]["description"]="Bind to address:
 To function properly, XSP needs to be bound to an IP address. The
 default (\"0.0.0.0\") binds to all addresses of the server, but a
 specific port can be selected. To use XSP only locally, use
 \"127.0.0.1\" for the address.
";
$elem["xsp/xsp_bind"]["descriptionde"]="Binde an Adresse:
 Um korrekt zu funktionieren, muss XSP sich an eine IP-Adresse binden. Der Standard (»0.0.0.0«) bindet sich an alle Adressen auf dem Server, aber ein spezieller Port kann ausgewählt werden. Um XSP lokal zu verwenden, verwenden Sie »127.0.0.1« für diese Adresse.
";
$elem["xsp/xsp_bind"]["descriptionfr"]="Adresse à laquelle le processus doit être lié :
 Afin de fonctionner correctement, XSP doit être lié à une adresse IP. La valeur par défaut (0.0.0.0) le lie à toutes les adresses du serveur, mais un port spécifique peut être choisi. Pour n'utiliser XSP que localement, veuillez indiquer l'adresse 127.0.0.1.
";
$elem["xsp/xsp_bind"]["default"]="0.0.0.0";
$elem["xsp/xsp_port"]["type"]="string";
$elem["xsp/xsp_port"]["description"]="Bind to port:
 XSP is bound to a specific port on the server. Common values are 80,
 8080, or 8081.
";
$elem["xsp/xsp_port"]["descriptionde"]="Binde an Port:
 XSP bindet sich an einen speziellen Port auf dem Server. Typische Werte sind 80, 8080 oder 8081.
";
$elem["xsp/xsp_port"]["descriptionfr"]="Port auquel le processus doit être lié :
 XSP doit être lié a un port particulier du serveur. Des valeurs courantes sont 80, 8080 et 8081.
";
$elem["xsp/xsp_port"]["default"]="8081";
PKG_OptionPageTail2($elem);
?>
