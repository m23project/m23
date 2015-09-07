<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("chillispot");

$elem["chillispot/config"]["type"]="boolean";
$elem["chillispot/config"]["description"]="Would you like to handle configuration through debconf?
 This assistant can handle basic Chillispot configuration for you, 
 asking a few questions. Later you can adjust config by editing
 '/etc/chilli.conf'. However you should have to previously setup the
 radius server and UAM server in order to have it properly working.
";
$elem["chillispot/config"]["descriptionde"]="Möchten Sie die Einstellungen mittels Debconf verwalten?
 Dieser Assistent kann die Basiskonfiguration von Chillispot für Sie erledigen. Er wird einige Fragen stellen. Später können Sie die Einstellungen anpassen, indem Sie /etc/chilli.conf editieren. Jedoch sollten Sie vorher den Radius-Server und den UAM-Server einrichten, damit alles funktioniert.
";
$elem["chillispot/config"]["descriptionfr"]="Faut-il gérer automatiquement la configuration de Chillispot ?
 Il est possible de configurer ChilliSpot de façon sommaire en posant quelques questions. Vous pourrez ensuite ajuster la configuration en modifiant le fichier /etc/chilli.conf. Cependant, cela ne fonctionnera que si vous avez déjà configuré les serveurs RADIUS et UAM.
";
$elem["chillispot/config"]["default"]="true";
$elem["chillispot/radiusserver1"]["type"]="string";
$elem["chillispot/radiusserver1"]["description"]="IP address of radius server 1:
 Radius server handles accounting for the hotspot. Enter the IP
 address for the first radius server.
";
$elem["chillispot/radiusserver1"]["descriptionde"]="IP-Adresse von Radius-Server 1:
 Ein Radius-Server verwaltet die Buchführung für den Hotspot. Geben Sie die IP-Adresse für den ersten Radius-Server ein.
";
$elem["chillispot/radiusserver1"]["descriptionfr"]="Adresse IP du premier serveur RADIUS :
 Le serveur RADIUS gère le décomptage pour le point d'accès. Veuillez indiquer l'adresse IP du premier serveur RADIUS.
";
$elem["chillispot/radiusserver1"]["default"]="";
$elem["chillispot/radiusserver2"]["type"]="string";
$elem["chillispot/radiusserver2"]["description"]="IP address for radius server 2:
 Second radius server acts as backup for hotspot accounting.
 .
 If you have only one radius server you should enter
 the same IP address for radius server 1.
";
$elem["chillispot/radiusserver2"]["descriptionde"]="IP-Adresse von Radius-Server 2:
 Der zweite Radius-Server fungiert als Backup für die Hotspot-Buchführung.
 .
 Falls Sie nur einen Radius-Server haben, sollten Sie die selbe IP-Adresse wie für den Radius-Server 1 eintragen.
";
$elem["chillispot/radiusserver2"]["descriptionfr"]="Adresse IP du second serveur RADIUS :
 Le second serveur RADIUS fait office de secours pour le décomptage pour le point d'accès.
 .
 Si vous n'avez pas de serveur de secours, veuillez indiquer l'adresse IP du premier serveur.
";
$elem["chillispot/radiusserver2"]["default"]="";
$elem["chillispot/radiussecret"]["type"]="password";
$elem["chillispot/radiussecret"]["description"]="Radius shared secret:
  This is the password shared on both radius servers.
";
$elem["chillispot/radiussecret"]["descriptionde"]="Gemeinsames Geheimnis für Radius:
 Dies ist das Passwort, das von beiden Radius-Servern verwendet wird.
";
$elem["chillispot/radiussecret"]["descriptionfr"]="Secret partagé du RADIUS :
 Veuillez indiquer le mot de passe partagé par les deux serveurs RADIUS.
";
$elem["chillispot/radiussecret"]["default"]="";
$elem["chillispot/dhcpif"]["type"]="string";
$elem["chillispot/dhcpif"]["description"]="Ethernet interface for DHCP to listen:
 Chillispot has an internal DHCP server which will assign IP
 addresses to the clients. You need to specify the interface
 which is connected to the access points.
 .
 In a typical configuration this should be set to 'eth1'.
";
$elem["chillispot/dhcpif"]["descriptionde"]="Ethernet-Schnittstelle, an der DHCP-Verbindungen erwartet werden sollen:
 Chillispot hat einen internen DHCP-Server, der den Clients IP-Adressen zuteilen wird. Sie müssen die Schnittstelle angeben, die mit der Basisstation (Access Point) verbunden ist.
 .
 Bei einer typischen Konfiguration sollte dies auf »eth1« gesetzt werden.
";
$elem["chillispot/dhcpif"]["descriptionfr"]="Interface Ethernet où le serveur DHCP sera à l'écoute :
 Le serveur DHCP interne à ChilliSpot assignera des adresses IP aux clients. Vous devez indiquer une interface connectée aux points d'accès.
 .
 Dans une configuration typique, le serveur écoute eth1.
";
$elem["chillispot/dhcpif"]["default"]="";
$elem["chillispot/uamserver"]["type"]="string";
$elem["chillispot/uamserver"]["description"]="URL of UAM server:
 User authorization is handled by a UAM server, which can be a
 webserver. You need to enter the URL for this component.
 .
 Normally this is a cgi program like 'https://yourserver/hotspotlogin.cgi'
";
$elem["chillispot/uamserver"]["descriptionde"]="URL des UAM-Servers:
 Die Benutzerautorisierung wird von einem UAM-Server durchgeführt. Dies kann ein Webserver sein. Sie müssen die URL für diese Komponente eingeben.
 .
 Normalerweise ist dies ein CGI-Programm wie »https://ihrserver/hotspotlogin.cgi«.
";
$elem["chillispot/uamserver"]["descriptionfr"]="URL du serveur UAM :
 L'autorisation d'accès d'un utilisateur est gérée par un serveur UAM, qui peut être un serveur Web. Veuillez indiquer l'URL d'accès à ce service.
 .
 Généralement l'UAM est un programme CGI comme https://yourserver/hotspotlogin.cgi
";
$elem["chillispot/uamserver"]["default"]="";
$elem["chillispot/uamhomepage"]["type"]="string";
$elem["chillispot/uamhomepage"]["description"]="URL of UAM homepage:
 This is the initial homepage that will be displayed to the hotspot
 clients.
";
$elem["chillispot/uamhomepage"]["descriptionde"]="URL der UAM-Homepage:
 Dies ist die Anfangs-Homepage, die von den Hotspot-Clients angezeigt wird.
";
$elem["chillispot/uamhomepage"]["descriptionfr"]="URL de la page d'accueil de l'UAM :
 Veuillez indiquer l'adresse de la page d'accueil affichée aux clients du point d'accès.
";
$elem["chillispot/uamhomepage"]["default"]="";
$elem["chillispot/uamsecret"]["type"]="password";
$elem["chillispot/uamsecret"]["description"]="Shared password between chillispot and webserver:
 In order to handle authentication Chillispot and the UAM 
 webserver share a password to communicate.
";
$elem["chillispot/uamsecret"]["descriptionde"]="Gemeinsames Passwort zwischen Chillispot und Webserver:
 Um die Autorisierung durchzuführen, besitzen Chillispot und der UAM-Webserver ein gemeinsames Passwort zur Kommunikation.
";
$elem["chillispot/uamsecret"]["descriptionfr"]="Mot de passe partagé entre ChilliSpot et le serveur Web :
 Veuillez indiquer le mot de passe partagé par ChilliSpot et le serveur d'UAM, utilisé pour gérer l'authentification.
";
$elem["chillispot/uamsecret"]["default"]="";
PKG_OptionPageTail2($elem);
?>
