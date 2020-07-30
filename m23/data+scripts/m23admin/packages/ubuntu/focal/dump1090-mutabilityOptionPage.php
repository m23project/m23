<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dump1090-mutability");

$elem["dump1090-mutability/auto-start"]["type"]="boolean";
$elem["dump1090-mutability/auto-start"]["description"]="Start dump1090 automatically?
 dump1090 can be started automatically via an init-script.
 Otherwise, the init-script does nothing; you must run dump1090 by hand.
 .
 You can modify the options used when automatically starting
 dump1090 by running \"dpkg-reconfigure dump1090-mutability\" as root,
 or by editing /etc/default/dump1090-mutability.
";
$elem["dump1090-mutability/auto-start"]["descriptionde"]="Möchten Sie dump1090 automatisch starten?
 dump1090 kann per Init-Skript automatisch gestartet werden. Andernfalls macht das Init-Skript nichts und sie müssen dump1090 von Hand ausführen.
 .
 Die beim automatischen Start verwendeten Optionen können verändert werden; entweder durch Bearbeiten der Datei »/etc/default/dump1090-mutability« oder durch den Aufruf von »dpkg-reconfigure dump1090-mutability« als Benutzer »root«.
";
$elem["dump1090-mutability/auto-start"]["descriptionfr"]="Faut-il démarrer dump1090 automatiquement ?
 dump1090 peut être démarré automatiquement à l'aide d'un init-script. Autrement, ce script ne fait rien et vous devrez lancer dump1090 manuellement.
 .
 Vous pouvez modifier les options utilisées lors du démarrage automatique de dump1090 en lançant « dpkg-reconfigure dump1090-mutability » en tant que superutilisateur ou en éditant /etc/default/dump1090-mutability.
";
$elem["dump1090-mutability/auto-start"]["default"]="true";
$elem["dump1090-mutability/run-as-user"]["type"]="string";
$elem["dump1090-mutability/run-as-user"]["description"]="User to run dump1090 as:
 When started automatically, dump1090 runs as an unprivileged system user. 
 This user will be created if it does not yet exist.
";
$elem["dump1090-mutability/run-as-user"]["descriptionde"]="Geben Sie hier den Benutzer ein, unter dem Sie dump1090 ausführen möchten:
 Wenn dump1090 automatisch gestartet wird, läuft es als unprivilegierter System-Benutzer. Dieser Benutzer wird erstellt, falls er noch nicht existiert.
";
$elem["dump1090-mutability/run-as-user"]["descriptionfr"]="Utilisateur avec lequel exécuter dump1090 :
 Lorsqu'il est démarré automatiquement, dump1090 est exécuté en tant qu'utilisateur système non privilégié. Cet utilisateur sera créé s'il n'existe pas encore.
";
$elem["dump1090-mutability/run-as-user"]["default"]="dump1090";
$elem["dump1090-mutability/log-file"]["type"]="string";
$elem["dump1090-mutability/log-file"]["description"]="Path to log to:
 When started automatically, dump1090 will log its output somewhere. This
 log will contain any startup errors, and periodic statistics reports.
";
$elem["dump1090-mutability/log-file"]["descriptionde"]="Pfad der Protokolldatei:
 Wenn dump1090 automatisch gestartet wird, wird die Ausgabe irgendwohin protokolliert. Diese Protokolldatei enthält alle Startup, sowie regelmäßige statistische Berichte.
";
$elem["dump1090-mutability/log-file"]["descriptionfr"]="Chemin d'enregistrement du journal :
 Lorsqu'il est démarré automatiquement, dump1090 consignera sa sortie quelque part. Ce journal contiendra toute erreur de démarrage et des rapports statistiques périodiques.
";
$elem["dump1090-mutability/log-file"]["default"]="/var/log/dump1090-mutability.log";
$elem["dump1090-mutability/rtlsdr-device"]["type"]="string";
$elem["dump1090-mutability/rtlsdr-device"]["description"]="RTL-SDR dongle to use:
 If you have only one dongle connected, you can leave this blank.
 .
 Otherwise, you can provide the serial number (more reliable) or device
 index (first device = 0, but the ordering is unpredictable) to choose
 a particular dongle to use.
 .
 To run dump1090 in \"net only\" mode, specify the literal word \"none\".
";
$elem["dump1090-mutability/rtlsdr-device"]["descriptionde"]="Zu verwendender RTL-SDR-Dongle:
 Wenn nur ein Dongle eingesteckt ist, können Sie dies leer lassen.
 .
 Um einen bestimmten Dongle auszuwählen, können Sie die Seriennummer angeben (verlässlicher) oder den Geräteindex (das erste Gerät hat den Index 0, aber die Reihenfolge ist nicht vorhersehbar).
 .
 Um dump1090 im »Nur-Netzwerk-Modus« zu betreiben, geben Sie bitte das Wort »none« ein.
";
$elem["dump1090-mutability/rtlsdr-device"]["descriptionfr"]="Dongle RTL-SDR à utiliser :
 Si vous n'avez qu'un seul dongle de connecté, vous pouvez laissez ceci vide.
 .
 Autrement, vous pouvez fournir le numéro de série (plus fiable) ou l'indice d'appareil (premier appareil = 0, mais le numérotage n'est pas prédictible) pour choisir un dongle particulier à utiliser.
 .
 Pour exécuter dump1090 en mode « net only », indiquez le mot littéral « none ».
";
$elem["dump1090-mutability/rtlsdr-device"]["default"]="Default:";
$elem["dump1090-mutability/rtlsdr-gain"]["type"]="string";
$elem["dump1090-mutability/rtlsdr-gain"]["description"]="RTL-SDR gain, in dB:
 The tuner gain used by dump1090 can be provided as a value in dB, or
 \"max\" to use the maximum gain available, or \"agc\" to use the tuner's AGC to
 control the gain. If unsure, choose \"max\".
";
$elem["dump1090-mutability/rtlsdr-gain"]["descriptionde"]="RTL-SDR Verstärkung, in dB:
 Die von dump1090 genutzte Tuner-Verstärkung kann angegeben werden als Wert in dB, als »max«, um den maximal verfügbaren Verstärkungsfaktor zu nutzen oder »agc«, um die AGC des Tuners zur automatischen Verstärkungsregelung zu nutzen. Falls unsicher, wählen Sie »max«.
";
$elem["dump1090-mutability/rtlsdr-gain"]["descriptionfr"]="Gain RTL-SDR, en dB :
 Le gain du tuner utilisé par dump1090 peut être fourni par une valeur en dB, ou « max » pour utiliser le gain maximal disponible, ou « agc » pour utiliser l'AGC du tuner pour contrôler le gain. En cas de doute, choisir « max ».
";
$elem["dump1090-mutability/rtlsdr-gain"]["default"]="max";
$elem["dump1090-mutability/rtlsdr-ppm"]["type"]="string";
$elem["dump1090-mutability/rtlsdr-ppm"]["description"]="RTL-SDR frequency correction, in PPM:
 The oscillator in each RTL-SDL dongle is not perfectly accurate. You can
 choose a correction factor, in parts-per-million, to correct for this. The
 correction factor varies from dongle to dongle, and also varies with operating
 temperature. You can find a suitable value with \"rtl_test -p\" or \"kalibrate\".
 If you don't know the value for your dongle, choose 0.
";
$elem["dump1090-mutability/rtlsdr-ppm"]["descriptionde"]="RTL-SDR-Frequenzkorrektur, in PPM:
 Die Oszillatoren der RTL-SDL-Dongles sind nicht perfekt genau. Um dies auszugleichen, können Sie einen Korrekturfaktor, in Teilen pro Million, wählen. Dieser Korrekturfaktor variiert von Dongle zu Dongle und auch mit der Betriebstemperatur. Einen geeigneten Wert können Sie mit »rtl_test -p« oder »kalibrate« finden. Wenn Sie den Wert für Ihren Dongle nicht kennen, wählen Sie »0«.
";
$elem["dump1090-mutability/rtlsdr-ppm"]["descriptionfr"]="Correction de fréquence RTL-SDR, en PPM :
 L'oscillateur de chaque dongle RTL-SDL n'est pas parfaitement précis. Vous pouvez choisir un coefficient de correction, en partie par million, pour corriger cela. Le coefficient de correction change d'un dongle à l'autre et varie également avec la température de fonctionnement. Vous pouvez trouver une valeur adaptée avec « rtl_test -p » ou « kalibrate ». Si vous ne connaissez pas de valeur pour votre dongle, choisissez 0.
";
$elem["dump1090-mutability/rtlsdr-ppm"]["default"]="0";
$elem["dump1090-mutability/decode-fixcrc"]["type"]="boolean";
$elem["dump1090-mutability/decode-fixcrc"]["description"]="Fix detected CRC errors?
 dump1090 can fix unambiguous single-bit CRC errors detected in received
 messages. This allows weaker messages to be decoded. It can slightly increase
 the rate of undetected errors, but this is not usually significant.
";
$elem["dump1090-mutability/decode-fixcrc"]["descriptionde"]="Erkannte CRC-Fehler korrigieren?
 dump1090 kann unzweideutige 1-Bit-CRC-Fehler in empfangenen Nachrichten beheben. Dadurch können schwächere Signale dekodiert werden. Es kann zu einem leichten Anstieg der Rate von unentdeckten Fehlern führen, dies ist jedoch üblicherweise nicht signifikant.
";
$elem["dump1090-mutability/decode-fixcrc"]["descriptionfr"]="Faut-il corriger les erreurs CRC détectées ?
 dump1090 peut corriger les erreurs CRC non ambigües sur un bit détectées dans les messages reçus. Cela permet à des messages plus faibles d'être décodés. Cela peut légèrement augmenter le taux d'erreurs non détectées, mais n'est généralement pas significatif.
";
$elem["dump1090-mutability/decode-fixcrc"]["default"]="true";
$elem["dump1090-mutability/decode-lat"]["type"]="string";
$elem["dump1090-mutability/decode-lat"]["description"]="Latitude of receiver, in decimal degrees:
 If the location of the receiver is provided, dump1090 can do
 local position decoding in cases where insufficient position messages are
 received for unambiguous global position decoding.
";
$elem["dump1090-mutability/decode-lat"]["descriptionde"]="Breitengrad des Empfängers, in Dezimalgraden:
 Wenn zu wenige Positionsnachrichten für eine eindeutige globale Positionsdekodierung empfangen werden, kann dump1090 eine lokale Positionsdekodierung vornehmen, falls der Ort des Empfängers angegeben wurde.
";
$elem["dump1090-mutability/decode-lat"]["descriptionfr"]="Latitude du récepteur, en degré décimal :
 Si l'emplacement de récepteur est fourni, dump1090 peut faire du décodage de position locale dans les cas où un nombre insuffisant de messages de position sont reçus pour un décodage de position globale sans ambiguïté.
";
$elem["dump1090-mutability/decode-lat"]["default"]="Default:";
$elem["dump1090-mutability/decode-lon"]["type"]="string";
$elem["dump1090-mutability/decode-lon"]["description"]="Longitude of receiver, in decimal degrees:
 If the location of the receiver is provided, dump1090 can do
 local position decoding in cases where insufficient position messages are
 received for unambiguous global position decoding.
";
$elem["dump1090-mutability/decode-lon"]["descriptionde"]="Längengrad des Empfängers, in Dezimalgraden:
 Wenn zu wenige Positionsnachrichten für eine eindeutige globale Positionsdekodierung empfangen werden, kann dump1090 eine lokale Positionsdekodierung vornehmen, falls der Ort des Empfängers angegeben wurde.
";
$elem["dump1090-mutability/decode-lon"]["descriptionfr"]="Longitude du récepteur, en degré décimal :
 Si l'emplacement de récepteur est fourni, dump1090 peut faire du décodage de position locale dans les cas où un nombre insuffisant de messages de position sont reçus pour un décodage de position globale sans ambiguïté.
";
$elem["dump1090-mutability/decode-lon"]["default"]="Default:";
$elem["dump1090-mutability/decode-max-range"]["type"]="string";
$elem["dump1090-mutability/decode-max-range"]["description"]="Absolute maximum range of receiver, in nautical miles:
 If the maximum range of the receiver is provided, dump1090 can filter
 out impossible position reports that are due to aircraft that transmit
 bad data.
 .
 Additionally, if the maximum range is larger than 180NM, when local
 position decoding is used (when insufficient position messages
 have been received for global position decoding), it is limited to
 only those positions that would unambiguously decode to a single
 position within the given receiver range.
 .
 This range should be the absolute maximum range - any position data
 from further away will be entirely discarded!
";
$elem["dump1090-mutability/decode-max-range"]["descriptionde"]="Absolut maximale Reichweite des Empfängers, in nautischen Meilen:
 Wenn die maximale Reichweite des Empfängers angegeben wird, kann dump1090 unmögliche Positionsmeldungen ausfiltern, die von Flugzeugen stammen, die schlechte Daten übermitteln.
 .
 Für den Fall, dass die maximale Reichweite größer als 180 NM ist, gilt außerdem: 
 Wenn zu wenig Standortnachrichten für eine globale Positionsdekodierung empfangen wurden und daher die lokale Positionsdekodierung durchgeführt wird, bleibt diese begrenzt auf jene Positionen, die sich auf einen eindeutigen Standort innerhalb der Reichweite des Empfängers auflösen lassen.
 .
 Diese Reichweite sollte die absolut maximale Reichweite sein - alle weiter entfernten Positionsdaten werden gänzlich verworfen!
";
$elem["dump1090-mutability/decode-max-range"]["descriptionfr"]="Distance maximale absolue du récepteur, en mille marin :
 Si la distance maximale du récepteur est fournie, dump1090 peut écarter des rapports de position impossible dûs à des avions transmettant de mauvaises données.
 .
 De plus, si la distance maximale est plus grande que 180 M, lorsque le décodage de la position locale est utilisé (quand un nombre insuffisant de messages de position ont été reçus pour le décodage de la position globale), il est limité aux seules positions qui seraient décodées sans ambiguïté vers une position unique dans la zone du récepteur.
 .
 Cette distance devrait être la distance maximale absolue ; toute donnée de position plus lointaine sera complètement ignorée !
";
$elem["dump1090-mutability/decode-max-range"]["default"]="300";
$elem["dump1090-mutability/net-ri-port"]["type"]="string";
$elem["dump1090-mutability/net-ri-port"]["description"]="Portsfor AVR-format input connections (0 disables):
 dump1090 can accept connections to receive data from other sources in 
 several formats. This setting controls the port dump1090 will listen
 on for AVR (\"raw\") format input connections.
";
$elem["dump1090-mutability/net-ri-port"]["descriptionde"]="Ports für eingehende Verbindungen im AVR-Format (»0« deaktiviert):
 dump1090 kann Verbindungen akzeptieren, um Daten von anderen Quellen in verschiedenen Formaten zu empfangen. Diese Einstellung regelt den Port, an dem dump1090 auf eingehende Verbindungen im AVR-Format (»raw«) wartet.
";
$elem["dump1090-mutability/net-ri-port"]["descriptionfr"]="Ports pour les connexions entrantes au format AVR (0 pour désactiver) :
 dump1090 peut accepter des connexions pour recevoir des données depuis d'autres sources dans plusieurs formats. Ce réglage fixe le port sur lequel dump1090 va écouter des connexions entrantes au format AVR (« raw »).
";
$elem["dump1090-mutability/net-ri-port"]["default"]="30001";
$elem["dump1090-mutability/net-ro-port"]["type"]="string";
$elem["dump1090-mutability/net-ro-port"]["description"]="Ports for AVR-format output connections (0 disables):
 dump1090 can forward ADS-B messages to other software in several formats.
 This setting controls the port dump1090 will listen on for AVR (\"raw\")
 format output connections.
";
$elem["dump1090-mutability/net-ro-port"]["descriptionde"]="Ports für ausgehende Verbindungen im AVR-Format (»0« deaktiviert):
 dump1090 kann ADS-B-Nachrichten an andere Software in verschiedenen Formaten weiterleiten. Diese Einstellung steuert den Port, an dem dump1090 auf ausgehende Verbindungen im AVR-Format (»raw«) wartet.
";
$elem["dump1090-mutability/net-ro-port"]["descriptionfr"]="Ports pour les connexions sortantes au format AVR (0 pour désactiver) :
 dump1090 peut propager des messages ADS-B vers d'autres logiciels dans plusieurs formats. Ce réglage fixe le port sur lequel dump1090 va écouter des connexions sortantes au format AVR (« raw »).
";
$elem["dump1090-mutability/net-ro-port"]["default"]="30002";
$elem["dump1090-mutability/net-bi-port"]["type"]="string";
$elem["dump1090-mutability/net-bi-port"]["description"]="Ports for Beast-format input connections (0 disables):
 dump1090 can accept connections to receive data from other sources in 
 several formats. This setting controls the port dump1090 will listen
 on for Beast (\"binary\") format input connections.
";
$elem["dump1090-mutability/net-bi-port"]["descriptionde"]="Ports für eingehende Verbindungen im Beast-Format (»0« deaktiviert):
 dump1090 kann Verbindungen akzeptieren, um Daten von anderen Quellen in verschiedenen Formaten zu empfangen. Diese Einstellung steuert den Port, an dem dump1090 auf eingehende Verbindungen im Beast-Format (»binary«) wartet.
";
$elem["dump1090-mutability/net-bi-port"]["descriptionfr"]="Ports pour les connexions entrantes au format Beast (0 pour désactiver) :
 dump1090 peut accepter des connexions pour recevoir des données depuis d'autres sources dans plusieurs formats. Ce réglage fixe le port sur lequel dump1090 va écouter des connexions entrantes au format Beast (« binary »).
";
$elem["dump1090-mutability/net-bi-port"]["default"]="30004,30104";
$elem["dump1090-mutability/net-bo-port"]["type"]="string";
$elem["dump1090-mutability/net-bo-port"]["description"]="Ports for Beast-format output connections (0 disables):
 dump1090 can forward ADS-B messages to other software in several formats.
 This setting controls the port dump1090 will listen on for Beast (\"binary\")
 format output connections.
";
$elem["dump1090-mutability/net-bo-port"]["descriptionde"]="Ports für ausgehende Verbindungen im Beast-Format (»0« deaktiviert):
 dump1090 kann ADS-B-Nachrichten an andere Software in verschiedenen Formaten weiterleiten. Diese Einstellung steuert den Port, an dem dump1090 auf ausgehende Verbindungen im Beast-Format (»binary«) wartet.
";
$elem["dump1090-mutability/net-bo-port"]["descriptionfr"]="Ports pour les connexions sortantes au format Beast (0 pour désactiver) :
 dump1090 peut propager des messages ADS-B vers d'autres logiciels dans plusieurs formats. Ce réglage fixe le port sur lequel dump1090 va écouter pour des connexions sortantes au format Beast (« binary »).
";
$elem["dump1090-mutability/net-bo-port"]["default"]="30005";
$elem["dump1090-mutability/net-sbs-port"]["type"]="string";
$elem["dump1090-mutability/net-sbs-port"]["description"]="Ports for SBS-format output connections (0 disables):
 dump1090 can forward ADS-B messages to other software in several formats.
 This setting controls the port dump1090 will listen on for SBS BaseStation
 format output connections.
";
$elem["dump1090-mutability/net-sbs-port"]["descriptionde"]="Ports für ausgehende Verbindungen im SBS-Format (»0« deaktiviert):
 dump1090 kann ADS-B-Nachrichten an andere Software in verschiedenen Formaten weiterleiten. Diese Einstellung steuert den Port, an dem dump1090 auf ausgehende Verbindungen im SBS-BaseStation-Format wartet.
";
$elem["dump1090-mutability/net-sbs-port"]["descriptionfr"]="Ports pour les connexions sortantes au format SBS (0 pour désactiver) :
 dump1090 peut propager des messages ADS-B vers d'autres logiciels dans plusieurs formats. Ce réglage fixe le port sur lequel dump1090 va écouter pour des connexions sortantes au format SBS BaseStation.
";
$elem["dump1090-mutability/net-sbs-port"]["default"]="30003";
$elem["dump1090-mutability/net-heartbeat"]["type"]="string";
$elem["dump1090-mutability/net-heartbeat"]["description"]="Seconds between heartbeat messages (0 disables):
 If there is no other data sent on a network connection, dump1090 can
 periodically send an empty heartbeat message to ensure that the
 connection stays established. This setting controls the interval
 betweeen heartbeat messages.
";
$elem["dump1090-mutability/net-heartbeat"]["descriptionde"]="Sekunden zwischen »Heartbeat«-Nachrichten (»0« deaktiviert):
 Wenn keine anderen Daten auf der Netzwerkverbindung gesendet werden, kann dump1090 periodisch eine leere »Heartbeat«-Nachricht senden, und so sicherstellen, dass die Verbindung aufrechterhalten bleibt. Diese Einstellung steuert das Intervall zwischen diesen »Heartbeat«-Nachrichten.
";
$elem["dump1090-mutability/net-heartbeat"]["descriptionfr"]="Secondes entre deux messages de pulsation (0 pour désactiver) :
 S'il n'y a pas d'autres données envoyées sur une connexion réseau, dump1090 peut envoyer périodiquement un message vide de pulsation pour garantir que la connexion reste établie. Ce réglage fixe l'intervalle entre les messages de pulsation.
";
$elem["dump1090-mutability/net-heartbeat"]["default"]="60";
$elem["dump1090-mutability/net-out-size"]["type"]="string";
$elem["dump1090-mutability/net-out-size"]["description"]="Minimum output message size:
 To avoid sending many small network messages, output connections will
 accumulate data waiting to be sent until either a minimum size is reached
 or a maximum delay is reached. This setting controls the minimum size,
 in bytes.
";
$elem["dump1090-mutability/net-out-size"]["descriptionde"]="Minimale Größe der Ausgabenachrichten:
 Um das Senden vieler kleiner Netzwerknachrichten zu vermeiden, werden ausgehende Verbindungen sendebereite Daten ansammeln, bis entweder eine minimale Größe oder eine maximale Verzögerung erreicht ist. Diese Einstellung kontrolliert die minimale Größe, in Byte.
";
$elem["dump1090-mutability/net-out-size"]["descriptionfr"]="Taille minimale des messages sortants :
 Afin d'éviter l'envoi de beaucoup de petits messages réseau, les connexions sortantes vont accumuler des données en attente d'envoi jusqu'à ce qu'une taille minimale ou un délai maximal soient atteints. Ce réglage fixe la taille minimale en octets.
";
$elem["dump1090-mutability/net-out-size"]["default"]="500";
$elem["dump1090-mutability/net-out-interval"]["type"]="string";
$elem["dump1090-mutability/net-out-interval"]["description"]="Maximum output buffering time:
 To avoid sending many small network messages, output connections will
 buffer data waiting to be sent until either a minimum size is reached
 or a maximum delay is reached. This setting controls the maximum delay,
 in seconds.
";
$elem["dump1090-mutability/net-out-interval"]["descriptionde"]="Maximale Ausgabepufferzeit:
 Um das Senden vieler kleiner Netzwerknachrichten zu vermeiden, werden ausgehende Verbindungen sendebereite Daten ansammeln, bis entweder eine minimale Größe oder eine maximale Verzögerung erreicht ist. Diese Einstellung regelt die maximale Verzögerung in Sekunden.
";
$elem["dump1090-mutability/net-out-interval"]["descriptionfr"]="Temps maximal de mise en mémoire tampon de la sortie :
 Afin d'éviter l'envoi de beaucoup de petits messages réseau, les connexions sortantes vont accumuler des données en attente d'envoi jusqu'à ce qu'une taille minimale ou un délai maximal soient atteints. Ce réglage fixe le délai maximal en secondes.
";
$elem["dump1090-mutability/net-out-interval"]["default"]="1";
$elem["dump1090-mutability/net-buffer"]["type"]="select";
$elem["dump1090-mutability/net-buffer"]["choices"][1]="65536";
$elem["dump1090-mutability/net-buffer"]["choices"][2]="131072";
$elem["dump1090-mutability/net-buffer"]["description"]="SO_SNDBUF size:
 Here you can specify the TCP send buffer size to use on network connections.
";
$elem["dump1090-mutability/net-buffer"]["descriptionde"]="Größe von SO_SNDBUF:
 Hier können Sie die TCP-Sendepuffergröße für die Netzwerkverbindungen angeben.
";
$elem["dump1090-mutability/net-buffer"]["descriptionfr"]="taille SO_SNDBUF :
 Vous pouvez ici indiquer la taille du tampon d'envoi TCP à utiliser sur les connexions réseau.
";
$elem["dump1090-mutability/net-buffer"]["default"]="262144";
$elem["dump1090-mutability/net-bind-address"]["type"]="string";
$elem["dump1090-mutability/net-bind-address"]["description"]="Interface address to bind to (blank for all interfaces):
 If you want to limit incoming connections to a particular interface,
 specify the interface address here. A blank value will bind to the wildcard
 address, allowing connections on all interfaces.
 .
 The default value of 127.0.0.1 will allow connections only on localhost,
 i.e. only connections that originate on the same machine.
";
$elem["dump1090-mutability/net-bind-address"]["descriptionde"]="Adresse der Schnittstelle, an die gebunden werden soll (leer für alle Schnittstellen):
 Falls Sie eingehende Verbindungen auf eine bestimmte Schnittstelle begrenzen möchten, geben Sie die Adresse der Schnittstelle hier an. Eine leere Eingabe bindet an die Platzhalter-Adresse. Dies erlaubt Verbindungen auf allen Schnittstellen.
 .
 Der Vorgabewert von 127.0.0.1 erlaubt Verbindungen nur auf localhost, d. h. nur Verbindungen, die der selben Maschine entstammen.
";
$elem["dump1090-mutability/net-bind-address"]["descriptionfr"]="Adresse de l'interface à laquelle se lier (à laisser vide pour toutes les interfaces) :
 Si vous souhaitez limiter les connexions entrantes à une interface en particulier, veuillez indiquer l'adresse de cette interface ici. Une valeur vide va lier à l'adresse joker, autorisant des connexions à toutes les interfaces.
 .
 La valeur par défaut de 127.0.0.1 va permettre des connexions à localhost seulement, c.-à-d. uniquement les connexions provenant de la même machine.
";
$elem["dump1090-mutability/net-bind-address"]["default"]="127.0.0.1";
$elem["dump1090-mutability/stats-interval"]["type"]="string";
$elem["dump1090-mutability/stats-interval"]["description"]="Interval between logging stats, in seconds:
 dump1090 will periodically log message reception stats to its logfile.
 This setting controls how often that is done.
";
$elem["dump1090-mutability/stats-interval"]["descriptionde"]="Log-Intervall der Statistiken, in Sekunden:
 dump1090 wird periodisch Statistiken über den Empfang von Nachrichten in seine Log-Datei schreiben. Diese Einstellung kontrolliert, wie häufig dies geschieht.
";
$elem["dump1090-mutability/stats-interval"]["descriptionfr"]="Intervalle entre deux statistiques de journalisation, en seconde :
 dump1090 va périodiquement consigner les statistiques de réception de message dans son journal. Ce réglage fixe la fréquence de cette opération.
";
$elem["dump1090-mutability/stats-interval"]["default"]="3600";
$elem["dump1090-mutability/use-lighttpd"]["type"]="boolean";
$elem["dump1090-mutability/use-lighttpd"]["description"]="Enable the lighttpd integration?
 dump1090 can serve a virtual radar map via a separate webserver.
 This package includes a configuration for lighttpd that does this.
 To use that configuration, enable this option.
";
$elem["dump1090-mutability/use-lighttpd"]["descriptionde"]="»lighttpd«-Integration aktivieren?
 dump1090 kann eine virtuelle Radarkarte über einen separaten Webserver bereitstellen. Dieses Paket beinhaltet eine Konfiguration für »lighttpd« zu diesem Zweck. Um diese Konfiguration zu nutzen, aktivieren Sie diese Option.
";
$elem["dump1090-mutability/use-lighttpd"]["descriptionfr"]="Faut-il activer l'intégration de lighttpd ?
 dump1090 peut servir une carte radar virtuelle à l'aide d'un serveur web séparé. Ce paquet inclut une configuration pour lighttpd qui permet cela. Pour utiliser cette configuration, activez cette option.
";
$elem["dump1090-mutability/use-lighttpd"]["default"]="true";
$elem["dump1090-mutability/json-dir"]["type"]="string";
$elem["dump1090-mutability/json-dir"]["description"]="Directory to write JSON aircraft state to:
 As this can be written frequently, you should select a location
 that is not on a sdcard. The default path under /run is on tmpfs
 and will not write to the sdcard.
 .
 A blank path disables writing JSON state. This will also disable
 the virtual radar map.
";
$elem["dump1090-mutability/json-dir"]["descriptionde"]="Verzeichnis, in das der JSON-Flugzeugstatus geschrieben werden soll:
 Da dies regelmäßig geschrieben wird, sollten Sie einen Ort finden, der nicht auf einer SD-Karte ist. Der vorgegebene Pfad unter »/run« liegt auf tmpfs; es wird somit nicht auf die SD-Karte geschrieben.
 .
 Ein leerer Pfad deaktiviert das Schreiben des JSON-Status. Dies wird auch die virtuelle Radarkarte deaktivieren.
";
$elem["dump1090-mutability/json-dir"]["descriptionfr"]="Dossier dans lequel écrire le JSON d'état de l'avion :
 Comme cela peut être écrit fréquemment, il est conseillé de choisir un emplacement qui n'est pas sur une carte SD. Le chemin par défaut sous /run est sur tmpfs et n'écrira pas sur la carte SD.
 .
 Un chemin vide désactive l'écriture du JSON d'état. Cela entraînera également la désactivation de la carte radar virtuelle.
";
$elem["dump1090-mutability/json-dir"]["default"]="/run/dump1090-mutability";
$elem["dump1090-mutability/json-interval"]["type"]="string";
$elem["dump1090-mutability/json-interval"]["description"]="Interval between writing JSON aircraft state, in seconds:
 dump1090 periodically write a list of aircraft, in JSON format, for use
 by the virtual radar view when using an external webserver. This setting
 controls the directory to write to.
 .
 Here you can control how often the JSON state is updated, which determines
 how frequently the virtual radar view updates.
";
$elem["dump1090-mutability/json-interval"]["descriptionde"]="Intervall zwischen dem Schreiben der JSON-Flugzeug-Zustände, in Sekunden:
 dump1090 erstellt periodisch eine Liste von Flugzeugen im JSON-Format, die von einem externen Webserver für die virtuelle Radaransicht genutzt wird. Diese Einstellung bestimmt das Verzeichnis, in das geschrieben werden soll.
 .
 Hier können Sie kontrollieren, wie häufig der JSON-Status aktualisiert wird, was wiederum bestimmt, wie regelmäßig die virtuelle Radaransicht erneuert wird.
";
$elem["dump1090-mutability/json-interval"]["descriptionfr"]="Intervalle entre deux écritures du JSON d'état de l'avion, en seconde :
 dump1090 écrit périodiquement une liste des avions, dans le format JSON, utilisée par la vue radar virtuelle lors de l'utilisation d'un serveur web externe. Ce réglage fixe le dossier dans lequel l'écrire.
 .
 Vous pouvez ici fixer la fréquence à laquelle le JSON d'état est mis à jour, ce qui détermine la fréquence de rafraîchissement de la vue radar virtuelle.
";
$elem["dump1090-mutability/json-interval"]["default"]="1";
$elem["dump1090-mutability/json-location-accuracy"]["type"]="select";
$elem["dump1090-mutability/json-location-accuracy"]["choices"][1]="approximate";
$elem["dump1090-mutability/json-location-accuracy"]["choices"][2]="exact";
$elem["dump1090-mutability/json-location-accuracy"]["description"]="Receiver location accuracy to show in the web interface:
 dump1090 can provide the configured receiver location to the web map,
 so that the map can show distances from the receiver.
 .
 For privacy reasons, if you are making the map publicly available you
 may not want to show the exact location of the receiver. There are three
 options available to control what is shown:
 .
 approximate: dump1090 will provide the receiver location rounded to the
   nearest 0.01 degree of latitude and longitude. This gives a location
   that is accurate to within about 0.5 - 1km.
 .
 exact: dump1090 will provide the exact receiver location.
 .
 none: dump1090 will not provide the receiver location at all; distance
   display will be disabled.
";
$elem["dump1090-mutability/json-location-accuracy"]["descriptionde"]="Die in der Weboberfläche dargestellte Ortsgenauigkeit des Empfängers:
 dump1090 kann den konfigurierten Standort des Empfängers der Webkarte mitteilen, so dass die Karte Abstände vom Empfänger zeigt.
 .
 Wenn Sie die Karte öffentlich verfügbar machen, kann es sein, dass Sie aus Datenschutzgründen nicht den genauen Standort des Empfängers offenlegen möchten. Es stehen drei Möglichkeiten zur Wahl, um zu steuern, was gezeigt wird:
 .
 approximate: dump1090 wird den Empfängerstandort gerundet auf das nächste 0,01 Grad Breite und Länge bekanntmachen. Dies ergibt einen Standort mit einer Genauigkeit von 0,5 - 1 km.
 .
 exact: dump1090 wird den exakten Empfängerstandort mitteilen.
 .
 none: dump1090 wird den Empfängerstandort nicht mitteilen; die Darstellung von Entfernungen wird deaktiviert.
";
$elem["dump1090-mutability/json-location-accuracy"]["descriptionfr"]="Précision de la position du récepteur à présenter dans l'interface web :
 dump1090 peut fournir la position du récepteur à la carte web, de façon à ce que la carte puisse afficher les distances au récepteur.
 .
 Pour des raisons de confidentialité, si vous rendez la carte disponible publiquement, vous pouvez ne pas vouloir afficher la position exacte du récepteur. Trois options sont disponibles pour régler ce qui est affiché :
 .
 approximate : dump1090 fournira la position du récepteur arrondie à 0,01 degré de latitude et de longitude. Cela donne une précision de la position d'environ 0,5 à 1 km.
 .
 exact : dump1090 fournira la position exacte du récepteur.
 .
 none : dump1090 ne fournira pas du tout la position du récepteur ; l'affichage de la distance sera désactivé.
";
$elem["dump1090-mutability/json-location-accuracy"]["default"]="approximate";
$elem["dump1090-mutability/log-decoded-messages"]["type"]="boolean";
$elem["dump1090-mutability/log-decoded-messages"]["description"]="Log all decoded messages?
 dump1090 can log all decoded messages as text to the logfile.
 This can result in a very large logfile! Usually you don't need this.
";
$elem["dump1090-mutability/log-decoded-messages"]["descriptionde"]="Alle dekodierten Nachrichten loggen?
 dump1090 kann alle dekodierten Nachrichten als Text in die Log-Datei schreiben. Dies kann zu sehr großen Log-Dateien führen! Für gewöhnlich benötigen Sie dies nicht.
";
$elem["dump1090-mutability/log-decoded-messages"]["descriptionfr"]="Faut-il consigner tous les messages décodés ?
 dump1090 peut consigner tous les messages décodés sous forme de texte dans le journal. Cela peut aboutir à un journal très volumineux ! Vous n'avez habituellement pas besoin de cela.
";
$elem["dump1090-mutability/log-decoded-messages"]["default"]="false";
$elem["dump1090-mutability/extra-args"]["type"]="string";
$elem["dump1090-mutability/extra-args"]["description"]="Extra arguments to pass to dump1090:
 Here you can add any extra arguments you want to pass to dump1090.
";
$elem["dump1090-mutability/extra-args"]["descriptionde"]="Zusätzliche Argumente für dump1090:
 Hier können Sie alle zusätzlichen Argumente für dump1090 angeben.
";
$elem["dump1090-mutability/extra-args"]["descriptionfr"]="Argument supplémentaires à passer à dump1090 :
 Vous pouvez ici ajouter autant d'arguments supplémentaires que vous souhaitez passer à dump1090.
";
$elem["dump1090-mutability/extra-args"]["default"]="Default:";
$elem["dump1090-mutability/invalid-is_unsigned_int"]["type"]="error";
$elem["dump1090-mutability/invalid-is_unsigned_int"]["description"]="Value must be an unsigned integer.
";
$elem["dump1090-mutability/invalid-is_unsigned_int"]["descriptionde"]="Der Wert muss eine vorzeichenlose Ganzzahl sein.
";
$elem["dump1090-mutability/invalid-is_unsigned_int"]["descriptionfr"]="La valeur doit être un entier non signé.
";
$elem["dump1090-mutability/invalid-is_unsigned_int"]["default"]="";
$elem["dump1090-mutability/invalid-is_unsigned_int_or_empty"]["type"]="error";
$elem["dump1090-mutability/invalid-is_unsigned_int_or_empty"]["description"]="Value must be an unsigned integer, or blank.
";
$elem["dump1090-mutability/invalid-is_unsigned_int_or_empty"]["descriptionde"]="Der Wert muss eine vorzeichenlose Ganzzahl sein oder leer bleiben.
";
$elem["dump1090-mutability/invalid-is_unsigned_int_or_empty"]["descriptionfr"]="La valeur doit être un entier non signé ou être vide.
";
$elem["dump1090-mutability/invalid-is_unsigned_int_or_empty"]["default"]="";
$elem["dump1090-mutability/invalid-is_positive_int"]["type"]="error";
$elem["dump1090-mutability/invalid-is_positive_int"]["description"]="Value must be a positive integer.
";
$elem["dump1090-mutability/invalid-is_positive_int"]["descriptionde"]="Der Wert muss eine positive Ganzzahl sein.
";
$elem["dump1090-mutability/invalid-is_positive_int"]["descriptionfr"]="La valeur doit être un entier positif.
";
$elem["dump1090-mutability/invalid-is_positive_int"]["default"]="";
$elem["dump1090-mutability/invalid-is_signed_int"]["type"]="error";
$elem["dump1090-mutability/invalid-is_signed_int"]["description"]="Value must be an integer.
";
$elem["dump1090-mutability/invalid-is_signed_int"]["descriptionde"]="Der Wert muss eine Ganzzahl sein.
";
$elem["dump1090-mutability/invalid-is_signed_int"]["descriptionfr"]="La valeur doit être un entier.
";
$elem["dump1090-mutability/invalid-is_signed_int"]["default"]="";
$elem["dump1090-mutability/invalid-is_signed_int_or_empty"]["type"]="error";
$elem["dump1090-mutability/invalid-is_signed_int_or_empty"]["description"]="Value must be an integer, or blank.
";
$elem["dump1090-mutability/invalid-is_signed_int_or_empty"]["descriptionde"]="Der Wert muss eine Ganzzahl sein oder leer bleiben.
";
$elem["dump1090-mutability/invalid-is_signed_int_or_empty"]["descriptionfr"]="La valeur doit être un entier ou être vide.
";
$elem["dump1090-mutability/invalid-is_signed_int_or_empty"]["default"]="";
$elem["dump1090-mutability/invalid-is_not_empty"]["type"]="error";
$elem["dump1090-mutability/invalid-is_not_empty"]["description"]="Value cannot be empty.
";
$elem["dump1090-mutability/invalid-is_not_empty"]["descriptionde"]="Der Wert darf nicht leer bleiben.
";
$elem["dump1090-mutability/invalid-is_not_empty"]["descriptionfr"]="La valeur ne peut être vide.
";
$elem["dump1090-mutability/invalid-is_not_empty"]["default"]="";
$elem["dump1090-mutability/invalid-is_port_number"]["type"]="error";
$elem["dump1090-mutability/invalid-is_port_number"]["description"]="Value must be a valid port number (1024-65535), or zero to disable.
";
$elem["dump1090-mutability/invalid-is_port_number"]["descriptionde"]="Der Wert muss eine gültige Portnummer im Bereich von 1024-65535 sein. »0« zum Deaktivieren.
";
$elem["dump1090-mutability/invalid-is_port_number"]["descriptionfr"]="La valeur doit être un numéro de port valide (1024-65535) ou zéro pour désactiver.
";
$elem["dump1090-mutability/invalid-is_port_number"]["default"]="";
$elem["dump1090-mutability/invalid-is_port_list"]["type"]="error";
$elem["dump1090-mutability/invalid-is_port_list"]["description"]="Value must be a comma-separated list of valid port numbers (1024-65535), or zero to disable.
";
$elem["dump1090-mutability/invalid-is_port_list"]["descriptionde"]="Der Wert muss eine kommaseparierte Liste von gültigen Portnummern im Bereich 1024-65535 sein, oder »0« zum Deaktivieren.
";
$elem["dump1090-mutability/invalid-is_port_list"]["descriptionfr"]="La valeur doit être une liste de numéros de port valides (1024-655350) séparés par des virgules ou zéro pour désactiver.
";
$elem["dump1090-mutability/invalid-is_port_list"]["default"]="";
$elem["dump1090-mutability/invalid-is_ipaddrish_or_empty"]["type"]="error";
$elem["dump1090-mutability/invalid-is_ipaddrish_or_empty"]["description"]="Value must be an IP address or empty.
";
$elem["dump1090-mutability/invalid-is_ipaddrish_or_empty"]["descriptionde"]="Der Wert muss eine IP-Adresse sein, oder leer.
";
$elem["dump1090-mutability/invalid-is_ipaddrish_or_empty"]["descriptionfr"]="La valeur doit être une adresse IP ou être vide.
";
$elem["dump1090-mutability/invalid-is_ipaddrish_or_empty"]["default"]="";
$elem["dump1090-mutability/invalid-is_number"]["type"]="error";
$elem["dump1090-mutability/invalid-is_number"]["description"]="Value must be a decimal number
";
$elem["dump1090-mutability/invalid-is_number"]["descriptionde"]="Der Wert muss eine Dezimalzahl sein.
";
$elem["dump1090-mutability/invalid-is_number"]["descriptionfr"]="La valeur doit être un nombre décimal
";
$elem["dump1090-mutability/invalid-is_number"]["default"]="";
$elem["dump1090-mutability/invalid-is_number_or_empty"]["type"]="error";
$elem["dump1090-mutability/invalid-is_number_or_empty"]["description"]="Value must be a decimal number or empty.
";
$elem["dump1090-mutability/invalid-is_number_or_empty"]["descriptionde"]="Der Wert muss eine Dezimalzahl sein, oder leer.
";
$elem["dump1090-mutability/invalid-is_number_or_empty"]["descriptionfr"]="La valeur doit être un nombre décimal ou être vide.
";
$elem["dump1090-mutability/invalid-is_number_or_empty"]["default"]="";
$elem["dump1090-mutability/invalid-is_unsigned_number"]["type"]="error";
$elem["dump1090-mutability/invalid-is_unsigned_number"]["description"]="Value must be a non-negative number.
";
$elem["dump1090-mutability/invalid-is_unsigned_number"]["descriptionde"]="Der Wert muss eine nicht-negative Zahl sein.
";
$elem["dump1090-mutability/invalid-is_unsigned_number"]["descriptionfr"]="La valeur doit être un nombre positif ou nul.
";
$elem["dump1090-mutability/invalid-is_unsigned_number"]["default"]="";
$elem["dump1090-mutability/invalid-is_valid_gain"]["type"]="error";
$elem["dump1090-mutability/invalid-is_valid_gain"]["description"]="Value must be a numeric gain value, or \"max\", or \"agc\".
";
$elem["dump1090-mutability/invalid-is_valid_gain"]["descriptionde"]="Der Wert muss ein numerischer Verstärkungsfaktor sein oder »max« oder »agc«.
";
$elem["dump1090-mutability/invalid-is_valid_gain"]["descriptionfr"]="La valeur doit être une valeur de gain numérique ou « max » ou « agc ».
";
$elem["dump1090-mutability/invalid-is_valid_gain"]["default"]="";
$elem["dump1090-mutability/invalid-is_non_root_user"]["type"]="error";
$elem["dump1090-mutability/invalid-is_non_root_user"]["description"]="Value must be a username (without spaces) that isn't root.
";
$elem["dump1090-mutability/invalid-is_non_root_user"]["descriptionde"]="Der Wert muss ein Benutzername sein (ohne Leerzeichen), der nicht »root« ist.
";
$elem["dump1090-mutability/invalid-is_non_root_user"]["descriptionfr"]="La valeur doit être un nom d'utilisateur (sans espaces) qui n'est pas le superutilisateur.
";
$elem["dump1090-mutability/invalid-is_non_root_user"]["default"]="";
PKG_OptionPageTail2($elem);
?>
