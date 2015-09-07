<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("postfix");

$elem["postfix/mydomain_warning"]["type"]="boolean";
$elem["postfix/mydomain_warning"]["description"]="Add a 'mydomain' entry in main.cf for upgrade?
 Postfix version 2.3.3-2 and later require changes in main.cf.
 Specifically, mydomain must be specified, since hostname(1) is not
 a fully qualified domain name (FQDN).
 .
 Failure to fix this will result in a broken mailer. Decline this option
 to abort the upgrade, giving you the opportunity to add this configuration
 yourself. Accept this option to automatically set mydomain based on the
 FQDN of the machine.
";
$elem["postfix/mydomain_warning"]["descriptionde"]="Einen »mydomain«-Eintrag in main.cf beim Upgrade hinzufügen?
 Postfix, Version 2.3.3-2 und neuer, benötigt Änderungen in der main.cf. Insbesondere muss »mydomain« angegeben werden, da hostname(1) kein voll-qualifizierter Domain-Name (FQDN) ist.
 .
 Wenn Sie dies nicht korrigieren, wird Ihr E-Mail-Server unbrauchbar. Verneinen Sie, um das Upgrade abzubrechen und diese Änderung selbst vorzunehmen. Akzeptieren Sie, um, basierend auf dem FQDN, mydomain automatisch zu setzen.
";
$elem["postfix/mydomain_warning"]["descriptionfr"]="Faut-il ajouter une entrée « mydomain » dans main.cf pour la mise à jour ?
 À partir de la version 2.3.3-2, Postfix nécessite des modifications du fichier main.cf. En particulier, « mydomain » doit être indiqué puisque hostname(1) n'est pas un nom de domaine complètement qualifié (FQDN).
 .
 Si vous ne faites pas cette correction, le serveur de courriels ne fonctionnera pas. Si vous refusez cette option, la mise à jour sera interrompue, ce qui vous donnera l'occasion de faire vous-même cette configuration. Choisissez cette option pour définir automatiquement « mydomain » en fonction du nom de domaine complètement qualifié de la machine.
";
$elem["postfix/mydomain_warning"]["default"]="";
$elem["postfix/kernel_version_warning"]["type"]="boolean";
$elem["postfix/kernel_version_warning"]["description"]="Install postfix despite an unsupported kernel?
 Postfix uses features that are not found in kernels prior to 2.6. If you
 proceed with the installation, Postfix will not run.
";
$elem["postfix/kernel_version_warning"]["descriptionde"]="Postfix trotz eines nicht-unterstützten Kernels installieren?
 Postfix verwendet Funktionen, die nicht in Kerneln von 2.6 gefunden werden können. Falls Sie mit der Installation fortfahren, wird Postfix nicht funktionieren.
";
$elem["postfix/kernel_version_warning"]["descriptionfr"]="Faut-il installer postfix malgré l'incompatibilité du noyau ?
 Postfix utilise des fonctionnalités indisponibles avant la version 2.6 du noyau. Si vous poursuivez l'installation, Postfix ne fonctionnera pas.
";
$elem["postfix/kernel_version_warning"]["default"]="";
$elem["postfix/retry_upgrade_warning"]["type"]="boolean";
$elem["postfix/retry_upgrade_warning"]["description"]="Correct retry entry in master.cf for upgrade?
 Postfix version 2.4 requires that the retry service be added to master.cf.
 .
 Failure to fix this will result in a broken mailer. Decline this option
 to abort the upgrade, giving you the opportunity to add this configuration
 yourself. Accept this option to automatically make master.cf compatible
 with Postfix 2.4 in this respect.
";
$elem["postfix/retry_upgrade_warning"]["descriptionde"]="Möchten Sie den retry-Eintrag in master.cf für ein Upgrade korrigieren?
 Version 2.4 von Postfix verlangt, dass der »retry«-Dienst zu der master.cf hinzugefügt wird.
 .
 Falls Sie dies nicht korrigieren, wird Ihr E-Mail-Server unbrauchbar. Verneinen Sie, um das Upgrade abzubrechen und diese Änderung selbst vorzunehmen. Akzeptieren Sie, um die Datei master.cf in dieser Hinsicht automatisch in ein zu Postfix 2.4 kompatibles Format zu bringen.
";
$elem["postfix/retry_upgrade_warning"]["descriptionfr"]="Faut-il corriger l'entrée « retry » dans le fichier master.cf ?
 La version 2.4 de Postfix nécessite que le service « retry » soit ajouté au fichier master.cf.
 .
 Si cette correction n'est pas effectuée, le serveur de courriels ne fonctionnera pas. Si vous refusez cette option, la mise à jour sera interrompue, ce qui vous donnera l'occasion d'ajouter vous-même cette configuration. Si vous la choisissez, le fichier master.cf sera rendu compatible avec la version 2.4 de Postfix.
";
$elem["postfix/retry_upgrade_warning"]["default"]="";
$elem["postfix/tlsmgr_upgrade_warning"]["type"]="boolean";
$elem["postfix/tlsmgr_upgrade_warning"]["description"]="Correct tlsmgr entry in master.cf for upgrade?
 Postfix version 2.2 has changed the invocation of tlsmgr.
 .
 Failure to fix this will result in a broken mailer. Decline this option
 to abort the upgrade, giving you the opportunity to add this configuration
 yourself. Accept this option to automatically make master.cf compatible
 with Postfix 2.2 in this respect.
";
$elem["postfix/tlsmgr_upgrade_warning"]["descriptionde"]="Möchten Sie den tlsmgr-Eintrag in master.cf für ein Upgrade korrigieren?
 Postfix hat in Version 2.2 den Aufruf von tlsmgr geändert.
 .
 Wenn Sie dies nicht korrigieren, wird Ihr E-Mail-Server unbrauchbar. Verneinen Sie, um das Upgrade abzubrechen und diese Änderung selbst vorzunehmen. Akzeptieren Sie, um die Datei master.cf in dieser Hinsicht automatisch in ein zu Postfix 2.2 kompatibles Format zu bringen.
";
$elem["postfix/tlsmgr_upgrade_warning"]["descriptionfr"]="Faut-il corriger l'entrée « tlsmgr » dans le fichier master.cf ?
 L'appel de tlsmgr a été modifié avec la version 2.2.
 .
 Si cette correction n'est pas effectuée, le serveur de courriels ne fonctionnera pas. Si vous refusez cette option, la mise à jour sera interrompue, ce qui vous donnera l'occasion de faire vous-même cette configuration. Si vous la choisissez, le fichier master.cf sera rendu compatible avec la version 2.2 de Postfix.
";
$elem["postfix/tlsmgr_upgrade_warning"]["default"]="";
$elem["postfix/rfc1035_violation"]["type"]="boolean";
$elem["postfix/rfc1035_violation"]["description"]="Ignore incorrect hostname entry?
 The string '${enteredstring}' does not follow RFC 1035 and does not
 appear to be a valid IP address.
 .
 RFC 1035 states that 'each component must start with an alphanum, end with
 an alphanum and contain only alphanums and hyphens. Components must be
 separated by full stops.'
 .
 Please choose whether you want to keep that choice anyway.
";
$elem["postfix/rfc1035_violation"]["descriptionde"]="Fehlerhaften Hostnamen-Eintrag ignorieren?
 Die Zeichenkette »${enteredstring}« entspricht nicht RFC 1035 und scheint keine gültige IP-Adresse zu sein.
 .
 RFC 1035 fordert, dass »jede Komponente mit einem alphanumerischen Zeichen beginnen und enden muss und ansonsten auch nur aus alphanumerischen Zeichen und Bindestrichen bestehen darf. Alle Komponenten müssen jeweils durch einen Punkt getrennt werden«.
 .
 Bitte wählen Sie, ob Sie diese Auswahl trotzdem beibehalten wollen.
";
$elem["postfix/rfc1035_violation"]["descriptionfr"]="Faut-il ignorer un nom d'hôte erroné ?
 La chaîne « ${enteredstring} » ne respecte pas la RFC 1035 et ne semble pas être une adresse IP valable.
 .
 La RFC 1035 stipule : « Chaque élément doit commencer par un caractère alphanumérique, se terminer par un caractère alphanumérique et ne contenir que des caractères alphanumériques et des traits d'union. Les éléments doivent être séparés par des points. »
 .
 Veuillez indiquer si vous souhaitez conserver ce choix malgré tout.
";
$elem["postfix/rfc1035_violation"]["default"]="false";
$elem["postfix/main_mailer_type"]["type"]="select";
$elem["postfix/main_mailer_type"]["choices"][1]="No configuration";
$elem["postfix/main_mailer_type"]["choices"][2]="Internet Site";
$elem["postfix/main_mailer_type"]["choices"][3]="Internet with smarthost";
$elem["postfix/main_mailer_type"]["choices"][4]="Satellite system";
$elem["postfix/main_mailer_type"]["choicesde"][1]="Keine Konfiguration";
$elem["postfix/main_mailer_type"]["choicesde"][2]="Internet-Site";
$elem["postfix/main_mailer_type"]["choicesde"][3]="Internet mit Smarthost";
$elem["postfix/main_mailer_type"]["choicesde"][4]="Satellitensystem";
$elem["postfix/main_mailer_type"]["choicesfr"][1]="Pas de configuration";
$elem["postfix/main_mailer_type"]["choicesfr"][2]="Site Internet";
$elem["postfix/main_mailer_type"]["choicesfr"][3]="Internet avec un « smarthost »";
$elem["postfix/main_mailer_type"]["choicesfr"][4]="Système satellite";
$elem["postfix/main_mailer_type"]["description"]="General type of mail configuration:
 Please select the mail server configuration type that best meets your needs.
 .
  No configuration:
   Should be chosen to leave the current configuration unchanged.
  Internet site:
   Mail is sent and received directly using SMTP.
  Internet with smarthost:
   Mail is received directly using SMTP or by running a utility such
   as fetchmail. Outgoing mail is sent using a smarthost.
  Satellite system:
   All mail is sent to another machine, called a 'smarthost', for delivery.
  Local only:
   The only delivered mail is the mail for local users. There is no network.
";
$elem["postfix/main_mailer_type"]["descriptionde"]="Allgemeine Art der Konfiguration:
 Bitte wählen Sie die E-Mail-Server-Konfiguration aus, die am besten auf Ihre Bedürfnisse passt.
 .
 Keine Konfiguration:
  Sollte ausgewählt werden, um die aktuelle Konfiguration unverändert zu
  behalten.
 Internet-Site:
  E-Mail wird direkt via SMTP versandt und empfangen.
 Internet mit Smarthost:
  E-Mail wird direkt mittels SMTP oder über ein Hilfswerkzeug wie Fetchmail
  empfangen. Ausgehende E-Mail wird über einen Smarthost versandt.
 Satellitensystem:
  Alle E-Mails werden über eine andere Maschine, genannt »Smarthost«, für die Zustellung versandt.
 Nur lokale:
  Es wird nur E-Mail für lokale Benutzer zugestellt. Es gibt kein Netz.
";
$elem["postfix/main_mailer_type"]["descriptionfr"]="Configuration type du serveur de messagerie :
 Veuillez choisir la configuration type de votre serveur de messagerie la plus adaptée à vos besoins.
 .
  Pas de configuration :
   Devrait être choisi pour laisser la configuration actuelle inchangée.
  Site Internet :
   L'envoi et la réception s'effectuent directement en SMTP.
  Site Internet avec un smarthost :
   Les messages sont reçus directement en SMTP ou grâce à un utilitaire comme fechtmail. Les messages sortants sont envoyés en utilisant un smarthost.
  Système satellite :
   Tous les messages sont envoyés vers une autre machine, nommée un smarthost.
 Local uniquement :
   Le seul courrier géré est le courrier pour les utilisateurs locaux. Il n'y a pas de mise en réseau.
";
$elem["postfix/main_mailer_type"]["default"]="Internet Site";
$elem["postfix/not_configured"]["type"]="error";
$elem["postfix/not_configured"]["description"]="Postfix not configured
 You have chosen 'No Configuration'. Postfix will not be configured and
 will not be started by default. Please run 'dpkg-reconfigure postfix' at
 a later date, or configure it yourself by:
  - Editing /etc/postfix/main.cf to your liking; 
  - Running '/etc/init.d/postfix start'.
";
$elem["postfix/not_configured"]["descriptionde"]="Postfix ist nicht konfiguriert
 Sie haben »Keine Konfiguration« gewählt. Postfix wird nicht konfiguriert oder automatisch gestartet. Rufen Sie bitte »dpkg-reconfigure postfix« zu einem späteren Zeitpunkt auf oder konfigurieren Sie Postfix manuell wie folgt:
  - Bearbeiten Sie /etc/postfix/main.cf nach Ihrem Geschmack;
  - Führen Sie »/etc/init.d/postfix start« aus.
";
$elem["postfix/not_configured"]["descriptionfr"]="Postfix non configuré
 Vous avez choisi l'option « Pas de configuration ». Postfix ne sera ni configuré ni lancé. Vous pourrez plus tard exécuter « dpkg-reconfigure postfix » ou configurer Postfix vous-même de la façon suivante :
  - éditer /etc/postfix/main.cf à votre convenance ;
  - exécuter /etc/init.d/postfix start.
";
$elem["postfix/not_configured"]["default"]="";
$elem["postfix/mailname"]["type"]="string";
$elem["postfix/mailname"]["description"]="System mail name:
 The \"mail name\" is the domain name used to \"qualify\" _ALL_ mail addresses
 without a domain name. This includes mail to and from <root>: please do not
 make your machine send out mail from root@example.org unless root@example.org
 has told you to.
 .
 This name will also be used by other programs. It should be the
 single, fully qualified domain name (FQDN).
 .
 Thus, if a mail address on the local host is foo@example.org,
 the correct value for this option would be example.org.
 .
";
$elem["postfix/mailname"]["descriptionde"]="System-E-Mail-Name:
 Der »E-Mail-Name« ist der Domainname, der zur genauen Bestimmung von E-Mail-Adressen ohne Domainname verwendet wird. Darunter fallen E-Mails von und an <root>: Bitte lassen Sie Ihre Maschine keine E-Mails von root@example.org versenden, solange Ihnen das nicht root@example.org gesagt hat.
 .
 Dieser Name wird auch von anderen Programmen außer Postfix genutzt, es sollte dies der eindeutige voll-qualifizierte Domainname (FQDN) sein.
 .
 Falls eine E-Mail-Adresse auf der lokalen Maschine »foo@example.org« lautet, beträgt der korrekte Wert für diese Option »example.org«.
";
$elem["postfix/mailname"]["descriptionfr"]="Nom de courrier :
 Le « nom de courrier » est le nom employé pour qualifier toutes les adresses n'ayant pas de nom de domaine. Cela inclut les courriels de et vers l'adresse du superutilisateur (root). Il est donc conseillé de veiller à éviter d'envoyer des courriels en tant que « root@example.org ».
 .
 D'autres programmes se servent de ce nom ; il doit correspondre au domaine unique et complètement qualifié (FQDN) d'où le courrier semblera provenir.
 .
 Ainsi, si une adresse provenant de l'hôte local est foo@example.org, la valeur correcte pour cette option serait example.org.
";
$elem["postfix/mailname"]["default"]="/etc/mailname";
$elem["postfix/destinations"]["type"]="string";
$elem["postfix/destinations"]["description"]="Other destinations to accept mail for (blank for none):
 Please give a comma-separated list of domains for which this machine
 should consider itself the final destination. If this is a mail
 domain gateway, you probably want to include the top-level domain.
";
$elem["postfix/destinations"]["descriptionde"]="keine):
 Bitte spezifizieren Sie bitte eine durch Kommata getrennte Liste der Rechner, für die dieser Rechner sich als Zielsystem betrachten soll. Ist dieser Rechner für eine gesamte E-Mail-Domain zuständig (»gateway«), sollten Sie wahrscheinlich die Top-Level-Domain (TLD) hinzufügen.
";
$elem["postfix/destinations"]["descriptionfr"]="Autres destinations pour lesquelles le courrier sera accepté (champ vide autorisé) :
 Veuillez indiquer une liste des domaines, séparés par des virgules, que cette machine reconnaîtra comme lui appartenant. Si la machine est un serveur de courriels, il est conseillé d'inclure le domaine de plus haut niveau.
";
$elem["postfix/destinations"]["default"]="";
$elem["postfix/relayhost"]["type"]="string";
$elem["postfix/relayhost"]["description"]="SMTP relay host (blank for none):
 Please specify a domain, host, host:port, [address] or
 [address]:port. Use the form [destination] to turn off MX lookups.
 Leave this blank for no relay host.
 .
 Do not specify more than one host.
 .
 The relayhost parameter specifies the default host to send mail to when no
 entry is matched in the optional transport(5) table. When no relay host is
 given, mail is routed directly to the destination.
";
$elem["postfix/relayhost"]["descriptionde"]="keiner):
 Geben Sie bitte eine Domain, Host, Host:Port, [Adresse] oder [Adresse]:Port an. Nutzen Sie die Form [Ziel], um MX-Abfragen zu verhindern. Lassen Sie dieses Feld leer, falls Sie keinen Relay-Server angeben möchten.
 .
 Geben Sie nicht mehr als einen Rechner an.
 .
 Der »relayhost«-Parameter gibt den Rechner an, zu dem standardmäßig E-Mail versandt wird, falls ein Eintrag in der optionalen transport(5)-Tabelle zutrifft. Falls kein »relay host« angegeben wird, wird E-Mail direkt zu dem Ziel durchgestellt.
";
$elem["postfix/relayhost"]["descriptionfr"]="Serveur relais SMTP (vide pour aucun) :
 Veuillez indiquer un domaine, une machine hôte, machine_hôte:port, [adresse] ou [adresse:port]. Utilisez la forme [destination] pour désactiver la recherche de MX (Mail eXchange). Laissez ce champ vide s'il n'existe pas de serveur relais.
 .
 Vous ne pouvez pas indiquer plus d'un hôte.
 .
 Ce paramètre indique le serveur vers lequel sera envoyé le courrier quand aucune entrée correspondante n'existe dans la table optionnelle de transport(5). Quand aucun serveur relais n'est donné, le courrier est routé directement vers sa destination.
";
$elem["postfix/relayhost"]["default"]="";
$elem["postfix/procmail"]["type"]="boolean";
$elem["postfix/procmail"]["description"]="Use procmail for local delivery?
 Please choose whether you want to use procmail to deliver local mail.
 .
 Note that if you use procmail to deliver mail system-wide, you should set
 up an alias that forwards mail for root to a real user.
";
$elem["postfix/procmail"]["descriptionde"]="Möchten Sie Procmail zur lokalen E-Mail-Zustellung nutzen?
 Bitte wählen Sie aus, ob Sie Procmail zur Zustellung lokaler E-Mail verwenden wollen.
 .
 Beachten Sie, dass bei systemweiter E-Mail-Zustellung mittels Procmail ein Alias genutzt werden sollte, um an root adressierte E-Mails an einen normalen Benutzer weiterzuleiten.
";
$elem["postfix/procmail"]["descriptionfr"]="Faut-il utiliser procmail pour la distribution locale ?
 Veuillez choisir si vous souhaitez utiliser procmail pour la distribution locale.
 .
 Si vous choisissez cette option, vous devriez créer un alias, pointant sur un utilisateur réel, vers lequel faire suivre le courrier de l'utilisateur root.
";
$elem["postfix/procmail"]["default"]="";
$elem["postfix/protocols"]["type"]="select";
$elem["postfix/protocols"]["choices"][1]="all";
$elem["postfix/protocols"]["choices"][2]="ipv6";
$elem["postfix/protocols"]["choicesde"][1]="alle";
$elem["postfix/protocols"]["choicesde"][2]="ipv6";
$elem["postfix/protocols"]["choicesfr"][1]="tous";
$elem["postfix/protocols"]["choicesfr"][2]="ipv6";
$elem["postfix/protocols"]["description"]="Internet protocols to use:
 By default, whichever Internet protocols are enabled on the system at
 installation time will be used. You may override this default with any
 of the following:
 .
  all : use both IPv4 and IPv6 addresses;
  ipv6: listen only on IPv6 addresses;
  ipv4: listen only on IPv4 addresses.
";
$elem["postfix/protocols"]["descriptionde"]="Zu verwendende Internet-Protokolle:
 Standardmäßig werden alle Internet-Protokolle verwendet, die bei der Installation auf dem System aktiviert sind. Sie können diese Standardeinstellung mit einem der Folgenden überschreiben:
 .
  alle: sowohl IPv4- als auch IPv6-Addressen verwenden;
  ipv6: nur auf IPv6-Adressen auf Nachrichten warten;
  ipv4: nur auf IPv4-Adressen auf Nachrichten warten.
";
$elem["postfix/protocols"]["descriptionfr"]="Protocoles internet à utiliser :
 Par défaut, Postfix utilise tous les protocoles internet actifs sur le système. Vous pouvez annuler ce comportement avec les valeurs suivantes :
 .
  tous : utilisation des adresses IPv4 et IPv6 ;
  ipv6 : écoute uniquement les adresses IPv6 ;
  ipv4 : écoute uniquement les adresses IPv4.
";
$elem["postfix/protocols"]["default"]="";
$elem["postfix/recipient_delim"]["type"]="string";
$elem["postfix/recipient_delim"]["description"]="Local address extension character:
 Please choose the character that will be used to define a local address
 extension.
 .
 To not use address extensions, leave the string blank.
";
$elem["postfix/recipient_delim"]["descriptionde"]="Zeichen für lokale Adress-Erweiterung:
 Bitte geben Sie das Zeichen an, dass zur Definition der lokalen Adress-Erweiterung verwendet wird.
 .
 Lassen Sie die Eingabe leer, wenn Sie keine Adress-Erweiterungen nutzen möchten.
";
$elem["postfix/recipient_delim"]["descriptionfr"]="Caractère d'extension des adresses locales :
 Veuillez choisir le caractère définissant une extension d'adresse locale.
 .
 Pour ne pas utiliser d'extension pour les adresses locales, laissez le champ vide.
";
$elem["postfix/recipient_delim"]["default"]="+";
$elem["postfix/bad_recipient_delimiter"]["type"]="error";
$elem["postfix/bad_recipient_delimiter"]["description"]="Bad recipient delimiter
 The recipient delimiter must be a single character. '${enteredstring}'
 is what you entered.
";
$elem["postfix/bad_recipient_delimiter"]["descriptionde"]="Ungültiges Adress-Trennzeichen
 Das Adress-Trennzeichen muss ein einzelnes Zeichen sein. Sie haben »${enteredstring}« eingegeben.
";
$elem["postfix/bad_recipient_delimiter"]["descriptionfr"]="Mauvais délimiteur du destinataire
 Le délimiteur du destinataire ne doit comporter qu'un seul caractère. Vous avez saisi « ${enteredstring} ».
";
$elem["postfix/bad_recipient_delimiter"]["default"]="";
$elem["postfix/chattr"]["type"]="boolean";
$elem["postfix/chattr"]["description"]="Force synchronous updates on mail queue?
 If synchronous updates are forced, then mail is processed more slowly.
 If not forced, then there is a remote chance of losing some mail if
 the system crashes at an inopportune time, and you are not using a
 journaled filesystem (such as ext3).
";
$elem["postfix/chattr"]["descriptionde"]="Synchrone Aktualisierungen der E-Mail-Warteschlange erzwingen?
 Falls synchrone Aktualisierungen erzwungen werden, wird die E-Mail langsamer verarbeitet. Falls diese nicht erzwungen werden, dann gibt es eine entfernte Möglichkeit, dass bei einem System-Absturz zu einem unglücklichen Zeitpunkt E-Mails verloren gehen, falls Sie kein Dateisystem mit Journal verwenden (wie ext3).
";
$elem["postfix/chattr"]["descriptionfr"]="Faut-il forcer des mises à jour synchronisées de la file d'attente des courriels ?
 Lorsque les mises à jour synchronisées sont imposées, l'envoi des courriels se fait plus lentement. Dans le cas contraire, des courriels risquent d'être perdus si le système s'arrête inopinément et si vous n'utilisez pas un système de fichiers journalisé, comme ext3.
";
$elem["postfix/chattr"]["default"]="false";
$elem["postfix/mynetworks"]["type"]="string";
$elem["postfix/mynetworks"]["description"]="Local networks:
 Please specify the network blocks for which this host should relay mail.
 The default is just the local host, which is needed by some mail user agents.
 The default includes local host for both IPv4 and IPv6. If just connecting
 via one IP version, the unused value(s) may be removed.
 .
 If this host is a smarthost for a block of machines, you need to specify the
 netblocks here, or mail will be rejected rather than relayed.
 .
 To use the postfix default (which is based on the connected subnets), leave
 this blank.
";
$elem["postfix/mynetworks"]["descriptionde"]="Lokale Netze:
 Bitte geben Sie an, für welche Teilnetze dieser Rechner E-Mails weiterleiten soll. Standardmäßig ist dies nur der lokale Rechner, da dies für einige E-Mail-Programme benötigt wird. Im Standard sind der lokale Rechner sowohl mit IPv4 als auch IPv6 enthalten. Falls nur mit einer IP-Version angebunden wird, können die unbenutze(n) Wert(e) entfernt werden.
 .
 Falls dieser Rechner ein Smarthost für ein Teilnetz anderer Rechner ist, müssen diese Teilnetze hier spezifiziert werden, ansonsten werden weiterzuleitende E-Mails abgewiesen.
 .
 Um die Standardeinstellung von Postfix zu verwenden (die von den angebundenen Netzen abhängt), lassen Sie dies leer.
";
$elem["postfix/mynetworks"]["descriptionfr"]="Réseaux internes :
 Veuillez indiquer les réseaux pour lesquels cette machine relaie le courrier. Par défaut, seuls les courriels de l'hôte local sont acceptés, ce qui est demandé par certains lecteurs de courrier. Ce choix par défaut concerne à la fois l'IPv4 et l'IPv6. Si vous êtes connecté par une seule version du protocole IP, la valeur inutilisée peut être supprimée.
 .
 Si ce serveur est un « smarthost » pour un ensemble de machines, vous devez indiquer l'ensemble des réseaux, sinon le courrier sera rejeté plutôt qu'expédié.
 .
 Pour utiliser les valeurs par défaut de postfix (basées sur les sous-réseaux connectés), veuillez entrer une valeur vide.
";
$elem["postfix/mynetworks"]["default"]="127.0.0.0/8 [::ffff:127.0.0.0]/104 [::1]/128";
$elem["postfix/mailbox_limit"]["type"]="string";
$elem["postfix/mailbox_limit"]["description"]="Mailbox size limit (bytes):
 Please specify the limit that Postfix should place on mailbox files
 to prevent runaway software errors. A value of zero (0) means no
 limit. The upstream default is 51200000.
";
$elem["postfix/mailbox_limit"]["descriptionde"]="Maximale Postfach-Größe (Bytes):
 Bitte geben Sie Größenbegrenzung für Postfachdateien an, die Postfix zur Vermeidung von Softwarefehlern erzwingen soll. Null (0) bedeutet: keine Grenze. Der Postfix-Standard der Originalautoren beträgt 51200000.
";
$elem["postfix/mailbox_limit"]["descriptionfr"]="Taille maximale des boîtes aux lettres (en octets) :
 Veuillez choisir la limite que Postfix mettra à la taille des boîtes aux lettres pour empêcher les erreurs de logiciels incontrôlables. Une valeur nulle signifie aucune limite. Les créateurs du logiciel utilisent une valeur par défaut de 51200000.
";
$elem["postfix/mailbox_limit"]["default"]="0";
$elem["postfix/root_address"]["type"]="string";
$elem["postfix/root_address"]["description"]="Root and postmaster mail recipient:
 Mail for the 'postmaster', 'root', and other system accounts needs to
 be redirected to the user account of the actual system administrator.
 .
 If this value is left empty, such mail will be saved in /var/mail/nobody,
 which is not recommended.
 .
 Mail is not delivered to external delivery agents as root.
 .
 If you already have a /etc/aliases file, then you may need to add this
 entry. Leave this blank to not add one.
";
$elem["postfix/root_address"]["descriptionde"]="Empfänger von E-Mails an Root und Postmaster:
 E-Mails für »postmaster«, »root« und andere Systemkonten müssen zu dem eigentlichen Benutzerkonto des Systemadministrators umgeleitet werden.
 .
 Falls dieser Wert leer gelassen wird, werden solche E-Mails in /var/mail/nobody gespeichert. Dies wird nicht empfohlen.
 .
 E-Mails werden nicht als root an externe Auslieferungsprogramme ausgeliefert.
 .
 Falls Sie bereits eine /etc/aliases-Datei haben, müssen Sie möglicherweise diesen Eintrag hinzufügen. Lassen Sie dies leer, um einen hinzuzufügen.
";
$elem["postfix/root_address"]["descriptionfr"]="Destinataire des courriels de « root » et de « postmaster » :
 Les courriels à destination de « root », de « postmaster » et d'autres utilisateurs systèmes doivent être redirigés vers le compte utilisateur de l'administrateur système.
 .
 Si cette valeur reste vide, ces messages seront enregistrés dans /var/mail/nobody, ce qui n'est pas recommandé.
 .
 Le courrier ne doit pas être distribué par des agents de distribution externes avec des privilèges du superutilisateur.
 .
 Si le fichier /etc/aliases existe déjà, vous devrez sans doute ajouter cette entrée. Laissez le champ vide pour ne pas en ajouter.
";
$elem["postfix/root_address"]["default"]="";
PKG_OptionPageTail2($elem);
?>
