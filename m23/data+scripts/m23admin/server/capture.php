<span class="title"> <?PHP echo($I18N_acquireFormularData);?> </span><br><br>

<?PHP
	HTML_showFormHeader();
	HTML_setPage('capture');

	if ($_GET['toggleCapture']=="yes")
		CAPTURE_toggle();

	if ($_GET['showEntries']=="yes")
	{
		switch ($_GET[action])
			{
				case "delete": CAPTURE_deleteById($_GET['id']); break;
			};
		CAPTURE_showEntries();
	};
?>

<table align="center">
<td>
	<div class="subtable_shadow">
	<table align="center" class="subtable" cellspacing="10">
		<tr>
			<td align="center">
				<a href="index.php?page=capture&toggleCapture=yes&rand=<?PHP echo(rand(0,9999)) /*this is needed to make it changable with each click on the icon/url. konqueror does an optimisation, that doesn't load the same url twice in succession. adding a random value fixes this*/;?>">
					<img src="/gfx/keyboard.png">
					<img src="<?PHP echo(CAPTURE_captureImg());?>"><br>
					<?PHP echo($I18N_toggleCapturing);?>
				</a>
			</td>
			<td align="center">
				<a href="index.php?page=capture&showEntries=yes">
					<img src="/gfx/keyboard-search.png"><br>
					<?PHP echo($I18N_viewAcquiredformularData);?>
				</a>
			</td>
			
		</tr>
	</table>
	</div>
</td>
</table>
<br>

<?PHP
	HTML_showFormEnd();
	help_showhelp("capture");
?>
