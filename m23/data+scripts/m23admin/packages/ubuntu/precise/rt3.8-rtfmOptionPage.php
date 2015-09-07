<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rt3.8-rtfm");

$elem["rt3.8-rtfm/modify-database-permission"]["type"]="select";
$elem["rt3.8-rtfm/modify-database-permission"]["choices"][1]="allow";
$elem["rt3.8-rtfm/modify-database-permission"]["choices"][2]="prompt";
$elem["rt3.8-rtfm/modify-database-permission"]["choicesde"][1]="Erlauben";
$elem["rt3.8-rtfm/modify-database-permission"]["choicesde"][2]="Fragen";
$elem["rt3.8-rtfm/modify-database-permission"]["choicesfr"][1]="Modifier";
$elem["rt3.8-rtfm/modify-database-permission"]["choicesfr"][2]="Demander";
$elem["rt3.8-rtfm/modify-database-permission"]["description"]="Permission to modify the Request Tracker database:
 RTFM needs some modifications in the Request Tracker database to be
 functional. These modifications can be made automatically or
 you may be prompted when they are needed. Alternatively, you can run
 the necessary commands manually.
 .
 Please check the README.Debian file for more details.
";
$elem["rt3.8-rtfm/modify-database-permission"]["descriptionde"]="Erlaubnis, um die Datenbank zur Anfrageverfolgung zu bearbeiten:
 Um zu funktionieren, benötigt RTFM einige Anpassungen in der Datenbank zur Anfrageverfolgung. Diese Anpassungen können automatisch erfolgen oder Sie können bei Bedarf danach gefragt werden. Alternativ können Sie die benötigten Befehle manuell ausführen.
 .
 Bitte lesen Sie die Datei README.Debian zu weiteren Details.
";
$elem["rt3.8-rtfm/modify-database-permission"]["descriptionfr"]="Modifications automatiques de la base de données de Request Tracker :
 Pour que RTFM puisse fonctionner, des modifications sont indispensables dans la base de données de Request Tracker. Ces modifications peuvent être effectuées automatiquement ou la question peut être posée quand elles sont nécessaires. Il est également possible d'effectuer ces modifications vous-même.
 .
 Veuillez consulter le fichier README.Debian pour plus d'informations.
";
$elem["rt3.8-rtfm/modify-database-permission"]["default"]="allow";
$elem["rt3.8-rtfm/setup-database-prompt"]["type"]="boolean";
$elem["rt3.8-rtfm/setup-database-prompt"]["description"]="Set up the Request Tracker database?
 New tables must be created in the Request Tracker database for RTFM
 to be functional.
";
$elem["rt3.8-rtfm/setup-database-prompt"]["descriptionde"]="Die Datenbank zur Anfrageverfolgung einrichten?
 Damit RTFM funktioniert, müssen in der Datenbank zur Anfrageverfolgung neue Tabellen erstellt werden.
";
$elem["rt3.8-rtfm/setup-database-prompt"]["descriptionfr"]="Faut-il configurer la base de données de Request Tracker ?
 De nouvelles tables doivent être créées dans la base de données de Request Tracker afin que RTFM puisse fonctionner
";
$elem["rt3.8-rtfm/setup-database-prompt"]["default"]="true";
$elem["rt3.8-rtfm/upgrade-database-prompt"]["type"]="boolean";
$elem["rt3.8-rtfm/upgrade-database-prompt"]["description"]="Upgrade the Request Tracker database?
 The Request Tracker database schema and contents must be upgraded for
 this version of RTFM.
";
$elem["rt3.8-rtfm/upgrade-database-prompt"]["descriptionde"]="Upgrade der Datenbank zur Anfrageverfolgung durchführen?
 Für diese Version von RTFM muss ein Upgrade des Schemas und der Inhalte der Datenbank zur Anfrageverfolgung erfolgen.
";
$elem["rt3.8-rtfm/upgrade-database-prompt"]["descriptionfr"]="Faut-il mettre à jour la base de données de Request Tracker ?
 Le schéma et le contenu de la base de données de Request Tracker doivent être mis à jour pour cette version de RTFM.
";
$elem["rt3.8-rtfm/upgrade-database-prompt"]["default"]="true";
$elem["rt3.8-rtfm/modify-database-error"]["type"]="select";
$elem["rt3.8-rtfm/modify-database-error"]["choices"][1]="abort";
$elem["rt3.8-rtfm/modify-database-error"]["choices"][2]="retry";
$elem["rt3.8-rtfm/modify-database-error"]["choicesde"][1]="Abbrechen";
$elem["rt3.8-rtfm/modify-database-error"]["choicesde"][2]="Erneut versuchen";
$elem["rt3.8-rtfm/modify-database-error"]["choicesfr"][1]="Abandonner";
$elem["rt3.8-rtfm/modify-database-error"]["choicesfr"][2]="Réessayer";
$elem["rt3.8-rtfm/modify-database-error"]["description"]="Action after database modification error:
 An error occurred while modifying the database:
 .
 ${error}
 .
 The full output should be available in the RT log, most probably syslog.
 .
 You can retry the modification, abort the installation or ignore the
 error. If you abort the installation, the operation will fail and
 you will need to manually intervene (for instance by purging and
 reinstalling). If you choose to ignore the error, the upgrade process
 will continue.
";
$elem["rt3.8-rtfm/modify-database-error"]["descriptionde"]="Aktion, die nach einem Fehler beim Anpassen der Datenbank erfolgen soll:
 Ein Fehler ist beim Bearbeiten der Datenbank aufgetreten:
 .
 ${error}
 .
 Die komplette Ausgabe sollte im RT-Protokoll vorliegen, wahrscheinlich im Syslog.
 .
 Sie können die Anpassung erneut versuchen, die Installation abbrechen oder den Fehler ignorieren. Falls Sie die Installation abbrechen wird diese Operation fehlschlagen und Sie müssen manuell eingreifen (z.B. durch vollständiges Löschen und Neuinstallation). Falls Sie den Fehler ignorieren, wird mit dem Upgrade-Prozess fortgefahren.
";
$elem["rt3.8-rtfm/modify-database-error"]["descriptionfr"]="Action à effectuer après l'erreur de mise à jour de la base de données :
 Une erreur s'est produite lors de la mise à jour de la base de données :
 .
 ${error}
 .
 Les informations complètes sur cette tentative de mise à jour se trouvent dans les journaux de RT, probablement syslog.
 .
 Vous pouvez tenter à nouveau la modification, abandonner l'installation ou ignorer l'erreur. Si vous abandonnez l'installation, celle-ci échouera et une intervention manuelle sera nécessaire (par exemple purger et réinstaller le paquet). Si vous choisissez d'ignorer l'erreur, la mise à jour continuera.
";
$elem["rt3.8-rtfm/modify-database-error"]["default"]="abort";
PKG_OptionPageTail2($elem);
?>
