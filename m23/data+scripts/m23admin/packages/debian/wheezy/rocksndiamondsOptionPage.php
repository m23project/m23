<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rocksndiamonds");

$elem["rocksndiamonds/begin"]["type"]="boolean";
$elem["rocksndiamonds/begin"]["description"]="Download non-free game data?
 The data files required by rocksndiamonds do not have licenses that
 would allow them to be distributed as a package. However, they can
 be automatically downloaded from the Internet and installed locally.
";
$elem["rocksndiamonds/begin"]["descriptionde"]="Unfreie Spieledaten herunterladen?
 Die Datendateien, die von rocksndiamonds benötigt werden, stehen unter keiner Lizenz, die eine Verteilung in einem Paket erlaubt. Wie auch immer, diese können automatisch aus dem Internet geladen und lokal installiert werden.
";
$elem["rocksndiamonds/begin"]["descriptionfr"]="Faut-il télécharger les données non libres du jeu ?
 Les licences des fichiers de données requis par rocksndiamonds ne permettent pas de les distribuer sous forme de paquet. Cependant, ils peuvent être téléchargés automatiquement depuis Internet et installés localement.
";
$elem["rocksndiamonds/begin"]["default"]="true";
$elem["rocksndiamonds/select_games"]["type"]="multiselect";
$elem["rocksndiamonds/select_games"]["choices"][1]="Legend Of Zelda";
$elem["rocksndiamonds/select_games"]["choices"][2]="Legend Of Zelda II";
$elem["rocksndiamonds/select_games"]["choices"][3]="Emerald Mine Club";
$elem["rocksndiamonds/select_games"]["choices"][4]="Contributions 1995 - 2006";
$elem["rocksndiamonds/select_games"]["choices"][5]="Snake Bite";
$elem["rocksndiamonds/select_games"]["choices"][6]="BD2K3";
$elem["rocksndiamonds/select_games"]["choices"][7]="BD Dream";
$elem["rocksndiamonds/select_games"]["choices"][8]="Supaplex";
$elem["rocksndiamonds/select_games"]["description"]="Games to download data for:
";
$elem["rocksndiamonds/select_games"]["descriptionde"]="Spiele, für die Daten heruntergeladen werden sollen:
";
$elem["rocksndiamonds/select_games"]["descriptionfr"]="Jeux pour lesquels télécharger des données :
";
$elem["rocksndiamonds/select_games"]["default"]="";
$elem["rocksndiamonds/util_notfound"]["type"]="error";
$elem["rocksndiamonds/util_notfound"]["description"]="Missing utilities for download or unpacking
 Downloading and unpacking the game data requires the packages
 wget, p7zip, and unzip, but not all of these are available.
 .
 You should install them and then reconfigure this package by
 using \"dpkg-reconfigure rocksndiamonds\".
";
$elem["rocksndiamonds/util_notfound"]["descriptionde"]="Fehlende Werkzeuge zum Herunterladen oder Entpacken
 Zum Herunterladen und Entpacken der Spieledaten werden die Pakete wget, p7zip und unzip benötigt, aber nicht alle sind vorhanden.
 .
 Sie sollten sie installieren und dann dieses Paket neu einrichten, indem Sie »dpkg-reconfigure rocksndiamonds« aufrufen.
";
$elem["rocksndiamonds/util_notfound"]["descriptionfr"]="Utilitaires de téléchargement ou de décompression des données manquants
 Télécharger et extraire les données du jeu requièrent les logiciels wget, p7zip et unzip, mais ceux-ci ne sont pas tous disponibles.
 .
 Vous devriez les installer et reconfigurer ce logiciel avec « dpkg-reconfigure rocksndiamonds ».
";
$elem["rocksndiamonds/util_notfound"]["default"]="";
$elem["rocksndiamonds/error_download"]["type"]="error";
$elem["rocksndiamonds/error_download"]["description"]="Cannot download required resources
 An error occurred while downloading game data. You should check
 the network connection and settings and retry later on.
";
$elem["rocksndiamonds/error_download"]["descriptionde"]="Die benötigten Ressourcen konnten nicht heruntergeladen werden
 Es ist ein Fehler beim Herunterladen der Spieledaten aufgetreten. Bitte prüfen Sie die Netzwerkverbindung und Einstellungen und versuchen Sie es später noch einmal.
";
$elem["rocksndiamonds/error_download"]["descriptionfr"]="Impossible de télécharger les ressources requises
 Une erreur est survenue lors du téléchargement des données du jeu. Vous devriez vérifier la connexion et les paramètres réseau et réessayer plus tard.
";
$elem["rocksndiamonds/error_download"]["default"]="";
PKG_OptionPageTail2($elem);
?>
