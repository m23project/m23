<span class="title"> <?PHP echo($I18N_packageBuilder);?> </span><br><br>
<form enctype="multipart/form-data" method="post">
<?PHP
	HTML_setPage("packageBuilder");
	PKGBUILDER_showDialog();

	HELP_showHelp("packageBuilder");
?>

</form>