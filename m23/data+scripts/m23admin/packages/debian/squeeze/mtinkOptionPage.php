<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mtink");

$elem["mtink/permissions"]["type"]="note";
$elem["mtink/permissions"]["description"]="Permissions for mtink
 Warning! Mtink requires special permissions for the device file
 associated with the printer. You should check your permission to see if
 users that could run mtink should also access this file. If you have got
 a normal Debian installation, this group should be lp.
";
$elem["mtink/permissions"]["descriptionde"]="Rechte für mtink
 Warnung! Mtink benötigt bestimmte Rechte auf die dem Drucker zugeordnete Gerätedatei. Diese Rechte Sollten Sie überprüfen. Anwendern, die das Recht haben, mtink zu benutzen, müssen auch Zugriffsrechte auf diese Dateien haben. Wenn Sie eine Debian-Standardinstallation vorgenommen haben, sollte die entsprechende Gruppe lp heißen.
";
$elem["mtink/permissions"]["descriptionfr"]="Permissions pour mtink
 Attention ! Mtink a besoin de certaines permissions pour accéder aux périphériques associé à l'imprimante. Vous devriez vérifier les permissions pour vous assurer que les utilisateurs qui pourraient lancer mtink, devrez aussi avoir accés à ce périphérique. Si vous avez installé une Debian de facon standard, ce groupe devrait être lp.
";
$elem["mtink/permissions"]["default"]="";
PKG_OptionPageTail2($elem);
?>
