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
$elem["freevo/display"]["choicesde"][1]="x11";
$elem["freevo/display"]["choicesde"][2]="fbdev";
$elem["freevo/display"]["choicesde"][3]="dxr3";
$elem["freevo/display"]["choicesde"][4]="mga";
$elem["freevo/display"]["choicesde"][5]="directfb";
$elem["freevo/display"]["choicesde"][6]="dfbmga";
$elem["freevo/display"]["choicesfr"][1]="x11";
$elem["freevo/display"]["choicesfr"][2]="fbdev";
$elem["freevo/display"]["choicesfr"][3]="dxr3";
$elem["freevo/display"]["choicesfr"][4]="mga";
$elem["freevo/display"]["choicesfr"][5]="directfb";
$elem["freevo/display"]["choicesfr"][6]="dfbmga";
$elem["freevo/display"]["description"]="Video output:
";
$elem["freevo/display"]["descriptionde"]="Video-Ausgabe
";
$elem["freevo/display"]["descriptionfr"]="Sortie vidéo :
";
$elem["freevo/display"]["default"]="";
$elem["freevo/geometry"]["type"]="select";
$elem["freevo/geometry"]["choices"][1]="800x600";
$elem["freevo/geometry"]["choices"][2]="768x576";
$elem["freevo/geometry"]["choicesde"][1]="800x600";
$elem["freevo/geometry"]["choicesde"][2]="768x576";
$elem["freevo/geometry"]["choicesfr"][1]="800x600";
$elem["freevo/geometry"]["choicesfr"][2]="768x576";
$elem["freevo/geometry"]["description"]="Output resolution:
 Choose the resolution to display Freevo at. Most Televisions should be
 configured as 768x576 (NTSC or PAL)
";
$elem["freevo/geometry"]["descriptionde"]="Ausgabe-Auflösung
 Wählen Sie die gewünschte Auflösung für die Wiedergabe mit Freevo. Die meisten Fernseher verwenden eine Auflösung von 768x57.
";
$elem["freevo/geometry"]["descriptionfr"]="Résolution de la sortie :
 Veuillez choisir la résolution d'affichage de Freevo. La plupart des télévisions devraient être configurées en 768x576 (NTSC ou PAL).
";
$elem["freevo/geometry"]["default"]="";
$elem["freevo/norm"]["type"]="select";
$elem["freevo/norm"]["choices"][1]="ntsc";
$elem["freevo/norm"]["choices"][2]="pal";
$elem["freevo/norm"]["choicesde"][1]="ntsc";
$elem["freevo/norm"]["choicesde"][2]="pal";
$elem["freevo/norm"]["choicesfr"][1]="NTSC";
$elem["freevo/norm"]["choicesfr"][2]="PAL";
$elem["freevo/norm"]["description"]="TV Standard:
 Please choose your TV standard. North Americans should choose NTSC, most
 Europeans will choose PAL.
";
$elem["freevo/norm"]["descriptionde"]="TV-Standard:
 Wählen Sie einen TV-Standard. Im deutschsprachigen Raum ist dies üblicherweise PAL.
";
$elem["freevo/norm"]["descriptionfr"]="Norme TV :
 Veuillez choisir la norme TV. Les habitants des pays nord-américains devraient choisir la norme NTSC tandis que la plupart des européens choisiront PAL.
";
$elem["freevo/norm"]["default"]="";
$elem["freevo/chanlist"]["type"]="select";
$elem["freevo/chanlist"]["choices"][1]="us-bcast";
$elem["freevo/chanlist"]["choices"][2]="us-cable";
$elem["freevo/chanlist"]["choices"][3]="us-cable-hrc";
$elem["freevo/chanlist"]["choices"][4]="japan-bcast";
$elem["freevo/chanlist"]["choices"][5]="japan-cable";
$elem["freevo/chanlist"]["choices"][6]="europe-west";
$elem["freevo/chanlist"]["choices"][7]="europe-east";
$elem["freevo/chanlist"]["choices"][8]="italy";
$elem["freevo/chanlist"]["choices"][9]="newzealand";
$elem["freevo/chanlist"]["choices"][10]="australia";
$elem["freevo/chanlist"]["choices"][11]="ireland";
$elem["freevo/chanlist"]["choices"][12]="france";
$elem["freevo/chanlist"]["choices"][13]="china-bcast";
$elem["freevo/chanlist"]["choices"][14]="southafrica";
$elem["freevo/chanlist"]["choicesde"][1]="USA terrestrisch";
$elem["freevo/chanlist"]["choicesde"][2]="USA Kabel";
$elem["freevo/chanlist"]["choicesde"][3]="USA Kabel-hrc";
$elem["freevo/chanlist"]["choicesde"][4]="Japan terrestrisch";
$elem["freevo/chanlist"]["choicesde"][5]="Japan Kabel";
$elem["freevo/chanlist"]["choicesde"][6]="Westeuropa";
$elem["freevo/chanlist"]["choicesde"][7]="Osteuropa";
$elem["freevo/chanlist"]["choicesde"][8]="Italien";
$elem["freevo/chanlist"]["choicesde"][9]="Neuseeland";
$elem["freevo/chanlist"]["choicesde"][10]="Australien";
$elem["freevo/chanlist"]["choicesde"][11]="Irland";
$elem["freevo/chanlist"]["choicesde"][12]="Frankreich";
$elem["freevo/chanlist"]["choicesde"][13]="China";
$elem["freevo/chanlist"]["choicesde"][14]="Südafrika";
$elem["freevo/chanlist"]["choicesfr"][1]="us-bcast";
$elem["freevo/chanlist"]["choicesfr"][2]="us-cable";
$elem["freevo/chanlist"]["choicesfr"][3]="us-cable-hrc";
$elem["freevo/chanlist"]["choicesfr"][4]="japan-bcast";
$elem["freevo/chanlist"]["choicesfr"][5]="japan-cable";
$elem["freevo/chanlist"]["choicesfr"][6]="europe-west";
$elem["freevo/chanlist"]["choicesfr"][7]="europe-east";
$elem["freevo/chanlist"]["choicesfr"][8]="italy";
$elem["freevo/chanlist"]["choicesfr"][9]="newzealand";
$elem["freevo/chanlist"]["choicesfr"][10]="australia";
$elem["freevo/chanlist"]["choicesfr"][11]="ireland";
$elem["freevo/chanlist"]["choicesfr"][12]="france";
$elem["freevo/chanlist"]["choicesfr"][13]="china-bcast";
$elem["freevo/chanlist"]["choicesfr"][14]="southafrica";
$elem["freevo/chanlist"]["description"]="Channel List:
 Set the channel list (set of tuning frequencies) that most closely matches
 yours.
";
$elem["freevo/chanlist"]["descriptionde"]="Kanalliste:
 Wählen Sie die Kanalliste, die Ihrer Region entspricht.
";
$elem["freevo/chanlist"]["descriptionfr"]="Liste des chaînes :
 Veuillez choisir la liste des chaînes (ensemble de fréquences) qui se rapproche le plus de celle utilisée dans votre pays.
";
$elem["freevo/chanlist"]["default"]="";
$elem["freevo/title_video"]["type"]="string";
$elem["freevo/title_video"]["description"]="Title of video folder:
 Set a title for the video folder. This will displayed by freevo in overview.
";
$elem["freevo/title_video"]["descriptionde"]="Name des Video-Ordners
 Geben Sie einen Namen für den Video-Ordner an. Dieser wird von Freevo in der Übersicht angezeigt.
";
$elem["freevo/title_video"]["descriptionfr"]="Nom du répertoire vidéo :
 Veuillez indiquer un nom pour le répertoire vidéo. Celui-ci sera affiché par Freevo en surimpression.
";
$elem["freevo/title_video"]["default"]="Video folder";
$elem["freevo/path_to_video"]["type"]="string";
$elem["freevo/path_to_video"]["description"]="Path to videos:
 Set the path to the video folder. Note: A absolute path is required.
";
$elem["freevo/path_to_video"]["descriptionde"]="Pfad zum Video-Ordner:
 Geben Sie den Pfad zum Video-Ordner an. Hinweis: Tragen Sie einen absoluten Pfad ein.
";
$elem["freevo/path_to_video"]["descriptionfr"]="Chemin vers les vidéos :
 Veuillez indiquer le chemin vers le répertoire des vidéos. Il est indispensable d'indiquer un chemin absolu.
";
$elem["freevo/path_to_video"]["default"]="/home/freevo/video";
$elem["freevo/title_audio"]["type"]="string";
$elem["freevo/title_audio"]["description"]="Title of audio folder:
 Set a title for the audio folder. This will displayed by freevo in overview.
";
$elem["freevo/title_audio"]["descriptionde"]="Name des Audio-Ordners
 Geben Sie einen Namen für den Audio-Ordner an. Dieser wird von Freevo in der Übersicht angezeigt.
";
$elem["freevo/title_audio"]["descriptionfr"]="Nom du répertoire audio :
 Veuillez indiquer un titre pour le répertoire audio. Celui-ci sera affiché par Freevo en surimpression.
";
$elem["freevo/title_audio"]["default"]="Audio folder";
$elem["freevo/path_to_audio"]["type"]="string";
$elem["freevo/path_to_audio"]["description"]="Path to audio folder:
 Set the path to the audio folder. Note: A absolute path is required.
";
$elem["freevo/path_to_audio"]["descriptionde"]="Pfad zum Audio-Ordner:
 Geben Sie den Pfad zum Audio-Ordner an. Hinweis: Tragen Sie einen absoluten Pfad ein.
";
$elem["freevo/path_to_audio"]["descriptionfr"]="Chemin vers le répertoire audio :
 Veuillez indiquer un chemin vers le répertoire audio. Il est indispensable d'indiquer un chemin absolu.
";
$elem["freevo/path_to_audio"]["default"]="/home/freevo/audio";
$elem["freevo/title_image"]["type"]="string";
$elem["freevo/title_image"]["description"]="Title of image folder:
 Set a title for the image folder. This will displayed by freevo in overview.
";
$elem["freevo/title_image"]["descriptionde"]="Name des Bilderordners:
 Geben Sie einen Namen für den Bilderordner an. Dieser wird von Freevo in der Übersicht angezeigt.
";
$elem["freevo/title_image"]["descriptionfr"]="Nom du répertoire des images :
 Veuillez indiquer un nom pour le répertoire des images. Celui-ci sera affiché par Freevo en surimpression.
";
$elem["freevo/title_image"]["default"]="Image folder";
$elem["freevo/path_to_image"]["type"]="string";
$elem["freevo/path_to_image"]["description"]="Path to image folder:
 Set the path to the image folder. Note: A absolute path is required.
";
$elem["freevo/path_to_image"]["descriptionde"]="Pfad zum Bilderordner:
 Geben Sie den Pfad zum Bilderordner an. Hinweis: Tragen Sie einen absoluten Pfad ein.
";
$elem["freevo/path_to_image"]["descriptionfr"]="Chemin vers le répertoire des images :
 Veuillez indiquer le chemin vers le répertoire des images. Il est indispensable d'indiquer un chemin absolu.
";
$elem["freevo/path_to_image"]["default"]="/home/freevo/image";
$elem["freevo/path_to_recordings"]["type"]="string";
$elem["freevo/path_to_recordings"]["description"]="Path to recorded video folder:
 Set the path to the recordings folder. Note: A absolute path is required.
";
$elem["freevo/path_to_recordings"]["descriptionde"]="Pfad zum Aufnameordner
 Geben Sie den Pfad zum Aufnahmeordner an. Hinweis: Tragen Sie einen absoluten Pfad ein.
";
$elem["freevo/path_to_recordings"]["descriptionfr"]="Chemin vers le répertoire des vidéos enregistrées :
 Veuillez indiquer le chemin vers le répertoires des enregistrements vidéo. Il est indispensable d'indiquer un chemin absolu.
";
$elem["freevo/path_to_recordings"]["default"]="/home/freevo/recordings";
$elem["freevo/start_on_boot"]["type"]="note";
$elem["freevo/start_on_boot"]["description"]="Start during boot
 Freevo can be started automatically at boot time (inside a dedicated xserver). Also web, encoding, rss and record server can be start automatically on bootup.
";
$elem["freevo/start_on_boot"]["descriptionde"]="Automatischer Start
 Freevo, der Web-, Encoding-, RSS- sowie der Aufnahmeserver können automatisch während des Boot-Vorganges gestartet werden.
";
$elem["freevo/start_on_boot"]["descriptionfr"]="Démarrage au lancement de la machine
 Freevo peut être démarré au lancement de la machine (dans un serveur X dédié). De même, l'encodage, le RSS et le serveur d'enregistrement peuvent être démarrés à ce moment-là.
";
$elem["freevo/start_on_boot"]["default"]="";
$elem["freevo/services"]["type"]="multiselect";
$elem["freevo/services"]["choices"][1]="xserver";
$elem["freevo/services"]["choices"][2]="recordserver";
$elem["freevo/services"]["choices"][3]="encodingserver";
$elem["freevo/services"]["choices"][4]="webserver";
$elem["freevo/services"]["choicesde"][1]="X-Server";
$elem["freevo/services"]["choicesde"][2]="Aufnahmeserver";
$elem["freevo/services"]["choicesde"][3]="Encodingserver";
$elem["freevo/services"]["choicesde"][4]="Webserver";
$elem["freevo/services"]["choicesfr"][1]="xserver";
$elem["freevo/services"]["choicesfr"][2]="recordserver";
$elem["freevo/services"]["choicesfr"][3]="encodingserver";
$elem["freevo/services"]["choicesfr"][4]="webserver";
$elem["freevo/services"]["description"]="Services to start during boot:
 Choose the services you wish to start on boot.
";
$elem["freevo/services"]["descriptionde"]="Automatische gestartete Server:
 Wählen Sie die gewünschten Server aus, die automatisch gestartet werden sollen.
";
$elem["freevo/services"]["descriptionfr"]="Services à démarrer au lancement de la machine :
 Veuillez choisir les services à démarrés au lancement de la machine.
";
$elem["freevo/services"]["default"]="xserver, recordserver, encodingserver";
PKG_OptionPageTail2($elem);
?>
