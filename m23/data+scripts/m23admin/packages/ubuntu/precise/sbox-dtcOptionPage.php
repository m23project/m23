<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sbox-dtc");

$elem["sbox-dtc/conf_use_dtc_dtcgrp"]["type"]="boolean";
$elem["sbox-dtc/conf_use_dtc_dtcgrp"]["description"]="Use dtc:dtcgrp for the sbox binary?
 Under Debian, apache runs under www-data:www-data. This is ok if running only
 apache, but if using sbox-dtc together with the DTC control panel, you need to
 have sbox chown to dtc:dtcgrp. In that case, you want create the dtc user and
 dtcgrp group, and chown the sbox binary to dtc:dtcgrp, otherwise you don't.
";
$elem["sbox-dtc/conf_use_dtc_dtcgrp"]["descriptionde"]="dtc:dtcgrp für das sbox-Programm verwenden?
 Unter Debian läuft apache als www-data:www-data. Dies ist in Ordnung, falls nur Apache benutzt wird. Aber wenn sbox-dtc zusammen mit dem DTC Control Panel verwendet wird, muss sbox dtc:dtcgrp gehören. In diesem Fall sollten Sie den Benutzer dtc und die Gruppe dtcgrp anlegen und dtc:dtcgrp als Eigentümer für sbox verwenden, anderenfalls nicht.
";
$elem["sbox-dtc/conf_use_dtc_dtcgrp"]["descriptionfr"]="Faut-il utiliser dtc:dtcgrp pour l'exécutable sbox ?
 Sous Debian, apache fonctionne avec les privilèges de l'utilisateur www-data et du groupe de même nom. Ceci est correct si seul apache fonctionne, mais si sbx-dtc est utilisé conjointement avec le panneau de contrôle de DTC, il faudra changer le propriétaire en dtc:dtcgrp. Dans ce cas, il vous faudra créer l'utilisateur dtc et le groupe dtcgrp, et modifier le propriétaire de l'exécutable sbox en dtc:dtcgrp.
";
$elem["sbox-dtc/conf_use_dtc_dtcgrp"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
