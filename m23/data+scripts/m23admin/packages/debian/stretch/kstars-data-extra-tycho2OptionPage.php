<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kstars-data-extra-tycho2");

$elem["kstars-data-extra/kstarsrc-title"]["type"]="title";
$elem["kstars-data-extra/kstarsrc-title"]["description"]="Handling of kstars configuration file
";
$elem["kstars-data-extra/kstarsrc-title"]["descriptionde"]="Handhabung der Kstars-Konfigurationsdatei
";
$elem["kstars-data-extra/kstarsrc-title"]["descriptionfr"]="Gestion du fichier de configuration de kstars
";
$elem["kstars-data-extra/kstarsrc-title"]["default"]="";
$elem["kstars-data-extra/kstarsrc-exists"]["type"]="select";
$elem["kstars-data-extra/kstarsrc-exists"]["choices"][1]="keep";
$elem["kstars-data-extra/kstarsrc-exists"]["choices"][2]="replace (preserving backup)";
$elem["kstars-data-extra/kstarsrc-exists"]["choicesde"][1]="behalten";
$elem["kstars-data-extra/kstarsrc-exists"]["choicesde"][2]="ersetzen (Sicherungskopie aufbewahren)";
$elem["kstars-data-extra/kstarsrc-exists"]["choicesfr"][1]="conserver";
$elem["kstars-data-extra/kstarsrc-exists"]["choicesfr"][2]="remplacer (en préservant la sauvegarde)";
$elem["kstars-data-extra/kstarsrc-exists"]["description"]="Action for the /etc/kde4/kstarsrc file:
 A kstars global configuration file already exists.
 .
 The package installation process can't modify it, but you can
 back it up now and create a new one. You will be prompted for
 options in this file.
";
$elem["kstars-data-extra/kstarsrc-exists"]["descriptionde"]="Aktion für die Datei /etc/kde4/kstarsrc:
 Eine globale Kstars-Konfigurationsdatei existiert bereits.
 .
 Der Paketinstallationsprozess kann sie nicht verändern, aber Sie können sie nun sichern und eine neue erstellen. Sie werden nach Optionen in dieser Datei gefragt.
";
$elem["kstars-data-extra/kstarsrc-exists"]["descriptionfr"]="Action à mener pour le fichier /etc/kde4/kstarsrc ?
 Un fichier de configuration générale de kstars existe déjà.
 .
 Le processus d'installation du paquet n'est pas capable de le modifier, mais vous pouvez le sauvegarder maintenant et en créer un nouveau. Des questions sur les options vous seront posées.
";
$elem["kstars-data-extra/kstarsrc-exists"]["default"]="keep";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["type"]="boolean";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["description"]="Create /etc/kde4/kstarsrc file?
 There is no kstars global configuration file. 
 .
 A configuration file will be needed if user downloads should be
 disabled, but if not then it is still safe to create one. You will
 be prompted for options in this file.
";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["descriptionde"]="Datei /etc/kde4/kstarsrc erstellen?
 Es existiert keine globale Kstars-Konfigurationsdatei.
 .
 Falls Benutzer-Downloads deaktiviert sein sollten, wird eine Konfigurationsdatei benötigt, aber auch andernfalls ist es sicher, eine zu erstellen. Sie werden nach Optionen in dieser Datei gefragt.
";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["descriptionfr"]="Créer le fichier /etc/kde4/kstarsrc ?
 Il n'existe pas de fichier de configuration générale de kstars.
 .
 Un fichier de configuration sera nécessaire si le téléchargement pour les utilisateurs devait être désactivé. Même dans le cas contraire, il ne coûte riend'en créer un tout de même. Des questions sur les options de ce fichier vous seront posées.
";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["default"]="true";
$elem["kstars-data-extra/disable-downloads-title"]["type"]="title";
$elem["kstars-data-extra/disable-downloads-title"]["description"]="Disable or lock data downloads
";
$elem["kstars-data-extra/disable-downloads-title"]["descriptionde"]="Daten-Downloads deaktivieren oder sperren
";
$elem["kstars-data-extra/disable-downloads-title"]["descriptionfr"]="Désactivation ou blocage du téléchargement de données
";
$elem["kstars-data-extra/disable-downloads-title"]["default"]="";
$elem["kstars-data-extra/disable-downloads"]["type"]="select";
$elem["kstars-data-extra/disable-downloads"]["choices"][1]="enable";
$elem["kstars-data-extra/disable-downloads"]["choices"][2]="disable";
$elem["kstars-data-extra/disable-downloads"]["choicesde"][1]="aktivieren";
$elem["kstars-data-extra/disable-downloads"]["choicesde"][2]="deaktivieren";
$elem["kstars-data-extra/disable-downloads"]["choicesfr"][1]="activé";
$elem["kstars-data-extra/disable-downloads"]["choicesfr"][2]="désactivé";
$elem["kstars-data-extra/disable-downloads"]["description"]="User data downloads for kstars:
 KStars has a download feature allowing users to download extra data
 files for their own use. Since packaged catalogs can be handled more
 efficiently by installing a single central copy, you may wish to
 restrict the use of this feature.
 .
  * enable - users will be able to download data files;
  * disable - individual users can re-enable data downloads (to
    download other data files) in their .kstarsrc;
  * lock - users cannot enable data downloads.
";
$elem["kstars-data-extra/disable-downloads"]["descriptionde"]="Benutzerdaten-Downloads für Kstars:
 Kstars hat eine Download-Funktion, die es Benutzern ermöglicht, zusätzliche Dateien für ihren eigenen Gebrauch herunterzuladen. Da Paketkataloge effizienter durch das Installieren einer einzigen zentralen Kopie gehandhabt werden können, möchten Sie den Gebrauch dieser Funktion möglicherweise einschränken.
 .
  * aktivieren - Anwender werden in der Lage sein, Dateien herunterzuladen;
  * deaktivieren - einzelne Anwender können Daten-Downloads in ihrer .kstarsrc
    wieder aktivieren (um andere Dateien herunterzuladen);
  * sperren - Anwender können Daten-Downloads nicht einschalten.
";
$elem["kstars-data-extra/disable-downloads"]["descriptionfr"]="Téléchargements des données utilisateurs pour kstars :
 Kstars dispose d'une fonctionnalité autorisant les utilisateurs à télécharger des fichiers de données supplémentaires pour leur usage personnel. Comme les catalogues empaquetés peuvent être manipulés plus efficacement en en installant une copie centrale, vous pouvez préférer empêcher l'utilisation de cette fonctionnalité.
 .
 * activé - les utilisateurs pourront télécharger des fichiers de données;
 * désactivé - les utilisateurs pourront réactiver cette fonctionnalité
    individuellement (pour télécharger d'autres fichiers de données) dans
   leur fichier .kstarsrc;
 * bloqué - les utilisateurs ne pourront pas activer le téléchargement de
    données.
";
$elem["kstars-data-extra/disable-downloads"]["default"]="lock";
$elem["kstars-data-extra/kstarsrc-saved-title"]["type"]="title";
$elem["kstars-data-extra/kstarsrc-saved-title"]["description"]="Backup of old kstarsrc file
";
$elem["kstars-data-extra/kstarsrc-saved-title"]["descriptionde"]="Sicherungskopie der alten »kstarsrc«-Datei
";
$elem["kstars-data-extra/kstarsrc-saved-title"]["descriptionfr"]="Sauvegarde de l'ancien fichier kstarsrc
";
$elem["kstars-data-extra/kstarsrc-saved-title"]["default"]="";
$elem["kstars-data-extra/kstarsrc-saved"]["type"]="text";
$elem["kstars-data-extra/kstarsrc-saved"]["description"]="Former kstarsrc file saved
 The old kstarsrc file has been saved as /etc/kde4/kstarsrc.backup.kstars-data-extra.
";
$elem["kstars-data-extra/kstarsrc-saved"]["descriptionde"]="Vorherige »kstarsrc«-Datei gesichert
 Die alte »kstarsrc«-Datei wurde als /etc/kde4/kstarsrc.backup.kstars-data-extra gespeichert.
";
$elem["kstars-data-extra/kstarsrc-saved"]["descriptionfr"]="Ancien fichier kstatrsrc sauvegardé
 L'ancien fichier kstarsrc a été sauvegardé en tant que /etc/kde4/kstarsrc.backup.kstars-data-extra.
";
$elem["kstars-data-extra/kstarsrc-saved"]["default"]="";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["type"]="select";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["choices"][1]="unset";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["choices"][2]="previously exists";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["description"]="for internal use
 Not shown question to hold some data in the database
";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["descriptionde"]="";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["descriptionfr"]="";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["default"]="unset";
PKG_OptionPageTail2($elem);
?>
