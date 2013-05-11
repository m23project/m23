<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gnumed-common");

$elem["gnumed/group"]["type"]="multiselect";
$elem["gnumed/group"]["description"]="GNUmed users:
 Please choose, among the list of all unprivileged users of the system,
 those who will be allowed running GNUmed.
";
$elem["gnumed/group"]["descriptionde"]="GNUmed Nutzer:
 Bitte wählen Sie aus der Liste aller nichtprivilegierten Nutzer des Systems all diejenigen aus, die GNUmed nutzen dürfen.
";
$elem["gnumed/group"]["descriptionfr"]="Utilisateurs GNUmed :
 Veuillez choisir, dans la liste de tous les utilisateurs du système, ceux qui seront autorisés à se servir de GNUmed.
";
$elem["gnumed/group"]["default"]="";
PKG_OptionPageTail2($elem);
?>
