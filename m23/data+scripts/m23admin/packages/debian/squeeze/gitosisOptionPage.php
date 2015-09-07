<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("gitosis");

$elem["gitosis/username"]["type"]="string";
$elem["gitosis/username"]["description"]="Dedicated system account for gitosis:
 Repositories are managed by gitosis under a single system account, using
 SSH keys to identify users. This account name is part of the clone URL
 when checking out over SSH, leading to commands such as \"git clone
 gitosis@example.com:foo.git\".
 .
 The account name can be customized but you should not use an existing
 account.
";
$elem["gitosis/username"]["descriptionde"]="Eigenes Systemkonto für \"gitosis\":
 \"gitosis\" verwaltet alle Git-Repositories unter einem Systemkonto und verwendet SSH-Schlüssel, um die einzelnen Benutzer zu identifizieren. Der Name des Systemkontos ist Teil der Repository-URL wenn über SSH ausgecheckt wird, zum Beispiel \"git clone gitosis@example.com:foo.git\".
 .
 Der Name des Kontos kann angepasst werden, aber Sie sollten kein bereits existierendes Konto verwenden.
";
$elem["gitosis/username"]["descriptionfr"]="Compte système dédié pour gitosis :
 Les dépôts sont gérés par gitosis sous un seul compte système, en utilisant des clés SSH pour identifier les utilisateurs. L'identifiant de ce compte fait partie de l'URL SSH de clonage pour les exportations (« checkouts »), avec des commandes telles que « git clone gitosis@exemple.com:foo.git ».
 .
 Cet identifiant peut être personnalisé mais ne devrait pas déjà exister.
";
$elem["gitosis/username"]["default"]="gitosis";
$elem["gitosis/directory"]["type"]="string";
$elem["gitosis/directory"]["description"]="Directory for git repositories:
 Please specify the directory where gitosis will manage the git
 repositories.
 .
 If you choose an already existing directory, this installation process
 will leave it unmodified.
";
$elem["gitosis/directory"]["descriptionde"]="Verzeichnis für die Git-Repositories:
 Bitte geben Sie das Verzeichnis ein, in dem \"gitosis\" die Repositories verwalten wird.
 .
 Sollte das von Ihnen gewählte Verzeichnis bereits existieren, wird dieser Installationsprozess es nicht verändern.
";
$elem["gitosis/directory"]["descriptionfr"]="Répertoire pour les dépôts git:
 Veuillez indiquer le répertoire où gitosis gérera les dépôts git.
 .
 Si vous choisissez un répertoire existant, le processus d'installation n'y changera rien.
";
$elem["gitosis/directory"]["default"]="/srv/gitosis";
$elem["gitosis/key"]["type"]="string";
$elem["gitosis/key"]["description"]="SSH public key for the gitosis admin repository:
 Configuration for gitosis is stored in a file named \"gitosis.conf\" which
 is kept in the gitosis-admin repository.
 .
 Access to this repository is controlled through an SSH public key in the
 (default) user@host format.
 .
 You can specify an existing key by entering the name of the key file or by
 pasting the key content itself here. Alternatively, you can leave that
 field empty and configure the key manually later after reading the
 /usr/share/doc/gitosis/README.Debian file.
 .
 If there is already an initialized gitosis-admin repository in the gitosis
 directory, this installation process will not touch it.
";
$elem["gitosis/key"]["descriptionde"]="Öffentlicher SSH-Schlüssel für das \"gitosis-admin\" Repository:
 Die Konfiguration für \"gitosis\" wird im \"gitosis-admin\" Repository in der Datei \"gitosis.conf\" gespeichert.
 .
 Der Zugriff auf dieses Repository wird durch einen öffentlichen SSH-Schlüssel im (standardmäßigen) \"user@host\" Format geregelt.
 .
 Sie können einen vorhandenen Schlüssel durch Eingabe des Namens der Schlüsseldatei oder durch Eingeben des Schlüssels selbst verwenden. Alternativ können Sie das Feld auch leer lassen und den Schlüssel später manuell konfigurieren, nachdem Sie die Datei \"/usr/share/doc/gitosis/README.Debian\" gelesen haben.
 .
 Sollte bereits ein \"gitosis-admin\" Repository im \"gitosis\" Verzeichnis existieren, wird dieser Installationsprozess es nicht verändern.
";
$elem["gitosis/key"]["descriptionfr"]="Clé publique SSH pour le dépôt gitosis administrateur :
 La configuration pour gitosis se trouve dans le fichier « gitosis.conf » qui se trouve dans le dépôt gitosis-admin.
 .
 L'accès à ce dépôt est contrôlé par une clé publique SSH au format (par défaut) utilisateur@hôte.
 .
 Vous pouvez spécifier une clé existante en indiquant le nom du fichier de clé ou en collant le contenu de la clé ici. Vous pouvez également laisser ce champ vide et configurer la clé vous-même plus tard après avoir lu le fichier /usr/share/doc/gitosis/README.Debian.
 .
 S'il existe déjà un dépôt gitosis-admin initialisé dans le répertoire gitosis, le processus d'installation le laissera intact.
";
$elem["gitosis/key"]["default"]="Default:";
PKG_OptionPageTail2($elem);
?>
