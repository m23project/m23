<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("freevo");

$elem["freevo/display"]["type"]="select";
$elem["freevo/display"]["choices"][1]="x11";
$elem["freevo/display"]["choices"][2]="fbdev";
$elem["freevo/display"]["choices"][3]="dxr3";
$elem["freevo/display"]["choices"][4]="mga";
$elem["freevo/display"]["choices"][5]="directfb";
$elem["freevo/display"]["choices"][6]="dfbmga";
$elem["freevo/display"]["description"]="Video output:
 Please choose the type of video output to use with Freevo.
";
$elem["freevo/display"]["descriptionde"]="Video-Ausgabe:
 Bitte wählen Sie den Video-Ausgabe-Typ, welchen Freevo nutzen soll.
";
$elem["freevo/display"]["descriptionfr"]="Sortie vidéo :
 Veuillez choisir le type de sortie vidéo à utiliser avec Freevo.
";
$elem["freevo/display"]["default"]="";
$elem["freevo/geometry"]["type"]="select";
$elem["freevo/geometry"]["choices"][1]="1920x1080";
$elem["freevo/geometry"]["choices"][2]="1280x720";
$elem["freevo/geometry"]["choices"][3]="800x600";
$elem["freevo/geometry"]["choices"][4]="768x576";
$elem["freevo/geometry"]["description"]="Output resolution:
 Please choose the resolution to use with Freevo. Most CRT television
 systems should be configured as 768x576 (NTSC or PAL). HD television
 systems use 1280x720, and FullHD uses 1920x1080.
";
$elem["freevo/geometry"]["descriptionde"]="Ausgabe-Auflösung:
 Bitte wählen Sie die Auflösung, welche Freevo nutzen soll. Die meisten Röhrenfernseher verwenden eine Auflösung von 768x576 (NTSC oder PAL). HD-Fernseher verwenden 1290x720 und FullHD-Fernseher verwenden 1920x1080.
";
$elem["freevo/geometry"]["descriptionfr"]="Résolution de la sortie :
 Veuillez choisir la résolution d'affichage de Freevo. La plupart des télévisions devraient être configurées en 768x576 (NTSC ou PAL). Les télévisions HD utilisent 1280x720 et les FullHD 1920x1080.
";
$elem["freevo/geometry"]["default"]="";
$elem["freevo/norm"]["type"]="select";
$elem["freevo/norm"]["choices"][1]="ntsc";
$elem["freevo/norm"]["choices"][2]="pal";
$elem["freevo/norm"]["description"]="TV standard:
 Please choose the TV standard to use. NTSC is used in North America,
 much of South America, and Japan; SECAM in France, the former USSR,
 and parts of Africa and the Middle East; and PAL elsewhere.
";
$elem["freevo/norm"]["descriptionde"]="TV-Standard:
 Bitte wählen Sie den TV-Standard aus, der verwendet werden soll. NTSC kommt in Nordamerika, Teilen von Südamerika und Japan zu Einsatz; SECAM in Frankreich, in der ehemaligen UdSSR und teilweise in Afrika und im Mittleren Osten und PAL überall sonst.
";
$elem["freevo/norm"]["descriptionfr"]="Norme TV :
 Veuillez choisir la norme TV. Le système NTSC est utilisé en Amérique du Nord, dans la plupart des pays d'Amérique du Sud et au Japon. Le système SECAM est utilisé en France, dans les anciens pays membres de l'URSS ainsi qu'au Moyen-Orient. Enfin, Le système PAL est utilisé dans le reste du monde.
";
$elem["freevo/norm"]["default"]="";
$elem["freevo/chanlist"]["type"]="select";
$elem["freevo/chanlist"]["choices"][1]="USA broadcast";
$elem["freevo/chanlist"]["choices"][2]="USA cable";
$elem["freevo/chanlist"]["choices"][3]="USA cable HRC";
$elem["freevo/chanlist"]["choices"][4]="Japan broadcast";
$elem["freevo/chanlist"]["choices"][5]="Japan cable";
$elem["freevo/chanlist"]["choices"][6]="Europe (West)";
$elem["freevo/chanlist"]["choices"][7]="Europe (East)";
$elem["freevo/chanlist"]["choices"][8]="Italy";
$elem["freevo/chanlist"]["choices"][9]="New Zealand";
$elem["freevo/chanlist"]["choices"][10]="Australia";
$elem["freevo/chanlist"]["choices"][11]="Ireland";
$elem["freevo/chanlist"]["choices"][12]="France";
$elem["freevo/chanlist"]["choices"][13]="China broadcast";
$elem["freevo/chanlist"]["choices"][14]="South Africa";
$elem["freevo/chanlist"]["choicesde"][1]="USA Antenne";
$elem["freevo/chanlist"]["choicesde"][2]="USA Kabel";
$elem["freevo/chanlist"]["choicesde"][3]="USA Kabel HRC";
$elem["freevo/chanlist"]["choicesde"][4]="Japan Antenne";
$elem["freevo/chanlist"]["choicesde"][5]="Japan Kabel";
$elem["freevo/chanlist"]["choicesde"][6]="Westeuropa";
$elem["freevo/chanlist"]["choicesde"][7]="Osteuropa";
$elem["freevo/chanlist"]["choicesde"][8]="Italien";
$elem["freevo/chanlist"]["choicesde"][9]="Neuseeland";
$elem["freevo/chanlist"]["choicesde"][10]="Australien";
$elem["freevo/chanlist"]["choicesde"][11]="Irland";
$elem["freevo/chanlist"]["choicesde"][12]="Frankreich";
$elem["freevo/chanlist"]["choicesde"][13]="China Antenne";
$elem["freevo/chanlist"]["choicesde"][14]="Südafrika";
$elem["freevo/chanlist"]["choicesfr"][1]="USA hertzien";
$elem["freevo/chanlist"]["choicesfr"][2]="USA câble";
$elem["freevo/chanlist"]["choicesfr"][3]="USA câble HCR";
$elem["freevo/chanlist"]["choicesfr"][4]="Japon hertzien";
$elem["freevo/chanlist"]["choicesfr"][5]="Japon câble";
$elem["freevo/chanlist"]["choicesfr"][6]="Europe de l'Ouest";
$elem["freevo/chanlist"]["choicesfr"][7]="Europe de l'Est";
$elem["freevo/chanlist"]["choicesfr"][8]="Italie";
$elem["freevo/chanlist"]["choicesfr"][9]="Nouvelle-Zélande";
$elem["freevo/chanlist"]["choicesfr"][10]="Australie";
$elem["freevo/chanlist"]["choicesfr"][11]="Irlande";
$elem["freevo/chanlist"]["choicesfr"][12]="France";
$elem["freevo/chanlist"]["choicesfr"][13]="Chine hertzien";
$elem["freevo/chanlist"]["choicesfr"][14]="Afrique du Sud";
$elem["freevo/chanlist"]["description"]="Channel list:
 Please choose the channel list (set of tuning frequencies) that most
 closely matches the one used in your country.
";
$elem["freevo/chanlist"]["descriptionde"]="Kanalliste:
 Bitte wählen Sie die Kanalliste (Zusammensetzung von Empfangsfrequenzen), die am besten der entspricht, die in Ihrer Region genutzt wird.
";
$elem["freevo/chanlist"]["descriptionfr"]="Liste des chaînes :
 Veuillez choisir la liste des chaînes (ensemble de fréquences) qui se rapproche le plus de celle utilisée dans votre pays.
";
$elem["freevo/chanlist"]["default"]="";
$elem["freevo/title_video"]["type"]="string";
$elem["freevo/title_video"]["description"]="Title of video folder:
 Please choose the title of the video folder.
 .
 This will be displayed by Freevo in overview.
";
$elem["freevo/title_video"]["descriptionde"]="Name des Video-Ordners:
 Bitte wählen Sie den Name des Video-Ordners.
 .
 Dieser wird von Freevo in der Übersicht angezeigt.
";
$elem["freevo/title_video"]["descriptionfr"]="Nom du répertoire vidéo :
 Veuillez choisir le nom du répertoire vidéo.
 .
 Celui-ci sera affiché par Freevo en surimpression.
";
$elem["freevo/title_video"]["default"]="Video folder";
$elem["freevo/path_to_video"]["type"]="string";
$elem["freevo/path_to_video"]["description"]="Path to videos:
 Please choose the directory where video files are stored.
 .
 You must use an absolute path (with a leading \"/\" character).
";
$elem["freevo/path_to_video"]["descriptionde"]="Pfad zum Video-Ordner:
 Bitte wählen Sie den Ordner, in dem die Videodateien gespeichert werden sollen.
 .
 Sie müssen einen absoluten Pfad benutzen (mit einem führenden »/« Zeichen).
";
$elem["freevo/path_to_video"]["descriptionfr"]="Chemin vers les vidéos :
 Veuillez choisir le chemin vers le répertoire contenant les fichiers vidéo.
 .
 Vous devez utilisez un chemin absolu pour ce répertoire.
";
$elem["freevo/path_to_video"]["default"]="/var/lib/freevo/video";
$elem["freevo/title_audio"]["type"]="string";
$elem["freevo/title_audio"]["description"]="Title of audio folder:
 Please choose the title of the audio folder.
 .
 This will be displayed by Freevo in overview.
";
$elem["freevo/title_audio"]["descriptionde"]="Name des Audio-Ordners:
 Bitte wählen Sie den Namen des Audio-Ordner.
 .
 Dieser wird von Freevo in der Übersicht angezeigt.
";
$elem["freevo/title_audio"]["descriptionfr"]="Veuillez choisir un nom pour le répertoire audio.
 Nom du répertoire audio :
 .
 Celui-ci sera affiché par Freevo en surimpression.
";
$elem["freevo/title_audio"]["default"]="Audio folder";
$elem["freevo/path_to_audio"]["type"]="string";
$elem["freevo/path_to_audio"]["description"]="Path to audio folder:
 Please choose the directory where audio files are stored.
 .
 You must use an absolute path (with a leading \"/\" character).
";
$elem["freevo/path_to_audio"]["descriptionde"]="Pfad zum Audio-Ordner:
 Bitte wählen Sie den Ordner, in dem die Audiodateien gespeichert werden sollen.
 .
 Sie müssen einen absoluten Pfad benutzen (mit einem führenden »/« Zeichen).
";
$elem["freevo/path_to_audio"]["descriptionfr"]="Veuillez choisir un répertoire pour les fichiers audio.
 Chemin vers le répertoire audio :
 .
 Vous devez utilisez un chemin absolu pour ce répertoire.
";
$elem["freevo/path_to_audio"]["default"]="/var/lib/freevo/audio";
$elem["freevo/title_image"]["type"]="string";
$elem["freevo/title_image"]["description"]="Title of image folder:
 Please choose the title of the image folder.
 .
 This will be displayed by Freevo in overview.
";
$elem["freevo/title_image"]["descriptionde"]="Name des Bilderordners:
 Bitte wählen Sie den Namen des Bilderordners.
 .
 Dieser wird von Freevo in der Übersicht angezeigt.
";
$elem["freevo/title_image"]["descriptionfr"]="Veuillez choisir un nom pour le répertoire des images.
 Nom du répertoire des images :
 .
 Celui-ci sera affiché par Freevo en surimpression.
";
$elem["freevo/title_image"]["default"]="Image folder";
$elem["freevo/path_to_image"]["type"]="string";
$elem["freevo/path_to_image"]["description"]="Path to image folder:
 Please choose the directory where image files are stored.
 .
 You must use an absolute path (with a leading \"/\" character).
";
$elem["freevo/path_to_image"]["descriptionde"]="Pfad zum Bilderordner:
 Bitte wählen Sie den Ordner, in dem die Bilddateien gespeichert werden sollen.
 .
 Sie müssen einen absoluten Pfad benutzen (mit einem führenden »/« Zeichen).
";
$elem["freevo/path_to_image"]["descriptionfr"]="Veuillez choisir le répertoire des fichiers image.
 Chemin vers le répertoire des images :
 .
 Vous devez utilisez un chemin absolu pour ce répertoire.
";
$elem["freevo/path_to_image"]["default"]="/var/lib/freevo/image";
$elem["freevo/path_to_recordings"]["type"]="string";
$elem["freevo/path_to_recordings"]["description"]="Path to recorded video folder:
 Please choose the directory where video recording files are stored.
 .
 You must use an absolute path (with a leading \"/\" character).
";
$elem["freevo/path_to_recordings"]["descriptionde"]="Pfad zum Aufnameordner:
 Bitte wählen Sie den Ordner, in dem die Videoaufnahmedateien gespeichert werden sollen.
 .
 Sie müssen einen absoluten Pfad benutzen (mit einem führenden »/« Zeichen).
";
$elem["freevo/path_to_recordings"]["descriptionfr"]="Veuillez choisir le répertoire des vidéos enregistrées.
 Chemin vers le répertoire des vidéos enregistrées :
 .
 Vous devez utilisez un chemin absolu pour ce répertoire.
";
$elem["freevo/path_to_recordings"]["default"]="/var/lib/freevo/recordings";
$elem["freevo/services"]["type"]="multiselect";
$elem["freevo/services"]["choices"][1]="xserver";
$elem["freevo/services"]["choices"][2]="recordserver";
$elem["freevo/services"]["choices"][3]="encodingserver";
$elem["freevo/services"]["choices"][4]="webserver";
$elem["freevo/services"]["choicesde"][1]="X-Server";
$elem["freevo/services"]["choicesde"][2]="Aufnahmeserver";
$elem["freevo/services"]["choicesde"][3]="Kodierungsserver";
$elem["freevo/services"]["choicesde"][4]="Webserver";
$elem["freevo/services"]["choicesfr"][1]="Serveur X";
$elem["freevo/services"]["choicesfr"][2]="Serveur d'enregistrement";
$elem["freevo/services"]["choicesfr"][3]="Serveur d'encodage";
$elem["freevo/services"]["choicesfr"][4]="Serveur web";
$elem["freevo/services"]["description"]="Services to start during boot:
 Freevo can be started automatically when the machine boots, using a
 dedicated X server. Web, encoding, RSS, and recording servers can be
 launched at the same time.
 .
 Please choose the services you wish to start on boot.
";
$elem["freevo/services"]["descriptionde"]="Dienste, die beim Hochfahren gestartet werden:
 Freevo kann automatisch beim Booten des Systems gestartet werden, mit Hilfe eines eigenständigen X-Server. Web-, Encoding-, RSS- sowie der Aufnahmeserver können zum selben Zeitpunkt gestartet werden.
 .
 Bitte wählen Sie die gewünschten Server aus, die automatisch gestartet werden sollen.
";
$elem["freevo/services"]["descriptionfr"]="Services à démarrer au lancement de la machine :
 Freevo peut être démarré au lancement de la machine (dans un serveur X dédié). De même, des serveurs d'encodage, de flux RSS et d'enregistrement peuvent être démarrés à ce moment-là.
 .
 Veuillez choisir les services à démarrer au lancement de la machine.
";
$elem["freevo/services"]["default"]="xserver, recordserver, encodingserver";
PKG_OptionPageTail2($elem);
?>
