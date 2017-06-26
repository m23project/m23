<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dbconfig-common");

$elem["dbconfig-common/remote-questions-default"]["type"]="boolean";
$elem["dbconfig-common/remote-questions-default"]["description"]="Will this server be used to access remote databases?
 For the database types that support it, dbconfig-common includes support
 for configuring databases on remote systems. When installing a package's
 database via dbconfig-common, the questions related to remote
 configuration are asked with a priority such that they are
 skipped for most systems.
 .
 If you select this option, the default behavior will be to prompt you
 with questions related to remote database configuration when you install
 new packages.
 .
 If you are unsure, you should not select this option.
";
$elem["dbconfig-common/remote-questions-default"]["descriptionde"]="Wird dieser Server zum Zugriff auf entfernte Datenbanken verwendet werden?
 Für die Datenbanktypen, die dies unterstützen, enthält Dbconfig-common Unterstützung für die Konfiguration von Datenbanken auf anderen Systemen. Bei der Installation einer Datenbank eines Pakets mittels dbconfig-common werden die Fragen bezüglich einer Datenbank auf einem anderen System mit solch einer Priorität gestellt, dass sie auf den meisten Systemen ausgelassen werden.
 .
 Falls Sie diese Option wählen, werden Ihnen standardmäßig Fragen mit Bezug auf die Konfiguration von Datenbanken auf anderen Systemen gestellt, wenn Sie neue Pakete installieren.
 .
 Falls Sie sich unsicher sind, sollten Sie diese Option nicht auswählen.
";
$elem["dbconfig-common/remote-questions-default"]["descriptionfr"]="Ce serveur sera-t-il utilisé pour accéder à des bases de données distantes ?
 Pour les gestionnaires de bases de données qui le permettent, dbconfig-common gère la configuration des bases de données sur des systèmes distants. Lorsque dbconfig-common crée des bases de données pour un paquet, les questions relatives à la configuration distante sont posées avec une priorité qui les rendra invisibles sur la plupart des systèmes.
 .
 Si vous choisissez cette option, les questions relatives à la configuration de bases de données distantes vous seront posées lors de l'installation de nouveaux paquets.
 .
 Dans le doute, vous ne devriez pas choisir cette option.
";
$elem["dbconfig-common/remote-questions-default"]["default"]="false";
$elem["dbconfig-common/remember-admin-pass"]["type"]="boolean";
$elem["dbconfig-common/remember-admin-pass"]["description"]="Keep \"administrative\" database passwords?
 By default, you will be prompted for all administrator-level database
 passwords when you configure, upgrade, or remove applications with
 dbconfig-common. These passwords will be stored in debconf's configuration
 database only for as long as they are needed.
 .
 This behavior can be disabled, in which case the passwords will
 remain in the debconf database. This database is protected by Unix file
 permissions, though this is less secure and thus not the default setting.
 .
 If you would rather not be bothered for an administrative password
 every time you upgrade a database application with dbconfig-common,
 you should choose this option. Otherwise, you should refuse this option.
";
$elem["dbconfig-common/remember-admin-pass"]["descriptionde"]="»Administrative« Datenbank-Passwörter speichern?
 Standardmäßig werden alle administrativen Datenbank-Passwörter während der Konfiguration, dem Upgrade oder dem Löschen von Anwendungen mit dbconfig-common abgefragt. Diese Passwörter werden in der Debconfs-Konfigurationsdatenbank nur so lange wie notwendig gespeichert.
 .
 Dieses Verhalten kann abgeschaltet werden, wobei die Passwörter dann in der Debconf-Datenbank gespeichert bleiben. Diese Datenbank ist durch UNIX-Dateirechte geschützt. Dies ist allerdings nicht so sicher und daher nicht die Standard-Einstellung. 
 .
 Falls das administrative Passwort nicht bei jedem Upgrade der Datenbank-Anwendung mit dbconfig-common aktualisiert werden soll, so wählen Sie diese Option. Andernfalls sollten Sie diese Option ablehnen.
";
$elem["dbconfig-common/remember-admin-pass"]["descriptionfr"]="Faut-il garder les mots de passe des administrateurs des bases de données ?
 Par défaut, vous devrez indiquer les mots de passe des administrateurs des bases de données lors de chaque configuration, mise à jour ou suppression des applications qui utilisent dbconfig-common. Ces mots de passe ne seront pas conservés plus longtemps que nécessaire dans la base de données de configuration debconf.
 .
 Ce comportement peut être désactivé, les mots de passe seront alors conservés dans la base de données debconf. La base de données est protégée par les permissions d'accès aux fichiers correspondants Unix, cependant, ce comportement moins sécurisé n'est pas le réglage par défaut.
 .
 Pour ne pas avoir à indiquer un mot de passe d'administration à chaque fois que vous mettez à jour avec dbconfig-common la base de données d'une application, vous pouvez choisir cette option. Dans le cas contraire, ne la choisissez pas.
";
$elem["dbconfig-common/remember-admin-pass"]["default"]="false";
$elem["dbconfig-common/dbconfig-install"]["type"]="boolean";
$elem["dbconfig-common/dbconfig-install"]["description"]="Configure database for ${pkg} with dbconfig-common?
 The ${pkg} package must have a database installed and configured before
 it can be used. This can be optionally handled with dbconfig-common.
 .
 If you are an advanced database administrator and know that you want
 to perform this configuration manually, or if your database has already
 been installed and configured, you should refuse this option. Details on what
 needs to be done should most likely be provided in /usr/share/doc/${pkg}.
 .
 Otherwise, you should probably choose this option.
";
$elem["dbconfig-common/dbconfig-install"]["descriptionde"]="Konfigurieren der Datenbank für ${pkg} mit dbconfig-common?
 Für das Paket ${pkg} muss eine Datenbank installiert und konfiguriert sein, bevor es benutzt werden kann. Dies kann optional mit Hilfe von dbconfig-common geschehen.
 .
 Falls Sie ein erfahrener Datenbankadministrator sind und wissen, dass Sie diese Konfiguration manuell durchführen möchten oder, falls Ihre Datenbank bereits installiert und konfiguriert ist, verwerfen Sie diese Option. Details zur manuellen Installation sind üblicherweise in /usr/share/doc/${pkg} zu finden.
 .
 Andernfalls sollte diese Option wahrscheinlich gewählt werden.
";
$elem["dbconfig-common/dbconfig-install"]["descriptionfr"]="Faut-il configurer la base de données de ${pkg} avec dbconfig-common ?
 Le paquet ${pkg} a besoin d'une base de données installée et configurée avant de pouvoir être utilisé. Ceci peut si nécessaire être géré par dbconfig-common.
 .
 Si vous êtes un administrateur de bases de données expérimenté et savez que vous voulez procéder à cette configuration vous-même, ou si votre base de données est déjà installée et configurée, vous pouvez refuser cette option. Des précisions sur la procédure se trouvent dans /usr/share/doc/${pkg}.
 .
 Autrement, vous devriez choisir cette option.
";
$elem["dbconfig-common/dbconfig-install"]["default"]="true";
$elem["dbconfig-common/dbconfig-reinstall"]["type"]="boolean";
$elem["dbconfig-common/dbconfig-reinstall"]["description"]="Reinstall database for ${pkg}?
 Since you are reconfiguring ${pkg}, you may also want to reinstall the
 database which it uses.
 .
 If you wish to reinstall the database for ${pkg}, you should select
 this option. If you do not wish to do so (if you are reconfiguring
 the package for unrelated reasons), you should not select this option.
 .
 Warning: if you opt to reinstall the database and install it under a
 name that already exists, the old database will be dropped without
 further questions. In that case a backup of the original database is
 made in /var/tmp/.
 .
 Warning: if you change the name of the database, the old database will
 not be removed. If you change the name of the user that connects to
 the database, the privileges of the original user will not be revoked.
";
$elem["dbconfig-common/dbconfig-reinstall"]["descriptionde"]="Datenbank für ${pkg} neu installieren?
 Da Sie ${pkg} neu konfigurieren, möchten Sie vielleicht auch die Datenbank, die es verwendet, neu installieren.
 .
 Falls Sie die Datenbank für ${pkg} neu installieren wollen, sollten Sie diese Option wählen. Falls Sie dies nicht wünschen (falls Sie das Paket aus anderen Gründen neu konfigurieren), sollten Sie diese Option nicht wählen.
 .
 Warnung: Falls Sie sich dazu entscheiden, die Datenbank neu unter einem bereits existierenden Namen zu installieren, wird die alte Datenbank ohne weitere Fragen entfernt. In diesem Fall wird unter /var/tmp/ eine Sicherungskopie der ursprünglichen Datenbank angelegt.
 .
 Warnung: Falls Sie den Namen der Datenbank ändern wird die alte Datenbank nicht entfernt. Falls Sie den Namen des Benutzers ändern, der sich mit der Datenbank verbindet, werden die Rechte des ursprünglichen Benutzers nicht entfernt.
";
$elem["dbconfig-common/dbconfig-reinstall"]["descriptionfr"]="Faut-il réinstaller la base de données pour ${pkg} ?
 Comme vous reconfigurez ${pkg}, il est possible que vous vouliez réinstaller la base de données qu'il utilise.
 .
 Si vous souhaitez réinstaller la base de données de ${pkg}, vous devriez choisir cette option. Dans le cas contraire, (ou si vous reconfigurez le paquet pour d'autres raisons), ne la choisissez pas.
 .
 Avertissement : Si vous choisissez de réinstaller la base de données avec un nom qui existe déjà, la base de données précédente sera écrasée sans autre avertissement. Dans ce cas une sauvegarde de la première base de données est effectuée dans /var/tmp.
 .
 Avetissement : Si vous modifiez le nom de la base de doonées, la base de données précédente ne sera pas supprimée. Si vous modifiez le nom de l'utilisateur qui se connecte à la base de données, les droits du premier utilisateur ne seront pas révoqués.
";
$elem["dbconfig-common/dbconfig-reinstall"]["default"]="false";
$elem["dbconfig-common/dbconfig-upgrade"]["type"]="boolean";
$elem["dbconfig-common/dbconfig-upgrade"]["description"]="Perform upgrade on database for ${pkg} with dbconfig-common?
 According to the maintainer for this package, database upgrade
 operations need to be performed on ${pkg}. Typically, this is due to
 changes in how a new upstream version of the package needs to store
 its data.
 .
 If you want to handle this process manually, you should
 refuse this option. Otherwise, you should choose this option.
 During the upgrade, a backup of the database will be made in
 /var/cache/dbconfig-common/backups, from which the database can
 be restored in the case of problems.
";
$elem["dbconfig-common/dbconfig-upgrade"]["descriptionde"]="Upgrade der Datenbank für ${pkg} mit dbconfig-common durchführen?
 Der Betreuer des Paketes ${pkg} hält es für erforderlich, dass Operationen zum Upgrade der Datenbank durchgeführt werden. Typischerweise ist das in Änderungen, wie eine neue Version der Anwendung ihre Daten speichert, begründet.
 .
 Falls Sie diesen Prozess manuell durchführen möchten, lehnen Sie diese Option ab. Andernfalls sollte diese Option gewählt werden. Während des Upgrades wird ein Backup der existierenden Datenbank im Verzeichnis /var/cache/dbconfig-common/backups angelegt, von dem die Datenbank im Falle auftretender Probleme wiederhergestellt werden kann.
";
$elem["dbconfig-common/dbconfig-upgrade"]["descriptionfr"]="Faut-il mettre à jour la base de données pour ${pkg} avec dbconfig-common ?
 Selon le responsable de ce paquet, une mise à jour de la base de données pour ${pkg} est nécessaire. Cela est habituellement dû à des changements dans la manière dont la nouvelle version du paquet enregistre ses données.
 .
 Si vous désirez vous occuper de ce processus vous-même, vous pouvez refuser cette option. Sinon, acceptez-la. Lors d'une mise à jour, une sauvegarde de la base de données sera effectuée dans /var/cache/dbconfig-common/backups, en cas de problème, vous pourrez restaurer les données à partir de celle-ci.
";
$elem["dbconfig-common/dbconfig-upgrade"]["default"]="true";
$elem["dbconfig-common/dbconfig-remove"]["type"]="boolean";
$elem["dbconfig-common/dbconfig-remove"]["description"]="Deconfigure database for ${pkg} with dbconfig-common?
 Since you are removing ${pkg}, it's possible that you no longer
 want the underlying database and the privileges for the user
 associated with this package.
 .
 Please choose whether database removal and privilege revocation should be
 handled with dbconfig-common.
 .
 If you choose this option, dbconfig-common will check if ${pkg} provided
 scripts and database commands to undo package specific operations and run them
 if they exist. Then it will ask if you want to delete the ${pkg} database and
 revoke the standard privileges for the user of ${pkg}. If you don't want any
 of this, or if you want to handle this manually, you should refuse this
 option.
";
$elem["dbconfig-common/dbconfig-remove"]["descriptionde"]="Dekonfigurieren der Datenbank für ${pkg} mit dbconfig-common?
 Da das Paket ${pkg} entfernt werden soll, ist es möglich, dass die eingerichtete Datenbank und die Privilegien des dem Pakets zugeordneten Benutzers nicht mehr benötigt werden.
 .
 Bitte wählen Sie aus, ob die Entfernung der Datenbank und der Privilegien mittels Dbconfig-common gehandhabt werden soll.
 .
 Falls Sie diese Option auswählen, wird dbconfig-common prüfen, ob ${pkg} Skripte und Datenbankbefehle bereitstellt, um die paketspezifischen Operationen rückgängig zu machen und diese ggf. auszuführen. Danach werden Sie gefragt, ob Sie die Datenbank ${pkg} löschen möchten und die Standardprivilegien für den Benutzer von ${pkg} zurücksetzen. Falls Sie dies alles nicht möchten oder falls Sie dies selbst durchführen wollen, sollten Sie diese Option ablehnen.
";
$elem["dbconfig-common/dbconfig-remove"]["descriptionfr"]="Faut-il défaire la configuration de la base de donnée de ${pkg} avec dbconfig-common ?
 Comme vous supprimez ${pkg}, il est possible que vous ne vouliez plus utiliser la base de données et l'utilisateur qui lui était liés.
 .
 Veuillez choisir si dbconfig-common doit supprimer la base de données et révoquer les droits.
 .
 Si vous choisissez cette option, dbconfig-common vérifiera si ${pkg} fournit les scripts et les commandes de base de données pour annuler les opérations spécifiques d'un paquet et les exécuter s'ils existent. Puis il vous demandera si vous souhaitez supprimer la base de données de ${pkg} et révoquer les privilèges standards pour l'utilisateur de ${pkg}. Si vous ne souhaitez aucun de ces choix, ou si vous voulez gérer vous même, vous devriez refuser cette option.
";
$elem["dbconfig-common/dbconfig-remove"]["default"]="true";
$elem["dbconfig-common/database-type"]["type"]="select";
$elem["dbconfig-common/database-type"]["description"]="Database type to be used by ${pkg}:
 The ${pkg} package can be configured to use one of several database types.
 Below, you will be presented with the available choices.
 .
 If other database types are supported by ${pkg} but not shown here, the reason
 for their omission is that the corresponding dbconfig-<database type> packages
 are not installed. If you know that you want the package to use another
 supported database type, your best option is to back out of the
 dbconfig-common questions and opt out of dbconfig-common assistance for this
 package for now. Install your preferred dbconfig-<database type> option from
 the list in the package dependencies, and then \"dpkg-reconfigure ${pkg}\" to
 select it.
";
$elem["dbconfig-common/database-type"]["descriptionde"]="Datenbanktyp, der durch das Paket ${pkg} benutzt werden soll:
 Das Paket ${pkg} kann zur Verwendung verschiedener Datenbanktypen konfiguriert werden. Unten sind die verschiedenen Möglichkeiten aufgelistet.
 .
 Falls andere Datenbanktypen durch ${pkg} unterstützt aber nicht hier angezeigt werden, liegt dies daran, dass das entsprechende Paket dbconfig-<Datenbanktyp> nicht installiert ist. Falls Sie sich sicher sind, dass das Paket einen anderen unterstützen Datenbanktyp verwenden soll, ist es am besten, aus der Dbconfig-common-Frage zurückzugehen und derzeit die Unterstützung durch Dbconfig-common nicht zu verwenden. Installieren Sie die bevorzugte dbconfig-<Datenbanktyp>-Variante aus der Liste der Paketabhängigkeiten und wählen Sie dann diese mittels »dpkg-reconfigure ${pkg}« aus.
";
$elem["dbconfig-common/database-type"]["descriptionfr"]="Type de serveur de bases de données à utiliser avec ${pkg} :
 Le paquet ${pkg} peut être configuré pour utiliser l'un des nombreux types de serveur de bases de données. Ci-dessous vous seront présentés les choix disponibles.
 .
 Si d'autres types base de données sont supportées par ${pkg} mais n'apparaissent pas ici, la raison de leur omission est que les paquets dbconfig-<database type> ne sont pas installés. Si vous voulez que le paquet utilise une autre base de données compatible, le meilleur choix est de sortir des questions de dbconfig-common et ne plus recourir pour le moment à dbconfig-common pour ce paquet. Installez la solution dbconfig-<database type> de votre choix depuis la liste dans les dépendances de paquets, puis exécutez « dpkg-reconfigure ${pkg} » pour la sélectionner.
";
$elem["dbconfig-common/database-type"]["default"]="";
$elem["dbconfig-common/purge"]["type"]="boolean";
$elem["dbconfig-common/purge"]["description"]="Delete the database for ${pkg}?
 If you no longer need the database for ${pkg} and the privileges of
 the database user of ${pkg}, you can choose to delete the database and
 revoke the privileges now.
 .
 If you no longer have need of the data being stored by ${pkg}, you
 should choose this option. If you want to keep this data,
 or if you would rather handle this process manually, you should
 refuse this option. Either way, it won't affect your other databases.
";
$elem["dbconfig-common/purge"]["descriptionde"]="Die Datenbank für ${pkg} löschen?
 Falls die Datenbank für ${pkg} und die Privilegien der Datenbankbenutzer von ${pkg} nicht mehr benötigt werden sollten, können Sie jetzt deren Löschung auswählen.
 .
 Falls es keine Verwendung mehr für die durch ${pkg} gespeicherten Daten geben sollte, wählen Sie diese Option. Falls Sie die Daten aufbewahren möchten oder dieser Prozess manuell durchgeführt werden soll, lehnen Sie diese Option ab. Unabhängig von der Auswahl wird Ihre Datenbank davon nicht betroffen sein.
";
$elem["dbconfig-common/purge"]["descriptionfr"]="Supprimer la base de données pour ${pkg} ?
 Si vous n'avez plus besoin de la base de données pour ${pkg} ainsi que des droits de l'utilisateur de la base de données pour ${pkg}, vous pouvez choisir de la supprimer et de révoquer les droits maintenant.
 .
 Si vous n'avez plus besoin des données enregistrées par ${pkg}, vous pouvez choisir cette option. Si vous souhaitez conserver ces données, ou si vous préférez plutôt gérer vous-même ce processus, vous pouvez refuser cette option. Quel que soit votre choix, cela n'affectera pas vos autres bases de données.
";
$elem["dbconfig-common/purge"]["default"]="false";
$elem["dbconfig-common/upgrade-backup"]["type"]="boolean";
$elem["dbconfig-common/upgrade-backup"]["description"]="Back up the database for ${pkg} before upgrading?
 The underlying database for ${pkg} needs to be upgraded as part of the
 installation process. Just in case, the database can be backed up
 before this is done, so that if something goes wrong, you can revert
 to the previous package version and repopulate the database.
";
$elem["dbconfig-common/upgrade-backup"]["descriptionde"]="Backup der Datenbank für ${pkg} vor dem Upgrade durchführen?
 Für die dem Paket ${pkg} zu Grunde liegende Datenbank muss während des Installationsprozesses ein Upgrade durchgeführt werden. Für den Fall der Fälle kann vorher ein Backup der Datenbank erstellt werden, so dass zu der alten Version des Paketes zurückgekehrt werden kann und die alten Daten wieder eingespielt werden können.
";
$elem["dbconfig-common/upgrade-backup"]["descriptionfr"]="Sauvegarder la base de données pour ${pkg} avant la mise à jour ?
 La mise à jour de la base de données utilisée par ${pkg} fait partie du processus d'installation. Elle peut être préalablement sauvegardée et ainsi, en cas de problème, vous pourrez réinstaller le paquet précédent et réalimenter la base de données.
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
$elem["dbconfig-common/passwords-do-not-match"]["type"]="error";
$elem["dbconfig-common/passwords-do-not-match"]["description"]="Password mismatch
 The password and its confirmation do not match.
";
$elem["dbconfig-common/passwords-do-not-match"]["descriptionde"]="Die Passwörter stimmen nicht überein.
 Das Passwort und seine Bestätigung stimmen nicht überein.
";
$elem["dbconfig-common/passwords-do-not-match"]["descriptionfr"]="Mots de passe différents
 Le mot de passe et sa confirmation ne correspondent pas
";
$elem["dbconfig-common/passwords-do-not-match"]["default"]="";
$elem["dbconfig-common/upgrade-error"]["type"]="select";
$elem["dbconfig-common/upgrade-error"]["choices"][1]="abort";
$elem["dbconfig-common/upgrade-error"]["choices"][2]="retry";
$elem["dbconfig-common/upgrade-error"]["choices"][3]="retry (skip questions)";
$elem["dbconfig-common/upgrade-error"]["choicesde"][1]="Abbruch";
$elem["dbconfig-common/upgrade-error"]["choicesde"][2]="Wiederholen";
$elem["dbconfig-common/upgrade-error"]["choicesde"][3]="Wiederholen (Fragen überspringen)";
$elem["dbconfig-common/upgrade-error"]["choicesfr"][1]="Abandonner";
$elem["dbconfig-common/upgrade-error"]["choicesfr"][2]="Recommencer";
$elem["dbconfig-common/upgrade-error"]["choicesfr"][3]="Recommencer avec les mêmes réglages";
$elem["dbconfig-common/upgrade-error"]["description"]="Next step for database upgrade:
 An error occurred while upgrading the database:
 .
 ${error}
 .
 Fortunately, ${dbfile} should hold a backup of the database, made just before
 the upgrade (unless the error occurred during backup creation, in which case
 no changes will have been applied yet). Your options are:
  * abort - Causes the operation to fail; you will need to downgrade,
    reinstall, reconfigure this package, or otherwise manually intervene
    to continue using it. This will usually also impact your ability to
    install other packages until the installation failure is resolved.
  * retry - Prompts once more with all the configuration questions
    (including ones you may have missed due to the debconf priority
    setting) and makes another attempt at performing the operation.
  * retry (skip questions) - Immediately attempts the operation again,
    skipping all questions. This is normally useful only if you have
    solved the underlying problem since the time the error occurred.
  * ignore - Continues the operation ignoring dbconfig-common errors.
    This will usually leave this package without a functional database.
";
$elem["dbconfig-common/upgrade-error"]["descriptionde"]="Nächster Schritt beim Upgrade der Datenbank:
 Es ist ein Fehler beim Upgrade der Datenbank aufgetreten:
 .
 ${error}
 .
 Glücklicherweise sollte ${dbfile} eine Sicherung, die genau vor dem Upgrade durchgeführt wurde, Ihrer Datenbank enthalten (es sei denn, der Fehler trat beim Erstellen der Sicherungskopie auf - in diesem Falle wurden keine Änderungen angewandt). Ihre Optionen sind:
  * Abbruch - Damit schlägt die Operation fehl; Sie müssen dann ein
    Downgrade durchführen, das Paket reinstallieren, das Paket neu
    konfigurieren oder auf andere Weise manuell eingreifen, um das Paket
    weiterzuverwenden. Damit wird normalerweise auch Ihre Möglichkeit,
    andere Pakete zu installieren, beeinträchtigt, bis der
    Installationsfehler behoben wurde.
  * Nochmal versuchen - Die Abfragen mit allen Konfigurationsfragen erfolgen
    erneut (darunter auch die, die aufgrund der Debconf-Priorität von Ihnen
    bisher nicht gesehen wurden) und dann erfolgt ein erneuter Versuch zur
    Durchführung der Operation.
  * Nochmal versuchen (Fragen überspringen) -  Versucht die Operation sofort
    erneut, alle Fragen werden übersprungen. Dies ist normalerweise nur
    nützlich, falls Sie nach dem Auftreten des Fehlers das zugrundeliegende
    Problem behoben haben.
  * Ignorieren - Führt mit der Operation fort und ignoriert die Fehler von
    dbconfig-common. Damit verbleibt das Paket typischerweise ohne
    funktionierende Datenbank.
";
$elem["dbconfig-common/upgrade-error"]["descriptionfr"]="Prochaine étape de mise à jour de la base de données :
 Une erreur s'est produite lors de la mise à jour de la base de données :
 .
 ${error}
 .
 Par chance, ${dbfile} doit contenir une sauvegarde de la base de données, effectué juste avant la mise à jour (à moins que l'erreur survînt pendant la création de la sauvegarde, auquel cas aucune modification n'est encore intervenue). Vos possibilités sont:
  * abandonner - Provoque l'échec de l'opération; vous devrez revenir à
    l'ancienne version, reinstaller, reconfigurer ce paquet, ou sinon
    faites-le à la main, pour continuer à l'utiliser.
    Cela impacte le plus souvent la possibilité d'installer d'autres
    paquets tant que l'échec de l'installation n'est pas résolu.
  * réessayer - Pose à nouveau toutes les questions relatives à
    l'installation (en incluant celles que vous pourriez avoir manqué
    à cause du réglage de la priorité de debconf) et fait une nouvelle
    tentative pour effectuer l'opération.
  * réessayer (sans les questions) - Réessaye immédiatement l'opération
    en ne posant pas les questions.
    C'est en général utile si vous avez résolu le problème depuis que
    l'erreur est apparue.
  * ignorer - Poursuit l'opération en ignorant les erreurs de
    dbconfig-common. En général cela amène à un paquet sans base de
    données fonctionnelle.
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
$elem["dbconfig-common/install-error"]["description"]="Next step for database installation:
 An error occurred while installing the database:
 .
 ${error}
 . 
 Your options are:
  * abort - Causes the operation to fail; you will need to downgrade,
    reinstall, reconfigure this package, or otherwise manually intervene
    to continue using it. This will usually also impact your ability to
    install other packages until the installation failure is resolved.
  * retry - Prompts once more with all the configuration questions
    (including ones you may have missed due to the debconf priority
    setting) and makes another attempt at performing the operation.
  * retry (skip questions) - Immediately attempts the operation again,
    skipping all questions. This is normally useful only if you have
    solved the underlying problem since the time the error occurred.
  * ignore - Continues the operation ignoring dbconfig-common errors.
    This will usually leave this package without a functional database.
";
$elem["dbconfig-common/install-error"]["descriptionde"]="Nächster Schritt bei der Datenbankinstallation:
 Ein Fehler ist beim Installieren der Datenbank aufgetreten:
 .
 ${error}
 .
 Ihre Optionen sind:
  * Abbruch - Damit schlägt die Operation fehl; Sie müssen dann ein
    Downgrade durchführen, das Paket reinstallieren, das Paket neu
    konfigurieren oder auf andere Weise manuell eingreifen, um das Paket
    weiterzuverwenden. Damit wird normalerweise auch Ihre Möglichkeit,
    andere Pakete zu installieren, beeinträchtigt, bis der
    Installationsfehler behoben wurde.
  * Nochmal versuchen - Die Abfragen mit allen Konfigurationsfragen erfolgen
    erneut (darunter auch die, die aufgrund der Debconf-Priorität von Ihnen
    bisher nicht gesehen wurden) und dann erfolgt ein erneuter Versuch zur
    Durchführung der Operation.
  * Nochmal versuchen (Fragen überspringen) -  Versucht die Operation sofort
    erneut, alle Fragen werden übersprungen. Dies ist normalerweise nur
    nützlich, falls Sie nach dem Auftreten des Fehlers das zugrundeliegende
    Problem behoben haben.
  * Ignorieren - Führt mit der Operation fort und ignoriert die Fehler von
    dbconfig-common. Damit verbleibt das Paket typischerweise ohne
    funktionierende Datenbank.
";
$elem["dbconfig-common/install-error"]["descriptionfr"]="Prochaine étape pour l'installation de la base de données :
 Une erreur s'est produite lors de la création de la base de données.
 .
 ${error}
 .
 Vos possibilités sont:
  * abandonner - Provoque l'échec de l'opération; vous devrez revenir à
    l'ancienne version, reinstaller, reconfigurer ce paquet, ou sinon
    faites-le à la main, pour continuer à l'utiliser.
    Cela impacte le plus souvent la possibilité d'installer d'autres
    paquets tant que l'échec de l'installation n'est pas résolu.
  * réessayer - Pose à nouveau toutes les questions relatives à
    l'installation (en incluant celles que vous pourriez avoir manqué
    à cause du réglage de la priorité de debconf) et fait une nouvelle
    tentative pour effectuer l'opération.
  * réessayer (sans les questions) - Réessaye immédiatement l'opération
    en ne posant pas les questions.
    C'est en général utile si vous avez résolu le problème depuis que
    l'erreur est apparue.
  * ignorer - Poursuit l'opération en ignorant les erreurs de
    dbconfig-common. En général cela amène à un paquet sans base de
    données fonctionnelle.
";
$elem["dbconfig-common/install-error"]["default"]="abort";
$elem["dbconfig-common/remove-error"]["type"]="select";
$elem["dbconfig-common/remove-error"]["choices"][1]="abort";
$elem["dbconfig-common/remove-error"]["choices"][2]="retry";
$elem["dbconfig-common/remove-error"]["choices"][3]="retry (skip questions)";
$elem["dbconfig-common/remove-error"]["choicesde"][1]="Abbruch";
$elem["dbconfig-common/remove-error"]["choicesde"][2]="Wiederholen";
$elem["dbconfig-common/remove-error"]["choicesde"][3]="Wiederholen (Fragen überspringen)";
$elem["dbconfig-common/remove-error"]["choicesfr"][1]="Abandonner";
$elem["dbconfig-common/remove-error"]["choicesfr"][2]="Recommencer";
$elem["dbconfig-common/remove-error"]["choicesfr"][3]="Recommencer avec les mêmes réglages";
$elem["dbconfig-common/remove-error"]["description"]="Next step for database removal:
 An error occurred while removing the database:
 .
 ${error}
 .
 As a result it was not possible to remove the database for ${pkg}. Your
 options are:
  * abort - Causes the operation to fail; you will need to downgrade,
    reinstall, reconfigure this package, or otherwise manually intervene
    to continue using it. This will usually also impact your ability to
    install other packages until the installation failure is resolved.
  * retry - Prompts once more with all the configuration questions
    (including ones you may have missed due to the debconf priority
    setting) and makes another attempt at performing the operation.
  * retry (skip questions) - Immediately attempts the operation again,
    skipping all questions. This is normally useful only if you have
    solved the underlying problem since the time the error occurred.
  * ignore - Continues the operation ignoring dbconfig-common errors.
    This will usually leave the database and user privileges in place.
";
$elem["dbconfig-common/remove-error"]["descriptionde"]="Nächster Schritt beim Entfernen der Datenbank:
 Während des Entfernens der Datenbank ist ein Fehler aufgetreten:
 .
 ${error}
 .
 Im Ergebnis war es nicht möglich, die Datenbank für ${pkg} zu entfernen. Ihre Optionen sind:
  * Abbruch - Damit schlägt die Operation fehl; Sie müssen dann ein
    Downgrade durchführen, das Paket reinstallieren, das Paket neu
    konfigurieren oder auf andere Weise manuell eingreifen, um das Paket
    weiterzuverwenden. Damit wird normalerweise auch Ihre Möglichkeit,
    andere Pakete zu installieren, beeinträchtigt, bis der
    Installationsfehler behoben wurde.
  * Nochmal versuchen - Die Abfragen mit allen Konfigurationsfragen erfolgen
    erneut (darunter auch die, die aufgrund der Debconf-Priorität von Ihnen
    bisher nicht gesehen wurden) und dann erfolgt ein erneuter Versuch zur
    Durchführung der Operation.
  * Nochmal versuchen (Fragen überspringen) -  Versucht die Operation sofort
    erneut, alle Fragen werden übersprungen. Dies ist normalerweise nur
    nützlich, falls Sie nach dem Auftreten des Fehlers das zugrundeliegende
    Problem behoben haben.
  * Ignorieren - Führt mit der Operation fort und ignoriert die Fehler von
    dbconfig-common. Damit verbleiben die Datenbank und die
    Benutzerprivilegien typischerweise erhalten.
";
$elem["dbconfig-common/remove-error"]["descriptionfr"]="Prochaine étape pour la suppression de la base de données :
 Une erreur s'est produite lors de la suppression de la base de données.
 .
 ${error}
 .
 Le résultat est qu'il n'a pas été possible de supprimer la base de données pour ${pkg}. Vos possibilités sont :
  * abandonner - Provoque l'échec de l'opération; vous devrez revenir à
    l'ancienne version, reinstaller, reconfigurer ce paquet, ou sinon
    faites-le à la main, pour continuer à l'utiliser.
    Cela impacte le plus souvent la possibilité d'installer d'autres
    paquets tant que l'échec de l'installation n'est pas résolu.
  * réessayer - Pose à nouveau toutes les questions relatives à
    l'installation (en incluant celles que vous pourriez avoir manqué à
    cause du réglage de la priorité de debconf) et fait une nouvelle
    tentative pour effectuer l'opération.
  * réessayer (sans les questions) - Réessaye immédiatement l'opération
    en ne posant pas les questions.
    C'est en général utile si vous avez résolu le problème depuis que
    l'erreur est apparue.
  * ignorer - Poursuit l'opération en ignorant les erreurs de
    dbconfig-common. En général cela amène à un paquet sans base de
    données fonctionnelle.
";
$elem["dbconfig-common/remove-error"]["default"]="abort";
$elem["dbconfig-common/missing-db-package-error"]["type"]="select";
$elem["dbconfig-common/missing-db-package-error"]["choices"][1]="abort";
$elem["dbconfig-common/missing-db-package-error"]["choices"][2]="retry";
$elem["dbconfig-common/missing-db-package-error"]["description"]="Next step:
 Configuring the database for ${pkg} requires the package ${dbpackage}
 to be installed and configured first, which is not something that can be
 checked for automatically.
 .
 Your options are:
  * abort - Choose this when in doubt and install ${dbpackage} before
    continuing with the configuration of this package. This causes the
    installation of ${pkg} to fail for now.
  * retry - Prompts once more with all the configuration questions
    (including ones you may have missed due to the debconf priority
    setting) and makes another attempt at performing the operation.
    Choose this if you chose the wrong database type by mistake.
  * ignore - Continues the operation ignoring dbconfig-common errors.
    This will usually leave this package without a functional database.
";
$elem["dbconfig-common/missing-db-package-error"]["descriptionde"]="Nächster Schritt:
 Um die Datenbank für ${pkg} zu konfigurieren, muss zuerst das Paket ${dbpackage} installiert und konfiguriert werden. Dies kann nicht automatisch überprüft werden.
 .
 Ihre Optionen sind:
  * Abbruch - Wählen Sie dies im Zweifelsfall und installieren Sie
    ${dbpackage} bevor Sie mit der Konfiguration dieses Pakets fortfahren.
    Dies führt jetzt dazu, dass die Installation von ${pkg} fehlschlägt.
  * Nochmal versuchen - Die Abfragen mit allen Konfigurationsfragen erfolgen
    erneut (darunter auch die, die aufgrund der Debconf-Priorität von Ihnen
    bisher nicht gesehen wurden) und dann erfolgt ein erneuter Versuch zur
    Durchführung der Operation. Wählen Sie dies, falls Sie versehentlich die
    falsche Datenbank ausgewählt haben.
  * Ignorieren - Führt mit der Operation fort und ignoriert die Fehler von
    dbconfig-common. Damit verbleibt das Paket typischerweise ohne
    funktionierende Datenbank.
";
$elem["dbconfig-common/missing-db-package-error"]["descriptionfr"]="Prochaine étape :
 La configuration de la base de données de ${pkg} a besoin que le paquet ${dbpackage} soit installé et configuré, ce qui ne peut être vérifié automatiquement.
 .
 Vos possibilités sont :
  * abandonner - Choisissez ceci si vous ne savez pas et installer
    ${dbpackage} avant de continuer la configuration de ce paquet. Ceci
    va provoquer l'échec de l'installation de ${pkg} de suite.
  * réessayer - Pose à nouveau toutes les questions relatives à
    l'installation (en incluant celles que vous pourriez avoir manqué à
    cause du réglage de la priorité de debconf) et fait une nouvelle
    tentative pour effectuer l'opération.
  * ignorer - Poursuit l'opération en ignorant les erreurs de
    dbconfig-common. En général cela amène à un paquet sans base de
    données fonctionnelle.
";
$elem["dbconfig-common/missing-db-package-error"]["default"]="abort";
$elem["dbconfig-common/remote/host"]["type"]="select";
$elem["dbconfig-common/remote/host"]["description"]="Host name of the ${dbvendor} database server for ${pkg}:
 Please select the remote hostname to use, or select \"new host\" to
 enter a new host.
";
$elem["dbconfig-common/remote/host"]["descriptionde"]="Rechnername des ${dbvendor}-Datenbankservers für ${pkg}:
 Bitte wählen Sie den Namen des zu verwendenden anderen Rechners aus oder wählen Sie »new host«, um einen neuen Rechner einzugeben.
";
$elem["dbconfig-common/remote/host"]["descriptionfr"]="Nom d'hôte du serveur de bases de données ${dbvendor} pour ${pkg} :
 Veuillez choisir l'hôte distant à utiliser ou choisissez « nouvel hôte » pour indiquer un nouvel hôte.
";
$elem["dbconfig-common/remote/host"]["default"]="localhost";
$elem["dbconfig-common/remote/port"]["type"]="string";
$elem["dbconfig-common/remote/port"]["description"]="Port number for the ${dbvendor} service:
 Please specify the port the ${dbvendor} database on the remote host is
 running on. To use the default port, leave this field blank.
";
$elem["dbconfig-common/remote/port"]["descriptionde"]="Portnummer für den ${dbvendor}-Dienst:
 Bitte geben Sie den Port an, an dem die ${dbvendor}-Datenbank auf dem anderen Rechner auf Anfragen wartet. Um den Standard-Port zu verwenden, lassen Sie das Feld leer.
";
$elem["dbconfig-common/remote/port"]["descriptionfr"]="Numéro de port pour le service ${dbvendor} :
 Veuillez indiquer le port sur lequel le fournisseur de bases de données ${dbvendor} est à l'écoute sur l'hôte distant. Vous pouvez laisser ce champ vide pour utiliser le port par défaut.
";
$elem["dbconfig-common/remote/port"]["default"]="";
$elem["dbconfig-common/remote/newhost"]["type"]="string";
$elem["dbconfig-common/remote/newhost"]["description"]="Host running the ${dbvendor} server for ${pkg}:
 Please provide the hostname of a remote ${dbvendor} server.
 .
 You must have already arranged for the administrative
 account to be able to remotely create databases and grant
 privileges.
";
$elem["dbconfig-common/remote/newhost"]["descriptionde"]="Computer auf dem der ${dbvendor}-Server für ${pkg} läuft:
 Bitte geben Sie den Rechnernamen des anderen ${dbvendor}-Servers ein.
 .
 Sie müssen bereits einen Administrationszugang auf dem anderen Rechner so eingerichtet haben, dass das Erstellen der Datenbank und das Einrichten der Zugriffsrechte ermöglicht worden ist.
";
$elem["dbconfig-common/remote/newhost"]["descriptionfr"]="Nom d'hôte du serveur ${dbvendor} pour ${pkg} :
 Veuillez indiquer le nom d'hôte du serveur ${dbvendor} distant.
 .
 Un compte possédant des privilèges d'administrateur doit déjà être configuré pour créer une base distante et donner les droits d'accès.
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
 database server. A ${dbvendor} user is not necessarily the same as a
 system login, especially if the database is on a remote server.
 .
 This is the user which will own the database, tables, and other
 objects to be created by this installation. This user will have
 complete freedom to insert, change, or delete data in the database.
 .
 If your username contains an @, you need to specify the domain as well
 (see below).
 .
 Advanced usage: if you need to define the domain that the user will log
 in from, you can write \"username@domain\".
";
$elem["dbconfig-common/db/app-user"]["descriptionde"]="${dbvendor}-Benutzername für ${pkg}:
 Bitte geben Sie einen ${dbvendor}-Benutzernamen ein, mit dem sich das Programm ${pkg} am Datenbank-Server anmelden soll. Ein ${dbvendor}-Benutzer ist nicht unbedingt ein System-Anmeldename, insbesondere wenn die Datenbank auf einem anderen Server läuft.
 .
 Dieser Benutzer wird der Eigentümer der Datenbank, der Tabellen und anderer Objekte sein, die bei der Installation erzeugt werden. Dieser Benutzer hat alle Rechte, Daten in die Datenbank einzufügen, in ihr zu verändern oder aus ihr zu löschen.
 .
 Falls Ihr Benutzername ein »@« enthält, müssen Sie auch die Domäne angeben (siehe unten).
 .
 Fortgeschrittene Verwendung: Falls Sie die Domäne, aus der sich der Benutzer anmelden wird, festlegen müssen, können Sie »Benutzer@Domäne« schreiben.
";
$elem["dbconfig-common/db/app-user"]["descriptionfr"]="Identifiant ${dbvendor} pour ${pkg} :
 Veuillez indiquer un identifiant de connexion ${dbvendor} pour ${pkg} à stocker sur le serveur de bases de données. Un utilisateur ${dbvendor} n'est pas nécessairement le même que l'identifiant de connexion, en particulier quand la base de données se trouve sur un serveur distant.
 .
 Cet identifiant est celui qui sera le propriétaire de la base de données, des tables et autres objets qui seront créés par cette installation. Il pourra à volonté insérer, modifier ou supprimer des données dans la base de données.
 .
 Si votre nom d'utilisateur contient @, vous devez également spécifier le domaine (voir ci-dessous).
 .
 Utilisation avancée : Si vous devez définir le domaine depuis lequel l'utilisateur se connectera, vous pouvez écrire « nom_d_utilisateur@domaine ».
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
$elem["dbconfig-common/mysql/method"]["choices"][1]="Unix socket";
$elem["dbconfig-common/mysql/method"]["choicesde"][1]="Unix-Socket";
$elem["dbconfig-common/mysql/method"]["choicesfr"][1]="Socket Unix";
$elem["dbconfig-common/mysql/method"]["description"]="Connection method for MySQL database of ${pkg}:
 By default, ${pkg} will be configured to use a MySQL server
 through a local Unix socket (this provides the best performance).
 To connect with a different method, or to a different server entirely,
 select the appropriate option from the choices here.
";
$elem["dbconfig-common/mysql/method"]["descriptionde"]="Verbindungsmethode an die MySQL-Datenbank von ${pkg}:
 Standardmäßig wird ${pkg} so konfiguriert, dass ein MySQL-Server über einen lokalen UNIX-Socket angesprochen wird (ermöglicht die beste Geschwindigkeit). Um sich mit einer anderen Methode anzumelden oder einen komplett anderen Server zu verwenden, wählen Sie aus den Optionen hier die geeignete aus.
";
$elem["dbconfig-common/mysql/method"]["descriptionfr"]="Méthode de connexion pour la base de données MySQL de ${pkg}:
 Par défaut, ${pkg} sera configuré pour utiliser un serveur MySQL local via un socket Unix (ceci donne les meilleures performances). Toutefois, si vous souhaitez utiliser une autre méthode de connexion ou vous connecter à un autre serveur, veuillez choisir une des options présentées.
";
$elem["dbconfig-common/mysql/method"]["default"]="Unix socket";
$elem["dbconfig-common/mysql/app-pass"]["type"]="password";
$elem["dbconfig-common/mysql/app-pass"]["description"]="MySQL application password for ${pkg}:
 Please provide a password for ${pkg} to register with the
 database server. If left blank, a random password will be
 generated.
";
$elem["dbconfig-common/mysql/app-pass"]["descriptionde"]="MySQL-Anwendungspasswort für ${pkg}:
 Bitte geben Sie ein Passwort ein, mit dem sich ${pkg} beim Datenbankserver anmelden kann. Falls Sie das Feld frei lassen, wird automatisch ein zufälliges Passwort erzeugt.
";
$elem["dbconfig-common/mysql/app-pass"]["descriptionfr"]="Mot de passe de connexion MySQL pour ${pkg} :
 Veuillez indiquer un mot de passe de connexion pour ${pkg} sur le serveur de bases de données. Si vous laissez ce champ vide, un mot de passe aléatoire sera généré.
";
$elem["dbconfig-common/mysql/app-pass"]["default"]="";
$elem["dbconfig-common/mysql/admin-user"]["type"]="string";
$elem["dbconfig-common/mysql/admin-user"]["description"]="Name of the database's administrative user:
 Please provide the name of the account with which this package should perform
 administrative actions. This user is the one with the power to create new
 database users.
 .
 For MySQL, this is almost always \"root\". Note that this is not the
 same as the Unix login \"root\".
";
$elem["dbconfig-common/mysql/admin-user"]["descriptionde"]="Name des administrativen Datenbank-Benutzers:
 Bitte geben Sie den Namen des Kontos an, mit dem dieses Paket die administrativen Vorgänge ausführen soll. Dieser Benutzer verfügt über die Berechtigung, neue Datenbank-Benutzer anzulegen.
 .
 Für MySQL ist dies fast immer »root«. Beachten Sie, dass dies nicht dasselbe wie der UNIX-Benutzer »root« ist.
";
$elem["dbconfig-common/mysql/admin-user"]["descriptionfr"]="Nom de l'administrateur de la base de données :
 Veuillez indiquer le nom du compte à utiliser avec lequel ce paquet pourra effectuer des actions d'administration. Cet identifiant doit posséder les droits de création de nouveaux utilisateurs de la base de données.
 .
 Pour MySQL, c'est le plus souvent « root ». Veuillez noter que cet identifiant est différent du « root » Unix.
";
$elem["dbconfig-common/mysql/admin-user"]["default"]="";
$elem["dbconfig-common/mysql/admin-pass"]["type"]="password";
$elem["dbconfig-common/mysql/admin-pass"]["description"]="Password of the database's administrative user:
 Please provide the password for the administrative account \"${dbadmin}\" with
 which this package should create its MySQL database and user.
";
$elem["dbconfig-common/mysql/admin-pass"]["descriptionde"]="Passwort des administrativen Datenbank-Benutzers:
 Bitte geben Sie das Passwort für das administrative Konto »${dbadmin}« an, mit dem dieses Paket seine MySQL-Datenbank und -Benutzer einrichten soll.
";
$elem["dbconfig-common/mysql/admin-pass"]["descriptionfr"]="Mot de passe de l'administrateur de la base de données :
 Veuillez indiquer le mot de passe pour le compte d'administration « ${dbadmin} » qui servira à créer la base de données MySQL ainsi que les utilisateurs.
";
$elem["dbconfig-common/mysql/admin-pass"]["default"]="";
$elem["dbconfig-common/pgsql/method"]["type"]="select";
$elem["dbconfig-common/pgsql/method"]["choices"][1]="Unix socket";
$elem["dbconfig-common/pgsql/method"]["choices"][2]="TCP/IP";
$elem["dbconfig-common/pgsql/method"]["choicesde"][1]="Unix-Socket";
$elem["dbconfig-common/pgsql/method"]["choicesde"][2]="TCP/IP";
$elem["dbconfig-common/pgsql/method"]["choicesfr"][1]="Socket Unix";
$elem["dbconfig-common/pgsql/method"]["choicesfr"][2]="TCP/IP";
$elem["dbconfig-common/pgsql/method"]["description"]="Connection method for PostgreSQL database of ${pkg}:
 By default, ${pkg} will be configured to use a PostgreSQL server through
 TCP/IP because that method works in most circumstances. To connect with a
 different method, select the appropriate option from the choices here.
";
$elem["dbconfig-common/pgsql/method"]["descriptionde"]="Verbindungsmethode für die PostgreSQL-Datenbank von ${pkg}:
 Standardmäßig wird ${pkg} so konfiguriert, dass ein PostgreSQL-Server über TCP/IP angesprochen wird, da dies in den meisten Fällen funktioniert. Um eine Verbindung mit einer anderen Methode durchzuführen, wählen Sie aus den Optionen hier die geeignete aus.
";
$elem["dbconfig-common/pgsql/method"]["descriptionfr"]="Méthode de connexion pour la base de données PostgreSQL de ${pkg} :
 Par défaut, ${pkg} sera configuré pour utiliser un serveur PostgreSQL via un TCP/IP, c'est la méthode qui fonctionne dans la plupart des situations. Pour vous connecter avec une autre méthode, veuillez choisir l'option adéquate dans la liste présente.
";
$elem["dbconfig-common/pgsql/method"]["default"]="TCP/IP";
$elem["dbconfig-common/pgsql/app-pass"]["type"]="password";
$elem["dbconfig-common/pgsql/app-pass"]["description"]="PostgreSQL application password for ${pkg}:
 Please provide a password for ${pkg} to register with the database
 server. If left blank, a random password will be generated.
 .
 If you are using \"ident\" authentication, the supplied password will not
 be used and can be left blank. Otherwise, PostgreSQL access may need to
 be reconfigured to allow password-authenticated access.
";
$elem["dbconfig-common/pgsql/app-pass"]["descriptionde"]="PostgreSQL-Anwendungspasswort für ${pkg}:
 Bitte geben Sie ein Passwort ein, mit dem sich ${pkg} beim Datenbankserver anmelden kann. Falls Sie das Feld frei lassen, wird automatisch ein zufälliges Passwort erzeugt.
 .
 Falls Sie die »ident«-Authentifizierung verwenden, wird das übergebene Passwort nicht verwendet und kann leer bleiben. Andernfalls müsste der PostgreSQL-Zugriff eventuell neu konfiguriert werden, um Passwort-Authentifizierungszugriff zu erlauben.
";
$elem["dbconfig-common/pgsql/app-pass"]["descriptionfr"]="Mot de passe de connexion PostgreSQL pour ${pkg} :
 Veuillez indiquer un mot de passe de connexion pour ${pkg} sur le serveur de bases de données. Si vous laissez ce champ vide, un mot de passe aléatoire sera généré.
 .
 Si vous utilisez l'authentification « ident », le mot de passe fourni ne sera pas utilisé et peut être laissé vide. Dans le cas contraire, l'accès à PostgreSQL nécessite peut-être une reconfiguration afin de permettre l'authentification par mot de passe.
";
$elem["dbconfig-common/pgsql/app-pass"]["default"]="";
$elem["dbconfig-common/pgsql/admin-user"]["type"]="string";
$elem["dbconfig-common/pgsql/admin-user"]["description"]="Name of the database's administrative user:
 Please provide the name of the account with which this package should perform
 administrative actions. This user is the one with the power to create new
 database users.
";
$elem["dbconfig-common/pgsql/admin-user"]["descriptionde"]="Name des administrativen Datenbank-Benutzers:
 Bitte geben Sie den Namen des Kontos an, mit dem dieses Paket die administrativen Vorgänge ausführen soll. Dieser Benutzer verfügt über die Berechtigung, neue Datenbank-Benutzer anzulegen.
";
$elem["dbconfig-common/pgsql/admin-user"]["descriptionfr"]="Nom de l'administrateur de la base de données :
 Veuillez indiquer le nom du compte à utiliser avec lequel ce paquet pourra effectuer des actions d'administration. Cet identifiant doit posséder les droits de création de nouveaux utilisateurs de la base de données.
";
$elem["dbconfig-common/pgsql/admin-user"]["default"]="postgres";
$elem["dbconfig-common/pgsql/admin-pass"]["type"]="password";
$elem["dbconfig-common/pgsql/admin-pass"]["description"]="Password of your database's administrative user:
 Please provide the password for the ${dbadmin} account with which this package
 should perform administrative actions.
 .
 For a standard PostgreSQL installation, a database password is not
 required, since authentication is done at the system level.
";
$elem["dbconfig-common/pgsql/admin-pass"]["descriptionde"]="Passwort des Datenbank-Administrators:
 Bitte geben Sie das Passwort für das administrative Konto ${dbadmin} an, unter dem dieses Paket seine administrativen Vorgänge durchführen soll.
 .
 Bei einer normalen PostgreSQL-Installation ist kein Datenbank-Passwort erforderlich, da die Authentifizierung auf Systemebene erfolgt.
";
$elem["dbconfig-common/pgsql/admin-pass"]["descriptionfr"]="Mot de passe de l'administrateur de la base de données :
 Veuillez indiquer le mot de passe pour le compte ${dbadmin} qui servira à effectuer les actions d'administration.
 .
 Pour une installation par défaut de PostgreSQL, un mot de passe pour la base de données n'est pas nécessaire, puisque l'authentification est réalisée sur le système.
";
$elem["dbconfig-common/pgsql/admin-pass"]["default"]="";
$elem["dbconfig-common/pgsql/authmethod-admin"]["type"]="select";
$elem["dbconfig-common/pgsql/authmethod-admin"]["choices"][1]="ident";
$elem["dbconfig-common/pgsql/authmethod-admin"]["choicesde"][1]="Ident";
$elem["dbconfig-common/pgsql/authmethod-admin"]["choicesfr"][1]="Ident";
$elem["dbconfig-common/pgsql/authmethod-admin"]["description"]="Method for authenticating the PostgreSQL administrator:
 PostgreSQL servers provide several different mechanisms for authenticating
 connections. Please select what method the administrative user should use
 when connecting to the server.
 .
 With \"ident\" authentication on the local machine, the server will
 check that the owner of the Unix socket is allowed to connect.
 PostgreSQL itself calls this peer authentication.
 .
 With \"ident\" authentication to remote hosts, RFC-1413-based ident is
 used (which can be considered a security risk).
 .
 With \"password\" authentication, a password will be passed to the server
 for use with some authentication backend (such as \"MD5\" or \"PAM\"). Note
 that the password is still passed in the clear across network
 connections if your connection is not configured to use SSL.
 .
 For a standard PostgreSQL installation running on the same host,
 \"ident\" is recommended.
";
$elem["dbconfig-common/pgsql/authmethod-admin"]["descriptionde"]="Authentifizierungsmethode des PostgreSQL-Administrators:
 PostgreSQL-Server bieten unterschiedliche Mechanismen für die Anmeldung. Bitte wählen Sie die Methode aus, mit der sich der Administrator am Server anmelden soll.
 .
 Bei der »Ident«-Methode zur Anmeldung an der lokalen Maschine prüft der Server, ob der Eigentümer des UNIX-Sockets eine Erlaubnis zum Verbinden hat. PostgreSQL nennt dies selber »Peer Authentication«.
 .
 Bei der »Ident«-Methode zur Anmeldung an anderen Rechnern wird eine RFC-1413-basierte Ident-Methode benutzt. (Dies kann ein Sicherheitsrisiko darstellen.)
 .
 Bei der »Passwort«-Anmeldung wird ein Passwort zum Server übermittelt und dort an ein Anmeldungs-Backend (z.B. »MD5« oder »PAM«) übergeben. Beachten Sie, dass das Passwort dennoch im Klartext über das Netz gesendet wird, falls der Server nicht für die Benutzung von SSL konfiguriert wurde.
 .
 Für eine Standard-PostgreSQL-Installation, die auf demselben Rechner läuft, wird »Ident« empfohlen.
";
$elem["dbconfig-common/pgsql/authmethod-admin"]["descriptionfr"]="Méthode d'authentification de l'administrateur PostgreSQL :
 Les serveurs PostgreSQL fournissent plusieurs méthodes pour authentifier les connexions. Veuillez choisir la méthode que l'administrateur doit utiliser pour les connexions au serveur.
 .
 En utilisant l'authentification « ident » sur la machine locale, le serveur vérifiera que le propriétaire du socket Unix est autorisé à se connecter. PostgreSQL lui-même appelle cela authentification par un pair (« peer authentication »).
 .
 En utilisant l'authentification « ident » sur un hôte distant, le protocole ident (RFC 1413) sera utilisé (veuillez notez que cela peut être considéré comme une faille de sécurité).
 .
 En utilisant l'authentification « mot de passe », un mot de passe sera transmis au serveur vers un système d'authentification (comme « MD5 » ou « PAM »). Veuillez noter que le mot de passe est transmis en clair si vous n'utilisez pas SSL.
 .
 Pour une installation standard de PostgreSQL sur une machine locale, « ident » est conseillé.
";
$elem["dbconfig-common/pgsql/authmethod-admin"]["default"]="ident";
$elem["dbconfig-common/pgsql/authmethod-user"]["type"]="select";
$elem["dbconfig-common/pgsql/authmethod-user"]["choices"][1]="ident";
$elem["dbconfig-common/pgsql/authmethod-user"]["choicesde"][1]="Ident";
$elem["dbconfig-common/pgsql/authmethod-user"]["choicesfr"][1]="Ident";
$elem["dbconfig-common/pgsql/authmethod-user"]["description"]="Method for authenticating PostgreSQL user:
 PostgreSQL servers provide several different mechanisms for authenticating
 connections. Please select what method the database user should use
 when connecting to the server.
 .
 With \"ident\" authentication on the local machine, the server will
 check that the owner of the Unix socket is allowed to connect.
 PostgreSQL itself calls this peer authentication.
 .
 With \"ident\" authentication to remote hosts, RFC-1413-based ident is
 used (which can be considered a security risk).
 .
 With \"password\" authentication, a password will be passed to the server
 for use with some authentication backend (such as \"MD5\" or \"PAM\"). Note
 that the password is still passed in the clear across network
 connections if your connection is not configured to use SSL.
 .
 For a standard PostgreSQL installation running on the same host,
 \"password\" is recommended, because typically the system username
 doesn't match the database username.
";
$elem["dbconfig-common/pgsql/authmethod-user"]["descriptionde"]="Authentifizierungsmethode der PostgreSQL-Benutzer:
 PostgreSQL-Server bieten verschiedene unterschiedliche Mechanismen für die Anmeldung. Bitte wählen Sie die Methode aus, mit der sich der Datenbankbenutzer am Server anmelden soll.
 .
 Bei der »Ident«-Methode zur Anmeldung an der lokalen Maschine prüft der Server, ob der Eigentümer des UNIX-Sockets eine Erlaubnis zum Verbinden hat. PostgreSQL nennt dies selber »Peer Authentication«.
 .
 Bei der »Ident«-Methode zur Anmeldung an anderen Rechnern wird eine RFC-1413-basierte Ident-Methode benutzt. (Dies kann ein Sicherheitsrisiko darstellen.)
 .
 Bei der »Passwort«-Anmeldung wird ein Passwort zum Server übermittelt und dort an ein Anmeldungs-Backend (z.B. »MD5« oder »PAM«) übergeben. Beachten Sie, dass das Passwort dennoch im Klartext über das Netz gesendet wird, falls der Server nicht für die Benutzung von SSL konfiguriert wurde.
 .
 Für eine Standard-PostgreSQL-Installation, die auf demselben Rechner läuft, wird »password« empfohlen, da typischerweise der Benutzername im System nicht zu dem Datenbank-Benutzernamen passt.
";
$elem["dbconfig-common/pgsql/authmethod-user"]["descriptionfr"]="Méthode d'authentification pour l'utilisateur de PostgreSQL :
 Les serveurs PostgreSQL fournissent plusieurs mécanismes pour authentifier les connexions. Veuillez choisir la méthode qui sera utilisée par l'utilisateur pour se connecter au serveur.
 .
 En utilisant l'authentification « ident » sur la machine locale, le serveur vérifiera que le propriétaire du socket Unix est autorisé à se connecter. PostgreSQL lui-même appelle cela authentification par un pair (« peer authentication »).
 .
 En utilisant l'authentification « ident » sur un hôte distant, le protocole ident (RFC 1413) sera utilisé (veuillez notez que cela peut être considéré comme une faille de sécurité).
 .
 En utilisant l'authentification « mot de passe », un mot de passe sera transmis au serveur vers un système d'authentification (comme « MD5 » ou « PAM »). Veuillez noter que le mot de passe est transmis en clair si vous n'utilisez pas SSL.
 .
 Pour une installation standard de PostgreSQL sur une machine locale, « password » est conseillé parce que, habituellement, le nom d'utilisateur du système ne correspond pas à celui de la base de données.
";
$elem["dbconfig-common/pgsql/authmethod-user"]["default"]="password";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["type"]="note";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["description"]="PostgreSQL connection method error
 Unfortunately, it seems that the database connection method you
 have selected for ${pkg} will not work, because it requires the existence
 of a local user that does not exist.
";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["descriptionde"]="PostgreSQL-Verbindungsmethodenfehler
 Es scheint leider so, als würde die für ${pkg} ausgewählte Datenbankverbindung nicht funktionieren, da sie die Existenz eines lokalen Benutzers voraussetzt, der aber nicht existiert.
";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["descriptionfr"]="Méthode de connexion PostgreSQL incorrecte
 Il semble que la méthode de connexion à la base de données choisie pour ${pkg} ne fonctionne pas car elle a besoin qu'un utilisateur local spécifique existe, ce qui n'est pas le cas.
";
$elem["dbconfig-common/pgsql/no-user-choose-other-method"]["default"]="";
$elem["dbconfig-common/pgsql/changeconf"]["type"]="boolean";
$elem["dbconfig-common/pgsql/changeconf"]["description"]="Change PostgreSQL configuration automatically?
 It has been determined that the database installation for ${pkg}
 cannot be automatically accomplished without making changes to
 the PostgreSQL server's access controls. It is suggested that this
 be done by dbconfig-common when the package is installed. If
 instead you would prefer to do it manually, the following line needs
 to be added to your pg_hba.conf:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/changeconf"]["descriptionde"]="Soll die PostgreSQL-Konfiguration automatisch geändert werden?
 Es hat sich herausgestellt, dass die Installation der Datenbank für ${pkg} nicht automatisch durchgeführt werden kann, ohne die Zugriffskontrolle des PostgreSQL-Servers zu ändern. Es wird empfohlen, dass dies durch dbconfig-common durchgeführt wird, sobald das Paket installiert ist. Falls Sie es stattdessen vorziehen, dies manuell durchzuführen, muss die folgende Zeile zu der Datei ph_hba.conf hinzugefügt werden:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/changeconf"]["descriptionfr"]="Faut-il modifier la configuration de PostgreSQL automatiquement ?
 L'installation de la base de données pour ${pkg} ne peut pas se faire automatiquement sans modifier les contrôles d'accès au serveur PostgreSQL. Vous devriez le faire en utilisant dbconfig-common quand le paquet aura été installé. Si vous préférez le faire vous-même, veuillez ajouter la ligne suivante au fichier pg_hba.conf :
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/changeconf"]["default"]="false";
$elem["dbconfig-common/pgsql/revertconf"]["type"]="boolean";
$elem["dbconfig-common/pgsql/revertconf"]["description"]="Revert PostgreSQL configuration automatically?
 As ${pkg} is now being removed, it may no longer be necessary to
 have an access control entry in the PostgreSQL server's configuration.
 While keeping such an entry will not break any software on the
 system, it may be seen as a potential security concern. It is suggested
 that this be done by dbconfig-common when the package is removed.
 If instead you would prefer to do it manually, the following line
 needs to be removed from your pg_hba.conf:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/revertconf"]["descriptionde"]="Soll die PostgreSQL-Konfiguration automatisch zurückgesetzt werden?
 Da ${pkg} nun gelöscht wird, ist es möglich, dass der Eintrag für die Zugriffskontrolle in der PostgreSQL-Serverkonfiguration nicht länger benötigt wird. Zwar wird es der Software auf Ihrem System nicht unmittelbar schaden, wenn Sie den Eintrag beibehalten, doch könnte sich dieser nicht mehr benötigte Zugang zu Ihrem System als Sicherheitsproblem erweisen. Daher wird empfohlen, den Eintrag mittels Dbconfig-common zu entfernen, sobald das Paket gelöscht wird. Falls Sie es stattdessen vorziehen, dies manuell durchzuführen, muss die folgende Zeile aus der Datei ph_hba.conf entfernt werden:
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/revertconf"]["descriptionfr"]="Faut-il restaurer la configuration de PostgreSQL automatiquement ?
 Comme ${pkg} va être supprimé, il n'est plus nécessaire qu'une entrée de contrôle d'accès existe dans la configuration du serveur PostgreSQL. Même si conserver cette entrée ne risquerait pas de perturber le fonctionnement des autres logiciels du système, cela peut constituer un risque pour la sécurité. Vous devriez le faire en utilisant dbconfig-common une fois le paquet supprimé. Si vous préférez le faire vous-même, veuillez supprimer la ligne suivante de votre fichier pg_hba.conf :
 .
 ${pghbaline}
";
$elem["dbconfig-common/pgsql/revertconf"]["default"]="false";
$elem["dbconfig-common/pgsql/manualconf"]["type"]="note";
$elem["dbconfig-common/pgsql/manualconf"]["description"]="Modifications needed in /etc/postgresql/pg_hba.conf
 To get the database for package ${pkg} bootstrapped you have
 to edit the configuration of the PostgreSQL server. You may be able to
 find help in the file /usr/share/doc/${pkg}/README.Debian.
";
$elem["dbconfig-common/pgsql/manualconf"]["descriptionde"]="Anpassungen in der Datei /etc/postgresql/pg_hba.conf notwendig.
 Um die PostgreSQL-Datenbank für ${pkg} zu initialisieren, muss die Konfiguration des PostgreSQL-Servers geändert werden. Eine detaillierte Anleitung dazu finden Sie unter /usr/share/doc/${pkg}/README.Debian.
";
$elem["dbconfig-common/pgsql/manualconf"]["descriptionfr"]="Modifications nécessaires dans /etc/postgresql/pg_hba.conf
 Pour que la base de données pour le paquet ${pkg} soit initialisée, vous devez modifier la configuration du serveur PostgreSQL. Vous pouvez trouver de l'aide dans le fichier /usr/share/doc/${pkg}/README.Debian.
";
$elem["dbconfig-common/pgsql/manualconf"]["default"]="";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["type"]="error";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["description"]="Empty passwords unsupported with PostgreSQL
";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["descriptionde"]="PostgreSQL unterstützt keine leeren Passwörter
";
$elem["dbconfig-common/pgsql/no-empty-passwords"]["descriptionfr"]="Mots de passe vides non gérés par PostgreSQL
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
