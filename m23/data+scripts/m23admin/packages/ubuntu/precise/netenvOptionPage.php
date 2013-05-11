<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("netenv");

$elem["netenv/showagain"]["type"]="boolean";
$elem["netenv/showagain"]["description"]="Upon upgrade, ask again to renew configuration?
 You've answered that you want to keep your current configuration this
 time. Because the automatic configuration may get new features, you will
 be asked the question again when you upgrade netenv the next time.
 .
 If, however, you want debconf to remember your decision and never touch
 your configuration, you can specify that now, by not choosing this option.
";
$elem["netenv/showagain"]["descriptionde"]="Bei jedem Upgrade fragen, ob die Konfiguration neu erstellt werden soll?
 Sie haben geantwortet, dass Sie dieses Mal Ihre bestehende Konfiguration beibehalten möchten. Da die automatische Konfiguration neue Funktionen enthalten kann, wird Ihnen die selbe Frage beim nächsten Netenv-Upgrade wieder gestellt.
 .
 Wenn Sie jedoch möchten, dass Debconf sich Ihre Entscheidung merkt und die Konfiguration niemals ändert, können Sie das jetzt angeben, indem Sie diese Option nicht auswählen.
";
$elem["netenv/showagain"]["descriptionfr"]="Faut-il proposer de renouveler la configuration lors des mises à jour ?
 Vous avez souhaité conserver votre configuration actuelle. Comme la procédure de configuration automatique peut proposer de nouvelles fonctionnalités, la question vous sera de nouveau posée lors de la prochaine mise à jour.
 .
 Cependant, si vous souhaitez que cette question ne vous soit plus jamais posée par debconf, vous pouvez l'indiquer maintenant en choisissant cette option.
";
$elem["netenv/showagain"]["default"]="true";
$elem["netenv/is_configured0"]["type"]="boolean";
$elem["netenv/is_configured0"]["description"]="Keep existing configuration?
 It appears that you already have configured netenv for ${NODE}. Now you
 can select whether you want to keep the actual configuration or whether
 netenv setup should create a new one, overriding the old file.
";
$elem["netenv/is_configured0"]["descriptionde"]="Existierende Konfiguration beibehalten?
 Offenbar haben Sie Netenv schon für ${NODE} konfiguriert. Sie können jetzt entscheiden, ob Sie diese Konfiguration behalten möchten oder ob Netenv eine neue erstellen und die alte überschreiben soll.
";
$elem["netenv/is_configured0"]["descriptionfr"]="Faut-il conserver la configuration actuelle ?
 Netenv semble avoir déjà été configuré pour ${NODE}. Cette option vous permet de choisir si vous souhaitez conserver la configuration existante ou si vous voulez une nouvelle configuration qui annulera l'ancien fichier.
";
$elem["netenv/is_configured0"]["default"]="true";
$elem["netenv/noconf"]["type"]="error";
$elem["netenv/noconf"]["description"]="Not configuring netenv: No parseable configuration found
 The netenv package has tried to set up one network environment based on
 your current network settings. However, it didn't find a configuration
 that it understands - neither in /etc/network/interfaces, nor in
 /etc/pcmcia/network.opts.
 .
 netenv will be disabled. Please refer to the documentation.
";
$elem["netenv/noconf"]["descriptionde"]="Keine verwendbare Konfiguration gefunden
 Das Netenv-Paket hat versucht, eine Netzwerkumgebung entsprechend den aktuellen Netzwerkeinstellungen zu konfigurieren. Leider konnte keine Konfiguration gefunden werden, die Netenv verwenden könnte - weder in /etc/network/interfaces noch in /etc/pcmcia/network.opts.
 .
 Netenv wird abgeschaltet. Bitte beachten Sie die Dokumentation.
";
$elem["netenv/noconf"]["descriptionfr"]="pas de configuration utilisable
 Le paquet netenv a tenté de configurer un environnement réseau à partir de vos réglages réseau actuels. Cependant, il n'a pas trouvé de fichier de configuration qu'il puisse interpréter, ni dans /etc/network/interfaces, ni dans /etc/pcmcia/network.opts.
 .
 Netenv sera désactivé. Veuillez consulter la documentation
";
$elem["netenv/noconf"]["default"]="";
$elem["netenv/twoconfs"]["type"]="error";
$elem["netenv/twoconfs"]["description"]="Not configuring netenv: Duplicate configuration found
 The netenv package has tried to set up one network environment based on
 your current network settings. However, it found configuration data at two
 places, /etc/network/interfaces and /etc/pcmcia/network.opts. Both
 configuration variants have to be treated differently by netenv, but the
 installation script cannot decide.
 .
 netenv will be disabled. Please refer to the documentation.
";
$elem["netenv/twoconfs"]["descriptionde"]="Doppelte Konfiguration gefunden
 Das Netenv-Paket hat versucht, eine Netzwerkumgebung entsprechend den aktuellen Netzwerkeinstellungen zu konfigurieren. Allerdings wurden Konfigurationsdaten an zwei Orten gefunden, in /etc/network/interfaces und in /etc/pcmcia/network.opts. Beide müssen unterschiedlich behandelt werden und das Installationsskript kann diese Entscheidung nicht treffen.
 .
 Netenv wird abgeschaltet. Bitte beachten Sie die Dokumentation.
";
$elem["netenv/twoconfs"]["descriptionfr"]="configuration en double
 Le paquet netenv a tenté de configurer un environnement réseau à partir de vos réglages réseau actuels. Cependant, il a trouvé des fichiers de configuration à deux endroits différents : /etc/network/interfaces et /etc/pcmcia/network.opts. Ces deux variantes de configuration devraient être gérés différemment et le script d'installation n'a pas la possibilité de choisir entre les deux.
 .
 Netenv sera désactivé. Veuillez consulter la documentation
";
$elem["netenv/twoconfs"]["default"]="";
$elem["netenv/auto_configure"]["type"]="select";
$elem["netenv/auto_configure"]["choices"][1]="Use current settings";
$elem["netenv/auto_configure"]["choicesde"][1]="Verwende aktuelle Konfiguration";
$elem["netenv/auto_configure"]["choicesfr"][1]="Utiliser les réglages actuels";
$elem["netenv/auto_configure"]["description"]="Configuration options:
 netenv has checked your current network settings. It seems it can set up
 one working networking environment configuration for you, based on the
 settings you currently use. To be able to switch environments, you have to
 create additional configurations along this example.
 .
 Alternatively, you can bypass automatic configuration and do it all
 manually later. In this case, netenv will be disabled for now.
";
$elem["netenv/auto_configure"]["descriptionde"]="Konfigurationsmöglichkeiten:
 Netenv hat Ihre aktuellen Netzwerkeinstellungen überprüft. Offenbar ist es möglich, eine funktionierende Netzwerkkonfiguration auf der Basis Ihrer aktuellen Einstellungen zu erstellen. Um zwischen mehreren Netzwerkumgebungen hin- und herschalten zu können, müssen Sie weitere Konfigurationen erstellen. Die erste kann dabei als Vorlage dienen.
 .
 Alternativ können Sie auch die automatische Konfiguration übergehen und später alles manuell konfigurieren. In diesem Fall wird Netenv vorläufig abgeschaltet.
";
$elem["netenv/auto_configure"]["descriptionfr"]="Options de configuration :
 Netenv a vérifié vos paramètres réseau. Il semble possible de mettre en place une configuration d'environnement de travail à partir de vos réglages actuels. Si vous souhaitez passer d'un environnement à un autre, vous devez créer des configurations supplémentaires à partir de cet exemple.
 .
 Vous pouvez aussi ignorer la configuration automatique et configurer vous-même plus tard. Dans ce cas, netenv sera alors temporairement désactivé.
";
$elem["netenv/auto_configure"]["default"]="Use current settings";
$elem["netenv/info_pcmcia"]["type"]="error";
$elem["netenv/info_pcmcia"]["description"]="Manual action required after installation
 netenv has found that you are using a PCMCIA network card with the
 settings stored in /etc/pcmcia/network.opts. To make netenv work, you have
 to add a couple of lines in this file - please read the documentation in
 /usr/share/doc/netenv.
 .
 netenv has set up your current configuration as the default network. If
 you want to add further configurations, run netenv and choose \"new\". Note
 this will not have an effect unless you made the change described above!
";
$elem["netenv/info_pcmcia"]["descriptionde"]="Konfiguration muss manuell vervollständigt werden
 Netenv hat festgestellt, dass Sie eine PCMCIA-Netzwerkkarte verwenden und die Konfiguration in /etc/pcmcia/network.opts gespeichert ist. Damit Netenv funktioniert, müssen Sie einige Zeilen zu dieser Datei hinzufügen - bitte beachten Sie die Dokumentation in /usr/share/doc/netenv.
 .
 Netenv hat Ihre aktuelle Netzwerkkonfiguration als Standard-Netzwerk eingerichtet. Wenn Sie weitere Konfigurationen hinzufügen möchten, führen Sie Netenv aus und wählen »new«. Beachten Sie jedoch, dass dies erst dann eine Wirkung hat, wenn Sie die oben beschriebenen Anpassungen durchgeführt haben!
";
$elem["netenv/info_pcmcia"]["descriptionfr"]="Action supplémentaire nécessaire après l'installation
 Netenv a détecté que vous utilisez une carte réseau PCMCIA avec des réglages mentionnés dans /etc/pcmcia/network.opts. Pour que netenv fonctionne, vous devez ajouter vous-même des lignes dans ce fichier. Veuillez consulter la documentation située dans /usr/share/doc/netenv.
 .
 Netenv a utilisé vos réglages actuels comme configuration réseau par défaut. Si vous souhaitez ajouter d'autres configurations, utilisez la commande « netenv » et choisissez d'ajouter une nouvelle configuration. Attention, cela ne sera effectif qu'après avoir effectué les modifications décrites précédemment.
";
$elem["netenv/info_pcmcia"]["default"]="";
$elem["netenv/info_interfaces"]["type"]="error";
$elem["netenv/info_interfaces"]["description"]="netenv's \"new\" menu item won't work
 netenv has found that the network settings on ${NODE} are stored in
 /etc/network/interfaces, and has created one working configuration
 accordingly. With this setup it is not possible to use the \"new\" menu item
 inside netenv to create a new environment. Instead, you have to edit
 configuration files manually - please read the documentation in
 /usr/share/doc/netenv.
";
$elem["netenv/info_interfaces"]["descriptionde"]="Menüpunkt »new« in netenv funktioniert nicht
 Netenv hat festgestellt, dass die Netzwerkeinstellungen auf ${NODE} bisher in /etc/network/interfaces gespeichert wurden, und hat eine entsprechende Netzwerkumgebung erstellt. Mit dieser Konfiguration ist es jedoch nicht möglich, weitere Netzwerkumgebungen über den Menüpunkt »new« in Netenv zu definieren. Stattdessen müssen Sie die Konfigurationsdateien manuell editieren - bitte beachten Sie die Dokumentation in /usr/share/doc/netenv.
";
$elem["netenv/info_interfaces"]["descriptionfr"]="L'option « new » du menu de netenv ne fonctionnera pas
 Netenv a créé une configuration réseau pour ${NODE} à partir des réglages mentionnés dans le fichier /etc/network/interfaces. Avec cette méthode de fonctionnement, il n'est pas possible d'utiliser l'option d'ajout de nouvelle configuration du menu interne de netenv. Vous devrez modifier les fichiers de configuration vous-même. Veuillez consulter la documentation dans /usr/share/doc/netenv.
";
$elem["netenv/info_interfaces"]["default"]="";
$elem["netenv/auto_method"]["type"]="select";
$elem["netenv/auto_method"]["choices"][1]="interfaces";
$elem["netenv/auto_method"]["description"]="for internal use
";
$elem["netenv/auto_method"]["descriptionde"]="";
$elem["netenv/auto_method"]["descriptionfr"]="";
$elem["netenv/auto_method"]["default"]="";
PKG_OptionPageTail2($elem);
?>
