<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("emdebian-tools");

$elem["emsource/svnusername"]["type"]="string";
$elem["emsource/svnusername"]["description"]="Subversion login to use on buildd.emdebian.org:
 If you expect to be submitting improvements to Emdebian,
 including updates to patches and build logs, emdebian-tools can
 commit updated patch files for you without further intervention.
 .
 Note that this username is not necessarily the same as any Debian
 username or identity.
 .
 If you do not (yet) have an Emdebian username, leave this blank.
 (emsource will use anonymous checkouts of the patch files.)
";
$elem["emsource/svnusername"]["descriptionde"]="Zu verwendender Subversion-Benutzername auf buildd.emdebian.org:
 Falls Sie planen, Verbesserungen an Emdebian einzureichen, darunter Aktualisierungen für Patches und Kompilierprotokolle, können die Emdebian-tools die aktualisierten Patch-Dateien für Sie ohne weiteres Zutun einreichen (»comitten«).
 .
 Beachten Sie, dass dieser Benutzername nicht notwendigerweise mit einem Debian-Benutzername oder -Identität übereinstimmt.
 .
 Falls Sie (noch) keinen Emdebian-Benutzernamen haben, lassen Sie dies leer (Emsource wird anonymes Auschecken der Patch-Dateien durchführen).
";
$elem["emsource/svnusername"]["descriptionfr"]="Identifiant pour Subversion sur buildd.emdebian.org :
 Si vous prévoyez de proposer des améliorations à Emdebian, notamment des mises à jour des rustines (« patches ») ou des journaux de compilation, les outils d'emdebian-tools peuvent automatiquement mettre à jour les fichiers de rustines.
 .
 Veuillez noter que cet identifiant n'est pas forcément le même que votre identifiant Debian.
 .
 Si vous n'avez pas (encore) d'identifiant Emdebian, veuillez laisser ce champ vide (emsource utilisera alors un accès anonyme pour récupérer les fichiers de rustines).
";
$elem["emsource/svnusername"]["default"]="";
$elem["emsetup/aptagent"]["type"]="boolean";
$elem["emsetup/aptagent"]["description"]="Use apt-get to install toolchains?
 emsetup can install toolchain packages for you using apt-get.
 Alternatively, unset this option to use aptitude.
";
$elem["emsetup/aptagent"]["descriptionde"]="Soll apt-get zur Installation der Werkzeugkette verwendet werden?
 Emsetup kann die Pakete der Werkzeugketten für Sie mittels apt-get installieren. Alternativ lehnen Sie diese Option ab, um Aptitude zu verwenden.
";
$elem["emsetup/aptagent"]["descriptionfr"]="Faut-il utiliser apt-get pour installer les ensembles d'outils ? 
 Emsetup peut installer les paquets des ensembles d'outils (« toolchains ») avec apt-get au lieu de le faire avec aptitude.
";
$elem["emsetup/aptagent"]["default"]="true";
$elem["emsetup/primary"]["type"]="select";
$elem["emsetup/primary"]["choices"][1]="ftp.fr.debian.org";
$elem["emsetup/primary"]["choices"][2]="ftp.at.debian.org";
$elem["emsetup/primary"]["description"]="Debian primary mirror:
 emdebian-tools needs to be able to query apt cache data from a Debian mirror
 that supports all cross-building architectures - these repositories are called
 'primary mirrors' in Debian. If /etc/apt/sources.list does not contain a primary
 Debian mirror, the default mirror will be used only by emdebian-tools:
 ftp.fr.debian.org. If you prefer to use a closer or faster primary mirror, please
 select it here. At least one primary mirror, as defined on the DML page, must be
 available to use emdebian-tools. If a primary mirror already exists in your sources,
 emdebian-tools will use that.
";
$elem["emsetup/primary"]["descriptionde"]="Debian Primärspiegel:
 Emdebian-tools muss in der Lage sein, die Cache-Daten von Apt von einem Debian-Spiegel abzufragen, der alle Cross-Kompilier-Architekturen unterstützt. Diese Depots werden in Debian »primäre Spiegel« genannt. Falls /etc/apt/sources.list keinen primären Debian-Spiegel enthält wird der Standardspiegel (ftp.fr.debian.org) nur von Emdebian-tools verwandt. Falls Sie die Verwendung eines näheren oder schnelleren primären Spiegels bevorzugen, wählen Sie diesen hier aus. Mindestens ein primärer Spiegel, wie auf der DML-Seite definiert, muss für die Emdebian-tools verfügbar sein. Falls ein primärer Spiegel in Ihren sources.list enthalten ist, wird Emdebian-tools diesen verwenden.
";
$elem["emsetup/primary"]["descriptionfr"]="Miroir principal Debian :
 Les outils fournis dans emdebian-tools ont besoin de pouvoir récupérer des données en cache depuis un miroir Debian qui gère toutes les architectures en compilation croisée. Ces dépôts sont appelés des miroir primaires dans Debian. Si /etc/apt/sources.list ne mentionne pas un miroir primaire, le miroir par défaut sera utilisé, uniquement pour emdebian-tools : ftp.fr.debian.org. Si vous préférez utiliser un miroir primaire plus proche ou rapide, veuillez l'indiquer ici. Au moins un miroir primaire, mentionné sur la page DML, doit être disponible pour pouvoir utiliser emdebian-tools. Si un miroir primaire existe déjà dans le fichier sources.list, il sera utilisé.
";
$elem["emsetup/primary"]["default"]="ftp.fr.debian.org";
PKG_OptionPageTail2($elem);
?>
