<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("popfile");

$elem["popfile/backupcorpus"]["type"]="boolean";
$elem["popfile/backupcorpus"]["description"]="Do you wish to backup popfile's internal data?
 Popfile has changed the way it stores its internal data.  It will
 automatically upgrade from previous versions, but if you ever want to
 downgrade you will need a backup of your old data.
 .
 A backup of your current data will be done in
 /var/lib/popfile/backup-<version>.tar.gz. You will only need this if you
 wish to downgrade.
";
$elem["popfile/backupcorpus"]["descriptionde"]="";
$elem["popfile/backupcorpus"]["descriptionfr"]="Faut-il sauvegarder les données internes de popfile ?
 La méthode de stockage des données internes a changé dans popfile. La mise à jour depuis les anciennes versions sera automatique, mais si vous souhaitez revenir à la version antérieure, vous aurez besoin de vos anciennes données.
 .
 Une sauvegarde des données actuelles va être réalisée dans /var/lib/popfile/backup-<version>.tar.gz. Elles ne seront nécessaires que si vous revenez à la version antérieure.
";
$elem["popfile/backupcorpus"]["default"]="true";
$elem["popfile/uiport"]["type"]="string";
$elem["popfile/uiport"]["description"]="Web UI Port:
 This is the port on which popfile's web UI will listen.
";
$elem["popfile/uiport"]["descriptionde"]="";
$elem["popfile/uiport"]["descriptionfr"]="Port de l'interface utilisateur web :
 Veuillez indiquer le port où le serveur de l'interface web de popfile sera à l'écoute.
";
$elem["popfile/uiport"]["default"]="7070";
$elem["popfile/uilocal"]["type"]="boolean";
$elem["popfile/uilocal"]["description"]="Web UI accepts only local connections?
 Disabling the web UI for non local connections will increase security.
 If you decide to let popfile accept non local connections remember to set a
 password (in the security part of the web UI) as soon as possible.
";
$elem["popfile/uilocal"]["descriptionde"]="";
$elem["popfile/uilocal"]["descriptionfr"]="Souhaitez-vous limiter l'interface web aux connexions locales ?
 Pour améliorer la sécurité, vous pouvez désactiver l'interface web pour les connexions non locales. Si vous autorisez les connexions autres que locales, vous devez établir un mot de passe dès que possible (dans la partie « Securité » ou « Security » de l'interface web).
";
$elem["popfile/uilocal"]["default"]="true";
$elem["popfile/popport"]["type"]="string";
$elem["popfile/popport"]["description"]="POP Proxy Port:
 This is the port on which popfile's POP proxy will listen.
";
$elem["popfile/popport"]["descriptionde"]="";
$elem["popfile/popport"]["descriptionfr"]="Port du mandataire POP :
 Veuillez indiquer le port où le mandataire POP sera à l'écoute.
";
$elem["popfile/popport"]["default"]="7071";
$elem["popfile/poplocal"]["type"]="boolean";
$elem["popfile/poplocal"]["description"]="POP proxy accepts only local connections?
 Disabling the POP proxy for non local connections will increase security.
";
$elem["popfile/poplocal"]["descriptionde"]="";
$elem["popfile/poplocal"]["descriptionfr"]="Souhaitez-vous limiter le mandataire POP aux connexions locales ?
 Pour améliorer la sécurité, vous pouvez désactiver le mandataire POP pour les connexions non locales.
";
$elem["popfile/poplocal"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
