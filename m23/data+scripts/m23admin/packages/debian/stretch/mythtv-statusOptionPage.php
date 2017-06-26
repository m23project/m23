<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythtv-status");

$elem["mythtv-status/host"]["type"]="string";
$elem["mythtv-status/host"]["description"]="MythTV backend to check:
 The MythTV backend to check, you only need to change this if you want to check
 a different host.
";
$elem["mythtv-status/host"]["descriptionde"]="Zu prüfendes MythTV-Backend:
 Das zu prüfende MythTV-Backend. Sie müssen dies nur ändern, falls Sie einen anderen Rechner prüfen wollen.
";
$elem["mythtv-status/host"]["descriptionfr"]="Système MythTV à examiner :
 Le système MythTV à examiner. Vous n'avez à changer la valeur par défaut que si vous désirer examiner un autre hôte.
";
$elem["mythtv-status/host"]["default"]="localhost";
$elem["mythtv-status/enable"]["type"]="boolean";
$elem["mythtv-status/enable"]["description"]="Update the system MOTD?
 Whether the Message of the Day should be updated on system boot and on a
 regular basis.
 .
 To adjust how often the MOTD is updated, edit /etc/cron.d/mythtv-status.
";
$elem["mythtv-status/enable"]["descriptionde"]="Die MOTD des Systems aktualisieren?
 Entscheiden Sie, ob die Nachricht des Tages (»Message of the Day«) beim Systemstart und auf regelmäßiger Basis aktualisiert werden soll.
 .
 Bearbeiten Sie die Datei /etc/cron.d/mythtv-status, um einzustellen, wie oft die MOTD aktualisiert werden soll.
";
$elem["mythtv-status/enable"]["descriptionfr"]="Mettre à jour le MOTD du système ?
 Mise à jour du message du jour du système lors du démarrage et sur une base régulière.
 .
 Pour changer la fréquence de mise à jour du message du jour, modifier le fichier /etc/cron.d/mythtv-status.
";
$elem["mythtv-status/enable"]["default"]="true";
$elem["mythtv-status/email"]["type"]="string";
$elem["mythtv-status/email"]["description"]="Send email status to:
 Status emails can be sent on a daily basis.
 .
 By default an email is only sent if there are alerts.  You must have
 the MythTV Perl API installed for conflict alerts to be generated.
 .
 To disable set the email address to \"none\".  To specify multiple email
 addresses, seperate them with a comma.
";
$elem["mythtv-status/email"]["descriptionde"]="Verschicke E-Mail-Status an:
 Es können tägliche Status-E-Mails versendet werden.
 .
 Standardmäßig wird nur bei Störungen eine E-Mail versandt. Damit bei Konflikten Warnungen erzeugt werden, müssen Sie das MythTV-Perl-API installiert haben.
 .
 Zum Deaktivieren setzen Sie die E-Mail-Adresse auf »none«. Mehrere E-Mail-Adressen werden durch Kommata getrennt.
";
$elem["mythtv-status/email"]["descriptionfr"]="Envoyer le status à :
 Un courriel de status peut être envoyé quotidiennement.
 .
 Un message n'est envoyé que s'il y a un conflit dans l'horaire. Le module Perl MythTV doit être installé pour utiliser cette fonction.
 .
 Pour désactiver cette fonction, entrez l'adresse \"none\". Pour spécifiez plus d'une adresse, séparez-les par des virgules.
";
$elem["mythtv-status/email"]["default"]="none";
PKG_OptionPageTail2($elem);
?>
