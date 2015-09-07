<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zephyr-server-krb5");

$elem["zephyr-server/servers"]["type"]="string";
$elem["zephyr-server/servers"]["description"]="Zephyr servers:
 Please specify the full names of the Zephyr servers, as a
 space-separated list.
 .
 The list configured on clients can be a subset of the list configured
 on servers.
";
$elem["zephyr-server/servers"]["descriptionde"]="Zephyr-Server:
 Bitte geben Sie eine durch Leerzeichen getrennte Liste der Namen der Zephyr-Server an.
 .
 Die Listen auf den konfigurierten Clients können eine Untermenge der Listen auf den konfigurierten Servern sein.
";
$elem["zephyr-server/servers"]["descriptionfr"]="Serveurs Zephyr :
 Veuillez indiquer le nom complet des serveurs Zephyr, séparés par un espace.
 .
 La liste configurée sur les clients peut être un sous-ensemble de la liste configurée sur les serveurs.
";
$elem["zephyr-server/servers"]["default"]="";
$elem["zephyr-server/read_conf"]["type"]="boolean";
$elem["zephyr-server/read_conf"]["description"]="for internal use
 We want to try and capture user changes when they edit a config file
 manually.  To do this we look at the file in the config script. However,
 in the case of preconfigure, the config script is run twice before the
 postinst is run.  Thus we may read the wrong value before the edited value
 is written out in postinst. If this is false we skip reading config files
 until postinst runs.
";
$elem["zephyr-server/read_conf"]["descriptionde"]="";
$elem["zephyr-server/read_conf"]["descriptionfr"]="";
$elem["zephyr-server/read_conf"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
