<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libvirt-daemon-system");

$elem["libvirt-daemon-system/id_warning"]["type"]="boolean";
$elem["libvirt-daemon-system/id_warning"]["description"]="Continue with incorrect libvirt-qemu user/group ID(s)?
  The user/group ID (uid/gid) allocated for libvirt-qemu (64055)
  seems to be taken by another user/group, thus it is not possible
  to create the user/group with this numeric ID.
 .
  The migration of guests with disk image files shared over NFS
  requires a static libvirt-qemu user and group ID (uid and gid)
  between the source and destination host systems.
 .
  If guest migration over NFS is not required, you can continue
  the installation.
 .
  In order to resolve this problem, do not continue the installation,
  release the 64055 uid/gid (which might involve permission changes),
  then install this package again.
";
$elem["libvirt-daemon-system/id_warning"]["descriptionde"]="Mit falscher libvirt-qemu Benutzer- bzw. Gruppen-Kennung (UID/GID) fortfahren?
  Die libvirt-qemu zugeordnete Benutzer-/Gruppen-Kennung (UID/GID) (64055)
  scheint von einem anderen Benutzer bzw. eine anderen Gruppe verwendet zu
  werden. Daher ist es nicht möglich, einen Benutzer bzw. eine Gruppe mit
  dieser Nummer zu erzeugen.
 .
  Um Gäste mit Image Dateien die via NFS verteilt werden zu migrieren wird
  eine identische libvirt-qemu Nutzer and Gruppen ID zwischen Quell- und
  Ziel Host System benötigt.
 .
  Wenn Gast Migration via NFS nicht benötigt wird
  können Sie mit der Installation fort fahren.
 .
  Um das Problem zu lösen, beenden Sie die Installation und geben die Benutzer-
  bzw. Gruppen-Kennung 64055 frei (was Änderungen von Zugriffsberechtigungen nach
  sich ziehen könnte). Versuchen Sie anschließend die Installation erneut.
";
$elem["libvirt-daemon-system/id_warning"]["descriptionfr"]="Faut-il continuer avec un identifiant d'utilisateur ou de groupe pour libvirt-qemu incorrect ?
 L'identifiant d'utilisateur ou de groupe (uid ou gid) attribué à libvirt-qemu (64055) semble être déjà utilisé par un autre utilisateur ou groupe, il n'est donc pas possible de créer l'utilisateur ou le groupe avec cet identifiant numérique.
 .
 La migration des systèmes invités avec des fichiers d'image disque partagés au travers de NFS requiert un identifiant d'utilisateur et de groupe statique (uid et gid) pour libvirt-qemu entre les systèmes hôtes source et destination.
 .
 Si la migration des systèmes invités au travers de NFS n'est pas nécessaire, vous pouvez continuer l'installation.
 .
 Pour résoudre ce problème, ne continuez pas l'installation, libérez l'uid et le gid 64055 (cela peut impliquer des modifications d'autorisation), puis installez à nouveau le paquet.
";
$elem["libvirt-daemon-system/id_warning"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
