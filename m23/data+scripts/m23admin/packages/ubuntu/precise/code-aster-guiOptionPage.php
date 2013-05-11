<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("code-aster-gui");

$elem["astk/platform"]["type"]="select";
$elem["astk/platform"]["choices"][1]="LINUX";
$elem["astk/platform"]["choices"][2]="P_LINUX";
$elem["astk/platform"]["choices"][3]="LINUX64";
$elem["astk/platform"]["description"]="Aster platform:
 Select Aster platform.
";
$elem["astk/platform"]["descriptionde"]="Aster-Plattform:
 Wählen Sie die Aster-Plattform aus.
";
$elem["astk/platform"]["descriptionfr"]="Plateforme Aster :
 Veuillez choisir la plateforme Aster.
";
$elem["astk/platform"]["default"]="LINUX64";
$elem["astk/domainname"]["type"]="string";
$elem["astk/domainname"]["description"]="ASTK server domain name:
 Please enter the domain name of the server that this ASTK client
 should connect to.
";
$elem["astk/domainname"]["descriptionde"]="ASTK-Server-Domain-Name:
 Bitte geben Sie den Domain-Namen des Servers ein, mit dem sich dieser ASTK-Client verbinden soll.
";
$elem["astk/domainname"]["descriptionfr"]="Nom de domaine du serveur ASTK :
 Veuillez indiquer le nom de domaine du serveur auquel ce client ASTK doit se connecter.
";
$elem["astk/domainname"]["default"]="";
$elem["astk/servername"]["type"]="string";
$elem["astk/servername"]["description"]="ASTK server host name:
 Please enter the host name (without domain name) of the server
 that this ASTK client should connect to.
";
$elem["astk/servername"]["descriptionde"]="ASTK-Server-Rechnername:
 Bitte geben Sie den Rechnernamen (ohne Domain-Name) des Servers an, mit dem sich dieser ASTK-Client verbinden soll.
";
$elem["astk/servername"]["descriptionfr"]="Nom d'hôte du serveur ASTK :
 Veuillez indiquer le nom d'hôte (sans le nom de domaine) du serveur auquel ce client ASTK doit se connecter.
";
$elem["astk/servername"]["default"]="";
$elem["astk/node"]["type"]="string";
$elem["astk/node"]["description"]="ASTK client node name:
 Please enter the public name by which this client will be known on
 the network. It must be a unique name within the domain.
";
$elem["astk/node"]["descriptionde"]="ASTK-Client-Knoten-Name:
 Bitte geben Sie den öffentlichen Namen an, unter dem dieser Client im Netzwerk sichtbar sein wird. Es muss ein Name sein, der innerhalb der Domain einmalig ist.
";
$elem["astk/node"]["descriptionfr"]="Nom de nœud du client ASTK :
 Veuillez indiquer le nom public par lequel ce client sera vu sur le réseau. Cela doit être un nom unique au sein du domaine.
";
$elem["astk/node"]["default"]="";
$elem["astk/EDITOR"]["type"]="select";
$elem["astk/EDITOR"]["choices"][1]="/usr/bin/nedit";
$elem["astk/EDITOR"]["choices"][2]="/usr/bin/gedit --display=\@D";
$elem["astk/EDITOR"]["choices"][3]="/usr/bin/kwrite --display \@D";
$elem["astk/EDITOR"]["choices"][4]="/usr/bin/xemacs -display \@D";
$elem["astk/EDITOR"]["choices"][5]="/usr/bin/emacs -display \@D";
$elem["astk/EDITOR"]["choices"][6]="/usr/bin/xedit -display \@D";
$elem["astk/EDITOR"]["description"]="Standard editor:
 Please select the command line that ASTK should use to launch an
 editor.
";
$elem["astk/EDITOR"]["descriptionde"]="Standard-Editor:
 Bitte wählen Sie die Befehlszeile, die ASTK benutzen soll, um einen Editor zu starten.
";
$elem["astk/EDITOR"]["descriptionfr"]="Éditeur standard :
 Veuillez choisir la ligne de commande que ASTK doit utiliser pour démarrer l'éditeur.
";
$elem["astk/EDITOR"]["default"]="/usr/bin/nedit";
$elem["astk/TERMINAL"]["type"]="select";
$elem["astk/TERMINAL"]["choices"][1]="/usr/bin/xterm -display \@D -e \@E";
$elem["astk/TERMINAL"]["choices"][2]="/usr/bin/gnome-terminal --display=\@D --command=\@E";
$elem["astk/TERMINAL"]["description"]="Standard terminal emulator:
 Please select the command line that ASTK should use to launch a
 terminal window.
";
$elem["astk/TERMINAL"]["descriptionde"]="Standard-Terminal-Emulator:
 Bitte wählen Sie die Befehlszeile, die ASTK benutzen soll, um ein Terminal-Fenster zu starten.
";
$elem["astk/TERMINAL"]["descriptionfr"]="Émulateur de terminal standard :
 Veuillez choisir la ligne de commande que ASTK doit utiliser pour ouvrir un terminal.
";
$elem["astk/TERMINAL"]["default"]="/usr/bin/gnome-terminal --display=\@D --command=\@E";
$elem["astk/MPIRUN"]["type"]="select";
$elem["astk/MPIRUN"]["choices"][1]="LAM";
$elem["astk/MPIRUN"]["choices"][2]="OPENMPI";
$elem["astk/MPIRUN"]["description"]="ASTK server MPI implementation:
 Please select the MPI implementation used by the server that this ASTK
 client should connect to.
";
$elem["astk/MPIRUN"]["descriptionde"]="ASTK-Server-MPI-Implementierung:
 Bitte wählen Sie die MPI-Implementierung, die der Server benutzt, mit dem sich dieser ASTK-Client verbinden soll.
";
$elem["astk/MPIRUN"]["descriptionfr"]="Version MPI du serveur ASTK :
 Veuillez choisir la version MPI utilisée par le serveur auquel ce client ASTK doit se connecter.
";
$elem["astk/MPIRUN"]["default"]="OPENMPI";
$elem["astk/IFDEF"]["type"]="select";
$elem["astk/IFDEF"]["choices"][1]="LINUX";
$elem["astk/IFDEF"]["description"]="ASTK server bit width:
 Please select the bit width of the server that this ASTK client should
 connect to.         
";
$elem["astk/IFDEF"]["descriptionde"]="ASTK-Server-Bit-Breite:
 Bitte wählen Sie die Bit-Breite des Servers, mit dem sich dieser ASTK-Client verbinden soll.
";
$elem["astk/IFDEF"]["descriptionfr"]="Largeur d'octet du serveur ASTK :
 Veuillez choisir la largeur d'octet du serveur auquel ce client ASTK doit se connecter.
";
$elem["astk/IFDEF"]["default"]="LINUX64";
PKG_OptionPageTail2($elem);
?>
