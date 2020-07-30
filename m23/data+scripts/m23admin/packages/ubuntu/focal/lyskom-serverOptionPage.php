<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lyskom-server");

$elem["lyskom-server/language"]["type"]="select";
$elem["lyskom-server/language"]["choices"][1]="English";
$elem["lyskom-server/language"]["choicesde"][1]="Englisch";
$elem["lyskom-server/language"]["choicesfr"][1]="anglais";
$elem["lyskom-server/language"]["description"]="Language of initial database:
 The LysKOM server comes with two pre-defined databases, one with English
 names for conferences and the administrator account, and one in Swedish.
 Please select the one you want to install on your machine.
 .
 The database is only installed once, and when you have installed it you
 cannot switch. You can, of course, rename the conferences and accounts if
 you wish.
";
$elem["lyskom-server/language"]["descriptionde"]="Sprache der Anfangsdatenbank:
 Der LysKOM-Server wird mit zwei vordefinierten Datenbanken, einer mit englischen Namen für Konferenzen und das Administratorkonto und einer schwedischsprachigen installiert. Bitte wählen Sie eine Datenbank zur Installation aus.
 .
 Die Datenbank wird nur einmal installiert. Wenn die Datenbank installiert ist, können Sie nicht zu einer anderen wechseln. Sie können natürlich, wenn Sie möchten, die Konferenzen und das Administratorkonto umbenennen.
";
$elem["lyskom-server/language"]["descriptionfr"]="Langue de la base de données initiale :
 Le serveur LysKOM est fourni avec deux bases de données prédéfinies. L'une d'entre elles comporte des noms anglais pour les conférences et le nom de l'administrateur, et l'autre des noms en suédois. Veuillez choisir celle que vous souhaitez installer sur votre système.
 .
 La base de données n'est installée qu'une fois. Une fois cette opération effectuée, il n'est pas possible d'en changer. Vous pouvez bien entendu ensuite renommer les conférences et les comptes, si vous le souhaitez.
";
$elem["lyskom-server/language"]["default"]="English";
$elem["lyskom-server/admin-password"]["type"]="password";
$elem["lyskom-server/admin-password"]["description"]="Password for the pre-defined administrator account:
 Please enter the password for the initial person with full
 administrative rights, \"Administrator (of) LysKOM\". If you leave it
 blank, it will default to \"gazonk\".
";
$elem["lyskom-server/admin-password"]["descriptionde"]="Passwort für das vordefinierte Administratorkonto:
 Bitte geben Sie das Passwort für die Person, die anfänglich volle administrative Rechte haben wird, »Administrator (of) LysKOM«, ein. Falls Sie dies leer lassen, ist die Vorgabe »gazonk«.
";
$elem["lyskom-server/admin-password"]["descriptionfr"]="Veuillez saisir un mot de passe pour le compte d'administrateur prédéfini :
 Veuillez saisir un mot de passe pour le premier utilisateur qui obtiendra tous les droits d'administration, « Administrateur (de) LysKOM ». Si vous laissez le champ vide, le mot de passe par défaut sera « gazonk ».
";
$elem["lyskom-server/admin-password"]["default"]="";
$elem["lyskom-server/admin-password-repeat"]["type"]="password";
$elem["lyskom-server/admin-password-repeat"]["description"]="Confirm password:
 Please enter the password again to verify.
";
$elem["lyskom-server/admin-password-repeat"]["descriptionde"]="Passwort bestätigen:
 Bitte geben Sie das Passwort nochmal ein, um sicher zu gehen, dass Sie es richtig eingegeben haben.
";
$elem["lyskom-server/admin-password-repeat"]["descriptionfr"]="Veuillez confirmer le mot de passe :
 Veuillez entrer à nouveau le mot de passe afin de vérifier qu'il a été saisi correctement.
";
$elem["lyskom-server/admin-password-repeat"]["default"]="";
$elem["lyskom-server/password-mismatch"]["type"]="note";
$elem["lyskom-server/password-mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please try again.
";
$elem["lyskom-server/password-mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Die beiden eingegebenen Passwörter sind nicht gleich. Bitte versuchen Sie es noch einmal.
";
$elem["lyskom-server/password-mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["lyskom-server/password-mismatch"]["default"]="";
PKG_OptionPageTail2($elem);
?>
