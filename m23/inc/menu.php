<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for menus
$*/





/**
**name MENU_showEntry(&$text,$link,$icon)
**description generates a menu entry, highlights it (if selected) and removes menu entry formatting tags from the menu entry label
**parameter text: label of the menu entry
**parameter link: link to the page
**parameter icon: directory and name of the icon to show in front of the entry
**/
function MENU_showEntry(&$text,$link,$icon,$extraIcon="")
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (strpos($link, "page=") !== false)
	{
		//get page from the URL
		$temp = explode("page=",$link);
		$page = $temp[1];
		$temp = explode("&",$page);
		$page = $temp[0];
	}
	else
		$page = '';
	
	if (strpos($link, "action=") !== false)
	{
		//get action from the URL	
		$temp = explode("action=",$link);
		$action = $temp[1];
		$temp = explode("&",$action);
		$action = $temp[0];
	}
	else
		$action = '';

	//Get the currently choosen page and action
	if (isset($_GET['page']))
		$currentPage = $_GET['page'];
	elseif (isset($_POST['page']))
		$currentPage = $_POST['page'];
	else
		$currentPage = '';

	if (isset($_GET['action']))
		$currentAction = $_GET['action'];
	elseif (isset($_POST['action']))
		$currentAction = $_POST['action'];
	else
		$currentAction = '';

	if (!empty($extraIcon))
		$extraIcon="<img src=\"$extraIcon\">";

	if ($currentPage == $page && $currentAction == $action && !empty($page))
		$menuText="<span class=\"menuhighlight\">$text</span>";
	else
		$menuText=$text;
	
	if (!empty($icon))
		$iconHtml="<a href=\"$link\"><img border=\"0\" src=\"$icon\"></a>";
	else
		$iconHtml="";
	
		
	echo ("<tr>
		<td>&nbsp;&nbsp;</td>
		<td valign=\"top\">$iconHtml</td>
		<td><a href=\"$link\">$menuText</a></td>
		<td>$extraIcon</td>
		</tr>");

	$text=str_replace("-<br>","",$text);
	$text=str_replace("<br>"," ",$text);
	$text=str_replace("- ","-",$text);
}





/**
**name MENU_startGroup($name)
**description shows the start of a menu group
**parameter name: name of the menu group
**/
function MENU_startGroup($name)
{
	 echo("<li>$name<br>
	 <table> 
	 ");
};





/**
**name MENU_endGroup()
**description shows the end of a menu group
**/
function MENU_endGroup()
{
	 echo("</table></li><br>
	 ");
};



?>