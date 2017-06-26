<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("distmp3");

$elem["distmp3/start-on-boot"]["type"]="boolean";
$elem["distmp3/start-on-boot"]["description"]="Would you like to start distmp3host at boot time?
 distmp3host, if started at boot time, will accept encoder connections
 until manually stopped or shutdown is initiated.
";
$elem["distmp3/start-on-boot"]["descriptionde"]="Soll distmp3host beim Hochfahren gestartet werden?
 Wenn distmp3host beim Hochfahren gestartet wurde, nimmt er Encoder-Verbindungen an, bis er manuell gestoppt oder der Rechner heruntergefahren wird.
";
$elem["distmp3/start-on-boot"]["descriptionfr"]="Faut-il lancer distmp3host au démarrage du système ?
 S'il est lancé au démarrage du système, distmp3host acceptera les connexions de l'encodeur jusqu'à ce qu'il soit interrompu, manuellement ou par l'arrêt du système.
";
$elem["distmp3/start-on-boot"]["default"]="";
$elem["distmp3/nice-level"]["type"]="string";
$elem["distmp3/nice-level"]["description"]="What nice level should distmp3host use by default?
 distmp3host is meant to be a system service like any other. Hence, it
 should let other services take precedence, and it is suggested to
 'renice' distmp3host when starting it so that other tasks get priority.
 The default of 15 should be adequate for most situations.
 Nice values range from 19 (least priority) to -20 (most priority.)
 .
 If you would not like to renice distmp3, enter a blank line.
";
$elem["distmp3/nice-level"]["descriptionde"]="Welche nice-Stufe soll distmp3host standardmäßig verwenden?
 Distmp3host ist als Systemdienst gedacht, wie jeder andere. Deshalb sollte er auch anderen Diensten den Vortritt lassen und es wird empfohlen, mit 'renice' nach dem Start von distmp3host dafür zu sorgen, dass andere Prozesse zum Zug kommen. Der Standardwert von 15 sollte meistens ausreichen. Nice-Werte reichen von 19 (geringste Priorität) bis -20 (höchste Priorität).
 .
 Wenn Sie 'renice' nicht nutzen wollen, lassen Sie die Zeile leer.
";
$elem["distmp3/nice-level"]["descriptionfr"]="Niveau de politesse par défaut de distmp3host :
 Distmp3host est conçu pour être un service système classique. Par conséquent, il doit laisser les autres services prendre la main s'ils en ont besoin. Il est recommandé de changer la valeur de politesse (« nice ») au démarrage de distmp3host afin que les autres tâches soient prioritaires. La valeur par défaut de 15 est adaptée la plupart du temps. Les valeurs de politesse vont de 19 (priorité minimale) à -20 (priorité maximale).
 .
 Si vous ne souhaitez pas changer la priorité de distmp3host, laissez la ligne vide.
";
$elem["distmp3/nice-level"]["default"]="15";
$elem["distmp3/bad-nice-level"]["type"]="note";
$elem["distmp3/bad-nice-level"]["description"]="Invalid nice value!
 The nice value you specified is not blank, nor is it a valid nice
 value. Nice values range from 19 (least priority) to -20 (most priority.)
 .
 Please try again.
";
$elem["distmp3/bad-nice-level"]["descriptionde"]="Ungültiger nice-Wert!
 Der nice-Wert, den Sie eingegeben haben, ist weder leer noch ein gültiger nice-Wert. Geben Sie eine Zahl zwischen 19 (geringste Priorität) und -20 (höchste Priorität) ein.
 .
 Bitte noch einmal.
";
$elem["distmp3/bad-nice-level"]["descriptionfr"]="Valeur de politesse incorrecte
 La valeur que vous avez entrée pour la politesse n'est pas valable. Elle doit être comprise entre 19 (priorité minimale) et -20 (priorité maximale).
 .
 Veuillez choisir une valeur dans cet intervalle.
";
$elem["distmp3/bad-nice-level"]["default"]="";
PKG_OptionPageTail2($elem);
?>
