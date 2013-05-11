<?
include_once('/m23/inc/help.php');
include_once('/m23/inc/capture.php');
include_once('/m23/inc/html.php');

if (isset($_GET['lang']{1}))
{
	$lang = $_GET['lang'];
	$GLOBALS['m23_language'] = $lang;
}
else
	$lang = $GLOBALS['m23_language'];


//Check if it is the standalone help viewer
if (!isset($_GET['page']{1}))
	{
		include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
		HTML_showPagePrintButton();

		$topic = basename($_GET['helpPage']);

		//Get the complete rendered help text
		$helpText = HELP_getHelp($topic,$lang);

		//Check if there are symbols that need to get replaced
		if ($topic === "m23SharedBootingYourClient")
		{
			$helpText = str_replace("CLIENTNAME", $_GET['CLIENTNAME'], $helpText);
		}

		//Get the heading
		preg_match('/<span class="subhighlight">(.+)/i',$helpText, $tmp);
		$heading = $tmp[1];

		echo('
			<html>
				<head>
					<title>m23helpViewer - '.$heading.'</title>
					<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
					<meta http-equiv="expires" content="0">
					<link rel="stylesheet" type="text/css" href="/m23admin/css/printable.css">
				</head>
				<body>'.$helpText.'</body>
			</html>');
	}
else
	help_showhelp($_GET['helpPage']);

?>