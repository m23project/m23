<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("abook");

$elem["abook/muttrc.d"]["type"]="boolean";
$elem["abook/muttrc.d"]["description"]="Do you want to enable abook system wide for mutt?
 abook offers the possibility to be used as query backend from within
 mutt.  If you acknowledge this question the package will create an
 /etc/Muttrc.d/abook.rc file that enables querying the abook database and
 adding mail addresses to abook with pressing \"A\" from pager mode.
";
$elem["abook/muttrc.d"]["descriptionde"]="Wollen Sie abook Systemweit in mutt aktivieren?
 abook bietet die Möglichkeit, als externe Adressenabfrage in mutt verwendet zu werden. Falls Sie dieser Frage zustimmen, wird das Paket eine /etc/Muttrc.d/abook.rc-Datei erstellen, die die Abfrage der abook-Datenbank und das Hinzufügen von Adressen in abook durch Drücken von »A« im Pager-Modus aktiviert.
";
$elem["abook/muttrc.d"]["descriptionfr"]="Faut-il activer abook pour l'ensemble des utilisateurs de mutt ?
 Abook peut être employé comme agent de recherche depuis mutt. Si vous choisissez cette option, le paquet créera un fichier /etc/Muttrc.d/abook.rc qui activera les consultations de la base de données et complétera l'adresse électronique dans abook en pressant la touche « A » dans le mode pagination (« pager mode »).
";
$elem["abook/muttrc.d"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
