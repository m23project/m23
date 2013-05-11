<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nvidia-cg-toolkit");

$elem["nvidia-cg-toolkit/local"]["type"]="string";
$elem["nvidia-cg-toolkit/local"]["description"]="Location of the local file:
 If you have already downloaded the Cg Toolkit from NVIDIA's web site,
 please enter the directory you downloaded it into. Do not include the
 toolkit name. If you have not already downloaded it, leave this blank and the
 package will be downloaded automatically.
";
$elem["nvidia-cg-toolkit/local"]["descriptionde"]="Verzeichnis, in dem die Datei lokal gespeichert ist:
 Falls Sie bereits das Cg-Toolkit von der NVIDIA-Website heruntergeladen haben, geben Sie bitte das Verzeichnis ein, in dem Sie es gespeichert haben. Geben Sie NICHT den Namen des Toolkits mit ein. Wenn Sie es noch nicht heruntergeladen haben, lassen Sie dieses Feld leer; das Paket wird dann automatisch heruntergeladen.
";
$elem["nvidia-cg-toolkit/local"]["descriptionfr"]="Emplacement du fichier local :
 Si vous avez déjà téléchargé la boîte à outils Cg du site web de NVIDIA, veuillez indiquer le répertoire dans lequel vous l'avez enregistré (sans indiquer le nom du fichier). Dans le cas contraire, veuillez laisser ce champ vide et le fichier sera téléchargé automatiquement.
";
$elem["nvidia-cg-toolkit/local"]["default"]="";
$elem["nvidia-cg-toolkit/not_exist"]["type"]="error";
$elem["nvidia-cg-toolkit/not_exist"]["description"]="Directory not found
 The directory you mentioned does not exist. Enter the path of the
 directory that the package is in (don't type name of the file at the end of the
 path).
";
$elem["nvidia-cg-toolkit/not_exist"]["descriptionde"]="Verzeichnis nicht gefunden
 Das Verzeichnis, das Sie angegeben haben, existiert nicht. Geben Sie den Pfad zu dem Verzeichnis ein, in dem das Paket liegt (geben Sie am Ende NICHT den Namen der Datei mit ein).
";
$elem["nvidia-cg-toolkit/not_exist"]["descriptionfr"]="Répertoire inexistant
 Le répertoire que vous avez indiqué n'existe pas. Veuillez indiquer le chemin du répertoire où se trouve la distribution de la boîte à outils (sans indiquer le nom du fichier).
";
$elem["nvidia-cg-toolkit/not_exist"]["default"]="";
$elem["nvidia-cg-toolkit/httpget"]["type"]="boolean";
$elem["nvidia-cg-toolkit/httpget"]["description"]="Automatically download NVIDIA Cg Toolkit from the Internet?
 Please choose this option if you are currently connected to the Internet.
 The NVIDIA Cg Toolkit will automatically be downloaded and installed from
 NVIDIA's web site. If you are not connected to the Internet, you should not
 choose this option. You can install the NVIDIA Cg Toolkit later by running
 nvidia-cg-toolkit-installer as the root user.
";
$elem["nvidia-cg-toolkit/httpget"]["descriptionde"]="Das NVIDIA-Cg-Toolkit automatisch über das Internet herunterladen?
 Wählen Sie bitte diese Option, wenn Sie gerade mit dem Internet verbunden sind. Das NVIDIA-Cg-Toolkit wird automatisch von der NVIDIA-Website heruntergeladen und installiert. Falls Sie nicht mit dem Internet verbunden sind, sollten Sie diese Option nicht wählen. Sie können das NVIDIA-Cg-Toolkit auch später installieren, indem Sie nvidia-cg-toolkit-installer als root ausführen.
";
$elem["nvidia-cg-toolkit/httpget"]["descriptionfr"]="Faut-il automatiquement télécharger la boîte à outils Cg de NVIDIA ?
 Veuillez choisir cette option avec une connexion Internet opérationnelle. La boîte à outils Cg (« Cg toolkit ») de NVIDIA sera automatiquement téléchargé du site web de NVIDIA puis installée. Si aucune connexion n'est active, ne choisissez pas cette option. Vous pourrez installer le paquet plus tard en exécutant « nvidia-cg-toolkit-installer » avec les privilèges du superutilisateur.
";
$elem["nvidia-cg-toolkit/httpget"]["default"]="true";
$elem["nvidia-cg-toolkit/http_proxy"]["type"]="password";
$elem["nvidia-cg-toolkit/http_proxy"]["description"]="HTTP proxy:
 If you have an HTTP proxy server, please enter it here using the URL format
 (e.g., http://login:password@proxy). Leave this field empty if it is not
 needed or if HTTP proxy settings are configured for APT or wget.
";
$elem["nvidia-cg-toolkit/http_proxy"]["descriptionde"]="HTTP-Proxy:
 Wenn Sie einen HTTP-Proxy-Server haben, geben Sie ihn bitte hier im URL-Format ein (z.B. http://login:password@proxy). Lassen Sie dieses Feld leer, falls dies nicht benötigt wird oder falls die HTTP-Proxy-Einstellungen für APT oder wget konfiguriert sind.
";
$elem["nvidia-cg-toolkit/http_proxy"]["descriptionfr"]="Serveur mandataire HTTP :
 Si vous utilisez un serveur mandataire HTTP (« proxy »), veuillez indiquer son URL (par ex. http://login:password@proxy). Dans le cas contraire ou si les réglages du serveur mandataire sont configurés pour APT ou wget, laissez ce champ vide.
";
$elem["nvidia-cg-toolkit/http_proxy"]["default"]="";
$elem["nvidia-cg-toolkit/delete"]["type"]="boolean";
$elem["nvidia-cg-toolkit/delete"]["description"]="Delete downloaded files?
 Please confirm whether you want to delete any downloaded files after
 completing the installation.
";
$elem["nvidia-cg-toolkit/delete"]["descriptionde"]="Heruntergeladene Dateien löschen?
 Bitte entscheiden Sie, ob Sie die heruntergeladenen Dateien nach dem Abschluss der Installation löschen möchten.
";
$elem["nvidia-cg-toolkit/delete"]["descriptionfr"]="Faut-il effacer les fichiers téléchargés ?
 Veuillez confirmer la suppression de tout fichier téléchargé dès l'installation terminée.
";
$elem["nvidia-cg-toolkit/delete"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
