<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sandboxgamemaker");

$elem["sandboxgamemaker/PAS_downloader_q"]["type"]="boolean";
$elem["sandboxgamemaker/PAS_downloader_q"]["description"]="Install default content from Platinum Arts?
 Platinum Arts, LLC, distributes default game content over the
 Internet.
 .
 This non-free content is a download of over 200 MB, overwriting the
 game content already in /usr/share/sandboxgamemaker.
 .
 If you choose to download and overwrite default game content, this
 action will be repeated for any further upgrade of the package,
 keeping this data up to date with recently released material.
";
$elem["sandboxgamemaker/PAS_downloader_q"]["descriptionde"]="Standardinhalte von Platinum Arts installieren?
 Platinum Arts, LLC verteilt Standard-Spieleinhalte über das Internet.
 .
 Dieser nicht freie Inhalt ist ein Download von mehr als 200 MB und überschreibt Spieldaten, die sich bereits in /usr/share/sandboxgamemaker befinden.
 .
 Falls Sie sich entscheiden, Standard-Spielinhalte herunterzuladen und zu überschreiben, wird bei allen weiteren Upgrades des Pakets ebenso verfahren. Auf diese Weise werden Ihre Daten mit kürzlich veröffentlichtem Material aktuell gehalten.
";
$elem["sandboxgamemaker/PAS_downloader_q"]["descriptionfr"]="Faut-il installer les données de Platinum Arts fournies par défaut ?
 La société Platinum Arts distribue des données de jeu par défaut via Internet.
 .
 Ces données non libres représentent plus de 200 Mo à télécharger, et écraseront les données de jeu déjà présentes dans /usr/share/sandboxgamemaker.
 .
 Si vous choisissez de télécharger et écraser les données de jeu par défaut, cette action sera répétée lors des prochaines mises à jour du paquet. Ces données seront donc maintenues à jour par rapport à la dernière version disponible.
";
$elem["sandboxgamemaker/PAS_downloader_q"]["default"]="";
PKG_OptionPageTail2($elem);
?>
