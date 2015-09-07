<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("popularity-contest");

$elem["popularity-contest/participate"]["type"]="boolean";
$elem["popularity-contest/participate"]["description"]="Participate in the package usage survey?
 The system may anonymously supply the distribution developers with
 statistics about the most used packages on this system.  This
 information influences decisions such as which packages should go on
 the first distribution CD.
 .
 If you choose to participate, the automatic submission script will
 run once every week, sending statistics to the distribution developers.
 The collected statistics can be viewed on http://popcon.debian.org/.
 .
 This choice can be later modified by running \"dpkg-reconfigure
 popularity-contest\".
";
$elem["popularity-contest/participate"]["descriptionde"]="An der Paketverwendungserfassung teilnehmen?
 Das System kann anonym Statistiken über die am meisten verwendeten Pakete auf diesem System an die Distributions-Entwickler schicken lassen. Diese Informationen beeinflussen beispielsweise die Entscheidungen, welche Pakete auf die erste CD kommen.
 .
 Wenn Sie sich entscheiden teilzunehmen, wird das automatische Übertragungsprogramm wöchentlich ausgeführt und Statistiken an die Distributions-Entwickler senden. Die vollständigen Statistiken können unter http://popcon.debian.org/ eingesehen werden.
 .
 Die Wahl kann später durch Ausführen von »dpkg-reconfigure popularity-contest« geändert werden.
";
$elem["popularity-contest/participate"]["descriptionfr"]="Souhaitez-vous participer à l'étude statistique sur l'utilisation des paquets ?
 Le système peut envoyer anonymement aux responsables de la distribution des statistiques sur les paquets que vous utilisez le plus souvent. Ces informations influencent le choix des paquets qui sont placés sur le premier CD de la distribution.
 .
 Si vous choisissez de participer, un script enverra automatiquement chaque semaine les statistiques aux responsables. Elles peuvent être consultées sur http://popcon.debian.org/.
 .
 Vous pourrez à tout moment modifier votre choix en exécutant « dpkg-reconfigure popularity-contest ».
";
$elem["popularity-contest/participate"]["default"]="false";
$elem["popularity-contest/submiturls"]["type"]="string";
$elem["popularity-contest/submiturls"]["description"]="for internal use
 Preseed this during installation to replace the URL used for
 submitting reports.
";
$elem["popularity-contest/submiturls"]["descriptionde"]="";
$elem["popularity-contest/submiturls"]["descriptionfr"]="";
$elem["popularity-contest/submiturls"]["default"]="";
PKG_OptionPageTail2($elem);
?>
