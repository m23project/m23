<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fwanalog");

$elem["fwanalog/language"]["type"]="select";
$elem["fwanalog/language"]["choices"][1]="English";
$elem["fwanalog/language"]["choices"][2]="German";
$elem["fwanalog/language"]["choices"][3]="French";
$elem["fwanalog/language"]["choicesde"][1]="Englisch";
$elem["fwanalog/language"]["choicesde"][2]="Deutsch";
$elem["fwanalog/language"]["choicesde"][3]="Französisch";
$elem["fwanalog/language"]["choicesfr"][1]="anglais";
$elem["fwanalog/language"]["choicesfr"][2]="allemand";
$elem["fwanalog/language"]["choicesfr"][3]="français";
$elem["fwanalog/language"]["description"]="Output language:
 Please select the language you would like the reports to be generated in.
 If you want your own custom language, please look in
 /usr/share/doc/fwanalog/support - there are a few scripts to convert
 analog .lng files to other languages. If you make a custom
 translation, please submit it to the author.
";
$elem["fwanalog/language"]["descriptionde"]="Sprache der Ausgaben:
 Bitte wählen Sie die Sprache aus, in der die Berichte erstellt werden sollen. Wenn Sie gern eine andere Sprache hätten, schauen Sie sich die Dateien im Verzeichnis /usr/share/doc/fwanalog/support an, da sind einige Skripte, die Dateien *.lng von Analog in andere Sprachen umwandeln. Wenn Sie eine eigene Übersetzung erstellen, geben Sie diese bitte an den Autor weiter.
";
$elem["fwanalog/language"]["descriptionfr"]="Langue d'affichage :
 Veuillez choisir la langue qui sera utilisée dans le rapport. Si vous voulez ajouter votre propre langue, veuillez consulter le fichier /usr/share/doc/fwanalog/support. Des scripts permettant la conversion des fichiers .lng d'analog en fichiers .lng pour fwanalog sont fournis. Si vous réalisez une traduction, veuillez la soumettre à l'auteur du paquet.
";
$elem["fwanalog/language"]["default"]="English";
$elem["fwanalog/cron"]["type"]="boolean";
$elem["fwanalog/cron"]["description"]="Do you wish to run fwanalog from cron daily ?
 Enabling this option a daily cron-job will be set up to start fwanalog,
 thereby producing fresh reports every day.
";
$elem["fwanalog/cron"]["descriptionde"]="Soll Fwanalog täglich durch Cron gestartet werden?
 Wenn Sie zustimmen, wird ein täglicher Cronjob eingerichtet, der Fwanalog startet, um jeden Tag neue Berichte zu erstellen.
";
$elem["fwanalog/cron"]["descriptionfr"]="Faut-il lancer fwanalog avec une tâche quotidienne de cron ?
 Si vous choisissez cette option, fwanalog sera lancé quotidiennement par une tâche de cron pour générer un nouveau rapport.
";
$elem["fwanalog/cron"]["default"]="true";
$elem["fwanalog/mailto"]["type"]="string";
$elem["fwanalog/mailto"]["description"]="User who will receive the report via e-mail:
 Enter the email-address of the person who should receive the log created
 by the cron-job. Just enter a blank line, and no mail will be sent.
";
$elem["fwanalog/mailto"]["descriptionde"]="Benutzer, der die Berichte als E-Mail erhalten soll:
 Geben Sie die E-Mail-Adresse desjenigen ein, der das Protokoll des Cronjobs empfangen soll. Lassen Sie das Feld leer, wenn keine E-Mail gesendet werden soll.
";
$elem["fwanalog/mailto"]["descriptionfr"]="Destinataire des rapports par courriel :
 Veuillez indiquer l'adresse électronique du destinataire du rapport créé par la tâche quotidienne. Si cette valeur est vide, aucune courriel ne sera envoyé.
";
$elem["fwanalog/mailto"]["default"]="root";
PKG_OptionPageTail2($elem);
?>
