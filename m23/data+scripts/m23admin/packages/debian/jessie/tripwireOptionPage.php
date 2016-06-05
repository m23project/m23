<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tripwire");

$elem["tripwire/upgrade"]["type"]="boolean";
$elem["tripwire/upgrade"]["description"]="Do you wish to upgrade?
 The format of the Tripwire database and configuration files have changed
 substantially between previous versions and this release.
 .
 To ensure your system remains secure, the upgrade process keeps a copy of
 the old version of Tripwire and the old configuration file along with any
 old databases that may exist.  You will find a detailed explanation for
 using the old version of Tripwire in
 /usr/share/doc/tripwire/README.Debian.
 .
 However, as no conversion of the old configuration file and database is
 attempted, you may prefer not to upgrade.
 .
 Due to the way Debian handles configuration files, if you choose to
 upgrade you must accept the new version of /etc/cron.daily/tripwire for
 regular reporting to occur.  The cron job associated with the previous
 version will continue to run regardless.
";
$elem["tripwire/upgrade"]["descriptionde"]="Möchten Sie das Upgrade durchführen?
 Die Formate der Tripwire-Datenbank und der Konfigurationsdateien haben sich wesentlich zwischen früheren Versionen und dieser Ausgabe geändert.
 .
 Um sicherzustellen, dass Ihr System sicher bleibt, behält der Upgrade-Prozess eine Kopie der alten Version von Tripwire und der alten Konfigurationsdatei zusammen mit etwaigen alten Datenbanken. Sie finden eine ausführliche Erklärung zur Verwendung der alten Version von Tripwire in /usr/share/doc/tripwire/README.Debian.
 .
 Da jedoch keine Konvertierung der alten Konfigurationsdatei und Datenbank versucht wird, könnten Sie es vorziehen, kein Upgrade durchzuführen.
 .
 Falls Sie sich für das Upgrade entscheiden, müssen Sie aufgrund der Art, wie Debian Konfigurationsdateien behandelt, die neue Version von /etc/cron.daily/tripwire akzeptieren, damit regelmäßige Berichte produziert werden können.Unabhängig davon wird der Cron-Job, der zu vorhergehenden Versionen gehörte, weiterhin laufen.
";
$elem["tripwire/upgrade"]["descriptionfr"]="Souhaitez-vous effectuer la mise à jour ?
 Le format de la base de données et des fichiers de configuration de Tripwire ont significativement changé depuis la version précédente.
 .
 Pour garantir la sécurité de votre système, le processus de mise à jour conserve une copie de l'ancienne version de Tripwire et de ses fichiers de configuration avec toute base de données qui existerait encore. Vous trouverez une explication précise pour utiliser l'ancienne version de Tripwire dans /usr/share/doc/tripwire/README.Debian.
 .
 Cependant, comme aucune conversion des anciens fichiers de configuration et de la base de données n'est prévue, vous préférez peut-être refuser la mise à jour.
 .
 En raison de la façon dont Debian gère les fichiers de configuration, si vous choisissez de mettre à jour, vous devez accepter la nouvelle version de /etc/cron.daily/tripwire pour que les rapports réguliers puissent s'effectuer. La tâche périodique associée à l'ancienne version continuera de toute manière à fonctionner.
";
$elem["tripwire/upgrade"]["default"]="true";
$elem["tripwire/use-sitekey"]["type"]="boolean";
$elem["tripwire/use-sitekey"]["description"]="Do you wish to create/use your site key passphrase during installation?
 Tripwire uses a pair of keys to sign various files, thus ensuring their
 unaltered state.  By accepting here, you will be prompted for the
 passphrase for the first of those keys, the site key, during the
 installation.  You are also agreeing to create a site key if one
 doesn't exist already.  Tripwire uses the site key to sign files that may
 be common to multiple systems, e.g. the configuration & policy files.  See
 twfiles(5) for more information.
 .
 Unfortunately, due to the Debian installation process, there is a period
 of time where this passphrase exists in a unencrypted format. Were an
 attacker to have access to your machine during this period, he could
 possibly retrieve your passphrase and use it at some later point.
 .
 If you would rather not have this exposure, decline here.  You will then
 need to create a site key, configuration file & policy file by hand.  See
 twadmin(8) for more information.
";
$elem["tripwire/use-sitekey"]["descriptionde"]="Möchten Sie Ihre Site-Passphrase während der Installation erzeugen/verwenden?
 Tripwire benutzt ein Paar von Schlüsseln zum Signieren verschiedener Dateien, um deren unveränderten Zustand sicherzustellen. Falls Sie hier akzeptieren, werden Sie nach der Passphrase für den ersten dieser Schlüssel, dem Site-Schlüssel, während der Installation gefragt. Sie stimmen damit auch der Erzeugung eines Site-Schlüssels zu, falls ein solcher noch nicht existiert. Tripwire verwendet den Site-Schlüssel, um Dateien zu signieren, die von verschiedenen Systemen gemeinsam genutzt werden, wie Konfigurations- und Richtliniendateien. Für mehr Informationen, siehe twfiles(5).
 .
 Aufgrund des Debian-Installationsprozesses gibt es leider eine Zeitspanne, in der diese Passphrase in einem unverschlüsselten Format existiert. Falls ein Angreifer Zugang zu Ihrem Rechner während dieser Zeit hätte, könnte er Ihre Passphrase möglicherweise abfragen und später verwenden.
 .
 Falls Sie dieses Risiko nicht eingehen möchten, lehnen Sie hier ab. Sie müssen dann einen Site-Schlüssel, eine Konfigurations- und Richtliniendatei von Hand erzeugen. Siehe twadmin(8) für mehr Informationen.
";
$elem["tripwire/use-sitekey"]["descriptionfr"]="Souhaitez-vous créer ou utiliser votre phrase secrète de la clé du site lors de l'installation ?
 Tripwire utilise une paire de clés pour signer différents fichiers, afin de s'assurer de leur intégrité. En acceptant ici, votre phrase secrète vous sera demandée pour la première des clés, la clé du site, lors de l'installation. Vous serez également invité à créer une clé pour le site s'il n'en existe pas déjà une. Tripwire utilise la clé du site pour signer les fichiers qui peuvent être partagés entre plusieurs systèmes, par exemple les fichiers de configuration et de règles. Consultez twfiles(5) pour plus d'informations.
 .
 Malheureusement, en raison du processus d'installation de Debian, il existe un intervalle de temps pendant lequel la phrase secrète existe dans un format non-chiffré. Si un attaquant possède l'accès à votre machine pendant ce laps de temps, il pourrait récupérer votre phrase secrète et l'utiliser plus tard.
 .
 Si vous préférez ne pas prendre ce risque, veuillez refuser ici. Vous devrez ensuite créer vous-même une clé de site, des fichiers de configuration et de règles. Consultez twadmin(8) pour plus d'informations.
";
$elem["tripwire/use-sitekey"]["default"]="true";
$elem["tripwire/use-localkey"]["type"]="boolean";
$elem["tripwire/use-localkey"]["description"]="Do you wish to create/use your local key passphrase during installation?
 Tripwire uses a pair of keys to sign various files, thus ensuring their
 unaltered state.  By accepting here, you will be prompted for the
 passphrase for the second of those keys, the local key, during the
 installation.  You are also agreeing to create a local key if one
 doesn't exist already.  Tripwire uses the local key to sign files that are
 specific to this system, e.g. the tripwire database. See twfiles(5) for
 more information.
 .
 Unfortunately, due to the Debian installation process, there is a period
 of time where this passphrase exists in a unencrypted format. Were an
 attacker to have access to your machine during this period, he could
 possibly retrieve your passphrase and use it at some later point.
 .
 If you would rather not have this exposure, decline here.  You will then
 need to create a local key file by hand.  See twadmin(8) for more
 information.
";
$elem["tripwire/use-localkey"]["descriptionde"]="Möchten Sie die Passphrase für Ihren lokalen Schlüssel während der Installation erzeugen/verwenden?
 Tripwire benutzt ein Paar von Schlüsseln zum Signieren verschiedener Dateien, um deren unveränderten Zustand sicherzustellen. Falls Sie hier akzeptieren, werden Sie nach der Passphrase für den zweiten dieser Schlüssel, dem lokalen Schlüssel, während der Installation gefragt. Sie stimmen damit auch der Erzeugung eines lokalen Schlüssels zu, falls ein solcher noch nicht existiert. Tripwire verwendet den lokalen Schlüssel, um Dateien zu signieren, die für dieses System spezifisch sind, wie die Tripwire-Datenbank. Für mehr Informationen, siehe twfiles(5).
 .
 Aufgrund des Debian-Installationsprozesses gibt es leider eine Zeitspanne, in der diese Passphrase in einem unverschlüsselten Format existiert. Falls ein Angreifer Zugang zu Ihrem Rechner während dieser Zeit hätte, könnte er Ihre Passphrase möglicherweise abfragen und später verwenden.
 .
 Falls Sie dieses Risiko nicht eingehen möchten, lehnen Sie hier ab. Sie müssen dann einen lokalen Schlüssel von Hand erzeugen. Siehe twadmin(8) für mehr Informationen.
";
$elem["tripwire/use-localkey"]["descriptionfr"]="Souhaitez-vous créer ou utiliser votre phrase secrète locale lors de l'installation ?
 Tripwire utilise une paire de clés pour signer différents fichiers, afin de s'assurer de leur intégrité. En acceptant ici, votre phrase secrète vous sera demandée pour la seconde des clés, la clé locale, lors de l'installation. Vous serez également invité à créer une clé locale s'il n'en existe pas déjà une. Tripwire utilise la clé locale pour signer les fichiers spécifiques à ce système, par exemple la base de données de Tripwire. Consultez twfiles(5) pour plus d'informations.
 .
 Malheureusement, en raison du processus d'installation de Debian, il existe un intervalle de temps pendant lequel la phrase secrète existe dans un format non-chiffré. Si un attaquant possède l'accès à votre machine pendant ce laps de temps, il pourrait récupérer votre phrase secrète et l'utiliser plus tard.
 .
 Si vous préférez ne pas prendre ce risque, veuillez refuser ici. Vous devrez alors créer vous-même une clé locale. Consultez twadmin(8) pour plus d'informations.
";
$elem["tripwire/use-localkey"]["default"]="true";
$elem["tripwire/site-passphrase"]["type"]="password";
$elem["tripwire/site-passphrase"]["description"]="Enter site-key passphrase:
 Tripwire uses two different keys for authentication and encryption of
 files.  The site key is used to protect files that could be used across
 several systems.  This includes the policy and configuration files.
 .
 You are being prompted for this passphrase either because no site key
 exists at this time or because you have requested the rebuilding of the
 policy or configuration files.
 .
 Remember this passphrase; it is not stored anywhere!
";
$elem["tripwire/site-passphrase"]["descriptionde"]="Die Passphrase für den Site-Schlüssel eingeben:
 Tripwire verwendet zwei verschiedene Schlüssel zur Authentifikation und Verschlüsselung von Dateien. Der Site-Schlüssel wird benutzt, um Dateien zu schützen, die über mehrere Systeme hinweg verwendet werden könnten. Dies schließt die Richtlinien- und die Konfigurationsdateien ein.
 .
 Sie werden nach dieser Passphrase gefragt, weil entweder kein Site-Schlüssel gegenwärtig existiert oder weil Sie die Neuerzeugung der Richtlinien- und Konfigurationsdateien angefordert haben.
 .
 Merken Sie sich diese Passphrase; sie wird nirgends gespeichert!
";
$elem["tripwire/site-passphrase"]["descriptionfr"]="Phrase secrète de la clé du site :
 Tripwire utilise deux clés différentes pour l'authentification et le chiffrage des fichiers. La clé du site est utilisée pour protéger les fichiers qui peuvent être utilisés simultanément par différents systèmes. Ceci comprend les fichiers de configuration et de règles.
 .
 Cette phrase secrète vous est demandée car aucune clé de site n'existe pour l'instant ou bien parce que vous avez demandé la reconstruction des fichiers de configuration ou de règles.
 .
 Souvenez-vous de cette phrase secrète, elle n'est conservée nulle part.
";
$elem["tripwire/site-passphrase"]["default"]="";
$elem["tripwire/site-passphrase-again"]["type"]="password";
$elem["tripwire/site-passphrase-again"]["description"]="Repeat the site-key passphrase:
 Please repeat the site pass phrase to be sure you didn't mistype.
";
$elem["tripwire/site-passphrase-again"]["descriptionde"]="Die Passphrase des Site-Schlüssels wiederholen:
 Bitte wiederholen Sie die Passphrase des Site-Schlüssels, um sicherzustellen, dass Sie sich nicht verschrieben haben.
";
$elem["tripwire/site-passphrase-again"]["descriptionfr"]="Confirmation de la phrase secrète de la clé du site :
 Veuillez confirmer la phrase secrète de la clé du site pour être certain que vous n'avez pas fait d'erreur.
";
$elem["tripwire/site-passphrase-again"]["default"]="";
$elem["tripwire/site-passphrase-incorrect"]["type"]="boolean";
$elem["tripwire/site-passphrase-incorrect"]["description"]="Your site passphrase is incorrect. Retry operation?
 The site passphrase you entered is incorrect.  If you think you mistyped
 it and would like to retry the current operation accept below.  If
 you can't remember the passphrase, decline below and the tripwire
 installation process will terminate gracefully.  When you remember the
 site passphrase continue the installation process by running
 .
   dpkg-reconfigure tripwire
 .
 as root.
 .
 If you have completely forgotten your site passphrase, generate a new
 site key with a new passphrase by running
 .
   twadmin -m G -S /etc/tripwire/site.key
 .
 as root.
";
$elem["tripwire/site-passphrase-incorrect"]["descriptionde"]="Ihre Site-Passphrase ist nicht korrekt. Die Operation wiederholen?
 Die Site-Passphrase, die Sie eingegeben haben, ist nicht korrekt. Falls Sie glauben, dass Sie sich verschrieben haben, und Sie die gegenwärtige Operation wiederholen möchten, akzeptieren Sie unten. Falls Sie sich nicht an die Passphrase erinnern können, lehnen Sie unten ab, und die Tripwire-Installation wird sich geordnet beenden. Wenn Sie sich an die Site-Passphrase erinnern, setzen Sie den Installationsprozess fort, indem Sie
 .
   dpkg-reconfigure tripwire
 .
 als root aufrufen.
 .
 Falls Sie Ihre Site-Passphrase vollständig vergessen haben, generieren Sie einen neuen Site-Schlüssel mit einer neuen Passphrase durch Aufruf von
 .
   twadmin -m G -S /etc/tripwire/site.key
 .
 als root aufrufen.
";
$elem["tripwire/site-passphrase-incorrect"]["descriptionfr"]="Votre phrase secrète de site est incorrecte. Faut-il recommencer l'opération ?
 La phrase secrète de site que vous avez indiquée est incorrecte. Si vous pensez avoir fait une erreur, acceptez ici afin de ré-essayer. Si vous ne pouvez pas vous souvenir de la phrase secrète, refusez ici et le processus d'installation de Tripwire se terminera normalement. Lorsque vous vous rappellerez la phrase secrète du site, vous pourrez poursuivre le processus d'installation en exécutant :
 .
   dpkg-reconfigure tripwire
 .
 en tant que super-utilisateur (« root »).
 .
 Si vous avez vraiment oublié votre phrase secrète de site, veuillez générer une nouvelle clé de site avec une nouvelle phrase secrète en exécutant :
 .
   twadmin -m G -S /etc/tripwire/site.key
 .
 en tant que super-utilisateur (« root »).
";
$elem["tripwire/site-passphrase-incorrect"]["default"]="false";
$elem["tripwire/local-passphrase"]["type"]="password";
$elem["tripwire/local-passphrase"]["description"]="Enter local key passphrase:
 Tripwire uses two different keys for authentication and encryption of
 files.  The local key is used to protect files specific to the local
 machine, such as the Tripwire database.  The local key may also be used
 for signing integrity check reports.
 .
 You are being prompted for this passphrase because no local key file
 currently exists.
 .
 Remember this passphrase; it is not stored anywhere!
";
$elem["tripwire/local-passphrase"]["descriptionde"]="Die Passphrase des lokalen Schlüssels eingeben:
 Tripwire verwendet zwei verschiedene Schlüssel zur Authentifikation und Verschlüsselung von Dateien. Der lokale Schlüssel wird benutzt, um Dateien zu schützen, die für Ihr lokales System spezifisch sind, wie die Tripwire-Datenbank. Der lokale Schlüssel kann auch zur Signierung von Berichten der Integritätsprüfung verwendet werden.
 .
 Sie werden nach dieser Passphrase gefragt, da keine lokale Schlüsseldatei gegenwärtig existiert.
 .
 Merken Sie sich diese Passphrase; sie wird nirgends gespeichert!
";
$elem["tripwire/local-passphrase"]["descriptionfr"]="Phrase secrète de la clé locale :
 Tripwire utilise deux clés différentes pour l'authentification et le chiffrage des fichiers. La clé locale est utilisée pour protéger les fichiers spécifiques à la machine locale, comme la base de données Tripwire. La clé locale peut également être utilisée pour signer les rapports de vérification d'intégrité.
 .
 Cette phrase secrète vous est demandée car actuellement, aucune clé locale n'existe.
 .
 Souvenez-vous de cette phrase secrète, elle n'est conservée nulle part.
";
$elem["tripwire/local-passphrase"]["default"]="";
$elem["tripwire/local-passphrase-again"]["type"]="password";
$elem["tripwire/local-passphrase-again"]["description"]="Repeat the local key passphrase:
 Please repeat the local pass phrase to be sure you didn't mistype.
";
$elem["tripwire/local-passphrase-again"]["descriptionde"]="Die Passphrase des lokalen Schlüssels wiederholen:
 Bitte wiederholen Sie die Passphrase des lokalen Schlüssels, um sicherzustellen, dass Sie sich nicht verschrieben haben.
";
$elem["tripwire/local-passphrase-again"]["descriptionfr"]="Confirmation de la phrase secrète pour la clé locale :
 Veuillez confirmer la phrase secrète de la clé locale pour être certain que vous n'avez pas fait d'erreur.
";
$elem["tripwire/local-passphrase-again"]["default"]="";
$elem["tripwire/local-passphrase-incorrect"]["type"]="boolean";
$elem["tripwire/local-passphrase-incorrect"]["description"]="Your local passphrase is incorrect. Retry operation?
 The local passphrase you entered is incorrect.  If you think you mistyped
 it and would like to retry the current operation accept below.  If
 you can't remember the passphrase, decline below and the tripwire
 installation process will terminate gracefully.  When you remember the
 local passphrase continue the installation process by running
 .
   dpkg-reconfigure tripwire
 .
 as root.
 .
 If you have completely forgotten your local passphrase, generate a new
 local key with a new passphrase by running
 .
   twadmin -m G -L /etc/tripwire/${hostname}-local.key
 .
 as root.
";
$elem["tripwire/local-passphrase-incorrect"]["descriptionde"]="Ihre lokale Passphrase ist nicht korrekt. Die Operation wiederholen?
 Die lokale Passphrase, die Sie eingegeben haben, ist nicht korrekt. Falls Sie glauben, dass Sie sich verschrieben haben, und Sie die gegenwärtige Operation wiederholen möchten, akzeptieren Sie unten. Falls Sie sich nicht an die Passphrase erinnern können, lehnen Sie unten ab, und die Tripwire-Installation wird sich geordnet beenden. Wenn Sie sich an die lokale Passphrase erinnern, setzen Sie den Installationsprozess fort, indem Sie
 .
   dpkg-reconfigure tripwire
 .
 als root aufrufen.
 .
 Falls Sie Ihre lokale Passphrase vollständig vergessen haben, generieren Sie einen neuen lokalen Schlüssel mit einer neuen Passphrase durch Aufruf von
 .
   twadmin -m G -L /etc/tripwire/${hostname}-local.key
 .
 als root aufrufen.
";
$elem["tripwire/local-passphrase-incorrect"]["descriptionfr"]="Votre phrase secrète locale est incorrecte. Faut-il recommencer l'opération ?
 La phrase secrète locale que vous avez indiquée est incorrecte. Si vous pensez avoir fait une erreur, acceptez ici afin de ré-essayer. Si vous ne pouvez pas vous souvenir de la phrase secrète, refusez ici et le processus d'installation de Tripwire se terminera normalement. Lorsque vous vous rappellerez la phrase secrète locale, vous pourrez poursuivre le processus d'installation en exécutant :
 .
   dpkg-reconfigure tripwire
 .
 en tant que super-utilisateur (« root »).
 .
 Si vous avez vraiment oublié votre phrase secrète locale, veuillez générer une nouvelle clé locale avec une nouvelle phrase secrète en exécutant :
 .
   twadmin -m G -L /etc/tripwire/${hostname}-local.key
 .
 en tant que super-utilisateur (« root »).
";
$elem["tripwire/local-passphrase-incorrect"]["default"]="false";
$elem["tripwire/rebuild-config"]["type"]="boolean";
$elem["tripwire/rebuild-config"]["description"]="Rebuild Tripwire configuration file?
 Tripwire keeps its configuration in a encrypted database that is
 generated, by default, from /etc/tripwire/twcfg.txt
 .
 Any changes to /etc/tripwire/twcfg.txt, either as a result of a change in
 this package or due to administrator activity, require the regeneration of
 the encrypted database before they will take effect.
 .
 Selecting this action will result in your being prompted for the site key
 passphrase during the post-installation process of this package.
";
$elem["tripwire/rebuild-config"]["descriptionde"]="Die Tripwire-Konfigurationsdatei neu erzeugen?
 Tripwire hält seine Konfiguration in einer verschlüsselten Datenbank, die in der Voreinstellung aus /etc/tripwire/twcfg.txt generiert wird.
 .
 Jegliche Änderung an /etc/tripwire/twcfg.txt, entweder als Ergebnis einer Änderung in diesem Paket oder aufgrund von Aktivitäten des Administrators, erfordert die Neuerzeugung der verschlüsselten Datenbank, bevor sie aktiv werden.
 .
 Die Auswahl dieser Aktion bewirkt, dass Sie während der Post-Installation dieses Paketes nach der Passphrase des Site-Schlüssels gefragt werden.
";
$elem["tripwire/rebuild-config"]["descriptionfr"]="Faut-il reconstruire le fichier de configuration de Tripwire ?
 Tripwire conserve sa configuration dans une base de données chiffrée qui est générée, par défaut, à partir de /etc/tripwire/twcfg.txt.
 .
 Toutes les modifications de /etc/tripwire/twcfg.txt, dues, soit à modification du paquet, soit à l'activité de l'administrateur, nécessitent la régénération de la base de données chiffrée avant qu'elles ne prennent effet.
 .
 Choisir cette action aura comme conséquence de vous demander la phrase secrète de la clé du site lors de la post-configuration de ce paquet.
";
$elem["tripwire/rebuild-config"]["default"]="true";
$elem["tripwire/rebuild-policy"]["type"]="boolean";
$elem["tripwire/rebuild-policy"]["description"]="Rebuild Tripwire policy file?
 Tripwire keeps its policies on what attributes of which files should be
 monitored in a encrypted database that is generated, by default, from
 /etc/tripwire/twpol.txt
 .
 Any changes to /etc/tripwire/twpol.txt, either as a result of a change in
 this package or due to administrator activity, require the regeneration of
 the encrypted database before they will take effect.
 .
 Selecting this action will result in your being prompted for the site key
 passphrase during the post-installation process of this package.
";
$elem["tripwire/rebuild-policy"]["descriptionde"]="Die Tripwire-Richtliniendatei neu erzeugen?
 Tripwire behält Richtlinien darüber, welche Attribute von welchen Dateien überwacht werden sollen, in einer verschlüsselten Datenbank, die in der Voreinstellung aus /etc/tripwire/twpol.txt generiert wird.
 .
 Jegliche Änderungen an /etc/tripwire/twpol.txt, entweder als Ergebnis einer Änderung in diesem Paket oder aufgrund von Aktivitäten des Administrators, erfordert die Neuerzeugung der verschlüsselten Datenbank bevor sie aktiv werden.
 .
 Die Auswahl dieser Aktion bewirkt, dass Sie während der Post-Installation dieses Paketes nach der Passphrase des Site-Schlüssels gefragt werden.
";
$elem["tripwire/rebuild-policy"]["descriptionfr"]="Faut-il reconstruire le fichier de règles de Tripwire ?
 Tripwire conserve les règles indiquant les attributs de fichiers à surveiller dans une base de données chiffrée qui est générée, par défaut, à partir de /etc/tripwire/twpol.txt.
 .
 Toutes les modifications de /etc/tripwire/twpol.txt, dues, soit à une modification du paquet, soit à l'activité de l'administrateur, nécessitent la régénération de la base de données chiffrée avant qu'elles ne prennent effet.
 .
 Choisir cette action aura comme conséquence de vous demander la phrase secrète de la clé du site lors de la post-configuration de ce paquet.
";
$elem["tripwire/rebuild-policy"]["default"]="true";
$elem["tripwire/email-report"]["type"]="note";
$elem["tripwire/email-report"]["description"]="Tripwire no longer emails reports by default
 Previous versions of Tripwire provided the administrator with the option
 of emailing the compliance report generated by the daily cron job to a
 particular address.  This functionality is no longer provided.
 .
 Instead, the administrator may choose to mail failures associated with
 individual rules or sets of rules to one or more accounts, with different
 rule sets using independent email addresses.
 .
 By default, this package does not enable this feature.  Please see the
 twpolicy(4) man page for details on how to configure this functionality.
";
$elem["tripwire/email-report"]["descriptionde"]="Tripwire versendet in der Voreinstellung keine Berichte mehr.
 Vorherige Versionen von Tripwire stellten dem Administrator die Möglichkeit zur Verfügung, die Übereinstimmungsberichte, die von dem täglichen Cron-Lauf generiert werden, zu einer bestimmten Adresse zu schicken. Diese Funktionalität wird nicht länger angeboten.
 .
 Stattdessen kann der Administrator wählen, Fehler, die mit individuellen Regeln oder Sätzen von Regeln assoziiert sind, an ein oder mehrere Konten zu senden. Verschiedene Regelsätze können unabhängige E-Mail-Adressen verwenden.
 .
 In der Voreinstellung aktiviert dieses Paket diese Funktion nicht. Bitte lesen Sie die Handbuchseite twpolicy(4) zu Einzelheiten, wie diese Funktionalität einzurichten ist.
";
$elem["tripwire/email-report"]["descriptionfr"]="Suppression de l'envoi par défaut de rapports Tripwire par courriel
 Les précédentes versions de Tripwire fournissaient à l'administrateur la possibilité d'envoyer, à une adresse de courriel spécifique, les rapports générés par la tâche de cron quotidienne. Désormais, cette fonctionnalité n'existe plus.
 .
 À la place, l'administrateur peut choisir d'envoyer les échecs associés à des règles individuelles ou des jeux de règles vers un ou plusieurs comptes, avec différents jeux de règles utilisant des adresses électroniques différentes.
 .
 Par défaut, ce paquet n'active pas cette fonctionnalité. Veuillez consulter la page de manuel twpolicy(4) pour obtenir des précisions sur sa configuration.
";
$elem["tripwire/email-report"]["default"]="";
$elem["tripwire/installed"]["type"]="note";
$elem["tripwire/installed"]["description"]="Tripwire has been installed
 The Tripwire binaries are located in /usr/sbin and the database is located
 in /var/lib/tripwire. It is strongly advised that these locations be
 stored on write-protected media (e.g. mounted RO floppy). See
 /usr/share/doc/tripwire/README.Debian for details.
";
$elem["tripwire/installed"]["descriptionde"]="Tripwire wurde installiert.
 Die Binärdateien von Tripwire befinden sich in /usr/sbin und die Datenbank ist in /var/lib/tripwire. Es wird sehr empfohlen, dass diese Verzeichnisse auf einem schreibgeschützten Medium (z. B. im nur-lesen-Modus eingehängte Diskette) gespeichert werden. Siehe /usr/share/doc/tripwire/README.Debian zu Einzelheiten.
";
$elem["tripwire/installed"]["descriptionfr"]="Tripwire a été installé
 Les binaires Tripwire sont situés dans /usr/sbin et la base de données est située dans /var/lib/tripwire. Il est fortement conseillé que ces emplacements soient conservés sur des supports protégés en écriture (p. ex. des disquettes montées en lecture seule). Consultez /usr/share/doc/tripwire/README.Debian pour des précisions.
";
$elem["tripwire/installed"]["default"]="";
$elem["tripwire/broken-passphrase"]["type"]="note";
$elem["tripwire/broken-passphrase"]["description"]="Your Tripwire installation may be misconfigured
 There was a bug in version 2.3.0-1 of this package that resulted in
 Tripwire's site and local keys being generated without a passphrase.
 .
 You are strongly urged to delete both the site key file,
 /etc/tripwire/site.key, and local key file,
 /etc/tripwire/${hostname}-local.key, and reconfigure this package using
 dpkg-reconfigure once you have completed this upgrade.  This will result
 in new key files and protect the configuration and policy files once the
 are generated.
";
$elem["tripwire/broken-passphrase"]["descriptionde"]="Ihre Tripwire-Installation könnte falsch konfiguriert sein.
 Es gab einen Fehler in Version 2.3.0-1 dieses Paketes, der darin resultierte, dass die Site- und lokalen Schlüssel von Tripwire ohne Passphrase generiert wurden.
 .
 Sie werden nachdrücklich ermutigt, sowohl die Site-Schlüsseldatei /etc/tripwire/site.key als auch die lokale Schlüsseldatei /etc/tripwire/${hostname}-local.key zu löschen und dieses Paket durch Verwendung von dpkg-reconfigure neu einzurichten, sobald Sie dieses Upgrade abgeschlossen haben. Dies wird in neuen Schlüsseldateien resultieren und die Konfigurations- und Richtliniendateien schützen, sobald diese generiert wurden.
";
$elem["tripwire/broken-passphrase"]["descriptionfr"]="Votre installation de Tripwire est peut être mal configurée
 Un bogue de la version 2.3.0-1 de ce paquet a eu comme conséquence de générer les clés locales et du site Tripwire sans phrase secrète.
 .
 Vous êtes fortement invité à supprimer le fichier de la clé du site, /etc/tripwire/site.key, et le fichier de la clé locale, /etc/tripwire/${hostname}-local.key, et de reconfigurer ce paquet en utilisant « dpkg-reconfigure » dès que vous aurez terminé cette mise à jour. Ceci aura comme conséquence d'utiliser de nouveau fichiers de clé qui, une fois générés, protégeront les fichiers de configuration et de règles.
";
$elem["tripwire/broken-passphrase"]["default"]="";
$elem["tripwire/change-in-default-policy"]["type"]="note";
$elem["tripwire/change-in-default-policy"]["description"]="The default Tripwire policy has changed
 With release ${release}, the default tripwire policy has changed.  If you
 accept dpkg's offer to upgrade /etc/tripwire/twpol.txt and have previously
 chosen to have policy regenerate automatically, the daily tripwire cron
 job will fail until you update your tripwire database.
 .
 To avoid this, either chose not to accept the new version of
 /etc/tripwire/twpol.txt or update your database to reflect the change in
 policy by executing
 .
   tripwire -m p /etc/tripwire/twpol.txt
 .
 as root once you have completed installing this package.  Please see
 /usr/share/doc/tripwire/README.Debian for more details.
";
$elem["tripwire/change-in-default-policy"]["descriptionde"]="Die voreingestellten Tripwire-Richtlinien haben sich geändert.
 Mit Release ${release} haben sich die voreingestellten Tripwire-Richtlinien geändert. Falls Sie das Angebot von dpkg akzeptieren, /etc/tripwire/twpol.txt zu aktualisieren, und Sie früher gewählt haben, die Richtlinien automatisch zu regenerieren, wird der tägliche Cron-Lauf für Tripwire fehlschlagen, bis Sie Ihre Tripwire-Datenbank aktualisieren.
 .
 Um dies zu vermeiden, akzeptieren Sie entweder die neue Version von /etc/tripwire/twpol.txt nicht, oder aktualisieren Sie Ihre Datenbank, um die Richtlinienänderungen zu berücksichtigen, indem Sie
 .
   tripwire -m p /etc/tripwire/twpol.txt
 .
 als root aufrufen, sobald Sie die Installation dieses Paketes beendet haben. Bitte lesen Sie /usr/share/doc/tripwire/README.Debian zu mehr Einzelheiten.
";
$elem["tripwire/change-in-default-policy"]["descriptionfr"]="La règle par défaut de Tripwire a changé
 Depuis la version ${release}, la règle par défaut de Tripwire a changé. Si vous acceptez que dpkg mette à jour /etc/tripwire/twpol.txt et que vous avez précédemment choisi de régénérer automatiquement la règle, la t��che de cron quotidienne de Tripwire échouera tant que vous n'aurez pas mis à jour votre base de données Tripwire.
 .
 Pour éviter cela, choisissez soit de ne pas accepter la nouvelle version de /etc/tripwire/twpol.txt, soit de mettre à jour votre base de données pour prendre en compte les modifications dans la règle en exécutant :
 .
   tripwire -m p /etc/tripwire/twpol.txt
 .
 en tant que super-utilisateur (« root ») une fois que vous aurez terminé l'installation de ce paquet. Veuillez consulter /usr/share/doc/tripwire/README.Debian pour plus de détails.
";
$elem["tripwire/change-in-default-policy"]["default"]="";
PKG_OptionPageTail2($elem);
?>
