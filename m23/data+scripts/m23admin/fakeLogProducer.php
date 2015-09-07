<?php
	session_start();
	
	if (!isset($_SESSION['nr']))
		$_SESSION['nr'] = 0;

	for ($i = 0; $i < rand(1,5); $i++)
	{
		$temp = file('/matrix23/arbeit/wwwTests/jLog/logdata.log');
		$_SESSION['nr'] %= count($temp);
		echo($temp[$_SESSION['nr']]);
		$_SESSION['nr'] ++;
	}
?>