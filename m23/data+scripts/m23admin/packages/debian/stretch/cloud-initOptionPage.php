<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cloud-init");

$elem["cloud-init/datasources"]["type"]="multiselect";
$elem["cloud-init/datasources"]["choices"][1]="NoCloud: Use /var/lib/cloud/seed";
$elem["cloud-init/datasources"]["choices"][2]="ConfigDrive: OpenStack config drive";
$elem["cloud-init/datasources"]["choices"][3]="OpenNebula: OpenNebula context disk";
$elem["cloud-init/datasources"]["choices"][4]="Azure: Microsoft Azure. Requires waagent package!";
$elem["cloud-init/datasources"]["choices"][5]="AltCloud: RHEVm and vSphere config disks";
$elem["cloud-init/datasources"]["choices"][6]="OVF: OVF transports";
$elem["cloud-init/datasources"]["choices"][7]="MAAS: Ubuntu MAAS";
$elem["cloud-init/datasources"]["choices"][8]="GCE: Google Compute metadata service";
$elem["cloud-init/datasources"]["choices"][9]="OpenStack: Native OpenStack metadata service";
$elem["cloud-init/datasources"]["choices"][10]="CloudSigma: Metadata over serial for cloudsigma.com";
$elem["cloud-init/datasources"]["choices"][11]="SmartOS: SmartOS metadata service";
$elem["cloud-init/datasources"]["choices"][12]="Ec2: EC2 Metadata service";
$elem["cloud-init/datasources"]["choices"][13]="CloudStack: CloudStack metadata service";
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
$elem["cloud-init/datasources"]["default"]="NoCloud, ConfigDrive, OpenNebula, Azure, AltCloud, OVF, MAAS, GCE, OpenStack, CloudSigma, SmartOS, Ec2, CloudStack, None";
PKG_OptionPageTail2($elem);
?>
