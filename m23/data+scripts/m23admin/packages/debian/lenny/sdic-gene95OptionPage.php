<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sdic-gene95");

$elem["sdic-gene95/tmpdir"]["type"]="string";
$elem["sdic-gene95/tmpdir"]["description"]="gene95 archive file location:
 Please enter the directory containing the gene95 archive file (which must
 be owned by root). 
";
$elem["sdic-gene95/tmpdir"]["descriptionde"]="Ort der Gene94-Archivdatei:
 Bitte geben Sie das Verzeichnis an, dass die Gene95-Archivdatei enthält (diese muss Root gehören).
";
$elem["sdic-gene95/tmpdir"]["descriptionfr"]="Emplacement du fichier d'archive de gene95 :
 Veuillez indiquer le répertoire contenant le fichier d'archive de « gene95 » (celui-ci doit appartenir au superutilisateur).
";
$elem["sdic-gene95/tmpdir"]["default"]="/tmp";
$elem["sdic-gene95/make_jp"]["type"]="boolean";
$elem["sdic-gene95/make_jp"]["description"]="Use the gene95 version of the Japanese-English dictionary?
 It is recommended decline this option and use the sdic-edict version of
 the Japanese-English dictionary.
 .
 However, if you don't want to install this package and still want to use
 such a dictionary, you can select this option and use the gene95 version.
";
$elem["sdic-gene95/make_jp"]["descriptionde"]="Die Gene95-Version des Japanisch-Englisch-Wörterbuchs verwenden?
 Es wird empfohlen, diese Option abzulehnen und die Sdic-Edict-Version des Japanisch-Englisch-Wörterbuchs zu verwenden.
 .
 Falls Sie allerdings dieses Paket nicht installieren und dennoch so ein Wörterbuch verwenden wollen, können Sie diese Option wählen und die Gene95-Version verwenden.
";
$elem["sdic-gene95/make_jp"]["descriptionfr"]="Faut-il utiliser « gene95 » comme dictionnaire Japonais-Anglais ?
 Cette option n'est pas recommandée, veuillez plutôt utiliser le dictionnaire « sdic-edict » d'Anglais-Japonais.
 .
 Cependant, si vous ne voulez pas installer ce paquet et tout de même utiliser un dictionnaire, choisissez cette option pour utiliser « gene95 ».
";
$elem["sdic-gene95/make_jp"]["default"]="false";
$elem["sdic-gene95/en_array"]["type"]="boolean";
$elem["sdic-gene95/en_array"]["description"]="Generate an index for the English-Japanese dictionary?
 If you have installed the sufary package, you can have an array index for
 the English-Japanese dictionary. This will greatly improve the word
 searching speed. The index size is about 10 Mb.
";
$elem["sdic-gene95/en_array"]["descriptionde"]="Einen Index für das Englisch-Japanisch-Wörterbuch verwenden?
 Falls Sie das Sufary-Paket installiert haben, können Sie einen Array-Index für das Englisch-Japanisch-Wörterbuch erhalten. Dies wird die Wortsuchgeschwindigkeit deutlich erhöhen. Die Indexgröße beträgt rund 10 MB.
";
$elem["sdic-gene95/en_array"]["descriptionfr"]="Faut-il créer un index pour le dictionnaire Anglais-Japonais ?
 Si le paquet « sufary » est installé, il est possible d'indexer le dictionnaire Anglais-Japonais. Cette opération accélère notablement les recherches de mots. L'index occupe environ 10 Mo.
";
$elem["sdic-gene95/en_array"]["default"]="true";
$elem["sdic-gene95/jp_array"]["type"]="boolean";
$elem["sdic-gene95/jp_array"]["description"]="Generate an index for the Japanese-English dictionary?
 If you have installed the sufary package, you can have an array index for
 the Japanese-English dictionary. This will greatly improve the word
 searching speed. The index size is about 10 Mb.
";
$elem["sdic-gene95/jp_array"]["descriptionde"]="Einen Index für das Japanisch-Englisch-Wörterbuch erstellen?
 Falls Sie das Sufary-Paket installiert haben, können Sie einen Array-Index für das Japanisch-Englisch-Wörterbuch erhalten. Dies wird die Wortsuchgeschwindigkeit deutlich erhöhen. Die Indexgröße beträgt rund 10 MB.
";
$elem["sdic-gene95/jp_array"]["descriptionfr"]="Faut-il créer un index pour le dictionnaire Japonais-Anglais ?
 Si le paquet « sufary » est installé, il est possible d'indexer le dictionnaire Japonais-Anglais. Cette opération accélère notablement les recherches de mots. L'index occupe environ 10 Mo.
";
$elem["sdic-gene95/jp_array"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
