<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bidentd");

$elem["bidentd/loglevel"]["type"]="select";
$elem["bidentd/loglevel"]["choices"][1]="Be very quiet";
$elem["bidentd/loglevel"]["choices"][2]="Be quiet";
$elem["bidentd/loglevel"]["choices"][3]="Log all requests";
$elem["bidentd/loglevel"]["choices"][4]="Be somewhat verbose";
$elem["bidentd/loglevel"]["choices"][5]="Be quite verbose";
$elem["bidentd/loglevel"]["choices"][6]="Be really verbose";
$elem["bidentd/loglevel"]["choicesde"][1]="Sehr zurückhaltend";
$elem["bidentd/loglevel"]["choicesde"][2]="Zurückhaltend";
$elem["bidentd/loglevel"]["choicesde"][3]="Alle Anfragen";
$elem["bidentd/loglevel"]["choicesde"][4]="Etwas gesprächig";
$elem["bidentd/loglevel"]["choicesde"][5]="Ziemlich gesprächig";
$elem["bidentd/loglevel"]["choicesde"][6]="Sehr gesprächig";
$elem["bidentd/loglevel"]["choicesfr"][1]="Très silencieux";
$elem["bidentd/loglevel"]["choicesfr"][2]="Silencieux";
$elem["bidentd/loglevel"]["choicesfr"][3]="Tout journaliser";
$elem["bidentd/loglevel"]["choicesfr"][4]="Un peu bavard";
$elem["bidentd/loglevel"]["choicesfr"][5]="Assez bavard";
$elem["bidentd/loglevel"]["choicesfr"][6]="Très bavard";
$elem["bidentd/loglevel"]["description"]="Logging level for bidentd:
 Bisqwit's IDENT Daemon can emit various amounts of information to the
 daemon facility of the system logs.
 .
 The choices have the following meaning:
   \"Be very quiet\"        Log nothing
   \"Be quiet\"             Log only errors
   \"Log all requests\"     Log all requests (can generate lots of noise)
   \"Be somewhat verbose\"  Log a little more than with \"log all requests\"
   \"Be quite verbose\"     Log even more than \"be somewhat verbose\"
   \"Be really verbose\"    Log very much (will generate lots of noise)
   \"Manual config\"        Do not touch inetd.conf
 .
 You should choose \"Log all requests\" unless you know you need one of the 
 other choices. The verbose options are mostly useful for debugging.
";
$elem["bidentd/loglevel"]["descriptionde"]="Protokollierungsart für bidentd
 Bisqwit's IDENT Daemon kann unterschiedlich viele Informationen über den Dienst in die System-Protokolldateien schreiben.
 .
 Die Auswahl bedeutet:
   \"Sehr zurückhaltend\"     Nichts protokollieren
   \"Zurückhaltend\"          Nur Fehler protokollieren
   \"Alle Anfragen\"          Alle Anfragen protokollieren (Das kann viele Meldungen erzeugen.)
   \"Etwas gesprächig\"       Etwas mehr als \"Alle Anfragen\" protokollieren
   \"Ziemlich gesprächig\"    Noch mehr als \"Etwas gesprächig\" protokollieren
   \"Sehr gesprächig\"        Sehr viel protokollieren (Das wird sehr viele Meldungen erzeugen.)
   \"Manuelle Einstellung\"   Die Datei inetd.conf unverändert lassen.
 .
 Sie sollten \"Alle Anfragen\" auswählen, wenn Sie keine der anderen Möglichkeiten benötigen. Die gesprächigen Stufen sind meistens für die Fehlersuche nötig.
";
$elem["bidentd/loglevel"]["descriptionfr"]="Veuillez choisir le niveau de journalisation du démon ident de Bisqwit
 Le démon ident de Bisqwit peut envoyer des quantités variables d'information au démon de journalisation du système, dans la catégorie « daemon ». 
 .
 Les choix sont les suivants :
  - Très silencieux  : rien n'est envoyé ;
  - Silencieux       : journalisation des seules erreurs ;
  - Tout journaliser : journalisation de chaque requête (cela peut
                       être assez bavard) ;
  - Un peu bavard    : journalisation légèrement plus importante
                       que « Tout journaliser » ;
  - Assez bavard     : journalisation encore plus importante ;
  - Très bavard      : très importante journalisation (et envoi
                       d'une grande quantité d'informations) ;
  - Config. manuelle : pas de modification d'inetd.conf.
 .
 Vous devriez choisir « Tout journaliser » à moins d'être certain d'avoir besoin d'un réglage différent. Les options « bavardes » sont essentiellement nécessaires pour le débogage.
";
$elem["bidentd/loglevel"]["default"]="Log all requests";
PKG_OptionPageTail2($elem);
?>
