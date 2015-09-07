<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("cpu");

$elem["cpu/do_debconf"]["type"]="boolean";
$elem["cpu/do_debconf"]["description"]="Do you want to manage cpu's configuration through debconf?
 Please confirm if you want to allow debconf to manage some parts of your
 cpu.conf. Please note that any further manual changes to cpu.conf
 will never be overwritten by debconf.
";
$elem["cpu/do_debconf"]["descriptionde"]="Sollen die Einstellungen für dieses Paket von debconf verwaltet werden?
 Bitte stimmen Sie zu, wenn debconf einige Teile der Datei cpu.conf verwalten soll. Beachten Sie, dass Ihre eigenen Änderungen, durch Editieren der Datei cpu.conf, bei einem späteren Aufruf von debconf mittels dpkg-reconfigure nicht überschrieben werden.
";
$elem["cpu/do_debconf"]["descriptionfr"]="Faut-il gérer la configuration de CPU avec debconf ?
 Veuilluez confirmer si vous souhaitez que debconf gère certaines parties de votre fichier cpu.conf. Notez que les modifications ultérieures que vous effectuerez directement dans le fichier ne seront jamais écrasées par debconf.
";
$elem["cpu/do_debconf"]["default"]="true";
$elem["cpu/ldap/LDAP_URI"]["type"]="string";
$elem["cpu/ldap/LDAP_URI"]["description"]="LDAP server:
 Please insert the URI of the LDAP server you plan to use with CPU. Use
 the standard form of \"ldap[s]://host[:port]\". The default port value is
 389. Use ldaps if you intend to use a TLS encrypted connection.
";
$elem["cpu/ldap/LDAP_URI"]["descriptionde"]="LDAP-Server:
 Bitte geben Sie die URI des LDAP-Servers in der Form ldap[s]://host[:port] (Port 389 ist Standard) ein, den Sie für CPU benutzen wollen. Nehmen Sie ldaps, wenn Sie eine Verbindung mit TLS-Verschlüsselung nutzen.
";
$elem["cpu/ldap/LDAP_URI"]["descriptionfr"]="Serveur LDAP :
 Veuillez indiquer l'URI du serveur LDAP que vous souhaitez utiliser avec CPU. Vous devez utiliser la forme normalisée  « ldap[s]@hôte[:port] ». Le port par défaut est 389. Utilisez « ldaps » si vous prévoyez d'utiliser une connexion chiffrée par TLS.
";
$elem["cpu/ldap/LDAP_URI"]["default"]="ldap://localhost";
$elem["cpu/ldap/USER_BASE"]["type"]="string";
$elem["cpu/ldap/USER_BASE"]["description"]="Base DN of your user subtree:
 Please enter the DN of the part of your directory that contains the users
 you wish to manage with CPU.
";
$elem["cpu/ldap/USER_BASE"]["descriptionde"]="Basis-DN Ihres Benutzer-Unterverzeichnisses:
 Bitte geben Sie den DN des Teils Ihres Verzeichnisses an, das die Benutzer enthält, die mit CPU verwaltet werden sollen.
";
$elem["cpu/ldap/USER_BASE"]["descriptionfr"]="Nom distinctif de la base (« base dn ») du sous-arbre des utilisateurs :
 Veuillez indiquer le nom distinctif (DN) qui contient les utilisateurs que vous souhaitez gérer avec CPU.
";
$elem["cpu/ldap/USER_BASE"]["default"]="";
$elem["cpu/ldap/GROUP_BASE"]["type"]="string";
$elem["cpu/ldap/GROUP_BASE"]["description"]="Base DN of your group subtree:
 Please enter the DN of the part of your directory that contains the groups
 you wish to manage with CPU.
";
$elem["cpu/ldap/GROUP_BASE"]["descriptionde"]="Basis-DN Ihres Gruppen-Unterverzeichnisses:
 Bitte geben Sie den DN des Teils Ihres Verzeichnisses an, das die Gruppen enthält, die mit CPU verwaltet werden sollen.
";
$elem["cpu/ldap/GROUP_BASE"]["descriptionfr"]="Nom distinctif de la base (« base dn ») du sous-arbre des groupes :
 Veuillez indiquer le nom distinctif (DN) de la partie de votre répertoire qui contient les groupes que vous souhaitez gérer avec CPU.
";
$elem["cpu/ldap/GROUP_BASE"]["default"]="";
$elem["cpu/ldap/BIND_DN"]["type"]="string";
$elem["cpu/ldap/BIND_DN"]["description"]="LDAP user DN:
 Please insert the DN of the user CPU will bind to the LDAP server with.
 Usually this will be your LDAP admin DN, but can be any other DN, as long
 as it is configured to have full control over at least the subtree under
 the base you selected before.
 .
 Example: \"cn=admin,dc=domain,dc=tld\"
";
$elem["cpu/ldap/BIND_DN"]["descriptionde"]="LDAP-Benutzer DN:
 Bitte geben Sie den DN des Benutzers ein, als der sich CPU mit dem LDAP-Server verbinden soll. Normalerweise ist das der DN des LDAP-Administrators, aber es kann jeder andere DN sein, wenn er zumindest so eingerichtet ist, dass er die volle Kontrolle über die Unterverzeichnisse hat, die Sie vorhin als Basis eingeben haben.
 .
 Beispiel: \"cn=admin,dc=domain,dc=tld\"
";
$elem["cpu/ldap/BIND_DN"]["descriptionfr"]="Nom distinctif (DN) de l'utilisateur LDAP :
 Veuillez indiquer le nom distinctif (DN) de l'utilisateur dont se servira CPU pour se connecter au serveur LDAP. Ce sera en général celui de votre administrateur LDAP. Cela n'est toutefois pas indispensable, à condition que cette identité ait le contrôle total sur l'ensemble du sous-répertoire indiqué précédemment.
 .
 Exemple : « cn=admin,dc=domain,dc=tld ».
";
$elem["cpu/ldap/BIND_DN"]["default"]="";
$elem["cpu/ldap/BIND_PASS"]["type"]="password";
$elem["cpu/ldap/BIND_PASS"]["description"]="LDAP password:
 Please enter the password to use when binding to the LDAP directory. Note
 that this password will be stored in cleartext in your /etc/cpu/cpu.conf
 file, so don't let that file became readable to anyone you don't want to
 give the same power of the user cpu will bind with.
";
$elem["cpu/ldap/BIND_PASS"]["descriptionde"]="LDAP-Passwort:
 Bitte geben Sie das Passwort für die Verbindung zum LDAP-Server ein. Beachten Sie, dass dieses Passwort im Klartext in der Datei /etc/cpu/cpu.conf gespeichert wird. Diese Datei sollte nicht von Benutzern zu lesen sein, denen Sie nicht die gleichen Rechte einräumen wollen, wie dem Benutzer, der sich mit dem LDAP-Server verbindet.
";
$elem["cpu/ldap/BIND_PASS"]["descriptionfr"]="Mot de passe LDAP :
 Veuillez indiquer le mot de passe qui sera utilisé pour la connexion au serveur LDAP. Veuillez noter que ce mot de passe sera conservé en clair dans le fichier /etc/cpu/cpu.conf. Ne laissez donc pas ce fichier accessible en lecture à tous les utilisateurs.
";
$elem["cpu/ldap/BIND_PASS"]["default"]="";
PKG_OptionPageTail2($elem);
?>
