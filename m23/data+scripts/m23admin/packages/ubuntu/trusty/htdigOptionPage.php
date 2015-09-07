<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("htdig");

$elem["htdig/generate-databases"]["type"]="boolean";
$elem["htdig/generate-databases"]["description"]="Generate ht://Dig endings database now?
 The ht://Dig search engine requires an endings database which has to be
 generated before the first start. Generating the database will take a
 short while. It can be done either now or later by calling the
 '/usr/sbin/htdigconfig' script.
";
$elem["htdig/generate-databases"]["descriptionde"]="Erzeuge jetzt »ht://Dig Endings«-Datenbank?
 Die ht://Dig-Suchmaschine benötigt eine »Endings«-Datenbank, die vor dem ersten Start erzeugt werden muss. Das Erzeugen der Datenbank wird etwas Zeit in Anspruch nehmen. Sie können das jetzt erledigen, oder später das Skript /usr/sbin/htdigconfig aufrufen.
";
$elem["htdig/generate-databases"]["descriptionfr"]="Faut-il créer la base de données des suffixes de ht://Dig maintenant ?
 Le moteur de recherche ht://Dig nécessite qu'une base de données des suffixes soit créée avant sa première exécution. Créer cette base prend du temps. Vous pouvez la créer maintenant ou le faire plus tard avec le script /usr/sbin/htdigconfig.
";
$elem["htdig/generate-databases"]["default"]="true";
$elem["htdig/run-rundig"]["type"]="boolean";
$elem["htdig/run-rundig"]["description"]="Schedule a daily execution of the 'rundig' script?
 On-line content must be indexed by the 'rundig' script before
 ht://Dig can be used to search data. That script indexes the
 web content defined in /etc/htdig/htdig.conf. 
 .
 If you choose this option, a daily run of the script will be scheduled.
 You may choose to not use this option if ht://Dig is used another
 way (for instance by KDE, to
 perform local indexing). If in doubt, do not choose this option.
";
$elem["htdig/run-rundig"]["descriptionde"]="Tägliche Ausführung des »rundig«-Skripts einplanen?
 Online-Inhalte müssen durch das Skript »rundig« indiziert werden, bevor ht://Dig zur Datensuche eingesetzt werden kann. Das Skript indiziert Webinhalte gemäß der Definition in /etc/htdig/htdig.conf.
 .
 Falls Sie diese Option wählen, wird ein täglicher Lauf des Skripts eingeplant. Falls ht://Dig anderweitig benutzt wird (beispielsweise durch KDE für lokale Indizierung) könnte diese Option für Sie nicht geeignet sein. Im Zweifelsfall wählen Sie diese Option nicht.
";
$elem["htdig/run-rundig"]["descriptionfr"]="Faut-il programmer une exécution quotidienne du script « rundig » ?
 Le contenu en ligne doit être indexé par le script « rundig » pour que ht://Dig puisse être utilisé pour rechercher des données. Ce script indexe le contenu défini dans le fichier /etc/htdig/htdig.conf.
 .
 En choisissant cette option, une exécution quotidienne sera programmée. Si vous voulez utiliser ht://Dig pour d'autres usages (par exemple, pour une indexation locale par KDE), il est inutile de la choisir. Enfin, dans le doute, ne la choisissez pas.
";
$elem["htdig/run-rundig"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
