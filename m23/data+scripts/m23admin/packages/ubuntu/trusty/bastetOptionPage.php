<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("bastet");

$elem["bastet/score_file_compatibility"]["type"]="boolean";
$elem["bastet/score_file_compatibility"]["description"]="Remove old-format Bastet highscores file?
 The new version of Bastet cannot read highscores files in the old
 format, like the one at /var/games/bastet.scores.
 .
 You can decide to remove the old scores file now. If you leave it on
 the system it will be ignored by Bastet and will no longer be
 tracked by the package management system.
";
$elem["bastet/score_file_compatibility"]["descriptionde"]="Die Bastet-Bestenliste im alten Format löschen?
 Die neue Version von Bastet kann keine Bestenliste im alten Format wie die in /var/games/bastet.scores lesen.
 .
 Sie können sich entscheiden, die Ergebnisdatei jetzt zu löschen. Falls Sie sie auf dem System belassen, wird sie von Bastet ignoriert und nicht länger vom Paketverwaltungssystem beachtet.
";
$elem["bastet/score_file_compatibility"]["descriptionfr"]="Faut-il supprimer l'ancien fichier des scores de Bastet ?
 La nouvelle version de Bastet ne peut lire l'ancien format des fichiers de scores, comme « /var/games/bastet.scores ».
 .
 Vous pouvez décider de supprimer cet ancien fichier maintenant. Si vous le laissez sur le système, Bastet l'ignorera et il ne sera plus suivi par le système de gestion de paquets.
";
$elem["bastet/score_file_compatibility"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
