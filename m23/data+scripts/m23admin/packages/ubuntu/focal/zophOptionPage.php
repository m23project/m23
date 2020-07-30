<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zoph");

$elem["zoph/rm_images"]["type"]="select";
$elem["zoph/rm_images"]["choices"][1]="yes";
$elem["zoph/rm_images"]["choices"][2]="no";
$elem["zoph/rm_images"]["description"]="Remove image files (photos) you uploaded ?
 Zoph imports files into, by default, /var/lib/zoph
 If you decide to remove the zoph package, but wish to
 keep the photos you uploaded answer yes.
 To have the files removed, answer no.
 To be asked at package removal time answer ask.
";
$elem["zoph/rm_images"]["descriptionde"]="Die hochgeladenen Bilddateien (Fotos) entfernen?
 Standardmäßig importiert Zoph Dateien in das Verzeichnis /var/lib/zoph. Wenn Sie das Zoph-Paket entfernen wollen, die hochgeladenen Fotos aber behalten möchten, antworten Sie mit »Ja«. Sollen die Dateien entfernt werden, antworten Sie mit »Nein«. Um zum Zeitpunkt der Paketentfernung gefragt zu werden, antworten Sie mit »Fragen«.
";
$elem["zoph/rm_images"]["descriptionfr"]="Faut-il supprimer les fichiers d'image (photos) que vous avez envoyés au serveur ?
 Zoph importe les fichiers dans le répertoire /var/lib/zoph par défaut. Si vous décidez de supprimer le paquet zoph, mais désirez conserver les photos que vous avez envoyés au serveur, répondez « yes ». Pour que les fichiers soient supprimés, répondez « no ». Si vous souhaitez être interrogé au moment de la suppression, répondez « ask ».
";
$elem["zoph/rm_images"]["default"]="ask";
$elem["zoph/keep_images"]["type"]="boolean";
$elem["zoph/keep_images"]["description"]="Keep uploaded image files after removal ?
 You have imported some photos into /var/lib/zoph, and
 are removing the zoph package.
";
$elem["zoph/keep_images"]["descriptionde"]="Die hochgeladenen Bilddateien nach Entfernung behalten?
 Sie haben Fotos in das Verzeichnis /var/lib/zoph importiert und entfernen das Paket Zoph.
";
$elem["zoph/keep_images"]["descriptionfr"]="Faut-il conserver les fichiers d'image envoyés au serveur après la suppression ?
 Vous avez importé des photos dans le répertoire /var/lib/zoph et vous supprimez le paquet zoph.
";
$elem["zoph/keep_images"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
