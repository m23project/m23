<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tomcat8");

$elem["tomcat8/username"]["type"]="string";
$elem["tomcat8/username"]["description"]="Dedicated system account for the tomcat8 daemon:
 The tomcat8 server must use a dedicated account for its operation so that
 the system's security is not compromised by running it with superuser
 privileges.
";
$elem["tomcat8/username"]["descriptionde"]="Eigenes Systemkonto für den Tomcat8-Daemon:
 Der Tomcat8-Server muss ein eigenes Konto für seinen Betrieb verwenden, um die Sicherheit des Systems nicht durch die Ausführung mit Superuser-Rechten zu kompromittieren.
";
$elem["tomcat8/username"]["descriptionfr"]="Compte système dédié au démon tomcat8 :
 Le serveur tomcat8 nécessite un compte dédié pour fonctionner afin de ne pas compromettre la sécurité du système en s'exécutant avec les privilèges du superutilisateur.
";
$elem["tomcat8/username"]["default"]="tomcat8";
$elem["tomcat8/groupname"]["type"]="string";
$elem["tomcat8/groupname"]["description"]="Dedicated system group for the tomcat8 daemon:
 The tomcat8 server must use a dedicated group for its operation so that
 the system's security is not compromised by running it with superuser
 privileges.
";
$elem["tomcat8/groupname"]["descriptionde"]="Eigene Systemgruppe für den Tomcat8-Daemon:
 Der Tomcat8-Server muss eine eigene Gruppe für seinen Betrieb verwenden, um die Sicherheit des Systems nicht durch die Ausführung mit Superuser-Rechten zu kompromittieren.
";
$elem["tomcat8/groupname"]["descriptionfr"]="Groupe système dédié au démon tomcat8 :
 Le serveur tomcat8 nécessite un groupe dédié pour fonctionner afin de ne pas compromettre la sécurité du système en s'exécutant avec les privilèges  du superutilisateur.
";
$elem["tomcat8/groupname"]["default"]="tomcat8";
$elem["tomcat8/javaopts"]["type"]="string";
$elem["tomcat8/javaopts"]["description"]="Please choose the tomcat8 JVM Java options:
 Tomcat's JVM will be launched with a specific set of Java options.
 .
 Note that if you use -XX:+UseConcMarkSweepGC you should add the
 -XX:+CMSIncrementalMode option if you run Tomcat on a machine with
 exactly one CPU chip that contains one or two cores.
";
$elem["tomcat8/javaopts"]["descriptionde"]="Bitte wählen Sie die Java-Optionen für die Tomcat8-JVM:
 Die Tomcat-JVM wird mit speziellen Java-Optionen gestartet.
 .
 Beachten Sie beim Einsatz auf Systemen mit genau einem CPU-Chip, der einen oder zwei Prozessorkerne enthält, dass bei Wahl der Option »-XX:+UseConcMarkSweepGC« auch die Option -XX:+CMSIncrementalMode zur Konfiguration hinzugefügt werden sollte.
";
$elem["tomcat8/javaopts"]["descriptionfr"]="Options de la machine virtuelle Java pour tomcat8 :
 La machine virtuelle Java (JVM) sera lancée avec un ensemble spécifique d'options Java. 
 .
 Veuillez noter que si l'option -XX:+UseConcMarkSweepGC est utilisée, l'option -XX:+CMSIncrementMode devrait être ajoutée si Tomcat s'exécute sur une machine avec exactement un processeur contenant un ou deux cœurs.
";
$elem["tomcat8/javaopts"]["default"]="-Djava.awt.headless=true -XX:+UseConcMarkSweepGC";
PKG_OptionPageTail2($elem);
?>
