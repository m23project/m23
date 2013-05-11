<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debsums");

$elem["debsums/apt-autogen"]["type"]="boolean";
$elem["debsums/apt-autogen"]["description"]="Should debsums files be generated automatically by apt-get?
 Not all packages contain debsums information. However, apt can be
 configured to generate debsums files for installed packages
 automatically. This may be useful for checking system integrity
 later, but it should not be relied upon as a security measure.
";
$elem["debsums/apt-autogen"]["descriptionde"]="Sollen md5sum-Dateien automatisch von apt-get erzeugt werden?
 Nicht alle Pakete enthalten debsums-Informationen. Jedoch kann apt so konfiguriert werden, dass es automatisch debsums-Dateien von installierten Paketen erzeugt. Dies kann nützlich sein, um später die Integrität des Systems zu prüfen, obwohl man sich als Sicherheitsmaßnahme nicht darauf verlassen sollte.
";
$elem["debsums/apt-autogen"]["descriptionfr"]="Les fichiers debsums doivent-ils être créés automatiquement par apt-get ?
 Tous les paquets ne contiennent pas d'information debsums comme ils le devraient. Cependant, apt peut être configuré pour créer automatiquement les fichiers debsums des paquets installés. Cela peut être utile par la suite pour vérifier l'intégrité du système sans pour autant constituer en soi un outil de sécurité.
";
$elem["debsums/apt-autogen"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
