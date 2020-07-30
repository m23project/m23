<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cloud-init");

$elem["cloud-init/datasources"]["type"]="multiselect";
$elem["cloud-init/datasources"]["choices"][1]="NoCloud: Reads info from /var/lib/cloud/seed only";
$elem["cloud-init/datasources"]["choices"][2]="ConfigDrive: Reads data from Openstack Config Drive";
$elem["cloud-init/datasources"]["choices"][3]="OpenNebula: read from OpenNebula context disk";
$elem["cloud-init/datasources"]["choices"][4]="DigitalOcean: reads data from Droplet datasource";
$elem["cloud-init/datasources"]["choices"][5]="Azure: read from MS Azure cdrom. Requires walinux-agent";
$elem["cloud-init/datasources"]["choices"][6]="AltCloud: config disks for RHEVm and vSphere";
$elem["cloud-init/datasources"]["choices"][7]="OVF: Reads data from OVF Transports";
$elem["cloud-init/datasources"]["choices"][8]="MAAS: Reads data from Ubuntu MAAS";
$elem["cloud-init/datasources"]["choices"][9]="GCE: google compute metadata service";
$elem["cloud-init/datasources"]["choices"][10]="OpenStack: native openstack metadata service";
$elem["cloud-init/datasources"]["choices"][11]="CloudSigma: metadata over serial for cloudsigma.com";
$elem["cloud-init/datasources"]["choices"][12]=" SmartOS: Read from SmartOS metadata service";
$elem["cloud-init/datasources"]["choices"][13]="Bigstep: Bigstep metadata service";
$elem["cloud-init/datasources"]["choices"][14]="Scaleway: Scaleway metadata service";
$elem["cloud-init/datasources"]["choices"][15]="AliYun: Alibaba metadata service";
$elem["cloud-init/datasources"]["choices"][16]="Ec2: reads data from EC2 Metadata service";
$elem["cloud-init/datasources"]["choices"][17]="CloudStack: Read from CloudStack metadata service";
$elem["cloud-init/datasources"]["choices"][18]="Hetzner: Hetzner Cloud";
$elem["cloud-init/datasources"]["choices"][19]="IBMCloud: IBM Cloud. Previously softlayer or bluemix.";
$elem["cloud-init/datasources"]["choices"][20]="Oracle: Oracle Compute Infrastructure";
$elem["cloud-init/datasources"]["choices"][21]="Exoscale: Exoscale";
$elem["cloud-init/datasources"]["choices"][22]="RbxCloud: HyperOne and Rootbox platforms";
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
$elem["cloud-init/datasources"]["default"]="NoCloud, ConfigDrive, OpenNebula, DigitalOcean, Azure, AltCloud, OVF, MAAS, GCE, OpenStack, CloudSigma, SmartOS, Bigstep, Scaleway, AliYun, Ec2, CloudStack, Hetzner, IBMCloud, Oracle, Exoscale, RbxCloud, None";
PKG_OptionPageTail2($elem);
?>
