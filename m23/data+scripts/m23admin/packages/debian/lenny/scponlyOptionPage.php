<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("scponly");

$elem["scponly/chroot"]["type"]="boolean";
$elem["scponly/chroot"]["description"]="Install the chrooted binary /usr/sbin/scponlyc and set it to mode 4755 (root.root)?
 If you want scponly to chroot into the user's home directory prior to
 doing its work, the scponly binary has to be installed in
 /usr/sbin/scponlyc and has to have the suid-root-bit set.
 .
 This could lead (in the worst case) to a remotely exploitable root hole.
 If you don't need the chroot- functionality, don't install the file.
";
$elem["scponly/chroot"]["descriptionde"]="Chrooted /usr/sbin/scponlyc installieren und suid root (4755) setzen?
 Wenn Sie wollen, dass scponly in das home-Verzeichnis des Benutzers chrooted bevor es seine Arbeit aufnimmt, muss scponly zusätzlich als /usr/sbin/scponly installiert und suid root gesetzt werden.
 .
 Dies könnte (im schlimmsten Fall) zu einer remote-root-Sicherheitslücke führen. Wenn Sie diese Funktionalität nicht benötigen, installieren sie diese Datei nicht.
";
$elem["scponly/chroot"]["descriptionfr"]="Installer /usr/sbin/scponlyc pour un environnement fermé d'exécution ?
 Si vous souhaitez que scponly s'exécute dans un environnement restreint au répertoire racine de l'utilisateur avant d'exécuter son travail, le binaire scponly doit être installé dans /usr/bin/scponlyc et doit avoir le bit suid positionné (autorisations d'accès en 4755, exécution avec les droits du super-utilisateur).
 .
 Cela pourrait entrainer (dans le pire des cas) un accès privilégié exploitable à distance. Si vous n'avez pas besoin que le programme s'exécute dans un environnement fermé (fonctionnalité « chroot »), vous ne devriez pas installer le fichier.
";
$elem["scponly/chroot"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
