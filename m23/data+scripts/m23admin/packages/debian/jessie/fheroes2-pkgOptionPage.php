<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fheroes2-pkg");

$elem["fheroes2-pkg/build"]["type"]="boolean";
$elem["fheroes2-pkg/build"]["description"]="Proceed with downloading and compiling ${PKGG}${VER}?
 The fheroes2 AI is non-free due to a not-for-sale restriction, and
 some images may also be non-free.
 .
 The installation process is therefore about to download the source files
 from SourceForge, compile them, and install the binary deb package(s)
 [${PKGG_ALL}].
 .
 Please confirm whether you wish this to happen.
";
$elem["fheroes2-pkg/build"]["descriptionde"]="";
$elem["fheroes2-pkg/build"]["descriptionfr"]="";
$elem["fheroes2-pkg/build"]["default"]="true";
$elem["fheroes2-pkg/first-install"]["type"]="note";
$elem["fheroes2-pkg/first-install"]["description"]="Description:
 The fheroes2 AI is non-free due to a not-for-sale restriction, and
 some images may also be non-free.
 .
 The installation process is therefore about to download the source files
 from SourceForge, compile them, and install the binary deb package(s)
 [${PKGG_ALL}].
 .
 Please remember to run \"sudo dpkg-reconfigure ${PKGI}\"
 to build and install guest package(s) for the first time.
";
$elem["fheroes2-pkg/first-install"]["descriptionde"]="";
$elem["fheroes2-pkg/first-install"]["descriptionfr"]="";
$elem["fheroes2-pkg/first-install"]["default"]="";
$elem["fheroes2-pkg/title_b-i"]["type"]="title";
$elem["fheroes2-pkg/title_b-i"]["description"]="Build and install ${PKGG}${VER}
";
$elem["fheroes2-pkg/title_b-i"]["descriptionde"]="${PKGG}${VER} bauen und installieren
";
$elem["fheroes2-pkg/title_b-i"]["descriptionfr"]="Compiler et installer ${PKGG}${VER}
";
$elem["fheroes2-pkg/title_b-i"]["default"]="";
$elem["fheroes2-pkg/title_u"]["type"]="title";
$elem["fheroes2-pkg/title_u"]["description"]="Upgrades available for guest package(s)
";
$elem["fheroes2-pkg/title_u"]["descriptionde"]="Upgrade für Gastpaket(e) verfügbar
";
$elem["fheroes2-pkg/title_u"]["descriptionfr"]="Mises à jour disponibles pour le(s) paquet(s) invité(s)
";
$elem["fheroes2-pkg/title_u"]["default"]="";
$elem["fheroes2-pkg/upgrade"]["type"]="note";
$elem["fheroes2-pkg/upgrade"]["description"]="Description:
 An update to guest package(s) [${PKGG_ALL}] version ${VER} is available
 but automatic upgrade is disabled.
 .
 Please remember to run \"sudo dpkg-reconfigure ${PKGI}\" to build and
 install guest package(s) or consider installing the APT post-invoke hook.
";
$elem["fheroes2-pkg/upgrade"]["descriptionde"]="Description-de.UTF-8:
 Für die Gastpakete [${PKGG_ALL}] Version ${VER} ist eine Aktualisierung verfügbar, das automatische Durchführen von Upgrades ist jedoch deaktiviert.
 .
 Bitte denken Sie daran, »sudo dpkg-reconfigure ${PKGI}« auszuführen, um Gastpakete zu bauen und zu installieren oder ziehen Sie die Installation des APT-»post-invoke«-Hooks in Betracht.
";
$elem["fheroes2-pkg/upgrade"]["descriptionfr"]="Description-fr.UTF-8:
 Une mise à jour pour le(s) paquet(s) invité(s) [${PKGG_ALL}] version ${VER} est disponible mais la mise à jour automatique est désactivée.
 .
 Veuillez noter qu'il vous faudra lancer « sudo dpkg-reconfigure ${PKGI} » pour compiler et installer le(s) paquet(s) invité(s) ou installer le déclencheur post-appel (« post-invoke hook ») d'APT.
";
$elem["fheroes2-pkg/upgrade"]["default"]="";
$elem["fheroes2-pkg/post-invoke_hook-install"]["type"]="boolean";
$elem["fheroes2-pkg/post-invoke_hook-install"]["description"]="Install APT post-invoke hook?
 If activated, the APT post-invoke hook takes care of future automatic
 upgrades of guest package(s) on host package upgrade. When an update
 is available, the hook will attempt to download and build the package(s),
 and (if \"apt-get check\" reports no errors) install them with \"dpkg -i\".
 .
 Alternatively, guest package(s) can be built by manual invocation of
 \"dpkg-reconfigure ${PKGI}\".
";
$elem["fheroes2-pkg/post-invoke_hook-install"]["descriptionde"]="";
$elem["fheroes2-pkg/post-invoke_hook-install"]["descriptionfr"]="";
$elem["fheroes2-pkg/post-invoke_hook-install"]["default"]="true";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["type"]="boolean";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["description"]="Remove APT post-invoke hook?
 If activated, the APT post-invoke hook takes care of future automatic
 upgrades of guest package(s) on host package upgrade. When an update
 is available, the hook will attempt to download and build the package(s),
 and (if \"apt-get check\" reports no errors) install them with \"dpkg -i\".
 .
 Alternatively, guest package(s) can be built by manual invocation of
 \"dpkg-reconfigure ${PKGI}\".
";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["descriptionde"]="";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["descriptionfr"]="";
$elem["fheroes2-pkg/post-invoke_hook-remove"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
