<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("igaelic");

$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["igaelic/languages"]["type"]="text";
$elem["igaelic/languages"]["description"]="Description:

";
$elem["igaelic/languages"]["descriptionde"]="";
$elem["igaelic/languages"]["descriptionfr"]="";
$elem["igaelic/languages"]["default"]="Gaidhlig (Scots Gaelic)";
$elem["shared/packages-ispell"]["type"]="text";
$elem["shared/packages-ispell"]["description"]="Description:

";
$elem["shared/packages-ispell"]["descriptionde"]="";
$elem["shared/packages-ispell"]["descriptionfr"]="";
$elem["shared/packages-ispell"]["default"]="";
$elem["igaelic/languages"]["type"]="text";
$elem["igaelic/languages"]["description"]="Description:

";
$elem["igaelic/languages"]["descriptionde"]="";
$elem["igaelic/languages"]["descriptionfr"]="";
$elem["igaelic/languages"]["default"]="Gaidhlig (Scots Gaelic)";
$elem["igaelic/gather-translations"]["type"]="text";
$elem["igaelic/gather-translations"]["description"]="Description:
";
$elem["igaelic/gather-translations"]["descriptionde"]="";
$elem["igaelic/gather-translations"]["descriptionfr"]="";
$elem["igaelic/gather-translations"]["default"]="Gaidhlig (Scots Gaelic)";
PKG_OptionPageTail2($elem);
?>
