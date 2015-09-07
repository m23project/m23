<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("t-prot");

$elem["t-prot/muttrc.d"]["type"]="boolean";
$elem["t-prot/muttrc.d"]["description"]="Do you want to enable t-prot system wide for mutt?
 The t-prot package provides a config file /etc/Muttrc.t-prot -- to use the
 script from mutt you have to enable it.  You can do this either by creating a
 symlink in /etc/Muttrc.d/ for systemwide usage (rather, this can be done
 automatically for you), or let the users decide to add a \"source\" line for it
 in their ~/.muttrc or ~/.mutt/muttrc.  If you acknowledge this question the
 systemwide usage will be enabled.
";
$elem["t-prot/muttrc.d"]["descriptionde"]="Wollen Sie t-prot Systemweit in mutt aktivieren?
 Das t-prot-Paket bietet eine Konfigurationdatei /etc/Muttrc.t-prot an -- um das Skript in mutt zu verwenden, muss es aktiviert werden. Dies kann entweder durch das Erstellen eines symbolischen Links in /etc/Muttrc.d/ passieren (bzw. kann dies automatisch für Sie durchgeführt werden), oder man lässt die Benutzer entscheiden, sich eine »source«-Zeile in ihre ~/.muttrc bzw. ~/.mutt/muttrc hinzuzufügen. Wenn Sie dieser Frage zustimmen, wird die systemweite Verwendung aktiviert.
";
$elem["t-prot/muttrc.d"]["descriptionfr"]="Faut-il activer t-prot pour l'ensemble des utilisateurs de mutt ?
 Le paquet t-prot fournit un fichier de configuration /etc/Muttrc.t-prot. L'utilisation de t-prot avec mutt nécessite une activation spéficique qui peut se faire en choisissant cette option. Elle créera un lien symbolique dans /etc/Muttrc.d afin d'offrir cette possibilité à tous les utilisateurs du système. Alternativement, si vous ne choisissez pas cette option, chaque utilisateur pourra ajouter une instruction « source » vers ce fichier dans son fichier ~/.muttrc ou ~/.mutt/muttrc.
";
$elem["t-prot/muttrc.d"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
