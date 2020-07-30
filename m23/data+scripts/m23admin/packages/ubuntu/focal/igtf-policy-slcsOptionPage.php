<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("igtf-policy-slcs");

$elem["igtf-policy-slcs/install_profile"]["type"]="boolean";
$elem["igtf-policy-slcs/install_profile"]["description"]="Trust IGTF slcs CAs by default?
 Trusted IGTF Certification Authority certificates are installed in
 ${location}.
 .
 Accept this option to have certificates included by default unless they
 are explicitly excluded. Reject it to choose the reverse policy,
 excluding them unless explicitly included.
 .
 You will then have the opportunity to define the list of exceptions.
";
$elem["igtf-policy-slcs/install_profile"]["descriptionde"]="Als Voreinstellung den IGTF-slcs-CAs vertrauen?
 Die vertrauenswürdigen IGTF-Certification-Authority-Zertifikate werden in ${location} installiert.
 .
 Mit dieser Option werden Zertifikate per Voreinstellung berücksichtig, es sei denn, sie werden ausdrücklich ausgeschlossen. Abwahl dieser Option bewirkt das Gegenteil: Zertifikate werden abgelehnt, falls sie nicht ausdrücklich gewählt wurden.
 .
 Sie werden dann die Gelegenheit haben, Ausnahmen zu definieren.
";
$elem["igtf-policy-slcs/install_profile"]["descriptionfr"]="Faut-il toujours faire confiance aux certificats d'autorités IGTF slcs ?
 Les certificats d'autorités de certification de confiance IGTF sont installés dans ${location}.
 .
 Choisissez cette option pour avoir des certificats inclus par défaut, sauf s'ils ont été explicitement exclus. Ne l'acceptez pas si vous choisissez l'inverse, à savoir les exclure sauf s'ils ont été explicitement inclus.
 .
 Vous aurez alors l'opportunité de définir la liste des exceptions.
";
$elem["igtf-policy-slcs/install_profile"]["default"]="true";
$elem["igtf-policy-slcs/exclude_ca"]["type"]="multiselect";
$elem["igtf-policy-slcs/exclude_ca"]["description"]="Certificates to explicitly exclude:
 Please select which certificates should not be installed in
 ${location}.
";
$elem["igtf-policy-slcs/exclude_ca"]["descriptionde"]="Zertifikate, die ausdrücklich ausgeschlossen werden sollen:
 Bitte wählen Sie die Zertifikate aus, die nicht in ${location} installiert werden sollen.
";
$elem["igtf-policy-slcs/exclude_ca"]["descriptionfr"]="Certificats à exclure explicitement :
 Veuillez choisir quels certificats ne doivent pas être installés dans ${location}.
";
$elem["igtf-policy-slcs/exclude_ca"]["default"]="";
$elem["igtf-policy-slcs/include_ca"]["type"]="multiselect";
$elem["igtf-policy-slcs/include_ca"]["description"]="Certificates to explicitly include:
 Please select which certificates should be installed in
 ${location}.
";
$elem["igtf-policy-slcs/include_ca"]["descriptionde"]="Zertifikate, die ausdrücklich berücksichtigt werden sollen:
 Bitte wählen Sie die Zertifikate aus, die in ${location} installiert werden sollen.
";
$elem["igtf-policy-slcs/include_ca"]["descriptionfr"]="Certificats à inclure explicitement :
 Veuillez choisir quels certificats doivent être installés dans ${location}.
";
$elem["igtf-policy-slcs/include_ca"]["default"]="";
$elem["igtf-policy/location"]["type"]="string";
$elem["igtf-policy/location"]["description"]="Installation directory of the certificates:
 The default location /etc/grid-security/certificates should
 work fine in most cases.
 .
 An alternative location can be given here if needed.
";
$elem["igtf-policy/location"]["descriptionde"]="Installationsverzeichnis der Zertifikate:
 Das Standard-Verzeichnis /etc/grid-security/certificates sollte in den meisten Fällen genügen.
 .
 Ein alternativer Ort kann hier angegeben werden.
";
$elem["igtf-policy/location"]["descriptionfr"]="Répertoire d'installation des certificats :
 La destination par défaut, /etc/grid-security/certificates, devrait fonctionner dans la majorité des cas.
 .
 Un autre répertoire peut être indiqué ici si besoin.
";
$elem["igtf-policy/location"]["default"]="/etc/grid-security/certificates";
$elem["igtf-policy/old-location"]["type"]="string";
$elem["igtf-policy/old-location"]["description"]="for internal use
 This setting is for internal use by the configure script
 and users should never see this question. It exists to ensure
 proper cleanup if the location changes.
";
$elem["igtf-policy/old-location"]["descriptionde"]="";
$elem["igtf-policy/old-location"]["descriptionfr"]="";
$elem["igtf-policy/old-location"]["default"]="";
PKG_OptionPageTail2($elem);
?>
