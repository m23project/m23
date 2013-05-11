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
$elem["aiccu/badauth"]["type"]="boolean";
$elem["aiccu/badauth"]["description"]="Re-check authentication details?
 The authentication details you specified appear to be incorrect.
 You should try to log in on the tunnel broker website and
 contact the site administrators.
";
$elem["aiccu/badauth"]["descriptionde"]="Authentifizierung-Details erneut prüfen?
 Die von Ihnen angegebenen Authentifizierung-Details scheinen nicht zu stimmen.Sie sollten versuchen, sich auf der Tunnel-Broker-Website anzumelden und den Administrator der Site zu benachrichtigen.
";
$elem["aiccu/badauth"]["descriptionfr"]="Faut-il contrôler à nouveau les paramètres d'authentification ?
 Les paramètres de connexion fournis semblent être incorrects. Vous devriez vous connecter sur le site du fournisseur de connectivité IPv6 et contacter ses administrateurs.
";
$elem["aiccu/badauth"]["default"]="";
$elem["aiccu/nobrokers"]["type"]="error";
$elem["aiccu/nobrokers"]["description"]="No tunnel brokers available
 No tunnel brokers could be retrieved from DNS (_aiccu + _aiccu.sixxs.net).
 This most likely indicates a DNS configuration problem.
";
$elem["aiccu/nobrokers"]["descriptionde"]="Keine Tunnel-Makler (Broker) verfügbar
 Aus dem DNS konnten keine Tunnel-Makler abgerufen werden ((_aiccu + _aiccu.sixxs.net). Höchstwahrscheinlich liegt das an einem DNS-Konfigurationsproblem.
";
$elem["aiccu/nobrokers"]["descriptionfr"]="Aucun fournisseur de tunnels disponible
 Aucun fournisseur de tunnels n'a pu être retrouvé dans le DNS (_aiccu + _aiccu.sixxs.net). Cela est probablement dû à un défaut de configuration du DNS.
";
$elem["aiccu/nobrokers"]["default"]="";
$elem["aiccu/notunnels"]["type"]="error";
$elem["aiccu/notunnels"]["description"]="No tunnels available
 No tunnels are currently available to you. Please connect to the
 SixXS website at http://www.sixxs.net/ to request a tunnel for your
 account.
";
$elem["aiccu/notunnels"]["descriptionde"]="Keine Tunnel verfügbar
 Für Sie sind derzeit keine Tunnel verfügbar. Bitte verbinden Sie sich mit der SixXS-Webseite unter http://www.sixxs.net/, um einen Tunnel für Ihr Konto zu beantragen.
";
$elem["aiccu/notunnels"]["descriptionfr"]="Aucun tunnel disponible
 Aucun tunnel n'a été configuré pour vous. Veuillez vous connecter au site web de SixXS (http://www.sixxs.net) et y demander la création d'un tunnel pour votre compte.
";
$elem["aiccu/notunnels"]["default"]="";
PKG_OptionPageTail2($elem);
?>
