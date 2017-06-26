<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("open-isns-server");

$elem["open-isns-server/purge-auth-key"]["type"]="boolean";
$elem["open-isns-server/purge-auth-key"]["description"]="Remove /etc/isns/auth_key?
 The private authentication key /etc/isns/auth_key was likely generated
 during the  installation of the open-isns-server package. If you are
 using other iSNS-related utilities (such as the disocvery daemon or
 isnsadm) that require this authentication key, you should not remove
 it.
 .
 Otherwise, it is safe to remove it.
";
$elem["open-isns-server/purge-auth-key"]["descriptionde"]="";
$elem["open-isns-server/purge-auth-key"]["descriptionfr"]="Supprimer /etc/isns/auth_key ?
 La clé privée d'authentification /etc/isns/auth_key a vraisemblablement été créée lors de l'installation du paquet open-isns-server. Si vous utilisez d'autres utilitaires liés à iSNS (tels que le démon de découverte ou isnsadm) qui ont besoin de cette clé d'authentification, vous ne devez pas la supprimer.
 .
 Autrement, il est plus sûr de la supprimer.
";
$elem["open-isns-server/purge-auth-key"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
