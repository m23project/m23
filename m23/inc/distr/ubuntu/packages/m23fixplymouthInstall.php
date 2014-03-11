<?PHP
/*
Description: Behebt den Return-X-Absturz-Bug
Priority:30
*/


function run($id)
{
	foreach (array('/bin/plymouth', '/bin/plymouth-upstart-bridge') as $file)
	echo("
		dpkg-divert --local --rename --add $file
		ln -s /bin/true $file
	");
	sendClientStatus($id,"done");

	executeNextWork();
}
?>
