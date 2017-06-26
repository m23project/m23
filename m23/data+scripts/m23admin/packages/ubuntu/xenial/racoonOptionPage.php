<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("racoon");

$elem["racoon/config_mode"]["type"]="select";
$elem["racoon/config_mode"]["choices"][1]="direct";
$elem["racoon/config_mode"]["choicesde"][1]="direkt";
$elem["racoon/config_mode"]["choicesfr"][1]="Modification directe";
$elem["racoon/config_mode"]["description"]="Configuration mode for racoon IKE daemon:
 Racoon can be configured either directly, by editing
 /etc/racoon/racoon.conf, or using the racoon-tool administrative front end.
 .
 Use of the \"direct\" method is strongly recommended if you want to use all
 the racoon examples on the Net, and if you want to use the full
 racoon feature set. You will have to directly edit /etc/racoon/racoon.conf
 and possibly manually set up the Security Policy Database via setkey.
 .
 Racoon-tool has been updated for racoon 0.8.0, and is for use in basic
 configuration setups. It gives the benefit of managing the SPD along with the
 IKE that strongSwan offers. IPv6, transport/tunnel mode (ESP/AH), PSK/X509
 auth, and basic \"anonymous\" VPN server are supported.
 .
 More information is available in /usr/share/doc/racoon/README.Debian.
";
$elem["racoon/config_mode"]["descriptionde"]="Art der Einrichtung des Racoon-IKE-Daemons:
 Racoon kann entweder direkt durch Bearbeitung von /etc/racoon/racoon.conf oder über die administrative Oberfläche von Racoon-Tool konfiguriert werden.
 .
 Die Verwendung der »direkten« Methode wird dringend empfohlen, wenn Sie die vielen Racoon-Beispiele aus dem Netz verwenden und alle Fähigkeiten von Racoon ausreizen wollen. Sie werden /etc/racoon/racoon.conf direkt bearbeiten und möglicherweise die Sicherheitsrichtlinien-Datenbank (Security Policy Database) via Setkey per Hand aufsetzen müssen.
 .
 Racoon-Tool wurde für Racoon 0.8.0 auf den neuesten Stand gebracht und ist für die Verwendung in Basiskonfigurationen. Es hat den Vorzug, die SPD zusammen mit dem von strongSwan angebotenen IKE zu verwalten. IPv6, Transport/Tunnel-Modus (ESP/AH), PSK/X509-Authentifizierung und einfacher »anonymer« VPN-Server werden unterstützt.
 .
 Weitere Informationen finden Sie in /usr/share/doc/racoon/README.Debian.
";
$elem["racoon/config_mode"]["descriptionfr"]="Mode de configuration pour le démon IKE racoon :
 Racoon peut être configuré de deux façons, soit en modifiant directement le fichier /etc/racoon/racoon.conf, soit en utilisant l'outil d'administration racoon-tool.
 .
 Il est recommandé d'utiliser la méthode « directe » afin de pouvoir bénéficier des exemples d'utilisation de Racoon disponibles sur l'Internet et pour utiliser toutes les fonctionnalités de Racoon. Vous devrez alors modifier /etc/racoon/racoon.conf et éventuellement créer la base de données de politiques de sécurité avec setkey.
 .
 Racoon-tool a été mis à jour pour Racoon 0.8.0 et permet de créer des configurations de base. Il a l'avantage de gérer la base de données de politiques de sécurité en même temps que le protocole d'échange de clés (IKE) fourni par strongSwan. Il gère IPv6, le mode transport/tunnel (ESP/AH), l'authentification à clé pré-partagée PSK/X509 et un VPN « anonyme » simple.
 .
 Plus d'informations sont disponibles dans le fichier /usr/share/doc/racoon/README.Debian.
";
$elem["racoon/config_mode"]["default"]="direct";
PKG_OptionPageTail2($elem);
?>
