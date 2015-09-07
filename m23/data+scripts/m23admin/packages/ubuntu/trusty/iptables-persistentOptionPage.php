<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("iptables-persistent");

$elem["iptables-persistent/autosave_v4"]["type"]="boolean";
$elem["iptables-persistent/autosave_v4"]["description"]="Save current IPv4 rules?
 Current iptables rules can be saved to the configuration
 file /etc/iptables/rules.v4. These rules will then be loaded automatically
 during system startup.
 .
 Rules are only saved automatically during package installation. See the
 manual page of iptables-save(8) for instructions on keeping the rules file
 up-to-date.
";
$elem["iptables-persistent/autosave_v4"]["descriptionde"]="Aktuelle IPv4-Regeln speichern?
 Aktuelle Iptables-Regeln können in der Konfigurationsdatei /etc/iptables/rules.v4 gespeichert werden. Diese Regeln werden dann beim Systemstart automatisch geladen.
 .
 Regeln werden nur automatisch während der Paketinstallation gespeichert. Lesen Sie die Handbuchseite von iptables-save(8), um zu erfahren, wie die Regeln aktuell gehalten werden können.
";
$elem["iptables-persistent/autosave_v4"]["descriptionfr"]="Faut-il enregistrer les règles IPv4 actuelles ?
 Les règles actuelles peuvent être enregistrées dans le fichier de configuration « /etc/iptables/rules.v4 ». Ces règles seront chargées au prochain redémarrage de la machine.
 .
 Les règles ne sont enregistrées automatiquement que lors de l'installation du paquet. Veuillez consulter la page de manuel de iptables-save(8) pour connaître la manière de garder à jour le fichier des règles.
";
$elem["iptables-persistent/autosave_v4"]["default"]="true";
$elem["iptables-persistent/autosave_v6"]["type"]="boolean";
$elem["iptables-persistent/autosave_v6"]["description"]="Save current IPv6 rules?
 Current iptables rules can be saved to the configuration
 file /etc/iptables/rules.v6. These rules will then be loaded automatically
 during system startup.
 .
 Rules are only saved automatically during package installation. See the
 manual page of ip6tables-save(8) for instructions on keeping the rules file
 up-to-date.
";
$elem["iptables-persistent/autosave_v6"]["descriptionde"]="Aktuelle IPv6-Regeln speichern?
 Aktuelle Iptables-Regeln können in der Konfigurationsdatei /etc/iptables/rules.v6 gespeichert werden. Diese Regeln werden dann beim Systemstart automatisch geladen.
 .
 Regeln werden nur automatisch während der Paketinstallation gespeichert. Lesen Sie die Handbuchseite von ip6tables-save(8), um zu erfahren, wie die Regeln aktuell gehalten werden können.
";
$elem["iptables-persistent/autosave_v6"]["descriptionfr"]="Faut-il enregistrer les règles IPv6 actuelles ?
 Les règles actuelles peuvent être enregistrées dans le fichier de configuration « /etc/iptables/rules.v6 ». Ces règles seront chargées au prochain redémarrage de la machine.
 .
 Les règles ne sont enregistrées automatiquement que lors de l'installation du paquet. Veuillez consulter la page de manuel de ip6tables-save(8) pour connaître la manière de garder à jour le fichier des règles.
";
$elem["iptables-persistent/autosave_v6"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
