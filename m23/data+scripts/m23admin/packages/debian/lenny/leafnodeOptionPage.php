<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("leafnode");

$elem["leafnode/server"]["type"]="string";
$elem["leafnode/server"]["description"]="Server to download news from:
 The name of the news server should be provided by the organization
 providing you with network access, such as your Internet Service
 Provider.
 .
 This server is generally called \"news.<domain>\" or \"nntp.<domain>\"
 where <domain> is the local domain name.
";
$elem["leafnode/server"]["descriptionde"]="Server, von dem die News heruntergeladen werden sollen:
 Der Name des News-Servers sollte Ihnen von der Organisation, die Sie mit dem Internetzugang versorgt, z. B. Ihrem Internet Service Provider (ISP), zur Verfügung gestellt werden.
 .
 Der Server heißt normalerweise »news.<domain>« oder »nntp.<domain>« wobei <domain> der lokale Domänenname ist.
";
$elem["leafnode/server"]["descriptionfr"]="Serveur de nouvelles à utiliser :
 Le nom du serveur de nouvelles est généralement obtenu auprès du fournisseur de votre accès réseau, par exemple votre fournisseur d'accès à Internet.
 .
 Il est habituellement formé de la façon suivante « news.domaine » ou bien « nntp.domaine » avec comme « domaine » le nom du domaine local.
";
$elem["leafnode/server"]["default"]="news";
$elem["leafnode/tcpd"]["type"]="boolean";
$elem["leafnode/tcpd"]["description"]="Enable access controls for Leafnode?
 If you do not enable some access controls for Leafnode, people everywhere
 will be able to use the news server which opens opportunities
 for spamming or resource abuse.
 .
 Access controls will prevent computers other than the news server
 itself reading or posting to newsgroups using the server. If required
 access can be granted to other computers by editing /etc/hosts.allow.
";
$elem["leafnode/tcpd"]["descriptionde"]="Sollen Zugriffskontrollen für Leafnode aktiviert werden?
 Falls Sie keine Zugriffskontrollen für Leafnode aktivieren, können Menschen von überall her Ihren News-Server verwenden, was ihnen Gelegenheit gibt, Spam zu versenden oder Ressourcen zu missbrauchen.
 .
 Zugriffskontrollen hindern alle Computer außer dem News-Server selber daran, News-Gruppen zu lesen oder darin zu posten. Falls nötig kann anderen Computern durch bearbeiten der Datei /etc/hosts.allow Zugriff gewährt werden.
";
$elem["leafnode/tcpd"]["descriptionfr"]="Faut-il contrôler l'accès à Leafnode ?
 Si l'accès à Leafnode n'est pas contrôlé, tout le monde pourra utiliser le serveur de nouvelles et publier des messages type pourriel ou abuser des ressources du système.
 .
 Le contrôle d'accès permet d'empêcher l'utilisation par des tiers des fonctions de lecture et émission du serveur de nouvelles. Une fois cette fonction activée, les accès sont contrôlés dans le fichier « /etc/hosts.allow ».
";
$elem["leafnode/tcpd"]["default"]="true";
$elem["leafnode/network"]["type"]="select";
$elem["leafnode/network"]["choices"][1]="PPP";
$elem["leafnode/network"]["choices"][2]="permanent";
$elem["leafnode/network"]["choicesde"][1]="PPP";
$elem["leafnode/network"]["choicesde"][2]="permanent";
$elem["leafnode/network"]["choicesfr"][1]="PPP";
$elem["leafnode/network"]["choicesfr"][2]="Connexion permanente";
$elem["leafnode/network"]["description"]="Network connection type:
 The Leafnode package can automatically download news.
 .
 The method used for this depends on the network connection type.
 Scripts provided with the package support two network connection types:
  - permanent: hourly news downloads;
  - PPP      : news downloads triggered by dialouts.
 .
 Either option will work for a dial-on-demand network connection.
 .
 Choosing 'none' will disable automatic news downloads. News
 can be downloaded manually by running 'fetchnews'.
";
$elem["leafnode/network"]["descriptionde"]="Typ der Netzwerkverbindung:
 Das Leafnode-Paket kann automatisch News herunterladen.
 .
 Die dafür verwendete Methode hängt vom Typ der Netzwerkverbindung ab. Die zum Paket gehörenden Skripts unterstützen zwei Arten von Netzwerkverbindungen:
  - permanente: News werden stündlich heruntergeladen;
  - PPP       : das Herunterladen wird durch den Aufbau der Internetverbindung ausgelöst.
 .
 Erfolgt Ihre Interneteinwahl nur bei Bedarf, funktionieren beide Optionen.
 .
 Sie können auch »keine« auswählen. Damit wird das automatische Herunterladen von News deaktiviert. Sie können News manuell mit dem Befehl fetchnews herunterladen.
";
$elem["leafnode/network"]["descriptionfr"]="Type de connexion au réseau :
 Le paquet Leafnode peut automatiquement télécharger des nouvelles.
 .
 La méthode utilisée dépend du type de connexion réseau. Le script d'installation du paquet gère deux types de connexion :
  Connexion permanente : Les téléchargements ont lieu toutes les heures;
  PPP                  : Les téléchargements ont lieu selon les connexions.
 .
 N'importe laquelle des options fonctionnera avec une connexion à la demande « PPP ».
 .
 Vous pouvez aussi choisir « Aucune connexion » pour désactiver le téléchargement automatique et télécharger vous-même des nouvelles en utilisant « fetchnews ».
";
$elem["leafnode/network"]["default"]="PPP";
$elem["leafnode/update-groups"]["type"]="boolean";
$elem["leafnode/update-groups"]["description"]="Update the list of available groups?
 Leafnode updates the list of available newsgroups when
 it checks for new news. No newsgroups will be available until this has
 happened at least once.
 .
 If you choose to update the list of groups immediately,
 newsgroups will be available to clients as soon as Leafnode has been
 set up.
";
$elem["leafnode/update-groups"]["descriptionde"]="Soll die Liste verfügbarer Gruppen aktualisiert werden?
 Leafnode hält die Liste verfügbarer News-Gruppen aktuell, wenn nach neuen Nachrichten gesucht wird. Bevor dies nicht mindestens ein mal geschehen ist werden keine News-Gruppen verfügbar sein.
 .
 Falls Sie die Gruppenliste sofort aktualisieren lassen, werden die News-Gruppen für die Clients verfügbar sein, sobald Leafnode fertig eingerichtet ist.
";
$elem["leafnode/update-groups"]["descriptionfr"]="Faut-il mettre à jour la liste des forums disponibles ?
 Leafnode met à jour la liste des forums disponibles lorsqu'il recherche de nouveaux messages. Tant que cela n'est pas fait, aucun forum n'est disponible pour les clients.
 .
 Si vous choisissez de mettre à jour la liste des forums pendant la configuration du paquet, les forums seront accessibles aux clients dès que Leafnode aura été configuré.
";
$elem["leafnode/update-groups"]["default"]="true";
$elem["leafnode/purge"]["type"]="boolean";
$elem["leafnode/purge"]["description"]="Remove news groups and articles when purging the package?
 The /var/spool/news directory holds the database of news articles
 downloaded by Leafnode. Many other news servers also use this
 directory to store their news database and you may wish to keep it
 even when removing the leafnode package.
";
$elem["leafnode/purge"]["descriptionde"]="Sollen die News-Gruppen und Artikel entfernt werden, wenn das Paket vollständig gelöscht wird?
 Im Verzeichnis /var/spool/news wird die News-Datenbank von Leafnode gespeichert. Viele andere Newsserver nutzen ebenfalls dieses Verzeichnis, um ihre News-Datenbank zu speichern und daher könnte es sein, dass Sie dieses Verzeichnis, auch wenn Sie das Leafnode-Paket löschen, behalten möchten.
";
$elem["leafnode/purge"]["descriptionfr"]="Faut-il supprimer les articles et les groupes de nouvelles lors de la purge du paquet ?
 Le répertoire « /var/spool/news » contient la base de données des articles téléchargés par Leafnode. D'autres serveurs utilisent aussi ce répertoire pour leurs bases de données. Si vous avez remplacé Leafnode par un autre serveur, vous devriez conserver ce répertoire.
";
$elem["leafnode/purge"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
