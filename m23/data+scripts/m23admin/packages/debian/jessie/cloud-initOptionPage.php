<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cloud-init");

$elem["cloud-init/datasources"]["type"]="multiselect";
$elem["cloud-init/datasources"]["choices"][1]="/var/lib/cloud/seed only";
$elem["cloud-init/datasources"]["choices"][2]="AltCloud Config Drive";
$elem["cloud-init/datasources"]["choices"][3]="CloudStack metadata service";
$elem["cloud-init/datasources"]["choices"][4]="OpenStack Config Drive";
$elem["cloud-init/datasources"]["choices"][5]="EC2 Metadata service";
$elem["cloud-init/datasources"]["choices"][6]="Ubuntu MAAS";
$elem["cloud-init/datasources"]["choices"][7]="OVF Transports";
$elem["cloud-init/datasources"]["choices"][8]="Google Cloud Engine";
$elem["cloud-init/datasources"]["choicesde"][1]="nur /var/lib/cloud/seed";
$elem["cloud-init/datasources"]["choicesde"][2]="AltCloud-Konfigurationslaufwerk";
$elem["cloud-init/datasources"]["choicesde"][3]="CloudStack-Metadatendienst";
$elem["cloud-init/datasources"]["choicesde"][4]="OpenStack-Konfigurationslaufwerk";
$elem["cloud-init/datasources"]["choicesde"][5]="EC2-Metadatendienst";
$elem["cloud-init/datasources"]["choicesde"][6]="Ubuntu-MAAS";
$elem["cloud-init/datasources"]["choicesde"][7]="OVF-Transporte";
$elem["cloud-init/datasources"]["choicesde"][8]="Google Cloud Engine";
$elem["cloud-init/datasources"]["choicesfr"][1]="/var/lib/cloud/seed uniquement";
$elem["cloud-init/datasources"]["choicesfr"][2]="Lecteur de configuration pour AltCloud";
$elem["cloud-init/datasources"]["choicesfr"][3]="Service de métadonnées pour CloudStack";
$elem["cloud-init/datasources"]["choicesfr"][4]="Lecteur de configuration pour OpenStack";
$elem["cloud-init/datasources"]["choicesfr"][5]="Service de métadonnées pour EC2";
$elem["cloud-init/datasources"]["choicesfr"][6]="Ubuntu MAAS";
$elem["cloud-init/datasources"]["choicesfr"][7]="Transports pour les images OVF";
$elem["cloud-init/datasources"]["choicesfr"][8]="Moteur de Cloud Google";
$elem["cloud-init/datasources"]["description"]="Data sources to read from:
 Cloud-init supports searching different \"Data Sources\" for information
 that it uses to configure a cloud instance.
 .
 Please note that \"EC2 Metadata service\" should be used only if
 the EC2 metadata service is present. Otherwise, it will trigger
 a very noticeable timeout on boot.
";
$elem["cloud-init/datasources"]["descriptionde"]="Datenquellen, von denen gelesen werden soll:
 Cloud-init unterstützt das Durchsuchen verschiedener »Datenquellen« nach Informationen, die es zur Konfiguration einer Cloud-Instanz verwendet.
 .
 Bitte beachten Sie, dass der »EC2-Metadatendienst« nur benutzt werden sollte, falls er vorhanden ist. Andernfalls wird dies eine spürbare Zeitüberschreitung beim Systemstart auslösen.
";
$elem["cloud-init/datasources"]["descriptionfr"]="Sources des données à lire :
 Cloud-init gère la recherche de différentes « sources de données » pour configurer une instance dans le nuage.
 .
 Veuillez noter que l'option « Service de métadonnées pour EC2 » ne devrait être sélectionnée que si ce service est présent. Dans le cas contraire, une longue pause se manifestera lors du démarrage.
";
$elem["cloud-init/datasources"]["default"]="NoCloud, AltCloud, CloudStack, ConfigDrive, Ec2, MAAS, OVF, GCE, None";
PKG_OptionPageTail2($elem);
?>
