<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debsums");

$elem["debsums/apt-autogen"]["type"]="boolean";
$elem["debsums/apt-autogen"]["description"]="Should debsum files be automatically generated by apt-get?
 Not all packages contain debsum information as is.  However, debsums can
 be installed so that apt will automatically generate debsum files of
 installed packages.  This may be useful for checking system integrity
 later, though it should not be relied on as a security measure.
";
$elem["debsums/apt-autogen"]["descriptionde"]="Sollen debsum-Dateien automatisch von apt-get erzeugt werden?
 Nicht alle Pakete enthalten von sich aus debsum-Informationen. Jedoch kann debsums so installiert werden, dass apt automatisch debsum-Dateien von installierten Paketen erzeugt. Dies kann nützlich sein, um später die Integrität des Systems zu prüfen, obwohl man sich als Sicherheitsmaßnahme nicht darauf verlassen sollte.
";
$elem["debsums/apt-autogen"]["descriptionfr"]="Les fichiers debsums doivent-ils être créés automatiquement par apt-get ?
 Tous les paquets ne contiennent pas d'information debsum (somme de contrôle Debian) comme ils le devraient. Cependant, le paquet « debsums » peut être installé de façon à ce qu'apt génère automatiquement les fichiers debsum des paquets installés. Cela peut être utile par la suite pour vérifier l'intégrité du système mais le paquet debsums ne constitue pas par lui-même un outil de sécurité.
";
$elem["debsums/apt-autogen"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
