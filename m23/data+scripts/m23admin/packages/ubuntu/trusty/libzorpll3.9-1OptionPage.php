<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libzorpll3.9-1");

$elem["zorplib/admin-email"]["type"]="string";
$elem["zorplib/admin-email"]["description"]="Email address for Zorp notifications:
 Some Zorp applications are able to send a notification email in case
 of an unexpected process termination. Leave this empty (or specify
 \"NONE\") if no such notifications should be sent.
";
$elem["zorplib/admin-email"]["descriptionde"]="E-Mail-Adresse für Zorp-Benachrichtigungen:
 Einige Zorp-Anwendungen können im Fall eines unerwarteten Prozessabbruchs eine Benachrichtigung-E-Mail senden. Lassen Sie dies leer (oder geben Sie »NONE« an), falls keine derartigen Benachrichtigungen gesandt werden sollen.
";
$elem["zorplib/admin-email"]["descriptionfr"]="Adresse électronique de notification pour Zorp :
 Certaines applications Zorp peuvent envoyer un courrier électronique lorsqu'un processus se termine de manière inattendue. Si vous ne souhaitez pas activer les notifications, vous pouvez laisser ce champ vide ou mentionner « NONE » (sans les guillemets).
";
$elem["zorplib/admin-email"]["default"]="NONE";
PKG_OptionPageTail2($elem);
?>
