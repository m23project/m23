<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fortunes-de");

$elem["fortunes-de/fortunes_to_install"]["type"]="multiselect";
$elem["fortunes-de/fortunes_to_install"]["choices"][1]="Anekdoten";
$elem["fortunes-de/fortunes_to_install"]["choices"][2]="ASCIIart";
$elem["fortunes-de/fortunes_to_install"]["choices"][3]="Bahnhof";
$elem["fortunes-de/fortunes_to_install"]["choices"][4]="Bauernregeln";
$elem["fortunes-de/fortunes_to_install"]["choices"][5]="Channel Debian";
$elem["fortunes-de/fortunes_to_install"]["choices"][6]="Computer";
$elem["fortunes-de/fortunes_to_install"]["choices"][7]="Debian Tips";
$elem["fortunes-de/fortunes_to_install"]["choices"][8]="Elefanten";
$elem["fortunes-de/fortunes_to_install"]["choices"][9]="Fußball";
$elem["fortunes-de/fortunes_to_install"]["choices"][10]="Gedichte";
$elem["fortunes-de/fortunes_to_install"]["choices"][11]="Holenlassen";
$elem["fortunes-de/fortunes_to_install"]["choices"][12]="Huhn";
$elem["fortunes-de/fortunes_to_install"]["choices"][13]="Infodrom";
$elem["fortunes-de/fortunes_to_install"]["choices"][14]="Kinder";
$elem["fortunes-de/fortunes_to_install"]["choices"][15]="Letzte Worte";
$elem["fortunes-de/fortunes_to_install"]["choices"][16]="Lieber als";
$elem["fortunes-de/fortunes_to_install"]["choices"][17]="Linuxtag";
$elem["fortunes-de/fortunes_to_install"]["choices"][18]="Löwe";
$elem["fortunes-de/fortunes_to_install"]["choices"][19]="Mathematiker";
$elem["fortunes-de/fortunes_to_install"]["choices"][20]="MS";
$elem["fortunes-de/fortunes_to_install"]["choices"][21]="Murphy";
$elem["fortunes-de/fortunes_to_install"]["choices"][22]="Namen";
$elem["fortunes-de/fortunes_to_install"]["choices"][23]="Rezepte";
$elem["fortunes-de/fortunes_to_install"]["choices"][24]="Quiz";
$elem["fortunes-de/fortunes_to_install"]["choices"][25]="Sicherheitshinweise";
$elem["fortunes-de/fortunes_to_install"]["choices"][26]="Sprichworte";
$elem["fortunes-de/fortunes_to_install"]["choices"][27]="Sprüche";
$elem["fortunes-de/fortunes_to_install"]["choices"][28]="Stilblüten";
$elem["fortunes-de/fortunes_to_install"]["choices"][29]="Tips";
$elem["fortunes-de/fortunes_to_install"]["choices"][30]="Translations";
$elem["fortunes-de/fortunes_to_install"]["choices"][31]="Unfug";
$elem["fortunes-de/fortunes_to_install"]["choices"][32]="Vornamen";
$elem["fortunes-de/fortunes_to_install"]["choices"][33]="Warmduscher";
$elem["fortunes-de/fortunes_to_install"]["choices"][34]="Witze";
$elem["fortunes-de/fortunes_to_install"]["choices"][35]="Wörterbuch";
$elem["fortunes-de/fortunes_to_install"]["choices"][36]="Wußten Sie";
$elem["fortunes-de/fortunes_to_install"]["description"]="Fortunes to use:
 You can choose fortunes packages to be used by fortune.
 .
 If you later change your mind, you can run: 'dpkg-reconfigure
 ${pkg}'.
";
$elem["fortunes-de/fortunes_to_install"]["descriptionde"]="Fortunes auswählen:
 Sie können auswählen, welche Pakete fortune verwenden soll.
 .
 Wenn Sie Ihre Meinung später ändern, starten Sie das Kommando: 'dpkg-reconfigure fortunes-de'.
";
$elem["fortunes-de/fortunes_to_install"]["descriptionfr"]="Citations à utiliser :
 Vous pouvez choisir les groupes de citations qui seront utilisés par fortune.
 .
 Vous pourrez modifier cette option plus tard avec la commande « dpkg-reconfigure ${pkg} ».
";
$elem["fortunes-de/fortunes_to_install"]["default"]="Anekdoten, ASCIIart, Bahnhof, Bauernregeln, Computer, Debian Tips, Elefanten, Fußball, Gedichte, Holenlassen, Huhn, Kinder, Letzte Worte, Lieber als, Löwe, Mathematiker, MS, Murphy, Namen, Quiz, Sicherheitshinweise, Sprichworte, Sprüche, Stilblüten, Tips, Translations, Unfug, Vornamen, Warmduscher, Witze, Wörterbuch, Wußten Sie, Zitate";
PKG_OptionPageTail2($elem);
?>
