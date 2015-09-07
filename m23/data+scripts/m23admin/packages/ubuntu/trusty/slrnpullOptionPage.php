<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slrnpull");

$elem["shared/news/server"]["type"]="string";
$elem["shared/news/server"]["description"]="News server for reading and posting news:
 Enter the fully qualified domain name of the news server (NNTP server) that
 should be used by default for reading and posting news.
";
$elem["shared/news/server"]["descriptionde"]="News-Server zum Lesen und Senden von News:
 Bitte geben Sie den vollständigen Rechnernamen (fully qualified domain name) des News-Servers (NNTP-Server) ein, der standardmäßig zum Lesen und Senden von News benutzt werden soll.
";
$elem["shared/news/server"]["descriptionfr"]="Quel serveur de nouvelles souhaitez-vous utiliser pour lire et poster les nouvelles ?
 Veuillez indiquer le nom de domaine complètement qualifié du serveur de nouvelles (NNTP) que vous souhaitez utiliser pour lire et poster les nouvelles.
";
$elem["shared/news/server"]["default"]="";
$elem["slrnpull/run_from"]["type"]="select";
$elem["slrnpull/run_from"]["choices"][1]="cron job";
$elem["slrnpull/run_from"]["choices"][2]="ip-up";
$elem["slrnpull/run_from"]["choicesde"][1]="Cronjob";
$elem["slrnpull/run_from"]["choicesde"][2]="ip-up";
$elem["slrnpull/run_from"]["choicesfr"][1]="tâche cron";
$elem["slrnpull/run_from"]["choicesfr"][2]="ip-up";
$elem["slrnpull/run_from"]["description"]="When should slrnpull be run?
 Slrnpull needs to run periodically to download news. This can be
 accomplished in a variety of ways.
 .
 A cron job that is run daily can be used. This works well if you have a
 permanent network connection, or if you are using diald or a similar
 program that connects to the network on demand.
 .
 The ip-up script will make slrnpull download news when you connect to the
 network via ppp.
 .
 Or you can choose to handle this manually and run as root the command
 slrnpull -h `cat /etc/news/server` as you like it.
";
$elem["slrnpull/run_from"]["descriptionde"]="Wann soll Slrnpull gestartet werden?
 Slrnpull muss regelmäßig gestartet werden, um News herunterzuladen. Das kann auf verschiedene Weise geschehen.
 .
 Es kann ein täglich laufender Cronjob benutzt werden. Das funktioniert gut, wenn Sie über eine dauerhafte Netzverbindung verfügen oder falls Sie Diald oder ein ähnliches Programm verwenden, das eine Netzverbindung bei Bedarf aufbaut.
 .
 Das Skript »ip-up« kann Slrnpull veranlassen, News herunterzuladen, sobald Sie sich mit dem Netz via PPP verbinden.
 .
 Oder Sie kümmern sich selbst darum und starten als Benutzer Root das Kommando 'slrnpull -h `cat /etc/news/server`' wann immer Sie möchten.
";
$elem["slrnpull/run_from"]["descriptionfr"]="Quand slrnpull doit-il être lancé ?
 Slrnpull a besoin de fonctionner de façon périodique pour télécharger les nouvelles. Cela peut se réaliser de différentes façons.
 .
 On peut utiliser une tâche cron qui sera lancée quotidiennement. Cela fonctionne bien si vous avez une connexion permanente, ou si vous utilisez diald ou un programme du même genre qui se connecte au réseau à la demande.
 .
 Le script ip-up fera télécharger les nouvelles par slrnpull lorsque vous vous connecterez au réseau via ppp.
 .
 Vous pouvez aussi décider de gérer cela vous-même et exécuter en tant que super-utilisateur la commande « slrnpull -h `cat /etc/news/server` ».
";
$elem["slrnpull/run_from"]["default"]="cron job";
PKG_OptionPageTail2($elem);
?>
