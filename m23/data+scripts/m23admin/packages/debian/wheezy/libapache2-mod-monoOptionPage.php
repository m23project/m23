<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("libapache2-mod-mono");

$elem["libapache2-mod-mono/mono-server"]["type"]="select";
$elem["libapache2-mod-mono/mono-server"]["choices"][1]="mod-mono-server2";
$elem["libapache2-mod-mono/mono-server"]["description"]="Mono server to use:
 The libapache2-mod-mono module can be used with one of two different
 Mono ASP.NET backends:
  - mod-mono-server2: implements ASP.NET 2.0 features;
  - mod-mono-server4: implements ASP.NET 4.0 features.
";
$elem["libapache2-mod-mono/mono-server"]["descriptionde"]="Mono-Server, der verwendet werden soll:
 Das Modul libapache2-mod-mono kann mit einem von zwei verschiedenen Mono-ASP.NET-Backends verwendet werden:
  - mod-mono-server2: implementiert ASP.NET 2.0-Funktionen
  - mod-mono-server4: implementiert ASP.NET 4.0-Funktionen
";
$elem["libapache2-mod-mono/mono-server"]["descriptionfr"]="Serveur Mono à utiliser :
 Le module libapache2-mod-mono peut être utilisé avec deux modes différents de gestion de ASP.NET :
  - mod-mono-server2 : compatible avec ASP.NET 2.0 ;
  - mod-mono-server4 : compatible avec ASP.NET 4.0.
";
$elem["libapache2-mod-mono/mono-server"]["default"]="mod-mono-server4";
PKG_OptionPageTail2($elem);
?>
