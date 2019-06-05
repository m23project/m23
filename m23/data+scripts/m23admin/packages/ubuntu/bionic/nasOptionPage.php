<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nas");

$elem["nas/relinquish"]["type"]="boolean";
$elem["nas/relinquish"]["description"]="Should nasd release /dev/dsp?
 By default, the NAS server will open the configured audio device
 at startup, and then keep it open until the server is stopped. This will
 stop any non-NAS-aware audio clients from using the audio device.
 .
 The daemon can be configured to release the audio device when it is
 not using it, with some delay after the
 application completes before the device is available.
 .
 An alternative is to use the \"audiooss\" package to wrap any programs
 that use /dev/dsp to make them use equivalent NAS calls.
";
$elem["nas/relinquish"]["descriptionde"]="Soll nasd das Gerät /dev/dsp freigeben?
 Der NAS-Server öffnet standardmäßig das Audio-Gerät, das beim Systemstart eingerichtet ist, und hält es offen, bis er gestoppt wird. Dies verhindert, dass Audio-Clients das Audio-Gerät benutzen, die NAS nicht kennen.
 .
 Der Dienst kann so eingerichtet werden, dass er das Audio-Gerät freigibt, sobald er es nicht benutzt. Hierbei tritt nach der Beendigung der Anwendung eine Verzögerung auf, bevor das Gerät verfügbar ist.
 .
 Eine andere Möglichkeit bietet das Programm »audiooss«. Es kapselt jedes Programm, das /dev/dsp direkt verwendet, damit es passende Nas-Aufrufe benutzt.
";
$elem["nas/relinquish"]["descriptionfr"]="Nasd doit-il libérer /dev/dsp ?
 Le serveur NAS ouvrira au démarrage le périphérique audio du système, et le gardera ouvert jusqu'à l'arrêt du serveur. Cela interrompra le fonctionnement des clients audio qui n'utilisent pas le serveur NAS pour accéder au périphérique audio.
 .
 Le démon peut être configuré pour libérer le périphérique audio quand il ne l'utilise pas, avec un léger délai entre la fin de l'application et le moment où le périphérique audio redevient disponible.
 .
 Une autre possibilité est d'utiliser le paquet « audiooss » pour envelopper tous les programmes qui utilisent directement /dev/dsp pour leur faire utiliser des appels équivalents au serveur NAS.
";
$elem["nas/relinquish"]["default"]="true";
$elem["nas/mixer"]["type"]="boolean";
$elem["nas/mixer"]["description"]="Should nasd change mixer settings at startup?
 If you choose this option, the NAS server will change the mixer settings
 at startup as follows:
 .
  - set PCM volume to 50%;
  - change the record input device to LINE.
";
$elem["nas/mixer"]["descriptionde"]="Soll nasd die Einstellungen des Mixers beim Systemstart ändern?
 Falls Sie hier zustimmen, wird der Nas-Server die Einstellungen des Mixers beim Systemstart folgendermaßen ändern:
 .
  - setzt PCM-Lautstärke auf 50%;
  - ändert das Aufnahmegerät auf LINE.
";
$elem["nas/mixer"]["descriptionfr"]="Faut-il que nasd modifie les réglages du mélangeur au démarrage ?
 Si vous choisissez cette option, le serveur NAS changera les paramètres du mélangeur (« mixer ») au démarrage, comme suit : 
 .
  - volume PCM placé à 50% ;
  - entrée LIGNE utilisée comme périphérique d'enregistrement.
";
$elem["nas/mixer"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
