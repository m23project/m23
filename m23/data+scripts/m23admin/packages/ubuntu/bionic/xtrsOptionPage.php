<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xtrs");

$elem["xtrs/roms_needed"]["type"]="note";
$elem["xtrs/roms_needed"]["description"]="ROM images and/or operating system needed for xtrs to operate
 The xtrs package will not function as it ships because it requires a ROM
 image from one of the original TRS-80 Model I, III, 4, or 4P computers to
 operate.  (In Model 4P mode, only a disk image of a compatible operating
 system is required.)  Because of licensing restrictions on the ROM images and
 TRS-80 operating systems, they cannot be distributed with this Debian
 package.  You will need to obtain this software and install it where xtrs
 expects to find it for the program to work.
 .
 See /usr/share/doc/xtrs/README.Debian for more information.
";
$elem["xtrs/roms_needed"]["descriptionde"]="Rom-Images und/oder ein Betriebsystem wird für xtrs benötigt
 So wie das xtrs Paket ausgeliefert wird, wird es nicht funktionieren, da es ein ROM-Image vom originalen TRS-80 Modell I, III, 4 oder 4P Computer zum arbeiten braucht. (Im Modell 4P wird nur ein Disketten-Image vom Betriebsystem benötigt.) Durch Lizenzbestimmungen dieser Images, können diese nicht mit dem Debian Paket ausgeliefert werden. Sie müssen diese besorgen und an einer Stelle installieren, wo sie von xtrs zum Arbeiten erwartet werden.
 .
 Siehe auch /usr/share/doc/xtrs/README.Debian für weitere Informationen.
";
$elem["xtrs/roms_needed"]["descriptionfr"]="Images ROM et/ou système d'exploitation nécessaires au fonctionnement d'xtrs
 Le paquet xtrs qui vient d'être installé ne fonctionnera pas tel quel car il a besoin de l'image ROM d'un ordinateur TRS-80 Modèle 1, III, 4 ou 4P pour fonctionner (dans le mode modèle 4P, il suffit d'une image disque d'un système d'exploitation compatible). En raison de restrictions sur la licence des images ROM et des systèmes d'exploitation TRS-80, ils ne peuvent pas être distribués avec ce paquet Debian. Vous devrez obtenir ce logiciel et l'installer à l'endroit où xtrs s'attend à le trouver pour que le programme fonctionne.
 .
 Veuillez lire /usr/share/doc/xtrs/README.Debian pour de plus amples informations.
";
$elem["xtrs/roms_needed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
