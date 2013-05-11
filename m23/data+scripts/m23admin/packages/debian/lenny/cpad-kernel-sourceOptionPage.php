<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cpad-kernel-source");

$elem["cpad-kernel-source/module"]["type"]="boolean";
$elem["cpad-kernel-source/module"]["description"]=" Would you like the cpad module to be compiled automatically?
 In order to make full use of the cPad you need to compile and install the
 provided module to suit your running Linux kernel.
 .
 If you opt to do this, the cpad module will be compiled into a Debian binary
 package using a local kernel configuration which you will be required to
 specify.  You must have either a kernel-headers-* package installed to suit
 the kernel you wish to use it with, or have a suitably configured kernel
 source tree available.  If you do not currently have either of these available
 you should choose not to do this at present.  Once you have suitable headers
 installed you can return to this selection with:
 .
 dpkg-reconfigure cpad-kernel-source
 .
 Alternatively, you might prefer to build it manually.  The source to do this
 can be found in /usr/src/modules/cpad-kernel.  You may use a tool like
 make-kpkg(1) or `fakeroot debian/rules kdist [ KSRC=... KVERS=... ]` to create
 a Debian package as above, or you can simply `make` and install it by hand.
 .
 If little of the above made sense and you don't have a touchpad with an LCD
 screen in it, then you probably don't need this package at all.
";
$elem["cpad-kernel-source/module"]["descriptionde"]="Möchten Sie, dass das cpad-Modul automatisch kompiliert wird?
 Um das cPad vollständig nutzen zu können, müssen Sie das angebotene Modul passend zu Ihrem laufenden Linux-Kernel kompilieren und installieren.
 .
 Wenn Sie sich für die folgende Option entscheiden, wird das cpad-Modul kompiliert und ein Debian-Binärpaket erstellt; dafür wird eine lokale Kernel-Konfiguration verwendet, die Sie spezifizieren müssen. Sie müssen entweder ein »kernel-headers-*«-Paket installiert haben, das zu dem Kernel, den Sie nutzen möchten, passt, oder Sie müssen passend konfigurierte Kernelquellen verfügbar haben. Falls nichts davon derzeit bei Ihnen zutrifft, sollten Sie diese Option im Moment nicht wählen. Sobald Sie passende Header installiert haben, können Sie mit folgendem Befehl erneut zu dieser Auswahl zurückkehren:
 .
 dpkg-reconfigure cpad-kernel-source
 .
 Alternativ könnten Sie es vorziehen, das Modul von Hand zu bauen. Die dazu nötigen Quellen finden Sie in /usr/src/modules/cpad-kernel. Sie können ein Werkzeug wie make-kpkg(1) oder »fakeroot debian/rules kdist [ KSRC=... KVERS=... ]« benutzen, um wie vorher erwähnt ein Debian-Paket zu erstellen, oder Sie erzeugen es einfach mit »make« und installieren es von Hand.
 .
 Wenn Sie nicht verstanden haben, worum es hier geht und wenn Sie kein Touchpad mit einem integrierten LCD-Bildschirm haben, benötigen Sie dieses Paket vielleicht überhaupt nicht.
";
$elem["cpad-kernel-source/module"]["descriptionfr"]="Faut-il compiler automatiquement le module cpad ?
 Afin de pouvoir pleinement utiliser le cPad, vous devez compiler et installer le module fourni pour qu'il corresponde au noyau Linux que vous utilisez.
 .
 Si vous choisissez cette option, un paquet Debian sera automatiquement créé en compilant le module cpad avec la configuration du noyau actuellement utilisé. Un paquet kernel-headers-* doit être installé et doit correspondre au noyau que vous souhaitez utiliser. Alternativement, vous pouvez utiliser les sources complètes du noyau, configurées correctement. Si ni l'un ni l'autre ne sont disponibles, vous ne devriez pas choisir cette option. Quand vous aurez fait les corrections nécessaires, vous pourrez revenir à ce choix avec :
 .
 dpkg-reconfigure cpad-kernel-source
 .
 Si vous le souhaitez, vous pouvez le compiler vous-même. Les sources nécessaires à la compilation sont dans /usr/src/modules/cpad-kernel. Vous pouvez utiliser un outil comme make-kpkg(1) ou « fakeroot debian/rules kdist [ KSRC=... KVERS=... ] » afin de créer un paquet Debian. Une autre possibilité est de simplement utiliser « make » et installer le module vous-même. 
 .
 Si les informations ci-dessus ont peu de signification pour vous et que vous n'avez pas de souris tactile (« touchpad ») avec un écran LCD, vous n'avez probablement pas du tout besoin de ce paquet.
";
$elem["cpad-kernel-source/module"]["default"]="true";
$elem["cpad-kernel-source/recompile"]["type"]="boolean";
$elem["cpad-kernel-source/recompile"]["description"]="Would you like to create a binary cpad-kernel-module package now?
 If you opt to do this, the cpad module will be compiled into a Debian binary
 package using a local kernel configuration which you will be required to
 specify.  You must have either a kernel-headers-* package installed to suit
 the kernel you wish to use it with, or have a suitably configured kernel
 source tree available.  If you do not currently have either of these available
 you should choose not to do this at present.  Once you have suitable headers
 installed you can return to this selection with:
 .
 dpkg-reconfigure cpad-kernel-source
 .
 Note that if you have already built a module package using the same kernel
 version it may be overwritten.  You should rename or relocate it before
 continuing if you wish to preserve it.
";
$elem["cpad-kernel-source/recompile"]["descriptionde"]="Möchten Sie jetzt ein cpad-Kernelmodul-Binärpaket erstellen?
 Wenn Sie sich für die folgende Option entscheiden, wird das cpad-Modul kompiliert und ein Debian-Binärpaket erstellt; dafür wird eine lokale Kernel-Konfiguration verwendet, die Sie spezifizieren müssen. Sie müssen entweder ein »kernel-headers-*«-Paket installiert haben, das zu dem Kernel, den Sie nutzen möchten, passt, oder Sie müssen passend konfigurierte Kernelquellen verfügbar haben. Falls nichts davon derzeit bei Ihnen zutrifft, sollten Sie diese Option im Moment nicht wählen. Sobald Sie passende Header installiert haben, können Sie mit folgendem Befehl erneut zu dieser Auswahl zurückkehren:
 .
 dpkg-reconfigure cpad-kernel-source
 .
 Bedenken Sie: wenn Sie mit der gleichen Kernel-Version bereits ein Modulpaket erstellt haben, könnte dies überschrieben werden. Wenn Sie es erhalten möchten, sollten Sie es umbenennen oder an einen anderen Ort verschieben, bevor Sie fortfahren.
";
$elem["cpad-kernel-source/recompile"]["descriptionfr"]="Voulez-vous créer un paquet binaire cpad-kernel-module maintenant ?
 Si vous choisissez cette option, un paquet Debian sera automatiquement créé en compilant le module cpad avec la configuration du noyau actuellement utilisé. Un paquet kernel-headers-* doit être installé et doit correspondre au noyau que vous souhaitez utiliser. Alternativement, vous pouvez utiliser les sources complètes du noyau, configurées correctement. Si ni l'un ni l'autre ne sont disponibles, vous ne devriez pas choisir cette option. Quand vous aurez fait les corrections nécessaires, vous pourrez revenir à ce choix avec :
 .
 dpkg-reconfigure cpad-kernel-source
 .
 Veuillez noter que si vous avez déjà compilé un paquet avec le module pour la même version de noyau, il risque d'être écrasé. Vous devriez le renommer ou le déplacer si vous souhaitez la conserver.
";
$elem["cpad-kernel-source/recompile"]["default"]="true";
$elem["cpad-kernel-source/kernel"]["type"]="string";
$elem["cpad-kernel-source/kernel"]["description"]="Linux header location:
 You have choosen to compile the cpad module. Now you must specify the location
 of the Linux kernel headers for it to use.
 .
 When Linux headers are provided by a kernel-headers-* package, they reside in
 /usr/src/kernel-headers-*.
";
$elem["cpad-kernel-source/kernel"]["descriptionde"]="Verzeichnis der Linux-Kernelheader:
 Sie haben sich entschieden, ein cpad-Modul zu kompilieren. Sie müssen jetzt das Verzeichnis der Linux-Kernelheader angeben, die benutzt werden sollen.
 .
 Wenn die Linux-Kernelheader durch ein »kernel-headers-*«-Paket bereitgestellt wurden, liegen sie in /usr/src/kernel-headers-*.
";
$elem["cpad-kernel-source/kernel"]["descriptionfr"]="Emplacement des en-têtes du noyau Linux :
 Vous avez choisi la compilation automatique du module cpad. Vous devez indiquer l'emplacement des sources du noyau qui seront utilisées pour cette compilation.
 .
 Quand les en-têtes sont fournis par un paquet kernel-headers-*, ils se trouvent dans /usr/src/kernel-headers-*.
";
$elem["cpad-kernel-source/kernel"]["default"]="/usr/src/linux/";
$elem["cpad-kernel-source/wrong_kernel"]["type"]="boolean";
$elem["cpad-kernel-source/wrong_kernel"]["description"]="Do you wish to specify a different Linux headers directory?
 The directory you have provided is not a valid Linux headers location.
";
$elem["cpad-kernel-source/wrong_kernel"]["descriptionde"]="Möchten Sie ein anderes Verzeichnis für Linux-Kernelheader angeben?
 Das Verzeichnis, dass Sie angegeben haben, ist kein gültiges Kernelheader-Verzeichnis.
";
$elem["cpad-kernel-source/wrong_kernel"]["descriptionfr"]="Voulez-vous indiquer un autre emplacement pour les en-têtes du noyau ?
 Le répertoire indiqué ne semble pas contenir les en-têtes du noyau Linux.
";
$elem["cpad-kernel-source/wrong_kernel"]["default"]="false";
$elem["cpad-kernel-source/module_location"]["type"]="note";
$elem["cpad-kernel-source/module_location"]["description"]="What to do after module compilation
 The cpad-kernel-module package will be built in /usr/src/modules. You will
 have to install it yourself after it is created and can do so from that
 directory using:
 .
 dpkg -i cpad-kernel-module-<version>.deb
 .
 Unfortunately that cannot be done automatically at this stage because dpkg
 is not able to be called recursively.
 .
 Once the module package is installed, you probably won't need the
 cpad-kernel-source package anymore unless you plan to update your kernel again
 later.  In that case you can safely purge it completely with 'dpkg -P
 cpad-kernel-source'.  Otherwise, you will be able to rebuild the
 cpad-kernel-module package in this manner at any time with `dpkg-reconfigure
 cpad-kernel-source`.  You will be prompted once again for the location of the
 kernel headers to use.
 .
 If you update the cpad-kernel-source package at some later time (or remove it
 without purging, then reinstall) the answers you have given here will be used
 to repeat this process and create a new module package for you to install.
";
$elem["cpad-kernel-source/module_location"]["descriptionde"]="Nach der Kompilierung des Moduls ...
 Das Paket mit dem cpad-Kernelmodul wird in /usr/src/modules gebaut. Nachdem es erstellt wurde, müssen Sie es selbst installieren; Sie erledigen dies mit folgendem Befehl in obigem Verzeichnis:
 .
 dpkg -i cpad-kernel-module-<version>.deb
 .
 Das kann an diesem Punkt unglücklicherweise nicht automatisch erfolgen, da dpkg nicht rekursiv aufgerufen werden kann.
 .
 Sobald das Modulpaket installiert ist, benötigen Sie vielleicht das »cpad-kernel-source«-Paket nicht mehr. Sie können es dann gefahrlos mit »dpkg -P cpad-kernel-source« entfernen. Sollten Sie jedoch vorhaben, später einmal Ihren Kernel zu aktualisieren, muss es installiert bleiben; Sie können dann zu jeder Zeit das cpad-Kernelmodul-Paket mit »dpkg-reconfigure cpad-kernel-source« neu erstellen. Sie werden erneut nach dem Pfad zu den zu verwendenden Kernelheadern gefragt werden.
 .
 Wenn Sie irgendwann einmal das »cpad-kernel-source«-Paket aktualisieren (oder Sie löschen es, ohne die Konfigurationsdateien zu entfernen (»purge«) und installieren danach neu), werden die Angaben, die Sie hier gemacht haben, verwendet, um den Prozess zu wiederholen und ein neues Modulpaket zu erstellen, das Sie dann installieren müssen.
";
$elem["cpad-kernel-source/module_location"]["descriptionfr"]="Opérations nécessaires après la compilation du module
 Le paquet cpad-kernel-module sera construit dans /usr/src/modules. Vous devrez l'installer vous-même après sa création avec la commande suivante :
 .
 dpkg -i cpad-kernel-module-<version>.deb
 .
 Cette opération ne peut pas être effectuée automatiquement car dpkg ne fonctionne pas de manière récursive. 
 .
 Par ailleurs, à moins de mettre le noyau à jour plus tard, vous n'aurez probablement plus besoin du paquet cpad-kernel-source après la compilation : vous pouvez donc le désinstaller avec la commande « dpkg -P cpad-kernel-source ». Si vous ne purgez pas le paquet de cette manière, vous pourrez reconstruire le paquet cpad-kernel-module à tout moment avec la commande « dpkg-reconfigure cpad-kernel-source ». L'emplacement des en-têtes du noyau à utiliser vous sera alors à nouveau demandé. 
 .
 Si vous mettez à jour le paquet cpad-kernel-source plus tard (ou si vous le supprimez sans le purger, puis le réinstallez), vos réponses serviront à répéter ce processus et à créer un nouveau module que vous pourrez ensuite installer.
";
$elem["cpad-kernel-source/module_location"]["default"]="";
$elem["cpad-kernel-source/verbose"]["type"]="boolean";
$elem["cpad-kernel-source/verbose"]["description"]="Do you want to watch the module compilation progress?
 The process of building a binary package from the cpad module source may
 produce quite a lot of output.  Seeing this output may be useful if you have
 problems with it building, or annoying if you don't want the extra noise.
";
$elem["cpad-kernel-source/verbose"]["descriptionde"]="Möchten Sie die Ausgabe des Modul-Kompilierungsprozesses sehen?
 Der Prozess zum Bauen eines Binärpakets aus den Quellen könnte eine Menge Meldungen erzeugen. Es ist vielleicht sinnvoll, diese durchzusehen, wenn es Probleme mit dem Bauen gibt, aber lästig, falls Sie die zusätzliche Ausgabe nicht möchten.
";
$elem["cpad-kernel-source/verbose"]["descriptionfr"]="Souhaitez-vous suivre la progression de la compilation du module ?
 La compilation du paquet binaire à partir des sources du module cpad peut générer un affichage important. Cet affichage peut être utile pour découvrir des problèmes de compilation ou ennuyeux si vous ne souhaitez pas un affichage trop important.
";
$elem["cpad-kernel-source/verbose"]["default"]="false";
$elem["cpad-kernel-source/erase"]["type"]="boolean";
$elem["cpad-kernel-source/erase"]["description"]="Do you want to delete the cpad-kernel-module packages?
 There are binary cpad-kernel-module packages left in /usr/src(/modules) that
 were generated from this package. Once you have manually installed them you
 don't need those packages anymore, though you may like to keep them for backup
 or re-installation purposes.
";
$elem["cpad-kernel-source/erase"]["descriptionde"]="Möchten Sie die cpad-Kernelmodul-Pakete löschen?
 Es sind noch binäre cpad-Kernelmodul-Pakete in /usr/src(/modules) zurückgeblieben, die durch dieses Paket generiert wurden. Sobald Sie sie manuell installiert haben, werden sie nicht mehr benötigt; andererseits könnte es vielleicht sein, dass Sie sie zwecks Datensicherung oder Neuinstallation behalten möchten.
";
$elem["cpad-kernel-source/erase"]["descriptionfr"]="Souhaitez-vous supprimer les paquets cpad-kernel-module ?
 Des paquets cpad-kernel-module générés par ce paquet existent encore dans /usr/src(/modules). Une fois qu'ils sont été installés, ils ne sont plus utiles mais vous pouvez souhaiter les conserver à titre de sauvegarde ou pour une éventuelle réinstallation ultérieure.
";
$elem["cpad-kernel-source/erase"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
