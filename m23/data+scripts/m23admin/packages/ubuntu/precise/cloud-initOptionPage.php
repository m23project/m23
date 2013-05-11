<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cloud-init");

$elem["cloud-init/datasources"]["type"]="multiselect";
$elem["cloud-init/datasources"]["choices"][1]="NoCloud: Reads info from /var/lib/cloud/seed only";
$elem["cloud-init/datasources"]["choices"][2]="ConfigDrive: Reads data from Openstack Config Drive";
$elem["cloud-init/datasources"]["choices"][3]="OVF: Reads data from OVF Transports";
$elem["cloud-init/datasources"]["choices"][4]="MAAS: Reads data from Ubuntu MAAS";
$elem["cloud-init/datasources"]["description"]="Which data sources should be searched?
 Cloud-init supports searching different \"Data Sources\" for information
 that it uses to configure a cloud instance.
 .
 Warning: Only select 'Ec2' if this system will be run on a system with
 the EC2 metadata service present.  Doing so incorrectly will result in
 a substantial timeout on boot.
";
$elem["cloud-init/datasources"]["descriptionde"]="";
$elem["cloud-init/datasources"]["descriptionfr"]="";
$elem["cloud-init/datasources"]["default"]="NoCloud, ConfigDrive, OVF, MAAS";
PKG_OptionPageTail2($elem);
?>
