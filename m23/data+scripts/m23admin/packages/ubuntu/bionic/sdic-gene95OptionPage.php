<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sdic-gene95");

$elem["sdic-gene95/tmpdir"]["type"]="string";
$elem["sdic-gene95/tmpdir"]["description"]="Directory for the GENE95 archive file:
 Please specify the directory containing the GENE95 archive file. This
 directory must be owned by root.
";
$elem["sdic-gene95/tmpdir"]["descriptionde"]="Wörterbuch für die GENE95-Archivdatei:
 Bitte geben Sie das Verzeichnis an, das die Gene95-Archivdatei enthält. Dieses Verzeichnis muss root gehören.
";
$elem["sdic-gene95/tmpdir"]["descriptionfr"]="Répertoire pour le fichier d'archive GENE95 :
 Veuillez indiquer le répertoire contenant le fichier d'archive de gene95. Ce répertoire doit appartenir au superutilisateur.
";
$elem["sdic-gene95/tmpdir"]["default"]="/tmp";
$elem["sdic-gene95/make_jp"]["type"]="boolean";
$elem["sdic-gene95/make_jp"]["description"]="Use the GENE95 version of the Japanese-English dictionary?
 Choosing this option is not recommended. The use of the sdic-edict version of
 the Japanese-English dictionary is encouraged.
 .
 However, if you don't want to install that package and still want to use
 such a dictionary, you can select this option and use the GENE95 version.
";
$elem["sdic-gene95/make_jp"]["descriptionde"]="Die GENE95-Version des Japanisch-Englisch-Wörterbuchs verwenden?
 Die Wahl dieser Option wird nicht empfohlen. Sie werden aufgefordert, die Sdic-Edict-Version des Japanisch-Englisch-Wörterbuchs zu verwenden.
 .
 Falls Sie allerdings dieses Paket nicht installieren und dennoch so ein Wörterbuch verwenden wollen, können Sie diese Option wählen und die GENE95-Version verwenden.
";
$elem["sdic-gene95/make_jp"]["descriptionfr"]="Faut-il utiliser la version gene95 comme dictionnaire Japonais-Anglais ?
 Cette option n'est pas recommandée. Vous devriez plutôt utiliser la version sdic-edict du dictionnaire Japonais-Anglais.
 .
 Cependant, si vous ne voulez pas installer la version sdic-edic de ce paquet et tout de même utiliser ce dictionnaire, choisissez cette option pour utiliser la version GENE95.
";
$elem["sdic-gene95/make_jp"]["default"]="false";
$elem["sdic-gene95/en_array"]["type"]="boolean";
$elem["sdic-gene95/en_array"]["description"]="Generate an index for the English-Japanese dictionary?
 If you have installed the sufary package, you can have an index for
 the English-Japanese dictionary.
 .
 This will greatly improve the word
 searching speed. The index size is about ten MB.
";
$elem["sdic-gene95/en_array"]["descriptionde"]="Einen Index für das Englisch-Japanisch-Wörterbuch verwenden?
 Falls Sie das Sufary-Paket installiert haben, können Sie einen Index für das Englisch-Japanisch-Wörterbuch erhalten.
 .
 Dies wird die Geschwindigkeit der Wörtersuche stark verbessern. Die Indexgröße beträgt etwa 10 MB.
";
$elem["sdic-gene95/en_array"]["descriptionfr"]="Faut-il créer un index pour le dictionnaire Anglais-Japonais ?
 Si le paquet sufary est installé, il est possible d'indexer le dictionnaire Anglais-Japonais.
 .
 Cette opération accélère notablement la recherche de mots. L'index occupe environ 10 Mo.
";
$elem["sdic-gene95/en_array"]["default"]="true";
$elem["sdic-gene95/jp_array"]["type"]="boolean";
$elem["sdic-gene95/jp_array"]["description"]="Generate an index for the Japanese-English dictionary?
 If you have installed the sufary package, you can have an index for
 the Japanese-English dictionary.
 .
 This will greatly improve the word
 searching speed. The index size is about ten MB.
";
$elem["sdic-gene95/jp_array"]["descriptionde"]="Einen Index für das Japanisch-Englisch-Wörterbuch erstellen?
 Falls Sie das Sufary-Paket installiert haben, können Sie einen Suchindex für das Japanisch-Englisch-Wörterbuch erhalten.
 .
 Dies wird die Geschwindigkeit der Wörtersuche stark verbessern. Die Indexgröße beträgt etwa 10 MB.
";
$elem["sdic-gene95/jp_array"]["descriptionfr"]="Faut-il créer un index pour le dictionnaire Japonais-Anglais ?
 Si le paquet sufary est installé, il est possible d'indexer le dictionnaire Japonais-Anglais.
 .
 Cette opération accélère notablement la recherche de mots. L'index occupe environ 10 Mo.
";
$elem["sdic-gene95/jp_array"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
