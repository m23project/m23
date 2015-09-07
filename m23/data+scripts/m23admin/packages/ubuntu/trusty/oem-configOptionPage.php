<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("oem-config");

$elem["oem-config/remove"]["type"]="boolean";
$elem["oem-config/remove"]["description"]="for internal use; can be preseeded
 Remove oem-config on successful completion

";
$elem["oem-config/remove"]["descriptionde"]="";
$elem["oem-config/remove"]["descriptionfr"]="";
$elem["oem-config/remove"]["default"]="true";
$elem["oem-config/removing"]["type"]="text";
$elem["oem-config/removing"]["description"]="Removing packages
";
$elem["oem-config/removing"]["descriptionde"]="Pakete werden entfernt
";
$elem["oem-config/removing"]["descriptionfr"]="Suppression des paquets
";
$elem["oem-config/removing"]["default"]="";
$elem["oem-config/early_command"]["type"]="string";
$elem["oem-config/early_command"]["description"]="for internal use; can be preseeded
 Run a command just before oem-config starts.

";
$elem["oem-config/early_command"]["descriptionde"]="";
$elem["oem-config/early_command"]["descriptionfr"]="";
$elem["oem-config/early_command"]["default"]="";
$elem["oem-config/late_command"]["type"]="string";
$elem["oem-config/late_command"]["description"]="for internal use; can be preseeded
 Run a command after oem-config completes.

";
$elem["oem-config/late_command"]["descriptionde"]="";
$elem["oem-config/late_command"]["descriptionfr"]="";
$elem["oem-config/late_command"]["default"]="";
$elem["oem-config/extra_packages"]["type"]="string";
$elem["oem-config/extra_packages"]["description"]="for internal use; can be preseeded
 Comma/space-separated list of extra packages to install
 as part of user configuration

";
$elem["oem-config/extra_packages"]["descriptionde"]="";
$elem["oem-config/extra_packages"]["descriptionfr"]="";
$elem["oem-config/extra_packages"]["default"]="";
$elem["oem-config/repository"]["type"]="string";
$elem["oem-config/repository"]["description"]="for internal use; can be preseeded
 Line to enter into sources.list for the duration of
 oem-config/extra_packages

";
$elem["oem-config/repository"]["descriptionde"]="";
$elem["oem-config/repository"]["descriptionfr"]="";
$elem["oem-config/repository"]["default"]="";
$elem["oem-config/key"]["type"]="string";
$elem["oem-config/key"]["description"]="for internal use; can be preseeded
 Path of a public key that packages in oem-config/repository
 are signed with.

";
$elem["oem-config/key"]["descriptionde"]="";
$elem["oem-config/key"]["descriptionfr"]="";
$elem["oem-config/key"]["default"]="";
$elem["oem-config/install-language-support"]["type"]="boolean";
$elem["oem-config/install-language-support"]["description"]="for internal use; can be preseeded
 Install language support packages for the locale that has been selected by
 the user.  Ensure you have provided these packages in oem-config/repository
 or can guarantee a connection to the Internet.

";
$elem["oem-config/install-language-support"]["descriptionde"]="";
$elem["oem-config/install-language-support"]["descriptionfr"]="";
$elem["oem-config/install-language-support"]["default"]="false";
$elem["oem-config/remove_extras"]["type"]="boolean";
$elem["oem-config/remove_extras"]["description"]="for internal use; can be preseeded
 Remove packages that were not part of the base install and are not needed
 by the final system.
";
$elem["oem-config/remove_extras"]["descriptionde"]="";
$elem["oem-config/remove_extras"]["descriptionfr"]="";
$elem["oem-config/remove_extras"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
