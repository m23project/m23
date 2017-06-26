<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fortunes-fr");

$elem["fortunes-fr/fortunes_to_install"]["type"]="multiselect";
$elem["fortunes-fr/fortunes_to_install"]["choices"][1]="BD";
$elem["fortunes-fr/fortunes_to_install"]["choices"][2]="Cinema";
$elem["fortunes-fr/fortunes_to_install"]["choices"][3]="Droit";
$elem["fortunes-fr/fortunes_to_install"]["choices"][4]="Haiku";
$elem["fortunes-fr/fortunes_to_install"]["choices"][5]="Humoristes";
$elem["fortunes-fr/fortunes_to_install"]["choices"][6]="Humour";
$elem["fortunes-fr/fortunes_to_install"]["choices"][7]="Informatique";
$elem["fortunes-fr/fortunes_to_install"]["choices"][8]="Litterature francaise";
$elem["fortunes-fr/fortunes_to_install"]["choices"][9]="Litterature etrangere";
$elem["fortunes-fr/fortunes_to_install"]["choices"][10]="Mysoginie";
$elem["fortunes-fr/fortunes_to_install"]["choices"][11]="Personnalites";
$elem["fortunes-fr/fortunes_to_install"]["choices"][12]="Philosophie";
$elem["fortunes-fr/fortunes_to_install"]["choices"][13]="Politique";
$elem["fortunes-fr/fortunes_to_install"]["choices"][14]="Proverbes";
$elem["fortunes-fr/fortunes_to_install"]["choices"][15]="Religion";
$elem["fortunes-fr/fortunes_to_install"]["choices"][16]="Sciences";
$elem["fortunes-fr/fortunes_to_install"]["choices"][17]="Guide du Cabaliste Usenet";
$elem["fortunes-fr/fortunes_to_install"]["choices"][18]="Guide du Debianiste Pervers";
$elem["fortunes-fr/fortunes_to_install"]["choices"][19]="Guide du Fmblien Assassin";
$elem["fortunes-fr/fortunes_to_install"]["choices"][20]="Guide du Linuxien Pervers";
$elem["fortunes-fr/fortunes_to_install"]["choices"][21]="Guide du Petit Joueur";
$elem["fortunes-fr/fortunes_to_install"]["choices"][22]="Maurice et Patapon";
$elem["fortunes-fr/fortunes_to_install"]["choices"][23]="Oulipo";
$elem["fortunes-fr/fortunes_to_install"]["choices"][24]="Les fortunes de Multidesk OS";
$elem["fortunes-fr/fortunes_to_install"]["choices"][25]="Les fortunes de Multidesk OS (2)";
$elem["fortunes-fr/fortunes_to_install"]["choices"][26]="La tribune libre de linuxfr";
$elem["fortunes-fr/fortunes_to_install"]["choices"][27]="#linuxfr@Undernet";
$elem["fortunes-fr/fortunes_to_install"]["choices"][28]="Les bonnes fortunes de J.R.R. Tolkien";
$elem["fortunes-fr/fortunes_to_install"]["choices"][29]="fr.rec.photo";
$elem["fortunes-fr/fortunes_to_install"]["description"]="Select fortunes to use.
 You can choose fortunes packages to be used by fortune.
 .
 If you later change your mind, you can run: 'dpkg-reconfigure
 fortunes-fr'.
";
$elem["fortunes-fr/fortunes_to_install"]["descriptionde"]="Fortunes auswählen.
 Sie können auswählen, welche Pakete fortune verwenden soll.
 .
 Wenn Sie Ihre Meinung später ändern, starten Sie das Kommando: 'dpkg-reconfigure fortunes-fr'.
";
$elem["fortunes-fr/fortunes_to_install"]["descriptionfr"]="Veuillez choisir les citations à utiliser :
 Vous pouvez choisir les groupes de citations qui seront utilisées par fortune.
 .
 Si vous changez d'avis, vous pourrez plus tard utiliser la commande « dpkg-reconfigure fortunes-fr ».
";
$elem["fortunes-fr/fortunes_to_install"]["default"]="BD, Cinema, Droit, Haiku, Humoristes, Humour, Informatique, Litterature francaise, Litterature etrangere, Mysoginie, Personnalites, Philosophie, Politique, Proverbes, Religion, Sciences, Guide du Cabaliste Usenet, Guide du Debianiste Pervers, Guide du Fmblien Assassin, Guide du Linuxien Pervers, Guide du Petit Joueur, Maurice et Patapon, Oulipo, Les fortunes de Multidesk OS, Les fortunes de Multidesk OS (2), La tribune libre de linuxfr, #linuxfr@Undernet, Les bonnes fortunes de J.R.R. Tolkien, fr.rec.photo, #debian-fr@freenode";
PKG_OptionPageTail2($elem);
?>
