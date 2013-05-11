<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("nessus-plugins");

$elem["nessus-plugins/remove_unknown"]["type"]="boolean";
$elem["nessus-plugins/remove_unknown"]["description"]="Remove unknown Nessus plugins?
 The /var/lib/nessus/plugins directory includes some unknown plugins. This
 is probably because you downloaded additional plugins into it (e.g. by
 running nessus-update-plugins). You currently have ${countnewplugs}
 plugin(s) which are not provided by this package.
 .
 However, if you downloaded plugins for an older Nessus major
 version (e.g. from 1.x) they might not work properly with newer
 versions of Nessus, so it's sometimes advisable to remove them.
 .
 Note: This will apply to all your new installations/upgrades of this package
 until you reconfigure it. You should say 'No' if you plan to
 use nessus-update-plugins in the future.
";
$elem["nessus-plugins/remove_unknown"]["descriptionde"]="Unbekannte Nessus-Plugins entfernen?
 Im Verzeichnis /var/lib/nessus/plugins liegen einige unbekannte Plugins. Wahrscheinlich haben Sie zusätzliche Plugins heruntergeladen (z. B. durch das Kommando nessus-update-plugins). Momentan sind dort ${countnewplugs} Plugins, die nicht vom Paket bereitgestellt werden.
 .
 Auch wenn Sie Plugins einer älteren Haupt-Version von Nessus (z. B. 1.x) herunterladen, funktionieren diese eventuell nicht richtig mit neueren Versionen von Nessus, deshalb ist es manchmal nötig, sie zu löschen.
 .
 Achtung: Das wird für alle weiteren Installationen bzw. Aktualisierungen zutreffen bis Sie das anders einrichten. Sie sollten ablehnen, wenn Sie nessus-update-plugins in Zukunft nutzen möchten.
";
$elem["nessus-plugins/remove_unknown"]["descriptionfr"]="Faut-il supprimer les greffons inconnus de Nessus ?
 Le répertoire /var/lib/nessus/plugins contient des greffons (« plugins ») inconnus. Vous avez sans doute dû télécharger des greffons supplémentaires dans ce répertoire (p. ex. en exécutant nessus-update-plugins). Vous avez actuellement ${countnewplugs} greffon(s) qui ne sont pas fournis par ce paquet.
 .
 Cependant, si vous avez téléchargé des greffons pour une ancienne version majeure de Nessus (p. ex. pour la version 1.x), ils ne fonctionneront sans doute pas convenablement avec des versions plus récentes de Nessus. Ainsi, il est parfois recommandé de les supprimer.
 .
 Note : cela s'appliquera à toutes les nouvelles installations ou mises à jour de ce paquet tant que vous ne l'aurez pas reconfiguré. Vous devriez refuser si vous avez l'intention d'utiliser plus tard nessus-update-plugins.
";
$elem["nessus-plugins/remove_unknown"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
