<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pdbv");

$elem["pdbv/listing"]["type"]="select";
$elem["pdbv/listing"]["choices"][1]="all";
$elem["pdbv/listing"]["description"]="Listing type:
 Which type of listing should be generated?
 .
 You should pick the basic listing only if you encounter resource usage issues.
";
$elem["pdbv/listing"]["descriptionde"]="Listentyp:
 Welche Art von Listen soll erstellt werden?
 .
 Sie sollten die einfache Liste (»basic«) nur auswählen, wenn Sie beim Gebrauch Probleme mit den System-Ressourcen feststellen.
";
$elem["pdbv/listing"]["descriptionfr"]="Type de liste :
 Veuillez choisir le type de liste à créer.
 .
 Vous devriez choisir le type basique seulement si vous rencontrez des problèmes de consommation des ressources système.
";
$elem["pdbv/listing"]["default"]="all";
$elem["pdbv/light"]["type"]="boolean";
$elem["pdbv/light"]["description"]="Do you want to activate the lighter output generation option?
 .
 If you activate it, pdbv will run faster but the output will be
 way less polished.
 .
 For instance, the listing type will be reset to basic.
";
$elem["pdbv/light"]["descriptionde"]="Wollen Sie die Ausgaben ressourcenschonend erzeugen?
 .
 Wenn Sie zustimmen, wird Pdbv schneller fertig sein, aber die Ausgaben sind weniger aufbereitet.
 .
 Der Listentyp wird dabei auf »basic« zurückgesetzt.
";
$elem["pdbv/light"]["descriptionfr"]="Faut-il activer la création « allégée » de données ?
 .
 Si vous choisissez cette option, la création des données sera accélérée mais celles-ci seront moins détaillées.
 .
 Par exemple, le type de liste créé sera relativement simple.
";
$elem["pdbv/light"]["default"]="false";
$elem["pdbv/output_dir"]["type"]="string";
$elem["pdbv/output_dir"]["description"]="Directory for generated output:
 The default value, /var/www/pdbv, is a public area.
";
$elem["pdbv/output_dir"]["descriptionde"]="Verzeichnis für die erzeugten Ausgabedateien:
 Der Standardwert ist /var/www/pdbv, ein öffentlicher Bereich.
";
$elem["pdbv/output_dir"]["descriptionfr"]="Répertoire de destination pour la création des données :
 La valeur par défaut, /var/www/pdbv, est un espace public.
";
$elem["pdbv/output_dir"]["default"]="/var/www/pdbv";
$elem["pdbv/clean_output_dir"]["type"]="boolean";
$elem["pdbv/clean_output_dir"]["description"]="Remove generated data at deinstallation?
";
$elem["pdbv/clean_output_dir"]["descriptionde"]="Die erzeugten Daten beim Deinstallieren des Pakets entfernen?
";
$elem["pdbv/clean_output_dir"]["descriptionfr"]="Faut-il supprimer les données créées lors de la désinstallation ?
";
$elem["pdbv/clean_output_dir"]["default"]="true";
$elem["pdbv/cron"]["type"]="select";
$elem["pdbv/cron"]["choices"][1]="hourly";
$elem["pdbv/cron"]["choices"][2]="daily";
$elem["pdbv/cron"]["description"]="Frequency for running pdbv via cron:
 With pdbv 2.x, hourly is fine. \"No cron job\" means that no cronjob
 will run pdbv.
";
$elem["pdbv/cron"]["descriptionde"]="Wann soll Pdbv durch Cron gestartet werden:
 Ab Version pdbv 2.x ist es zu empfehlen, Pdbv stündlich (»hourly«) durch Cron laufen zu lassen. Die Auswahl »no cron job« bedeutet, dass Pdbv nicht automatisch durch einen Cronjob gestartet wird.
";
$elem["pdbv/cron"]["descriptionfr"]="Fréquence d'exécution de pdbv via cron :
 Avec pdbv 2.x, « Toutes les heures » est parfait. « Pas de tâche périodique » signifie qu'aucune tâche périodique ne lancera pdbv.
";
$elem["pdbv/cron"]["default"]="hourly";
$elem["pdbv/cron_lang"]["type"]="string";
$elem["pdbv/cron_lang"]["description"]="Forced locale:
 Sometimes, cron fails to identify the appropriate LC and LANG settings.
 You can force the use of a specific locale. For instance, choose fr_FR for
 forcing the use of a french locale
";
$elem["pdbv/cron_lang"]["descriptionde"]="Spracheinstellung festlegen:
 Manchmal kann Cron die passenden Spracheinstellungen (der Umgebungsvariablen LC und LANG) nicht feststellen. Sie können hier eine spezielle Spracheinstellung festlegen. Wenn Sie z. B. Deutsch fest vorgeben wollen, sollten Sie »de_DE« eingeben.
";
$elem["pdbv/cron_lang"]["descriptionfr"]="Paramètres régionaux forcés :
 Parfois, cron échoue lors de la reconnaissance des paramètres LC et LANG. Vous pouvez forcer l'utilisation de paramètres régionaux. Par exemple, indiquez fr_FR pour forcer l'utilisation d'un environnement français.
";
$elem["pdbv/cron_lang"]["default"]="";
$elem["pdbv/force"]["type"]="boolean";
$elem["pdbv/force"]["description"]="Skip tests and regenerate the whole output?
 This option allows pdbv to skip tests and always regenerate the whole output.
 .
 Unless you have a particular reason to change this behavior, choose false.
";
$elem["pdbv/force"]["descriptionde"]="Tests überspringen und alle Ausgaben neu erzeugen?
 Wenn Sie zustimmen, wird Pdbv alle Tests überspringen und immer alle Ausgabedateien neu zu erzeugen.
 .
 Wenn Sie keinen besonderen Grund haben, das zu ändern, sollten Sie ablehnen.
";
$elem["pdbv/force"]["descriptionfr"]="Faut-il sauter les tests et recréer la sortie complète ?
 Cette option permet à pdbv de sauter les tests et de recréer une sortie complète à chaque exécution.
 .
 Vous ne devriez choisir cette option que dans des cas bien précis.
";
$elem["pdbv/force"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
