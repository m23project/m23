<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libglide3");

$elem["libglide3/no_card"]["type"]="boolean";
$elem["libglide3/no_card"]["description"]="No 3Dfx card supported by glide3 found! Manually select driver?
 ERROR: No 3Dfx card supported by glide3 found!
 .
 This package is for cards based on the following 3Dfx chipsets: Voodoo
 Banshee, Voodoo 3, Voodoo 4, and Voodoo 5.
 .
 If you do not have a card based on one of the listed chipsets, and you are
 not compiling programs against glide, you should not have this package
 installed.
 .
 If you do have a card based on one of the listed chipsets please file a
 bug on this package, including the output from the command 'lspci -vm' in
 the bug report.
 .
 Would you like to manually select the driver to use for now? (If not, a
 default sane value for compiling against will be selected.)
";
$elem["libglide3/no_card"]["descriptionde"]="Keine 3Dfx-Karte gefunden, die von glide3 unterstützt wird! Manuell auswählen?
 FEHLER: Keine 3Dfx-Karte gefunden, die von glide3 unterstützt wird!
 .
 Dieses Paket unterstützt Karten mit den Chipsätzen: Voodoo Banshee, Voodoo 3, Voodoo 4, und Voodoo 5.
 .
 Wenn Sie keine Karte mit diesen Chipsätzen haben und keine Programme mit glide-Unterstützung kompilieren wollen, sollten Sie dieses Paket nicht installieren.
 .
 Wenn Ihre Karte einen der genannten Chipsätze hat, schreiben Sie bitte einen Fehlerbericht für dieses Paket und fügen Sie die Ausgabe des Kommandos: 'lspci -vm' bei.
 .
 Wollen Sie manuell einen Treiber auswählen? (Wenn nicht, wird ein Standardwert für das Kompilieren ausgewählt.)
";
$elem["libglide3/no_card"]["descriptionfr"]="Aucune carte 3Dfx reconnue par glide3 n'a été trouvée ! Voulez-vous choisir vous-même le pilote ?
 ERREUR : aucune carte 3Dfx reconnue par glide3 n'a été trouvée !
 .
 Ce paquet est destiné aux cartes utilisant les jeux de composants 3Dfx suivants : Voodoo Banshee, Voodoo 3, Voodoo 4 et Voodoo 5.
 .
 Si votre carte n'est pas basée sur l'un de ces jeux de composants et que vous ne faites pas de compilation de programmes liés à glide, vous n'avez pas de raison d'installer ce paquet.
 .
 Si votre carte est basée sur l'un de ces jeux de composants, veuillez envoyer un rapport de bogue pour ce paquet en y incluant les messages affichés par la commande « lspci -vm ».
 .
 Souhaitez-vous choisir vous-même le pilote à utiliser maintenant (si vous ne le faites pas, une valeur par défaut sûre sera choisie pour les compilations) ?
";
$elem["libglide3/no_card"]["default"]="false";
$elem["libglide3/driver"]["type"]="select";
$elem["libglide3/driver"]["choices"][1]="h3";
$elem["libglide3/driver"]["description"]="Please select a driver.
 Please select the driver you would like to use.
 .
  h3   - Voodoo Banshee and Voodoo 3.
  h5   - Voodoo 4 and Voodoo 5.
";
$elem["libglide3/driver"]["descriptionde"]="Bitte Treiber auswählen.
 Bitte wählen Sie den Treiber aus, den Sie benutzen möchten.
 .
  h3   - Voodoo Banshee und Voodoo 3.
  h5   - Voodoo 4 und Voodoo 5.
";
$elem["libglide3/driver"]["descriptionfr"]="Veuillez choisir le pilote.
 Veuillez choisir le pilote que vous souhaitez utiliser.
 .
  h3   : Voodoo Banshee et Voodoo 3 ;
  h5   : Voodoo 4 et Voodoo 5.
";
$elem["libglide3/driver"]["default"]="${default}";
$elem["libglide3/card"]["type"]="select";
$elem["libglide3/card"]["description"]="Please select a card.
 We have detected more then one video card based on the following 3Dfx
 chipsets: Voodoo 2, Voodoo Banshee, Voodoo 3, Voodoo 4, and Voodoo 5.
 .
 Please select the card you would like to use for 3D acceleration.
";
$elem["libglide3/card"]["descriptionde"]="Bitte Karte auswählen.
 Es wurden mehrere Grafikkarten mit den folgenden 3Dfx-Chipsätzen gefunden: Voodoo 2, Voodoo Banshee, Voodoo 3, Voodoo 4, und Voodoo 5.
 .
 Bitte die Karte für die 3D-Beschleunigung auswählen.
";
$elem["libglide3/card"]["descriptionfr"]="Veuillez choisir la carte.
 Plusieurs cartes basées sur l'un des jeux de composants Voodoo 2, Voodoo Banshee, Voodoo 3, Voodoo 4 ou Voodoo 5 ont été détectées.
 .
 Veuillez choisir la carte que vous souhaitez utiliser pour l'accélération 3D.
";
$elem["libglide3/card"]["default"]="";
$elem["libglide3/error"]["type"]="note";
$elem["libglide3/error"]["description"]="${e1}
 ${e2}
";
$elem["libglide3/error"]["descriptionde"]="${e1}
 ${e2}
";
$elem["libglide3/error"]["descriptionfr"]="${e1}
 ${e2}
";
$elem["libglide3/error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
