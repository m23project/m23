<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nn");

$elem["nn/ask-newsserver"]["type"]="string";
$elem["nn/ask-newsserver"]["description"]="NNTP server to use:
 Enter the fully qualified host name of the news server to use for reading.
";
$elem["nn/ask-newsserver"]["descriptionde"]="verwendeter NNTP-Server:
 Geben Sie den vollständigen Rechnernamen des News-Servers ein, den Sie zum Lesen verwenden.
";
$elem["nn/ask-newsserver"]["descriptionfr"]="Nom d'hôte du serveur NNTP :
 Veuillez indiquer le nom complet du serveur utilisé pour lire les nouvelles.
";
$elem["nn/ask-newsserver"]["default"]="news";
PKG_OptionPageTail2($elem);
?>
