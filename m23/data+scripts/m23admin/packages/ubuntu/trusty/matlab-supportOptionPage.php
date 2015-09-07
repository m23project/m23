<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("matlab-support");

$elem["matlab-support/title"]["type"]="title";
$elem["matlab-support/title"]["description"]="";
$elem["matlab-support/title"]["descriptionde"]="";
$elem["matlab-support/title"]["descriptionfr"]="";
$elem["matlab-support/title"]["default"]="";
$elem["matlab-support/matlab-install-glob"]["type"]="string";
$elem["matlab-support/matlab-install-glob"]["description"]="Location of MATLAB installation(s):
 The MATLAB interface needs to know where MATLAB is installed on this
 system. This can be specified as a single directory or, in case of multiple
 MATLAB installations, as a glob expression (any expression supported by bash,
 including extended pattern matching operators).
 .
 If, for example, the MATLAB executable is installed in /opt/matlab76/bin/matlab,
 please enter \"/opt/matlab76\". If there are multiple MATLAB versions
 installed, you can enter \"/opt/matlab*\" or a similar expression. Only
 matches that really contain a MATLAB executable will be considered.
 Therefore, a glob expression may match more than
 just MATLAB installation directories without negative side effects.
";
$elem["matlab-support/matlab-install-glob"]["descriptionde"]="Speicherort der MATLAB-Installation(en):
 Die MATLAB-Schnittstelle muss wissen, wo auf dem System MATLAB installiert ist. Dies kann als einzelnes Verzeichnis angegeben werden oder im Fall mehrerer MATLAB-Installationen als Glob-Ausdruck (jeder durch die Bash unterstützte Ausdruck, einschließlich erweiterter Mustervergleichsoperatoren).
 .
 Falls zum Beispiel das MATLAB-Programm in /opt/matlab76/bin/matlab installiert ist, geben Sie bitte »/opt/matlab76« ein. Falls mehrere MATLAB-Versionen installiert sind, können Sie »/opt/matlab*« oder einen ähnlichen Ausdruck eingeben. Nur Treffer, die wirklich die ausführbare MATLAB-Binärdatei enthalten, werden berücksichtigt. Daher darf ein Glob-Ausdruck ohne negative Nebeneffekte auf mehr Verzeichnisse als nur solche mit MATLAB-Installationen zutreffen.
";
$elem["matlab-support/matlab-install-glob"]["descriptionfr"]="Emplacement de MATLAB :
 L'interface de MATLAB doit connaître l'emplacement de MATLAB sur ce système. Il peut s'agir d'un unique répertoire ou, dans le cas d'installations multiples, d'un motif générique (« glob ») (n'importe quelle expression bash, en incluant les opérateurs étendus de correspondance de motifs).
 .
 Si, par exemple, l'exécutable de MATLAB est installé dans /opt/matlab76/bin/matlab, veuillez indiquer « /opt/matlab76 ». Si plusieurs versions de MATLAB sont installées, vous pouvez indiquer « /opt/matlab* » ou une expression similaire. Seules les correspondances qui contiennent vraiment un exécutable de MATLAB seront prises en compte. Par conséquent, à une expression glob peut correspondre plus d'un répertoire d'installation de MATLAB sans effets de bord indésirables.
";
$elem["matlab-support/matlab-install-glob"]["default"]="";
$elem["matlab-support/default-version"]["type"]="select";
$elem["matlab-support/default-version"]["description"]="Default MATLAB version:
 The following MATLAB versions were found on this system. Please select which
 one should serve as the default MATLAB on this system.
";
$elem["matlab-support/default-version"]["descriptionde"]="Standard-MATLAB-Version:
 Die folgenden MATLAB-Versionen wurden auf diesem System gefunden. Bitte wählen Sie aus, welche als Standard-MATLAB auf diesem System dienen soll.
";
$elem["matlab-support/default-version"]["descriptionfr"]="Version par défaut de MATLAB :
 Les versions ci-dessous de MATLAB ont été trouvées sur ce système. Veuillez choisir celle qui sera utilisée par défaut.
";
$elem["matlab-support/default-version"]["default"]="";
$elem["matlab-support/no-matlab-found"]["type"]="error";
$elem["matlab-support/no-matlab-found"]["description"]="No MATLAB installation found
 No MATLAB executables were found in the directories you specified.
 .
 This package requires at least one local installation of MATLAB.
";
$elem["matlab-support/no-matlab-found"]["descriptionde"]="Keine MATLAB-Installation gefunden
 Es wurden in den von Ihnen angegebenen Verzeichnissen keine MATLAB-Programme gefunden.
 .
 Dieses Paket benötigt mindestens eine lokale Installation von MATLAB.
";
$elem["matlab-support/no-matlab-found"]["descriptionfr"]="Installation de MATLAB introuvable
 Aucun exécutable de MATLAB n'a été trouvé dans les répertoires indiqués.
 .
 Ce paquet requiert au moins une installation locale de MATLAB.
";
$elem["matlab-support/no-matlab-found"]["default"]="";
$elem["matlab-support/mexbuild-user"]["type"]="string";
$elem["matlab-support/mexbuild-user"]["description"]="Authorized user for MATLAB:
 If MATLAB can only be launched by a limited set of user accounts, please
 specify one of these. This account will be used by other
 packages to build MEX extensions upon installation.
 .
 You may leave this field empty if any user account 
 (including root) is allowed to launch MATLAB.
";
$elem["matlab-support/mexbuild-user"]["descriptionde"]="Autorisierter Benutzer für MATLAB:
 Falls MATLAB nur durch eine begrenzte Auswahl von Benutzerkonten gestartet werden kann, geben Sie bitte eines davon an. Dieses Konto wird von anderen Paketen benutzt, um MEX-Erweiterungen während der Installation zu bauen.
 .
 Sie können dieses Feld leer lassen, falls es beliebigen Benutzerkonten (einschließlich Root) erlaubt ist, MATLAB zu starten.
";
$elem["matlab-support/mexbuild-user"]["descriptionfr"]="Identifiant autorisé pour MATLAB :
 Si MATLAB ne peut être exécuté que par un groupe limité d'utilisateurs, veuillez choisir un de ces utilisateurs dont le compte sera utilisé par d'autres paquets pour construire les extensions MEX lors de l'installation.
 .
 Vous pouvez laisser ce champ vide si n'importe quel identifiant (root inclus) est autorisé à exécuter MATLAB.
";
$elem["matlab-support/mexbuild-user"]["default"]="";
$elem["matlab-support/rename-libs"]["type"]="boolean";
$elem["matlab-support/rename-libs"]["description"]="Rename MATLAB's GCC libraries?
 A MATLAB installation is shipped with copies of GCC dynamic loadable
 libraries, which typically come from an old version of GCC.
 .
 These libraries sometimes cause conflicts.
 .
 If you choose this option, the conflicting libraries will be renamed by appending
 a \".bak\" extension. These libraries are located in the \"sys/os/glnx86\" or
 \"sys/os/glnxa64\" subdirectory of a MATLAB installation tree.
";
$elem["matlab-support/rename-libs"]["descriptionde"]="Die GCC-Bibliotheken von MATLAB umbenennen?
 Eine MATLAB-Installation wird mit Kopien dynamisch ladbarer GCC-Bibliotheken ausgeliefert, die typischerweise von einer alten GCC-Version stammen.
 .
 Diese Bibiotheken verursachen manchmal Konflikte.
 .
 Falls Sie sich für diese Option entscheiden, werden die problematischen Bibliotheken durch Anhängen der Erweiterung ».bak« umbenannt. Diese Bibliotheken liegen in den Unterverzeichnissen »sys/os/glnx86« oder »sys/os/glnxa64« des MATLAB-Installationsverzeichnisses.
";
$elem["matlab-support/rename-libs"]["descriptionfr"]="Faut-il renommer les librairies GCC de MATLAB ?
 MATLAB est distribué avec des copies des bibliothèques dynamiques chargeables de GCC, qui proviennent typiquement d'une ancienne version de GCC.
 .
 Ces bibliothèques peuvent parfois créer des conflits.
 .
 En choisissant cette option, les bibliothèques conflictuelles seront renommées en ajoutant une extension « .bak ». Elles se trouvent dans le sous-répertoire « sys/os/glnx86 » ou « sys/os/glnxa64 » d'une installation de MATLAB.
";
$elem["matlab-support/rename-libs"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
