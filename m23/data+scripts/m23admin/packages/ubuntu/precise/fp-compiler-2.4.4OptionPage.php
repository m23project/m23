<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fp-compiler-2.4.4");

$elem["fp-compiler-2.4.4/rename_cfg"]["type"]="boolean";
$elem["fp-compiler-2.4.4/rename_cfg"]["description"]="Do you want to rename \"/etc/fpc.cfg\" to \"/etc/fpc.cfg.bak\"?
 FPC supports now multiple version installations. This allows co-existence of
 multiple versions on the same system. The default version can be selected using
 the update-alternatives command for the following groups:
     1)fpc      : compiler default version
     2)fpc.cfg  : configuration file default version
     3)fp-utils : helper tools default version
 .
 What ever version you may choose as default, the configuration files (2) are
 always backward compatible and it may be very safe to use the latest version
 for it.
 .
 In order to use alternatives system for system wide FPC configuration file you
 need to accept renaming \"/etc/fpc.cfg\", otherwise you will need to manage this
 manually by yourself.
";
$elem["fp-compiler-2.4.4/rename_cfg"]["descriptionde"]="";
$elem["fp-compiler-2.4.4/rename_cfg"]["descriptionfr"]="";
$elem["fp-compiler-2.4.4/rename_cfg"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
