<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tftpd-hpa");

$elem["tftpd-hpa/username"]["type"]="string";
$elem["tftpd-hpa/username"]["description"]="Dedicated system account for the tftpd-hpa TFTP daemon:
 The TFTP server must use a dedicated account for its operation so that
 the system's security is not compromised by running it with superuser
 privileges.
 .
 Please choose that account's username.
";
$elem["tftpd-hpa/username"]["descriptionde"]="Eigenes Systemkonto für den tftpd-hpa TFTP-Daemon:
 Der TFTP-Server muss ein eigenes Konto für den Betrieb verwenden, um die Sicherheit des Systems nicht durch das Betreiben mit Superuser-Rechten zu kompromittieren.
 .
 Bitte wählen Sie den Benutzernamen dieses Kontos.
";
$elem["tftpd-hpa/username"]["descriptionfr"]="Identifiant dédié pour le démon TFTP tftpd-hpa :
 Afin de ne pas compromettre la sécurité du système, le serveur TFTP doit être exécuté avec un identifiant spécifique, différent du superutilisateur.
 .
 Veuillez choisir cet identifiant.
";
$elem["tftpd-hpa/username"]["default"]="tftp";
$elem["tftpd-hpa/directory"]["type"]="string";
$elem["tftpd-hpa/directory"]["description"]="TFTP root directory:
 Please specify the directory that will be used as root for the
 TFTP server.
";
$elem["tftpd-hpa/directory"]["descriptionde"]="TFTP-Wurzelverzeichnis:
 Bitte geben Sie das Verzeichnis an, welches als Wurzelverzeichnis für den TFTP-Server verwendet werden soll.
";
$elem["tftpd-hpa/directory"]["descriptionfr"]="Répertoire racine TFTP :
 Veuillez choisir le répertoire racine qui sera utilisé par le serveur TFTP.
";
$elem["tftpd-hpa/directory"]["default"]="/var/lib/tftpboot";
$elem["tftpd-hpa/address"]["type"]="string";
$elem["tftpd-hpa/address"]["description"]="TFTP server address and port:
 Please specify an address and port to listen to in the form of
 [address][:port].
 .
 By default, the TFTP server listens to port 69 on all addresses and all
 interfaces (0.0.0.0:69). If no port is specified, it defaults to 69.
 .
 Please note that numeric IPv6 addresses must be enclosed in square brackets
 to avoid ambiguity with the optional port information.
";
$elem["tftpd-hpa/address"]["descriptionde"]="TFTP-Serveradresse und -Port:
 Bitte geben Sie eine Adresse und einen Port in der Form [Adresse][:Port] an, an dem auf Anfragen gewartet werden soll.
 .
 Standardmässig wartet der TFTP-Server auf Port 69 auf allen Adressen und allen Schnittstellen (0.0.0.0:69). Ohne Port-Angabe wird die Vorgabe 69 verwendet.
 .
 Bitte beachten Sie, dass numerische IPv6-Adressen in eckige Klammern eingeschlossen werden müssen, um Zweideutigkeiten mit der Port-Information zu vermeiden.
";
$elem["tftpd-hpa/address"]["descriptionfr"]="Adresse et port du serveur TFTP:
 Veuillez indiquer une adresse et un port d'écoute sous la forme [adresse][:port].
 .
 Le serveur TFTP écoute par défaut sur le port 69 pour toutes les adresses et toutes les interfaces (0.0.0.0:69). Si aucun port n'est indiqué, le port par défaut sera le port 69.
 .
 Veuillez noter que pour ne pas être confondues avec des numéros de ports, d'éventuelles adresses IPv6 doit être entourées de crochets.
";
$elem["tftpd-hpa/address"]["default"]="0.0.0.0:69";
$elem["tftpd-hpa/options"]["type"]="string";
$elem["tftpd-hpa/options"]["description"]="TFTP server additional options:
 Additional options can be passed to the TFTP server with this mechanism,
 please consult the tftpd(8) manpage for more information about available
 options.
 .
 Options other than the recommended '--secure' are rarely needed and only
 for special situations. If unsure, leave it at the recommended default value.
";
$elem["tftpd-hpa/options"]["descriptionde"]="Zusätzliche TFTP-Server Optionen:
 Dem TFTP-Server kann mit diesem Mechanismus zusätzliche Optionen übergeben werden. Bitte lesen Sie die Handbuchseite tftpd(8) für weitere Informationen über verfügbare Optionen.
 .
 Andere als die empfohlene Option \"--secure\" werden selten und nur für besondere Situationen benötigt. Falls Sie sich unsicher sind, belassen Sie den Vorgabewert.
";
$elem["tftpd-hpa/options"]["descriptionfr"]="Options supplémentaires pour le serveur TFTP:
 Des options supplémentaires peuvent être utilisées avec le serveur TFTP. Veuillez consulter la page de manuel tftp(8) pour davantage d'informations sur les options disponibles.
 .
 À part l'option « --secure » qui est recommandée, les autres sont rarement nécessaires et ne sont utilisées que pour des situations très spéciales. Dans le doute, vous devriez laisser les valeurs par défaut.
";
$elem["tftpd-hpa/options"]["default"]="--secure";
PKG_OptionPageTail2($elem);
?>
