<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mini-buildd-common");

$elem["mini-buildd-common/purging_repository"]["type"]="note";
$elem["mini-buildd-common/purging_repository"]["description"]="Repository purge
 You have chosen to purge mini-buildd on a repository host.
 .
 This choice means that the mini-buildd user will be removed along
 with all the files it owns, including the repository in
 \"/home/mini-buildd/rep\".
 .
 To keep this data, you need to back it up now.
";
$elem["mini-buildd-common/purging_repository"]["descriptionde"]="Paketdepot vollständig löschen
 Sie möchten mini-buildd vollständig von einem Rechner entfernen, auf dem ein Paketdepot vorhanden ist.
 .
 Diese Auswahl bedeutet, dass der mini-buildd-Benutzer gemeinsam mit allen Dateien entfernt wird, die ihm zugeordnet sind. Dies schließt das Paketdepot im Verzeichnis »/home/mini-buildd/rep« ein.
 .
 Um diese Daten zu behalten, müssen Sie jetzt eine Sicherheitskopie davon erstellen.
";
$elem["mini-buildd-common/purging_repository"]["descriptionfr"]="Purge du dépôt
 Vous avez choisi de purger mini-buildd sur un hôte de dépôt.
 .
 Ce choix implique la suppression de l'identifiant utilisé par mini-buildd ainsi que des fichiers dont il est propriétaire. Cela comprend aussi le dépôt hébergé dans le répertoire /home/mini-buildd/rep.
 .
 Si vous préférez conserver ces données tout en purgeant le paquet, vous devez en faire une sauvegarde vous-même avant de poursuivre.
";
$elem["mini-buildd-common/purging_repository"]["default"]="";
PKG_OptionPageTail2($elem);
?>
