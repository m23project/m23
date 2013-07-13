<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("movabletype-opensource");

$elem["movabletype-opensource/admin_account_warn"]["type"]="boolean";
$elem["movabletype-opensource/admin_account_warn"]["description"]="Install Movable Type?
 When configuring a new database with this package (for example when
 installing it for the first time) the Movabletype install starts off
 being non-password-protected; that is, the first person to visit
 http://your.server/cgi-bin/movabletype/mt.cgi will be able to set the
 admin password and take control of your Movable Type installation.
 .
 You should take appropriate measures, such as remembering to configure
 the admin account straight after the install is completed, or restricting
 access to your web server.
";
$elem["movabletype-opensource/admin_account_warn"]["descriptionde"]="Movable Types installieren?
 Wenn eine neue Datenbank mit diesem Paket eingerichtet wird (zum Beispiel, wenn die Installation zum ersten Mal ausgeführt wird), ist die Movable-Types-Installation zuerst nicht passwortgeschützt. Dies bedeutet, dass die erste Person, die http://ihr.server/cgi-bin/movabletype/mt.cgi aufruft, in der Lage ist, das Administrationspasswort zu setzen und die Kontrolle über Ihre Movable-Type-Installation zu übernehmen.
 .
 Sie sollten entsprechende Maßnahmen ergreifen, wie zum Beispiel das Administrationskonto direkt nach der Installation einzurichten oder den Zugriff auf Ihren Webserver einzuschränken.
";
$elem["movabletype-opensource/admin_account_warn"]["descriptionfr"]="Faut-il installer Movable Type ?
 Lors de la configuration d'une nouvelle base de données avec ce paquet (par exemple lors de sa première installation) aucune protection par mot de passe n'est mise en place. La première personne à visiter http://votre.serveur/cgi-bin/movabletype/mt.cgi pourra donc définir un mot de passe superutilisateur et prendre le contrôle Movabletype.
 .
 Vous devriez prendre certaines précautions, comme vous assurer de configurer le compte superutilisateur immédiatement après la fin de l'installation, ou restreindre l'accès au serveur web dans l'intervalle.
";
$elem["movabletype-opensource/admin_account_warn"]["default"]="";
$elem["movabletype-opensource/umask_warn"]["type"]="note";
$elem["movabletype-opensource/umask_warn"]["description"]="Insecure umask setting
 Due to an error preparing a previous version of the Movable Type package,
 a typo was introduced into the default configuration file which caused
 a dangerous umask to be set when publishing. This may have caused blog
 files to be created world-writable.
 .
 You should check and fix the permissions of such files, and ensure that
 the typo fix (HTMLUask should be HTMLUmask) is applied to your
 configuration file, /etc/opensource-movabletype/mt-config.cgi, once this
 package installation has completed.
";
$elem["movabletype-opensource/umask_warn"]["descriptionde"]="Unsichere »umask«-Einstellung
 Auf Grund eines Fehlers beim Vorbereiten einer vorhergehenden Version des »Movable Type«-Paketes wurde ein Tippfehler in der Standardkonfigurationsdatei mitausgeliefert, der eine gefährliche »umask«-Einstellung enthielt, die beim Veröffentlichen angewandt wird. Dies könnte dazu geführt haben, dass Blog-Dateien für jeden schreibbar erstellt worden sein könnten.
 .
 Sie sollten die Rechte solcher Dateien überprüfen und sicherstellen, dass der Schreibfehler (»HTMLUask« sollte eigentlich »HTMLUmask« lauten) in Ihrer Konfigurationsdatei »/etc/opensource-movabletype/mt-config.cgi« entfernt wurde, nachdem diese Paketinstallation abgeschlossen ist.
";
$elem["movabletype-opensource/umask_warn"]["descriptionfr"]="Réglage de masque de permissions dangereux.
 Suite à une erreur lors de la préparation d'une version précédente du paquet de Movable Type, une coquille a été faite dans le fichier de configuration par défaut, qui conduisait à utiliser une valeur dangereuse pour le réglage du masque de permissions (« umask ») lors d'une publication. Cette erreur peut avoir rendu des fichiers de blog accessibles en écriture pour n'importe qui.
 .
 Vous devriez vérifier et mettre à jour les permissions de ces fichiers ainsi que vous assurer que le la correction est bien appliquée à votre fichier de configuration /etc/opensource-movabletype/mt-config.cgi («HTMLUask» devrait y être remplacé par «HTMLUmask»), une fois l'installation de ce paquet terminée.
";
$elem["movabletype-opensource/umask_warn"]["default"]="";
$elem["movabletype-opensource/schema_upgrade"]["type"]="boolean";
$elem["movabletype-opensource/schema_upgrade"]["description"]="Continue with package upgrade which may need schema upgrades?
 You are about to upgrade the Movable Type package to a version which may
 include a new database schema version. To ensure continued functionality
 of Movable Type sites, you should log into any configured instances with
 an administrator account immediately after this package upgrade has
 completed, where you will be prompted to upgrade databases as required.
";
$elem["movabletype-opensource/schema_upgrade"]["descriptionde"]="Soll mit dem Upgrade des Pakets, welches eventuell Upgrades der verwandten Schemas benötigt, fortgefahren werden?
 Sie sind dabei, ein Upgrade des Movable-Type-Pakets auf eine Version durchzuführen, die ein neues Datenbankschema enthalten kann. Damit die Movable-Type-Sites weiterhin funktionieren, sollten Sie sich direkt nach dem Abschluss dieses Upgrades in allen konfigurierten Instanzen als Administrator anmelden. Dort werden Sie durch die notwendigen Datenbank-Upgrades geführt.
";
$elem["movabletype-opensource/schema_upgrade"]["descriptionfr"]="Faut-il poursuivre la mise à jour qui peut nécessiter des mises à jour de schémas ?
 Le paquet Movable Type va être mis à jour vers une version qui pourrait nécessiter l'utilisation d'une nouvelle version de schéma de base de données. Pour conserver les sites Movable Type opérationnels, vous devriez vous connecter sur les instances existantes avec un identifiant possédant les privilèges d'administration dès la fin de ce processus de mise à jour. La mise à jour des bases de données vous sera alors proposée.
";
$elem["movabletype-opensource/schema_upgrade"]["default"]="";
$elem["movabletype-opensource/reload_apache"]["type"]="boolean";
$elem["movabletype-opensource/reload_apache"]["description"]="Automatically reload Apache after modifying configuration?
 This package includes an Apache configuration fragment which should be
 applied to your running configuration. You can choose to have the package
 post-installation reload Apache for you, or do it manually.
";
$elem["movabletype-opensource/reload_apache"]["descriptionde"]="Soll die Konfiguration des Apache automatisch nach der Veränderung neu geladen werden?
 Dieses Paket enthält Einstellungen für Apache, die in Ihre Konfiguration eingebunden werden sollten. Sie können wählen, ob dieses Paket die Konfiguration des Apache während des Abschlusses der Installation neu laden soll oder Sie diesen Schritt manuell ausführen wollen.
";
$elem["movabletype-opensource/reload_apache"]["descriptionfr"]="Faut-il redémarrer Apache après avoir modifié la configuration ?
 Ce paquet fournit des paramètres de configuration pour Apache, qui doivent être mis en service dans la configuration actuelle. Vous pouvez choisir de redémarrer automatiquement Apache pour que ces modifications soient prises en compte, ou le faire vous-même plus tard.
";
$elem["movabletype-opensource/reload_apache"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
