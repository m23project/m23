<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mirrormagic");

$elem["mirrormagic/remove_old_highscores"]["type"]="boolean";
$elem["mirrormagic/remove_old_highscores"]["description"]="Remove old highscores in /var/lib/games/mirrormagic?
 You have old highscore files in /var/lib/games/mirrormagic, coming from
 version 1.3 of mirrormagic. Starting from version 2.0.0, mirrormagic uses
 a different file format for highscores, and these are placed in
 /var/games/mirrormagic.  Therefore, /var/lib/games/mirrormagic should be
 deleted.
 .
 However, if the old highscores are important to you or if you think you
 might want to go back to version 1.3, then you may want to keep the old
 directory.
";
$elem["mirrormagic/remove_old_highscores"]["descriptionde"]="Soll die alte Spielstandsdatei /var/lib/games/mirrormagic entfernt werden?
 Sie haben eine alte Spielstandsdatei in /var/lib/games/mirrormagic gespeichert, die von mirrormagic 1.3 stammt. Mit Version 2.0.0 wird ein neues Format für die Spielstandsdatei, die in /var/games/mirrormagic gespeichert wird, benutzt. Deshalb sollte die alte Datei gelöscht werden.
 .
 Wenn die Spielstände für Sie wichtig sind, dann sollten Sie die Datei jetzt nicht entfernen, um im Falle des Falles zur Version 1.3 zurück- zukehren.
";
$elem["mirrormagic/remove_old_highscores"]["descriptionfr"]="Faut-il supprimer les anciens fichiers de résultats ?
 Il existe dans le répertoire /var/lib/games/mirrormagic d'anciens fichiers de meilleurs résultats, correspondant à  la version 1.3 de mirrormagic. À partir de la version 2.0.0, mirrormagic utilise un format de fichier différent pour les meilleurs résultats, et ces fichiers sont placés dans /var/games/mirrormagic. En conséquence, /var/lib/games/mirrormagic doit être supprimé.
 .
 Cependant, si ces anciens fichiers sont importants pour vous, ou si vous prévoyez de revenir à la version 1.3, vous avez la possibilité de les conserver.
";
$elem["mirrormagic/remove_old_highscores"]["default"]="";
PKG_OptionPageTail2($elem);
?>
