<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ejabberd");

$elem["ejabberd/hostname"]["type"]="string";
$elem["ejabberd/hostname"]["description"]="Hostname for this Jabber server:
 Please enter a hostname for this Jabber server.
 .
 If you would like to configure multiple hostnames for this server, you will
 have to do so manually in /etc/ejabberd/ejabberd.yml after installation.
";
$elem["ejabberd/hostname"]["descriptionde"]="Rechnername für diesen Jabber-Server:
 Geben Sie bitte den Rechnernamen dieses Jabber-Servers an.
 .
 Falls Sie mehrere Rechnernamen für diesen Server konfigurieren möchten, müssen Sie dies nach der Installation manuell in /etc/ejabberd/ejabberd.yml vornehmen.
";
$elem["ejabberd/hostname"]["descriptionfr"]="Nom d'hôte du serveur Jabber :
 Veuillez indiquer un nom d'hôte pour le serveur Jabber.
 .
 Si vous souhaitez configurer plusieurs noms d'hôtes pour ce serveur, vous devrez le faire manuellement dans /etc/ejabberd/ejabberd.yml après l'installation.
";
$elem["ejabberd/hostname"]["default"]="localhost";
$elem["ejabberd/user"]["type"]="string";
$elem["ejabberd/user"]["description"]="Jabber server administrator username:
 Please provide the name of an account to administrate the ejabberd server.
 After the installation of ejabberd, you can log in to this account using
 either any Jabber client or a web browser pointed at the administrative
 https://${hostname}:5280/admin/ interface.
 .
 You only need to enter the username part here (such as ${user}), but
 the full Jabber ID (such as ${user}@${hostname}) is required to
 access the ejabberd web interface.
 .
 Please leave this field empty if you don't want to create an
 administrator account automatically.
";
$elem["ejabberd/user"]["descriptionde"]="Benutzername des Jabber-Server-Administrators:
 Geben Sie bitte den Namen für ein Konto an, das den Ejabberd-Server verwalten kann. Nach der Installation können Sie sich an diesem Konto mittels eines beliebigen Jabber-Clients oider mit einem Webbrowser, der auf die administrative Schnittstelle https://${hostname}:5280/admin/ zeigt, anmelden.
 .
 Sie müssen hier nur den Benutzernamen-Anteil (z.B. ${user}) eingeben, verwenden Sie aber die komplette Jabber-ID (z.B. ${user}@${hostname}), um sich an der Ejabberd-Webschnittstelle anzumelden.
 .
 Bitte lassen Sie dieses Feld leer, falls Sie kein privilegiertes Konto automatisch anlegen möchten.
";
$elem["ejabberd/user"]["descriptionfr"]="Identifiant de l'administrateur du serveur Jabber :
 Veuillez indiquer un identifiant afin d'administrer le serveur ejabberd. Après l'installation, vous pouvez vous connecter à ce compte avec tout client Jabber ou un navigateur web pointant sur l'interface d'administration https://${hostname}:5280/admin/.
 .
 Veuillez seulement entrer ici l'identifiant (par exemple, « ${user} »). Cependant, vous devrez utiliser une identité Jabber complète (par exemple, « ${user}@${hostname} ») pour vous connecter à l'interface web.
 .
 Veuillez laisser ce champ vide si vous ne souhaitez pas créer de compte administrateur automatiquement.
";
$elem["ejabberd/user"]["default"]="";
$elem["ejabberd/password"]["type"]="password";
$elem["ejabberd/password"]["description"]="Jabber server administrator password:
 Please enter the password for the administrative user.
";
$elem["ejabberd/password"]["descriptionde"]="Passwort des Jabber-Server-Administrators:
 Geben Sie das Passwort für den Administrator an.
";
$elem["ejabberd/password"]["descriptionfr"]="Mot de passe de l'administrateur du serveur Jabber :
 Veuillez choisir le mot de passe de l'utilisateur administrateur.
";
$elem["ejabberd/password"]["default"]="";
$elem["ejabberd/verify"]["type"]="password";
$elem["ejabberd/verify"]["description"]="Re-enter password to verify:
 Please enter the same administrator password again to verify that you have typed it
 correctly.
";
$elem["ejabberd/verify"]["descriptionde"]="Zur Kontrolle Passwort erneut eingeben:
 Bitte geben Sie das gleiche Administratorpasswort erneut ein, um sicherzustellen, dass Sie richtig getippt haben.
";
$elem["ejabberd/verify"]["descriptionfr"]="Entrez à nouveau le mot de passe pour vérification :
 Veuillez entrer à nouveau le mot de passe administrateur pour vérifier que vous l'avez entré correctement.
";
$elem["ejabberd/verify"]["default"]="";
$elem["ejabberd/nomatch"]["type"]="error";
$elem["ejabberd/nomatch"]["description"]="Password input error
 The two passwords you entered did not match or were empty. Please try again.
";
$elem["ejabberd/nomatch"]["descriptionde"]="Passworteingabefehler
 Die zwei eingegebenen Passwörter passten nicht oder waren leer. Bitte versuchen Sie es noch einmal.
";
$elem["ejabberd/nomatch"]["descriptionfr"]="Erreur d'entrée du mot de passe
 Les deux mots de passe saisis ne correspondent pas ou sont vides. Veuillez recommencer.
";
$elem["ejabberd/nomatch"]["default"]="";
$elem["ejabberd/invaliduser"]["type"]="error";
$elem["ejabberd/invaliduser"]["description"]="Invalid administrator account username
 The username previously specified contains forbidden characters. Please
 respect the JID syntax (https://tools.ietf.org/html/rfc6122#appendix-A.5).
 If you used a full JID (e.g. user@hostname), the hostname needs to match the
 one previously specified.
";
$elem["ejabberd/invaliduser"]["descriptionde"]="Ungültiger Benutzername für administratives Konto
 Der von Ihnen angegebene Benutzername enthält verbotene Zeichen. Bitte berücksichtigen Sie die JID-Syntax (https://tools.ietf.org/html/rfc6122#appendix-A.5). Falls Sie eine volle JID verwendet haben (z.B. Benutzer@Rechnername), muss der Rechnername auf den vorher angegebenen passen.
";
$elem["ejabberd/invaliduser"]["descriptionfr"]="Identifiant du compte administrateur non valable
 L'identifiant que vous venez d'entrer contient des caractères interdits. Veuillez respecter la syntaxe de l'identité Jabber (JID) (http://tools.ietf.org/html/rfc6122#appendix-A.5). Si vous utilisez une identité Jabber complète (par exemple, user@hostname), le nom d'hôte doit correspondre à celui que vous avez entré précédemment.
";
$elem["ejabberd/invaliduser"]["default"]="";
$elem["ejabberd/invalidhostname"]["type"]="error";
$elem["ejabberd/invalidhostname"]["description"]="Invalid hostname
 The hostname previously specified contains forbidden characters or is otherwise
 invalid. Please correct it and try again.
";
$elem["ejabberd/invalidhostname"]["descriptionde"]="Ungültiger Rechnername
 Der vorher angegebene Rechnername enthält verbotene Zeichen oder ist anderweitig ungültig. Bitte korrigieren Sie dies und versuchen Sie es erneut.
";
$elem["ejabberd/invalidhostname"]["descriptionfr"]="Nom d'hôte non valable
 Le nom d'hôte précédemment entré contient des caractères interdits ou n'est pas valable pour d'autres raisons. Veuillez le corriger et recommencer.
";
$elem["ejabberd/invalidhostname"]["default"]="";
$elem["ejabberd/invalidpreseed"]["type"]="error";
$elem["ejabberd/invalidpreseed"]["description"]="Invalid preseeded configuration
 A newer ${preseed} validation is being used and has determined
 that the currently setup ${preseed} is invalid or incorrectly
 specified.
 .
 If you would like to correct it, please backup your data and run
 dpkg-reconfigure ejabberd after the upgrade is finished and note that
 any databases and usernames will be lost or invalidated in this process
 if the hostname is changed.
";
$elem["ejabberd/invalidpreseed"]["descriptionde"]="Ungültige voreingestellte Konfiguration
 Eine neuere ${preseed}-Validierung wird verwandt und hat ermittelt, dass die derzeitige Konfiguration ${preseed} ungültig oder inkorrekt festgelegt ist.
 .
 Falls Sie dies korrigieren möchten, sichern Sie Ihre Daten und führen Sie nach dem Upgrade »dpkg-reconfigure ejabberd« aus. Beachten Sie, dass alle Datenbank- und Benutzernamen verloren gehen oder ungültig werden, falls während dieses Vorgangs der Rechnername geändert wird.
";
$elem["ejabberd/invalidpreseed"]["descriptionfr"]="Préconfiguration non valable
 Une validation de ${preseed} plus récente est utilisée et a déterminé que le ${preseed} actuellement configuré n'est pas valable ou pas correctement indiqué.
 .
 Si vous souhaitez le corriger, veuillez sauvegarder vos données et exécuter dpkg-reconfigure ejabberd après la fin de la mise à niveau, et notez que tous les noms d'utilisateur et les bases de données seront perdus ou invalidés si le nom d'hôte est modifié.
";
$elem["ejabberd/invalidpreseed"]["default"]="";
$elem["ejabberd/nodenamechanges"]["type"]="note";
$elem["ejabberd/nodenamechanges"]["description"]="Important changes to nodename (ERLANG_NODE) configuration
 The nodename has changed to reflect ejabberd's upstream recommended nodename
 configuration (ejabberd@localhost) which saves effort when moving XMPP domains
 to a different machine.
 .
 This may break the current installation but may easily be fixed by editing
 the ERLANG_NODE option in /etc/default/ejabberd either back to ejabberd or to
 the name it was manually specified.
 .
 Another way to fix a broken installation is to use ejabberdctl's mnesia_change_nodename
 option to change the nodename in the mnesia database. More information on this
 method may be found on the ejabberd guide
 (https://docs.ejabberd.im/admin/guide/managing/#change-computer-hostname). Please
 make appropriate backups of the database before attempting this method.
";
$elem["ejabberd/nodenamechanges"]["descriptionde"]="Wichtige Änderungen an der Knotennamen-Konfiguration (ERLANG_NODE)
 Der Knotenname wurde geändert, um die empfohlene Knotennamenkonfiguration der Originalautoren von Ejabberd (ejabberd@localhost) wiederzugeben. Damit wird Aufwand gespart, wenn XMPP-Domains auf eine andere Maschine verschoben werden.
 .
 Dies könnte die aktuelle Installation beschädigen, kann aber leicht durch Bearbeitung der Option »ERLANG_NODE« in /etc/default/ejabberd korrigiert werden; entweder wieder zurück auf »ejabberd« oder auf den Namen, der manuell festgelegt worden war.
 .
 Eine defekte Installation kann auch mit der Option mnesia_change_nodename von ejabberdctl korrigiert werden, um die Knotennamen in der Mnesia-Datenbank zu ändern. Weitere Informationen über diese Methode können im Ejabberd-Leitfaden (https://docs.ejabberd.im/admin/guide/managing/#change-computer-hostname) gefunden werden. Bitte legen Sie geeignete Sicherungskopien der Datenbank an, bevor Sie diese Methode versuchen.
";
$elem["ejabberd/nodenamechanges"]["descriptionfr"]="Modifications importantes de la configuration du nom de nœud (ERLANG_NODE)
 Le nom de nœud a été modifié pour refléter la configuration recommandée par les développeurs amont d'ejabberd (ejabberd@localhost), ce qui évite des efforts lorsque les domaines XMPP sont déplacés sur une machine différente.
 .
 Cela peut casser l'installation actuelle, mais peut être facilement corrigé en modifiant l'option ERLANG_NODE dans /etc/default/ejabberd soit en revenant à ejabberd soit au nom défini manuellement.
 .
 Un autre moyen de corriger une installation cassée est d'utiliser l'option « mnesia_change_nodename » d'ejabberdctl pour modifier le nom de nœud dans la base de données mnesia. Plus d'informations sur cette méthode se trouvent dans le guide d'ejabberd (https://docs.ejabberd.im/admin/guide/managing/#change-computer-hostname). Veuillez faire les sauvegardes appropriées de la base de données avant d'essayer cette méthode.
";
$elem["ejabberd/nodenamechanges"]["default"]="";
$elem["ejabberd/erlangopts"]["type"]="string";
$elem["ejabberd/erlangopts"]["description"]="ERL_OPTIONS for this ejabberd server:
 To run the ejabberd server with customized Erlang options, enter them here.
 It is also possible to set them by editing /etc/ejabberd/ejabberdctl.cfg.
 See the erl(1) man page for more information.
";
$elem["ejabberd/erlangopts"]["descriptionde"]="ERL_OPTIONS für diesen Jabber-Server:
 Um diesen Jabber-Server mit angepassten Erlang-Optionen auszuführen, geben Sie diese hier ein. Es ist ebenfalls möglich, sie durch manuelles Editieren von /etc/ejabberd/ejabberdctl.cfg zu konfigurieren. Weitere Informationen können in der erl(1) Handbuchseite gefunden werden (`man 1 erl`).
";
$elem["ejabberd/erlangopts"]["descriptionfr"]="ERL_OPTIONS pour ce serveur ejabberd :
 Pour exécuter le serveur ejabberd avec des options personnalisées d'Erlang, veuillez les saisir ici. Il est aussi possible de les définir en éditant le fichier /etc/ejabberd/ejabberdctl.cfg. Consultez la page de manuel erl(1) pour plus d'informations.
";
$elem["ejabberd/erlangopts"]["default"]="-env ERL_CRASH_DUMP_BYTES 0";
PKG_OptionPageTail2($elem);
?>
