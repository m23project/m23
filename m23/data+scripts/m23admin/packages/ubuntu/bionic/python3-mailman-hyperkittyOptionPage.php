<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("python3-mailman-hyperkitty");

$elem["python3-mailman-hyperkitty/no_archiverkey"]["type"]="note";
$elem["python3-mailman-hyperkitty/no_archiverkey"]["description"]="Failed to determine MAILMAN_ARCHIVER_KEY
 The Mailman3 Hyperkitty plugin needs an archiver key to authenticate
 against the Hyperkitty archiver. If 'mailman3-web' is installed locally,
 the archiver key is derived automatically from the setup.
 .
 Please either install 'mailman3-web' and run 'dpkg-reconfigure
 python3-mailman-hyperkitty' afterwards, or configure the archiver key
 manually at '/etc/mailman3/mailman-hyperkitty.cfg'.
";
$elem["python3-mailman-hyperkitty/no_archiverkey"]["descriptionde"]="";
$elem["python3-mailman-hyperkitty/no_archiverkey"]["descriptionfr"]="Échec lors de la récupération de MAILMAN_ARCHIVER_KEY
 Le plugin Mailman3 pour Hyperkitty nécessite une clef pour s'authentifier vis-à-vis de l'instance d'Hyperkitty à laquelle il envoie les courriels. Si le paquet 'mailman3-web' est installé localement, la clef est dérivée automatiquement depuis sa configuration.
 .
 Installez 'maikman3-web' et lancez dpkg-reconfigure 'python3-mailman-hyperkitty', ou bien ajoutez cette clef au bon endroit dans le fichier '/etc/mailman3/mailman-hyperkitty.cfg'.
";
$elem["python3-mailman-hyperkitty/no_archiverkey"]["default"]="";
PKG_OptionPageTail2($elem);
?>
