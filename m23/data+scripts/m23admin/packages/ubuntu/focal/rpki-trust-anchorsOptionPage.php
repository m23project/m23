<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rpki-trust-anchors");

$elem["rpki-trust-anchors/get_arin_tal"]["type"]="boolean";
$elem["rpki-trust-anchors/get_arin_tal"]["description"]="Do you accept the ARIN Relying Party Agreement (RPA)?
 ARIN forbids third parties from distributing the Trust Anchor Locator (TAL)
 for their RPKI repository, hence this package can download it only if
 you will agree to ARIN's conditions.
 .
 If you want that this package automatically download and installs the ARIN
 TAL, then you need to accept the ARIN Relying Party Agreement (RPA):
 https://www.arin.net/resources/manage/rpki/rpa.pdf .
";
$elem["rpki-trust-anchors/get_arin_tal"]["descriptionde"]="Akzeptieren Sie die ARIN-Gruppenvertrauensvereinbarung (RPA)?
 ARIN verbietet Dritten die Weitergabe des Trust Anchor Locator (TAL) für ihr RPKI-Depot, daher kann dieses Paket es nur herunterladen, wenn Sie ARINs Bedingungen zustimmen.
 .
 Falls Sie möchten, dass dieses Paket den ARIN TAL automatisch herunterlädt und installiert, müssen Sie die ARIN-Gruppenvertrauensvereinbarung (RPA) akzeptieren: https://www.arin.net/resources/manage/rpki/rpa.pdf .
";
$elem["rpki-trust-anchors/get_arin_tal"]["descriptionfr"]="Acceptez-vous les conditions générales d'utilisation (RPA) d'ARIN ?
 ARIN interdit à des tierces parties de distribuer le Trust Anchor Locator (TAL) pour leur dépôt RPKI. Ce paquet ne pourra le télécharger qu'à la condition que vous acceptiez les conditions d'ARIN.
 .
 Si vous souhaitez que ce paquet télécharge et installe de façon automatique le TAL d'ARIN, vous devez accepter les conditions générales d'utilisation (RPA) d'ARIN : https://www.arin.net/resources/manage/rpki/rpa.pdf .
";
$elem["rpki-trust-anchors/get_arin_tal"]["default"]="";
PKG_OptionPageTail2($elem);
?>
