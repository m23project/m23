<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("oneliner-el");

$elem["oneliner-el/default"]["type"]="boolean";
$elem["oneliner-el/default"]["description"]="Should oneliner-el be auto-loaded by default at your site?
 If you want to auto-load oneliner-el at your site, you should accept here.
 .
 If you accept here, oneliner-el are loaded globally, i.e. all people in
 your site can use oneliner-el without special settings in their
 \"~/.emacs\". If your site is a single user site and you want to use
 oneliner-el, you should accept here without hesitating.
 .
 If you refuse here, people who desire to use it will have to put the
 string \"(require 'oneliner)\" in their \"~/.emacs\" to load it.
";
$elem["oneliner-el/default"]["descriptionde"]="Soll Oneliner-el bei Ihnen standardmäßig automatisch geladen (auto-loaded) werden?
 Falls Sie Oneliner-el bei Ihnen automatisch laden wollen, sollten Sie hier zustimmen.
 .
 Falls Sie hier zustimmen, wird Oneliner-el global geladen, d.h. alle Personen an Ihrer Maschine können Oneliner-el ohne spezielle Einstellungen in ihrer »~/.emacs« verwenden. Falls Ihre Maschine ein Einzelplatzrechner ist und Sie Oneliner-el verwenden wollen, sollten Sie hier ohne Zögern zustimmen.
 .
 Falls Sie hier ablehnen, müssen aller Personen, die Oneliner-el benutzen möchten, »(require 'oneliner)« in ihre »~/.emacs« eintragen, um es zu laden.
";
$elem["oneliner-el/default"]["descriptionfr"]="Faut-il charger automatiquement oneliner-el sur votre site ?
 Vous pouvez, si vous le souhaitez, charger automatiquement oneliner-el sur votre site.
 .
 Dans ce cas, il sera chargé de manière globale et tous les utilisateurs de votre site pourront l'utiliser sans modifier leur fichier « ~/.emacs ». Si votre site est mono-utilisateur et que vous souhaitez vous servir de oneliner-el, vous devriez choisir cette option sans hésiter.
 .
 Dans le cas contraire, les personnes souhaitant utiliser oneliner-el devront ajouter une ligne « (require 'oneliner-el) » dans leur fichier ~/.emacs.
";
$elem["oneliner-el/default"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
