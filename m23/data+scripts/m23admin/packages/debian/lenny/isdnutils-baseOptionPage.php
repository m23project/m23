<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isdnutils-base");

$elem["isdnutils/firmware"]["type"]="select";
$elem["isdnutils/firmware"]["choices"][1]="none";
$elem["isdnutils/firmware"]["choicesde"][1]="keine";
$elem["isdnutils/firmware"]["choicesfr"][1]="aucun";
$elem["isdnutils/firmware"]["description"]="Does firmware need to be loaded?
 Some ISDN cards can't function properly until firmware has been
 downloaded. Notable example is the Sedlbauer SpeedFax+ PCI or Siemens
 I-Surf, which need ISAR.BIN to be loaded. (I don't know of any others at
 this time.) Choose \"ISAR.BIN\" if this is necessary. If you don't know what
 I'm talking about, choose \"none\".
";
$elem["isdnutils/firmware"]["descriptionde"]="Muss eine Firmware geladen werden?
 Manche ISDN-Karten, wie z.B. die Sedlbauer SpeedFax+ PCI oder Siemens I-Surf, funktionieren erst, wenn eine Firmware auf die Karte geladen wurde. Diese beiden Karten benötigen ISAR.BIN. (Andere Karten sind zurzeit nicht bekannt.) Wählen Sie »ISAR.BIN«, wenn dies notwendig sein sollte. Wenn Sie nicht wissen, worum es hier geht, dann wählen Sie »keine«.
";
$elem["isdnutils/firmware"]["descriptionfr"]="Faut-il charger des microprogrammes (« firmware » ) ?
 Certaines cartes RNIS ne fonctionnent pas correctement tant qu'un microprogramme n'est pas chargé en ROM. C'est notamment le cas des cartes Siemens I-Surf ou des Sedlbauer SpeedFax+ PCI qui ont besoin d'ISAR.BIN (il n'existe pas d'autres cas connus). Choisissez « ISAR.BIN » si c'est nécessaire. Si vous ne comprenez pas cette question, choisissez « aucun ».
";
$elem["isdnutils/firmware"]["default"]="none";
$elem["isdnutils/firmwarecards"]["type"]="string";
$elem["isdnutils/firmwarecards"]["description"]="Which ISDN card numbers have to be loaded with the firmware?
 If you have more than one card, enter the number of the card(s) that have
 to be loaded with the firmware, starting with 1, separated by commas. If
 you have only one card, the obvious answer here is \"1\". If you have two
 cards which both have to be loaded with firmware, enter \"1,2\".
";
$elem["isdnutils/firmwarecards"]["descriptionde"]="Welche ISDN-Karten-Nummern müssen mit Firmware geladen werden?
 Wenn Sie mehr als eine ISDN-Karte haben, dann geben Sie hier die Nummer(n) der Karte(n), beginnend mit 1, getrennt mit Kommas, ein, für die eine Firmware geladen werden muss. Wenn Sie nur eine Karte haben, dann geben Sie hier »1« ein. Wenn Sie zwei Karten haben, für die eine Firmware geladen werden muss, dann geben Sie hier »1,2« ein.
";
$elem["isdnutils/firmwarecards"]["descriptionfr"]="Quels sont les numéros des cartes devant être chargées avec le microprogramme ?
 Si vous avez plusieurs cartes, donnez les numéros des cartes devant être chargées avec le microprogramme ; commencez par 1 et séparez-les par des virgules. Si vous n'avez qu'une carte, la réponse évidente est « 1 ». Si vous avez deux cartes qui ont besoin toutes deux de microprogrammes, indiquez « 1,2 ».
";
$elem["isdnutils/firmwarecards"]["default"]="";
PKG_OptionPageTail2($elem);
?>
