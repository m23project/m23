<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mldonkey-server");

$elem["mldonkey-server/fasttrack_problem"]["type"]="note";
$elem["mldonkey-server/fasttrack_problem"]["description"]="Bug #200500
 Previous versions of mldonkey-server suffer from a serious DFSG policy
 violation.
 .
 The plugin for the fasttrack protocol (e.g. used by kazaa) of mldonkey-server
 was made with illegal coding practice. This version fixes the problem by
 removing this plugin from the MLDonkey package. Any fasttrack sources will be
 filtered out of your files.ini.
 .
 Your entire fasttrack upload will disappear with the next restart of the
 mldonkey server.
 .
 See /usr/share/doc/mldonkey-server/README.Debian for more information.
";
$elem["mldonkey-server/fasttrack_problem"]["descriptionde"]="Fehlerbericht #200500
 Frühere Versionen von mldonkey-server leiden unter einer ernsthafen Verletzung der Debian-Richtlinien für Freie Software.
 .
 Die Erweiterung für das Fasttrack-Protokoll (verwendet z. B. von kazaa) von mldonkey-server kam mit Hilfe illegaler Programmierpraktiken zu Stande. Diese Version behebt das Problem, indem diese Erweiterung aus dem MLDonkey-Paket entfernt wurde. Alle Fasttrack-Quellen werden aus Ihrer files.ini herausgefiltert.
 .
 Ihr gesamter Fasttrack-Upload wird beim nächsten Start des mldonkey-Servers verschwinden.
 .
 Weitere Informationen finden Sie in /usr/share/doc/mldonkey-server/README.Debian.
";
$elem["mldonkey-server/fasttrack_problem"]["descriptionfr"]="Bogue numéro 200500
 Les versions précédentes de mldonkey-server comportaient un sérieux problème de violation de la définition des logiciels libres selon Debian (« Debian Free Software Guidelines »).
 .
 Le greffon fasttrack (utilisé par exemple pour kazaa) de mldonkey-server relevait de pratiques illégales de programmation. Cette version corrige ce problème. Toutes les références à fasttrack seront supprimées de votre fichier files.ini.
 .
 Tous vos téléchargements fasttrack disparaîtront au prochain redémarrage de mldonkey.
 .
 Veuillez consulter le fichier /usr/share/doc/mldonkey-server/README.Debian pour plus d'informations.
";
$elem["mldonkey-server/fasttrack_problem"]["default"]="";
$elem["mldonkey-server/launch_at_startup"]["type"]="boolean";
$elem["mldonkey-server/launch_at_startup"]["description"]="Launch MLDonkey at startup?
 If enabled, each time your machine starts, the MLDonkey server will be started.
 .
 Otherwise, you will need to launch MLDonkey yourself each time you want to
 use it.
";
$elem["mldonkey-server/launch_at_startup"]["descriptionde"]="MLDonkey beim Hochfahren starten?
 Falls Sie dies aktivieren, wird der MLDonkey-Server jedes Mal gestartet, wenn Sie Ihren Computer hochfahren.
 .
 Anderenfalls müssen Sie MLDonkey jedes Mal selbst starten, wenn Sie es nutzen möchten.
";
$elem["mldonkey-server/launch_at_startup"]["descriptionfr"]="Faut-il lancer MLDonkey au démarrage du système ?
 Si vous choisissez cette option, un serveur MLDonkey sera lancé à chaque démarrage de votre machine.
 .
 Dans le cas contraire, vous devrez lancer MLDonkey chaque fois que vous souhaiterez l'utiliser.
";
$elem["mldonkey-server/launch_at_startup"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
