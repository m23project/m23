<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("golang-go");

$elem["golang-go/dashboard"]["type"]="boolean";
$elem["golang-go/dashboard"]["description"]="Report installation of public packages to Go Dashboard?
 The goinstall program reports the successful installation of the public Go
 packages to godashboard.appspot.com, which increments a count associated
 with the package and the time of its most recent installation. This mechanism
 powers the package list at the Go Dashboard, allowing Go programmers to
 learn about popular packages that might be worth looking at.
 .
 If you choose to participate, each successful
 installation will be reported to the Go Dashboard.
 .
 This choice can be modified by running \"dpkg-reconfigure
 golang-go\".
";
$elem["golang-go/dashboard"]["descriptionde"]="Installation öffentlicher Pakete an das Go Dashboard melden?
 Das Programm Goinstall meldet die erfolgreiche Installation der öffentlichen Go-Pakete an godashboard.appspot.com, das einen Zähler erhöht, der mit dem Paket verbunden ist sowie die Zeit der aktuellsten Installation. Dieser Mechanismus befeuert die Paketliste auf dem Go Dashboard, die es Go-Programmierern ermöglicht, etwas über populäre Pakete zu lernen, die es Wert sind, einen Blick darauf zu werfen.
 .
 Falls Sie auswählen teilzunehmen, wird jede erfolgreiche Installation an das Go Dashboard gemeldet.
 .
 Diese Auswahl kann durch Ausführen von »dpkg-reconfigure golang-go« geändert werden.
";
$elem["golang-go/dashboard"]["descriptionfr"]="Signaler les installations des paquets publics à Go Dashboard?
 Le programme goinstall signale l'installation réussie des paquets publics Go à godashboard.appspot.com, ce qui incrémente un compteur associé au paquet et le moment de son installation la plus récente. Ce mécanisme envoie la liste des paquets à Go Dashboard, ce qui permet aux développeurs Go de connaître les paquets populaires éventuellement intéressants à regarder.
 .
 Si vous choisissez de participer, chaque installation réussie sera signalée à Go Dashboard.
 .
 Ce choix peut être modifié avec la commande  « dpkg-reconfigure golang-go ».
";
$elem["golang-go/dashboard"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
