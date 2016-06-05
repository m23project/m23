<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("trn");

$elem["shared/news/server"]["type"]="string";
$elem["shared/news/server"]["description"]="What news server should be used for reading and posting news?
 trn is configured to read news via an NNTP connection, and needs to know
 the fully-qualified host name of the server (such as news.example.com). If
 you have a local news spool, you should consider installing some NNTP
 server like inn2; in that case, enter \"localhost\" as your news server.
";
$elem["shared/news/server"]["descriptionde"]="";
$elem["shared/news/server"]["descriptionfr"]="";
$elem["shared/news/server"]["default"]="";
PKG_OptionPageTail2($elem);
?>
