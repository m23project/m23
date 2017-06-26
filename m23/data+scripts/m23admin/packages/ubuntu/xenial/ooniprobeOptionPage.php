<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ooniprobe");

$elem["ooniprobe/run-cronjob"]["type"]="boolean";
$elem["ooniprobe/run-cronjob"]["description"]="Run ooniprobe daily?
 ooniprobe can be configured to run a set of basic network tests on a daily
 basis. This will test the current network for signs of surveillance and
 censorship, and send the results to the main OONI collector through the Tor
 network.
 .
 If you choose this option, a daily cron job will run network tests as the
 \"Debian-ooni\" user.
 .
 You should be aware that running OONI may break the terms of service of your ISP
 or be legally questionable in your country. The software will attempt to connect
 to web services that may be banned, using web censorship circumvention methods
 such as Tor. The OONI project will publish data submitted by probes, possibly
 including your IP address or other identifying information. In addition, your
 use of OONI will be clear to anybody who has access to your computer, and to
 anybody who can monitor your Internet connection (such as your employer, ISP, or
 government).
 .
 For more information on the risks associated with running ooniprobe, see
 /usr/share/doc/ooniprobe/RISKS.
";
$elem["ooniprobe/run-cronjob"]["descriptionde"]="Soll Ooniprobe täglich ausgeführt werden?
 Ooniprobe kann so eingerichtet werden, dass es täglich als Zusammenstellung grundlegender Netzwerktests ausgeführt wird. Dies wird das aktuelle Netzwerk auf Anzeichen von Überwachung und Zensur überprüfen und die Ergebnisse über das TOR-Netzwerk zum Haupt-OONI-Sammler senden.
 .
 Falls Sie diese Option auswählen, wird ein täglicher Cronjob Netzwerktests als Benutzer »Debian-ooni« ausführen.
 .
 Sie sollten sich bewusst sein, dass das Ausführen von OONI gegen die Nutzungsbedingungen Ihres Internetanbieters verstoßen oder in Ihrem Land rechtliche Fragen aufwerfen könnte. Diese Software wird unter Verwendung von Zensurvereitelungsmethoden wie TOR versuchen, sich mit verbotenen Web-Diensten zu verbinden. Das OONI-Projekt wird durch Tests gesendete Daten veröffentlichen, die möglicherweise Ihre IP-Adresse oder andere Informationen zur Identifikation enthalten. Außerdem wird jedem, der Zugriff auf Ihren Rechner hat und jedem, der Ihre Internetverbindung überwacht, klar sein, dass Sie OONI benutzen (wie beispielsweise Ihrem Arbeitgeber, dem Internetanbieter oder der Regierung).
 .
 Weitere Informationen über die mit der Ausführung von Ooniprobe verbundenen Risiken finden Sie unter /usr/share/doc/ooniprobe/RISKS.
";
$elem["ooniprobe/run-cronjob"]["descriptionfr"]="Faut-il exécuter ooniprobe quotidiennement ?
 Il est possible de configurer ooniprobe pour exécuter quotidiennement un ensemble de tests réseau de base. Le réseau en cours d'utilisation sera analysé pour détecter des signes de surveillance et de censure, et les résultats seront envoyés au collecteur OONI principal au travers du réseau Tor.
 .
 Si vous choisissez cette option, une tâche planifiée quotidienne exécutera les tests réseau avec l'utilisateur « Debian-ooni ».
 .
 L'utilisation d'OONI peut violer les conditions d'utilisation de votre FAI, ou être incompatible avec les lois de votre pays. L'application tentera de se connecter à des services web qui peuvent être bannis, grâce à des méthodes de contournement de censure comme Tor. Le projet OONI publiera les données envoyées par les sondes, comme votre adresse IP ou d'autres informations permettant de vous identifier. De plus, votre utilisation d'OONI sera visible par tous ceux qui ont accès à votre ordinateur, ainsi qu'à tous ceux qui peuvent surveiller votre connection à Internet (comme votre employeur, votre FAI, ou votre gouvernement).
 .
 Pour plus d'informations sur les risques associés à l'exécution d'ooniprobe, veuillez lire le fichier usr/share/doc/ooniprobe/RISKS.
";
$elem["ooniprobe/run-cronjob"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
