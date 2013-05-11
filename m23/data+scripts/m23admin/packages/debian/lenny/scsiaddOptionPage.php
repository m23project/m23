<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("scsiadd");

$elem["scsiadd/SUID_scsiadd"]["type"]="boolean";
$elem["scsiadd/SUID_scsiadd"]["description"]="Do you want /usr/sbin/scsiadd to be installed SUID root?
 You have the option of installing the scsiadd program with the SUID bit
 set.
 .
 If you make scsiadd SUID, you will allow that non-root users to execute
 it.
 .
 If in doubt, you can install it without SUID and change later by running:
 dpkg-reconfigure scsiadd
";
$elem["scsiadd/SUID_scsiadd"]["descriptionde"]="Möchten Sie, dass /usr/sbin/scsiadd SUID-Root installiert wird?
 Sie haben die Option, das Scsiadd-Programm mit gesetztem SUID-Bit zu installieren.
 .
 Falls Sie Scsiadd SUID machen, werden Sie erlauben, dass nicht-Root-Benutzer es ausführen können.
 .
 Falls Sie sich unsicher sind, können Sie es ohne SUID installieren. Sie können dies später ändern, indem Sie »dpkg-reconfigure scsiadd« ausführen.
";
$elem["scsiadd/SUID_scsiadd"]["descriptionfr"]="Voulez-vous donnez à scsiadd les droits de superutilisateur lors de son utilisation (bit SUID) ?
 Vous pouvez installer le programme scsiadd pour qu'il s'exécute avec les privilèges du superutilisateur (« setuid root »).
 .
 Si vous choisissez cette option, scsiadd pourra être utilisé par des utilisateurs non privilégiés.
 .
 Dans le doute, vous devriez l'installer sans cette option que vous pourrez activer plus tard avec la commande « dpkg-reconfigure scsiadd ».
";
$elem["scsiadd/SUID_scsiadd"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
