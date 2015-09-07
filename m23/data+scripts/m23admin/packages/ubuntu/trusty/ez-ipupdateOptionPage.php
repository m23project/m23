<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ez-ipupdate");

$elem["ez-ipupdate/service_type"]["type"]="select";
$elem["ez-ipupdate/service_type"]["choices"][1]="configure manually";
$elem["ez-ipupdate/service_type"]["choices"][2]="zoneedit";
$elem["ez-ipupdate/service_type"]["choices"][3]="ez-ip";
$elem["ez-ipupdate/service_type"]["choices"][4]="pgpow";
$elem["ez-ipupdate/service_type"]["choices"][5]="dhs";
$elem["ez-ipupdate/service_type"]["choices"][6]="dyndns";
$elem["ez-ipupdate/service_type"]["choices"][7]="dyndns-static";
$elem["ez-ipupdate/service_type"]["choices"][8]="dyndns-custom";
$elem["ez-ipupdate/service_type"]["choices"][9]="ods";
$elem["ez-ipupdate/service_type"]["choices"][10]="tzo";
$elem["ez-ipupdate/service_type"]["choices"][11]="easydns";
$elem["ez-ipupdate/service_type"]["choices"][12]="easydns-partner";
$elem["ez-ipupdate/service_type"]["choices"][13]="gnudip";
$elem["ez-ipupdate/service_type"]["choices"][14]="justlinux";
$elem["ez-ipupdate/service_type"]["choices"][15]="dyns";
$elem["ez-ipupdate/service_type"]["choices"][16]="hn";
$elem["ez-ipupdate/service_type"]["choicesde"][1]="manuell einrichten";
$elem["ez-ipupdate/service_type"]["choicesde"][2]="zoneedit";
$elem["ez-ipupdate/service_type"]["choicesde"][3]="ez-ip";
$elem["ez-ipupdate/service_type"]["choicesde"][4]="pgpow";
$elem["ez-ipupdate/service_type"]["choicesde"][5]="dhs";
$elem["ez-ipupdate/service_type"]["choicesde"][6]="dyndns";
$elem["ez-ipupdate/service_type"]["choicesde"][7]="dyndns-static";
$elem["ez-ipupdate/service_type"]["choicesde"][8]="dyndns-custom";
$elem["ez-ipupdate/service_type"]["choicesde"][9]="ods";
$elem["ez-ipupdate/service_type"]["choicesde"][10]="tzo";
$elem["ez-ipupdate/service_type"]["choicesde"][11]="easydns";
$elem["ez-ipupdate/service_type"]["choicesde"][12]="easydns-partner";
$elem["ez-ipupdate/service_type"]["choicesde"][13]="gnudip";
$elem["ez-ipupdate/service_type"]["choicesde"][14]="justlinux";
$elem["ez-ipupdate/service_type"]["choicesde"][15]="dyns";
$elem["ez-ipupdate/service_type"]["choicesde"][16]="hn";
$elem["ez-ipupdate/service_type"]["choicesfr"][1]="Configurer moi-même";
$elem["ez-ipupdate/service_type"]["choicesfr"][2]="zoneedit";
$elem["ez-ipupdate/service_type"]["choicesfr"][3]="ez-ip";
$elem["ez-ipupdate/service_type"]["choicesfr"][4]="pgpow";
$elem["ez-ipupdate/service_type"]["choicesfr"][5]="dhs";
$elem["ez-ipupdate/service_type"]["choicesfr"][6]="dyndns";
$elem["ez-ipupdate/service_type"]["choicesfr"][7]="dyndns-static";
$elem["ez-ipupdate/service_type"]["choicesfr"][8]="dyndns-custom";
$elem["ez-ipupdate/service_type"]["choicesfr"][9]="ods";
$elem["ez-ipupdate/service_type"]["choicesfr"][10]="tzo";
$elem["ez-ipupdate/service_type"]["choicesfr"][11]="easydns";
$elem["ez-ipupdate/service_type"]["choicesfr"][12]="easydns-partner";
$elem["ez-ipupdate/service_type"]["choicesfr"][13]="gnudip";
$elem["ez-ipupdate/service_type"]["choicesfr"][14]="justlinux";
$elem["ez-ipupdate/service_type"]["choicesfr"][15]="dyns";
$elem["ez-ipupdate/service_type"]["choicesfr"][16]="hn";
$elem["ez-ipupdate/service_type"]["description"]="Dynamic DNS provider to use:
 There are many Dynamic DNS providers supported by ez-ipupdate. If you want
 your default configuration to be created automatically, you must select the
 provider that you wish to use here. You must configure an account on your
 chosen provider's service yourself.
 .
 If you prefer your default ez-ipupdate configuration not to be managed for
 you, you may choose \"configure manually\".
 .
 Whatever your decision, you can later put as many additional configuration
 files in /etc/ez-ipupdate/ as you need.
";
$elem["ez-ipupdate/service_type"]["descriptionde"]="Zu benutzender Dynamischer DNS-Provider:
 ez-ipupdate unterstützt viele Dynamische DNS-Provider. Wenn die Standard-Konfiguration automatisch erstellt werden soll, dann wählen Sie hier den Provider aus, den Sie benutzen möchten. Das Benutzerkonto müssen Sie beim Provider Ihrer Wahl selbst einrichten.
 .
 Soll die Standard-Konfiguration von ez-ipupdate nicht automatisch verwaltet werden, dann wählen Sie bitte »manuell einrichten«.
 .
 Was auch immer Sie auswählen, Sie können später so viele zusätzliche Konfigurationen unter /etc/ez-ipupdate/ erstellen, wie Sie wollen.
";
$elem["ez-ipupdate/service_type"]["descriptionfr"]="Fournisseur de service de nom dynamique à utiliser :
 Il existe de nombreux fournisseurs de service de nom dynamique pris en charge par ez-ipupdate. Pour que votre configuration par défaut soit créée automatiquement, choisissez le vôtre ici. Vous devez configurer vous-même votre compte chez ce fournisseur.
 .
 Si vous préférez que la configuration par défaut d'ez-ipupdate ne soit pas gérée automatiquement, vous pouvez choisir « Configurer moi-même ».
 .
 Indépendamment de votre choix, vous pourrez ajouter ultérieurement, à votre convenance, des fichiers de configuration supplémentaires dans /etc/ez-ipupdate/.
";
$elem["ez-ipupdate/service_type"]["default"]="";
$elem["ez-ipupdate/ppp"]["type"]="boolean";
$elem["ez-ipupdate/ppp"]["description"]="Does this system use dialup PPP to connect to the internet?
 If you use dialup PPP to connect to the internet, then ez-ipupdate can
 be run to notify providers of your new address when ppp connects to the
 network. Otherwise it will run in the background, and scan for changes
 to your address while you are online.
";
$elem["ez-ipupdate/ppp"]["descriptionde"]="Verwendet dieser Rechner PPP um sich ins Internet einzuwählen?
 Wenn Sie PPP verwenden um sich ins Internet einzuwählen, dann kann ez-ipupdate so gestartet werden, dass es den Providern die neue IP-Adresse dann mitteilt, wenn sich ppp mit dem Internet verbindet. Ansonsten läuft ez-ipupdate im Hintergrund und überwacht Ihre IP-Adresse, während Sie online sind.
";
$elem["ez-ipupdate/ppp"]["descriptionfr"]="Votre système utilise-t-il une liaison téléphonique (PPP) pour se connecter à Internet ?
 Si vous utilisez une liaison téléphonique (PPP) pour vous connecter sur Internet, alors ez-ipupdate peut être lancé, une fois la connexion établie, pour communiquer au fournisseur de service votre nouvelle adresse. Sinon, il s'exécute en tâche de fond et surveille les modifications de votre adresse tant que vous êtes en ligne.
";
$elem["ez-ipupdate/ppp"]["default"]="false";
$elem["ez-ipupdate/server"]["type"]="string";
$elem["ez-ipupdate/server"]["description"]="Address for your Dynamic DNS server:
 The service type you selected requires a server address to connect to. You
 may specify either a full hostname or an IP address.
";
$elem["ez-ipupdate/server"]["descriptionde"]="Adresse für Ihren Dynamischen DNS-Server:
 Für den ausgewählten Service wird eine Server-Adresse benötigt, zu der eine Verbindung aufgebaut wird. Sie können entweder einen vollständigen Host-Namen oder eine IP-Adresse angeben.
";
$elem["ez-ipupdate/server"]["descriptionfr"]="Adresse de votre serveur de nom dynamique :
 Le type de service que vous avez choisi a besoin de l'adresse d'un serveur. Vous pouvez indiquer un nom d'hôte complètement qualifié ou une adresse IP.
";
$elem["ez-ipupdate/server"]["default"]="";
$elem["ez-ipupdate/username"]["type"]="string";
$elem["ez-ipupdate/username"]["description"]="Username for your Dynamic DNS account:
";
$elem["ez-ipupdate/username"]["descriptionde"]="Benutzername für Ihr Dynamisches DNS-Konto:
";
$elem["ez-ipupdate/username"]["descriptionfr"]="Identifiant de votre compte de service de nom dynamique :
";
$elem["ez-ipupdate/username"]["default"]="";
$elem["ez-ipupdate/password"]["type"]="password";
$elem["ez-ipupdate/password"]["description"]="Password for your Dynamic DNS account:
";
$elem["ez-ipupdate/password"]["descriptionde"]="Passwort für Ihr Dynamisches DNS-Konto:
";
$elem["ez-ipupdate/password"]["descriptionfr"]="Mot de passe de votre compte de service de nom dynamique :
";
$elem["ez-ipupdate/password"]["default"]="";
$elem["ez-ipupdate/interface"]["type"]="string";
$elem["ez-ipupdate/interface"]["description"]="Network interface to monitor:
 ez-ipupdate will monitor the chosen network interface for changes of IP
 address. It is not possible to automatically detect which interface should
 be monitored, so you must name the interface here.
";
$elem["ez-ipupdate/interface"]["descriptionde"]="Zu verwaltende Netzwerk-Schnittstelle:
 ez-ipupdate wird die ausgewählte Netzwerk-Schnittstelle auf Veränderungen der IP-Adresse beobachten. Es ist nicht möglich automatisch festzustellen, welche Schnittstelle beobachtet werden soll. Deshalb müssen Sie hier den Namen der Schnittstelle selbst angeben.
";
$elem["ez-ipupdate/interface"]["descriptionfr"]="Interface réseau à surveiller :
 Ez-ipupdate surveille les changements d'adresse IP sur une interface réseau. Cette interface ne peut pas être détectée automatiquement et vous devez donc la préciser ici.
";
$elem["ez-ipupdate/interface"]["default"]="eth0";
$elem["ez-ipupdate/hostname"]["type"]="string";
$elem["ez-ipupdate/hostname"]["description"]="Dynamic DNS hostname to keep updated:
";
$elem["ez-ipupdate/hostname"]["descriptionde"]="Zu aktualisierender Dynamischer DNS-Hostname:
";
$elem["ez-ipupdate/hostname"]["descriptionfr"]="Nom d'hôte dynamique à tenir à jour :
";
$elem["ez-ipupdate/hostname"]["default"]="";
$elem["ez-ipupdate/dns_wildcard"]["type"]="boolean";
$elem["ez-ipupdate/dns_wildcard"]["description"]="Enable DNS wildcards for your Dynamic DNS hostname?
 Many Dynamic DNS providers are capable of supporting \"wildcard\" DNS
 lookups. This means that for yourdomain, a lookup for anything.yourdomain
 will return an answer that points to yourdomain.
";
$elem["ez-ipupdate/dns_wildcard"]["descriptionde"]="DNS-Wildcards für Ihren Dynamischen DNS-Hostnamen aktivieren?
 Viele Dynamische DNS-Provider unterstützen DNS-Lookups mit Platzhaltern (»wildcards«). Das bedeutet: Haben Sie eine Domain namens »ihredomain«, dann werden Anfragen nach »irgendetwas.ihredomain« mit einer Antwort erwidert, die auf »ihredomain« verweist.
";
$elem["ez-ipupdate/dns_wildcard"]["descriptionfr"]="Faut-il activer les requêtes DNS génériques pour votre nom d'hôte dynamique ?
 De nombreux fournisseurs de service de nom dynamique gèrent les requêtes DNS génériques (« wildcard DNS »). Cela signifie qu'une requête pour « quelquechose.votredomaine.votrezone » sera résolue comme étant une requête vers « votredomaine.votrezone ».
";
$elem["ez-ipupdate/dns_wildcard"]["default"]="false";
$elem["ez-ipupdate/dns_mx"]["type"]="string";
$elem["ez-ipupdate/dns_mx"]["description"]="MX record to add:
 Many Dynamic DNS providers are capable of supporting MX records. If you
 want an MX record enabled for your domain, specify the content of that MX
 record here. If you do not want an MX record, leave it blank.
 .
 For further information on MX records, what they do, and how they are
 used, see your Dynamic DNS provider.
";
$elem["ez-ipupdate/dns_mx"]["descriptionde"]="Hinzuzufügender MX-Record:
 Viele Dynamische DNS-Provider unterstützen MX-Records. Wollen Sie für Ihre Domain einen MX-Record hinzufügen, dann geben Sie hier bitte den Inhalt des MX-Records an. Wollen Sie keinen MX-Record, dann lassen Sie das Feld frei.
 .
 Weitere Informationen über MX-Records, wofür sie gut sind, und wie sie verwendet werden, erfahren Sie von Ihrem Dynamischen DNS-Provider.
";
$elem["ez-ipupdate/dns_mx"]["descriptionfr"]="Enregistrement MX à ajouter :
 De nombreux fournisseurs de service de nom dynamique gèrent les enregistrements MX. Si vous souhaitez en activer un pour votre domaine, veuillez en indiquer le contenu ici. Si vous laissez ce champ vide, aucun enregistrement MX ne sera ajouté.
 .
 Pour plus d'informations sur les enregistrements MX et leur utilisation, veuillez consulter votre fournisseur de service de nom dynamique.
";
$elem["ez-ipupdate/dns_mx"]["default"]="";
PKG_OptionPageTail2($elem);
?>
