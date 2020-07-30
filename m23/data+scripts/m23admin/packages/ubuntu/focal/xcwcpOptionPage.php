<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xcwcp");

$elem["xcwcp/suid_bit"]["type"]="boolean";
$elem["xcwcp/suid_bit"]["description"]="Make xcwcp setuid root?
 xcwcp can produce sounds using console buzzer, but this feature
 is available only if xcwcp is run by root user.
 You can achieve this by setting setuid bit here (not recommended)
 or by running xcwcp with sudo (also not recommended). You can also
 use soundcard output instead of console buzzer output and
 eliminate this problem completely.
";
$elem["xcwcp/suid_bit"]["descriptionde"]="";
$elem["xcwcp/suid_bit"]["descriptionfr"]="";
$elem["xcwcp/suid_bit"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
