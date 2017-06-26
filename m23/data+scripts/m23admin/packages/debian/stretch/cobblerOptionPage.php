<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cobbler");

$elem["cobbler/password"]["type"]="password";
$elem["cobbler/password"]["description"]="New password for the \"cobbler\" user:
 It is highly recommended that you set a password for the administrative
 \"cobbler\" user.
 .
 It can be reconfigured later using \"dpkg-reconfigure -plow cobbler\", and
 users can be added to cobbler with
 .
  htdigest /etc/cobbler/users.digest Cobbler USERNAME
";
$elem["cobbler/password"]["descriptionde"]="Neues Passwort für den »cobbler«-Benutzer:
 Es wird sehr empfohlen, dass Sie für den administrativen Benutzer »cobbler« ein Passwort festlegen.
 .
 Es kann später mit »dpkg-reconfigure -plow cobbler« wieder geändert werden. Beim Hinzufügen neuer Benutzer zu Cobbler hilft
 .
  htdigest /etc/cobbler/users.digest Cobbler BENUTZERNAME
";
$elem["cobbler/password"]["descriptionfr"]="Veuillez indiquer le nouveau mot de passe pour l'utilisateur « cobbler » :
 Il est fortement recommandé de définir un mot de passe pour l'administrateur de « cobbler ».
 .
 Ce réglage peut être revu plus tard en utilisant « dpkg-reconfigure -plow cobbler »,  et il est possible d'ajouter des utilisateurs pour cobbler avec
 .
  htdigest /etc/cobbler/users.digest Cobbler NOM_D_UTILISATEUR
";
$elem["cobbler/password"]["default"]="";
$elem["cobbler/server"]["type"]="string";
$elem["cobbler/server"]["description"]="Address of the Cobbler server:
 Please specify the hostname or IP address that clients will use for
 this server during installs.
 .
 This address will be written into \"/etc/cobbler/settings\" as the
 value of the \"server\" field. For Kickstart features to work properly,
 it must be set to something other than localhost.
";
$elem["cobbler/server"]["descriptionde"]="Adresse des Cobbler-Servers:
 Bitte geben Sie den Hostnamen oder die IP-Adresse an, unter dem/der die Clients während der Installationen diesen Server erreichen werden.
 .
 Diese Adresse wird als Wert für das »server«-Feld in der »/etc/cobbler/settings« eingetragen. Damit die Kickstart-Funktionen richtig arbeiten, muss hier etwas anderes stehen als localhost.
";
$elem["cobbler/server"]["descriptionfr"]="Adresse du serveur Cobbler :
 Veuillez indiquer le nom d'hôte ou l'adresse IP que les clients utiliseront pour ce serveur pendant les installations.
 .
 Cette adresse sera inscrite dans « /etc/cobbler/settings » comme valeur pour le champ « server ». Pour que le système « Kickstart » fonctionne correctement, il doit être paramétré autrement que sur localhost.
";
$elem["cobbler/server"]["default"]="10.20.0.2";
$elem["cobbler/next_server"]["type"]="string";
$elem["cobbler/next_server"]["description"]="IP address of the boot server:
 Please specify the local IP address of the boot server on the PXE
 network.
 .
 This address will be written into \"/etc/cobbler/settings\" as the
 value of the \"next_server\" field. For PXE features to work properly,
 it must be set to something other than 127.0.0.1.
";
$elem["cobbler/next_server"]["descriptionde"]="IP-Adresse des Boot-Servers:
 Bitte geben Sie die lokale IP-Adresse des Boot-Servers im PXE-Netzwerk an.
 .
 Diese Adresse wird als Wert für das »next_server«-Feld in der »/etc/cobbler/settings« eingetragen. Damit die PXE-Funktionen richtig arbeiten, muss hier etwas anderes stehen als 127.0.0.1«.
";
$elem["cobbler/next_server"]["descriptionfr"]="Adresse IP du serveur d'amorçage :
 Veuillez indiquer l'adresse IP locale du serveur d'amorçage sur le réseau PXE.
 .
 Cette adresse sera inscrite dans « /etc/cobbler/settings » comme valeur pour le champ « next-server ». Pour que le système PXE fonctionne correctement, il doit être paramétré autrement que sur 127.0.0.1.
";
$elem["cobbler/next_server"]["default"]="10.20.0.2";
PKG_OptionPageTail2($elem);
?>
