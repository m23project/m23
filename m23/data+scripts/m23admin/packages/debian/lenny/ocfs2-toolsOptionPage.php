<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ocfs2-tools");

$elem["ocfs2-tools/init"]["type"]="boolean";
$elem["ocfs2-tools/init"]["description"]="Would you like to start an OCFS2 cluster (O2CB) at boot time?
";
$elem["ocfs2-tools/init"]["descriptionde"]="Möchten Sie, dass ein OCFS2-Cluster (O2CB) beim Systemstart gestartet wird?
";
$elem["ocfs2-tools/init"]["descriptionfr"]="Voulez-vous lancer un cluster OCFS2 (OC2B) au démarrage ?
";
$elem["ocfs2-tools/init"]["default"]="false";
$elem["ocfs2-tools/clustername"]["type"]="string";
$elem["ocfs2-tools/clustername"]["description"]="Name of the cluster to start at boot time:
";
$elem["ocfs2-tools/clustername"]["descriptionde"]="Name des Clusters, der beim Systemstart gestartet werden soll:
";
$elem["ocfs2-tools/clustername"]["descriptionfr"]="Nom du cluster à lancer au démarrage :
";
$elem["ocfs2-tools/clustername"]["default"]="ocfs2";
$elem["ocfs2-tools/heartbeat_threshold"]["type"]="string";
$elem["ocfs2-tools/heartbeat_threshold"]["description"]="O2CB heartbeat threshold:
 The O2CB heartbeat threshold sets up the maximum time in seconds that a
 node awaits for an I/O operation. After it, the node \"fences\" itself,
 and you will probably see a crash.
 .
 It is calculated as the result of: (threshold - 1) x 2.
 .
 Its default value is 31 (60 seconds).
 .
 Raise it if you have slow disks and/or crashes with kernel messages
 like:
 .
 o2hb_write_timeout: 164 ERROR: heartbeat write timeout to device XXXX
 after NNNN milliseconds
";
$elem["ocfs2-tools/heartbeat_threshold"]["descriptionde"]="Schwellwert des O2BC-Heartbeats:
 Der Schwellwert des O2CB-Heartbeats bestimmt die maximale Zeit in Sekunden, die ein Knoten für eine E/A-Operation abwartet. Danach »grenzt« sich der Knoten aus, und Sie werden wahrscheinlich einen Absturz beobachten.
 .
 Er berechnet sich wie folgt: (Schwellwert - 1) x 2.
 .
 Der voreingestellte Wert ist 31 (60 Sekunden).
 .
 Erhöhen Sie ihn, falls Sie langsame Festplatten und/oder Abstürze haben mit Kernel-Meldungen wie:
 .
 o2hb_write_timeout: 164 ERROR: heartbeat write timeout to device XXXX after NNNN milliseconds
";
$elem["ocfs2-tools/heartbeat_threshold"]["descriptionfr"]="Seuil de battement O2CB :
 Le seuil de battement O2CB détermine le temps maximal en secondes qu'un nœud peut attendre lors d'une opération d'E/S. Passé ce délai, le nœud « implose » et le système a de fortes chances de planter.
 .
 La valeur réelle est le résultat de l'opération suivante : (seuil - 1) x 2.
 .
 La valeur par défaut est de 31, ce qui correspond à un seuil de 60 secondes.
 .
 Augmentez cette valeur si vous avez des disques lents et/ou des plantages signalés par des messages du noyau tels que :
 .
 o2hb_write_timeout: 164 ERROR: heartbeat write timeout to device XXXX after NNNN milliseconds
";
$elem["ocfs2-tools/heartbeat_threshold"]["default"]="31";
$elem["ocfs2-tools/idle_timeout"]["type"]="string";
$elem["ocfs2-tools/idle_timeout"]["description"]="O2CB idle timeout:
 The O2CB idle timeout (expressed in milliseconds) is the time before
 a network connection is considered dead.
 .
 Its default value is 30000 (30 seconds) and the minimum recommended value
 is 5000 (5 seconds).
";
$elem["ocfs2-tools/idle_timeout"]["descriptionde"]="O2CB-Leerlaufzeitlimit:
 Das O2CB-Leerlaufzeitlimit (in Millisekunden) ist die Zeit, nach der eine Netzwerkverbindung als tot angesehen wird.
 .
 Der voreingestellte Wert ist 30000 (30 Sekunden) und der minimale empfohlene Wert ist 2000 (2 Sekunden).
";
$elem["ocfs2-tools/idle_timeout"]["descriptionfr"]="Délai d'attente sur inactivité O2CB :
 Le délai d'attente sur inactivité O2CB (exprimé en millisecondes) est le délai à l'expiration duquel une connection réseau est considérée inactive.
 .
 Sa valeur par défaut est de 30000 (soit 30 secondes), le minimum recommandé étant de 5000 (soit 5 secondes).
";
$elem["ocfs2-tools/idle_timeout"]["default"]="30000";
$elem["ocfs2-tools/keepalive_delay"]["type"]="string";
$elem["ocfs2-tools/keepalive_delay"]["description"]="O2CB keepalive delay:
 The O2CB keepalive delay (expressed in milliseconds) is the maximum time before
 a keepalive package is sent.
 .
 Its default value is 2000 (2 seconds) and the minimum recommended value
 is 1000 (1 second).
";
$elem["ocfs2-tools/keepalive_delay"]["descriptionde"]="O2CB-Keepalive-Verzögerung:
 Die O2CB-Keepalive-Verzögerung (in Millisekunden) ist die maximale Zeit, nach der ein Keepalive-Paket gesendet wird.
 .
 Der voreingestellte Wert ist 2000 (2 Sekunden) und der minimale empfohlene Wert ist 1000 (1 Sekunde).
";
$elem["ocfs2-tools/keepalive_delay"]["descriptionfr"]="Intervalle de test de lien O2CB :
 L'intervalle de test de lien O2CB (exprimé en millisecondes) est la durée maximum au bout de laquelle un paquet dit \"keepalive\" est envoyé pour tester l'activité d'un lien.
 .
 Sa valeur par défaut est de 2000 (soit 2 secondes), le minimum recommandé étant de 1000 (soit 1 seconde).
";
$elem["ocfs2-tools/keepalive_delay"]["default"]="2000";
$elem["ocfs2-tools/reconnect_delay"]["type"]="string";
$elem["ocfs2-tools/reconnect_delay"]["description"]="O2CB reconnect delay:
 The O2CB reconnect delay (expressed in milliseconds) is the minimum time between
 connection attempts.
 .
 Its default and recommended minimum value is 2000 (2 seconds).
";
$elem["ocfs2-tools/reconnect_delay"]["descriptionde"]="O2CB-Wiederverbindungsverzögerung:
 Die O2CB-Wiederverbindungsverzögerung (in Millisekunden) ist die minimale Zeit zwischen Verbindungsversuchen.
 .
 Der voreingestellte und empfohlene minimale Wert ist 2000 (2 Sekunden).
";
$elem["ocfs2-tools/reconnect_delay"]["descriptionfr"]="Délai de reconnexion O2CB :
 Le délai de reconnexion O2CB (exprimé en millisecondes) est l'intervalle de temps minimal entre deux tentatives de connexion.
 .
 La valeur par défaut, recommandée, est de 2000 (2 secondes).
";
$elem["ocfs2-tools/reconnect_delay"]["default"]="2000";
PKG_OptionPageTail2($elem);
?>
