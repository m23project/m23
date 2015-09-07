<?php

/*
	Description: Shows the size of a given pool.
*/

include_once('/m23/inc/CMessageManager.php');
include_once('/m23/inc/CChecks.php');
include_once('/m23/inc/checks.php');
include_once('/m23/inc/CPoolLister.php');
include_once('/m23/inc/CPool.php');
include('/m23/inc/helper.php');
include('/m23/inc/server.php');
include('/m23/inc/html.php');

session_start();

$sessionName = urlencode($_GET['pool']);

if (!isset($_SESSION['pool'][$sessionName]))
	$_SESSION['pool'][$sessionName] = new CPool($_GET['pool']);


switch($_GET['cmd'])
{
	case 'getDownloadLogNewLines':
		echo($_SESSION['pool'][$sessionName]->getDownloadLogNewLines());
		break;

	case 'getConvertPackagesToRepositoryLogNewLines':
		echo($_SESSION['pool'][$sessionName]->getConvertPackagesToRepositoryLogNewLines());
		break;

	case 'getShowDownloadStatusRefreshClicked':
		echo($_SESSION['pool'][$sessionName]->isDownloadRunning() ? '' : H_AJAXAUTOSUBMIT_VALUE);
		break;

	case 'getconvertPackagesToRepositoryStatusRefreshClicked':
		echo($_SESSION['pool'][$sessionName]->isConvertPackagesToRepositoryRunning() ? '' : H_AJAXAUTOSUBMIT_VALUE);
		break;

	default:
	case 'getPoolSize':
		echo($_SESSION['pool'][$sessionName]->getPoolSize());
		break;
}

?>