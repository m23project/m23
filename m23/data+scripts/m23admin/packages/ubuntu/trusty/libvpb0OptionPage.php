<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libvpb0");

$elem["libvpb0/countrycode"]["type"]="string";
$elem["libvpb0/countrycode"]["description"]="ITU-T telephone code:
 This is the numeric code for the region your phone system will be operating in
 (eg. 61 for Australia or 33 for France).  It is used to configure the default
 regional standards that Voicetronix telephony hardware should comply with.
";
$elem["libvpb0/countrycode"]["descriptionde"]="ITU-T-Telefon-Code:
 Dies ist der numerische Code fÃ¼r die Region, in der Ihr Telefonsystem betrieben werden wird (z.B. 61 fÃ¼r Australien oder 33 fÃ¼r Frankreich). Er wird dafÃ¼r verwandt, die Standardregionseinstellungen einzustellen, die die Voicetronix-Telephoniehardware befolgen soll.
";
$elem["libvpb0/countrycode"]["descriptionfr"]="Préfixe de numérotation internationale UIT-T :
 Veuillez indiquer le code numérique pour la région dans laquelle votre système téléphonique va être utilisé (p. ex. 33 pour la France ou 61 pour l'Australie). Il est utilisé pour configurer les normes régionales par défaut auxquelles le matériel Voicetronix doit se conformer.
";
$elem["libvpb0/countrycode"]["default"]="61";
PKG_OptionPageTail2($elem);
?>
