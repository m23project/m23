<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("igtf-policy-mics");

$elem["igtf-policy-mics/install_profile"]["type"]="boolean";
$elem["igtf-policy-mics/install_profile"]["description"]="Trust IGTF mics CAs by default?
 Trusted IGTF Certification Authority certificates are installed in
 /etc/grid-security/certificates.
 .
 Accept this option to have certificates included by default unless they
 are explicitly excluded. Reject it to choose the reverse policy,
 excluding them unless explicitly included.
 .
 You will then have the opportunity to define the list of exceptions.
";
$elem["igtf-policy-mics/install_profile"]["descriptionde"]="Als Voreinstellung den IGTF-mics-CAs vertrauen?
 Die vertrauenswürdigen IGTF-Certification-Authority-Zertifikate werden in /etc/grid-security/certificates installiert.
 .
 Mit dieser Option werden Zertifikate per Voreinstellung berücksichtig, es sei denn, sie werden ausdrücklich ausgeschlossen. Abwahl dieser Option bewirkt das Gegenteil: Zertifikate werden abgelehnt, falls sie nicht ausdrücklich gewählt wurden.
 .
 Sie werden die Gelegenheit haben, Ausnahmen zu definieren.
";
$elem["igtf-policy-mics/install_profile"]["descriptionfr"]="Toujours faire confiance aux certificats d'autorités IGTF mics ?
 Les certificats d'autorités de certification de confiance IGTF sont installés dans /etc/grid-security/certificates.
 .
 Choisissez cette option pour avoir des certificats inclus par défaut, sauf s'ils ont été explicitement exclus. Ne l'acceptez pas si vous choisissez l'inverse, à savoir les exclure sauf s'ils ont été explicitement inclus.
 .
 Vous aurez alors l'opportunité de définir la liste des exceptions.
";
$elem["igtf-policy-mics/install_profile"]["default"]="true";
$elem["igtf-policy-mics/exclude_ca"]["type"]="multiselect";
$elem["igtf-policy-mics/exclude_ca"]["description"]="Certificates to explicitly exclude:
 Please select which certificates should not be installed in
 /etc/grid-security/certificates.
";
$elem["igtf-policy-mics/exclude_ca"]["descriptionde"]="Zertifikate, die ausdrücklich ausgeschlossen werden sollen:
 Bitte wählen Sie die Zertifikate, die nicht in /etc/grid-security/certificates installiert werden sollen, aus.
";
$elem["igtf-policy-mics/exclude_ca"]["descriptionfr"]="Certificats à exclure explicitement :
 Veuillez choisir quels certificats ne doivent pas être installés dans /etc/grid-security/certificates.
";
$elem["igtf-policy-mics/exclude_ca"]["default"]="";
$elem["igtf-policy-mics/include_ca"]["type"]="multiselect";
$elem["igtf-policy-mics/include_ca"]["description"]="Certificates to explicitly include:
 Please select which certificates should be installed in
 /etc/grid-security/certificates.
";
$elem["igtf-policy-mics/include_ca"]["descriptionde"]="Zertifikate, die ausdrücklich berücksichtigt werden sollen:
 Bitte wählen Sie die Zertifikate, die in /etc/grid-security/certificates installiert werden sollen, aus.
";
$elem["igtf-policy-mics/include_ca"]["descriptionfr"]="Certificats à inclure explicitement :
 Veuillez choisir quels certificats doivent être installés dans /etc/grid-security/certificates.
";
$elem["igtf-policy-mics/include_ca"]["default"]="";
PKG_OptionPageTail2($elem);
?>
