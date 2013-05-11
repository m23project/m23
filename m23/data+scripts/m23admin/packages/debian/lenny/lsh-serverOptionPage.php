<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lsh-server");

$elem["lsh-server/lshd_port"]["type"]="string";
$elem["lsh-server/lshd_port"]["description"]="lsh server port:
 The default port for lshd is 22. If you would like lshd to run on a
 different port, please specify the alternative port here. If you specify
 22, you will need to manually disable any other ssh servers you have
 running on port 22, other than OpenSSH (from the `openssh-server' package).
 OpenSSH will be automatically disabled, if you choose 22 here.
";
$elem["lsh-server/lshd_port"]["descriptionde"]="Port für den lsh-Server:
 Der Standardport für lshd ist 22. Wenn Sie möchten, dann können Sie lshd auch mit einem anderen Port laufen lassen; bitte geben Sie dann den entsprechenden Port hier an. Wenn Sie Port 22 verwenden wollen, dann müssen Sie alle anderen ssh-Server, (außer OpenSSH aus dem 'openssh-server'-Paket) die Port 22 verwenden, deaktivieren. OpenSSH wird automatisch abgeschaltet wenn Sie hier 22 wählen.
";
$elem["lsh-server/lshd_port"]["descriptionfr"]="Port du serveur lsh :
 Le port par défaut pour lshd est 22. Veuillez modifier cette valeur si vous souhaitez qu'il soit à l'écoute sur un autre port. Si vous choisissez le port 22, pensez à désactiver vous-même les autres serveurs SSH qui pourraient fonctionner sur le port 22, à part OpenSSH (du paquet « openssh-server ») qui, lui, sera désactivé automatiquement si vous choisissez le port 22.
";
$elem["lsh-server/lshd_port"]["default"]="22";
$elem["lsh-server/sftp"]["type"]="boolean";
$elem["lsh-server/sftp"]["description"]="Enable the sftp subsystem?
 If you want to use sftp with lsh, you will need this subsytem.
 Please bear in mind, that it's still experimental. Therefore the default 
 is disabled but can be enabled now or later by manually changing
 /etc/default/lsh-server.
 .
 Please choose whether you want to use the EXPERIMENTAL sftp support now.
";
$elem["lsh-server/sftp"]["descriptionde"]="Soll das sftp Subsystem aktiviert werden?
 Wenn Sie sftp in Verbindung mit lsh benutzen möchten, müssen Sie dieses Subsystem aktivieren. Allerdings sollte Ihnen klar sein, dass die Unterstützung dafür noch experimentell ist. Deswegen ist die Unterstützung dafür Standardmässig deaktiviert, kann allerdings jetzt aktiviert werden oder Sie können später /etc/default/lsh-server anpassen.
 .
 Bitte wählen Sie, ob Sie die EXPERIMENTELLE sftp Unterstützung wünschen.
";
$elem["lsh-server/sftp"]["descriptionfr"]="Faut-il activer les fonctionnalités sftp ?
 Si vous souhaitez utiliser sftp avec lsh, celui-ci doit être activé. Veuillez noter que la gestion de sftp est encore expérimentale. En conséquence, le service est désactivé par défaut. Cette opération peut être réalisée automatiquement. Dans le cas contraire, vous devrez modifier /etc/default/lsh-server pour l'activer.
 .
 Veuillez confirmer si vous souhaitez activer la gestion expérimentale de sftp.
";
$elem["lsh-server/sftp"]["default"]="false";
$elem["lsh-server/purge_hostkey"]["type"]="boolean";
$elem["lsh-server/purge_hostkey"]["description"]="Remove host key on purge?
 When this package is installed, a host key is generated to authenticate
 your host. This host key is not purged with the rest of the package by
 default.
 .
 Please choose whether you want to purge the host key when the package
 is removed.
";
$elem["lsh-server/purge_hostkey"]["descriptionde"]="Beim Entfernen des Packetes den Hostkey löschen?
 Wenn dieses Packet installiert wird, wird ein Hostkey generiert, um den Rechner zu authentifizieren. Dieser Hostkey wird beim entfernen des Packetes standardmässig nicht mit dem Rest des Packetes gelöscht.
 .
 Bitte wählen Sie, ob Sie den Hostkey beim entfernen des Packetes löschen wollen.
";
$elem["lsh-server/purge_hostkey"]["descriptionfr"]="Faut-il supprimer la clé d'hôte lors de la purge du paquet ?
 Lors de l'installation de ce paquet, une clé d'hôte est générée pour permettre l'authentification de votre serveur. Par défaut, cette clé d'hôte n'est pas supprimée lorsque le paquet est complètement supprimé (purgé).
 .
 Si vous souhaitez que la clé d'hôte soit supprimée quand le paquet est purgé, vous devriez choisir cette option.
";
$elem["lsh-server/purge_hostkey"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
