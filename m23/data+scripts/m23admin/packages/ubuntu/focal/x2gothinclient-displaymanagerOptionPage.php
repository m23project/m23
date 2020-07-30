<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("x2gothinclient-displaymanager");

$elem["shared/default-x-display-manager"]["type"]="select";
$elem["shared/default-x-display-manager"]["description"]="Default display manager:
 On X2Go thin clients X2Go Client is sort of used as a display manager. For
 this, X2Go Client gets started in TCE mode. The TCE acronym stands for
 thin client environment. In TCE mode, X2Go Client manages the default
 display of the X Window System.
 .
 Generally, a display manager is a program that provides graphical login
 capabilities for the X Window System. Other display managers for example
 are GDM, KDM, etc. Login is--in most cases--granted to the local system.
 .
 However, X2Go Client in TCE mode does appear like a display manager, but
 it will log you onto pre-defined X2Go sessions on remote servers.
 .
 As you are about to install X2Go Client in TCE mode on this machine and as
 you already have other display managers installed on this machine, please
 explicitly select which display manager is supposed to be the default for
 your system.
";
$elem["shared/default-x-display-manager"]["descriptionde"]="Standardmäßiger Display-Manager
 Auf X2Go Thinclients fungiert X2Go Client als in eine Art Display-Manager. Hierfür wird X2Go Client im TCE-Modus gestartet. Das Akronym TCE steht für Thin Client Environment. Im TCE-Modus verwaltet X2Go Client das standardmäßige Display des X-Window Systems.
 .
 Allgemein ist ein Display-Manager ein Programm, das die grafisch Anmeldung am System koordiniert. Andere Display-Manager sind zum Beispiel GDM, KDM, etc. Ein Anmeldung wird in den meisten Fällen am System lokal durchgeführt.
 .
 Startet hingegen X2Go Client im TCE-Modus, dann erscheint X2Go Client als Display-Manager. Allerdings findet die Anmeldung nicht lokal statt, sondern an einem entfernten X2Go Server.
 .
 Da Sie gerade dabei sind X2Go Client im TCE-Modus zu installieren und da auch noch weitere Display-Manager auf dem System installiert sind, wählen Sie bitte explizit aus, welcher Display-Manager standardmäßig verwendet werden soll.
";
$elem["shared/default-x-display-manager"]["descriptionfr"]="Gestionnaire d'affichage par défaut :
 Sur les clients légers X2Go, le client X2Go est en quelque sorte utilisé comme gestionnaire d'affichage. Pour cela, X2Go Client démarre en mode TCE. L'acronyme TCE signifie environnement client léger. En mode TCE, X2Go Client gère l'affichage par défaut du système X Window.
 .
 En général, un gestionnaire d'affichage est un programme qui fournit des capacités de connexion graphique pour le système X Window. D'autres gestionnaires d'affichage par exemple sont GDM, KDM, etc. La connexion est - dans la plupart des cas - accordée au système local.
 .
 Cependant, X2Go Client en mode TCE apparaît comme un gestionnaire d'affichage, mais il vous connectera à des sessions X2Go prédéfinies sur des serveurs distants.
 .
 Comme vous êtes sur le point d'installer X2Go Client en mode TCE sur cette machine et que vous avez déjà d'autres gestionnaires d'affichage installés sur cette machine, veuillez sélectionner explicitement quel gestionnaire d'affichage est censé être le gestionnaire par défaut pour votre système.
";
$elem["shared/default-x-display-manager"]["default"]="";
PKG_OptionPageTail2($elem);
?>
