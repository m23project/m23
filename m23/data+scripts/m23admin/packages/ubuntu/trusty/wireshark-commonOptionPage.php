<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("wireshark-common");

$elem["wireshark-common/install-setuid"]["type"]="boolean";
$elem["wireshark-common/install-setuid"]["description"]="Should non-superusers be able to capture packets?
 Dumpcap can be installed in a way that allows members of the \"wireshark\"
 system group to capture packets. This is recommended over the
 alternative of running Wireshark/Tshark directly as root, because
 less of the code will run with elevated privileges.
 .
 For more detailed information please see
 /usr/share/doc/wireshark-common/README.Debian.
 .
 Enabling this feature may be a security risk, so it is disabled by
 default. If in doubt, it is suggested to leave it disabled.
";
$elem["wireshark-common/install-setuid"]["descriptionde"]="Sollen außer dem Superuser noch andere Benutzer Pakete aufzeichen können?
 Dumpcap kann so installiert werden, dass Mitglieder der Systemgruppe »wireshark« Pakete aufzeichnen können. Dies wird gegenüber der Methode, Wireshark/Tshark direkt als Root zu betreiben, empfohlen, da so weniger Code mit erhöhten Rechten läuft.
 .
 Detalliertere Informationen finden Sie in /usr/share/doc/wireshark-common/README.Debian.
 .
 Die Aktivierung dieser Funktionalität kann ein Sicherheitsrisiko darstellen, daher ist sie standardmäßig deaktiviert. Im Zweifelsfall wird empfohlen, sie deaktiviert zu lassen.
";
$elem["wireshark-common/install-setuid"]["descriptionfr"]="Autoriser les utilisateurs non privilégiés à capturer des paquets ?
 Dumpcap peut être installé afin d'autoriser les membres du groupe « wireshark » à capturer des paquets. Cette méthode de capture est préférable à l'exécution de Wireshark ou Tshark avec les droits du superutilisateur, car elle permet d'exécuter moins de code avec des droits importants.
 .
 Pour plus d'informations, veuillez consulter /usr/share/doc/wireshark-common/README.Debian.
 .
 Cette fonctionnalité constitue un risque pour la sécurité, c'est pourquoi elle est désactivée par défaut. En cas de doute, il est suggéré de la laisser désactivée.
";
$elem["wireshark-common/install-setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
