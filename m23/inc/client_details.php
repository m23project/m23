<?
/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: Functions for drawing the buttons etc. in client_details.php.
$*/





/**
**name CLIENT_DETAILS_beginCategory($title, $section)
**description Starts a new named section for icons.
**parameter title: Title of the section.
**parameter anchor: A HTML anchor where the a special URL can jump to.
**/
function CLIENT_DETAILS_beginCategory($title, $anchor)
{
	echo('<br>
<a name="'.$anchor.'"></a>
<span class="title">'.$title.'</span>
<table align="center">
<td>
	<div class="subtable_shadow">
	<table align="center" class="subtable" cellspacing="10">
		<tr>
');
}





/**
**name CLIENT_DETAILS_endCategory()
**description Ends the previously opened icon section.
**/
function CLIENT_DETAILS_endCategory()
{
	echo('
		</tr>
	</table>
	</div>
</td>
</table>');
}





/**
**name CLIENT_DETAILS_addIcon($page, $urlParams, $icon, $title, $tooltip)
**description Adds an icon in a section.
**parameter page: The m23 page to link to.
**parameter urlParams: Additional parameters for the URL (e.g. "&action=deinstall").
**parameter icon: File name of the icon placed under /m23/data+scripts/gfx.
**parameter title: Title for the icon shown under it.
**parameter tooltip: The tooltip text that is shown when the mouse is over the icon.
**/
function CLIENT_DETAILS_addIcon($page, $urlParams, $icon, $title, $tooltip)
{
$title = wordwrap($title, 30, "<br>\n");

echo('<td align="center">
<a href="index.php?page='.$page.'&client='.$_GET['client'].'&id='.$_GET['id'].$urlParams.'" title="'.$tooltip.'">
<img border="0" src="../gfx/'.$icon.'"><br>
'.$title.'
</a>
</td>');
}





/**
**name CLIENT_DETAILS_addIcon2($url, $icon, $title, $tooltip)
**description Adds an icon in a section that can link to all URLs.
**parameter url: The URL to link to.
**parameter icon: File name of the icon placed under /m23/data+scripts/gfx.
**parameter title: Title for the icon shown under it.
**parameter tooltip: The tooltip text that is shown when the mouse is over the icon.
**/
function CLIENT_DETAILS_addIcon2($url, $icon, $title, $tooltip)
{
echo('<td align="center">
<a href="'.$url.'">
<img border="0" src="../gfx/'.$icon.'" title="'.$tooltip.'"><br>
'.$title.'
</a>
</td>');
}

?>