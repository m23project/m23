<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("im");

$elem["im/rpop"]["type"]="boolean";
$elem["im/rpop"]["description"]="Use setuid imget for RPOP?
 The RPOP feature is disabled by default. It is an obsolete feature (The
 RPOP command was used instead of the PASS command to authenticate access
 to a maildrop. It was removed in RFC 1460). If you prefer, you can use RPOP
 by setuid imget.
";
$elem["im/rpop"]["descriptionde"]="Setuid imget für RPOP verwenden?
 Die RPOP-Funktionalität ist standardmäßig deaktiviert. Es ist eine veraltete Funktionalität (der RPOP-Befehl wurde statt des PASS-Befehls verwendet, um sich bei einer Mailabgabestelle (maildrop) zu authentifizieren. Er wurde in RFC 1460 entfernt). Falls Sie möchten, können Sie RPOP via setuid imget verwenden.
";
$elem["im/rpop"]["descriptionfr"]="Pour RROP, voulez-vous utiliser imget avec le bit setuid positionné ?
 Le protocole RPOP est désactivé par défaut. C'est une possibilité obsolète. La commande RPOP était utilisée à la place de la commande PASS pour authentifier l'accès à une boîte aux lettres. Elle a été supprimée par la RFC 1460. Si vous voulez utiliser le protocole RPOP, le bit « set-user-id » sera ajouté aux droits d'imget.
";
$elem["im/rpop"]["default"]="false";
$elem["im/siteconfig_by_hand"]["type"]="boolean";
$elem["im/siteconfig_by_hand"]["description"]="Generate /etc/im/SiteConfig by hand?
 This package normally generates /etc/im/SiteConfig. If you prefer, you can
 generate /etc/im/SiteConfig by hand.
";
$elem["im/siteconfig_by_hand"]["descriptionde"]="/etc/im/SiteConfig von Hand erstellen?
 Normalerweise wird eine generische /etc/im/SiteConfig von diesem Paket erstellt. Falls Sie möchten, können Sie die Datei /etc/im/SiteConfig von Hand erstellen.
";
$elem["im/siteconfig_by_hand"]["descriptionfr"]="Voulez-vous créer vous-même /etc/im/SiteConfig ?
 Normalement, le paquet crée un fichier /etc/im/SiteConfig. Si vous voulez, vous pouvez le créer vous-même.
";
$elem["im/siteconfig_by_hand"]["default"]="false";
$elem["im/fromdomain"]["type"]="string";
$elem["im/fromdomain"]["description"]="Default From: domain:
 In a mail/news header, if a From: field does not have a domain part, imput
 will add this domain automatically.
 .
 If unsure, you can ignore this.
";
$elem["im/fromdomain"]["descriptionde"]="Standard From:-Domain:
 Falls ein From:-Feld in den E-Mail-/News-Kopfzeilen keinen Domain-Teil hat, wird Imput diesen automatisch hinzufügen.
 .
 Falls Sie sich nicht sicher sind, können Sie dies ignorieren.
";
$elem["im/fromdomain"]["descriptionfr"]="Domaine par défaut pour l'en-tête From:
 Dans l'en-tête d'un article ou d'un courriel, si le champ From: ne possède pas de partie @domaine, ce domaine sera automatiquement ajouté par imput.
 .
 Si vous ne connaissez pas la valeur de ce champ, vous pouvez ignorer cette question.
";
$elem["im/fromdomain"]["default"]="";
$elem["im/todomain"]["type"]="string";
$elem["im/todomain"]["description"]="Default To: domain:
 In a mail header, if a To: field does not have a domain part, imput will
 add this domain automatically.
 .
 If unsure, you can ignore this.
";
$elem["im/todomain"]["descriptionde"]="Standard To:-Domain:
 Falls ein To:-Feld in den E-Mail-Kopfzeilen keinen Domain-Teil hat, wird Imput diesen automatisch hinzufügen.
 .
 Falls Sie sich nicht sicher sind, können Sie dies ignorieren.
";
$elem["im/todomain"]["descriptionfr"]="Domaine par défaut pour le champ To:
 Dans l'en-tête d'un courriel, si le champ To: ne possède pas de partie @domaine, ce domaine sera automatiquement ajouté par imput.
 .
 Si vous ne connaissez pas la valeur de ce champ, vous pouvez ignorer cette question.
";
$elem["im/todomain"]["default"]="";
$elem["im/organization"]["type"]="string";
$elem["im/organization"]["description"]="Organization:
 In a news header, imput will add an Organization: field automatically.
 .
 If unsure, you can ignore this.
";
$elem["im/organization"]["descriptionde"]="Organisation:
 In News-Kopfzeilen wird Imput das »Organization:«-Feld automatisch hinzufügen.
 .
 Falls Sie sich nicht sicher sind, können Sie dies ignorieren.
";
$elem["im/organization"]["descriptionfr"]="Organisation:
 Imput ajoutera automatiquement un champ Organization: à l'en-tête des articles.
 .
 Si vous ne connaissez pas la valeur de ce champ, vous pouvez ignorer cette question.
";
$elem["im/organization"]["default"]="";
$elem["im/use_maildir"]["type"]="boolean";
$elem["im/use_maildir"]["description"]="Use imget with maildir?
 A maildir is not used by default. If you prefer, imget can retrieve mails
 from ~/Maildir/{new,cur}.
";
$elem["im/use_maildir"]["descriptionde"]="Imget mit Maildir verwenden?
 Standardmäßig wird kein Maildir verwendet. Falls Sie dies bevorzugen, kann Imget E-Mail aus ~/Maildir/{new,cur} abholen.
";
$elem["im/use_maildir"]["descriptionfr"]="Voulez-vous utiliser le format « maildir » avec imget ?
 Si vous voulez, imget peut récupérer les courriels dans ~/Maildir/{new,cur}, mais ce n'est pas le format utilisé par défaut.
";
$elem["im/use_maildir"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
