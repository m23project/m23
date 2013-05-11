<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nethack-common");

$elem["nethack-common/backup-incompatible"]["type"]="select";
$elem["nethack-common/backup-incompatible"]["choices"][1]="abort";
$elem["nethack-common/backup-incompatible"]["choices"][2]="backup";
$elem["nethack-common/backup-incompatible"]["choices"][3]="purge";
$elem["nethack-common/backup-incompatible"]["choicesde"][1]="Abbrechen";
$elem["nethack-common/backup-incompatible"]["choicesde"][2]="Sichern";
$elem["nethack-common/backup-incompatible"]["choicesde"][3]="Vollständig löschen";
$elem["nethack-common/backup-incompatible"]["choicesfr"][1]="Abandonner";
$elem["nethack-common/backup-incompatible"]["choicesfr"][2]="Garder";
$elem["nethack-common/backup-incompatible"]["choicesfr"][3]="Effacer";
$elem["nethack-common/backup-incompatible"]["description"]="Should NetHack back up your old, incompatible save files?
 You are upgrading from a version of NetHack whose save files are not
 compatible with the version you are upgrading to. You may either have them
 backed up into /tmp, purge them, ignore this problem completely, or abort
 this installation and manually handle NetHack's save files. Your score files
 will be lost if you choose to purge.
 .
 If you choose to back up, the files will be backed up into a
 gzip-compressed tar archive in /tmp with a random name starting
 with 'nethk' and ending in '.tar.gz'.
 .
 Old NetHack save files can be found in /var/games/nethack (or
 /var/lib/games/nethack, for versions before 3.4.0).
";
$elem["nethack-common/backup-incompatible"]["descriptionde"]="Soll NetHack Ihre alten, inkompatiblen gespeicherten Spielstände sichern?
 Sie führen ein Upgrade von einer Version von NetHack durch, dessen gespeicherten Spielstände nicht kompatibel zu der Version sind, auf die Sie das Upgrade durchführen. Sie können die Dateien entweder in /tmp sichern, sie vollständig löschen, das Problem ignorieren lassen oder Sie können diese Installation abbrechen und die gespeicherten Spielstände von NetHack manuell bearbeiten. Ihre Dateien mit den Punkteständen sind verloren, falls Sie »vollständig löschen« wählen.
 .
 Falls Sie auswählen, zu sichern, werden die Dateien in ein gzip-komprimiertes Tar-Archiv in /tmp mit einem Zufallsnamen, der mit »nethk« beginnt und auf ».tar.gz« endet, gesichert.
 .
 Alte NetHack Speicherdateien können in /var/games/nethack gefunden werden (oder in /var/lib/games/nethack bei Versionen vor 3.4.0).
";
$elem["nethack-common/backup-incompatible"]["descriptionfr"]="Faut-il conserver vos anciennes sauvegardes (incompatibles) de NetHack ?
 La nouvelle version de NetHack utilise des fichiers de sauvegarde qui ne sont pas compatibles avec l'ancienne version. Vous pouvez garder (provisoirement) les anciens dans /tmp, les effacer, ignorer totalement ce problème ou abandonner cette installation et gérer manuellement les fichiers de sauvegarde de NetHack. Vos fichiers de scores seront perdus si vous choisissez « Effacer ».
 .
 Si vous choisissez de les garder, les fichiers seront placés dans une archive tar compressée avec gzip dans /tmp avec un nom aléatoire commençant par « nethk » et se terminant en « .tar.gz ».
 .
 Les anciens fichiers de sauvegarde de NetHack se trouvent dans /var/games/nethack (ou /var/lib/games/nethack, pour les versions antérieures à la 3.4.0).
";
$elem["nethack-common/backup-incompatible"]["default"]="backup";
$elem["nethack-common/recover-setgid"]["type"]="boolean";
$elem["nethack-common/recover-setgid"]["description"]="Would you like NetHack's recover utility to be setgid games?
 The 'recover' program is installed as part of the nethack-common package
 and exists to help the administrator recover broken save files, etc.
 . 
 Recover is traditionally installed setgid games, although it does not
 need to be in the Debian NetHack installation, as it is automatically
 run at boot time as root. Its only usefulness as a setgid binary is
 to let players as normal users on the system recover their save
 files, should NetHack crash or their connection drop mid-game.
 .
 If you answer no, you will have to run recover as root or as someone
 in group games to recover save files after a crash or a connection
 drop.
";
$elem["nethack-common/recover-setgid"]["descriptionde"]="Möchten Sie, dass NetHacks Wiederherstellungshilfwerkzeug »recover« unter der Gruppen-ID games laufen wird (setgid games)?
 Das »recover«-Programm wird als Teil des nethack-common-Pakets installiert und existiert, um dem Administrator zu helfen, beschädigte Speicherdateien usw. zu retten.
 .
 Traditionell wird »recover« so installiert, dass es unter der Gruppen-ID games läuft (setgid games), obwohl dies in der Debian NetHack-Installation nicht nötig ist, denn es wird beim Systemstart automatisch als Root ausgeführt. Es ist nur hilfreich, um Spielern als normalen Benutzern auf dem System zu erlauben, ihre Speicherdateien zu retten, falls NetHack abstürzen oder ihre Verbindung mitten im Spiel verloren gehen sollte.
 .
 Falls Sie »Nein« antworten, müssen Sie »recover« als Root aufrufen oder als jemanden in der Gruppe games, um Speicherdateien nach einem Absturz oder einer Verbindungsunterbrechung zu retten.
";
$elem["nethack-common/recover-setgid"]["descriptionfr"]="Souhaitez-vous que l'outil de récupération soit « setgid games » ?
 Le programme « recover » du paquet nethack-common est installé et sert à aider l'administrateur à récupérer des fichiers de sauvegarde endommagés, etc.
 .
 Recover est habituellement installé pour s'exécuter avec les droits du groupe « games » (« setgid games »), bien que cela ne soit pas nécessaire dans l'installation de NetHack de Debian, car il est lancé automatiquement au démarrage avec les droits du super-utilisateur. Cela permet toutefois aux joueurs de récupérer leurs fichiers de sauvegarde en tant qu'utilisateurs non privilégiés sur le système si NetHack s'arrête inopinément ou que leur connexion se coupe au milieu du jeu.
 .
 Si vous refusez, vous devrez utiliser recover en tant que super-utilisateur ou qu'utilisateur du groupe games pour récupérer des fichiers de sauvegarde après un plantage ou une coupure de connexion.
";
$elem["nethack-common/recover-setgid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
