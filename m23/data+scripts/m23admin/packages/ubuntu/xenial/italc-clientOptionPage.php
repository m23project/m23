<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("italc-client");

$elem["italc-client/last-group-teacher"]["type"]="string";
$elem["italc-client/last-group-teacher"]["description"]="for internal use

";
$elem["italc-client/last-group-teacher"]["descriptionde"]="";
$elem["italc-client/last-group-teacher"]["descriptionfr"]="";
$elem["italc-client/last-group-teacher"]["default"]="Default:";
$elem["italc-client/last-group-student"]["type"]="string";
$elem["italc-client/last-group-student"]["description"]="for internal use

";
$elem["italc-client/last-group-student"]["descriptionde"]="";
$elem["italc-client/last-group-student"]["descriptionfr"]="";
$elem["italc-client/last-group-student"]["default"]="Default:";
$elem["italc-client/last-group-supporter"]["type"]="string";
$elem["italc-client/last-group-supporter"]["description"]="for internal use

";
$elem["italc-client/last-group-supporter"]["descriptionde"]="";
$elem["italc-client/last-group-supporter"]["descriptionfr"]="";
$elem["italc-client/last-group-supporter"]["default"]="Default:";
$elem["italc-client/last-group-admin"]["type"]="string";
$elem["italc-client/last-group-admin"]["description"]="for internal use

";
$elem["italc-client/last-group-admin"]["descriptionde"]="";
$elem["italc-client/last-group-admin"]["descriptionfr"]="";
$elem["italc-client/last-group-admin"]["default"]="Default:";
$elem["italc-client/create-keypairs"]["type"]="boolean";
$elem["italc-client/create-keypairs"]["description"]="Automatically set up iTALC's role model and create key pairs?
 iTALC knows four different access roles for iTALC clients (teacher, student,
 supporter, and administrator).
 .
 iTALC manages this role-based client access via SSL keys.
 .
 Automatically generated SSL keys will be created in subfolders of
 /etc/italc/keys.
";
$elem["italc-client/create-keypairs"]["descriptionde"]="Das iTALC-Rollenmodell automatisch einrichten und iTALC-Schlüsselpaare erstellen?
 iTALC kennt vier verschiedene Zugriffsrollen für iTALC-Clients (Lehrer, Schüler, Helfer, Administrator).
 .
 iTALC verwaltet diesen rollenbasierten Client-Zugriff mittels SSL-Schlüssel.
 .
 Automatisch generierte SSL-Schlüssel werden in Unterordnern von /etc/italc/keys angelegt.
";
$elem["italc-client/create-keypairs"]["descriptionfr"]="Faut-il configurer automatiquement le modèle de rôle d'iTALC et créer des paires de clefs ? 
 iTALC utilise quatre rôles d'accès différents pour les clients iTALC (teacher, student, supporter et admin).
 .
 iTALC gère l'accès au rôle d'un client à l'aide de clefs SSL.
 .
 Les clefs SSL seront automatiquement créées dans des sous-répertoires de /etc/italc/keys.
";
$elem["italc-client/create-keypairs"]["default"]="false";
$elem["italc-client/create-groups-for-roles"]["type"]="boolean";
$elem["italc-client/create-groups-for-roles"]["description"]="Create groups for iTALC roles now?
 iTALC's role model requires four groups to exist: \"teacher\", \"student\",
 \"supporter\", and \"admin\".
 .
 If these four groups are not created now, you will be asked to assign
 existing groups in their place.
";
$elem["italc-client/create-groups-for-roles"]["descriptionde"]="Gruppen für iTALC-Rollen jetzt erstellen?
 Für das iTALC-Rollenmodell werden vier Gruppen benötigt: »Lehrer«, »Schüler«, »Helfer«, und »Administrator«.
 .
 Wenn diese vier Gruppen jetzt nicht erstellt werden, werden Sie dazu aufgefordert, anstelle dessen existierende Gruppen zuzuordnen.
";
$elem["italc-client/create-groups-for-roles"]["descriptionfr"]="Faut-il créer les groupes pour les rôles iTALC maintenant ?
 Le modèle de rôle d'iTALC nécessite l'existence de quatre groupes : « teacher » (enseignants), « student » (étudiants), « supporter » (assistance) et « admin » (administrateurs).
 .
 Si ces quatre groupes ne sont pas créés maintenant, il vous sera demandé d'assigner des groupes existants à leur place.
";
$elem["italc-client/create-groups-for-roles"]["default"]="true";
$elem["italc-client/use-existing-groups-for-roles"]["type"]="boolean";
$elem["italc-client/use-existing-groups-for-roles"]["description"]="Use already existing groups for iTALC roles?
 If groups reflecting the iTALC role model have already been set up
 (e.g. in the LDAP user/group database) then you can specify those group
 names on the next screens.
";
$elem["italc-client/use-existing-groups-for-roles"]["descriptionde"]="Bereits existierende Gruppen für das iTALC-Rollenmodell verwenden?
 Falls bereits Gruppen zur Abbildung des iTALC-Rollenmodells angelegt wurden (z.B. in der LDAP-Benutzerdatenbank), dann können diese Gruppennamen in den nächsten Eingabemasken zugeordnet werden.
";
$elem["italc-client/use-existing-groups-for-roles"]["descriptionfr"]="Faut-il utiliser les groupes existants pour les rôles d'iTALC ? 
 Si les groupes pour les rôles d'iTALC ont déjà été configurés (p. ex. dans une base de données LDAP), alors vous aurez la possibilité de les indiquer.
";
$elem["italc-client/use-existing-groups-for-roles"]["default"]="false";
$elem["italc-client/group-italc-teacher"]["type"]="string";
$elem["italc-client/group-italc-teacher"]["description"]="iTALC teachers role group:
 Please specify the group name for iTALC teachers.
 .
 The teacher role gives basic control over iTALC clients in classrooms.
 .
 If you leave this empty, the \"root\" group will be used.
";
$elem["italc-client/group-italc-teacher"]["descriptionde"]="Gruppe für iTALC-Lehrer:
 Bitte geben Sie den Gruppennamen für iTALC-Lehrer ein.
 .
 Die Lehrer-Rolle ermöglicht grundlegende Steuerung von iTALC-Clients in Klassenräumen.
 .
 Wird dieses Feld leer gelassen, dann wird die Gruppe »root« verwendet.
";
$elem["italc-client/group-italc-teacher"]["descriptionfr"]="Groupe pour le rôle « teacher » (enseignants) d'iTALC :
 Veuillez indiquer le nom du groupe pour les enseignants dans iTALC.
 .
 Ce rôle donne un contrôle basique sur les clients iTALC dans les salles de classe.
 .
 Le groupe « root » sera utilisé si vous laissez ce champ vide.
";
$elem["italc-client/group-italc-teacher"]["default"]="italc-teacher";
$elem["italc-client/del-last-group-teacher"]["type"]="boolean";
$elem["italc-client/del-last-group-teacher"]["description"]="Delete the group that was formerly used for this role?
 The group for the iTALC teacher role has been modified.
 .
 Please specify whether the old group should be deleted. If unsure,
 keep the formerly used group and manually investigate later.
";
$elem["italc-client/del-last-group-teacher"]["descriptionde"]="Soll die Gruppe, die bislang für diese Rolle verwendet wurde, gelöscht werden?
 Die Gruppe für die iTALC-Rolle Lehrer wurde geändert.
 .
 Bitte legen Sie fest, ob die alte Gruppe gelöscht werden soll. Falls Sie sichnicht sicher sind, behalten Sie die bislang verwendete Gruppe bei und prüfen dies später.
";
$elem["italc-client/del-last-group-teacher"]["descriptionfr"]="Faut-il supprimer le groupe qui était anciennement utilisé pour ce rôle ?
 Le groupe pour le rôle « teacher » (enseignants) iTALC a été modifié.
 .
 Veuillez indiquer si l'ancien groupe doit être supprimé. En cas de doute, vous pouvez garder le groupe initial et étudier le cas plus tard.
";
$elem["italc-client/del-last-group-teacher"]["default"]="false";
$elem["italc-client/group-italc-student"]["type"]="string";
$elem["italc-client/group-italc-student"]["description"]="iTALC students role group:
 Please specify the group name for iTALC students.
 .
 The iTALC client only starts for users who are members of this group.
 .
 If you leave this empty, the \"root\" group will be used.
";
$elem["italc-client/group-italc-student"]["descriptionde"]="Gruppe für iTALC-Schüler:
 Bitte geben Sie den Gruppennamen für iTALC-Schüler ein.
 .
 Der iTALC-Client startet nur für Benutzer, die Mitglied dieser Gruppe sind.
 .
 Wird dieses Feld leer gelassen, dann wird die Gruppe »root« verwendet.
";
$elem["italc-client/group-italc-student"]["descriptionfr"]="Groupe pour le rôle « student » (étudiants) d'iTALC :
 Veuillez indiquez le nom du groupe pour les étudiants dans iTALC.
 .
 Seuls les utilisateurs membres de ce groupe peuvent lancer iTALC.
 .
 Le groupe « root » sera utilisé si vous laissez ce champ vide.
";
$elem["italc-client/group-italc-student"]["default"]="italc-student";
$elem["italc-client/del-last-group-student"]["type"]="boolean";
$elem["italc-client/del-last-group-student"]["description"]="Delete the group that was formerly used for this role?
 The group for the iTALC student role has been modified.
 .
 Please specify whether the old group should be deleted. If unsure,
 keep the formerly used group and manually investigate later.
";
$elem["italc-client/del-last-group-student"]["descriptionde"]="Soll die Gruppe, die bislang für diese Rolle verwendet wurde, gelöscht werden?
 Die Gruppe für die iTALC-Rolle Schüler wurde geändert.
 .
 Bitte legen Sie fest, ob die alte Gruppe gelöscht werden soll. Falls Sie sichnicht sicher sind, behalten Sie die bislang verwendete Gruppe bei und prüfen dies später.
";
$elem["italc-client/del-last-group-student"]["descriptionfr"]="Faut-il supprimer le groupe qui était anciennement utilisé pour ce rôle ?
 Le groupe pour le rôle « student » d'iTALC a été modifié.
 .
 Veuillez indiquer si l'ancien groupe doit être supprimé. En cas de doute, vous pouvez garder le groupe initial et étudier le cas plus tard.
";
$elem["italc-client/del-last-group-student"]["default"]="false";
$elem["italc-client/group-italc-supporter"]["type"]="string";
$elem["italc-client/group-italc-supporter"]["description"]="iTALC supporters role group:
 Please specify the group name for iTALC supporters.
 .
 The supporter role gives extended control over the iTALC setup on this
 site and facilitates giving support to iTALC users.
 .
 If you leave this empty, the \"root\" group will be used.
";
$elem["italc-client/group-italc-supporter"]["descriptionde"]="Gruppe für iTALC-Helfer:
 Bitte geben Sie den Gruppennamen für iTALC-Helfer ein.
 .
 Die Helfer-Rolle erlaubt eine erweiterte Steuerung der iTALC-Installation an diesem Standort und ermöglicht es, iTALC-Benutzer zu unterstützen.
 .
 Wird dieses Feld leer gelassen, dann wird die Gruppe »root« verwendet.
";
$elem["italc-client/group-italc-supporter"]["descriptionfr"]="Groupe pour le rôle « supporter » (assistance) d'iTALC :
 Veuillez indiquer le nom du groupe pour l'assistance dans iTALC.
 .
 Ce rôle permet un contrôle étendu sur l'installation iTALC pour ce site et facilite l'assistance aux utilisateurs.
 .
 Le groupe « root » sera utilisé si vous laissez ce champ vide.
";
$elem["italc-client/group-italc-supporter"]["default"]="italc-supporter";
$elem["italc-client/del-last-group-supporter"]["type"]="boolean";
$elem["italc-client/del-last-group-supporter"]["description"]="Delete the group that was formerly used for this role?
 The group for the iTALC supporter role has been modified.
 .
 Please specify whether the old group should be deleted. If unsure,
 keep the formerly used group and manually investigate later.
";
$elem["italc-client/del-last-group-supporter"]["descriptionde"]="Soll die Gruppe, die bislang für diese Rolle verwendet wurde, gelöscht werden?
 Die Gruppe für die iTALC-Rolle Helfer wurde geändert.
 .
 Bitte legen Sie fest, ob die alte Gruppe gelöscht werden soll. Falls Sie sichnicht sicher sind, behalten Sie die bislang verwendete Gruppe bei und prüfen dies später.
";
$elem["italc-client/del-last-group-supporter"]["descriptionfr"]="Faut-il supprimer le groupe qui était anciennement utilisé pour ce rôle ?
 Le groupe pour le rôle « supporter » d'iTALC a été modifié.
 .
 Veuillez indiquer si l'ancien groupe doit être supprimé. En cas de doute, vous pouvez garder le groupe initial et étudier le cas plus tard.
";
$elem["italc-client/del-last-group-supporter"]["default"]="false";
$elem["italc-client/group-italc-admin"]["type"]="string";
$elem["italc-client/group-italc-admin"]["description"]="iTALC administrators role group:
 Please specify the group name for iTALC administrators.
 .
 The administrator role grants full access to the iTALC instance on
 this site.
 .
 If you leave this empty, the \"root\" group will be used.
";
$elem["italc-client/group-italc-admin"]["descriptionde"]="Gruppe für iTALC-Administratoren:
 Bitte geben Sie den Gruppennamen für iTALC-Administratoren ein.
 .
 Die Administratorrolle gewährt Vollzugriff auf die iTALC-Instanz an diesem Standort.
 .
 Wird dieses Feld leer gelassen, dann wird die Gruppe »root« verwendet.
";
$elem["italc-client/group-italc-admin"]["descriptionfr"]="Groupe pour le rôle « admin » (administrateurs) d'iTALC :
 Veuillez indiquer le nom du groupe pour les administrateurs d'iTALC.
 .
 Le rôle d'administrateur accorde un accès total à l'instance d'iTALC pour ce site.
 .
 Le groupe « root » sera utilisé si vous laissez ce champ vide.
";
$elem["italc-client/group-italc-admin"]["default"]="italc-admin";
$elem["italc-client/del-last-group-admin"]["type"]="boolean";
$elem["italc-client/del-last-group-admin"]["description"]="Delete the group that was formerly used for this role?
 The group for the iTALC administrator role has been modified.
 .
 Please specify whether the old group should be deleted. If unsure,
 keep the formerly used group and manually investigate later.
";
$elem["italc-client/del-last-group-admin"]["descriptionde"]="Soll die Gruppe, die bislang für diese Rolle verwendet wurde, gelöscht werden?
 Die Gruppe für die iTALC-Rolle Administrator wurde geändert.
 .
 Bitte legen Sie fest, ob die alte Gruppe gelöscht werden soll. Falls Sie sichnicht sicher sind, behalten Sie die bislang verwendete Gruppe bei und prüfen dies später.
";
$elem["italc-client/del-last-group-admin"]["descriptionfr"]="Faut-il supprimer le groupe qui était anciennement utilisé pour ce rôle ?
 Le groupe pour le rôle « admin » d'iTALC a été modifié.
 .
 Veuillez indiquer si l'ancien groupe doit être supprimé. En cas de doute, vous pouvez garder le groupe initial et étudier le cas plus tard.
";
$elem["italc-client/del-last-group-admin"]["default"]="false";
$elem["italc-client/no-such-group"]["type"]="error";
$elem["italc-client/no-such-group"]["description"]="Non-existing group
 The given group does not exist on this system. You should specify an
 already existing group.
";
$elem["italc-client/no-such-group"]["descriptionde"]="Die Gruppe existiert nicht
 Die angegebene Gruppe existiert nicht auf diesem System. Sie müssen eine bereits existierende Gruppe eingeben.
";
$elem["italc-client/no-such-group"]["descriptionfr"]="Groupe inexistant
 Ce groupe n'existe pas sur ce système. Vous devez indiquer un groupe existant.
";
$elem["italc-client/no-such-group"]["default"]="";
$elem["italc-client/key-access-for-groups"]["type"]="boolean";
$elem["italc-client/key-access-for-groups"]["description"]="Make iTALC's SSL keys accessible to the role model groups?
 To make the iTALC role model fully functional, the appropriate groups
 now need to be granted access to the created SSL keys.
 .
 If you skip this step, iTALC SSL keys will only be accessible to the
 super-user \"root\" and you will have to manually set up file permissions
 on the keys later.
";
$elem["italc-client/key-access-for-groups"]["descriptionde"]="Soll den Rollenmodellgruppen Zugriff auf iTALCs SSL-Schlüssel gewährt werden?
 Damit das iTALC-Rollenmodell vollständig funktioniert, muss jetzt noch den zugewiesenen Gruppen Zugriff auf die erstellten SSL-Schlüssel gewährt werden.
 .
 Wenn Sie diesen Schritt überspringen, werden die iTALC-SSL-Schlüssel nur für den Superuser »root« zugänglich sein und Sie müssen die Dateirechte der Schlüssel später manuell setzen.
";
$elem["italc-client/key-access-for-groups"]["descriptionfr"]="Faut-il rendre les clefs SSL d'iTALC accessibles aux groupes de ce rôle ?
 Afin de rendre le modèle de rôle d'iTALC complètement fonctionnel, les groupes appropriés ont besoin d'obtenir l'accès aux clefs SSL créées.
 .
 Si vous sautez cette étape, les clefs SSL d'iTALC ne seront accessibles qu'au superutilisateur « root » et vous devrez configurer plus tard vous-même les permissions sur les fichiers de clefs.
";
$elem["italc-client/key-access-for-groups"]["default"]="true";
$elem["italc-client/autostart-on-login"]["type"]="boolean";
$elem["italc-client/autostart-on-login"]["description"]="Start the iTALC client on desktop session startup?
 For the desktop session to be controlled via iTALC, the iTALC client
 applet needs to be running, listening on a TCP/IP socket for authorized
 VNC-like connections from the iTALC master application.
 .
 It can be configured to start automatically on desktop session startup,
 but for security reasons this is not the default.
 .
 Remember that the iTALC client will only launch for users that are
 members of the iTALC student group.
";
$elem["italc-client/autostart-on-login"]["descriptionde"]="Den iTALC-Client bei Sitzungsanmeldung starten?
 Damit eine Desktop-Sitzung durch iTALC gesteuert werden kann, muss das iTALC-Client-Applet gestartet sein. Das Applet öffnet ein TCP/IP-Server-Socket um autorisierte, VNC-ähnliche Verbindungsanfragen von der iTALC-Master-Anwendung entgegenzunehmen.
 .
 Hier kann das automatische Starten des iTALC-Clients bei Desktop-Sitzungsanmeldung konfiguriert werden. Aus Sicherheitsgründen ist dies aber nicht die Standardvorgabe.
 .
 Nochmal als Erinnerung: Der iTALC-Client startet nur für Benutzer, die Mitglied der iTALC-Schüler-Gruppe sind.
";
$elem["italc-client/autostart-on-login"]["descriptionfr"]="Faut-il démarrer le client iTALC au démarrage d'une session de bureau ?
 Pour qu'une session de bureau puisse être contrôlée à l'aide iTALC, il faut que l'applet client d'iTALC soit déjà lancé et qu'il écoute sur une socket TCP/IP pour des connexions de type VNC autorisées par l'application maître d'iTALC.
 .
 Il peut être configuré pour démarrer automatiquement au démarrage de la session de bureau, mais ne l'est pas par défaut pour des raisons de sécurité.
 .
 Souvenez-vous que le client iTALC ne peut être démarré que pour des utilisateurs membres du groupe iTALC d'étudiants.
";
$elem["italc-client/autostart-on-login"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
