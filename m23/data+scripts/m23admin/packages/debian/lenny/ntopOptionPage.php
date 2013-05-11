<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ntop");

$elem["ntop/user"]["type"]="string";
$elem["ntop/user"]["description"]="Which is the name of the user to run the ntop daemon as ?
 The selected user will be created if not already available. Don't choose
 root, it is not recommended and will be discarded anyway.
 .
 If you select an empty string no user will be created on the system and
 you will need to do that configuration yourself.
";
$elem["ntop/user"]["descriptionde"]="Wie lautet der Name des Benutzers, unter dem der ntop-Daemon laufen soll?
 Der ausgewählte Benutzer wird erstellt, falls er noch nicht verfügbar ist. Wählen Sie nicht »root«, es ist nicht empfohlen und wird sowieso verworfen.
 .
 Falls Sie eine leere Zeichenkette auswählen, wird kein Benutzer im System erstellt und Sie werden das selber konfigurieren müssen.
";
$elem["ntop/user"]["descriptionfr"]="Identifiant utilisé par le démon ntop :
 L'identifiant indiqué sera créé s'il n'existe pas. Vous ne devez pas choisir le superutilisateur (« root »).
 .
 Si vous laissez ce champ vide, aucun utilisateur ne sera créé sur le système et vous devrez faire cette configuration vous-même.
";
$elem["ntop/user"]["default"]="ntop";
$elem["ntop/interfaces"]["type"]="string";
$elem["ntop/interfaces"]["description"]="Which interfaces should ntop listen on?
 Please enter a comma separated list of interfaces ntop should listen on.
";
$elem["ntop/interfaces"]["descriptionde"]="Auf welchen Schnittstellen soll ntop lauschen?
 Bitte geben Sie eine durch Komma getrennte Liste von Schnittstellen an, auf denen ntop lauschen soll.
";
$elem["ntop/interfaces"]["descriptionfr"]="Interfaces sur lesquelles ntop sera à l'écoute :
 Veuillez indiquer, séparées par des virgules, la liste des interfaces sur lesquelles ntop doit être à l'écoute.
";
$elem["ntop/interfaces"]["default"]="eth0";
PKG_OptionPageTail2($elem);
?>
