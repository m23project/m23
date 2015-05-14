<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rssh");

$elem["rssh/chroot_helper_setuid"]["type"]="boolean";
$elem["rssh/chroot_helper_setuid"]["description"]="Do you want rssh_chroot_helper to be installed setuid root?
 If you plan to use chroot jails for the users using rssh, the program
 /usr/lib/rssh/rssh_chroot_helper has to be installed setuid root so that
 it can chroot into the jail when the user connects.  If you are not using
 chroot jails, it's better to not install setuid root programs you don't
 need.
 .
 If in doubt, install it without setuid root.  If you later decide to use
 chroot jails, you can change this configuration by running
 dpkg-reconfigure rssh.
";
$elem["rssh/chroot_helper_setuid"]["descriptionde"]="Möchten Sie, dass rssh_chroot_helper setuid root installiert wird?
 Falls Sie für Benutzer, die rssh verwenden, eine Chroot-Umgebung planen, muss das Programm /usr/lib/rssh/rssh_chroot_helper setuid root installiert werden, so dass es bei der Verbindungsaufnahme eines Benutzers ein chroot in das Gefängnis (jail) vornehmen kann. Falls Sie keine Chroot-Gefängnisse verwenden, ist es besser, keine setuid root-Programme zu installieren, die Sie nicht benötigen.
 .
 Falls Sie sich unsicher sind, installieren Sie es nicht setuid root. Falls Sie sich später dazu entschließen, Chroot-Gefängnisse zu verwenden, können Sie diese Entscheidung ändern, indem Sie »dpkg-reconfigure rssh« ausführen.
";
$elem["rssh/chroot_helper_setuid"]["descriptionfr"]="Faut-il exécuter rssh_chroot_helper avec les privilèges du superutilisateur ?
 Si vous avez l'intention d'utiliser la fonctionnalité d'environnement fermé d'exécution (« chroot ») pour l'utilisation de rssh, le programme /usr/lib/rssh/rssh_chroot_helper doit s'exécuter avec les privilèges du superutilisateur (« setuid root »). Si vous n'utilisez pas d'environnement fermé d'exécution, cette option est inutile.
 .
 Dans le doute, ne choisissez pas cette option. Si elle devenait nécessaire plus tard, vous pourrez changer ce choix avec la commande « dpkg-reconfigure rssh ».
";
$elem["rssh/chroot_helper_setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
