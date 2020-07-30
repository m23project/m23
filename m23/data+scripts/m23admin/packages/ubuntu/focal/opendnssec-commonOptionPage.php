<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("opendnssec-common");

$elem["opendnssec/migration-2.0"]["type"]="note";
$elem["opendnssec/migration-2.0"]["description"]="OpenDNSSEC 2.0.0 database and tools migration
 There are two steps in the database migration.  If you are running
 OpenDNSSEC 1.4.6 from Debian stable, you need to apply the SQL statements
 from /usr/share/opendnssec/migrate_1_4_8.{mysql,sqlite3} against your
 existing database.
 .
 The enforcer does require a full migration, as the internal database has
 been completely revised.  See the upstream documentation in the
 /usr/share/opendnssec/1.4-2.0_db_convert/README.md for a description.
 .
 You should also review the documentation on the OpenDNSSEC site.  This can
 be updated in between releases to provide more help.  Especially if you
 have tooling around OpenDNSSEC you should be aware that some command line
 utilities have changed.  A fair amount of backward compatibility has been
 respected, but changes are present.
";
$elem["opendnssec/migration-2.0"]["descriptionde"]="OpenDNSSEC-2.0.0-Datenbank- und Werkzeugmigration
 Bei der Datenbankmigration gibt es zwei Schritte. Falls Sie OpenDNSSEC 1.4.6 aus Debian Stable betreiben, müssen Sie die SQL-Anweisungen aus /usr/share/opendnssec/migrate_1_4_8.{mysql,sqlite3} auf ihre bestehende Datenbank anwenden.
 .
 Der Enforcer benötigt eine komplette Migration, da die interne Datenbank komplett neu gestaltet wurde. Lesen Sie für eine Beschreibung die Dokumentation der Originalautoren in /usr/share/opendnssec/1.4-2.0_db_convert/README.md.
 .
 Sie sollten auch die Dokumentation auf der OpenDNSSEC-Site durchschauen. Diese kann zwischen Veröffentlichungen aktualisiert werden, um weitere Hilfe bereitzustellen. Insbesondere falls Sie auf OpenDNSSEC Werkzeuge aufgesetzt haben, sollten Sie berücksichtigen, dass sich einige Befehlszeilenhilfswerkzeuge geändert haben. Ein ganzer Teil an Rückwärtskompatibilität wurde berücksichtigt, es sind aber Änderungen vorhanden.
";
$elem["opendnssec/migration-2.0"]["descriptionfr"]="Migration de la base de données et des outils d'OpenDNSSEC 2.0.0
 La migration de la base de données comprend deux étapes. Si vous exécutez OpenDNSSEC 1.4.6 dans Debian stable, il est nécessaire d'appliquer à votre base de données les commandes SQL présentes dans /usr/share/opendnssec/migrate_1_4_8.{mysql,sqlite3}.
 .
 L'exécuteur (« enforcer ») exige une migration complète dans la mesure où la structure interne de la base de données a été entièrement revue. Veuillez consulter la documentation amont fournie dans /usr/share/opendnssec/1.4-2.0_db_convert/README.md pour sa description.
 .
 Vous devriez aussi revoir la documentation sur le site d'OpenDNNSEC. Elle peut être mise à jour entre les différentes versions afin de fournir une meilleure assistance. En particulier, si vous avez construit des outils autour d'OpenDNSSEC, vous devez être conscient que certains utilitaires en ligne de commande ont été modifiés. Une quantité appréciable de rétrocompatibilité a été respectée, néanmoins, des modifications sont présentes.
";
$elem["opendnssec/migration-2.0"]["default"]="";
$elem["opendnssec/conf-required"]["type"]="note";
$elem["opendnssec/conf-required"]["description"]="Manual OpenDNSSEC configuration required
 OpenDNSSEC requires manual configuration before the signer and
 enforcer daemons can be started.
 .
 One of these configuration steps consists of installing and
 configuring a Hardware Security Module (HSM) that will handle the
 cryptographic key operations. Most people will want to use the
 software HSM implementation provided by the recommended softhsm2
 package, but other options are possible.
 .
 The file /etc/opendnssec/prevent-startup is created during fresh
 installations and prevents the daemons from being automatically
 started. You should remove this file and start the daemons once you
 have configured OpenDNSSEC.
";
$elem["opendnssec/conf-required"]["descriptionde"]="Manuelle OpenDNSSEC-Konfiguration notwendig
 OpenDNSSEC benötigt manuelle Konfiguration, bevor die Signer- und Enforcer-Daemons gestartet werden können.
 .
 Einer dieser Konfigurationsschritte besteht in der Installation und Konfiguration eines Hardware Security Modules (HSM), dass die kryptographischen Schlüsselaktionen durchführt. Die meisten Benutzer werden die Software-HSM-Implementierung des empfohlenen Pakets softhsm2 verwenden wollen, aber andere Optionen sind möglich.
 .
 Die Datei /etc/opendnssec/prevent-startup wird während einer frischen Installation erstellt und verhindert, dass die Daemons automatisch starten. Sobald Sie OpenDNSSEC konfiguriert haben, sollten Sie diese Datei entfernen und die Daemons starten.
";
$elem["opendnssec/conf-required"]["descriptionfr"]="Une configuration manuelle d'OpenDNSSEC est requise
 OpenDNSSEC requiert une configuration manuelle avant que les démons de signature (« signer ») et d'exécution (« enforcer ») puissent être démarrés.
 .
 Une des étapes de la configuration consiste en l'installation et la configuration d'un module matériel de sécurité (« Hardware Security Module » – HSM) qui gérera les opérations de clé de chiffrement. La plupart des utilisateurs souhaitent se servir du paquet recommandé softhsm2, mais d'autres options sont possibles.
 .
 Le fichier /etc/opendnssec/prevent-startup est créé lors des nouvelles installations et évite que les démons soient démarrés automatiquement. Vous devriez supprimer ce fichier et démarrer les démons une fois OpenDNSSEC configuré.
";
$elem["opendnssec/conf-required"]["default"]="";
PKG_OptionPageTail2($elem);
?>
