<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mserv");

$elem["mserv/mp3_location"]["type"]="string";
$elem["mserv/mp3_location"]["description"]="Please enter the path to the root of your mp3 archive.
 Mserv needs to know where your mp3 files are located so that it can index
 them.  The files don't need to be arranged in any special way.  If you
 don't have any mp3s right now you can just enter anything. In that case
 mserv will not be able to play music.  If you get mp3s in the future you
 can run 'dpkg-reconfigure mserv' to show mserv where they are.
";
$elem["mserv/mp3_location"]["descriptionde"]="Bitte geben Sie das Startverzeichnis Ihrer MP3-Sammlung an.
 Mserv muss wissen, wo Sie Ihre MP3-Dateien abgespeichert haben, damit es diese indizieren kann. Die Dateien müssen nicht auf eine spezielle Weise abgespeichert sein. Wenn Sie bis jetzt keine MP3-Dateien haben, dann geben Sie einen beliebigen Pfad an. Mserv ist dann nicht in der Lage, Musik abzuspielen. Wenn Sie später MP3-Dateien besitzen, dann rufen Sie »dpkg-reconfigure mserv« auf, um den richtigen Pfad anzugeben.
";
$elem["mserv/mp3_location"]["descriptionfr"]="Chemin d'accès à la racine de votre archive de fichiers MP3 :
 Mserv a besoin de connaître l'emplacement de vos fichiers MP3 afin de pouvoir les indexer. Les fichiers n'ont pas besoin d'être organisés d'une manière particulière. Si vous n'avez aucun fichier MP3, indiquez ce que vous voulez. Dans ce cas mserv sera incapable de jouer de la musique. Quand vous recevrez des fichiers MP3, vous pourrez utiliser la commande « dpkg-reconfigure mserv »  pour indiquer à mserv où ils se trouvent.
";
$elem["mserv/mp3_location"]["default"]="";
$elem["mserv/path_invalid"]["type"]="boolean";
$elem["mserv/path_invalid"]["description"]="This path does not exist. Would you like to use it anyway?
";
$elem["mserv/path_invalid"]["descriptionde"]="Dieser Pfad existiert nicht. Soll er trotzdem benutzt werden?
";
$elem["mserv/path_invalid"]["descriptionfr"]="Ce chemin d'accès n'existe pas. Souhaitez-vous l'utiliser malgré tout ?
";
$elem["mserv/path_invalid"]["default"]="false";
$elem["mserv/confirm_update"]["type"]="boolean";
$elem["mserv/confirm_update"]["description"]="Are you sure you want to do this?
 Reconfiguring the location of the mp3 archive when a trackinfo database
 already exists is dangerous. If you proceed with this configuration you
 risk losing your track info database (any ratings, last play times etc.).
 If you know what you are doing or don't care about losing the track info
 database, feel free to continue.
";
$elem["mserv/confirm_update"]["descriptionde"]="Wollen Sie dies wirklich tun?
 Das Anpassen der Pfadangabe der MP3-Dateien ist gefährlich, wenn bereits eine Titel-Datenbank existiert. Wenn Sie fortfahren kann es sein, dass Sie Ihre Titel-Datenbank (Bewertungen, Abspiellisten usw.) verlieren. Wenn Sie genau wissen was Sie tun oder aber die Titel-Datenbank für Sie nicht so wichtig ist, dann können Sie hier fortfahren.
";
$elem["mserv/confirm_update"]["descriptionfr"]="Voulez-vous vraiment changer cet emplacement ?
 Changer l'emplacement de l'archive de fichiers MP3 lorsqu'une base de données d'informations de pistes (« trackinfo ») existe est dangereux. Si vous persistez, vous risquez de perdre votre base de données d'informations de pistes (toutes vos évaluations, durées des dernières écoutes, etc.). Si vous savez ce que vous faites ou si vous ne vous souciez pas de la perte de votre base de données d'informations de pistes, vous pouvez continuer.
";
$elem["mserv/confirm_update"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
