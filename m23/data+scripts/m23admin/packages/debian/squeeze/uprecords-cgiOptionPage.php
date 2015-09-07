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
$elem["uprecords-cgi/layout"]["description"]="Which format should uprecords.cgi use?
 The uprecords CGI script has different ways of doing a proper display
 layout. Which method you want to use depends mainly on your personal
 preference. Available options are:
 .
  - pre: Encloses everything in <pre>...</pre>
  - list: Makes a list, using <ol>...</ol>
  - table: Creates an HTML table.
";
$elem["uprecords-cgi/layout"]["descriptionde"]="Welches Format soll uprecords.cgi benutzen?
 Das »uprecords«-CGI-Skript kann seine Ausgaben auf verschiedene Art und Weise formatieren. Was Sie persönlich bevorzugen, ist Geschmackssache. Ihre Möglichkeiten:
 .
  - pre: Einfacher Text, in <pre>...</pre>
  - list: Eine HTML-Liste (<ol>...</ol>)
  - table: Eine HTML-Tabelle.
";
$elem["uprecords-cgi/layout"]["descriptionfr"]="Quel format uprecords.cgi doit-il utiliser ?
 Le script CGI uprecords peut utiliser différentes méthodes pour afficher correctement. La méthode que vous souhaitez employer dépend de votre goût personnel. Les options disponibles sont :
 .
  - préformaté : encadrement de chaque élément avec <pre>...</pre> ;
  - liste      : création d'une liste avec <ol>...</ol> ;
  - tableau    : création d'un tableau en HTML.
";
$elem["uprecords-cgi/layout"]["default"]="pre";
$elem["uprecords-cgi/maxentries"]["type"]="string";
$elem["uprecords-cgi/maxentries"]["description"]="How many records should uprecords.cgi show?
 While uptimed may keep a large number of uptime records, not all of them
 are interesting to the outside world. Thus, you can limit the number of
 records that will be shown here.
";
$elem["uprecords-cgi/maxentries"]["descriptionde"]="Wie viele Rekorde soll uprecords.cgi anzeigen?
 Uptimed sammelt auf Dauer viele Rekorde an, die vielleicht nicht alle für jedermann interessant sind. Hier können Sie einstellen, wie viele Rekorde angezeigt werden.
";
$elem["uprecords-cgi/maxentries"]["descriptionfr"]="Combien d'enregistrements souhaitez-vous que uprecords.cgi affiche ?
 Uptimed conserve un grand nombre d'enregistrements, mais toutes ces durées de fonctionnement n'intéressent pas tout le monde. Aussi, vous pouvez limiter ici le nombre d'enregistrements qui seront affichés.
";
$elem["uprecords-cgi/maxentries"]["default"]="10";
$elem["uprecords-cgi/install_note"]["type"]="note";
$elem["uprecords-cgi/install_note"]["description"]="uprecords.cgi has been installed into the webtree
 You have installed the uprecords-cgi package. That means that a new CGI
 script has been installed, which is now visible to the outside world as
 http://${hostname}/cgi-bin/uprecords.cgi (if you didn't modify your
 webserver configuration to have CGI scripts in a different place).
 .
 In the default webserver configuration, CGI scripts are accessible from
 anywhere in the world. If you do not want this, you should set up access
 restrictions (but who doesn't want to show off with his/her uptimes?).
 .
 You may also want to modify the HTML header and footer files in
 /etc/uprecords-cgi or tell your webmaster to do so (remember to give him
 the necessary permissions then).
";
$elem["uprecords-cgi/install_note"]["descriptionde"]="uprecords.cgi wurde im Webtree installiert
 Sie haben gerade das Paket »uprecords-cgi« installiert. Dieses Paket enthält ein neues CGI-Skript, das von außen unter http://${hostname}/cgi-bin/uprecords.cgi aufgerufen werden kann (wenn Sie die Webserver-Konfiguration nicht geändert haben, so dass es unter einem anderen Pfad liegt).
 .
 In der Standard-Konfiguration Ihres Webservers sind CGI-Skripte wie alles andere auch weltweit abrufbar. Wenn Sie das nicht wollen, sollten Sie entsprechende Beschränkungen einrichten (aber wer will nicht mit seinen uptimes angeben?).
 .
 Außerdem möchten Sie vielleicht den HTML-Kopf und -Fuß ändern (die entsprechenden Dateien liegen in /etc/uprecords-cgi) oder das Ihrem/r Webmaster/in sagen (dann sollte er/sie aber die nötigen Schreibrechte haben).
";
$elem["uprecords-cgi/install_note"]["descriptionfr"]="uprecords.cgi a été installé dans l'arborescence du serveur web
 Vous avez installé le paquet uprecords-cgi. Cela signifie qu'un nouveau script a été installé et qu'il est accessible publiquement sur http://${hostname}/cgi-bin/uprecords.cgi (sauf si vous avez modifié la configuration de votre serveur web pour héberger les scripts CGI à un autre endroit).
 .
 Dans la configuration par défaut du serveur web, les scripts CGI sont accessibles sans restriction. Si vous ne le souhaitez pas, vous devriez définir des accès restreints (mais qui souhaiterait restreindre la publication ses durées de fonctionnement ?).
 .
 Vous pouvez également modifier les en-têtes et le bas des pages générées dans /etc/uprecords-cgi ou indiquer au webmestre de le faire (pensez à lui fournir les droits d'accès nécessaires).
";
$elem["uprecords-cgi/install_note"]["default"]="";
PKG_OptionPageTail2($elem);
?>
