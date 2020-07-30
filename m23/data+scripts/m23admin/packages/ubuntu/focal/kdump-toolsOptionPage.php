<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kdump-tools");

$elem["kdump-tools/use_kdump"]["type"]="boolean";
$elem["kdump-tools/use_kdump"]["description"]="Should kdump-tools be enabled by default?
 If you choose this option, the kdump-tools mechanism will be
 enabled. A reboot is still required in order to enable the
 crashkernel kernel parameter.
";
$elem["kdump-tools/use_kdump"]["descriptionde"]="Sollen die »kdump-tools« standardmäßig aktiviert werden?
 Falls Sie diese Option auswählen, wird der »kdump-tools«-Mechanismus aktiviert. Ein Systemneustart ist immer noch erforderlich, um die Crashkernel-Kernel-Parameter zu aktivieren.
";
$elem["kdump-tools/use_kdump"]["descriptionfr"]="Activer kdump-tools par défaut ?
 Si vous choisissez cette option, le mécanisme de kdump-tools sera activé. Un redémarrage est nécessaire afin d'activer le paramètre crashkernel du noyau.
";
$elem["kdump-tools/use_kdump"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
