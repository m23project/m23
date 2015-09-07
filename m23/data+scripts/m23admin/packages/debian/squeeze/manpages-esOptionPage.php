<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("manpages-es");

$elem["manpages-es/enable-manpages"]["type"]="note";
$elem["manpages-es/enable-manpages"]["description"]="How to enable Spanish manpages
 To enable Spanish manpages set the environment variable LC_MESSAGES to
 'es' (or es_ZZ where ZZ is your country code). See an example for this in
 the 'user-es' package. Man will then search for Spanish manpages under
 /usr/share/man/es, /usr/local/share/man/es, /usr/man/es and
 /usr/local/man/es.
";
$elem["manpages-es/enable-manpages"]["descriptionde"]="";
$elem["manpages-es/enable-manpages"]["descriptionfr"]="";
$elem["manpages-es/enable-manpages"]["default"]="";
PKG_OptionPageTail2($elem);
?>
