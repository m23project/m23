<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("firebird2.5-superclassic");

$elem["shared/firebird/enabled"]["type"]="boolean";
$elem["shared/firebird/enabled"]["description"]="Enable Firebird server?
 Accept if you want Firebird server to start automatically.
 .
 If you only need the Firebird client and there are no databases that
 will be served by this host, decline.
";
$elem["shared/firebird/enabled"]["descriptionde"]="Firebird-Server aktivieren?
 Geben Sie an, ob der Firebird-Server automatisch gestartet werden soll.
 .
 Lehnen Sie dies ab, falls lediglich der Firebird-Client benötigt wird und es keine Datenbanken gibt, die von diesem System bereitgestellt werden.
";
$elem["shared/firebird/enabled"]["descriptionfr"]="Faut-il activer le serveur Firebird ?
 Acceptez si vous voulez que le serveur Firebird démarre automatiquement.
 .
 Refusez si vous avez uniquement besoin du client Firebird et que ce système n'est pas destiné à héberger des bases de données.
";
$elem["shared/firebird/enabled"]["default"]="false";
$elem["shared/firebird/sysdba_password/first_install"]["type"]="password";
$elem["shared/firebird/sysdba_password/first_install"]["description"]="Password for SYSDBA:
 Firebird has a special user named SYSDBA, which is the user that has
 access to all databases. SYSDBA can also create new databases and users.
 Because of this, it is necessary to secure SYSDBA with a password.
 .
 The password is stored in /etc/firebird/${FB_VER}/SYSDBA.password
 (readable only by root). You may modify it there (don't forget to update
 the security database too, using the gsec utility), or you may use
 dpkg-reconfigure to update both.
 .
 If you don't enter a password, a random one will be used (and stored in
 SYSDBA.password).
";
$elem["shared/firebird/sysdba_password/first_install"]["descriptionde"]="Passwort für SYSDBA:
 Firebird hat einen speziellen Benutzer namens SYSDBA. Dieser Benutzer hat Zugriff auf alle Datenbanken. SYSDBA kann auch neue Datenbanken und Benutzer erstellen. Deshalb ist es nötig, den SYSDBA-Zugang mit einem Passwort zu sichern.
 .
 Das Passwort wird in /etc/firebird/${FB_VER}/SYSDBA.password gespeichert (nur für root lesbar). Sie können es dort ändern (vergessen Sie jedoch nicht, auch die Security-Datenbank mit dem gsec-Werkzeug zu aktualisieren oder verwenden Sie dpkg-reconfigure, um gleich beides zu verändern).
 .
 Falls Sie kein Passwort eingeben, wird ein Zufallspasswort verwendet (und in SYSDBA.password gespeichert).
";
$elem["shared/firebird/sysdba_password/first_install"]["descriptionfr"]="Mot de passe pour l'identifiant SYSDBA :
 Firebird crée un identifiant spécial appelé SYSDBA, qui a accès à toutes les bases de données. SYSDBA peut également créer de nouvelles bases de données et de nouveaux utilisateurs. Par sécurité, il est nécessaire d'attribuer un mot de passe à SYSDBA.
 .
 Le mot de passe est conservé dans le fichier /etc/firebird/${FB_VER}/SYSDBA.password (accessible uniquement au superutilisateur). Pour changer de mot de passe, vous pouvez modifier directement ce fichier (dans ce cas n'oubliez pas de mettre également à jour la base de données « security » avec l'utilitaire gsec), ou bien utiliser la commande « dpkg-reconfigure ».
 .
 Si vous laissez ce champ vide, un mot de passe aléatoire sera créé et écrit dans SYSDBA.password.
";
$elem["shared/firebird/sysdba_password/first_install"]["default"]="";
$elem["shared/firebird/sysdba_password/upgrade_reconfigure"]["type"]="password";
$elem["shared/firebird/sysdba_password/upgrade_reconfigure"]["description"]="Password for SYSDBA:
 Firebird has a special user named SYSDBA, which is the user that has
 access to all databases. SYSDBA can also create new databases and users.
 Because of this, it is necessary to secure SYSDBA with a password.
 .
 The password is stored in /etc/firebird/${FB_VER}/SYSDBA.password
 (readable only by root). You may modify it there (don't forget to update
 the security database too, using the gsec utility), or you may use
 dpkg-reconfigure to update both.
 .
 To keep your existing password, leave this blank.
";
$elem["shared/firebird/sysdba_password/upgrade_reconfigure"]["descriptionde"]="Passwort für SYSDBA:
 Firebird hat einen speziellen Benutzer namens SYSDBA. Dieser Benutzer hat Zugriff auf alle Datenbanken. SYSDBA kann auch neue Datenbanken und Benutzer erstellen. Deshalb ist es nötig, den SYSDBA-Zugang mit einem Passwort zu sichern.
 .
 Das Passwort wird in /etc/firebird/${FB_VER}/SYSDBA.password gespeichert (nur für root lesbar). Sie können es dort ändern (vergessen Sie jedoch nicht, auch die Security-Datenbank mit dem gsec-Werkzeug zu aktualisieren oder verwenden Sie dpkg-reconfigure, um gleich beides zu verändern).
 .
 Um Ihr vorhandenes Passwort weiter zu verwenden, lassen Sie dies leer.
";
$elem["shared/firebird/sysdba_password/upgrade_reconfigure"]["descriptionfr"]="Mot de passe pour l'identifiant SYSDBA :
 Firebird crée un identifiant spécial appelé SYSDBA, qui a accès à toutes les bases de données. SYSDBA peut également créer de nouvelles bases de données et de nouveaux utilisateurs. Par sécurité, il est nécessaire d'attribuer un mot de passe à SYSDBA.
 .
 Le mot de passe est conservé dans le fichier /etc/firebird/${FB_VER}/SYSDBA.password (accessible uniquement au superutilisateur). Pour changer de mot de passe, vous pouvez modifier directement ce fichier (dans ce cas n'oubliez pas de mettre également à jour la base de données « security » avec l'utilitaire gsec), ou bien utiliser la commande « dpkg-reconfigure ».
 .
 Pour conserver votre mot de passe actuel, laissez ce champ vide.
";
$elem["shared/firebird/sysdba_password/upgrade_reconfigure"]["default"]="";
$elem["shared/firebird/sysdba_password/new_password"]["type"]="password";
$elem["shared/firebird/sysdba_password/new_password"]["description"]="New password for SYSDBA (for internal use)
 *DO NOT TRANSLATE*
 This is an internal, hidden template

";
$elem["shared/firebird/sysdba_password/new_password"]["descriptionde"]="";
$elem["shared/firebird/sysdba_password/new_password"]["descriptionfr"]="";
$elem["shared/firebird/sysdba_password/new_password"]["default"]="";
$elem["shared/firebird/purge_security"]["type"]="boolean";
$elem["shared/firebird/purge_security"]["description"]="Delete password database?
 The last package that uses password database at
 /var/lib/firebird/${FB_VER}/system/security2.fdb is being purged.
 .
 Leaving security database may present security risk. It is a good idea to
 remove it if you don't plan re-installing firebird${FB_VER}.
 .
 The same stands for /etc/firebird/${FB_VER}/SYSDBA.password, where the
 password for SYSDBA is kept.
";
$elem["shared/firebird/purge_security"]["descriptionde"]="Passwort-Datenbank löschen?
 Das letzte Paket, dass die Passwort-Datenbank unter /var/lib/firebird/${FB_VER}/system/security2.fdb nutzt, wird gerade komplett entfernt.
 .
 Die Datenbank zu erhalten, könnte ein Sicherheitsrisiko darstellen. Es ist eine gute Idee, sie zu entfernen, wenn Sie nicht vorhaben, firebird${FB_VER} erneut zu installieren.
 .
 Das Gleiche gilt für /etc/firebird/${FB_VER}/SYSDBA.password, wo das Passwort für SYSDBA abgelegt ist.
";
$elem["shared/firebird/purge_security"]["descriptionfr"]="Faut-il supprimer le mot de passe de la base de données ?
 Le dernier paquet à utiliser le mot de passe de la base de données dans /var/lib/firebird/${FB_VER}/system/security2.fdb va être purgé.
 .
 Laisser la base de données de sécurité peut présenter des risques. Vous devriez la supprimer si vous ne prévoyez pas de réinstaller Firebird${FB_VER}.
 .
 Cette remarque vaut également pour le fichier /etc/firebird/${FB_VER}/SYSDBA.password qui contient le mot de passe de SYSDBA.
";
$elem["shared/firebird/purge_security"]["default"]="false";
$elem["shared/firebird/purge_databases"]["type"]="boolean";
$elem["shared/firebird/purge_databases"]["description"]="Delete databases from /var/lib/firebird/${FB_VER}/data?
 You may want to delete all databases from firebird standard database
 directory, /var/lib/firebird/${FB_VER}/data. If you choose this option, all
 files ending with \".fdb\" and \".fbk\" from the above directory and its
 subdirectories will be removed.
 .
 Note that any databases outside of /var/lib/firebird/${FB_VER}/data will not
 be affected.
";
$elem["shared/firebird/purge_databases"]["descriptionde"]="Datenbanken in /var/lib/firebird/${FB_VER}/data löschen?
 Sie sollten eventuell alle Datenbanken aus dem Standard-Firebird-Datenbank-Verzeichnis /var/lib/firebird/${FB_VER}/data löschen. Wenn Sie diese Option wählen, werden alle Dateien in obigem Verzeichnis sowie allen Unterverzeichnissen, die auf ».fdb« und ».fbk« enden, entfernt.
 .
 Beachten Sie, dass alle Datenbanken außerhalb von /var/lib/firebird/${FB_VER}/data nicht verändert werden.
";
$elem["shared/firebird/purge_databases"]["descriptionfr"]="Supprimer les bases de données stockées dans /var/lib/firebird/${FB_VER}/data ?
 Vous devriez supprimer le contenu du dossier de base de données standard de Firebird, /var/lib/firebird/${FB_VER}/data. Si vous choisissez cette option, tous les fichiers portant l'extension « .fdb » and « .fbk » et contenus dans ce dossier et ses sous-répertoires seront supprimés.
 .
 Veuillez noter qu'aucune des bases de données contenues dans /var/lib/firebird/${FB_VER}/data ne sera affectée.
";
$elem["shared/firebird/purge_databases"]["default"]="false";
$elem["shared/firebird/server_in_use"]["type"]="error";
$elem["shared/firebird/server_in_use"]["description"]="firebird${FB_VER}-${FB_FLAVOUR} server is in use
  To ensure data integrity, package removal/upgrade is aborted. Please stop all local and remote clients before removing or upgrading firebird${FB_VER}-${FB_FLAVOUR}
";
$elem["shared/firebird/server_in_use"]["descriptionde"]="firebird${FB_VER}-${FB_FLAVOUR}-Server wird gerade genutzt
 Um die Datenintegrität sicher zu stellen, wird die Entfernung/das Upgrade des Pakets abgebrochen. Bitte stoppen Sie alle lokalen und entfernt laufenden Clients, bevor Sie firebird${FB_VER}-${FB_FLAVOUR} entfernen oder aktualisieren.
";
$elem["shared/firebird/server_in_use"]["descriptionfr"]="Le serveur firebird${FB_VER}-${FB_FLAVOUR} est actuellement en activité.
 Afin d'assurer l'intégrité des données, la suppression/mise à jour a été annulée. Veuillez arrêter tous les clients locaux et distants avant de supprimer ou de mettre à jour firebird${FB_VER}-${FB_FLAVOUR}.
";
$elem["shared/firebird/server_in_use"]["default"]="";
$elem["shared/firebird/title"]["type"]="title";
$elem["shared/firebird/title"]["description"]="Password for firebird ${FB_VER}
";
$elem["shared/firebird/title"]["descriptionde"]="Passwort für Firebird ${FB_VER}
";
$elem["shared/firebird/title"]["descriptionfr"]="Mot de passe pour firebird ${FB_VER}
";
$elem["shared/firebird/title"]["default"]="";
PKG_OptionPageTail2($elem);
?>
