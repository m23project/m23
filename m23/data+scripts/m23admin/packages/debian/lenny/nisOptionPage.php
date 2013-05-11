<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nis");

$elem["nis/domain"]["type"]="string";
$elem["nis/domain"]["description"]="Enter your NIS domain
 You now need to choose a NIS domainname for your system. If you want this
 machine to just be a client, enter the NIS domainname of your network.
 Otherwise choose an appropriate NIS domainname.
";
$elem["nis/domain"]["descriptionde"]="Bitte geben Sie den NIS-Domainnamen ein.
 Sie müssen nun einen NIS-Domainnamen für Ihr System auswählen. Wenn dieser Rechner nur ein NIS-Client ist, dann geben Sie hier den bereits für Ihr Netzwerk festgelegten NIS-Domainnamen an, andernfalls geben Sie einen Namen Ihrer Wahl ein.
";
$elem["nis/domain"]["descriptionfr"]="Domaine NIS :
 Vous devez choisir un domaine NIS pour votre système. Si vous souhaitez que cette machine soit un simple client, veuillez indiquer le nom de domaine NIS de votre réseau. Sinon, choisissez un nom de domaine NIS approprié.
";
$elem["nis/domain"]["default"]="";
$elem["nis/not-yet-configured"]["type"]="note";
$elem["nis/not-yet-configured"]["description"]="Your system needs more configuration
 Your system has not yet been completely configured as a NIS client - you
 need to setup /etc/nsswitch.conf and/or /etc/passwd and /etc/group. Please
 read /usr/share/doc/nis/nis.debian.howto.gz to find out how.
";
$elem["nis/not-yet-configured"]["descriptionde"]="Das System muss noch konfiguriert werden
 Ihr Rechner wurde noch nicht als NIS-Client eingerichtet. Sie müssen noch die Dateien /etc/nsswitch.conf und/oder /etc/passwd und /etc/group anpassen. Weitere Informationen finden Sie in /usr/share/doc/nis/nis.debian.howto.gz.
";
$elem["nis/not-yet-configured"]["descriptionfr"]="Votre système a besoin d'autres paramètres
 Votre système n'a pas été correctement configuré comme client NIS ; vous devez adapter /etc/nsswitch.conf ou les deux fichiers /etc/passwd et /etc/group. Veuillez consulter /usr/share/doc/nis/nis.debian.howto.gz pour savoir comment faire.
";
$elem["nis/not-yet-configured"]["default"]="";
PKG_OptionPageTail2($elem);
?>
