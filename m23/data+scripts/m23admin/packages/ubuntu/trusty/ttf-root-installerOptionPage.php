<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ttf-root-installer");

$elem["ttf-root-installer/blurb"]["type"]="note";
$elem["ttf-root-installer/blurb"]["description"]="Non-free fonts
 The fonts provided in this package were provided by Microsoft \"in the interest of cross-platform
 compatibility\". This is no longer the case, but they are still available
 from third parties.
 .
 You are free to download these fonts and use them for your own purposes,
 but you  have no permission to redistribute them in modified form, including
 changes to the file name or packaging format.
";
$elem["ttf-root-installer/blurb"]["descriptionde"]="Nicht freie Schriften
 Die Schriften in diesem Paket wurden von Microsoft »im Interesse der Plattform-übergreifenden Kompatibilität« bereitgestellt. Dies ist nicht mehr der Fall, aber sie sind noch von dritten Stellen verfügbar.
 .
 Sie dürfen diese Schriften herunterladen und für eigene Zwecke verwenden, aber Sie dürfen sie nicht in veränderter Form weitervertreiben. Dazu gehören auch Änderungen am Dateinamen und Paketformat.
";
$elem["ttf-root-installer/blurb"]["descriptionfr"]="Polices non libres
 Les polices fournies dans ce paquet étaient distribuées par Microsoft « pour la compatibilité entre les plate-formes ». Ce n'est désormais plus le cas mais elles restent disponibles depuis des sites tiers.
 .
 Vous pouvez librement télécharger et utiliser à titre personnel ces polices, mais pas les redistribuer sous une forme modifiée (y compris les noms de fichiers et le format de l'archive).
";
$elem["ttf-root-installer/blurb"]["default"]="";
$elem["ttf-root-installer/dldir"]["type"]="string";
$elem["ttf-root-installer/dldir"]["description"]="Directory holding Microsoft fonts (if already downloaded):
 If you have already downloaded Microsoft's TrueType Core Fonts from the
 ROOT FTP server (ftp://root.cern.ch/root/ttf/ttf_fonts.tar.gz), please enter the
 name of the directory which contains the archive.
 .
 If you haven't yet downloaded these fonts, leave this blank and the fonts
 will be downloaded automatically. The download size is approximately 1.6 MB.
 .
 If you are not connected to the Internet or do not wish to download these
 fonts now, enter \"none\" to abort.
";
$elem["ttf-root-installer/dldir"]["descriptionde"]="Verzeichnis, in dem sich die Microsoft-Schriften befinden (falls bereits heruntergeladen):
 Falls Sie die TrueType Core Fonts von Microsoft bereits vom ROOT FTP-Server (ftp://root.cern.ch/root/ttf/ttf_fonts.tar.gz) heruntergeladen haben, geben Sie bitte den Namen des Verzeichnisses, in dem sich das Archiv befindet, an.
 .
 Falls Sie diese Schriften noch nicht heruntergeladen haben, lassen Sie dies leer und die Schriften werden automatisch heruntergeladen. Die Größe des Downloads beträgt ungefähr 1,6 MB.
 .
 Falls Sie nicht mit dem Internet verbunden sind oder nicht wünschen, dass diese Schriften jetzt heruntergeladen werden, geben Sie »none« ein, um abzubrechen.
";
$elem["ttf-root-installer/dldir"]["descriptionfr"]="Répertoire contenant les polices Microsoft (si déjà téléchargées) :
 Si vous avez déjà téléchargé les polices TrueType de base de Microsoft depuis le serveur FTP de ROOT (ftp://root.cern.ch/root/ttf/ttf_fonts.tar.gz), veuillez indiquer le nom du répertoire qui contient cette archive.
 .
 Si vous n'avez pas encore téléchargé ces polices, veuillez laisser ce champ vide et elles seront téléchargées automatiquement (le téléchargement représente environ 1,6 Mo).
 .
 Si aucune connexion Internet n'est disponible ou que vous ne souhaitez pas télécharger les polices maintenant, veuillez indiquer « none » pour annuler.
";
$elem["ttf-root-installer/dldir"]["default"]="";
$elem["ttf-root-installer/baddldir"]["type"]="error";
$elem["ttf-root-installer/baddldir"]["description"]="Font files not found
 The directory you entered either does not exist, or does not contain the
 Microsoft TrueType Core Fonts for ROOT.
";
$elem["ttf-root-installer/baddldir"]["descriptionde"]="Schriftdateien nicht gefunden
 Das Verzeichnis, das Sie angegeben haben, existiert entweder nicht oder enthält die Microsoft TrueType Core Fonts für ROOT nicht.
";
$elem["ttf-root-installer/baddldir"]["descriptionfr"]="Fichiers de polices non trouvés
 Le répertoire indiqué n'existe pas ou ne contient pas les polices de base TrueType de Microsoft pour ROOT.
";
$elem["ttf-root-installer/baddldir"]["default"]="";
$elem["ttf-root-installer/savedir"]["type"]="string";
$elem["ttf-root-installer/savedir"]["description"]="Archive files to (optional):
 If you would like to keep a permanent archive of the compressed Microsoft
 Core fonts, please enter the directory where you'd like them stored. If you
 leave this blank, the files will be deleted after installation.
";
$elem["ttf-root-installer/savedir"]["descriptionde"]="Archiviere diese Dateien nach (optional):
 Falls Sie ein permanentes Archiv der komprimierten Microsoft Core-Schriften behalten möchten, geben Sie bitte das Verzeichnis an, in dem dieses gespeichert werden soll. Falls Sie dies leer lassen, werden die Dateien nach der Installation gelöscht.
";
$elem["ttf-root-installer/savedir"]["descriptionfr"]="Archiver ces fichiers dans (paramètre optionnel) :
 Si vous souhaitez conserver une archive des polices Microsoft sous forme compressée, veuillez indiquer le répertoire où vous souhaitez l'enregistrer. Si ce champ est laissé vide, les fichiers seront supprimés après l'installation.
";
$elem["ttf-root-installer/savedir"]["default"]="";
PKG_OptionPageTail2($elem);
?>
