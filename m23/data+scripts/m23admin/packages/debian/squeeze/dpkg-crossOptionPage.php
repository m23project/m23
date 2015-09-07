<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dpkg-cross");

$elem["dpkg-cross/default-arch"]["type"]="select";
$elem["dpkg-cross/default-arch"]["choices"][1]="None";
$elem["dpkg-cross/default-arch"]["choices"][2]="alpha";
$elem["dpkg-cross/default-arch"]["choices"][3]="amd64";
$elem["dpkg-cross/default-arch"]["choices"][4]="arm";
$elem["dpkg-cross/default-arch"]["choices"][5]="armeb";
$elem["dpkg-cross/default-arch"]["choices"][6]="armel";
$elem["dpkg-cross/default-arch"]["choices"][7]="hppa";
$elem["dpkg-cross/default-arch"]["choices"][8]="i386";
$elem["dpkg-cross/default-arch"]["choices"][9]="ia64";
$elem["dpkg-cross/default-arch"]["choices"][10]="m68k";
$elem["dpkg-cross/default-arch"]["choices"][11]="mips";
$elem["dpkg-cross/default-arch"]["choices"][12]="mipsel";
$elem["dpkg-cross/default-arch"]["choices"][13]="powerpc";
$elem["dpkg-cross/default-arch"]["choices"][14]="s390";
$elem["dpkg-cross/default-arch"]["choicesde"][1]="Keine";
$elem["dpkg-cross/default-arch"]["choicesde"][2]="alpha";
$elem["dpkg-cross/default-arch"]["choicesde"][3]="amd64";
$elem["dpkg-cross/default-arch"]["choicesde"][4]="arm";
$elem["dpkg-cross/default-arch"]["choicesde"][5]="armeb";
$elem["dpkg-cross/default-arch"]["choicesde"][6]="armel";
$elem["dpkg-cross/default-arch"]["choicesde"][7]="hppa";
$elem["dpkg-cross/default-arch"]["choicesde"][8]="i386";
$elem["dpkg-cross/default-arch"]["choicesde"][9]="ia64";
$elem["dpkg-cross/default-arch"]["choicesde"][10]="m68k";
$elem["dpkg-cross/default-arch"]["choicesde"][11]="mips";
$elem["dpkg-cross/default-arch"]["choicesde"][12]="mipsel";
$elem["dpkg-cross/default-arch"]["choicesde"][13]="powerpc";
$elem["dpkg-cross/default-arch"]["choicesde"][14]="s390";
$elem["dpkg-cross/default-arch"]["choicesfr"][1]="Aucune";
$elem["dpkg-cross/default-arch"]["choicesfr"][2]="alpha";
$elem["dpkg-cross/default-arch"]["choicesfr"][3]="amd64";
$elem["dpkg-cross/default-arch"]["choicesfr"][4]="arm";
$elem["dpkg-cross/default-arch"]["choicesfr"][5]="armeb";
$elem["dpkg-cross/default-arch"]["choicesfr"][6]="armel";
$elem["dpkg-cross/default-arch"]["choicesfr"][7]="hppa";
$elem["dpkg-cross/default-arch"]["choicesfr"][8]="i386";
$elem["dpkg-cross/default-arch"]["choicesfr"][9]="ia64";
$elem["dpkg-cross/default-arch"]["choicesfr"][10]="m68k";
$elem["dpkg-cross/default-arch"]["choicesfr"][11]="mips";
$elem["dpkg-cross/default-arch"]["choicesfr"][12]="mipsel";
$elem["dpkg-cross/default-arch"]["choicesfr"][13]="powerpc";
$elem["dpkg-cross/default-arch"]["choicesfr"][14]="s390";
$elem["dpkg-cross/default-arch"]["description"]="Default cross-building architecture:
 If this machine is typically cross-building for one main architecture,
 you can select that architecture here to save specifying it again when
 running dpkg-cross, apt-cross or emdebian-tools. Select 'None' to have
 no default.
";
$elem["dpkg-cross/default-arch"]["descriptionde"]="Standard Cross-Bau-Architektur:
 Falls diese Maschine typischerweise für eine Hauptarchitektur (cross-)baut, können Sie diese Architektur hier auswählen, damit Sie diese nicht erneut angeben müssen, wenn Sie dpkg-cross, apt-cross oder emdebian-tools ausführen. Wählen Sie »Keine« für die Standardeinstellung.
";
$elem["dpkg-cross/default-arch"]["descriptionfr"]="Architecture par défaut pour la compilation croisée :
 Si cette machine effectue des compilations croisées plus particulièrement pour une architecture donnée, vous pouvez choisir cette architecture afin d'éviter d'avoir à l'indiquer à l'exécution de dpkg-cross, apt-cross ou emdebian-tools. Si vous choisissez « Aucune », aucune architecture par défaut ne sera définie.
";
$elem["dpkg-cross/default-arch"]["default"]="None";
PKG_OptionPageTail2($elem);
?>
