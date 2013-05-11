<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libpam-mount");

$elem["libpam-mount/convert-xml-config"]["type"]="boolean";
$elem["libpam-mount/convert-xml-config"]["description"]="Convert libpam-mount configuration automatically?
 The libpam-mount configuration file has changed to a new XML
 format.
 .
 The file can be converted automatically now with the
 script '/usr/share/doc/libpam-mount/examples/convert_pam_mount_conf.pl'.
 The old /etc/security/pam_mount.conf configuration file will be
 kept unmodified and a new /etc/security/pam_mount.conf.xml file will be
 created.
 .
 If you choose to convert the configuration automatically, the newly
 generated file should be checked to prevent login errors.
";
$elem["libpam-mount/convert-xml-config"]["descriptionde"]="Die libpam-mount Konfiguration automatisch konvertieren?
 Die libpam-mount Konfiguration hat sich in ein neues XML Format geändert.
 .
 Die Datei kann nun automatisch mit dem Skript '/Usr/share/doc/libpam-mount/examples/convert_pam_mount_conf.pl' konvertiert werden. Die alte Datei /etc/security/pam_mount.conf wird dabei nicht verändert, und eine neue Datei /etc/security/pam_mount.conf.xml wird erzeugt.
 .
 Falls Sie die Konfiguration automatisch konvertieren möchten, sollte die neu erstellte Datei überprüft werden, um Fehler bei der Systemanmeldung zu vermeiden.
";
$elem["libpam-mount/convert-xml-config"]["descriptionfr"]="Faut-il convertir automatiquement la configuration de libpam-mount ?
 Le fichier de configuration libpam-mount a été remplacé par un nouveau format XML.
 .
 Le fichier peut être converti maintenant automatiquement avec le script « /usr/share/doc/libpam-mount/examples/convert_pam_mount_conf.pl ». L'ancien fichier de configuration « /etc/security/pam_mount.conf » sera gardé non modifié et un nouveau fichier « /etc/security/pam_mount.conf.xml » sera créé.
 .
 Si vous choisissez de convertir automatiquement la configuration, le nouveau fichier créé devrait être vérifié afin d'éviter des erreurs de connexion.
";
$elem["libpam-mount/convert-xml-config"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
