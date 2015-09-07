<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("man2html");

$elem["man2html/index_manpages"]["type"]="boolean";
$elem["man2html/index_manpages"]["description"]="Should post-installation script index your man pages?
 Swish++ will be run once a week to index your man pages.
 .
 The index can also be generated (in the background) by the post-installation script.
 This process needs quite a lot of computer resources, and can take several minutes
 so you can choose now if you would like to do this.
";
$elem["man2html/index_manpages"]["descriptionde"]="Soll nach der Installation der Man-Page-Index erstellt werden?
 Swish++ wird einmal pro Woche gestartet und erstellt dann den Man-Page-Index.
 .
 Dieser Index kann auch nach der Installation (im Hintergrund) erstellt werden. Dieser Prozess braucht viel Computerleistung und kann mehrere Minuten dauern. Daher können Sie jetzt wählen, ob Sie dieses möchten.
";
$elem["man2html/index_manpages"]["descriptionfr"]="Le script de post-installation doit-il indexer vos pages de manuel?
 Swish++ sera lancé une fois par semaine pour indexer vos pages de manuel.
 .
 L'index peut aussi être généré (en arrière-plan) par le script de post-installation. Ce travail est assez exigeant en terme de ressources, et peut durer plusieurs minutes, c'est pourquoi vous pouvez choisir de le faire ou non maintenant.
";
$elem["man2html/index_manpages"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
