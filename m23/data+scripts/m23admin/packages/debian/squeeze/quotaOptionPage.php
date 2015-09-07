<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("quota");

$elem["quota/run_warnquota"]["type"]="boolean";
$elem["quota/run_warnquota"]["description"]="Send daily reminders to users over quota?
 Enable this option if you want the warnquota utility to be run daily to
 alert users when they are over quota.
";
$elem["quota/run_warnquota"]["descriptionde"]="Schicke eine tägliche Erinnerung an Benutzer über Quota?
 Mit Aktivieren dieser Option läuft das Warnquota-Programm täglich, um Benutzer zu alarmieren, dass sie über Quota liegen.
";
$elem["quota/run_warnquota"]["descriptionfr"]="Faut-il envoyer des rappels quotidiens aux utilisateurs qui dépassent leurs quota ?
 Activez cette option si vous souhaitez que l'utilitaire « warnquota » soit lancé quotidiennement afin d'avertir les utilisateurs qui ont dépassé leurs quota.
";
$elem["quota/run_warnquota"]["default"]="false";
$elem["quota/supportphone"]["type"]="string";
$elem["quota/supportphone"]["description"]="Phone support number of the admin:
 Enter the phone number a user can call if he needs assistance with his
 \"over quota\" emails. You do not have to enter anything here if you specify
 a signature later.
";
$elem["quota/supportphone"]["descriptionde"]="Telefonnummer des Administrators:
 Bitte geben Sie eine Telefonnummer ein, die ein Benutzer anrufen kann, falls er Hilfe zu seiner »Über Quota«-E-Mail benötigt. Wenn Sie später eine Signatur angeben, können Sie diesen Text leer lassen.
";
$elem["quota/supportphone"]["descriptionfr"]="Numéro de l'assistance téléphonique :
 Veuillez entrer le numéro de téléphone que peut composer un utilisateur qui a besoin d'aide quand il reçoit un courriel pour dépassement de quota. N'indiquez rien ici si vous prévoyez de l'indiquer dans une signature.
";
$elem["quota/supportphone"]["default"]="";
$elem["quota/supportemail"]["type"]="string";
$elem["quota/supportemail"]["description"]="Support email of the admin:
 Enter the email address a user can write to if he needs assistance with
 his \"over quota\" emails. You do not have to enter anything here if you
 specify a signature later.
";
$elem["quota/supportemail"]["descriptionde"]="E-Mail-Adresse des Administrators:
 Bitte geben Sie eine E-Mail-Adresse ein, die ein Benutzer anschreiben kann, falls er Hilfe zu seiner »Über Quota«-E-Mail benötigt. Wenn Sie später eine Signatur angeben, können Sie diesen Text leer lassen.
";
$elem["quota/supportemail"]["descriptionfr"]="Adresse électronique de l'assistance :
 Veuillez entrer l'adresse électronique où écrire lorsqu'un utilisateur a besoin d'aide à la réception d'un courriel pour dépassement de quota. N'indiquez rien ici si vous prévoyez de l'indiquer dans une signature.
";
$elem["quota/supportemail"]["default"]="";
$elem["quota/mailfrom"]["type"]="string";
$elem["quota/mailfrom"]["description"]="From header of warnquota emails:
 The email address you specify here is used as the \"From:\" field of any
 mail sent by the warnquota utility.
";
$elem["quota/mailfrom"]["descriptionde"]="Absender-Adresse für Warnquota-E-Mails:
 Diese E-Mail-Adresse wird als Absender jeder E-Mail benutzt, die das Warnquota-Programm verschickt.
";
$elem["quota/mailfrom"]["descriptionfr"]="Adresse d'expéditeur des courriels envoyés par « warnquota » :
 L'adresse électronique que vous indiquez ici sera utilisée comme adresse d'expéditeur de tous les courriels envoyés par l'utilitaire « warnquota ».
";
$elem["quota/mailfrom"]["default"]="";
$elem["quota/message"]["type"]="string";
$elem["quota/message"]["description"]="Message of warnquota emails:
 The text you specify here is used as message in any mail sent by the
 warnquota utility. Use \"|\" to specify a line break. Leave empty if you
 want the default message.
";
$elem["quota/message"]["descriptionde"]="Text der Warnquota-E-Mails:
 Dieser Text wird als Nachricht in jeder E-Mail verwendet, die von Warnquota-Programm verschickt wird. Einen Zeilenumbruch erhalten Sie mit dem Zeichen »|«. Falls Sie den Text leer lassen, wird die Standard-Nachricht verwendet.
";
$elem["quota/message"]["descriptionfr"]="Message des courriels de « warnquota » :
 Le texte que vous entrez ici sera utilisé dans tous les courriels envoyés par l'utilitaire « warnquota ». Le caractère « | » indique un retour à la ligne. Laissez ce champ vide pour utiliser le message par défaut.
";
$elem["quota/message"]["default"]="";
$elem["quota/signature"]["type"]="string";
$elem["quota/signature"]["description"]="Signature of warnquota emails:
 The text you specify here is used as signature in any mail sent by the
 warnquota utility. Use \"|\" to specify a line break. Leave empty if you
 want the default signature.
";
$elem["quota/signature"]["descriptionde"]="Signatur der Warnquota E-Mails:
 Dieser Text wird als Signatur für jede E-Mail verwendet, die vom Warnquota-Programm verschickt wird. Einen Zeilenumbruch erhalten Sie mit dem Zeichen »|«. Falls Sie den Text leer lassen, wird die Standard-Signatur verwendet.
";
$elem["quota/signature"]["descriptionfr"]="Signature des courriels de « warnquota » :
 Le texte que vous entrez ici sera utilisé comme signature de tous les courriels envoyés par l'utilitaire « warnquota ». Le caractère « | » indique un retour à la ligne. Laissez cette valeur vide pour utiliser la signature par défaut.
";
$elem["quota/signature"]["default"]="";
$elem["quota/rquota_setquota"]["type"]="note";
$elem["quota/rquota_setquota"]["description"]="rpc.rquota behaviour changed
 The behaviour of rpc.rquotad changed. To be able to set quota rpc.rquotad
 has to be started with option '-S'.
";
$elem["quota/rquota_setquota"]["descriptionde"]="Geändertes Verhalten von rpc.rquotad
 Das Verhalten von rpc.rquotad hat sich geändert. Die Bearbeitung von Quota-Informationen funktioniert nur, wenn rpc.rquotad mit der Option »-S« gestartet wird.
";
$elem["quota/rquota_setquota"]["descriptionfr"]="Le comportement de « rpc.rquotad » a été modifié
 Le comportement de rpc.rquotad a été modifié. Afin de pouvoir établir les quota, ce programme doit être lancé avec l'option « -S ».
";
$elem["quota/rquota_setquota"]["default"]="";
$elem["quota/group_message"]["type"]="string";
$elem["quota/group_message"]["description"]="Message of warnquota group emails:
 The text you specify here is used as message in any mail sent by the
 warnquota utility for groups that are over quota. Use \"|\" to specify a
 line break. Leave empty if you want the default message.
";
$elem["quota/group_message"]["descriptionde"]="Text der Warnquota-Gruppen-E-Mails:
 Dieser Text wird als Nachricht in jeder E-Mail verwendet, die von Warnquota-Programm verschickt wird, wenn Benutzergruppen über Quota sind. Einen Zeilenumbruch erhalten Sie mit dem Zeichen »|«. Falls Sie den Text leer lassen, wird die Standard-Nachricht verwendet.
";
$elem["quota/group_message"]["descriptionfr"]="Message des courriels de « warnquota » pour les groupes :
 Le texte que vous entrez ici sera utilisé dans tous les courriels envoyés par l'utilitaire « warnquota », lors de dépassement de quota par les groupes. Le caractère « | » indique un retour à la ligne. Laissez cette valeur vide pour utiliser le message par défaut.
";
$elem["quota/group_message"]["default"]="";
$elem["quota/subject"]["type"]="string";
$elem["quota/subject"]["description"]="Subject header of warnquota emails:
 The text you specify here is used as the \"Subject:\" field of any
 mail sent by the warnquota utility.
";
$elem["quota/subject"]["descriptionde"]="Betreff-Angabe für Warnquota-E-Mails:
 Diese Betreff-Angabe wird als Betreff jeder E-Mail benutzt, die das Warnquota-Hilfswerkzeug verschickt.
";
$elem["quota/subject"]["descriptionfr"]="Sujet des courriels envoyés par « warnquota » :
 Le texte que vous indiquerez ici sera utilisé comme sujet de tous les courriels envoyés par l'utilitaire « warnquota ».
";
$elem["quota/subject"]["default"]="";
$elem["quota/cc"]["type"]="string";
$elem["quota/cc"]["description"]="CC header of warnquota emails:
 The text you specify here is used as the \"CC:\" field of any
 mail sent by the warnquota utility.
";
$elem["quota/cc"]["descriptionde"]="Kopie-Adresse für Warnquota-E-Mails:
 Den Text den Sie hier angeben, wird im »CC«-Feld jeder E-Mail verwendet, die das Warnquota-Hilfswerkzeug versendet.
";
$elem["quota/cc"]["descriptionfr"]="Adresse en copie des courriels envoyés par « warnquota » :
 L'adresse électronique que vous indiquez ici sera placée en copie de tous les courriels envoyés par l'utilitaire « warnquota ».
";
$elem["quota/cc"]["default"]="";
$elem["quota/charset"]["type"]="string";
$elem["quota/charset"]["description"]="Character set in which the e-mail is sent:
 The text you specify here is used as the \"charset:\" field in the MIME header
 of any mail sent by the warnquota utility.
";
$elem["quota/charset"]["descriptionde"]="Zeichensatz, in der die E-Mail geschickt wird:
 Den Text den Sie hier angeben, wird im »charset«-Feld im MIME-Kopfbereich jeder E-Mail verwendet, die das Warnquota-Hilfswerkzeug versendet.
";
$elem["quota/charset"]["descriptionfr"]="Jeu de caractères pour l'envoi des courriels :
 Veuillez indiquer l'adresse qui sera placée dans le champ « charset: » de l'en-tête MIME de tous les courriels envoyés par l'utilitaire « warnquota ».
";
$elem["quota/charset"]["default"]="";
$elem["quota/cc_before"]["type"]="string";
$elem["quota/cc_before"]["description"]="Time slot in which admin gets email:
 During this time slot before the end of the grace period admin
 will be CCed on all generated emails.
 Leave empty to get the whole grace period.
";
$elem["quota/cc_before"]["descriptionde"]="Zeitscheibe, in der der Administrator E-Mail bekommt:
 In der angegebenen Zeit vor Ende der Gnadenfrist wird jede E-Mail auch an den Administrator geschickt. Eine leere Eingabe bedeutet die ganze Gnadenfrist.
";
$elem["quota/cc_before"]["descriptionfr"]="Durée de la période de mise en copie de l'administrateur :
 Pendant la durée indiquée avant l'expiration du délai de grâce, l'administrateur sera mis en copie de tous les courriels générés. Laisser ce champ vide pour que la durée soit celle de la période de grâce.
";
$elem["quota/cc_before"]["default"]="";
$elem["quota/group_signature"]["type"]="string";
$elem["quota/group_signature"]["description"]="Signature of warnquota group emails:
 The text you specify here is used as signature in any mail sent by the
 warnquota utility for groups that are over quota. Use \"|\" to specify a
 line break. Leave empty if you want the default message.
";
$elem["quota/group_signature"]["descriptionde"]="Signatur der Warnquota-Gruppen-E-Mails:
 Dieser Text wird als Signatur für jede E-Mail verwendet, die von Warnquota-Hilfswerkzeug verschickt wird, wenn Benutzergruppen über Quota sind. Einen Zeilenumbruch erhalten Sie mit dem Zeichen »|«. Falls Sie den Text leer lassen, wird die Standard-Nachricht verwendet.
";
$elem["quota/group_signature"]["descriptionfr"]="Signature des courriels de « warnquota » pour les groupes :
 Le texte que vous entrez ici sera utilisé comme signature de tous les courriels envoyés par l'utilitaire « warnquota », lors de dépassement de quota par les groupes. Le caractère « | » indique un retour à la ligne. Laissez cette valeur vide pour utiliser la signature par défaut.
";
$elem["quota/group_signature"]["default"]="";
PKG_OptionPageTail2($elem);
?>
