<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wicd-daemon");

$elem["wicd/users"]["type"]="multiselect";
$elem["wicd/users"]["description"]="Users to add to the netdev group:
 Users who should be able to run wicd clients need to be added to the
 group \"netdev\".
";
$elem["wicd/users"]["descriptionde"]="Benutzer, die zur Gruppe »netdev« hinzugefügt werden sollen:
 Benutzer, die die Clients von Wicd ausführen sollen, müssen zu der Gruppe »netdev« hinzugefügt werden.
";
$elem["wicd/users"]["descriptionfr"]="Utilisateurs à ajouter au groupe netdev :
 Les utilisateurs désirant utiliser wicd doivent être ajoutés au groupe « netdev ».
";
$elem["wicd/users"]["default"]="";
PKG_OptionPageTail2($elem);
?>
