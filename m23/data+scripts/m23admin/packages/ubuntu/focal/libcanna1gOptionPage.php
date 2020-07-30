<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libcanna1g");

$elem["canna/default_style"]["type"]="select";
$elem["canna/default_style"]["choices"][1]="verbose";
$elem["canna/default_style"]["choices"][2]="1.1";
$elem["canna/default_style"]["choices"][3]="1.2";
$elem["canna/default_style"]["choices"][4]="jdaemin";
$elem["canna/default_style"]["choices"][5]="just";
$elem["canna/default_style"]["choices"][6]="lan5";
$elem["canna/default_style"]["choices"][7]="matsu";
$elem["canna/default_style"]["choices"][8]="skk";
$elem["canna/default_style"]["choices"][9]="tut";
$elem["canna/default_style"]["choices"][10]="unix";
$elem["canna/default_style"]["choices"][11]="vje";
$elem["canna/default_style"]["description"]="Canna input style:
 Please choose the default Canna input style:
  verbose: Canna3.5 default style with verbose comments;
  1.1    : old Canna style (ver. 1.1);
  1.2    : old Canna style (ver. 1.2);
  jdaemon: jdaemon style;
  just   : JustSystems ATOK style;
  lan5   : LAN5 style;
  matsu  : Matsu word processor style;
  skk    : SKK style;
  tut    : TUT-Code style;
  unix   : UNIX style;
  vje    : vje style;
  wx2+   : WX2+ style.
";
$elem["canna/default_style"]["descriptionde"]="Eingabestil von Canna:
 Bitte wählen Sie den Standard-Eingabestil aus:
  verbose: Canna3.5-Standard-Stil mit ausführlichen Kommentaren;
  1.1    : alter Canna-Stil (Ver. 1.1);
  1.2    : alter Canna-Stil (Ver. 1.2);
  jdaemon: Jdaemon-Stil;
  just   : Justsystem-ATOK-Stil;
  lan5   : LAN5-Stil;
  matsu  : MATSU-Word-Processor-Stil;
  skk    : SKK-Stil;
  tut    : TUT-Code-Stil;
  unix   : UNIX-Stil;
  vje    : Vje-Stil;
  wx2+   : WX2+-Stil.
";
$elem["canna/default_style"]["descriptionfr"]="Méthode de saisie de Canna :
 Veuillez choisir la méthode de saisie utilisée par défaut :
  verbose : méthode par défaut de Canna 3.5 avec commentaires bavards ;
  1.1     : ancienne méthode de Canna 1.1 ;
  1.2     : ancienne méthode de Canna 1.2 ;
  jdaemon : méthode jdaemon ;
  just    : méthode analogue à ATOK Justsystem ;
  lan5    : méthode analogue à LAN5 :
  matsu   : méthode analogue à celle du traitement de texte MATSU ;
  skk     : méthode analogue à SKK ;
  tut     : méthode destinée à « TUT-Code » ;
  unix    : méthode UNIX ;
  vje     : méthode analogue à VJE ;
  wx2     : méthode analogue à WX2+.
";
$elem["canna/default_style"]["default"]="verbose";
PKG_OptionPageTail2($elem);
?>
