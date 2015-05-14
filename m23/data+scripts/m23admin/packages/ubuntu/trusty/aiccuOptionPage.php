<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("aiccu");

$elem["aiccu/username"]["type"]="string";
$elem["aiccu/username"]["description"]="Aiccu username:
 To successfully connect, you must provide your SixXS username. This is
 the same username you use to login to the sixxs.net web site.
";
$elem["aiccu/username"]["descriptionde"]="Aiccu-Benutzername:
 Um erfolgreich eine Verbindung zu eröffnen, müssen Sie Ihren SixXS-Benutzernamen angeben. Dies ist der gleiche Benutzername, den Sie auch zum Anmelden auf der sixxs.net-Webseite verwenden.
";
$elem["aiccu/username"]["descriptionfr"]="Identifiant pour aiccu :
 Pour pouvoir vous connecter, il est indispensable de fournir votre identifiant SixXS. Cet identifiant est celui utilisé pour la connexion au site web sixxs.net.
";
$elem["aiccu/username"]["default"]="";
$elem["aiccu/password"]["type"]="password";
$elem["aiccu/password"]["description"]="Aiccu password:
 To successfully connect, you must provide your SixXS password. This is
 the same password you use to login to the sixxs.net web site.
";
$elem["aiccu/password"]["descriptionde"]="Aiccu-Passwort:
 Um erfolgreich eine Verbindung zu eröffnen, müssen Sie Ihr SixXS-Passwort angeben. Dies ist das gleiche Passwort, das Sie auch zum Anmelden auf der sixxs.net-Webseite verwenden.
";
$elem["aiccu/password"]["descriptionfr"]="Mot de passe pour aiccu :
 Pour pouvoir vous connecter, il est indispensable de fournir votre mot de passe SixXS. Cet mot de passe est celui utilisé pour la connexion au site web sixxs.net.
";
$elem["aiccu/password"]["default"]="";
$elem["aiccu/brokername"]["type"]="select";
$elem["aiccu/brokername"]["description"]="Tunnel broker:
 Please select the tunnel broker you would like to use.
";
$elem["aiccu/brokername"]["descriptionde"]="Tunnel-Makler:
 Bitte wählen Sie den Tunnel-Makler (Broker) aus, den Sie verwenden möchten.
";
$elem["aiccu/brokername"]["descriptionfr"]="Fournisseur de tunnels IPv6 :
 Veuillez choisir le fournisseur de tunnels (« tunnel broker ») que vous souhaitez utiliser.
";
$elem["aiccu/brokername"]["default"]="";
$elem["aiccu/tunnelname"]["type"]="select";
$elem["aiccu/tunnelname"]["description"]="Tunnel name:
 If more than one tunnel is configured for your account, please specify
 which one should be automatically activated.
";
$elem["aiccu/tunnelname"]["descriptionde"]="Tunnel-Name:
 Falls mehr als ein Tunnel für Ihr Konto konfiguriert ist, geben Sie bitte an, welcher automatisch aktiviert werden soll.
";
$elem["aiccu/tunnelname"]["descriptionfr"]="Nom du tunnel IPv6 :
 Si plus d'un tunnel est configuré pour votre compte, veuillez indiquer celui qui sera activé automatiquement.
";
$elem["aiccu/tunnelname"]["default"]="";
PKG_OptionPageTail2($elem);
?>
