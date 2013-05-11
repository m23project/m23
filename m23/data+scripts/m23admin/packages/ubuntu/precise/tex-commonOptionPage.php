<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tex-common");

$elem["tex-common/check_texmf_missing"]["type"]="error";
$elem["tex-common/check_texmf_missing"]["description"]="Essential entry missing in ${filename}
 An essential entry is missing in ${filename}:
 .
 No setting of ${variable}.
 .
 TeX will not work until the configuration files are
 fixed. The version of ${filename} that is provided by the package
 should be available as ${filename}.ucf-dist.
 .
 The configuration process has been aborted.
";
$elem["tex-common/check_texmf_missing"]["descriptionde"]="Essentielle Einträge fehlen in ${filename}
 Ein essentieller Eintrag in ${filename} fehlt:
 .
 ${variable} ist nicht gesetzt.
 .
 TeX wird nicht funktionieren, bevor Sie Ihre Konfigurations-Dateien korrigieren haben. Die Version von ${filename}, die vom Paket bereitgestellt wird, sollte als ${filename}.ucf-dist verfügbar sein.
 .
 Der Konfigurationsprozess ist abgebrochen worden.
";
$elem["tex-common/check_texmf_missing"]["descriptionfr"]="Entrée essentielle absente du fichier ${filename}
 Une entrée essentielle manque dans le fichier ${filename} :
 .
 Pas d'affectation pour la variable ${variable}.
 .
 TeX ne fonctionnera pas tant que vous n'aurez pas réparé vos fichiers de configuration. La version du fichier ${filename} fournie par le paquet devrait être disponible sous le nom ${filename}.ucf-dist.
 .
 La procédure de configuration a été interrompue.
";
$elem["tex-common/check_texmf_missing"]["default"]="";
$elem["tex-common/check_texmf_wrong"]["type"]="error";
$elem["tex-common/check_texmf_wrong"]["description"]="Invalid essential entry in ${filename}
 An essential entry is invalid in ${filename}:
 ${variable} does not contain:
 .
 ${pattern}
 .
 TeX will not work until the configuration files are
 fixed. The version of ${filename} that is provided by the package
 should be available as ${filename}.ucf-dist.
 .
 The configuration process has been aborted.
";
$elem["tex-common/check_texmf_wrong"]["descriptionde"]="Ungültiger essentieller Eintrag in ${filename}
 Essentieller Eintrag in ${filename} ungültig: ${variable} enthält nicht:
 .
 ${pattern}
 .
 TeX wird nicht funktionieren, bevor Sie Ihre Konfigurations-Dateien korrigieren haben. Die Version von ${filename}, die vom Paket bereitgestellt wird, sollte als ${filename}.ucf-dist verfügbar sein.
 .
 Der Konfigurationsprozess ist abgebrochen worden.
";
$elem["tex-common/check_texmf_wrong"]["descriptionfr"]="Entrée essentielle erronée dans le fichier ${filename}
 Une entrée essentielle est erronée dans le fichier ${filename} : la variable ${variable} ne contient pas
 .
 ${pattern}
 .
 TeX ne fonctionnera pas tant que vous n'aurez pas réparé vos fichiers de configuration. La version du fichier ${filename} fournie par le paquet devrait être disponible sous le nom ${filename}.ucf-dist.
 .
 La procédure de configuration a été interrompue.
";
$elem["tex-common/check_texmf_wrong"]["default"]="";
PKG_OptionPageTail2($elem);
?>
