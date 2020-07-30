<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("sash");

$elem["sash/sashroot-user-detected"]["type"]="error";
$elem["sash/sashroot-user-detected"]["description"]="sashroot user detected
 Previous versions of sash offered to create a root user with shell
 set to /bin/sash.  This system has such a user.
 .
 This can unfortunately not be automatically removed together with the
 package, so you need to manually delete the sashroot user.
";
$elem["sash/sashroot-user-detected"]["descriptionde"]="Benutzer »sashroot« gefunden
 Vorhergehende Versionen von Sash boten an, einen Root-Benutzer zu erstellen, dessen Shell auf /bin/sash gesetzt ist. Dieses System verfügt über einen derartigen Benutzer.
 .
 Dieser kann unglücklicherweise nicht automatisch zusammen mit dem Paket entfernt werden, daher müssen Sie den Benutzer »sashroot« manuell löschen.
";
$elem["sash/sashroot-user-detected"]["descriptionfr"]="Détection d'un utilisateur sashroot
 Les versions précédentes de sash proposaient de créer un utilisateur root dont le shell était réglé sur /bin/sash. Ce système possède cet utilisateur.
 .
 Malheureusement, il ne peut pas être supprimé en même temps que le paquet. Aussi, vous devez supprimer vous-même l'utilisateur sashroot.
";
$elem["sash/sashroot-user-detected"]["default"]="";
PKG_OptionPageTail2($elem);
?>
