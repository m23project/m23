<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kdelibs5-data");

$elem["kdelibs5-data/upgrade_kdehome_running_title"]["type"]="title";
$elem["kdelibs5-data/upgrade_kdehome_running_title"]["description"]="Upgrading kdelibs5 while KDE 4 is running
";
$elem["kdelibs5-data/upgrade_kdehome_running_title"]["descriptionde"]="Aktualisierung von kdelibs5, während KDE 4 läuft
";
$elem["kdelibs5-data/upgrade_kdehome_running_title"]["descriptionfr"]="Mise à jour de kdelibs5 avec KDE 4 actif
";
$elem["kdelibs5-data/upgrade_kdehome_running_title"]["default"]="";
$elem["kdelibs5-data/upgrade_kdehome_running"]["type"]="boolean";
$elem["kdelibs5-data/upgrade_kdehome_running"]["description"]="Stop unsafe KDE 4 upgrade?
 You are about to upgrade to the new version of the kdelibs5 package, which
 introduces a major configuration change - details are given in
 /usr/share/doc/kdelibs5-data/README.Debian (in short: user settings are moved
 from ~/.kde4 to ~/.kde). However, some KDE 4 applications are currently
 running: ${apps}
 .
 It is recommended to abort the upgrade of kdelibs5, terminate all KDE
 applications and KDE sessions, and try upgrading again.
 .
 If you choose to continue the upgrade, you should make sure that no new
 KDE 4 applications are started before KDE 4 settings and data are migrated.
 A clean termination of the old KDE 4 session might not be safe.
";
$elem["kdelibs5-data/upgrade_kdehome_running"]["descriptionde"]="Unsichere Aktualisierung von KDE 4 beenden?
 Sie sind im Begriff, zu einer neuen Version des Pakets kdelibs5 zu aktualisieren, welche maßgebliche Änderungen in der Konfiguration einführt. Details finden Sie in /usr/share/doc/kdelibs5-data/README.Debian (in Kürze: Benutzereinstellungen werden von ~/.kde4 nach ~/.kde verschoben). Allerdings laufen einige KDE-4-Anwendungen momentan: ${apps}.
 .
 Es wird empfohlen, die Aktualisierung von kdelibs5 abzubrechen, alle KDE-Anwendungen und KDE-Sitzungen zu beenden und dann erneut zu versuchen, die Aktualisierung durchzuführen.
 .
 Wenn Sie sich entscheiden, mit dem Aktualisieren fortzufahren, dann sollten Sie sicher gehen, dass keine neuen KDE-4-Anwendungen gestartet werden, bevor Sie Ihre KDE-4-Einstellungen und Daten migriert haben. Beachten Sie, dass das saubere Beenden von alten KDE-4-Sitzungen unsicher sein könnte.
";
$elem["kdelibs5-data/upgrade_kdehome_running"]["descriptionfr"]="Faut-il interrompre la mise à jour de KDE 4 ?
 Le paquet kdelib5 va être mis à jour, avec pour conséquence un changement important de configuration dont les détails sont donnés dans le fichier /usr/share/doc/kdelibs5-data/README.Debian : en résumé, les paramètres utilisateurs sont déplacés depuis le répertoire ~/.kde4 vers le répertoire ~/.kde. Cependant, des applications KDE 4 sont actuellement utilisées : ${apps}.
 .
 Il est conseillé d'interrompre la mise à jour de kdelibs5, arrêter toutes les applications et sessions KDE puis lancer à nouveau la mise à jour.
 .
 Si vous choisissez de poursuivre la mise à jour, évitez de lancer de nouvelles applications KDE 4 tant que les réglages et données de KDE 4 n'ont pas été déplacés. Clôturer une ancienne session KDE 4 peut ne pas être suffisant.
";
$elem["kdelibs5-data/upgrade_kdehome_running"]["default"]="true";
$elem["kdelibs5-data/upgrade_kdehome_info_title"]["type"]="title";
$elem["kdelibs5-data/upgrade_kdehome_info_title"]["description"]="Upgrading kdelibs5
";
$elem["kdelibs5-data/upgrade_kdehome_info_title"]["descriptionde"]="Aktualisierung von kdelibs5
";
$elem["kdelibs5-data/upgrade_kdehome_info_title"]["descriptionfr"]="Mise à jour de kdelibs5
";
$elem["kdelibs5-data/upgrade_kdehome_info_title"]["default"]="";
$elem["kdelibs5-data/upgrade_kdehome_info"]["type"]="note";
$elem["kdelibs5-data/upgrade_kdehome_info"]["description"]="New user settings directory (KDEHOME) for KDE 4 applications
 Once this package is upgraded, KDE 4 applications will use ~/.kde as the default
 directory to store user settings and data in (also known as KDEHOME). Currently,
 KDE 4 applications use ~/.kde4. KDE 3 applications have always used (and will
 continue to use) ~/.kde.
 .
 When the upgrade is complete, it is safe to log in to KDE as usual; or, if you
 are only using individual KDE 4 applications, you may use the Kaboom wizard (in
 the package kaboom) to migrate user data before starting a KDE 4 application.
";
$elem["kdelibs5-data/upgrade_kdehome_info"]["descriptionde"]="Neues Verzeichnis für Benutzereinstellungen (KDEHOME) für KDE-4-Anwendungen
 Sobald dieses Paket aktualisiert ist, werden KDE-4-Anwendungen ~/.kde als Standard nutzen, um Benutzereinstellungen und Daten zu speichern (auch als KDEHOME bekannt). Momentan nutzen KDE-4-Anwendungen ~/.kde4. KDE-3-Anwendungen haben ~/.kde verwendet (und werden dies auch weiterhin tun).
 .
 Sobald die Aktualisierung vollständig ist, ist es sicher, sich wie gewöhnlich in KDE anzumelden oder, wenn Sie nur einzelne KDE-4-Anwendungen nutzen, können Sie den Assistent Kaboom (aus dem Paket kaboom) vor dem Start einer KDE-4-Anwendung zur Migration Ihrer Daten verwenden.
";
$elem["kdelibs5-data/upgrade_kdehome_info"]["descriptionfr"]="Nouveau répertoire pour les réglages des applications KDE 4 (KDEHOME)
 Après la mise à jour de ce paquet, les applications KDE 4 utiliseront ~/.kde comme répertoire par défaut pour les données et réglages utilisateur (répertoire aussi connu sous le nom KDEHOME). Actuellement, les applications KDE 4 utilisent ~/.kde4 alors que les applications KDE 3 utilisaient (et continueront à utiliser) ~/.kde.
 .
 Après la mise à jour, il sera possible d'ouvrir une session KDE normalement. Si vous vous contentez d'utiliser des applications KDE 4 isolées, il est conseillé d'utiliser l'assistant « Kaboom » fourni dans le paquet de même nom pour déplacer les données utilisateur avant de vous servir des applications.
";
$elem["kdelibs5-data/upgrade_kdehome_info"]["default"]="";
PKG_OptionPageTail2($elem);
?>
