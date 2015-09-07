<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("php5-mapscript");

$elem["php5-mapscript/add_extension"]["type"]="boolean";
$elem["php5-mapscript/add_extension"]["description"]="Should ${extname} be added to /etc/php5/${sapiconfig}/php.ini?
 You are installing ${extname} support for php5 and it is not yet
 enabled in the configuration for the ${sapiconfig} SAPI. Enabling
 this extension will allow php5 scripts to use it.
";
$elem["php5-mapscript/add_extension"]["descriptionde"]="Soll ${extname} der /etc/php5/${sapiconfig}/php.ini hinzugefügt werden?
 Sie installieren die ${extname}-Unterstützung für php5, die noch nicht in der Konfiguration der ${sapiconfig} SAPI aktiviert ist. Die Aktivierung dieser Erweiterung macht es php5-Skripten möglich, sie zu benutzen.
";
$elem["php5-mapscript/add_extension"]["descriptionfr"]="Faut-il ajouter ${extname} au fichier /etc/php5/${sapiconfig}/php.ini ?
 Vous êtes en train d'installer la gestion de ${extname} pour PHP5, mais elle n'est pas encore activée dans la configuration de la SAPI ${sapiconfig}. L'activation de cette extension permettra aux scripts PHP5 de l'utiliser.
";
$elem["php5-mapscript/add_extension"]["default"]="true";
$elem["php5-mapscript/remove_extension"]["type"]="boolean";
$elem["php5-mapscript/remove_extension"]["description"]="Should ${extname} be removed from /etc/php5/${sapiconfig}/php.ini?
 You are removing ${extname} support for php5, but it is still enabled
 in the configuration for the ${sapiconfig} SAPI.  Leaving this in place
 will probably cause problems when trying to use PHP.
";
$elem["php5-mapscript/remove_extension"]["descriptionde"]="Soll ${extname} aus der /etc/php5/${sapiconfig}/php.ini entfernt werden?
 Sie entfernen die ${extname}-Unterstützung für php5, die aber noch in der Konfiguration der ${sapiconfig} SAPI aktiviert ist. Dies so zu belassen wird wahrscheinlich Probleme verursachen, wenn PHP benutzt werden soll.
";
$elem["php5-mapscript/remove_extension"]["descriptionfr"]="Faut-il supprimer ${extname} du fichier /etc/php5/${sapiconfig}/php.ini ?
 Vous êtes en train de supprimer la gestion de ${extname} pour PHP5, mais elle est encore activée dans la configuration de la SAPI ${sapiconfig}, ce qui pourrait poser des problèmes lors de l'utilisation de PHP.
";
$elem["php5-mapscript/remove_extension"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
