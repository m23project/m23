<?php
/*
Description: This scripts reads the keyValueStore column of the clients table and converts it to its own clientkvstore table. Note: m23dbuser needs rights to alter clientkvstore table.
*/

function run($argc, $argv)
{
	$colArray = array("client" => "client");
	$sqlArray = array();

	// first of all we loop through all clients and read their keyValueStore.
	// We'll save the used keys in an extra array, these will be columns later.
	// We have everything to build the INSERT-Sql. INSERT IGNORE means already existing entries won't be overwritten.
	$result = DB_query("SELECT client,keyValueStore FROM clients ORDER BY client ASC");
	while ($row = mysqli_fetch_assoc($result)) {
		$sqlINSERT = array();
		$sqlINSERT['client'] = "'".$row['client']."'";
		if (!empty($row['keyValueStore'])) {
			$kvStore = unserialize($row['keyValueStore']);
			foreach ($kvStore as $key => $value)
				$sqlINSERT[$key] = "'$value'";
			foreach (array_keys($sqlINSERT) as $key)
				$colArray[$key] = $key;
		}
		$sqlArray[] = "INSERT IGNORE INTO clientkvstore (".implode(array_keys($sqlINSERT), ", ").") VALUES (".implode(array_values($sqlINSERT), ", ").")";
	}
	
	// Now that we have all columns used in all keyValueStores, we can check which of those we have to create (probably all).
	$result = DB_query("SELECT COLUMN_NAME FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE TABLE_SCHEMA = 'm23' AND TABLE_NAME = 'clientkvstore'");
	while ($row = mysqli_fetch_assoc($result))
		$columns[] = $row['COLUMN_NAME'];
	foreach ($colArray as $value)
		if (!in_array($value, $columns))
			DB_query("ALTER TABLE `clientkvstore` ADD `$value` LONGTEXT NOT NULL");

	// Now that we have all columns up and ready, we can dump in the content (could be combined into one sql statement if necessary).
	foreach($sqlArray as $sql)
		DB_query($sql);
}
?>
