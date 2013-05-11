<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openerp-server");

$elem["openerp-server/username"]["type"]="string";
$elem["openerp-server/username"]["description"]="Dedicated system account for the Open ERP server:
 The Open ERP server must use a dedicated account for its operation so that
 the system's security is not compromised by running it with superuser
 privileges.
 .
 Please choose that account's username.
";
$elem["openerp-server/username"]["descriptionde"]="Eigenes Systemkonto für den Open ERP-Server:
 Der Open ERP-Server muss ein eigenes Konto für den Betrieb verwenden, um die Sicherheit des Systems nicht durch das Betreiben mit Superuser-Rechten zu kompromittieren.
 .
 Bitte wählen Sie den Benutzernamen dieses Kontos.
";
$elem["openerp-server/username"]["descriptionfr"]="Identifiant dédié pour le serveur Open ERP:
 Le serveur Open ERP doit être exécuté avec un identifiant spécifique, différent du superutilisateur, afin de ne pas compromettre la sécurité du système.
 .
 Veuillez choisir cet identifiant.
";
$elem["openerp-server/username"]["default"]="openerp";
PKG_OptionPageTail2($elem);
?>
