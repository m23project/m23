<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("man-db");

$elem["man-db/install-setuid"]["type"]="boolean";
$elem["man-db/install-setuid"]["description"]="Should man and mandb be installed 'setuid man'?
 The man and mandb program can be installed with the set-user-id bit set, so
 that they will run with the permissions of the 'man' user. This allows
 ordinary users to benefit from the caching of preformatted manual pages
 ('cat pages'), which may aid performance on slower machines.
 .
 Cached man pages only work if you are using an 80-column terminal, to avoid
 one user causing cat pages to be saved at widths that would be inconvenient
 for other users. If you use a wide terminal, you can force man pages to be
 formatted to 80 columns anyway by setting MANWIDTH=80.
 .
 Enabling this feature may be a security risk, so it is disabled by default.
 If in doubt, you should leave it disabled.
";
$elem["man-db/install-setuid"]["descriptionde"]="Möchten Sie man und mandb »setuid man« installieren?
 Die Programme »man« und »mandb« können so installiert werden, dass das »set-user-id-Bit« gesetzt ist und die Programme daher mit den Rechten des Benutzers »man« laufen. Dadurch kommen reguläre Benutzer in den Genuss von vorformatierten Handbuchseiten (sogenannten »cat-Seiten«), die auf langsameren Computern einen Geschwindigkeitsvorteil beim Benutzen der Handbuchseiten bringen.
 .
 Vorformatierte Handbuchseiten funktionieren nur mit Terminals mit normaler Breite (80 Buchstaben). Dadurch wird verhindert, dass ein Benutzer die Seiten mit einer Größe speichert, die für andere Benutzer unlesbar ist. Zukünftig wird sich dies konfigurieren lassen. Falls Sie ein breiteres Terminal verwenden, können Sie dennoch eine Breite der Handbuchseiten von 80 Zeichen durch Setzen der Umgebungsvariable MANWIDTH=80 erzwingen.
 .
 Das Einschalten dieses Funktionalität kann ein Sicherheitsrisiko sein. Daher ist es standardmäßig abgeschaltet. Falls Sie sich nicht sicher sind, sollten Sie es daher deaktiviert lassen.
";
$elem["man-db/install-setuid"]["descriptionfr"]="Faut-il exécuter les programmes man et mandb avec les droits de l'utilisateur « man » ?
 Les programmes man et mandb peuvent s'exécuter avec les droits de l'utilisateur « man ». Les utilisateurs ordinaires peuvent ainsi bénéficier du cache des pages de manuel pré-formatées (« catpage ») ce qui peut améliorer les performances des machines lentes.
 .
 Un terminal d'une largeur « normale » (80 caractères par ligne) est indispensable pour que la mise en cache des pages fonctionne. Cela évite qu'un utilisateur ne mette en cache des pages dans un format inutilisable par un autre utilisateur. Si vous utilisez un terminal plus large, vous pouvez forcer un formatage des pages sur 80 colonnes avec le paramètre MANWIDTH=80.
 .
 Cette fonctionnalité peut comporter un risque pour la sécurité du système ; elle n'est pas activée par défaut. Dans le doute, vous devriez la laisser désactivée.
";
$elem["man-db/install-setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
