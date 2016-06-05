<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dist");

$elem["shared/news/organization"]["type"]="string";
$elem["shared/news/organization"]["description"]="Name of your organization:
 You don't seem to have an /etc/news/organization file. Usually that
 contains the name of your organization as you want it to appear on the
 Organization line of outgoing articles/mail/patches. Please supply the
 name of your organization as you want it to appear on the Organization
 line of outgoing articles/patches.  (It is nice if this also specifies
 your location.  Your city name is probably sufficient if well known.) For
 example:
 .
    University of Southern North Dakota, Hoople
 .
 Type in \"--none--\" if you do not want to specify one.
";
$elem["shared/news/organization"]["descriptionde"]="Name Ihrer Organisation:
 Sie haben scheinbar keine Datei /etc/news/organization. normalerweise enthält diese den Namen Ihrer Organisation, der in der Zeile Organisation von abgehenden Artikeln, Emails oder Patches. Bitte geben Sie den Namen der Organisation ein, so wie er in der Zeile Organisation von abgehenden Artikeln und Patches stehen soll. (Es wäre gut, wenn er auch Ihren Ort enthält. Der Name Ihrer Stadt sollte genügen, wenn Sie allgemein bekannt ist.) Zum Beispiel: 
 .
    Hochschule für Technik und Wirtschaft Dresden
 .
 Geben Sie \"--none--\" ein, wenn Sie keinen angeben wollen.
";
$elem["shared/news/organization"]["descriptionfr"]="Nom de votre organisation :
 Vous n'avez pas de fichier /etc/news/organization. Habituellement, ce fichier contient le nom de votre organisation, qui est inscrit sur la ligne « Organization » des articles, courriels et correctifs envoyés. Veuillez indiquer le nom de l'organisation que vous souhaitez voir figurer sur cette ligne. Vous pouvez aussi indiquer votre adresse, ou simplement votre ville si elle est connue. Exemple :
 .
    Université Pierre et Marie Curie, Paris
 .
 Si vous ne désirez pas spécifier d'organisation, inscrivez « --none-- ».
";
$elem["shared/news/organization"]["default"]="--none--";
PKG_OptionPageTail2($elem);
?>
