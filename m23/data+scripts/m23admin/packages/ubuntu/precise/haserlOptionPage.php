<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("haserl");

$elem["haserl/setuid"]["type"]="boolean";
$elem["haserl/setuid"]["description"]="Install haserl binary with suid root permissions?
 When haserl is installed with suid root permissions, it will automatically set
 its UID and GID to match the owner and group of the script.
 .
 This is a potential security vulnerability, as scripts that are owned
 by root will be run as root, even when they do not have the suid root bit.
";
$elem["haserl/setuid"]["descriptionde"]="Programm Haserl mit Suid-Root-Rechten installieren?
 Wenn Haserl mit Superuser-Rechten (Suid-Root) installiert ist, wird es automatisch seine UID und GID so setzen, dass sie zum Besitzer und zur Gruppe des Skripts passen.
 .
 Dies ist eine potenzielle Sicherheitsschwachstelle, da Skripte, die Root gehören, als Root ausgeführt werden, sogar, wenn sie nicht das Suid-Root-Bit haben.
";
$elem["haserl/setuid"]["descriptionfr"]="Exécuter haserl avec les privilèges du superutilisateur ?
 Lorsque haserl est installé pour être exécuté avec les privilèges du superutilisateur (« setuid root »), il règle automatiquement ses UID et GID sur ceux du propriétaire et du groupe du script.
 .
 Cela constitue une faille de sécurité potentielle, car les scripts appartenant à root sont lancés par root, même s'ils ne sont pas « setuid root »).
";
$elem["haserl/setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
