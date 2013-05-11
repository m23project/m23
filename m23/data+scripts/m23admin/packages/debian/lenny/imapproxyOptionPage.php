<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("imapproxy");

$elem["imapproxy/imap-server"]["type"]="string";
$elem["imapproxy/imap-server"]["description"]="IMAP server to connect to:
 Please enter the hostname or address of the IMAP server ImapProxy will
 connect to.
";
$elem["imapproxy/imap-server"]["descriptionde"]="IMAP-Server, zu dem verbunden werden soll:
 Bitte geben Sie den Namen oder die Adresse des IMAP-Servers ein, zu dem ImapProxy sich verbinden wird.
";
$elem["imapproxy/imap-server"]["descriptionfr"]="Serveur IMAP :
 Veuillez indiquer le nom d'hôte ou l'adresse IP du serveur IMAP auquel ImapProxy se connectera.
";
$elem["imapproxy/imap-server"]["default"]="localhost";
PKG_OptionPageTail2($elem);
?>
