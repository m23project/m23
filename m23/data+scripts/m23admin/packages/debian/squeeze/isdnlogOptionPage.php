<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isdnlog");

$elem["isdnlog/country"]["type"]="select";
$elem["isdnlog/country"]["choices"][1]="Austria";
$elem["isdnlog/country"]["choices"][2]="France";
$elem["isdnlog/country"]["choices"][3]="Germany";
$elem["isdnlog/country"]["choices"][4]="Luxembourg";
$elem["isdnlog/country"]["choices"][5]="Netherlands";
$elem["isdnlog/country"]["choices"][6]="Norway";
$elem["isdnlog/country"]["choices"][7]="Spain";
$elem["isdnlog/country"]["choices"][8]="Switzerland";
$elem["isdnlog/country"]["choicesde"][1]="Austria";
$elem["isdnlog/country"]["choicesde"][2]="France";
$elem["isdnlog/country"]["choicesde"][3]="Germany";
$elem["isdnlog/country"]["choicesde"][4]="Luxembourg";
$elem["isdnlog/country"]["choicesde"][5]="Netherlands";
$elem["isdnlog/country"]["choicesde"][6]="Norway";
$elem["isdnlog/country"]["choicesde"][7]="Spain";
$elem["isdnlog/country"]["choicesde"][8]="Switzerland";
$elem["isdnlog/country"]["choicesfr"][1]="Austria";
$elem["isdnlog/country"]["choicesfr"][2]="France";
$elem["isdnlog/country"]["choicesfr"][3]="Germany";
$elem["isdnlog/country"]["choicesfr"][4]="Luxembourg";
$elem["isdnlog/country"]["choicesfr"][5]="Netherlands";
$elem["isdnlog/country"]["choicesfr"][6]="Norway";
$elem["isdnlog/country"]["choicesfr"][7]="Spain";
$elem["isdnlog/country"]["choicesfr"][8]="Switzerland";
$elem["isdnlog/country"]["description"]="Country:
 Please choose the local country. This will be used to set the rate table to
 use for calculating the costs of calls.
";
$elem["isdnlog/country"]["descriptionde"]="Land:
 Bitte wählen Sie das Land aus. Dies wird verwendet, um die Kostentabelle für die Berechnung von Telefonkosten aufzubauen.
";
$elem["isdnlog/country"]["descriptionfr"]="Pays :
 Veuillez indiquer le pays local. Ce choix définit les tables de calcul utilisées pour calculer le prix d'un appel.
";
$elem["isdnlog/country"]["default"]="other";
$elem["isdnlog/country_manual"]["type"]="string";
$elem["isdnlog/country_manual"]["description"]="Country's ISO two-letter code:
 Please enter the ISO code of the local country. As no rate
 tables are available, this setting will be unused.

";
$elem["isdnlog/country_manual"]["descriptionde"]="";
$elem["isdnlog/country_manual"]["descriptionfr"]="";
$elem["isdnlog/country_manual"]["default"]="";
$elem["isdnlog/countryprefix"]["type"]="string";
$elem["isdnlog/countryprefix"]["description"]="Prefix to dial before international number:
";
$elem["isdnlog/countryprefix"]["descriptionde"]="Vorwahl für eine internationale Nummer:
";
$elem["isdnlog/countryprefix"]["descriptionfr"]="Indicatif d'accès aux numéros internationaux :
";
$elem["isdnlog/countryprefix"]["default"]="+";
$elem["isdnlog/countrycode"]["type"]="string";
$elem["isdnlog/countrycode"]["description"]="Country ITU code:
 Please enter the international code for the local country.
 .
 Example: ${default_countrycode} for ${default_country}
";
$elem["isdnlog/countrycode"]["descriptionde"]="Landesvorwahl:
 Bitte geben Sie die eigene Landesvorwahl ein:
 .
 Beispiel: ${default_countrycode} für ${default_country}
";
$elem["isdnlog/countrycode"]["descriptionfr"]="Code ITU du pays :
 Veuillez indiquer le code téléphonique international pour le pays local.
 .
 Exemple : ${default_countrycode} pour ${default_country}
";
$elem["isdnlog/countrycode"]["default"]="49";
$elem["isdnlog/areaprefix"]["type"]="string";
$elem["isdnlog/areaprefix"]["description"]="Prefix for area code, if applicable:
";
$elem["isdnlog/areaprefix"]["descriptionde"]="Vorwahl, wenn zutreffend:
";
$elem["isdnlog/areaprefix"]["descriptionfr"]="Préfixe du code de zone locale, si nécessaire :
";
$elem["isdnlog/areaprefix"]["default"]="0";
$elem["isdnlog/areacode"]["type"]="string";
$elem["isdnlog/areacode"]["description"]="Local area code, if applicable:
";
$elem["isdnlog/areacode"]["descriptionde"]="Ortsvorwahl, wenn zutreffend:
";
$elem["isdnlog/areacode"]["descriptionfr"]="Indicatif de zone locale, si nécessaire :
";
$elem["isdnlog/areacode"]["default"]="";
$elem["isdnlog/isdnrate-daemon"]["type"]="boolean";
$elem["isdnlog/isdnrate-daemon"]["description"]="Run isdnrate as a daemon?
 The isdnrate utility calculates the costs of a connection to a given
 phone number, used e.g. for LCR systems to find the cheapest carrier on a
 call-by-call basis. Having it run as a daemon speeds things up as then it
 only has to load all the data once.
 .
 This setting is only useful for special setups, such as for an
 ISDN-to-H.323 gateway.
";
$elem["isdnlog/isdnrate-daemon"]["descriptionde"]="Soll isdnrate als Daemon starten?
 Das Werkzeug isdnrate berechnet die Kosten einer Verbindung zu einer gegebenen Telefonnummer. Dies wird z.B. bei Least-Cost-Routern (LCR) benutzt, um den günstigsten Anbieter bei jedem Anruf zu ermitteln. Weil es als Daemon die gesamten Daten nur einmal laden muss, läuft es schneller.
 .
 Dies Einstellung ist nur für besondere Installationen nützlich; wie etwa für ein ISDN-H.323-Gateway.
";
$elem["isdnlog/isdnrate-daemon"]["descriptionfr"]="Faut-il exécuter isdnrate en mode démon ?
 L'utilitaire isdnrate permet de calculer les coûts de connexion vers un numéro de téléphone donné. Il peut par exemple servir aux systèmes LCR pour trouver le point d'accès le moins cher pour chaque appel. Si isdnrate fonctionne en mode démon, les opérations sont accélérées car il suffit alors de charger les données une seule fois.
 .
 Ce réglage n'est utile que pour des environnements spécifiques, par exemple une passerelle RNSI vers H.323.
";
$elem["isdnlog/isdnrate-daemon"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
