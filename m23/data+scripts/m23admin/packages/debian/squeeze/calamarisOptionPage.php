<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("calamaris");

$elem["calamaris/cache_type"]["type"]="select";
$elem["calamaris/cache_type"]["choices"][1]="auto";
$elem["calamaris/cache_type"]["choices"][2]="squid";
$elem["calamaris/cache_type"]["choicesde"][1]="automatisch";
$elem["calamaris/cache_type"]["choicesde"][2]="Squid";
$elem["calamaris/cache_type"]["choicesfr"][1]="Automatique";
$elem["calamaris/cache_type"]["choicesfr"][2]="Squid";
$elem["calamaris/cache_type"]["description"]="Type of proxy log files to analyze:
 Calamaris is able to process log files from Squid or Oops. If you choose
 'auto' it will look first for Squid log files and then for Oops log files.
 .
 Choosing 'auto' is recommended when only one proxy is installed.
 Otherwise, the appropriate setting can be enforced here.
";
$elem["calamaris/cache_type"]["descriptionde"]="Art von Proxy Protokoll-Dateien, die analysiert werden sollen:
 Calamaris kann die Log-Dateien von Squid und Oops analysieren. Falls »automatisch« ausgewählt wird, wird Calamaris zuerst nach Protokoll-Dateien von Squid und dann nach solchen von Oops suchen.
 .
 Die Wahl von »automatisch« wird empfohlen, wenn nur ein Proxy installiert ist. Andernfalls kann die geeignete Einstellung hier erzwungen werden.
";
$elem["calamaris/cache_type"]["descriptionfr"]="Types de journaux de mandataires (« proxy ») à analyser :
 Calamaris peut traiter les journaux de Squid et Oops. Si vous choisissez « Automatique », il recherchera d'abord des journaux de Squid puis ceux d'Oops.
 .
 Il est recommandé de choisir « Automatique » si un seul type de mandataire est installé. Dans le cas contraire, le choix approprié peut être effectué ici.
";
$elem["calamaris/cache_type"]["default"]="auto";
$elem["calamaris/daily/task"]["type"]="select";
$elem["calamaris/daily/task"]["choices"][1]="nothing";
$elem["calamaris/daily/task"]["choices"][2]="mail";
$elem["calamaris/daily/task"]["choices"][3]="web";
$elem["calamaris/daily/task"]["choicesde"][1]="keine";
$elem["calamaris/daily/task"]["choicesde"][2]="E-Mail";
$elem["calamaris/daily/task"]["choicesde"][3]="Web";
$elem["calamaris/daily/task"]["choicesfr"][1]="Aucune";
$elem["calamaris/daily/task"]["choicesfr"][2]="Courriel";
$elem["calamaris/daily/task"]["choicesfr"][3]="Web";
$elem["calamaris/daily/task"]["description"]="Output method for Calamaris daily analysis reports:
 The result of the Calamaris analysis can be sent as an email to a
 specified address or stored as a web page.
 .
 Please choose which of these methods you want to use.
";
$elem["calamaris/daily/task"]["descriptionde"]="Ausgabemethode für die täglichen Analyseberichte von Calamaris:
 Die Ergebnisse der Analyse von Calamaris kann als E-Mail an eine angegebene Adresse versandt oder als Webseite gespeichert werden.
 .
 Bitte wählen Sie aus, welche dieser Methoden Sie verwenden möchten.
";
$elem["calamaris/daily/task"]["descriptionfr"]="Méthode de mise à disposition des compte-rendus quotidiens de Calamaris :
 Les résultats des analyses de Calamaris peuvent être envoyés par courriel à une adresse donnée ou mis à disposition sur une page web.
 .
 Veuillez choisir la méthode que vous souhaitez utiliser.
";
$elem["calamaris/daily/task"]["default"]="mail";
$elem["calamaris/daily/mail"]["type"]="string";
$elem["calamaris/daily/mail"]["description"]="Recipient for daily analysis reports by mail:
 Please choose the address that should receive daily Calamaris
 analysis reports.
 .
 This setting is only needed if the reports are to be sent by email.
";
$elem["calamaris/daily/mail"]["descriptionde"]="Empfänger des täglichen Analyseberichts per E-Mail:
 Bitte wählen Sie die Adresse, die die täglichen Analyseberichte von Calamaris erhalten soll.
 .
 Diese Einstellung wird nur benötigt, falls die Berichte per E-Mail verschickt werden sollen.
";
$elem["calamaris/daily/mail"]["descriptionfr"]="Destinataire des compte-rendus quotidiens par courriel :
 Veuillez choisir l'adresse électronique qui recevra les compte-rendus quotidiens de Calamaris.
 .
 Ce réglage n'est utilisé que si les compte-rendus sont envoyés par courrier électronique.
";
$elem["calamaris/daily/mail"]["default"]="root";
$elem["calamaris/daily/html"]["type"]="string";
$elem["calamaris/daily/html"]["description"]="Directory for storing HTML daily analysis reports:
 Please choose the directory where daily Calamaris analysis reports
 should be stored.
 .
 This setting is only needed if the reports are to be generated as
 HTML.
";
$elem["calamaris/daily/html"]["descriptionde"]="Verzeichnis zum Speichern der täglichen Analyseberichte in HTML:
 Bitte wählen Sie das Verzeichnis, in dem die täglichen Analyseberichte von Calamaris gespeichert werden sollen.
 .
 Diese Einstellung wird nur benötigt, falls die Berichte als HTML erstellt werden sollen.
";
$elem["calamaris/daily/html"]["descriptionfr"]="Répertoire pour les compte-rendus quotidiens en format HTML :
 Veuillez choisir le répertoire où les compte-rendus quotidiens d'analyse de Calamaris seront conservés.
 .
 Ce réglage n'est utilisé que si les compte-rendus sont créés en format HTML.
";
$elem["calamaris/daily/html"]["default"]="/var/www/calamaris/daily/index.html";
$elem["calamaris/daily/title"]["type"]="string";
$elem["calamaris/daily/title"]["description"]="Title of the daily analysis reports:
 Please choose the text that will be used as a prefix to the title for
 the daily Calamaris analysis reports.
";
$elem["calamaris/daily/title"]["descriptionde"]="Titel der täglichen Analyseberichte:
 Bitte wählen Sie den Text, der vor den Titel für die täglichen Analyseberichte von Calamaris gestellt werden soll.
";
$elem["calamaris/daily/title"]["descriptionfr"]="Titre pour les compte-rendus quotidiens :
 Veuillez choisir le texte qui sera utilisé comme préfixe du titre des compte-rendus quotidiens d'analyse de Calamaris.
";
$elem["calamaris/daily/title"]["default"]="Squid daily";
$elem["calamaris/weekly/task"]["type"]="select";
$elem["calamaris/weekly/task"]["choices"][1]="nothing";
$elem["calamaris/weekly/task"]["choices"][2]="mail";
$elem["calamaris/weekly/task"]["choices"][3]="web";
$elem["calamaris/weekly/task"]["choicesde"][1]="keine";
$elem["calamaris/weekly/task"]["choicesde"][2]="E-Mail";
$elem["calamaris/weekly/task"]["choicesde"][3]="Web";
$elem["calamaris/weekly/task"]["choicesfr"][1]="Aucune";
$elem["calamaris/weekly/task"]["choicesfr"][2]="Courriel";
$elem["calamaris/weekly/task"]["choicesfr"][3]="Web";
$elem["calamaris/weekly/task"]["description"]="Output method for Calamaris weekly analysis reports:
 The result of the Calamaris analysis can be sent as an email to a
 specified address or stored as a web page.
 .
 Please choose which of these methods you want to use.
";
$elem["calamaris/weekly/task"]["descriptionde"]="Ausgabemethode für die wöchentlichen Analyseberichte von Calamaris:
 Die Ergebnisse der Analyse von Calamaris kann als E-Mail an eine angegebene Adresse versandt oder als Webseite gespeichert werden.
 .
 Bitte wählen Sie aus, welche dieser Methoden Sie verwenden möchten.
";
$elem["calamaris/weekly/task"]["descriptionfr"]="Méthode de mise à disposition des compte-rendus hebdomadaires de Calamaris :
 Les résultats des analyses de Calamaris peuvent être envoyés par courriel à une adresse donnée ou mis à disposition sur une page web.
 .
 Veuillez choisir la méthode que vous souhaitez utiliser.
";
$elem["calamaris/weekly/task"]["default"]="mail";
$elem["calamaris/weekly/mail"]["type"]="string";
$elem["calamaris/weekly/mail"]["description"]="Recipient for weekly analysis reports by mail:
 Please choose the address that should receive weekly Calamaris
 analysis reports.
 .
 This setting is only needed if the reports are to be sent by email.
";
$elem["calamaris/weekly/mail"]["descriptionde"]="Empfänger des wöchentlichen Analyseberichts per E-Mail:
 Bitte wählen Sie die Adresse, die die wöchentlichen Analyseberichte von Calamaris erhalten soll.
 .
 Diese Einstellung wird nur benötigt, falls die Berichte per E-Mail verschickt werden sollen.
";
$elem["calamaris/weekly/mail"]["descriptionfr"]="Destinataire des compte-rendus hebdomadaires par courriel :
 Veuillez choisir l'adresse électronique qui recevra les compte-rendus hebdomadaires de Calamaris.
 .
 Ce réglage n'est utilisé que si les compte-rendus sont envoyés par courrier électronique.
";
$elem["calamaris/weekly/mail"]["default"]="root";
$elem["calamaris/weekly/html"]["type"]="string";
$elem["calamaris/weekly/html"]["description"]="Directory for storing HTML weekly analysis reports:
 Please choose the directory where weekly Calamaris analysis reports
 should be stored.
 .
 This setting is only needed if the reports are to be generated as
 HTML.
";
$elem["calamaris/weekly/html"]["descriptionde"]="Verzeichnis zum Speichern der wöchentlichen Analyseberichte in HTML:
 Bitte wählen Sie das Verzeichnis, in dem die wöchentlichen Analyseberichte von Calamaris gespeichert werden sollen.
 .
 Diese Einstellung wird nur benötigt, falls die Berichte als HTML erstellt werden sollen.
";
$elem["calamaris/weekly/html"]["descriptionfr"]="Répertoire pour les compte-rendus hebdomadaires en format HTML :
 Veuillez choisir le répertoire où les compte-rendus hebdomadaires d'analyse de Calamaris seront conservés.
 .
 Ce réglage n'est utilisé que si les compte-rendus sont créés en format HTML.
";
$elem["calamaris/weekly/html"]["default"]="/var/www/calamaris/weekly/index.html";
$elem["calamaris/weekly/title"]["type"]="string";
$elem["calamaris/weekly/title"]["description"]="Title of the weekly analysis reports:
 Please choose the text that will be used as a prefix to the title for
 the weekly Calamaris analysis reports.
";
$elem["calamaris/weekly/title"]["descriptionde"]="Titel der wöchentlichen Analyseberichte:
 Bitte wählen Sie den Text, der vor den Titel für die wöchentlichen Analyseberichte von Calamaris gestellt werden soll.
";
$elem["calamaris/weekly/title"]["descriptionfr"]="Titre pour les compte-rendus hebdomadaires :
 Veuillez choisir le texte qui sera utilisé comme préfixe du titre des compte-rendus hebdomadaires d'analyse de Calamaris.
";
$elem["calamaris/weekly/title"]["default"]="Squid weekly";
$elem["calamaris/monthly/task"]["type"]="select";
$elem["calamaris/monthly/task"]["choices"][1]="nothing";
$elem["calamaris/monthly/task"]["choices"][2]="mail";
$elem["calamaris/monthly/task"]["choices"][3]="web";
$elem["calamaris/monthly/task"]["choicesde"][1]="keine";
$elem["calamaris/monthly/task"]["choicesde"][2]="E-Mail";
$elem["calamaris/monthly/task"]["choicesde"][3]="Web";
$elem["calamaris/monthly/task"]["choicesfr"][1]="Aucune";
$elem["calamaris/monthly/task"]["choicesfr"][2]="Courriel";
$elem["calamaris/monthly/task"]["choicesfr"][3]="Web";
$elem["calamaris/monthly/task"]["description"]="Output method for Calamaris monthly analysis reports:
 The result of the Calamaris analysis can be sent as an email to a
 specified address or stored as a web page.
 .
 Please choose which of these methods you want to use.
";
$elem["calamaris/monthly/task"]["descriptionde"]="Ausgabemethode für die monatlichen Analyseberichte von Calamaris:
 Die Ergebnisse der Analyse von Calamaris kann als E-Mail an eine angegebene Adresse versandt oder als Webseite gespeichert werden.
 .
 Bitte wählen Sie aus, welche dieser Methoden Sie verwenden möchten.
";
$elem["calamaris/monthly/task"]["descriptionfr"]="Méthode de mise à disposition des compte-rendus mensuels de Calamaris :
 Les résultats des analyses de Calamaris peuvent être envoyés par courriel à une adresse donnée ou mis à disposition sur une page web.
 .
 Veuillez choisir la méthode que vous souhaitez utiliser.
";
$elem["calamaris/monthly/task"]["default"]="mail";
$elem["calamaris/monthly/mail"]["type"]="string";
$elem["calamaris/monthly/mail"]["description"]="Recipient for monthly analysis reports by mail:
 Please choose the address that should receive monthly Calamaris
 analysis reports.
 .
 This setting is only needed if the reports are to be sent by email.
";
$elem["calamaris/monthly/mail"]["descriptionde"]="Empfänger der monatlichen Analyseberichte per E-Mail:
 Bitte wählen Sie die Adresse, die die monatlichen Analyseberichte von Calamaris erhalten soll.
 .
 Diese Einstellung wird nur benötigt, falls die Berichte per E-Mail verschickt werden sollen.
";
$elem["calamaris/monthly/mail"]["descriptionfr"]="Destinataire des compte-rendus mensuels par courriel :
 Veuillez choisir l'adresse électronique qui recevra les compte-rendus mensuels de Calamaris.
 .
 Ce réglage n'est utilisé que si les compte-rendus sont envoyés par courrier électronique.
";
$elem["calamaris/monthly/mail"]["default"]="root";
$elem["calamaris/monthly/html"]["type"]="string";
$elem["calamaris/monthly/html"]["description"]="Directory for storing HTML monthly analysis reports:
 Please choose the directory where monthly Calamaris analysis reports
 should be stored.
 .
 This setting is only needed if the reports are to be generated as
 HTML.
";
$elem["calamaris/monthly/html"]["descriptionde"]="Verzeichnis zum Speichern der monatlichen Analyseberichte in HTML:
 Bitte wählen Sie das Verzeichnis, in dem die monatlichen Analyseberichte von Calamaris gespeichert werden sollen.
 .
 Diese Einstellung wird nur benötigt, falls die Berichte als HTML erstellt werden sollen.
";
$elem["calamaris/monthly/html"]["descriptionfr"]="Répertoire pour les compte-rendus mensuels en format HTML :
 Veuillez choisir le répertoire où les compte-rendus mensuels d'analyse de Calamaris seront conservés.
 .
 Ce réglage n'est utilisé que si les compte-rendus sont créés en format HTML.
";
$elem["calamaris/monthly/html"]["default"]="/var/www/calamaris/monthly/index.html";
$elem["calamaris/monthly/title"]["type"]="string";
$elem["calamaris/monthly/title"]["description"]="Title of the monthly analysis reports:
 Please choose the text that will be used as a prefix to the title for
 the monthly Calamaris analysis reports.
";
$elem["calamaris/monthly/title"]["descriptionde"]="Titel der monatlichen Analyseberichte:
 Bitte wählen Sie den Text, der vor den Titel für die monatlichen Analyseberichte von Calamaris gestellt werden soll.
";
$elem["calamaris/monthly/title"]["descriptionfr"]="Titre pour les compte-rendus mensuels :
 Veuillez choisir le texte qui sera utilisé comme préfixe du titre des compte-rendus mensuels d'analyse de Calamaris.
";
$elem["calamaris/monthly/title"]["default"]="Squid monthly";
PKG_OptionPageTail2($elem);
?>
