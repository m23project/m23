<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libhyperscan5");

$elem["libhyperscan/cpu-ssse3"]["type"]="boolean";
$elem["libhyperscan/cpu-ssse3"]["description"]="Really install package?
 This CPU lacks support for the Supplemental Streaming SIMD Extensions
 3 (SSSE3) instruction set that is required to execute programs linked
 against hyperscan.
";
$elem["libhyperscan/cpu-ssse3"]["descriptionde"]="Paket installieren?
 Der CPU dieses Systems fehlt die \"Supplemental Streaming SIMD Extensions 3\" (SSSE3) Befehlssatzwerweiterung. Diese ist Voraussetzung, um Programme auszuführen, die die hyperscan-Bibliothek verwenden.
";
$elem["libhyperscan/cpu-ssse3"]["descriptionfr"]="Faut-il vraiment installer le paquet ?
 Le processeur ne supporte pas le jeu d'instructions Supplemental Streaming SIMD Extensions 3 (SSSE3) nécessaire pour exécuter les programmes liés à hyperscan.
";
$elem["libhyperscan/cpu-ssse3"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
