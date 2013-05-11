#!/usr/bin/php
<?
	include('/m23/inc/db.php');
	include('/m23/inc/capture.php');

/**
**name CLIENT_getAllAsRes()
**description Creates and executes an SQL statement for getting all values of all clients.
**parameter order: Name of the field to order the results by.
**returns MySQL resource ID.
**/
function CLIENT_getAllAsRes($order="")
{
	if (isset($order{1}))
		$order = " ORDER BY $order";

	return(DB_query("SELECT * FROM `clients`$order"));
}

	dbConnect();

	$res = CLIENT_getAllAsRes("ip");

	while ($client = mysql_fetch_assoc($res))
		echo("$client[ip]\n");
	
?>