<?PHP

function for_number($number, $signs)
{ 
	if (($_SESSION["to_show"] === "0" && $_SESSION["last_button"] == "no_button") || ($_SESSION["last_button"] == "="))
		{$_SESSION["to_show"] = "$number";
		$_SESSION["to_compute"] = "$number";}
	elseif (in_array($_SESSION["last_button"], $signs))
		{$_SESSION["to_show"] = "$number";
		$_SESSION["to_compute"] .= "$number";}
	else
		{$_SESSION["to_show"] .= "$number";
		$_SESSION["to_compute"] .= "$number";};
	$_SESSION["last_button"] = $number;	
};

function for_sign($sign, $signs)
{
	if (in_array($_SESSION["last_button"], $signs))
		{$_SESSION["to_compute"][strlen($_SESSION["to_compute"])-1] = "$sign";}
	elseif ($_SESSION["last_button"] == "no_button")
		{$_SESSION["to_compute"] = $_SESSION["to_show"].$sign ;}
	else 
		{$_SESSION["to_compute"] .= "$sign";};
	$_SESSION["last_button"] = $sign;
};

function for_equals($eq)
{	
	$_SESSION["to_show"] = eval("return($eq);");
	$_SESSION["last_button"] = "=";
	$_SESSION["to_compute"] = $_SESSION["to_show"]; 
};

function for_dec($dec, $signs)
{
	if (in_array($_SESSION["last_button"], $signs))
		{$_SESSION["to_compute"] .= "0".$dec;
		 $_SESSION["to_show"] ="0".$dec;}	
	else 
		{$_SESSION["to_compute"] .= $dec;
		$_SESSION["to_show"] .= $dec;};
	$_SESSION["last_button"] = $dec;
};

function HELPER_showCalculator()

{define ("stylish", "style=\"font-size: large ; font-weight: bold; height: 70px; width: 70px\"");
define ("stylishx2", "style=\"font-size: large ; font-weight: bold; height: 70px; width: 160px\"");

if (!isset($_SESSION["to_show"]))
	$_SESSION["to_show"] = "0";
if (!isset($_SESSION["last_button"]))
	$_SESSION["last_button"] = "no_button";
if (!isset($_SESSION["to_compute"]))
	$_SESSION["to_compute"] = "0";

$signs = array("+", "-", "*", "/");

if (HTML_submit("nine","9", stylish))
	for_number("9", $signs);
if (HTML_submit("eight","8", stylish))
	for_number("8", $signs);
if (HTML_submit("seven","7", stylish))
	for_number("7", $signs);
if (HTML_submit("minus","-", stylish))
	for_sign("-", $signs);
if (HTML_submit("six","6", stylish))
	for_number("6", $signs);
if (HTML_submit("five","5", stylish))
	for_number("5", $signs);
if (HTML_submit("four","4", stylish))
	for_number("4", $signs);
if (HTML_submit("times","x", stylish))
	for_sign("*", $signs);
if (HTML_submit("three","3", stylish))
	for_number("3", $signs);
if (HTML_submit("two","2", stylish))
	for_number("2", $signs);
if (HTML_submit("one","1", stylish))
	for_number("1", $signs);
if (HTML_submit("divide",":", stylish))
	for_sign("/", $signs);
if (HTML_submit("zero","0", stylish))
	for_number("0", $signs);
if (HTML_submit("dec",",", stylish))
	for_dec(".", $signs);
if (HTML_submit("plus","+", stylishx2))
	for_sign("+", $signs);
if (HTML_submit("reset","RESET", stylishx2))
	{$_SESSION["to_show"] = "0";
	$_SESSION["to_compute"] = "0";
	$_SESSION["last_button"] = "no_button";};
if (HTML_submit("equals","=", stylishx2))
	{for_equals($_SESSION["to_compute"]);};

echo("<br>
	<br>
	<br>
	<table border=\"8\" cellspacing=\"10\" cellpadding=\"5\" style=\"font-size: large ; font-weight:bold\">
		<tr>
			<td height=\"20\" colspan=\"4\" style=\"font-size:smaller\">".$_SESSION["to_compute"]."</td>
		</tr>
		<tr>
			<td height=\"70\" colspan=\"4\" style=\"font-size:x-large ; text-align:right\">".$_SESSION["to_show"]."</td>
		</tr>
	");
		HTML_showTableRow(seven, eight, nine, minus);
		HTML_showTableRow(four, five, six, times);
		HTML_showTableRow(one, two, three, divide);
echo("	
		<tr>
			<td>".zero."</td>
			<td>".dec."</td>
			<td colspan=\"2\">".plus."</td>
		</tr>
		<tr>
			<td colspan=\"2\">".reset."</td>
			<td colspan=\"2\">".equals."</td>
		</tr>
	</table>
	");};
?>


