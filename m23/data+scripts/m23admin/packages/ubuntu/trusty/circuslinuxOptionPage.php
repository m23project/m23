<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("circuslinux");

$elem["circuslinux/shared_score_file"]["type"]="note";
$elem["circuslinux/shared_score_file"]["description"]="Shared scorefile
 This version of Circuslinux! uses a shared score file. From now on
 highscores will no longer be saved in ~/.circuslinux but in
 /var/games/circuslinux/scorefile. For configuration options the new file
 ~/.circuslinuxrc will be used.
 .
 To merge all players' old highscores into one file, you can run:
  bash /usr/share/doc/circuslinux/merge_scorefiles.sh
 as root.
 .
 Each player can then, _after_ playing this version of Circuslinux! at
 least once, delete his ~/.circuslinux file, since his configuration
 options will be saved in  ~/.circuslinuxrc. If the player decides not to
 delete ~/.circuslinux, he can still use a version of circuslinux which was
 compiled without shared scorefile support without loosing his old score-
 and config file. Circuslinux! with shared scorefile support will only read
 the old config file to get the players options if ~/.circuslinuxrc does
 not exist, but never write to this file.
 .
 In short: don't worry, play Circuslinux! If you run low on diskspace and
 every block counts, you might tell your users to remove the old config
 file.
";
$elem["circuslinux/shared_score_file"]["descriptionde"]="Gemeinsame Spielstandsdatei
 Diese Version von Circuslinux! benutzt eine gemeinsame Spielstandsdatei. Von nun an werden Spielstände nicht mehr in der Datei ~/.circuslinux, sondern in /var/games/circuslinux/scorefile gespeichert. Für Konfigurationseinstellungen wird die neue Datei ~/.circuslinuxrc benutzt.
 .
 Um die Spielstände aller Spieler in einer Datei zu speichern, können Sie als Benutzer root folgendes ausführen: bash /usr/share/doc/circuslinux/merge_scorefiles.sh.
 .
 Jeder Spieler kann nun, nachdem er mindestens einmal diese Version von Circuslinux! gepielt hat, seine ~/.circuslinux Datei löschen, da seine Konfiguration nun in ~/.circuslinuxrc gespeichert ist. Wenn der Spieler sich entschließt die Datei ~/.circuslinux nicht zu löschen, kann er immer noch eine Version von circuslinux benutzen, die ohne die Option für Gemeinsame Spielstände kompiliert wurde, ohne dabei seine alte Spielstands- und Konfigurationsdatei zu verlieren. Circuslinux! mit der Gemeinsamen Spielstands Option liest lediglich die Konfigurationsoptionen aus der alten Datei wenn die Datei ~/.circuslinuxrc nicht existiert, es wird jedoch niemals die alte Datei überschreiben.
 .
 Kurz gesagt, keine Bange, spielt Circuslinux!
 Wenn Sie jedoch wenig Festplattenplatz haben sollten und jeder einzelne Block wichtig ist, können Sie Ihre Benutzer bitten die alte Konfigurationsdatei zu entfernen.
";
$elem["circuslinux/shared_score_file"]["descriptionfr"]="Fichier de scores partagé
 Cette version de Circuslinux! utilise un fichier de scores partagé. À partir de maintenant, les scores les plus élevés ne seront plus préservés dans ~/.circuslinux mais dans le fichier /var/games/circuslinux/scorefile. Les options de configuration seront, elles, conservées dans un nouveau fichier : ~/.circuslinuxrc.
 .
 Si vous souhaitez fusionner les scores les plus élevés de tous les joueurs en un seul fichier, vous pouvez utiliser, en tant que super-utilisateur, la commande « bash /usr/share/doc/circuslinux/merge_scorefiles.sh ».
 .
 Chaque joueur pourra alors, _après_ avoir joué au moins une fois à Circuslinux!, effacer son fichier ~/.circuslinux puisque ses options seront alors préservées dans ~/.circuslinuxrc. Si le joueur préfère ne pas effacer ce fichier, il peut continuer à utiliser une version de Circuslinux! compilée sans la gestion du fichier de scores partagé. Ainsi, il ne perdra pas ses anciens fichiers de scores et de configuration. Circuslinux! avec gestion du fichier de scores partagé utilisera l'ancien fichier pour lire les options des joueurs, si un fichier ~/.circuslinuxrc n'existe pas. Cependant, il n'écrira jamais dans cet ancien fichier.
 .
 En résumé : pas de panique et jouez à Circuslinux!. Si vous manquez d'espace disque et que chaque bloc compte, vous pouvez demander à vos utilisateurs de supprimer leurs anciens fichiers de configuration.
";
$elem["circuslinux/shared_score_file"]["default"]="";
$elem["circuslinux/merge_score_files"]["type"]="boolean";
$elem["circuslinux/merge_score_files"]["description"]="Merge score files?
 Do you want me to run the merge_scorefile script for you?
";
$elem["circuslinux/merge_score_files"]["descriptionde"]="Sollen die Spielstände zu einer Datei zusammengefügt werden?
 Soll nun das merge_scorefile script ausgeführt werden?
";
$elem["circuslinux/merge_score_files"]["descriptionfr"]="Faut-il fusionner les fichiers de scores ?
 Souhaitez-vous que les fichiers de scores soient fusionnés automatiquement ?
";
$elem["circuslinux/merge_score_files"]["default"]="";
$elem["circuslinux/score_file_exists"]["type"]="boolean";
$elem["circuslinux/score_file_exists"]["description"]="Scorefile exists
 A merged scorefile in /var/games/circuslinux already exists!
";
$elem["circuslinux/score_file_exists"]["descriptionde"]="Spielstandsdatei existiert bereits
 Eine gemeinsame Spielstandsdatei existiert bereits in /var/games/circuslinux !
";
$elem["circuslinux/score_file_exists"]["descriptionfr"]="Un fichier de scores existe déjà
 Un fichier de scores est déjà présent dans /var/games/circuslinux !
";
$elem["circuslinux/score_file_exists"]["default"]="";
PKG_OptionPageTail2($elem);
?>
