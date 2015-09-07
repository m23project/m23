<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cwcp");

$elem["cwcp/suid_bit"]["type"]="boolean";
$elem["cwcp/suid_bit"]["description"]="Make cwcp setuid root
 The cwcp program only runs correctly as the root user. One way of doing
 this is to make the program setuid root. This is generally a bad idea as
 there are better ways, such as using the sudo program, to do this.
 However, you have the option here of making it setuid root if you like.
";
$elem["cwcp/suid_bit"]["descriptionde"]="Das cwcp Programm soll setuid root laufen
  Das cwcp Programm muss einige aufrufe als root Benutzer durchführen. Eine
  Möglichkeit ist das Programm setuid root zu machen. Dies ist generell eine
  schlechte Idee, da es bessere Wege gibt dies zu erreichen, z.B. mit sudo.
  Jedoch können Sie mit dieser Option das Programm setuid root installieren.
";
$elem["cwcp/suid_bit"]["descriptionfr"]="Rendre cwcp « setuid root »
 Seul le super-utilisateur peut faire fonctionner correctement le programme cwcp. Afin que tout le monde puisse l'utiliser, on peut le rendre « setuid root ». C'est généralement une mauvaise idée car il existe d'autres méthodes, comme l'utilisation du programme sudo. Cependant, vous pouvez tout de même décider ici de le rendre « suid root ».
";
$elem["cwcp/suid_bit"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
