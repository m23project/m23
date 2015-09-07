<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ntfs-3g");

$elem["ntfs-3g/setuid-root"]["type"]="boolean";
$elem["ntfs-3g/setuid-root"]["description"]="Should NTFS-3G be installed \"setuid root\"?
 NTFS-3G can be installed with the set-user-id bit set, so that it will run
 with superuser privileges. This allows unprivileged users to mount NTFS
 volumes.
 .
 Enabling this feature may be a security risk, so it is disabled by
 default. If in doubt, you should leave it disabled.
";
$elem["ntfs-3g/setuid-root"]["descriptionde"]="Möchten Sie NTFS-3G \"setuid root\" installieren?
 NTFS-3G kann so installiert werden, dass das \"set-user-id\"-Bit gesetzt ist und daher mit den Rechten des System Administrators läuft. Dies erlaubt regulären Benutzer NTFS Volumes automatisch einbinden zu können.
 .
 Das Einschalten dieses Funktionalität kann ein Sicherheitsrisiko sein. Daher ist es standardmäßig abgeschaltet. Falls Sie sich nicht sicher sind, sollten Sie es deshalb deaktiviert lassen.
";
$elem["ntfs-3g/setuid-root"]["descriptionfr"]="NTFS-3G doit-il être installé « setuid root » ?
 NTFS-3G peut être installé avec le bit « setuid », pour pouvoir être exécuté avec les privilèges du superutilisateur. Cela permet à un utilisateur non privilégié de pouvoir monter des volumes NTFS.
 .
 Activer cette fonctionnalité peut être un risque de sécurité, elle est donc désactivée par défaut. En cas de doute, il est recommandé de la laisser désactivée.
";
$elem["ntfs-3g/setuid-root"]["default"]="false";
$elem["ntfs-3g/initramfs"]["type"]="boolean";
$elem["ntfs-3g/initramfs"]["description"]="Should NTFS-3G be included in initramfs?
 NTFS-3G can be included in initramfs which allows to early mount NTFS
 volumes.
";
$elem["ntfs-3g/initramfs"]["descriptionde"]="Soll NTFS-3G in der initramfs enthalten sein?
 NTFS-3G kann in die initramfs aufgenommen werden. Dies ermöglicht einfrühes Einbinden von NTFS Volumes.
";
$elem["ntfs-3g/initramfs"]["descriptionfr"]="NTFS-3G doit-il être inclus dans l'initramfs ?
 NTFS-3G peut être inclus dans le système de fichier initial en mémoire (« initramfs ») ce qui permet un montage précoce des volumes NTFS.
";
$elem["ntfs-3g/initramfs"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
