<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dvi2ps");

$elem["dvi2ps/fontdesc"]["type"]="note";
$elem["dvi2ps/fontdesc"]["description"]="Old fontdesc file backuped
 The old fontdesc could not work with this version of dvi2ps so it was
 renamed as /etc/texmf/dvi2ps/fontdesc.disable and the new version of
 fontdesc is installed now.
 .
 If you don't know what is fontdesc or you haven't modified it, you should
 or might remove unnecessary fontdesc.disable file.
 .
 If you had modified fontdesc then please compare fontdesc with
 fontdesc.disable and you could edit fontdesc so that dvi2ps works in the
 same way as the previous version.  After that, you should or might remove
 unnecessary fontdesc.disable file.
";
$elem["dvi2ps/fontdesc"]["descriptionde"]="Alte Version von fontdesc gesichert
 Die alte Version von fontdesc funktioniert nicht mit dieser Version von dvi2ps, deshalb wurde die Datei in /etc/texmf/dvi2ps/fontdesc.disable umbenannt und eine neue Version von fontdesc wird jetzt installiert.
 .
 Wenn Sie fontdesc gar nicht kennen oder es nie verändert haben, sollten Sie die nicht mehr benötigte Datei fontdesc.disable löschen.
 .
 Wenn Sie fontdesc bereits geändert haben, dann sollten Sie die Datei fontdesc mit fontdesc.disable vergleichen und Änderungen nach fontdesc übernehmen, damit es wie die vorherige Version arbeitet.  Danach können Sie die nicht mehr benötigte Datei fontdesc.disable löschen.
";
$elem["dvi2ps/fontdesc"]["descriptionfr"]="L'ancien fichier fontdesc a été sauvegardé
 L'ancien fichier fontdesc ne peut plus être utilisé avec cette version de dvi2ps. Il a donc été renommé en /etc/texmf/dvi2ps/fontdesc.disable et la nouvelle version de ce fichier a été installée.
 .
 Si vous ne savez pas ce qu'est ce fichier ou si vous ne l'avez pas modifié, vous pouvez supprimer le fichier fontdesc.disable qui est inutile.
 .
 Si vous aviez modifié fontdesc, veuillez alors comparer fontdesc et fontdesc.disable, puis modifier fontdesc afin que dvi2ps puisse fonctionner comme la version précédente. Vous pourrez ensuite supprimer le fichier inutile fontdesc.disable.
";
$elem["dvi2ps/fontdesc"]["default"]="";
$elem["dvi2ps/configk"]["type"]="note";
$elem["dvi2ps/configk"]["description"]="Old configk file backuped
 The old configk could not work with the current tetex environment, so it
 was renamed as /etc/texmf/dvi2ps/configk.disable and the new version of
 configk is installed now.
 .
 If you don't know what is configk or you haven't modified it, you should
 or might remove unnecessary configk.disable file.
 .
 If you had modified configk then please compare configk with
 configk.disable and you could edit configk so that dvi2ps works in the
 same way as the previous version.  After that, you should or might remove
 unnecessary configk.disable file.
";
$elem["dvi2ps/configk"]["descriptionde"]="Alte Version von configk gesichert
 Die alte Version von configk funktioniert nicht mit der aktuellen tetex-Umgebung, deshalb wurde die Datei in /etc/texmf/dvi2ps/configk.disable umbenannt und eine neue Version von configk wird jetzt installiert.
 .
 Wenn Sie configk gar nicht kennen oder es nie verändert haben, sollten Sie die nicht mehr benötigte Datei configk.disable löschen.
 .
 Wenn Sie configk bereits geändert haben, dann sollten Sie die Datei configk mit configk.disable vergleichen und Änderungen nach configk übernehmen, damit es wie die vorherige Version arbeitet.  Danach können Sie die nicht mehr benötigte Datei configk.disable löschen.
";
$elem["dvi2ps/configk"]["descriptionfr"]="L'ancien fichier configk a été sauvegardé
 L'ancien fichier configk ne peut plus être utilisé avec l'environnement actuel de TeTeX. Il a donc été renommé en /etc/texmf/dvi2ps/configk.disable et la nouvelle version de ce fichier a été installée.
 .
 Si vous ne savez pas ce qu'est ce fichier ou si vous ne l'avez pas modifié, vous pouvez supprimer le fichier configk.disable qui est inutile.
 .
 Si vous aviez modifié configk, veuillez alors comparer configk et configk.disable, puis modifier configk afin que dvi2ps puisse fonctionner comme la version précédente. Vous pourrez ensuite supprimer le fichier inutile configk.disable.
";
$elem["dvi2ps/configk"]["default"]="";
PKG_OptionPageTail2($elem);
?>
