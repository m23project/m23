<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lcl-utils-0.9.30.2");

$elem["lcl-utils-0.9.30.2/rename_cfg"]["type"]="boolean";
$elem["lcl-utils-0.9.30.2/rename_cfg"]["description"]="Do you want to rename \"/etc/lazarus\" to \"/etc/lazarus.bak\"?
 Lazarus supports now multiple version installations. This allows co-existence
 of multiple versions on the same system. The default version can be selected
 using the update-alternatives command for the following groups:
     1)lazarus-ide  : IDE default version
     2)lazarus  : configuration file and helper tools default version
 .
 What ever version you may choose as default, the configuration files (2) are
 not always backward compatible and it may be unsafe to use the same version
 for all installed Lazarus versions.
 .
 In order to use alternatives system for system wide Lazarus configuration file
 you need to accept renaming \"/etc/lazarus\", othewise you will need to manage
 this manually by yourself.
";
$elem["lcl-utils-0.9.30.2/rename_cfg"]["descriptionde"]="";
$elem["lcl-utils-0.9.30.2/rename_cfg"]["descriptionfr"]="";
$elem["lcl-utils-0.9.30.2/rename_cfg"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
