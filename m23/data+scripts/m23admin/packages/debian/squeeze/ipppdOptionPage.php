<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ipppd");

$elem["ipppd/ispwontdoit"]["type"]="error";
$elem["ipppd/ispwontdoit"]["description"]="ISP dialup configuration already exists
 The device.${IPPP0} and ipppd.${IPPP0} files already exist. Therefore, the
 ipppd configuration phase won't touch anything there, as it looks like
 it has already been configured.
 .
 If it doesn't work yet, and you want to try the automatic configuration,
 stop all ISDN processes (use \"/etc/init.d/isdnutils stop\"), remove the
 files mentioned above, and rerun the configuration with \"dpkg-reconfigure
 ipppd\". After that, restart the ISDN processes with \"/etc/init.d/isdnutils
 start\".
";
$elem["ipppd/ispwontdoit"]["descriptionde"]="Konfiguration für Internet-Einwahl existiert bereits
 Die Dateien device.${IPPP0} und ipppd.${IPPP0} existieren bereits. Weil es so aussieht, als ob ipppd bereits konfiguriert wurde, wird in der Konfigurationsphase dort nichts verändert.
 .
 Wenn es noch nicht läuft und Sie die automatische Konfiguration probieren wollen, stoppen Sie alle ISDN-Prozesse (benutzen Sie »/etc/init.d/isdnutils stop«), entfernen Sie die oben benannten Dateien und lassen Sie »dpkg-reconfigure ipppd« nochmals laufen. Danach starten Sie die ISDN-Prozesse erneut mit »/etc/init.d/isdnutils start«.
";
$elem["ipppd/ispwontdoit"]["descriptionfr"]="Configuration d'appel du FAI existante
 Les fichiers device.${IPPP0} et ipppd.${IPPP0} existent déjà. La configuration semble donc avoir déjà été faite : rien ne sera changé.
 .
 Si, pour l'instant rien ne fonctionne et que vous vouliez essayer la configuration automatique, arrêtez tous les processus RNIS avec la commande « /etc/init.d/isdnutils stop », supprimez les fichiers mentionnés précédemment et relancez la configuration avec la commande « dpkg-reconfigure ipppd ». Ensuite relancez les processus RNIS avec la commande « /etc/init.d/isdnutils start ».
";
$elem["ipppd/ispwontdoit"]["default"]="";
$elem["ipppd/whichif"]["type"]="string";
$elem["ipppd/whichif"]["description"]="Interface to configure:
 The default setting should be safe for most configurations.
 .
 However, if you have special requirements or want to choose
 to configure another interface, please enter it here.
 .
 Leave the field blank if you do not want to configure anything now.
";
$elem["ipppd/whichif"]["descriptionde"]="Zu konfigurierende Schnittstelle:
 Die Standardeinstellungen sollten für die meisten Konfigurationen gut funktionieren.
 .
 Falls Sie allerdings besondere Anforderungen haben oder eine andere Schnittstelle für die Konfiguration auswählen wollen, geben Sie das hier ein.
 .
 Lassen Sie das Feld leer, wenn Sie jetzt nichts konfigurieren wollen.
";
$elem["ipppd/whichif"]["descriptionfr"]="Interface à configurer :
 Le réglage par défaut devrait convenir à la plupart des environnements.
 .
 Cependant, si vous avez des besoins spécifiques ou souhaitez choisir une autre interface, veuillez l'indiquer ici.
 .
 Vous pouvez laisser ce champ vide si vous ne voulez rien configurer maintenant.
";
$elem["ipppd/whichif"]["default"]="ippp0";
$elem["ipppd/wrongif"]["type"]="error";
$elem["ipppd/wrongif"]["description"]="Invalid interface name
 Valid interface names begin with \"ippp\" followed by a number between
 0 and 63.
";
$elem["ipppd/wrongif"]["descriptionde"]="Ungültiger Schnittstellenname
 Gültige Schnittstellennamen beginnen mit »ippp«, gefolgt von einer Zahl zwischen 0 bis 63.
";
$elem["ipppd/wrongif"]["descriptionfr"]="Nom d'interface incorrect
 Les noms valables pour les interfaces commencent par « ippp » suivi d'un nombre entre 0 et 63.
";
$elem["ipppd/wrongif"]["default"]="";
$elem["ipppd/ispphone"]["type"]="string";
$elem["ipppd/ispphone"]["description"]="ISP's telephone number:
 At least one phone number has to be dialed in order to connect
 to an Internet service provider (ISP).
 .
 Please enter that telephone number here, including dialing prefixes,
 area codes, and so on, but without any spaces.
 .
 Multiple telephone numbers may be entered and should be separated by spaces.
 .
 Leave the field blank if you want to configure the connection manually.
";
$elem["ipppd/ispphone"]["descriptionde"]="Telefonnummer Ihres Internet-Service-Providers:
 Wenigstens eine Telefonnummer muss gewählt werden, um sich mit einem Internet-Service-Provider(ISP) zu verbinden.
 .
 Bitte tragen Sie diese Telefonnummer, inklusive Vorwahl, Ortsvorwahl und so weiter, aber ohne Leerzeichen, hier ein.
 .
 Mehrere Telefonnummern können eingegeben werden und sollten mit Leerzeichen getrennt werden.
 .
 Lassen Sie das Feld leer, falls Sie die Verbindung manuell konfigurieren wollen.
";
$elem["ipppd/ispphone"]["descriptionfr"]="Numéro de téléphone du FAI :
 Au moins un numéro de téléphone doit être indiqué pour paramétrer la connexion à un fournisseur d'accès à l'Internet (FAI).
 .
 Veuillez indiquer ce numéro de téléphone, avec préfixe de numérotation, indicatif de zone, etc. N'utilisez pas d'espace.
 .
 Vous pouvez indiquer plusieurs numéros de téléphone, en les séparant par des espaces.
 .
 Vous pouvez laisser ce champ vide si vous voulez configurer la connexion vous-même.
";
$elem["ipppd/ispphone"]["default"]="manual";
$elem["ipppd/eaz"]["type"]="string";
$elem["ipppd/eaz"]["description"]="Local MSN:
 When making a call with ISDN, the MSN (phone number) that is originating
 the call must be given in the call-setup message. While a wrong MSN will
 usually be replaced by the main MSN for the ISDN line, especially on
 PABXes, a wrong MSN (often the extension number in this case) will cause
 the call-setup to fail. So, it is best to enter the correct local MSN
 here.
 .
 This may also be necessary if you want the costs to be registered to one
 particular MSN, in case you have more than one MSN and this is supported
 by your telecommunication providing company.
";
$elem["ipppd/eaz"]["descriptionde"]="Lokale MSN:
 Wenn ein Anruf über ISDN gemacht wird, muss in der Nachricht zur Anrufeinrichtung die MSN (Telefonnummer) angegeben werden, von der der Anruf ausgehen soll. Auch wenn normalerweise eine falsche MSN durch die Haupt-MSN des Anschlusses ersetzt wird, kann, besonders bei Telekommunikationsanlagen (PABX), eine falsche MSN (oft in diesen Fällen die Durchwahl) zu Problemen führen. Es ist somit das Beste, hier die richtige lokale MSN anzugeben.
 .
 Dies kann ebenfalls nötig sein, wenn Sie die Telefonkosten für eine einzelne MSN verbuchen lassen wollen, und Sie mehr als eine MSN haben und dies von Ihrer Telefongesellschaft unterstützt wird.
";
$elem["ipppd/eaz"]["descriptionfr"]="Numéro de téléphone local (« MSN ») :
 Lors d'un appel avec une ligne RNIS, le numéro de téléphone émetteur de l'appel (MSN) doit être donné dans le message de configuration. Bien que, d'ordinaire, un numéro erroné soit remplacé par le numéro de téléphone principal de la ligne RNIS, avec certains auto-commutateurs privés, un numéro erroné (souvent à cause d'une erreur dans le suffixe) entraînera l'échec de l'appel. Il vaut donc mieux fournir le numéro interne correct.
 .
 Cela peut aussi s'avérer nécessaire si vous voulez enregistrer les coûts de communication d'un numéro particulier quand vous disposez de plus d'un numéro interne et que l'opérateur téléphonique fournit ce service.
";
$elem["ipppd/eaz"]["default"]="0";
$elem["ipppd/isplogin"]["type"]="string";
$elem["ipppd/isplogin"]["description"]="ISP account name:
 Most ISPs require an account name and password to be provided when
 connecting.
";
$elem["ipppd/isplogin"]["descriptionde"]="ISP-Zugangsname:
 Die meisten ISPs benötigen einen Zugangsnamen und ein Passwort, um eine Verbindung herzustellen.
";
$elem["ipppd/isplogin"]["descriptionfr"]="Identifiant pour la connexion au FAI :
 La plupart des fournisseurs d'accès à l'Internet imposent l'utilisation d'un identifiant et d'un mot de passe de connexion.
";
$elem["ipppd/isplogin"]["default"]="";
$elem["ipppd/isppasswd"]["type"]="password";
$elem["ipppd/isppasswd"]["description"]="ISP password:
 Please enter the password to use when connecting to the ISP. This password
 will be kept in /etc/ppp/pap-secrets and
 /etc/ppp/chap-secrets together with the account name.
";
$elem["ipppd/isppasswd"]["descriptionde"]="ISP-Passwort:
 Bitte geben Sie das Zugangspasswort für Ihren ISP an. Das Passwort wird zusammen mit dem Benutzernamen in den Dateien /etc/ppp/pap-secrets und /etc/ppp/chap-secrets gespreichert.
";
$elem["ipppd/isppasswd"]["descriptionfr"]="Mot de passe pour la connexion au FAI :
 Veuillez indiquer le mot de passe à utiliser pour la connexion au fournisseur d'accès à l'Internet. Ce mot de passe sera conservé dans /etc/ppp/pap-secrets et dans /etc/ppp/chap-secrets avec l'identifiant associé.
";
$elem["ipppd/isppasswd"]["default"]="";
$elem["ipppd/isploginpapalreadythere"]["type"]="error";
$elem["ipppd/isploginpapalreadythere"]["description"]="ISP user name already in pap-secrets
 The user name you entered for logging into your ISP is already listed in
 the /etc/ppp/pap-secrets file. The existing entry
 will be commented out, and a new entry with the data you just entered will
 be inserted.
";
$elem["ipppd/isploginpapalreadythere"]["descriptionde"]="Der Benutzername für diesen Internet Service Provider kommt in der Datei pap-secrets bereits vor.
 Der Benutzername, den Sie für die Anmeldung bei Ihrem ISP eingegeben haben, ist bereits in der Datei /etc/ppp/pap-secrets aufgeführt. Der existierende Eintrag wird auskommentiert und ein neuer Eintrag mit den Daten, die Sie gerade eingegeben haben, wird eingefügt.
";
$elem["ipppd/isploginpapalreadythere"]["descriptionfr"]="Identifiant de FAI déjà dans pap-secrets
 L'identifiant que vous avez indiqué pour la connexion à votre FAI existe déjà dans le fichier /etc/ppp/pap-secrets. L'entrée existante sera mise en commentaire et la valeur que vous venez d'indiquer sera utilisée à la place.
";
$elem["ipppd/isploginpapalreadythere"]["default"]="";
$elem["ipppd/isploginchapalreadythere"]["type"]="error";
$elem["ipppd/isploginchapalreadythere"]["description"]="ISP user name already in chap-secrets
 The user name you entered for logging into your ISP is already listed in
 the /etc/ppp/chap-secrets file. The existing entry
 will be commented out, and a new entry with the data you just entered will
 be inserted.
";
$elem["ipppd/isploginchapalreadythere"]["descriptionde"]="Der Benutzername für diesen Internet Service Provider kommt in der Datei chap-secrets bereits vor.
 Der Benutzername, den Sie für die Anmeldung bei Ihrem ISP eingegeben haben, ist bereits in der Datei /etc/ppp/chap-secrets aufgeführt. Der existierende Eintrag wird auskommentiert und ein neuer Eintrag mit den Daten, die Sie gerade eingegeben haben, wird eingefügt.
";
$elem["ipppd/isploginchapalreadythere"]["descriptionfr"]="Identifiant de FAI déjà dans chap-secrets
 L'identifiant que vous avez indiqué pour la connexion à votre FAI existe déjà dans le fichier /etc/ppp/chap-secrets. L'entrée existante sera mise en commentaire et la valeur que vous venez d'indiquer sera utilisée à la place.
";
$elem["ipppd/isploginchapalreadythere"]["default"]="";
$elem["ipppd/isploginpapchapalreadythere"]["type"]="error";
$elem["ipppd/isploginpapchapalreadythere"]["description"]="ISP user name already in chap-secrets and pap-secrets
 The user name you entered for logging into your ISP is already listed in
 the chap-secrets and pap-secrets files in /etc/ppp/.
 The existing entries will be commented out, and new entries with the data
 you just entered will be inserted.
";
$elem["ipppd/isploginpapchapalreadythere"]["descriptionde"]="Der Benutzername für diesen Internet Service Provider kommt in den Dateien chap-secrets und pap-secrets bereits vor.
 Der Benutzername, den Sie für die Anmeldung bei Ihrem ISP eingegeben haben, ist bereits in den Dateien chap-secrets und pap-secrets im Verzeichnis /etc/ppp/ aufgeführt. Die existierenden Einträge werden auskommentiert und neue Einträge mit den Daten, die Sie gerade eingegebenhaben, werden eingefügt.
";
$elem["ipppd/isploginpapchapalreadythere"]["descriptionfr"]="Identifiant de FAI déjà dans chap-secrets et pap-secrets
 L'identifiant que vous avez indiqué pour la connexion à votre FAI existe déjà dans les fichiers chap-secrets et pap-secrets du répertoire /etc/ppp/. L'entrée existante sera mise en commentaire et la valeur que vous venez d'indiquer sera utilisée à la place.
";
$elem["ipppd/isploginpapchapalreadythere"]["default"]="";
$elem["ipppd/oldipup"]["type"]="error";
$elem["ipppd/oldipup"]["description"]="/etc/ppp/ip-up.d/00-isdnutils still exists
 The /etc/ppp/ip-up.d/00-isdnutils file from the old isdnutils package
 still exists. If you changed that file at some point, you may need to redo
 those changes in the 00-ipppd file (which is the new name). After that,
 please delete the old 00-isdnutils file.
 .
 Until it is deleted, it will still be used. This may cause conflicts.
";
$elem["ipppd/oldipup"]["descriptionde"]="/etc/ppp/ip-up.d/00-isdnutils existiert noch
 Die Datei /etc/ppp/ip-up.d/00-isdnutils aus dem älteren isdnutils-Paket existiert noch. Wenn Sie diese Datei zu irgendeinem Zeitpunkt verändert haben, müssen Sie diese Änderungen wahrscheinlich in der Datei 00-ipppd (dies ist der neue Name) wiederholen. Danach löschen Sie bitte die alte Datei 00-isdnutils.
 .
 Solange sie nicht gelöscht wurde, wird sie weiter benutzt! Dies kann zu Konflikten führen.
";
$elem["ipppd/oldipup"]["descriptionfr"]="/etc/ppp/ip-up.d/00-isdnutils existe encore
 Le fichier /etc/ppp/ip-up.d/00-isdnutils qui appartient à l'ancien paquet isdnutils existe encore. Si vous avez modifié vous-même ce fichier, il peut être nécessaire de reporter ces changements dans le nouveau fichier 00-ipppd. Ensuite, veuillez supprimer l'ancien fichier 00-isdnutils.
 .
 Il sera utilisé tant qu'il n'est pas supprimé, et cela peut provoquer des conflits.
";
$elem["ipppd/oldipup"]["default"]="";
$elem["ipppd/oldipdown"]["type"]="error";
$elem["ipppd/oldipdown"]["description"]="/etc/ppp/ip-down.d/99-isdnutils still exists
 The /etc/ppp/ip-down.d/99-isdnutils file from the old isdnutils package
 still exists. If you changed that file at some point, you may need to redo
 those changes in the 99-ipppd file (which is the new name). After that,
 please delete the old 99-isdnutils file.
 .
 Until it is deleted, it will still be used. This may cause conflicts.
";
$elem["ipppd/oldipdown"]["descriptionde"]="/etc/ppp/ip-down.d/99-isdnutils existiert noch
 Die Datei /etc/ppp/ip-down.d/99-isdnutils aus dem älteren isdnutils-Paket existiert noch. Wenn Sie diese Datei zu irgendeinem Zeitpunkt verändert haben, müssen Sie diese Änderungen wahrscheinlich in der Datei 99-ipppd (dies ist der neue Name) wiederholen. Danach löschen Sie bitte die alte Datei 99-isdnutils.
 .
 Solange sie nicht gelöscht wurde, wird sie weiter benutzt! Dies kann zu Konflikten führen.
";
$elem["ipppd/oldipdown"]["descriptionfr"]="/etc/ppp/ip-down.d/99-isdnutils existe encore
 Le fichier /etc/ppp/ip-down.d/99-isdnutils qui appartient à l'ancien paquet isdnutils existe encore. Si vous avez modifié vous-même ce fichier, il peut être nécessaire de reporter ces changements dans le nouveau fichier 99-ipppd. Ensuite, veuillez supprimer l'ancien fichier 99-isdnutils.
 .
 Il sera utilisé tant qu'il n'est pas supprimé, et cela peut provoquer des conflits.
";
$elem["ipppd/oldipdown"]["default"]="";
$elem["ipppd/oldipupdown"]["type"]="error";
$elem["ipppd/oldipupdown"]["description"]="old /etc/ppp/ip-up.d and ip-down.d scripts still exist
 The /etc/ppp/ip-up.d/00-isdnutils and /etc/ppp/ip-down.d/99-isdnutils
 files from the old isdnutils package still exist. If you changed those
 files at some point, you may need to redo those changes in the 00-ipppd
 and 99-ipppd files (which are the new names). After that, please delete
 the old 00-isdnutils and 99-isdnutils files.
 .
 Until they are deleted, they will still be used. This may cause conflicts.
";
$elem["ipppd/oldipupdown"]["descriptionde"]="alte /etc/ppp/ip-up.d- und ip-down.d-Skripte existieren noch
 Die Dateien /etc/ppp/ip-up.d/00-isdnutils und /etc/ppp/ip-down.d/99-isdnutilsvon dem älteren isdnutils-Paket existieren noch. Wenn Sie diese Dateien zu irgendeinem Zeitpunkt angepasst haben, müssen Sie diese Änderungen in den neuen Dateien 00-ipppd und 99-ipppd wahrscheinlich erneut vornehmen. Danach löschen Sie bitte die alten Dateien 00-isdnutils und 99-isdnutils.
 .
 Bis sie gelöscht werden, werden sie weiter benutzt! Dies kann zu Konflikten führen.
";
$elem["ipppd/oldipupdown"]["descriptionfr"]="Les anciens scripts /etc/ppp/ip-up.d et ip-down.d existent encore
 Les fichiers /etc/ppp/ip-up.d/00-isdnutils et /etc/ppp/ip-down.d/99-isdnutils qui appartiennent à l'ancien paquet isdnutils existent toujours. Si vous avez modifié vous-même ces fichiers, il peut être nécessaire de reporter ces changements dans les nouveaux fichiers 00-ipppd et 99-ipppd. Ensuite, veuillez supprimer les anciens fichiers 00-isdnutils et 99-isdnutils.
 .
 Ils seront utilisés tant qu'ils ne sont pas supprimés, et cela peut provoquer des conflits.
";
$elem["ipppd/oldipupdown"]["default"]="";
$elem["ipppd/noisdnutilsinit"]["type"]="error";
$elem["ipppd/noisdnutilsinit"]["description"]="(Re)start ipppd manually
 There is no /etc/init.d/isdnutils on this system; hence you will have to
 stop and start any ipppd daemons manually.
";
$elem["ipppd/noisdnutilsinit"]["descriptionde"]="ipppd von Hand (neu) starten
 Die Datei /etc/init.d/isdnutils gibt es in Ihrem System nicht. Deshalb werden Sie jeden ipppd-Daemon von Hand starten und stoppen müssen.
";
$elem["ipppd/noisdnutilsinit"]["descriptionfr"]="Lancement manuel d'ipppd
 Il n'existe pas de script /etc/init.d/isdnutils sur ce système. Vous devez donc lancer ou arrêter les démons ipppd vous-même.
";
$elem["ipppd/noisdnutilsinit"]["default"]="";
$elem["ipppd/isdnutilsinitbad"]["type"]="error";
$elem["ipppd/isdnutilsinitbad"]["description"]="Error running isdnutils init script
 The /etc/init.d/isdnutils script ran with errors. Please check the
 installation of the isdnutils-base package; reinstall it if necessary.
 Perhaps moving /etc/init.d/isdnutils.dpkg-dist (if it exists) to
 /etc/init.d/isdnutils will also help.
";
$elem["ipppd/isdnutilsinitbad"]["descriptionde"]="Fehler bei der Ausführung des isdnutils-init-Skriptes
 Das Skript /etc/init.d/isdnutils war nicht erfolgreich. Bitte überprüfen Sie die Installation des Paketes isdnutils-base; installieren Sie es erneut wenn nötig. Unter Umständen kann es helfen, /etc/init.d/isdnutils.dpkg-dist (wenn die Datei existiert) in /etc/init.d/isdnutils umzubenennen (überschreiben).
";
$elem["ipppd/isdnutilsinitbad"]["descriptionfr"]="Erreur à l'exécution du script de démarrage d'isdnutils
 Des erreurs se sont produites pendant l'exécution du script /etc/init.d/isdnutils. Veuillez vérifier l'installation du paquet isdnutils-base et réinstallez-le si nécessaire. Il sera peut-être judicieux de renommer le fichier /etc/init.d/isdnutils.dpkg-dist (s'il existe) en /etc/init.d/isdnutils.
";
$elem["ipppd/isdnutilsinitbad"]["default"]="";
PKG_OptionPageTail2($elem);
?>
