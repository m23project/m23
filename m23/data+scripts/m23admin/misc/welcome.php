<?php
	//Get the help text of the welcome message
	$m23_welcomeMessage = "<br><br>".HELP_getHelp("welcome");

	//Refresh time in minutes for the blogs
	$refreshTime = 120;

	$blogWidth = 250;

	//The blog HTML text
	$blogHTML = "";
	//Amount of fetched blogs
	$blogAmount = 0;




HTML_showFormHeader();


	//Show or not show the blog with community news
	if (MSG_DeActivateBlogDialog("community","communitytable","m23 community",$blogWidth,$dialogCode))
	{
		$blogHTML .= '
		<td valign="top">'.$dialogCode.
			MSG_getRSSFeed('http://m23.sourceforge.net/PostNuke-0.750/html/rss/feed-'.$GLOBALS['m23_language'].'.php', "communitytable", $blogWidth, "communityRSS.xml",$refreshTime).'
		</td>';
	}
	else
		$blogHTML .= '<td valign="top">'.$dialogCode.'</td>';




	//Show or not show the blog with the m23 updates
	if (MSG_DeActivateBlogDialog("update","updatetable",$I18N_newm23Updates,$blogWidth,$dialogCode))
	{
		$blogHTML .= '
		<td valign="top">'.$dialogCode.
			MSG_getm23UpdateFeed($blogWidth, $refreshTime).'
		</td>';
	}
	else
		$blogHTML .= '<td valign="top">'.$dialogCode.'</td>';



	//Show or not show the blog with development news
	if (MSG_DeActivateBlogDialog("development","developmentBlogtable",$I18N_developmentBlog,$blogWidth,$dialogCode))
	{
		$blogHTML .= '
		<td valign="top">'.$dialogCode.
			MSG_getm23DevelopmentBlog($blogWidth, $refreshTime).'
		</td>';
	}
	else
		$blogHTML .= '<td valign="top">'.$dialogCode.'</td>';



	//Show or not show the blog with business news
	if (MSG_DeActivateBlogDialog("business","businessBlogtable","m23 business",$blogWidth,$dialogCode))
	{
		$blogHTML .= '
		<td valign="top">'.$dialogCode.
			MSG_getRSSFeed('http://www.goos-habermann.de/feed.php', "businessBlogtable", $blogWidth, "businessRSS.xml",$refreshTime).'
		</td>';
	}
	else
		$blogHTML .= '<td valign="top">'.$dialogCode.'</td>';


	//Replace the keyword "M23STATUSBLOG" in the help text with the blog HTML
	$m23_welcomeMessage = str_replace('M23STATUSBLOG',"<table>$blogHTML</table>",$m23_welcomeMessage);

	//Finally show the welcome message
	echo($m23_welcomeMessage);

HTML_showFormEnd();
?>