<?PHP


function listRoms()
{
	$dir = opendir("/m23/bin/roms");
	
	while ($filename = readdir ($dir))
	{
		if (strstr($filename,".lzdsk"))
		{
			$name_ext=explode(".lzdsk",$filename);
			echo("<option value=\"$filename\">".$name_ext[0]."</option>\n");
		}
	};
};

function writeRom($rom)
{
	$cmd="dd if=/m23/bin/roms/$rom of=/dev/fd0 2> /m23/tmp/diskwrite.err";

	exec($cmd,$arr,$errorcode);   //passthru() verwenden
	return $errorcode;                 //R�ckgabecode von dd zur�ckgeben
};


function showError($errorcode)         //$errorcode muss jetzt an die funktion �bergeben werden
{
	if($errorcode > 0)                               //Hier muss nur noch der Fehlercode �berpr�ft werden
	{
		if (filesize("/m23/tmp/diskwrite.err") > 0)
		{
			$file=fopen("/m23/tmp/diskwrite.err","r");
			$message=fread ($file,10000);
			fclose($file);
		};

		MSG_showError($message);

		unlink("/m23/tmp/diskwrite.err");
	};
};

	if (!empty($_GET['BUT_write']))
		$status = writeRom($_GET['SEL_romType']);         // R�ckgabewert zuweisen
?>



<span class="title"> <?PHP echo($I18N_make_bootdisk);?> </span><br><br>

<?PHP
showError($status);   // R�ckgabestatus an die Funktion �bergeben
?>

<form method="GET">
<CENTER>
<?PHP
	HTML_setPage('makeBootDisk');
	echo($I18N_type_of_network_card);
?>
   <select name="SEL_romType" size="1">
   <?PHP listRoms();?>
   </select><BR><BR>

<input type="submit" name="BUT_write" value="<?PHP echo($I18N_write);?>">
</CENTER>
</from>
<BR><BR>
<?PHP HELP_showHelp("makeBootDisk");?>