<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mrtg");

$elem["mrtg/own_user"]["type"]="boolean";
$elem["mrtg/own_user"]["description"]="Run MRTG with its own user?
 Traditionally, MRTG runs as root, but this can present a potential
 security risk. If you chose to have MRTG run as its own user, a user
 called 'mrtg' will be used instead. If you have existing programs that
 read any of MRTG's output files, you may need to update them.
";
$elem["mrtg/own_user"]["descriptionde"]="MRTG als eigener Benutzer ausführen?
 Normalerweise wird MRTG als root ausgeführt, dies kann jedoch eine Sicherheitslücke sein. Wenn Sie auswählen das MRTG als eigener Benutzer ausgeführt werden soll, dann wird ein Benutzer 'mrtg' erstellt und MRTG mit diesem Benutzer ausgeführt. Wenn Sie andere Programme benutzen, die die MRTG-Dateien lesen, dann müssen Sie diese Programm vielleicht anpassen.
";
$elem["mrtg/own_user"]["descriptionfr"]="MRTG doit-il être exécuté sans privilège ?
 Habituellement, MRTG est exécuté par le super-utilisateur, ce qui introduit un risque potentiel pour la sécurité du système. Si vous choisissez d'exécuter MRTG sans privilèges, l'identifiant « mrtg » sera utilisé. Il pourra être nécessaire de mettre à jour les programmes susceptibles de lire les fichiers créés par MRTG.
";
$elem["mrtg/own_user"]["default"]="true";
$elem["mrtg/conf_mods"]["type"]="boolean";
$elem["mrtg/conf_mods"]["description"]="Make /etc/mrtg.cfg owned by and readable only by the MRTG user?
 If your MRTG configuration file is readable by users other than the user
 MRTG runs as (typically either 'mrtg' or 'root') it can present a security
 risk, as this file contains SNMP community names.
 .
 It is recommended that you make the file owned by and readable only by the
 MRTG user, unless you have specific reasons not to.
";
$elem["mrtg/conf_mods"]["descriptionde"]="Datei /etc/mrtg.cfg mit dem Eigner mrtg erstellen?
 Wenn Ihre MRTG-Konfiguration für andere Benutzer als den MRTG- Benutzer (normalerweise 'mrtg' oder 'root') lesbar ist, dann kann dies eine Sicherheitslücke sein, da diese Datei SNMP-Informationen enthält.
 .
 Es wird empfohlen, das Sie diese Datei nur für den MRTG-Benutzer lesbar machen, es sei denn Sie haben wichtige Gründe für die jetzige Konfiguration.
";
$elem["mrtg/conf_mods"]["descriptionfr"]="Le fichier /etc/mrtg.cfg doit-il être réservé à l'utilisateur de MRTG ?
 Si le fichier de configuration de MRTG peut être lu par des utilisateurs autres que celui dont MRTG prend l'identité (en général, soit « mrtg », soit le super-utilisateur), il existe un certain risque pour la sécurité car ce fichier contient les noms de communautés SNMP.
 .
 Ce fichier devrait appartenir à l'utilisateur de MRTG et n'être accessible que par celui-ci, sauf s'il existe de bonnes raisons pour procéder différemment.
";
$elem["mrtg/conf_mods"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
