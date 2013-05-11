<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libhesiod0");

$elem["hesiod/rhs"]["type"]="string";
$elem["hesiod/rhs"]["description"]="Hesiod domain for searches:
 Please enter the Hesiod RHS (right hand-side) to do searches in.
 .
 If the Hesiod server is 'ns.example.org' then the LHS will be '.ns', the
 RHS will be '.example.org' (note leading periods) and directory lookups
 will be performed as DNS requests to (e.g.) 'sam.passwd.ns.example.org'.
";
$elem["hesiod/rhs"]["descriptionde"]="Hesiod-Domain, in der gesucht werden soll:
 Bitte geben Sie die RHS (rechte Seite, »right hand-side«) von Hesiod für Suchen ein.
 .
 Falls der Hesiod-Server »ns.example.org« ist, dann ist die linke Seite (LHS, »left hand side«) ».ns«, die RHS ist dann ».example.org« (beachten Sie die einleitenden Punkte) und Verzeichnisabfragen werden als DNS-Anfragen an (z.B.) »sam.passwd.ns.example.org« gerichtet.
";
$elem["hesiod/rhs"]["descriptionfr"]="Domaine Hesiod pour les recherches :
 Veuillez indiquer la « RHS » (« right hand-side » : partie droite) Hesiod dans laquelle auront lieu les recherches.
 .
 Si le serveur Hesiod est « ns.example.org », la partie gauche sera alors « .ns » et la partie droite « .example.org » (veuillez noter les points initiaux). Les recherches dans le répertoires se feront alors sous forme de requêtes DNS sur, par exemple, « sam.passwd.ns.example.org ».
";
$elem["hesiod/rhs"]["default"]=".athena.mit.edu";
$elem["hesiod/lhs"]["type"]="string";
$elem["hesiod/lhs"]["description"]="Hesiod prefix for searches:
 Please enter the Hesiod LHS (left hand-side) to do searches in.
 .
 If the Hesiod server is 'ns.example.org' then the LHS will be '.ns', the
 RHS will be '.example.org' (note leading periods) and directory lookups
 will be performed as DNS requests to (e.g.) 'sam.passwd.ns.example.org'.
";
$elem["hesiod/lhs"]["descriptionde"]="Hesiod-Präfix für Recherchen:
 Bitte geben Sie die LHS (linke Seite, »left hand-side«) von Hesiod für Suchen ein.
 .
 Falls der Hesiod-Server »ns.example.org« ist, dann ist die linke Seite (LHS, »left hand side«) ».ns«, die RHS ist dann ».example.org« (beachten Sie die einleitenden Punkte) und Verzeichnisabfragen werden als DNS-Anfragen an (z.B.) »sam.passwd.ns.example.org« gerichtet.
";
$elem["hesiod/lhs"]["descriptionfr"]="Préfixe Hesiod pour les recherches :
 Veuillez indiquer la « LHS » (« left hand-side » : partie gauche) Hesiod dans laquelle auront lieu les recherches.
 .
 Si le serveur Hesiod est « ns.example.org », la partie gauche sera alors « .ns » et la partie droite « .example.org » (veuillez noter les points initiaux). Les recherches dans le répertoires se feront alors sous forme de requêtes DNS sur, par exemple, « sam.passwd.ns.example.org ».
";
$elem["hesiod/lhs"]["default"]=".ns";
$elem["hesiod/classes"]["type"]="string";
$elem["hesiod/classes"]["description"]="DNS class search order:
 Hesiod looks up names using DNS TXT records. In addition to using the
 standard IN DNS class for Internet names, it also uses by default the
 special HS class.
 .
 Please enter the class search order (the default value is suitable for
 most sites). There should be no spaces in this search order value.
 .
 Sites using
 older Hesiod installations may need to use the 'HS,IN' search order.
";
$elem["hesiod/classes"]["descriptionde"]="Such-Reihenfolge der DNS-Klassen:
 Hesiod schlägt Namen in DNS TXT-Datensätzen nach. Zusätzlich zur Verwendung der normalen IN DNS-Klasse für Internet-Namen verwendet es standardmäßig auch spezielle HS-Klassen.
 .
 Bitte geben Sie die Klassen-Suchreihenfolge ein (der voreingestellte Wert ist für die meisten Sites geeignet). Es sollte im Wert der Suchreihenfolge keine Leerzeichen geben.
 .
 Sites, die eine ältere Hesiod-Installation verwenden, könnten die Suchreihenfolge »HS,IN« benötigen.
";
$elem["hesiod/classes"]["descriptionfr"]="Ordre de recherche dans les classes DNS :
 Hesiod effectue ses recherches en utilisant les enregistrements TXT du service de noms de domaine (DNS). En plus d'utiliser la classe standard IN du DNS pour rechercher les noms Internet, il utilise également par défaut la classe spéciale HS.
 .
 Veuillez indiquer l'ordre de recherche dans les classes (la valeur par défaut est adaptée à la plupart des sites). Ce réglage ne doit pas comprendre d'espace.
 .
 Sur certains sites où des installations anciennes de Hesiod sont encore utilisées, il pourrait être nécessaire d'indiquer plutôt « HS,IN ».
";
$elem["hesiod/classes"]["default"]="IN,HS";
PKG_OptionPageTail2($elem);
?>
