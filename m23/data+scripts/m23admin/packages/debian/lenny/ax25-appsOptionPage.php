<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ax25-apps");

$elem["ax25-apps/suid_listen"]["type"]="boolean";
$elem["ax25-apps/suid_listen"]["description"]="Make listen setuid root?
 The listen program needs to make calls as the root user.  One way of doing
 this is to make the program setuid root.  This is generally a bad idea as
 there are better ways, such as using the sudo program, to do this.
 However, you have the option of making it setuid root here if you like.
";
$elem["ax25-apps/suid_listen"]["descriptionde"]="Soll das listen Programm setuid root laufen ?
 Das listen Programm muss einige aufrufe als root Benutzer durchführen. Eine Möglichkeit ist das Programm setuid root zu machen. Dies ist generell eine schlechte Idee, da es bessere Wege gibt dies zu erreichen, z.B. mit sudo. Jedoch können Sie mit dieser Option das Programm setuid root installieren.
";
$elem["ax25-apps/suid_listen"]["descriptionfr"]="Listen doit-il être « setuid root » ?
 Le programme listen doit effectuer certains appels avec les droits du super-utilisateur. Une méthode pour cela est que le programme s'exécute avec les droits du super-utilisateur (« setuid root »). C'est toutefois déconseillé car il existe d'autres méthodes, comme l'utilisation du programme sudo, pour cela. Cependant, vous pouvez choisir ici de rendre le programme « setuid root » si vous le préférez.
";
$elem["ax25-apps/suid_listen"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
