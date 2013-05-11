<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openswan");

$elem["openswan/start_level"]["type"]="select";
$elem["openswan/start_level"]["choices"][1]="earliest";
$elem["openswan/start_level"]["choices"][2]="\"after NFS\"";
$elem["openswan/start_level"]["choicesde"][1]="zum frühest möglichen Zeitpunkt";
$elem["openswan/start_level"]["choicesde"][2]="nach NFS";
$elem["openswan/start_level"]["choicesfr"][1]="Le plus tôt possible";
$elem["openswan/start_level"]["choicesfr"][2]="Après NFS";
$elem["openswan/start_level"]["description"]="At which level do you wish to start Openswan?
 With the current Debian startup levels (nearly everything starting in
 level 20), it is impossible for Openswan to always start at the correct
 time. There are three possibilities when Openswan can start: before or
 after the NFS services and after the PCMCIA services. The correct answer
 depends on your specific setup.
 .
 If you do not have your /usr tree mounted via NFS (either you only mount
 other, less vital trees via NFS or don't use NFS mounted trees at all) and
 don't use a PCMCIA network card, then it's best to start Openswan at
 the earliest possible time, thus allowing the NFS mounts to be secured by
 IPSec. In this case (or if you don't understand or care about this
 issue), answer \"earliest\" to this question (the default).
 .
 If you have your /usr tree mounted via NFS and don't use a PCMCIA network
 card, then you will need to start Openswan after NFS so that all
 necessary files are available. In this case, answer \"after NFS\" to this
 question. Please note that the NFS mount of /usr can not be secured by
 IPSec in this case.
 .
 If you use a PCMCIA network card for your IPSec connections, then you only
 have to choose to start it after the PCMCIA services. Answer \"after
 PCMCIA\" in this case. This is also the correct answer if you want to fetch
 keys from a locally running DNS server with DNSSec support.
";
$elem["openswan/start_level"]["descriptionde"]="Zu welchem Zeitpunkt soll Openswan gestartet werden?
 Bei der gegenwärtigen Debian-Startreihenfolge (fast alles startet an Position 20) ist es unmöglich für Openswan, immer zum richtigen Zeitpunkt zu starten. Es gibt drei Möglichkeiten, wann Openswan starten kann: vor oder nach den NFS-Diensten oder nach den PCMCIA-Diensten. Die richtige Antwort hängt von Ihrer spezifischen Installation ab.
 .
 Sofern Sie Ihr /usr-Verzeichnis nicht über NFS eingebunden haben (entweder Sie binden nur andere, weniger wichtige Verzeichnisse über NFS ein oder Sie verwenden überhaupt keine über NFS eingebundenen Verzeichnisse) und keine PCMCIA-Netzwerkkarte verwenden, ist es am Besten, Openswan zum frühest möglichen Zeitpunkt zu starten. Dies erlaubt es, die per NFS eingehängten Verzeichnisse durch IPSec abzusichern. In diesem Fall (oder falls Sie dieses Problem nicht verstehen oder es Sie nicht interessiert), antworten Sie »zum frühest möglichen Zeitpunkt« (Voreinstellung) auf diese Frage.
 .
 Falls Sie Ihr /usr-Verzeichnis über NFS eingebunden haben und keine PCMCIA-Netzwerkkarte verwenden, müssen Sie Openswan nach NFS starten, damit alle notwendigen Dateien verfügbar sind. In diesem Fall antworten Sie »nach NFS« auf diese Frage. Bitte beachten Sie, dass das Einhängen von /usr über NFS in diesem Fall nicht durch IPSec abgesichert werden kann.
 .
 Falls Sie eine PCMCIA-Netzwerkkarte für Ihre IPSec-Verbindungen verwenden, brauchen Sie nur zu wählen, dass es nach den PCMCIA-Diensten gestartet wird. Antworten Sie »nach PCMCIA« in diesem Fall. Dies ist auch die richtige Antwort, falls Sie Schlüssel von einem lokal laufenden DNS-Server mit DNSSec-Unterstützung abrufen möchten.
";
$elem["openswan/start_level"]["descriptionfr"]="Étape de lancement d'Openswan :
 Avec les niveaux de démarrage actuellement utilisés par Debian (presque tout démarre au niveau 20), il est impossible de faire en sorte qu'Openswan démarre toujours au moment approprié. Il existe trois moments où il est opportun de le démarrer : avant ou après les services NFS, ou après les services PCMCIA. La réponse appropriée dépend de vos réglages spécifiques.
 .
 Si votre arborescence /usr n'est pas un montage NFS (soit parce que vos montages NFS sont à d'autres endroits, moins critiques, soit parce que vous n'utilisez pas du tout de montage NFS) et si vous n'utilisez pas de carte réseau PCMCIA, il est préférable de démarrer Openswan le plus tôt possible, ce qui permettra de sécuriser les montages NFS avec IPSec. Dans ce cas (ou bien si vous ne comprenez pas l'objet de la question ou qu'elle ne vous concerne pas), choisissez « le plus tôt possible », qui est le choix par défaut.
 .
 Si /usr est un montage NFS et que vous n'utilisez pas de carte réseau PCMCIA, vous devrez alors démarrer Openswan après les services NFS afin que tous les fichiers nécessaires soient disponibles. Dans ce cas, choisissez « Après NFS ». Veuillez noter que le montage NFS de /usr n'est alors pas sécurisé par IPSec.
 .
 Si vous utilisez une carte PCMCIA pour vos connexions IPSec, votre seul choix possible est le démarrage après les services PCMCIA. Choisissez alors « Après PCMCIA ». Faites également ce choix si vous souhaitez récupérer les clés d'authentification sur un serveur DNS reconnaissant DNSSec.
";
$elem["openswan/start_level"]["default"]="earliest";
$elem["openswan/restart"]["type"]="boolean";
$elem["openswan/restart"]["description"]="Do you wish to restart Openswan?
 Restarting Openswan is a good idea, since if there is a security fix, it
 will not be fixed until the daemon restarts. Most people expect the daemon
 to restart, so this is generally a good idea. However this might take down
 existing connections and then bring them back up.
";
$elem["openswan/restart"]["descriptionde"]="Möchten Sie Openswan neu starten?
 Der Neustart von Openswan ist empfehlenswert. Denn falls ein Sicherheitsproblemm mit dieser Version beseitigt wurde, ist dies unwirksam, bis der Daemon neu gestartet wurde. Die meisten Anwender erwarten, dass sich der Daemon neu startet. Somit ist dies generell eine gute Idee. Jedoch kann der Neustart existierende Verbindungen schließen und hinterher wiederherstellen.
";
$elem["openswan/restart"]["descriptionfr"]="Souhaitez-vous redémarrer Openswan ?
 Redémarrer Openswan est préférable car un éventuel correctif de sécurité ne prendra place que si le démon est redémarré. La plupart des utilisateurs s'attendent à ce que le démon redémarre et c'est donc le plus souvent le meilleur choix. Cependant, cela pourrait interrompre provisoirement des connexions en cours.
";
$elem["openswan/restart"]["default"]="true";
$elem["openswan/create_rsa_key"]["type"]="boolean";
$elem["openswan/create_rsa_key"]["description"]="Do you want to create a RSA public/private keypair for this host?
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
$elem["openswan/create_rsa_key"]["descriptionde"]="Möchten Sie ein öffentlich/privates RSA-Schlüsselpaar für diesen Rechner erzeugen?
 Dieser Installer kann automatisch ein öffentlich/privates RSA-Schlüsselpaar für diesen Rechner erzeugen. Dieses Schlüsselpaar kann zur Authentifizierung von IPSec-Verbindungen zu anderen Rechnern verwendet werden. Dies ist die empfohlene Methode zum Aufbau gesicherter IPSec-Verbindungen. Die andere Möglichkeit ist die Verwendung von gemeinsamen Geheimnissen (engl.: shared secrets, gleiche Passwörter an beiden Enden des Tunnels) zur Authentifizierung einer Verbindung. Für eine größere Anzahl von Verbindungen ist die RSA-Authentifizierung einfacher zu verwalten und sicherer.
 .
 Falls Sie kein öffentlich/privates Schlüsselpaar erzeugen möchten, können Sie ein existierendes verwenden.
";
$elem["openswan/create_rsa_key"]["descriptionfr"]="Souhaitez-vous créer une paire de clés RSA publique et privée pour cet hôte ?
 Cet outil d'installation peut créer automatiquement une paire de clés RSA publique et privée pour cet hôte. Cette paire de clés peut servir à authentifier des connexions IPSec vers d'autres hôtes. Cette méthode est la méthode conseillée pour l'établissement de liaisons IPSec sûres. L'autre possibilité d'authentification à la connexion est l'utilisation d'un secret partagé (« pre-shared key » : des mots de passe identiques aux deux extrémités du tunnel). Toutefois, pour de nombreuses connexions, l'authentification RSA est plus simple à administrer et plus sûre.
 .
 Si vous ne souhaitez pas créer une paire de clés publique et privée, vous pouvez choisir d'en utiliser une existante.
";
$elem["openswan/create_rsa_key"]["default"]="true";
$elem["openswan/rsa_key_type"]["type"]="select";
$elem["openswan/rsa_key_type"]["choices"][1]="x509";
$elem["openswan/rsa_key_type"]["choicesde"][1]="X509";
$elem["openswan/rsa_key_type"]["choicesfr"][1]="X509";
$elem["openswan/rsa_key_type"]["description"]="Which type of RSA keypair do you want to create?
 It is possible to create a plain RSA public/private keypair for use
 with Openswan or to create a X509 certificate file which contains the RSA
 public key and additionally stores the corresponding private key.
 .
 If you only want to build up IPSec connections to hosts also running
 Openswan, it might be a bit easier using plain RSA keypairs. But if you
 want to connect to other IPSec implementations, you will need a X509
 certificate. It is also possible to create a X509 certificate here and
 extract the RSA public key in plain format if the other side runs
 Openswan without X509 certificate support.
 .
 Therefore a X509 certificate is recommended since it is more flexible and
 this installer should be able to hide the complex creation of the X509
 certificate and its use in Openswan anyway.
";
$elem["openswan/rsa_key_type"]["descriptionde"]="Welchen Typ von RSA-Schlüssel möchten Sie erzeugen?
 Es ist möglich, ein öffentlich/privates RSA-Schlüsselpaar im Klartext zur Verwendung mit Openswan zu erzeugen. Oder es wird eine X509-Zertifikats-Datei erstellt, die den öffentlichen RSA-Schlüssel enthält und zusätzlich den korrespondierenden privaten Schlüssel speichert.
 .
 Falls Sie ausschließlich IPSec-Verbindungen zu Rechnern aufbauen möchten, die auch mit Openswan arbeiten, könnte es etwas einfacher sein, RSA-Schlüsselpaare im Klartext zu verwenden. Aber falls Sie sich mit anderen IPSec-Implementationen verbinden möchten, werden Sie ein X509-Zertifikat benötigen. Es ist auch möglich, ein X509-Zertifikat hier zu erzeugen und den öffentlichen RSA-Schlüssel im Klartextformat zu extrahieren, falls die andere Seite Openswan ohne Unterstützung für X509-Zertifikate verwendet.
 .
 Deshalb wird ein X509-Zertifikat empfohlen, da es flexibler ist. Dieser Installer sollte die komplexe Erzeugung des X509-Zertifikats und dessen Verwendung in Openswan verstecken können.
";
$elem["openswan/rsa_key_type"]["descriptionfr"]="Type de paire de clés RSA à créer :
 Il est possible de créer une simple paire de clés destinée à être utilisée avec Openswan ou de créer un fichier de certificat X509 qui contient la clé publique RSA et de conserver la clé privée correspondante par ailleurs.
 .
 Si vous ne prévoyez d'établir des connexions IPSec qu'avec des hôtes utilisant Openswan, il sera probablement plus facile d'utiliser des clés RSA simples. Mais si vous souhaitez vous connecter à des hôtes utilisant d'autres implémentations d'IPSec, vous aurez besoin d'un certificat X509. Il est également possible de créer un certificat X509 puis d'en extraire une simple clé publique RSA, si l'autre extrémité de la connexion utilise Openswan sans la gestion des certificats X509.
 .
 Ainsi, il vous est conseillé d'utiliser un certificat X509 car cette méthode est plus souple. Cet outil d'installation devrait vous simplifier la tâche de création et d'utilisation de ce certificat X509.
";
$elem["openswan/rsa_key_type"]["default"]="x509";
$elem["openswan/existing_x509_certificate"]["type"]="boolean";
$elem["openswan/existing_x509_certificate"]["description"]="Do you have an existing X509 certificate file that you want to use for Openswan?
 This installer can automatically extract the needed information from an
 existing X509 certificate with a matching RSA private key. Both parts can
 be in one file, if it is in PEM format. Do you have such an existing
 certificate and key file and want to use it for authenticating IPSec
 connections?
";
$elem["openswan/existing_x509_certificate"]["descriptionde"]="Haben Sie eine existierende X509-Zertifikats-Datei, die Sie mit Openswan verwenden möchten?
 Dieser Installer kann automatisch die benötigten Informationen aus einer existierenden X509-Zertifikats-Datei mit einem passenden privaten RSA-Schlüssel extrahieren. Beide Teile können sich in einer Datei befinden, falls sie im PEM-Format vorliegt. Haben Sie eine solche existierende Zertifikat-und-Schlüssel-Datei und möchten Sie sie zur Authentifizierung von IPSec-Verbindungen verwenden?
";
$elem["openswan/existing_x509_certificate"]["descriptionfr"]="Possédez-vous un fichier de certificat X509 existant à utiliser avec Openswan ?
 Cet outil d'installation est capable d'extraire automatiquement l'information nécessaire d'un fichier de certificat X509 existant, avec la clé privée RSA correspondante. Les deux parties peuvent se trouver dans un seul fichier, s'il est en format PEM. Indiquez si vous possédez un tel certificat ainsi que la clé privée, et si vous souhaitez vous en servir pour l'authentification des connexions IPSec.
";
$elem["openswan/existing_x509_certificate"]["default"]="false";
$elem["openswan/existing_x509_certificate_filename"]["type"]="string";
$elem["openswan/existing_x509_certificate_filename"]["description"]="Please enter the location of your X509 certificate in PEM format.
 Please enter the location of the file containing your X509 certificate in
 PEM format.
";
$elem["openswan/existing_x509_certificate_filename"]["descriptionde"]="Bitte geben Sie den Speicherort ihres X509-Zertifikats im PEM-Format ein.
 Bitte geben Sie den Speicherort der Datei ein, die Ihr X509-Zertifikat im PEM-Format enthält.
";
$elem["openswan/existing_x509_certificate_filename"]["descriptionfr"]="Emplacement de votre certificat X509 au format PEM :
 Veuillez indiquer l'emplacement du fichier contenant votre certificat X509 au format PEM.
";
$elem["openswan/existing_x509_certificate_filename"]["default"]="";
$elem["openswan/existing_x509_key_filename"]["type"]="string";
$elem["openswan/existing_x509_key_filename"]["description"]="Please enter the location of your X509 private key in PEM format.
 Please enter the location of the file containing the private RSA key
 matching your X509 certificate in PEM format. This can be the same file
 that contains the X509 certificate.
";
$elem["openswan/existing_x509_key_filename"]["descriptionde"]="Bitte geben Sie den Speicherort Ihren privaten X509-Schlüssels im PEM-Format ein.
 Bitte geben Sie den Speicherort der Datei ein, die den privaten RSA-Schlüssel im PEM-Format enthält, der zu Ihrem X509-Zertifikat passt. Dies kann dieselbe Datei sein, die das X509-Zertifikat enthält.
";
$elem["openswan/existing_x509_key_filename"]["descriptionfr"]="Emplacement de votre clé privée X509 au format PEM :
 Veuillez indiquer l'emplacement du fichier contenant la clé privée RSA correspondant à votre certificat X509 au format PEM. Cela peut être le fichier qui contient le certificat X509.
";
$elem["openswan/existing_x509_key_filename"]["default"]="";
$elem["openswan/rsa_key_length"]["type"]="string";
$elem["openswan/rsa_key_length"]["description"]="Which length should the created RSA key have?
 Please enter the length of the created RSA key. it should not be less than
 1024 bits because this should be considered unsecure and you will probably
 not need anything more than 2048 bits because it only slows the
 authentication process down and is not needed at the moment.
";
$elem["openswan/rsa_key_length"]["descriptionde"]="Welche Länge soll der erzeugte RSA-Schlüssel haben?
 Bitte geben Sie die Länge des zu erzeugenden RSA-Schlüssels ein. Sie sollte nicht weniger als 1024 Bit sein, da dies als unsicher betrachtet wird. Und Sie werden wahrscheinlich nicht mehr als 2048 Bit benötigen, da längere Schlüssel den Authentifizierungs-Prozess verlangsamen und zur Zeit nicht benötigt werden.
";
$elem["openswan/rsa_key_length"]["descriptionfr"]="Longueur de la clé RSA à créer :
 Veuillez indiquer la longueur de la clé RSA qui sera créée. Elle ne doit pas être inférieure à 1024 bits car cela serait considéré comme insuffisamment sûr. Un choix excédant 2048 bits est probablement inutile car cela ne fait essentiellement que ralentir le processus d'authentification sans avoir d'intérêt actuellement.
";
$elem["openswan/rsa_key_length"]["default"]="2048";
$elem["openswan/x509_self_signed"]["type"]="boolean";
$elem["openswan/x509_self_signed"]["description"]="Do you want to create a self-signed X509 certificate?
 This installer can only create self-signed X509 certificates
 automatically, because otherwise a certificate authority is needed to sign
 the certificate request. If you want to create a self-signed certificate,
 you can use it immediately to connect to other IPSec hosts that support
 X509 certificate for authentication of IPSec connections. However, if you
 want to use the new PKI features of Openswan >= 1.91, you will need to
 have all X509 certificates signed by a single certificate authority to
 create a trust path.
 .
 If you do not want to create a self-signed certificate, then this
 installer will only create the RSA private key and the certificate request
 and you will have to sign the certificate request with your certificate
 authority.
";
$elem["openswan/x509_self_signed"]["descriptionde"]="Möchten Sie ein selbstsigniertes X509-Zertifikat erzeugen?
 Dieser Installer kann nur selbstsignierte X509-Zertifikate automatisch erzeugen, da anderenfalls eine Zertifizierungsstelle benötigt wird, um die Zertifikatsanforderung zu signieren. Falls Sie ein selbstsigniertes Zertifikat erzeugen möchten, können Sie dieses sofort verwenden, um sich mit anderen IPSec-Rechnern zu verbinden, die X509-Zertifikate zur Authentifizierung benutzen. Falls Sie jedoch die neuen PKI-Funktionen von Openswan >= 1.91 verwenden möchten, müssen alle X509-Zertifikate von einer einzigen Zertifizierungsstelle signiert sein, um einen Vertrauenspfad zu erzeugen.
 .
 Falls Sie kein selbstsigniertes Zertifikat erstellen möchten, wird dieser Installer nur den privaten Schlüssel und die Zertifikatsanforderung erzeugen. Sie müssen diese Zertifikatsanforderung mit Ihrer Zertifizierungsstelle signieren.
";
$elem["openswan/x509_self_signed"]["descriptionfr"]="Souhaitez-vous créer un certificat X509 autosigné ?
 Cet outil d'installation ne peut créer automatiquement qu'un certificat X509 autosigné puisqu'une autorité de certification est indispensable pour signer la demande de certificat. Si vous choisissez de créer un certificat autosigné, vous pourrez vous en servir immédiatement pour vous connecter aux hôtes qui authentifient les connexions IPSec avec des certificats X509. Cependant, si vous souhaitez utiliser les nouvelles fonctionnalités PKI de Openswan >= 1.91, vous aurez besoin que tous les certificats X509 soient signés par la même autorité de certification afin de créer un chemin de confiance.
 .
 Si vous ne voulez pas créer de certificat autosigné, cet outil d'installation ne fera que créer la clé privée RSA et la demande de certificat, que vous devrez ensuite signer avec votre autorité de certification.
";
$elem["openswan/x509_self_signed"]["default"]="true";
$elem["openswan/x509_country_code"]["type"]="string";
$elem["openswan/x509_country_code"]["description"]="Please enter the country code for the X509 certificate request.
 Please enter the 2 letter country code for your country. This code will be
 placed in the certificate request. 
 .
 You really need to enter a valid country code here, because openssl will
 refuse to generate certificates without one. An empty field is allowed for
 any other field of the X.509 certificate, but not for this one.
 .
 Example: AT
";
$elem["openswan/x509_country_code"]["descriptionde"]="Bitte geben Sie den Ländercode für die X509-Zertifikatsanforderung ein.
 Bitte geben Sie den zweibuchstabigen Ländercode für Ihr Land ein. Dieser Code wird in die Zertifikatsanforderung eingefügt.
 .
 Sie müssen wirklich ein gültigen Ländercode hier eingeben, da Openssl es ablehnen wird, ohne diesen ein Zertifikat zu generieren. Ein leeres Feld ist zulässig für jedes andere Feld des X509-Zertifikats, aber nicht für dieses.
 .
 Beispiel: DE
";
$elem["openswan/x509_country_code"]["descriptionfr"]="Code du pays :
 Veuillez indiquer le code à deux lettres de votre pays. Ce code sera inclus dans la demande de certificat.
 .
 Il est impératif de choisir ici un code de pays valide sinon OpenSSL refusera de générer les certificats. Tous les autres champs d'un certificat X.509 peuvent être vides, sauf celui-ci.
 .
 Exemple : FR
";
$elem["openswan/x509_country_code"]["default"]="AT";
$elem["openswan/x509_state_name"]["type"]="string";
$elem["openswan/x509_state_name"]["description"]="Please enter the state or province name for the X509 certificate request.
 Please enter the full name of the state or province you live in. This name
 will be placed in the certificate request.
 .
 Example: Upper Austria
";
$elem["openswan/x509_state_name"]["descriptionde"]="Bitte geben Sie den Namen des Bundeslandes oder der Provinz für die X509-Zertifikatsanforderung ein.
 Bitte geben Sie den vollständigen Namen des Bundeslandes oder der Provinz, in der Sie leben. Dieser Name wird in die Zertifikatsanforderung eingefügt.
 .
 Beispiel: Sachsen
";
$elem["openswan/x509_state_name"]["descriptionfr"]="État, province ou région :
 Veuillez indiquer le nom complet de l'état, de la province ou de la région où vous résidez. Ce nom sera inclus dans la demande de certificat.
 .
 Exemples : Rhône-Alpes, Brabant Wallon, Bouches du Rhône, Québec, Canton de Vaud
";
$elem["openswan/x509_state_name"]["default"]="Default:";
$elem["openswan/x509_locality_name"]["type"]="string";
$elem["openswan/x509_locality_name"]["description"]="Please enter the locality name for the X509 certificate request.
 Please enter the locality (e.g. city) where you live. This name will be
 placed in the certificate request.
 .
 Example: Vienna
";
$elem["openswan/x509_locality_name"]["descriptionde"]="Bitte geben Sie den Namen der Ortschaft für die X509-Zertifikatsanforderung ein.
 Bitte geben Sie die Ortschaft ein, in der Sie leben. Dieser Name wird in die Zertifikatsanforderung eingefügt.
 .
 Beispiel: Dresden
";
$elem["openswan/x509_locality_name"]["descriptionfr"]="Localité :
 Veuillez indiquer la localité (p. ex. la ville) où vous résidez. Ce nom sera inclus dans la demande de certificat.
 .
 Exemple : Saint-Étienne
";
$elem["openswan/x509_locality_name"]["default"]="";
$elem["openswan/x509_organization_name"]["type"]="string";
$elem["openswan/x509_organization_name"]["description"]="Please enter the organization name for the X509 certificate request.
 Please enter the organization (e.g. company) that the X509 certificate
 should be created for. This name will be placed in the certificate
 request.
 .
 Example: Debian
";
$elem["openswan/x509_organization_name"]["descriptionde"]="Bitte geben Sie den Namen der Organisation für die X509-Zertifikatsanforderung ein.
 Bitte geben Sie die Organisation (im allgemeinen Firma) ein, für die das X509-Zertifikat ausgestellt werden soll. Dieser Name wird in die Zertifikatsanforderung eingefügt.
 .
 Beispiel: Debian
";
$elem["openswan/x509_organization_name"]["descriptionfr"]="Organisme :
 Veuillez indiquer l'organisme (p. ex. l'entreprise) pour qui sera créé le certificat X509. Ce nom sera inclus dans la demande de certificat.
 .
 Exemple : Debian
";
$elem["openswan/x509_organization_name"]["default"]="";
$elem["openswan/x509_organizational_unit"]["type"]="string";
$elem["openswan/x509_organizational_unit"]["description"]="Please enter the organizational unit for the X509 certificate request.
 Please enter the organizational unit (e.g. section) that the X509
 certificate should be created for. This name will be placed in the
 certificate request.
 .
 Example: security group
";
$elem["openswan/x509_organizational_unit"]["descriptionde"]="Bitte geben Sie die Organisationseinheit für die X509-Zertifikatsanforderung ein.
 Bitte geben Sie die Organisationseinheit (im allgemeinen Abteilung) ein, für die das X509-Zertifikat ausgestellt werden soll. Dieser Name wird in die Zertifikatsanforderung eingefügt.
 .
 Beispiel: Sicherheitsgruppe
";
$elem["openswan/x509_organizational_unit"]["descriptionfr"]="Unité d'organisation :
 Veuillez indiquer l'unité d'organisation (p. ex. département, division, etc.) pour qui sera créé le certificat X509. Ce nom sera inclus dans la demande de certificat.
 .
 Exemple : Département Réseaux et Informatique Scientifique
";
$elem["openswan/x509_organizational_unit"]["default"]="";
$elem["openswan/x509_common_name"]["type"]="string";
$elem["openswan/x509_common_name"]["description"]="Please enter the common name for the X509 certificate request.
 Please enter the common name (e.g. the host name of this machine) for
 which the X509 certificate should be created for. This name will be placed
 in the certificate request.
 .
 Example: gateway.debian.org
";
$elem["openswan/x509_common_name"]["descriptionde"]="Bitte geben Sie den allgemeinen Namen für die X509-Zertifikatsanforderung ein.
 Bitte geben Sie den allgemeinen Namen (engl.: common name, im allgemeinen der Hostname dieses Rechners) ein, für den das X509-Zertifikat ausgestellt werden soll. Dieser Name wird in die Zertifikatsanforderung eingefügt.
 .
 Beispiel: gateway.debian.org
";
$elem["openswan/x509_common_name"]["descriptionfr"]="Nom ordinaire :
 Veuillez indiquer le nom ordinaire (p. ex. le nom réseau de cette machine) pour qui sera créé le certificat X509. Ce nom sera inclus dans la demande de certificat.
 .
 Exemple : gateway.debian.org
";
$elem["openswan/x509_common_name"]["default"]="";
$elem["openswan/x509_email_address"]["type"]="string";
$elem["openswan/x509_email_address"]["description"]="Please enter the email address for the X509 certificate request.
 Please enter the email address of the person or organization who is
 responsible for the X509 certificate, This address will be placed in the
 certificate request.
";
$elem["openswan/x509_email_address"]["descriptionde"]="Bitte geben Sie die Email-Adresse für die X509-Zertifikatsanforderung ein.
 Bitte geben Sie die Email-Adresse der Person oder Organisation ein, die für das X509-Zertifikat verantwortlich ist. Diese Adresse wird in die Zertifikatsanforderung eingefügt.
";
$elem["openswan/x509_email_address"]["descriptionfr"]="Adresse électronique :
 Veuillez indiquer l'adresse électronique de la personne ou de l'organisme responsable du certificat X509. Cette adresse sera incluse dans la demande de certificat.
";
$elem["openswan/x509_email_address"]["default"]="";
$elem["openswan/enable-oe"]["type"]="boolean";
$elem["openswan/enable-oe"]["description"]="Do you wish to enable opportunistic encryption in Openswan?
 Openswan comes with support for opportunistic encryption (OE), which stores
 IPSec authentication information (i.e. RSA public keys) in (preferably
 secure) DNS records. Until this is widely deployed, activating it will
 cause a significant slow-down for every new, outgoing connection. Since
 version 2.0, Openswan upstream comes with OE enabled by default and is thus
 likely to break your existing connection to the Internet (i.e. your default
 route) as soon as pluto (the Openswan keying daemon) is started.
 .
 Please choose whether you want to enable support for OE. If unsure, do not
 enable it.
";
$elem["openswan/enable-oe"]["descriptionde"]="Möchten Sie opportunistische Verschlüsselung in Openswan aktivieren?
 Openswan bringt die Unterstützung für opportunistische Verschlüsselung (engl.: opportunistic encryption, OE) mit, welche IPSec-Authentifizierungs-Informationen (zum Beispiel öffentliche RSA-Schlüssel) in (vorzugsweise sicheren) DNS-Einträgen speichert. Bis dies weitläufig eingesetzt wird, wird die Aktivierung eine signifikante Verlangsamung für jede neue ausgehende Verbindung verursachen. Seit Version 2.0 kommt Openswan mit aktivierter OE in der Voreinstellung und wird damit wahrscheinlich Ihre existierende Verbindung zum Internet unterbrechen, sobald Pluto (der Openswan-Schlüssel-Daemon) gestartet ist.
 .
 Bitte wählen Sie, ob Sie die Unterstützung für OE aktivieren möchten. Falls Sie sich nicht sicher sind, aktivieren Sie sie nicht.
";
$elem["openswan/enable-oe"]["descriptionfr"]="Souhaitez-vous activer le chiffrement opportuniste dans Openswan ?
 Openswan gère le chiffrement opportuniste (« opportunistic encryption » : OE) qui permet de conserver les informations d'authentification IPSec (c'est-à-dire les clés publiques RSA) dans des enregistrements DNS, de préférence sécurisés. Tant que cette fonctionnalité ne sera pas déployée largement, son activation provoquera un ralentissement significatif pour toute nouvelle connexion sortante. À partir de la version 2.0, cette fonctionnalité est activée par défaut dans Openswan, ce qui peut interrompre le fonctionnement de votre connexion à l'Internet (c'est-à-dire votre route par défaut) dès le démarrage de pluto, le démon de gestion de clés d'Openswan.
 .
 Veuillez choisir si vous souhaitez activer la gestion du chiffrement opportuniste. Ne l'activez pas si vous n'êtes pas certain d'en avoir besoin.
";
$elem["openswan/enable-oe"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
