<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("arb-common");

$elem["arb/group"]["type"]="multiselect";
$elem["arb/group"]["description"]="Arb users:
 Please choose, among the list of all unprivileged users of the system,
 those who will be allowed running ${pkg}.
";
$elem["arb/group"]["descriptionde"]="Arb Nutzer:
 Bitte wählen Sie aus der Liste aller nichtprivilegierten Nutzer des Systems all diejenigen aus, die ${pkg} nutzen dürfen.
";
$elem["arb/group"]["descriptionfr"]="Liste des utilisateurs d'Arb :
 Veuillez choisir, parmi la liste des utilisateurs non privilégiés du système, ceux qui seront autorisés à utiliser ${pkg}.
";
$elem["arb/group"]["default"]="";
PKG_OptionPageTail2($elem);
?>
