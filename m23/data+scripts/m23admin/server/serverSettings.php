<span class="title"> <?PHP echo($I18N_serverSettings);?> </span><br><br>

<?php
	HTML_showFormHeader();
	HTML_setPage('serverSettings');
?>

<a name="system"></a>
<span class="titlesmal"><?PHP echo($I18N_system);?></span>
<table align="center">
<td>
	<div class="subtable_shadow">
	<table align="center" class="subtable" cellspacing="10">
		<tr>
			<td align="center">
				<a href="index.php?page=update">
					<img src="/gfx/update.png" border="0"><br>
					<?PHP echo($I18N_update);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=htaccess">
					<img src="/gfx/admin.png" border="0"><br>
					<?PHP echo($I18N_manage_admins);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=themeChoice">
					<img src="/gfx/theme.png" border="0"><br>
					<?PHP echo($I18N_themeChoice);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=serverStatus">
					<img src="/gfx/serverStatus.png" border="0"><br>
					<?PHP echo($I18N_serverStatus);?>
				</a>
			</td>
		</tr>
	</table>
	</div>
</td>
</table>
<br>


<a name="components"></a>
<span class="titlesmal"><?PHP echo($I18N_components);?></span>
<table align="center">
<td>
	<div class="subtable_shadow">
	<table align="center" class="subtable" cellspacing="10">
		<tr>
			<td align="center">
				<a href="index.php?page=manageImageFiles">
					<img src="/gfx/imaging.png" border="0"><br>
					<?PHP echo($I18N_manageImageFiles);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=ipManagement">
					<img src="/gfx/ipmanagement.png" border="0"><br>
					<?PHP echo($I18N_ipManagement);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=ldapSettings">
					<img src="/gfx/settings.png" border="0"><br>
					LDAP
				</a>
			</td>
			<?php
				if (function_exists("m23SHARED_init") && !isset($_SESSION['m23Shared']))
				echo('
				<td align="center">
					<a href="index.php?page=m23sharedAdmin">
						<img src="/gfx/m23-enterprise-mini.png" border="0"><br>
						m23@web
					</a>
				</td>');
			?>
		<tr>
		</tr>
			<td align="center">
				<a href="index.php?page=manageGPGKeys">
					<img src="/gfx/gpg.png" border="0"><br>
					<?PHP echo($I18N_manageGPGKeys);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=serverBackup">
					<img src="/gfx/backup.png" border="0"><br>
					<?PHP echo($I18N_serverBackup);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=serverBackupList">
					<img src="/gfx/backupList.png" border="0"><br>
					<?PHP echo($I18N_backupList);?>
				</a>
			</td>
		<tr>
		</tr>
			<td align="center">
				<a href="index.php?page=downloadVBoxAddons">
					<img src="/gfx/vbox-additions-download.png" border="0"><br>
					<?PHP echo($I18N_downloadVBoxAddons);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=cloudStack">
					<img src="/gfx/cloud.png" border="0"><br>
					<?= $I18N_cloudFunctionsCS?>
				</a>
			</td>
		</tr>
	</table>
	</div>
</td>
</table>
<br>


<?php

if (HTML_imgSwitch('SW_img', '/gfx/SSLCertificateCheckDisabled-32.png', '/gfx/SSLCertificateCheckEnabled-32.png', $I18N_SSLCertCheckDisabled, $I18N_SSLCertCheckEnabled, '<br>', !SERVER_isSSLCertCheckDisabled(), $SSLCertificateState))
		SERVER_setSSLCertCheckDisabled(!$SSLCertificateState);

?>

<a name="serverHacks"></a>
<span class="titlesmal"><?PHP echo($I18N_serverHacks);?></span>
<table align="center">
<td>
	<div class="subtable_shadow">
	<table align="center" class="subtable" cellspacing="10">
		<tr>
<!--			<td align="center">
				<a href="index.php?page=capture#serverHacks">
					<img src="/gfx/keyboard.png" border="0">
					<img src="<?PHP echo(CAPTURE_captureImg());?>" border="0"><br>
					<?PHP echo($I18N_acquireFormularData);?>
				</a>
			</td>-->

			<td align="center">
				<a href="/m23admin/phpMyAdmin/" target="_blank">
					<img src="/gfx/phpMyAdmin.png" border="0"><br>
					phpMyAdmin
				</a>
			</td>
			<td align="center">
				<?= SW_img ?>
			</td>
			<td align="center">
				<a href="index.php?page=server_daemonsAndPrograms">
					<img src="/gfx/internals.png" border="0"><br>
					<?PHP echo($I18N_daemons_and_programs);?>
				</a>
			</td>
		</tr>
	</table>
	</div>
</td>
</table>



<a name="extras"></a>
<span class="titlesmal"><?PHP echo($I18N_extras);?></span>
<table align="center">
<td>
	<div class="subtable_shadow">
	<table align="center" class="subtable" cellspacing="10">
		<tr>
			<td align="center">
				<a href="index.php?page=calculator">
					<img src="/gfx/calc.png" border="0">
					<br>
					<?=$I18N_calculator?>
				</a>
			</td>
			<?php
				if ("de" == $GLOBALS["m23_language"])
				echo('
				<td align="center">
					<a href="index.php?page=bafh">
						<img src="/gfx/rabe.png" border="0"><br>
						'.$I18N_BAfHDaylyExcuse.'
					</a>
				</td>');
			?>
		</tr>
	</table>
	</div>
</td>
</table>

<br>

<?PHP
	HTML_showFormEnd();
	help_showhelp('serverSettings');
?>
