<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("open-infrastructure-container-tools");

$elem["open-infrastructure-container-tools/title"]["type"]="title";
$elem["open-infrastructure-container-tools/title"]["description"]="container-tools: Setup
";
$elem["open-infrastructure-container-tools/title"]["descriptionde"]="Einrichtung
";
$elem["open-infrastructure-container-tools/title"]["descriptionfr"]="configuration
";
$elem["open-infrastructure-container-tools/title"]["default"]="";
$elem["open-infrastructure-container-tools/machines"]["type"]="string";
$elem["open-infrastructure-container-tools/machines"]["description"]="machines directory:
 Please specify the directory that will be used to store the containers.
 .
 If unsure, use /var/lib/machines (default) or /srv/container/system
 when using shared storage.
";
$elem["open-infrastructure-container-tools/machines"]["descriptionde"]="Machines-Verzeichnis:
 Bitte geben Sie das zum Speichern von Containern vorgesehene Verzeichnis an.
 .
 Wenn Sie unsicher sind, verwenden Sie das Standardverzeichnis /var/lib/machines oder für gemeinsam benutzten Speicher /srv/container/system.
";
$elem["open-infrastructure-container-tools/machines"]["descriptionfr"]="Répertoire des machines :
 Veuillez indiquer le répertoire qui sera utilisé pour stocker les conteneurs.
 .
 En cas de doute, utilisez /var/lib/machines (répertoire par défaut) ou /srv/container/system si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/machines"]["default"]="/var/lib/machines";
$elem["open-infrastructure-container-tools/config"]["type"]="string";
$elem["open-infrastructure-container-tools/config"]["description"]="config directory:
 Please specify the directory that will be used to store the container
 configuration files.
 .
 If unsure, use /etc/open-infrastructure/container/config (default) or
 /srv/container/config when using shared storage.
";
$elem["open-infrastructure-container-tools/config"]["descriptionde"]="Konfigurationsverzeichnis:
 Bitte geben Sie das für die Container-Konfigurationsdateien vorgesehene Verzeichnis an.
 .
 Wenn Sie unsicher sind, verwenden Sie das Standardverzeichnis /etc/open-infrastructure/container/config oder für gemeinsam benutzten Speicher /srv/container/config.
";
$elem["open-infrastructure-container-tools/config"]["descriptionfr"]="Répertoire de configuration :
 Veuillez indiquer le répertoire qui sera utilisé pour stocker les fichiers de configuration du conteneur.
 .
 En cas de doute, utilisez /etc/open-infrastructure/container/config (répertoire par défaut) ou /srv/container/config si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/config"]["default"]="/etc/open-infrastructure/container/config";
$elem["open-infrastructure-container-tools/debconf"]["type"]="string";
$elem["open-infrastructure-container-tools/debconf"]["description"]="debconf directory:
 Please specify the directory that will be used to store the container
 preseed files.
 .
 If unsure, use /etc/open-infrastructure/container/debconf (default) or
 /srv/container/debconf when using shared storage.
";
$elem["open-infrastructure-container-tools/debconf"]["descriptionde"]="Verzeichnis des Konfigurationssystems für Debian-Pakete:
 Bitte geben Sie das Verzeichnis an, welches die Voreinstellungsdateien für Container speichern soll.
 .
 Wenn Sie unsicher sind, verwenden Sie das Standardverzeichnis /etc/open-infrastructure/container/debconf oder /srv/container/debconf für gemeinsam benutzten Speicher.
";
$elem["open-infrastructure-container-tools/debconf"]["descriptionfr"]="Répertoire de la configuration Debian :
 Veuillez indiquer le répertoire qui sera utilisé pour stocker les fichiers préconfigurés de conteneur.
 .
 En cas de doute, utilisez /etc/open-infrastructure/container/debconf (répertoire par défaut) ou /srv/container/debconf si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/debconf"]["default"]="/etc/open-infrastructure/container/debconf";
$elem["open-infrastructure-container-tools/hooks"]["type"]="string";
$elem["open-infrastructure-container-tools/hooks"]["description"]="debconf directory:
 Please specify the directory that will be used to store the container
 hooks.
 .
 If unsure, use /etc/open-infrastructure/container/hooks (default) or
 /srv/container/hooks when using shared storage.
";
$elem["open-infrastructure-container-tools/hooks"]["descriptionde"]="Verzeichnis des Konfigurationssystems für Debian-Pakete:
 Bitte geben Sie das zum Speichern der Container-Hooks vorgesehene Verzeichnis an.
 .
 Wenn Sie unsicher sind, verwenden Sie das Standardverzeichnis /etc/open-infrastructure/container/hooks oder für gemeinsam benutzten Speicher /srv/container/hooks.
";
$elem["open-infrastructure-container-tools/hooks"]["descriptionfr"]="Répertoire de la configuration Debian :
 Veuillez indiquer le répertoire qui sera utilisé pour stocker les scripts d'accroche de conteneur.
 .
 En cas de doute, utilisez /etc/open-infrastructure/container/hooks (répertoire par défaut) ou /srv/container/hooks si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/hooks"]["default"]="/etc/open-infrastructure/container/hooks";
$elem["open-infrastructure-container-tools/keys"]["type"]="string";
$elem["open-infrastructure-container-tools/keys"]["description"]="debconf directory:
 Please specify the directory that will be used to store the container
 keys for verifying container image downloads.
 .
 If unsure, use /etc/open-infrastructure/container/keys (default) or
 /srv/container/keys when using shared storage.
";
$elem["open-infrastructure-container-tools/keys"]["descriptionde"]="Verzeichnis des Konfigurationssystems für Debian-Pakete:
 Bitte geben Sie das Verzeichnis für die Container-Schlüssel an, mit welchen heruntergeladene Container-Abbilder überprüft werden.
 .
 Wenn Sie unsicher sind, verwenden Sie das Standardverzeichnis /etc/open-infrastructure/container/keys oder /srv/container/keys für gemeinsam benutzten Speicher.
";
$elem["open-infrastructure-container-tools/keys"]["descriptionfr"]="";
$elem["open-infrastructure-container-tools/keys"]["default"]="/etc/open-infrastructure/container/keys";
$elem["open-infrastructure-container-tools/cache"]["type"]="string";
$elem["open-infrastructure-container-tools/cache"]["description"]="cache directory:
 Please specify the directory that will be used to cache files during
 creation of containers.
 .
 If unsure, use /var/cache/open-infrastructure/container (default) or
 /srv/container/cache when using shared storage.
";
$elem["open-infrastructure-container-tools/cache"]["descriptionde"]="Zwischenspeicher-Verzeichnis:
 Bitte geben Sie das Verzeichnis an, in das während der Erzeugung von Containern Dateien zwischengespeichern werden sollen.
 .
 Wenn Sie unsicher sind, verwenden Sie das Standardverzeichnis /var/cache/open-infrastructure/container oder für gemeinsam benutzten Speicher /srv/container/cache.
";
$elem["open-infrastructure-container-tools/cache"]["descriptionfr"]="Répertoire cache :
 Veuillez indiquer le répertoire qui sera utilisé pour mettre en cache les fichiers pendant la création des conteneurs.
 .
 En cas de doute, utilisez /var/cache/open-infrastructure/container (répertoire par défaut) ou /srv/container/cache si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/cache"]["default"]="/var/cache/open-infrastructure/container";
$elem["open-infrastructure-container-tools/script"]["type"]="select";
$elem["open-infrastructure-container-tools/script"]["description"]="create script:
 Please select the script that will be used by default to create
 containers.
 .
 If unsure, use debian (default).
";
$elem["open-infrastructure-container-tools/script"]["descriptionde"]="Erzeugungs-Skript:
 Bitte wählen Sie das Skript, welches standardmäßig für die Erzeugung von Containern benutzt werden soll.
 .
 Wenn Sie unsicher sind, verwenden Sie das Standardskript debian.
";
$elem["open-infrastructure-container-tools/script"]["descriptionfr"]="Script à créer :
 Veuillez choisir le script qui sera utilisé par défaut pour créer les conteneurs.
 .
 En cas de doute, utilisez debian (par défaut).
";
$elem["open-infrastructure-container-tools/script"]["default"]="${SCRIPT_DEFAULT}";
$elem["open-infrastructure-container-tools/irc"]["type"]="string";
$elem["open-infrastructure-container-tools/irc"]["description"]="IRC notifications:
 The container command can send IRC notifications via irker to one or more
 (whitespace separated) IRC channels.
 .
 The following example will send IRC notifications to the
 open-infrastructure channel on irc.oftc.net:
 .
   irc://irc.oftc.net:6668/open-infrastructure
 .
 If unsure, leave empty (default).
";
$elem["open-infrastructure-container-tools/irc"]["descriptionde"]="IRC-Benachrichtigungen:
 Der Befehl container kann mittels irker auf einem oder mehreren IRC-Kanälen (durch Leerzeichen getrennte Auflistung) Benachrichtigungen senden.
 .
 Beispielsweise sendet folgende Eingabe IRC-Benachrichtigungen im Kanalopen-infrastructure auf irc.oftc.net:
 .
   irc://irc.oftc.net:6668/open-infrastructure
 .
 Wenn Sie unsicher sind, geben Sie nichts ein (Standardeinstellung).
";
$elem["open-infrastructure-container-tools/irc"]["descriptionfr"]="Notifications IRC :
 La commande container peut envoyer des notifications IRC avec iker à un ou plusieurs canaux IRC (séparés par espaces).
 .
 L'exemple suivant enverra des notifications IRC au canal open-infrastructure sur irc.oftc.net :
 .
   irc://irc.oftc.net:6668/open-infrastructure
 .
 En cas de doute, laissez le champ vide (par défaut).
";
$elem["open-infrastructure-container-tools/irc"]["default"]="";
PKG_OptionPageTail2($elem);
?>
