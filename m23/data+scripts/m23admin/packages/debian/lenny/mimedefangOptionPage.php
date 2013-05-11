<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mimedefang");

$elem["mimedefang/embedperl"]["type"]="boolean";
$elem["mimedefang/embedperl"]["description"]="Should MIMEDefang use an embedded Perl interpreter? 
 Choosing this option is generally safe and will significantly improve
 performance. However, some systems do not support it. See
 mimedefang-multiplexor(8) for more details on using an embedded Perl
 interpreter
";
$elem["mimedefang/embedperl"]["descriptionde"]="Soll MIMEDefang einen eingebetteten Perl-Interpreter verwenden?
 Die Auswahl dieser Option ist im allgemeinen problemlos und wird die Leistung signifikant erhöhen. Allerdings unterstützen einige Systeme sie nicht. Lesen Sie mimedefang-multiplexor(8) für Details über die Verwendung eines eingebetteten Perl-Interpreters.
";
$elem["mimedefang/embedperl"]["descriptionfr"]="Souhaitez-vous que MIMEDefang utilise un interpréteur Perl embarqué ?
 Le choix de cette option est, en général, sans risque et améliore les performances de manière significative. Elle n'est néanmoins pas prise en charge par tous les systèmes. Veuillez consulter la page de manuel de mimedefang-multiplexor(8) pour plus de détails sur l'utilisation d'un interpréteur Perl embarqué.
";
$elem["mimedefang/embedperl"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
