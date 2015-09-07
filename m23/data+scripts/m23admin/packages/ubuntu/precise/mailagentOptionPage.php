<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mailagent");

$elem["shared/news/organization"]["type"]="string";
$elem["shared/news/organization"]["description"]="Organization name for this computer:
 The /etc/news/organization file does not exist. That file contains
 the name of the organization this computer belongs to. This is the
 name that will appear in the Organization header field of outgoing
 articles, mail, or patches. 
 . 
 Please enter the name of the organization as you want it to appear in
 that header field. It is common practice to add a location, typically
 a city name, to the organization's name, for instance:
  University of Southern North Dakota, Hoople
 .
 If you enter \"--none--\", no organization name will be setup.
";
$elem["shared/news/organization"]["descriptionde"]="Name der Organisation auf diesem Rechner:
 Die Datei /etc/news/organization gibt es nicht. Diese Datei enthält den Namen der Organisation, zu der dieser Rechner gehört. Der Name erscheint in der Kopfzeile »Organization« von ausgehenden Artikeln, E-Mails oder Patches.
 .
 Bitte geben Sie den Namen der Organisation ein, so wie er an diesen Stellen erscheinen soll. Es ist üblich, dabei auch den Standort mit anzugeben, z. B.:
  Hochschule für Technik und Wirtschaft (FH), Dresden
 .
 Wenn Sie »--none--« eingeben, wird kein Name für die Organisation eingerichtet.
";
$elem["shared/news/organization"]["descriptionfr"]="Nom de l'organisation pour ce serveur :
 Le fichier « /etc/news/organization » n'existe pas. Ce fichier contient le nom de l'« organisation » (entreprise ou autre) à laquelle appartient ce serveur. Ce nom apparaîtra sur les articles, courriels ou rustines émis.
 .
 Veuillez indiquer ce nom d'« organisation » tel qu'il doit apparaître. Généralement un nom de ville est adjoint au nom de l'organisation, par exemple :
  Institut Universitaire de Technologie, Nice Côte d'Azur
 .
 Si vous indiquez exactement « --none-- », aucun nom d'organisation ne sera configuré.
";
$elem["shared/news/organization"]["default"]="--none--";
PKG_OptionPageTail2($elem);
?>
