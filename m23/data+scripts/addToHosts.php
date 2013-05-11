<?php
include("/m23/inc/distr/debian/clientConfigCommon.php");
include("/m23/inc/edit.php");
include("/m23/inc/client.php");
include("/m23/inc/server.php");
include("/m23/inc/db.php");
include("/m23/inc/capture.php");

dbConnect();

$results = db_query("SELECT client, ip FROM clients");

while ($data = mysql_fetch_array($results))
{
	if (!empty($data[1]))
		SERVER_addEtcHosts($data[0], $data[1]);
};


?>