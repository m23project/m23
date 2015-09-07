<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libglide3");

$elem["libglide3/no_card"]["type"]="boolean";
$elem["libglide3/no_card"]["description"]="Manually select driver for 3Dfx card?
 No 3Dfx card that is supported by glide3 was found. This package
 supports cards based on the following 3Dfx chipsets: Voodoo
 Banshee, Voodoo 3, Voodoo 4, and Voodoo 5.
 .
 If the graphics card in this computer does not use one of these
 chipsets, and you are not compiling programs against glide,
 this package will not be useful.
 .
 If the graphics card is based on one of these chipsets, you
 should file a bug report against this package, including the output from the
 \"lspci -vm\" command.
 .
 Please choose whether you want to manually select the driver to use for now.
";
$elem["libglide3/no_card"]["descriptionde"]="Treiber für 3Dfx-Karte selbst auswählen?
 Es wurde keine von Glide3 unterstützte 3Dfx-Karte gefunden. Dieses Paket unterstützt Karten mit folgenden 3Dfx-Chipsätzen: Voodoo Banshee, Voodoo 3, Voodoo 4 und Voodoo 5.
 .
 Wenn die Grafikkarte in diesem Rechner keinen dieser Chipsätze verwendet und Sie auch keine Programme mit Glide-Unterstützung kompilieren wollen, sollten Sie dieses Paket nicht installieren.
 .
 Wenn Ihre Karte mit einem der genannten Chipsätze ausgestattet ist, sollten Sie einen Fehlerbericht für dieses Paket schreiben und die Ausgabe des Kommandos: 'lspci -vm' beifügen.
 .
 Stimmen Sie zu, wenn Sie den Treiber selbst auswählen wollen.
";
$elem["libglide3/no_card"]["descriptionfr"]="Sélection manuelle du pilote pour la carte 3Dfx :
 Aucune carte 3Dfx gérée par glide3 n'a été détectée. Ce paquet est destiné aux cartes utilisant les jeux de composants 3Dfx suivants : Voodoo Banshee, Voodoo 3, Voodoo 4 et Voodoo 5.
 .
 Si votre carte n'est pas basée sur l'un de ces jeux de composants et que vous ne faites pas de compilation de programmes liés à glide, vous n'avez pas de raison d'installer ce paquet.
 .
 Si votre carte est basée sur l'un de ces jeux de composants, veuillez envoyer un rapport de bogue pour ce paquet en y incluant les messages affichés par la commande « lspci -vm ».
 .
 Veuillez choisir si vous désirez sélectionner vous-même le pilote à utiliser.
";
$elem["libglide3/no_card"]["default"]="false";
$elem["libglide3/driver"]["type"]="select";
$elem["libglide3/driver"]["choices"][1]="h3";
$elem["libglide3/driver"]["description"]="Driver for 3D acceleration:
 Please select the driver you would like to use for 3D acceleration:
  * h3: Voodoo Banshee and Voodoo 3;
  * h5: Voodoo 4 and Voodoo 5.
";
$elem["libglide3/driver"]["descriptionde"]="Treiber für 3D-Beschleunigung:
 Bitte den Treiber für die 3D-Beschleunigung auswählen:
  * h3: Voodoo Banshee und Voodoo 3;
  * h5: Voodoo 4 und Voodoo 5.
";
$elem["libglide3/driver"]["descriptionfr"]="Pilote pour l'accélération 3d :
 Veuillez choisir le pilote que vous souhaitez utiliser pour l'accélération 3D :
  * h3 : Voodoo Banshee and Voodoo 3 ;
  * h5 : Voodoo 4 et Voodoo 5.
";
$elem["libglide3/driver"]["default"]="${default}";
$elem["libglide3/card"]["type"]="select";
$elem["libglide3/card"]["description"]="Card to use for 3D acceleration:
 Multiple 3Dfx-based cards were detected based on one of the
 following 3Dfx chipsets: Voodoo 2, Voodoo Banshee, Voodoo 3, Voodoo 4, and Voodoo 5.
 .
 Please select the card you would like to use for 3D acceleration.
";
$elem["libglide3/card"]["descriptionde"]="Karte für die 3D-Beschleunigung:
 Es wurden mehrere 3Dfx-Karten erkannt, die einen der folgenden 3Dfx-Chipsätze verwenden: Voodoo 2, Voodoo Banshee, Voodoo 3, Voodoo 4 und Voodoo 5.
 .
 Bitte die Karte für die 3D-Beschleunigung auswählen.
";
$elem["libglide3/card"]["descriptionfr"]="Veuillez choisir la carte que vous souhaitez utiliser pour l'accélération 3D.
 Plusieurs cartes basées sur l'un des jeux de composants 3Dfx suivants ont été détectées : Voodoo 2, Voodoo Banshee, Voodoo 3, Voodoo 4 ou Voodoo 5.
 .
 Veuillez choisir la carte que vous souhaitez utiliser pour l'accélération 3D.
";
$elem["libglide3/card"]["default"]="";
$elem["libglide3/error"]["type"]="note";
$elem["libglide3/error"]["description"]="${e1}
 ${e2}
";
$elem["libglide3/error"]["descriptionde"]="";
$elem["libglide3/error"]["descriptionfr"]="";
$elem["libglide3/error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
