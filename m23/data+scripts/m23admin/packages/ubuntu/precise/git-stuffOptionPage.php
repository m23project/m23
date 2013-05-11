<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("git-stuff");

$elem["git-repack-repositories/title"]["type"]="title";
$elem["git-repack-repositories/title"]["description"]="Git Repack Repositories

";
$elem["git-repack-repositories/title"]["descriptionde"]="";
$elem["git-repack-repositories/title"]["descriptionfr"]="";
$elem["git-repack-repositories/title"]["default"]="";
$elem["git-repack-repositories/enable"]["type"]="boolean";
$elem["git-repack-repositories/enable"]["description"]="Git repack:
 Git repositories tend to grow quite large quickly. From time to time, you
 have to repack the repositories to save space and keep optimal
 performances (by not having too many of files in the objects
 subdirectory).
 .
 Do you want to enable the cron job?

";
$elem["git-repack-repositories/enable"]["descriptionde"]="";
$elem["git-repack-repositories/enable"]["descriptionfr"]="";
$elem["git-repack-repositories/enable"]["default"]="false";
$elem["git-repack-repositories/directories"]["type"]="string";
$elem["git-repack-repositories/directories"]["description"]="Git directories:
 Please specify the directory or directories (space separated) that is used
 as root for the Git repositories on your server. Note that
 git-repack-repositories will work recursively.

";
$elem["git-repack-repositories/directories"]["descriptionde"]="";
$elem["git-repack-repositories/directories"]["descriptionfr"]="";
$elem["git-repack-repositories/directories"]["default"]="/srv/git";
$elem["git-repack-repositories/cron"]["type"]="string";
$elem["git-repack-repositories/cron"]["description"]="Git cron:
 What times should the cron job be started? Please refer to crontab(5) for
 the format definition. The default or if left empty will set the interval
 to '@monthly' (without the quotes) which means it gets executed every
 beginning of the month at midnight.

";
$elem["git-repack-repositories/cron"]["descriptionde"]="";
$elem["git-repack-repositories/cron"]["descriptionfr"]="";
$elem["git-repack-repositories/cron"]["default"]="@monthly";
$elem["git-stuff/title"]["type"]="title";
$elem["git-stuff/title"]["description"]="additional Git utilities

";
$elem["git-stuff/title"]["descriptionde"]="";
$elem["git-stuff/title"]["descriptionfr"]="";
$elem["git-stuff/title"]["default"]="";
$elem["git-stuff/bash-profile"]["type"]="boolean";
$elem["git-stuff/bash-profile"]["description"]="Shortcuts for Bash (/etc/profile.d)
 Should special shortcut definitions for Bash be activated in /etc/profile.d?
 .
 If unsure, say no.
";
$elem["git-stuff/bash-profile"]["descriptionde"]="";
$elem["git-stuff/bash-profile"]["descriptionfr"]="";
$elem["git-stuff/bash-profile"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
