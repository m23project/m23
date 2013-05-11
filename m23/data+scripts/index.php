<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN
		"http://www.w3.org/TR/html4/loose.dtd"">
<html>
<head>
<?PHP
	$title="Welcome to your m23 server! Willkommen auf Ihrem m23 Server!";
?>
  <title><?PHP echo $title?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
  <meta name="GENERATOR" content="Quanta Plus">

</head>
<body bgcolor="#FFFFFF">

<meta http-equiv="refresh" content="1; URL=m23admin/index.php">
<?PHP
 echo("
		<center>
			<img src=\"gfx/m23biglogo.png\"><br>
			<h2>$title</h2>
			<A HREF=\"m23admin/index.php\"><img src=\"gfx/m23-start.png\" alt=\"start\"></A>
		</center>
	 ");


if (exec("grep god: /m23/etc/.htpasswd | wc -l") != "0")
	{
	 echo("
<table bgcolor=\"#E35C13\">
	<tr>
		<th>English</th>
		<th>Deutsch</th>
	</tr>
    <tr>
      <td valign=\"top\">
		If you log in for the first time, please use:
		<ul>
			<li><b>Username: god</b></li>
			<li><b>Password: m23</b></li>
		</ul>
		<b>You should add a new aministrator and delete &quot;god&quot; immediately! This is for your own security!</b><BR>
	  </td>

	  <td>
		Sollten Sie sich zum ersten Mal einloggen, so geben Sie bitte ein:
		<ul>
			<li><b>Benutzer: god</b></li>
			<li><b>Paßwort: m23</b></li>
		</ul>

		<b>Sie sollten umgehend einen neuen Benutzer anlegen und den Benutzer &quot;god&quot; löschen!</b><br>
	  </td>
    </tr>
</table>

	");
	};
?>

</body>
</html>
