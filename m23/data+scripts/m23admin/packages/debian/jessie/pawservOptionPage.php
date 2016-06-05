<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pawserv");

$elem["pawserv/which_servers"]["type"]="select";
$elem["pawserv/which_servers"]["choices"][1]="Pawserv";
$elem["pawserv/which_servers"]["choices"][2]="Zserv";
$elem["pawserv/which_servers"]["choicesde"][1]="Pawserv";
$elem["pawserv/which_servers"]["choicesde"][2]="Zserv";
$elem["pawserv/which_servers"]["choicesfr"][1]="Pawserv";
$elem["pawserv/which_servers"]["choicesfr"][2]="Zserv";
$elem["pawserv/which_servers"]["description"]="Servers to be run from inetd:
 This package includes both the pawserv daemon (permitting remote hosts to
 read local files while running PAW/Paw++) and the zserv daemon (allowing
 remote hosts to log in using CERN's ZFTP protocol).
 .
 These servers are run from the inetd superserver and either both or
 only one of them may be enabled. Enabling 'pawserv' alone is
 sufficient for most users.
";
$elem["pawserv/which_servers"]["descriptionde"]="Server, die Inetd starten soll:
 Dieses Paket enthält sowohl den Pawserv-Dienst (Der verhindert, dass entfernte Rechner das lokale Dateisystem lesen können während PAW/Paw++ läuft.) als auch den Zserv-Dienst (Der erlaubt entfernten Rechnern sich über CERN's ZFTP-Protokoll anzumelden.).
 .
 Diese Server-Dienste werden von Inetd gestartet und einer oder beide können aktiv sein. Für die meisten Benutzer wird es ausreichend sein, nur »Pawserv« zu aktivieren.
";
$elem["pawserv/which_servers"]["descriptionfr"]="Servers to be run from inetd:
 Ce paquet fournit à la fois le démon pawserv (qui permet aux hôtes distants d'accéder aux fichiers locaux lorsque PAX/Paw++ sont utilisés) et le démon zserv (qui permet aux hôtes distants d'effectuer des connexions avec le protocole ZFTP du CERN).
 .
  Ces deux serveurs sont lancés par le super-serveur inetd et il est possible d'activer l'un ou l'autre ou bien les deux. À moins d'avoir des besoins particuliers, il sera en général suffisant d'activer « Pawserv ».
";
$elem["pawserv/which_servers"]["default"]="Pawserv";
PKG_OptionPageTail2($elem);
?>
