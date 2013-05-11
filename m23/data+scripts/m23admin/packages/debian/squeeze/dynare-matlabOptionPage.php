<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dynare-matlab");

$elem["dynare-matlab/matlab-path"]["type"]="string";
$elem["dynare-matlab/matlab-path"]["description"]="Absolute path to MATLAB installation:
 Please enter the directory where you have installed MATLAB.
 .
 For example, if MATLAB executable is \"/usr/local/matlab76/bin/matlab\",
 please enter \"/usr/local/matlab76\".
";
$elem["dynare-matlab/matlab-path"]["descriptionde"]="Absoluter Pfad zur MATLAB-Installation:
 Bitte geben Sie das Verzeichnis an, in dem MATLAB installiert wurde.
 .
 Befindet sich das MATLAB-Programm zum Beispiel in »/usr/local/matlab76/bin/matlab« geben Sie bitte »/usr/local/matlab76« ein.
";
$elem["dynare-matlab/matlab-path"]["descriptionfr"]="Chemin complet de l'installation de MATLAB:
 Veuillez entrer le répertoire où vous avez installé MATLAB.
 .
 Par exemple, si l'exécutable MATLAB est \"/usr/local/matlab76/bin/matlab\", veuillez entrer \"/usr/local/matlab76\".
";
$elem["dynare-matlab/matlab-path"]["default"]="";
$elem["dynare-matlab/matlab-user"]["type"]="string";
$elem["dynare-matlab/matlab-user"]["description"]="UNIX user account able to launch MATLAB:
 If your MATLAB installation is such that only one or a limited set of UNIX
 user accounts can launch MATLAB, please indicate here the login of such an
 account.
 .
 If every UNIX user account (including root) is allowed to launch MATLAB,
 please leave this field empty.
";
$elem["dynare-matlab/matlab-user"]["descriptionde"]="UNIX-Benutzerkennung unter der MATLAB gestartet werden kann:
 Falls Sie MATLAB so installiert haben, dass nur eine oder eine begrenzte Anzahl an UNIX-Benutzerkennungen MATLAB starten kann, geben Sie hier den Anmeldenamen eines solchen Kontos an.
 .
 Falls MATLAB unter jedem UNIX-Benutzerkonto (inklusive root) gestartet werden darf, lassen Sie dieses Feld leer.
";
$elem["dynare-matlab/matlab-user"]["descriptionfr"]="Compte utilisateur UNIX capable de lancer MATLAB:
 Si votre installation de MATLAB est telle que seulement certains comptes utilisateurs UNIX peuvent lancer MATLAB, merci d'indiquer ici le nom d'un tel compte.
 .
 Si tous les comptes utilisateurs UNIX (super-utilisateur inclu) sont autorisés à lancer MATLAB, veuillez laisser ce champ vide.
";
$elem["dynare-matlab/matlab-user"]["default"]="";
$elem["dynare-matlab/license-manager"]["type"]="note";
$elem["dynare-matlab/license-manager"]["description"]="Please make sure that MATLAB license manager is running
 You have specified a UNIX user account for running MATLAB.
 .
 This probably means that your MATLAB installation uses a license manager.
 .
 If the license manager is not running, MEX files compilation will fail.
";
$elem["dynare-matlab/license-manager"]["descriptionde"]="Bitte stellen Sie sicher, dass der Lizenzmanager von MATLAB läuft
 Sie haben ein UNIX-Benutzerkonto zum Betrieb von MATLAB angegeben.
 .
 Das bedeutet wahrscheinlich, dass Ihre MATLAB-Installation einen Lizenzmanager verwendet.
 .
 Falls der Lizenzmanager nicht läuft, wird die Übersetzung von MEX-Dateien fehlschlagen.
";
$elem["dynare-matlab/license-manager"]["descriptionfr"]="Veuillez vous assurer que le gestionnaire de licences MATLAB est lancé
 Vous avez spécifié un compte utilisateur UNIX pour lancer MATLAB.
 .
 Cela signifie probablement que votre installation MATLAB utilise un gestionnaire de licences.
 .
 Si le gestionnaire de licences n'est pas lancé, la compilation des fichiers MEX échouera.
";
$elem["dynare-matlab/license-manager"]["default"]="";
$elem["dynare-matlab/rename-libs"]["type"]="boolean";
$elem["dynare-matlab/rename-libs"]["description"]="Rename MATLAB files conflicting with Dynare?
 A MATLAB installation is shipped with copies of GCC dynamic loadable
 libraries, which typically come from an old version of GCC.
 .
 This creates a conflict which makes Dynare fail when running the preprocessor.
 .
 If you accept it, the installation process will rename the conflicting
 files using a \".bak\" extension. These files are located in the \"sys/os/glnx86\"
 or \"sys/os/glnxa64\" subdirectory of your MATLAB installation.
 .
 Otherwise, Dynare will probably fail to run, and you will need to manually
 hack your MATLAB installation.
";
$elem["dynare-matlab/rename-libs"]["descriptionde"]="MATLAB-Dateien, die im Konflikt zu Dynare stehen, umbenennen?
 Eine MATLAB-Installation wird mit Kopien von Laufzeitbibliotheken des GCCs ausgeliefert, die typischerweise von einer alten Version von GCC stammen.
 .
 Dadurch entsteht ein Konflikt, der zum Scheitern von Dynare beim Ausführen des Präprozessors führt.
 .
 Falls Sie dies akzeptieren, wird der Installationsprozess die betreffenden Dateien umbenennen (mit der Endung ».bak«). Diese Dateien befinden sich im Unterverzeichnis »sys/os/glnx86« oder »sys/os/glnxa64« Ihrer MATLAB-Installation.
 .
 Andernfalls wird Dynare wahrscheinlich nicht funktionieren und Sie müssen Ihre MATLAB-Installation manuell bearbeiten.
";
$elem["dynare-matlab/rename-libs"]["descriptionfr"]="Renommer les fichiers MATLAB qui entrent en conflit avec Dynare ?
 Une installation de MATLAB est livrée avec des copies de bibliothèques dynamiques de GCC, qui proviennent généralement d'une ancienne version de GCC.
 .
 Cela crée un conflit quit fait échouer Dynare au moment de lancer le préprocesseur.
 .
 Si vous l'acceptez, le processus d'installation renommera les fichiers créateurs de conflits en utilisant une extension \".bak\". Ces fichiers sont situés dans le sous-répertoire \"sys/os/glnx86\" ou \"sys/os/glnxa64\" de votre installation MATLAB.
 .
 Sinon, Dynare échouera probablement à l'exécution, et vous devrez manuellement bidouiller votre installation MATLAB.
";
$elem["dynare-matlab/rename-libs"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
