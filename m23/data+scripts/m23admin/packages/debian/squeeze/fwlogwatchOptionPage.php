<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fwlogwatch");

$elem["fwlogwatch/realtime"]["type"]="boolean";
$elem["fwlogwatch/realtime"]["description"]="Would you like fwlogwatch as a daemon (realtime mode)?
 Running fwlogwatch as a daemon will let fwlogwatch act (i.e. adding new
 firewall rules) against active 'attacks', or warn you (i.e. sending email)
 about them. It could also run a web server to access fwlogwatch's current
 status.
";
$elem["fwlogwatch/realtime"]["descriptionde"]="Möchten Sie fwlogwatch als Daemon starten (Echtzeit-Modus)?
 Wenn fwlogwatch als Daemon läuft, dann kann er gegen momentane Angriffe vorgehen (d.h. neue Firewall-Regeln hinzufügen), oder Sie vor diesen warnen (d.h. Ihnen eine E-Mail zuschicken). Es könnte sogar ein Web-Server laufen, über den Sie den aktuellen Status von fwlogwatch in Erfahrung bringen können.
";
$elem["fwlogwatch/realtime"]["descriptionfr"]="Utiliser fwlogwatch en tant que démon (exécution en temps réel) ?
 L'exécution de fwlogwatch en tant que démon lui permet d'agir contre d'éventuelles attaques (en ajoutant une règle au coupe-feu), ou de vous prévenir de celles-ci (en envoyant un courriel). Il peut aussi fournir une interface web afin d'y afficher son état courant.
";
$elem["fwlogwatch/realtime"]["default"]="false";
$elem["fwlogwatch/respond"]["type"]="select";
$elem["fwlogwatch/respond"]["choices"][1]="no";
$elem["fwlogwatch/respond"]["choices"][2]="yes (iptables)";
$elem["fwlogwatch/respond"]["choices"][3]="yes (ipchains)";
$elem["fwlogwatch/respond"]["choicesde"][1]="Nein";
$elem["fwlogwatch/respond"]["choicesde"][2]="Ja (iptables)";
$elem["fwlogwatch/respond"]["choicesde"][3]="Ja (ipchains)";
$elem["fwlogwatch/respond"]["choicesfr"][1]="non";
$elem["fwlogwatch/respond"]["choicesfr"][2]="oui (iptables)";
$elem["fwlogwatch/respond"]["choicesfr"][3]="oui (ipchains)";
$elem["fwlogwatch/respond"]["description"]="Add new firewall rules (or take another action) in case of alert?
 Don't use this option unless you know what you're doing. Doing so could
 expose your system to a Denial of Service attack. i.e. spoofed packets
 could be made to look like coming from your DNS. Adding a rule to block
 packets from your DNS won't be good ;-)
 .
 In case of choosing 'other', you'll have to edit
 '/etc/fwlogwatch/fwlw_respond' to meet your requirements.
";
$elem["fwlogwatch/respond"]["descriptionde"]="Bei Alarm neue Firewall-Regeln hinzufügen (oder andere Aktion durchführen)?
 Nutzen Sie diese Möglichkeit nicht, wenn Sie nicht wissen, was Sie tun. Stimmen Sie zu, dann könnten Sie dadurch Ihr System der Gefahr einer Denial-of-Service-Attacke aussetzen. D.h. gefälschte Pakete könnten so erstellt werden, dass sie so aussehen, als kämen sie von Ihrem DNS. Eine Regel hinzuzufügen, die Pakete Ihres DNS sperrt, wäre nicht gut ;-)
 .
 Falls Sie »anderes« wählen, werden Sie die Datei »/etc/fwlogwatch/fwlw_respond« so bearbeiten müssen, dass sie Ihren Anforderungen entspricht.
";
$elem["fwlogwatch/respond"]["descriptionfr"]="Ajout d'une règle au coupe-feu (ou autre action) en cas d'alerte ?
 Ne choisissez cette option que si vous savez ce que vous faites. Vous risquez d'exposer votre système à des attaques par déni de service, par exemple l'envoi de paquets modifiés pour donner l'impression qu'ils viennent de votre serveur de noms. Cela aurait pour effet l'ajout d'une règle bloquant votre propre serveur de noms.
 .
 Si vous choisissez « autre », il vous faudra modifier vous même le fichier '/etc/fwlogwatch/fwlw_respond' selon vos besoins.
";
$elem["fwlogwatch/respond"]["default"]="no";
$elem["fwlogwatch/notify"]["type"]="select";
$elem["fwlogwatch/notify"]["choices"][1]="no";
$elem["fwlogwatch/notify"]["choices"][2]="yes (mail)";
$elem["fwlogwatch/notify"]["choicesde"][1]="Nein";
$elem["fwlogwatch/notify"]["choicesde"][2]="Ja (E-Mail)";
$elem["fwlogwatch/notify"]["choicesfr"][1]="non";
$elem["fwlogwatch/notify"]["choicesfr"][2]="oui (courriel)";
$elem["fwlogwatch/notify"]["description"]="Send alerts by mail or other ways?
 This option will make fwlogwatch send you alerts by email or other ways.
 You may wish to adjust 'alert_threshold' in
 '/etc/fwlogwatch/fwlogwatch.config' to avoid getting too many warnings.
 .
 In case of choosing 'other', you'll have to edit
 '/etc/fwlogwatch/fwlw_notify' to meet your requirements.
";
$elem["fwlogwatch/notify"]["descriptionde"]="Sollen Alarmmeldungen per E-Mail oder auf anderem Wege versandt werden?
 Diese Option veranlasst fwlogwatch Alarmmeldungen per E-Mail oder auf anderem Wege zu versenden. Eventuell möchten Sie in der Datei »/etc/fwlogwatch/fwlogwatch.config« den Wert für »alert_threshold« anpassen, um nicht zu viele Warnungen zu erhalten.
 .
 Falls Sie »anderes« wählen, werden Sie die Datei »/etc/fwlogwatch/fwlw_notify« so bearbeiten müssen, dass sie Ihren Anforderungen entspricht.
";
$elem["fwlogwatch/notify"]["descriptionfr"]="Envoi d'alertes par courriel ou par une autre méthode ?
 Cette option active l'envoi par fwlogwatch des alertes par courriel ou autres méthodes. Le réglage du seuil d'alerte (« alert_threshold ») se fait dans le fichier '/etc/fwlogwatch/fwlogwatch.config' pour limiter le nombre d'alertes envoyées.
 .
 Si vous choisissez « autre », il vous faudra modifier le fichier '/etc/fwlogwatch/fwlw_notify' pour l'adapter à vos besoins.
";
$elem["fwlogwatch/notify"]["default"]="no";
$elem["fwlogwatch/email"]["type"]="string";
$elem["fwlogwatch/email"]["description"]="Email address to send the alerts to.
";
$elem["fwlogwatch/email"]["descriptionde"]="E-Mail-Adresse, an die die Alarmmeldungen geschickt werden sollen.
";
$elem["fwlogwatch/email"]["descriptionfr"]="Adresse électronique pour l'envoi des alertes :
";
$elem["fwlogwatch/email"]["default"]="root@localhost";
$elem["fwlogwatch/cron_email"]["type"]="string";
$elem["fwlogwatch/cron_email"]["description"]="Email address to send daily reports on firewall events.
 If you want a daily cron job to send you an email with a report of the
 day's log entries, just type the address where you want the email to be
 sent.
 .
 If you don't want these emails, just set the field to 'none' (without
 quotes).
";
$elem["fwlogwatch/cron_email"]["descriptionde"]="E-Mail-Adresse, an die tägliche Berichte über Firewall-Vorkommnisse geschickt werden sollen.
 Wenn Sie wollen, dass ein täglich laufender Cron-Job Ihnen eine E-Mail mit einem Bericht über die Log-Einträge des Tages zuschickt, dann geben Sie hier die Adresse an, an die diese E-Mail gesendet werden soll.
 .
 Wenn Sie diese E-Mails nicht wollen, geben Sie bitte »keine« ein (ohne Anführungszeichen).
";
$elem["fwlogwatch/cron_email"]["descriptionfr"]="Adresse électronique d'envoi des rapports journaliers des événements du coupe-feu :
 Pour qu'une tâche périodique de cron envoie, par courriel, le rapport journalier des événements enregistrés, vous devez indiquer l'adresse de destination.
 .
 Pour ne pas recevoir de courriel, indiquer « none » (sans les guillemets).
";
$elem["fwlogwatch/cron_email"]["default"]="none";
$elem["fwlogwatch/cron_parameters"]["type"]="string";
$elem["fwlogwatch/cron_parameters"]["description"]="What fwlogwatch parameters do you want to use in the cron job?
 If you do not know what these mean, it's safe to leave the defaults.
";
$elem["fwlogwatch/cron_parameters"]["descriptionde"]="Welche fwlogwatch-Optionen sollen für den Cron-Job verwendet werden?
 Wenn Sie nicht wissen, was diese bedeuten, dann ist es am sichersten, wenn Sie die vorgegebenen Optionen so belassen.
";
$elem["fwlogwatch/cron_parameters"]["descriptionfr"]="Paramètres pour fwlogwatch dans la tâche périodoque :
 En cas de doute, laissez les paramètres par défaut.
";
$elem["fwlogwatch/cron_parameters"]["default"]="-p -d -O ta -t -e -l 1d";
$elem["fwlogwatch/buildconfig"]["type"]="boolean";
$elem["fwlogwatch/buildconfig"]["description"]="Rebuild configuration file from debconf's values?
";
$elem["fwlogwatch/buildconfig"]["descriptionde"]="Konfigurationsdatei aus den debconf-Werten neu erstellen?
";
$elem["fwlogwatch/buildconfig"]["descriptionfr"]="Recréer le fichier de configuration avec les paramètres de debconf ?
";
$elem["fwlogwatch/buildconfig"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
