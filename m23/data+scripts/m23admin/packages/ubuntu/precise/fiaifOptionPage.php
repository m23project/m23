<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fiaif");

$elem["fiaif/enable_initd"]["type"]="boolean";
$elem["fiaif/enable_initd"]["description"]="Enable the fiaif init.d script?
 FIAIF init.d setup is completely optional, but is highly recommended.
 If you accept here, the package will create init.d runlevel
 symlinks to FIAIF. This allows FIAIF to be started automatically at
 every boot.
 .
 Note that fiaif will not start until you edited the configuration file
 /etc/fiaif/fiaif.conf, set DONT_START to zero, and reboot. So if you
 install fiaif for the first time, it is safe to accept here. If you
 have already set DONT_START to zero from an earlier installation, fiaif
 will be started after the next reboot.
 .
 Refuse here to not allow the package to create the runlevel
 symlinks. Existing symlinks to FIAIF will be removed.
";
$elem["fiaif/enable_initd"]["descriptionde"]="Das fiaif init.d Skript aktivieren?
 Das FIAIF init.d Setup zwar ist vollständig optional, aber stark empfohlen. Wenn sie die Frage bejahen, wird das Paket symbolische init.d Runlevel Verknüpfungen zu FIAIF generieren. Dies erlaubt FIAIF, automatisch beim Hochfahren zu starten.
 .
 Beachten Sie, daß fiaif nicht startet bis Sie die Konfigurationsdatei /etc/fiaif/fiaif.conf editiert, DONT_START auf Null gesetzt und neu gestartet haben. Falls Sie also fiaif zum ersten mal installieren, ist es sicher, an dieser Stelle zu akzeptieren. Falls Sie DONT_START schon nach einer früheren Installation auf Null gesetzt haben, wird fiaif nach dem nächsten Neustart gestartet werden.
 .
 Verneinen sie die Frage, um es dem Paket zu verbieten, die symbolischen Links für den Runlevel zu erzeugen. Existierende symbolische Links nach FIAIF werden entfernt.
";
$elem["fiaif/enable_initd"]["descriptionfr"]="Mettre en service le script de démarrage de fiaif dans /etc/init.d ?
 Lancer FIAIF par le script installé dans /etc/init.d est totalement optionnel mais fortement recommandé. Si vous l'acceptez, les liens appropriés vers le script de lancement de FIAIF seront créés dans les répertoires de chacun des niveaux de fonctionnement (« runlevels »). Cela permettra alors à FIAIF d'être lancé au démarrage du système.
 .
 Veuillez noter que FIAIF ne démarrera pas tant que vous n'aurez pas modifié le fichier /etc/fiaif/fiaif.conf, placé DONT_START à 0 et redémarré le système. En conséquence, si vous l'installez pour la première fois, vous pouvez sans problème choisir cette option. Si vous avez déjà placé DONT_START à 0 lors d'une précédente installation, FIAIF se lancera au prochain démarrage du système.
 .
 Si vous ne choisissez pas cette option, ces liens ne seront pas créés et d'éventuels liens existants seront supprimés.
";
$elem["fiaif/enable_initd"]["default"]="true";
$elem["fiaif/enable_cron"]["type"]="boolean";
$elem["fiaif/enable_cron"]["description"]="Send daily firewall log mail?
 The fiaif-scan utility can be run as a cron job to send a
 daily firewall log to the site administrator.
 Do you want to run a daily script to send firewall log per mail?
";
$elem["fiaif/enable_cron"]["descriptionde"]="Tägliche Firewall Logmail schicken?
 Das fiaif-scan Programm kann in einem Cronjob gestartet werden, der täglich ein Firewall Logmail an den Administrator schickt. Wollen sie dieses Log täglich per Mail schicken lassen?
";
$elem["fiaif/enable_cron"]["descriptionfr"]="Envoyer quotidiennement le journal du pare-feu ?
 L'utilitaire fiaif-scan peut servir dans une tâche quotidienne de cron pour envoyer le journal du pare-feu à l'administrateur du site. Veuilez indiquer si vous souhaitez la mise en service d'un tel envoi quotidien.
";
$elem["fiaif/enable_cron"]["default"]="true";
$elem["fiaif/cron_logfile"]["type"]="note";
$elem["fiaif/cron_logfile"]["description"]="fiaif-scan logfile location
 The standard logfile location of fiaif-scan is /var/log/syslog. If
 your system uses a non-standard system logfile location you have to
 adjust the /etc/cron.daily/fiaif-scan script to use the custom logfile.
";
$elem["fiaif/cron_logfile"]["descriptionde"]="Ort der fiaif-scan Logdatei
 Die Standard-Logdatei von fiaif-scan ist /var/log/syslog. Wenn ihr System eine andere Logdatei benutzt, müssen Sie das Skript unter /etc/cron.daily/fiaif-scan auf ihre spezifische Logdatei anpassen.
";
$elem["fiaif/cron_logfile"]["descriptionfr"]="Emplacement du fichier de journalisation de fiaif-scan
 L'emplacement habituel du fichier de journalisation de fiaif-scan est /var/log/syslog. Si votre système utilise un emplacement différent pour ce fichier, vous devez adapter le fichier /etc/cron.daily/fiaif-scan pour y indiquer le nom de ce fichier de journalisation.
";
$elem["fiaif/cron_logfile"]["default"]="";
$elem["fiaif/warning"]["type"]="note";
$elem["fiaif/warning"]["description"]="Attention when using FIAIF
 Beware. The tools can easily be misused, causing enormous amounts of grief
 by completely cripple network access to a computer system. It is not
 terribly uncommon for a remote system administrator to accidentally lock
 themself out of a system hundreds or thousands of miles away. One can even
 manage to lock himself out of a computer whose keyboard is under his
 fingers. Please, use due caution.
";
$elem["fiaif/warning"]["descriptionde"]="Achtung beim Benutzen von FIAIF
 Obacht. Diese Werkzeuge können leicht derart missbraucht werden, dass sie großen Kummer durch einen komplett verstümmelten Netzwerkzugriff eines Computersystems auslösen können. Es ist nicht sehr ungewöhnlich für einen entfernten Administrator, sich aus Versehen selber von einem hunderte oder tausende Kilometer entfernten System auszusperren. Man kann es sogar fertigbringen, sich von einem Rechner auszusperren, dessen Tastatur sich einem gerade unter den Fingern befindet. Bitte gehen Sie entsprechend vorsichtig vor.
";
$elem["fiaif/warning"]["descriptionfr"]="Attention en utilisant FIAIF
 Attention : il est très facile de mal utiliser ces outils et cela peut générer énormément de frustrations en perturbant totalement l'accès réseau d'un système informatique. Il n'est pas très exceptionnel qu'un administrateur de système distant verrouille accidentellement son accès à un système situé à des centaines ou des milliers de kilomètres. Il est même possible, les doigts sur le clavier, de verrouiller son propre accès au système. Utilisez donc ces outils avec précaution.
";
$elem["fiaif/warning"]["default"]="";
PKG_OptionPageTail2($elem);
?>
