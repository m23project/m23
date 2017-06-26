<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("redmine");

$elem["redmine/current-instances"]["type"]="string";
$elem["redmine/current-instances"]["description"]="Redmine instances to be configured or upgraded:
 Space-separated list of instances identifiers.
 . 
 Each instance has its configuration files in /etc/redmine/<instance-identifier>/
 .
 To deconfigure an instance, remove its identifier from this list.
 Configuration files and data from removed instances will not be deleted until
 the package is purged, but they will be no longer managed automatically.
";
$elem["redmine/current-instances"]["descriptionde"]="";
$elem["redmine/current-instances"]["descriptionfr"]="Instances Redmine qui seront configurées ou mises à jour :
 Veuillez indiquer, séparés par des espaces, les identifiants des instances à mettre à jour ou configurer. 
 .
 Les fichiers de configuration de chaque instance sont conservés dans /etc/redmine/<identifiant-instance>/.
 .
 Pour désinstaller une instance, il faut supprimer son identifiant de cette liste. Les fichiers de configuration ainsi que les données des instances supprimées, ne seront pas effacés tant que le paquet n'a pas été purgé, mais ils ne seront plus gérés automatiquement.
";
$elem["redmine/current-instances"]["default"]="default";
$elem["redmine/default-language"]["type"]="select";
$elem["redmine/default-language"]["choices"][1]="ar";
$elem["redmine/default-language"]["choices"][2]="az";
$elem["redmine/default-language"]["choices"][3]="bg";
$elem["redmine/default-language"]["choices"][4]="bs";
$elem["redmine/default-language"]["choices"][5]="ca";
$elem["redmine/default-language"]["choices"][6]="cs";
$elem["redmine/default-language"]["choices"][7]="da";
$elem["redmine/default-language"]["choices"][8]="de";
$elem["redmine/default-language"]["choices"][9]="el";
$elem["redmine/default-language"]["choices"][10]="en";
$elem["redmine/default-language"]["choices"][11]="en-gb";
$elem["redmine/default-language"]["choices"][12]="es";
$elem["redmine/default-language"]["choices"][13]="es-pa";
$elem["redmine/default-language"]["choices"][14]="et";
$elem["redmine/default-language"]["choices"][15]="eu";
$elem["redmine/default-language"]["choices"][16]="fa";
$elem["redmine/default-language"]["choices"][17]="fi";
$elem["redmine/default-language"]["choices"][18]="fr";
$elem["redmine/default-language"]["choices"][19]="gl";
$elem["redmine/default-language"]["choices"][20]="he";
$elem["redmine/default-language"]["choices"][21]="hr";
$elem["redmine/default-language"]["choices"][22]="hu";
$elem["redmine/default-language"]["choices"][23]="id";
$elem["redmine/default-language"]["choices"][24]="it";
$elem["redmine/default-language"]["choices"][25]="ja";
$elem["redmine/default-language"]["choices"][26]="ko";
$elem["redmine/default-language"]["choices"][27]="lt";
$elem["redmine/default-language"]["choices"][28]="lv";
$elem["redmine/default-language"]["choices"][29]="mk";
$elem["redmine/default-language"]["choices"][30]="mn";
$elem["redmine/default-language"]["choices"][31]="nl";
$elem["redmine/default-language"]["choices"][32]="no";
$elem["redmine/default-language"]["choices"][33]="pl";
$elem["redmine/default-language"]["choices"][34]="pt";
$elem["redmine/default-language"]["choices"][35]="pt-br";
$elem["redmine/default-language"]["choices"][36]="ro";
$elem["redmine/default-language"]["choices"][37]="ru";
$elem["redmine/default-language"]["choices"][38]="sk";
$elem["redmine/default-language"]["choices"][39]="sl";
$elem["redmine/default-language"]["choices"][40]="sq";
$elem["redmine/default-language"]["choices"][41]="sr";
$elem["redmine/default-language"]["choices"][42]="sr-yu";
$elem["redmine/default-language"]["choices"][43]="sv";
$elem["redmine/default-language"]["choices"][44]="th";
$elem["redmine/default-language"]["choices"][45]="tr";
$elem["redmine/default-language"]["choices"][46]="uk";
$elem["redmine/default-language"]["choices"][47]="vi";
$elem["redmine/default-language"]["choices"][48]="zh";
$elem["redmine/default-language"]["description"]="Default redmine language:
";
$elem["redmine/default-language"]["descriptionde"]="Standardsprache für Redmine:
";
$elem["redmine/default-language"]["descriptionfr"]="Langue par défaut de Redmine :
";
$elem["redmine/default-language"]["default"]="en";
PKG_OptionPageTail2($elem);
?>
