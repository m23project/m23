<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lynx-cur");

$elem["lynx-cur/defaulturl"]["type"]="string";
$elem["lynx-cur/defaulturl"]["description"]="Lynx's homepage:
 Please enter the default URL to use if none is given when invoking lynx.
 .
 You must enter either a full URL (including the \"http://\", etc.) or an
 absolute pathname.
";
$elem["lynx-cur/defaulturl"]["descriptionde"]="Startseite von lynx:
 Bitte geben Sie die Standard-URL ein, die lynx verwenden soll, wenn Sie beim Aufruf von lynx keine andere URL angeben.
 .
 Sie müssen entweder die komplette URL (inklusive »http://« usw.) oder den absoluten Pfad-Namen angeben.
";
$elem["lynx-cur/defaulturl"]["descriptionfr"]="Page d'accueil de lynx :
 Veuillez donner l'URL par défaut à utiliser quand aucune page n'est indiquée au lancement de lynx.
 .
 Vous devez donner soit l'URL complète (avec « http:// », etc.) soit un chemin complet.
";
$elem["lynx-cur/defaulturl"]["default"]="http://www.debian.org/";
$elem["lynx-cur/etc_lynx.cfg"]["type"]="note";
$elem["lynx-cur/etc_lynx.cfg"]["description"]="Please check old /etc/lynx.cfg
 /etc/lynx.cfg is found but the configuration file of lynx-cur is
 /etc/lynx-cur/lynx.cfg so /etc/lynx.cfg would be of lynx or lynx-ssl.
 .
 Please check it and it will be better to PURGE lynx or lynx-ssl.
";
$elem["lynx-cur/etc_lynx.cfg"]["descriptionde"]="Bitte überprüfen Sie die alte /etc/lynx.cfg
 /etc/lynx.cfg wurde gefunden, aber die Konfigurationsdatei von lynx-cur ist /etc/lynx-cur/lynx.cfg. Daher stammt /etc/lynx.cfg vermutlich von lynx oder lynx-ssl.
 .
 Bitte überprüfen Sie das. Es ist besser, wenn Sie lynx oder lynx-ssl VOLLSTÄNDIG entfernen (engl. »purge«).
";
$elem["lynx-cur/etc_lynx.cfg"]["descriptionfr"]="Veuillez examiner l'ancien fichier /etc/lynx.cfg
 /etc/lynx.cfg existe mais le fichier de configuration de lynx-cur est /etc/lynx-cur/lynx.cfg ; /etc/lynx.cfg appartient sans doute à lynx ou à lynx-ssl.
 .
 Veuillez le vérifier. Il est préférable de « purger » lynx ou lynx-ssl si c'est le cas.
";
$elem["lynx-cur/etc_lynx.cfg"]["default"]="";
PKG_OptionPageTail2($elem);
?>
