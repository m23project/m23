<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mrtg");

$elem["mrtg/conf_mods"]["type"]="boolean";
$elem["mrtg/conf_mods"]["description"]="Make /etc/mrtg.cfg owned by and readable only by root?
 If your MRTG configuration file is readable by users other than the user
 MRTG runs as ('root' by default) it can present a security risk, as this
 file contains SNMP community names.
 .
 It is recommended that you make the file owned by and readable only by
 'root', unless you have specific reasons not to (for example, because
 third-party tools need to read that file, like 'mrtg-rrd').
";
$elem["mrtg/conf_mods"]["descriptionde"]="Soll der Benutzer »root« Eigentümer der Datei /etc/mrtg.cfg sein und ausschließlich er diese Datei lesen können?
 Falls Ihre MRTG-Konfigurationsdatei von anderen Benutzern als dem Benutzer, der MRTG ausführt (standardmäßig »root«) lesbar ist, so kann dies ein Sicherheitsrisiko darstellen, weil diese Datei SNMP-Community-Namen enthält.
 .
 Es wird empfohlen, dass der Benutzer »root« Eigentümer dieser Datei ist und ausschließlich er Lesezugriff bekommt, es sei denn, Sie haben besondere Gründe dagegen (z. B. weil Programme von Drittanbietern diese Datei lesen müssen, wie etwa »mrtg-rrd«).
";
$elem["mrtg/conf_mods"]["descriptionfr"]="Le fichier /etc/mrtg.cfg doit-il être réservé au superutilisateur ?
 Si le fichier de configuration de MRTG peut être lu par des utilisateurs autres que celui dont MRTG prend l'identité (par défaut, « root », le superutilisateur), il existe un certain risque pour la sécurité car ce fichier contient les noms de communautés SNMP.
 .
 Ce fichier devrait appartenir au superutilisateur et n'être accessible que par celui-ci, sauf s'il existe de bonnes raisons pour procéder différemment (par exemple si des outils tiers, comme « mrtg-rrd », ont besoin de lire ce fichier).
";
$elem["mrtg/conf_mods"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
