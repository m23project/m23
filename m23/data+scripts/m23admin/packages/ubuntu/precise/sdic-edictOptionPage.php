<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sdic-edict");

$elem["sdic-edict/make_en"]["type"]="boolean";
$elem["sdic-edict/make_en"]["description"]="Use the edict version of the English-Japanese dictionary?
 Choosing this option is not recommended. The use of the sdic-gene95 version of
 the English-Japanese dictionary is encouraged.
 .
 However, if you don't want to install that package and still want to use
 such a dictionary, you can select this option and use the edict version.
";
$elem["sdic-edict/make_en"]["descriptionde"]="Die Edict-Version des Englisch-Japanisch-Wörterbuchs verwenden?
 Die Wahl dieser Option wird nicht empfohlen. Es wäre besser, die Sdic-Gene95-Version des Englisch-Japanisch-Wörterbuchs zu verwenden.
 .
 Falls Sie allerdings dieses Paket nicht installieren und dennoch so ein Wörterbuch verwenden wollen, können Sie diese Option wählen und die Edict-Version verwenden.
";
$elem["sdic-edict/make_en"]["descriptionfr"]="Faut-il utiliser la version edict du dictionnaire Anglais-Japonais ?
 Cette option n'est pas recommandée. Vous devriez plutôt utiliser la version sdic-gene95 du dictionnaire Anglais-Japonais.
 .
 Cependant, si vous ne voulez pas installer la version sdic-gene95 de ce paquet et tout de même utiliser ce dictionnaire, choisissez cette option pour utiliser la version edict.
";
$elem["sdic-edict/make_en"]["default"]="false";
$elem["sdic-edict/en_array"]["type"]="boolean";
$elem["sdic-edict/en_array"]["description"]="Generate an index for the English-Japanese dictionary?
 If you have installed the sufary package, you can have an index for
 the English-Japanese dictionary.
 .
 This will greatly improve the word
 searching speed. The index size is about ten MB.
";
$elem["sdic-edict/en_array"]["descriptionde"]="Einen Index für das Englisch-Japanisch-Wörterbuch verwenden?
 Falls Sie das Sufary-Paket installiert haben, können Sie einen Index für das Englisch-Japanisch-Wörterbuch erhalten.
 .
 Dies wird die Geschwindigkeit der Wörtersuche stark verbessern. Die Indexgröße beträgt etwa 10 MB.
";
$elem["sdic-edict/en_array"]["descriptionfr"]="Faut-il créer un index pour le dictionnaire Anglais-Japonais ?
 Si le paquet sufary est installé, il est possible d'indexer le dictionnaire Anglais-Japonais.
 .
 Cette opération accélère notablement la recherche de mots. L'index occupe environ 10 Mo.
";
$elem["sdic-edict/en_array"]["default"]="true";
$elem["sdic-edict/jp_array"]["type"]="boolean";
$elem["sdic-edict/jp_array"]["description"]="Generate an index for the Japanese-English dictionary?
 If you have installed the sufary package, you can have an index for
 the Japanese-English dictionary.
 .
 This will greatly improve the word
 searching speed. The index size is about ten MB.
";
$elem["sdic-edict/jp_array"]["descriptionde"]="Einen Index für das Japanisch-Englisch-Wörterbuch erstellen?
 Falls Sie das Sufary-Paket installiert haben, können Sie einen Suchindex für das Japanisch-Englisch-Wörterbuch erhalten.
 .
 Dies wird die Geschwindigkeit der Wörtersuche stark verbessern. Die Indexgröße beträgt etwa 10 MB.
";
$elem["sdic-edict/jp_array"]["descriptionfr"]="Faut-il créer un index pour le dictionnaire Japonais-Anglais ?
 Si le paquet sufary est installé, il est possible d'indexer le dictionnaire Japonais-Anglais.
 .
 Cette opération accélère notablement la recherche de mots. L'index occupe environ 10 Mo.
";
$elem["sdic-edict/jp_array"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
