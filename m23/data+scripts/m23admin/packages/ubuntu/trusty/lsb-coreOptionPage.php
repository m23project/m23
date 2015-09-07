<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lsb-core");

$elem["lsb/shadowconfig"]["type"]="boolean";
$elem["lsb/shadowconfig"]["description"]="Enable shadow passwords?
 The Linux Standard Base requires that certain features of adduser(8)
 be available to conforming applications (such as password
 aging). These features are only provided when shadow passwords are
 enabled, while this system has them disabled.
 .
 Most LSB applications will work fine with either setting, but complete
 conformance requires shadow passwords to be enabled.
 .
 Generally speaking, it is considered good practice to enable shadow
 passwords. However, there are some situations in which shadow passwords
 may not work properly (most notably, if non-root users need to
 check passwords against /etc/passwd).
";
$elem["lsb/shadowconfig"]["descriptionde"]="Schatten-Passworte (»shadow passwords«) aktivieren?
 Die LSB (»Linux Standard Base«) verlangt, dass bestimmte Funktionen von adduser(8) für LSB-konforme Anwendungen verfügbar sind (z.B. Passwort-Alterung). Diese Funktionen werden nur zur Verfügung gestellt, wenn Schatten-Passworte aktiviert werden; während in diesem System Schatten-Passworte derzeit nicht aktiviert sind.
 .
 Die meisten LSB-Anwendungen werden mit jeder Einstellung prima funktionieren, aber vollständige Konformität verlangt, dass Schatten-Passworte aktiviert werden.
 .
 Es ist generell das Richtige, Schatten-Passworte zu benutzen. Es gibt jedoch einige Situationen, in denen Schatten-Passworte nicht richtig funktionieren (insbesondere falls Nicht-Root-Benutzer Passworte in /etc/passwd überprüfen müssen).
";
$elem["lsb/shadowconfig"]["descriptionfr"]="Faut-il activer les mots de passe cachés (« shadow passwords ») ?
 La base normalisée de Linux (LSB : «  Linux Standard Base ») impose que certaines fonctionnalités de adduser(8) (p. ex. l'expiration des mots de passe) soient disponibles pour les applications. Ces possibilités ne sont disponibles que lorsque les mots de passe cachés sont activés ; or, ils sont actuellement désactivés sur ce système.
 .
 La plupart des applications conformes à la LSB fonctionnent correctement dans tous les cas, mais la conformité complète n'est possible qu'avec l'activation des mots de passe cachés.
 .
 En général, l'activation des mots de passe cachés est plutôt un choix judicieux. Cependant, leur utilisation peut créer des difficultés dans certains cas (typiquement, lorsqu'un utilisateur non privilégié cherche à utiliser /etc/passwd pour contrôler les mots de passe).
";
$elem["lsb/shadowconfig"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
