<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cltl");

$elem["cltl/downloading"]["type"]="boolean";
$elem["cltl/downloading"]["description"]="Download the cltl book from the Internet?
 You don't have the file /root/tmp/cltl_ht.tar.gz. You may want to download
 this file from internet now and proceed with the installation afterward.
";
$elem["cltl/downloading"]["descriptionde"]="Das Cltl-Buch aus dem Internet herunterladen?
 Sie haben die Datei /root/tmp/cltl_ht.tar.gz nicht. Eventuell möchten Sie zuerst diese Datei jetzt aus dem Internet herunterladen und danach mit der Installation fortfahren.
";
$elem["cltl/downloading"]["descriptionfr"]="Faut-il télécharger le livre depuis Internet ?
 Le livre électronique sur cltl n'est pas présent sur votre système. Vous pouvez télécharger maintenant le fichier « /root/tmp/cltl_ht.tar.gz » depuis Internet et l'installer plus tard.
";
$elem["cltl/downloading"]["default"]="true";
$elem["cltl/tryagain"]["type"]="boolean";
$elem["cltl/tryagain"]["description"]="Unable to download. Try again?
 An error occured during the download of book from the Internet. You may now
 request to try the download again.
";
$elem["cltl/tryagain"]["descriptionde"]="Kann nicht herunterladen. Erneut versuchen?
 Ein Fehler trat während des Herunterladens des Buchs aus dem Internet auf. Sie können jetzt erbeten, dass das Herunterladen erneut versucht wird.
";
$elem["cltl/tryagain"]["descriptionfr"]="Téléchargement impossible, voulez-vous réessayer ?
 Une erreur s'est produite pendant le téléchargement du livre. Vous pouvez recommencer le téléchargement maintenant.
";
$elem["cltl/tryagain"]["default"]="true";
$elem["cltl/aborting"]["type"]="note";
$elem["cltl/aborting"]["description"]="Aborting.
 The download of the cltl book from internet failed. You can try
 reinstalling the file another time. 
";
$elem["cltl/aborting"]["descriptionde"]="Abbruch.
 Das Herunterladen des Cltl-Buchs aus dem Internet ist fehlgeschlagen. Sie können zu einem späteren Zeitpunkt die Installation der Datei erneut versuchen.
";
$elem["cltl/aborting"]["descriptionfr"]="Le téléchargement est abandonné
 Le téléchargement du livre depuis Internet a échoué. Vous pourrez essayer de le réinstaller plus tard.
";
$elem["cltl/aborting"]["default"]="";
PKG_OptionPageTail2($elem);
?>
