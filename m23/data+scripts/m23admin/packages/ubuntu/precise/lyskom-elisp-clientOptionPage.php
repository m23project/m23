<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lyskom-elisp-client");

$elem["lyskom-elisp-client/server-list-query"]["type"]="boolean";
$elem["lyskom-elisp-client/server-list-query"]["description"]="Exclude non-English servers from default server list?
 The LysKOM Elisp Client normally comes with a default server list that
 includes one server for communication in English, one Finnish server and a
 dozen Swedish servers. If you don't know Swedish (or Finnish), you
 will have little or no use for those servers.
";
$elem["lyskom-elisp-client/server-list-query"]["descriptionde"]="Nicht-englische Server von der Standard-Serverliste ausschließen?
 Der LysKOM Elisp-Client kommt normalerweise mit einer Standard-Serverliste die einen Server für die Kommunikation auf englisch, einen finnischen Server und ein Dutzend schwedische Server enthält. Falls Sie kein schwedisch (oder finnisch) können, werden Sie keine oder nur geringen Nutzen von diesen Servern haben.
";
$elem["lyskom-elisp-client/server-list-query"]["descriptionfr"]="Faut-il exclure les serveurs non anglophones ?
 Le client Elisp pour LysKOM est installé avec une liste de serveurs par défaut. Celle-ci inclut un serveur anglophone, un autre pour le finlandais, et une douzaine d'autres pour le suédois. Si vous ne connaissez ni le suédois ni le finlandais, ces serveurs vous seront de peu d'utilité.
";
$elem["lyskom-elisp-client/server-list-query"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
