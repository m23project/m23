<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("opensmtpd");

$elem["opensmtpd/mailname"]["type"]="string";
$elem["opensmtpd/mailname"]["description"]="System mail name:
 The \"mail name\" is used as the domain name in the email address for
 messages that only have a \"local part\" (such as <jrandomuser> or
 <root>). It should be a fully qualified domain name (FQDN) that you are
 entitled to use.
 .
 For instance, to allow the local host to generate mail with addresses
 such as <jrandomuser@example.org>, set the system mail name to
 \"example.org\".
 .
 This mail name is used as the hostname in the SMTP greeting banner, and
 will also be used by other programs.
";
$elem["opensmtpd/mailname"]["descriptionde"]="E-Mail-Name des Systems:
 Der »E-Mail-Name« wird in der E-Mail-Adresse als Domain-Name für Nachrichten verwendet, die nur einen »lokalen Teil« (wie <jzufallsbenutzer> oder <root>) haben. Es sollte ein vollständiger Domain-Name (»fully qualified domain name«/FQDN) sein, zu dessen Verwendung Sie berechtigt sind.
 .
 Um etwa dem lokalen Rechner zu gestatten, E-Mails mit Adressen wie <jzufallsbenutzer@example.org> zu generieren, setzen Sie den E-Mail-Namen auf »example.org«.
 .
 Dieser E-Mail-Name wird im SMTP-Gruß-Banner als Rechnername benutzt und auch von anderen Programmen verwendet.
";
$elem["opensmtpd/mailname"]["descriptionfr"]="Nom de courrier du système :
 Le nom de courrier (« mail name ») est utilisé comme nom de domaine dans l'adresse de courrier pour les messages qui ont seulement une « partie locale » (telle que <untel> ou <root>). Ce devrait être un nom de domaine complètement qualifié (FDQN) que vous avez le droit d'utiliser.
 .
 Par exemple, pour que l'hôte local puisse créer des courriers avec une adresse telle que <untel@example.org>, donnez au nom de courrier la valeur « example.org ».
 .
 Ce nom de courrier est utilisé comme nom d'hôte dans le message d'accueil SMTP et peut également être utilisé par d'autres programmes.
";
$elem["opensmtpd/mailname"]["default"]="Default:";
$elem["opensmtpd/root_address"]["type"]="string";
$elem["opensmtpd/root_address"]["description"]="Root and postmaster mail recipient:
 Mail for the \"postmaster\", \"root\", and other system accounts should be
 redirected to the user account(s) of the actual system administrator(s).
 .
 Please enter a comma-separated list of the usernames of the intended
 recipients. Leave this field blank to not create an alias for \"root\";
 in this case, the root account will receive mail addressed to
 \"postmaster\" and other system accounts, assuming aliases for these
 accounts do not already exist.
";
$elem["opensmtpd/root_address"]["descriptionde"]="Root- und Postmaster-E-Mail-Empfangsadresse:
 E-Mails für »postmaster«, »root« und andere Systemkonten sollten an die Benutzerkonten der tatsächlichen Systemadministratoren weitergeleitet werden.
 .
 Bitte geben Sie eine durch Kommas getrennte Liste von Benutzernamen der beabsichtigten Empfänger ein. Lassen Sie dieses Feld leer, um keinen Alias für »root« zu erstellen. In diesem Fall wird das Root-Konto die an »postmaster« und andere Systemkonten adressierten E-Mails unter der Annahme, dass für diese Konten noch keine Alias bestehen, empfangen.
";
$elem["opensmtpd/root_address"]["descriptionfr"]="Destinataire du courrier de root et postmaster :
 Veuillez indiquer le(s) compte(s) vers lequel sera redirigé le courrier pour les comptes « postmaster », « root » et les autres comptes système.
 .
 Veuillez entrer une liste séparée par des virgules des identifiants concernés. Si vous ne voulez pas créer un alias pour « root », laissez ce champ vide ; dans ce cas, le compte root recevra le courrier adressé à « postmaster » et aux autres comptes système, sauf si des alias existent déjà pour ces comptes.
";
$elem["opensmtpd/root_address"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
