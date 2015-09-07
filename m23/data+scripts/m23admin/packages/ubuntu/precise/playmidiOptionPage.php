<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("playmidi");

$elem["playmidi/options"]["type"]="string";
$elem["playmidi/options"]["description"]="Options for playmidi when invoked through MIME:
 The playmidi package sets up a MIME entry which allows mail user agents
 and other applications to play MIDI files. 
 .
 In order for playmidi to work properly, you may need to set
 hardware-specific options:
 .
  '-a': Sound Blaster AWE32;
  '-e': external MIDI device, Ensoniq SoundScape, Turtle
        Beach WaveFront or WaveBlaster sound card;
  '-g': Gravis Ultrasound.
 .
 Most other cards require no specific options and will work with this
 field left blank. This setting is kept in
 /etc/playmidi/playmidi.conf.
";
$elem["playmidi/options"]["descriptionde"]="Optionen für den Playmidi-Start über MIME:
 Das Playmidi-Paket richtet einen MIME-Eintrag ein, der es E-Mailprogrammen und anderen Anwendungen erlaubt, MIDI-Dateien abzuspielen.
 .
 Damit Playmidi korrekt funktioniert, müssen Sie eventuell hardwarespezifische Optionen setzen:
 .
  '-a': Sound Blaster AWE32;
  '-e': externes MIDI-Gerät, Ensoniq SoundScape, Turtle
        Beach WaveFront oder WaveBlaster-Soundkarte;
  '-g': Gravis Ultrasound.
 .
 Die meisten anderen Karten benötigen keine speziellen Optionen und funktionieren, wenn dieses Feld leer bleibt. Diese Einstellung wird in /etc/playmidi/playmidi.conf gespeichert.
";
$elem["playmidi/options"]["descriptionfr"]="Options de playmidi lorsqu'il est lancé via MIME :
 Le paquet playmidi définit une entrée MIME permettant aux clients de courrier et aux autres applications de jouer des fichiers MIDI.
 .
 Afin que playmidi puisse fonctionner correctement, il peut être nécessaire de définir des options matérielles spécifiques :
 .
  « -a » : SoundBlaster AWE32 ;
  « -e » : périphérique MIDI externe, carte son Ensoniq SoundScape, Turtle
           Beach WaveFront ou WaveBlaster ;
  « -g » : Gravis UltraSound.
 .
 La plupart des autres cartes ne nécessitent pas d'options spécifiques et fonctionneront avec une valeur vide pour ce champ. Ce paramètre est conservé dans /etc/playmidi/playmidi.conf.
";
$elem["playmidi/options"]["default"]="";
PKG_OptionPageTail2($elem);
?>
