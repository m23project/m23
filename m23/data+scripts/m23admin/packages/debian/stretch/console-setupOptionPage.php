<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("console-setup");

$elem["console-setup/use_system_font"]["type"]="text";
$elem["console-setup/use_system_font"]["description"]="Do not change the boot/kernel font
";
$elem["console-setup/use_system_font"]["descriptionde"]="Boot-/Kernel-Schrift nicht ändern
";
$elem["console-setup/use_system_font"]["descriptionfr"]="Ne pas modifier la police initiale du noyau
";
$elem["console-setup/use_system_font"]["default"]="";
$elem["console-setup/guess_font"]["type"]="text";
$elem["console-setup/guess_font"]["description"]="Let the system select a suitable font
";
$elem["console-setup/guess_font"]["descriptionde"]="Eine passende Schriftart durch das System auswählen lassen
";
$elem["console-setup/guess_font"]["descriptionfr"]="Choix automatique d'une police adaptée
";
$elem["console-setup/guess_font"]["default"]="";
$elem["console-setup/framebuffer_only"]["type"]="text";
$elem["console-setup/framebuffer_only"]["description"]="framebuffer only
";
$elem["console-setup/framebuffer_only"]["descriptionde"]="nur Framebuffer
";
$elem["console-setup/framebuffer_only"]["descriptionfr"]="uniquement tampon vidéo (« framebuffer »)
";
$elem["console-setup/framebuffer_only"]["default"]="";
$elem["console-setup/codeset47"]["type"]="select";
$elem["console-setup/codeset47"]["choices"][1]=". Arabic";
$elem["console-setup/codeset47"]["choices"][2]="# Armenian";
$elem["console-setup/codeset47"]["choices"][3]="# Cyrillic - KOI8-R and KOI8-U";
$elem["console-setup/codeset47"]["choices"][4]="# Cyrillic - non-Slavic languages";
$elem["console-setup/codeset47"]["choices"][5]="# Cyrillic - Slavic languages (also Bosnian and Serbian Latin)";
$elem["console-setup/codeset47"]["choices"][6]=". Ethiopic";
$elem["console-setup/codeset47"]["choices"][7]="# Georgian";
$elem["console-setup/codeset47"]["choices"][8]="# Greek";
$elem["console-setup/codeset47"]["choices"][9]="# Hebrew";
$elem["console-setup/codeset47"]["choices"][10]="# Lao";
$elem["console-setup/codeset47"]["choices"][11]="# Latin1 and Latin5 - western Europe and Turkic languages";
$elem["console-setup/codeset47"]["choices"][12]="# Latin2 - central Europe and Romanian";
$elem["console-setup/codeset47"]["choices"][13]="# Latin3 and Latin8 - Chichewa; Esperanto; Irish; Maltese and Welsh";
$elem["console-setup/codeset47"]["choices"][14]="# Latin7 - Lithuanian; Latvian; Maori and Marshallese";
$elem["console-setup/codeset47"]["choices"][15]=". Latin - Vietnamese";
$elem["console-setup/codeset47"]["choices"][16]="# Thai";
$elem["console-setup/codeset47"]["choices"][17]=". Combined - Latin; Slavic Cyrillic; Hebrew; basic Arabic";
$elem["console-setup/codeset47"]["choices"][18]=". Combined - Latin; Slavic Cyrillic; Greek";
$elem["console-setup/codeset47"]["choices"][19]=". Combined - Latin; Slavic and non-Slavic Cyrillic";
$elem["console-setup/codeset47"]["choicesde"][1]=". Arabisch";
$elem["console-setup/codeset47"]["choicesde"][2]="# Armenisch";
$elem["console-setup/codeset47"]["choicesde"][3]="# Kyrillisch - KOI8-R und KOI8-U";
$elem["console-setup/codeset47"]["choicesde"][4]="# Kyrillisch - nicht-slawische Sprachen";
$elem["console-setup/codeset47"]["choicesde"][5]="# Kyrillisch - slawische Sprachen (auch Bosnisch und Serbisch-Latein)";
$elem["console-setup/codeset47"]["choicesde"][6]=". Äthiopisch";
$elem["console-setup/codeset47"]["choicesde"][7]="# Georgisch";
$elem["console-setup/codeset47"]["choicesde"][8]="# Griechisch";
$elem["console-setup/codeset47"]["choicesde"][9]="# Hebräisch";
$elem["console-setup/codeset47"]["choicesde"][10]="# Laotisch";
$elem["console-setup/codeset47"]["choicesde"][11]="# Latin1 und Latin5 - westeuropäische und türkische Sprachen";
$elem["console-setup/codeset47"]["choicesde"][12]="# Latin2 - Zentraleuropäisch und Rumänisch";
$elem["console-setup/codeset47"]["choicesde"][13]="# Latin3 und Latin8 - Chichewa\";
$elem["console-setup/codeset47"]["choicesde"][14]="Esperanto\";
$elem["console-setup/codeset47"]["choicesde"][15]="Irisch\";
$elem["console-setup/codeset47"]["choicesde"][16]="Maltesisch und Walisisch";
$elem["console-setup/codeset47"]["choicesde"][17]="# Latin7 - Litauisch\";
$elem["console-setup/codeset47"]["choicesde"][18]="Lettisch\";
$elem["console-setup/codeset47"]["choicesde"][19]="Maorisch und Marshallesisch";
$elem["console-setup/codeset47"]["choicesde"][20]=". Latin - Vietnamesisch";
$elem["console-setup/codeset47"]["choicesde"][21]="# Thailändisch";
$elem["console-setup/codeset47"]["choicesde"][22]=". Kombiniert - Latein\";
$elem["console-setup/codeset47"]["choicesde"][23]="slawisches Kyrillisch\";
$elem["console-setup/codeset47"]["choicesde"][24]="Hebräisch\";
$elem["console-setup/codeset47"]["choicesde"][25]="einfaches Arabisch";
$elem["console-setup/codeset47"]["choicesde"][26]=". Kombiniert - Latein\";
$elem["console-setup/codeset47"]["choicesde"][27]="slawisches Kyrillisch\";
$elem["console-setup/codeset47"]["choicesde"][28]="Griechisch";
$elem["console-setup/codeset47"]["choicesde"][29]=". Kombiniert - Latein\";
$elem["console-setup/codeset47"]["choicesde"][30]="slawisches und nicht-slawisches Kyrillisch";
$elem["console-setup/codeset47"]["choicesfr"][1]="latin\";
$elem["console-setup/codeset47"]["choicesfr"][2]="cyrillique slave et non slave";
$elem["console-setup/codeset47"]["description"]="Character set to support:
 Please choose the character set that should be supported by the console font.
 .
 If you don't use a framebuffer, the choices that start with \".\" will
 reduce the number of available colors on the console.
";
$elem["console-setup/codeset47"]["descriptionde"]="Zu unterstützender Zeichensatz:
 Bitte wählen Sie den Zeichensatz, der von der Konsolenschriftart unterstützt werden soll.
 .
 Falls Sie keinen Framebuffer verwenden, werden die Auswahlen, die mit einem Punkt (».«) beginnen, die Anzahl der verfügbaren Farben auf der Konsole reduzieren.
";
$elem["console-setup/codeset47"]["descriptionfr"]="Jeu de caractères à gérer :
 Veuillez choisir le jeu de caractères qui doit être géré par la police de la console.
 .
 Si vous n'utilisez pas le tampon vidéo (« framebuffer »), les choix qui commencent par un point réduiront le nombre de couleurs disponibles pour la console.
";
$elem["console-setup/codeset47"]["default"]="";
$elem["console-setup/fontface47"]["type"]="select";
$elem["console-setup/fontface47"]["description"]="Font for the console:
 \"VGA\" has a traditional appearance and has medium coverage of
 international scripts. \"Fixed\" has a simplistic appearance and has
 better coverage of international scripts. \"Terminus\" may help to
 reduce eye fatigue, though some symbols have a similar aspect which
 may be a problem for programmers.
 .
 If you prefer a bold version of the Terminus font, choose either
 TerminusBold (if you use a framebuffer) or TerminusBoldVGA (otherwise).
";
$elem["console-setup/fontface47"]["descriptionde"]="Schriftart für die Konsole:
 »VGA« sieht traditionell aus und hat eine mittlere Abdeckung von internationalen Schriften. »Fixed« hat ein einfaches Aussehen und eine bessere Abdeckung von internationalen Schriften; »Terminus« kann dabei helfen, die Ermüdung der Augen zu reduzieren. Allerdings haben manche Symbole ein ähnliches Aussehen, was ein Problem für Programmierer sein kann.
 .
 Falls Sie von Terminus die fette Variante vorziehen, wählen Sie entweder TerminusBold (falls Sie einen Framebuffer verwenden) oder andernfalls TerminusBoldVGA.
";
$elem["console-setup/fontface47"]["descriptionfr"]="Police de caractères pour la console :
 « VGA » correspond à l'apparence traditionnelle, elle possède une couverture moyenne des scripts internationaux. « Fixed » a un aspect simplifié et une meilleure couverture des scripts internationaux. « Terminus » a pour but de limiter la fatigue oculaire. Cependant certains symboles peuvent apparaître presque semblables, ce qui peut représenter un problème pour les programmeurs.
 .
 Si vous préférez la version grasse de la police Terminus, choisissez soit TerminusBold si vous utilisez le tampon vidéo (« framebuffer ») ou TerminusBoldVGA dans le cas contraire.
";
$elem["console-setup/fontface47"]["default"]="";
$elem["console-setup/fontsize-text47"]["type"]="select";
$elem["console-setup/fontsize-text47"]["description"]="Font size:
 Please select the size of the font for the console. For reference,
 the font used when the computer boots has size 8x16.
";
$elem["console-setup/fontsize-text47"]["descriptionde"]="Schriftgröße:
 Bitte wählen Sie die Größe der Schriftart für die Konsole. Zum Vergleich: die Schriftart, mit der der Rechner startet, hat die Größe 8x16.
";
$elem["console-setup/fontsize-text47"]["descriptionfr"]="Taille de la police :
 Veuillez choisir la taille de la police pour la console. Comme référence, la taille de la police au démarrage du système est de 8x16.
";
$elem["console-setup/fontsize-text47"]["default"]="";
$elem["console-setup/fontsize-fb47"]["type"]="select";
$elem["console-setup/fontsize-fb47"]["description"]="Font size:
 Please select the size of the font for the console.  For reference,
 the font used when the computer boots has size 8x16.  Some font sizes
 require the kbd console package (not console-tools) plus framebuffer.
";
$elem["console-setup/fontsize-fb47"]["descriptionde"]="Schriftgröße:
 Bitte wählen Sie die Größe der Schriftart für die Konsole. Zum Vergleich: die Schriftart, mit der der Rechner startet, hat die Größe 8x16. Einige Schriftgrößen erfordern das kbd-console-Paket (nicht console-tools) plus Framebuffer.
";
$elem["console-setup/fontsize-fb47"]["descriptionfr"]="Taille de la police :
 Veuillez choisir la taille de la police pour la console. Comme référence, la taille de la police au démarrage du système est de 8x16. Certaines tailles de polices nécessite d'utiliser le paquet kbd au lieu de console-tools et imposent l'utilisation du tampon vidéo (« framebuffer »).
";
$elem["console-setup/fontsize-fb47"]["default"]="";
$elem["console-setup/charmap47"]["type"]="select";
$elem["console-setup/charmap47"]["description"]="Encoding to use on the console:
";
$elem["console-setup/charmap47"]["descriptionde"]="Kodierung, die auf der Konsole verwandt werden soll:
";
$elem["console-setup/charmap47"]["descriptionfr"]="Codage à utiliser sur la console :
";
$elem["console-setup/charmap47"]["default"]="";
$elem["console-setup/fontsize"]["type"]="string";
$elem["console-setup/fontsize"]["description"]="for internal use

";
$elem["console-setup/fontsize"]["descriptionde"]="";
$elem["console-setup/fontsize"]["descriptionfr"]="";
$elem["console-setup/fontsize"]["default"]="";
$elem["console-setup/codesetcode"]["type"]="string";
$elem["console-setup/codesetcode"]["description"]="for internal use

";
$elem["console-setup/codesetcode"]["descriptionde"]="";
$elem["console-setup/codesetcode"]["descriptionfr"]="";
$elem["console-setup/codesetcode"]["default"]="";
$elem["console-setup/store_defaults_in_debconf_db"]["type"]="boolean";
$elem["console-setup/store_defaults_in_debconf_db"]["description"]="for internal use
";
$elem["console-setup/store_defaults_in_debconf_db"]["descriptionde"]="";
$elem["console-setup/store_defaults_in_debconf_db"]["descriptionfr"]="";
$elem["console-setup/store_defaults_in_debconf_db"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
