<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("z88dk");

$elem["z88dk/configure-defaultpackage"]["type"]="select";
$elem["z88dk/configure-defaultpackage"]["choices"][1]="abc800";
$elem["z88dk/configure-defaultpackage"]["choices"][2]="abc80";
$elem["z88dk/configure-defaultpackage"]["choices"][3]="aceansi";
$elem["z88dk/configure-defaultpackage"]["choices"][4]="aquansi";
$elem["z88dk/configure-defaultpackage"]["choices"][5]="aquarius";
$elem["z88dk/configure-defaultpackage"]["choices"][6]="c128ansi";
$elem["z88dk/configure-defaultpackage"]["choices"][7]="cpcansi";
$elem["z88dk/configure-defaultpackage"]["choices"][8]="cpc";
$elem["z88dk/configure-defaultpackage"]["choices"][9]="cpm";
$elem["z88dk/configure-defaultpackage"]["choices"][10]="embedded";
$elem["z88dk/configure-defaultpackage"]["choices"][11]="m5";
$elem["z88dk/configure-defaultpackage"]["choices"][12]="msx";
$elem["z88dk/configure-defaultpackage"]["choices"][13]="mzansi";
$elem["z88dk/configure-defaultpackage"]["choices"][14]="mz";
$elem["z88dk/configure-defaultpackage"]["choices"][15]="nasansi";
$elem["z88dk/configure-defaultpackage"]["choices"][16]="nascom";
$elem["z88dk/configure-defaultpackage"]["choices"][17]="nc";
$elem["z88dk/configure-defaultpackage"]["choices"][18]="newbrain";
$elem["z88dk/configure-defaultpackage"]["choices"][19]="ozansi";
$elem["z88dk/configure-defaultpackage"]["choices"][20]="ppsansi";
$elem["z88dk/configure-defaultpackage"]["choices"][21]="pps";
$elem["z88dk/configure-defaultpackage"]["choices"][22]="rcmx000";
$elem["z88dk/configure-defaultpackage"]["choices"][23]="rex";
$elem["z88dk/configure-defaultpackage"]["choices"][24]="rexlib";
$elem["z88dk/configure-defaultpackage"]["choices"][25]="samansi";
$elem["z88dk/configure-defaultpackage"]["choices"][26]="sam";
$elem["z88dk/configure-defaultpackage"]["choices"][27]="sms";
$elem["z88dk/configure-defaultpackage"]["choices"][28]="svi";
$elem["z88dk/configure-defaultpackage"]["choices"][29]="test";
$elem["z88dk/configure-defaultpackage"]["choices"][30]="ti82ansi";
$elem["z88dk/configure-defaultpackage"]["choices"][31]="ti82";
$elem["z88dk/configure-defaultpackage"]["choices"][32]="ti83ansi";
$elem["z88dk/configure-defaultpackage"]["choices"][33]="ti83";
$elem["z88dk/configure-defaultpackage"]["choices"][34]="ti85ansi";
$elem["z88dk/configure-defaultpackage"]["choices"][35]="ti85";
$elem["z88dk/configure-defaultpackage"]["choices"][36]="ti86ansi";
$elem["z88dk/configure-defaultpackage"]["choices"][37]="ti86";
$elem["z88dk/configure-defaultpackage"]["choices"][38]="ti8xansi";
$elem["z88dk/configure-defaultpackage"]["choices"][39]="ti8x";
$elem["z88dk/configure-defaultpackage"]["choices"][40]="ts2068ansi";
$elem["z88dk/configure-defaultpackage"]["choices"][41]="ts2068";
$elem["z88dk/configure-defaultpackage"]["choices"][42]="vzansi";
$elem["z88dk/configure-defaultpackage"]["choices"][43]="vz";
$elem["z88dk/configure-defaultpackage"]["choices"][44]="z88ansi";
$elem["z88dk/configure-defaultpackage"]["choices"][45]="z88";
$elem["z88dk/configure-defaultpackage"]["choices"][46]="z88net";
$elem["z88dk/configure-defaultpackage"]["choices"][47]="zcc";
$elem["z88dk/configure-defaultpackage"]["choices"][48]="zx81ansi";
$elem["z88dk/configure-defaultpackage"]["choices"][49]="zx81";
$elem["z88dk/configure-defaultpackage"]["choices"][50]="zxansi";
$elem["z88dk/configure-defaultpackage"]["description"]="Default z88dk target:
";
$elem["z88dk/configure-defaultpackage"]["descriptionde"]="Standard z88dk-Ziel:
";
$elem["z88dk/configure-defaultpackage"]["descriptionfr"]="Veuillez choisir la cible par défaut du compilateur z88dk :
";
$elem["z88dk/configure-defaultpackage"]["default"]="z88";
PKG_OptionPageTail2($elem);
?>
