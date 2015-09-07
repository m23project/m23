<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("common-lisp-controller");

$elem["common-lisp-controller/short-site-name"]["type"]="string";
$elem["common-lisp-controller/short-site-name"]["description"]="Short Common Lisp site name:
 You can configure what the Common Lisp implementations are going to use as
 'short site name'.
 .
 This is mostly unused except in some error reporting tools.
";
$elem["common-lisp-controller/short-site-name"]["descriptionde"]="Kurzer Site-Name für Common Lisp:
 Sie können einstellen, was die Implementationen von Common Lisp als »short site name« verwenden werden.
 .
 Dies ist nahezu ungenutzt abgesehen von manchen Werkzeugen zum Berichten von Fehlern.
";
$elem["common-lisp-controller/short-site-name"]["descriptionfr"]="Nom court du site LISP commun :
 Il est possible de configurer le nom que les compilateurs LISP communs utiliseront comme « nom court de site » (« short site name »).
 .
 Ce nom est pratiquement inutilisé sauf par certains outils de vérification d'erreurs.
";
$elem["common-lisp-controller/short-site-name"]["default"]="Unknown";
$elem["common-lisp-controller/long-site-name"]["type"]="string";
$elem["common-lisp-controller/long-site-name"]["description"]="Long Common Lisp site name:
 You can configure what the Common Lisp implementations are going to use as
 'long site name'.
 .
 This is mostly unused except in some error reporting tools.
";
$elem["common-lisp-controller/long-site-name"]["descriptionde"]="Langer Site-Name für Common Lisp:
 Sie können einstellen, was die Implementationen von Common Lisp als »long site name« verwenden werden.
 .
 Dies ist nahezu ungenutzt abgesehen von manchen Werkzeugen zum Berichten von Fehlern.
";
$elem["common-lisp-controller/long-site-name"]["descriptionfr"]="Nom long du site LISP commun :
 Il est possible de configurer le nom que les compilateurs LISP communs utiliseront comme « nom long de site » (« long site name »).
 .
 Ce nom est pratiquement inutilisé sauf par certains outils de vérification d'erreurs.
";
$elem["common-lisp-controller/long-site-name"]["default"]="Site name not initialized";
PKG_OptionPageTail2($elem);
?>
