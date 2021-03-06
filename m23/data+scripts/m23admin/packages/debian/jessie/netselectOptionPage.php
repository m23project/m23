<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("netselect");

$elem["netselect/install-setuid"]["type"]="boolean";
$elem["netselect/install-setuid"]["description"]="Should netselect be installed setuid root?
 Netselect can be installed with the set-user-id bit set, so that it will
 run with the permissions of the \"root\" user. Since netselect needs these
 permissions to work properly, unprivileged users cannot run it unless it is
 installed this way.
 .
 Enabling this feature may be a security risk. If in doubt, it is
 suggested to leave it disabled.
";
$elem["netselect/install-setuid"]["descriptionde"]="Soll Netselect setuid-root installiert werden?
 Netselect kann so installiert werden, dass das Benutzer-ID-Bit gesetzt ist. Dadurch wird es mit den Rechten des Benutzers »root« laufen. Da Netselect diese Rechte benötigt, um richtig zu funktionieren, können nicht-privilegierte Benutzer Netselect nicht ausführen, falls es nicht auf diese Art installiert ist.
 .
 Die Aktivierung dieser Fähigkeit kann ein Sicherheitsrisiko darstellen. Falls Sie sich unsicher sind, wird empfohlen, sie deaktiviert zu lassen.
";
$elem["netselect/install-setuid"]["descriptionfr"]="Faut-il exécuter netselect avec les privilèges du superutilisateur ?
 Netselect peut être installé avec le bit « setuid » positionné et ainsi s'exécuter avec les privilèges du superutilisateur. Étant donné que ces privilèges sont nécessaires au fonctionnement correct de netselect, les utilisateurs non privilégiés ne peuvent pas l'utiliser si le bit « setuid » n'est pas positionné.
 .
 Activer cette fonctionnalité peut constituer un risque de sécurité. En cas de doute, il est conseillé de la laisser désactivée.
";
$elem["netselect/install-setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
