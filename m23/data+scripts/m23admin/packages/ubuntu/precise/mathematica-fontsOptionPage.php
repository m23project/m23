<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mathematica-fonts");

$elem["mathematica-fonts/http_proxy"]["type"]="string";
$elem["mathematica-fonts/http_proxy"]["description"]="HTTP proxy to use:
 If you need to use a proxy server, please enter it here (example:
 http://192.168.0.1:8080). This will cause the font file to be
 downloaded using your proxy.
 .
 Leave this option blank if you don't use a proxy server.
";
$elem["mathematica-fonts/http_proxy"]["descriptionde"]="Zu verwendender HTTP-Proxy:
 Falls Sie einen Proxy-Server benutzen müssen, geben Sie ihn bitte hier an (Beispiel: http://192.168.0.1:8080). Dadurch wird die Schriftdatei über den Proxy heruntergeladen.
 .
 Lassen Sie diese Option leer, falls Sie keinen Proxy-Server verwenden.
";
$elem["mathematica-fonts/http_proxy"]["descriptionfr"]="Mandataire HTTP à utiliser :
 Si vous utilisez un serveur mandataire (\" proxy \") pour le téléchargement de fichiers, veuillez indiquer son URL ici (par exemple : http://192.168.0.1:8080).
 .
 Ce champ peut être laissé vide si vous n'utilisez pas de serveur mandataire.
";
$elem["mathematica-fonts/http_proxy"]["default"]="";
$elem["mathematica-fonts/license"]["type"]="note";
$elem["mathematica-fonts/license"]["description"]="License for Mathematica fonts
 Read this agreement carefully before proceeding. It is an agreement
 between Wolfram Research, Inc. (\"WRI\") and you. Acceptance of its terms
 creates a binding contract between you and WRI. By downloading the fonts
 below, you are accepting the terms of this agreement.
 .
 WRI licenses Mathematica fonts to individual users downloading from
 this site. All WRI fonts are copyright Wolfram Research, Inc. or its
 vendors. All rights reserved. WRI fonts are not in the public domain.
 .
 WRI reserves the right to control all distribution of the Mathematica fonts
 and does not, at this time, allow them to be widely distributed via any
 servers, archives, or non-WRI software products of any kind without
 express written consent of WRI. There are no restrictions on embedding
 the fonts in documents transmitted to service bureaus, publishers, or other
 users of WRI products. There are no restrictions on widely distributing
 metrics files generated from the Mathematica fonts.
 .
 WRI does not require authors to credit Wolfram Research for the use of
 the Mathematica fonts in published papers. However, such credit is
 appreciated. \"Mathematica fonts by Wolfram Research, Inc.\" is sufficient.

";
$elem["mathematica-fonts/license"]["descriptionde"]="";
$elem["mathematica-fonts/license"]["descriptionfr"]="";
$elem["mathematica-fonts/license"]["default"]="";
$elem["mathematica-fonts/accept_license"]["type"]="boolean";
$elem["mathematica-fonts/accept_license"]["description"]="Do you accept the license of Mathematica fonts?
 In order to install this package, you must accept its license terms.
 Not accepting will cancel the installation.
";
$elem["mathematica-fonts/accept_license"]["descriptionde"]="Stimmen Sie der Lizenz der Mathematica-Schriften zu?
 Um dieses Paket zu installieren, müssen Sie dessen Lizenzbedingungen zustimmen. Bei Nichtzustimmung wird die Installation abgebrochen.
";
$elem["mathematica-fonts/accept_license"]["descriptionfr"]="Acceptez vous les termes de la licence des polices Mathematica ?
 Pour installer ce paquet vous devez accepter les termes de sa licence. Ne pas les accepter interrompra l'installation du paquet.
";
$elem["mathematica-fonts/accept_license"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
