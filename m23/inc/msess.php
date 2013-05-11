<?php
function MSESS_load()
{
	$_SESSION = unserialize(urldecode($_POST['MSESS_variables']);
};


function MSESS_save()
{
	echo ("<input type=\"hidden\" name=\"MSESS_variables\" value=\"".urlencode(serialize($_SESSION))."\">");
}

?>