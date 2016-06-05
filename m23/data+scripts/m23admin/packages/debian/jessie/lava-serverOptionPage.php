<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lava-server");

$elem["lava-server/master"]["type"]="boolean";
$elem["lava-server/master"]["description"]="Is this a standalone master instance of LAVA?
 LAVA can be set up in either of two ways: as a single standalone
 master instance with attached devices, or in a distributed
 configuration with a central master instance and remote dispatchers
 providing (more) devices.
 .
 Configuration of remote dispatchers requires manual intervention,
 so the standalone configuration is recommended.
";
$elem["lava-server/master"]["descriptionde"]="Ist dies eine eigenständige übergeordnete Instanz von LAVA?
 LAVA kann auf zwei Arten eingerichtet werden: als einzelne eigenständige Hauptinstanz mit angehängten Geräten oder in einer verteilten Konfiguration mit einer zentralen Hauptinstanz und fernen Zuteilern, die (mehrere) Geräte bereitstellen.
 .
 Die Konfiguration ferner Zuteiler erfordert manuelles Eingreifen, daher wird die eigenständige Konfiguration empfohlen.
";
$elem["lava-server/master"]["descriptionfr"]="S'agit-il d'une instance maître en nœud unique de LAVA ?
 LAVA peut être installé de deux façons : en tant qu'instance maître en nœud unique avec des périphériques connectés, ou bien comme configuration distribuée avec une instance maître centrale et des distributeurs distants qui fournissent des périphériques (supplémentaires).
 .
 La configuration de distributeurs distants nécessite une intervention manuelle, dans ce cas la configuration en nœud unique est recommandé.
";
$elem["lava-server/master"]["default"]="true";
$elem["lava-server/db-port"]["type"]="string";
$elem["lava-server/db-port"]["description"]="Port number of the PostgreSQL database:
 Please enter the port number for the PostgreSQL database.
";
$elem["lava-server/db-port"]["descriptionde"]="Portnummer der PostgreSQL-Datenbank:
 Bitte geben Sie die Portnummer der PostgreSQL-Datenbank ein.
";
$elem["lava-server/db-port"]["descriptionfr"]="Numéro de port de la base de données PostgreSQL :
 Veuillez entrer le numéro de port de la base de données PostgreSQL.
";
$elem["lava-server/db-port"]["default"]="5432";
$elem["lava-server/worker-note"]["type"]="note";
$elem["lava-server/worker-note"]["description"]="This install looks like a remote worker
 You asked for this system to be set up as master instance for a
 distributed configuration, but this system looks like a remote worker.
 You can either go back and change your answer or proceed with
 reconfiguring this system as specified.
 .
 Note that you will have to ensure that the lava-coordinator
 configuration is correct.
";
$elem["lava-server/worker-note"]["descriptionde"]="Bei dieser Installation scheint es sich um einen fernen Arbeits-Client zu handeln.
 Sie haben gewünscht, dieses System als eine Hauptinstanz für eine verteilte Konfiguration einzurichten, aber bei diesem System scheint es sich um einen fernen Arbeits-Client zu handeln. Sie können entweder zurückgehen und Ihre Eingabe ändern oder mit der Neukonfiguration dieses Systems so fortfahren, wie sie angegeben wurde.
 .
 Beachten Sie, dass Sie eine korrekte Konfiguration von Lava-Coordinator sicherstellen müssen.
";
$elem["lava-server/worker-note"]["descriptionfr"]="Il semble que cette installation soit un exécuteur distant
 Vous avez demandé à ce que ce système soit installé en tant qu'instance maître pour une configuration distribuée, mais il semble que ce système soit un exécuteur distant. Vous pouvez soit revenir en arrière et changer votre réponse ou configurer ce système comme indiqué.
 .
 Veuillez noter que vous devrez être sûr que la configuration de lava-coordinator soit correcte.
";
$elem["lava-server/worker-note"]["default"]="";
$elem["lava-server/master-note"]["type"]="note";
$elem["lava-server/master-note"]["description"]="This install looks like a master instance
 You asked for this system to be set up as a remote worker for a
 distributed configuration, but this system looks like a master
 instance. You can either go back and change your answer or proceed
 with reconfiguring this system as specified.
 .
 Note that you will have to ensure that the lava-coordinator
 configuration is changed to point to the master instance for
 this remote worker. You can then remove the lava-coordinator
 package from the remote worker.
";
$elem["lava-server/master-note"]["descriptionde"]="Bei dieser Installation scheint es sich um eine ferne Hauptinstanz zu handeln.
 Sie haben gewünscht, dieses System als einen fernen Arbeits-Client für eine verteilte Konfiguration einzurichten, aber bei diesem System scheint es sich um eine Hauptinstanz zu handeln. Sie können entweder zurückgehen und Ihre Eingabe ändern oder mit der Neukonfiguration dieses Systems so fortfahren, wie sie angegeben wurde.
 .
 Beachten Sie, dass Sie dafür sorgen müssen, dass die Lava-Coordinator-Konfiguration so geändert werden muss, dass sie auf die Hauptinstanz für diesen fernen Arbeits-Client verweist. Sie können dann das Lava-Coordinator-Paket vom fernen Arbeits-Client löschen.
";
$elem["lava-server/master-note"]["descriptionfr"]="Il semble que cette installation soit une instance maître.
 Vous avez demandé à ce que ce système soit installé en tant qu'exécuteur distant pour une configuration distribuée, mais il semble que ce système soit une instance maître. Vous pouvez soit revenir en arrière et changer votre réponse ou configurer ce système comme indiqué.
 .
 Veuillez noter que vous devrez être sûr que la configuration de lava-coordinator est modifiée pour pointer vers l'instance maître pour cet exécuteur distant. Vous pouvez alors supprimer le paquet lava-coordinator depuis l'exécuteur distant.
";
$elem["lava-server/master-note"]["default"]="";
$elem["lava-server/instance-name"]["type"]="string";
$elem["lava-server/instance-name"]["description"]="Name for this LAVA instance:
 LAVA servers need to have an instance name. If this is a new
 instance, you can safely use the default name. If this is an upgrade
 of a previous LAVA instance, specify the instance name here to
 upgrade the database or use a different name to start fresh with
 a new database.
";
$elem["lava-server/instance-name"]["descriptionde"]="Name für diese LAVA-Instanz:
 LAVA-Server benötigen einen Instanznamen. Falls dies eine neue Instanz ist, können Sie gefahrlos den Standardnamen verwenden. Falls dies ein Upgrade einer vorhergehenden LAVA-Instanz ist, geben Sie den Instanznamen hier an, um ein Upgrade der Datenbank durchzuführen oder einen anderen Namen, um frisch mit einer neuen Datenbank zu beginnen.
";
$elem["lava-server/instance-name"]["descriptionfr"]="Nom de cette instance LAVA :
 Les serveurs LAVA doivent avoir un nom d'instance. S'il s'agit d'une nouvelle instance, vous pouvez utiliser le nom par défaut en toute sécurité. S'il s'agit d'une mise à jour d'une précédente instance LAVA, veuillez indiquer ici le nom de l'instance pour mettre à jour la base de données, ou utilisez un nom différent pour démarrer avec une nouvelle base de données.
";
$elem["lava-server/instance-name"]["default"]="default";
$elem["lava-server/missingname"]["type"]="error";
$elem["lava-server/missingname"]["description"]="Missing LAVA instance name
 An instance name must be specified for LAVA-server. Using
 the instance name \"default\".
";
$elem["lava-server/missingname"]["descriptionde"]="Fehlender LAVA-Instanzname
 Für LAVA-Server muss ein Instanzname angegeben werden. Der Instanzname »default« wird verwendet.
";
$elem["lava-server/missingname"]["descriptionfr"]="Nom de l'instance LAVA manquant
 Un nom d'instance doit être indiqué pour le serveur LAVA. « default » sera utilisé commme nom d'instance.
";
$elem["lava-server/missingname"]["default"]="";
$elem["lava-worker/master-instance-name"]["type"]="string";
$elem["lava-worker/master-instance-name"]["description"]="Name of the master instance for this worker:
 LAVA servers need to have an instance name. Each remote
 worker must be given the instance name of the master
 LAVA server which it will poll for new jobs to run
 on the devices attached to the worker.
";
$elem["lava-worker/master-instance-name"]["descriptionde"]="Name der Hauptinstanz für diesen Arbeits-Client:
 LAVA-Server müssen einen Instanznamen haben. Jedem fernen Arbeits-Client muss der Instanzname des Haupt-LAVA-Servers angegeben werden, von dem er neue Jobs abruft, die auf den an den Arbeits-Client angeschlossenen Geräten ausgeführt werden.
";
$elem["lava-worker/master-instance-name"]["descriptionfr"]="Nom de l'instance maître pour cet exécuteur :
 Les serveurs LAVA doivent avoir un nom d'instance. Chaque exécuteur distant doit comporter le nom d'instance du serveur maître LAVA depuis lequel il obtiendra  les nouvelles tâches à lancer sur les périphériques connectés à l'exécuteur.
";
$elem["lava-worker/master-instance-name"]["default"]="default";
$elem["lava-worker/db-server"]["type"]="string";
$elem["lava-worker/db-server"]["description"]="Master scheduler for this worker:
 Each remote worker needs to connect to a master scheduler
 running lava-server. This hostname or IP address will be
 used to connect to the master database.
 .
 To work with remote nodes, the master needs to be configured
 to allow the database to listen to the workers. An SSH key also
 needs to be generated on the worker and added to the master list
 of authorized_keys. Ensure that the master allows remote access
 from workers before submitting jobs or health checks.
 .
 You can continue setting up the worker, as long as
 remote database access is enabled before jobs are submitted.
";
$elem["lava-worker/db-server"]["descriptionde"]="Hauptzeitplaner für diesen Arbeits-Client:
 Jeder ferne Arbeits-Client muss sich mit einem Hauptzeitplaner verbinden, auf dem Lava-Server läuft. Dieser Rechnername oder die IP-Adresse wird für die Verbindung mit der Hauptdatenbank benutzt.
 .
 Um mit fernen Knoten arbeiten zu können, muss die Hauptinstanz so konfiguriert werden, dass die Datenbank Verbindungen zu den Arbeits-Clients annimmt. Außerdem muss auf dem Arbeits-Client ein SSH-Schlüssel erzeugt und der Liste »authorized_keys« der Hauptinstanz hinzugefügt werden. Stellen Sie sicher, dass die Hauptinstanz Zugriff durch Arbeits-Clients aus der Ferne erlaubt, bevor Jobs oder Statusabfragen übertragen werden.
 .
 Sie können mit der Einrichtung des Arbeits-Clients fortfahren, so lange der ferne Datenbankzugriff aktiviert ist, bevor Jobs übertragen werden.
";
$elem["lava-worker/db-server"]["descriptionfr"]="Ordonnanceur principale pour cet exécuteur :
 Chaque exécuteur distant a besoin de se connecter à un ordonnanceur principal qui exécute lava-server. Ce nom d'hôte ou adresse IP sera utilisée pour se connecter à la base données principale.
 .
 Pour fonctionner avec des nœuds distants, le maître a besoin d'être configuré afin d'autoriser la base de données à écouter les exécuteurs. Une clé SSH doit également être générée sur l'exécuteur et ajoutée à la liste authorized_keys du maître. Veuillez vous assurer que le maître autorise les accès distants depuis les exécuteurs avant de soumettre des tâches ou faire des contrôles de bon fonctionnement.
 .
 Vous pouvez continuer à installer l'exécuteur, aussi longtemps qu'un accès à une base de données distante est activé avant que des tâches ne soient soumises.
";
$elem["lava-worker/db-server"]["default"]="";
$elem["lava-worker/db-name"]["type"]="string";
$elem["lava-worker/db-name"]["description"]="Name of the database on the master:
 Please enter the name of the database on the master scheduler
 running lava-server. The worker will use this name to contact
 the database.
";
$elem["lava-worker/db-name"]["descriptionde"]="Name der Datenbank auf der Hauptinstanz:
 Bitte geben Sie den Namen der Datenbank auf dem Hauptzeitplaner an, auf dem Lava-Server läuft. Der Arbeits-Client wird diesen Namen zum Kontaktieren der Datenbank verwenden.
";
$elem["lava-worker/db-name"]["descriptionfr"]="Nom de la base de données du maître :
 Veuillez entrer le nom de la base de données de l'ordonnanceur principal exécutant lava-server. Cet exécuteur utilisera ce nom pour contacter la base de données.
";
$elem["lava-worker/db-name"]["default"]="";
$elem["lava-worker/db-user"]["type"]="string";
$elem["lava-worker/db-user"]["description"]="Username for the database on the master:
 Please enter the username for the database on the master scheduler
 running lava-server. The worker will use this username to contact
 the database.
";
$elem["lava-worker/db-user"]["descriptionde"]="Benutzername der Datenbank auf der Hauptinstanz:
 Bitte geben Sie den Benutzernamen für die Datenbank auf dem Hauptzeitplaner an, auf dem Lava-Server läuft. Der Arbeits-Client wird diesen Benutzernamen zum Kontaktieren der Datenbank verwenden.
";
$elem["lava-worker/db-user"]["descriptionfr"]="Nom d'utilisateur pour la base de données sur ce maître :
 Veuillez entrer le nom d'utilisateur pour la base de données sur l'ordonnanceur principal exécutant lava-server. Cet exécuteur utilisera ce nom pour contacter la base de données.
";
$elem["lava-worker/db-user"]["default"]="";
$elem["lava-worker/db-port"]["type"]="string";
$elem["lava-worker/db-port"]["description"]="Port number of the database on the master:
 Please enter the database port number for the database on the
 master scheduler running lava-server. The worker will use this
 port to contact the database.
";
$elem["lava-worker/db-port"]["descriptionde"]="Portnummer der Datenbank auf der Hauptinstanz:
 Bitte geben Sie die Datenbankportnummer für die Datenbank auf dem Hauptzeitplaner an, auf dem Lava-Server läuft. Der Arbeits-Client wird diesen Port zum Kontaktieren der Datenbank verwenden.
";
$elem["lava-worker/db-port"]["descriptionfr"]="Numéro de port de la base de données sur le maître :
 Veuillez entrer le numéro de port de la base de données sur l'ordonnanceur principal exécutant lava-server. Cet exécuteur utilisera ce port pour contacter la base de données.
";
$elem["lava-worker/db-port"]["default"]="5432";
$elem["lava-worker/db-pass"]["type"]="string";
$elem["lava-worker/db-pass"]["description"]="Password for the database on the master:
 Please enter the password for the database on the master scheduler
 running lava-server. The worker will use this password to contact
 the database.
";
$elem["lava-worker/db-pass"]["descriptionde"]="Passwort für die Datenbank auf dr Hauptinstanz:
 Bitte geben Sie das Passwort für die Datenbank auf dem Hauptzeitplaner an, auf dem Lava-Server läuft. Der Arbeits-Client wird dieses Passwort zum Kontaktieren der Datenbank verwenden.
";
$elem["lava-worker/db-pass"]["descriptionfr"]="Mot de passe pour la base de données sur le maître :
 Veuillez entrer le mot de passe de la base de données sur l'ordonnanceur principal exécutant lava-server. Cet exécuteur utilisera ce mot de passe pour contacter la base de données.
";
$elem["lava-worker/db-pass"]["default"]="";
PKG_OptionPageTail2($elem);
?>
