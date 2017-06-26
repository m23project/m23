<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("senlin-api");

$elem["senlin/register-endpoint"]["type"]="boolean";
$elem["senlin/register-endpoint"]["description"]="Register Senlin in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.

";
$elem["senlin/register-endpoint"]["descriptionde"]="";
$elem["senlin/register-endpoint"]["descriptionfr"]="";
$elem["senlin/register-endpoint"]["default"]="false";
$elem["senlin/keystone-ip"]["type"]="string";
$elem["senlin/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that senlin-api can
 contact Keystone to do the Senlin service and endpoint creation.

";
$elem["senlin/keystone-ip"]["descriptionde"]="";
$elem["senlin/keystone-ip"]["descriptionfr"]="";
$elem["senlin/keystone-ip"]["default"]="";
$elem["senlin/keystone-admin-name"]["type"]="string";
$elem["senlin/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.

";
$elem["senlin/keystone-admin-name"]["descriptionde"]="";
$elem["senlin/keystone-admin-name"]["descriptionfr"]="";
$elem["senlin/keystone-admin-name"]["default"]="admin";
$elem["senlin/keystone-project-name"]["type"]="string";
$elem["senlin/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.

";
$elem["senlin/keystone-project-name"]["descriptionde"]="";
$elem["senlin/keystone-project-name"]["descriptionfr"]="";
$elem["senlin/keystone-project-name"]["default"]="admin";
$elem["senlin/keystone-admin-password"]["type"]="password";
$elem["senlin/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.

";
$elem["senlin/keystone-admin-password"]["descriptionde"]="";
$elem["senlin/keystone-admin-password"]["descriptionfr"]="";
$elem["senlin/keystone-admin-password"]["default"]="";
$elem["senlin/endpoint-ip"]["type"]="string";
$elem["senlin/endpoint-ip"]["description"]="Senlin endpoint IP address:
 Please enter the IP address that will be used to contact Senlin.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.

";
$elem["senlin/endpoint-ip"]["descriptionde"]="";
$elem["senlin/endpoint-ip"]["descriptionfr"]="";
$elem["senlin/endpoint-ip"]["default"]="";
$elem["senlin/region-name"]["type"]="string";
$elem["senlin/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["senlin/region-name"]["descriptionde"]="";
$elem["senlin/region-name"]["descriptionfr"]="";
$elem["senlin/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
