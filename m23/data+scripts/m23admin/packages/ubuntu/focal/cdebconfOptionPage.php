<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cdebconf");

$elem["cdebconf/frontend"]["type"]="select";
$elem["cdebconf/frontend"]["description"]="Interface to use:
 Packages that use debconf for configuration share a common look and feel.
 You can select the type of user interface they use.
 .
 ${descriptions}
";
$elem["cdebconf/frontend"]["descriptionde"]="Zu nutzende Schnittstellenoberfläche:
 Pakete, die Debconf für die Konfiguration verwenden, haben ein gemeinsames »look and feel« (Aussehen und Art der Bedienung). Sie können wählen, welche Benutzerschnittstelle sie nutzen möchten.
 .
 ${descriptions}
";
$elem["cdebconf/frontend"]["descriptionfr"]="Interface à utiliser :
 Les paquets utilisant debconf pour leur configuration ont une interface et une ergonomie communes. Vous pouvez choisir leur interface utilisateur.
 .
 ${descriptions}
";
$elem["cdebconf/frontend"]["default"]="";
$elem["cdebconf/frontend/none"]["type"]="string";
$elem["cdebconf/frontend/none"]["description"]="None
 'None' will never ask you any question.
";
$elem["cdebconf/frontend/none"]["descriptionde"]="Keine
 Bei »Keine« werden keinerlei Fragen gestellt.
";
$elem["cdebconf/frontend/none"]["descriptionfr"]="Aucune
 « Aucune » ne provoquera aucune question.
";
$elem["cdebconf/frontend/none"]["default"]="";
$elem["cdebconf/frontend/text"]["type"]="string";
$elem["cdebconf/frontend/text"]["description"]="Text
 'Text' is a traditional plain text interface.
";
$elem["cdebconf/frontend/text"]["descriptionde"]="Text
 »Text« ist eine traditionelle, rein text-basierte Oberfläche.
";
$elem["cdebconf/frontend/text"]["descriptionfr"]="Texte
 « Texte » est l'interface classique en mode texte.
";
$elem["cdebconf/frontend/text"]["default"]="";
$elem["cdebconf/frontend/newt"]["type"]="string";
$elem["cdebconf/frontend/newt"]["description"]="Newt
 'Newt' is a full-screen, character based interface.
";
$elem["cdebconf/frontend/newt"]["descriptionde"]="Newt
 »Newt« ist eine zeichenbasierte Oberfläche mit Vollbildmodus.
";
$elem["cdebconf/frontend/newt"]["descriptionfr"]="Newt
 « Newt » est une interface plein écran en mode texte.
";
$elem["cdebconf/frontend/newt"]["default"]="";
$elem["cdebconf/frontend/gtk"]["type"]="string";
$elem["cdebconf/frontend/gtk"]["description"]="GTK
 'GTK' is a graphical interface that may be used in any graphical environment.
";
$elem["cdebconf/frontend/gtk"]["descriptionde"]="GTK
 »GTK« ist eine grafische Oberfläche, die in jeder grafischen Umgebung verwendet werden kann.
";
$elem["cdebconf/frontend/gtk"]["descriptionfr"]="GTK
 « GTK » est une interface graphique qui peut être utilisée dans tout environnement graphique.
";
$elem["cdebconf/frontend/gtk"]["default"]="";
PKG_OptionPageTail2($elem);
?>
