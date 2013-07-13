<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("uprecords-cgi");

$elem["uprecords-cgi/layout"]["type"]="select";
$elem["uprecords-cgi/layout"]["choices"][1]="pre";
$elem["uprecords-cgi/layout"]["choices"][2]="list";
$elem["uprecords-cgi/layout"]["choicesde"][1]="pre";
$elem["uprecords-cgi/layout"]["choicesde"][2]="list";
$elem["uprecords-cgi/layout"]["choicesfr"][1]="préformaté";
$elem["uprecords-cgi/layout"]["choicesfr"][2]="liste";
$elem["uprecords-cgi/layout"]["description"]="Format used by uprecords.cgi:
 Three different layouts are available for use by the uprecords CGI script.
 Which method you use is a matter of personal preference.
 .
  * pre: Encloses everything in <pre>...</pre>
  * list: Makes a list, using <ol>...</ol>
  * table: Creates an HTML table.
";
$elem["uprecords-cgi/layout"]["descriptionde"]="Format zur Verwendung durch uprecords.cgi:
 Es sind verschiedene Layouts für die Verwendung durch das uprecords-CGI-Skript verfügbar. Welches verwendet wird, ist Geschmackssache.
 .
  * pre: Packt alles in <pre>...</pre>
  * list: Erstellt eine Liste und verwendet dabei <ol>...</ol>
  * table: Erstellt eine HTML-Tabelle.
";
$elem["uprecords-cgi/layout"]["descriptionfr"]="Format utilisé par uprecords.cgi :
 Le script CGI uprecords peut utiliser différentes méthodes pour afficher ses informations. La méthode que vous souhaitez employer dépend de votre goût personnel.
 .
  - préformaté : encadrement de chaque élément avec <pre>...</pre> ;
  - liste      : création d'une liste avec <ol>...</ol> ;
  - tableau    : création d'un tableau en HTML.
";
$elem["uprecords-cgi/layout"]["default"]="pre";
$elem["uprecords-cgi/maxentries"]["type"]="string";
$elem["uprecords-cgi/maxentries"]["description"]="Number of records shown by uprecords.cgi:
 While uptimed may keep a large number of uptime records, not all of them
 are interesting to the outside world. Thus, you can limit the number of
 records that will be shown here.
";
$elem["uprecords-cgi/maxentries"]["descriptionde"]="Anzahl der Aufzeichnungen, die von uprecords.cgi angezeigt werden:
 Uptimed sammelt unter Umständen viele uptime-Aufzeichnungen an, die nicht alle für jedermann interessant sind. Hier können Sie einstellen, wieviele Aufzeichnungen angezeigt werden.
";
$elem["uprecords-cgi/maxentries"]["descriptionfr"]="Nombre d'enregistrements affichés par uprecords.cgi :
 Uptimed conserve un grand nombre d'enregistrements, mais toutes ces durées de fonctionnement n'intéressent pas tout le monde. Aussi, vous pouvez limiter ici le nombre d'enregistrements qui seront affichés.
";
$elem["uprecords-cgi/maxentries"]["default"]="10";
$elem["uprecords-cgi/install_note"]["type"]="note";
$elem["uprecords-cgi/install_note"]["description"]="uprecords.cgi has been installed into the web tree
 You have installed the uprecords-cgi package. That means that a new CGI
 script has been installed, which is now visible to the outside world as
 http://${hostname}/cgi-bin/uprecords.cgi (if you didn't modify your
 web server configuration to have CGI scripts in a different place).
 .
 In the default web server configuration, CGI scripts are accessible from
 anywhere in the world. If you do not want this, you should set up access
 restrictions... but why wouldn't you want to show off your uptimes?
 .
 You may also want to modify the HTML header and footer files in
 /etc/uprecords-cgi (or have your webmaster do so).
";
$elem["uprecords-cgi/install_note"]["descriptionde"]="uprecords.cgi wurde im Web tree installiert
 Sie haben gerade das Paket »uprecords-cgi« installiert. Das bedeutet, dass ein neues CGI-Skript installiert wurde, das von außerhalb als http://${hostname}/cgi-bin/uprecords.cgi verfügbar ist (wenn Sie die Web-Server-Konfiguration nicht geändert haben, so dass CGI-Skripte unter einem anderen Pfad liegen).
 .
 In der Standard-Konfiguration des Web-Servers sind CGI-Skripte weltweit abrufbar. Wenn Sie das nicht möchten, sollten Sie entsprechende Beschränkungen einrichten ... aber warum sollten Sie Ihre Uptimes nicht anzeigen wollen?
 .
 Außerdem möchten Sie vielleicht die Dateien für HTML-Kopf und -Fuß in/etc/uprecords-cgi ändern (oder das Ihrem Webmaster sagen).
";
$elem["uprecords-cgi/install_note"]["descriptionfr"]="uprecords.cgi installé dans l'arborescence du serveur web
 Vous avez installé le paquet uprecords-cgi. Cela signifie qu'un nouveau script a été installé et qu'il est accessible publiquement sur http://${hostname}/cgi-bin/uprecords.cgi (sauf si vous avez modifié la configuration du serveur web pour héberger les scripts CGI à un autre endroit).
 .
 Dans la configuration par défaut du serveur web, les scripts CGI sont accessibles sans restriction. Si vous ne le souhaitez pas, vous devriez définir des accès restreints (mais qui souhaiterait restreindre la publication de ses durées de fonctionnement ?).
 .
 Vous pouvez également modifier les en-têtes et le bas des pages créées, dans /etc/uprecords-cgi, ou indiquer au webmestre de le faire.
";
$elem["uprecords-cgi/install_note"]["default"]="";
PKG_OptionPageTail2($elem);
?>
