<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xmail");

$elem["xmail/domainname"]["type"]="string";
$elem["xmail/domainname"]["description"]="Default Local Domain Name:
 Xmail server has a sendmail replacement that is mostly used by system 
 programs and daemons to send mail containing their output or results.
 .
 Historically, those programs use a user name (usually root) that is not
 followed by a domain.
 .
 Xmail server is a 100% RFC compliant server that does not allow \"default\"
 domains. Its users are completely virtual and separated from the system users.
 .
 You must have at least one valid domain and one valid user created to receive
 mail from those programs. 
";
$elem["xmail/domainname"]["descriptionde"]="Lokaler Standard-Domain-Name:
 Xmail-Server besitzt einen Sendmail-Ersatz, welcher häufig von Programmen und Hintergrundprozessen benutzt wird, um deren Ausgabe oder Ergebnisse zu versenden.
 .
 Ursprünglich benutzen diese Programme einen Benutzernamen (meistens root), auf welchen kein Domainname folgt.
 .
 Xmail-Server ist ein 100% RFC-konformer Server, welcher keine »default«-Domains erlaubt. Seine Benutzer sind komplett virtuell und von den Systembenutzern getrennt.
 .
 Sie müssen mindestens eine gültige Domain sowie einen gültigen Benutzer angelegt haben, um von diesen Programmen E-Mail zu erhalten.
";
$elem["xmail/domainname"]["descriptionfr"]="Nom par défaut du domaine local :
 Le serveur xmail comporte un programme remplaçant sendmail. Celui-ci est utilisé principalement par des programmes ou des démons du système pour envoyer des courriels contenant leurs résultats.
 .
 Historiquement, ces programmes utilisent l'identifiant d'un utilisateur (habituellement « root », le superutilisateur) pour lui adresser un courriel, sans préciser de nom de domaine.
 .
 Le serveur xmail est compatible à 100% avec les RFC, c'est pourquoi il n'autorise pas les « domaines par défaut ». Ses utilisateurs sont virtuels et complètement indépendants des utilisateurs du système.
 .
 Vous devez créer au moins un domaine et un utilisateur valables pour recevoir les messages provenant de ces programmes.
";
$elem["xmail/domainname"]["default"]="/etc/mailname";
$elem["xmail/daemonuser"]["type"]="string";
$elem["xmail/daemonuser"]["description"]="User that will receive the system mail:
 The RFC and best practice instructions for setting a mail server require
 having at least valid root, postmaster, and abuse addresses. Historically, it
 was usually the root user that received that mail in addition to other
 system-related mail, e.g., from cron daemons and log watchers.
 .
 You may now choose user other than root to receive those messages if you wish
 to do so.
";
$elem["xmail/daemonuser"]["descriptionde"]="Benutzer, welcher die System-E-Mail erhält:
 Das RFC sowie Anleitungen zum optimalen E-Mailserver-Installation, erfordern, dass mindestens eine gültige root-, postmaster- sowie abuse-Adresse vorhanden ist. Ursprünglich war es gängig, dass der Hauptbenutzer »root« diese E-Mail zusätzlich zu anderen system-zugehörigen E-Mails (z.B. vom cron-Hintergrundprozessen oder Protokoll-Überwachern) erhalten hat.
 .
 Hier können Sie nun andere Benutzer außer root definieren, welche diese Nachrichten erhalten sollen, falls Sie dies wünschen.
";
$elem["xmail/daemonuser"]["descriptionfr"]="Utilisateur qui recevra les messages du système :
 D'après les RFC et les bonnes pratiques concernant le réglage d'un serveur de courriel, les adresses « root », « postmaster » et « abuse » doivent exister. Historiquement, le superutilisateur recevait les courriels arrivant à ces adresses, en plus des messages relatifs au système, par exemple ceux de cron ou des analyseurs de journaux.
 .
 Il est désormais possible de choisir un utilisateur autre que le superutilisateur comme destinataire de ces courriels.
";
$elem["xmail/daemonuser"]["default"]="postmaster";
$elem["xmail/daemonpasswd"]["type"]="string";
$elem["xmail/daemonpasswd"]["description"]="User Password:
 Please enter a password for that user. You will need this when you log in to
 the POP3 or IMAP server.
";
$elem["xmail/daemonpasswd"]["descriptionde"]="Benutzer-Passwort:
 Bitte geben Sie ein Passwort für diesen Benutzer ein. Sie benötigen dies, um sich an dem POP3- oder IMAP-Server anzumelden.
";
$elem["xmail/daemonpasswd"]["descriptionfr"]="Mot de passe de l'utilisateur :
 Veuillez choisir un mot de passe pour cet utilisateur. Il sera utilisé lors de la connexion au serveur POP3 ou IMAP.
";
$elem["xmail/daemonpasswd"]["default"]="postmaster";
$elem["xmail/redirect"]["type"]="string";
$elem["xmail/redirect"]["description"]="Forward to email address:
 Optionally you can choose to forward the postmaster's mails to another mailbox.
 .
 This change will not take effect if you already have a redirect in place.
";
$elem["xmail/redirect"]["descriptionde"]="Weiterleiten an folgende E-Mail-Adresse:
 Wahlweise können Sie die Postmaster-E-Mails an ein anderes Postfach weiterleiten.
 .
 Diese Änderung wird nicht in Kraft treten, falls bereits eine Weiterleitung besteht.
";
$elem["xmail/redirect"]["descriptionfr"]="Adresse de redirection :
 Vous pouvez éventuellement choisir de rediriger les courriels destinés à « postmaster » vers une autre boîte aux lettres électronique.
 .
 Ce changement sera sans effet si vous avez déjà mis en place une redirection.
";
$elem["xmail/redirect"]["default"]="";
PKG_OptionPageTail2($elem);
?>
