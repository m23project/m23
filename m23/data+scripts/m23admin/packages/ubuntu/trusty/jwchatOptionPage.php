<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("jwchat");

$elem["jwchat/ApacheServerName"]["type"]="string";
$elem["jwchat/ApacheServerName"]["description"]="The name of apache's virtual server used for jwchat:
 The automatic apache2 configuration needs a name for a virtual server that
 is used exclusively by jwchat. If you do not want any automatic
 configuration, please answer 'none' here (without quotes).
";
$elem["jwchat/ApacheServerName"]["descriptionde"]="Der Name des von jwchat verwendeten virtuellen Apache-Servers:
 Die automatische Apache2-Konfiguration benötigt einen Namen für einen virtuellen Server, der ausschließlich von jwchat verwendet wird. Wenn Sie die automatische Konfiguration abschalten wollen, geben Sie bitte 'none' ein (ohne Anführungszeichen).
";
$elem["jwchat/ApacheServerName"]["descriptionfr"]="Nom du serveur virtuel Apache utilisé pour jwchat :
 La configuration automatique d'Apache2 nécessite de configurer un serveur virtuel qui n'est utilisé que par jwchat. Veuillez répondre « none » (sans les guillemets) si vous ne souhaitez pas configurer automatiquement Apache2.
";
$elem["jwchat/ApacheServerName"]["default"]="jabber";
$elem["jwchat/JabberAddress"]["type"]="string";
$elem["jwchat/JabberAddress"]["description"]="The URL of your jabber server:
 Please enter the address where your jabber server can be reached. Usually you
 can leave the default value unchanged if you have installed ejabberd locally.
";
$elem["jwchat/JabberAddress"]["descriptionde"]="Die URL des Jabberservers:
 Geben Sie bitte die Adresse des Jabberservers ein. Normalerweise können Sie den Vorgabewert benutzen, wenn Sie ejabberd lokal installiert haben.
";
$elem["jwchat/JabberAddress"]["descriptionfr"]="URL du serveur Jabber :
 Veuillez indiquer l'adresse du serveur Jabber. En général, la valeur par défaut convient si vous avez installé ejabberd.
";
$elem["jwchat/JabberAddress"]["default"]="http://localhost:5280/http-bind/";
PKG_OptionPageTail2($elem);
?>
