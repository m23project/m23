<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("slapd");

$elem["slapd/no_configuration"]["type"]="boolean";
$elem["slapd/no_configuration"]["description"]="Omit OpenLDAP server configuration?
 If you enable this option, no initial configuration or database will be
 created for you.
";
$elem["slapd/no_configuration"]["descriptionde"]="OpenLDAP-Server-Konfiguration auslassen?
 Falls Sie diese Option aktivieren, wird keine Startkonfiguration oder Datenbank für Sie erstellt.
";
$elem["slapd/no_configuration"]["descriptionfr"]="Voulez-vous omettre la configuration d'OpenLDAP ?
 Si vous choisissez cette option, aucune configuration par défaut et aucune base de données ne seront créées.
";
$elem["slapd/no_configuration"]["default"]="false";
$elem["slapd/dump_database"]["type"]="select";
$elem["slapd/dump_database"]["choices"][1]="always";
$elem["slapd/dump_database"]["choices"][2]="when needed";
$elem["slapd/dump_database"]["choicesde"][1]="immer";
$elem["slapd/dump_database"]["choicesde"][2]="wenn benötigt";
$elem["slapd/dump_database"]["choicesfr"][1]="Toujours";
$elem["slapd/dump_database"]["choicesfr"][2]="Lorsque nécessaire";
$elem["slapd/dump_database"]["description"]="Dump databases to file on upgrade:
 Before upgrading to a new version of the OpenLDAP server, the data from
 your LDAP directories can be dumped into plain text files in the
 standard LDAP Data Interchange Format.
 .
 Selecting \"always\" will cause the databases to be dumped
 unconditionally before an upgrade. Selecting \"when needed\" will only
 dump the database if the new version is incompatible with the old
 database format and it needs to be reimported. If you select \"never\",
 no dump will be done.
";
$elem["slapd/dump_database"]["descriptionde"]="Datenbank beim Upgrade in Datei ausgeben (»dump«):
 Bevor Sie ein Upgrade auf eine neue Version des OpenLDAP-Servers durchführen, können die Daten Ihres LDAP-Verzeichnisses in reine Text-Dateien im standardisierten »LDAP Data Interchange Format« ausgegeben werden.
 .
 Die Auswahl von »immer« führt dazu, dass die Datenbanken bedingungslos vor Upgrades ausgegeben werden. Die Auswahl von »wenn benötigt« führt dazu, dass die Datenbank nur ausgegeben wird, falls die neue Version nicht mit dem alten Datenbankformat kompatibel ist und die Datenbank re-importiert werden muss. Die »nie«-Auswahl führt dazu, dass keine Ausgabe der Daten erfolgt.
";
$elem["slapd/dump_database"]["descriptionfr"]="Sauvegarde des bases de données dans un fichier pour la mise à niveau :
 Avant la mise à niveau du serveur OpenLDAP, les données des annuaires LDAP peuvent être exportées dans des fichiers au format texte LDIF (« LDAP Data Interchange Format » : format d'échange de données LDAP).
 .
 Si vous choisissez l'option « Toujours », les données seront systématiquement exportées avant une mise à niveau. Si vous choisissez « Lorsque nécessaire », elles ne seront exportées que lorsque la nouvelle version utilisera un format incompatible avec l'ancienne, ce qui imposera de réimporter les données. Si vous choisissez « Jamais », les données ne seront jamais exportées.
";
$elem["slapd/dump_database"]["default"]="when needed";
$elem["slapd/dump_database_destdir"]["type"]="string";
$elem["slapd/dump_database_destdir"]["description"]="Directory to use for dumped databases:
 Please specify the directory where the LDAP databases will be exported.
 In this directory, several LDIF files will be created which correspond
 to the search bases located on the server. Make sure you have enough
 free space on the partition where the directory is located. The first
 occurrence of the string \"VERSION\" is replaced with the server version
 you are upgrading from.
";
$elem["slapd/dump_database_destdir"]["descriptionde"]="Verzeichnis für Datenbank-Ausgaben (»dumps«):
 Bitte geben Sie ein Verzeichnis an, in das die Datenbanken exportiert werden. Innerhalb dieses Verzeichnisses werden mehrere LDIF-Dateien erstellt, die zu den im Server befindlichen Suchbasen korrespondieren. Stellen Sie sicher, dass Sie genug freien Platz auf der Partition haben, auf der sich das Verzeichnis befindet. Das erste Auftreten der Zeichenkette »VERSION« wird durch die Server-Version ersetzt, von der aus Sie das Upgrade durchführen.
";
$elem["slapd/dump_database_destdir"]["descriptionfr"]="Répertoire où exporter les bases de données :
 Veuillez indiquer le répertoire où les bases de données LDAP seront exportées. Plusieurs fichiers LDIF seront créés dans ce répertoire. Ils correspondent aux bases de recherche présentes sur le serveur. Veuillez vérifier que la partition où se trouve ce répertoire comporte suffisamment de place disponible. La première occurrence de « VERSION » dans le nom de ce répertoire sera remplacée par la version d'OpenLDAP utilisée avant la mise à niveau.
";
$elem["slapd/dump_database_destdir"]["default"]="/var/backups/slapd-VERSION";
$elem["slapd/move_old_database"]["type"]="boolean";
$elem["slapd/move_old_database"]["description"]="Move old database?
 There are still files in /var/lib/ldap which will probably break
 the configuration process. If you enable this option, the maintainer
 scripts will move the old database files out of the way before
 creating a new database.
";
$elem["slapd/move_old_database"]["descriptionde"]="Alte Datenbank verschieben?
 Es sind noch Dateien in /var/lib/ldap, die wahrscheinlich den Konfigurationsprozess durcheinander bringen werden. Wird diese Option aktiviert, dann werden die Betreuerskripte die alten Datenbankdateien beiseite schieben, bevor sie eine neue Datenbank erstellen.
";
$elem["slapd/move_old_database"]["descriptionfr"]="Faut-il déplacer l'ancienne base de données ?
 Des fichiers présents dans /var/lib/ldap vont probablement provoquer l'échec de la procédure de configuration. Si vous choisissez cette option, les scripts de configuration déplaceront les anciens fichiers des bases de données avant de créer une nouvelle base de données.
";
$elem["slapd/move_old_database"]["default"]="true";
$elem["slapd/invalid_config"]["type"]="boolean";
$elem["slapd/invalid_config"]["description"]="Retry configuration?
 The configuration you entered is invalid. Make sure that the DNS domain name
 is syntactically valid, the field for the organization is not left empty and
 the admin passwords match. If you decide not to retry the configuration the
 LDAP server will not be set up. Run 'dpkg-reconfigure slapd' if you want to
 retry later.
";
$elem["slapd/invalid_config"]["descriptionde"]="Konfiguration erneut versuchen?
 Die von Ihnen eingegebene Konfiguration ist ungültig. Stellen Sie sicher, dass der DNS-Domainname einer gültigen Syntax folgt, das Feld für die Organisation nicht leer geblieben ist und dass die Administratorpasswörter übereinstimmen. Falls Sie sich entscheiden, die Konfiguration nicht erneut zu versuchen, wird der LDAP-Server nicht eingerichtet. Führen Sie »dpkg-reconfigure slapd« aus, falls Sie die Konfiguration später erneut versuchen wollen.
";
$elem["slapd/invalid_config"]["descriptionfr"]="Faut-il recommencer la configuration ?
 La configuration que vous avez indiquée n'est pas valable. Veuillez vérifier que le nom de domaine DNS utilise une syntaxe correcte, que « organisation » n'est pas vide et que les mots de passe d'administrateur correspondent. Si vous choisissez de ne pas recommencer la configuration, le serveur LDAP ne sera pas configuré. Si vous voulez recommencer ce processus, utilisez la commande « dpkg-reconfigure slapd ».
";
$elem["slapd/invalid_config"]["default"]="true";
$elem["slapd/domain"]["type"]="string";
$elem["slapd/domain"]["description"]="DNS domain name:
 The DNS domain name is used to construct the base DN of the LDAP directory.
 For example, 'foo.example.org' will create the directory with
 'dc=foo, dc=example, dc=org' as base DN.
";
$elem["slapd/domain"]["descriptionde"]="DNS-Domainname:
 Der DNS-Domainname wird zur Erzeugung des Basis-DN Ihres LDAP-Verzeichnisses verwendet. Zum Beispiel erstellt »foo.example.org« das Verzeichnis mit der Basis-DN »dc=foo, dc=example, dc=org«.
";
$elem["slapd/domain"]["descriptionfr"]="Nom de domaine :
 Le nom de domaine DNS est utilisé pour établir le nom distinctif de base (« base DN » ou « Distinguished Name ») de l'annuaire LDAP. Par exemple, si vous indiquez « toto.example.org » ici, le nom distinctif de base sera « dc=toto, dc=example, dc=org ».
";
$elem["slapd/domain"]["default"]="";
$elem["shared/organization"]["type"]="string";
$elem["shared/organization"]["description"]="Organization name:
 Please enter the name of the organization to use in the base DN of your
 LDAP directory.
";
$elem["shared/organization"]["descriptionde"]="Name der Organisation:
 Bitte geben Sie den Namen der Organisation ein, die im Basis-DN Ihres LDAP-Verzeichnisses verwendet werden soll.
";
$elem["shared/organization"]["descriptionfr"]="Nom d'entité (« organization ») :
 Veuillez indiquer la valeur qui sera utilisée comme nom d'entité (« organization ») dans le nom distinctif de base de l'annuaire LDAP.
";
$elem["shared/organization"]["default"]="";
$elem["slapd/password1"]["type"]="password";
$elem["slapd/password1"]["description"]="Administrator password:
 Please enter the password for the admin entry in your LDAP directory.
";
$elem["slapd/password1"]["descriptionde"]="Administrator-Passwort:
 Bitte geben Sie das Passwort für den Administrator-Eintrag in Ihrem LDAP-Verzeichnis ein.
";
$elem["slapd/password1"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez indiquer le mot de passe de l'administrateur de l'annuaire LDAP.
";
$elem["slapd/password1"]["default"]="";
$elem["slapd/password2"]["type"]="password";
$elem["slapd/password2"]["description"]="Confirm password:
 Please enter the admin password for your LDAP directory again to verify
 that you have typed it correctly.
";
$elem["slapd/password2"]["descriptionde"]="Passwort bestätigen:
 Bitte geben Sie das Passwort für den Administrator-Eintrag Ihres LDAP-Verzeichnisses nochmal ein, um sicher zu gehen, dass Sie es richtig eingegeben haben.
";
$elem["slapd/password2"]["descriptionfr"]="Mot de passe de l'administrateur :
 Veuillez entrer à nouveau le mot de passe de l'administrateur de l'annuaire LDAP afin de vérifier qu'il a été saisi correctement.
";
$elem["slapd/password2"]["default"]="";
$elem["slapd/password_mismatch"]["type"]="note";
$elem["slapd/password_mismatch"]["description"]="Password mismatch
 The two passwords you entered were not the same. Please try again.
";
$elem["slapd/password_mismatch"]["descriptionde"]="Passwörter stimmen nicht überein
 Die beiden eingegebenen Passwörter sind nicht gleich. Bitte versuchen Sie es noch einmal.
";
$elem["slapd/password_mismatch"]["descriptionfr"]="Erreur de saisie du mot de passe
 Les deux mots de passe que vous avez entrés sont différents. Veuillez recommencer.
";
$elem["slapd/password_mismatch"]["default"]="";
$elem["slapd/purge_database"]["type"]="boolean";
$elem["slapd/purge_database"]["description"]="Do you want the database to be removed when slapd is purged?
";
$elem["slapd/purge_database"]["descriptionde"]="Soll die Datenbank entfernt werden, wenn slapd vollständig gelöscht wird?
";
$elem["slapd/purge_database"]["descriptionfr"]="Faut-il supprimer la base de données lors de la purge du paquet ?
";
$elem["slapd/purge_database"]["default"]="false";
$elem["slapd/internal/adminpw"]["type"]="password";
$elem["slapd/internal/adminpw"]["description"]="Encrypted admin password:
 Internal template, should never be displayed to users.

";
$elem["slapd/internal/adminpw"]["descriptionde"]="";
$elem["slapd/internal/adminpw"]["descriptionfr"]="";
$elem["slapd/internal/adminpw"]["default"]="";
$elem["slapd/internal/generated_adminpw"]["type"]="password";
$elem["slapd/internal/generated_adminpw"]["description"]="Generated admin password:
 Internal template, should never be displayed to users.

";
$elem["slapd/internal/generated_adminpw"]["descriptionde"]="";
$elem["slapd/internal/generated_adminpw"]["descriptionfr"]="";
$elem["slapd/internal/generated_adminpw"]["default"]="";
$elem["slapd/upgrade_slapcat_failure"]["type"]="error";
$elem["slapd/upgrade_slapcat_failure"]["description"]="slapcat failure during upgrade
 An error occurred while upgrading the LDAP directory.
 .
 The 'slapcat' program failed while extracting the LDAP directory. This
 may be caused by an incorrect configuration file (for example, missing
 'moduleload' lines to support the backend database).
 .
 This failure will cause 'slapadd' to fail later as well. The old database
 files will be moved to /var/backups. If you want to try this upgrade
 again, you should move the old database files back into place, fix
 whatever caused slapcat to fail, and run:
 .
  slapcat > ${location}
 .
 Then move the database files back to a backup area and then try running
 slapadd from ${location}.
";
$elem["slapd/upgrade_slapcat_failure"]["descriptionde"]="slapcat-Fehlschlag beim Upgrade
 Während des Versuchs, ein Upgrade des LDAP-Verzeichnisses durchzuführen, trat ein Fehler auf.
 .
 Das Programm »slapcat« schlug beim Versuch, das LDAP-Verzeichnis zu extrahieren, fehl. Dies könnte durch eine inkorrekte Konfigurationsdatei verursacht worden sein (beispielsweise fehlende »moduleload«-Zeilen, um die Backend-Datenbank zu unterstützen).
 .
 Dieser Fehlschlag wird später dazu führen, dass auch »slapadd« fehlschlägt. Die alten Datenbankdateien werden jetzt nach /var/backups verschoben. Falls Sie dieses Upgrade erneut versuchen wollen, sollten Sie die alten Datenbankdateien wieder zurück an ihren Platz verschieben, den Grund für den Fehlschlag von slapcat beheben und folgendes ausführen:
 .
  slapcat > ${location}
 .
 Verschieben Sie dann die Datenbankdateien zurück in den Sicherungsbereich und versuchen Sie, Slapadd von ${location} auszuführen.
";
$elem["slapd/upgrade_slapcat_failure"]["descriptionfr"]="Échec de slapcat durant la mise à niveau
 Une erreur s'est produite lors de la mise à niveau de l'annuaire LDAP.
 .
 Le programme « slapcat » a échoué en extrayant les données du répertoire LDAP. Cela peut être dû à un fichier de configuration non valable (par exemple l'absence de lignes « moduleload » permettant de gérer les divers types de bases de données).
 .
 Cet échec provoquera l'échec ultérieur de « slapadd ». Les anciens fichiers de bases de données seront déplacés dans /var/backups. Si vous souhaitez tenter à nouveau la mise à jour, vous devrez les remettre en place, corriger l'erreur qui a provoqué l'échec de slapcat et utiliser la commande suivante :
 .
  slapcat > ${location}
 .
 Déplacez ensuite les bases de données vers un emplacement de sauvegarde et tentez d'utiliser la commande « slapadd » depuis ${location}.
";
$elem["slapd/upgrade_slapcat_failure"]["default"]="";
$elem["slapd/backend"]["type"]="select";
$elem["slapd/backend"]["choices"][1]="BDB";
$elem["slapd/backend"]["choices"][2]="HDB";
$elem["slapd/backend"]["description"]="Database backend to use:
 HDB and BDB use similar storage formats, but HDB adds support for
 subtree renames. Both support the same configuration options.
 .
 The MDB backend is recommended. MDB uses a new storage format and
 requires less configuration than BDB or HDB.
 .
 In any case, you should review the resulting database configuration for
 your needs. See /usr/share/doc/slapd/README.Debian.gz for more details.
";
$elem["slapd/backend"]["descriptionde"]="Zu verwendendes Datenbank-Backend:
 HDB und BDB verwenden ähnliche Speicherformate, aber HDB enthält zusätzlich Unterstützung für Teilbaum-Umbenennungen. Beide unterstützen die gleichen Konfigurationsoptionen.
 .
 Das MDB-Backend wird empfohlen. MDB verwendet ein neues Speicherformat und benötigt weniger Konfiguration als BDB oder HDB.
 .
 In jedem Fall sollten Sie die erstellte Datenbankkonfiguration im Hinblick auf Ihre Anforderungen prüfen. Lesen Sie /usr/share/doc/slapd/README.Debian.gz für weitere Details.
";
$elem["slapd/backend"]["descriptionfr"]="Module de base de données à utiliser :
 HDB et BDB utilisent des formats de stockage analogues. Par contre, HDB gère les renommages de sous-arbres. Les deux formats utilisent les mêmes options de configuration.
 .
 Le module MDB est recommandé. Il utilise un nouveau format de stockage et est plus simple à configurer que BDB ou HDB.
 .
 Quel que soit votre choix, vous devriez vérifier les options de configuration de la base de données. Pour plus d'informations, veuillez consulter le fichier /usr/share/doc/slapd/README.Debian.gz.
";
$elem["slapd/backend"]["default"]="MDB";
$elem["slapd/unsafe_selfwrite_acl"]["type"]="note";
$elem["slapd/unsafe_selfwrite_acl"]["description"]="Potentially unsafe slapd access control configuration
 One or more of the configured databases has an access control rule that
 allows users to modify most of their own attributes. This may be
 unsafe, depending on how the database is used.
 .
 In the case of slapd access rules that begin with \"to *\", it is
 recommended to remove any instances of \"by self write\", so that users
 are only able to modify specifically allowed attributes.
 .
 See /usr/share/doc/slapd/README.Debian.gz for more details.
";
$elem["slapd/unsafe_selfwrite_acl"]["descriptionde"]="Möglicherweise unsichere Slapd-Zugriffssteuerkonfiguration
 Eine oder mehrere der konfigurierten Datenbanken hat eine Zugriffssteuerregel, die Benutzern erlaubt, die meisten ihrer eigenen Konfigurationsoptionen zu verändern. Dies kann unsicher sein, abhängig davon, wie die Datenbank verwandt wird.
 .
 Im Falle der mit »to *« beginnenden Slapd-Zugriffsregeln, wird empfohlen, alle Instanzen von »by self write« zu entfernen, so dass Benutzer nur in der Lage sind, speziell erlaubte Attribute zu ändern.
 .
 Lesen Sie /usr/share/doc/slapd/README.Debian.gz für weitere Details.
";
$elem["slapd/unsafe_selfwrite_acl"]["descriptionfr"]="Configuration potentiellement peu sûre du contrôle d'accès de slapd
 Une ou plusieurs des bases de données configurées comportent une règle de contrôle d'accès qui permet aux utilisateurs de modifier un ou plusieurs de leurs propres paramètres. Cela peut être peu sûr, selon la façon dont la base de données est configurée.
 .
 Pour les règles d'accès à slapd qui commencent par « to * », il est recommandé de supprimer toute occurrence de « by self write », afin que les utilisateurs ne puissent modifier que des paramètres explicitement autorisés.
 .
 Veuillez consulter le fichier /usr/share/doc/slapd/README.Debian.gz pour plus d'informations.
";
$elem["slapd/unsafe_selfwrite_acl"]["default"]="";
$elem["slapd/ppolicy_schema_needs_update"]["type"]="select";
$elem["slapd/ppolicy_schema_needs_update"]["choices"][1]="abort installation";
$elem["slapd/ppolicy_schema_needs_update"]["choicesde"][1]="Installation abbrechen";
$elem["slapd/ppolicy_schema_needs_update"]["choicesfr"][1]="Abandonner l'installation";
$elem["slapd/ppolicy_schema_needs_update"]["description"]="Manual ppolicy schema update recommended
 The new version of the Password Policy (ppolicy) overlay requires the
 schema to define the pwdMaxRecordedFailure attribute type, which is not
 present in the schema currently in use. It is recommended to abort the
 upgrade now, and to update the ppolicy schema before upgrading slapd.
 If replication is in use, the schema update should be applied on every
 server before continuing with the upgrade.
 .
 An LDIF file has been generated with the changes required for the upgrade:
 .
 ${ldif}
 .
 so if slapd is using the default access control rules, these changes can be
 applied (after starting slapd) by using the command:
 .
 ldapmodify -H ldapi:/// -Y EXTERNAL -f ${ldif}
 .
 If instead you choose to continue the installation, the new attribute
 type will be added automatically, but the change will not be acted on
 by slapd overlays, and replication with other servers may be affected.
";
$elem["slapd/ppolicy_schema_needs_update"]["descriptionde"]="Manuelle Aktualisierung des Ppolicy-Schematas empfohlen
 Die neue Version der Passwort-Richtlinien-Einblendung (Ppolicy) verlangt, dass im Schema der Attributstyp pwdMaxRecordedFailure definiert wird, der im aktuell benutzten Schema nicht vorhanden ist. Es wird empfohlen, die Aktualisierung jetzt abzubrechen und das Ppolicy-Schema zu aktualisieren, bevor das Upgrade von Slapd durchgeführt wird. Falls Replizierung verwandt wird, sollte die Schema-Aktualisierung auf jedem Server angewandt werden, bevor mit dem Upgrade fortgefahren wird.
 .
 Eine LDIF-Datei wurde mit den für das Upgrade benötigten Änderungen erstellt:
 .
 ${ldif}
 .
 Falls Slapd daher die Standardzugriffssteuerungsregeln verwendet, können diese Änderungen (nach dem Start von Slapd) mittels des folgenden Befehls angewandt werden:
 .
 ldapmodify -H ldapi:/// -Y EXTERNAL -f ${ldif}
 .
 Falls Sie sich stattdessen entscheiden, mit der Installation fortzufahren, wird der neue Attributstyp automatisch hinzugefügt, aber auf die Änderung wird nicht durch die Slapd-Überblendungen reagiert und die Replizierung mit anderen Servern könnte betroffen sein.
";
$elem["slapd/ppolicy_schema_needs_update"]["descriptionfr"]="Mise à jour manuelle du schéma ppolicy recommandée
 La nouvelle version de la surcouche Password Policy (ppolicy – politique de mot de passe) nécessite que le schéma définisse le type d'attribut pwdMaxRecordedFailure qui n'est pas présent dans le schéma actuel. Il est recommandé d'abandonner la mise à niveau maintenant, et de mettre à jour le schéma ppolicy avant de mettre à niveau slapd. Si vous utilisez une réplication, la mise à jour du schéma doit être appliquée sur chaque serveur avant de poursuivre la mise à niveau.
 .
 Un fichier LDAP a été créé avec les modifications requises pour la mise à jour :
 .
 ${ldif}
 .
 aussi, si slapd utilise les règles de contrôle d'accès par défaut, ces modifications peuvent être appliquées (après le démarrage de slapd) avec la commande :
 .
 ldapmodify -H ldapi:/// -Y EXTERNAL -f ${ldif}
 .
 Si vous choisissez plutôt de poursuivre l'installation, le nouveau type d'attribut sera ajouté automatiquement, mais la modification ne sera pas appliquée par les surcouches de slapd, et la réplication sur d'autres serveurs peut être affectée.
";
$elem["slapd/ppolicy_schema_needs_update"]["default"]="abort installation";
PKG_OptionPageTail2($elem);
?>
