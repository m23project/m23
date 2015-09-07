<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("resolvconf");

$elem["resolvconf/linkify-resolvconf"]["type"]="boolean";
$elem["resolvconf/linkify-resolvconf"]["description"]="Prepare /etc/resolv.conf for dynamic updates?
 The resolvconf package contains the infrastructure required for
 dynamic updating of the resolver configuration file. Part of the
 necessary infrastructure is a symbolic link from /etc/resolv.conf to
 /etc/resolvconf/run/resolv.conf. If you choose this option then this
 link will be created; the existing /etc/resolv.conf file will be
 preserved as /etc/resolvconf/resolv.conf.d/original, and will be
 restored if this package is removed.
 .
 Declining this option will prevent future installations from
 recreating the symbolic link and therefore the resolver configuration
 file will not be dynamically updated. Dynamic updating can then be
 activated following instructions in the README file.
 .
 The presence of resolvconf can affect the behavior of other programs,
 so it should not be left installed if unconfigured.
";
$elem["resolvconf/linkify-resolvconf"]["descriptionde"]="/etc/resolv.conf für dynamische Aktualisierungen vorbereiten?
 Das Paket Resolvconf enthält die für das dynamische Aktualisieren der resolver-Konfigurationsdatei benötigte Infrastruktur. Teil der notwendigen Infrastruktur ist ein symbolischer Link von /etc/resolv.conf auf /etc/resolvconf/run/resolv.conf. Falls Sie diese Option wählen, wird dieser Link angelegt. Die bestehende /etc/resolv.conf-Datei wird als /etc/resolvconf/resolv.conf.d/original erhalten; sie wird wiederhergestellt, falls dieses Paket entfernt wird.
 .
 Falls Sie diese Option ablehnen, werden zukünftige Installationen daran gehindert, diesen Link neu zu erstellen und die Konfigurationsdatei des Resolvers (Namensauflösers) wird somit nicht dynamisch aktualisiert. In der Datei README wird beschrieben, wie das dynamische Aktualisieren aktiviert werden kann.
 .
 Die Anwesenheit von Resolvconf kann das Verhalten anderer Programme beeinflussen, daher sollte es im unkonfigurierten Zustand nicht installiert bleiben.
";
$elem["resolvconf/linkify-resolvconf"]["descriptionfr"]="Faut-il préparer /etc/resolv.conf pour les mises à jour dynamiques ?
 Le paquet resolvconf installe l'infrastructure permettant la mise à jour du fichier de configuration du résolveur. Une des modifications nécessaires est la mise en place d'un lien symbolique depuis /etc/resolv.conf vers /etc/resolvconf/run/resolv.conf. Si vous choisissez cette option, ce lien sera créé. Le fichier /etc/resolv.conf sera conservé sous le nom de /etc/resolvconf/resolv.conf.d/original. Si ce paquet est enlevé, le fichier sera remis dans son état original.
 .
 Si vous ne choisissez pas cette option, les installations ultérieures ne tenteront pas de créer ce lien et le fichier de configuration ne sera pas mis à jour dynamiquement. Pour activer la mise à jour dynamique, il sera alors nécessaire de suivre les instructions du fichier README.
 .
 La présence de resolvconf peut modifier le comportement de certains programmes et il ne devrait pas être laissé en place s'il n'est pas configuré.
";
$elem["resolvconf/linkify-resolvconf"]["default"]="true";
$elem["resolvconf/downup-interfaces"]["type"]="note";
$elem["resolvconf/downup-interfaces"]["description"]="Network interfaces reconfiguration mandatory
 Once resolvconf is installed, interface configurers supply name server
 information to it (which it then makes available to the C library resolver
 and to DNS caches). However, they do this only when they bring up interfaces.
 Therefore for resolvconf's name server information to be up to date after
 initial installation it is necessary to reconfigure interfaces (that is,
 to take them down and then to bring them up again) and to restart
 DNS caches.
";
$elem["resolvconf/downup-interfaces"]["descriptionde"]="Neukonfiguration der Netzschnittstellen zwingend
 Sobald Resolvconf installiert ist, versorgen die Schnittstellenkonfigurierer es mit Nameserverinformationen (welche es dann dem C-Bibliothek-Resolver und dem DNS-Cache zugängig macht). Allerdings geschieht dies nur, wenn die Schnittstelle hochgefahren wird. Deshalb müssen die Schnittstellen nach der Erstinstallation rekonfiguriert werden, damit die Nameserver-Informationen von Resolvconf aktuell sind (d.h. die Schnittstellen müssen runter- und dann wieder hochgefahren werden) und DNS-Caches müssen neugestartet werden.
";
$elem["resolvconf/downup-interfaces"]["descriptionfr"]="Configuration obligatoire des interfaces réseau
 Une fois que resolvconf est installé, les configurateurs d'interfaces lui fournissent l'information du serveur de noms (qu'il rend alors disponible au résolveur de la bibliothèque C et aux caches DNS). Cependant, cela ne se produit qu'au démarrage des interfaces. Par conséquent, pour que l'information du serveur de noms de resolvconf soit mise à jour après l'installation du paquet, il est nécessaire de redémarrer les interfaces. Arrêtez-les, puis redémarrez-les et réinitialisez les caches DNS.
";
$elem["resolvconf/downup-interfaces"]["default"]="";
$elem["resolvconf/link-tail-to-original"]["type"]="boolean";
$elem["resolvconf/link-tail-to-original"]["description"]="Append original file to dynamic file?
 If the original static resolver configuration file (/etc/resolv.conf)
 contains name server addresses, those addresses should be listed on
 \"dns-nameservers\" lines in /etc/network/interfaces. For more
 information, please consult the resolvconf(8) man page and the
 README file.
 .
 Until /etc/network/interfaces has been edited and the affected
 interfaces brought down and up again, the name server addresses will
 not be included in the dynamically generated resolver configuration
 file.
 .
 If you choose this option, a temporary workaround will be put in
 place: a symbolic link will be created (if it does not already exist)
 from /etc/resolvconf/resolv.conf.d/tail to
 /etc/resolvconf/resolv.conf.d/original. This will cause the whole of
 that original resolver configuration file to be appended to the
 dynamically generated file.
 .
 After the required \"dns-nameservers\" lines have been added to
 /etc/network/interfaces, the /etc/resolvconf/resolv.conf.d/tail link
 should be replaced by one to /dev/null.
";
$elem["resolvconf/link-tail-to-original"]["descriptionde"]="Die ursprüngliche Datei an die dynamische Datei anhängen?
 Falls die ursprüngliche statische Resolver-Konfigurationsdatei (/etc/resolv.conf) Nameserver-Adressen enthielt, sollten diese Adressen auf »dns-nameservers«-Zeilen in /etc/network/interfaces aufgeführt werden. Für weitere Informationen lesen Sie die Handbuchseite resolvconf(8) und die README-Datei.
 .
 Bis /etc/network/interfaces bearbeitet und die betroffenen Schnittstellen herunter- und wieder heraufgefahren wurden wird die Adresse des Nameservers nicht in die dynamisch erstellte Resolver-Konfigurationsdatei aufgenommen.
 .
 Falls Sie diese Option wählen, wird ein vorübergehende provisorische Lösung realisiert: ein symbolischer Link von /etc/resolvconf/resolv.conf.d/tail nach /etc/resolvconf/resolv.conf.d/original wird erstellt (falls er nicht noch bereits existiert). Damit wird die gesamte ursprüngliche Konfigurationsdatei des Resolvers an die dynamisch generierte Datei angehängt.
 .
 Nachdem benötigte »dns-nameservers«-Zeilen zu /etc/network/interfaces hinzugefügt wurden, sollte der symbolische Link von /etc/resolvconf/resolv.conf.d/tail auf /dev/null geändert werden.
";
$elem["resolvconf/link-tail-to-original"]["descriptionfr"]="Faut-il ajouter le fichier original au fichier dynamique ?
 Si le fichier de configuration d'origine du résolveur (/etc/resolv.conf) contient des adresses de serveurs de noms, ces adresses peuvent être indiquées dans les lignes « dns-nameservers » du fichier /etc/network/interfaces. Pour plus d'informations, veuillez consulter la page de manuel de resolvconf et le fichier README.
 .
 Tant que le fichier /etc/network/interfaces n'aura pas été modifié et que les interfaces concernées n'auront pas été redémarrées, les adresses des serveurs de noms ne seront pas ajoutées au fichier de configuration créé dynamiquement.
 .
 Si vous choisissez cette option, un contournement temporaire sera établi : un lien symbolique sera créé (s'il n'existe pas déjà), de /etc/resolvconf/resolv.conf.d/tail vers /etc/resolvconf/resolv.conf.d/original. Cela ajoutera l'ensemble du fichier initial de configuration du résolveur à la fin du fichier créé dynamiquement.
 .
 Après avoir modifié /etc/network/interfaces pour ajouter les lignes « dns-nameservers », vous devriez faire pointer le lien symbolique /etc/resolvconf/resolv.conf.d/tail vers /dev/null.
";
$elem["resolvconf/link-tail-to-original"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
