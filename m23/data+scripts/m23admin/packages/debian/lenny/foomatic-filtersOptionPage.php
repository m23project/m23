<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("foomatic-filters");

$elem["foomatic-filters/filter_debug"]["type"]="boolean";
$elem["foomatic-filters/filter_debug"]["description"]="Enable logging debug output into a log file (INSECURE)?
 If you choose this option, the log file will be named /tmp/foomatic-rip.log.
 .
 This option is a potential security issue and should not be used
 in production. However, if you are having trouble printing, you should
 enable it and include the log file in bug reports.
";
$elem["foomatic-filters/filter_debug"]["descriptionde"]="Debug-Ausgaben in eine Protokolldatei schreiben (UNSICHER)?
 Wenn Sie hier zustimmen, wird die Protokolldatei /tmp/foomatic-rip.log heißen.
 .
 Diese Auswahl ist eine mögliche Sicherheitslücke und sollte nicht in Produktivumgebungen benutzt werden. Falls Sie Probleme beim Drucken haben, sollten Sie sie dennoch einschalten und die Protokolldatei Ihrem Fehlerbericht beifügen.
";
$elem["foomatic-filters/filter_debug"]["descriptionfr"]="Faut-il enregistrer les informations de débogage dans un fichier de journalisation (DANGEREUX) ?
 Si vous choisissez cette option, un fichier appelé /tmp/foomatic-rip.log sera utilisé pour enregistrer les informations de débogage.
 .
 ATTENTION : ce fichier de journalisation pose un problème de sécurité et ne devrait pas être utilisé sur un serveur de production. Cependant, si vous avez des difficultés pour imprimer, vous devriez activer cette option et inclure ce fichier dans les rapports de bogue.
";
$elem["foomatic-filters/filter_debug"]["default"]="false";
$elem["foomatic-filters/textfilter"]["type"]="select";
$elem["foomatic-filters/textfilter"]["choices"][1]="Automagic";
$elem["foomatic-filters/textfilter"]["choices"][2]="a2ps";
$elem["foomatic-filters/textfilter"]["choices"][3]="mpage";
$elem["foomatic-filters/textfilter"]["choices"][4]="enscript";
$elem["foomatic-filters/textfilter"]["choicesde"][1]="Automatisch";
$elem["foomatic-filters/textfilter"]["choicesde"][2]="a2ps";
$elem["foomatic-filters/textfilter"]["choicesde"][3]="mpage";
$elem["foomatic-filters/textfilter"]["choicesde"][4]="enscript";
$elem["foomatic-filters/textfilter"]["choicesfr"][1]="automatique";
$elem["foomatic-filters/textfilter"]["choicesfr"][2]="a2ps";
$elem["foomatic-filters/textfilter"]["choicesfr"][3]="mpage";
$elem["foomatic-filters/textfilter"]["choicesfr"][4]="enscript";
$elem["foomatic-filters/textfilter"]["description"]="Command for converting text files to PostScript:
 If you select 'Automagic', Foomatic will search for one of a2ps,
 mpage, and enscript (in that order) each time the filter script is executed.
 .
 Please make sure that the selected command is actually available; otherwise
 print jobs may get lost.
 .
 This setting is ignored when foomatic-filters is used with CUPS;
 instead, the texttops program included in the cupsys package is
 always used to convert jobs submitted as plain text to PostScript for
 printing to raster devices.
";
$elem["foomatic-filters/textfilter"]["descriptionde"]="Kommando für die Umwandlung von Textdateien in PostScript:
 Falls Sie »Automatisch« auswählen, sucht Foomatic bei jedem Aufruf des Filterskripts eines der Programme a2ps, mpage und enscript (in dieser Reihenfolge).
 .
 Stellen Sie sicher, dass das ausgewählte Kommando verfügbar ist, sonst könnten Druckaufträge verloren gehen.
 .
 Diese Einstellung hat keine Wirkung, wenn Foomatic-filters mit CUPS eingesetzt wird; statt dessen wandelt das im Paket Cupsys enthaltene Programm texttops Druckaufträge von Klartext in PostScript um, damit sie mit rasterbasierten Geräten ausgedruckt werden können.
";
$elem["foomatic-filters/textfilter"]["descriptionfr"]="Commande de conversion des fichiers texte en PostScript :
 Si vous choisissez « automatique », l'un des programmes a2ps, mpage ou enscript sera recherché, dans cet ordre, à chaque exécution du filtre.
 .
 Veuillez vérifier que la commande choisie est réellement disponible, sinon des demandes d'impression peuvent être perdues.
 .
 Avec CUPS, ce réglage sera ignoré. Le programme texttops, inclus dans le paquet cupsys, sera utilisé à la place : il convertit les travaux soumis en format texte brut au format PostScript, pour utilisation avec les périphériques « raster ».
";
$elem["foomatic-filters/textfilter"]["default"]="Automagic";
$elem["foomatic-filters/custom_textfilter"]["type"]="string";
$elem["foomatic-filters/custom_textfilter"]["description"]="Command to convert standard input to PostScript:
 Please enter the full command line of a command that converts text from
 standard input to PostScript on standard output.
 .
 Please note that entering an invalid command line here may result in lost
 print jobs.
";
$elem["foomatic-filters/custom_textfilter"]["descriptionde"]="Kommando für Umwandlung von der Standardeingabe in PostScript:
 Bitte geben Sie die vollständige Kommandozeile es Befehls ein, der Text von der Standardeingabe einliest und als PostScript auf der Standardausgabe ausgibt.
 .
 Bitte beachten Sie, dass ein ungültiges Kommando zum Verlust von Druckaufträgen führen kann.
";
$elem["foomatic-filters/custom_textfilter"]["descriptionfr"]="Commande de conversion de l'entrée standard en PostScript :
 Veuillez indiquer la ligne de commande complète qui convertira des données texte vers l'entrée standard en données PostScript sur la sortie standard.
 .
 Veuillez noter qu'une commande invalide peut entraîner la perte des demandes d'impression.
";
$elem["foomatic-filters/custom_textfilter"]["default"]="";
$elem["foomatic-filters/ps_accounting"]["type"]="boolean";
$elem["foomatic-filters/ps_accounting"]["description"]="Enable PostScript accounting for CUPS?
 You should choose this option if you want to insert PostScript code
 for accounting into each print job. This is currently only useful
 with CUPS.
 .
 When used with generic PostScript printers (and under certain
 conditions with other printers) this causes an extra page to be
 printed after each job.
";
$elem["foomatic-filters/ps_accounting"]["descriptionde"]="PostScript-Abrechnung (accounting) für CUPS einschalten?
 Sie sollten hier zustimmen, wenn Sie PostScript-Kommandos für die Abrechnung in jeden Druckauftrag einbauen lassen wollen. Das ist derzeit nur mit CUPS sinnvoll.
 .
 Beim Einsatz von gewöhnlichen PostScript-Druckern (und manchmal auch bei anderen Druckern), wird hierdurch nach jedem Druckauftrag eine zusätzliche Seite ausgedruckt.
";
$elem["foomatic-filters/ps_accounting"]["descriptionfr"]="Faut-il activer la comptabilité PostScript pour CUPS ?
 Vous devriez choisir cette option pour insérer du code PostScript de comptabilité dans chaque demande d'impression. Cette fonctionnalité n'est utile qu'avec CUPS.
 .
 Lorsque cette option est utilisée avec des imprimantes PostScript génériques (et, dans certaines conditions, avec d'autres imprimantes), elle provoque l'impression d'une page supplémentaire après chaque impression.
";
$elem["foomatic-filters/ps_accounting"]["default"]="false";
$elem["foomatic-filters/spooler"]["type"]="select";
$elem["foomatic-filters/spooler"]["choices"][1]="cups";
$elem["foomatic-filters/spooler"]["choices"][2]="lpd";
$elem["foomatic-filters/spooler"]["choices"][3]="lprng";
$elem["foomatic-filters/spooler"]["choices"][4]="pdq";
$elem["foomatic-filters/spooler"]["choices"][5]="ppr";
$elem["foomatic-filters/spooler"]["description"]="Printer spooler backend for Foomatic:
 Foomatic normally requires a printer spooler (like CUPS or LPRng) to
 handle communication with the printer and manage print jobs. If
 no spooler is installed, you can use the 'direct' backend, but
 this is only recommended for single-user systems.
 .
 The installation process may have already detected the correct
 spooler; however, if this is the initial installation of this system,
 or if more than one spooler is installed,
 the detected spooler may be incorrect.
";
$elem["foomatic-filters/spooler"]["descriptionde"]="Druckerwarteschlange für Foomatic:
 Foomatic benötigt normalerweise eine Druckerwarteschlange (wie CUPS oder LPRng) für die Übertragung zum Drucker und die Verwaltung der Druckaufträge. Wenn kein Druckdienst installiert ist, können Sie die »direct«-Anbindung nutzen, aber das wird nur für Einzelbenutzersysteme empfohlen.
 .
 Während der Installation sollte schon der richtige Druckdienst erkannt worden sein. Bei der Erstinstallation dieses Systems oder falls mehr als ein Druckdienst installiert ist, könnte die Erkennung aber fehlerhaft sein.
";
$elem["foomatic-filters/spooler"]["descriptionfr"]="Gestionnaire d'impression interfacé avec Foomatic :
 Il est usuellement nécessaire d'utiliser un gestionnaire d'impression tel que CUPS ou LPRng pour gérer la communication avec l'imprimante et les travaux d'impression. Si aucun gestionnaire n'est installé, vous pouvez utiliser le choix « direct » qui n'est recommandé que pour des systèmes mono-utilisateur.
 .
 La procédure d'installation a probablement détecté le gestionnaire approprié. Cependant, s'il s'agit de votre première installation de ce système ou si plus d'un gestionnaire est installé, celui qui est détecté n'est peut-être pas le bon.
";
$elem["foomatic-filters/spooler"]["default"]="direct";
$elem["foomatic-filters/config_parsed"]["type"]="boolean";
$elem["foomatic-filters/config_parsed"]["description"]="(for internal use only)
";
$elem["foomatic-filters/config_parsed"]["descriptionde"]="";
$elem["foomatic-filters/config_parsed"]["descriptionfr"]="";
$elem["foomatic-filters/config_parsed"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
