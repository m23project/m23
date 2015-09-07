<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lsh-server");

$elem["lsh-server/lshd_port"]["type"]="string";
$elem["lsh-server/lshd_port"]["description"]="lsh server port:
 The default port for lshd is 22. If lshd should run on a different port,
 please specify the alternative port here. If you specify 22, you will
 need to manually disable any other SSH servers running on port 22, other
 than OpenSSH (from the package openssh-server), which will be disabled
 automatically if you choose 22 here.
";
$elem["lsh-server/lshd_port"]["descriptionde"]="Port für den lsh-Server:
 Der Standardport für lshd ist 22. Wenn lshd auf einem anderen Port laufen soll, geben Sie den entsprechenden Port bitte hier an. Wenn Sie Port 22 verwenden wollen, dann müssen Sie alle anderen SSH-Server (außer OpenSSH aus dem Paket »openssh-server«), die Port 22 verwenden, manuell deaktivieren. OpenSSH wird automatisch abgeschaltet, wenn Sie hier 22 wählen.
";
$elem["lsh-server/lshd_port"]["descriptionfr"]="Port du serveur lsh :
 Le port par défaut pour lshd est 22. Veuillez modifier cette valeur si vous souhaitez qu'il soit à l'écoute sur un autre port. Si vous choisissez le port 22, pensez à désactiver vous-même les autres serveurs SSH qui pourraient fonctionner sur le port 22. Cela est inutile pour OpenSSH (du paquet « openssh-server ») qui, lui, sera, dans ce cas, désactivé automatiquement.
";
$elem["lsh-server/lshd_port"]["default"]="22";
$elem["lsh-server/sftp"]["type"]="boolean";
$elem["lsh-server/sftp"]["description"]="Enable the SFTP subsystem?
 Please choose whether you want to use the EXPERIMENTAL lsh SFTP support.
 .
 Since it is experimental, the default is for it to be disabled, but it
 can be enabled now or later by manually changing /etc/default/lsh-server.
";
$elem["lsh-server/sftp"]["descriptionde"]="Soll das SFTP-Subsystem aktiviert werden?
 Bitte wählen Sie, ob Sie die EXPERIMENTELLE lsh-SFTP-Unterstützung wünschen.
 .
 Da dies noch experimentell ist, ist es standardmäßig deaktiviert, kann aber jetzt oder später aktiviert werden, indem /etc/default/lsh-server manuell angepasst wird.
";
$elem["lsh-server/sftp"]["descriptionfr"]="Faut-il activer les fonctionnalités SFTP ?
 Veuillez confirmer si vous souhaitez activer la gestion expérimentale de SFTP.
 .
 La gestion de SFTP est encore expérimentale et le service est désactivé par défaut. Il est possible de l'activer automatiquement maintenant ou plus tard en modifiant /etc/default/lsh-server.
";
$elem["lsh-server/sftp"]["default"]="false";
$elem["lsh-server/purge_hostkey"]["type"]="boolean";
$elem["lsh-server/purge_hostkey"]["description"]="Remove host key on purge?
 When this package is installed, a host key is generated to authenticate
 your host.
 .
 Please choose whether you want to purge the host key when the package
 is removed.
";
$elem["lsh-server/purge_hostkey"]["descriptionde"]="Beim Entfernen des Pakets den kryptografischen Schlüssel des Rechners löschen?
 Wenn dieses Paket installiert wird, wird ein kryptografischer Schlüssel generiert, um den Rechner zu authentifizieren.
 .
 Bitte wählen Sie, ob Sie den kryptografischen Schlüssel beim Entfernen des Pakets löschen wollen.
";
$elem["lsh-server/purge_hostkey"]["descriptionfr"]="Faut-il supprimer la clé d'hôte lors de la purge du paquet ?
 Lors de l'installation de ce paquet, une clé d'hôte est générée pour permettre l'authentification de votre serveur.
 .
 Si vous souhaitez que la clé d'hôte soit supprimée quand le paquet est purgé, vous devriez choisir cette option.
";
$elem["lsh-server/purge_hostkey"]["default"]="true";
$elem["lsh-server/extra_args"]["type"]="string";
$elem["lsh-server/extra_args"]["description"]="Additional arguments to pass to lshd:
";
$elem["lsh-server/extra_args"]["descriptionde"]="Zusätzliche Argumente für lshd:
";
$elem["lsh-server/extra_args"]["descriptionfr"]="Paramètres supplémentaires pour lshd :
";
$elem["lsh-server/extra_args"]["default"]="";
PKG_OptionPageTail2($elem);
?>
