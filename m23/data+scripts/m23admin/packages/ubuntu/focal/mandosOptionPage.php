<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("mandos");

$elem["mandos/key_id"]["type"]="note";
$elem["mandos/key_id"]["description"]="New client option \"key_id\" is REQUIRED on server
 A new \"key_id\" client option is REQUIRED in the clients.conf file,
 otherwise the client most likely will not reboot unattended.  This option:
 .
  key_id = <HEXSTRING>
 .
 must be added in the file /etc/mandos/clients.conf, right before the
 \"fingerprint\" option, for each Mandos client.  You must edit that file and
 add this option for all clients.  To see the correct key ID for each
 client, run this command (on each client):
 .
  mandos-keygen -F/dev/null|grep ^key_id
 .
 Note: the clients must all also be using GnuTLS 3.6.6 or later; the server
 cannot serve passwords for both old and new clients!
 .
 Rationale: With GnuTLS 3.6.6, Mandos has been forced to stop using OpenPGP
 keys as TLS session keys.  A new TLS key pair will be generated on each
 client and will be used as identification, but the key ID of the public
 key needs to be added to this server, since this will now be used to
 identify the client to the server.
";
$elem["mandos/key_id"]["descriptionde"]="Auf diesem Server ist die Client-Option »key_id« ERFORDERLICH
 In der Datei clients.conf ist eine neue Client-Option »key_id« ERFORDERLICH, andernfalls werden die Clients höchstwahrscheinlich nicht unbeaufsichtigt neu starten. Die Option
 .
  key_id = <HEXADEZIMALZEICHENKETTE>
 .
 muss der Datei /etc/mandos/clients.conf kurz vor der Option »fingerprint« auf jedem Mandos-Client hinzugefügt werden. Sie müssen diese Datei bearbeiten und diese Option auf allen Clients hinzufügen. Um die korrekte Schlüsselkennung für jeden Client anzusehen, führen Sie (auf jedem Client) diesen Befehl aus:
 .
  mandos-keygen -F/dev/null|grep ^key_id
 .
 Hinweis: Die Clients müssen außerdem alle GnuTLS 3.6.6 oder neuer nutzen; der Server kann keine Passwörter für sowohl alte als auch neue Clients anbieten!
 .
 Begründung: Mit GnuTLS 3.6.6 wurde erzwungen, dass Mandos die Benutzung von OpenPGP als TLS-Sitzungsschlüssel stoppt. Auf jedem Client wird ein neues TLS-Schlüsselpaar erzeugt und zur Identifizierung benutzt, aber der öffentliche Schlüssel muss auf diesem Server hinzugefügt werden, da dies nun zur Identifizierung des Clients auf dem Server verwendet wird.
";
$elem["mandos/key_id"]["descriptionfr"]="";
$elem["mandos/key_id"]["default"]="";
$elem["mandos/removed_bad_key_ids"]["type"]="note";
$elem["mandos/removed_bad_key_ids"]["description"]="Bad key IDs have been removed from clients.conf
 Bad key IDs, which were created by a bug in Mandos client 1.8.0, have been
 removed from /etc/mandos/clients.conf
";
$elem["mandos/removed_bad_key_ids"]["descriptionde"]="Falsche Schlüsselkennungen wurden aus der clients.conf entfernt.
 Falsche Schlüsselkennungen, die durch einen Fehler im Mandos-Client 1.8.0 erzeugt wurden, wurden aus /etc/mandos/clients.conf entfernt.
";
$elem["mandos/removed_bad_key_ids"]["descriptionfr"]="Les identifiants de clef incorrects ont été supprimés de clients.conf
 Les identifiants de clef incorrects, créés par un bogue dans le client Mandos 1.8.0, ont été supprimés de /etc/mandos/clients.conf
";
$elem["mandos/removed_bad_key_ids"]["default"]="";
PKG_OptionPageTail2($elem);
?>
