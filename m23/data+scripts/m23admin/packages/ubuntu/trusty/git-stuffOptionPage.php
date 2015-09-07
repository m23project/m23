<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("git-stuff");

$elem["git-repack-repositories/title"]["type"]="title";
$elem["git-repack-repositories/title"]["description"]="Git repack repositories
";
$elem["git-repack-repositories/title"]["descriptionde"]="Neu packen der Git Repositories
";
$elem["git-repack-repositories/title"]["descriptionfr"]="Recompression des répertoires Git
";
$elem["git-repack-repositories/title"]["default"]="";
$elem["git-repack-repositories/enable"]["type"]="boolean";
$elem["git-repack-repositories/enable"]["description"]="Enable cron job?
 Git repositories tend to grow quite large quickly. To save space and
 maintain optimal performance they should be repacked from time to time
 (reducing the number of files in the objects subdirectory).
";
$elem["git-repack-repositories/enable"]["descriptionde"]="Cron Job aktivieren?
 Git Repositories tendieren dazu, schnell ziemlich gross zu werden. Um Speicherplatz zu sparen und optimale Performance aufrecht zu erhalten, sollten diese von Zeit zu Zeit neu gepackt werden (was die Zahl der Dateien im objects Unterverzeichnis vermindert).
";
$elem["git-repack-repositories/enable"]["descriptionfr"]="Faut-il activer la tâche cron ?
 La taille des dépôts Git a tendance à augmenter rapidement. Pour gagner de l'espace et conserver des performances optimales, ils devraient être compressés de temps en temps (en réduisant le nombre de fichiers dans les sous-répertoires d'objets).
";
$elem["git-repack-repositories/enable"]["default"]="false";
$elem["git-repack-repositories/directories"]["type"]="string";
$elem["git-repack-repositories/directories"]["description"]="Git directories:
 Please specify the directory or directories (space separated) used as root
 for the Git repositories on the server. Note that git-repack-repositories
 will work recursively.
";
$elem["git-repack-repositories/directories"]["descriptionde"]="Git Verzeichnisse:
 Bitte geben Sie das oder die Verzeichnisse (durch Leerzeichen getrennt) an, welche als Wurzelverzeichnis für die Git Repositories auf dem Server verwendet werden sollen. Beachten Sie, dass git-repack-repositories rekursiv arbeiten wird.
";
$elem["git-repack-repositories/directories"]["descriptionfr"]="Répertoires Git :
 Veuillez indiquer le ou les répertoires (séparés par des virgules) utilisés comme racine des dépôts Git sur le serveur. Veuillez noter que git-repack-repositories fonctionnera de façon récursive.
";
$elem["git-repack-repositories/directories"]["default"]="/srv/git";
$elem["git-repack-repositories/cron"]["type"]="string";
$elem["git-repack-repositories/cron"]["description"]="Git cron job scheduling:
 Please choose when the cron job should be started.
 .
 See crontab(5) for the format definition. If it is left empty, the default
 value \"@monthly\" (without the quotes) will be used, executing the cron job
 every month.
";
$elem["git-repack-repositories/cron"]["descriptionde"]="Zeitpunkt des Git CronJobs:
 Bitte wählen Sie, wann der Cron Job gestartet werden soll.
 .
 In crontab(5) finden Sie die Definition des Formats. Wenn dies leer bleibt, wird der Standardwert \"@monthly\" (ohne Anführungszeichen) verwendet, so dass der Cron Job jeden Monat ausgeführt wird.
";
$elem["git-repack-repositories/cron"]["descriptionfr"]="Programmation de la tâche cron de Git :
 Veuillez choisir quand la tâche cron devrait être démarrée.
 .
 Veuillez consulter crontab(5) pour la définition du format. Si ce champ est laissé vide, la valeur par défaut « @monthly » sera utilisée (sans les guillemets), exécutant la tâche cron tous les mois.
";
$elem["git-repack-repositories/cron"]["default"]="@monthly";
$elem["git-stuff/title"]["type"]="title";
$elem["git-stuff/title"]["description"]="Additional Git utilities
";
$elem["git-stuff/title"]["descriptionde"]="Zusätzliche Git Werkzeuge
";
$elem["git-stuff/title"]["descriptionfr"]="Utilitaires Git supplémentaires
";
$elem["git-stuff/title"]["default"]="";
$elem["git-stuff/bash-profile"]["type"]="boolean";
$elem["git-stuff/bash-profile"]["description"]="Should shortcut definitions be activated?
 Special shortcut definitions for Bash can be activated in /etc/profile.d.
";
$elem["git-stuff/bash-profile"]["descriptionde"]="Sollen Tastatur Abkürzungen aktiviert werden?
 Spezielle Tastatur Abkürzungen für Bash können in /etc/profile.d aktiviert werden.
";
$elem["git-stuff/bash-profile"]["descriptionfr"]="Faut-il activer les définitions de raccourcis ?
 Les définitions de raccourcis spéciaux pour Bash peuvent être activés dans /etc/profile.d.
";
$elem["git-stuff/bash-profile"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
