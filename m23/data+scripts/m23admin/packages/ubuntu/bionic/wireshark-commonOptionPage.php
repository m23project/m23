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
$elem["wireshark-common/install-setuid"]["descriptionde"]="Sollen außer dem Superuser noch andere Benutzer Pakete mitschreiben können?
 Dumpcap kann so installiert werden, dass Mitglieder der Systemgruppe »wireshark« Pakete mitschreiben können. Dies wird gegenüber der Methode, Wireshark/Tshark direkt als Root zu betreiben, empfohlen, da so weniger Code mit erhöhten Rechten läuft.
 .
 Detailliertere Informationen finden Sie in /usr/share/doc/wireshark-common/README.Debian.
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
$elem["wireshark-common/addgroup-failed"]["type"]="error";
$elem["wireshark-common/addgroup-failed"]["description"]="Creating the wireshark system group failed
 The wireshark group does not exist, and creating it failed, so
 Wireshark cannot be configured to capture traffic as an unprivileged
 user.
 .
 Please create the wireshark system group and try configuring
 wireshark-common again.
";
$elem["wireshark-common/addgroup-failed"]["descriptionde"]="Erstellen der Systemgruppe wireshark fehlgeschlagen
 Die Gruppe wireshark existiert nicht und das Erstellen schlug fehl. Daher kann Wireshark nicht konfiguriert werden, um Datenverkehr als unprivilegierter Benutzer mitzuschreiben.
 .
 Bitte erstellen Sie die Systemgruppe wireshark und versuchen Sie dann erneut, wireshark-common zu konfigurieren.
";
$elem["wireshark-common/addgroup-failed"]["descriptionfr"]="";
$elem["wireshark-common/addgroup-failed"]["default"]="";
$elem["wireshark-common/group-is-user-group"]["type"]="error";
$elem["wireshark-common/group-is-user-group"]["description"]="The wireshark group is a system group
 The wireshark group exists as a user group, but the preferred
 configuration is for it to be created as a system group.
 .
 As a result, purging wireshark-common will not remove the wireshark
 group, but everything else should work properly.
";
$elem["wireshark-common/group-is-user-group"]["descriptionde"]="Die Gruppe wireshark ist eine Systemgruppe
 Die Gruppe wireshark existiert als Benutzergruppe, aber die bevorzugte Konfiguration besteht darin, dass sie als Systemgruppe erstellt wird.
 .
 Daher wird das endgültige Löschen von wireshark-common die Gruppe wireshark nicht entfernen, aber alles andere sollte korrekt funktionieren.
";
$elem["wireshark-common/group-is-user-group"]["descriptionfr"]="";
$elem["wireshark-common/group-is-user-group"]["default"]="";
$elem["wireshark-common/setcap-failed"]["type"]="error";
$elem["wireshark-common/setcap-failed"]["description"]="Setting capabilities for dumpcap failed
 The attempt to use Linux capabilities to grant packet-capturing
 privileges to the dumpcap binary failed. Instead, it has had the
 set-user-id bit set.
";
$elem["wireshark-common/setcap-failed"]["descriptionde"]="Setzen der Capabilities für Dumpcap fehlgeschlagen
 Der Versuch, Linux-Capabilities zu verwenden, um dem Programm Dumpcap Paketaufzeichnungsprivilegien zu erteilen, ist fehlgeschlagen. Stattdessen wurde das Bit set-user-id gesetzt.
";
$elem["wireshark-common/setcap-failed"]["descriptionfr"]="";
$elem["wireshark-common/setcap-failed"]["default"]="";
$elem["wireshark-common/group-removal-failed"]["type"]="error";
$elem["wireshark-common/group-removal-failed"]["description"]="Removal of the wireshark group failed
 When the wireshark-common package is configured to allow
 non-superusers to capture packets the postinst script of
 wireshark-common creates the wireshark group as a system group.
 .
 However, on this system the wireshark group is a user group instead of
 being a system group, so purging wireshark-common did not remove it.
 .
 If the group is no longer needed, please remove it manually.
";
$elem["wireshark-common/group-removal-failed"]["descriptionde"]="Entfernen der Gruppe wireshark fehlgeschlagen
 Wird das Paket wireshark-common konfiguriert, um nicht-Root-Benutzern zu erlauben, Pakete mitzuschreiben, dann erstellt das Skript postinst von wireshark-common die Gruppe wireshark als Systemgruppe.
 .
 Auf diesem System ist die Gruppe wireshark allerdings eine Benutzer- statt eine Systemgruppe, daher hat das endgültige Löschen von wireshark-common diese nicht entfernt.
 .
 Falls die Gruppe nicht mehr benötigt wird, entfernen Sie sie bitte manuell.
";
$elem["wireshark-common/group-removal-failed"]["descriptionfr"]="";
$elem["wireshark-common/group-removal-failed"]["default"]="";
PKG_OptionPageTail2($elem);
?>
