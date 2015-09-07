<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ca-certificates");

$elem["ca-certificates/trust_new_crts"]["type"]="select";
$elem["ca-certificates/trust_new_crts"]["choices"][1]="yes";
$elem["ca-certificates/trust_new_crts"]["choices"][2]="no";
$elem["ca-certificates/trust_new_crts"]["choicesde"][1]="Ja";
$elem["ca-certificates/trust_new_crts"]["choicesde"][2]="Nein";
$elem["ca-certificates/trust_new_crts"]["choicesfr"][1]="Oui";
$elem["ca-certificates/trust_new_crts"]["choicesfr"][2]="Non";
$elem["ca-certificates/trust_new_crts"]["description"]="Trust new certificates from certificate authorities?
 This package may install new CA (Certificate Authority) certificates when
 upgrading. You may want to check such new CA certificates and select only
 certificates that you trust.
 .
  - yes: new CA certificates will be trusted and installed;
  - no : new CA certificates will not be installed by default;
  - ask: prompt for each new CA certificate.
";
$elem["ca-certificates/trust_new_crts"]["descriptionde"]="Neuen Zertifikaten von Zertifizierungsstellen vertrauen?
 Dieses Paket kann neue Zertifikate von CAs (Zertifizierungsstellen) installieren, wenn ein Upgrade durchgeführt wird. Sie sollten solche neuen CA-Zertifikate vielleicht prüfen und nur Zertifikate auswählen, denen Sie vertrauen.
 .
  - Ja    : neuen CA-Zertifikaten wird vertraut und sie werden installiert;
  - Nein  : neue CA-Zertifikate werden standardmäßig nicht installiert;
  - Fragen: fragt bei jedem neuen CA-Zertifikat nach.
";
$elem["ca-certificates/trust_new_crts"]["descriptionfr"]="Faut-il accepter les nouveaux certificats de tiers de confiance ?
 Ce paquet peut installer des certificats de nouveaux tiers de confiance (« Certificate Authority ») lors de ses mises à jour. Vous pouvez souhaiter vérifier ces nouveaux certificats et ne choisir que ceux que vous acceptez.
 .
 - Oui      : les nouveaux certificats seront acceptés et installés ;
 - Non      : les nouveaux certificats ne seront pas installés par défaut ;
 - Demander : l'agrément de chacun des nouveaux certificats vous sera
              demandé.
";
$elem["ca-certificates/trust_new_crts"]["default"]="yes";
$elem["ca-certificates/new_crts"]["type"]="multiselect";
$elem["ca-certificates/new_crts"]["description"]="New certificates to activate:
 During upgrades, new certificates will be added. Please choose
 those you trust.
";
$elem["ca-certificates/new_crts"]["descriptionde"]="Zu aktivierende neue Zertifikate:
 Während Upgrades werden neue Zertifikate hinzugefügt. Bitte wählen Sie diejenigen aus, denen Sie vertrauen.
";
$elem["ca-certificates/new_crts"]["descriptionfr"]="Nouveaux certificats à accepter :
 Lors de cette mise à jour, de nouveaux certificats ont été ajoutés. Veuillez choisir si vous les acceptez.
";
$elem["ca-certificates/new_crts"]["default"]="";
$elem["ca-certificates/enable_crts"]["type"]="multiselect";
$elem["ca-certificates/enable_crts"]["description"]="Certificates to activate:
 This package installs common CA (Certificate Authority) certificates in
 /usr/share/ca-certificates.
 . 
 Please select the certificate authorities you trust so that their
 certificates are installed into /etc/ssl/certs. They will be compiled
 into a single /etc/ssl/certs/ca-certificates.crt file.
";
$elem["ca-certificates/enable_crts"]["descriptionde"]="Zu aktivierende Zertifikate:
 Dieses Paket installiert gebräuchliche Zertifikate von CAs (Zertifizierungsstellen) unter /usr/share/ca-certificates.
 .
 Bitte wählen Sie die Zertifizierungsstellen aus, denen Sie vertrauen, damit deren Zertifikate in /etc/ssl/certs installiert werden. Sie werden in eine einzige Datei /etc/ssl/certs/ca-certificates.crt zusammengestellt.
";
$elem["ca-certificates/enable_crts"]["descriptionfr"]="Certificats à accepter :
 Ce paquet peut installer des certificats de nouveaux tiers de confiance (« Certificate Authority ») dans /usr/share/ca-certificates.
 .
 Veuillez choisir les tiers de confiance que vous agréez afin que leurs certificats soient installés dans /etc/ssl/certs. Ils seront rassemblés dans un seul fichier nommé /etc/ssl/certs/ca-certificates.crt.
";
$elem["ca-certificates/enable_crts"]["default"]="";
PKG_OptionPageTail2($elem);
?>
