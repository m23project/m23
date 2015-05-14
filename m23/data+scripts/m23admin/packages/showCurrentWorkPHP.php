<?
	if (isset($_GET['m23clientID']))
		$id = $_GET['m23clientID'];
	else
		$id = $_POST['m23clientID'];

	CHECK_FW(CC_id, $id);

	$clientO = new CClient($id);
	
	if (isset($_GET['script']))
		$otherScript = $_GET['script'];
	else
		$otherScript = '';

	HTML_showTitle($I18N_currentWorkPHP.': '.$clientO->getClientName());

	HTML_showFormHeader();
	HTML_setPage('showCurrentWorkPHP');

	HTML_submitDefine('BUT_refresh', $I18N_refresh);
	HTML_sourceViewer('SRC_currentWorkPHP', $clientO->getClientCurrentWorkPHP($otherScript), 'bash');
	HTML_logArea('TA_wgetCode', 100, 1, 'wget "'.$clientO->getClientWorkPHPURL().'" -O /tmp/work.sh; less /tmp/work.sh');


	HTML_showTableHeader();
	echo('
	<tr>
		<td><span class="titlesmal">'.$I18N_wgetWorkPHPGettingCode.'</span></td>
		<td>'.TA_wgetCode.'
	</tr>
	<tr>
		<td colspan="2"><span class="titlesmal">'.$I18N_currentWorkPHPContents.'</span></td>
	</tr>
	<tr>
		<td colspan="2" bgcolor="#f8f8f8" style="padding:10px">'.SRC_currentWorkPHP.HTML_hiddenVar('m23clientID', $id).'</td>
	</tr>');
	HTML_showTableEnd();
	echo(BUT_refresh);

	HTML_showFormEnd();
	echo($clientO->getBackToDetailsLink('criticalStatus'));
	help_showhelp('showCurrentWorkPHP');
?>
