<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pioneers-meta-server");

$elem["pioneers-meta-server/ports"]["type"]="string";
$elem["pioneers-meta-server/ports"]["description"]="Port range for creating new games on the meta-server:
 The meta-server can create new games, so players don't need to install and
 run the pioneers server. The ports which are used for these games can be
 specified. If this field is left empty, the meta-server will disable its
 game creation functionality.
 .
 If the value is not empty, it must be two port numbers, separated by a minus
 sign.
";
$elem["pioneers-meta-server/ports"]["descriptionde"]="Port-Bereich, um neue Spiele auf dem Meta-Server zu erstellen:
 Der Meta-Server kann neue Spiele erstellen, daher müssen die Spieler den Pioneers-Server nicht installieren und ausführen. Die für diese Spiele zu verwendenden Ports können angegeben werden. Falls dieses Feld leer bleibt, wird der Meta-Server seine Funktionalität zum Erstellen von Spielen deaktivieren.
 .
 Falls der Wert nicht leer ist muss er zwei Portnummern, getrennt durch ein Minuszeichen, umfassen.
";
$elem["pioneers-meta-server/ports"]["descriptionfr"]="Plage de ports pour la création de nouvelles parties sur le métaserveur :
 Le métaserveur peut créer de nouvelle parties, ce qui évite aux joueurs d'installer et d'exécuter le serveur de pioneers. Veuillez indiquer les ports qui pourront être utilsiés pour cela. Si vous laissez ce champ vide, la création de nouvelles parties sera désactivée.
 .
 Pour que cette valeur soit valable, elle doit comporter deux nombres entiers séparés par un tiret.
";
$elem["pioneers-meta-server/ports"]["default"]="5560-5569";
$elem["pioneers-meta-server/name"]["type"]="string";
$elem["pioneers-meta-server/name"]["description"]="Server name for created games:
 In some cases, the name the meta-server uses for itself when creating new
 games is incorrect. If this field is not left empty, it is used to override
 the detected hostname.
";
$elem["pioneers-meta-server/name"]["descriptionde"]="Servername für erstellte Spiele:
 In einigen Fällen ist der Name, den der Meta-Server für sich beim Erstellen von Spielen verwendet, falsch. Falls dieses Feld nicht leer gelassen wird, überschreibt der Wert den erkannten Namen des Rechners.
";
$elem["pioneers-meta-server/name"]["descriptionfr"]="Nom du serveur pour les nouvelles parties :
 Dans certains cas, le nom utilisé par le métaserveur pour créer de nouvelles parties n'est pas valable. Si ce champ est renseigné, sa valeur remplacera le nom d'hôte pour nommer les nouvelles parties.
";
$elem["pioneers-meta-server/name"]["default"]="Default:";
$elem["pioneers-meta-server/arguments"]["type"]="string";
$elem["pioneers-meta-server/arguments"]["description"]="Extra arguments to pass to the meta-server:
 These arguments are passed to the meta-server. There are only two sensible
 arguments:
  * --syslog-debug: Send debugging output to syslog
  * --redirect: Redirect clients to another meta-server
";
$elem["pioneers-meta-server/arguments"]["descriptionde"]="Zusätzliche Argumente, die an den Meta-Server übergeben werden sollen:
 Diese Argumente werden an den Meta-Server übergeben. Es gibt nur zwei sinnvolle Argumente:
  * --syslog-debug: Schicke Debugging-Ausgaben an Syslog
  * --redirect: Leite Clients an einen anderen Meta-Server weiter
";
$elem["pioneers-meta-server/arguments"]["descriptionfr"]="Paramètres supplémentaires à utiliser avec le métaserveur :
 Veuillez indiquer les paramètres supplémentaires que vous souhaitez utiliser avec le métaserveur. Deux paramètres uniquement sont importants :
  --syslog-debug : journalisation via la journalisation du système (syslog) ;
  --redirect     : redirection des clients vers un autre métaserveur.
";
$elem["pioneers-meta-server/arguments"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
