<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ssmtp");

$elem["ssmtp/overwriteconfig"]["type"]="boolean";
$elem["ssmtp/overwriteconfig"]["description"]="Automatically overwrite config files?
 The mail configuration file /etc/ssmtp/ssmtp.conf can be automatically
 updated on each upgrade with the information supplied to the debconf
 database. If you do not want this to happen (ie/ you want to maintain
 control of this file yourself) then set this option to have the program
 never touch this file.
";
$elem["ssmtp/overwriteconfig"]["descriptionde"]="Konfigurationsdateien automatisch überschreiben?
 Die Konfigurationsdatei /etc/ssmtp/ssmtp.conf kann bei jeder Aktualisierung automatisch erneuert werden. Wenn Sie das nicht möchten (z.B. weil Sie diese Datei selbst anpassen wollen), dann sollten Sie diese Option nicht wählen.
";
$elem["ssmtp/overwriteconfig"]["descriptionfr"]="Reconstituer automatiquement les fichiers de configuration ?
 Le fichier de configuration du courriel (/etc/ssmtp/ssmtp.conf) peut être automatiquement adapté à chaque mise à niveau d'après les informations fournies dans la base de données de debconf. Si vous ne voulez pas que cela arrive (c.-à-d. que vous souhaitez garder le contrôle de ce fichier), répondez négativement à cette question afin que le programme ne modifie jamais ce fichier.
";
$elem["ssmtp/overwriteconfig"]["default"]="true";
$elem["ssmtp/root"]["type"]="string";
$elem["ssmtp/root"]["description"]="Who gets mail for userids < 1000:
 Mail sent to a local user whose UID is less than 1000 will instead be
 sent here. This is useful for daemons which mail reports to root and
 other system UIDs.
 Make this empty to disable rewriting.
";
$elem["ssmtp/root"]["descriptionde"]="Wer erhält E-Mails für Benutzer-IDs < 1000:
 E-Mails für lokale Benutzer mit einer UID kleiner 1000 können an einen anderen Benutzer umgeleitet werden. Dies ist nützlich bei Diensten, die Reports an den Benutzer root oder andere System-Benutzer senden. Wenn das Feld leer bleibt, wird nichts umgeleitet.
";
$elem["ssmtp/root"]["descriptionfr"]="Destinataire des courriels pour les utilisateurs système (UID<1000) :
 Les courriels envoyés à un utilisateur local dont l'UID est inférieur à 1000 seront envoyés à l'adresse indiquée ici. C'est utile pour les démons qui expédient des rapports au superutilisateur et aux autres UID système. Veuillez laisser ce champ vide pour désactiver la réécriture d'adresse.
";
$elem["ssmtp/root"]["default"]="postmaster";
$elem["ssmtp/mailhub"]["type"]="string";
$elem["ssmtp/mailhub"]["description"]="Name of your mailhub:
 This sets the host to which mail is delivered. The actual machine
 name is required; no MX records are consulted. Commonly, mailhosts
 are named \"mail.domain.com\".
";
$elem["ssmtp/mailhub"]["descriptionde"]="Name Ihres E-Mailservers:
 Bei diesem Rechner werden E-Mails abgeliefert. Es wird der tatsächliche Rechnername benötigt; MX-Einträge werden nicht beachtet. E-Mailserver heißen gewöhnlich »mail.domain.com«.
";
$elem["ssmtp/mailhub"]["descriptionfr"]="Nom d'hôte de votre concentrateur de courriel (« mail hub ») :
 Ce paramètre définit l'hôte vers lequel le courriel est distribué. Le nom de la machine concernée est nécessaire. Les enregistrements MX ne seront pas utilisés. Généralement, les hôtes de courriel sont nommés « mail.domain.com ».
";
$elem["ssmtp/mailhub"]["default"]="mail";
$elem["ssmtp/port"]["type"]="string";
$elem["ssmtp/port"]["description"]="Remote SMTP port number:
 If your remote SMTP server listens on a port other than 25 (Standard/RFC)
 then set it here.
";
$elem["ssmtp/port"]["descriptionde"]="Nummer des entfernten SMTP-Ports:
 Wenn der entfernte SMTP-Server auf einem anderen als Port 25 (Standard/RFC) läuft, dann geben Sie den Port hier an.
";
$elem["ssmtp/port"]["descriptionfr"]="Numéro du port SMTP distant :
 Si votre serveur SMTP distant écoute sur un autre port que le 25 (port standard selon les RFC), veuillez l'indiquer ici.
";
$elem["ssmtp/port"]["default"]="25";
$elem["ssmtp/rewritedomain"]["type"]="string";
$elem["ssmtp/rewritedomain"]["description"]="What domain to masquerade as:
 ssmtp will use \"username@REWRITEDOMAIN\" as the default From: address
 for outgoing mail which contains only a local username.
";
$elem["ssmtp/rewritedomain"]["descriptionde"]="Als welche Domäne ausgeben:
 Ssmtp benutzt das Schema »Benutzername@UMSCHREIBDOMÄNE« in der Absenderzeile für ausgehende E-Mails, die nur einen lokalen Benutzernamen als Absender enthalten.
";
$elem["ssmtp/rewritedomain"]["descriptionfr"]="Domaine de masquage (« masquerade ») :
 Ssmtp utilisera « username@REWRITEDOMAIN » comme champ d'adresse « From: » pour les courriels sortants contenant uniquement un nom d'utilisateur local.
";
$elem["ssmtp/rewritedomain"]["default"]="";
$elem["ssmtp/mailname"]["type"]="string";
$elem["ssmtp/mailname"]["description"]="What name to store in /etc/mailname:
 This is the portion of the address after the '@' sign to be shown on
 outgoing news and mail messages.
";
$elem["ssmtp/mailname"]["descriptionde"]="Welchen Namen in der Datei /etc/mailname speichern:
 Dies ist der Teil der Adresse nach dem »@«, der für alle ausgehenden E-Mails und News verwendet wird.
";
$elem["ssmtp/mailname"]["descriptionfr"]="Nom d'hôte à utiliser dans /etc/mailname :
 Veuillez indiquer la partie de l'adresse après le signe « @ » qui sera affichée dans les messages sortants (courriels et nouvelles).
";
$elem["ssmtp/mailname"]["default"]="";
$elem["ssmtp/hostname"]["type"]="string";
$elem["ssmtp/hostname"]["description"]="Fully qualified hostname:
 This should specify the real hostname of this machine, and will be
 sent to the mailhub when delivering mail.
";
$elem["ssmtp/hostname"]["descriptionde"]="Vollständiger Rechnername:
 Dies sollte der richtige Rechnername Ihrer Maschine sein. Er wird beim Senden der E-Mail an den E-Mailserver übermittelt.
";
$elem["ssmtp/hostname"]["descriptionfr"]="Nom de domaine pleinement qualifié :
 Veuillez indiquer le nom réel de cette machine : il sera envoyé vers le concentrateur de courriels lors de la distribution des messages.
";
$elem["ssmtp/hostname"]["default"]="";
$elem["ssmtp/fromoverride"]["type"]="boolean";
$elem["ssmtp/fromoverride"]["description"]="Allow override of From: line in email header?
 A \"positive\" response will permit local users to enter any From: line
 in their messages without it being mangled, and cause ssmtp to rewrite
 the envelope header with that address. A \"negative\" response will
 disallow this, and use only the default address or addresses set in
 /etc/ssmtp/revaliases.
";
$elem["ssmtp/fromoverride"]["descriptionde"]="Überschreiben der From:-Zeile erlauben?
 Wenn Sie zustimmen, wird lokalen Benutzern erlaubt, jede From:-Zeile in ausgehenden Nachrichten zu verwenden, ohne das sie verändert wird und ssmtp wird auch die Envelope-Kopfzeile mit dieser Adresse überschreiben. Wenn Sie ablehnen, verhindern Sie dies und lassen nur die Standardadresse oder eine aus der Datei /etc/ssmtp/revaliases zu.
";
$elem["ssmtp/fromoverride"]["descriptionfr"]="Autoriser le remplacement de l'en-tête « From: » dans les messages ?
 Cette option permettra aux utilisateurs locaux de saisir n'importe quelle ligne « From: » dans leurs messages sans qu'elle ne soit réécrite et obligera ssmtp à réécrire les en-têtes d'enveloppe avec cette adresse. Une réponse négative désactivera cela, et l'adresse par défaut ou celles définies dans /etc/ssmtp/revaliases seront utilisées.
";
$elem["ssmtp/fromoverride"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
