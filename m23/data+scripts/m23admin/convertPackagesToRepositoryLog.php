<?php

/*
	Description: Shows the contents of the convert packages to repository log file.
*/

include_once('/m23/inc/CMessageManager.php');
include_once('/m23/inc/CChecks.php');
include_once('/m23/inc/CPoolLister.php');
include_once('/m23/inc/CPool.php');
include('/m23/inc/helper.php');

$poolO = new CPool($_GET['pool']);

echo($poolO->getConvertPackagesToRepositoryLogNewLines());

?>