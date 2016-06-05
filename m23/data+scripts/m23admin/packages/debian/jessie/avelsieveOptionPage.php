<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("avelsieve");

$elem["avelsieve/no_purge"]["type"]="error";
$elem["avelsieve/no_purge"]["description"]="No removal of installed sieve filters
 SquirrelMail users without access to sieveshell cannot remove filters
 they created through avelsieve. Those filters are NOT removed even
 when avelsieve is purged.
 .
 The sieve filters for all mailboxes should be checked as soon as
 possible.
";
$elem["avelsieve/no_purge"]["descriptionde"]="Installierte Sieve Filterregeln werden nicht entfernt
 SquirrelMail-Benutzer ohne direkten Zugang zur sieveshell können Filterregeln, die mit Avelsieve erstellt sind, nicht entfernen. Diese Filterregeln werden NICHT entfernt, selbst wenn das Paket mit \"purge\" gelöscht wird.
 .
 ALLE Sieve Filterregeln sollten schnellstmöglich geprüft werden.
";
$elem["avelsieve/no_purge"]["descriptionfr"]="Pas de suppression des filtres sieve installés
 Les utilisateurs de SquirrelMail qui n'ont pas accès à « sieveshell » ne peuvent pas supprimer les filtres créés avec Avelsieve. Ces filtres ne sont PAS supprimés quand le paquet d'Avelsieve est purgé.
 .
 Il est recommandé de vérifier les filtres sieve de toutes les boîtes aux lettres dès que possible.
";
$elem["avelsieve/no_purge"]["default"]="";
PKG_OptionPageTail2($elem);
?>
