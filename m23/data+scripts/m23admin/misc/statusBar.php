<?PHP
	include('/m23/inc/checks.php');
	include('/m23/inc/db.php');
	include('/m23/inc/html.php');
	include_once('/m23/inc/i18n.php');
	include_once('/m23/inc/capture.php');
	include_once('/m23/inc/remotevar.php');

	if (file_exists('/m23/inc/m23shared/m23shared.php')) include_once('/m23/inc/m23shared/m23shared.php');

	session_start();
	if (!isset($_SERVER['PHP_AUTH_USER']))
		$_SERVER['PHP_AUTH_USER'] = $_GET['user'];	

	dbConnect();

	HTML_showStatusBarHTML($_GET['id']);
?>