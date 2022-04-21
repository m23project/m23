<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnocchi-api");

$elem["gnocchi/configure_api-endpoint"]["type"]="boolean";
$elem["gnocchi/configure_api-endpoint"]["description"]="Register this service in the Keystone endpoint catalog?
 Each OpenStack service (each API) must be registered in the Keystone catalog
 in order to be accessible. This is done using \"openstack service create\" and
 \"openstack endpoint create\". This can be done automatically now.
 .
 Note that you will need to have an up and running Keystone server on which to
 connect using a known admin project name, admin username and password. The
 admin auth token is not used anymore.
 .
 Also, if a service with a matching name is already present in the Keystone
 catalog, endpoint registration will be aborted.
";
$elem["gnocchi/configure_api-endpoint"]["descriptionde"]="";
$elem["gnocchi/configure_api-endpoint"]["descriptionfr"]="";
$elem["gnocchi/configure_api-endpoint"]["default"]="false";
$elem["gnocchi/api-keystone-address"]["type"]="string";
$elem["gnocchi/api-keystone-address"]["description"]="Keystone server address:
 Please enter the address (IP or resolvable address) of the Keystone server,
 for creating the new service and endpoints.
 .
 Any non-valid ipv4, ipv6 or host address string will abort the endpoint
 registration.
";
$elem["gnocchi/api-keystone-address"]["descriptionde"]="Adresse des Keystone-Servers:
 Bitte geben Sie die Adresse (IP-Adresse oder auflösbare Adresse) des Keystone-Servers an, um den neuen Dienst und die Endpunkte zu erstellen.
 .
 Jede ungültige IPv4-, IPv6- oder Rechneradresszeichenkette wird die Registrierung des Endpunkts abbrechen.
";
$elem["gnocchi/api-keystone-address"]["descriptionfr"]="";
$elem["gnocchi/api-keystone-address"]["default"]="";
$elem["gnocchi/api-keystone-proto"]["type"]="select";
$elem["gnocchi/api-keystone-proto"]["choices"][1]="http";
$elem["gnocchi/api-keystone-proto"]["description"]="Keystone endpoint protocol:

";
$elem["gnocchi/api-keystone-proto"]["descriptionde"]="";
$elem["gnocchi/api-keystone-proto"]["descriptionfr"]="";
$elem["gnocchi/api-keystone-proto"]["default"]="http";
$elem["gnocchi/api-keystone-admin-username"]["type"]="string";
$elem["gnocchi/api-keystone-admin-username"]["description"]="Keystone admin username:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["gnocchi/api-keystone-admin-username"]["descriptionde"]="";
$elem["gnocchi/api-keystone-admin-username"]["descriptionfr"]="";
$elem["gnocchi/api-keystone-admin-username"]["default"]="admin";
$elem["gnocchi/api-keystone-admin-project-name"]["type"]="string";
$elem["gnocchi/api-keystone-admin-project-name"]["description"]="Keystone admin project name:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["gnocchi/api-keystone-admin-project-name"]["descriptionde"]="";
$elem["gnocchi/api-keystone-admin-project-name"]["descriptionfr"]="";
$elem["gnocchi/api-keystone-admin-project-name"]["default"]="admin";
$elem["gnocchi/api-keystone-admin-password"]["type"]="password";
$elem["gnocchi/api-keystone-admin-password"]["description"]="Keystone admin password:
 To create the service endpoint, this package needs to know the Admin
 username, project name, and password, so it can issue commands through the
 Keystone API.
";
$elem["gnocchi/api-keystone-admin-password"]["descriptionde"]="";
$elem["gnocchi/api-keystone-admin-password"]["descriptionfr"]="";
$elem["gnocchi/api-keystone-admin-password"]["default"]="";
$elem["gnocchi/api-endpoint-address"]["type"]="string";
$elem["gnocchi/api-endpoint-address"]["description"]="This service endpoint address:
 Please enter the endpoint address that will be used to contact this service.
 You can specify either a Fully Qualified Domain Name (FQDN) or an IP address.
";
$elem["gnocchi/api-endpoint-address"]["descriptionde"]="";
$elem["gnocchi/api-endpoint-address"]["descriptionfr"]="";
$elem["gnocchi/api-endpoint-address"]["default"]="";
$elem["gnocchi/api-endpoint-proto"]["type"]="select";
$elem["gnocchi/api-endpoint-proto"]["choices"][1]="http";
$elem["gnocchi/api-endpoint-proto"]["description"]="This service endpoint protocol:

";
$elem["gnocchi/api-endpoint-proto"]["descriptionde"]="";
$elem["gnocchi/api-endpoint-proto"]["descriptionfr"]="";
$elem["gnocchi/api-endpoint-proto"]["default"]="http";
$elem["gnocchi/api-endpoint-region-name"]["type"]="string";
$elem["gnocchi/api-endpoint-region-name"]["description"]="Name of the region to register:
 OpenStack supports using regions, with each region representing a different
 location (usually a different data center). Please enter the region name that
 you wish to use when registering the endpoint.
 .
 The region name is usually a string containing only ASCII alphanumerics,
 dots, and dashes.
 .
 A non-valid string will abort the API endpoint registration.
";
$elem["gnocchi/api-endpoint-region-name"]["descriptionde"]="";
$elem["gnocchi/api-endpoint-region-name"]["descriptionfr"]="";
$elem["gnocchi/api-endpoint-region-name"]["default"]="regionOne";
PKG_OptionPageTail2($elem);
?>