<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("hyperspec");

$elem["hyperspec/downloading"]["type"]="boolean";
$elem["hyperspec/downloading"]["description"]="Download the hyperspec book from the Internet?
 You don't have the file /root/tmp/HyperSpec-6-0.tar.gz. You may want to
 download this file from internet now and proceed with the installation
 afterward.
";
$elem["hyperspec/downloading"]["descriptionde"]="Das Hyperspec-Buch aus dem Internet herunterladen?
 Sie haben die Datei /root/tmp/HyperSpec-6-0.tar.gz nicht. Eventuell möchten Sie zuerst diese Datei jetzt aus dem Internet herunterladen und danach mit der Installation fortfahren.
";
$elem["hyperspec/downloading"]["descriptionfr"]="Faut-il télécharger le livre depuis Internet ?
 Le livre électronique sur hyperspec n'est pas présent sur votre système. Vous pouvez télécharger maintenant le fichier « /root/tmp/HyperSpec-6-0.tar.gz » depuis Internet et l'installer plus tard.
";
$elem["hyperspec/downloading"]["default"]="true";
$elem["hyperspec/tryagain"]["type"]="boolean";
$elem["hyperspec/tryagain"]["description"]="Unable to download. Try again?
 An error occured during the download of the hyperspec from the Internet.
 You may now request to try the download again.
";
$elem["hyperspec/tryagain"]["descriptionde"]="Kann nicht herunterladen. Erneut versuchen?
 Ein Fehler trat während des Herunterladens der Hyperspec aus dem Internet auf. Sie können jetzt erbeten, dass das Herunterladen erneut versucht wird.
";
$elem["hyperspec/tryagain"]["descriptionfr"]="Téléchargement impossible, voulez-vous réessayer ?
 Une erreur s'est produite pendant le téléchargement de hyperspec. Vous pouvez recommencer le téléchargement maintenant.
";
$elem["hyperspec/tryagain"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
