<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("krb5-kdc");

$elem["krb5-kdc/debconf"]["type"]="boolean";
$elem["krb5-kdc/debconf"]["description"]="Create the Kerberos KDC configuration automatically?
 The Kerberos Key Distribution Center (KDC) configuration files, in
 /etc/krb5kdc, may be created automatically.
 .
 By default, an example template will be copied into this directory
 with local parameters filled in.
 .
 Administrators who already have infrastructure to manage their
 Kerberos configuration may wish to disable these automatic
 configuration changes.
";
$elem["krb5-kdc/debconf"]["descriptionde"]="Die Kerberos-KDC-Konfiguration automatisch erstellen?
 Die Konfigurationsdateien des »Kerberos Key Distribution Center« (KDC) in /etc/krb5kdc können automatisch erstellt werden.
 .
 Standardmäßig wird eine Beispielvorlage in dieses Verzeichnis kopiert, in der lokale Parameter eingetragen sind.
 .
 Administratoren, die bereits über eine Infrastruktur zur Verwaltung ihrer Kerberos-Konfiguration verfügen, möchten diese automatischen Konfigurationsänderungen eventuell deaktivieren.
";
$elem["krb5-kdc/debconf"]["descriptionfr"]="Faut-il créer la configuration du centre de distribution de clés Kerberos automatiquement ?
 Les fichiers de configuration du centre de distribution de clés Kerberos (KDC : Key Distribution Center), situés dans /etc/krb5kdc, peuvent être créés automatiquement.
 .
 Par défaut, des fichiers d'exemples comportant des paramètres locaux seront placés dans ce répertoire.
 .
 Les administrateurs qui utilisent déjà une infrastructure de gestion de la configuration de Kerberos souhaiteront probablement désactiver toute modification automatique de la configuration.
";
$elem["krb5-kdc/debconf"]["default"]="true";
$elem["krb5-kdc/purge_data_too"]["type"]="boolean";
$elem["krb5-kdc/purge_data_too"]["description"]="Should the KDC database be deleted?
 By default, removing this package will not delete the KDC database in
 /var/lib/krb5kdc/principal since this database cannot be recovered once
 it is deleted.
 .
 Choose this option if you wish to delete the KDC database now, deleting
 all of the user accounts and passwords in the KDC.
";
$elem["krb5-kdc/purge_data_too"]["descriptionde"]="Soll die KDC-Datenbank gelöscht werden?
 Standardmäßig wird während des Entfernens des Paketes die KDC-Datenbank in /var/lib/krb5kdc/principal nicht entfernt, da diese Datenbank nicht wiederhergestellt werden kann, nachdem sie gelöscht wurde.
 .
 Wählen Sie diese Option, falls Sie möchten, dass die KDC-Datenbank jetzt gelöscht werden soll. Dies löscht alle Benutzerkonten und Passwörter in dem KDC.
";
$elem["krb5-kdc/purge_data_too"]["descriptionfr"]="Faut-il supprimer la base de données KDC ?
 Par défaut, la suppression complète de ce paquet ne supprimera pas la base de données KDC dans /var/lib/krb5kdc/principal car cette base de données ne peut pas être récupérée une fois supprimée.
 .
 Choisissez cette option si vous souhaitez supprimer la base de données KDC maintenant, ce qui supprimera tous les comptes des utilisateurs ainsi que les mots de passe, sur le ecntre de distribution de clés Kerberos (KDC).
";
$elem["krb5-kdc/purge_data_too"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
