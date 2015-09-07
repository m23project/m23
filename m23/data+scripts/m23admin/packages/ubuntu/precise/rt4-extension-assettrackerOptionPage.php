<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rt4-extension-assettracker");

$elem["rt4-extension-assettracker/modify-database-permission"]["type"]="select";
$elem["rt4-extension-assettracker/modify-database-permission"]["choices"][1]="allow";
$elem["rt4-extension-assettracker/modify-database-permission"]["choices"][2]="prompt";
$elem["rt4-extension-assettracker/modify-database-permission"]["choicesde"][1]="erlauben";
$elem["rt4-extension-assettracker/modify-database-permission"]["choicesde"][2]="nachfragen";
$elem["rt4-extension-assettracker/modify-database-permission"]["choicesfr"][1]="autoriser";
$elem["rt4-extension-assettracker/modify-database-permission"]["choicesfr"][2]="demander";
$elem["rt4-extension-assettracker/modify-database-permission"]["description"]="Permission to modify the Request Tracker database:
 Asset Tracker needs some modifications in the Request Tracker
 database to be functional. These modifications can be made
 automatically (choose \"allow\") or you may be prompted when they are
 needed (choose \"prompt\").
 Alternatively, you can run the necessary commands manually (choose \"deny\").
 .
 Please check the README.Debian file for more details.
";
$elem["rt4-extension-assettracker/modify-database-permission"]["descriptionde"]="Erlaubnis, die Datenbank von Request Tracker zu verändern:
 Asset Tracker muss einige Änderungen an der Datenbank von Request Tracker vornehmen, um zu funktionieren. Diese Änderungen können automatisch vorgenommen werden (wählen Sie »erlauben«) oder Sie können gefragt werden, wenn sie notwendig sind (wählen Sie »nachfragen«). Alternativ können Sie die notwendigen Befehle manuell ausführen (wählen Sie »verbieten«).
 .
 Bitte lesen Sie die Datei README.Debian für weitere Details.
";
$elem["rt4-extension-assettracker/modify-database-permission"]["descriptionfr"]="Autorisation de modifier la base de données de Request Tracker :
 Asset Tracker nécessite quelques modifications dans la base de données de Request Tracker pour fonctionner. Ces modifications peuvent être faites automatiquement (choisir « autoriser »), ou des questions peuvent vous être posées si besoin (choisir « demander »). L'autre possibilité est de lancer les commandes vous-même (choisir « rejeter »).
 .
 Veuillez consulter le fichier README.Debian pour plus d'informations.
";
$elem["rt4-extension-assettracker/modify-database-permission"]["default"]="allow";
$elem["rt4-extension-assettracker/setup-database-prompt"]["type"]="boolean";
$elem["rt4-extension-assettracker/setup-database-prompt"]["description"]="Set up the Request Tracker database?
 New tables must be created in the Request Tracker database for Asset
 Tracker to be functional.
";
$elem["rt4-extension-assettracker/setup-database-prompt"]["descriptionde"]="Die Request-Tracker-Datenbank einrichten?
 In der Request-Tracker-Datenbank müssen neue Tabellen erstellt werden, damit Asset Tracker funktioniert.
";
$elem["rt4-extension-assettracker/setup-database-prompt"]["descriptionfr"]="Faut-il configurer la base de données de Request Tracker ?
 De nouvelles tables doivent être créées dans la base de données de Request Tracker pour qu'Asset Tracker puisse fonctionner.
";
$elem["rt4-extension-assettracker/setup-database-prompt"]["default"]="true";
$elem["rt4-extension-assettracker/upgrade-database-prompt"]["type"]="boolean";
$elem["rt4-extension-assettracker/upgrade-database-prompt"]["description"]="Upgrade the Request Tracker database?
 The Request Tracker database schema and contents must be upgraded for
 this version of Asset Tracker.
";
$elem["rt4-extension-assettracker/upgrade-database-prompt"]["descriptionde"]="Upgrade der Request-Tracker-Datenbank durchführen?
 Es muss ein Upgrade der Request-Tracker-Datenbankschemata für diese Version von Asset Tracker durchgeführt werden.
";
$elem["rt4-extension-assettracker/upgrade-database-prompt"]["descriptionfr"]="Faut-il mettre à jour la base de données de Request Tracker ?
 Le schéma de la base de données de Request Tracker et son contenu doivent être mis à jour pour cette version d'Asset Tracker.
";
$elem["rt4-extension-assettracker/upgrade-database-prompt"]["default"]="true";
$elem["rt4-extension-assettracker/modify-database-error"]["type"]="select";
$elem["rt4-extension-assettracker/modify-database-error"]["choices"][1]="abort";
$elem["rt4-extension-assettracker/modify-database-error"]["choices"][2]="retry";
$elem["rt4-extension-assettracker/modify-database-error"]["choicesde"][1]="abbrechen";
$elem["rt4-extension-assettracker/modify-database-error"]["choicesde"][2]="erneut versuchen";
$elem["rt4-extension-assettracker/modify-database-error"]["choicesfr"][1]="abandonner";
$elem["rt4-extension-assettracker/modify-database-error"]["choicesfr"][2]="réessayer";
$elem["rt4-extension-assettracker/modify-database-error"]["description"]="Action after database modification error:
 An error occurred while modifying the database:
 .
 ${error}
 .
 The full output should be available in Request Tracker log, most probably
 syslog.
 .
 You can retry the modification, abort the installation or ignore the
 error. If you abort the installation, the operation will fail and you
 will need to manually intervene (for instance by purging and
 reinstalling). If you choose to ignore the error, the upgrade process
 will continue.
";
$elem["rt4-extension-assettracker/modify-database-error"]["descriptionde"]="Aktion, die nach einem Fehler beim Ändern der Datenbank erfolgen soll:
 Beim Ändern der Datenbank erfolgte ein Fehler:
 .
 ${error}
 .
 Die komplette Ausgabe sollte im Protokoll von Request Tracker verfügbar sein, wahrscheinlich im Syslog.
 .
 Sie können die Änderung erneut versuchen, die Installation abbrechen oder den Fehler ignorieren. Falls Sie die Installation abbrechen, wird die Ausführung fehlschlagen und Sie müssen manuell eingreifen (beispielsweise durch vollständiges Löschen und erneute Installation). Falls Sie den Fehler ignorieren, wird der Upgrade-Prozess fortfahren.
";
$elem["rt4-extension-assettracker/modify-database-error"]["descriptionfr"]="Action à effectuer en cas d'erreur pendant la modification de la base :
 Une erreur s'est produite durant la modification de la base de données.
 .
 ${error}
 .
 La sortie complète devrait être disponible dans les fichiers de journalisation de Request Tracker, probablement dans syslog.
 .
 Vous pouvez tenter la modification à nouveau, l'abandonner ou ignorer l'erreur. Si vous abandonnez l'installation, l'opération échouera et vous devrez intervenir manuellement (par exemple en purgeant et en réinstallant). Si vous choisissez d'ignorer l'erreur, le processus de mise à jour continuera.
";
$elem["rt4-extension-assettracker/modify-database-error"]["default"]="abort";
PKG_OptionPageTail2($elem);
?>
