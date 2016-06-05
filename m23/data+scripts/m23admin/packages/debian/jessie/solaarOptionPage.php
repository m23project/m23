<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("solaar");

$elem["solaar/use_plugdev_group"]["type"]="boolean";
$elem["solaar/use_plugdev_group"]["description"]="Use plugdev group?
 Please specify how non-root users should be given access to the Logitech
 receiver devices.
 .
 If systemd or consolekit are in use, they can apply ACLs to make them
 accessible via Solaar for the user logged in on the current seat. Right
 now, ${SEAT_DAEMON_STATUS} daemon is running.
 .
 If neither of these daemons is in use, or if the receiver should also be
 accessible for remotely logged in users, it is possible to grant access
 for members of the \"plugdev\" system group.
 .
 If you do use the \"plugdev\" group, don't forget to make sure all the
 appropriate users are members of that group. You can add new members to
 the group by running, as root:
     adduser <username> plugdev
 For the group membership to take effect, the affected users need to log
 out and back in again.
";
$elem["solaar/use_plugdev_group"]["descriptionde"]="Soll die Gruppe »plugdev« benutzt werden?
 Bitte geben Sie an, wie Nicht-Root-Benutzern Zugriff auf die Logitech-Empfangsgeräte gewährt werden soll.
 .
 Falls Systemd oder Consolekit benutzt werden, können sie ACLs anwenden, um dem Benutzer, der über den aktuellen Platz angemeldet ist, über Solaar Zugriff darauf zu geben. Im Moment läuft der Daemon ${SEAT_DAEMON_STATUS}.
 .
 Falls keiner dieser Daemons benutzt wird oder auch aus der Ferne angemeldete Anwender Zugriff auf den Empfänger haben sollen, ist es möglich, Mitgliedern der Systemgruppe »plugdev« Zugriff zu gewähren.
 .
 Vergessen Sie nicht, falls Sie die Gruppe »plugdev« verwenden, dass sie sicherstellen müssen, dass alle dazugehörigen Anwender dieser Gruppe angehören müssen. Sie können der Gruppe als Root neue Mitglieder hinzufügen, indem Sie Folgendes ausführen:
     adduser <Benutzername> plugdev
 Damit die Gruppenmitgliedschaft wirksam wird, müssen sich die betroffenen Benutzer ab- und wieder anmelden.
";
$elem["solaar/use_plugdev_group"]["descriptionfr"]="Voulez-vous utiliser le groupe plugdev ?
 Veuillez indiquer comment les utilisateurs non privilégiés auront accès au récepteur Logitech.
 .
 Si vous utilisez systemd ou consolekit, des listes de contrôle d'accès (« ACL ») permettent à l'utilisateur connecté localement d'y accéder avec Solaar. Actuellement, le démon ${SEAT_DAEMON_STATUS} est en fonctionnement.
 .
 Si vous n'utilisez aucun de ces démons ou si des utilisateurs distants doivent aussi accéder au récepteur, il est possible de donner accès aux membres du groupe « plugdev ».
 .
 Si vous utilisez le groupe « plugdev », n'oubliez pas de vérifier que tous les utilisateurs concernés appartiennent à ce groupe. De nouveaux membres peuvent être ajoutés au groupe en exécutant, en tant que superutilisateur, la commande :
     adduser <username> plugdev
 Pour que la prise en compte de l'appartenance au groupe soit effective, les utilisateurs concernés doivent se déconnecter puis se reconnecter.
";
$elem["solaar/use_plugdev_group"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
