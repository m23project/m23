<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mailfilter");

$elem["mailfilter/config"]["type"]="note";
$elem["mailfilter/config"]["description"]="Mailfilter configuration
 To use Mailfilter you must create a ~/.mailfilterrc file. For an example
 take a look at /usr/share/doc/mailfilter/examples.
";
$elem["mailfilter/config"]["descriptionde"]="Mailfilter Konfiguration
 Um Mailfilter nutzen zu koennen, musst Du eine Datei ~/mailfilterrc erstellen. Beispiele liegen in /usr/share/doc/mailfilter/examples.
";
$elem["mailfilter/config"]["descriptionfr"]="Configuration de Mailfilter
 Pour utiliser Mailfilter, vous devrez créer un fichier de configuration ~/.mailfilterrc. Vous trouverez divers exemples dans /usr/share/doc/mailfilter/examples.
";
$elem["mailfilter/config"]["default"]="";
PKG_OptionPageTail2($elem);
?>
