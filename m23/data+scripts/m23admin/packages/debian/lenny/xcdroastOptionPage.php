<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xcdroast");

$elem["xcdroast/can_use_normal_user"]["type"]="boolean";
$elem["xcdroast/can_use_normal_user"]["description"]="Do you want to use xcdroast as a normal user?
 If you want to use xcdroast as a normal user, some programs must be
 setgid/setuid like this:
 .
  - cdrecord cdda2wav readcd
     chown root:cdrom and  chmod 4710
  - xcdrwrap
     chown root:cdrom and chmod 2755
 .
 If you wish, these changes will be done in the postinst of xcdroast. Do
 you want to use xcdroast as a normal user?
";
$elem["xcdroast/can_use_normal_user"]["descriptionde"]="Wollen Sie xcdroast als normaler Benutzer verwenden?
 Wenn Sie xcdroast als normaler Benutzer verwenden wollen, dann muss das setgid/setuid-Bit für manche Programme gesetzt werden:
 .
  - cdrecord cdda2wav readcd
     chown root:cdrom und chmod 4710
  - xcdrwrap
     chown root:cdrom und chmod 2755
 .
 Wenn Sie möchten, dann können diese Änderungen nach der Installation von xcdroast durchgeführt werden. Wollen Sie xcdroast als normaler Benutzer verwenden?
";
$elem["xcdroast/can_use_normal_user"]["descriptionfr"]="Faut-il permettre aux utilisateurs non privilégiés d'utiliser xcdroast ?
 Si vous voulez que les utilisateurs non privilégiés puissent utiliser xcdroast, certains programmes devront être setgid/setuid de la manière suivante :
 .
  - cdrecord cdda2wav readcd
     chown root:cdrom et chmod 4710
  - xcdrwrap
     chown root:cdrom et chmod 2755
 .
 Si vous le désirez, ces modifications pourront être réalisées via le script « postinst » de xcdroast. Veuillez indiquer si vous les acceptez.
";
$elem["xcdroast/can_use_normal_user"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
