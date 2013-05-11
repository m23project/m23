<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("openswan");

$elem["openswan/runlevel_changes"]["type"]="note";
$elem["openswan/runlevel_changes"]["description"]="Old runlevel management superseded
 Previous versions of the Openswan package gave a choice between
 three different Start/Stop-Levels. Due to changes in the standard system
 startup procedure, this is no longer necessary or useful. For all new
 installations as well as old ones running in any of the predefined modes,
 sane default levels will now be set. If you are upgrading from a previous
 version and changed your Openswan startup parameters, then please take a
 look at NEWS.Debian for instructions on how to modify your setup accordingly.
";
$elem["openswan/runlevel_changes"]["descriptionde"]="Alte Verwaltung der Runlevel abgelöst
 Frühere Versionen von Openswan ermöglichten eine Wahl zwischen drei verschiedenen Start/Stopp-Modi. Aufgrund von Änderungen des standardmäßigen Systemstarts ist dies nicht mehr notwendig oder nützlich. Sowohl für alle neuen als auch bestehende Installationen, die in einem der vordefinierten Modi betrieben wurden, werden jetzt vernünftige Standardwerte gesetzt. Wenn Sie jetzt ein Upgrade von einer früheren Version durchführen und Sie die Openswan-Startparameter angepasst haben, werfen Sie bitte einen Blick auf NEWS.Debian. Die Datei enthält Anweisungen, wie Sie Ihre Installation entsprechend ändern.
";
$elem["openswan/runlevel_changes"]["descriptionfr"]="Abandon de l'ancien système de lancement d'Openswan
 Les versions précédentes du paquet d'Openswan permettaient de choisir entre trois séquences possibles de lancement au démarrage de la machine. Comme l'organisation générale des scripts de lancement a été profondément modifiée dans le système, cela n'est désormais plus utile. Pour toutes les nouvelles installations, ainsi que pour les anciennes qui fonctionnaient selon un des trois modes prédéfinis, une séquence de lancement sûre va être mise en place. Si vous effectuez une mise à jour et aviez modifié les paramètres de lancement d'Openswan, veuillez consulter le fichier NEWS.Debian pour trouver les informations qui vous permettront d'adapter vos réglages.
";
$elem["openswan/runlevel_changes"]["default"]="";
$elem["openswan/restart"]["type"]="boolean";
$elem["openswan/restart"]["description"]="Restart Openswan now?
 Restarting Openswan is recommended, since if there is a security fix, it
 will not be applied until the daemon restarts. Most people expect the daemon
 to restart, so this is generally a good idea. However, this might take down
 existing connections and then bring them back up, so if you are using such
 an Openswan tunnel to connect for this update, restarting is not recommended.
";
$elem["openswan/restart"]["descriptionde"]="Openswan jetzt neu starten?
 Es wird empfohlen, Openswan neu zu starten, da eine Sicherheitskorrektur erst nach dem Neustart des Daemons greift. Weil meisten Anwender einen Neustart des Daemons erwarten, ist dies grundsätzlich eine gute Idee. Der Neustart kann aber bestehende Verbindungen beenden und erneut aufbauen. Wenn Sie einen solchen Openswan-Tunnel für die Verbindung bei dieser Aktualisierung verwenden, wird der Neustart nicht empfohlen.
";
$elem["openswan/restart"]["descriptionfr"]="Souhaitez-vous redémarrer Openswan ?
 Redémarrer Openswan est préférable car un éventuel correctif de sécurité ne sera actif que si le démon est redémarré. La plupart des utilisateurs s'attendent à ce que le démon redémarre et c'est donc le plus souvent le meilleur choix. Cependant, cela pourrait interrompre provisoirement des connexions en cours, y compris la connexion utilisée actuellement pour cette mise à jour. En conséquence, il est déconseillé de redémarrer si le tunnel est utilisé pour l'administration du système.
";
$elem["openswan/restart"]["default"]="true";
$elem["openswan/install_x509_certificate"]["type"]="boolean";
$elem["openswan/install_x509_certificate"]["description"]="Use an X.509 certificate for this host?
 An X.509 certificate for this host can be automatically created or imported.
 It can be used to authenticate IPsec connections to other hosts
 and is the preferred way of building up secure IPsec connections. The other
 possibility would be to use shared secrets (passwords that are the same on
 both sides of the tunnel) for authenticating a connection, but for a larger
 number of connections, key based authentication is easier to administer and
 more secure.
 .
 Alternatively you can reject this option and later use the command
 \"dpkg-reconfigure openswan\" to come back.
";
$elem["openswan/install_x509_certificate"]["descriptionde"]="Für diesen Rechner ein X.509-Zertifikat verwenden?
 Für diesen Rechner kann ein X.509-Zertifikat automatisch erstellt oder importiert werden, das zur Authentifizierung von IPSec-Verbindungen zu anderen Rechnern verwendet werden kann. Dieses Vorgehen ist für den Aufbau gesicherter IPSec-Verbindungen vorzuziehen. Die andere Möglichkeit ist die Verwendung von gemeinsamen Geheimnissen (engl.: shared secrets, gleiche Passwörter an beiden Enden des Tunnels) zur Authentifizierung einer Verbindung. Für eine größere Anzahl von Verbindungen ist aber die RSA-Authentifizierung einfacher zu verwalten und sicherer.
 .
 Alternativ können Sie diese Option ablehnen und später mit dem Befehl »dpkg-reconfigure openswan« zurückkehren.
";
$elem["openswan/install_x509_certificate"]["descriptionfr"]="Faut-il utiliser un certificat X.509 existant avec cet hôte ?
 Un certificat X.509 peut être créé automatiquement ou importé, pour cet hôte. Il peut servir à authentifier des connexions IPSec vers d'autres hôtes, ce qui est la méthode conseillée pour l'établissement de liaisons IPSec sûres. L'autre possibilité d'authentification à la connexion est l'utilisation d'un secret partagé (« pre-shared key » : des mots de passe identiques aux deux extrémités du tunnel). Toutefois, pour de nombreuses connexions, l'authentification à base de clés est plus simple à administrer et plus sûre.
 .
 Vous pouvez ne pas choisir cette option et y revenir plus tard avec la commande « dpkg-reconfigure openswan ».
";
$elem["openswan/install_x509_certificate"]["default"]="false";
$elem["openswan/how_to_get_x509_certificate"]["type"]="select";
$elem["openswan/how_to_get_x509_certificate"]["choices"][1]="create";
$elem["openswan/how_to_get_x509_certificate"]["choicesde"][1]="erstellen";
$elem["openswan/how_to_get_x509_certificate"]["choicesfr"][1]="Créer";
$elem["openswan/how_to_get_x509_certificate"]["description"]="Methods for using a X.509 certificate to authenticate this host:
 It is possible to create a new X.509 certificate with user-defined settings
 or to import an existing public and private key stored in PEM file(s) for
 authenticating IPsec connections.
 .
 If you choose to create a new X.509 certificate you will first be asked
 a number of questions which must be answered before the creation can start.
 Please keep in mind that if you want the public key to get signed by
 an existing Certificate Authority you should not select to create a
 self-signed certificate and all the answers given must match exactly the
 requirements of the CA, otherwise the certificate request may be rejected.
 .
 If you want to import an existing public and private key you will be
 prompted for their filenames (which may be identical if both parts are stored
 together in one file). Optionally you may also specify a filename where the
 public key(s) of the Certificate Authority are kept, but this file cannot
 be the same as the former ones. Please also be aware that the format for the
 X.509 certificates has to be PEM and that the private key must not be encrypted
 or the import procedure will fail.
";
$elem["openswan/how_to_get_x509_certificate"]["descriptionde"]="Methoden für die Authentifizierung dieses Rechners mittels eines X.509-Zertifikats:
 Es ist möglich, mit benutzerdefinierten Einstellungen ein neues X.509-Zertifikat zu erstellen oder einen vorhandenen, in PEM-Datei(en) gespeicherten, öffentlichen und privaten Schlüssel für die Authentifizierung von IPSec-Verbindungen zu verwenden.
 .
 Wenn Sie sich für die Erzeugung eines neuen X.509-Zertifikats entscheiden, wird Ihnen zunächst eine Reihe von Fragen gestellt. Diese Fragen müssen beantwortet werden, damit das Zertifikat erzeugt werden kann. Bitte beachten Sie: Wenn Sie den öffentlichen Schlüssel von einer bestehenden Zertifizierungsstelle (Certificate Authority, CA) bestätigen lassen wollen, sollten Sie nicht wählen, ein selbst signiertes Zertifikat zu erstellen. Außerdem müssen dann alle gegebenen Antworten exakt den Anforderungen der CA entsprechen, da sonst der Antrag auf Zertifizierung zurückgewiesen werden kann.
 .
 Wenn Sie bestehende öffentliche und private Schlüssel importieren wollen, werden Sie nach deren Dateinamen gefragt. (Die Namen können übereinstimmen, wenn beide Teile zusammen in einer Datei gespeichert werden.) Optional können Sie auch den Namen einer Datei angeben, die den/(die) öffentlichen Schlüssel Ihrer Zertifizierungsstelle enthält. Dieser Name muss von den Erstgenannten verschieden sein. Bitte beachten Sie auch, dass Sie für die X.509-Zertifikate das Format PEM verwenden und dass der private Schlüssel nicht verschlüsselt sein darf, weil sonst der Import-Vorgang fehlschlagen wird.
";
$elem["openswan/how_to_get_x509_certificate"]["descriptionfr"]="Méthode de mise en place d'un certificat X.509 pour l'authentification de cet hôte :
 Pour l'authentification des connexions IPsec, il est possible de créer un nouveau certificat X.509 avec des réglages personnalisés ou importer une paire de clés publique et privée depuis un ou plusieurs fichiers PEM.
 .
 Si vous choisissez de créer un nouveau certificat X.509, vous devrez fournir plusieurs informations avant la création. Veuillez noter que si vous souhaitez utiliser un certificat signé par une autorité de certification, vous ne devez pas choisir de créer un certificat auto-signé et devrez donner exactement les réponses souhaitées par l'autorité de certification sinon la requête de certificat risquerait d'être rejetée.
 .
 Si vous souhaitez importer une paire de clés, vous devrez en fournir les noms de fichiers (qui peuvent être identiques si les parties privée et publique sont dans le même fichier). Vous pourrez facultativement fournir le nom d'un fichier contenant la ou les clés publiques de l'autorité de certification. Ce fichier devra être différent des précédents. Le format des certificats X.509 doit être PEM et la clé privée ne doit pas être chiffrée. Dans le cas contraire, l'importation échouera.
";
$elem["openswan/how_to_get_x509_certificate"]["default"]="create";
$elem["openswan/existing_x509_certificate_filename"]["type"]="string";
$elem["openswan/existing_x509_certificate_filename"]["description"]="File name of your PEM format X.509 certificate:
 Please enter the location of the file containing your X.509 certificate in
 PEM format.
";
$elem["openswan/existing_x509_certificate_filename"]["descriptionde"]="Dateiname Ihres X.509-Zertifikats im PEM-Format:
 Bitte geben Sie den Speicherort der Datei ein, die Ihr X.509-Zertifikat im PEM-Format enthält.
";
$elem["openswan/existing_x509_certificate_filename"]["descriptionfr"]="Nom du fichier PEM contenant le certificat X.509 :
 Veuillez indiquer l'emplacement du fichier contenant votre certificat X.509 au format PEM.
";
$elem["openswan/existing_x509_certificate_filename"]["default"]="";
$elem["openswan/existing_x509_key_filename"]["type"]="string";
$elem["openswan/existing_x509_key_filename"]["description"]="File name of your PEM format X.509 private key:
 Please enter the location of the file containing the private RSA key
 matching your X.509 certificate in PEM format. This can be the same file
 that contains the X.509 certificate.
";
$elem["openswan/existing_x509_key_filename"]["descriptionde"]="Dateiname des privaten X.509-Schlüssels im PEM-Format:
 Bitte geben Sie den Speicherort der Datei ein, die den zu Ihrem X.509-Zertifikat passenden privaten RSA-Schlüssel im PEM-Format enthält. Dies kann dieselbe Datei sein, die das X.509-Zertifikat enthält.
";
$elem["openswan/existing_x509_key_filename"]["descriptionfr"]="Nom du fichier PEM contenant la clé privée X.509 :
 Veuillez indiquer l'emplacement du fichier contenant la clé privée RSA correspondant au certificat X.509 au format PEM. Cela peut être le fichier qui contient le certificat X.509.
";
$elem["openswan/existing_x509_key_filename"]["default"]="";
$elem["openswan/existing_x509_rootca_filename"]["type"]="string";
$elem["openswan/existing_x509_rootca_filename"]["description"]="File name of your PEM format X.509 RootCA:
 Optionally you can now enter the location of the file containing the X.509
 Certificate Authority root used to sign your certificate in PEM format. If you
 do not have one or do not want to use it please leave the field empty. Please
 note that it's not possible to store the RootCA in the same file as your X.509
 certificate or private key.
";
$elem["openswan/existing_x509_rootca_filename"]["descriptionde"]="Dateiname Ihrer PEM-Format-X.509-RootCA:
 Optional können Sie nun den Speicherort der Datei mit dem »X.509 Certificate Authority Root« angeben, mit dem Ihr Zertifikat im PEM-Format unterzeichnet wurde. Wenn Sie keine haben oder diese nicht verwenden wollen, lassen Sie dieses Feld bitte leer. Bitte beachten Sie, dass es nicht möglich ist, die RootCA in der gleichen Datei wie Ihr X.509-Zertifikat oder den privaten Schlüssel zu speichern.
";
$elem["openswan/existing_x509_rootca_filename"]["descriptionfr"]="Nom du fichier PEM contenant le certificat X.509 de l'autorité de certification :
 Veuillez indiquer facultativement l'emplacement du fichier (au format PEM) contenant le certificat X.509 de l'autorité de certification qui a signé le certificat que vous avez fourni. Si vous n'utilisez pas d'autorité de certification, vous pouvez laisser ce champ vide. Veuillez noter que ce fichier doit être différent du fichier de certificat X.509 et de la clé privée que vous utilisez.
";
$elem["openswan/existing_x509_rootca_filename"]["default"]="";
$elem["openswan/rsa_key_length"]["type"]="string";
$elem["openswan/rsa_key_length"]["description"]="Length of RSA key to be created:
 Please enter the required RSA key-length. Anything under 1024 bits
 should be considered insecure; anything more than 4096 bits slows down
 the authentication process and is not useful at present.
";
$elem["openswan/rsa_key_length"]["descriptionde"]="Länge des zu erstellenden RSA-Schlüssels:
 Bitte geben Sie die Länge des zu erstellenden RSA-Schlüssels ein. Sie sollte nicht weniger als 1024 Bit sein, da dies als unsicher betrachtet wird. Alles über 4098 Bit verlangsamt den Authentifizierungs-Prozess und ist zur Zeit nicht nützlich.
";
$elem["openswan/rsa_key_length"]["descriptionfr"]="Longueur de la clé RSA à créer :
 Veuillez indiquer la longueur de la clé RSA qui sera créée. Elle ne doit pas être inférieure à 1024 bits car cela serait considéré comme insuffisamment sûr. Un choix excédant 4096 bits est probablement inutile car cela ne fait essentiellement que ralentir le processus d'authentification sans avoir d'intérêt actuellement.
";
$elem["openswan/rsa_key_length"]["default"]="2048";
$elem["openswan/x509_self_signed"]["type"]="boolean";
$elem["openswan/x509_self_signed"]["description"]="Create a self-signed X.509 certificate?
 Only self-signed X.509 certificates can be created
 automatically, because otherwise a Certificate Authority is needed to sign
 the certificate request. If you choose to create a self-signed certificate,
 you can use it immediately to connect to other IPsec hosts that support
 X.509 certificate for authentication of IPsec connections. However, using
 Openswan's PKI features requires all certificates to be signed by a single
 Certificate Authority to create a trust path.
 .
 If you do not choose to create a self-signed certificate, only the RSA
 private key and the certificate request will be created, and you will
 have to sign the certificate request with your Certificate Authority.
";
$elem["openswan/x509_self_signed"]["descriptionde"]="Selbstsigniertes X.509-Zertifikat erstellen?
 Nur selbstsignierte X.509-Zertifikate können automatisch erzeugt werden, da anderenfalls eine Zertifizierungsstelle zur Signatur der Zertifikatsanfrage benötigt wird. Falls Sie sich entscheiden, ein selbstsigniertes Zertifikat zu erstellen, können Sie es sofort zur Verbindung mit anderen IPSec-Rechnern verwenden, die X.509-Zertifikate zur Authentifizierung von IPSec-Verbindungen verwenden. Falls Sie jedoch die PKI-Funktionen von Openswan verwenden möchten, müssen alle X.509-Zertifikate von einer einzigen Zertifizierungsstelle signiert sein, um einen Vertrauenspfad zu schaffen.
 .
 Falls Sie kein selbstsigniertes Zertifikat erstellen möchten, wird nur der private RSA-Schlüssel und die Zertifikatsanforderung erstellt. Sie müssen diese Zertifikatsanforderung von Ihrer Zertifizierungsstelle signieren lassen.
";
$elem["openswan/x509_self_signed"]["descriptionfr"]="Souhaitez-vous créer un certificat X.509 auto-signé ?
 Seuls des certificats X.509 auto-signés peuvent être créés automatiquement puisqu'une autorité de certification est indispensable pour signer la demande de certificat. Si vous choisissez de créer un certificat auto-signé, vous pourrez vous en servir immédiatement pour vous connecter aux hôtes qui authentifient les connexions IPsec avec des certificats X.509. Cependant, si vous souhaitez utiliser les nouvelles fonctionnalités PKI d'Openswan, vous aurez besoin que tous les certificats soient signés par la même autorité de certification afin de créer un chemin de confiance.
 .
 Si vous ne voulez pas créer de certificat auto-signé, seules la clé privée RSA et la demande de certificat seront créées et vous devrez ensuite faire signer la demande de certificat par votre autorité de certification.
";
$elem["openswan/x509_self_signed"]["default"]="true";
$elem["openswan/x509_country_code"]["type"]="string";
$elem["openswan/x509_country_code"]["description"]="Country code for the X.509 certificate request:
 Please enter the two-letter code for the country the server resides in
 (such as \"AT\" for Austria).
 .
 OpenSSL will refuse to generate a certificate unless this is a valid
 ISO-3166 country code; an empty field is allowed elsewhere in the X.509
 certificate, but not here.
";
$elem["openswan/x509_country_code"]["descriptionde"]="Ländercode für die X.509-Zertifikatsanforderung:
 Geben Sie den Ländercode (zwei Zeichen) für das Land ein, in dem der Server steht (z. B. »AT« für Österreich).
 .
 Ohne einen gültigen Ländercode nach ISO-3166 wird es OpenSSL ablehnen, ein Zertifikat zu generieren. Ein leeres Feld ist für andere Elemente des X.509-Zertifikats zulässig, aber nicht für dieses.
";
$elem["openswan/x509_country_code"]["descriptionfr"]="Code du pays pour la demande de certificat X.509 :
 Veuillez indiquer le code à deux lettres du pays où est situé le serveur (p. ex. « FR » pour la France).
 .
 Il est impératif de choisir ici un code de pays ISO-3166 valable sinon OpenSSL refusera de créer les certificats. Tous les autres champs d'un certificat X.509 peuvent être vides, sauf celui-ci.
";
$elem["openswan/x509_country_code"]["default"]="AT";
$elem["openswan/x509_state_name"]["type"]="string";
$elem["openswan/x509_state_name"]["description"]="State or province name for the X.509 certificate request:
 Please enter the full name of the state or province the server resides in
 (such as \"Upper Austria\").
";
$elem["openswan/x509_state_name"]["descriptionde"]="Name des Landes oder der Provinz für diese X.509-Zertifikatsanfrage:
 Bitte geben Sie den kompletten Namen des Landes oder der Provinz ein, in der sich der Server befindet (wie »Oberösterreich«).
";
$elem["openswan/x509_state_name"]["descriptionfr"]="État, province ou région pour la demande de certificat X.509 :
 Veuillez indiquer le nom de la région, d el'état ou de la province où est situé le serveur (p. ex. « Jura »).
";
$elem["openswan/x509_state_name"]["default"]="Default:";
$elem["openswan/x509_locality_name"]["type"]="string";
$elem["openswan/x509_locality_name"]["description"]="Locality name for the X.509 certificate request:
 Please enter the locality the server resides in (often a city, such
 as \"Vienna\").
";
$elem["openswan/x509_locality_name"]["descriptionde"]="Ort für die X.509-Zertifikatsanforderung:
 Geben Sie bitte den Ort an, an dem der Server steht (oft ist das eine Stadt wie beispielsweise »Wien«).
";
$elem["openswan/x509_locality_name"]["descriptionfr"]="Localité pour la demande de certificat X.509 :
 Veuillez indiquer la localité où est situé le serveur (ce sera souvent une ville, comme « Montcuq »).
";
$elem["openswan/x509_locality_name"]["default"]="Default:";
$elem["openswan/x509_organization_name"]["type"]="string";
$elem["openswan/x509_organization_name"]["description"]="Organization name for the X.509 certificate request:
 Please enter the organization the server belongs to (such as \"Debian\").
";
$elem["openswan/x509_organization_name"]["descriptionde"]="Organisationsname für die X.509-Zertifikatsanforderung:
 Bitte geben Sie die Organisation an, zu der der Server gehört (wie z.B. »Debian«).
";
$elem["openswan/x509_organization_name"]["descriptionfr"]="Organisme pour la demande de certificat X.509 :
 Veuillez indiquer l'organisme propriétaire du serveur (p. ex. « Debian »).
";
$elem["openswan/x509_organization_name"]["default"]="Default:";
$elem["openswan/x509_organizational_unit"]["type"]="string";
$elem["openswan/x509_organizational_unit"]["description"]="Organizational unit for the X.509 certificate request:
 Please enter the organizational unit the server belongs to (such as
 \"security group\").
";
$elem["openswan/x509_organizational_unit"]["descriptionde"]="Organisationseinheit für die X.509-Zertifikatsanforderung:
 Bitte geben Sie die Organisationseinheit für die X.509-Zertifikatsanforderung ein (z.B. »Sicherheitsgruppe«).
";
$elem["openswan/x509_organizational_unit"]["descriptionfr"]="Unité d'organisation pour la demande de certificat X.509 :
 Veuillez indiquer l'unité d'organisation pour la demande de certificat X.509 (p. ex. « Équipe sécurité »).
";
$elem["openswan/x509_organizational_unit"]["default"]="Default:";
$elem["openswan/x509_common_name"]["type"]="string";
$elem["openswan/x509_common_name"]["description"]="Common Name for the X.509 certificate request:
 Please enter the Common Name for this host (such as
 \"gateway.example.org\").
";
$elem["openswan/x509_common_name"]["descriptionde"]="Common Name für die X.509-Zertifikatsanforderung:
 Bitte geben Sie den Common Name für diesen Rechner ein (wie z.B. »gateway.example.org«).
";
$elem["openswan/x509_common_name"]["descriptionfr"]="Nom ordinaire pour la demande de certification X.509 :
 Veuillez indiquer le nom ordinaire de ce serveur (ce sera souvent son nom réseau).
";
$elem["openswan/x509_common_name"]["default"]="Default:";
$elem["openswan/x509_email_address"]["type"]="string";
$elem["openswan/x509_email_address"]["description"]="Email address for the X.509 certificate request:
 Please enter the email address of the person or organization
 responsible for the X.509 certificate.
";
$elem["openswan/x509_email_address"]["descriptionde"]="E-Mail-Adresse für die X.509-Zertifikatsanforderung:
 Bitte geben Sie die E-Mail-Adresse der für das X.509-Zertifikat verantwortlichen Person oder Organisation ein.
";
$elem["openswan/x509_email_address"]["descriptionfr"]="Adresse électronique pour la demande de certificat X.509 :
 Veuillez indiquer l'adresse électronique de la personne ou de l'organisme responsable du certificat X.509.
";
$elem["openswan/x509_email_address"]["default"]="Default:";
$elem["openswan/no-oe_include_file"]["type"]="note";
$elem["openswan/no-oe_include_file"]["description"]="Modification of /etc/ipsec.conf
 Due to a change in upstream Openswan, opportunistic encryption is no longer
 enabled by default. The no_oe.conf file that was shipped in earlier versions
 to explicitly disable it can therefore no longer be included by ipsec.conf.
 Any such include paragraph will now be automatically removed to ensure
 that Openswan can start correctly.
";
$elem["openswan/no-oe_include_file"]["descriptionde"]="Veränderung von /etc/ipsec.conf
 Aufgrund einer Änderung im Quelltext von Openswan ist opportunistische Verschlüsselung nicht mehr standardmäßig aktiviert. Ältere Versionen von Openswan enthielten die Datei no_oe.conf, die zur expliziten Deaktivierung der opportunistischen Verschlüsselung diente. Diese kann jetzt nicht mehr mittels ipsec.conf aufgenommen werden. Jeder entsprechende Absatz wird jetzt automatisch entfernt, um einen korrekten Start von Openswan sicherzustellen.
";
$elem["openswan/no-oe_include_file"]["descriptionfr"]="Modification de /etc/ipsec.conf
 En raison de modifications dans la version amont d'Openswan, le chiffrement opportuniste n'est plus activé par défaut. Le fichier no_oe.conf qui était fourni avec les versions précédentes pour le désactiver explicitement ne peut donc plus être inclus dans ipsec.conf. Toute instruction d'inclusion de ce fichier sera automatiquement retirée afin qu'Openswan puisse démarrer correctement.
";
$elem["openswan/no-oe_include_file"]["default"]="";
PKG_OptionPageTail2($elem);
?>
