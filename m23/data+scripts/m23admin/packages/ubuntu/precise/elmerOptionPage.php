<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("elmer");

$elem["elmer/models"]["type"]="multiselect";
$elem["elmer/models"]["choices"][1]="helmholtz";
$elem["elmer/models"]["choices"][2]="navier-stokes";
$elem["elmer/models"]["choices"][3]="resultoutput";
$elem["elmer/models"]["choices"][4]="heatequation";
$elem["elmer/models"]["choices"][5]="linearelasticity";
$elem["elmer/models"]["choices"][6]="k-epsilon";
$elem["elmer/models"]["choices"][7]="meshdeform";
$elem["elmer/models"]["choices"][8]="advection-diffusion";
$elem["elmer/models"]["choices"][9]="elasticplate";
$elem["elmer/models"]["choices"][10]="electrostatics";
$elem["elmer/models"]["choices"][11]="freesurface";
$elem["elmer/models"]["choices"][12]="poissonboltzmann";
$elem["elmer/models"]["choices"][13]="reynolds";
$elem["elmer/models"]["choices"][14]="saveline";
$elem["elmer/models"]["choices"][15]="savescalars";
$elem["elmer/models"]["description"]="Elmer models to include in ElmerGUI:
 Elmer can solve equations from many models. In order to
 avoid excessive crowding of the ElmerGUI interface, only certain models are
 included at a given time. See the Elmer Models Manual at
 http://www.csc.fi/english/pages/elmer/documentation.
 .
 Please select the models you would like to include in ElmerGUI from the list.
 Note that this will not affect the availability of models in the
 solver, only their presence in the graphical interface.
";
$elem["elmer/models"]["descriptionde"]="In die ElmerGUI aufzunehmende Elmer-Modelle:
 Elmer kann Gleichungen aus vielen Modellen lÃ¶sen. Um eine massive ÃberfÃ¼llung der ElmerGUI-Schnittstelle zu vermeiden, sind zu jeder Zeit nur bestimmte Modelle enthalten. Lesen Sie hierzu das Â»Elmer Models ManualÂ« unter http://www.csc.fi/english/pages/elmer/documentation.
 .
 Bitte wÃ¤hlen Sie die Modelle aus der Liste aus, die Sie in die ElmerGUI aufnehmen mÃ¶chten. Beachten Sie, dass dies nicht die VerfÃ¼gbarkeit der Modelle im LÃ¶sungsteil (Â»SolverÂ«) beeinflusst, sondern nur ihre Anwesenheit in der graphischen Benutzerschnittstelle.
";
$elem["elmer/models"]["descriptionfr"]="Modèles d'Elmer à inclure dans l'interface graphique (ElmerGUI) :
 Elmer permet de résoudre les équations de nombreux modèles. Afin d'éviter de saturer l'interface graphique ElmerGUI, il est possible de restreindre le nombre de modèles gérés. Veuillez consulter la documentation des modèles d'Elmer à l'adresse http://www.csc.fi/english/pages/elmer/documentation.
 .
 Veuillez choisir dans la liste les modèles que vous souhaitez gérer dans l'interface graphique. Veuillez noter que cela ne désactivera pas les modèles dans le solveur : il ne seront simplement pas affichés dans l'interface graphique.
";
$elem["elmer/models"]["default"]="helmholtz, navier-stokes, resultoutput, heatequation, linearelasticity, k-epsilon, meshdeform";
PKG_OptionPageTail2($elem);
?>
