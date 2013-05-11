<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ttf-root-installer");

$elem["ttf-root-installer/blurb"]["type"]="note";
$elem["ttf-root-installer/blurb"]["description"]="These fonts are not free
 These fonts were provided by Microsoft \"in the interest of cross-platform
 compatibility\". This is no longer the case, but they are still available
 from third parties.
 .
 You are free to download these fonts and use them for your own use, but
 you may not redistribute them in modified form, including changes to the
 file name or packaging format.
";
$elem["ttf-root-installer/blurb"]["descriptionde"]="Diese Schriften sind nicht frei
 Diese Schriften wurden von Microsoft »im Interesse der Plattform-übergreifenden Kompatibilität« bereitgestellt. Dies ist nicht mehr der Fall, aber sie sind noch von dritten Stellen verfügbar.
 .
 Sie dürfen diese Schriften herunterladen und für eigene Zwecke verwenden, aber Sie dürfen sie nicht in veränderter Form weitervertreiben. Dazu gehören auch Änderungen am Dateinamen und Paketformat.
";
$elem["ttf-root-installer/blurb"]["descriptionfr"]="Polices non libres
 Les polices fournies dans ce paquet étaient fournies par Microsoft « pour compatibilité entre plate-formes ». Ce n'est plus le cas mais elles restent disponibles depuis des sites tiers.
 .
 Vous pouvez librement télécharger et utiliser ces polices, mais pas les redistribuer sous une forme modifiée (y compris les noms de fichiers et le format de l'archive).
";
$elem["ttf-root-installer/blurb"]["default"]="";
$elem["ttf-root-installer/dldir"]["type"]="string";
$elem["ttf-root-installer/dldir"]["description"]="Directory holding MS fonts (if already downloaded):
 If you have already downloaded Microsoft's TrueType Core Fonts from the
 ROOT FTP server (ftp://root.cern.ch/root/ttf/ttf_fonts.tar.gz), type the
 name of the directory which contains the archive.
 .
 If you haven't yet downloaded these fonts, leave this blank and the fonts
 will be downloaded for you. Approximately 1.6 MB will need to be
 downloaded.
 .
 If you are not connected to the internet or do not wish to download these
 fonts now, enter \"none\" to abort.
";
$elem["ttf-root-installer/dldir"]["descriptionde"]="Verzeichnis, in dem sich die MS-Schriften befinden (falls bereits heruntergeladen):
 Falls Sie die TrueType Core Fonts von Microsoft vom ROOT FTP-Server (ftp://root.cern.ch/root/ttf/ttf_fonts.tar.gz) bereits heruntergeladen haben, geben Sie den Namen des Verzeichnisses, in dem sich das Archiv befindet, an.
 .
 Falls Sie diese Schriften noch nicht heruntergeladen haben, lassen Sie dies leer und die Schriften werden für Sie heruntergeladen. Ungefähr 1,6 MB müssen heruntergeladen werden.
 .
 Falls Sie nicht mit dem Internet verbunden sind oder nicht wünschen, dass diese Schriften jetzt heruntergeladen werden, geben Sie »none« ein, um abzubrechen.
";
$elem["ttf-root-installer/dldir"]["descriptionfr"]="Répertoire contenant les polices Microsoft (si déjà téléchargées) :
 Si vous avez déjà téléchargé les polices TrueType de base de Microsoft depuis le serveur ROOT (ftp://root.cern.ch/root/ttf/ttf_fonts.tar.gz), veuillez indiquer le nom du répertoire qui contient cette archive.
 .
 Si vous ne les avez pas encore téléchargées, veuillez laisser ce champ vide et les polices seront téléchargées automatiquement (environ 1,6 Mo).
 .
 Si aucune connexion Internet n'est disponible ou que vous ne souhaitez pas télécharger les polices maintenant, veuillez indiquer « none ».
";
$elem["ttf-root-installer/dldir"]["default"]="";
$elem["ttf-root-installer/baddldir"]["type"]="note";
$elem["ttf-root-installer/baddldir"]["description"]="Font files not found
 The directory you entered either did not exist, or did not contain the
 Microsoft TrueType Core Fonts for ROOT. Please re-enter the directory
 containing the Microsoft font files or enter \"none\" to abort.
";
$elem["ttf-root-installer/baddldir"]["descriptionde"]="Schriftdateien nicht gefunden
 Das Verzeichnis, das Sie angegeben haben, existiert entweder nicht oder enthielt die Microsoft TrueType Core Fonts für ROOT nicht. Bitte geben Sie das Verzeichnis, das die Microsoft Schriftdateien enthält, erneut ein oder »none« zum Abbrechen.
";
$elem["ttf-root-installer/baddldir"]["descriptionfr"]="Fichiers de polices non trouvés
 Le répertoire indiqué n'existe pas ou ne contient pas les polices de base TrueType de Microsoft pour ROOT. Veuillez indiquer ce répertoire à nouveau ou « none » si vous préférez interrompre l'installation.
";
$elem["ttf-root-installer/baddldir"]["default"]="";
$elem["ttf-root-installer/savedir"]["type"]="string";
$elem["ttf-root-installer/savedir"]["description"]="Archive these files to (optional):
 If you would like to keep a permanent archive of the compressed Microsoft
 Core fonts, enter the directory where you'd like them stored. If you
 leave this blank, the files will be deleted after installation.
";
$elem["ttf-root-installer/savedir"]["descriptionde"]="Archiviere diese Dateien nach (optional):
 Falls Sie ein permanentes Archiv der komprimierten Microsoft Core-Schriften behalten möchten, geben Sie das Verzeichnis ein, in dem dieses gespeichert werden soll. Falls Sie dies leer lassen, werden die Dateien nach der Installation gelöscht.
";
$elem["ttf-root-installer/savedir"]["descriptionfr"]="Archiver ces fichiers dans (paramètre optionnel) :
 Si vous souhaitez conserver une archive des polices Microsoft sous forme compressée, veuillez indiquer le répertoire où vous souhaitez la placer. Si ce champ est laissé vide, l'archive des polices sera supprimée après l'installation.
";
$elem["ttf-root-installer/savedir"]["default"]="";
PKG_OptionPageTail2($elem);
?>
