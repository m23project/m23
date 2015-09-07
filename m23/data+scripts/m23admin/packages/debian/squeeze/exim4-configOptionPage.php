<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("exim4-config");

$elem["exim4/dc_eximconfig_configtype"]["type"]="select";
$elem["exim4/dc_eximconfig_configtype"]["choices"][1]="internet site; mail is sent and received directly using SMTP";
$elem["exim4/dc_eximconfig_configtype"]["choices"][2]="mail sent by smarthost; received via SMTP or fetchmail";
$elem["exim4/dc_eximconfig_configtype"]["choices"][3]="mail sent by smarthost; no local mail";
$elem["exim4/dc_eximconfig_configtype"]["choices"][4]="local delivery only; not on a network";
$elem["exim4/dc_eximconfig_configtype"]["choicesde"][1]="Internet-Server; E-Mails werden direkt über SMTP verschickt und empfangen";
$elem["exim4/dc_eximconfig_configtype"]["choicesde"][2]="Versand über Sendezentrale (Smarthost); Empfang mit SMTP oder Fetchmail";
$elem["exim4/dc_eximconfig_configtype"]["choicesde"][3]="Versand über Sendezentrale (Smarthost); keine lokale E-Mail-Zustellung";
$elem["exim4/dc_eximconfig_configtype"]["choicesde"][4]="Nur lokale E-Mail-Zustellung; keine Netzwerkverbindung";
$elem["exim4/dc_eximconfig_configtype"]["choicesfr"][1]="Distribution directe par SMTP (site Internet)";
$elem["exim4/dc_eximconfig_configtype"]["choicesfr"][2]="Envoi via relais (« smarthost ») - réception SMTP ou fetchmail";
$elem["exim4/dc_eximconfig_configtype"]["choicesfr"][3]="Envoi via relais (« smarthost ») - pas de courrier local";
$elem["exim4/dc_eximconfig_configtype"]["choicesfr"][4]="Distribution locale seulement (pas de réseau)";
$elem["exim4/dc_eximconfig_configtype"]["description"]="General type of mail configuration:
 Please select the mail server configuration type that best meets your needs.
 .
 Systems with dynamic IP addresses, including dialup systems, should generally
 be configured to send outgoing mail to another machine, called a 'smarthost'
 for delivery because many receiving systems on the Internet block
 incoming mail from dynamic IP addresses as spam protection.
 .
 A system with a dynamic IP address can receive its own mail, or local
 delivery can be disabled entirely (except mail for root and postmaster).
";
$elem["exim4/dc_eximconfig_configtype"]["descriptionde"]="Generelle E-Mail-Einstellungen:
 Bitte wählen Sie die Einstellung des E-Mail-Servers, die Ihren Bedürfnissen am besten entspricht.
 .
 Systeme mit wechselnder IP-Adresse, einschließlich Systeme mit Einwahlzugängen, sollten ausgehende E-Mails immer an einen anderen Rechner, Sendezentrale (»Smarthost«) genannt, zum Versenden weitergeben, weil viele Empfänger im Internet ankommende E-Mails von wechselnden IP-Adressen zum Schutz vor unerwünschten E-Mails (Spam) ablehnen.
 .
 Ein System mit wechselnder IP-Adresse kann selbst E-Mails empfangen oder die lokale Zustellung kann abgeschaltet werden (außer E-Mails für die Benutzer root und postmaster).
";
$elem["exim4/dc_eximconfig_configtype"]["descriptionfr"]="Type de configuration :
 Veuillez choisir le type de configuration qui correspond le mieux à vos besoins.
 .
 Les systèmes utilisant des adresses IP dynamiques, notamment les systèmes connectés par intermittence, doivent le plus souvent être configurés pour envoyer les courriels sortants à une autre machine qui sert de relais (« smarthost »). Cette option est conseillée car de nombreux systèmes bloquent la réception des courriels envoyés par les systèmes utilisant une adresse dynamique (protection contre le « spam »).
 .
 Un système utilisant une adresse dynamique peut recevoir son propre courriel à moins que la réception locale ne soit totalement désactivée (à l'exception des courriels pour le superutilisateur ou pour « postmaster »).
";
$elem["exim4/dc_eximconfig_configtype"]["default"]="local delivery only; not on a network";
$elem["exim4/no_config"]["type"]="boolean";
$elem["exim4/no_config"]["description"]="Really leave the mail system unconfigured?
 Until the mail system is configured, it will be broken and cannot be
 used. Configuration at a later time can be done either by hand or by
 running 'dpkg-reconfigure exim4-config' as root.
";
$elem["exim4/no_config"]["descriptionde"]="Soll das E-Mail-System wirklich nicht eingerichtet werden?
 Das E-Mail-System ist nicht funktionsfähig, bis Sie es einrichten. Sie können Exim später manuell einrichten oder als Benutzer root den Befehl 'dpkg-reconfigure exim4-config' aufrufen.
";
$elem["exim4/no_config"]["descriptionfr"]="Faut-il vraiment laisser le serveur de courrier non configuré ?
 Tant qu'il ne sera pas configuré, votre serveur de courrier ne sera pas en état de fonctionner et sera inutilisable en l'état. Vous pouvez bien sûr le configurer vous-même plus tard ou utiliser la commande « dpkg-reconfigure exim4-config » avec les privilèges du superutilisateur.
";
$elem["exim4/no_config"]["default"]="true";
$elem["exim4/mailname"]["type"]="string";
$elem["exim4/mailname"]["description"]="System mail name:
 The 'mail name' is the domain name used to 'qualify' mail addresses
 without a domain name.
 .
 This name will also be used by other programs. It should be the
 single, fully qualified domain name (FQDN).
 .
 Thus, if a mail address on the local host is foo@example.org,
 the correct value for this option would be example.org.
 .
 This name won't appear on From: lines of outgoing messages if rewriting
 is enabled.
";
$elem["exim4/mailname"]["descriptionde"]="E-Mail-Name des Systems:
 Der »E-Mail-Name« ist der Domänenname, der für E-Mail-Adressen, die keinen Domänennamen haben, verwendet wird.
 .
 Dieser Name wird auch von anderen Programmen genutzt. Er sollte der eindeutige, vollqualifizierte Domänenname (FQDN) sein.
 .
 Wenn also foo@example.org eine E-Mail-Adresse auf dem lokalen Rechner ist, dann ist hier »example.org« richtig.
 .
 Dieser Name taucht nicht in der Absender-Zeile (From:) ausgehender E-Mails auf, wenn »Umschreiben« (rewriting) aktiviert wird.
";
$elem["exim4/mailname"]["descriptionfr"]="Nom de courriel du système :
 Le nom de courriel (« mail name ») est le nom de domaine qui sert à compléter les adresses électroniques qui n'en comportent pas.
 .
 Ce nom sera également utilisé par d'autres programmes ; il doit correspondre au domaine unique et complètement qualifié (FQDN).
 .
 Par exemple, si une adresse électronique locale est toto@example.org, la valeur appropriée pour cette option sera « example.org ».
 .
 Ce nom n'apparaîtra pas dans les en-têtes origines (« From: ») des courriels sortants si vous activez la réécriture.
";
$elem["exim4/mailname"]["default"]="";
$elem["exim4/dc_other_hostnames"]["type"]="string";
$elem["exim4/dc_other_hostnames"]["description"]="Other destinations for which mail is accepted:
 Please enter a semicolon-separated list of recipient domains for
 which this machine should consider itself the final destination.
 These domains are commonly called 'local domains'. The local hostname
 (${fqdn}) and 'localhost' are always added to the list given here.
 .
 By default all local domains will be treated identically. If both
 a.example and b.example are local domains, acc@a.example and
 acc@b.example will be delivered to the same final destination. If
 different domain names should be treated differently, it is
 necessary to edit the config files afterwards.
";
$elem["exim4/dc_other_hostnames"]["descriptionde"]="Weitere Ziele, für die E-Mails angenommen werden sollen:
 Bitte geben Sie eine durch Semikolon getrennte Liste der Empfänger-Domänen an, für die dieser Rechner das endgültige Ziel sein soll. Diese Domänen werden allgemein als »lokale Domänen« (local domains) bezeichnet. Der lokale Rechnername (${fqdn}) und »localhost« werden auch noch an die hier eingegebene Liste angehängt.
 .
 Laut Voreinstellung werden alle angeführten Domänen gleich behandelt. Wenn a.beispiel und b.beispiel lokale Domänen sind, werden E-Mails an acc@a.beispiel und acc@b.beispiel an dasselbe endgültige Ziel geschickt. Wenn unterschiedliche Domänen unterschiedlich behandelt werden sollen, müssen Sie die Konfigurationsdateien nachher selbst bearbeiten.
";
$elem["exim4/dc_other_hostnames"]["descriptionfr"]="Autres destinations dont le courriel doit être accepté :
 Veuillez indiquer une liste des domaines, séparés par des points-virgules, pour lesquels cette machine est la destination finale. Il est inutile de mentionner ici le nom d'hôte local (${fqdn}) ou « localhost ». Ces domaines sont usuellement appelés des domaines locaux.
 .
 Par défaut, tous les domaines seront traités à l'identique. Ainsi, si a.exemple et b.exemple sont des domaines locaux, acc@a.exemple et acc@b.exemple seront distribués au même destinataire. Si vous souhaitez traiter un domaine d'une manière différente, vous devrez modifier les fichiers de configuration ultérieurement.
";
$elem["exim4/dc_other_hostnames"]["default"]="";
$elem["exim4/dc_relay_domains"]["type"]="string";
$elem["exim4/dc_relay_domains"]["description"]="Domains to relay mail for:
 Please enter a semicolon-separated list of recipient domains for
 which this system will relay mail, for example as a fallback MX or
 mail gateway. This means that this system will accept mail for these
 domains from anywhere on the Internet and deliver them according to
 local delivery rules.
 .
 Do not mention local domains here. Wildcards may be used.
";
$elem["exim4/dc_relay_domains"]["descriptionde"]="Domänen, für die dieser Rechner E-Mails weiterleitet (Relay):
 Bitte geben Sie eine durch Semikolon getrennte Liste der Empfängerdomänen an, für die dieser Rechner E-Mails weiterleiten soll, z. B. als E-Mail-Server (MX) in Reserve oder E-Mail-Knoten. Das bedeutet, dass das System E-Mails für diese Domänen von überall aus dem Internet annimmt und anhand lokaler Regeln zustellt.
 .
 Geben Sie keine lokalen Domänen ein. Platzhalter können benutzt werden.
";
$elem["exim4/dc_relay_domains"]["descriptionfr"]="Domaines à relayer :
 Veuillez indiquer la liste des domaines pour qui ce système acceptera de relayer les courriels (par exemple en tant que serveur MX de secours ou en tant que passerelle de courriel). Le courriel destiné à ces domaines sera accepté quel que soit le système émetteur et sera distribué selon les règles locales de distribution.
 .
 Il n'est pas nécessaire de mentionner les domaines locaux ici. Des caractères joker peuvent être utilisés.
";
$elem["exim4/dc_relay_domains"]["default"]="";
$elem["exim4/dc_relay_nets"]["type"]="string";
$elem["exim4/dc_relay_nets"]["description"]="Machines to relay mail for:
 Please enter a semicolon-separated list of IP address ranges for
 which this system will unconditionally relay mail, functioning as a
 smarthost.
 .
 You should use the standard address/prefix format (e.g. 194.222.242.0/24
 or 5f03:1200:836f::/48).
 .
 If this system should not be a smarthost for any other host, leave
 this list blank.
";
$elem["exim4/dc_relay_nets"]["descriptionde"]="Rechner, für die E-Mails weitergeleitet werden (Relay):
 Bitte geben Sie eine durch Semikolon getrennte Liste der IP-Adressbereiche ein, für die das System E-Mails, in der Funktion einer Sendezentrale (Smarthost), bedingungslos weiterleiten soll.
 .
 Sie sollten das Standardformat »Adresse/Maske« (z. B. 194.222.242.0/24 oder 5f03:1200:836f::/48) verwenden.
 .
 Wenn das System nicht als Sendezentrale (Smarthost) für andere Rechner arbeiten soll, lassen Sie die Liste leer.
";
$elem["exim4/dc_relay_nets"]["descriptionfr"]="Machines à relayer :
 Veuillez indiquer une liste de plages d'adresses IP, séparées par des points-virgules, pour qui ce système acceptera de relayer le courriel sans discrimination (fonctionnement en « smarthost »).
 .
 Vous devez utiliser le format normalisé adresse/préfixe (p. ex. 194.222.242.0/24 ou 5f03:1200:836f::/48).
 .
 Si ce système ne doit pas être un « smarthost » pour d'autres systèmes, ce champ devrait être laissé vide.
";
$elem["exim4/dc_relay_nets"]["default"]="";
$elem["exim4/dc_readhost"]["type"]="string";
$elem["exim4/dc_readhost"]["description"]="Visible domain name for local users:
 The option to hide the local mail name in outgoing mail was enabled.
 It is therefore necessary to specify the domain name this system
 should use for the domain part of local users' sender addresses.
";
$elem["exim4/dc_readhost"]["descriptionde"]="Sichtbarer Domänenname für lokale Benutzer:
 Die Möglichkeit, den lokalen E-Mail-Namen in ausgehenden E-Mails zu verbergen, wurde ausgewählt. Deshalb ist es erforderlich, den Domänennamen anzugeben, den das System als Domänenteil der Absenderadresse lokaler Benutzer verwendet.
";
$elem["exim4/dc_readhost"]["descriptionfr"]="Nom de domaine visible pour les utilisateurs locaux :
 L'option permettant de cacher le nom local de courriel a été activée. Il est donc nécessaire d'indiquer le nom de domaine que ce système doit utiliser pour les envois de courriels des utilisateurs locaux.
";
$elem["exim4/dc_readhost"]["default"]="";
$elem["exim4/dc_smarthost"]["type"]="string";
$elem["exim4/dc_smarthost"]["description"]="IP address or host name of the outgoing smarthost:
 Please enter the IP address or the host name of a mail server that
 this system should use as outgoing smarthost. If the smarthost only
 accepts your mail on a port different from TCP/25, append two colons
 and the port number (for example smarthost.example::587 or
 192.168.254.254::2525). Colons in IPv6 addresses need to be doubled.
 .
 If the smarthost requires authentication, please refer to
 the Debian-specific README files in /usr/share/doc/exim4-base for
 notes about setting up SMTP authentication.
";
$elem["exim4/dc_smarthost"]["descriptionde"]="IP-Adresse oder Rechnername der Sendezentrale für ausgehende E-Mails:
 Bitte geben Sie die IP-Adresse oder den Rechnernamen eines E-Mail-Servers ein, den dieses System als ausgehende Sendezentrale (Smarthost) benutzen soll. Wenn die Sendezentrale Ihre E-Mails nur an einem anderen Port als TCP/25 annimmt, hängen Sie zwei Doppelpunkte und die Portnummer an (z. B. sendezentrale.beispiel::587 oder 192.168.254.254::2525). Die Doppelpunkte müssen in IPv6-Adressen verdoppelt werden.
 .
 Wenn die Sendezentrale eine Authentifizierung erfordert, finden Sie in den Debian-spezifischen README-Dateien im Verzeichnis /usr/share/doc/exim4-base Hinweise zum Einrichten der SMTP-Authentifizierung.
";
$elem["exim4/dc_smarthost"]["descriptionfr"]="Nom réseau ou adresse IP du système « smarthost » :
 Veuillez indiquer l'adresse IP ou le nom d'hôte du serveur qui sera le serveur de courriel sortant pour ce système (« smarthost »). Si ce serveur accepte les connexions sur un port différent du port TCP 25, veuillez l'indiquer avec deux caractères « deux-points » comme séparateurs, par exemple « smarthost.exemple::587 » ou « 192.168.254.254::2525. Les caractères « deux-points » dans les adresses IPv6 doivent être doublés.
 .
 Si le serveur « smarthost » impose une authentification vous devriez consulter les fichiers « README » dans /usr/share/doc/exim4-base pour plus d'informations sur l'authentification SMTP.
";
$elem["exim4/dc_smarthost"]["default"]="";
$elem["exim4/dc_postmaster"]["type"]="string";
$elem["exim4/dc_postmaster"]["description"]="Root and postmaster mail recipient:
 Mail for the 'postmaster', 'root', and other system accounts needs to
 be redirected to the user account of the actual system administrator.
 .
 If this value is left empty, such mail will be saved in /var/mail/mail,
 which is not recommended.
 .
 Note that postmaster's mail should be read on the system to which it is
 directed, rather than being forwarded elsewhere, so (at least one of)
 the users listed here should not redirect their mail off this machine.
 A 'real-' prefix can be used to force local delivery.
 .
 Multiple user names need to be separated by spaces.
";
$elem["exim4/dc_postmaster"]["descriptionde"]="Empfänger der E-Mails an die Benutzer root und postmaster:
 E-Mails an die Benutzer »postmaster«, »root« und andere Systembenutzer-Konten müssen an das Benutzerkonto des momentanen Systemadministrators umgeleitet werden.
 .
 Wenn dieser Wert leer bleibt, werden diese E-Mails im Verzeichnis /var/mail/mail abgelegt, was nicht zu empfehlen ist.
 .
 Beachten Sie, dass die E-Mails für »postmaster« lokal gelesen und nicht auf ein anderes System weitergeleitet werden sollten, daher sollten alle (oder mindestens einer) der angegebenen Benutzer seine bzw. ihre E-Mails nicht nach außerhalb weiterleiten. Verwenden Sie den Vorsatz »real-« um lokale Zustellung zu erzwingen.
 .
 Mehrere Benutzernamen müssen durch Leerzeichen getrennt werden.
";
$elem["exim4/dc_postmaster"]["descriptionfr"]="Destinataire des courriels de « root » et « postmaster » :
 Les courriels destinés au superutilisateur, à « postmaster » et aux autres comptes système doivent être redirigés vers le compte utilisateur de l'administrateur réel du système.
 .
 Si ce champ est laissé vide, ces courriels seront conservés dans /var/mail/mail, ce qui est déconseillé.
 .
 Les courriels destinés « postmaster » devraient généralement être lus sur le système local, plutôt que redirigés vers un autre système. En conséquence, au moins un des utilisateurs que vous indiquez ne devraient pas rediriger ses courriels vers une autre machine. Le préfixe « real- » peut être utilisé pour imposer la distribution locale.
 .
 Si vous indiquez plusieurs identifiants, veuillez les séparer par des espaces.
";
$elem["exim4/dc_postmaster"]["default"]="";
$elem["exim4/dc_local_interfaces"]["type"]="string";
$elem["exim4/dc_local_interfaces"]["description"]="IP-addresses to listen on for incoming SMTP connections:
 Please enter a semicolon-separated list of IP addresses. The Exim SMTP
 listener daemon will listen on all IP addresses listed here.
 .
 An empty value will cause Exim to listen for connections on all
 available network interfaces.
 .
 If this system only receives mail directly from local services
 (and not from other hosts), it is suggested to prohibit external
 connections to the local Exim daemon. Such services include e-mail
 programs (MUAs) which talk to localhost only as well as fetchmail.
 External connections are impossible when 127.0.0.1 is entered here,
 as this will disable listening on public network interfaces.
";
$elem["exim4/dc_local_interfaces"]["descriptionde"]="IP-Adressen, an denen eingehende SMTP-Verbindungen erwartet werden:
 Bitte geben Sie eine durch Semikolon getrennte Liste von IP-Adressen ein. Der SMTP-Empfangsdienst von Exim wird an allen aufgelisteten IP-Adressen auf eingehende SMTP-Verbindungen warten.
 .
 Wenn Sie die Liste leer lassen, wird Exim an allen verfügbaren Netzwerkschnittstellen auf eingehende SMTP-Verbindungen warten.
 .
 Wenn dieses System E-Mails nur direkt von lokalen Diensten (und nicht von anderen Rechnern) empfängt, sollten Sie Verbindungen externer Rechner zum lokalen Exim verhindern. Diese Dienste umfassen auch E-Mail-Programme (MUAs), die mit »localhost« kommunizieren, sowie Fetchmail. Externe Verbindungen sind nicht möglich, wenn Sie an dieser Stelle 127.0.0.1 eingeben, denn damit verhindern Sie, dass Exim an externen Netzwerkschnittstellen auf Verbindungen wartet.
";
$elem["exim4/dc_local_interfaces"]["descriptionfr"]="Liste d'adresses IP où Exim sera en attente de connexions SMTP entrantes :
 Veuillez indiquer une liste d'adresses IP, séparées par des points-virgules, où le serveur de courriel SMTP d'Exim sera à l'écoute.
 .
 Si vous laissez cette entrée vide, Exim sera à l'écoute sur toutes les interfaces réseau disponibles.
 .
 Si ce système ne reçoit du courrier que via des services locaux (et non d'autres hôtes), vous devriez interdire les connexions externes au démon d'Exim. Les services locaux incluent les programmes de courrier électronique (« Mail User Agents » ou MUA) ainsi que des programmes tels que fetchmail. La désactivation des connexions entrantes sur les interfaces réseau publiques peut se faire en indiquant 127.0.0.1 ici.
";
$elem["exim4/dc_local_interfaces"]["default"]="notset";
$elem["exim4/dc_minimaldns"]["type"]="boolean";
$elem["exim4/dc_minimaldns"]["description"]="Keep number of DNS-queries minimal (Dial-on-Demand)?
 In normal mode of operation Exim does DNS lookups at startup, and when
 receiving or delivering messages. This is for logging purposes and
 allows keeping down the number of hard-coded values in the
 configuration.
 .
 If this system does not have a DNS full service resolver available at
 all times (for example if its Internet access is a dial-up line using
 dial-on-demand), this might have unwanted consequences. For example,
 starting up Exim or running the queue (even with no messages waiting)
 might trigger a costly dial-up-event.
 .
 This option should be selected if this system is using Dial-on-Demand.
 If it has always-on Internet access, this option should be disabled.
";
$elem["exim4/dc_minimaldns"]["descriptionde"]="DNS-Anfragen minimieren (Automatische Einwahl,  Dial-on-Demand)?
 Normalerweise führt Exim beim Start, beim Empfangen oder beim Zustellen von Nachrichten DNS-Abfragen durch. Das geschieht für die Protokolldatei und um die Anzahl fest eingetragener Werte in den Einstellungen klein zu halten.
 .
 Wenn dieser Rechner keinen dauerhaften Zugang zu DNS-Servern hat (z. B. sich die Internetverbindung bei versuchtem Zugriff auf das Netz automatisch aufbaut (Dial-on-Demand)), kann das ungewollte Auswirkungen haben. Beispielsweise kann das Starten von Exim oder das Abarbeiten der Warteschlange (sogar, wenn diese leer ist) zu einer kostenpflichtigen Einwahl führen.
 .
 Sie sollten hier zustimmen, wenn Ihr System einen automatischen Verbindungsaufbau ins Internet benutzt. Wenn Sie eine ständige Internetverbindung haben, sollten Sie hier ablehnen.
";
$elem["exim4/dc_minimaldns"]["descriptionfr"]="Faut-il minimiser les requêtes DNS (connexions à la demande) ?
 En fonctionnement normal, Exim effectue des contrôles DNS au démarrage et lors de la réception ou de la distribution de messages. Cela est destiné à la journalisation et permet de minimiser le nombre de valeurs codées en dur dans le fichier de configuration.
 .
 Si cet hôte n'a pas de connexion permanente vers un serveur de noms, notamment s'il utilise des connexions à la demande, cela peut avoir des conséquences inattendues. Par exemple, le lancement d'Exim ou le traitement de la file d'attente (même sans messages en attente) générera de coûteuses connexions.
 .
 Cette option est conseillée pour les systèmes utilisant des connexions à la demande. Elle devrait être désactivée pour des systèmes disposant d'une connexion permanente.
";
$elem["exim4/dc_minimaldns"]["default"]="false";
$elem["exim4/exim4-config-title"]["type"]="title";
$elem["exim4/exim4-config-title"]["description"]="Mail Server configuration
";
$elem["exim4/exim4-config-title"]["descriptionde"]="Einrichten des E-Mail-Servers
";
$elem["exim4/exim4-config-title"]["descriptionfr"]="Configuration du serveur de courriel
";
$elem["exim4/exim4-config-title"]["default"]="";
$elem["exim4/use_split_config"]["type"]="boolean";
$elem["exim4/use_split_config"]["description"]="Split configuration into small files?
 The Debian exim4 packages can either use 'unsplit configuration', a
 single monolithic file (/etc/exim4/exim4.conf.template) or 'split
 configuration', where the actual Exim configuration files are built
 from about 50 smaller files in /etc/exim4/conf.d/.
 .
 Unsplit configuration is better suited for large modifications and is
 generally more stable, whereas split configuration offers a comfortable
 way to make smaller modifications but is more fragile and might break
 if modified carelessly.
 .
 A more detailed discussion of split and unsplit configuration can be
 found in the Debian-specific README files in /usr/share/doc/exim4-base.
";
$elem["exim4/use_split_config"]["descriptionde"]="Einstellungen auf kleine Dateien aufteilen?
 Die Debian-Exim4-Pakete können entweder »zusammenhängende Einstellungen« in einer großen Datei (/etc/exim4/exim4.conf.template) oder »aufgeteilte Einstellungen« verwenden, bei denen die aktuellen Exim-Einstellungen aus rund 50 kleinen Dateien im Verzeichnis /etc/exim4/conf.d/ zusammengesetzt werden.
 .
 Zusammenhängende Einstellungen eignen sich besser für größere Modifikationen und sind grundsätzlich robuster, während aufgeteilte Einstellungen es ermöglichen, mit geringem Aufwand kleine Änderungen vorzunehmen. Das ist allerdings auch anfälliger und könnte bei nicht sorgfältigen Änderungen nicht mehr funktionieren.
 .
 Eine ausführlichere Gegenüberstellung der zusammenhängenden und aufgeteilten Einstellungen finden Sie in den Debian-spezifischen README-Dateien im Verzeichnis /usr/share/doc/exim4-base.
";
$elem["exim4/use_split_config"]["descriptionfr"]="Faut-il séparer la configuration dans plusieurs fichiers ?
 Les paquets d'Exim 4 peuvent utiliser soit un fichier monolithique (/etc/exim4/exim4.conf.template), soit un nombre important de petits fichiers dans /etc/exim4/conf.d/ pour créer la configuration finale.
 .
 Une configuration en un seul fichier est plus adaptée aux modifications importantes et est généralement plus stable alors qu'une configuration éclatée se prête mieux aux petites modifications mais est plus fragile surtout si elle est modifiée sans précautions.
 .
 Des explications plus détaillées sur les deux types de fonctionnement peuvent être trouvées dans les fichiers README spécifiques à la distribution, placés dans /usr/share/doc/exim4-base/.
";
$elem["exim4/use_split_config"]["default"]="";
$elem["exim4/hide_mailname"]["type"]="boolean";
$elem["exim4/hide_mailname"]["description"]="Hide local mail name in outgoing mail?
 The headers of outgoing mail can be rewritten to make it appear to have been
 generated on a different system. If this option is chosen,
 '${mailname}', 'localhost' and '${dc_other_hostnames}' in From, Reply-To,
 Sender and Return-Path are rewritten.
";
$elem["exim4/hide_mailname"]["descriptionde"]="Lokalen E-Mail-Namen in ausgehenden E-Mails verbergen?
 Die Kopfzeilen ausgehender E-Mails können umgeschrieben werden, so dass es scheint, als ob sie auf einem anderen Rechner erstellt wurden. Wenn Sie hier zustimmen, werden »${mailname}«, »localhost« und »${dc_other_hostnames}« in den Zeilen From, Reply-To, Sender und Return-Path ersetzt.
";
$elem["exim4/hide_mailname"]["descriptionfr"]="Faut-il cacher le nom local de courriel dans les courriels sortants ?
 Les en-têtes des courriels sortants peuvent être réécrits afin qu'ils semblent avoir été émis depuis un autre système : « ${mailname} », « localhost » et « ${dc_other_hostnames} » seront alors remplacés dans les en-têtes « From: », « Reply-To: », « Sender: » et « Return-Path: ».
";
$elem["exim4/hide_mailname"]["default"]="";
$elem["exim4/dc_localdelivery"]["type"]="select";
$elem["exim4/dc_localdelivery"]["choices"][1]="mbox format in /var/mail/";
$elem["exim4/dc_localdelivery"]["choicesde"][1]="Mbox-Format in /var/mail/";
$elem["exim4/dc_localdelivery"]["choicesfr"][1]="Format « mbox » dans /var/mail";
$elem["exim4/dc_localdelivery"]["description"]="Delivery method for local mail:
 Exim is able to store locally delivered email in different formats.
 The most commonly used ones are mbox and Maildir. mbox uses a single
 file for the complete mail folder stored in /var/mail/. With Maildir
 format every single message is stored in a separate file in ~/Maildir/.
 .
 Please note that most mail tools in Debian expect the local delivery
 method to be mbox in their default.
";
$elem["exim4/dc_localdelivery"]["descriptionde"]="Versandart bei lokaler E-Mail-Zustellung:
 Exim kann lokal zugestellte E-Mails in verschiedenen Formaten abspeichern. Am häufigsten werden Mbox und Maildir benutzt. Mbox speichert den gesamten E-Mail-Ordner in einer Datei im Verzeichnis /var/mail/. Beim Format Maildir wird jede einzelne E-Mail in einer eigenen Datei im Verzeichnis ~/Maildir/ abgelegt.
 .
 Bitte beachten Sie, dass die meisten E-Mail-Programme in Debian das Format Mbox als Standardeinstellung für lokale E-Mail-Zustellung erwarten.
";
$elem["exim4/dc_localdelivery"]["descriptionfr"]="Méthode de distribution du courrier local :
 Exim peut conserver les courriels distribués localement dans différents formats. Les plus courants sont les formats « mbox » et « Maildir ». Le format « mbox » utilise un seul fichier pour le dossier des courriels, dans /var/mail. Avec le format « Maildir », chaque message est stocké sous forme d'un fichier dans le répertoire ~/Maildir.
 .
 Veuillez noter que la plupart des outils de traitement du courriel utilisent le format « mbox » par défaut.
";
$elem["exim4/dc_localdelivery"]["default"]="mbox format in /var/mail/";
PKG_OptionPageTail2($elem);
?>
