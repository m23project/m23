<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("tomcat7");

$elem["tomcat7/username"]["type"]="string";
$elem["tomcat7/username"]["description"]="Dedicated system account for the tomcat7 daemon:
 The tomcat7 server must use a dedicated account for its operation so that
 the system's security is not compromised by running it with superuser
 privileges.
";
$elem["tomcat7/username"]["descriptionde"]="Eigenes Systemkonto für den Tomcat6-Daemon:
 Der Tomcat6-Server muss ein eigenes Konto für seinen Betrieb verwenden, um die Sicherheit des Systems nicht durch die Ausführung mit Superuser-Rechten zu kompromittieren.
";
$elem["tomcat7/username"]["descriptionfr"]="Compte système dédié au démon tomcat7 :
 Le serveur tomcat7 nécessite un compte dédié pour fonctionner afin de ne pas compromettre la sécurité du système en s'exécutant avec les privilèges du superutilisateur.
";
$elem["tomcat7/username"]["default"]="tomcat7";
$elem["tomcat7/groupname"]["type"]="string";
$elem["tomcat7/groupname"]["description"]="Dedicated system group for the tomcat7 daemon:
 The tomcat7 server must use a dedicated group for its operation so that
 the system's security is not compromised by running it with superuser
 privileges.
";
$elem["tomcat7/groupname"]["descriptionde"]="Eigene Systemgruppe für den Tomcat6-Daemon:
 Der Tomcat6-Server muss eine eigene Gruppe für seinen Betrieb verwenden, um die Sicherheit des Systems nicht durch die Ausführung mit Superuser-Rechten zu kompromittieren.
";
$elem["tomcat7/groupname"]["descriptionfr"]="Groupe système dédié au démon tomcat7 :
 Le serveur tomcat7 nécessite un groupe dédié pour fonctionner afin de ne pas compromettre la sécurité du système en s'exécutant avec les privilèges  du superutilisateur.
";
$elem["tomcat7/groupname"]["default"]="tomcat7";
$elem["tomcat7/javaopts"]["type"]="string";
$elem["tomcat7/javaopts"]["description"]="Please choose the tomcat7 JVM Java options:
 Tomcat's JVM will be launched with a specific set of Java options.
 .
 Note that if you use -XX:+UseConcMarkSweepGC you should add the
 -XX:+CMSIncrementalMode option if you run Tomcat on a machine with
 exactly one CPU chip that contains one or two cores.
";
$elem["tomcat7/javaopts"]["descriptionde"]="Bitte wählen Sie die Java-Optionen für die Tomcat6-JVM:
 Die Tomcat-JVM wird mit speziellen Java-Optionen gestartet.
 .
 Beachten Sie beim Einsatz auf Systemen mit genau einem CPU-Chip, der einen oder zwei Prozessorkerne enthält, dass bei Wahl der Option »-XX:+UseConcMarkSweepGC« auch die Option -XX:+CMSIncrementalMode zur Konfiguration hinzugefügt werden sollte.
";
$elem["tomcat7/javaopts"]["descriptionfr"]="Options de la machine virtuelle Java pour tomcat7 :
 La machine virtuelle Java (JVM) sera lancée avec un ensemble spécifique d'options Java. 
 .
 Veuillez noter que si l'option -XX:+UseConcMarkSweepGC est utilisée, l'option -XX:+CMSIncrementMode devrait être ajoutée si Tomcat s'exécute sur une machine avec exactement un processeur contenant un ou deux cœurs.
";
$elem["tomcat7/javaopts"]["default"]="-Djava.awt.headless=true -Xmx128m -XX:+UseConcMarkSweepGC";
PKG_OptionPageTail2($elem);
?>
