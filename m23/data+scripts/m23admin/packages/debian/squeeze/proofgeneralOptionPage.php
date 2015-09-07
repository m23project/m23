<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("proofgeneral");

$elem["proofgeneral/autoload"]["type"]="boolean";
$elem["proofgeneral/autoload"]["description"]="Should Proof General be auto-loaded by default?
 Please choose this option if you want to auto-load Proof General
 on this machine.
 .
 If you do so, it will be loaded globally and all local users will
 be able to use it with Emacs or XEmacs,
 without special settings in their personal configuration file.
 .
 If you don't choose this option, users will need to activate it
 from their personal settings for Emacs or XEmacs, or start it
 explicitly with the 'proofgeneral' command.
";
$elem["proofgeneral/autoload"]["descriptionde"]="Soll Proof General standardmäßig automatisch geladen werden?
 Bitte wählen Sie diese Option, falls Sie möchten, dass Proof General auf dieser Maschine automatisch geladen wird.
 .
 Falls Sie sich dafür entscheiden, wird er global geladen und alle lokalen Benutzer werden in der Lage sein, ihn mit Emacs oder XEmacs zu verwenden, ohne spezielle Einträge in ihren persönlichen Konfigurationsdateien vorzunehmen.
 .
 Falls Sie diese Option nicht wählen, müssen die Benutzer ihn in ihren persönlichen Einstellungen für Emacs oder XEmacs aktivieren, oder ihn explizit mit dem Befehl »proofgeneral« starten.
";
$elem["proofgeneral/autoload"]["descriptionfr"]="Proof General doit-il être chargé automatiquement par défaut ?
 Veuillez choisir cette option si vous souhaitez charger automatiquement Proof General sur cette machine.
 .
 Ainsi, il sera chargé de manière globale et tous les utilisateurs locaux pourront l'utiliser avec Emacs ou XEmacs sans action particulière à effectuer sur leurs fichiers de configuration.
 .
 Si vous ne choisissez pas cette option, les utilisateurs devront l'activer depuis leurs fichiers de configuration pour Emacs ou XEmacs ou alors le démarrer explicitement en utilisant la commande « proofgeneral ».
";
$elem["proofgeneral/autoload"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
