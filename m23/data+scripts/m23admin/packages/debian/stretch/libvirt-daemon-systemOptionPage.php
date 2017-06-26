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
$elem["libvirt-daemon-system/id_warning"]["descriptionde"]="";
$elem["libvirt-daemon-system/id_warning"]["descriptionfr"]="";
$elem["libvirt-daemon-system/id_warning"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
