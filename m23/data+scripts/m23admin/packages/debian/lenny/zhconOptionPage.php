<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("zhcon");

$elem["zhcon/rebuild_kernel"]["type"]="note";
$elem["zhcon/rebuild_kernel"]["description"]="You MUST rebuild kernel with framebuffer support.
 Please read README.Debian and README. zhcon need a kernel supporting
 framebuffer, you have to build it by yourself.
";
$elem["zhcon/rebuild_kernel"]["descriptionde"]="Sie MÜSSEN den Kernel mit Framebuffer-Unterstützung neu bauen.
 Bitte lesen Sie die Dateien README.Debian und README. Zhcon benötigt einen Kernel mit Framebuffer-Unterstützung, den Sie selber erstellen müssen.
";
$elem["zhcon/rebuild_kernel"]["descriptionfr"]="Noyau compilé sans la gestion du tampon vidéo (« framebuffer »)
 Veuillez consulter les fichiers README.Debian et README. Zhcon a besoin d'un noyau gérant le tampon vidéo (« framebuffer ») et c'est à vous de le compiler.
";
$elem["zhcon/rebuild_kernel"]["default"]="";
PKG_OptionPageTail2($elem);
?>
