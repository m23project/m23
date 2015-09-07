<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libnss-ldapd");

$elem["libnss-ldapd/nsswitch"]["type"]="multiselect";
$elem["libnss-ldapd/nsswitch"]["choices"][1]="aliases";
$elem["libnss-ldapd/nsswitch"]["choices"][2]="ethers";
$elem["libnss-ldapd/nsswitch"]["choices"][3]="group";
$elem["libnss-ldapd/nsswitch"]["choices"][4]="hosts";
$elem["libnss-ldapd/nsswitch"]["choices"][5]="netgroup";
$elem["libnss-ldapd/nsswitch"]["choices"][6]="networks";
$elem["libnss-ldapd/nsswitch"]["choices"][7]="passwd";
$elem["libnss-ldapd/nsswitch"]["choices"][8]="protocols";
$elem["libnss-ldapd/nsswitch"]["choices"][9]="rpc";
$elem["libnss-ldapd/nsswitch"]["choices"][10]="services";
$elem["libnss-ldapd/nsswitch"]["description"]="Name services to configure:
 For this package to work, you need to modify your /etc/nsswitch.conf to use
 the ldap datasource.
 .
 You can select the services that should have LDAP lookups enabled. The
 new LDAP lookups will be added as the last datasource. Be sure to review
 these changes.
";
$elem["libnss-ldapd/nsswitch"]["descriptionde"]="Namensauflösungsdienste, die eingerichtet werden sollen:
 Damit dieses Paket funktionieren kann, müssen Sie die Datei /etc/nsswitch.conf verändern, damit die LDAP-Datenquelle verwendet wird.
 .
 Sie können die Dienste auswählen, für die LDAP-Anfragen zugelassen werden. Die neuen LDAP-Anfragen werden als letzte Datenquelle angefügt. Kontrollieren Sie unbedingt die Änderungen.
";
$elem["libnss-ldapd/nsswitch"]["descriptionfr"]="Services de nom à configurer :
 Le fichier /etc/nsswitch.conf doit être modifié pour rendre ce paquet fonctionnel.
 .
 Vous pouvez aussi choisir les services qui doivent être activés ou désactivés pour les requêtes LDAP. Les nouvelles requêtes LDAP seront ajoutées comme dernière source possible. Il est important de bien contrôler ces modifications.
";
$elem["libnss-ldapd/nsswitch"]["default"]="";
$elem["libnss-ldapd/clean_nsswitch"]["type"]="boolean";
$elem["libnss-ldapd/clean_nsswitch"]["description"]="Remove LDAP from nsswitch.conf now?
 The following services are still configured to use LDAP for lookups:
   ${services}
 but the libnss-ldapd package is about to be removed.
 .
 You are advised to remove the entries if you don't plan on using LDAP for
 name resolution any more. Not removing ldap from nsswitch.conf should, for
 most services, not cause problems, but host name resolution could be affected
 in subtle ways.
 .
 You can edit /etc/nsswitch.conf by hand or choose to remove the entries
 automatically now. Be sure to review the changes to /etc/nsswitch.conf if you
 choose to remove the entries now.
";
$elem["libnss-ldapd/clean_nsswitch"]["descriptionde"]="LDAP aus der Datei nsswitch.conf entfernen?
 Für die folgenden Dienste ist LDAP noch als Namensauflösung eingetragen:
   ${services},
 aber das Paket »libnss-ldapd« soll entfernt werden.
 .
 Sie sollten diese Einträge löschen, wenn Sie LDAP nicht mehr für die Namensauflösung verwenden wollen. Wird LDAP nicht aus der Datei nsswitch.conf entfernt, sollte das bei den meisten Diensten keine Probleme verursachen, aber die Namensauflösung kann dennoch gestört sein.
 .
 Sie können die Datei /etc/nsswitch.conf selbst ändern oder Sie stimmen jetzt zu, die Einträge automatisch zu entfernen. Kontrollieren Sie unbedingt die Änderungen in der Datei /etc/nsswitch.conf, wenn Sie zustimmen, die Einträge jetzt zu löschen.
";
$elem["libnss-ldapd/clean_nsswitch"]["descriptionfr"]="Faut-il supprimer LDAP de nsswitch.conf maintenant ?
 Les services suivants utilisent toujours LDAP pour la recherche de nom :
   ${services}
 mais le paquet libnss-ldapd est sur le point d'être supprimé.
 .
 Il est conseillé de supprimer les entrées si vous ne pensez pas utiliser LDAP pour la résolution de noms. Il est probable qu'omettre de supprimer LDAP dans nsswitch.conf soit sans conséquences pour la plupart des services, mais la résolution de noms peut être affectée de manière subtile.
 .
 Vous pouvez modifier /etc/nsswitch.conf vous-même ou choisir de supprimer les entrées automatiquement maintenant. Il est important de vérifier les changements effectués automatiquement dans /etc/nsswitch.conf si vous choisissez de supprimer les entrées maintenant.
";
$elem["libnss-ldapd/clean_nsswitch"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
