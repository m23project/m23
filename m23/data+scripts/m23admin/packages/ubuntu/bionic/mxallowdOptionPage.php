<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mxallowd");

$elem["mxallowd/real_mailservers"]["type"]="string";
$elem["mxallowd/real_mailservers"]["description"]="Real mailservers:
 Enter the IP addresses of the real mailservers.
";
$elem["mxallowd/real_mailservers"]["descriptionde"]="Echte E-Mail-Server:
 Geben Sie die IP-Adressen der echten E-Mail-Server ein.
";
$elem["mxallowd/real_mailservers"]["descriptionfr"]="Serveurs de courriels réels :
 Veuillez indiquer les adresses IP des serveurs de courriel réels.
";
$elem["mxallowd/real_mailservers"]["default"]="";
$elem["mxallowd/fake_mailservers"]["type"]="string";
$elem["mxallowd/fake_mailservers"]["description"]="Fake mailservers:
 Enter the IP addresses of the fake mailservers.
";
$elem["mxallowd/fake_mailservers"]["descriptionde"]="Unechte E-Mail-Server:
 Geben Sie die IP-Adressen der unechten E-Mail-Server ein.
";
$elem["mxallowd/fake_mailservers"]["descriptionfr"]="Serveurs de courriels apparents :
 Veuillez indiquer les adresses IP des serveurs de courriel apparents.
";
$elem["mxallowd/fake_mailservers"]["default"]="";
PKG_OptionPageTail2($elem);
?>
