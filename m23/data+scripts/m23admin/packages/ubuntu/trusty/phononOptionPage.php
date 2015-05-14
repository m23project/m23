<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phonon");

$elem["phonon-backend-null/isnt_functional_title"]["type"]="title";
$elem["phonon-backend-null/isnt_functional_title"]["description"]="Warning: Phonon is not functional
";
$elem["phonon-backend-null/isnt_functional_title"]["descriptionde"]="Phonon ist nicht funktionsfähig
";
$elem["phonon-backend-null/isnt_functional_title"]["descriptionfr"]="Phonon non fonctionnel
";
$elem["phonon-backend-null/isnt_functional_title"]["default"]="";
$elem["phonon-backend-null/isnt_functional"]["type"]="note";
$elem["phonon-backend-null/isnt_functional"]["description"]="Missing back-end for Phonon
 Applications using Phonon (the Qt 4 multimedia framework) will produce
 no audio or video output, because only a dummy Phonon back-end is
 installed on this system. This is typically an unintended configuration.
 .
 To restore full Phonon multimedia capabilities, install one of the real
 Phonon back-end packages which are currently available for this system:
 .
 ${recommended_backend} (recommended)${other_backends}
";
$elem["phonon-backend-null/isnt_functional"]["descriptionde"]="Fehlendes Backend für Phonon
 Auf diesem System ist nur ein Pseudo-Phonon-Backend installiert. Anwendungen, die das Qt4-Multimedia-Rahmenwerk Phonon verwenden, werden keine Audio- oder Videoausgabe erzeugen. Typischerweise wird eine solche Konfiguration nicht mit Absicht herbeigeführt.
 .
 Um die gesamten Multimediafähigkeiten von Phonon erneut verfügbar zu machen, installieren Sie bitte eines der richtigen, für Ihr System verfügbaren Phonon-Backend-Pakete:
 .
 ${recommended_backend} (empfohlen)${other_backends}
";
$elem["phonon-backend-null/isnt_functional"]["descriptionfr"]="Module de sortie pour Phonon manquant
 Les applications utilisant Phonon (le framework multimédia de QT 4) ne produiront ni son ni image tant que le module de sortie factice (« dummy backend ») sera le seul installé. Ce n'est généralement pas une configuration souhaitée.
 .
 Afin de profiter des possibilités multimédia complètes de Phonon, veuillez installer un module de sortie de Phonon parmi ceux disponibles pour ce système :
 .
 ${recommended_backend} (recommandé)${other_backends}
";
$elem["phonon-backend-null/isnt_functional"]["default"]="";
PKG_OptionPageTail2($elem);
?>
