<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("squidguard");

$elem["squidguard/dbreload"]["type"]="boolean";
$elem["squidguard/dbreload"]["description"]="Rebuild Squidguard blacklist database during postinst?
 Rebuilding the blacklist databases is time consuming and under some
 circumstances could cause problems.  With the breakout of individual
 blacklist section packages the time it takes for each package to rebuild
 will be extensive.  Also it may not be desireable to rebuild these
 databases on production servers.  You can manually perform a rebuild by
 running /usr/sbin/update-squidguard.
";
$elem["squidguard/dbreload"]["descriptionde"]="Squidguards Blacklist-Datenbanken am Ende dieser Installation erneuern?
 Das Erneuern der Blacklist-Datenbanken ist sehr zeitaufwändig und kann manchmal Probleme verursachen. Durch die Möglichkeit von individuellen Blacklist-Section-Paketen wird es sehr lange dauern, jedes Paket neu zu erstellen. Es könnte auch nicht erwünscht sein, diese Datenbanken auf produktiven Servern zu erneuern. Sie können das Neubauen durch das Kommando /usr/sbin/update-squidguard manuell einleiten.
";
$elem["squidguard/dbreload"]["descriptionfr"]="Reconstruire la base de données des listes noires de Squidguard pendant la post-installation ?
 La reconstruction des bases de données de liste noire prend du temps et peut causer des problèmes dans certaines circonstances. Avec la séparation en section des paquets individuels des listes noires, le temps de reconstruction de chaque paquet sera plus important. Ainsi, il n'est pas souhaitable de reconstruire chaque base de données sur des serveurs en production. Vous pouvez reconstruire vous-même chaque base de données en lançant /usr/sbin/update-squidguard.
";
$elem["squidguard/dbreload"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
