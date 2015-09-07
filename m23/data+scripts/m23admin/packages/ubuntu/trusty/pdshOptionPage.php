<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("pdsh");

$elem["pdsh/setuidroot"]["type"]="boolean";
$elem["pdsh/setuidroot"]["description"]="Should the pdsh binary be installed setuid root?
 The pdsh program can be installed setuid root, so that it will run with
 the permissions of the 'root' user.
 .
 This is required for non-root accounts to use the rsh remote-command method 
 of pdsh.  However, enabling this could be a security risk.
 .
 In short, unless you know what you are doing or have a very controlled
 user base, you should not enable this feature.  If you choose not to enable
 setuid root, then you can still use pdsh through tools like sudo or with
 the ssh remote-command module.
";
$elem["pdsh/setuidroot"]["descriptionde"]="Soll das Pdsh-Programm setuid root installiert werden?
 Das Pdsh-Programm kann setuid root installiert werden, so dass es mit den Rechten des »root«-Benutzers läuft.
 .
 Dies wird benötigt, damit nicht-root-Konten die remote-command-Methode der Pdsh verwenden können. Allerdings könnte die Aktivierung ein Sicherheitsrisiko darstellen.
 .
 Kurzgefasst, falls Sie nicht genau wissen, was Sie machen oder falls Sie keine sehr kontrollierte Benutzerschaft haben, sollten sie diese Funktionalität nicht aktivieren. Falls Sie sich entscheiden, setuid root nicht zu aktivieren, können Sie Pdsh immer noch über Werkzeuge wie Sudo oder mit dem Ssh-remote-command-Modul verwenden.
";
$elem["pdsh/setuidroot"]["descriptionfr"]="Faut-il installer le binaire pdsh « setuid root » ?
 Le programme pdsh peut être installé avec le bit « setuid root » positionné, ce qui permettra son exécution avec les permissions du superutilisateur.
 .
 Ceci est nécessaire pour les comptes autres que celui du superutilisateur afin d'utiliser la méthode rsh de contrôle à distance de pdsh. Cependant, l'activation de cette fonctionnalité peut être un risque.
 .
 En résumé, sauf si vous savez ce que vous faites ou que vos utilisateurs sont très surveillés, vous devriez refuser ici. Si vous choisissez de ne pas positionner le bit « setuid root », vous pourrez toujours utiliser pdsh à travers des outils tels que sudo ou avec le module de contrôle à distance de ssh.
";
$elem["pdsh/setuidroot"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
