<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libphone-utils0");

$elem["libphone-utils/international_prefix"]["type"]="string";
$elem["libphone-utils/international_prefix"]["description"]="International phone prefix:
 Please enter the prefix to dial for international calls.
 This prefix is \"00\" in most countries.
";
$elem["libphone-utils/international_prefix"]["descriptionde"]="Internationale Vorwahl:
 Bitten geben Sie die Vorwahl für internationale Telefonate an. In den meisten Ländern ist die Vorwahl »00«.
";
$elem["libphone-utils/international_prefix"]["descriptionfr"]="Préfixe téléphonique pour l'accès à l'international :
 Veuillez indiquer le préfixe à composer avant les numéros internationaux. C'est « 00 » dans la plupart des pays.
";
$elem["libphone-utils/international_prefix"]["default"]="00";
$elem["libphone-utils/national_prefix"]["type"]="string";
$elem["libphone-utils/national_prefix"]["description"]="National phone prefix:
 Please enter the prefix to dial for national calls.
 This prefix is \"0\" in most countries.
";
$elem["libphone-utils/national_prefix"]["descriptionde"]="Nationale Vorwahl:
 Bitte geben Sie die Vorwahl für nationale Telefonate an. In vielen Ländern ist die Vorwahl »0«.
";
$elem["libphone-utils/national_prefix"]["descriptionfr"]="Préfixe téléphonique pour les appels nationaux :
 Veuillez indiquer le préfixe à composer avant les numéros nationaux. C'est « 0 » dans la plupart des pays.
";
$elem["libphone-utils/national_prefix"]["default"]="0";
$elem["libphone-utils/country_code"]["type"]="string";
$elem["libphone-utils/country_code"]["description"]="Telephone country code:
 Please enter the international telephone code for the local country
 (for instance, \"49\" for Germany).
";
$elem["libphone-utils/country_code"]["descriptionde"]="Landesvorwahl:
 Bitten geben Sie die internationale Landesvorwahl für Ihren Standort an (zum Beispiel »49« für Deutschland).
";
$elem["libphone-utils/country_code"]["descriptionfr"]="Code téléphonique du pays :
 Veuillez indiquer le code à composer avant un appel local au pays (p. ex., « 33 » pour la France.
";
$elem["libphone-utils/country_code"]["default"]="49";
$elem["libphone-utils/area_code"]["type"]="string";
$elem["libphone-utils/area_code"]["description"]="Area code:
 Please enter the telephone code for the local area (for instance,
 \"30\" for Berlin in Germany).
 .
 This is normally only needed with landline phones.
";
$elem["libphone-utils/area_code"]["descriptionde"]="Ortsvorwahl:
 Bitte geben Sie Ihre Ortsvorwahl an (zum Beispiel »30« für Berlin).
 .
 Diese ist üblicherweise nur bei Festnetztelefonen notwendig.
";
$elem["libphone-utils/area_code"]["descriptionfr"]="Code régional :
 Veuillez indiquer le code téléphonique pour la zone locale (cette notion est inutile en France).
 .
 Ce code est utilisé en général avec les téléphones fixes.
";
$elem["libphone-utils/area_code"]["default"]="0";
PKG_OptionPageTail2($elem);
?>
