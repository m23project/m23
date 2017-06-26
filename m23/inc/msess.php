<?php
function MSESS_load()
{
	$_SESSION = unserialize(urldecode(isset($_POST['MSESS_variables']) ? $_POST['MSESS_variables'] : $_POST['MSESS_variables']));
}


function MSESS_save()
{
	echo ("<input type=\"hidden\" name=\"MSESS_variables\" value=\"".urlencode(serialize($_SESSION))."\">");
}

?>