<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("prey");

$elem["prey/reporting_frequency"]["type"]="string";
$elem["prey/reporting_frequency"]["description"]="Frequency of Prey reports and actions (minutes):
 Please enter the time to wait before waking up Prey. Control Panel users can
 change this setting later through the web interface.
";
$elem["prey/reporting_frequency"]["descriptionde"]="Zeitabstand der Prey-Berichte und -Aktionen (Minuten):
 Bitte geben Sie die Zeit ein, die vor dem Aufwecken von Prey gewartet werden soll. Benutzer des Kontrollfelds können diese Einstellung später über die Web-Schnittstelle ändern.
";
$elem["prey/reporting_frequency"]["descriptionfr"]="Intervalle entre les actions et rapports de Prey (en minutes) :
 Veuillez indiquer le délai entre chaque lancement de Prey. Les utilisateurs du panneau de contrôle peuvent modifier ultérieurement ce réglage via l'interface web.
";
$elem["prey/reporting_frequency"]["default"]="20";
$elem["prey/active_modules"]["type"]="multiselect";
$elem["prey/active_modules"]["description"]="Modules to enable:
 Prey has many optional modules; if enabled they will be triggered
 automatically if prey recognizes that the device is stolen.
 .
  * alarm:   plays a loud sound for 30 seconds;
  * alert:   shows the thief a short message (and may change the
             wallpaper);
  * geo:     attempts to geolocate the device by using its internal
             GPS or the nearest WiFi access points as reference;
  * lock:    locks the device and asks for a password;
  * network: collects information about the Internet connection;
  * secure:  deletes browser cookies and stored passwords;
  * session: takes a screenshot, collects information about modified
             files and running programs;
  * system:  collects information about the hardware configuration of
             the machine;
  * webcam:  tries to take a picture using the webcam.
";
$elem["prey/active_modules"]["descriptionde"]="Zu aktivierende Module:
 Prey hat viele optionale Module; falls sie aktiviert sind, werden sie automatisch ausgelöst, wenn Prey erkennt, dass das Gerät gestohlen wurde.
 .
  * alarm:   spielt 30 Sekunden lang ein lautes Geräusch
  * alert:   zeigt dem Dieb eine kurze Nachricht (und kann das
             Hintergrundbild ändern)
  * geo:     versucht das Gerät mit internem GPS oder den nächsten
             WiFi-Zugangspunkten als Bezugspunkten zu orten
  * lock:    sperrt das Gerät und erfragt ein Passwort
  * network: sammelt Informationen über die Internetverbindung
  * secure:  löscht Browser-Cookies und gespeicherte Passwörter
  * session: schießt ein Bildschirmfoto, sammelt Informationen über geänderte
             Dateien und laufende Programme
  * system:  sammelt Informationen über die Hardware-Konfiguration des Rechners
  * webcam:  versucht mit der Webcam ein Bild aufzunehmen
";
$elem["prey/active_modules"]["descriptionfr"]="Modules à activer :
 Prey fournit de nombreux modules facultatifs. Veuillez choisir ceux qui seront activés et utilisés si cette machine est volée.
 .
  * alarm :   diffuse un son à volume élevé pendant 30 secondes ;
  * alert :   affiche un message bref au voleur (et peut modifier
              le papier-peint du bureau) ;
  * geo :     tente de géolocaliser le périphérique avec son GPS
              interne ou avec les points d'accès WiFi les plus
              proches ;
  * lock :    verrouille le périphérique et demande un mot de passe ;
  * network : récupère les informations de la connexion réseau ;
  * secure :  supprime les cookies et les mots de passe sauvegardés
              du navigateur ;
  * session : réalise une capture d'écran, récupère les informations sur
              les fichiers modifiés et les programmes exécutés ;
  * system :  récupère les informations sur la configuration matérielle
              de la machine ;
  * webcam :  tente de prendre une photo avec la webcam.
";
$elem["prey/active_modules"]["default"]="alarm";
$elem["prey/edit_config"]["type"]="note";
$elem["prey/edit_config"]["description"]="Configuration required
 To finish configuring Prey, you need to edit \"/etc/prey/config\" and
 choose its running mode. The options are:
 .
  * Control Panel: reports are sent to preyproject.com. Go to
                   http://control.preyproject.com/signup and create
                   an account, then set \"apt_key\" and \"device_key\"
                   appropriately in the configuration file.
  * Standalone:    reports are sent directly to the owner at a
                   specified mail or SSH (scp/sftp) server when
                   activated via a trigger URL under your control.
";
$elem["prey/edit_config"]["descriptionde"]="Konfiguration erforderlich
 Um die Konfiguration von Prey abzuschließen, müssen Sie »/etc/prey/config« bearbeiten und den Ausführungsmodus wählen. Die Optionen lauten:
 .
  * Control Panel: Berichte werden an preyproject.com gesandt. Gehen Sie auf
                   http://control.preyproject.com/signup und legen Sie ein
                   Konto an. Dann setzen Sie in der Konfigurationsdatei
                   »apt_key« und »device_key« auf geeignete Werte.
  * Standalone:    Berichte werden direkt an den Besitzer auf einem
                   angegebenen Mail- oder SSH-Server (scp/sftp) gesandt, wenn
                   dies über eine auslösenden URL unter Ihrer Kontrolle
                   aktiviert wird.
";
$elem["prey/edit_config"]["descriptionfr"]="Configuration indispensable
 Pour terminer la configuration de Prey, vous devez modifier le fichier « /etc/prey/config » et choisir son mode de fonctionnement. Les options possibles sont :
 .
  * Control Panel : Panneau de contrôle.
                    Les rapports sont envoyés à preyproject.com.
                    Vous devez vous rendre sur
                    http://control.preyproject.com/signup, créer un
                    compte puis configurer « apt_key » et « device_key »
                    correctement dans le fichier de configuration.
  * Standalone :    Autonome
                    Les rapports sont envoyés directement au
                    propriétaire à une adresse électronique
                    prédéfinie ou par SSH (scp/sftp) à un serveur
                    lorsqu'il est activé par une URL contrôlée
                    par le propriétaire.
";
$elem["prey/edit_config"]["default"]="";
PKG_OptionPageTail2($elem);
?>
