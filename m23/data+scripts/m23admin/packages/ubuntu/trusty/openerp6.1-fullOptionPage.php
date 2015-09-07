<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openerp6.1-full");

$elem["openerp6.1-full/install_type"]["type"]="select";
$elem["openerp6.1-full/install_type"]["choices"][1]="local";
$elem["openerp6.1-full/install_type"]["description"]="What's the location of your PostgreSQL server? [local|remote]
 The openerp6.1-full package needs to configure your OpenERP settings depending on PostgreSQL server.

";
$elem["openerp6.1-full/install_type"]["descriptionde"]="";
$elem["openerp6.1-full/install_type"]["descriptionfr"]="";
$elem["openerp6.1-full/install_type"]["default"]="local";
$elem["openerp6.1-full/install_host"]["type"]="string";
$elem["openerp6.1-full/install_host"]["description"]="Hostname for your PostgreSQL server
 The openerp6.1-full package needs to configure your PostgreSQL hostname.

";
$elem["openerp6.1-full/install_host"]["descriptionde"]="";
$elem["openerp6.1-full/install_host"]["descriptionfr"]="";
$elem["openerp6.1-full/install_host"]["default"]="";
$elem["openerp6.1-full/install_user"]["type"]="string";
$elem["openerp6.1-full/install_user"]["description"]="Username for your PostgreSQL server
 The openerp6.1-full package needs to configure your PostgreSQL user.

";
$elem["openerp6.1-full/install_user"]["descriptionde"]="";
$elem["openerp6.1-full/install_user"]["descriptionfr"]="";
$elem["openerp6.1-full/install_user"]["default"]="";
$elem["openerp6.1-full/install_password"]["type"]="password";
$elem["openerp6.1-full/install_password"]["description"]="Password for your PostgreSQL server
 The openerp6.1-full package needs to configure your PostgreSQL password.

";
$elem["openerp6.1-full/install_password"]["descriptionde"]="";
$elem["openerp6.1-full/install_password"]["descriptionfr"]="";
$elem["openerp6.1-full/install_password"]["default"]="";
$elem["openerp6.1-full/install_port"]["type"]="string";
$elem["openerp6.1-full/install_port"]["description"]="Port for your PostgreSQL server [5432]
 The openerp6.1-full package needs to configure your PostgreSQL port.

";
$elem["openerp6.1-full/install_port"]["descriptionde"]="";
$elem["openerp6.1-full/install_port"]["descriptionfr"]="";
$elem["openerp6.1-full/install_port"]["default"]="5432";
$elem["openerp6.1-full/remove_user"]["type"]="boolean";
$elem["openerp6.1-full/remove_user"]["description"]="Do you want to remove the OpenERP PostgreSQL User?
 The openerp6.1-full package needs to remove your OpenERP PostgreSQL user.
 .
 This will remove the openerp user that was previously created in your PostgreSQL server.
";
$elem["openerp6.1-full/remove_user"]["descriptionde"]="";
$elem["openerp6.1-full/remove_user"]["descriptionfr"]="";
$elem["openerp6.1-full/remove_user"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
