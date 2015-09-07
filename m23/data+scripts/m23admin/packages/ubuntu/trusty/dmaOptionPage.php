<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("dma");

$elem["dma/mailname"]["type"]="string";
$elem["dma/mailname"]["description"]="System mail name:
 The 'mail name' is the domain name used to 'qualify' mail addresses
 without a domain name.
 .
 This name will also be used by other programs. It should be the
 single, fully qualified domain name (FQDN).
 .
 Thus, if a mail address on the local host is foo@example.org,
 the correct value for this option would be example.org.
";
$elem["dma/mailname"]["descriptionde"]="E-Mail-Name des Systems:
 Der »E-Mail-Name« ist der Domainname, der für die »Vervollständigung« von E-Mail-Adressen ohne Domainnamen verwandt wird.
 .
 Dieser Name wird auch von anderen Programmen verwandt. Er sollte der einzelne, voll-qualifizierte Domainname (FQDN) sein.
 .
 Falls daher die E-Mail-Adresse des lokalen Rechners »foo@example.org« lautete, wäre der korrekte Wert für diese Option »example.org«.
";
$elem["dma/mailname"]["descriptionfr"]="Nom de courriel du système :
 Le nom de courriel (« mail name ») est le nom de domaine qui sert à compléter les adresses électroniques qui n'en comportent pas.
 .
 Ce nom sera également utilisé par d'autres programmes. Il doit correspondre au domaine unique et complètement qualifié (FQDN).
 .
 Par exemple, si une adresse électronique locale est foo@example.org, la valeur appropriée pour cette option sera « example.org ».
";
$elem["dma/mailname"]["default"]="";
$elem["dma/relayhost"]["type"]="string";
$elem["dma/relayhost"]["description"]="Smarthost:
 Please enter the IP address or the host name of a mail server that
 this system should use as outgoing smarthost. If no smarthost is
 specified, dma will try to deliver all messages by itself.
";
$elem["dma/relayhost"]["descriptionde"]="Smarthost:
 Bitte geben Sie die IP-Adresse oder den Rechnernamen des E-Mailservers an, den dieses System als ausgehenden Smarthost verwenden soll. Falls kein Smarthost angegeben ist, wird Dma versuchen, alle Nachrichten selbst auszuliefern.
";
$elem["dma/relayhost"]["descriptionfr"]="Nom réseau ou adresse IP du système smarthost :
 Veuillez indiquer l'adresse IP ou le nom d'hôte du serveur qui sera le serveur de courriels sortant pour ce système. Si aucun nom n'est indiqué, dma essaiera de livrer tous les messages lui-même.
";
$elem["dma/relayhost"]["default"]="";
PKG_OptionPageTail2($elem);
?>
