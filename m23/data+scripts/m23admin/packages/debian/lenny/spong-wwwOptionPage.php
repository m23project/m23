<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("spong-www");

$elem["spong-www/use_rrd"]["type"]="boolean";
$elem["spong-www/use_rrd"]["description"]="Do you wish to install plugins that create RRD charts ?
 The spong-rrd plugins can create spong charts based on load avarages,
 number of users and disk usages that clients report.
 .
 After to plugins have been installed and clients have reported in, you
 have to run the spong-rrd script to create necessary HTML files. See
 /usr/share/doc/spong-www/README-rrd.gz for details.
";
$elem["spong-www/use_rrd"]["descriptionde"]="Möchten Sie die Erweiterungen installieren, die RRD-Diagramme erstellen?
 Die Spong-RRD-Erweiterungen können Spong-Diagramme basierend auf der Durchschnittslast (load avarage), Anzahl der Benutzer und der Plattenauslastung der Clients erstellen.
 .
 Nachdem die Erweiterungen installiert wurden und die Clients sich gemeldet haben, müssen Sie das Spong-RRD-Skript ausführen, damit die notwendigen HTML-Dateien erstellt werden. Lesen Sie /usr/share/doc/spong-www/README-rrd.gz für weitere Information.
";
$elem["spong-www/use_rrd"]["descriptionfr"]="Souhaitez-vous installer des greffons qui créent des graphiques RRD ?
 Les greffons (« plug-ins ») spong-rrd peuvent créer des graphiques spong en fonction des charges moyennes, du nombre d'utilisateurs et de l'espace disque utilisé que les clients lui soumettent.
 .
 Une fois que les greffons ont été installés et que les clients leur ont soumis de telles données, vous devez lancer le script spong-rrd pour créer les fichiers HTML nécessaires. Veuillez consulter /usr/share/doc/spong-www/README-rrd.gz pour obtenir des informations détaillées.
";
$elem["spong-www/use_rrd"]["default"]="";
$elem["spong-www/webserver_type"]["type"]="multiselect";
$elem["spong-www/webserver_type"]["choices"][1]="apache";
$elem["spong-www/webserver_type"]["choices"][2]="apache-ssl";
$elem["spong-www/webserver_type"]["choices"][3]="apache-perl";
$elem["spong-www/webserver_type"]["choicesde"][1]="Apache";
$elem["spong-www/webserver_type"]["choicesde"][2]="Apache-ssl";
$elem["spong-www/webserver_type"]["choicesde"][3]="Apache-perl";
$elem["spong-www/webserver_type"]["choicesfr"][1]="apache";
$elem["spong-www/webserver_type"]["choicesfr"][2]="apache-ssl";
$elem["spong-www/webserver_type"]["choicesfr"][3]="apache-perl";
$elem["spong-www/webserver_type"]["description"]="The web server you would like to reconfigure automatically:
 If you do not select a web server to reconfigure automatically, spong-www
 will not be usable until you reconfigure your webserver to enable it.
 In order for the web server to return spong's gifs and charts, some redirects
 need to be defined.
 .
 The redirects to be added would make the spong charts appear under /spong
 on your web server. If you have chosen to install the RRD plugins, RRD
 charts will appear under /spong/rrd and CGI execution will be allowed
 under /var/lib/spong/rrd/www.
";
$elem["spong-www/webserver_type"]["descriptionde"]="Den Webserver, den Sie automatisch rekonfigurieren möchten:
 Falls Sie keinen Webserver zum automatischen Rekonfigurieren auswählen, kann Spong-WWW nicht verwendet werden, bis Sie Ihren Webserver rekonfigurieren, um ihn zu aktivieren. Damit der Webserver Spongs GIFs und Diagramme zurückliefern kann, müssen einige Umleitungen (redirects) definiert werden.
 .
 Die Umleitungen werden die Spong-Diagramme unter /spong auf Ihrem Webserver verfügbar machen. Falls Sie die RRD-Erweiterungen installieren, werden die RRD-Diagramme unter /spong/rrd verfügbar sein, und die Ausführung von CGI ist dann unter /var/lib/spoing/rrd/www möglich gemacht.
";
$elem["spong-www/webserver_type"]["descriptionfr"]="Serveur web à reconfigurer automatiquement :
 Si vous ne choisissez pas de configurer automatiquement un serveur web, spong-www ne sera pas utilisable tant que vous n'aurez pas reconfiguré votre serveur web. Afin qu'il puisse renvoyer les graphiques et les images GIF de spong, certaines redirections doivent être mises en place.
 .
 La redirection à ajouter fera apparaître les graphiques spong sous /spong pour votre serveur web. Si vous avez choisi d'installer les greffons RRD, les graphiques RRD seront disponibles sous /spong/rrd et l'exécution de scripts CGI sera autorisée dans /var/lib/spong/rrd/www.
";
$elem["spong-www/webserver_type"]["default"]="apache, apache-ssl, apache-perl, apache2";
PKG_OptionPageTail2($elem);
?>
