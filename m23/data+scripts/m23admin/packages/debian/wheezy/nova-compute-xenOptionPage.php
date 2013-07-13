<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nova-compute-xen");

$elem["nova-compute-xen/xenapi_url"]["type"]="string";
$elem["nova-compute-xen/xenapi_url"]["description"]="Address of the XenAPI dom0:
 Nova Compute Xen needs to know the address of the server running XenAPI. You
 can enter an IP address, or a fully qualified domain name if it resolves
 correctly.
 .
 This may be a server running Citrix XenServer, the CentOS Xen Cloud Platform
 (XCP) appliance installed from an ISO image, or even the Kronos Project's XCP
 (available in Debian and Ubuntu as the package xcp-xapi).
 .
 This can later be edited in /etc/nova/nova-compute.conf.
";
$elem["nova-compute-xen/xenapi_url"]["descriptionde"]="Adresse der XenAPI-dom0:
 Nova Compute Xen muss die Adresse des Servers kennen, der XenAPI ausführt. Sie können wahlweise eine IP-Adresse oder einen vollqualifizierten Domain-Namen eingeben, wenn er korrekt aufgelöst wird.
 .
 Das kann ein Server mit Citrix XenServer, die von einem ISO-Image installierte CentOS Xen-Cloud-Platform-(XCP)-Anwendung oder sogar das XCP des Kronos-Projekts sein (in Debian und Ubuntu als Paket xcp-xapi verfügbar).
 .
 Dies kann später in /etc/nova/nova-compute.conf geändert werden.
";
$elem["nova-compute-xen/xenapi_url"]["descriptionfr"]="Adresse pour le dom0 de XenAPI :
 Nova Compute Xen a besoin de connaître l'adresse du serveur qui exécute XenAPI. Vous pouvez indiquer l'adresse IP, ou un nom de domaine pleinement qualifié s'il peut être résolu correctement.
 .
 Cela peut être un serveur exécutant Citrix XenServer, le serveur CentOS Xen Cloud Platform (XCP) installé depuis une image ISO, ou même la version XCP du project Kronos (disponible dans Debian et Ubuntu en tant que paquet xcp-api).
 .
 Ce choix peut être modifié ultérieurement en modifiant le fichier /etc/nova/nova-compute.conf.
";
$elem["nova-compute-xen/xenapi_url"]["default"]="https://my-dom0.example.com";
$elem["nova-compute-xen/xenapi_username"]["type"]="string";
$elem["nova-compute-xen/xenapi_username"]["description"]="Username to connect to XenAPI:
 Please enter the username used to connect to your XenAPI (XCP server).
 .
 This can later be edited in /etc/nova/nova-compute.conf.
";
$elem["nova-compute-xen/xenapi_username"]["descriptionde"]="Benutzername für die Verbindung mit XenAPI:
 Bitte geben Sie den Benutzernamen ein, mit dem Sie sich mit Ihrer XenAPI (XCP-Server) verbinden.
 .
 Dies kann später in /etc/nova/nova-compute.conf geändert werden.
";
$elem["nova-compute-xen/xenapi_username"]["descriptionfr"]="Identifiant de connexion à XenAPI :
 Veuillez indiquer l'identifiant à utiliser pour se connecter à  XenAPI (serveur XCP).
 .
 Ce choix peut être modifié ultérieurement en modifiant le fichier /etc/nova/nova-compute.conf.
";
$elem["nova-compute-xen/xenapi_username"]["default"]="root";
$elem["nova-compute-xen/xenapi_password"]["type"]="password";
$elem["nova-compute-xen/xenapi_password"]["description"]="Password to connect to XenAPI:
 Please enter the password used to connect to your XenAPI (XCP server).
 .
 This can later be edited in /etc/nova/nova-compute.conf.
";
$elem["nova-compute-xen/xenapi_password"]["descriptionde"]="Passwort für die Verbindung mit XenAPI:
 Bitte geben Sie das Passwort ein, mit dem Sie sich mit Ihrer XenAPI (XCP-Server) verbinden.
 .
 Dies kann später in /etc/nova/nova-compute.conf geändert werden.
";
$elem["nova-compute-xen/xenapi_password"]["descriptionfr"]="Mot de passe de connexion à XenAPI :
 Veuillez indiquer le mot de passe à utiliser pour la connexion à XenAPI (serveur XCP).
 .
 Ce choix peut être modifié ultérieurement en modifiant le fichier /etc/nova/nova-compute.conf.
";
$elem["nova-compute-xen/xenapi_password"]["default"]="";
PKG_OptionPageTail2($elem);
?>
