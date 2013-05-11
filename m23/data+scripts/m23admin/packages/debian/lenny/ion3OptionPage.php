<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ion3");

$elem["ion3/acknowledge-outdated"]["type"]="boolean";
$elem["ion3/acknowledge-outdated"]["description"]="Do you understand that this version is not supported by the author?
 The version of Ion3 you are installing (version ${version}) is not
 the latest version released by the author.
 .
 DO NOT send bug reports or questions to the author unless they apply
 to the latest version, available at:
  http://modeemi.fi/~tuomov/ion/download.html
 .
 Otherwise, you should send any bug reports about this package to the
 Debian bug tracking system and any other questions to the Debian
 maintainer.
";
$elem["ion3/acknowledge-outdated"]["descriptionde"]="Ist Ihnen klar, dass diese Version vom Autor nicht unterstützt wird?
 Version ${version} von Ion3, die Sie installieren, ist nicht die neuste, vom Autor veröffentlichte Version.
 .
 Senden Sie KEINE Fehlerberichte oder Fragen zum Autor, es sei denn, diese treffen auch auf die neuste Version zu, die unter
  http://modeemi.fi/~tuomov/ion/download.htmlerhältlich ist.
 .
 Andernfalls sollten Sie alle Fehlerberichte zu diesem Paket an die Debian-Fehlerdatenbank und andere Fragen an den Debian-Betreuer schicken.
";
$elem["ion3/acknowledge-outdated"]["descriptionfr"]="Comprenez-vous que l'auteur n'assure aucun support pour cette version ?
 La version de Ion3 en cours d'installation (version ${version}) ne correspond pas à la dernière version diffusée par l'auteur du programme.
 .
 N'envoyez PAS de rapports de bogues ou des questions à l'auteur sauf si ceux-ci concernent la dernière version disponible sur :
  http://modeemi.fi/~tuomov/ion/download.html
 .
 Dans le cas contraire, vous devez envoyer les rapports de bogues relatifs à ce paquet vers le système de suivi des bogues Debian et toute question au responsable du paquet Debian.
";
$elem["ion3/acknowledge-outdated"]["default"]="false";
$elem["ion3/acknowledge-maybe-outdated"]["type"]="boolean";
$elem["ion3/acknowledge-maybe-outdated"]["description"]="Do you understand that this version may not be supported by the author?
 The version of Ion3 you are installing (version ${version}) may not
 be the latest version released by the author.
 .
 DO NOT send bug reports or questions to the author unless they apply
 to the latest version, available at:
  http://modeemi.fi/~tuomov/ion/download.html
 .
 Otherwise, you should send any bug reports about this package to the
 Debian bug tracking system and any other questions to the Debian
 maintainer.
";
$elem["ion3/acknowledge-maybe-outdated"]["descriptionde"]="Ist Ihnen klar, dass diese Version vom Autor nicht unterstützt werden könnte?
 Version ${version} von Ion3, die Sie installieren, könnte nicht die neuste, vom Autor veröffentlichte Version sein.
 .
 Senden Sie KEINE Fehlerberichte oder Fragen zum Autor, es sei denn, diese treffen auch auf die neuste Version zu, die unter
  http://modeemi.fi/~tuomov/ion/download.htmlerhältlich ist.
 .
 Andernfalls sollten Sie alle Fehlerberichte zu diesem Paket an die Debian-Fehlerdatenbank und andere Fragen an den Debian-Betreuer schicken.
";
$elem["ion3/acknowledge-maybe-outdated"]["descriptionfr"]="Comprenez-vous que l'auteur n'assure probablement aucun support pour cette version ?
 La version de Ion3 en cours d'installation (version ${version}) peut ne pas être la dernière version diffusée par l'auteur.
 .
 N'envoyez PAS de rapports de bogues ou des questions à l'auteur sauf si ceux-ci concernent la dernière version disponible sur :
  http://modeemi.fi/~tuomov/ion/download.html
 .
 Dans le cas contraire, vous devez envoyer les rapports de bogues relatifs à ce paquet vers le système de suivi des bogues Debian et toute question au responsable du paquet Debian.
";
$elem["ion3/acknowledge-maybe-outdated"]["default"]="false";
$elem["ion3/did-not-acknowledge-outdated"]["type"]="error";
$elem["ion3/did-not-acknowledge-outdated"]["description"]="Non-acknowledged installation of an old version
 You must acknowledge that the author does not support old versions
 and should not be contacted about them.
";
$elem["ion3/did-not-acknowledge-outdated"]["descriptionde"]="";
$elem["ion3/did-not-acknowledge-outdated"]["descriptionfr"]="";
$elem["ion3/did-not-acknowledge-outdated"]["default"]="";
PKG_OptionPageTail2($elem);
?>
