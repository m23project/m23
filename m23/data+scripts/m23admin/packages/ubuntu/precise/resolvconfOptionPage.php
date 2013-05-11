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
 /run/resolvconf/resolv.conf. If you choose this option then this
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
 Das Paket Resolvconf enthält die für das dynamische Aktualisieren der Resolver-Konfigurationsdatei benötigte Infrastruktur. Teil der notwendigen Infrastruktur ist ein symbolischer Link von /etc/resolv.conf auf /run/resolvconf/resolv.conf. Falls Sie diese Option wählen, wird dieser Link angelegt. Die bestehende /etc/resolv.conf-Datei wird als /etc/resolvconf/resolv.conf.d/original erhalten; sie wird wiederhergestellt, falls dieses Paket entfernt wird.
 .
 Falls Sie diese Option ablehnen, werden zukünftige Installationen daran gehindert, diesen Link neu zu erstellen und die Konfigurationsdatei des Resolvers (Namensauflösers) wird somit nicht dynamisch aktualisiert. In der Datei README wird beschrieben, wie das dynamische Aktualisieren aktiviert werden kann.
 .
 Die Anwesenheit von Resolvconf kann das Verhalten anderer Programme beeinflussen, daher sollte es im unkonfigurierten Zustand nicht installiert bleiben.
";
$elem["resolvconf/linkify-resolvconf"]["descriptionfr"]="Faut-il préparer /etc/resolv.conf pour les mises à jour dynamiques ?
 Le paquet resolvconf installe l'infrastructure permettant la mise à jour du fichier de configuration du résolveur. Une des modifications nécessaires est la mise en place d'un lien symbolique depuis /etc/resolv.conf vers /run/resolvconf/resolv.conf. Si vous choisissez cette option, ce lien sera créé. Le fichier /etc/resolv.conf sera conservé sous le nom de /etc/resolvconf/resolv.conf.d/original. Si ce paquet est enlevé, le fichier sera remis dans son état original.
 .
 Si vous ne choisissez pas cette option, les installations ultérieures ne tenteront pas de créer ce lien et le fichier de configuration ne sera pas mis à jour dynamiquement. Pour activer la mise à jour dynamique, il sera alors nécessaire de suivre les instructions du fichier README.
 .
 La présence de resolvconf peut modifier le comportement de certains programmes et il ne devrait pas être laissé en place s'il n'est pas configuré.
";
$elem["resolvconf/linkify-resolvconf"]["default"]="true";
$elem["resolvconf/downup-interfaces"]["type"]="note";
$elem["resolvconf/downup-interfaces"]["description"]="Reboot recommended
 Suppliers of name server information such as local caching name
 servers and interface configurers are expected to supply name server
 information to the resolvconf program. However, although
 installation of the resolvconf package triggers them to supply
 their information, some of them fail to do so.
 .
 This bug would lead to loss of valid name server information on
 installation of the resolvconf package if the following workaround
 were not adopted: resolvconf includes the full contents of the
 pre-installation /etc/resolv.conf in its database until reboot.
 This has the drawback that name server information is retained
 even if the associated interface is later deconfigured. (This
 incorrect behavior is judged to be less harmful than the alternative
 of losing valid information.)
 .
 Until the bug in question is fixed and the workaround removed,
 the only way to ensure that resolvconf has fully correct name server
 information after the resolvconf package has been installed on a
 running system is to reboot the system.
";
$elem["resolvconf/downup-interfaces"]["descriptionde"]="Systemneustart empfohlen
 Anbieter von Name-Server-Informationen wie lokale, zwischenspeichernde Name-Server und Schnittstellenkonfiguratoren sollten dem Resolvconf-Programm Name-Server-Informationen bereitstellen. Obwohl die Installation des Pakets Resolvconf die Bereitstellung der Informationen auslöst, schlägt dies bei einigen fehl.
 .
 Dieser Fehler würde zum Verlust gültiger Name-Server-Information bei der Installation des Pakets Resolvconf führen, falls die folgende Hilfskonstruktion nicht eingesetzt würde: Resolvconf enthält den gesamten Inhalt von /etc/resolv.conf im Zustand vor der Installation bis zum Systemneustart. Dies hat den Nachteil, dass die Name-Server-Information beibehalten wird, selbst wenn die Konfiguration der zugehörige Schnittstelle später entfernt wird. (Dieses inkorrekte Verhalten wird als weniger schädlich als die Alternative des Verlusts gültiger Information angesehen).
 .
 Bis der besagte Fehler behoben ist und die Hilfskonstruktion entfernt wurde, ist die einzige Methode, um sicherzustellen, dass Resolvconf über komplett korrekte Name-Server-Informationen verfügt, nachdem das Paket auf einem laufenden System installiert wurde, der Neustart des Systems.
";
$elem["resolvconf/downup-interfaces"]["descriptionfr"]="Redémarrage recommandé
 Les programmes en charge de la fourniture des informations de service de noms tels que les programmes locaux de cache de service de noms et les configurateurs d'interfaces doivent fournir les informations de service de noms au programme resolvconf. Cependant, bien que l'installation de celui-ci déclenche une demande de mise à jour de ces informations, certains échouent à l'effectuer.
 .
 Ce bogue pourrait conduire à la perte d'informations valables lors de l'installation du paquet resolvconf si les contournements suivants ne sont pas mis en œuvre : resolvconf inclut le contenu complet du fichier /etc/resolv.conf précédant l'installation jusqu'au redémarrage qui suit. Ce contournement a le défaut de conserver l'information de service de noms même si l'interface réseau en question est déconfigurée, ce qui est jugé moins ennuyeux que la perte possible d'informations.
 .
 En attendant que ce bogue soit corrigé et le contournement retiré, la seule façon de garantir que resolvconf possède les informations entièrement correctes de service de noms après son installation sur un système est le redémarrage de ce système.
";
$elem["resolvconf/downup-interfaces"]["default"]="";
$elem["resolvconf/reboot-recommended-after-removal"]["type"]="note";
$elem["resolvconf/reboot-recommended-after-removal"]["description"]="Reboot recommended
 The removal of the resolvconf package may have resulted in some
 information about name servers becoming unavailable. To correct
 this problem it is recommended that the system be rebooted.
";
$elem["resolvconf/reboot-recommended-after-removal"]["descriptionde"]="Systemneustart empfohlen
 Die Entfernung des Pakets resolvconf könnte dazu geführt haben, dass einige Informationen über Name-Server nicht mehr verfügbar sind. Um dieses Problem zu beheben, wird ein Neustart des Systems empfohlen.
";
$elem["resolvconf/reboot-recommended-after-removal"]["descriptionfr"]="Redémarrage recommandé
 La suppression du paquet resolvconf peut avoir eu comme conséquence l'indisponibilité d'informations sur les serveurs de noms. Pour corriger ce problème, il est recommandé de redémarrer le système.
";
$elem["resolvconf/reboot-recommended-after-removal"]["default"]="";
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
 Bis /etc/network/interfaces bearbeitet und die betroffenen Schnittstellen herunter- und wieder heraufgefahren wurden, wird die Adresse des Nameservers nicht in die dynamisch erstellte Resolver-Konfigurationsdatei aufgenommen.
 .
 Falls Sie diese Option wählen, wird eine vorübergehende provisorische Lösung realisiert: Ein symbolischer Link von /etc/resolvconf/resolv.conf.d/tail nach /etc/resolvconf/resolv.conf.d/original wird erstellt (falls er nicht bereits existiert). Damit wird die gesamte ursprüngliche Konfigurationsdatei des Resolvers an die dynamisch generierte Datei angehängt.
 .
 Nachdem benötigte »dns-nameservers«-Zeilen zu /etc/network/interfaces hinzugefügt wurden, sollte der symbolische Link von /etc/resolvconf/resolv.conf.d/tail auf /dev/null geändert werden.
";
$elem["resolvconf/link-tail-to-original"]["descriptionfr"]="Faut-il ajouter le fichier original au fichier dynamique ?
 Si le fichier de configuration d'origine du résolveur (/etc/resolv.conf) contient des adresses de serveurs de noms, ces adresses peuvent être indiquées dans les lignes « dns-nameservers » du fichier /etc/network/interfaces. Pour plus d'informations, veuillez consulter la page de manuel de resolvconf et le fichier README.
 .
 Tant que le fichier /etc/network/interfaces n'aura pas été modifié et que les interfaces concernées n'auront pas été redémarrées, les adresses des serveurs de noms ne seront pas ajoutées au fichier de configuration créé dynamiquement.
 .
 Si vous choisissez cette option, un contournement temporaire sera établi : un lien symbolique sera créé (s'il n'existe pas déjà), de /etc/resolvconf/resolv.conf.d/tail vers /etc/resolvconf/resolv.conf.d/original. Cela ajoutera l'ensemble du fichier initial de configuration du résolveur à la fin du fichier créé dynamiquement.
 .
 Après avoir modifié /etc/network/interfaces pour ajouter les lignes « dns-nameservers », vous devriez faire pointer le lien symbolique /etc/resolvconf/resolv.conf.d/tail vers /dev/null.
";
$elem["resolvconf/link-tail-to-original"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
