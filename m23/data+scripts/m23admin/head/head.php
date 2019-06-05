<?php
	include("/m23/inc/version.php");

	//Check, if this is the development version and adjust the coloring of the header
	if (false !== strstr($m23_codename, '-devel'))
		$tableType = 'errortable';
	else
		$tableType = 'helptable';
	
	
?>

<table cellspacing="0" cellpadding="3" width="100%" border="0">
	<tr>
		<td width="100" align="center">
			<a HREF="http://m23.goos-habermann.de" target="_blank">
				<img src="head/m23.png" border="0">
				<?
					if (isset($_SESSION['m23Shared']) && $_SESSION['m23Shared']) echo("<br>m23@web");
				?>
			</a>
		</td>

		<td align="center">
			<table class="<?= $tableType ?>">
				<tr>
				<?php
					if ('de' == $GLOBALS["m23_language"])
						$questionnaireHTML = '&raquo;&nbsp;<a href="https://goos-habermann.de/index.php?s=m23fragebogen">'.$I18N_m23questionaire.'</a>';
					else
						$questionnaireHTML = '';
				
					echo ("
				<tr>
					<td colspan=2>
						<nobr><b>$I18N_yourIP:</b> $_SERVER[REMOTE_ADDR] <b>$I18N_serverNameOrIP:</b> $_SERVER[SERVER_NAME] (".getServerIP().") <b>$I18N_m23VersionAndPatchlevel:</b> $m23_version $m23_codename ($m23_patchLevel) <a href=\"index.php?page=serverStatus\">$I18N_serverStatus</a></nobr>
					</td>
				</tr>
				<tr><td colspan=2><hr></td></tr>
				<tr>
					<td align=\"left\">
						&raquo;&nbsp;<a href=\"https://m23.sourceforge.io\" target=\"_blank\">$I18N_m23ProjectPage</a>&nbsp;&nbsp;
						&raquo;&nbsp;<a href=\"https://m23.sourceforge.io/phpBB2/\" target=\"_blank\">$I18N_m23Forum</a>&nbsp;&nbsp;
						&raquo;&nbsp;<a href=\"https://www.goos-habermann.de\" target=\"_blank\">$I18N_commercialSupport</a>&nbsp;&nbsp;
						&raquo;&nbsp;<a href=\"https://www.goos-habermann.de/index.php?s=SchulungBeratung\" target=\"_blank\">$I18N_m23Training</a>&nbsp;&nbsp;
						$questionnaireHTML<br>
					</td>
					<td align=\"right\">
						$_SERVER[PHP_AUTH_USER] <a href=\"?logout=1\">($I18N_logout)</a>
					</td>
				</tr>
				");
				?>
				
			</table>
		</td>

		<td align="right">
<!--m23customPatchBegin type=change id=tuxLogo-->
			<img src="/gfx/sweet-tux.png">
<!--m23customPatchEnd id=tuxLogo-->
		</td>
	</tr>
</table>