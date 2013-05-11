<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libglide2");

$elem["libglide2/no_card"]["type"]="boolean";
$elem["libglide2/no_card"]["description"]="Manually select driver for 3Dfx card?
 No 3Dfx card that is supported by glide2 was found. This package
 supports cards based on the following 3Dfx chipsets: Voodoo 2,
 Voodoo Banshee, and Voodoo 3.
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
$elem["libglide2/no_card"]["descriptionde"]="Treiber für 3Dfx-Karte selbst auswählen?
 Es wurde keine von Glide2 unterstützte 3Dfx-Karte gefunden. Dieses Paket unterstützt Karten mit folgenden 3Dfx-Chipsätzen: Voodoo 2, Voodoo Banshee und Voodoo 3.
 .
 Wenn die Grafikkarte in diesem Rechner keinen dieser Chipsätze verwendet und Sie auch keine Programme mit Glide-Unterstützung kompilieren wollen, sollten Sie dieses Paket nicht installieren.
 .
 Wenn Ihre Karte mit einem der genannten Chipsätze ausgestattet ist, sollten Sie einen Fehlerbericht für dieses Paket schreiben und die Ausgabe des Kommandos: 'lspci -vm' beifügen.
 .
 Stimmen Sie zu, wenn Sie den Treiber selbst auswählen wollen.
";
$elem["libglide2/no_card"]["descriptionfr"]="Sélection manuelle du pilote pour la carte 3Dfx :
 Aucune carte gérée par glide2 n'a été détectée. Ce paquet est destiné aux cartes utilisant les jeux de composants 3Dfx suivants : Voodoo 2, Voodoo Banshee et Voodoo 3.
 .
 Si votre carte n'est pas basée sur l'un de ces jeux de composants et que vous ne faites pas de compilation de programmes liés à glide, vous n'avez pas de raison d'installer ce paquet.
 .
 Si votre carte est basée sur l'un de ces jeux de composants, veuillez envoyer un rapport de bogue pour ce paquet en y incluant les messages affichés par la commande « lspci -vm ».
 .
 Veuillez choisir si vous désirez sélectionner vous-même le pilote à utiliser.
";
$elem["libglide2/no_card"]["default"]="false";
$elem["libglide2/driver"]["type"]="select";
$elem["libglide2/driver"]["choices"][1]="cvg";
$elem["libglide2/driver"]["description"]="Driver for 3D acceleration:
 Please select the driver you would like to use for 3D acceleration:
  * cvg: Voodoo 2;
  * h3 : Voodoo Banshee and Voodoo 3.
";
$elem["libglide2/driver"]["descriptionde"]="Treiber für 3D-Beschleunigung:
 Bitte den Treiber für die 3D-Beschleunigung auswählen:
  * cvg: Voodoo 2;
  * h3 : Voodoo Banshee und Voodoo 3.
";
$elem["libglide2/driver"]["descriptionfr"]="Pilote pour l'accélération 3d :
 Veuillez choisir le pilote que vous souhaitez utiliser pour l'accélération 3D :
  * cvg : Voodoo 2 ;
  * h3  : Voodoo Banshee et Voodoo 3.
";
$elem["libglide2/driver"]["default"]="${default}";
$elem["libglide2/card"]["type"]="select";
$elem["libglide2/card"]["description"]="Card to use for 3D acceleration:
 Multiple 3Dfx-based cards were detected based on one of the
 following 3Dfx chipsets: Voodoo 2, Voodoo Banshee, and Voodoo 3.
 .
 Please select the card you would like to use for 3D acceleration.
";
$elem["libglide2/card"]["descriptionde"]="Karte für die 3D-Beschleunigung:
 Es wurden mehrere 3Dfx-Karten erkannt, die einen der folgenden 3Dfx-Chipsätze verwenden: Voodoo 2, Voodoo Banshee und Voodoo 3.
 .
 Bitte die Karte für die 3D-Beschleunigung auswählen.
";
$elem["libglide2/card"]["descriptionfr"]="Veuillez choisir la carte que vous souhaitez utiliser pour l'accélération 3D.
 Plusieurs cartes basées sur les jeux de composants 3Dfx ont été détectées : Voodoo 2, Voodoo Banshee et Voodoo 3.
 .
 Veuillez choisir la carte que vous souhaitez utiliser pour l'accélération 3D.
";
$elem["libglide2/card"]["default"]="";
$elem["libglide2/error"]["type"]="note";
$elem["libglide2/error"]["description"]="${e1}
 ${e2}
";
$elem["libglide2/error"]["descriptionde"]="";
$elem["libglide2/error"]["descriptionfr"]="";
$elem["libglide2/error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
