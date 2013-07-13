<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("uif");

$elem["uif/conf_method"]["type"]="select";
$elem["uif/conf_method"]["choices"][1]="don't touch";
$elem["uif/conf_method"]["choicesde"][1]="nicht ändern";
$elem["uif/conf_method"]["choicesfr"][1]="ne pas modifier";
$elem["uif/conf_method"]["description"]="Firewall configuration method
 The firewall can be initialized using debconf, or using information
 you manually put into /etc/uif/uif.conf.
";
$elem["uif/conf_method"]["descriptionde"]="Firewall Konfigurationsmethode
 Die Firewall kann entweder über Debconf, oder manuell über die Konfigurationsdatei /etc/uif/uif.conf eingestellt werden.
";
$elem["uif/conf_method"]["descriptionfr"]="Méthode de configuration du pare-feu :
 Le pare-feu (« firewall ») peut être configuré automatiquement ou en modifiant directement le fichier de configuration /etc/uif/uif.conf.
";
$elem["uif/conf_method"]["default"]="don't touch";
$elem["uif/trusted"]["type"]="string";
$elem["uif/trusted"]["description"]="Enter trusted hosts and/or networks:
 In workstation mode, you can specify some hosts or networks to be
 globally trusted. All incoming traffic coming from there will be
 allowed. Multiple entries have to be separate with spaces.
 .
 Example: 10.1.0.0/16 trust.mydomain.com 192.168.1.55
";
$elem["uif/trusted"]["descriptionde"]="Eingabe der vertrauenswürdigen Rechner / Netze:
 Im »Arbeitsstation«-Modus kann eine Liste von Rechnern oder Netzen angegeben werden, die als vertrauenswürdig angesehen werden. Diese haben dann kompletten Zugriff auf die Arbeitsstation. Mehrere Einträge sind durch ein Leerzeichen zu trennen.
 .
 Beispiel: 10.1.0.0/16 trust.mydomain.com 192.168.1.55
";
$elem["uif/trusted"]["descriptionfr"]="Hôtes ou réseaux de confiance :
 En mode « station de travail », vous pouvez indiquer plusieurs hôtes ou réseaux auxquels vous faites entièrement confiance. Tout le trafic en provenance de ces hôtes sera autorisé. Les entrées multiples doivent être séparées par des espaces.
 .
 Exemple : 10.1.0.0/16 confiance.mondomaine.com 192.168.1.55
";
$elem["uif/trusted"]["default"]="";
$elem["uif/pings"]["type"]="boolean";
$elem["uif/pings"]["description"]="Do you want your host to be reachable via ping?
 Normally an Internet host should be reachable with pings. Choosing no here
 will disable pings which might be somewhat confusing when analyzing
 network problems.
";
$elem["uif/pings"]["descriptionde"]="Soll der Rechner via ping erreichbar sein?
 Normalerweise sollte ein Rechner im Netz via ping erreichbar sein. Falls Sie dies ausschalten möchten, beachten Sie dies bei der Suche nach Netzproblemen.
";
$elem["uif/pings"]["descriptionfr"]="Souhaitez-vous que cet hôte réponde aux pings ?
 Normalement, la réponse aux « pings » devrait être activée. La désactivation de cette option peut conduire à des confusions lors de l'analyse de problèmes réseau.
";
$elem["uif/pings"]["default"]="true";
$elem["uif/traceroute"]["type"]="boolean";
$elem["uif/traceroute"]["description"]="Do you want your host to react to traceroutes?
 Normally an Internet host should react to traceroutes. Choosing no here
 will disable this, which might be somewhat confusing when analyzing
 network problems.
";
$elem["uif/traceroute"]["descriptionde"]="Soll der Rechner traceroutes beantworten?
 Normalerweise sollte ein Rechner im Netz auf traceroutes reagieren. Falls Sie dies ausschalten möchten, beachten Sie dies bei der Suche nach Netzproblemen.
";
$elem["uif/traceroute"]["descriptionfr"]="Souhaitez-vous que cet hôte réponde à « traceroute » ?
 Normalement, la réponse à « traceroute » devrait être activée. La désactivation de cette option peut conduire à des confusions lors de l'analyse de problèmes réseau.
";
$elem["uif/traceroute"]["default"]="true";
$elem["uif/workstation"]["type"]="note";
$elem["uif/workstation"]["description"]="Firewall for simple workstation setups
 Warning: This configuration provides a very simple firewall setup which is
 only able to trust certain hosts and configure global ping / traceroute
 behaviour.
 .
 If you need a more specific setup, use /etc/uif/uif.conf as a template and
 choose \"don't touch\" next time.
";
$elem["uif/workstation"]["descriptionde"]="Firewall für einfache Arbeitsstationen
 Achtung: Diese Konfiguration stellt eine recht einfache Firewall zur Verfügung. Beachten Sie, dass dieses Vorgehen keine gut geplante Firewall ersetzen kann und nur die Möglichkeit bietet, einzelnen Rechnern/Netzen einen kompletten Zugriff zu gewähren.
 .
 Falls ein spezielleres Setup gewünscht ist, sollten Sie die Datei /etc/uif/uif.conf als Vorlage und beim nächsten Mal »nicht ändern« wählen.
";
$elem["uif/workstation"]["descriptionfr"]="Pare-feu pour les simples stations de travail
 Veuillez noter que cette configuration est une mise en œuvre simple d'un pare-feu avec comme seules possibilités le choix de certains hôtes de confiance et le réglage du comportement global pour ping/traceroute.
 .
 Si vous avez besoin d'une configuration plus avancée, utilisez /etc/uif/uif.conf comme modèle et choisissez l'option « ne pas modifier » la prochaine fois.
";
$elem["uif/workstation"]["default"]="";
$elem["uif/error"]["type"]="error";
$elem["uif/error"]["description"]="Error in list of trusted hosts
 Please check the hosts / networks you entered. One or more entries are not
 correct, contain no resolvable hosts, valid IP-addresses, valid network
 definitions or masks.
";
$elem["uif/error"]["descriptionde"]="Fehler in der Liste der vertrauenswürdigen Rechnern
 Überprüfen Sie bitte Ihre Eingaben. Ein oder mehrer Einträge enthalten entweder einen nicht auflösbaren Rechnernamen, eine ungültige Netz-/IP-Adresse oder Netzmaske.
";
$elem["uif/error"]["descriptionfr"]="Erreur dans la liste des hôtes de confiance
 Veuillez vérifier les hôtes et les réseaux indiqués. Une ou plusieurs entrées sont incorrectes, ne peuvent être résolues, contiennent des adresses réseau non valables ou des définitions ou des masques de réseau non valables.
";
$elem["uif/error"]["default"]="";
PKG_OptionPageTail2($elem);
?>
