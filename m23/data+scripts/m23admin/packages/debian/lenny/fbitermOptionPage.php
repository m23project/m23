<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("fbiterm");

$elem["fbiterm/SUID_bit"]["type"]="boolean";
$elem["fbiterm/SUID_bit"]["description"]="Do you want /usr/bin/fbiterm to be installed SUID root?
 You have the option of installing the /usr/bin/fbiterm binary with the
 SUID bit set.  By setting 'SUID root', non-root users may run fbiterm
 directly.
 .
 This can open security concerns: fbiterm may contain undiscovered
 security flaws which malicious users may exploit if fbiterm is set SUID
 root.
 .
 You should install fbiterm with SUID bit set unless you do not intend
 to use it regularly.  You may change this setting by running
 \"dpkg-reconfigure fbiterm\".
";
$elem["fbiterm/SUID_bit"]["descriptionde"]="Möchten Sie, dass /usr/bin/fbiterm als SUID root installiert wird?
 Sie haben die Möglichkeit, das Programm /usr/bin/fbiterm mit gesetztem SUID-Bit zu installieren. Durch setzen von »SUID root« können Nicht-root-Benutzer fbiterm direkt ausführen.
 .
 Dies kann Sicherheitsbedenken eröffnen: fbiterm könnte unentdeckte Sicherheitslücken enthalten, die ein bösartiger Benutzer ausnutzen könnte, falls fbiterm als SUID root installiert ist.
 .
 Sie sollten fbiterm mit gesetztem SUID-Bit installieren, außer Sie beabsichtigen nicht, es regelmäßig zu nutzen. Sie können diese Einstellung ändern, indem Sie »dpkg-reconfigure fbiterm« aufrufen.
";
$elem["fbiterm/SUID_bit"]["descriptionfr"]="Exécuter /usr/bin/fbiterm avec les privilèges du superutilisateur ?
 Vous pouvez installer le programme /usr/bin/fbiterm de manière à ce qu'il s'exécute avec les privilèges du superutilisateur (« setuid root »). Ainsi, les utilisateurs non privilégiés pourront l'utiliser directement.
 .
 Cela comporte toutefois un risque. Fbiterm peut contenir des failles de sécurité non connues, dont un utilisateur malintentionné pourrait se servir si le programme s'exécute avec les privilèges du superutilisateur.
 .
 L'exécution avec les privilèges du superutilisateur est recommandée, sauf si vous ne comptez pas utiliser ce programme régulièrement. Vous pourrez changer ce réglage avec la commande « dpkg-reconfigure fbiterm »
";
$elem["fbiterm/SUID_bit"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
