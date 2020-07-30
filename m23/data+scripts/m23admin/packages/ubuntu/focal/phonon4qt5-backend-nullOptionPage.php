<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("phonon4qt5-backend-null");

$elem["phonon4qt5-backend-null/isnt_functional_title"]["type"]="title";
$elem["phonon4qt5-backend-null/isnt_functional_title"]["description"]="Warning: Phonon4Qt5 is not functional
";
$elem["phonon4qt5-backend-null/isnt_functional_title"]["descriptionde"]="Phonon4Qt5 funktioniert nicht
";
$elem["phonon4qt5-backend-null/isnt_functional_title"]["descriptionfr"]="Phonon4Qt5 n'est pas fonctionnel
";
$elem["phonon4qt5-backend-null/isnt_functional_title"]["default"]="";
$elem["phonon4qt5-backend-null/isnt_functional"]["type"]="note";
$elem["phonon4qt5-backend-null/isnt_functional"]["description"]="Missing back-end for Phonon4Qt5
 Applications using Phonon4Qt5 (the KF 5 multimedia framework) will produce
 no audio or video output, because only a dummy Phonon back-end is
 installed on this system. This is typically an unintended configuration.
 .
 To restore full Phonon4Qt5 multimedia capabilities, install one of the real
 Phonon4Qt5 back-end packages which are currently available for this system:
 .
 ${recommended4qt5_backend} (recommended)${other_backends}
";
$elem["phonon4qt5-backend-null/isnt_functional"]["descriptionde"]="Fehlendes Backend für Phonon4Qt5
 Anwendungen, die Phonon4Qt5 (das KF-5-Multimedia-Rahmenwerk) verwenden, werden keine Audio- oder Videoausgabe erzeugen, da auf diesem System nur ein Pseudo-Phonon-Backend installiert ist. Dies ist typischerweise keine beabsichtigte Konfiguration.
 .
 Um die vollen Multimedia-Möglichkeiten von Phonon4Qt5 wiederherzustellen, installieren Sie eines der echten Phonon4Qt5-Backend-Pakete, die derzeit auf dem System verfügbar sind:
 .
 ${recommended4qt5_backend} (empfohlen)${other_backends}
";
$elem["phonon4qt5-backend-null/isnt_functional"]["descriptionfr"]="Il manque un dorsal pour Phonon4Qt5
 Les applications qui utilisent Phonon4Qt5 (le cadriciel multimédia de KF 5) ne produiront aucune sortie audio ou vidéo, parce que seul un dorsal factice de Phonon est installé sur ce système. C'est généralement une configuration non souhaitée.
 .
 Pour rétablir les capacités multimédia complètes de Phonon4Qt5, installez un des paquets de dorsal réel qui sont disponibles pour ce système.
 .
 ${recommended4qt5_backend} (recommandé)${other_backends}
";
$elem["phonon4qt5-backend-null/isnt_functional"]["default"]="";
PKG_OptionPageTail2($elem);
?>
