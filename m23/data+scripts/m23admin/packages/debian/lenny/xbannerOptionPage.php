<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("xbanner");

$elem["xbanner/removal"]["type"]="error";
$elem["xbanner/removal"]["description"]="Execute 'xbannerconfig remove' before removing package
 You are attempting to remove the xbanner package.  However, you have
 altered your XDM environment to invoke xbanner.  The XDM environment will
 cease working, if it contains references to xbanner, once the xbanner 
 package has been removed. You must delete all references to xbanner 
 files before you can remove the xbanner package.
 .
 To do this, please execute 'xbannerconfig remove' as root before the
 package removal occurs.  Please see xbannerconfig(8) for more information.
";
$elem["xbanner/removal"]["descriptionde"]="Bitte führen Sie 'xbannerconfig remove' aus bevor das Paket entfernt wird.
 Sie sind dabei, das xbanner-Paket zu deinstallieren. Die XDM-Umgebung wurde bei der xbanner-Installation verändert. Damit XDM nach der Deinstallation von xbanner noch funktioniert müssen Sie alle Referenzen zu xbanner aus den XDM-Konfigurationsdateien entfernen.
 .
 Um dies durchzuführen starten Sie bitte als root 'xbannerconfig remove'. In der Manpage zu xbannerconfig finden Sie weitere Informationen.
";
$elem["xbanner/removal"]["descriptionfr"]="« xbannerconfig -remove » indispensable avant désinstallation
 Vous essayez de désinstaller le paquet xbanner. Cependant, l'environnement de XDM a été modifié pour y utiliser xbanner. XDM ne fonctionnera plus s'il fait référence au programme xbanner alors que le paquet xbanner n'est plus installé. Vous devez retirer les références à xbanner dans les fichiers de configuration de XDM avant de désinstaller le paquet xbanner.
 .
 Pour cela, veuillez exécuter la commande « xbannerconfig -remove » en tant que superutilisateur avant de procéder à la désinstallation du paquet. Veuillez consulter la page de manuel xbannerconfig(8) pour plus d'informations.
";
$elem["xbanner/removal"]["default"]="";
PKG_OptionPageTail2($elem);
?>
