<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slrn");

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
$elem["shared/mailname"]["type"]="string";
$elem["shared/mailname"]["description"]="Please enter the mail name of your system:
 The \"mail name\" is the hostname portion of the address to be shown on
 outgoing news and mail messages.
";
$elem["shared/mailname"]["descriptionde"]="Bitte geben Sie den »mail name« Ihres Systems ein:
 Der »mail name« ist der Rechnernamensteil der Adresse, die auf ausgehenden News- und E-Mail-Mitteilungen angegeben ist.
";
$elem["shared/mailname"]["descriptionfr"]="Veuillez indiquer le nom pour le courrier de votre système :
 Le « nom pour le courrier » est la partie correspondant au nom d'hôte de l'adresse qui sera affichée sur les nouvelles envoyées et sur les courriels.
";
$elem["shared/mailname"]["default"]="";
$elem["slrn/getdescs"]["type"]="select";
$elem["slrn/getdescs"]["choices"][1]="cron job";
$elem["slrn/getdescs"]["choices"][2]="ip-up";
$elem["slrn/getdescs"]["choicesde"][1]="Cronjob";
$elem["slrn/getdescs"]["choicesde"][2]="ip-up";
$elem["slrn/getdescs"]["choicesfr"][1]="tâche cron";
$elem["slrn/getdescs"]["choicesfr"][2]="ip-up";
$elem["slrn/getdescs"]["description"]="How should newsgroup descriptions be refreshed?
 Slrn needs to periodically connect to the network to download new
 descriptions of newsgroups. This can be handled in a variety of ways.
 .
 A cron job that is run weekly can be used. This works well if you have a
 permanent network connection, or if you are using diald or a similar
 program that connects to the network on demand.
 .
 The ip-up script will make slrn refresh the descriptions when you connect
 to the network via ppp. The new descriptions will still only be retrieved
 once a week if you choose this method, no matter how often you connect to
 the network.
 .
 Or you can choose to handle this manually and run as root the command
 /usr/sbin/slrn_getdescs every week or so while you're online.
";
$elem["slrn/getdescs"]["descriptionde"]="Wie sollen die Newsgroup-Beschreibungen aktualisiert werden?
 Slrn muss sich regelmäßig mit dem Netzwerk verbinden, um neue Beschreibungen von Newsgroups herunterzuladen. Das kann auf verschiedene Weise geschehen.
 .
 Es kann ein wöchentlich laufender Cronjob benutzt werden. Das funktioniert gut, wenn Sie über eine dauerhafte Netzverbindung verfügen oder falls Sie Diald oder ein ähnliches Programm verwenden, das eine Netzverbindung bei Bedarf aufbaut.
 .
 Das Skript »ip-up« kann Slrn die Beschreibungen beim Verbindungsaufbau mit PPP aktualisieren lassen. Die neuen Beschreibungen werden aber nur einmal pro Woche geholt, falls Sie diese Methode wählen, unabhängig davon, wie oft Sie sich einwählen.
 .
 Oder Sie kümmern sich selbst darum und starten als Benutzer Root das Kommando '/usr/sbin/slrn_getdescs' z. B. jede Woche, wenn Sie online sind.
";
$elem["slrn/getdescs"]["descriptionfr"]="Comment les descriptions des forums doivent-elles être rechargées ?
 Slrn a besoin de se connecter périodiquement sur le réseau pour télécharger les nouvelles descriptions des forums. Cela peut se réaliser de différentes façons.
 .
 On peut utiliser une tâche cron qui sera lancée chaque semaine. Cela fonctionne bien si vous avez une connexion permanente, ou si vous utilisez diald ou un programme apparenté qui se connecte au réseau à la demande.
 .
 Le script ip-up fera recharger par slrn les descriptions lorsque vous vous connecterez au réseau via ppp. Les nouvelles descriptions ne seront rapatriées qu'une fois par semaine si vous optez pour cette méthode, peu importe la fréquence de vos connexions.
 .
 Vous pouvez aussi décider de gérer ceci vous-même et exécuter régulièrement en tant que super-utilisateur la commande « /usr/sbin/slrn_getdescs » lorsque vous êtes connecté.
";
$elem["slrn/getdescs"]["default"]="cron job";
$elem["slrn/getdescs_now"]["type"]="boolean";
$elem["slrn/getdescs_now"]["description"]="Download newsgroup descriptions now?
 This appears to be a new install of slrn; no newsgroup descriptions have
 been downloaded so far. If you are online now, you should download the
 newsgroup descriptions. (It will take a few minutes, depending on the speed
 of your network connection.)
";
$elem["slrn/getdescs_now"]["descriptionde"]="Newsgroup-Beschreibungen jetzt herunterladen?
 Dies scheint eine Neuinstallation von Slrn zu sein; es wurden bisher keine Newsgroup-Beschreibungen heruntergeladen. Falls Sie gerade online sind, sollen die Newsgroup-Beschreibungen jetzt heruntergeladen werden? (Das kann einige Minuten dauern, abhängig von der Geschwindigkeit der Verbindung.)
";
$elem["slrn/getdescs_now"]["descriptionfr"]="Télécharger les descriptions des forums maintenant ?
 Il semble qu'il s'agisse d'une nouvelle installation de slrn ; aucune description de forum n'a encore été téléchargée. Si vous êtes actuellement connecté, vous devriez télécharger les descriptions des forums. Cette opération prendra plusieurs minutes selon la vitesse de votre connexion.
";
$elem["slrn/getdescs_now"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
