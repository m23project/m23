<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("krb5-kdc");

$elem["krb5-kdc/debconf"]["type"]="boolean";
$elem["krb5-kdc/debconf"]["description"]="Create the Kerberos KDC configuration automatically?
 The Kerberos Domain Controller (KDC) configuration files, in
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
 Die Konfigurationsdateien des »Kerberos Domain Controller« (KDC) in /etc/krb5kdc können automatisch erstellt werden.
 .
 Standardmäßig wird eine Beispielvorlage in dieses Verzeichnis kopiert, in der lokale Parameter eingetragen sind.
 .
 Administratoren, die bereits über eine Infrastruktur zur Verwaltung ihrer Kerberos-Konfiguration verfügen, möchten diese automatischen Konfigurationsänderungen eventuell deaktivieren.
";
$elem["krb5-kdc/debconf"]["descriptionfr"]="Faut-il créer la configuration du contrôleur de domaine Kerberos automatiquement ?
 Les fichiers de configuration du contrôleur de domaine Kerberos (KDC), situés dans /etc/krb5kdc, peuvent être créés automatiquement.
 .
 Par défaut, des fichiers d'exemples comportant des paramètres locaux seront placés dans ce répertoire.
 .
 Les administrateurs qui utilisent déjà une infrastructure de gestion de la configuration de Kerberos souhaiteront probablement désactiver toute modification automatique de la configuration.
";
$elem["krb5-kdc/debconf"]["default"]="true";
$elem["krb5-kdc/krb4-mode"]["type"]="select";
$elem["krb5-kdc/krb4-mode"]["choices"][1]="disable";
$elem["krb5-kdc/krb4-mode"]["choices"][2]="full";
$elem["krb5-kdc/krb4-mode"]["choices"][3]="nopreauth";
$elem["krb5-kdc/krb4-mode"]["description"]="Kerberos V4 compatibility mode to use:
 By default, Kerberos V4 requests are allowed from principals that do
 not require preauthentication (\"nopreauth\").  This allows Kerberos V4
 services to exist while requiring most users to use Kerberos V5 clients
 to get their initial tickets.  These tickets can then be converted to
 Kerberos V4 tickets.
 .
 Alternatively, the mode can be set to \"full\", allowing Kerberos V4
 clients to get initial tickets even when preauthentication would
 normally be required; to \"disable\", returning protocol version errors
 to all Kerberos V4 clients; or to \"none\", which tells the KDC to not
 respond to Kerberos V4 requests at all.
";
$elem["krb5-kdc/krb4-mode"]["descriptionde"]="Zu benutzender Kerberos V4-Kompatibilitäts-Modus:
 Standardmäßig werden Kerberos V4-Anfragen von Prinzipalen erlaubt, die keine vorherige Authentifizierung benötigen (»nopreauth«). Das ermöglicht Kerberos V4-Dienste zu betreiben, während gleichzeitig die meisten Benutzer Kerberos V5-Clients verwenden müssen, um ihr anfängliches Ticket zu bekommen. Diese Tickets können in Kerberos V4-Tickets umgewandelt werden. 
 .
 Alternativ kann der Modus auch auf »full« gesetzt werden, wodurch Kerberos V4-Clients anfängliche Tickets ohne vorherige Authentifizierung erhalten können, selbst wenn prauth normalerweise nötig wäre. Eine weitere Möglichkeit ist »disable«, wobei dann Protokollversionsfehler an alle Kerberos V4-Clients gesandt werden und »none«, der den KDC anweist, auf Kerberos V4-Anfragen überhaupt nicht zu reagieren.
";
$elem["krb5-kdc/krb4-mode"]["descriptionfr"]="Mode de compatibilité avec Kerberos v4 à utiliser :
 Par défaut, les requêtes Kerberos v4 sont autorisées pour les enregistrements (« principals ») qui n'ont pas besoin de pré-authentification (« nopreauth »). Cela permet que les services Kerberos v4 fonctionnent mais la majorité des utilisateurs devront utiliser des clients Kerberos v5 pour obtenir leurs tickets initiaux. Ces tickets pourront ensuite être convertis en tickets Kerberos v4.
 .
 Ce mode peut également être configuré comme complet (« full »), ce qui permet aux clients Kerberos v4 d'obtenir leurs tickets initiaux même lorsque la pré-authentification est requise. Un autre réglage possible est de le désactiver (« disable ») ce qui renvoie une erreur de version de protocole à tous les clients Kerberos v4, ou de désactiver totalement les réponses aux requêtes Kerberos v4 (« none »).
";
$elem["krb5-kdc/krb4-mode"]["default"]="none";
$elem["krb5-kdc/run-krb524"]["type"]="boolean";
$elem["krb5-kdc/run-krb524"]["description"]="Run a Kerberos V5 to Kerberos V4 ticket conversion daemon?
 The krb524d daemon converts Kerberos V5 tickets into Kerberos V4
 tickets for programs, such as krb524init, that obtain Kerberos V4 tickets
 for compatibility with old applications.
 .
 It is recommended to enable that daemon if Kerberos V4 is enabled,
 especially when Kerberos V4 compatibility is set to \"nopreauth\".
";
$elem["krb5-kdc/run-krb524"]["descriptionde"]="Einen Kerberos V5-auf-V4 Ticket-Konvertier-Daemon betreiben?
 Der Krb524d-Daemon konvertiert V5-Tickets in V4-Tickest für Programme wie Krb524init, die Kerberos V4-Tickets zur Kompatibilität für ältere Anwendungen besorgen.
 .
 Es wird empfohlen, diesen Daemon zu aktivieren, falls Kerberos V4 aktiviert ist, insbesondere wenn Kerberos V4-Kompatibilität auf »nopreauth« gesetzt ist.
";
$elem["krb5-kdc/run-krb524"]["descriptionfr"]="Faut-il lancer un démon de conversion des tickets Kerberos v5 en Kerberos v4 ?
 Krb524d est un démon qui permet de convertir les tickets Kerberos v5 en tickets Kerberos v4 pour les programmes tels que krb524init, qui obtiennent des tickets Kerberos v4 pour préserver la compatibilité avec d'anciennes applications.
 .
 Ce démon est indispensable lorsque Kerberos4 est activé, notamment si le mode de compatibilié est « pas de pré-authentification » (nopreauth).
";
$elem["krb5-kdc/run-krb524"]["default"]="";
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
 Choisissez cette option si vous souhaitez supprimer la base de données KDC maintenant, ce qui supprimera tous les comptes des utilisateurs ainsi que les mots de passe, sur le contrôleur de domaine Kerberos (KDC).
";
$elem["krb5-kdc/purge_data_too"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
