<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pioneers-metaserver");

$elem["pioneers-metaserver/ports"]["type"]="string";
$elem["pioneers-metaserver/ports"]["description"]="Port range for creating new games on the metaserver:
 The metaserver can create new games, so players don't need to install and
 run the pioneers server. The ports which are used for these games can be
 specified. If this field is left empty, the metaserver will disable its
 game creation functionality.
 .
 If the value is not empty, it must be two port numbers, separated by a minus
 sign.
";
$elem["pioneers-metaserver/ports"]["descriptionde"]="Port-Bereich, um neue Spiele auf dem Metaserver zu erstellen:
 Der Metaserver kann neue Spiele erstellen, daher müssen die Spieler den Pioneers-Server nicht installieren und ausführen. Die für diese Spiele zu verwendenden Ports können angegeben werden. Falls dieses Feld leer bleibt, wird der Metaserver seine Funktionalität zum Erstellen von Spielen deaktivieren.
 .
 Falls der Wert nicht leer ist muss er zwei Portnummern, getrennt durch ein Minuszeichen, umfassen.
";
$elem["pioneers-metaserver/ports"]["descriptionfr"]="Plage de ports pour la création de nouvelles parties sur le métaserveur :
 Le métaserveur peut créer de nouvelle parties, ce qui évite aux joueurs d'installer et d'exécuter le serveur de pioneers. Veuillez indiquer les ports qui pourront être utilsiés pour cela. Si vous laissez ce champ vide, la création de nouvelles parties sera désactivée.
 .
 Pour que cette valeur soit valable, elle doit comporter deux nombres entiers séparés par un tiret.
";
$elem["pioneers-metaserver/ports"]["default"]="5560-5569";
$elem["pioneers-metaserver/name"]["type"]="string";
$elem["pioneers-metaserver/name"]["description"]="Server name for created games:
 In some cases, the name the metaserver uses for itself when creating new
 games is incorrect. If this field is not left empty, it is used to override
 the detected hostname.
";
$elem["pioneers-metaserver/name"]["descriptionde"]="Servername für erstellte Spiele:
 In einigen Fällen ist der Name, den der Metaserver für sich beim Erstellen von Spielen verwendet, falsch. Falls dieses Feld nicht leer gelassen wird, überschreibt der Wert den erkannten Namen des Rechners.
";
$elem["pioneers-metaserver/name"]["descriptionfr"]="Nom du serveur pour les nouvelles parties :
 Dans certains cas, le nom utilisé par le métaserveur pour créer de nouvelles parties n'est pas valable. Si ce champ est renseigné, sa valeur remplacera le nom d'hôte pour nommer les nouvelles parties.
";
$elem["pioneers-metaserver/name"]["default"]="Default:";
$elem["pioneers-metaserver/arguments"]["type"]="string";
$elem["pioneers-metaserver/arguments"]["description"]="Extra arguments to pass to the metaserver:
 These arguments are passed to the metaserver.
  * --redirect: Redirect clients to another metaserver
";
$elem["pioneers-metaserver/arguments"]["descriptionde"]="Zusätzliche Argumente, die an den Metaserver übergeben werden sollen:
 Diese Argumente werden an den Metaserver übergeben.
  * --redirect: Leite Clients an einen anderen Metaserver weiter
";
$elem["pioneers-metaserver/arguments"]["descriptionfr"]="";
$elem["pioneers-metaserver/arguments"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
