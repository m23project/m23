<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("apt-listdifferences");

$elem["apt-listdifferences/initialize"]["type"]="boolean";
$elem["apt-listdifferences/initialize"]["description"]="Initialize the apt-listdifferences source packages database now?
 The source packages database for apt-listdifferences can be initialized now.
 Depending on your Internet connection, this may take a while, but it will also
 provide immediate functionality for the tool.
 .
 If you do not choose this option, apt-listdifferences will instead become functional slowly
 over time as more and more reference source packages get added to its database
 when they are first seen.
";
$elem["apt-listdifferences/initialize"]["descriptionde"]="Soll die Quellpaketdatenbank von Apt-listdifferences nun initialisiert werden?
 Die Quellpaketdatenbank von Apt-listdifferences kann nun initialisiert werden. Abhängig von Ihrer Internetverbindung kann dies eine Weile dauern, danach ist das Werkzeug aber sofort einsatzbereit.
 .
 Falls Sie diese Option nicht auswählen, wird Apt-listdifferences im Lauf der Zeit langsamer funktionieren, da der Datenbank mehr und mehr Referenzquellpakete beim ersten Auftauchen hinzugefügt werden.
";
$elem["apt-listdifferences/initialize"]["descriptionfr"]="Faut-il initialiser maintenant la base de données des paquets source d'apt-listdifferences ?
 La base de données des paquets source d'apt-listdifferences peut maintenant être initialisée. En fonction de votre connexion à Internet, cette opération peut prendre un certain temps, mais elle permettra à cet outil de fonctionner dès à présent.
 .
 Si vous ne choisissez pas cette option, apt-listdifferences n'atteindra sa pleine fonctionnalité que progressivement, les paquets source de référence étant ajoutés à la base de données au fur et à mesure qu'ils sont vus pour la première fois.
";
$elem["apt-listdifferences/initialize"]["default"]="true";
$elem["apt-listdifferences/purge"]["type"]="boolean";
$elem["apt-listdifferences/purge"]["description"]="Remove the apt-listdifferences source packages database?
 The apt-listdifferences source packages database is currently still present on disk. You can save
 a lot of space by removing it now, but if you ever plan to reinstall
 apt-listdifferences, the data will need to be downloaded again.
";
$elem["apt-listdifferences/purge"]["descriptionde"]="Soll die Quellpaketdatenbank von Apt-listdifferences entfernt werden?
 Die Quellpaketdatenbank von Apt-listdifferences ist derzeit immer noch auf der Platte vorhanden. Wenn Sie sie nun entfernen, können Sie viel Platz sparen. Falls Sie allerdings planen, Apt-listdifferences irgendwann erneut zu installieren, müssen Sie die Daten wieder herunterladen.
";
$elem["apt-listdifferences/purge"]["descriptionfr"]="Faut-il supprimer la base de données des paquets source d'apt-listdifferences ?
 La base de données des paquets source d'apt-listdifferences réside toujours sur votre disque. Vous pouvez gagner beaucoup d'espace en la supprimant maintenant, mais dans ce cas vous devrez télécharger de nouveau ces données si jamais vous deviez réinstaller apt-listdifferences à l'avenir.
";
$elem["apt-listdifferences/purge"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
