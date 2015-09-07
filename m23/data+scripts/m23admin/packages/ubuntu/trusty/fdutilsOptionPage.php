<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fdutils");

$elem["fdutils/fdmount_setuid"]["type"]="boolean";
$elem["fdutils/fdmount_setuid"]["description"]="Should fdmount be installed 'setuid root'?
 In order to enable ordinary users to mount a floppy disk,
 the fdmount program can be installed with the set-user-ID bit set, so
 that it will run with the permissions of the superuser.
 .
 Such a setting may have security implications in the case of
 vulnerabilities in fdmount's code.
";
$elem["fdutils/fdmount_setuid"]["descriptionde"]="Soll Fdmount »setuid root« installiert werden?
 Um es normalen Benutzern zu erlauben, Disketten einzuhängen, kann das Programm Fdmount mit gesetztem set-user-ID-Bit installiert werden, so dass es mit den Rechten des Superusers (»root«) läuft.
 .
 Eine solche Einstellung könnte Auswirkungen auf die Sicherheit haben, falls im Code von Fdmount Verwundbarkeiten gefunden werden.
";
$elem["fdutils/fdmount_setuid"]["descriptionfr"]="Faut-il exécuter fdmount avec les privilèges du superutilisateur ?
 Pour que les utilisateurs non privilégiés puissent monter une disquette avec fdmount, ce programme doit s'exécuter avec les privilèges du superutilisateur (« setuid root »).
 .
 Cette configuration peut affaiblir la sécurité du système dans le cas d'une vulnérabilité du code de fdmount.
";
$elem["fdutils/fdmount_setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
