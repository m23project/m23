<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isc-dhcp-server");

$elem["isc-dhcp-server/interfaces"]["type"]="string";
$elem["isc-dhcp-server/interfaces"]["description"]="Network interfaces on which the DHCP server should listen:
 Please specify on which network interface(s) the DHCP server should
 listen for DHCP requests. Multiple interface names should be entered
 as a space-separated list.
 .
 The interfaces will be automatically detected if this field is left
 blank.
";
$elem["isc-dhcp-server/interfaces"]["descriptionde"]="Netzwerkschnittstelle, an der der DHCP-Server auf Anfragen warten soll:
 Bitte geben Sie die Netzwerkschnittstelle(n) ein, an der bzw. denen der DHCP-Server auf DHCP-Anfragen warten soll. Mehrere Schnittstellennamen sollten in einer Liste, durch Leerzeichen getrennt, eingegeben werden.
 .
 Die Schnittstellen werden automatisch erkannt, falls hier nichts eingegeben wird.
";
$elem["isc-dhcp-server/interfaces"]["descriptionfr"]="Interfaces réseau où le serveur DHCP sera à l'écoute :
 Veuillez indiquer, séparés par des espaces, les noms des interfaces réseaux que le relais DHCP doit tenter de configurer. 
 .
 Les interfaces seront automatiquement détectées si ce champ est vide.
";
$elem["isc-dhcp-server/interfaces"]["default"]="";
PKG_OptionPageTail2($elem);
?>
