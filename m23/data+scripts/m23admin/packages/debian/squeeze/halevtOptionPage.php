<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("halevt");

$elem["halevt/users"]["type"]="multiselect";
$elem["halevt/users"]["description"]="Users to add to the plugdev group:
 The plugdev security group controls which users are permitted to read and
 write to devices mounted by halevt.
 .
 Users can be added to this group at any time. This initial list of
 users will be added now.
";
$elem["halevt/users"]["descriptionde"]="Benutzer, die zur Gruppe plugdev hinzugefügt werden sollen:
 Über die plugdev-Gruppe wird kontrolliert, welchen Benutzern es erlaubt ist, auf Geräten, die von Halevt eingebunden wurden, zu lesen oder zu schreiben.
 .
 Benutzer können jederzeit zu dieser Gruppe hinzugefügt werden. Die folgende anfängliche Liste von Benutzern wird jetzt hinzugefügt.
";
$elem["halevt/users"]["descriptionfr"]="Utilisateurs à ajouter au groupe plugdev :
 Le groupe de sécurité plugdev sert à définir les utilisateurs autorisés à lire et écrire sur les lecteurs montés par halevt.
 .
 Il est possible d'ajouter des utilisateurs à ce groupe à tout moment. La liste choisie ici sera la liste initiale de ces utilisateurs.
";
$elem["halevt/users"]["default"]="";
PKG_OptionPageTail2($elem);
?>
