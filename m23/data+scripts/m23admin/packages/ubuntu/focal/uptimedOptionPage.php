<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("uptimed");

$elem["uptimed/interval"]["type"]="string";
$elem["uptimed/interval"]["description"]="Delay between database updates (seconds):
 Uptimed will update its database regularly so that the uptime
 doesn't get lost in case of a system crash. You can set how frequently
 this will happen (use higher values if you want to avoid disk activity,
 for instance on a laptop).
";
$elem["uptimed/interval"]["descriptionde"]="Verzögerung zwischen Datenbank-Aktualisierungen (Sekunden):
 Uptimed wird regelmäßig seine Datenbank aktualisieren, damit bei einem Systemabsturz die Uptime nicht verlorengeht. Sie können hier einstellen, wie oft dies geschieht (nehmen Sie einen höheren Wert, wenn Sie Festplattenaktivität vermeiden wollen, z.B. auf einem Laptop).
";
$elem["uptimed/interval"]["descriptionfr"]="Délai (en secondes) entre deux mises à jour de la base de données :
 Uptimed mettra sa base de données à jour régulièrement de façon à ce que la durée de fonctionnement ne soit pas perdue lors d'une défaillance générale de votre système. Vous pouvez définir cet intervalle ici (l'utilisation d'une valeur élevée permet d'éviter une activité disque trop importante, pour un portable par exemple).
";
$elem["uptimed/interval"]["default"]="3600";
$elem["uptimed/maxrecords"]["type"]="string";
$elem["uptimed/maxrecords"]["description"]="Number of records that should be kept:
 Uptimed can limit the number of records to be kept to the highest n,
 to keep an unlimited number of records set this value to 0
 .
 Be aware that uptime data will be lost if the limit has been reached and/or the number records is reduced.
";
$elem["uptimed/maxrecords"]["descriptionde"]="Anzahl der Aufzeichnungen, die gespeichert werden sollen:
 Uptimed kann die Anzahl der gespeicherten Aufzeichnungen auf den Wert n begrenzen. Wenn Sie hier Null einsetzen, wird die Anzahl der Aufzeichungen nicht begrenzt.
 .
 Bedenken Sie, dass Uptime-Daten verloren gehen, wenn das Limit erreicht oder die Anzahl der Aufzeichnungen reduziert wird.
";
$elem["uptimed/maxrecords"]["descriptionfr"]="Nombre d'enregistrements à conserver :
 Uptimed peut limiter le nombre d'enregistrements à conserver au plus grand n, pour conserver un nombre illimité d'enregistrements, réglez cette valeur à 0
 .
 Veuillez noter que les données de disponibilité (« uptime ») seront perdues si la limite a été atteinte et/ou le nombre d'enregistrements réduit.
";
$elem["uptimed/maxrecords"]["default"]="500";
$elem["uptimed/mail/do_mail"]["type"]="select";
$elem["uptimed/mail/do_mail"]["choices"][1]="Never";
$elem["uptimed/mail/do_mail"]["choices"][2]="Record";
$elem["uptimed/mail/do_mail"]["choices"][3]="Milestone";
$elem["uptimed/mail/do_mail"]["choicesde"][1]="Nie";
$elem["uptimed/mail/do_mail"]["choicesde"][2]="Aufzeichnung";
$elem["uptimed/mail/do_mail"]["choicesde"][3]="Meilenstein";
$elem["uptimed/mail/do_mail"]["choicesfr"][1]="Jamais";
$elem["uptimed/mail/do_mail"]["choicesfr"][2]="Record";
$elem["uptimed/mail/do_mail"]["choicesfr"][3]="Jalon";
$elem["uptimed/mail/do_mail"]["description"]="Send mails if a milestone or record is reached:
 Uptimed can be configured to send a mail each time a record is broken or a
 \"milestone\" is reached. You can choose whether you:
 .
  * never want to receive these mails;
  * want to be notified only when a record is broken;
  * would like to know about milestones;
  * are interested in both.
";
$elem["uptimed/mail/do_mail"]["descriptionde"]="Mails senden bei Erreichen eines Meilensteins oder bei beschädigter Aufzeichnung:
 Uptimed kann konfiguriert werden, eine Mail zu schicken, wenn eine Aufzeichnung beschädigt ist oder ein »Meilenstein« erreicht wurde. Sie können wählen, ob Sie:
 .
  * niemals Mails erhalten möchten;
  * nur bei beschädigten Aufzeichnungen benachrichtigt werden möchten;
  * nur über erreichte Meilensteine informiert werden möchten;
  * an beidem interessiert sind.
";
$elem["uptimed/mail/do_mail"]["descriptionfr"]="Envoi de courriels si un jalon ou un record est atteint :
 Uptimed peut être configuré pour envoyer un courriel à chaque fois qu'un record est battu ou qu'un jalon (« milestone ») est atteint. Vous pouvez choisir :
 .
  - de ne jamais recevoir ces courriels ;
  - d'être averti uniquement si un record est battu ;
  - d'être averti uniquement lors du passage des jalons ;
  - d'être averti dans les deux cas.
";
$elem["uptimed/mail/do_mail"]["default"]="Never";
$elem["uptimed/mail/address"]["type"]="string";
$elem["uptimed/mail/address"]["description"]="Uptimed email recipient:
 Since you have chosen to be sent emails, you should specify where to send
 these mails.
";
$elem["uptimed/mail/address"]["descriptionde"]="Uptimed E-Mail-Empfänger:
 Aufgrund Ihrer Auswahl zum Versand von E-Mails sollten Sie angeben, wohin diese Mails geschickt werden sollen.
";
$elem["uptimed/mail/address"]["descriptionfr"]="Destinataire des courriels d'uptimed :
 Puisque vous avez choisi de recevoir des courriels, vous devez indiquer le destinataire de ces messages.
";
$elem["uptimed/mail/address"]["default"]="root";
$elem["uptimed/mail/milestones_info"]["type"]="note";
$elem["uptimed/mail/milestones_info"]["description"]="Milestone configuration must be done manually
 The milestones must
 be configured manually in /etc/uptimed.conf. Since you have chosen to
 receive emails for milestones you probably want to modify that file.
";
$elem["uptimed/mail/milestones_info"]["descriptionde"]="Meilenstein-Konfiguration muss von Hand erledigt werden
 Die Meilensteine müssen von Hand in /etc/uptimed.conf konfiguriert werden. Aufgrund Ihrer Auswahl zum Versand von E-Mails bei Erreichen von Meilensteinen möchten Sie diese Datei möglicherweise anpassen.
";
$elem["uptimed/mail/milestones_info"]["descriptionfr"]="Configuration des jalons à faire manuellement
 Vous devez configurer vous-même les jalons dans /etc/uptimed.conf. Puisque vous avez choisi de recevoir des messages pour les jalons, vous devrez sans doute modifier ce fichier.
";
$elem["uptimed/mail/milestones_info"]["default"]="";
PKG_OptionPageTail2($elem);
?>
