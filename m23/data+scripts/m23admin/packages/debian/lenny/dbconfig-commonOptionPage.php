<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dbconfig-common");

$elem["dbconfig-common/remote-questions-default"]["type"]="boolean";
$elem["dbconfig-common/remote-questions-default"]["description"]="Will this server be used to access remote databases?
 For the database types that support it, dbconfig-common includes support
 for configuring databases on remote systems.  When installing a package's
 database via dbconfig-common, the questions related to remote
 configuration are asked with a priority such that they are
 skipped for most systems.
 .
 If you select this option, the default behaviour will be to prompt you
 with questions related to remote database configuration when you install
 new packages.
 .
 If you are unsure, you should not select this option.
";
$elem["dbconfig-common/remote-questions-default"]["descriptionde"]="Wird dieser Server zum Zugriff auf entfernte Datenbanken verwendet werden?
 Für die Datenbanktypen, die dies unterstützen, enthält dbconfig-common Unterstützung für die Konfiguration von Datenbanken auf entfernten Systemen. Bei der Installation einer Datenbank eines Pakets mittels dbconfig-common werden die Fragen bezüglich einer entfernten Datenbank mit solch einer Priorität gestellt, dass sie auf den meisten Systemen ausgelassen werden.
 .
 Falls Sie diese Option wählen, werden Ihnen standardmäßig Fragen mit Bezug auf die Konfiguration entfernter Datenbanken gestellt, wenn Sie neue Pakete installieren.
 .
 Falls Sie sich unsicher sind, sollten Sie diese Option nicht auswählen.
";
$elem["dbconfig-common/remote-questions-default"]["descriptionfr"]="Ce serveur sera-t-il utilisé pour accéder à des bases de données distantes ?
 Pour les gestionnaires de bases de données qui le permettent, dbconfig-common gère la configuration des bases de données sur des systèmes distants. Lorsque dbconfig-common crée des bases de données pour un paquet, les questions relatives à la configuration de bases de données distantes sont posées avec une priorité qui les rendra invisibles sur la plupart des systèmes.
 .
 Si vous choisissez cette option, les questions relatives à la configuration de bases de données distantes vous seront posées lors de l'installation de nouveaux paquets.
 .
 Dans le doute, vous ne devriez pas choisir cette option.
";
$elem["dbconfig-common/remote-questions-default"]["default"]="false";
$elem["dbconfig-common/remember-admin-pass"]["type"]="boolean";
$elem["dbconfig-common/remember-admin-pass"]["description"]="Keep \"administrative\" database passwords in debconf?
 By default, you will be prompted for all administrator-level database
 passwords when you configure, upgrade, or remove applications with
 dbconfig-common.  These passwords will not be stored in debconf for
 any longer than they are needed.
 .
 This behavior can be disabled, in which case the passwords will
 remain in the debconf password database.  The debconf password
 database is protected by unix file permissions, though this is
 less secure and thus not the default setting.
 .
 If you would rather not be bothered for an administrative password
 every time you upgrade a database application with dbconfig-common,
 you should choose this option.  Otherwise, you should refuse this option.
";
$elem["dbconfig-common/remember-admin-pass"]["descriptionde"]="»Administrative« Datenbank-Passwörter in Debconf speichern?
 Standardmäßig werden alle administrativen Datenbank-Passwörter während der Konfiguration, dem Upgrade oder dem Löschen von Anwendungen mit dbconfig-common abgefragt. Diese Passwörter werden von Debconf nicht länger als nötig gespeichert.
 .
 Dieses Verhalten kann abgeschaltet werden, indem die Passwörter in der Debconf-Passwort-Datenbank gespeichert bleiben. Die Debconf-Passwort-Datenbank ist durch UNIX-Dateirechte geschützt, allerdings verringert dies die Sicherheit und daher ist es nicht die Standard-Einstellung. 
 .
 Falls das administrative Passwort nicht bei jedem Upgrade der Datenbank-Anwendung mit dbconfig-common aktualisiert werden soll, so wählen Sie diese Option. Andernfalls sollten Sie diese Option ablehnen.
";
$elem["dbconfig-common/remember-admin-pass"]["descriptionfr"]="Faut-il garder les mots de passe des administrateurs des bases de données ?
 Par défaut, vous devrez indiquer les mots de passe des administrateurs des bases de données lors de chaque configuration, mise à jour ou suppression des applications qui utilisent dbconfig-common. Ces mots de passe ne seront pas conservés plus longtemps que nécessaire.
 .
 Ce comportement peut être désactivé ; les mots de passe seront alors conservés dans la base de données du système de configuration (debconf). Celle-ci est protégée par les permissions d'accès aux fichiers correspondants. Cependant, ce comportement moins sécurisé n'est pas le réglage par défaut.
 .
 Pour ne pas avoir à indiquer un mot de passe d'administration à chaque fois que vous mettez à jour avec dbconfig-common une application utilisant une base de données, vous pouvez choisir cette option. Dans le cas contraire, ne la choisissez pas.
";
$elem["dbconfig-common/remember-admin-pass"]["default"]="false";
$elem["dbconfig-common/dbconfig-install"]["type"]="boolean";
$elem["dbconfig-common/dbconfig-install"]["description"]="Configure database for ${pkg} with dbconfig-common?
 ${pkg} must have a database installed and configured before
 it can be used.  If you like, this can be handled with
 dbconfig-common.
 .
 If you are an advanced database administrator and know that you want
 to perform this configuration manually, or if your database has already
 been installed and configured, you should refuse this option.  Details on what
 needs to be done should most likely be provided in /usr/share/doc/${pkg}.
 .
 Otherwise, you should probably choose this option.
";
$elem["dbconfig-common/dbconfig-install"]["descriptionde"]="Konfigurieren der Datenbank für ${pkg} mit dbconfig-common?
 ${pkg} muss eine Datenbank installiert und konfiguriert haben, bevor es benutzt werden kann. Falls Sie es wünschen, kann das mit Hilfe von dbconfig-common geschehen.
 .
 Falls Sie ein erfahrener Datenbankadministrator sind und wissen, dass Sie diese Konfiguration manuell durchführen möchten oder, falls Ihre Datenbank bereits installiert und konfiguriert ist, verwerfen Sie diese Option. Details zur manuellen Installation sind üblicherweise in /usr/share/doc/${pkg} zu finden.
 .
 Andernfalls sollte diese Option wahrscheinlich gewählt werden.
";
$elem["dbconfig-common/dbconfig-install"]["descriptionfr"]="Faut-il configurer la base de données de ${pkg} avec dbconfig-common ?
 ${pkg} a besoin d'une base de données installée et configurée avant de pouvoir être utilisé. Si vous le souhaitez, dbconfig-common peut prendre cette opération en charge.
 .
 Si vous êtes un administrateur de bases de données expérimenté et si vous savez que vous voulez procéder à cette configuration vous-même, ou si votre base de données est déjà installée et configurée, vous pouvez refuser cette option. Des précisions sur la procédure se trouvent dans /usr/share/doc/${pkg}.
 .
 Autrement, vous devriez choisir cette option.
";
$elem["dbconfig-common/dbconfig-install"]["default"]="true";
$elem["dbconfig-common/dbconfig-reinstall"]["type"]="boolean";
$elem["dbconfig-common/dbconfig-reinstall"]["description"]="Re-install database for ${pkg}?
 Since you are reconfiguring ${pkg}, you may also want to reinstall the
 database which it uses.
 .
 If you wish to re-install the database for ${pkg}, you should select
 this option.  If you do not wish to do so (if you are reconfiguring
 the package for unrelated reasons), you should not select this option.
";
$elem["dbconfig-common/dbconfig-reinstall"]["descriptionde"]="Datenbank für ${pkg} neu installieren?
 Da Sie ${pkg} neu konfigurieren, möchten Sie vielleicht auch die Datenbank, die es verwendet, neu installieren.
 .
 Falls Sie die Datenbank für ${pkg} neu installieren wollen, sollten Sie diese Option wählen. Falls Sie dies nicht wünschen (falls Sie das Paket aus anderen Gründen neu installieren), sollten Sie diese Option nicht wählen.
";
$elem["dbconfig-common/dbconfig-reinstall"]["descriptionfr"]="Faut-il réinstaller la base de données pour ${pkg} ?
 Comme vous reconfigurez ${pkg}, il est possible que vous vouliez réinstaller la base de données qu'il utilise.
 .
 Si vous souhaitez réinstaller la base de données de ${pkg}, vous devriez choisir cette option. Dans le cas contraire, ou si vous reconfigurez le paquet pour d'autres raisons, ne la choisissez pas.
";
$elem["dbconfig-common/dbconfig-reinstall"]["default"]="false";
$elem["dbconfig-common/dbconfig-upgrade"]["type"]="boolean";
$elem["dbconfig-common/dbconfig-upgrade"]["description"]="Perform upgrade on database for ${pkg} with dbconfig-common?
 According to the maintainer for this package, database upgrade
 operations need to be formed on ${pkg}.  Typically this is due to
 changes in how a new upstream version of the package needs to store
 its data.
 .
 If you want to handle this process manually, you should
 refuse this option.  Otherwise, you should choose this option.
 During the upgrade a backup of your database will be made in
 /var/cache/dbconfig-common/backups, from which the database can
 be restored in the case of problems.
";
$elem["dbconfig-common/dbconfig-upgrade"]["descriptionde"]="Upgrade der Datenbank für ${pkg} mit dbconfig-common durchführen?
 Der Betreuer des Paketes ${pkg} hält es für erforderlich, dass Operationen zum Upgrade der Datenbank durchgeführt werden. Typischerweise ist das durch Änderungen, wie eine neue Version der Anwendung ihre Daten speichert, begründet.
 .
 Falls Sie diesen Prozess manuell durchführen möchten, lehnen Sie diese Option ab. Andernfalls sollte diese Option gewählt werden. Während des Upgrades wird ein Backup der existierenden Datenbank im Verzeichnis /var/cache/dbconfig-common/backups angelegt, von dem die Datenbank im Falle auftretender Probleme wiederhergestellt werden kann.
";
$elem["dbconfig-common/dbconfig-upgrade"]["descriptionfr"]="Faut-il mettre à jour la base de données pour ${pkg} avec dbconfig-common ?
 Selon le responsable de ce paquet, une mise à jour de la base de données pour ${pkg} est nécessaire. Cela est habituellement dû à des changements dans la manière dont le nouveau paquet enregistre ses données.
 .
 Si vous désirez vous occuper de ce processus vous-même, vous pouvez refuser cette option. Sinon, acceptez-la. Lors d'une mise à jour, une sauvegarde de votre base de données sera faite dans /var/cache/dbconfig-common/backups ; en cas de problème, vous pourrez restaurer vos données à partir de celle-ci.
";
$elem["dbconfig-common/dbconfig-upgrade"]["default"]="true";
$elem["dbconfig-common/dbconfig-remove"]["type"]="boolean";
$elem["dbconfig-common/dbconfig-remove"]["description"]="Deconfigure database for ${pkg} with dbconfig-common?
 Since you are removing ${pkg}, it's possible that you no longer
 want the underlying database.
 .
 If you like, database removal can be handled with dbconfig-common.
 .
 If you know that you do want to keep this database, or if you want
 to handle the removal of this database manually, you should refuse
 this option.
 .
 Otherwise, you should choose this option.
";
$elem["dbconfig-common/dbconfig-remove"]["descriptionde"]="Dekonfigurieren der Datenbank für ${pkg} mit dbconfig-common?
 Da das Paket ${pkg} entfernt werden soll, ist es möglich, dass die eingerichtete Datenbank nicht mehr benötigt wird.
 .
 Falls gewünscht, kann das Löschen der Datenbank mit Hilfe von dbconfig-common durchgeführt werden.
 .
 Falls Sie wissen, dass Sie diese Datenbank erhalten wollen oder wenn Sie das Löschen manuell durchführen wollen, lehnen Sie diese Option ab.
 .
 Andernfalls sollte diese Option gewählt werden.
";
$elem["dbconfig-common/dbconfig-remove"]["descriptionfr"]="Faut-il récupérer la configuration initiale du paquet ${pkg} avec dbconfig-common ?
 Comme vous supprimez ${pkg}, il est possible que vous ne vouliez plus utiliser la base de données qui lui était liée.
 .
 Si vous le souhaitez, dbconfig-common peut supprimer la base de données.
 .
 Si vous souhaitez garder cette base de données ou si vous voulez la supprimer vous-même, vous pouvez refuser cette option.
 .
 Autrement, vous devriez choisir cette option.
";
$elem["dbconfig-common/dbconfig-remove"]["default"]="true";
$elem["dbconfig-common/database-type"]["type"]="select";
$elem["dbconfig-common/database-type"]["description"]="Database type to be used by ${pkg}:
 ${pkg} can be configured to use one of many database types.
 Below, you will be presented with the available choices.
";
$elem["dbconfig-common/database-type"]["descriptionde"]="Datenbanktyp, der durch das Paket ${pkg} benutzt werden soll:
 ${pkg} kann derart konfiguriert werden, dass verschiedene Datenbanktypen zum Einsatz kommen können. Unten sind die verschiedenen Möglichkeiten aufgelistet.
";
$elem["dbconfig-common/database-type"]["descriptionfr"]="Type de serveur de bases de données à utiliser avec ${pkg} :
 Le paquet ${pkg} peut être configuré pour utiliser l'un des nombreux types de serveur de bases de données. Ci-dessous vous seront présentés les choix disponibles.
";
$elem["dbconfig-common/database-type"]["default"]="";
$elem["dbconfig-common/purge"]["type"]="boolean";
$elem["dbconfig-common/purge"]["description"]="Do you want to purge the database for ${pkg}?
 If you no longer need the database for ${pkg}, this is your
 chance to remove them.
 .
 If you no longer have need of the data being stored by ${pkg}, you
 should choose this option.  If you want to hold this data for another
 time, or if you would rather handle this process manually, you should
 refuse this option.
";
$elem["dbconfig-common/purge"]["descriptionde"]="Soll die Datenbank für ${pkg} vollständig gelöscht werden?
 Falls die Datenbank für ${pkg} nicht mehr benötigt werden sollte, bietet sich jetzt die Chance, sie zu löschen.
 .
 Falls es keine Verwendung mehr für die durch ${pkg} gespeicherten Daten geben sollte, wählen Sie diese Option. Wenn die Daten für spätere Verwendung aufgehoben werden sollen oder dieser Prozess manuell durchgeführt werden soll, lehnen Sie diese Option ab.
";
$elem["dbconfig-common/purge"]["descriptionfr"]="Faut-il purger la base de données pour ${pkg} ?
 Si vous n'avez plus besoin de la base de données pour ${pkg}, vous pouvez maintenant choisir de la supprimer.
 .
 Si vous n'avez plus besoin des données enregistrées par ${pkg}, vous pouvez choisir cette option. Si vous souhaitez conserver ces données, ou si vous préférez gérer vous-même ce processus, vous pouvez refuser cette option.
";
$elem["dbconfig-common/purge"]["default"]="false";
$elem["dbconfig-common/upgrade-backup"]["type"]="boolean";
$elem["dbconfig-common/upgrade-backup"]["description"]="Do you want to backup the database for ${pkg} before upgrading?
 The underlying database for ${pkg} needs to be upgraded as part of the
 installation progress.  Just in case, the database can be backed up
 before this is done, so that if something goes wrong, you can revert
 to the previous package version and repopulate your database.
";
$elem["dbconfig-common/upgrade-backup"]["descriptionde"]="Soll ein Backup der Datenbank für ${pkg} vor dem Upgrade durchgeführt werden?
 Für die dem Paket ${pkg} zu Grunde liegende Datenbank muss während des Installationsprozesses ein Upgrade durchgeführt werden. Für den Fall der Fälle kann vorher ein Backup der Datenbank erstellt werden, so dass zu der alten Version des Paketes zurückgegangen werden kann und die alten Daten wieder eingespielt werden können.
";
$elem["dbconfig-common/upgrade-backup"]["descriptionfr"]="Faut-il sauvegarder la base de données pour ${pkg} avant la mise à jour ?
 La mise à jour de la base de données utilisée par ${pkg} fait partie du processus d'installation. Elle peut être préalablement sauvée et ainsi, en cas de problème, vous pourrez réinstaller le paquet précédent et réalimenter la base de données.
";
$elem["dbconfig-common/upgrade-backup"]["default"]="true";
$elem["dbconfig-common/password-confirm"]["type"]="password";
$elem["dbconfig-common/password-confirm"]["description"]="Password confirmation:
";
$elem["dbconfig-common/password-confirm"]["descriptionde"]="Passwort-Bestätigung:
";
$elem["dbconfig-common/password-confirm"]["descriptionfr"]="Confirmation du mot de passe :
";
$elem["dbconfig-common/password-confirm"]["default"]="";
$elem["dbconfig-common/app-password-confirm"]["type"]="password";
$elem["dbconfig-common/app-password-confirm"]["description"]="Password confirmation:
";
$elem["dbconfig-common/app-password-confirm"]["descriptionde"]="Passwort-Bestätigung:
";
$elem["dbconfig-common/app-password-confirm"]["descriptionfr"]="Confirmation du mot de passe :
";
$elem["dbconfig-common/app-password-confirm"]["default"]="";
$elem["dbconfig-common/passwords-do-not-match"]["type"]="note";
$elem["dbconfig-common/passwords-do-not-match"]["description"]="Passwords do not match.
 The passwords you supplied do not match.  Please try again.
";
$elem["dbconfig-common/passwords-do-not-match"]["descriptionde"]="Die Passwörter stimmen nicht überein.
 Die eingegebenen Passwörter stimmen nicht überein. Bitte versuchen Sie es noch einmal!
";
$elem["dbconfig-common/passwords-do-not-match"]["descriptionfr"]="Les mots de passe ne correspondent pas
 Les mots de passe que vous avez indiqués ne correspondent pas. Veuillez réessayer.
";
$elem["dbconfig-common/passwords-do-not-match"]["default"]="";
$elem["dbconfig-common/upgrade-error"]["type"]="select";
$elem["dbconfig-common/upgrade-error"]["choices"][1]="abort";
$elem["dbconfig-common/upgrade-error"]["choices"][2]="retry";
$elem["dbconfig-common/upgrade-error"]["choicesde"][1]="Abbruch";
$elem["dbconfig-common/upgrade-error"]["choicesde"][2]="Wiederholen";
$elem["dbconfig-common/upgrade-error"]["choicesfr"][1]="Abandonner";
$elem["dbconfig-common/upgrade-error"]["choicesfr"][2]="Recommencer";
$elem["dbconfig-common/upgrade-error"]["description"]="Error upgrading database for ${pkg}.  Retry?
 An error seems to have occurred while upgrading the database.
 If it's of any help, this was the error encountered:
 .
 ${error}
 .
 Fortunately, there should be a backup of the database made just before
 the upgrade in ${dbfile}.
 .
 At this point, you have the option to retry or abort the operation.
 If you choose \"retry\", you will be prompted with all the configuration
 questions once more and another attempt will be made at performing the
 operation. \"retry (skip questions)\" will immediately attempt the operation
 again, skipping all questions.  If you choose \"abort\", the operation will
 fail and you will need to downgrade, reinstall, reconfigure this package,
 or otherwise manually intervene to continue using it.
";
$elem["dbconfig-common/upgrade-error"]["descriptionde"]="Fehler beim Upgrade der Datenbank von ${pkg}. Wiederholen?
 Es scheint ein Fehler beim Upgrade der Datenbank aufgetreten zu sein. Als Hilfestellung hier die aufgetretene Fehlermeldung:
 .
 ${error}
 .
 Glücklicherweise existiert ein Backup der Datenbank in der Datei ${dbfile}, das unmittelbar vor dem Upgrade erstellt wurde.
 .
 An diesem Punkt besteht die Möglichkeit, die Operation erneut zu versuchen oder abzubrechen. Falls die Option »Wiederholen« gewählt wird, werden alle Konfigurationsfragen noch einmal gestellt und ein erneuter Versuch vorgenommen, die Operation durchzuführen. Die Option »Wiederholen (Fragen überspringen)« wird die Operation sofort versuchen und alle Fragen überspringen. Wenn »Abbruch« gewählt wird, schlägt die Operation fehl und Sie müssen ein Downgrade, eine Reinstallation, eine Neukonfiguration dieses Pakets durchführen oder anders manueller intervenieren, damit Sie das Paket weiter benutzen können.
";
$elem["dbconfig-common/upgrade-error"]["descriptionfr"]="Erreur lors de la mise à jour de la base de données pour ${pkg}. Action suivante :
 Une erreur semble s'être produite lors de la mise à jour de la base de données :
 .
 ${error}
 .
 Heureusement, il existe une sauvegarde de la base de données dans ${dbfile} créée juste avant la mise à jour.
 .
 Vous pouvez soit recommencer soit abandonner l'opération. Si vous choisissez « Recommencer », la mise à jour sera tentée à nouveau en vous posant à nouveau les questions de configuration. Avec l'option « Recommencer avec les mêmes réglages », la mise à jour sera tentée immédiatement. Enfin, avec le choix « Abandonner », la mise à jour échouera et vous devrez revenir à la version précédente, désinstaller et reconfigurer ce paquet, à moins d'effectuer vous-même les opérations nécessaires pour continuer à l'utiliser.
";
$elem["dbconfig-common/upgrade-error"]["default"]="abort";
$elem["dbconfig-common/install-error"]["type"]="select";
$elem["dbconfig-common/install-error"]["choices"][1]="abort";
$elem["dbconfig-common/install-error"]["choices"][2]="retry";
$elem["dbconfig-common/install-error"]["choices"][3]="retry (skip questions)";
$elem["dbconfig-common/install-error"]["choicesde"][1]="Abbruch";
$elem["dbconfig-common/install-error"]["choicesde"][2]="Wiederholen";
$elem["dbconfig-common/install-error"]["choicesde"][3]="Wiederholen (Fragen überspringen)";
$elem["dbconfig-common/install-error"]["choicesfr"][1]="Abandonner";
$elem["dbconfig-common/install-error"]["choicesfr"][2]="Recommencer";
$elem["dbconfig-common/install-error"]["choicesfr"][3]="Recommencer avec les mêmes réglages";
$elem["dbconfig-common/install-error"]["description"]="Error installing database for ${pkg}.  Retry?
 An error seems to have occurred while installing the database.
 If it's of any help, this was the error encountered:
 .
 ${error}
 .
 At this point, you have the option to retry or abort the operation.
 If you choose \"retry\", you will be prompted with all the configuration
 questions once more and another attempt will be made at performing the
 operation. \"retry (skip questions)\" will immediately attempt the operation
 again, skipping all questions.  If you choose \"abort\", the operation will
 fail and you will need to downgrade, reinstall, reconfigure this package,
 or otherwise manually intervene to continue using it.  If you choose
 \"ignore\", the operation will continue, ignoring further errors from
 dbconfig-common.
";
$elem["dbconfig-common/install-error"]["descriptionde"]="Fehler bei der Installation der Datenbank für ${pkg}. Wiederholen?
 Es scheint ein Fehler bei der Installation der Datenbank aufgetreten zu sein. Als Hilfestellung hier die aufgetretene Fehlermeldung:
 .
 ${error}
 .
 An diesem Punkt besteht die Möglichkeit, die Operation erneut zu versuchen oder abzubrechen. Falls die Option »Wiederholen« gewählt wird, werden alle Konfigurationsfragen noch einmal gestellt und ein erneuter Versuch vorgenommen, die Operation durchzuführen. Die Option »Wiederholen (Fragen überspringen)« wird die Operation sofort versuchen und alle Fragen überspringen. Wenn »Abbruch« gewählt wird, schlägt die Operation fehl und Sie müssen ein Downgrade, eine Reinstallation, eine Neukonfiguration dieses Pakets durchführen oder anders manueller intervenieren, damit Sie das Paket weiter benutzen können. Falls Sie »Ignorieren« auswählen, wird diese Operation weitergeführt und dabei werden weitere Fehler von dbconfig-common ignoriert.
";
$elem["dbconfig-common/install-error"]["descriptionfr"]="Erreur lors de l'installation de la base de données pour ${pkg}. Action suivante :
 Une erreur semble s'être produite lors de l'installation de la base de données :
 .
 ${error}
 .
 Vous pouvez soit recommencer soit abandonner l'opération. Si vous choisissez « Recommencer », la mise à jour sera tentée à nouveau en vous posant à nouveau les questions de configuration. Avec l'option « Recommencer avec les mêmes réglages », la mise à jour sera tentée immédiatement. Enfin, avec le choix « Abandonner », la mise à jour échouera et vous devrez revenir à la version précédente, désinstaller et reconfigurer ce paquet, à moins d'effectuer vous-même les opérations nécessaires pour continuer à l'utiliser.
";
$elem["dbconfig-common/install-error"]["default"]="abort";
$elem["dbconfig-common/remove-error"]["type"]="select";
$elem["dbconfig-common/remove-error"]["choices"][1]="abort";
$elem["dbconfig-common/remove-error"]["choicesde"][1]="Abbruch";
$elem["dbconfig-common/remove-error"]["choicesfr"][1]="Abandonner";
$elem["dbconfig-common/remove-error"]["description"]="Error removing database for ${pkg}.  Retry?
 An error seems to have occurred while removing the database.
 .
 For some reason it was not possible to perform some of the actions necessary
 to remove the database for ${pkg}.  At this point you have two options: you
 can find out what has caused this error and fix it, or you can refuse
 the offer for help removing the database (the latter implies you will
 have to remove the database manually).  If it's of any help, this was
 the error encountered:
 .
 ${error}
 .
 At this point, you have the option to retry or abort the operation.
 If you choose \"retry\", you will be prompted with all the configuration
 questions once more and another attempt will be made at performing the
 operation. \"retry (skip questions)\" will immediately attempt the operation
 again, skipping all questions.  If you choose \"abort\", the operation will
 fail and you will need to downgrade, reinstall, reconfigure this package,
 or otherwise manually intervene to continue using it.
";
$elem["dbconfig-common/remove-error"]["descriptionde"]="Fehler beim Löschen der Datenbank von ${pkg}. Wiederholen?
 Es scheint ein Fehler beim Löschen der Datenbank aufgetreten zu sein.
 .
 Aus irgend einem Grund war es nicht möglich, einige der zum Löschen der Datenbank von ${pkg} erforderlichen Aktionen durchzuführen. An diesem Punkt gibt es zwei Möglichkeiten: Sie können herausfinden, was das Problem verursacht hat und dieses lösen oder die Hilfe zum Löschen der Datenbank ablehnen (natürlich bedeutet letzteres, dass die Datenbank manuell entfernt werden muss). Als Hilfestellung hier die aufgetretene Fehlermeldung:
 .
 ${error}
 .
 An diesem Punkt besteht die Möglichkeit, die Operation erneut zu versuchen oder abzubrechen. Falls die Option »Wiederholen« gewählt wird, werden alle Konfigurationsfragen noch einmal gestellt und ein erneuter Versuch vorgenommen, die Operation durchzuführen. Die Option »Wiederholen (Fragen überspringen)« wird die Operation sofort versuchen und alle Fragen überspringen. Wenn »Abbruch« gewählt wird, schlägt die Operation fehl und Sie müssen ein Downgrade, eine Reinstallation, eine Neukonfiguration dieses Pakets durchführen oder anders manueller intervenieren, damit Sie das Paket weiter benutzen können.
";
$elem["dbconfig-common/remove-error"]["descriptionfr"]="Erreur lors de la suppression de la base de données pour ${pkg}. Action suivante :
 Une erreur semble s'être produite lors de la suppression de la base de données.
 .
 Pour une raison indéterminée, certaines des actions indispensables à la suppression de la base de données pour ${pkg} ont échoué. À ce point, vous pouvez soit trouver la cause de l'erreur et la corriger, soit refuser la proposition d'aide à la suppression de la base de données (ce qui implique que vous devrez la supprimer vous-même). L'erreur qui s'est produite est la suivante :
 .
 ${error}
 .
 Vous pouvez soit recommencer soit abandonner l'opération. Si vous choisissez « Recommencer », la mise à jour sera tentée à nouveau en vous posant à nouveau les questions de configuration. Avec l'option « Recommencer avec les mêmes réglages », la mise à jour sera tentée immédiatement. Enfin, avec le choix « Abandonner », la mise à jour échouera et vous devrez revenir à la version précédente, désinstaller et reconfigurer ce paquet, à moins d'effectuer vous-même les opérations nécessaires pour continuer à l'utiliser.
";
$elem["dbconfig-common/remove-error"]["default"]="abort";
$elem["dbconfig-common/missing-db-package-error"]["type"]="select";
$elem["dbconfig-common/missing-db-package-error"]["choices"][1]="abort";
$elem["dbconfig-common/missing-db-package-error"]["choices"][2]="retry";
$elem["dbconfig-common/missing-db-package-error"]["description"]="Database package required.
 To properly configure the database for ${pkg}, it is necessary
 that you also have ${dbpackage} installed.  Unfortunately, this can
 not be done automatically.
 .
 If in doubt, you should choose \"abort\", and install ${dbpackage} before
 continuing with the configuration of this package.  If you choose \"retry\",
 you will be allowed to choose different answers (in case you chose the
 wrong database type by mistake).  If you choose \"ignore\", then installation
 will continue as normal.
 .
 (Note to translators: don't bother translating this message yet, as the
  text/wording is not stabilized)

";
$elem["dbconfig-common/missing-db-package-error"]["descriptionde"]="";
$elem["dbconfig-common/missing-db-package-error"]["descriptionfr"]="";
$elem["dbconfig-common/missing-db-package-error"]["default"]="abort";
$elem["dbconfig-common/remote/host"]["type"]="select";
$elem["dbconfig-common/remote/host"]["description"]="Host name of the ${dbvendor} database server for ${pkg}:
 Please select the remote hostname to use, or select \"new host\" to
 enter a new host.
";
$elem["dbconfig-common/remote/host"]["descriptionde"]="Rechnername des ${dbvendor}-Datenbankservers für ${pkg}:
 Bitte wählen Sie den Namen des zu verwendenden entfernten Rechners aus oder wählen Sie »new host«, um einen neuen Rechner einzugeben.
";
$elem["dbconfig-common/remote/host"]["descriptionfr"]="Nom d'hôte du serveur de bases de données ${dbvendor} pour ${pkg} :
 Veuillez choisir l'hôte distant à utiliser ou choisissez « nouvel hôte » pour indiquer un nouvel hôte.
";
$elem["dbconfig-common/remote/host"]["default"]="";
$elem["dbconfig-common/remote/port"]["type"]="string";
$elem["dbconfig-common/remote/port"]["description"]="Port number for the ${dbvendor} service:
 If the ${dbvendor} database on the remote host is running on a non-standard
 port, this is your opportunity to specify what it is.  To use the
 default port, leave this field blank.
";
$elem["dbconfig-common/remote/port"]["descriptionde"]="Portnummer für den ${dbvendor}-Dienst:
 Falls die ${dbvendor}-Datenbank auf dem entfernten Rechner auf einem anderen als dem vorgesehenen Port läuft, bietet sich jetzt die Möglichkeit, diesen anzugeben. Um beim Standard-Port zu bleiben, kann das Feld leer gelassen werden.
";
$elem["dbconfig-common/remote/port"]["descriptionfr"]="Numéro de port pour le service ${dbvendor} :
 Si le serveur ${dbvendor} sur l'hôte distant écoute sur un port non standard, vous avez la possibilité de l'indiquer ici. Laissez ce champ vide pour utiliser le port par défaut.
";
$elem["dbconfig-common/remote/port"]["default"]="";
$elem["dbconfig-common/remote/newhost"]["type"]="string";
$elem["dbconfig-common/remote/newhost"]["description"]="Host running the ${dbvendor} server for ${pkg}:
 Please provide the hostname of a remote ${dbvendor} server.
 .
 Note: you must have already arranged for the administrative
 account to be able to remotely create databases and grant
 privileges.
";
$elem["dbconfig-common/remote/newhost"]["descriptionde"]="Computer auf dem der ${dbvendor}-Server für ${pkg} läuft:
 Bitte geben Sie den Rechnernamen des entfernten ${dbvendor}-Servers ein.
 .
 Bemerkung: Sie müssen bereits einen Administrationszugang auf dem entfernten Rechner so eingerichtet haben, dass das Erstellen der Datenbank und das Einrichten der Zugriffsrechte ermöglicht worden ist.
";
$elem["dbconfig-common/remote/newhost"]["descriptionfr"]="Nom d'hôte du serveur ${dbvendor} pour ${pkg} :
 Veuillez indiquer le nom d'hôte du serveur ${dbvendor} distant.
 .
 Note : un compte possédant des privilèges d'administrateur doit déjà être configuré pour créer une base distante et donner les droits d'accès.
";
$elem["dbconfig-common/remote/newhost"]["default"]="";
$elem["dbconfig-common/db/dbname"]["type"]="string";
$elem["dbconfig-common/db/dbname"]["description"]="${dbvendor} database name for ${pkg}:
 Please provide a name for the ${dbvendor} database to be used by ${pkg}.
";
$elem["dbconfig-common/db/dbname"]["descriptionde"]="${dbvendor}-Datenbankname für ${pkg}:
 Bitte einen Namen für die ${dbvendor}-Datenbank, die vom Paket ${pkg} verwendet werden soll, eingeben.
";
$elem["dbconfig-common/db/dbname"]["descriptionfr"]="Nom de la base de données ${dbvendor} pour ${pkg} :
 Veuillez indiquer un nom pour la base de données ${dbvendor} à utiliser pour ${pkg}.
";
$elem["dbconfig-common/db/dbname"]["default"]="";
$elem["dbconfig-common/db/app-user"]["type"]="string";
$elem["dbconfig-common/db/app-user"]["description"]="${dbvendor} username for ${pkg}:
 Please provide a ${dbvendor} username for ${pkg} to register with the
 database server.  A ${dbvendor} user is not necessarily the same as a
 system login, especially if the database is on a remote server.
 .
 This is the user which will own the database, tables and other
 objects to be created by this installation.  This user will have
 complete freedom to insert, change or delete data in the database.
";
$elem["dbconfig-common/db/app-user"]["descriptionde"]="${dbvendor}-Benutzername für ${pkg}:
 Bitte geben Sie einen ${dbvendor}-Benutzernamen ein, mit dem sich das Programm ${pkg} am Datenbank-Server anmelden soll. Ein ${dbvendor}-Benutzer ist nicht unbedingt ein System-Anmeldename, insbesondere wenn die Datenbank auf einem entfernten Server läuft.
 .
 Dieser Benutzer wird der Eigentümer der Datenbank, der Tabellen und anderer Objekte sein, die bei der Installation erzeugt werden. Dieser Benutzer hat alle Rechte, Daten in die Datenbank einzufügen, in ihr zu verändern oder aus ihr zu löschen.
";
$elem["dbconfig-common/db/app-user"]["descriptionfr"]="Identifiant ${dbvendor} pour ${pkg} :
 Veuillez indiquer un identifiant de connexion ${dbvendor} pour ${pkg} sur le serveur de bases de données. L'identifiant ${dbvendor} n'est pas nécessairement le même que l'identifiant de connexion Unix, en particulier quand la base de données se trouve sur un serveur distant.
 .
 Cet identifiant est celui qui sera le propriétaire de la base de données, des tables et autres objets qui seront créés par cette installation. Il pourra à volonté insérer, changer ou supprimer des données dans la base de données.
";
$elem["dbconfig-common/db/app-user"]["default"]="";
$elem["dbconfig-common/db/basepath"]["type"]="string";
$elem["dbconfig-common/db/basepath"]["description"]="${dbvendor} storage directory for ${pkg}:
 Please provide a path where the ${dbvendor} database file for ${pkg}
 should be installed into. 
 .
 The permissions for this directory will be set to match the permissions
 for the generated database file.
";
$elem["dbconfig-common/db/basepath"]["descriptionde"]="${dbvendor}-Speicherverzeichnis für ${pkg}:
 Bitte geben Sie einen Pfad an, unter dem die ${dbvendor}-Datenbankdatei für ${pkg} installiert werden soll.
 .
 Die Rechte für dieses Verzeichnis werden so gesetzt, dass sie zu den Rechten der generierten Datenbank passen.
";
$elem["dbconfig-common/db/basepath"]["descriptionfr"]="Répertoire pour la base de données ${dbvendor} pour ${pkg} :
 Veuillez indiquer le répertoire où sera placé le fichier de base de données ${dbvendor} à utiliser pour ${pkg}.
 .
 Les permissions sur ce répertoire correspondront à celles de la base de données qui y sera créée.
";
$elem["dbconfig-common/db/basepath"]["default"]="";
$elem["dbconfig-common/mysql/method"]["type"]="select";
$elem["dbconfig-common/mysql/method"]["choices"][1]="unix socket";
$elem["dbconfig-common/mysql/method"]["choicesde"][1]="Unix-Socket";
$elem["dbconfig-common/mysql/method"]["choicesfr"][1]="Socket UNIX";
$elem["dbconfig-common/mysql/method"]["description"]="Connection method for MySQL database of ${pkg}:
 By default, ${pkg} will be configured to use a MySQL server
 through a local unix socket (this provides the best performance).
 However, if you would like to connect with a different method, or to a
 different server entirely, select an option from the choices below.
";
$elem["dbconfig-common/mysql/method"]["descriptionde"]="Verbindungsmethode an die MySQL-Datenbank von ${pkg}:
 Standardmäßig wird ${pkg} so konfiguriert, dass ein MySQL-Server über einen lokalen UNIX-Socket angesprochen wird (ermöglicht die beste Geschwindigkeit). Falls Sie jedoch über eine andere Methode zugreifen möchten oder eine Verbindung zu einem vollkommen anderen Server hergestellt werden soll, wählen Sie eine der unten angegebenen Möglichkeiten.
";
$elem["dbconfig-common/mysql/method"]["descriptionfr"]="Méthode de connexion pour la base de données MySQL de ${pkg}:
 Par défaut, ${pkg} est configuré pour utiliser un serveur MySQL local via un socket Unix (ceci donne les meilleures performances). Toutefois, si vous souhaitez utiliser une autre méthode de connexion ou vous connecter à un autre serveur, veuillez choisir une des options présentées.
";
$elem["dbconfig-common/mysql/method"]["default"]="unix socket";
$elem["dbconfig-common/mysql/app-pass"]["type"]="password";
$elem["dbconfig-common/mysql/app-pass"]["description"]="MySQL application password for ${pkg}:
 Please provide a password for ${pkg} to register with the
 database server.  If left blank, a random password will be
 generated for you.
";
$elem["dbconfig-common/mysql/app-pass"]["descriptionde"]="MySQL-Anwendungspasswort für ${pkg}:
 Bitte geben Sie ein Passwort ein, mit dem sich ${pkg} beim Datenbankserver anmelden kann. Wenn Sie das Feld frei lassen, wird automatisch ein zufälliges Passwort erzeugt.
";
$elem["dbconfig-common/mysql/app-pass"]["descriptionfr"]="Mot de passe de connexion MySQL pour ${pkg} :
 Veuillez indiquer un mot de passe de connexion pour ${pkg} sur le serveur de bases de données. Si vous laissez ce champ vide, un mot de passe aléatoire sera créé.
";
$elem["dbconfig-common/mysql/app-pass"]["default"]="";
$elem["dbconfig-common/mysql/admin-user"]["type"]="string";
$elem["dbconfig-common/mysql/admin-user"]["description"]="Name of your database's administrative user:
 What is the name of the account with which this package should perform
 administrative actions?  This user is the one which is able to create
 new database users.
 .
 For MySQL, this is almost always \"root\".  Note that this is NOT the
 same as the UNIX login 'root'.
";
$elem["dbconfig-common/mysql/admin-user"]["descriptionde"]="Name des Datenbank-Administrators:
 Wie lautet der Anmeldename des Benutzers, mit dem das Paket administrative Aktionen durchführen soll? Dieser Benutzer ist derjenige, der berechtigt ist, neue Datenbank-Benutzer anzulegen.
 .
 Für MySQL ist dies fast immer »root«. Beachten Sie, dass dies NICHT dasselbe wie der UNIX-Benutzer »root« ist.
";
$elem["dbconfig-common/mysql/admin-user"]["descriptionfr"]="Nom de l'administrateur de la base de données :
 Veuillez indiquer le nom du compte à utiliser pour les actions administratives. Cet identifiant possède les droits de création de nouveaux utilisateurs de la base de données.
 .
 Pour MySQL, cet identifiant est presque toujours « root ». Veuillez noter que cet identifiant est différent du « root » Unix.
";
$elem["dbconfig-common/mysql/admin-user"]["default"]="root";
$elem["dbconfig-common/mysql/admin-pass"]["type"]="password";
$elem["dbconfig-common/mysql/admin-pass"]["description"]="Password of your database's administrative user:
 What is the password for the administrative account with which this
 package should create its MySQL database and user?
";
$elem["dbconfig-common/mysql/admin-pass"]["descriptionde"]="Passwort des Datenbank-Administrators:
 Wie lautet das Passwort für den administrativen Zugang, mit dem das Paket seine MySQL-Datenbank und die erforderlichen Benutzer einrichten soll?
";
$elem["dbconfig-common/mysql/admin-pass"]["descriptionfr"]="Mot de passe de l'administrateur de la base de données :
 Veuillez indiquer le mot de passe pour le compte propriétaire qui servira à créer la base de données MySQL ainsi que les utilisateurs.
";
$elem["dbconfig-common/mysql/admin-pass"]["default"]="";
$elem["dbconfig-common/pgsql/method"]["type"]="select";
$elem["dbconfig-common/pgsql/method"]["choices"][1]="unix socket";
$elem["dbconfig-common/pgsql/method"]["choices"][2]="tcp/ip";
$elem["dbconfig-common/pgsql/method"]["choicesde"][1]="Unix-Socket";
$elem["dbconfig-common/pgsql/method"]["choicesde"][2]="Tcp/Ip";
$elem["dbconfig-common/pgsql/method"]["choicesfr"][1]="Socket UNIX";
$elem["dbconfig-common/pgsql/method"]["choicesfr"][2]="TCP/IP";
$elem["dbconfig-common/pgsql/method"]["description"]="Connection method for PostgreSQL database of ${pkg}:
 By default, ${pkg} will be configured to use a PostgreSQL server
 through a local unix socket (this provides the best performance).
 However, if you would like to connect with a different method, or to a
 different server entirely, select an option from the choices below.
";
$elem["dbconfig-common/pgsql/method"]["descriptionde"]="Verbindungsmethode für die PostgreSQL-Datenbank von ${pkg}:
 Standardmäßig wird ${pkg} so konfiguriert, dass ein PostgreSQL-Server über einen localen UNIX-Socket angesprochen wird (ermöglicht die beste Geschwindigkeit). Falls Sie jedoch über eine andere Methode zugreifen möchten oder eine Verbindung zu einem vollkommen anderen Server hergestellt werden soll, wählen Sie eine der unten angegebenen Möglichkeiten.
";
$elem["dbconfig-common/pgsql/method"]["descriptionfr"]="Méthode de connexion pour la base de données PostgreSQL de ${pkg} :
 Par défaut, ${pkg} est configuré pour utiliser un serveur PostgreSQL local via un socket Unix (ceci donne les meilleures performances). Toutefois, si vous souhaitez utiliser une autre méthode de connexion ou vous connecter à un autre serveur, veuillez choisir une des options présentées.
";
$elem["dbconfig-common/pgsql/method"]["default"]="unix socket";
$elem["dbconfig-common/pgsql/app-pass"]["type"]="password";
$elem["dbconfig-common/pgsql/app-pass"]["description"]="PostgreSQL application password for ${pkg}:
 Please provide a password for ${pkg} to register with the database
 server.  If left blank, a random password will be generated for you.
 . 
 If you are using \"ident\" based authentication, the supplied password will
 not be used and can be left blank.  Otherwise, PostgreSQL access may
 need to be reconfigured to allow password-authenticated access.
";
$elem["dbconfig-common/pgsql/app-pass"]["descriptionde"]="PostgreSQL-Anwendungspasswort für ${pkg}:
 Bitte geben Sie ein Passwort ein, mit dem sich ${pkg} beim Datenbankserver anmelden kann. Wenn Sie das Feld frei lassen, wird automatisch ein zufälliges Passwort erzeugt.
 .
 Falls Sie die »ident«-basierte Authentifizierungsmethode verwenden, wird das übergebene Passwort nicht verwendet und kann leer bleiben. Andernfalls müsste der PostgreSQL-Zugriff eventuell neu konfiguriert werden, um Passwort-Authentifizierungszugriff zu erlauben.
";
$elem["dbconfig-common/pgsql/app-pass"]["descriptionfr"]="Mot de passe de connexion PostgreSQL pour ${pkg} :
 Veuillez indiquer un mot de passe de connexion pour ${pkg} sur le serveur de bases de données. Si vous laissez ce champ vide, un mot de passe aléatoire sera créé.
 .
 Si vous utilisez l'authentification basée sur « ident », le mot de passe fourni ne sera pas utilisé et peut être laissé vide. Si vous ne souhaitez pas utiliser l'authentification basée sur « ident », l'accès à PostgreSQL nécessite peut-être une reconfiguration afin de permettre l'authentification par mot de passe.
";
$elem["dbconfig-common/pgsql/app-pass"]["default"]="";
$elem["dbconfig-common/pgsql/admin-user"]["type"]="string";
$elem["dbconfig-common/pgsql/admin-user"]["description"]="Name of your database's administrative user:
 What is the name of the account with which this package should perform
 administrative actions?  This user is the one which is able to create
 new database users.
";
$elem["dbconfig-common/pgsql/admin-user"]["descriptionde"]="Name des Datenbank-Administrators:
 Wie lautet der Anmeldename des Benutzers, mit dem das Paket administrative Aktionen durchführen soll? Dieser Benutzer ist derjenige, der berechtigt ist, neue Datenbank-Benutzer anzulegen.
";
$elem["dbconfig-common/pgsql/admin-user"]["descriptionfr"]="Nom de l'administrateur de la base de données :
 Veuillez indiquer le nom du compte à utiliser pour les actions administratives. Cet identifiant possède les droits de création de nouveaux utilisateurs de la base de données.
";
$elem["dbconfig-common/pgsql/admin-user"]["default"]="postgres";
$elem["dbconfig-common/pgsql/admin-pass"]["type"]="password";
$elem["dbconfig-common/pgsql/admin-pass"]["description"]="Password of your database's administrative user:
 What is the password for the account with which this package should perform
 administrative actions?  (For a normal Debian PostgreSQL installation,
 a database password is not required, since authentication is done at the
 system level.)
";
$elem["dbconfig-common/pgsql/admin-pass"]["descriptionde"]="Passwort des Datenbank-Administrators:
 Wie lautet das Passwort für den Zugang, mit dem das Paket administrative Aktionen durchführen soll? (Bei einer normalen Debian PostgreSQL-Installation ist kein Datenbank-Passwort erforderlich, da die Authentifizierung auf Systemebene erfolgt.)
";
$elem["dbconfig-common/pgsql/admin-pass"]["descriptionfr"]="Mot de passe de l'administrateur de la base de données :
 Veuillez indiquer le mot de passe du compte qui sera utilisé pour les actions administratives. Pour une installation par défaut de PostgreSQL, un mot de passe pour la base de données n'est pas nécessaire, puisque l'authentification du système est utilisée.
";
$elem["dbconfig-common/pgsql/admin-pass"]["default"]="";
$elem["dbconfig-common/pgsql/authmethod-admin"]["type"]="select";
$elem["dbconfig-common/pgsql/authmethod-admin"]["choices"][1]="ident";
$elem["dbconfig-common/pgsql/authmethod-admin"]["choicesde"][1]="Ident";
$elem["dbconfig-common/pgsql/authmethod-admin"]["choicesfr"][1]="Ident";
$elem["dbconfig-common/pgsql/authmethod-admin"]["description"]="Method for authenticating PostgreSQL administrator:
 PostgreSQL servers provide several different mechanisms for authenticating
 connections.  Please select what method the administrative user should use
 when connecting to the server.
 .
 With \"ident\" authentication on the local machine, the
 server will check that the owner of the unix socket is allowed to connect.
 .
 With \"ident\" authentication to remote hosts, RFC 1413 based ident is
 used (note this can be considered a security risk).
 .
 With \"password\" authentication, a password will be passed to the server
 for use with some authentication backend (such as \"md5\" or \"pam\").  Note
 that the password is still passed in the clear across network-based
 connections if your connection is not configured to use SSL.
 .
 For a default Debian PostgreSQL installation running on the same host,
 you probably want \"ident\".
";
$elem["dbconfig-common/pgsql/authmethod-admin"]["descriptionde"]="Authentifizierungsmethode des PostgreSQL-Administrators:
 PostgreSQL-Server bieten unterschiedliche Mechanismen für die Anmeldung. Bitte wählen Sie die Methode aus, mit der sich der Administrator am Server anmelden soll.
 .
 Bei der »Ident«-Methode zur Anmeldung an der lokalen Maschine prüft der Server, ob der Eigentümer des UNIX-Sockets eine Erlaubnis zum Verbinden hat.
 .
 Bei der »Ident«-Methode zur Anmeldung zu entfernten Rechnern wird eine RFC 1413-basierte Ident-Methode benutzt. (Beachten Sie, dass dies ein Sicherheitsrisiko darstellen kann.)
 .
 Bei der »Passwort«-Anmeldung wird ein Passwort zum Server übermittelt und dort an ein Anmeldungs-Backend (z.B. »md5« oder »pam«) übergeben. Beachten Sie, dass das Passwort dennoch im Klartext über das Netz gesendet wird, falls der Server nicht für die Benutzung von SSL konfiguriert wurde.
 .
 Für eine Standard-PostgreSQL-Installation, die auf ein und demselben Rechner läuft, ist sehr wahrscheinlich »Ident« die Methode der Wahl.
";
$elem["dbconfig-common/pgsql/authmethod-admin"]["descriptionfr"]="Méthode d'authentification de l'administrateur PostgreSQL :
 Les serveurs PostgreSQL disposent de plusieurs méthodes pour authentifier les connexions. Veuillez choisir la méthode que l'administrateur doit utiliser pour les connexions au serveur.
 .
 En utilisant l'authentification « ident » en local, le serveur vérifiera que le propriétaire du socket unix est autorisé à se connecter.
 .
 En utilisant l'authentification « ident » sur un hôte distant, le protocole ident (RFC 1412) sera utilisé (veuillez notez que cela peut être considéré comme une faille de sécurité).
 .
 En utilisant l'authentification « mot de passe », un mot de passe sera transmis au serveur pour une authentification de type MD5 ou PAM. Veuillez noter que le mot de passe est transmis en clair si vous n'utilisez pas SSL.
 .
 Choisissez « ident » si vous utilisez une installation par défaut de PostgreSQL sur l'hôte local.
";
$elem["dbconfig-common/pgsql/authmethod-admin"]["default"]="ident";
$elem["dbconfig-common/pgsql/authmethod-user"]["type"]="select";
$elem["dbconfig-common/pgsql/authmethod-user"]["choices"][1]="ident";
$elem["dbconfig-common/pgsql/authmethod-user"]["choicesde"][1]="Ident";
$elem["dbconfig-common/pgsql/authmethod-user"]["choicesfr"][1]="Ident";
$elem["dbconfig-common/pgsql/authmethod-user"]["description"]="Method for authenticating PostgreSQL user:
 PostgreSQL servers provide several different mechanisms for authenticating
 connections.  Please select what method the database user should use
 when connecting to the server.
 .
 With \"ident\" authentication on the local machine, the
 server will check that the owner of the unix socket is allowed to connect.
 .
 With \"ident\" authentication to remote hosts, RFC 1413 based ident is
 used (note this can be considered a security risk).
 .
 With \"password\" authentication, a password will be passed to the server
 for use with some authentication backend (such as \"md5\" or \"pam\").  Note
 that the password is still passed in the clear across network-based
 connections if your connection is not configured to use SSL.
 .
 For a default Debian PostgreSQL installation running on the same host,
 you probably want \"ident\".
";
$elem["dbconfig-common/pgsql/authmethod-user"]["descriptionde"]="Authentifizierungsmethode der PostgreSQL-Benutzer:
 PostgreSQL-Server bieten verschiedene unterschiedliche Mechanismen für die Anmeldung. Bitte wählen Sie die Methode aus, mit der sich der Datenbankbenutzer am Server anmelden soll.
 .
 Bei der »Ident«-Methode zur Anmeldung an der lokalen Maschine prüft der Server, ob der Eigentümer des UNIX-Sockets eine Erlaubnis zum Verbinden hat.
 .
 Bei der »Ident«-Methode zur Anmeldung zu entfernten Rechnern wird eine RFC 1413-basierte Ident-Methode benutzt. (Beachten Sie, dass dies ein Sicherheitsrisiko darstellen kann.)
 .
 Bei der »Passwort«-Anmeldung wird ein Passwort zum Server übermittelt und dort an ein Anmeldungs-Backend (z.B. »md5« oder »pam«) übergeben. Beachten Sie, dass das Passwort dennoch im Klartext über das Netz gesendet wird, falls der Server nicht für die Benutzung von SSL konfiguriert wurde.
 .
 Für eine Standard-PostgreSQL-Installation, die auf ein und demselben Rechner läuft, ist sehr wahrscheinlich »Ident« die Methode der Wahl.
";
$elem["dbconfig-common/pgsql/authmethod-user"]["descriptionfr"]="Méthode d'authentification pour l'utilisateur de PostgreSQL :
 Les serveurs PostgreSQL fournissent plusieurs mécanismes pour authentifier les connexions. Veuillez choisir la méthode qui sera utilisée pour la connexion au serveur.
 .
 En utilisant l'authentification « ident » en local, le serveur vérifiera que le propriétaire du socket unix est autorisé à se connecter.
 .
 En utilisant l'authentification « ident » sur un hôte distant, le protocole ident (RFC 1412) sera utilisé (veuillez notez que cela peut être considéré comme une faille de sécurité).
 .
 En utilisant l'authentification « mot de passe », un mot de passe sera transmis au serveur pour une authentification de type MD5 ou PAM. Veuillez noter que le mot de passe est transmis en clair si vous n'utilisez pas SSL.
 .
 Choisissez « ident » si vous utilisez une installation par défaut de PostgreSQL sur l'hôte local.
";
$elem["dbconfig-common/pgsql/authmethod-user"]["default"]="";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["type"]="note";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["description"]="Choose a different PostgreSQL connection method?
 Unfortunately, it seems that the database connection method you
 have selected for ${pkg} will not work, because it requires the existence
 of a local user that does not exist.
 .
 If you would like to reconfigure your application to use a different
 method, you should choose this option.  If you know for certain that
 this method will work and you want to continue without changing
 your choice, you should refuse this option.
";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["descriptionde"]="Eine andere Verbindungsmethode für PostgreSQL wählen?
 Es scheint leider so, als würde die für ${pkg} ausgewählte Datenbankverbindung nicht funktionieren, da sie die Existenz eines lokalen Benutzers voraussetzt, der aber nicht existiert.
 .
 Wenn Sie die Anwendung derart umkonfigurieren möchten, dass eine andere Methode benutzt wird, dann wählen Sie diese Option. Falls Sie sicher sind, dass diese Methode funktioniert und Sie Ihre Auswahl nicht ändern möchten, dann lehnen Sie diese Option ab.
";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["descriptionfr"]="Faut-il choisir une méthode différente pour la connexion à PostgreSQL ?
 Il semble que la méthode de connexion à la base de données choisie pour ${pkg} ne fonctionne pas car elle a besoin qu'un utilisateur local spécifique existe, ce qui n'est pas le cas.
 .
 Si vous voulez reconfigurer votre application pour qu'elle utilise une autre méthode, veuillez choisir cette option. Si vous avez la certitude qu'elle fonctionnera et souhaitez continuer sans modifier votre choix, refusez l'option.
";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["default"]="";
$elem["dbconfig-common/pgsql/changeconf"]["type"]="boolean";
$elem["dbconfig-common/pgsql/changeconf"]["description"]="Change PostgreSQL configuration automatically?
 It has been determined that the database installation for ${pkg}
 can not be automatically accomplished without making changes to
 your PostgreSQL server's access controls.  It is suggested that this
 be done by dbconfig-common when your package is installed.  If you
 would prefer that this be done manually (or not at all), please add
 the following line to your pg_hba.conf:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/changeconf"]["descriptionde"]="Soll die PostgreSQL-Konfiguration automatisch geändert werden?
 Es hat sich herausgestellt, dass die Installation der Datenbank für ${pkg} nicht automatisch durchgeführt werden kann, ohne die Zugriffskontrolle des PostgreSQL-Servers zu ändern. Es wird empfohlen, dass dies durch dbconfig-common durchgeführt wird, sobald das Paket installiert ist. Falls Sie es vorziehen, dies manuell (oder überhaupt nicht) durchzuführen, dann fügen Sie bitte folgende Zeile zu der Datei ph_hba.conf hinzu:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/changeconf"]["descriptionfr"]="Faut-il modifier la configuration de PostgreSQL automatiquement ?
 L'installation de la base de données pour ${pkg} ne peut pas se faire sans modifier les contrôles d'accès à votre serveur PostgreSQL. Vous devriez le faire en utilisant dbconfig-common quand le paquet aura été installé. Si vous préférez le faire vous-même, veuillez ajouter la ligne suivante au fichier pg_hba.conf:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/changeconf"]["default"]="false";
$elem["dbconfig-common/pgsql/revertconf"]["type"]="boolean";
$elem["dbconfig-common/pgsql/revertconf"]["description"]="Revert PostgreSQL configuration automatically?
 As ${pkg} is now being removed, it may no longer be necessary to
 have an access control entry in your PostgreSQL server's configuration.
 While keeping such an entry will not break any software on your
 system, it may be seen as a potential security concern.  It is suggested
 that this be done by dbconfig-common when your package is removed.  If you
 would prefer that this be done manually (or not at all), please remove
 the following line from your pg_hba.conf:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/revertconf"]["descriptionde"]="Soll die PostgreSQL-Konfiguration automatisch zurückgesetzt werden?
 Da ${pkg} nun gelöscht wird, ist es möglich, dass der Eintrag für die Zugriffskontrolle in der PostgreSQL-Serverkonfiguration nicht länger benötigt wird. Zwar wird es der Software auf Ihrem System nicht unmittelbar schaden, wenn Sie den Eintrag beibehalten, doch könnte sich dieser nicht mehr benötigte Zugang zu Ihrem System als Sicherheitsproblem erweisen. Daher wird empfohlen, den Eintrag mittels dbconfig-common zu entfernen, sobald das Paket gelöscht wird. Falls Sie es vorziehen, dies manuell (oder überhaupt nicht) durchzuführen, dann entfernen Sie bitte folgende Zeile aus der Datei ph_hba.conf:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/revertconf"]["descriptionfr"]="Faut-il restaurer la configuration de PostgreSQL automatiquement ?
 Comme ${pkg} va être supprimé, il n'est plus nécessaire qu'une entrée de contrôle d'accès existe dans la configuration de votre serveur PostgreSQL. Même si conserver cette entrée ne risquerait pas de perturber le fonctionnement des autres logiciels de votre système, cela peut constituer un risque pour la sécurité. Vous devriez la supprimer en utilisant dbconfig-common une fois le paquet supprimé. Si vous préférez le faire vous-même, veuillez supprimer la ligne suivante de votre fichier pg_hba.conf :
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/revertconf"]["default"]="false";
$elem["dbconfig-common/pgsql/manualconf"]["type"]="note";
$elem["dbconfig-common/pgsql/manualconf"]["description"]="Please change /etc/postgresql/pg_hba.conf
 To get the database for package ${pkg} bootstrapped you have
 to edit the configuration of your PostgreSQL server. You may be able to
 find help in the file /usr/share/doc/${pkg}/README.Debian.
";
$elem["dbconfig-common/pgsql/manualconf"]["descriptionde"]="Bitte passen Sie die Datei /etc/postgresql/pg_hba.conf an.
 Um die PostgreSQL-Datenbank für ${pkg} zu initialisieren, muss die Konfiguration Ihres PostgreSQL-Servers geändert werden. Eine detaillierte Anleitung dazu finden Sie unter /usr/share/doc/${pkg}/README.Debian.
";
$elem["dbconfig-common/pgsql/manualconf"]["descriptionfr"]="Modification de /etc/postgresql/pg_hba.conf
 Pour que la base de données pour le paquet ${pkg} soit initialisée, vous devez modifier la configuration du serveur PostgreSQL. Vous pouvez trouver de l'aide dans le fichier /usr/share/doc/${pkg}/README.Debian.
";
$elem["dbconfig-common/pgsql/manualconf"]["default"]="";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["type"]="note";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["description"]="PostgreSQL does not support empty passwords.
";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["descriptionde"]="PostgreSQL unterstützt keine leeren Passwörter.
";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["descriptionfr"]="PostgreSQL n'accepte pas les mots de passe vides.
";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["default"]="";
$elem["dbconfig-common/internal/reconfiguring"]["type"]="boolean";
$elem["dbconfig-common/internal/reconfiguring"]["description"]="for internal use.

";
$elem["dbconfig-common/internal/reconfiguring"]["descriptionde"]="";
$elem["dbconfig-common/internal/reconfiguring"]["descriptionfr"]="";
$elem["dbconfig-common/internal/reconfiguring"]["default"]="false";
$elem["dbconfig-common/internal/skip-preseed"]["type"]="boolean";
$elem["dbconfig-common/internal/skip-preseed"]["description"]="for internal use.
";
$elem["dbconfig-common/internal/skip-preseed"]["descriptionde"]="";
$elem["dbconfig-common/internal/skip-preseed"]["descriptionfr"]="";
$elem["dbconfig-common/internal/skip-preseed"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
