<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("exult");

$elem["exult/blackgate"]["type"]="string";
$elem["exult/blackgate"]["description"]="Path to \"The Black Gate\":
 Exult needs to know where your copy of Ultima VII: The Black Gate is
 located. You need to give the path where the game's top directory can be
 found.
 .
 If you don't have BG, just leave the field blank.
";
$elem["exult/blackgate"]["descriptionde"]="Pfad zu »The Black Gate«:
 Exult muss wissen, wo sich Ihre Kopie von Ultima VII: The Black Gate befindet. Sie müssen den Pfad zu dem obersten Verzeichnis des Spiels eingeben.
 .
 Falls Sie BG nicht besitzen, lassen Sie das Feld leer.
";
$elem["exult/blackgate"]["descriptionfr"]="Chemin d'accès au jeu « The Black Gate » :
 Il est nécessaire de connaître l'emplacement de la copie du jeu « Ultima VII: The Black Gate ». Vous devez indiquer le chemin d'accès au répertoire racine du jeu.
 .
 Si vous ne possédez pas « The Black Gate », laissez ce champ vide.
";
$elem["exult/blackgate"]["default"]="";
$elem["exult/serpent"]["type"]="string";
$elem["exult/serpent"]["description"]="Path to \"Serpent Isle\":
 Exult needs to know where your copy of Ultima VII: Serpent Isle is
 located. You need to give the path where the game's top directory can be
 found.
 .
 If you don't have SI, just leave the field blank.
";
$elem["exult/serpent"]["descriptionde"]="Pfad zu »Sperpent Isle«:
 Exult muss wissen, wo sich Ihre Kopie von Ultima VII: Serpent Isle befindet. Sie müssen den Pfad zu dem obersten Verzeichnis des Spiels eingeben.
 .
 Falls Sie SI nicht besitzen, lassen Sie das Feld leer.
";
$elem["exult/serpent"]["descriptionfr"]="Chemin d'accès au jeu « Serpent Isle » :
 Il est nécessaire de connaître l'emplacement de la copie du jeu « Ultima VII: Serpent Isle ». Vous devez indiquer le chemin d'accès au répertoire racine du jeu.
 .
 Si vous ne possédez pas « Serpent Isle », laissez ce champ vide.
";
$elem["exult/serpent"]["default"]="";
$elem["exult/not_a_dir"]["type"]="note";
$elem["exult/not_a_dir"]["description"]="The entered path is not a directory
 Please enter the path to the top directory of the game, or leave it
 blank if you don't have it.
";
$elem["exult/not_a_dir"]["descriptionde"]="Der angegebene Pfad ist kein Verzeichnis
 Bitte geben Sie den Pfad zum obersten Verzeichnis des Spieles an, oder lassen Sie es leer, falls Sie es nicht haben.
";
$elem["exult/not_a_dir"]["descriptionfr"]="Le chemin indiqué n'est pas un répertoire
 Veuillez indiquer le chemin d'accès au répertoire racine du jeu, ou laissez le champ vide si vous ne possédez pas le jeu.
";
$elem["exult/not_a_dir"]["default"]="";
$elem["exult/no_static"]["type"]="note";
$elem["exult/no_static"]["description"]="Invalid Ultima top directory
 The entered path does not look like a Ultima VII top directory.
 (Specifically, a subdirectory named \"static\" was expected but did not
 exist.)
";
$elem["exult/no_static"]["descriptionde"]="Ungültiges oberstes Verzeichnis von Ultima
 Der eingegebene Pfad sieht nicht nach einem obersten Verzeichnis von Ultima VII aus (insbesondere wurde ein Unterverzeichnis mit Name »static« erwartet, das aber nicht existiert).
";
$elem["exult/no_static"]["descriptionfr"]="Répertoire racine non valable pour « Ultima »
 Le répertoire indiqué ne semble pas être le répertoire racine pour « Ultima VII ». Plus précisément, le sous-répertoire « static » n'a pas été trouvé.
";
$elem["exult/no_static"]["default"]="";
PKG_OptionPageTail2($elem);
?>
