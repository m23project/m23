<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("debsecan");

$elem["debsecan/report"]["type"]="boolean";
$elem["debsecan/report"]["description"]="Do you want debsecan to send daily reports?
 debsecan can check the security status of the host
 once per day, and notify you of any changes by email.
 .
 If you choose this option, debsecan will download a small file
 once a day.  Your package list will not be transmitted to
 the server.
";
$elem["debsecan/report"]["descriptionde"]="Möchten Sie, dass debsecan tägliche Berichte versendet?
 Debsecan kann den Sicherheitsstatus des Rechners einmal pro Tag prüfen und Sie bei Änderungen per Email informieren.
 .
 Falls Sie diese Möglichkeit wählen, wird debsecan einmal pro Tag eine kleine Datei herunterladen. Ihre Paketliste wird nicht an den Server übermittelt.
";
$elem["debsecan/report"]["descriptionfr"]="Faut-il que Debsecan envoie des rapports quotidiens par courriel ?
 Debsecan peut vérifier quotidiennement l'état de sécurité de l'hôte et vous informer de tout changement.
 .
 En choisissant cette option, Debsecan téléchargera quotidiennement un petit fichier. La liste des paquets ne sera pas transmise au serveur.
";
$elem["debsecan/report"]["default"]="true";
$elem["debsecan/mailto"]["type"]="string";
$elem["debsecan/mailto"]["description"]="Email address to which daily reports should be sent:
";
$elem["debsecan/mailto"]["descriptionde"]="Email-Adresse, an die tägliche Berichte gesendet werden sollen:
";
$elem["debsecan/mailto"]["descriptionfr"]="Adresse électronique où seront envoyés les rapports quotidiens :
";
$elem["debsecan/mailto"]["default"]="root";
$elem["debsecan/suite"]["type"]="select";
$elem["debsecan/suite"]["choices"][1]="GENERIC";
$elem["debsecan/suite"]["choices"][2]="sarge";
$elem["debsecan/suite"]["choices"][3]="etch";
$elem["debsecan/suite"]["choices"][4]="lenny";
$elem["debsecan/suite"]["choices"][5]="squeeze";
$elem["debsecan/suite"]["choices"][6]="wheezy";
$elem["debsecan/suite"]["description"]="Main suite from which packages are installed:
 To present more useful data, debsecan needs to know
 the Debian release from which you usually install packages.
 .
 If you specify \"GENERIC\" (the default), only basic debsecan
 functionality is available.  If you specify the suite
 matching your sources.list configuration, information about
 fixed and obsolete packages will be included in email reports.
";
$elem["debsecan/suite"]["descriptionde"]="Hauptsächliche Release, von der Pakete installiert werden:
 Um nützlichere Daten zu präsentieren, muss debsecan die Debian-Release kennen, von der Sie gewöhnlich Pakete installieren.
 .
 Falls Sie »GENERIC« (Voreinstellung) angeben, ist nur die Basisfunktionalität von debsecan verfügbar. Falls Sie die Release angeben, die zu Ihrer souces.list-Konfiguration passt, werden die Email-Berichte Informationen bezüglich aktualisierter und veralteter Pakete enthalten.
";
$elem["debsecan/suite"]["descriptionfr"]="Version de la distribution utilisée :
 Afin de présenter des données utiles, Debsecan a besoin de connaître la version de la distribution que vous utilisez.
 .
 En indiquant « GENERIC » (valeur par défaut), seules des fonctionnalités très basiques de Debsecan seront disponibles. En revanche, si vous indiquez la version correspondant au fichier « sources.list », des informations sur les paquets corrigés et obsolètes seront ajoutées au rapport envoyé par courriel.
";
$elem["debsecan/suite"]["default"]="GENERIC";
$elem["debsecan/source"]["type"]="string";
$elem["debsecan/source"]["description"]="URL of vulnerability information:
 debsecan fetches vulnerability information from the network.
 If your system is not connected to the Internet, you can enter
 the URL of a local mirror here.  If you leave this option
 empty, the built-in default URL is used.
";
$elem["debsecan/source"]["descriptionde"]="URL für Informationen über Sicherheitslücken:
 Debsecan lädt Informationen über Sicherheitslücken aus dem Netzerk. Falls Ihr System nicht mit dem Internet verbunden ist, können Sie die URL eines lokalen Spiegel-Servers hier angeben. Falls Sie diese Einstellung leer lassen, wird eine voreingestellte URL verwendet.
";
$elem["debsecan/source"]["descriptionfr"]="URL donnant les informations sur les vulnérabilités :
 Debsecan récupère les informations sur les vulnérabilités via le réseau. Si votre système n'est pas connecté à l'Internet, vous pouvez indiquer l'URL d'un miroir local. Si vous laissez ce champ vide, l'adresse par défaut configurée dans le programme sera utilisée.
";
$elem["debsecan/source"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
