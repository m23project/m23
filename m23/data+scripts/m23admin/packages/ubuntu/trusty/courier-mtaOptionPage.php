<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("courier-mta");

$elem["courier-mta/defaultdomain"]["type"]="string";
$elem["courier-mta/defaultdomain"]["description"]="Default domain:
 Please specify a valid email domain. Most header rewriting functions will
 append this domain to all email addresses which do not specify a domain,
 such as local accounts.
";
$elem["courier-mta/defaultdomain"]["descriptionde"]="Standard-Domain:
 Bitte geben Sie eine gültige E-Mail-Domain ein. Die meisten Funktionen zum Bearbeiten von E-Mail-Headern hängen diese Domain an E-Mail-Adressen an, die keine Domain enthalten, wie zum Beispiel von lokalen Benutzerzugängen auf diesem Rechner.
";
$elem["courier-mta/defaultdomain"]["descriptionfr"]="Domaine par défaut :
 Veuillez indiquer un domaine de courriel valide. La plupart des fonctions de réécriture d'en-têtes ajouteront ce domaine à toutes les adresses électroniques dans lesquelles aucun domaine n'est indiqué, par exemple les comptes locaux.
";
$elem["courier-mta/defaultdomain"]["default"]="";
$elem["courier-mta/dsnfrom"]["type"]="string";
$elem["courier-mta/dsnfrom"]["description"]="\"From\" header for delivery notifications:
 Please specify a valid value for the \"From\" header for mail delivery
 notifications. These notifications cannot be sent without that setting.
";
$elem["courier-mta/dsnfrom"]["descriptionde"]="»From«-Header für Zustellungsbenachrichtigungen:
 Bitte geben Sie einen gültigen Wert für den »From«-Header für E-Mail-Zustellungsbenachrichtigungen an. Andernfalls können diese nicht verschickt werden.
";
$elem["courier-mta/dsnfrom"]["descriptionfr"]="En-tête d'origine (« From ») pour les notifications d'envoi :
 Veuillez indiquez une adresse valide pour l'en-tête « origine » (« From ») des notifications d'envoi de courriel (« mail delivery notifications ») sinon celles-ci ne pourront pas être envoyées.
";
$elem["courier-mta/dsnfrom"]["default"]="";
PKG_OptionPageTail2($elem);
?>
