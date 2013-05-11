<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apticron");

$elem["apticron/notification"]["type"]="string";
$elem["apticron/notification"]["description"]="E-Mail address(es) to notify:
 Specify e-mail addresses, space seperated, that should be notified of
 pending updates.
";
$elem["apticron/notification"]["descriptionde"]="Zu benachrichtigende E-Mail-Adresse(n):
  Geben Sie die E-Mail-Adressen der Benutzer an, die von bevorstehenden Updates informiert werden sollen. Trennen Sie mehrere E-Mail-Adressen mit einen Leerzeichen.
";
$elem["apticron/notification"]["descriptionfr"]="Adresse(s) électronique(s) des personnes à prévenir:
 Veuillez indiquer les adresses électroniques, séparées par des espaces, des personnes qui doivent être prévenues des mises à jour en attente.
";
$elem["apticron/notification"]["default"]="root";
PKG_OptionPageTail2($elem);
?>
