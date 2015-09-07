<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("samba4");

$elem["samba4/upgrade-from-v3"]["type"]="boolean";
$elem["samba4/upgrade-from-v3"]["description"]="Upgrade from Samba 3?
 It is possible to migrate the existing configuration files from Samba 3 to
 Samba 4. This is likely to fail for complex setups, but should provide a
 good starting point for most existing installations.
";
$elem["samba4/upgrade-from-v3"]["descriptionde"]="Upgrade von Samba 3?
 Es ist möglich, die vorhandenen Konfigurationsdateien von Samba 3 nach Samba 4 zu migrieren. Zwar könnte dies in sehr komplexen Situationen fehlschlagen, aber für die meisten vorhandenen Installationen sollte es ein guter Anfang sein.
";
$elem["samba4/upgrade-from-v3"]["descriptionfr"]="Faut-il mettre Samba à niveau depuis Samba 3 ?
 Il est possible de faire migrer les fichiers de configuration existants de Samba 3 vers Samba 4. Il est probable que cette étape échoue pour des installations complexes, mais elle fournira une bonne base de départ pour la plupart des configurations.
";
$elem["samba4/upgrade-from-v3"]["default"]="true";
$elem["samba4/server-role"]["type"]="select";
$elem["samba4/server-role"]["choices"][1]="dc";
$elem["samba4/server-role"]["choices"][2]="member";
$elem["samba4/server-role"]["description"]="Server role
 Domain controllers manage NT4-style or Active Directory domains and
 provide services such as identity management and domain logons. Each
 domain needs to have a at least one domain controller.
 .
 Member servers can be part of a NT4-style or Active Directory domain but
 do not provide any domain services. Workstations and file or print servers
 are usually regular domain members.
 .
 A standalone server can not be used in a domain and only supports file
 sharing and Windows for Workgroups-style logins.
";
$elem["samba4/server-role"]["descriptionde"]="Funktion des Servers
 Domain-Controller verwalten Domains im NT4-Stil oder Active-Directory-Domains und bieten Dienste wie Identitätsmanagement und Domain-Anmeldungen. Jede Domain benötigt mindestens einen Domain-Controller.
 .
 Mitglieds-Server können Teil einer Domain im NT4-Stil oder einer Active-Directory-Domain sein, stellen aber keine Domain-Dienste zur Verfügung. Arbeitsplatz-Rechner und Datei- oder Druck-Server sind üblicherweise reguläre Domain-Mitglieder.
 .
 Ein autonomer Einzel-Server kann nicht in einer Domain genutzt werden und unterstützt lediglich Dateifreigaben sowie Anmeldungen im Windows-for-Worgroups-Stil.
";
$elem["samba4/server-role"]["descriptionfr"]="Rôle du serveur
 Les contrôleurs de domaine gèrent des domaines de type NT4 ou Active Directory et fournissent des services comme la gestion des identifiants et les ouvertures de sessions de domaine. Chaque domaine doit comporter au moins un contrôleur.
 .
 Un serveur peut être membre d'un domaine NT4 ou Active Directory sans fournir de services de domaine. Les postes de travail ainsi que les serveurs de fichiers ou d'impression sont en général de simples membres de domaine.
 .
 Un serveur isolé (« standalone ») ne peut être utilisé dans un domaine et ne gère que le partage de fichiers et les connexions de type « Windows for Workgroups ».
";
$elem["samba4/server-role"]["default"]="dc";
$elem["samba4/realm"]["type"]="string";
$elem["samba4/realm"]["description"]="Realm name:
 Please specify the Kerberos realm for the domain that this domain controller
 controls.
 .
 Usually this is the a capitalized version of your DNS hostname.
";
$elem["samba4/realm"]["descriptionde"]="Realm-Name:
 Bitte geben Sie den Kerberos-Realm (Verwaltungsbereich) für die Domain an, die dieser Domain-Controller verwaltet.
 .
 Üblicherweise ist dies Ihr DNS-Hostname in Großbuchstaben.
";
$elem["samba4/realm"]["descriptionfr"]="Royaume (« realm ») Kerberos :
 Veuillez indiquer le royaume Kerberos pour le domaine que gère ce contrôleur de domaine.
 .
 En général, ce nom est le nom de domaine en majuscules.
";
$elem["samba4/realm"]["default"]="REALM";
PKG_OptionPageTail2($elem);
?>
