<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("rocksndiamonds");

$elem["rocksndiamonds/begin"]["type"]="boolean";
$elem["rocksndiamonds/begin"]["description"]="Download non-free game data?
 These games require data files that are not available under a free
 software license and so are not distributable with Debian. This
 script may automatically download these data files from the net and install
 them on your system.
";
$elem["rocksndiamonds/begin"]["descriptionde"]="Unfreie Spieledaten herunterladen?
 Diese Spiele erfordern Datendateien, die nicht unter einer freien Softwarelizenz verfügbar sind und somit nicht von Debian verbreitet werden können. Dieses Skript kann diese Datendateien aus dem Netz herunterladen und auf Ihrem System installieren.
";
$elem["rocksndiamonds/begin"]["descriptionfr"]="Faut-il télécharger les données non libres du jeu ?
 Certains des fichiers utilisés par ce jeu ne sont pas distribués sous licence libre et ne peuvent donc pas être inclus dans Debian. Ce script peut télécharger automatiquement ces fichiers depuis Internet et les installer sur votre système.
";
$elem["rocksndiamonds/begin"]["default"]="true";
$elem["rocksndiamonds/select_games"]["type"]="multiselect";
$elem["rocksndiamonds/select_games"]["choices"][1]="Legend Of Zelda";
$elem["rocksndiamonds/select_games"]["choices"][2]="Legend Of Zelda II";
$elem["rocksndiamonds/select_games"]["choices"][3]="Emerald Mine Club";
$elem["rocksndiamonds/select_games"]["choices"][4]="Contributions 1995 - 2006";
$elem["rocksndiamonds/select_games"]["choices"][5]="Juergen Bonhagen game pack";
$elem["rocksndiamonds/select_games"]["choices"][6]="Snake Bite";
$elem["rocksndiamonds/select_games"]["choices"][7]="BD2K3";
$elem["rocksndiamonds/select_games"]["choices"][8]="BD Dream";
$elem["rocksndiamonds/select_games"]["choices"][9]="Supaplex";
$elem["rocksndiamonds/select_games"]["description"]="Games to download data for:
";
$elem["rocksndiamonds/select_games"]["descriptionde"]="Spiele, für die Daten heruntergeladen werden soll:
";
$elem["rocksndiamonds/select_games"]["descriptionfr"]="Télécharger les données du jeu depuis :
";
$elem["rocksndiamonds/select_games"]["default"]="";
$elem["rocksndiamonds/util_notfound"]["type"]="error";
$elem["rocksndiamonds/util_notfound"]["description"]="Missing utilities for download or unpacking
 The wget, 7-zip, unzip, tar are needed to either download or
 unpack the game data.
 .
 Some of them are not available on this system.
 You should install them and then reconfigure this package by
 using 'dpkg-reconfigure rocksndiamonds'.
";
$elem["rocksndiamonds/util_notfound"]["descriptionde"]="Fehlende Werkzeuge zum Herunterladen oder Entpacken
 Die Werkzeuge wget, 7-zip, unzip und tar werden benötigt, um die Spieledaten entweder herunterzuladen oder zu entpacken.
 .
 Einige davon sind auf diesem System nicht verfügbar. Sie sollten sie installieren und dann dieses Paket neu einrichten, indem Sie »dpkg-reconfigure rocksndiamonds« aufrufen.
";
$elem["rocksndiamonds/util_notfound"]["descriptionfr"]="Utilitaires de téléchargement ou décompression des données manquants
 Les paquets wget, unzip, 7-zip et tar sont indispensables pour télécharger et décompresser les données.
 .
 Certains de ces utilitaires ne sont pas installés sur votre système. Vous devez les installer et reconfigurer ce logiciel avec « dpkg-reconfigure rocksndiamonds ».
";
$elem["rocksndiamonds/util_notfound"]["default"]="";
PKG_OptionPageTail2($elem);
?>
