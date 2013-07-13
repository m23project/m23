<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("byobu");

$elem["byobu/launch-by-default"]["type"]="boolean";
$elem["byobu/launch-by-default"]["description"]="Launch Byobu at shell login for all users?
 Byobu can be launched automatically on all shell logins (via the console,
 SSH, etc.), to provide a screen session manager.
 .
 If you select this option, a symlink will be created in /etc/profile.d.
 This setting is system-wide, for all user logins. Individual users can
 opt out by using the utility \"byobu-config\" or by creating the file
 \"disable-autolaunch\" in their byobu configuration directory.
";
$elem["byobu/launch-by-default"]["descriptionde"]="Byobu für alle Benutzer bei Anmeldungen in der Shell starten?
 Byobu kann bei allen Shell-Anmeldungen (mittels Konsole, SSH, etc.) automatisch gestartet werden, um eine bildschirmorientierte Sitzungsverwaltung bereitzustellen.
 .
 Falls Sie diese Option wählen, wird Byobu einen symbolischen Link in /etc/profile.d erstellen. Diese Einstellung gilt systemweit für alle Benutzer, die sich anmelden. Die einzelnen Benutzer können dies abschalten, indem sie das Programm »byobu-config« nutzen oder die Datei »disable-autolaunch« in ihrem Byobu-Konfigurationsverzeichnis anlegen.
";
$elem["byobu/launch-by-default"]["descriptionfr"]="Lancer Byobu à la connexion de chaque utilisateur ?
 Byobu peut être exécuté automatiquement lors de la connexion à un interpréteur de commande (par la console, SSH, etc.) afin de fournir un gestionnaire de sessions d'écran.
 .
 Si cette option est sélectionnée, un lien symbolique sera créé dans /etc/profile.d. Ce réglage est global au système, pour toutes les connexions d'utilisateurs. Les utilisateurs qui le souhaitent peuvent le désactiver en utilisant l'utilitaire « byobu-config » ou en créant le fichier « disable-autolaunch » dans leur répertoire de configuration de Byobu.
";
$elem["byobu/launch-by-default"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
