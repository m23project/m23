<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fusiondirectory");

$elem["fusiondirectory/upgrade-confirm"]["type"]="boolean";
$elem["fusiondirectory/upgrade-confirm"]["description"]="Really perform FusionDirectory major version upgrade?
 You are about to upgrade FusionDirectory to a new major version.
 Please consult the UPGRADE documentation first:
 /usr/share/doc/fusiondirectory/UPGRADE.md.gz
 .
 FusionDirectory comes with tools to migrate from one major version to
 another. However, as with other LDAP directory setups, exceptional
 circumstances or wrong data in the LDAP tree may sometimes prevent these
 tools from migrating everything.
 .
 In this case, the directory information tree may even need to be
 manually adapted outside of FusionDirectory with tools such as
 ldapmodify or ldapvi.
 .
 If you do not choose to proceed, the upgrade process for
 FusionDirectory related packages will be canceled.
";
$elem["fusiondirectory/upgrade-confirm"]["descriptionde"]="Möchten Sie wirklich ein Upgrade auf eine neue Hauptversion von FusionDirectory durchführen?
 Sie sind dabei, ein Upgrade von FusionDirectory auf eine neue Hauptversion (engl. major version) durchzuführen. Bitte konsultieren Sie zuerst die »UPGRADE«-Dokumentation unter: /usr/share/doc/fusiondirectory/UPGRADE.md.gz. 
 .
 FusionDirectory bietet die nötigen Werkzeuge, um von einer Hauptversionsnummer auf eine andere zu migrieren. Wie es auch mit anderen LDAP-Verzeichnisdiensten der Fall ist, können außergewöhnliche Umstände oder fehlerhafte Datenbestände im LDAP-Verzeichnisbaum manchmal verhindern, dass diese Werkzeuge die Migration komplett und fehlerfrei durchführen. 
 .
 In diesem Fall kann es sogar nötig sein, den Verzeichnisbaum außerhalb von FusionDirectory manuell anzupassen. Hilfreich hierbei sind z.B. die Werkzeuge »ldapmodify« oder »ldapvi«.
 .
 Wenn Sie sich entscheiden hier abzubrechen, wird der Upgrade-Prozess für FusionDirectory nicht durchgeführt.
";
$elem["fusiondirectory/upgrade-confirm"]["descriptionfr"]="Faut-il vraiment effectuer la mise à niveau vers une version majeure de FusionDirectory ?
 Vous êtes sur le point de mettre à niveau FusionDirectory vers une nouvelle version majeure. Merci de consulter la documentation de MISE À NIVEAU dans un premier temps : /usr/share/doc/fusiondirectory/UPGRADE.md.gz
 .
 FusionDirectory est accompagné d'outils pour migrer d'une version majeure à une autre. Cependant, comme avec d'autres configurations de répertoire LDAP, des circonstances exceptionnelles ou des données erronées dans l'arbre LDAP peuvent parfois empêcher ces outils de tout migrer.
 .
 Dans ce cas, l'arbre d'information de répertoire peut même avoir besoin d'être adapté manuellement en dehors de FusionDirectory avec des outils tels que ldapmodify ou ldapvi.
 .
 Si vous choisissez de ne pas poursuivre, le processus de mise à niveau des paquets associés à FusionDirectory va être annulé.
";
$elem["fusiondirectory/upgrade-confirm"]["default"]="false";
$elem["fusiondirectory/upgrade-canceled"]["type"]="error";
$elem["fusiondirectory/upgrade-canceled"]["description"]="FusionDirectory upgrade canceled
 The upgrade of FusionDirectory has been canceled on user request. The
 installation process will be aborted.
";
$elem["fusiondirectory/upgrade-canceled"]["descriptionde"]="Abbruch des Upgrades von FusionDirectory
 Der Upgrade-Vorgang von FusionDirectory wurde durch den Benutzer beendet. Der Installationsvorgang wird abgebrochen.
";
$elem["fusiondirectory/upgrade-canceled"]["descriptionfr"]="Mise à niveau de FusionDirectory annulée
 La mise à niveau de FusionDirectory a été annulée à la demande de l'utilisateur. Le processus d'installation va être interrompu.
";
$elem["fusiondirectory/upgrade-canceled"]["default"]="";
PKG_OptionPageTail2($elem);
?>
