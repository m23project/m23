<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("adduser");

$elem["adduser/homedir-permission"]["type"]="boolean";
$elem["adduser/homedir-permission"]["description"]="Do you want system-wide readable home directories?
 By default, users' home directories are readable by all users on the
 system. If you want to increase security and privacy, you might want
 home directories to be readable only for their owners. But if in doubt,
 leave this option enabled.
 .
 This will only affect home directories of users added from now
 on with the adduser command.
";
$elem["adduser/homedir-permission"]["descriptionde"]="Wünschen Sie systemweit lesbare Home-Verzeichnisse?
 Standardmäßig können die Home-Verzeichnisse von allen Benutzern eines Systems eingesehen werden. Falls Sie die Sicherheit/Privatsphäre Ihres Systems erhöhen wollen, sollten Sie einstellen, dass die Home-Verzeichnisse nur vom jeweiligen Besitzer eingesehen werden können. Falls Sie sich nicht sicher sind, lassen Sie diese Option aktiviert.
 .
 Dies wird lediglich die Home-Verzeichnisse von Benutzern betreffen, die ab jetzt mit dem Programm »adduser« hinzugefügt werden.
";
$elem["adduser/homedir-permission"]["descriptionfr"]="Voulez-vous des répertoires personnels lisibles par tous ?
 Les répertoires personnels sont par défaut lisibles par tous les utilisateurs du système. Si vous voulez améliorer la sécurité et la confidentialité, vous pouvez décider que les répertoires personnels ne seront lisibles que par leur propriétaire. Dans le doute, cependant, vous devriez laisser cette option active.
 .
 Cela ne concernera que les répertoires personnels des utilisateurs qui seront ajoutés dans le futur, avec la commande « adduser ».
";
$elem["adduser/homedir-permission"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
