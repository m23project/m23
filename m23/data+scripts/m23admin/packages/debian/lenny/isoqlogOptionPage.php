<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("isoqlog");

$elem["isoqlog/main_logtype"]["type"]="select";
$elem["isoqlog/main_logtype"]["choices"][1]="qmail-multilog";
$elem["isoqlog/main_logtype"]["choices"][2]="qmail-syslog";
$elem["isoqlog/main_logtype"]["choices"][3]="postfix";
$elem["isoqlog/main_logtype"]["choices"][4]="sendmail";
$elem["isoqlog/main_logtype"]["description"]="MTA log type:
 Isoqlog has multi-mta support. You must select the logformat which is used by
 your mail server.
";
$elem["isoqlog/main_logtype"]["descriptionde"]="Protokolltyp des MTAs:
 Isoqlog unterstützt mehrere MTAs. Sie müssen das Protokollformat auswählen, das Ihr E-Mail-Server verwendet.
";
$elem["isoqlog/main_logtype"]["descriptionfr"]="Type de journal de votre serveur de courriel :
 Isoqlog gère plusieurs serveurs de courriel (« MTA : Mail Transport Agent »). Vous devez choisir le format des journaux utilisé par le vôtre.
";
$elem["isoqlog/main_logtype"]["default"]="exim";
$elem["isoqlog/main_outputdir"]["type"]="string";
$elem["isoqlog/main_outputdir"]["description"]="Directory to use for HTML outputs:
 Please choose the directory where isoqlog should write its output. It
 must be in \"WebRoot\" of your webserver.
";
$elem["isoqlog/main_outputdir"]["descriptionde"]="Verzeichnis für die HTML-Ausgaben:
 Bitte wählen Sie das Verzeichnis aus, in das Isoqlog seine Ausgaben ablegt. Ihr Webserver muss darauf zugreifen können (innerhalb von »WebRoot«).
";
$elem["isoqlog/main_outputdir"]["descriptionfr"]="Répertoire à utiliser pour les sorties HTML :
 Veuillez choisir le répertoire où isoqlog écrira ses résultats. Il doit être situé à la racine de votre serveur web.
";
$elem["isoqlog/main_outputdir"]["default"]="/var/www/isoqlog";
$elem["isoqlog/main_hostname"]["type"]="string";
$elem["isoqlog/main_hostname"]["description"]="Local host name:
";
$elem["isoqlog/main_hostname"]["descriptionde"]="Lokaler Rechnername:
";
$elem["isoqlog/main_hostname"]["descriptionfr"]="Nom d'hôte local :
";
$elem["isoqlog/main_hostname"]["default"]="localhost";
$elem["isoqlog/main_langfile"]["type"]="select";
$elem["isoqlog/main_langfile"]["choices"][1]="Bulgarian";
$elem["isoqlog/main_langfile"]["choices"][2]="Czech";
$elem["isoqlog/main_langfile"]["choices"][3]="Danish";
$elem["isoqlog/main_langfile"]["choices"][4]="Dutch";
$elem["isoqlog/main_langfile"]["choices"][5]="English";
$elem["isoqlog/main_langfile"]["choices"][6]="Finnish";
$elem["isoqlog/main_langfile"]["choices"][7]="French";
$elem["isoqlog/main_langfile"]["choices"][8]="German";
$elem["isoqlog/main_langfile"]["choices"][9]="Italian";
$elem["isoqlog/main_langfile"]["choices"][10]="Norwegian";
$elem["isoqlog/main_langfile"]["choices"][11]="Polish";
$elem["isoqlog/main_langfile"]["choices"][12]="Portuguese";
$elem["isoqlog/main_langfile"]["choices"][13]="Romanian";
$elem["isoqlog/main_langfile"]["choices"][14]="Russian";
$elem["isoqlog/main_langfile"]["choices"][15]="Spanish";
$elem["isoqlog/main_langfile"]["choices"][16]="Swedish";
$elem["isoqlog/main_langfile"]["choicesde"][1]="Bulgarisch";
$elem["isoqlog/main_langfile"]["choicesde"][2]="Tschechisch";
$elem["isoqlog/main_langfile"]["choicesde"][3]="Dänisch";
$elem["isoqlog/main_langfile"]["choicesde"][4]="Niederländisch";
$elem["isoqlog/main_langfile"]["choicesde"][5]="Englisch";
$elem["isoqlog/main_langfile"]["choicesde"][6]="Finnisch";
$elem["isoqlog/main_langfile"]["choicesde"][7]="Französisch";
$elem["isoqlog/main_langfile"]["choicesde"][8]="Deutsch";
$elem["isoqlog/main_langfile"]["choicesde"][9]="Italienisch";
$elem["isoqlog/main_langfile"]["choicesde"][10]="Norwegisch";
$elem["isoqlog/main_langfile"]["choicesde"][11]="Polnisch";
$elem["isoqlog/main_langfile"]["choicesde"][12]="Portugiesisch";
$elem["isoqlog/main_langfile"]["choicesde"][13]="Rumänisch";
$elem["isoqlog/main_langfile"]["choicesde"][14]="Russisch";
$elem["isoqlog/main_langfile"]["choicesde"][15]="Spanisch";
$elem["isoqlog/main_langfile"]["choicesde"][16]="Schwedisch";
$elem["isoqlog/main_langfile"]["choicesfr"][1]="bulgare";
$elem["isoqlog/main_langfile"]["choicesfr"][2]="tchèque";
$elem["isoqlog/main_langfile"]["choicesfr"][3]="danois";
$elem["isoqlog/main_langfile"]["choicesfr"][4]="néerlandais";
$elem["isoqlog/main_langfile"]["choicesfr"][5]="anglais";
$elem["isoqlog/main_langfile"]["choicesfr"][6]="finlandais";
$elem["isoqlog/main_langfile"]["choicesfr"][7]="français";
$elem["isoqlog/main_langfile"]["choicesfr"][8]="allemand";
$elem["isoqlog/main_langfile"]["choicesfr"][9]="italien";
$elem["isoqlog/main_langfile"]["choicesfr"][10]="norvégien";
$elem["isoqlog/main_langfile"]["choicesfr"][11]="polonais";
$elem["isoqlog/main_langfile"]["choicesfr"][12]="portugais";
$elem["isoqlog/main_langfile"]["choicesfr"][13]="roumain";
$elem["isoqlog/main_langfile"]["choicesfr"][14]="russe";
$elem["isoqlog/main_langfile"]["choicesfr"][15]="espagnol";
$elem["isoqlog/main_langfile"]["choicesfr"][16]="suédois";
$elem["isoqlog/main_langfile"]["description"]="Language to use for outputs:
 Isoqlog has multi language support on reports. You can select the
 preferred language for outputs.
";
$elem["isoqlog/main_langfile"]["descriptionde"]="Sprache für die Ausgaben:
 Isoqlog unterstützt in den Berichten viele Sprachen. Sie können die bevorzugte Sprache für die Ausgaben auswählen.
";
$elem["isoqlog/main_langfile"]["descriptionfr"]="Langue utilisée pour les résultats :
 Isoqlog gère plusieurs langues pour les rapports. Vous devez choisir la langue préférée pour les sorties.
";
$elem["isoqlog/main_langfile"]["default"]="English";
$elem["isoqlog/main_domains"]["type"]="string";
$elem["isoqlog/main_domains"]["description"]="Domains for which you want to make reports:
 Isoqlog can display Top incoming, outgoing, total, and byte based
 statistics for each domain. Please enter the domains separated by spaces.
";
$elem["isoqlog/main_domains"]["descriptionde"]="Domänen, für die Sie Berichte erstellen wollen:
 Isoqlog kann Statistiken zu Ein- und Ausgang, über alles oder nach der Größe in Byte für jede Domäne anzeigen. Bitte die Domänennamen durch Leerzeichen getrennt eingeben.
";
$elem["isoqlog/main_domains"]["descriptionfr"]="Domaines pour lesquels vous désirez des rapports :
 Isoqlog peut afficher des statistiques sur le nombre de courriels entrants sortants et totaux ainsi que sur la taille en octets des messages pour chaque domaine. Veuillez indiquer les différents domaines séparés par des espaces.
";
$elem["isoqlog/main_domains"]["default"]="";
PKG_OptionPageTail2($elem);
?>
