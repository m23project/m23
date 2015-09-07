<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("interchange-ui");

$elem["interchange-ui/defaultlocale"]["type"]="select";
$elem["interchange-ui/defaultlocale"]["choices"][1]="en_US";
$elem["interchange-ui/defaultlocale"]["choices"][2]="da_DK";
$elem["interchange-ui/defaultlocale"]["choices"][3]="de_DE";
$elem["interchange-ui/defaultlocale"]["choices"][4]="it_IT";
$elem["interchange-ui/defaultlocale"]["choices"][5]="nl_NL";
$elem["interchange-ui/defaultlocale"]["description"]="Default language for user interface:
 The administration interface for Interchange catalogs, called UI, has been
 translated to Danish (da_DK), Dutch (nl_NL), German (de_DE), Italian
 (it_IT) and Swedish (sv_SE). You can choose the default language here. Any
 user may change this default at login time.
";
$elem["interchange-ui/defaultlocale"]["descriptionde"]="Vordefinierte Sprache der Benutzerschnittstelle:
 Die Administrationsbenutzerschnittstelle für Interchange-Kataloge, UI genannt, wurde ins Dänische (da_DK), Deutsche (de_DE), Niederländische (nl_NL), Italienische (it_IT) und Schwedische (sv_SE) übersetzt. Die vordefinierte Sprache können Sie hier festlegen. Jeder Benutzer kann sie beim Anmeldevorgang ändern.
";
$elem["interchange-ui/defaultlocale"]["descriptionfr"]="Langue par défaut de l'interface utilisateur :
 L'interface d'administration des catalogues d'Interchange (UI) a été traduite en danois (da_DK), néerlandais (nl_NL), allemand (de_DE), italien (it_IT) et suédois (sv_SE). Veuillez choisir la langue par défaut. Les utilisateurs pourront modifier ce réglage à la connexion.
";
$elem["interchange-ui/defaultlocale"]["default"]="en_US";
PKG_OptionPageTail2($elem);
?>
