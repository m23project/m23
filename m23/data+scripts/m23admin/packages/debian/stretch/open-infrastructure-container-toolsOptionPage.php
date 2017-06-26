<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("open-infrastructure-container-tools");

$elem["open-infrastructure-container-tools/title"]["type"]="title";
$elem["open-infrastructure-container-tools/title"]["description"]="container-tools: Setup
";
$elem["open-infrastructure-container-tools/title"]["descriptionde"]="";
$elem["open-infrastructure-container-tools/title"]["descriptionfr"]="configuration
";
$elem["open-infrastructure-container-tools/title"]["default"]="";
$elem["open-infrastructure-container-tools/machines"]["type"]="string";
$elem["open-infrastructure-container-tools/machines"]["description"]="machines directory:
 Please specify the directory that will be used to store the containers.
 .
 If unsure, use /var/lib/machines (default) or /srv/container when using
 shared storage.
";
$elem["open-infrastructure-container-tools/machines"]["descriptionde"]="";
$elem["open-infrastructure-container-tools/machines"]["descriptionfr"]="Répertoire des machines :
 Veuillez indiquer le répertoire qui sera utilisé pour stocker les conteneurs.
 .
 En cas de doute, utilisez /var/lib/machines (répertoire par défaut) ou /srv/container si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/machines"]["default"]="/var/lib/machines";
$elem["open-infrastructure-container-tools/config"]["type"]="string";
$elem["open-infrastructure-container-tools/config"]["description"]="config directory:
 Please specify the directory that will be used to store the container
 configuration files.
 .
 If unsure, use /etc/container-tools/config (default) or
 /srv/container/container-tools/config when using shared storage.
";
$elem["open-infrastructure-container-tools/config"]["descriptionde"]="";
$elem["open-infrastructure-container-tools/config"]["descriptionfr"]="Répertoire de configuration :
 Veuillez indiquer le répertoire qui sera utilisé pour stocker les fichiers de configuration du conteneur.
 .
 En cas de doute, utilisez /etc/container-tools/config (répertoire par défaut) ou /srv/container/container-tools/config si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/config"]["default"]="/etc/container-tools/config";
$elem["open-infrastructure-container-tools/debconf"]["type"]="string";
$elem["open-infrastructure-container-tools/debconf"]["description"]="debconf directory:
 Please specify the directory that will be used to store the container
 preseed files.
 .
 If unsure, use /etc/container-tools/debconf (default) or
 /srv/container/container-tools/debconf when using shared storage.
";
$elem["open-infrastructure-container-tools/debconf"]["descriptionde"]="";
$elem["open-infrastructure-container-tools/debconf"]["descriptionfr"]="Répertoire de la configuration Debian :
 Veuillez indiquer le répertoire qui sera utilisé pour stocker les fichiers préconfigurés du conteneur.
 .
 En cas de doute, utilisez /etc/container-tools/debconf (répertoire par défaut) ou /srv/container/container-tools/debconf si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/debconf"]["default"]="/etc/container-tools/debconf";
$elem["open-infrastructure-container-tools/cache"]["type"]="string";
$elem["open-infrastructure-container-tools/cache"]["description"]="cache directory:
 Please specify the directory that will be used to cache files during
 creation of containers.
 .
 If unsure, use /var/cache/container-tools (default) or
 /srv/container/container-tools/cache when using shared storage.
";
$elem["open-infrastructure-container-tools/cache"]["descriptionde"]="";
$elem["open-infrastructure-container-tools/cache"]["descriptionfr"]="Répertoire cache :
 Veuillez indiquer le répertoire qui sera utilisé pour mettre en cache les fichiers pendant la création des conteneurs.
 .
 En cas de doute, utilisez /var/cache/container-tools (répertoire par défaut) ou /srv/container/container-tools/cache si vous utilisez un stockage partagé.
";
$elem["open-infrastructure-container-tools/cache"]["default"]="/var/cache/container-tools";
$elem["open-infrastructure-container-tools/script"]["type"]="select";
$elem["open-infrastructure-container-tools/script"]["description"]="create script:
 Please select the script that will be used by default to create
 containers.
 .
 If unsure, use debian (default).
";
$elem["open-infrastructure-container-tools/script"]["descriptionde"]="";
$elem["open-infrastructure-container-tools/script"]["descriptionfr"]="Créez un script :
 Veuillez choisir le script qui sera utilisé par défaut pour créer les conteneurs.
 .
 En cas de doute, utilisez debian (par défaut).
";
$elem["open-infrastructure-container-tools/script"]["default"]="${SCRIPT_DEFAULT}";
PKG_OptionPageTail2($elem);
?>
