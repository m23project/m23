<?PHP
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: routines storing and loading POST and GET values in forms
$*/


/**
**name CAPTURE_getKeys($var)
**description gets all POST or GET variables and returnes all keys and values as an assiciative array. Values of buttons are filtered out.
**parameter var: set to $_POST or $_GET
**parameter allowBut: set to true, if button should be captured too
**/
function CAPTURE_getKeys($var,$allowBut=false)
{
	$keys=array_keys($var);
	$values=array_values($var);
	
	if ($allowBut)
		$filterOut="x87fncwer6x3ssssssfznzf8asdxdsuc";
	else
		$filterOut="BUT_";
	
	if (count($keys)>0)
		{
			for ($i = 0; $i < count($keys); $i++)
				{
					
					if ((strpos ($keys[$i],$filterOut) === false) && $keys[$i]!="page")
						$out[$keys[$i]]=$values[$i];
				};
			return(implodeAssoc("???",$out));
		};
	return("");
};





/**
**name CAPTURE_captureAll($step=0,$comment="",$allowBut=false)
**description stores all POST and GET variables to the DB
**parameter step: number of the step, this is used, if there are "subpages" of a page e.g. clientcdistr.php
**parameter comment: comment to add to the entry
**parameter allowBut: set to true, if button should be captured too
**/
function CAPTURE_captureAll($step=0,$comment="",$allowBut=false)
{
	if (!CAPTURE_isActive())
		return;

	CHECK_FW(CC_capturestep, $step, CC_nochecknow, $comment);

	$getStr=CAPTURE_getKeys($_GET,$allowBut);
	$postStr=CAPTURE_getKeys($_POST,$allowBut);

	$page = $_GET['page'];
	if (empty($page))
		$page = $_POST['page'];

	CHECK_FW(CC_page, $page);

	$sql="DELETE FROM `formSave` WHERE name='$page' AND step='$step'";
	db_query($sql); //FW ok
	
	$sql="INSERT INTO `formSave` ( `name` , `get` , `post` , `step`, `comment` ) VALUES ('$page', '$getStr', '$postStr', '$step','$comment')";
	db_query($sql); //FW ok
};





/**
**name CAPTURE_load()
**description loads all POST and GET variables for a special page from the DB to emulate the user input while makeing a screenshot
**parameter GET[page]: has to be set to the name of the page
**parameter GET[captureLoad]: has to be set to "1" to activate loading of the saved values
**/
function CAPTURE_load()
{
	if ($_GET[captureLoad]!=1)
		return;

	$page = $_GET[page];
	if (empty($page))
		$page = $_POST[page];
		
	$step = $_GET[CAPstep];
	if (empty($step))
		$step=0;

	CHECK_FW(CC_capturestep, $step, CC_page, $page);

	$sql = "SELECT * FROM `formSave` WHERE name='$page' AND step='$step'";

	$res = db_query($sql); //FW ok

	$line=mysql_fetch_array($res);

	$_GET=array_merge($_GET,explodeAssoc("???",$line[get]));
	$_GET[page]=$page;
	$_GET[captureLoad]=1;
	$_POST[page]=$page;
	
	$_POST=explodeAssoc("???",$line[post]);
};





/**
**name CAPTURE_deActivate($activate)
**description (de)activates capturing the POST, GET values
**parameter activate: true, if you want to activate capturing. otherwise false
**/
function CAPTURE_deActivate($activate)
{
	if ($activate)
		touch ("/m23/tmp/captureSave");
	else
		unlink("/m23/tmp/captureSave");
};





/**
**name CAPTURE_isActive()
**description returnes true, if capturing of POST, GET values is activated. otherwise false
**/
function CAPTURE_isActive()
{
	return(file_exists("/m23/tmp/captureSave"));
};





/**
**name CAPTURE_captureImg()
**description returnes the status image URL of the current capture state
**/
function CAPTURE_captureImg()
{
	if (CAPTURE_isActive())
		return("/gfx/status/red.png");
	else
		return("/gfx/status/white.png");
};





/**
**name CAPTURE_toggle()
**description toggles the current capture state
**/
function CAPTURE_toggle()
{
	CAPTURE_deActivate(!CAPTURE_isActive());
}





/**
**name CAPTURE_showMessageBox()
**description shows a message box, if capturing is enabled
**/
function CAPTURE_showMessageBox()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");

	if (CAPTURE_isActive())
		{
			$message="
				<a href=\"index.php?page=capture\">
					<center>
						<img src=\"/gfx/keyboard.png\"><br>
						$I18N_deactivate
					</center>
				</a>
				";
			//MENU_showEntry($I18N_formularDataGetsAcquire,"index.php?page=capture","/gfx/settings_mini.png");
			MSG_showMessageBox($message,"errortable",$I18N_formularDataGetsAcquire,120);
		};
};





/**
**name CAPTURE_showEntries()
**description shows a table of the captured pages with the possibility to delete entries.
**/
function CAPTURE_showEntries()
{
	include("/m23/inc/i18n/".$GLOBALS["m23_language"]."/m23base.php");
	
	$sql="SELECT * FROM `formSave` ORDER BY name, step";
	
	$res = db_query($sql); //FW ok
	
	HTML_showTableHeader();
	
	echo("
			<tr>
				<td><span class=\"subhighlight\">$I18N_page</span></td>
				<td><span class=\"subhighlight\">$I18N_subPage</span></td>
				<td><span class=\"subhighlight\">$I18N_comment</span></td>
				<td><span class=\"subhighlight\">$I18N_action</span></td>
			</tr>
		");


	
	while ($line=mysql_fetch_array($res))
		{
			//<a href=\"index.php?page=capture&showEntries=yes&action=edit&id=$line[id]\">$I18N_edit</a>
			echo("<tr>
				<td>$line[name]</td>
				<td>$line[step]</td>
				<td>$line[comment]</td>
				<td>
					<a href=\"index.php?page=capture&showEntries=yes&action=delete&id=$line[id]\">$I18N_delete</a>
				</td>
			</tr>
			");
		};

	HTML_showTableEnd();
	echo("<br>");
};





/**
**name CAPTURE_deleteById($id)
**description deletes a capture entry.
**parameter id: the id of the capture entry to delete
**/
function CAPTURE_deleteById($id)
{
	CHECK_FW(CC_formsaveid, $id);
	$sql="DELETE FROM `formSave` WHERE id=$id";
	db_query($sql); //FW ok
};





/**
**name CAPTURE_showMarker()
**description Shows a new column with a marker that is used for autodetecting the screenshot size by khtml2png.
**/
function CAPTURE_showMarker()
{
	if ($_GET[captureLoad]==1)
		echo("<TD valign=\"bottom\" align=\"right\"><A id=\"ID_marker\"></TD>");
};





/**
**name CAPTURE_showTableWith()
**description Adds a width element if in captureLoad mode.
**/
function CAPTURE_showTableWith()
{
	if ($_GET[captureLoad]==1)
		echo("width=\"700\"");
};
?>