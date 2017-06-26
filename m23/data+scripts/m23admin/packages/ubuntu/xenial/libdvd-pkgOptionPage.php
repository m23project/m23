<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libdvd-pkg");

$elem["libdvd-pkg/first-install"]["type"]="note";
$elem["libdvd-pkg/first-install"]["description"]="Description:
 This package automates the process of launching downloads of the source
 files for ${PKGG} from videolan.org, compiling them, and installing the
 binary packages (${PKGG_ALL}).
 .
 Please run \"sudo dpkg-reconfigure ${PKGI}\" to launch this process for
 the first time.
";
$elem["libdvd-pkg/first-install"]["descriptionde"]="Description-de.UTF-8:
 Dieses Paket automatisiert den Prozess, Quelldateien für ${PKGG} von »videolan.org« herunterzuladen, sie zu kompilieren und die Binärpakete (${PKGG_ALL}) zu installieren.
 .
 Bitte führen Sie »sudo dpkg-reconfigure ${PKGI}« aus, um diesen Prozess erstmalig in Gang zu setzen.
";
$elem["libdvd-pkg/first-install"]["descriptionfr"]="Description-fr.UTF-8:
 Ce paquet automatise les processus de téléchargement des fichiers sources pour ${PKGG} depuis videolan.org, la compilation et l'installation des paquets binaires (${PKGG_ALL}).
 .
 Veuillez exécuter « sudo dpkg-reconfigure ${PKGI} » pour lancer le processus la première fois.
";
$elem["libdvd-pkg/first-install"]["default"]="";
$elem["libdvd-pkg/title_b-i"]["type"]="title";
$elem["libdvd-pkg/title_b-i"]["description"]="Download, build and install ${PKGG}${VER}
";
$elem["libdvd-pkg/title_b-i"]["descriptionde"]="${PKGG}${VER} herunterladen, bauen und installieren
";
$elem["libdvd-pkg/title_b-i"]["descriptionfr"]="Téléchargement, compilation et installation ${PKGG}${VER}
";
$elem["libdvd-pkg/title_b-i"]["default"]="";
$elem["libdvd-pkg/build"]["type"]="boolean";
$elem["libdvd-pkg/build"]["description"]="Download, build, and install ${PKGG}${VER}?
 This package automates the process of launching downloads of the source
 files for ${PKGG} from videolan.org, compiling them, and installing the
 binary packages (${PKGG_ALL}).
 .
 Please confirm whether you wish this to happen.
";
$elem["libdvd-pkg/build"]["descriptionde"]="${PKGG}${VER} herunterladen, bauen und installieren?
 Dieses Paket automatisiert den Prozess, Quelldateien für ${PKGG} von »videolan.org« herunterzuladen, sie zu kompilieren und die Binärpakete (${PKGG_ALL}) zu installieren.
 .
 Bitte bestätigen Sie, dass Sie dies wünschen.
";
$elem["libdvd-pkg/build"]["descriptionfr"]="Faut-il télécharger, compiler puis installer ${PKGG}${VER} ?
 Ce paquet automatise les processus de téléchargement des fichiers sources pour ${PKGG} depuis videolan.org, la compilation et l'installation des paquets binaires (${PKGG_ALL}).
 .
 Veuillez confirmer que c'est bien ce que vous souhaitez faire ?
";
$elem["libdvd-pkg/build"]["default"]="true";
$elem["libdvd-pkg/title_u"]["type"]="title";
$elem["libdvd-pkg/title_u"]["description"]="Upgrade available for ${PKGG}
";
$elem["libdvd-pkg/title_u"]["descriptionde"]="Für ${PKGG} ist ein Upgrade verfügbar.
";
$elem["libdvd-pkg/title_u"]["descriptionfr"]="Nouvelle version disponible pour ${PKGG}
";
$elem["libdvd-pkg/title_u"]["default"]="";
$elem["libdvd-pkg/upgrade"]["type"]="note";
$elem["libdvd-pkg/upgrade"]["description"]="Description:
 This package automates the process of launching downloads of the source
 files for ${PKGG} from videolan.org, compiling them, and installing the
 binary packages (${PKGG_ALL}).
 .
 An update to version ${VER} is available, but automatic upgrades are
 disabled.
 .
 Please run \"sudo dpkg-reconfigure ${PKGI}\" to launch this process
 manually and/or activate automatic upgrades in future.
";
$elem["libdvd-pkg/upgrade"]["descriptionde"]="Description-de.UTF-8:
 Dieses Paket automatisiert den Prozess, Quelldateien für ${PKGG} von »videolan.org« herunterzuladen, sie zu kompilieren und die Binärpakete (${PKGG_ALL}) zu installieren.
 .
 Eine Aktualisierung auf Version ${VER} ist verfügbar, automatische Upgrades sind jedoch ausgeschaltet.
 .
 Bitte führen Sie »sudo dpkg-reconfigure ${PKGI}« aus, um diesen Prozess manuell zu starten und/oder aktivieren Sie zukünftig automatische Upgrades.
";
$elem["libdvd-pkg/upgrade"]["descriptionfr"]="Description-fr.UTF-8:
 Ce paquet automatise les processus de téléchargement des fichiers sources pour ${PKGG} depuis videolan.org, la compilation et l'installation des paquets binaires (${PKGG_ALL}).
 .
 Une mise à jour vers la version ${VER} est disponible, mais les montées de version automatiques sont désactivées.
 .
 Veuillez exécuter « sudo dpkg-reconfigure ${PKGI} » pour lancer ce processus manuellement et/ou activer les futures mises à niveau automatiques.
";
$elem["libdvd-pkg/upgrade"]["default"]="";
$elem["libdvd-pkg/post-invoke_hook-install"]["type"]="boolean";
$elem["libdvd-pkg/post-invoke_hook-install"]["description"]="Enable automatic upgrades for ${PKGG}?
 If activated, the APT post-invoke hook takes care of future automatic
 upgrades of ${PKGG} (which may be triggered by new versions of
 ${PKGI}). When updates are available, the hook will launch the
 process of downloading the source, recompiling it, and (if \"apt-get check\"
 reports no errors) using \"dpkg -i\" to install the new versions.
 .
 Alternatively, the process can be launched manually by running
 \"sudo dpkg-reconfigure ${PKGI}\".
";
$elem["libdvd-pkg/post-invoke_hook-install"]["descriptionde"]="Sollen automatische Upgrades für ${PKGG} eingeschaltet werden?
 Falls aktiviert, kümmert sich der APT-Hook nach dem Aufruf um automatische Upgrades von ${PKGG} (die durch neue Versionen von ${PKGI} ausgelöst werden können). Wenn Aktualisierungen verfügbar sind, wird der Hook das Herunterladen der Quellen in Gang setzen, sie erneut kompilieren und (falls »apt-get check« keine Fehler zurückgibt) die neuen Versionen mittels »dpkg -i« installieren.
 .
 Alternativ kann der Prozess manuell durch Ausführen von »sudo dpkg-reconfigure ${PKGI}« gestartet werden.
";
$elem["libdvd-pkg/post-invoke_hook-install"]["descriptionfr"]="Faut-il activer les mises à niveau automatiques pour ${PKGG} ?
 Si il est activé, le déclencheur après invocation d'APT prend en charge les montées en version futures de ${PKGG} (qui peuvent être déclenchées pour les nouvelles versions de ${PKGI}). Lorsque des mises à jour sont disponibles, le déclencheur lancera le processus de téléchargement de la source, la recompilera, et (si « apt-get check » ne renvoie pas d'erreurs) utilisera dpkg -i pour l'installer.
 .
 Sinon, le processus peut être lancé manuellement en utilisant la commande « sudo dpkg-reconfigure ${PKGI} ».
";
$elem["libdvd-pkg/post-invoke_hook-install"]["default"]="true";
$elem["libdvd-pkg/post-invoke_hook-remove"]["type"]="boolean";
$elem["libdvd-pkg/post-invoke_hook-remove"]["description"]="Disable automatic upgrades for ${PKGG}?
 If activated, the APT post-invoke hook takes care of future automatic
 upgrades of ${PKGG} (which may be triggered by new versions of
 ${PKGI}). When updates are available, the hook will launch the
 process of downloading the source, recompiling it, and (if \"apt-get check\"
 reports no errors) using \"dpkg -i\" to install the new versions.
 .
 Alternatively, the process can be launched manually by running
 \"sudo dpkg-reconfigure ${PKGI}\".
";
$elem["libdvd-pkg/post-invoke_hook-remove"]["descriptionde"]="Sollen automatische Upgrades für ${PKGG} ausgeschaltet werden?
 Falls aktiviert, kümmert sich der APT-Hook nach dem Aufruf um automatische Upgrades von ${PKGG} (die durch neue Versionen von ${PKGI} ausgelöst werden können). Wenn Aktualisierungen verfügbar sind, wird der Hook das Herunterladen der Quellen in Gang setzen, sie erneut kompilieren und (falls »apt-get check« keine Fehler zurückgibt) die neuen Versionen mittels »dpkg -i« installieren.
 .
 Alternativ kann der Prozess manuell durch Ausführen von »sudo dpkg-reconfigure ${PKGI}« gestartet werden.
";
$elem["libdvd-pkg/post-invoke_hook-remove"]["descriptionfr"]="Faut-il désactiver les mises à niveau automatiques pour ${PKGG} ?
 Si il est activé, le déclencheur après invocation d'APT prend en charge les montées en version futures de ${PKGG} (qui peuvent être déclenchées pour les nouvelles versions de ${PKGI}). Lorsque des mises à jour sont disponibles, le déclencheur lancera le processus de téléchargement de la source, la recompilera, et (si « apt-get check » ne renvoie pas d'erreurs) utilisera dpkg -i pour l'installer.
 .
 Sinon, le processus peut être lancé manuellement en utilisant la commande « sudo dpkg-reconfigure ${PKGI} ».
";
$elem["libdvd-pkg/post-invoke_hook-remove"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
