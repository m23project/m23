<span class="title">Developer's playground</span>


<?PHP
//	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/messageReceive.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');
	include_once('/m23/inc/autoTest.php');
	HTML_showFormHeader();
	HTML_showTableHeader();
	HTML_setPage("developersPlayground");
	
	include_once('/m23/inc/distr/debian/packages.php');
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");


$in = '12345678';
$_POST['data'] = base64_encode($in);
$_POST['md5'] = md5($in);
$_POST['imagename'] = 'test';

MSR_m23ImagerMBR();


// print("<pre>");
// print("</pre>\n");
	HTML_showTableEnd();
	HTML_showFormEnd();
?>