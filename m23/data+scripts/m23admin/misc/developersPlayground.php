<span class="title">Developer's playground</span>


<?PHP
//	include_once('/m23/inc/distr/debian/clientConfigCommon.php');
	include_once('/m23/inc/messageReceive.php');
	include_once('/m23/inc/distr/ubuntu/clientConfig.php');
	HTML_showFormHeader();
	HTML_showTableHeader();
	HTML_setPage("developersPlayground");
	
	include_once('/m23/inc/distr/debian/packages.php');
	
// 	include_once('/m23/inc/autoTest.php');
	include_once('/m23/inc/CFDiskIO.php');
	include_once('/m23/inc/CFDiskBasic.php');
	include_once('/m23/inc/CFDiskGUI.php');
	include_once('/m23/inc/CFirewall.php');


	$GPGSign = new CGPGSign(CGPGSign::MODE_LOAD);
// 	$GPGSign->setGPGID('9395A599');
	print($GPGSign->getKeyInfo());
	print(serialize($GPGSign->checkKey()));
	$GPGSign->exportPublicSignKey();

print("<pre>");

	print_r(MAIL_getGpgKeyList(true));
	print_r(MAIL_getGpgKeyList(false));
	print(serialize($GPGSign->gpgSignDetached('/tmp/infile.txt', '/tmp/infile.txt.asc')));
$GPGSign = new CGPGSign(CGPGSign::MODE_LOAD);
// 	MAIL_sendMail("hauke@pc-kiel.de", "hallo", "aes");
// 	print(getServerNetwork());
// 	CLIENT_executeOnClientOrIP('m23deb8amd64', 'm23install', 'echo lala > /tmp/lala; sleep 10');


print("</pre>\n");
	HTML_showTableEnd();
	HTML_showFormEnd();
?>