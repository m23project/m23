<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("motion");

$elem["motion/moved_conf_dir"]["type"]="note";
$elem["motion/moved_conf_dir"]["description"]="Location of Motion's config files has changed
 The default location of Motion's configuration files has moved from /etc/
 to /etc/motion/. So if you already have a motion.conf in /etc/ from a
 previous installation of Motion, you should move this to /etc/motion/ in
 order for it to take effect whenever Motion is used.
 .
 The same thing goes for any thread*.conf files you may have. You should
 move these to /etc/motion/ as well (in this case, also remember to update
 the path to the thread*.conf files inside motion.conf).
";
$elem["motion/moved_conf_dir"]["descriptionde"]="Der Ort der Motion-Konfigurationsdatei hat sich geändert
 Der Standard-Ort von Motions Konfigurationsdatei wurde von /etc/ zu /etc/motion/ geändert. Wenn Sie also von einer früheren Motion-Installation bereits eine motion.conf in /etc/ haben, dann sollten Sie diese nach /etc/motion/ verschieben, damit Motion diese Datei auch verwendet.
 .
 Das gleiche gilt für jede thread*.conf-Datei, die Sie eventuell haben. Sie sollten diese ebenfalls nach /etc/motion/ verschieben (in diesem Fall denken Sie bitte auch daran, in der motion.conf den Pfad zu den thread*.conf-Dateien anzupassen).
";
$elem["motion/moved_conf_dir"]["descriptionfr"]="Changement de l'emplacement des fichiers de configuration
 L'emplacement par défaut des fichiers de configuration de Motion n'est plus /etc/ mais /etc/motion. En conséquence, si vous avez déjà un fichier motion.conf dans /etc/, d'une installation précédente, vous devriez le déplacer vers /etc/motion/ afin que Motion puisse le prendre en compte.
 .
 Il en va de même pour les fichiers thread*.conf que vous pourriez avoir. Vous devriez les déplacer vers /etc/motion/ ; dans ce cas, modifiez le chemin vers ces fichiers thread*.conf dans motion.conf.
";
$elem["motion/moved_conf_dir"]["default"]="";
PKG_OptionPageTail2($elem);
?>
