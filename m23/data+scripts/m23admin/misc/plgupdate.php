<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN
		"http://www.w3.org/TR/html4/loose.dtd"">
<html>
<head>
  <title>Plugin Update</title>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <meta http-equiv="expires" content="0">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>

<span class="title"> Plugin-Update </span><br><br>

</H2>

<?PHP
 include("/m23/inc/db.php");
 include("/m23/inc/client.php");
 include("/m23/inc/help.php");
 include("/m23/inc/plugin.php");

 dbConnect();

 echo("<h3>Bitte schließen Sie dieses Fenster nicht, bis \"Plugin-Update komplett\" erscheint.
 Der Download besonders größerer Plugins kann etwas Zeit in Anspruch nehmen.</h3>");


 PLG_realUpdate($_GET['pluginName'],$_GET['pluginUrl']);
?>

</body>
</html>


