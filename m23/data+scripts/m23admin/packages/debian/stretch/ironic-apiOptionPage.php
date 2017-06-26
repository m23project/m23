<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ironic-api");

$elem["ironic/register-endpoint"]["type"]="boolean";
$elem["ironic/register-endpoint"]["description"]="Register Ironic in the Keystone endpoint catalog?
 Each OpenStack service (each API) should be registered in order to be
 accessible. This is done using \"keystone service-create\" and \"keystone
 endpoint-create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.

";
$elem["ironic/register-endpoint"]["descriptionde"]="";
$elem["ironic/register-endpoint"]["descriptionfr"]="";
$elem["ironic/register-endpoint"]["default"]="false";
$elem["ironic/keystone-ip"]["type"]="string";
$elem["ironic/keystone-ip"]["description"]="Keystone server IP address:
 Please enter the IP address of the Keystone server, so that ironic-api can
 contact Keystone to do the Ironic service and endpoint creation.

";
$elem["ironic/keystone-ip"]["descriptionde"]="";
$elem["ironic/keystone-ip"]["descriptionfr"]="";
$elem["ironic/keystone-ip"]["default"]="";
$elem["ironic/keystone-admin-name"]["type"]="string";
$elem["ironic/keystone-admin-name"]["description"]="Keystone admin name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.

";
$elem["ironic/keystone-admin-name"]["descriptionde"]="";
$elem["ironic/keystone-admin-name"]["descriptionfr"]="";
$elem["ironic/keystone-admin-name"]["default"]="admin";
$elem["ironic/keystone-project-name"]["type"]="string";
$elem["ironic/keystone-project-name"]["description"]="Keystone admin project name:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.

";
$elem["ironic/keystone-project-name"]["descriptionde"]="";
$elem["ironic/keystone-project-name"]["descriptionfr"]="";
$elem["ironic/keystone-project-name"]["default"]="admin";
$elem["ironic/keystone-admin-password"]["type"]="password";
$elem["ironic/keystone-admin-password"]["description"]="Keystone admin password:
 To register the service endpoint, this package needs to know the Admin login,
 name, project name, and password to the Keystone server.

";
$elem["ironic/keystone-admin-password"]["descriptionde"]="";
$elem["ironic/keystone-admin-password"]["descriptionfr"]="";
$elem["ironic/keystone-admin-password"]["default"]="";
$elem["ironic/endpoint-ip"]["type"]="string";
$elem["ironic/endpoint-ip"]["description"]="Ironic endpoint IP address:
 Please enter the IP address that will be used to contact Ironic.
 .
 This IP address should be accessible from the clients that will use this
 service, so if you are installing a public cloud, this should be a public
 IP address.

";
$elem["ironic/endpoint-ip"]["descriptionde"]="";
$elem["ironic/endpoint-ip"]["descriptionfr"]="";
$elem["ironic/endpoint-ip"]["default"]="";
$elem["ironic/region-name"]["type"]="string";
$elem["ironic/region-name"]["description"]="Name of the region to register:
 OpenStack supports using availability zones, with each region representing
 a location. Please enter the zone that you wish to use when registering the
 endpoint.
";
$elem["ironic/region-name"]["descriptionde"]="";
$elem["ironic/region-name"]["descriptionfr"]="";
$elem["ironic/region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>
