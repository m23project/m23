<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xastir");

$elem["xastir/install-setuid"]["type"]="boolean";
$elem["xastir/install-setuid"]["description"]="Should non-superusers be able to use native AX.25 interfaces?
 Xastir can be installed in a way that allows members of the \"xastir-ax25\"
 system group to use a native Linux AX.25 interface from within Xastir.
 Where available this configuration uses Linux capabilities in order to
 limit the process's privileges to only those required, falling back on
 installing the binary setuid where Linux capabilities are not available.
 .
 This is recommended over the alternative of running Xastir directly as
 root, but enabling it may be a security risk, so it is disabled by
 default. If in doubt, or if you do not intend to use native AX.25
 interfaces (using a serial TNC or Internet connection instead), it is
 suggested to leave it disabled.
 .
 For more detailed information please see
 /usr/share/doc/xastir/README.Debian.
";
$elem["xastir/install-setuid"]["descriptionde"]="Sollen Nichtsuperuser imstande sein, systemeigene AX.25-Schnittstellen zu verwenden?
 Xastir kann auf eine Weise installiert werden, die es Mitgliedern der Systemgruppe »xastir-ax25« gestattet, systemeigene Linux-AX.25-Schnittstellen aus Xastir heraus zu benutzen. Wo sie verfügbar sind, verwendet diese Konfiguration Linux-Fähigkeiten, um die Rechte des Prozesses auf das Nötigste zu beschränken und greift auf die Installation von Setuid zurück, falls diese nicht verfügbar sind.
 .
 Dies wird gegenüber der Alternative, Xastir direkt als Root auszuführen, empfohlen. Es zu aktivieren kann jedoch ein Sicherheitsrisiko darstellen, weswegen es standardmäſig deaktiviert ist. Falls Sie sich nicht sicher sind oder keine systemeigenen AX.25-Schnittstellen verwenden möchten (weil Sie stattdessen serielles TNC oder eine Internetverbindung benutzen), wird geraten, es deaktiviert zu lassen.
 .
 Bitte entnehmen Sie /usr/share/doc/xastir/README.Debian weitere Einzelheiten.
";
$elem["xastir/install-setuid"]["descriptionfr"]="Faut-il autoriser les utilisateurs non privilégiés à utiliser les interfaces AX.25 ?
 Xastir peut être installé de manière à ce que les membres du groupe système « xastir-ax25 » soient autorisés à utiliser l'interface native Linux AX.25. Lorsque c'est possible, cette configuration se sert des possibilités de Linux pour limiter les privilèges du processus à ceux requis. Sur des systèmes non Linux, les binaires sont installés pour s'exécuter avec les privilèges du superutilisateur (« setuid »).
 .
 Cette configuration est recommandée par rapport à l'alternative consistant à exécuter Xastir en tant que superutilisateur (« root »), mais son activation peut introduire un risque de sécurité, par conséquent elle est désactivée par défaut. Dans le doute ou si vous n'avez pas l'intention d'utiliser l'interface native AX.25 (par exemple en utilisant à la place un contrôleur de nœud de terminal en série - « serial TCN » - ou une connection internet), il est conseillé de la laisser désactivée.
 .
 Pour davantage d'information, veuillez lire /usr/share/doc/xastir/README.Debian.
";
$elem["xastir/install-setuid"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
