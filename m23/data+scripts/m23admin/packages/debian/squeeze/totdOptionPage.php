<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("totd");

$elem["totd/use_ipv6"]["type"]="boolean";
$elem["totd/use_ipv6"]["description"]="Support IPv6?
 totd can be used both with IPv4 and IPv6. Please choose whether you
 want to support IPv6.
";
$elem["totd/use_ipv6"]["descriptionde"]="IPv6 unterstützen?
 totd kann sowohl mit IPv4 wie auch mit IPv6 verwendet werden. Bitte wählen Sie, ob IPv6 unterstützt werden soll.
";
$elem["totd/use_ipv6"]["descriptionfr"]="Faut-il gérer IPv6 ?
 Totd peut être utilisé simultanément avec IPv4 et IPv6. Veuillez choisir si la gestion d'IPv6 doit être activée.
";
$elem["totd/use_ipv6"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
