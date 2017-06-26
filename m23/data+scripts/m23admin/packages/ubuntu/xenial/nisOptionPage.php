<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nis");

$elem["nis/domain"]["type"]="string";
$elem["nis/domain"]["description"]="NIS domain:
 Please choose the NIS \"domainname\" for this system. If you want this
 machine to just be a client, you should enter the name of the
 NIS domain you wish to join.
 .
 Alternatively, if this machine is to be a NIS server, you can
 either enter a new NIS \"domainname\" or
 the name of an existing NIS domain.
";
$elem["nis/domain"]["descriptionde"]="NIS-Domain:
 Bitte wählen Sie den NIS-»Domainnamen« für dieses System. Falls diese Maschine nur ein Client sein soll, sollten Sie den Namen der NIS-Domain angeben, in die sie integriert werden soll.
 .
 Falls andererseits diese Maschine ein NIS-Server werden soll, können Sie entweder einen neuen NIS-»Domainnamen« oder den Namen einer existierenden NIS-Domain eingeben.
";
$elem["nis/domain"]["descriptionfr"]="Domaine NIS :
 Veuillez indiquer le nom de domaine (domainname) NIS pour ce système. Si cette machine n'est qu'un client, saisissez simplement le nom du domaine NIS que vous souhaitez rejoindre.
 .
 Si cette machine doit être un serveur NIS, vous pouvez saisir soit un nouveau nom de domaine (domainname) NIS, soit le nom d'un domaine NIS existant.
";
$elem["nis/domain"]["default"]="";
PKG_OptionPageTail2($elem);
?>
