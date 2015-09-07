<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("spamprobe");

$elem["spamprobe/db48_upgrade"]["type"]="note";
$elem["spamprobe/db48_upgrade"]["description"]="Upgrading to Berkeley DB 4.8
 As of spamprobe 1.4d-6, the database format changed
 to Berkeley DB 4.8 and spamprobe is no longer able to modify
 databases using an older format.
 .
 Since there is no general way to locate all existing databases, no
 automatic upgrade is attempted. A manual upgrade path using
 spamprobe export/import is outlined in the 'DATABASE MAINTENANCE' section
 of the spamprobe(1) manual page.
 .
 All spamprobe users on this system should be informed of this change
 and advised to read the README.Debian file.
";
$elem["spamprobe/db48_upgrade"]["descriptionde"]="Führe Upgrade auf Berkeley DB 4.8 durch
 Mit Spamprobe 1.4d-6 änderte sich das Datenbankformat auf Berkeley DB 4.8 und Spamprobe ist nicht mehr in der Lage, Datenbanken in älteren Formaten zu bearbeiten.
 .
 Da es keinen allgemeingültigen Weg gibt, um alle existierenden Datenbanken aufzuspüren, wird kein automatisches Upgrade versucht. Ein manueller Upgradepfad mittels export/import von Spamprobe wird im Abschnitt »DATABASE MAINTENANCE« der Handbuchseite von spamprobe(1) skizziert.
 .
 Alle Spamprobe-Benutzer auf diesem System sollten über diese Änderung informiert und angehalten werden, die Datei README.Debian zu lesen.
";
$elem["spamprobe/db48_upgrade"]["descriptionfr"]="Mise à jour vers Berkeley DB 4.8
 À partir de la version 1.4d-6 de spamprobe, le format de la base de données est devenu le format Berkeley 4.8. Par conséquence, spamprobe ne peut plus modifier les bases de données existantes si elles utilisent un format antérieur.
 .
 Comme il n'existe pas de méthode générique pour rechercher toutes les bases de données existantes, aucune mise à jour automatique ne sera tentée. Une procédure manuelle de mise à jour utilisant les fonctions d'import et export de spamprobe est documentée dans la section « DATABASE MAINTENANCE » (maintenance des bases de données) de la page de manuel de spamprobe(1).
 .
 Il est nécessaire d'informer tous les utilisateurs de spamprobe sur ce système afin qu'ils consultent le fichier README.Debian.
";
$elem["spamprobe/db48_upgrade"]["default"]="";
PKG_OptionPageTail2($elem);
?>
