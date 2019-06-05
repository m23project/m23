<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mplayer-fonts");

$elem["mplayer-fonts/size"]["type"]="select";
$elem["mplayer-fonts/size"]["choices"][1]="iso-8859-1/arial-14";
$elem["mplayer-fonts/size"]["choices"][2]="iso-8859-1/arial-18";
$elem["mplayer-fonts/size"]["choices"][3]="iso-8859-1/arial-24";
$elem["mplayer-fonts/size"]["choices"][4]="iso-8859-1/arial-28";
$elem["mplayer-fonts/size"]["choices"][5]="iso-8859-2/arial-14";
$elem["mplayer-fonts/size"]["choices"][6]="iso-8859-2/arial-18";
$elem["mplayer-fonts/size"]["choices"][7]="iso-8859-2/arial-24";
$elem["mplayer-fonts/size"]["choices"][8]="iso-8859-2/arial-28";
$elem["mplayer-fonts/size"]["choices"][9]="iso-8859-7/arial-14";
$elem["mplayer-fonts/size"]["choices"][10]="iso-8859-7/arial-18";
$elem["mplayer-fonts/size"]["choices"][11]="iso-8859-7/arial-24";
$elem["mplayer-fonts/size"]["choices"][12]="iso-8859-7/arial-28";
$elem["mplayer-fonts/size"]["choices"][13]="cp1250/arial-14";
$elem["mplayer-fonts/size"]["choices"][14]="cp1250/arial-18";
$elem["mplayer-fonts/size"]["choices"][15]="cp1250/arial-24";
$elem["mplayer-fonts/size"]["choices"][16]="cp1250/arial-28";
$elem["mplayer-fonts/size"]["choices"][17]="cp1251/arial-14";
$elem["mplayer-fonts/size"]["choices"][18]="cp1251/arial-18";
$elem["mplayer-fonts/size"]["choices"][19]="cp1251/arial-24";
$elem["mplayer-fonts/size"]["description"]="Select font used by MPlayer.
 You can choose font used by OSD and subtitles.
";
$elem["mplayer-fonts/size"]["descriptionde"]="";
$elem["mplayer-fonts/size"]["descriptionfr"]="Sélectionner la police à utiliser avec MPlayer.
 Vous pouvez choisir la police qui serra utilisée pour afficher l'OSD et
 les sous-titres.
";
$elem["mplayer-fonts/size"]["default"]="iso-8859-1/arial-18";
PKG_OptionPageTail2($elem);
?>
