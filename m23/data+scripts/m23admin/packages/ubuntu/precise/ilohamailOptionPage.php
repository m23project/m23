<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ilohamail");

$elem["ilohamail/webserver_type"]["type"]="select";
$elem["ilohamail/webserver_type"]["choices"][1]="Apache";
$elem["ilohamail/webserver_type"]["choices"][2]="Apache-ssl";
$elem["ilohamail/webserver_type"]["choices"][3]="Apache2";
$elem["ilohamail/webserver_type"]["choicesde"][1]="apache";
$elem["ilohamail/webserver_type"]["choicesde"][2]="apache-ssl";
$elem["ilohamail/webserver_type"]["choicesde"][3]="apache-perl";
$elem["ilohamail/webserver_type"]["choicesfr"][1]="Apache";
$elem["ilohamail/webserver_type"]["choicesfr"][2]="Apache-ssl";
$elem["ilohamail/webserver_type"]["choicesfr"][3]="Apache2";
$elem["ilohamail/webserver_type"]["description"]="Webserver type:
 By default IlohaMail supports any webserver that is PHP4 capable, but this
 process only supports Apache. This installation  will manage (or attempt to manage) 
 the configuration of the Apache portions specific necessary to run IlohaMail properly.  
 If you do not wish this to happen, please choose the 'Other' option.
";
$elem["ilohamail/webserver_type"]["descriptionde"]="Webserver type:
 By default IlohaMail supports any webserver that is PHP4 capable, but this process only supports Apache. This installation  will manage (or attempt to manage)  the configuration of the Apache portions specific necessary to run IlohaMail properly.   If you do not wish this to happen, please choose the 'Other' option.
";
$elem["ilohamail/webserver_type"]["descriptionfr"]="Webserver type:
 By default IlohaMail supports any webserver that is PHP4 capable, but this process only supports Apache. This installation  will manage (or attempt to manage)  the configuration of the Apache portions specific necessary to run IlohaMail properly.   If you do not wish this to happen, please choose the 'Other' option.
";
$elem["ilohamail/webserver_type"]["default"]="Apache";
$elem["ilohamail/weblocation"]["type"]="string";
$elem["ilohamail/weblocation"]["description"]="Apache Alias for IlohaMail:
 An alias entry is added to the Apache configuration pointing to the IlohaMail
 source. By default this is /IlohaMail, so that the webmail is reachable
 at http://your.host/IlohaMail/. If you want another location (like /webmail)
 enter it here.
";
$elem["ilohamail/weblocation"]["descriptionde"]="Apache Alias für IlohaMail:
 Ein Alias Eintrag wird in die Apache Konfiguration eingefügt, der auf die IlohaMail Quellen zeigt. Per Vorgabe ist das /IlohaMail, so dass Webmail über http://ihr.host/IlohaMail/ erreichbar ist. Wenn sie einen anderen Ort (wie /webmail) wünschen, dann geben Sie das hier ein.
";
$elem["ilohamail/weblocation"]["descriptionfr"]="Alias d'Apache pour IlohaMail :
 Un alias pointant sur le source d'IlohaMail a été ajouté à la configuration d'Apache. Par défaut, il s'agit de /IlohaMail ; ainsi le courrier peut être consulté via la Toile à http://votre.hôte/IlohaMail/. Si vous préférez un autre emplaccement, tel que « /webmail », vous pouvez changer ce réglage.
";
$elem["ilohamail/weblocation"]["default"]="/IlohaMail";
PKG_OptionPageTail2($elem);
?>
