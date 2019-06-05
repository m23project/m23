<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("orville-write");

$elem["orville-write/setuid"]["type"]="boolean";
$elem["orville-write/setuid"]["description"]="Would you like the write and mesg programs to be setuid root?
 Some features of Orville Write require write and mesg to run with root
 privileges.  These features include auto-disconnect, non-world-readable
 .nowrite files and some others.
 .
 If you don't need these additional features you can refuse here and have
 write and mesg setgid only.
";
$elem["orville-write/setuid"]["descriptionde"]="Sollen die Write- und Mesg-Programme »setuid root« gesetzt werden?
 Für manche Orville Write-Funktionen (u.A. auto-disconnect, nicht-Welt-lesbare .nowrite-Dateien usw.) müssen Write und Mesg mit Root-Rechten ausgeführt werden.
 .
 Wenn Sie diese zusätzlichen Funktionen nicht benötigen, dann können Sie hier ablehnen und Write und Mesg nur mit setgid-Rechten ausführen.
";
$elem["orville-write/setuid"]["descriptionfr"]="Faut-il rendre les programmes write et mesg « SUID root » ?
 Certaines fonctionnalités d'Orville Write nécessitent que write et mesg soient exécutés avec les privilèges du super-utilisateur. Ces fonctionnalités comprennent l'auto-déconnexion, les fichiers « .nowrite » illisibles par d'autres personnes que leur propriétaire et bien d'autres encore.
 .
 Si vous n'avez pas besoin de ces fonctionnalités supplémentaires, vous pouvez refuser ici et seul le bit setgid sera positionné.
";
$elem["orville-write/setuid"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
