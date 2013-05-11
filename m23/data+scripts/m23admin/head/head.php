<?php
 include("/m23/inc/version.php");
?>

<table cellspacing="0" cellpadding="3" width="100%" border="0">
	<tr>
		<td width="100" align="center">
			<a HREF="http://m23.goos-habermann.de" target="_blank">
				<img src="head/m23.png" border="0">
				<?
					if ($_SESSION['m23Shared'])
						echo("<br>m23@web");
				?>
			</a>
		</td>

		<td align="center">
			<table class="helptable">
				<tr>
				<?php 
					echo ("
				<tr>
					<td colspan=2>
						<nobr><b>$I18N_yourIP:</b> $_SERVER[REMOTE_ADDR] <b>$I18N_serverNameOrIP:</b> $_SERVER[SERVER_NAME] <b>$I18N_m23VersionAndPatchlevel:</b> $m23_version $m23_codename ($m23_patchLevel) <a href=\"index.php?page=serverStatus\">$I18N_serverStatus</a></nobr>
					</td>
				</tr>
				<tr><td colspan=2><hr></td></tr>
				<tr>
					<td align=\"left\">
						&raquo;&nbsp;<a href=\"http://m23.sf.net\" target=\"_blank\">$I18N_m23ProjectPage</a>&nbsp;&nbsp;
						&raquo;&nbsp;<a href=\"http://m23.sourceforge.net/faq/frageFAQ.htm\" target=\"_blank\">$I18N_m23Forum</a>&nbsp;&nbsp;
						&raquo;&nbsp;<a href=\"http://www.goos-habermann.de\" target=\"_blank\">$I18N_commercialSupport</a>&nbsp;&nbsp;
						&raquo;&nbsp;<a href=\"http://www.goos-habermann.de/index.php?s=SchulungBeratung\" target=\"_blank\">$I18N_m23Training</a>
						&raquo;&nbsp;<a href=\"".HTML_getQuestionnaireURL()."\">$I18N_m23questionaire</a><br>
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
<!-- 			<img src="head/tux.png"> -->
<!-- 				<a href="http://tassiedevil.com.au/" target="_blank"><img src="/gfx/tuz.png"></a> -->
			<img src="/gfx/sweet-tux.png">
		</td>
	</tr>
</table>