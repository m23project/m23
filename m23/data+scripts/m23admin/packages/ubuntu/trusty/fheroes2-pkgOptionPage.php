<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fheroes2-pkg");

$elem["fheroes2-pkg/build"]["type"]="boolean";
$elem["fheroes2-pkg/build"]["description"]="Continue?
 This application is about to download, compile from source code and
 install \"${PKGG}${VER}\" as Debian package (source files will be
 downloaded from SourceForge).
 .
 fheroes2 AI is non-free due to not-for-sale restriction.
 Also some images may be non-free.

";
$elem["fheroes2-pkg/build"]["descriptionde"]="";
$elem["fheroes2-pkg/build"]["descriptionfr"]="";
$elem["fheroes2-pkg/build"]["default"]="true";
$elem["fheroes2-pkg/first-install"]["type"]="note";
$elem["fheroes2-pkg/first-install"]["description"]="Description:
 This application automates download, compile from source code and
 install \"${PKGG}${VER}\" as Debian package (source files will be
 downloaded from SourceForge).
 .
 fheroes2 AI is non-free due to not-for-sale restriction.
 Also some images may be non-free.
 .
 Please remember to run `sudo dpkg-reconfigure ${PKGI}`
 to build and install guest package(s) for the first time.

";
$elem["fheroes2-pkg/first-install"]["descriptionde"]="";
$elem["fheroes2-pkg/first-install"]["descriptionfr"]="";
$elem["fheroes2-pkg/first-install"]["default"]="";
$elem["fheroes2-pkg/title_b-i"]["type"]="title";
$elem["fheroes2-pkg/title_b-i"]["description"]="Build and install ${PKGG}${VER}.

";
$elem["fheroes2-pkg/title_b-i"]["descriptionde"]="";
$elem["fheroes2-pkg/title_b-i"]["descriptionfr"]="";
$elem["fheroes2-pkg/title_b-i"]["default"]="";
$elem["fheroes2-pkg/title_u"]["type"]="title";
$elem["fheroes2-pkg/title_u"]["description"]="Guest package(s) upgrade note.

";
$elem["fheroes2-pkg/title_u"]["descriptionde"]="";
$elem["fheroes2-pkg/title_u"]["descriptionfr"]="";
$elem["fheroes2-pkg/title_u"]["default"]="";
$elem["fheroes2-pkg/upgrade"]["type"]="note";
$elem["fheroes2-pkg/upgrade"]["description"]="Description:
 An update to guest package(s) [${PKGG_ALL}] version ${VER} is available
 but automatic upgrade is disabled.
 .
 Please remember to run `sudo dpkg-reconfigure ${PKGI}` to build and
 install guest package(s) or consider installing APT post-invoke hook.

";
$elem["fheroes2-pkg/upgrade"]["descriptionde"]="";
$elem["fheroes2-pkg/upgrade"]["descriptionfr"]="";
$elem["fheroes2-pkg/upgrade"]["default"]="";
$elem["fheroes2-pkg/post-invoke_hook-install"]["type"]="boolean";
$elem["fheroes2-pkg/post-invoke_hook-install"]["description"]="Install APT post-invoke hook?
 APT post-invoke hook takes care of future automatic upgrades of guest
 package(s) on host package upgrade. After end of batch of APT
 operations hook will check whether guest package(s) can be updated.
 If upgrade detected then hook will attempt to download/build and
 install package(s) using `dpkg -i` but only if `apt-get check` reported
 no errors.
 .
 At the moment there are no known problems associated with APT
 post-invoke hook which maintainer recommends to use with this package.
 .
 Alternatively guest package(s) can be built by manual invocation of
 `dpkg-reconfigure ${PKGI}`.

";
$elem["fheroes2-pkg/post-invoke_hook-install"]["descriptionde"]="";
$elem["fheroes2-pkg/post-invoke_hook-install"]["descriptionfr"]="";
$elem["fheroes2-pkg/post-invoke_hook-install"]["default"]="true";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["type"]="boolean";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["description"]="Remove APT post-invoke hook?
 APT post-invoke hook takes care of future automatic upgrades of guest
 package(s) on host package upgrade. After end of batch of APT
 operations hook will check whether guest package(s) can be updated.
 If upgrade detected then hook will attempt to download/build and
 install package(s) using `dpkg -i` but only if `apt-get check` reported
 no errors.
 .
 At the moment there are no known problems associated with APT
 post-invoke hook which maintainer recommends to use with this package.
 .
 Alternatively guest package(s) can be built on manual invocation of
 `dpkg-reconfigure ${PKGI}`.
";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["descriptionde"]="";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["descriptionfr"]="";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
