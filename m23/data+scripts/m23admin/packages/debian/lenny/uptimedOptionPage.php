<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("uptimed");

$elem["uptimed/interval"]["type"]="string";
$elem["uptimed/interval"]["description"]="How many seconds should pass between database updates?
 Uptimed will update its database every n seconds so that the uptime
 doesn't get lost in case of a system crash. You can set how frequently
 this will happen (use higher values if you want to avoid disk activity,
 for example on a laptop). 60 seconds should be a reasonable default.
";
$elem["uptimed/interval"]["descriptionde"]="Alle wieviel Sekunden soll die Datenbank geschrieben werden?
 Uptimed schreibt alle n Sekunden seine Datenbank, damit bei einem Absturz die Uptime nicht verlorengeht. Sie können hier einstellen, wie oft dies geschieht (nehmen Sie einen höheren Wert, wenn Sie Diskaktivität vermeiden wollen, z.B. auf einem Laptop). 60 Sekunden sind ein sinnvoller Wert.
";
$elem["uptimed/interval"]["descriptionfr"]="Combien de secondes doivent-elles s'écouler entre deux mises à jour de la base de données ?
 Uptimed mettra sa base de données à jour toutes les n secondes de façon à ce que la durée de fonctionnement ne soit pas perdue lors d'une défaillance générale de votre système. Vous pouvez définir cet intervalle ici (l'utilisation d'une valeur élevée permet d'éviter une activité disque trop importante, pour un portable par exemple) : 60 secondes est un choix raisonnable.
";
$elem["uptimed/interval"]["default"]="60";
$elem["uptimed/maxrecords"]["type"]="string";
$elem["uptimed/maxrecords"]["description"]="How many records should be kept?
 On systems that reboot frequently (such as desktop PCs), you will get a
 fairly large list of uptime records pretty soon. To avoid this, uptimed
 will only keep the n highest uptimes. You may want to limit this to a
 lower value if you want to get emails each time a record is broken or
 reboot your machine often. 10 is a nice value.
";
$elem["uptimed/maxrecords"]["descriptionde"]="Wie viele Rekorde sollen aufgehoben werden?
 Einige Systeme booten relativ häufig neu, zum Beispiel Arbeitsplatzrechner. Auf diesen Systemen wächst die Liste relativ schnell. Um das zu vermeiden, wird Uptimed nur die n höchsten Uptimes behalten. Wenn Sie Mails erhalten wollen, sobald ein Rekord gebrochen wurde, sollten Sie diesen Wert recht niedrig ansetzen, genauso wenn Sie häufig booten. 10 ist ein guter Wert.
";
$elem["uptimed/maxrecords"]["descriptionfr"]="Combien d'enregistrements uptimed doit-il conserver ?
 Sur des systèmes redémarrant fréquemment (comme les ordinateurs de bureau), vous obtiendrez rapidement une liste conséquente d'enregistrements. Afin d'éviter cela, uptimed conservera uniquement les n durées les plus élevées. Vous pourriez abaisser cette valeur si vous désirez recevoir un courriel à chaque fois qu'un record est battu  ou si vous redémarrez souvent votre machine. 10 est une bonne valeur pour débuter.
";
$elem["uptimed/maxrecords"]["default"]="50";
$elem["uptimed/mail/do_mail"]["type"]="select";
$elem["uptimed/mail/do_mail"]["choices"][1]="Never";
$elem["uptimed/mail/do_mail"]["choices"][2]="Record";
$elem["uptimed/mail/do_mail"]["choices"][3]="Milestone";
$elem["uptimed/mail/do_mail"]["choicesde"][1]="Nie";
$elem["uptimed/mail/do_mail"]["choicesde"][2]="Rekorde";
$elem["uptimed/mail/do_mail"]["choicesde"][3]="Meilensteine";
$elem["uptimed/mail/do_mail"]["choicesfr"][1]="Jamais";
$elem["uptimed/mail/do_mail"]["choicesfr"][2]="Record";
$elem["uptimed/mail/do_mail"]["choicesfr"][3]="Jalon";
$elem["uptimed/mail/do_mail"]["description"]="Send mails if a milestone or record is reached?
 Uptimed can be configured to send a mail each time a record is broken or a
 \"milestone\" is reached. You can choose whether you
 .
  - never want to receive these mails
  - want to be notified only when a record is broken
  - would like to know about milestones
  - are interested in both
";
$elem["uptimed/mail/do_mail"]["descriptionde"]="Wann soll Uptimed Mails versenden?
 Uptimed kann optional eine Mail schicken, wenn ein Rekord gebrochen oder ein »Meilenstein« erreicht wurde. Sie können sich aussuchen, ob Sie:
 .
  - niemals Mails erhalten möchten
  - nur für gebrochene Rekorde
  - nur für erreichte Meilensteine
  - für Rekorde und Meilensteine
";
$elem["uptimed/mail/do_mail"]["descriptionfr"]="Envoyez des courriels si un jalon ou un record est atteint ?
 Uptimed peut être configuré pour envoyer un courriel à chaque fois qu'un record est battu ou qu'un jalon (« milestone ») est atteint. Vous pouvez choisir :
 .
  - de ne jamais recevoir ces courriels ;
  - d'être averti uniquement si un record est battu ;
  - d'être averti uniquement lors du passage des jalons ;
  - d'être averti dans les deux cas.
";
$elem["uptimed/mail/do_mail"]["default"]="Never";
$elem["uptimed/mail/address"]["type"]="string";
$elem["uptimed/mail/address"]["description"]="Where should uptimed send its mails to?
 Since you have chosen to be sent emails, you should specify where to send
 these mails. The default \"root@localhost\" makes sort of sense, but if you
 are one of many sysadmins and you are unsure whether the other admins want
 to get these mails, you should probably set this to your real address.
";
$elem["uptimed/mail/address"]["descriptionde"]="An wen soll uptimed seine Mails schicken?
 Da Sie Mails erhalten wollen, sollten Sie nach Möglichkeit auch sagen, wohin diese eMails geschickt werden sollen. Der Standardwert »root@localhost« funktioniert normalerweise recht gut, aber wenn Sie einer von mehreren Admins sind und nicht wissen, ob die anderen auch diese Mails haben wollen, sollten Sie vielleicht Ihre echte Adresse angeben.
";
$elem["uptimed/mail/address"]["descriptionfr"]="À qui les courriels d'uptimed doivent-il être envoyés ?
 Puisque vous avez choisi de recevoir des courriels, vous devez indiquer le destinataire de ces messages. Par défaut « root@localhost » convient, mais si vous n'êtes que l'un des nombreux administrateurs système et que vous n'êtes pas certain que les autres administrateurs veuillent recevoir ces messages, vous devriez indiquer votre adresse électronique réelle.
";
$elem["uptimed/mail/address"]["default"]="root@localhost";
$elem["uptimed/mail/milestones_info"]["type"]="note";
$elem["uptimed/mail/milestones_info"]["description"]="Milestone configuration should be done manually
 While all other configuration options can be set here, the milestones must
 be configured manually in /etc/uptimed.conf. Since you have chosen to
 receive emails for milestones you may probably want to edit that file.
";
$elem["uptimed/mail/milestones_info"]["descriptionde"]="Meilensteine sollten von Hand konfiguriert werden
 Obwohl alles andere hier eingestellt werden kann, müssen die Meilensteine von Hand in /etc/uptimed.conf eingestellt werden. Da Sie bei jedem dieser Meilensteine eine Mail erhalten werden, möchten Sie die Datei wahrscheinlich abändern.
";
$elem["uptimed/mail/milestones_info"]["descriptionfr"]="La configuration des jalons doit être faite manuellement
 Alors que toutes les autres options de configuration peuvent être définies ici, vous devez configurer vous-même les jalons dans /etc/uptimed.conf. Puisque vous avez choisi de recevoir des messages pour les jalons, vous devrez sans doute modifier ce fichier.
";
$elem["uptimed/mail/milestones_info"]["default"]="";
PKG_OptionPageTail2($elem);
?>
