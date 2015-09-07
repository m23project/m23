<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dash");

$elem["dash/sh"]["type"]="boolean";
$elem["dash/sh"]["description"]="Use dash as the default system shell (/bin/sh)?
 The system shell is the default command interpreter for shell scripts.
 .
 Using dash as the system shell will improve the system's overall
 performance. It does not alter the shell presented to interactive
 users.
";
$elem["dash/sh"]["descriptionde"]="Dash als Standard-Systemshell (/bin/sh) verwenden?
 Die Systemshell ist der Standard-Kommandointerpreter für Shell-Skripte.
 .
 Dash als Systemshell zu verwenden verbessert die Gesamtleistung des Systems. Dies verändert nicht die interaktiven Benutzern präsentierte Shell.
";
$elem["dash/sh"]["descriptionfr"]="Utiliser Dash comme interpréteur de ligne de commande par défaut (/bin/sh)?
 Le shell système est l'intérpréteur de commandes utilisé par le système.
 .
 Utiliser Dash comme interpréteur de ligne de commande du système améliorera les performances globales. Cela ne change pas l'intérpréteur utilisé interactivement par les utilisateurs.
";
$elem["dash/sh"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
