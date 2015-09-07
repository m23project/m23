<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("havp");

$elem["havp/loopback_mount"]["type"]="boolean";
$elem["havp/loopback_mount"]["description"]="Do you want to create a loopback spool file system?
 HAVP strictly requires the file system where it stores its temporary files
 during scanning to support mandatory locking. Many of the standard Linux
 file systems support this, but do not enable it by default. 
 .
 To use HAVP, you can either mount the file system that contains
 /var/spool/havp with the option \"mand\", or create a loopback file system that
 is mounted at /var/spool/havp only for HAVP.
 .
 If you are in doubt, you should accept this option to create a
 loopback spool file system.
";
$elem["havp/loopback_mount"]["descriptionde"]="Möchten Sie ein Spool-Dateisystem via Loopback erstellen?
 HAVP benötigt zwingend, dass das Dateisystem, in dem es seine temporären Dateien während des Scannens speichert, verbindliches Sperren (»mandatory locking«) unterstützt. Viele der Standard-Linux-Dateisysteme unterstützen dies, aber aktivieren es standardmäßig nicht.
 .
 Um HAVP zu verwenden, können Sie das Dateisystem, das /var/spool/havp enthält, entweder mit der Option »mand« einhängen, oder ein Loopback-Dateisystem erstellen, das nur für HAVP unter /var/spool/havp eingehängt wird.
 .
 Falls Sie unsicher sind, sollten Sie dieser Option zustimmen und ein Loopback-Spool-Dateisystem erstellen.
";
$elem["havp/loopback_mount"]["descriptionfr"]="Créer un système de fichiers en boucle pour la file d'attente ?
 Havp a besoin que le système de fichiers utilisé pour écrire les fichiers temporaires lors des analyses gère le verrouillage forcé (« mandatory locking »). La plupart des systèmes de fichiers standards sous Linux le gèrent mais sans l'activer par défaut.
 .
 Pour utiliser Havp, vous pouvez soit monter le système de fichiers qui contient /var/spool/havp avec l'option « mand », soit créer un système de fichier en boucle (« loopback ») spécialement pour havp et le monter sur /var/spool/havp.
 .
 Dans le doute, acceptez cette option afin de créer un système de fichiers en boucle.
";
$elem["havp/loopback_mount"]["default"]="true";
$elem["havp/loopback_size"]["type"]="string";
$elem["havp/loopback_size"]["description"]="Loopback file system size:
 Please enter the size (in megabytes) of the loopback file system to
 be created.
";
$elem["havp/loopback_size"]["descriptionde"]="Größe des Loopback-Dateisystems:
 Bitte geben Sie die Größe (in Megabytes) des Loopback-Dateisystems an, das erstellt werden soll.
";
$elem["havp/loopback_size"]["descriptionfr"]="Taille du système de fichiers en boucle :
 Veuillez indiquer la taille (en méga-octets) du système de fichiers en boucle qui doit être créé.
";
$elem["havp/loopback_size"]["default"]="100";
PKG_OptionPageTail2($elem);
?>
