<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("encfs");

$elem["encfs/security-information"]["type"]="error";
$elem["encfs/security-information"]["description"]="Encfs security information
 According to a security audit by Taylor Hornby (Defuse Security), the current
 implementation of Encfs is vulnerable or potentially vulnerable to multiple
 types of attacks. For example, an attacker with read/write access to encrypted
 data might lower the decryption complexity for subsequently encrypted data
 without this being noticed by a legitimate user, or might use timing analysis
 to deduce information.
 .
 Until these issues are resolved, encfs should not be considered a safe home
 for sensitive data in scenarios where such attacks are possible.
";
$elem["encfs/security-information"]["descriptionde"]="Encfs-Sicherheitsinformation
 Gemäß des Sicherheits-Audits durch Taylor Hornby (Defuse Security) ist die derzeitige Implementierung von Encfs verwundbar oder potentiell für mehrere Angriffsarten anfällig. Ein Angreifer mit Schreib-/Lesezugriff auf verschlüsselte Daten könnte zum Beispiel die Komplexität der Verschlüsselung für nachfolgend verschlüsselte Daten heruntersetzen, ohne dass ein rechtmäßiger Benutzer dies bemerkt. Er könnte außerdem Zeitanalysen verwenden, um daraus Informationen abzuleiten.
 .
 Bis diese Probleme behoben sind, sollte Encfs nicht in Szenarien, in denen derartige Angriffe möglich sind, als sicherer Ort für sensible Daten angesehen werden.
";
$elem["encfs/security-information"]["descriptionfr"]="Information de sécurité pour Encfs
 Selon un audit de sécurité mené par Taylor Hornby (Defuse Security), la version actuelle de Encfs est vulnérable ou potentiellement vulnérable à plusieurs types d'attaques. Par exemple, un attaquant qui aurait les droits en lecture/écriture sur les données chiffrées, pourrait baisser le niveau de complexité pour déchiffrer des données, sans qu'un utilisateur légitime ne s'en aperçoive, ou bien pourrait utiliser l'analyse temporelle pour récupérer des informations.
 .
 Tant que ces problèmes ne sont pas résolus, encfs ne devra pas être considéré comme un endroit sûr pour les données sensibles, dans les situations qui permettent ce type d'attaques.
";
$elem["encfs/security-information"]["default"]="";
PKG_OptionPageTail2($elem);
?>
