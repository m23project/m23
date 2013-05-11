<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ttf-mathematica4.1");

$elem["ttf-mathematica4.1/http_proxy"]["type"]="string";
$elem["ttf-mathematica4.1/http_proxy"]["description"]="HTTP proxy to use:
 If you need to use a proxy server, please enter it here (example:
 http://192.168.0.1:8080). This will cause the font file to be
 downloaded using your proxy.
 .
 Leave this option blank if you don't use a proxy server.
";
$elem["ttf-mathematica4.1/http_proxy"]["descriptionde"]="Zu verwendender HTTP-Proxy:
 Falls Sie einen Proxy-Server benutzen müssen, geben Sie ihn bitte hier ein (Beispiel: http://192.168.0.1:8080). Dadurch wird die Schriftdatei über den Proxy heruntergeladen.
 .
 Lassen Sie diese Option leer, falls Sie keinen Proxy-Server verwenden.
";
$elem["ttf-mathematica4.1/http_proxy"]["descriptionfr"]="Mandataire HTTP à utiliser :
 Si vous utilisez un serveur mandataire (\" proxy \") pour le téléchargement de fichiers, veuillez indiquer son URL ici (par exemple : http://192.168.0.1:8080).
 .
 Ce champ peut être laissé vide si vous n'utilisez pas de serveur mandataire.
";
$elem["ttf-mathematica4.1/http_proxy"]["default"]="";
$elem["ttf-mathematica4.1/license"]["type"]="note";
$elem["ttf-mathematica4.1/license"]["description"]="the License of Mathematica Fonts
 READ THIS AGREEMENT CAREFULLY BEFORE PROCEEDING. IT IS AN AGREEMENT 
 BETWEEN WOLFRAM RESEARCH, INC. (“WRI”), AND YOU. ACCEPTANCE OF ITS 
 TERMS CREATES A BINDING CONTRACT BETWEEN YOU AND WRI.
 .
 Wolfram Research, Inc. (“WRI”) licenses Mathematica fonts to individual 
 users downloading from this site. All WRI fonts are copyright Wolfram 
 Research, Inc. or its vendors. All rights reserved. WRI fonts are not 
 in the public domain.
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
 appreciated. “Mathematica fonts by Wolfram Research, Inc.” is sufficient.
";
$elem["ttf-mathematica4.1/license"]["descriptionde"]="die Lizenz der Mathematica-Schriften
 LESEN SIE DIESE VEREINBARUNG SORGFÄLTIG, BEVOR SIE FORTFAHREN: SIE IST EINE VEREINBARUNG ZWISCHEN WOLFRAM RESEARCH, INC. (»WRI«) UND IHNEN. DURCH ZUSTIMMUNG ZU DEN BEDINGUNGEN ENTSTEHT EIN BINDENDER VERTRAG ZWISCHEN IHNEN UND WRI.
 .
 Wolfram Research, Inc. (“WRI”) licenses Mathematica fonts to individual  users downloading from this site. All WRI fonts are copyright Wolfram  Research, Inc. or its vendors. All rights reserved. WRI fonts are not  in the public domain.
 .
 WRI reserves the right to control all distribution of the Mathematica fonts  and does not, at this time, allow them to be widely distributed via any  servers, archives, or non-WRI software products of any kind without  express written consent of WRI. There are no restrictions on embedding  the fonts in documents transmitted to service bureaus, publishers, or other  users of WRI products. There are no restrictions on widely distributing  metrics files generated from the Mathematica fonts.
 .
 WRI does not require authors to credit Wolfram Research for the use of  the Mathematica fonts in published papers. However, such credit is  appreciated. “Mathematica fonts by Wolfram Research, Inc.” is sufficient.
";
$elem["ttf-mathematica4.1/license"]["descriptionfr"]="Licence des Polices Mathematica
 (NdT: cette licence est volontairement laissée en version non traduite).
 READ THIS AGREEMENT CAREFULLY BEFORE PROCEEDING. IT IS AN AGREEMENT  BETWEEN WOLFRAM RESEARCH, INC. (“WRI”), AND YOU. ACCEPTANCE OF ITS  TERMS CREATES A BINDING CONTRACT BETWEEN YOU AND WRI.
 .
 Wolfram Research, Inc. (“WRI”) licenses Mathematica fonts to individual  users downloading from this site. All WRI fonts are copyright Wolfram  Research, Inc. or its vendors. All rights reserved. WRI fonts are not  in the public domain.
 .
 WRI reserves the right to control all distribution of the Mathematica fonts  and does not, at this time, allow them to be widely distributed via any  servers, archives, or non-WRI software products of any kind without  express written consent of WRI. There are no restrictions on embedding  the fonts in documents transmitted to service bureaus, publishers, or other  users of WRI products. There are no restrictions on widely distributing  metrics files generated from the Mathematica fonts.
 .
 WRI does not require authors to credit Wolfram Research for the use of  the Mathematica fonts in published papers. However, such credit is  appreciated. “Mathematica fonts by Wolfram Research, Inc.” is sufficient.
";
$elem["ttf-mathematica4.1/license"]["default"]="";
$elem["ttf-mathematica4.1/accept_license"]["type"]="boolean";
$elem["ttf-mathematica4.1/accept_license"]["description"]="Do you agree with the License of Mathematica Fonts?
 In order to install this package, you must agree to its license terms, 
 \"the License of Mathematica Fonts\". Not accepting will cancel the
 installation.
";
$elem["ttf-mathematica4.1/accept_license"]["descriptionde"]="Stimmen Sie der Lizenz der Mathematica-Schriften zu?
 Um dieses Paket zu installieren, müssen Sie den Lizenzbedingungen »die Lizenz der Mathematica-Schriften« zustimmen. Bei Nichtzustimmung wird die Installation abgebrochen.
";
$elem["ttf-mathematica4.1/accept_license"]["descriptionfr"]="Acceptez vous les termes de la \"Licence des Polices Mathematica\" ?
 Pour installer ce paquet vous devez accepter les termes de la \"Licence des Polices Mathematica\". Ne pas l'accepter interrompra l'installation du paquet.
";
$elem["ttf-mathematica4.1/accept_license"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
