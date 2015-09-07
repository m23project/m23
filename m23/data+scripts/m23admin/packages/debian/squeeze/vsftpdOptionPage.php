<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("vsftpd");

$elem["vsftpd/username"]["type"]="string";
$elem["vsftpd/username"]["description"]="Dedicated system account for the vsftpd FTP daemon:
 The FTP server must use a dedicated account for its operation so that
 the system's security is not compromised by running it with superuser
 privileges.
 .
 Please choose that account's username.
";
$elem["vsftpd/username"]["descriptionde"]="Eigenes Systemkonto für den vsftpd FTP-Daemon:
 Der FTP-Server muss ein eigenes Konto für den Betrieb verwenden, um die Sicherheit des Systems nicht durch das Betreiben mit Superuser-Rechten zu kompromittieren.
 .
 Bitte wählen Sie den Benutzernamen dieses Kontos.
";
$elem["vsftpd/username"]["descriptionfr"]="Identifiant dédié pour le démon FTP vsftpd :
 Le serveur FTP doit être exécuté avec un identifiant spécifique, différent du superutilisateur, afin de ne pas compromettre la sécurité du système.
 .
 Veuillez choisir cet identifiant.
";
$elem["vsftpd/username"]["default"]="ftp";
$elem["vsftpd/directory"]["type"]="string";
$elem["vsftpd/directory"]["description"]="FTP root directory:
 Please specify the directory that will be used as root for the
 FTP server.
";
$elem["vsftpd/directory"]["descriptionde"]="FTP-Wurzelverzeichnis:
 Bitte geben Sie das Verzeichnis an, welches als Wurzelverzeichnis für den FTP-Server verwendet werden soll.
";
$elem["vsftpd/directory"]["descriptionfr"]="Répertoire racine FTP :
 Veuillez choisir le répertoire racine qui sera utilisé par le serveur FTP.
";
$elem["vsftpd/directory"]["default"]="/srv/ftp";
PKG_OptionPageTail2($elem);
?>
