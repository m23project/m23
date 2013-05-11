<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("freepops");

$elem["freepops/init"]["type"]="boolean";
$elem["freepops/init"]["description"]="Start freepopsd automatically after each boot?
 The FreePOPs daemon can be started automatically after each boot.
 By default, it will bind to port 2000. This setting may be changed by
 editing the /etc/default/freepops file.
";
$elem["freepops/init"]["descriptionde"]="Freepopsd automatisch nach jedem Systemstart starten?
 Der FreePOPs-Daemon kann nach jedem Systemstart automatisch gestartet werden. Standardmäßig bindet er sich an Port 2000. Diese Einstellung kann durch Bearbeiten der Datei /etc/default/freepops geändert werden.
";
$elem["freepops/init"]["descriptionfr"]="Faut-il lancer freepopsd automatiquement au démarrage du système ?
 Le démon FreePOPs peut être lancé automatiquement au démarrage du système. Par défaut, il sera lié au port 2000 mais cela peut être changé en modifiant le fichier /etc/default/freepops.
";
$elem["freepops/init"]["default"]="";
$elem["freepops/jail"]["type"]="boolean";
$elem["freepops/jail"]["description"]="Create a chroot jail for FreePOPs?
 FreePOPs can be launched in a chrooted environment to improve the
 system's security.
 .
 The jail will be created in /var/lib/freepops/chroot-jail/.
 The regular init script will then take care of launching the daemon
 by calling a script named start.sh at the root of the chroot jail.
";
$elem["freepops/jail"]["descriptionde"]="Ein Chroot-Gefängnis (jail) für FreePOPs erstellen?
 FreePOPs kann in einer Chroot-Umgebung gestartet werden, um die Sicherheit des Systems zu verbessern.
 .
 Das Gefängnis wird in /var/lib/freepops/chroot-jail/ erstellt. Das reguläre Init-Skript wird sich darum kümmern, den Daemon zu starten, indem ein Skript namens start.sh im Wurzelverzeichnis des Chroot-Gefängnisses gestartet wird.
";
$elem["freepops/jail"]["descriptionfr"]="Faut-il créer un environnement sécurisé (« chroot jail ») pour FreePOPs ?
 FreePOPs peut être lancé depuis un environnement sécurisé (« chroot jail ») pour améliorer la sécurité du système.
 .
 L'environnement sécurisé sera créé dans /var/lib/freepops/chroot-jail/. Le script de démarrage lancera alors le démon via un script appelé « start.sh », situé à la racine de cet environnement sécurisé.
";
$elem["freepops/jail"]["default"]="false";
$elem["freepops/updates"]["type"]="boolean";
$elem["freepops/updates"]["description"]="Remove local updates on upgrade?
 The freepops-updater-fltk or freepops-updater-dialog utilities will
 install local updates in /var/lib/freepops/lua_updates.
 .
 Such updates are usually integrated in further FreePOPs releases or
 can be downloaded again by running the updater. Therefore, they
 may safely be removed when the package is upgraded.
 .
 The modules saved in /var/lib/freepops/lua_updates have a higher
 priority than those from /usr/share/freepops/lua. It is thus
 recommended to remove the former in order to avoid using outdated modules,
 unless you intend to freeze the local modifications regardless of
 FreePOPs upgrades.
";
$elem["freepops/updates"]["descriptionde"]="Lokale Aktualisierungen beim Upgrade entfernen?
 Die Hilfswerkzeuge »freepops-updater-fltk« und »freepops-updater-dialog« werden lokale Aktualisierungen in /var/lib/freepops/lua_updates installieren.
 .
 Diese Aktualisierungen werden typischerweise in zukünftige FreePOPs-Veröffentlichungen integriert oder können durch Aufruf des Aktualisierers erneut heruntergeladen werden. Daher können sie ohne Probleme entfernt werden, wenn ein Upgrade des Pakets durchgeführt wird.
 .
 Die unter /var/lib/freepops/lua_updates gespeicherten Module haben eine höhere Priorität als die Module aus /usr/share/freepops/lua. Es wird daher empfohlen, erstere zu entfernen, um zu vermeiden, veraltete Module zu verwenden. Es sei denn, Sie möchten lokale Änderungen unabhängig von Upgrades von FreePOPs einfrieren.
";
$elem["freepops/updates"]["descriptionfr"]="Faut-il supprimer les mises à jour locales lors de la mise à niveau ?
 Les utilitaires « freepops-updater-fltk » et « freepops-updater-dialog » installent des mises à jour dans le répertoire /var/lib/freepops/lua_updates.
 .
 Ces mises à jour sont en général intégrées dans les versions ultérieures de Free POPs ou peuvent être téléchargées à nouveau avec ces utilitaires. Il est donc sans danger de les supprimer lors de la mise à niveau du paquet.
 .
 Les modules conservés dans /var/lib/freepops/lua_updates ont une priorité supérieure à ceux de /usr/share/freepops/lua. Il est donc recommandé de les supprimer afin d'éviter l'utilisation de modules périmés, à moins de vouloir geler des modifications locales quels que soient les changements apportés lors des mises à niveau de FreePOPs.
";
$elem["freepops/updates"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
