<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mplayer");

$elem["mplayer/cfgnote"]["type"]="note";
$elem["mplayer/cfgnote"]["description"]="Detailed configuration needed for each user
 The performance of MPlayer depends heavily on hardware; this means that
 it may benefit from tweaking options for every single machine it's
 installed on.
 .
 You should read the documentation provided by the
 'mplayer-doc' package.
 .
 Now, some configuration options will be set for the entire system in
 /etc/mplayer/mplayer.conf which may be adapted later. Any user can also
 refine options in ~/.mplayer/config.
";
$elem["mplayer/cfgnote"]["descriptionde"]="Für jeden Benutzer wird eine detaillierte Konfiguration benötigt
 Die Leistung von MPlayer hängt stark von der Hardware ab; das bedeutet, das MPlayer von der Anpassung auf jeder einzelnen Maschine profitiert, auf der es installiert ist.
 .
 Sie sollten die im Paket »mplayer-doc« enthaltene Dokumentation lesen.
 .
 Jetzt werden einige Konfigurationsoptionen für das gesamte System in /etc/mplayer/mplayer.conf gesetzt, die später angepasst werden können. Jeder Benutzer kann die Optionen auch in ~/.mplayer/config anpassen.
";
$elem["mplayer/cfgnote"]["descriptionfr"]="Configuration détaillée par utilisateur
 Les performances de MPlayer dépendent énormément du matériel. Jouer sur les options pour chaque machine peut donc les améliorer.
 .
 Vous devriez lire la documentation qui est fournie dans le paquet « mplayer-doc ».
 .
 Certaines options globales au système vont être réglées dans le fichier /etc/mplayer/mplayer.conf, et pourront être adaptées par la suite. Chaque utilisateur peut également établir des réglages personnels dans ~/.mplayer/config.
";
$elem["mplayer/cfgnote"]["default"]="";
$elem["mplayer/replace-existing-files"]["type"]="boolean";
$elem["mplayer/replace-existing-files"]["description"]="Replace existing configuration file?
 An /etc/mplayer/mplayer.conf file already exists on the system and
 does not contain an automatically-generated part. That file can be replaced
 by a generated one (the old file will be moved to
 /etc/mplayer/mplayer.conf.debconf-old).
";
$elem["mplayer/replace-existing-files"]["descriptionde"]="Vorhandene Konfigurationsdatei ersetzen?
 Eine Datei /etc/mplayer/mplayer.conf existiert bereits auf diesem System, die keinen automatisch erstellten Teil enthält. Diese Datei kann durch eine generierte ersetzt werden (die alte Datei wird in /etc/mplayer/mplayer.conf.debconf-old umbenannt).
";
$elem["mplayer/replace-existing-files"]["descriptionfr"]="Faut-il remplacer le fichier de configuration existant ?
 Un fichier /etc/mplayer/mplayer.conf existe déjà, mais il ne contient pas de section créée automatiquement. Il est possible de créer automatiquement un nouveau fichier. L'ancien fichier sera alors renommé /etc/mplayer/mplayer.conf.debconf-old.
";
$elem["mplayer/replace-existing-files"]["default"]="false";
$elem["mplayer/replace-existing-files-bail"]["type"]="note";
$elem["mplayer/replace-existing-files-bail"]["description"]="Old configuration file kept
 You chose not to replace the existing /etc/mplayer/mplayer.conf
 file.
 .
 That file can be generated automatically later by running
 'dpkg-reconfigure mplayer'.
";
$elem["mplayer/replace-existing-files-bail"]["descriptionde"]="Alte Konfigurationsdatei beibehalten
 Sie haben sich entschieden, die existierende Datei /etc/mplayer/mplayer.conf zu behalten.
 .
 Diese Datei kann später automatisch generiert werden, indem »dpkg-reconfigure mplayer« ausgeführt wird.
";
$elem["mplayer/replace-existing-files-bail"]["descriptionfr"]="Conservation du fichier de configuration existant
 Vous avez choisi de remplacer le fichier /etc/mplayer/mplayer.conf existant.
 .
 Ce fichier peut être créé automatiquement avec la commande « dpkg-reconfigure mplayer ».
";
$elem["mplayer/replace-existing-files-bail"]["default"]="";
$elem["mplayer/voutput"]["type"]="select";
$elem["mplayer/voutput"]["description"]="MPlayer video output:
 MPlayer can use a very wide range of video output drivers.
 The needed driver may be detected automatically or chosen manually.
 .
 If you prefer choosing the driver yourself, you first should choose
 an entry matching this system's video card. If none match and the
 card supports 'XV', choose that option (the 'xvinfo' command may help).
 .
 Please read the /usr/share/doc/mplayer-doc/HTML/en/video.html file from
 the 'mplayer-doc' package for more details.
";
$elem["mplayer/voutput"]["descriptionde"]="Videoausgabe von MPlayer:
 MPlayer kann eine sehr große Anzahl von Video-Ausgabegeräten verwenden. Die benötigten Treiber können automatisch erkannt oder manuell ausgewählt werden.
 .
 Falls Sie den Treiber lieber selbst auswählen möchten, sollten Sie zuerst einen Eintrag auswählen, der zu der Grafikkarte dieses Systems passt. Falls keiner passt und die Karte »XV« unterstützt, wählen Sie diese Option (hierbei kann der Befehl »xvinfo« helfen).
 .
 Bitte lesen Sie die Datei /usr/share/doc/mplayer-doc/HTML/en/video.html im Paket »mplayer-doc« für weitere Details.
";
$elem["mplayer/voutput"]["descriptionfr"]="Sortie vidéo de MPlayer :
 MPlayer peut utiliser de nombreux pilotes de sortie vidéo. Les pilotes requis peuvent être détectés automatiquement ou choisis manuellement.
 .
 Si vous préférez choisir le pilote, vous devez le choisir parmi les pilotes correspondant à la carte vidéo du système. Si aucun ne correspond et que la carte gère « XV », choisissez cette option. La commande « xvinfo » peut être utile pour identifier cette fonctionnalité.
 .
 Veuillez lire le fichier /usr/share/doc/mplayer-doc/HTML/en/video.html du paquet « mplayer-doc » pour plus de détails.
";
$elem["mplayer/voutput"]["default"]="autodetect";
$elem["mplayer/install_codecs"]["type"]="note";
$elem["mplayer/install_codecs"]["description"]="Binary codecs download
 MPlayer supports most video formats without additional software.
 .
 Additional video formats, such as Real 3.0/4.0, Windows Media 9, or Quicktime,
 can be supported by using binary codecs.
 .
 As such codecs are not free software, they are not distributed with
 this package but can be downloaded freely. The
 '/usr/share/mplayer/scripts/binary_codecs.sh' script is provided in
 this package to help downloading them from the MPlayer web site.
";
$elem["mplayer/install_codecs"]["descriptionde"]="Download von binären Codecs
 MPlayer unterstützt die meisten Videoformate ohne zusätzliche Software.
 .
 Zusätzliche Videoformate, wie Real 3.0/4.0, Windows Media 9 oder Quicktime können durch den Einsatz von binären Codecs unterstützt werden.
 .
 Da solche Codecs keine Freie Software sind, werden sie nicht mit diesem Paket vertrieben, können aber kostenfrei heruntergeladen werden. In diesem Paket wird das Skript »/usr/share/mplayer/scripts/binary_codecs.sh« bereitgestellt, um beim Herunterladen von der MPlayer-Website zu helfen.
";
$elem["mplayer/install_codecs"]["descriptionfr"]="Téléchargement de codecs binaires
 MPlayer gère la plupart des formats vidéos sans logiciel additionnel.
 .
 Certains formats vidéos, tels que Real 3.0 et 4.0, Windows Media 9 ou encore Quicktime, peuvent être gérés en utilisant des « codecs » binaires.
 .
 Comme ces « codecs » ne sont pas libres, ils ne sont pas distribués dans ce paquet, mais ils peuvent être téléchargés gratuitement. Le script « /usr/share/mplayer/scripts/binary_codecs.sh » est fourni pour aider au téléchargement sur le site de MPlayer.
";
$elem["mplayer/install_codecs"]["default"]="";
$elem["mplayer/dvd_device"]["type"]="string";
$elem["mplayer/dvd_device"]["description"]="DVD device name:
 Please enter the name of the device for your DVD player, if any.
";
$elem["mplayer/dvd_device"]["descriptionde"]="DVD-Gerätename:
 Bitte geben Sie - falls vorhanden - den Namen des Gerätes Ihres DVD-Spielers an.
";
$elem["mplayer/dvd_device"]["descriptionfr"]="Nom du fichier de périphérique DVD :
 Veuillez indiquer le nom de périphérique de votre lecteur DVD, s'il en existe un.
";
$elem["mplayer/dvd_device"]["default"]="/dev/cdrom";
$elem["mplayer/ttfont"]["type"]="select";
$elem["mplayer/ttfont"]["description"]="Font for On Screen Display:
";
$elem["mplayer/ttfont"]["descriptionde"]="Schriften für eingeblendeten Text:
";
$elem["mplayer/ttfont"]["descriptionfr"]="Police pour l'affichage OSD :
";
$elem["mplayer/ttfont"]["default"]="${ttfontdefault}";
$elem["mplayer/no-ttfont"]["type"]="error";
$elem["mplayer/no-ttfont"]["description"]="No TrueType fonts found for On Screen Display
 MPlayer needs at least one TrueType font for its 'On Screen Display' feature.
 .
 You should install a package providing such fonts (such as
 'ttf-freefont' or 'ttf-bitstream-vera' or 'msttcorefonts')
 and reconfigure MPlayer (by running 'dpkg-reconfigure mplayer').
";
$elem["mplayer/no-ttfont"]["descriptionde"]="Für eingeblendeten Text konnte keine TrueType-Schrift gefunden werden
 MPlayer benötigt mindestens eine TrueType-Schrift für seine Funktionalität »eingeblendeten Text« (»On Screen Display«).
 .
 Sie sollten ein Paket installieren, das solche Schriften enthält (wie »ttf-freefont« oder »ttf-bitstream-vera« oder »msttcorefonts«) und MPlayer rekonfigurieren (durch die Ausführung von »dpkg-reconfigure mplayer«).
";
$elem["mplayer/no-ttfont"]["descriptionfr"]="Pas de police TrueType pour l'affichage à l'écran
 Au moins une police TrueType doit être installée pour que la fonction d'affichage à l'écran (OSD : « On Screen Display ») fonctionne.
 .
 Vous devriez installer un paquet contenant des polices TrueType, tel que « ttf-freefont », « ttf-bitstream-vera » ou « msttcorefonts », avant de reconfigurer MPlayer avec la commande « dpkg-reconfigure mplayer ».
";
$elem["mplayer/no-ttfont"]["default"]="";
PKG_OptionPageTail2($elem);
?>
