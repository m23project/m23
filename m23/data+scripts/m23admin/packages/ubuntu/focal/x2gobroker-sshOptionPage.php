<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("x2gobroker-ssh");

$elem["x2gobroker-ssh/last-group-x2gobroker-users"]["type"]="string";
$elem["x2gobroker-ssh/last-group-x2gobroker-users"]["description"]="for internal use

";
$elem["x2gobroker-ssh/last-group-x2gobroker-users"]["descriptionde"]="";
$elem["x2gobroker-ssh/last-group-x2gobroker-users"]["descriptionfr"]="";
$elem["x2gobroker-ssh/last-group-x2gobroker-users"]["default"]="Default:";
$elem["x2gobroker-ssh/create-group"]["type"]="boolean";
$elem["x2gobroker-ssh/create-group"]["description"]="Create group for X2Go Broker SSH access now?
 In X2Go Session Broker, SSH-based broker access is controlled via the
 broker users' membership in a dedicated group (default: x2gobroker-users).
 .
 If this group is not created now, you will be asked to assign this
 privilege to an existing group instead.
";
$elem["x2gobroker-ssh/create-group"]["descriptionde"]="Gruppe für X2Go Broker SSH jetzt erstellen?
 Für den X2Go Sitzungs-Broker wird der SSH-basierte Zugriff durch Gruppenmitgliedschaft aller Nutzer in einer dedizierten Gruppe gesteuert (Standard: x2gobroker-users).
 .
 Wenn diese Gruppe jetzt nicht erstellt wird, werden sie aufgefordert werden, einer existierenden Gruppe dieses Recht stattdessen zuzuweisen.
";
$elem["x2gobroker-ssh/create-group"]["descriptionfr"]="Faut-il créer maintenant un groupe pour l'accès SSH au courtier X2Go ?
 Avec le courtier de session X2Go, l'accès au courtier basé sur SSH est contrôlé grâce à l'appartenance des utilisateurs du courtier à un groupe dédié (par défaut : x2gobroker-users).
 .
 Si ce groupe n'est pas déjà créé, il vous sera demandé d'assigner à la place ces droits à un groupe déjà existant.
";
$elem["x2gobroker-ssh/create-group"]["default"]="true";
$elem["x2gobroker-ssh/use-existing-group"]["type"]="boolean";
$elem["x2gobroker-ssh/use-existing-group"]["description"]="Use an already existing group for X2Go Session Broker SSH access?
 If there already exists a group (e.g. in an LDAP database) that you
 would like to use for controlling X2Go Session Broker SSH access with,
 then you can specify this group name with the next step.
";
$elem["x2gobroker-ssh/use-existing-group"]["descriptionde"]="Eine bereits existierende Gruppe für den SSH-Zugriff auf den X2Go Sitzungs-Broker verwenden?
 Falls es bereits eine Gruppe gibt (z.Bsp. in einer LDAP-Datenbank), die sie für die Zugriffskontrolle auf den X2Go Sitzungs-Broker verwenden möchten, dann können Sie den Namen dieser Gruppe im nächsten Schritt angeben.
";
$elem["x2gobroker-ssh/use-existing-group"]["descriptionfr"]="Faut-il utiliser un groupe déjà existant pour l'accès SSH au courtier de session X2Go ?
 S'il existe déjà un groupe, (par exemple dans une base de données LDAP) que vous souhaiteriez utiliser pour contrôler l'accès SSH au courtier de session X2Go, vous pouvez spécifier ce nom de groupe dans l'étape suivante.
";
$elem["x2gobroker-ssh/use-existing-group"]["default"]="true";
$elem["x2gobroker-ssh/manual-setup-required"]["type"]="boolean";
$elem["x2gobroker-ssh/manual-setup-required"]["description"]="Set up X2Go Session Broker SSH access later?
 Without an existing group for X2Go Session Broker SSH access, the SSH
 broker will not be usable by users. You have to set up things later,
 either manually or via this configuration helper.
 .
 A manual setup is only recommended, if you really know what have
 to do for this.
 .
 Alternatively, the setup questions can be asked once more...
";
$elem["x2gobroker-ssh/manual-setup-required"]["descriptionde"]="Zugriff auf den X2Go Sitzungs-Broker später konfigurieren?
 Ohne Angabe einer existierenden Gruppe für den X2Go Sitzungs-Broker SSH-Zugriff, kann der X2Go Broker SSH von Benutzern nicht verwendet werden. Sie müssen den Zugriff später einrichten, entweder manuell oder über diesen Konfigurationsweg.
 .
 Eine manuelle Einrichtung wird nur empfohlen, wenn Sie wirklich wissen, was hierfür zu tun ist.
 .
 Alternativ können diese Einrichtungsfragen später wiederholt werden...
";
$elem["x2gobroker-ssh/manual-setup-required"]["descriptionfr"]="Voulez-vous configurer plus tard l'accès SSH au courtier de session X2Go ?
 S'il n'existe pas de groupe pour l'accès SSH au courtier de session X2Go, le courtier SSH ne sera pas accessible aux utilisateurs. Vous devrez configurer cela plus tard soit manuellement, soit avec cet assistant de configuration.
 .
 La configuration manuelle n'est recommandée que si vous savez vraiment ce qu'il faut faire pour la mener à bien.
 .
 Sinon, les questions de configuration peuvent être à nouveau posées...
";
$elem["x2gobroker-ssh/manual-setup-required"]["default"]="false";
$elem["x2gobroker-ssh/group-x2gobroker-users"]["type"]="string";
$elem["x2gobroker-ssh/group-x2gobroker-users"]["description"]="X2Go Session Broker SSH access group:
 Please specify the group name for users with full X2Go Session Broker
 access via SSH now.
";
$elem["x2gobroker-ssh/group-x2gobroker-users"]["descriptionde"]="Gruppe für X2Go Sitzungs-Broker SSH-Zugriff:
 Bitte geben Sie jetzt den Namen der Gruppe an, deren Mitglieder vollständigen X2Go Sitzungs-Broker Zugriff via SSH haben sollen.
";
$elem["x2gobroker-ssh/group-x2gobroker-users"]["descriptionfr"]="Groupe d'accès SSH au courtier de session X2Go :
 Veuillez spécifier maintenant le nom du groupe pour les utilisateurs dotés d'un droit d'accès au courtier de session X2Go à travers SSH.
";
$elem["x2gobroker-ssh/group-x2gobroker-users"]["default"]="x2gobroker-users";
$elem["x2gobroker-ssh/del-last-group-x2gobroker-users"]["type"]="boolean";
$elem["x2gobroker-ssh/del-last-group-x2gobroker-users"]["description"]="Delete the group that was formerly used for X2Go Session Broker SSH access?
 The group for X2Go Session Broker SSH access has been modified.
 .
 Please specify whether the old group should be deleted from your system.
 If unsure, keep the formerly used group and manually investigate later.
";
$elem["x2gobroker-ssh/del-last-group-x2gobroker-users"]["descriptionde"]="Die Gruppe löschen, die bislang benutzt wurde, um den X2Go Sitzungs-Broker Zugriff via SSH zu steuern?
 Die Gruppe für X2Go Sitzungs-Broker SSH-Zugriff wurde geändert.
 .
 Bitte geben Sie an, ob die alte Gruppe von Ihrem System gelöscht werden soll. Falls unsicher, behalten Sie die bisher verwendete Gruppe und überprüfen dies später von Hand.
";
$elem["x2gobroker-ssh/del-last-group-x2gobroker-users"]["descriptionfr"]="Faut-il supprimer le groupe précédemment utilisé pour l'accès SSH au courtier de session X2Go ?
 Le groupe d'accès SSH au courtier de session X2Go a été modifié.
 .
 Veuillez préciser si l'ancien groupe doit être supprimé sur la machine. Si vous n'êtes pas sûr, conservez le groupe anciennement utilisé et poursuivez votre recherche plus tard.
";
$elem["x2gobroker-ssh/del-last-group-x2gobroker-users"]["default"]="false";
$elem["x2gobroker-ssh/group-does-not-exist"]["type"]="note";
$elem["x2gobroker-ssh/group-does-not-exist"]["description"]="The specified group does not exist on the system
 Please enter a group name that is currently available on your system.
 .
 Please, try again!
";
$elem["x2gobroker-ssh/group-does-not-exist"]["descriptionde"]="Die angegeben Gruppe existiert nicht auf dem System
 Bitte geben Sie den Namen einer Gruppe an, die aktuell auf Ihrem System verfügbar ist.
 .
 Bitte noch einmal versuchen!
";
$elem["x2gobroker-ssh/group-does-not-exist"]["descriptionfr"]="Le groupe spécifié n'existe pas sur la machine.
 Veuillez entrer un nom de groupe existant réellement sur votre machine.
 .
 Veuillez essayer à nouveau !
";
$elem["x2gobroker-ssh/group-does-not-exist"]["default"]="";
PKG_OptionPageTail2($elem);
?>
