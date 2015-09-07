<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slapos-client");

$elem["shared/slapos/master_url"]["type"]="string";
$elem["shared/slapos/master_url"]["description"]="SlapOS master node URL:
";
$elem["shared/slapos/master_url"]["descriptionde"]="URL des SlapOS-Masterknotens:
";
$elem["shared/slapos/master_url"]["descriptionfr"]="Adresse du nœud maître SlapOS :
";
$elem["shared/slapos/master_url"]["default"]="";
$elem["shared/slapos/master_url_with_ssl_note"]["type"]="note";
$elem["shared/slapos/master_url_with_ssl_note"]["description"]="Master node key and certificate mandatory
 You used an HTTPS URL for the SlapOS master node, so the corresponding
 certificate must be placed in /etc/slapos/ssl/slapos.crt, and the key
 in /etc/slapos/ssl/slapos.key, readable only to root.
";
$elem["shared/slapos/master_url_with_ssl_note"]["descriptionde"]="Pflichtschlüssel und -zertifikat des Masterknotens
 Sie haben eine HTTPS-URL für den SlapOS-Masterknoten verwandt, daher muss das zugehörige Zertifikat in /etc/slapos/ssl/slapos.crt und der Schlüssel nur für Root lesbar in /etc/slapos/ssl/slapos.key platziert werden.
";
$elem["shared/slapos/master_url_with_ssl_note"]["descriptionfr"]="Clé et certificat obligatoires pour le nœud maître
 Une adresse HTTPS a été choisie pour le nœud maître de SlapOS. Dans ce cas, le certificat correspondant doit être mis dans /etc/slapos/ssl/slapos.crt, et la clé dans /etc/slapos/ssl/slapos.key uniquement lisible par le superutilisateur.
";
$elem["shared/slapos/master_url_with_ssl_note"]["default"]="";
PKG_OptionPageTail2($elem);
?>
