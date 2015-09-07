<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mythbuntu-diskless-server");

$elem["mythbuntu-diskless/create_share"]["type"]="boolean";
$elem["mythbuntu-diskless/create_share"]["description"]="Enable NFS export for overlay directory?
 By default, Mythbuntu-diskless uses a NFS share to store any changes
 made on the clients, eg your LIRC config and other files.
 .
 This option adds  /var/cache/mythbuntu-diskless/overlay/
 to /etc/exports.
 .
 Note: this entry will be removed again if you remove this package.

";
$elem["mythbuntu-diskless/create_share"]["descriptionde"]="";
$elem["mythbuntu-diskless/create_share"]["descriptionfr"]="";
$elem["mythbuntu-diskless/create_share"]["default"]="false";
$elem["mythbuntu-diskless/share_host"]["type"]="string";
$elem["mythbuntu-diskless/share_host"]["description"]="Hosts allowed to mount the overlay share:
 Here you can set which hosts can mount the overlay share.
 See man 5 exports for details.
 .
 Default is * which will allow every host to mount the share.
 This setting is not recommended because it's very insecure.
 .
 Example: 192.168.0.0/24

";
$elem["mythbuntu-diskless/share_host"]["descriptionde"]="";
$elem["mythbuntu-diskless/share_host"]["descriptionfr"]="";
$elem["mythbuntu-diskless/share_host"]["default"]="*";
PKG_OptionPageTail2($elem);
?>
