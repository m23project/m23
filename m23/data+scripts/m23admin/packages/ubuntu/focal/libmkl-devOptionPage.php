<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libmkl-dev");

$elem["libmkl-rt/title"]["type"]="title";
$elem["libmkl-rt/title"]["description"]="Intel Math Kernel Library (Intel MKL)
";
$elem["libmkl-rt/title"]["descriptionde"]="Intel Math Kernel Library (Intel MKL)
";
$elem["libmkl-rt/title"]["descriptionfr"]="Bibliothèque Math Kernel Library d'Intel (Intel MKL)
";
$elem["libmkl-rt/title"]["default"]="";
$elem["libmkl-rt/use-as-default-blas-lapack"]["type"]="boolean";
$elem["libmkl-rt/use-as-default-blas-lapack"]["description"]="Use libmkl_rt.so as the default alternative to BLAS/LAPACK?
 Intel MKL's Single Dynamic Library (SDL) is installed on your machine. This
 shared object can be used as an alternative to both libblas.so.3 and
 liblapack.so.3, so that packages built against BLAS/LAPACK can directly use
 MKL without rebuild.
 .
 However, MKL is non-free software, and in particular its source code is not
 publicly available. By using MKL as the default BLAS/LAPACK implementation,
 you might be violating the licensing terms of copyleft software that would
 become dynamically linked against it. Please verify that the licensing terms
 of the program(s) that you intend to use with MKL are compatible with the MKL
 licensing terms. For the case of software under the GNU General Public
 License, you may want to read this FAQ:
 .
     https://www.gnu.org/licenses/gpl-faq.html#GPLIncompatibleLibs
 .
 If you don't know what MKL is, or unwilling to set it as default, just choose
 the preset value or simply type Enter.
";
$elem["libmkl-rt/use-as-default-blas-lapack"]["descriptionde"]="libmkl_rt.so als die Standardalternative für BLAS/LAPACK verwenden?
 Intel MKL's Single Dynamic Library (SDL) ist auf Ihrer Maschine installiert. Diese Laufzeitbibliothek kann als Alternative für sowohl libblas.so.3 als auch liblapack.so.3 verwandt werden, so dass Pakete, die gegen BLAS/LAPACK gebaut sind, die MKL ohne neues Bauen direkt verwenden können.
 .
 Allerdings ist MKL nicht freie Software und insbesondere ist ihr Quellcode nicht öffentlich verfügbar. Indem Sie MKL als Standard-BLAS/LAPACK-Implementierung verwenden, könnten Sie die Lizenzierungsbedingungen von Software unter Copyleft verletzen, die dagegen dynamisch gelinkt werden könnte. Bitte überprüfen Sie, ob die Lizenzierungsbedingungen der Programme, die Sie mit der MKL verwenden wollen, kompatibel mit den MKL-Lizenzierungsbedingungen sind. Für den Fall von Software, die der GNU General Public License unterliegt, empfiehlt sich diese FAQ:
 .
     https://www.gnu.org/licenses/gpl-faq.html#GPLIncompatibleLibs
 .
 Falls Sie nicht wissen, was MKL ist oder Sie sie nicht als Vorgabe setzen möchten, wählen Sie einfach die Voreinstellung oder drücken die Eingabetaste.
";
$elem["libmkl-rt/use-as-default-blas-lapack"]["descriptionfr"]="Voulez-vous utiliser libmkl_rt.so comme alternative par défaut à BLAS/LAPACK ?
 La Single Dynamic Library (SDL) d'Intel MKL est installée sur votre machine. Cet objet partagé peut être utilisé comme alternative de libblas.so.3 ou de liblapack.so.3, de manière à ce que les paquets construits avec BLAS/LAPACK puissent utiliser directement MKL sans reconstruction.
 .
 Néanmoins, MKL n'est pas un logiciel libre et, en particulier, son code source n'est pas publiquement disponible. En utilisant MKL comme implémentation de BLAS/LAPACK, vous pourriez violer les termes de licence du logiciel à licence copyleft qui lui serait lié dynamiquement. Veuillez vérifier que les termes de la licence du ou des programmes que vous avez l'intention d'utiliser avec MKL sont compatibles avec les termes de la licence de MKL. Dans le cas d'un logiciel soumis à la Licence Publique Générale GNU, vous pouvez lire cette FAQ :
 .
     https://www.gnu.org/licenses/gpl-faq.html#GPLIncompatibleLibs
 .
 Si vous ignorez ce qu'est MKL, ou êtes peu enclin à le configurer comme défaut, il vous suffit de choisir la valeur préréglée ou tapez simplement Entrée.
";
$elem["libmkl-rt/use-as-default-blas-lapack"]["default"]="false";
$elem["libmkl-rt/exact-so-3-selections"]["type"]="multiselect";
$elem["libmkl-rt/exact-so-3-selections"]["choices"][1]="libblas.so.3";
$elem["libmkl-rt/exact-so-3-selections"]["choices"][2]="liblapack.so.3";
$elem["libmkl-rt/exact-so-3-selections"]["choices"][3]="libblas64.so.3";
$elem["libmkl-rt/exact-so-3-selections"]["description"]="Which of the these alternatives should point to MKL?
 Please select the alternatives that should point to MKL.
 The selection applies to all available architectures, and the related
 development packages will follow the same selection.
 .
 Typically the user may want to point both BLAS/LAPACK to MKL (libmkl_rt.so).
 Type Enter if you are not sure what to select.
";
$elem["libmkl-rt/exact-so-3-selections"]["descriptionde"]="Auf welche der Alternativen soll die MKL zeigen?
 Bitte wählen Sie die Alternative aus, auf die MKL zeigen soll. Die Auswahl wird für alle verfügbaren Architekturen angewandt und zugehörige Entwicklungspakete werden der gleichen Auswahl folgen.
 .
 Typischerweise möchte der Benutzer, dass sowohl BLAS als auch LAPACK auf MKKL (libmkl_rt.so) zeigen. Drücken Sie die Eingabetaste, falls Sie nicht sicher sind, was Sie wählen sollen.
";
$elem["libmkl-rt/exact-so-3-selections"]["descriptionfr"]="Lesquelles de ces alternatives devraient pointer vers MKL ?
 Veuillez choisir les alternatives qui devraient pointer vers MKL. La sélection s'applique à toutes les architectures disponibles, et la même sélection s'appliquera aux paquets de développement liés.
 .
 En général, l'utilisateur souhaite faire pointer à la fois BLAS et LAPACK vers MKL (libmkl_rt.so). Tapez Entrée si vous n'êtes pas sûr de votre choix.
";
$elem["libmkl-rt/exact-so-3-selections"]["default"]="libblas.so.3, liblapack.so.3, libblas64.so.3, liblapack64.so.3,";
PKG_OptionPageTail2($elem);
?>
