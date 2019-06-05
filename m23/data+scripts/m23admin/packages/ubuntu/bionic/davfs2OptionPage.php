<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("davfs2");

$elem["davfs2/suid_file"]["type"]="boolean";
$elem["davfs2/suid_file"]["description"]="Should unprivileged users be allowed to mount WebDAV resources?
 The file /sbin/mount.davfs must have the SUID bit set if you want to allow
 unprivileged (non-root) users to mount WebDAV resources.
 .
 If you do not choose this option, only root will be allowed to mount WebDAV
 resources. This can later be changed by running 'dpkg-reconfigure davfs2'.
";
$elem["davfs2/suid_file"]["descriptionde"]="Soll unprivilegierten Benutzern erlaubt werden, WebDAV-Ressourcen einzubinden?
 Die Datei /sbin/mount.davfs muss das SUID-Bit gesetzt haben, falls Sie unprivilegierten (nicht root) Benutzern erlauben möchten, WebDAV-Ressourcen einzubinden.
 .
 Falls Sie diese Option nicht wählen, wird es nur root erlaubt sein, WebDAV-Ressourcen einzubinden. Dies kann zu einem späteren Zeitpunkt durch Aufruf von »dpkg-reconfigure davfs2« geändert werden.
";
$elem["davfs2/suid_file"]["descriptionfr"]="Autoriser les utilisateurs non privilégiés à monter des ressources WebDAV ?
 Le fichier /sbin/mount.davfs doit avoir le bit SUID positionné pour permettre aux utilisateurs non privilégiés de monter des ressources WebDAV.
 .
 Si vous ne choisissez pas cette option, seul le superutilisateur pourra monter des ressources WebDAV. Il sera toujours possible de modifier ce choix plus tard avec la commande « dpkg-reconfigure davfs2 ».
";
$elem["davfs2/suid_file"]["default"]="false";
$elem["davfs2/user_name"]["type"]="string";
$elem["davfs2/user_name"]["description"]="User running the mount.davfs daemon:
 Once the davfs resource has been mounted, the daemon will drop the
 root privileges and will run with an unprivileged user ID.
 .
 Please choose which login name should be used by the daemon.
";
$elem["davfs2/user_name"]["descriptionde"]="Benutzer, der den mount.davfs-Daemon ausführt:
 Sobald die davfs-Ressource eingebunden wurde, wird der Daemon die root-Privilegien abgeben und mit einer unprivilegierten Benutzerkennung laufen.
 .
 Bitte wählen Sie, welcher Benutzername vom Daemon verwendet werden soll.
";
$elem["davfs2/user_name"]["descriptionfr"]="Identifiant qui exécutera le démon mount.davfs :
 Lorsque la ressource WebDAV aura été montée, le démon abandonnera les privilèges du superutilisateur et utilisera les privilèges d'un utilisateur ordinaire.
 .
 Veuillez choisir l'identifiant à utiliser pour cela.
";
$elem["davfs2/user_name"]["default"]="davfs2";
$elem["davfs2/group_name"]["type"]="string";
$elem["davfs2/group_name"]["description"]="Group for users who will be allowed to mount WebDAV resources:
 Mounting WebDAV resources creates a file in
 /var/run/mount.davfs. This directory will be owned by the group
 specified here.
";
$elem["davfs2/group_name"]["descriptionde"]="Gruppe für Benutzer, die WebDAV-Ressourcen einbinden können werden:
 Das Einbinden von WebDAV-Ressourcen erzeugt eine Datei in /var/run/mount.davfs. Dieses Verzeichnis wird der Gruppe, die hier angegeben wurde, gehören.
";
$elem["davfs2/group_name"]["descriptionfr"]="Groupe d'utilisateurs autorisés à monter des ressources WebDAV :
 Le montage d'une ressource WebDAV créera un fichier dans le répertoire /var/run/mount.davfs dont le propriétaire sera le groupe indiqué ici.
";
$elem["davfs2/group_name"]["default"]="davfs2";
$elem["davfs2/new_user"]["type"]="boolean";
$elem["davfs2/new_user"]["description"]="Do you want to create a new user?
 The \"${user_name}\" user does not exist on the system and will be
 created if you choose this option.
";
$elem["davfs2/new_user"]["descriptionde"]="Möchten Sie einen neuen Benutzer anlegen?
 Der Benutzer »${user_name}« existiert auf diesem System nicht und wird angelegt, falls Sie diese Option wählen.
";
$elem["davfs2/new_user"]["descriptionfr"]="Faut-il créer un nouvel identifiant ?
 L'identifiant « ${user_name} » n'existe pas sur le système. Si vous choisissez cette option, il sera créé.
";
$elem["davfs2/new_user"]["default"]="true";
$elem["davfs2/new_group"]["type"]="boolean";
$elem["davfs2/new_group"]["description"]="Do you want to create a new group?
 The \"${group_name}\" group does not exist on the system and will be
 created if you choose this option.
";
$elem["davfs2/new_group"]["descriptionde"]="Möchten Sie eine neue Gruppe anlegen?
 Die Gruppe »${group_name}« existiert auf diesem System nicht und wird angelegt, falls Sie diese Option wählen.
";
$elem["davfs2/new_group"]["descriptionfr"]="Faut-il créer un nouveau groupe ?
 Le groupe « ${group_name} » n'existe pas sur le système. Si vous choisissez cette option, il sera créé.
";
$elem["davfs2/new_group"]["default"]="true";
$elem["davfs2/non_root_users_confimed"]["type"]="note";
$elem["davfs2/non_root_users_confimed"]["description"]="Unprivileged users allowed to mount WebDAV resources
 The \"${group_name}\" group and the \"${user_name}\" user will be used by
 davfs2. All users who should be granted the right to mount WebDAV
 resources should be added to the group \"${group_name}\" using the
 following command:
 .
 adduser <username> ${group_name}
 .
 The following should also be added to /etc/fstab:
 .
 https://webdav.example.org/path  /mnt  davfs  rw,user,noauto  0  0
 .
 Additional options are available. Please read the mount.davfs man page
 for more information.
";
$elem["davfs2/non_root_users_confimed"]["descriptionde"]="Unprivilegierte Benutzer, denen erlaubt ist, WebDAV-Ressourcen einzubinden
 Die Gruppe ${group_name} und der Benutzer ${user_name} werden von davfs2 verwendet. Alle Benutzer, denen das Recht, WebDAV-Ressourcen einzubinden, gewährt werden soll, sollten zu der Gruppe ${group_name} mittels des folgenden Befehls hinzugefügt werden:
 .
 adduser <username> ${group_name}
 .
 Das folgende sollte auch zu /etc/fstab hinzugefügt werden:
 .
 https://webdav.example.org/path  /mnt  davfs  rw,user,noauto  0  0
 .
 Zusätzliche Optionen sind verfügbar. Bitte lesen Sie die Handbuchseite von mount.devfs für mehr Informationen.
";
$elem["davfs2/non_root_users_confimed"]["descriptionfr"]="Ressources WebDAV montables par des utilisateurs non privilégiés
 Le groupe « ${group_name} » et l'utilisateur « ${user_name} » seront utilisés par davfs2. Tous les utilisateurs que vous voulez autoriser à monter des ressources WebDAV doivent être ajoutés au groupe « ${group_name} » avec la commande :
 .
 adduser <username> ${group_name}
 .
 La ligne suivante doit être ajoutée au fichier /etc/fstab :
 .
 https://webdav.example.org/path  /mnt  davfs  rw,user,noauto  0  0
 .
 Des options supplémentaires peuvent être utilisées le cas échéant. Veuillez consulter la page de manuel de mount.davfs pour plus d'informations.
";
$elem["davfs2/non_root_users_confimed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
