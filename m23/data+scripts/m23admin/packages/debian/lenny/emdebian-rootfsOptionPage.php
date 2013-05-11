<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("emdebian-rootfs");

$elem["emsource/workdir"]["type"]="string";
$elem["emsource/workdir"]["description"]="Writable build directory for emdebian packages:
 Either specify an existing Emdebian subversion tree
 (e.g. /home/user/emdebian/svn/target/) or specify the full path to a
 writable directory that can be used by the tools (emsource and emchain)
 as a build tree.
 .
 The empty default is only intended for compatibility with
 a chroot or automated build environment where a new top level directory
 '/trunk/' would be writable.
";
$elem["emsource/workdir"]["descriptionde"]="Beschreibbares Kompilier-Verzeichnis für Emdebian-Pakete:
 Geben Sie entweder einen existierenden Emdebian-Subversion-Baum (z.B. /home/user/emdebian/svn/target/) an oder spezifizieren Sie den kompletten Pfad zu einem schreibbaren Verzeichnis, das von den Werkzeugen (Emsource und Emchain) als Kompilierverzeichnis verwendet werden kann.
 .
 Die leere Vorgabe ist nur zur Kompatibilität mit einer Chroot oder einer automatisierten Kompilierumgebung gedacht, in der ein neues Verzeichnis »/trunk/« auf oberster Ebene schreibbar wäre.
";
$elem["emsource/workdir"]["descriptionfr"]="Répertoire (accessible en écriture) de compilation pour les paquets emdebian :
 Veuillez indiquer un répertoire existant contenant le dépôt SVN d'Emdebian (p. ex. /home/user/emdebian/svn/target/) ou le chemin complet d'un répertoire pouvant être utilisé par les outils (emsource et emchain) comme répertoire de compilation.
 .
 La valeur vide par défaut ne sert que pour compatibilité avec un environnement fermé d'exécution (« chroot ») ou un environnement automatisé de compilation où un répertoire racine « /trunk » est accessible en écriture.
";
$elem["emsource/workdir"]["default"]="";
$elem["emsource/targetsuite"]["type"]="select";
$elem["emsource/targetsuite"]["choices"][1]="unstable";
$elem["emsource/targetsuite"]["choices"][2]="testing";
$elem["emsource/targetsuite"]["description"]="Which suite (e.g. unstable) should packages be built against?
 This setting determines the versions of libraries and
 packages use to build cross-built emdebian packages.
 emdebian-tools defaults to taking those packages from unstable, (as in
 normal Debian uploads). If you want to build against testing or
 stable instead, then change this setting.
";
$elem["emsource/targetsuite"]["descriptionde"]="Gegen welche Suite (z.B. Unstable) sollen Pakete gebaut werden?
 Diese Einstellung bestimmt die Versionen von Bibliotheken und Paketen, die zum Bauen von Cross-gebauten Emdebian-Paketen verwendet werden. Standardmäßig verwendet Emdebian-tools Pakete aus Unstable (wie bei normalen Uploads in Debian). Falls Sie stattdessen gegen Testing oder Unstable bauen wollen, dann ändern Sie diese Einstellung.
";
$elem["emsource/targetsuite"]["descriptionfr"]="Version de la distribution pour la création des paquets :
 Veuillez indiquer la version de la distribution qui sera la cible de compilation des paquets créés, ce qui déterminera les versions de bibliothèques et de paquets utilisés pour cela. Par défaut, emdebian-tools utilise les paquets de la version « unstable » (de manière analogue à ce qui est utilisé pour les constructions classiques de paquets). Ce réglage peut permettre de construire des paquets pour « testing » ou « stable ».
";
$elem["emsource/targetsuite"]["default"]="unstable";
PKG_OptionPageTail2($elem);
?>
