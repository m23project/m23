<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gcl");

$elem["gcl/default_gcl_ansi"]["type"]="boolean";
$elem["gcl/default_gcl_ansi"]["description"]="Use the work-in-progress ANSI build by default?
 GCL is in the process of providing an ANSI compliant image in addition to
 its traditional CLtL1 image still in production use.
 .
 Please see the README.Debian file for a brief description of these terms.
 Choosing this option will determine which image will be used by default
 when executing 'gcl'.
 .
 This setting may be overridden by setting the GCL_ANSI
 environment variable to any non-empty string for the ANSI build, and to
 the empty string for the CLtL1 build, e.g. GCL_ANSI=t gcl. The
 currently enforced build flavor will be reported in the initial startup
 banner.
";
$elem["gcl/default_gcl_ansi"]["descriptionde"]="Verwende standardmäßig den sich in Arbeit befindlichen ANSI-Build?
 GCL ist derzeit dabei, zusätzlich zu dem noch im Einsatz befindlichen traditionellen CLtL1-Image ein ANSI-konformes Image bereitzustellen.
 .
 Bitte lesen Sie die Datei README.Debian für eine kurze Beschreibung dieser Begriffe. Die Wahl dieser Option bestimmen, welches Image standardmäßig verwendet wird, wenn »gcl« ausgeführt wird.
 .
 Diese Einstellung kann mit der Umgebungsvariablen GCL_ANSI überschrieben werden. Jede nicht-leere Zeichenkette führt zur ANSI-Erstellung, und die leere Zeichenkette führt zum CLtL1-Bau, z.B. GCL_ANSI=t gcl. In der Startmeldung wird die derzeit erzwungene Bauart berichtet.
";
$elem["gcl/default_gcl_ansi"]["descriptionfr"]="Faut-il utiliser la compilation ANSI par défaut ?
 GCL est en passe de fournir une image respectant la norme ANSI en plus de l'image traditionnelle CLtL1, toujours utilisée en production.
 .
 Veuillez lire le fichier README.Debian pour une brève description de ces termes. Le choix de cette option déterminera quelle image sera utilisée par défaut en exécutant « gcl ».
 .
 Ce réglage peut être changé en affectant à la variable d'environnement GCL_ANSI une chaîne non vide pour la compilation ANSI, et une chaîne vide pour la compilation CLtL1, par exemple GCL_ANSI=t gcl. Le type de compilation sera affiché dans le bandeau de démarrage.
";
$elem["gcl/default_gcl_ansi"]["default"]="";
$elem["gcl/default_gcl_prof"]["type"]="boolean";
$elem["gcl/default_gcl_prof"]["description"]="Use the profiling build by default?
 GCL has optional support for profiling via gprof.
 .
 Please see the documentation for si::gprof-start and si::gprof-quit
 for details. As this build is slower than builds without gprof
 support, it is not recommended for final production use.
 .
 Set the GCL_PROF environment variable to the empty string for more
 optimized builds, or any non-empty string for profiling support; e.g.
 GCL_PROF=t gcl. If profiling is enabled, this will be reported
 in the initial startup banner.
";
$elem["gcl/default_gcl_prof"]["descriptionde"]="Verwende standardmäßig den Profiling-Build?
 GCL besitzt optionale Unterstützung für Profiling mittels Gprof.
 .
 Bitte lesen Sie die Dokumentation für si::gprof-start und si::gprof-quit für Details. Da ein solches Programm langsamer ist als ein Programm ohne Gprof-Unterstützung, wird dies für den Produktiveinsatz nicht empfohlen.
 .
 Setzen Sie die Umgebungsvariable GCL_PROF auf die leere Zeichenkette, um ein optimiertes Programm zu erhalten oder auf irgendeine nicht-leere Zeichenkette, für Profiling-Unterstützung; z.B. GCL_PROF=t gcl. Falls Profiling aktiviert ist, wird dies in der Startmeldung angezeigt.
";
$elem["gcl/default_gcl_prof"]["descriptionfr"]="Faut-il utiliser le profilage par défaut ?
 GCL permet optionnellement la gestion du profilage via gprof.
 .
 Veuillez vous reporter à la documentation de « si::gprof-start » et « si::gprof-quit » pour plus de détails. Comme cet exécutable est plus lent que les exécutables sans la gestion de gprof, il n'est pas recommandé de l'utiliser en production.
 .
 Veuillez affecter une chaîne vide à la variable d'environnement GCL_PROF pour des compilations optimisées, ou une chaîne non vide pour avoir la gestion du profilage; par exemple GCL_PROF=t gcl. Si le profilage est activé, cela sera affiché dans le bandeau de démarrage.
";
$elem["gcl/default_gcl_prof"]["default"]="";
PKG_OptionPageTail2($elem);
?>
