<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("strongswan");

$elem["strongswan/start_level"]["type"]="select";
$elem["strongswan/start_level"]["choices"][1]="earliest";
$elem["strongswan/start_level"]["choices"][2]="\"after NFS\"";
$elem["strongswan/start_level"]["choicesde"][1]="frühestmöglich";
$elem["strongswan/start_level"]["choicesde"][2]="»nach NFS«";
$elem["strongswan/start_level"]["choicesfr"][1]="Le plus tôt possible";
$elem["strongswan/start_level"]["choicesfr"][2]="Après NFS";
$elem["strongswan/start_level"]["description"]="When to start strongSwan:
 There are three possibilities when strongSwan can start: before or
 after the NFS services and after the PCMCIA services. The correct answer
 depends on your specific setup.
 .
 If you do not have your /usr tree mounted via NFS (either you only mount
 other, less vital trees via NFS or don't use NFS mounted trees at all) and
 don't use a PCMCIA network card, then it's best to start strongSwan at
 the earliest possible time, thus allowing the NFS mounts to be secured by
 IPSec. In this case (or if you don't understand or care about this
 issue), answer \"earliest\" to this question (the default).
 .
 If you have your /usr tree mounted via NFS and don't use a PCMCIA network
 card, then you will need to start strongSwan after NFS so that all
 necessary files are available. In this case, answer \"after NFS\" to this
 question. Please note that the NFS mount of /usr can not be secured by
 IPSec in this case.
 .
 If you use a PCMCIA network card for your IPSec connections, then you only
 have to choose to start it after the PCMCIA services. Answer \"after
 PCMCIA\" in this case. This is also the correct answer if you want to fetch
 keys from a locally running DNS server with DNSSec support.
";
$elem["strongswan/start_level"]["descriptionde"]="Wann soll strongSwan gestartet werden:
 Es gibt drei Möglichkeiten, wann strongSwan starten kann: vor oder nach den NFS-Diensten und nach den PCMCIA-Diensten. Die richtige Antwort hängt von Ihrer spezifischen Einrichtung ab.
 .
 Falls Sie Ihren /usr-Baum nicht über NFS eingehängt haben (entweder weil Sie nur andere, weniger lebenswichtige Bäume über NFS einhängen, oder falls Sie NFS überhaupt nicht verwenden) und keine PCMCIA-Netzwerkkarte benutzen, ist es am besten, strongSwan so früh wie möglich zu starten und damit durch IPSec gesicherte NFS-Einhängungen zu erlauben. In diesem Fall (oder falls Sie dieses Problem nicht verstehen oder es Ihnen egal ist), antworten Sie »frühestmöglich« (Standardwert) auf diese Frage.
 .
 Falls Sie Ihren /usr-Baum über NFS eingehängt haben und keine PCMCIA-Netzwerkkarte benutzen, müssen Sie strongSwan nach NFS starten, so dass alle benötigten Dateien verfügbar sind. In diesem Fall antworten Sie »nach NFS« auf diese Frage. Bitte beachten Sie, dass NFS-Einhängungen von /usr in diesem Fall nicht über IPSec gesichert werden können.
 .
 Falls Sie eine PCMCIA-Netzwerkkarte für Ihre IPSec-Verbindungen benutzen, dann müssen Sie nur auswählen, dass er nach den PCMCIA-Diensten startet. Antworten Sie in diesem Fall »nach PCMCIA«. Dies ist auch die richtige Antwort, falls Sie Schlüssel von einem lokal laufenden DNS-Server mit DNSSec-Unterstützung abholen wollen.
";
$elem["strongswan/start_level"]["descriptionfr"]="Moment de démarrage de strongSwan :
 Il existe trois moments où il est opportun de démarrer strongSwan : avant ou après les services NFS, ou après les services PCMCIA. La réponse appropriée dépend de vos réglages spécifiques.
 .
 Si votre arborescence /usr n'est pas un montage NFS (soit parce que vos montages NFS sont à d'autres endroits, moins critiques, soit parce que vous n'utilisez pas du tout de montage NFS) et si vous n'utilisez pas de carte réseau PCMCIA, il est préférable de démarrer strongSwan le plus tôt possible, ce qui permettra de sécuriser les montages NFS avec IPSec. Dans ce cas (ou bien si vous ne comprenez pas l'objet de la question ou qu'elle ne vous concerne pas), choisissez « le plus tôt possible », qui est le choix par défaut.
 .
 Si /usr est un montage NFS et que vous n'utilisez pas de carte réseau PCMCIA, vous devrez alors démarrer strongSwan après les services NFS afin que tous les fichiers nécessaires soient disponibles. Dans ce cas, choisissez « Après NFS ». Veuillez noter que le montage NFS de /usr n'est alors pas sécurisé par IPSec.
 .
 Si vous utilisez une carte PCMCIA pour vos connexions IPSec, votre seul choix possible est le démarrage après les services PCMCIA. Choisissez alors « Après PCMCIA ». Faites également ce choix si vous souhaitez récupérer les clés d'authentification sur un serveur DNS reconnaissant DNSSec.
";
$elem["strongswan/start_level"]["default"]="earliest";
$elem["strongswan/restart"]["type"]="boolean";
$elem["strongswan/restart"]["description"]="Do you wish to restart strongSwan?
 Restarting strongSwan is a good idea, since if there is a security fix, it
 will not be fixed until the daemon restarts. Most people expect the daemon
 to restart, so this is generally a good idea. However this might take down
 existing connections and then bring them back up.
";
$elem["strongswan/restart"]["descriptionde"]="Möchten Sie strongSwan neustarten?
 Es ist eine gute Idee, strongSwan neuzustarten, da eine Sicherheitskorrektur erst nach dem Neustart des Daemons greift. Die meisten Leute erwarten, dass der Daemon neu startet, daher ist diese Wahl eine gute Idee. Er kann allerdings existierende Verbindungen beenden und erneut aufbauen.
";
$elem["strongswan/restart"]["descriptionfr"]="Souhaitez-vous redémarrer strongSwan ?
 Redémarrer strongSwan est préférable car un éventuel correctif de sécurité ne prendra effet que si le démon est redémarré. La plupart des utilisateurs s'attendent à ce que le démon redémarre et c'est donc le plus souvent le meilleur choix. Cependant, cela pourrait interrompre provisoirement des connexions en cours.
";
$elem["strongswan/restart"]["default"]="true";
$elem["strongswan/ikev1"]["type"]="boolean";
$elem["strongswan/ikev1"]["description"]="Do you wish to support IKEv1?
 strongSwan supports both versions of the Internet Key Exchange protocol,
 IKEv1 and IKEv2. Do you want to start the \"pluto\" daemon for IKEv1 support
 when strongSwan is started?
";
$elem["strongswan/ikev1"]["descriptionde"]="Möchten Sie IKEv1 unterstützen?
 strongSwan unterstützt beide Versionen des »Internet Key Exchange«-Protokolls (Schlüsselaustausch über Internet), IKEv1 und IKEv2. Möchten Sie den »pluto«-Daemon für IKEv1-Unterstützung starten, wenn strongSwan gestartet wird.
";
$elem["strongswan/ikev1"]["descriptionfr"]="Souhaitez-vous gérer IKE v1 ?
 StrongSwan gère les versions 1 et 2 du protocole d'échange de clés sur Internet (IKE : « Internet Key Exchange »). Veuillez indiquer si le démon « pluto », qui gère la version 1 du protocole, doit être lancé au démarrage de strongSwan.
";
$elem["strongswan/ikev1"]["default"]="true";
$elem["strongswan/ikev2"]["type"]="boolean";
$elem["strongswan/ikev2"]["description"]="Do you wish to support IKEv2?
 strongSwan supports both versions of the Internet Key Exchange protocol,
 IKEv1 and IKEv2. Do you want to start the \"charon\" daemon for IKEv2 support
 when strongSwan is started?
";
$elem["strongswan/ikev2"]["descriptionde"]="Möchten Sie IKEv2 unterstützen?
 strongSwan unterstützt beide Versionen des »Internet Key Exchange«-Protokolls (Schlüsselaustausch über Internet), IKEv1 und IKEv2. Möchten Sie den »charon«-Daemon für IKEv2-Unterstützung starten, wenn strongSwan gestartet wird.
";
$elem["strongswan/ikev2"]["descriptionfr"]="Souhaitez-vous gérer IKE v2 ?
 StrongSwan gère les versions 1 et 2 du protocole d'échange de clés sur Internet (IKE : « Internet Key Exchange »). Veuillez indiquer si le démon « charon », qui gère la version 2 du protocole, doit être lancé au démarrage de strongSwan.
";
$elem["strongswan/ikev2"]["default"]="true";
$elem["strongswan/create_rsa_key"]["type"]="boolean";
$elem["strongswan/create_rsa_key"]["description"]="Do you want to create a RSA public/private keypair for this host?
 This installer can automatically create a RSA public/private keypair for
 this host. This keypair can be used to authenticate IPSec connections to
 other hosts and is the preferred way for building up secure IPSec
 connections. The other possibility would be to use shared secrets
 (passwords that are the same on both sides of the tunnel) for
 authenticating an connection, but for a larger number of connections RSA
 authentication is easier to administer and more secure.
 .
 If you do not want to create a new public/private keypair, you can choose to
 use an existing one.
";
$elem["strongswan/create_rsa_key"]["descriptionde"]="Möchten Sie ein öffentlich/privates RSA-Schlüsselpaar für diesen Rechner erstellen?
 Das Installationsprogramm kann automatisch ein öffentliches/privates RSA-Schlüsselpaar für diesen Rechner erstellen. Dieses Schlüsselpaar kann zur Authentifizierung von IPSec-Verbindungen anderer Rechner verwendet werden und ist die bevorzugte Art, sichere IPSec-Verbindungen aufzubauen. Die andere Möglichkeit besteht darin, vorab-verteilte Geheimnisse (Passwörter, die auf beiden Seiten des Tunnels identisch sind) zur Authentifizierung einer Verbindung zu verwenden, aber für eine größere Anzahl an Verbindungen ist die RSA-Authentifizierung einfacher zu administrieren und sicherer.
 .
 Falls Sie kein neues öffentliches/privates Schlüsselpaar erstellen wollen, können Sie ein existierendes auswählen.
";
$elem["strongswan/create_rsa_key"]["descriptionfr"]="Souhaitez-vous créer une paire de clés RSA publique et privée pour cet hôte ?
 Cet outil d'installation peut créer automatiquement une paire de clés RSA publique et privée pour cet hôte. Cette paire de clés peut servir à authentifier des connexions IPSec vers d'autres hôtes. Cette méthode est la méthode conseillée pour l'établissement de liaisons IPSec sûres. L'autre possibilité d'authentification à la connexion est l'utilisation d'un secret partagé (« pre-shared key » : des mots de passe identiques aux deux extrémités du tunnel). Toutefois, pour de nombreuses connexions, l'authentification RSA est plus simple à administrer et plus sûre.
 .
 Si vous ne souhaitez pas créer une paire de clés publique et privée, vous pouvez choisir d'en utiliser une existante.
";
$elem["strongswan/create_rsa_key"]["default"]="true";
$elem["strongswan/rsa_key_type"]["type"]="select";
$elem["strongswan/rsa_key_type"]["choices"][1]="x509";
$elem["strongswan/rsa_key_type"]["choicesde"][1]="x509";
$elem["strongswan/rsa_key_type"]["choicesfr"][1]="X509";
$elem["strongswan/rsa_key_type"]["description"]="The type of RSA keypair to create:
 It is possible to create a plain RSA public/private keypair for use
 with strongSwan or to create a X509 certificate file which contains the RSA
 public key and additionally stores the corresponding private key.
 .
 If you only want to build up IPSec connections to hosts also running
 strongSwan, it might be a bit easier using plain RSA keypairs. But if you
 want to connect to other IPSec implementations, you will need a X509
 certificate. It is also possible to create a X509 certificate here and
 extract the RSA public key in plain format if the other side runs
 strongSwan without X509 certificate support.
 .
 Therefore a X509 certificate is recommended since it is more flexible and
 this installer should be able to hide the complex creation of the X509
 certificate and its use in strongSwan anyway.
";
$elem["strongswan/rsa_key_type"]["descriptionde"]="Die Art des RSA-Schlüsselpaars, das erstellt werden soll:
 Es besteht die Möglichkeit, ein einfaches öffentliches/privates Schlüsselpaar für den Einsatz mit strongSwan oder eine X509-Zertifikatsdatei zu erstellen, die den öffentlichen Schlüssel und zusätzlich den zugehörigen privaten Schlüssel enthält.
 .
 Falls Sie nur IPSec-Verbindungen zu Rechnern aufbauen wollen, auf denen auch strongSwan läuft, könnte es etwas einfacher sein, einfache RSA-Schlüsselpaare zu verwenden. Falls Sie aber mit anderen IPSec-Implementierungen Verbindungen aufnehmen wollen, benötigen Sie ein X509-Zertifikat. Es besteht auch die Möglichkeit, hier ein X509-Zertifikat zu erstellen und den öffentlichen RSA-Schlüssel im einfachen Format zu extrahieren, falls die andere Seite strongSwan ohne X509-Zertifikatsunterstützung betreibt.
 .
 Daher wird ein X509-Zertifikat empfohlen, da es flexibler ist und dieses Installationsprogramm in der Lage sein sollte, die komplexe Erstellung des X509-Zertifikates und seinen Einsatz in strongSwan zu verstecken.
";
$elem["strongswan/rsa_key_type"]["descriptionfr"]="Type de paire de clés RSA à créer :
 Il est possible de créer une simple paire de clés destinée à être utilisée avec strongSwan ou de créer un fichier de certificat X509 qui contient la clé publique RSA et de conserver la clé privée correspondante par ailleurs.
 .
 Si vous ne prévoyez d'établir des connexions IPSec qu'avec des hôtes utilisant strongSwan, il sera probablement plus facile d'utiliser des clés RSA simples. Mais si vous souhaitez vous connecter à des hôtes utilisant d'autres implémentations d'IPSec, vous aurez besoin d'un certificat X509. Il est également possible de créer un certificat X509 puis d'en extraire une simple clé publique RSA, si l'autre extrémité de la connexion utilise Openswan sans la gestion des certificats X509.
 .
 Ainsi, il vous est conseillé d'utiliser un certificat X509 car cette méthode est plus souple. Cet outil d'installation devrait vous simplifier la tâche de création et d'utilisation de ce certificat X509 avec strongSwan.
";
$elem["strongswan/rsa_key_type"]["default"]="x509";
$elem["strongswan/existing_x509_certificate"]["type"]="boolean";
$elem["strongswan/existing_x509_certificate"]["description"]="Do you have an existing X509 certificate file for strongSwan?
 This installer can automatically extract the needed information from an
 existing X509 certificate with a matching RSA private key. Both parts can
 be in one file, if it is in PEM format. If you have such an existing
 certificate and key file and want to use it for authenticating IPSec
 connections, then please answer yes.
";
$elem["strongswan/existing_x509_certificate"]["descriptionde"]="Verfügen Sie über ein existierendes X509-Zertifikat für strongSwan?
 Dieses Installationsprogramm kann automatisch die benötigten Informationen aus einem existierenden X509-Zertifikat mit passendem privatem RSA-Schlüssel extrahieren. Beide Teile können in einer Datei sein, falls sie im PEM-Format vorliegt. Falls Sie über solch ein existierendes Zertifikat und eine solche Schlüsseldatei verfügen, und diese für die Authentifizierung von IPSec-Verbindungen verwenden möchten, stimmen Sie bitte zu.
";
$elem["strongswan/existing_x509_certificate"]["descriptionfr"]="Possédez-vous un fichier de certificat X509 existant à utiliser avec strongSwan ?
 Cet outil d'installation est capable d'extraire automatiquement l'information nécessaire d'un fichier de certificat X509 existant, avec la clé privée RSA correspondante. Les deux parties peuvent se trouver dans un seul fichier, s'il est en format PEM. Indiquez si vous possédez un tel certificat ainsi que la clé privée, et si vous souhaitez vous en servir pour l'authentification des connexions IPSec.
";
$elem["strongswan/existing_x509_certificate"]["default"]="false";
$elem["strongswan/existing_x509_certificate_filename"]["type"]="string";
$elem["strongswan/existing_x509_certificate_filename"]["description"]="File name of your X509 certificate in PEM format:
 Please enter the full location of the file containing your X509
 certificate in PEM format.
";
$elem["strongswan/existing_x509_certificate_filename"]["descriptionde"]="Dateiname Ihres X509-Zertifikates im PEM-Format:
 Bitte geben Sie den kompletten Ort der Datei an, die Ihr X509-Zertifikat im PEM-Format enthält.
";
$elem["strongswan/existing_x509_certificate_filename"]["descriptionfr"]="Emplacement de votre certificat X509 au format PEM :
 Veuillez indiquer l'emplacement du fichier contenant votre certificat X509 au format PEM.
";
$elem["strongswan/existing_x509_certificate_filename"]["default"]="";
$elem["strongswan/existing_x509_key_filename"]["type"]="string";
$elem["strongswan/existing_x509_key_filename"]["description"]="File name of your X509 private key in PEM format:
 Please enter the full location of the file containing the private RSA key
 matching your X509 certificate in PEM format. This can be the same file
 that contains the X509 certificate.
";
$elem["strongswan/existing_x509_key_filename"]["descriptionde"]="Dateiname Ihres privaten X509-Schlüssels im PEM-Format:
 Bitte geben Sie den kompletten Ort der Datei an, die den privaten RSA-Schlüssel enthält, der zu Ihrem X509-Zertifikat im PEM-Format passt. Dies kann die gleiche Datei sein, die auch das X509-Zertifikat enthält.
";
$elem["strongswan/existing_x509_key_filename"]["descriptionfr"]="Emplacement de votre clé privée X509 au format PEM :
 Veuillez indiquer l'emplacement du fichier contenant la clé privée RSA correspondant à votre certificat X509 au format PEM. Cela peut être le fichier qui contient le certificat X509.
";
$elem["strongswan/existing_x509_key_filename"]["default"]="";
$elem["strongswan/rsa_key_length"]["type"]="string";
$elem["strongswan/rsa_key_length"]["description"]="The length of the created RSA key (in bits):
 Please enter the length of the created RSA key. It should not be less than
 1024 bits because this should be considered unsecure and you will probably
 not need anything more than 2048 bits because it only slows the
 authentication process down and is not needed at the moment.
";
$elem["strongswan/rsa_key_length"]["descriptionde"]="Die Länge des erstellten RSA-Schlüssels (in Bits):
 Bitte geben Sie die Länge des erstellten RSA-Schlüssels an. Er sollte nicht kürzer als 1024 Bits sein, da dies als unsicher betrachtet werden könnte und Sie benötigen nicht mehr als 2048 Bits, da dies nur den Authentifizierungs-Prozess verlangsamt und derzeit nicht benötigt wird.
";
$elem["strongswan/rsa_key_length"]["descriptionfr"]="Longueur (en bits) de la clé RSA à créer :
 Veuillez indiquer la longueur de la clé RSA qui sera créée. Elle ne doit pas être inférieure à 1024 bits car cela serait considéré comme insuffisamment sûr. Un choix excédant 2048 bits est probablement inutile car cela ne fait essentiellement que ralentir le processus d'authentification sans avoir d'intérêt actuellement.
";
$elem["strongswan/rsa_key_length"]["default"]="2048";
$elem["strongswan/x509_self_signed"]["type"]="boolean";
$elem["strongswan/x509_self_signed"]["description"]="Do you want to create a self-signed X509 certificate?
 This installer can only create self-signed X509 certificates
 automatically, because otherwise a certificate authority is needed to sign
 the certificate request. If you want to create a self-signed certificate,
 you can use it immediately to connect to other IPSec hosts that support
 X509 certificate for authentication of IPSec connections. However, if you
 want to use the new PKI features of strongSwan >= 1.91, you will need to
 have all X509 certificates signed by a single certificate authority to
 create a trust path.
 .
 If you do not want to create a self-signed certificate, then this
 installer will only create the RSA private key and the certificate request
 and you will have to get the certificate request signed by your certificate
 authority.
";
$elem["strongswan/x509_self_signed"]["descriptionde"]="Möchten Sie ein selbst-signiertes X509-Zertifikat erstellen?
 Das Installationsprogramm kann nur selbst-signierte X509-Zertifikate automatisch erstellen, da andernfalls eine Zertifizierungsstelle zur Signatur der Zertifikatsanfrage benötigt wird. Falls Sie ein selbst-signiertes Zertifikat erstellen möchten, können Sie es sofort zur Verbindung mit anderen IPSec-Rechnern verwenden, die X509-Zertifikate zur Authentifizierung von IPSec-Verbindungen verwenden. Falls Sie allerdings die neuen PKI-Funktionalitäten von strongSwan >= 1.91 verwenden möchten, müssen alle X509-Zertifikate von einer einzigen Zertifizierungsstelle signiert sein, um einen vertrauensvollen Pfad zu etablieren.
 .
 Falls Sie kein selbst-signiertes Zertifikat erstellen möchten, wird dieses Installationsprogramm nur einen privaten RSA-Schlüssel und die Zertifikatsanfrage erstellen und Sie müssen die Zertifikatsanfrage von Ihrer Zertifizierungsstelle signiert bekommen.
";
$elem["strongswan/x509_self_signed"]["descriptionfr"]="Souhaitez-vous créer un certificat X509 autosigné ?
 Cet outil d'installation ne peut créer automatiquement qu'un certificat X509 autosigné puisqu'une autorité de certification est indispensable pour signer la demande de certificat. Si vous choisissez de créer un certificat autosigné, vous pourrez vous en servir immédiatement pour vous connecter aux hôtes qui authentifient les connexions IPSec avec des certificats X509. Cependant, si vous souhaitez utiliser les nouvelles fonctionnalités PKI de strongSwan >= 1.91, vous aurez besoin que tous les certificats X509 soient signés par la même autorité de certification afin de créer un chemin de confiance.
 .
 Si vous ne voulez pas créer de certificat autosigné, cet outil d'installation ne fera que créer la clé privée RSA et la demande de certificat, que vous devrez ensuite faire signer par votre autorité de certification.
";
$elem["strongswan/x509_self_signed"]["default"]="true";
$elem["strongswan/x509_country_code"]["type"]="string";
$elem["strongswan/x509_country_code"]["description"]="Country code for the X509 certificate request:
 Please enter the 2 letter country code for your country. This code will be
 placed in the certificate request. 
 .
 You really need to enter a valid country code here, because openssl will
 refuse to generate certificates without one. An empty field is allowed for
 any other field of the X.509 certificate, but not for this one.
 .
 Example: AT
";
$elem["strongswan/x509_country_code"]["descriptionde"]="Ländercode für die X509-Zertifizierungsanfrage:
 Bitte geben Sie den zweibuchstabigen Ländercode für Ihr Land ein. Dieser Code wird in der Zertifikatsanfrage verwendet.
 .
 Sie müssen wirklich einen gültigen Ländercode hier eingeben, da OpenSSL es ablehnen wird, Zertifikate ohne diese zu erstellen. Jedes andere Feld im X509-Zertifikat darf leer bleiben; dieses aber nicht.
 .
 Beispiel: AT
";
$elem["strongswan/x509_country_code"]["descriptionfr"]="Code du pays :
 Veuillez indiquer le code à deux lettres de votre pays. Ce code sera inclus dans la demande de certificat.
 .
 Il est impératif de choisir ici un code de pays valide sinon OpenSSL refusera de générer les certificats. Tous les autres champs d'un certificat X.509 peuvent être vides, sauf celui-ci.
 .
 Exemple : FR
";
$elem["strongswan/x509_country_code"]["default"]="AT";
$elem["strongswan/x509_state_name"]["type"]="string";
$elem["strongswan/x509_state_name"]["description"]="State or province name for the X509 certificate request:
 Please enter the full name of the state or province you live in. This name
 will be placed in the certificate request.
 .
 Example: Upper Austria
";
$elem["strongswan/x509_state_name"]["descriptionde"]="Name des Landes oder der Provinz für diese X509-Zertifikatsanfrage:
 Bitte geben Sie den kompletten Namen des Landes oder der Provinz ein, in der Sie leben. Dieser Name wird in der Zertifikatsanfrage verwendet.
 .
 Beispiel: Oberösterreich
";
$elem["strongswan/x509_state_name"]["descriptionfr"]="État, province ou région :
 Veuillez indiquer le nom complet de l'état, de la province ou de la région où vous résidez. Ce nom sera inclus dans la demande de certificat.
 .
 Exemples : Rhône-Alpes, Brabant Wallon, Bouches du Rhône, Québec, Canton de Vaud
";
$elem["strongswan/x509_state_name"]["default"]="Default:";
$elem["strongswan/x509_locality_name"]["type"]="string";
$elem["strongswan/x509_locality_name"]["description"]="Locality name for the X509 certificate request:
 Please enter the locality (e.g. city) where you live. This name will be
 placed in the certificate request.
 .
 Example: Vienna
";
$elem["strongswan/x509_locality_name"]["descriptionde"]="Örtlichkeitsangabe für die X509-Zertifikatsanfrage:
 Bitte geben Sie die Örtlichkeit (z.B. Stadt) ein, in der Sie leben. Dieser Name wird in der Zertifikatsanfrage verwandt.
 .
 Beispiel: Wien
";
$elem["strongswan/x509_locality_name"]["descriptionfr"]="Localité :
 Veuillez indiquer la localité (p. ex. la ville) où vous résidez. Ce nom sera inclus dans la demande de certificat.
 .
 Exemple : Saint-Étienne
";
$elem["strongswan/x509_locality_name"]["default"]="";
$elem["strongswan/x509_organization_name"]["type"]="string";
$elem["strongswan/x509_organization_name"]["description"]="Organization name for the X509 certificate request:
 Please enter the organization (e.g. company) that the X509 certificate
 should be created for. This name will be placed in the certificate
 request.
 .
 Example: Debian
";
$elem["strongswan/x509_organization_name"]["descriptionde"]="Organisationsname für die X509-Zertifikatsanfrage:
 Bitte geben Sie die Organisation (z.B. Firma) ein, für die das X509-Zertifikat erstellt werden soll. Dieser Name wird in der Zertifikatsanfrage verwandt.
 .
 Beispiel: Debian
";
$elem["strongswan/x509_organization_name"]["descriptionfr"]="Organisme :
 Veuillez indiquer l'organisme (p. ex. l'entreprise) pour qui sera créé le certificat X509. Ce nom sera inclus dans la demande de certificat.
 .
 Exemple : Debian
";
$elem["strongswan/x509_organization_name"]["default"]="";
$elem["strongswan/x509_organizational_unit"]["type"]="string";
$elem["strongswan/x509_organizational_unit"]["description"]="Organizational unit for the X509 certificate request:
 Please enter the organizational unit (e.g. section) that the X509
 certificate should be created for. This name will be placed in the
 certificate request.
 .
 Example: security group
";
$elem["strongswan/x509_organizational_unit"]["descriptionde"]="Organisationseinheit für die X509-Zertifikatsanfrage:
 Bitte geben Sie die Organisationseinheit (z.B. Bereich) ein, für die das X509-Zertifikat erstellt werden soll. Dieser Name wird in der Zertifikatsanfrage verwandt.
 .
 Beispiel: Sicherheitsgruppe
";
$elem["strongswan/x509_organizational_unit"]["descriptionfr"]="Unité d'organisation :
 Veuillez indiquer l'unité d'organisation (p. ex. département, division, etc.) pour qui sera créé le certificat X509. Ce nom sera inclus dans la demande de certificat.
 .
 Exemple : Département Réseaux et Informatique Scientifique
";
$elem["strongswan/x509_organizational_unit"]["default"]="";
$elem["strongswan/x509_common_name"]["type"]="string";
$elem["strongswan/x509_common_name"]["description"]="Common name for the X509 certificate request:
 Please enter the common name (e.g. the host name of this machine) for
 which the X509 certificate should be created for. This name will be placed
 in the certificate request.
 .
 Example: gateway.debian.org
";
$elem["strongswan/x509_common_name"]["descriptionde"]="Allgemeiner Name für die X509-Zertifikatsanfrage:
 Bitte geben Sie den allgemeinen Namen (z.B. den Rechnernamen dieser Maschine) ein, für den das X509-Zertifikat erstellt werden soll. Dieser Name wird in der Zertifikatsanfrage verwandt.
 .
 Beispiel: gateway.debian.org
";
$elem["strongswan/x509_common_name"]["descriptionfr"]="Nom commun :
 Veuillez indiquer le nom commun (p. ex. le nom réseau de cette machine) pour qui sera créé le certificat X509. Ce nom sera inclus dans la demande de certificat.
 .
 Exemple : gateway.debian.org
";
$elem["strongswan/x509_common_name"]["default"]="";
$elem["strongswan/x509_email_address"]["type"]="string";
$elem["strongswan/x509_email_address"]["description"]="Email address for the X509 certificate request:
 Please enter the email address of the person or organization who is
 responsible for the X509 certificate, This address will be placed in the
 certificate request.
";
$elem["strongswan/x509_email_address"]["descriptionde"]="E-Mail-Adresse für die X509-Zertifikatsanfrage:
 Bitte geben Sie die E-Mail-Adresse der Person oder Organisation ein, die für das X509-Zertifikat verantwortlich ist. Diese Adresse wird in der Zertifikatsanfrage verwandt.
";
$elem["strongswan/x509_email_address"]["descriptionfr"]="Adresse électronique :
 Veuillez indiquer l'adresse électronique de la personne ou de l'organisme responsable du certificat X509. Cette adresse sera incluse dans la demande de certificat.
";
$elem["strongswan/x509_email_address"]["default"]="";
$elem["strongswan/enable-oe"]["type"]="boolean";
$elem["strongswan/enable-oe"]["description"]="Do you wish to enable opportunistic encryption in strongSwan?
 strongSwan comes with support for opportunistic encryption (OE), which stores
 IPSec authentication information (i.e. RSA public keys) in (preferably
 secure) DNS records. Until this is widely deployed, activating it will
 cause a significant slow-down for every new, outgoing connection. Since
 version 2.0, strongSwan upstream comes with OE enabled by default and is thus
 likely to break your existing connection to the Internet (i.e. your default
 route) as soon as pluto (the strongSwan keying daemon) is started.
 .
 Please choose whether you want to enable support for OE. If unsure, do not
 enable it.
";
$elem["strongswan/enable-oe"]["descriptionde"]="Möchten Sie opportunistische Verschlüsselung in strongSwan aktivieren?
 strongSwan enthält Unterstützung für opportunistische Verschlüsselung (OV), die Authentifizierungsinformationen von IPSec (z.B. öffentliche RSA-Schlüssel) in DNS-Datensätzen speichert. Solange dies nicht weit verbreitet ist, wird jede neue ausgehende Verbindung signifikant verlangsamt, falls diese Option aktiviert ist. Seit Version 2.0 wird strongSwan von den Autoren mit aktiviertem OV ausgeliefert und wird daher wahrscheinlich Ihre existierenden Verbindungen ins Internet (d.h. Ihre Standard-Route) stören, sobald Pluto (der strongSwan Schlüssel-Daemon) gestartet wird.
 .
 Bitte wählen Sie aus, ob Sie OV aktivieren möchten. Falls Sie unsicher sind, aktivieren Sie es nicht.
";
$elem["strongswan/enable-oe"]["descriptionfr"]="Souhaitez-vous activer le chiffrement opportuniste dans strongSwan ?
 StrongSwan gère le chiffrement opportuniste (« opportunistic encryption » : OE) qui permet de conserver les informations d'authentification IPSec (c'est-à-dire les clés publiques RSA) dans des enregistrements DNS, de préférence sécurisés. Tant que cette fonctionnalité ne sera pas déployée largement, son activation provoquera un ralentissement significatif pour toute nouvelle connexion sortante. À partir de la version 2.0, cette fonctionnalité est activée par défaut dans strongSwan, ce qui peut interrompre le fonctionnement de votre connexion à l'Internet (c'est-à-dire votre route par défaut) dès le démarrage de pluto, le démon de gestion de clés de strongSwan.
 .
 Veuillez choisir si vous souhaitez activer la gestion du chiffrement opportuniste. Ne l'activez pas si vous n'êtes pas certain d'en avoir besoin.
";
$elem["strongswan/enable-oe"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
