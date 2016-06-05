<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ttf-mscorefonts-installer");

$elem["msttcorefonts/dldir"]["type"]="string";
$elem["msttcorefonts/dldir"]["description"]="Directory holding MS fonts (if already downloaded):
 If you have already downloaded Microsoft's TrueType Core Fonts for the web,
 type the name of the directory which contains them. Those files are in the
 Microsoft Windows self-installing format, and are named andale32.exe,
 arial32.exe, arialb32.exe, comic32.exe, courie32.exe, georgi32.exe,
 impact32.exe, times32.exe, trebuc32.exe, verdan32.exe and webdin32.exe.
 .
 If you haven't yet downloaded these fonts, leave this blank and the fonts
 will be downloaded for you. Approximately 4 MB will need to be downloaded.
 .
 If you are not connected to the internet or do not wish to download these
 fonts now, enter \"none\" to abort. 
";
$elem["msttcorefonts/dldir"]["descriptionde"]="Verzeichnis, in dem die MS-Schriftarten liegen (falls bereits heruntergeladen):
 Falls Sie bereits die TrueType-Schriftarten von Microsoft heruntergeladen haben, geben Sie den Namen des Verzeichnisses an, wo sie jetzt liegen. Diese Dateien liegen im selbst-entpackenden Format von Microsoft Windows vor und heißen andale32.exe, arial32.exe, arialb32.exe, comic32.exe, courie32.exe, georgi32.exe, impact32. exe, times32.exe, trebuc32.exe, verdan32.exe und webdin32.exe.
 .
 Falls Sie sie noch nicht heruntergeladen haben, lassen Sie das Textfeld frei, die Schriften werden dann für Sie heruntergeladen. Ungefähr 4 MB müssen dafür übertragen werden.
 .
 Wenn Sie nicht mit dem Internet verbunden sind oder es nicht wollen, dass die Schriften heruntergeladen werden, dann geben Sie zum Abbrechen »none« ein.
";
$elem["msttcorefonts/dldir"]["descriptionfr"]="Répertoire contenant les polices MS (si elles ont déjà été téléchargées) :
 Si vous avez déjà téléchargé les polices TrueType de base de Microsoft (« Microsoft's TrueType Core Fonts ») sur Internet, veuillez indiquer le répertoire où elles se trouvent. Il s'agit des archives d'installation pour Windows nommées andale32.exe, arial32.exe, arialb32.exe, comic32.exe, courie32.exe, georgi32.exe, impact32.exe, times32.exe, trebuc32.exe, verdan32.exe et webdin32.exe.
 .
 Si vous n'avez pas encore téléchargé ces polices, laissez ce champ vide et le téléchargement sera automatique. Environ 8 Mo seront alors téléchargés.
 .
 Si vous n'êtes pas connecté à l'Internet, ou si vous ne souhaitez pas télécharger ces polices maintenant, indiquez « none » (aucun) pour interrompre l'installation.
";
$elem["msttcorefonts/dldir"]["default"]="";
$elem["msttcorefonts/baddldir"]["type"]="error";
$elem["msttcorefonts/baddldir"]["description"]="Font files not found
 The directory you entered either did not exist, did not contain the
 Microsoft TrueType Core Fonts for the Web Microsoft Windows 9x self
 installing executables, or those executables did not match the versions
 expected by this script.  Please re-enter the directory containing the
 Microsoft font files or enter \"none\" to abort.
";
$elem["msttcorefonts/baddldir"]["descriptionde"]="Schriftartendateien nicht gefunden
 Das Verzeichnis, welches Sie eingegeben haben, existiert nicht oder es enthält nicht die TrueType-Schriftarten von Microsoft im selbst-entpackendem Format oder die Dateien haben nicht die von diesem Skript erwarteten Versionsnummern. Geben Sie erneut das Verzeichnis ein, in dem die Schriftarten liegen oder »none« zum Abbrechen.
";
$elem["msttcorefonts/baddldir"]["descriptionfr"]="Fichiers de police introuvables
 Le répertoire indiqué n'existe pas, ne contient pas les polices TrueType de base de Microsoft (« Microsoft's TrueType Core Fonts ») sous le format d'archive d'installation automatique pour Microsoft Windows 9x ou les archives trouvées ne correspondent pas à la version attendue par ce script. Veuillez indiquer le répertoire où se trouvent les fichiers de police, ou « none » pour interrompre l'installation.
";
$elem["msttcorefonts/baddldir"]["default"]="";
$elem["msttcorefonts/savedir"]["type"]="string";
$elem["msttcorefonts/savedir"]["description"]="Where should these files be archived (optional):
 If you would like to keep a permanent archive of the compressed Windows
 self extracting files, enter the directory where you'd like them stored. 
 If you leave this blank, the files will be deleted after installation.
";
$elem["msttcorefonts/savedir"]["descriptionde"]="Wo sollen diese Dateien archiviert werden (optional):
 Falls Sie möchten, dass die Dateien im komprimierten selbst-entpackenden Windows-Format archiviert werden, geben Sie das Verzeichnis ein, in welches die Dateien gespeichert werden sollen. Lassen Sie das Feld leer, falls sie danach gelöscht werden sollen.
";
$elem["msttcorefonts/savedir"]["descriptionfr"]="Emplacement d'archivage des fichiers (optionnel) :
 Si vous souhaitez conserver une archive des fichiers Windows téléchargés, veuillez indiquer le répertoire où ils doivent être placés. Si vous laissez ce champ vide, les fichiers seront effacés après usage.
";
$elem["msttcorefonts/savedir"]["default"]="";
$elem["msttcorefonts/dlurl"]["type"]="string";
$elem["msttcorefonts/dlurl"]["description"]="Mirror to download from:
 This package already contains a built-in set of mirrors, which should
 be sufficient for most people. However, if you'd like to use a
 different (possibly local) mirror instead, please enter the full URL
 to the directory containing the relevant files here. If not, just
 leave the field blank.
";
$elem["msttcorefonts/dlurl"]["descriptionde"]="Spiegel, von dem heruntergeladen werden soll:
 Dieses Paket enthält bereits einen eingebauten Satz an Spiegeln, die für die meisten Personen ausreichen sollten. Falls Sie allerdings einen anderen (lokalen) Spiegel verwenden möchten, geben Sie hier die komplette URL zu dem Verzeichnis mit den relevanten Dateien ein. Falls nicht, lassen Sie dieses Feld einfach leer.
";
$elem["msttcorefonts/dlurl"]["descriptionfr"]="Miroir :
 Ce paquet contient une liste de miroirs qui devrait être suffisante pour la plupart des utilisateurs. Toutefois, si vous désirez utiliser un autre miroir (par exemple un miroir local), veuillez indiquer l'URL complète vers le répertoire contenant les fichiers des polices. Sinon, veuillez laisser ce champ vide.
";
$elem["msttcorefonts/dlurl"]["default"]="";
$elem["msttcorefonts/http_proxy"]["type"]="string";
$elem["msttcorefonts/http_proxy"]["description"]="HTTP proxy to use:
 If you need to use a proxy server, please enter it here (example:
 http://192.168.0.1:8080). This will cause the font files to be
 downloaded using your proxy.
 .
 Leave this option blank if you don't use a proxy server.
";
$elem["msttcorefonts/http_proxy"]["descriptionde"]="HTTP-Proxy, der verwendet werden soll:
 Falls Sie einen Proxy-Server benutzen müssen, geben Sie ihn hier ein (Beispiel: http://192.168.0.1:8080). Dies führt dazu, dass die Schrift-Dateien über Ihren Proxy heruntergeladen werden.
 .
 Lassen Sie diese Option leer, falls Sie keinen Proxy-Server benutzen.
";
$elem["msttcorefonts/http_proxy"]["descriptionfr"]="Mandataire HTTP :
 Si vous devez utiliser un mandataire HTTP (« proxy »), veuillez indiquer son adresse (par exemple : http://192.168.0.1:8080). Les fichiers des polices seront alors téléchargés via ce serveur mandataire.
 .
 Vous pouvez laisser ce champ vide si vous n'utilisez pas de mandataire.
";
$elem["msttcorefonts/http_proxy"]["default"]="";
PKG_OptionPageTail2($elem);
?>
