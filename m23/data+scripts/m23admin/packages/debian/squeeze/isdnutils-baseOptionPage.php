<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isdnutils-base");

$elem["isdnutils/firmware"]["type"]="select";
$elem["isdnutils/firmware"]["choices"][1]="none";
$elem["isdnutils/firmware"]["choicesde"][1]="nichts";
$elem["isdnutils/firmware"]["choicesfr"][1]="Aucune";
$elem["isdnutils/firmware"]["description"]="Firmware to load:
 Some ISDN cards can't function properly until some firmware has been
 loaded. A notable example is the Sedlbauer SpeedFax+ PCI or Siemens
 I-Surf, which need ISAR.BIN to be loaded. Choose \"ISAR.BIN\" if this is
 necessary.
";
$elem["isdnutils/firmware"]["descriptionde"]="Zu ladende Firmware:
 Manche ISDN-Karten funktionieren erst, wenn eine Firmware auf die Karte geladen wurde. Nennenswerte Beispiele sind »Sedlbauer SpeedFax+ PCI« oder »Siemens I-Surf«, welche ISAR.BIN benötigen. Wählen Sie »ISAR.BIN«, wenn dies notwendig sein sollte.
";
$elem["isdnutils/firmware"]["descriptionfr"]="Microprogramme (« firmware ») à charger :
 Certaines cartes RNIS ne fonctionnent pas correctement tant qu'un microprogramme n'est pas chargé en ROM. C'est notamment le cas des cartes Siemens I-Surf ou des Sedlbauer SpeedFax+ PCI qui ont besoin d'ISAR.BIN (il n'existe pas d'autres cas connus). Choisissez « ISAR.BIN » si c'est nécessaire.
";
$elem["isdnutils/firmware"]["default"]="none";
$elem["isdnutils/firmwarecards"]["type"]="string";
$elem["isdnutils/firmwarecards"]["description"]="ISDN card numbers to load with the firmware:
 If you use more than one card, enter the number of the card(s) in need
 of firmware.
 .
 Multiple entries should be separated by commas. Card numbers are integers
 where \"1\" is the first card, \"2\" the second, etc.
";
$elem["isdnutils/firmwarecards"]["descriptionde"]="ISDN-Karten-Nummern, auf denen die Firmware geladen werden soll:
 Falls Sie mehrere Karten benutzen, geben Sie die Nummer der Karte(n) ein, die eine Firmware benötigen.
 .
 Mehrere Einträge sollten durch Kommata getrennt werden. Kartennummern sind ganzzahlig und »1« bezeichnet die erste Karte, »2« die zweite und so weiter.
";
$elem["isdnutils/firmwarecards"]["descriptionfr"]="Numéros des cartes sur lesquelles le microprogramme doit être chargé :
 Si vous utilisez plus d'une carte, veuillez indiquer le numéro des cartes qui ont besoin du microprogramme.
 .
 Des entrées multiples doivent être séparées par des virgules, Les numéros de cartes sont des entiers commençant à 1.
";
$elem["isdnutils/firmwarecards"]["default"]="";
PKG_OptionPageTail2($elem);
?>
