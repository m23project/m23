<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bitlbee");

$elem["bitlbee/serveport"]["type"]="string";
$elem["bitlbee/serveport"]["description"]="On what TCP port should BitlBee listen for connections?
 BitlBee normally listens on the regular IRC port, 6667. This might not be
 a very good idea when you're running a real IRC daemon as well. 6668 might
 be a good alternative. Leaving this value blank means that BitlBee will not
 be run automatically.
";
$elem["bitlbee/serveport"]["descriptionde"]="An welchem TCP-Port soll BitlBee auf Verbindungen warten?
 BitlBee lauscht normalerweise an dem üblichen IRC-Port 6667. Dies ist aber keine gute Idee, wenn Sie außerdem noch einen richtigen IRC-Dienst betreiben. Das Port 6668 ist eine gute Alternative. Wenn Sie keinen Wert eingeben, wird BitlBee nicht automatisch starten.
";
$elem["bitlbee/serveport"]["descriptionfr"]="Sur quel port TCP BitlBee doit-il être à l'écoute ?
 BitlBee est usuellement à l'écoute sur le port IRC standard : 6667. Cela n'est pas forcément un choix adapté si vous utilisez en même temps un vrai démon IRC. Dans ce cas, choisir 6668 est conseillé. Si vous ne souhaitez pas lancer BitlBee automatiquement, veuillez laissez ce champs vide.
";
$elem["bitlbee/serveport"]["default"]="stillhavetoask";
PKG_OptionPageTail2($elem);
?>
