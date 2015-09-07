<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("kstars-data-extra-tycho2");

$elem["kstars-data-extra/kstarsrc-title"]["type"]="title";
$elem["kstars-data-extra/kstarsrc-title"]["description"]="kstars global config file
";
$elem["kstars-data-extra/kstarsrc-title"]["descriptionde"]="";
$elem["kstars-data-extra/kstarsrc-title"]["descriptionfr"]="";
$elem["kstars-data-extra/kstarsrc-title"]["default"]="";
$elem["kstars-data-extra/kstarsrc-exists"]["type"]="select";
$elem["kstars-data-extra/kstarsrc-exists"]["choices"][1]="backup and create new";
$elem["kstars-data-extra/kstarsrc-exists"]["choices"][2]="delete and create new";
$elem["kstars-data-extra/kstarsrc-exists"]["description"]="Delete existent /etc/kde4/kstarsrc file?
 A kstars global config file has been detected as /etc/kde4/kstarsrc .
 .
 This script is NOT (yet) able to modify it, but you can now backup it and create a new one now. You will be asked for its options.

";
$elem["kstars-data-extra/kstarsrc-exists"]["descriptionde"]="";
$elem["kstars-data-extra/kstarsrc-exists"]["descriptionfr"]="";
$elem["kstars-data-extra/kstarsrc-exists"]["default"]="keep";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["type"]="boolean";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["description"]="Create /etc/kde4/kstarsrc file?
 There is no kstars global config file. For disabling the user download feature you will need one, but it will not harm if you have one even if you do not want to disable user downloads. It is possible to create one for you in /etc/kde4/kstarsrc
 .
 This will create it. You will be asked for its options.
";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["descriptionde"]="";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["descriptionfr"]="";
$elem["kstars-data-extra/kstarsrc-does-not-exist"]["default"]="true";
$elem["kstars-data-extra/disable-downloads-title"]["type"]="title";
$elem["kstars-data-extra/disable-downloads-title"]["description"]="Disable or lock data downloads
";
$elem["kstars-data-extra/disable-downloads-title"]["descriptionde"]="";
$elem["kstars-data-extra/disable-downloads-title"]["descriptionfr"]="";
$elem["kstars-data-extra/disable-downloads-title"]["default"]="";
$elem["kstars-data-extra/disable-downloads"]["type"]="select";
$elem["kstars-data-extra/disable-downloads"]["choices"][1]="keep enabled";
$elem["kstars-data-extra/disable-downloads"]["choices"][2]="disable";
$elem["kstars-data-extra/disable-downloads"]["description"]="Disable downloads of new data for kstars users?
 Each user will be able to re-enable downloads for him unless you lock the feature.
";
$elem["kstars-data-extra/disable-downloads"]["descriptionde"]="";
$elem["kstars-data-extra/disable-downloads"]["descriptionfr"]="";
$elem["kstars-data-extra/disable-downloads"]["default"]="lock";
$elem["kstars-data-extra/kstarsrc-saved-title"]["type"]="title";
$elem["kstars-data-extra/kstarsrc-saved-title"]["description"]="old kstarsrc saved
";
$elem["kstars-data-extra/kstarsrc-saved-title"]["descriptionde"]="";
$elem["kstars-data-extra/kstarsrc-saved-title"]["descriptionfr"]="";
$elem["kstars-data-extra/kstarsrc-saved-title"]["default"]="";
$elem["kstars-data-extra/kstarsrc-saved"]["type"]="text";
$elem["kstars-data-extra/kstarsrc-saved"]["description"]="The old kstarsrc file has been saved
 The old kstarsrc file has been saved as /etc/kde4/kstarsrc.backup.kstars-data-extra
";
$elem["kstars-data-extra/kstarsrc-saved"]["descriptionde"]="";
$elem["kstars-data-extra/kstarsrc-saved"]["descriptionfr"]="";
$elem["kstars-data-extra/kstarsrc-saved"]["default"]="";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["type"]="select";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["choices"][1]="unset";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["choices"][2]="previously exists";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["description"]="No-show question
 Not shown question to hold a data in the database
";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["descriptionde"]="";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["descriptionfr"]="";
$elem["kstars-data-extra/kstarsrc-previously-exists"]["default"]="unset";
PKG_OptionPageTail2($elem);
?>
