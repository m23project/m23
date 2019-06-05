<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("matrix-synapse");

$elem["matrix-synapse/server-name"]["type"]="string";
$elem["matrix-synapse/server-name"]["description"]="Name of the server:
 The name that this homeserver will appear as, to clients and other
 servers via federation. This name should match the SRV record
 published in DNS.
";
$elem["matrix-synapse/server-name"]["descriptionde"]="Name des Servers:
 Der Name, unter dem dieser Heimatserver den Clients und anderen Diensten mittels Föderation erscheinen wird. Der Name sollte auf den SRV-Datensatz, wie er im DNS veröffentlicht ist, passen.
";
$elem["matrix-synapse/server-name"]["descriptionfr"]="";
$elem["matrix-synapse/server-name"]["default"]="";
$elem["matrix-synapse/report-stats"]["type"]="boolean";
$elem["matrix-synapse/report-stats"]["description"]="Report anonymous statistics?
 Developers of Matrix and Synapse really appreciate helping the
 project out by reporting anonymized usage statistics from this
 homeserver. Only very basic aggregate data (e.g. number of users)
 will be reported, but it helps track the growth of the Matrix
 community, and helps in making Matrix a success, as well as to
 convince other networks that they should peer with Matrix.
 .
 Thank you.
";
$elem["matrix-synapse/report-stats"]["descriptionde"]="Anonyme Statistiken berichten?
 Die Entwickler von Matrix und Synape schätzen es sehr, wenn Sie dem Projekt mit anonymisierten Benutzungsstatistiken von diesem Heimatserver helfen. Nur sehr grundlegende, zusammengefasste Daten (z.B. die Anzahl der Benutzer) werden berichtet, aber es hilft, das Wachstum der Matrix-Gemeinde nachzuvollziehen und Matrix zum Erfolg zu führen, sowie andere Netze zu überzeugen, dass sie eine Peer-Verbindung zu Matrix aufbauen sollen.
 .
 Vielen Dank.
";
$elem["matrix-synapse/report-stats"]["descriptionfr"]="";
$elem["matrix-synapse/report-stats"]["default"]="false";
PKG_OptionPageTail2($elem);
?>
