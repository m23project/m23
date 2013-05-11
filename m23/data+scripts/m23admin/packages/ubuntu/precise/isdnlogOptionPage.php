<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isdnlog");

$elem["isdnlog/country"]["type"]="select";
$elem["isdnlog/country"]["choices"][1]="AT";
$elem["isdnlog/country"]["choices"][2]="CH";
$elem["isdnlog/country"]["choices"][3]="DE";
$elem["isdnlog/country"]["choices"][4]="ES";
$elem["isdnlog/country"]["choices"][5]="FR";
$elem["isdnlog/country"]["choices"][6]="LU";
$elem["isdnlog/country"]["choices"][7]="NL";
$elem["isdnlog/country"]["choices"][8]="NO";
$elem["isdnlog/country"]["choicesde"][1]="AT";
$elem["isdnlog/country"]["choicesde"][2]="CH";
$elem["isdnlog/country"]["choicesde"][3]="DE";
$elem["isdnlog/country"]["choicesde"][4]="ES";
$elem["isdnlog/country"]["choicesde"][5]="FR";
$elem["isdnlog/country"]["choicesde"][6]="LU";
$elem["isdnlog/country"]["choicesde"][7]="NL";
$elem["isdnlog/country"]["choicesde"][8]="NO";
$elem["isdnlog/country"]["choicesfr"][1]="Autriche";
$elem["isdnlog/country"]["choicesfr"][2]="Suisse";
$elem["isdnlog/country"]["choicesfr"][3]="Allemagne";
$elem["isdnlog/country"]["choicesfr"][4]="Espagne";
$elem["isdnlog/country"]["choicesfr"][5]="France";
$elem["isdnlog/country"]["choicesfr"][6]="Luxembourg";
$elem["isdnlog/country"]["choicesfr"][7]="Pays-Bas";
$elem["isdnlog/country"]["choicesfr"][8]="Norvège";
$elem["isdnlog/country"]["description"]="What country is this system in?
 This is used for setting a number of defaults, e.g. what rate tables to
 use for calculating the cost of a call.
";
$elem["isdnlog/country"]["descriptionde"]="In welchem Land steht dieser Rechner?
 Dies wird für einige Voreinstellungen benutzt. Zum Beispiel für die Berechnung von Telefonkosten.
";
$elem["isdnlog/country"]["descriptionfr"]="Dans quel pays se trouve le système ?
 Ce choix définit certains paramètres par défaut ; p. ex. les tables de conversion pour calculer le prix d'un appel.
";
$elem["isdnlog/country"]["default"]="DE";
$elem["isdnlog/country_manual"]["type"]="string";
$elem["isdnlog/country_manual"]["description"]="Enter the ISO two-letter code for your country
 This can't really be used for setting any defaults, but maybe some day...
 .
 Note that you will probably have to edit /etc/isdn/isdn.conf before
 isdnlog will be able to work.
";
$elem["isdnlog/country_manual"]["descriptionde"]="Geben Sie die ISO-Bezeichnung (zwei Buchstaben) für Ihr Land an
 Dies wird momentan nicht für das Setzen von Voreinstellungen benutzt, aber vielleicht in zukünftigen Versionen ...
 .
 Beachten Sie, dass Sie wahrscheinlich die Datei /etc/isdn/isdn.conf bearbeiten müssen, bevor isdnlog arbeiten kann.
";
$elem["isdnlog/country_manual"]["descriptionfr"]="Donnez les deux lettres correspondant au code ISO de votre pays
 Cela ne sert pas vraiment, mais peut-être un jour...
 .
 Veuillez noter que vous devrez sans doute modifier /etc/isdn/isdn.conf avant qu'isdnlog ne puisse fonctionner.
";
$elem["isdnlog/country_manual"]["default"]="";
$elem["isdnlog/countryprefix"]["type"]="string";
$elem["isdnlog/countryprefix"]["description"]="What is used to indicate an international number?
";
$elem["isdnlog/countryprefix"]["descriptionde"]="Wie wird die Wahl einer internationalen Nummer eingeleitet?
";
$elem["isdnlog/countryprefix"]["descriptionfr"]="Quel est l'indicatif pour l'international ?
";
$elem["isdnlog/countryprefix"]["default"]="+";
$elem["isdnlog/countrycode"]["type"]="string";
$elem["isdnlog/countrycode"]["description"]="What is the countrycode for your country?
 e.g. ${default_countrycode} for ${default_country}
";
$elem["isdnlog/countrycode"]["descriptionde"]="Wie lautet die Landesvorwahl für Ihr Land?
 z.B. ${default_countrycode} für ${default_country}
";
$elem["isdnlog/countrycode"]["descriptionfr"]="Quel est l'indicatif de votre pays ?
 p. ex. ${default_countrycode} pour ${default_country}
";
$elem["isdnlog/countrycode"]["default"]="49";
$elem["isdnlog/areaprefix"]["type"]="string";
$elem["isdnlog/areaprefix"]["description"]="What is used to indicate an areacode, if applicable?
";
$elem["isdnlog/areaprefix"]["descriptionde"]="Wie wird die Wahl einer Außerortsnummer eingeleitet, wenn zutreffend?
";
$elem["isdnlog/areaprefix"]["descriptionfr"]="Quel est votre préfixe de zone, si nécessaire ?
";
$elem["isdnlog/areaprefix"]["default"]="0";
$elem["isdnlog/areacode"]["type"]="string";
$elem["isdnlog/areacode"]["description"]="What is your local areacode, if applicable?
";
$elem["isdnlog/areacode"]["descriptionde"]="Wie ist die Ortsvorwahl, wenn zutreffend?
";
$elem["isdnlog/areacode"]["descriptionfr"]="Quel est votre indicatif de zone locale, si nécessaire ?
";
$elem["isdnlog/areacode"]["default"]="";
$elem["isdnlog/isdnrate-daemon"]["type"]="select";
$elem["isdnlog/isdnrate-daemon"]["choices"][1]="no";
$elem["isdnlog/isdnrate-daemon"]["description"]="Run isdnrate as a daemon?
 isdnrate is a utility to calculate the costs of a connection to a given
 phone number, used e.g. for LCR systems to find the cheapest carrier on a
 call-by-call basis. Having it run as a daemon speeds things up as then it
 only has to load all the data just once.
 .
 This is only for people with special requirements, such as those using the
 isdn2h323 package. Hence most people should say \"no\".
";
$elem["isdnlog/isdnrate-daemon"]["descriptionde"]="Soll isdnrate als Daemon starten?
 isdnrate ist ein Werkzeug für die Berechnung der Kosten einer Verbindung zu einer gegebenen Telefonnummer. Dies wird z.B. bei Least-Cost-Routern (LCR) benutzt, um den günstigsten Anbieter herauszufinden. Weil es als Daemon die gesamten Daten nur einmal laden muss, läuft es schneller.
 .
 Dies ist für Leute mit speziellen Bedürfnissen, wie diejenigen, die das isdn2h323-Paket benutzen. Die meisten sollten hier »no« wählen.
";
$elem["isdnlog/isdnrate-daemon"]["descriptionfr"]="Faut-il exécuter isdnrate en mode démon ?
 Isdnrate est un utilitaire permettant de calculer les coûts de connexion vers un numéro de téléphone donné. Il peut par exemple servir aux systèmes LCR pour trouver le point d'accès le moins cher sur une base appel par appel. Si isdnrate fonctionne en mode démon, les opérations sont accélérées car il suffit alors de charger les données une seule fois. 
 .
 C'est uniquement destiné aux utilisateurs de certains paquets, notamment isdn2h323. En conséquence, la majorité des utilisateurs devraient refuser ici.
";
$elem["isdnlog/isdnrate-daemon"]["default"]="no";
PKG_OptionPageTail2($elem);
?>
