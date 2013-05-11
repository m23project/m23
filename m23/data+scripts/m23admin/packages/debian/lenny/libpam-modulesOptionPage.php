<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-modules");

$elem["libpam-modules/disable-screensaver"]["type"]="error";
$elem["libpam-modules/disable-screensaver"]["description"]="xscreensaver and xlockmore must be restarted before upgrading
 One or more running instances of xscreensaver or xlockmore have been
 detected on this system.  Because of incompatible library changes, the
 upgrade of the libpam-modules package will leave you unable to
 authenticate to these programs.  You should arrange for these programs
 to be restarted or stopped before continuing this upgrade, to avoid
 locking your users out of their current sessions.
";
$elem["libpam-modules/disable-screensaver"]["descriptionde"]="Xscreensaver und xlockmore müssen vor dem Upgrade neu gestartet werden
 Eine oder mehrere laufende Instanzen von xscreensaver oder xlockmore sind auf diesem System entdeckt worden. Aufgrund inkompatibler Änderungen in Bibliotheken wird das Upgrade des libpam-modules-Paketes Sie außerstande setzen, sich gegenüber diesen Programmen zu authentifizieren. Sie sollten dafür sorgen, dass diese Programme neu gestartet oder beendet werden, bevor Sie dieses Upgrade fortsetzen, damit Ihre Benutzer nicht aus ihren laufenden Sitzungen ausgesperrt werden.
";
$elem["libpam-modules/disable-screensaver"]["descriptionfr"]="xscreensaver et xlockmore doivent être redémarrés avant la mise à niveau
 Une ou plusieurs instances de xscreensaver et/ou de xlockmore ont été détectées sur le système. À cause de la modification de certaines bibliothèques, la mise à niveau du paquet libpam-modules entrainera l'impossibilité de s'authentifier. Avant de poursuivre la mise à niveau, ces programmes doivent être redémarrés ou arrêtés pour éviter que des utilisateurs ne puissent plus accéder à leurs sessions.
";
$elem["libpam-modules/disable-screensaver"]["default"]="";
PKG_OptionPageTail2($elem);
?>
