<?PHP





/**
**name CALC_add_number($number, $signs)
**description Adds a number from 0 to 9 to the calculator.
**parameter number: Number to add.
**parameter signs: Array of possible signs.
**/
function CALC_add_number($number, $signs)
{
	if (($_SESSION["to_show"] === "0" && $_SESSION["last_button"] == "no_button") || ($_SESSION["last_button"] == "="))
	{
		$_SESSION["to_show"] = "$number";
		$_SESSION["to_compute"] = "$number";
	}
	elseif (in_array($_SESSION["last_button"], $signs))
	{
		$_SESSION["to_show"] = "$number";
		$_SESSION["to_compute"] .= "$number";
	}
	else
	{
		$_SESSION["to_show"] .= "$number";
		$_SESSION["to_compute"] .= "$number";
	}
	
	$_SESSION["last_button"] = $number;
};





/**
**name CALC_add_sign($sign, $signs)
**description Adds a sign to the calculator.
**parameter sign: Sign to add.
**parameter signs: Array of possible signs.
**/
function CALC_add_sign($sign, $signs)
{
	if (in_array($_SESSION["last_button"], $signs))
		$_SESSION["to_compute"][strlen($_SESSION["to_compute"])-1] = "$sign";
	elseif ($_SESSION["last_button"] == "no_button")
		$_SESSION["to_compute"] = $_SESSION["to_show"].$sign;
	else
		$_SESSION["to_compute"] .= "$sign";
	$_SESSION["last_button"] = $sign;
};





/**
**name CALC_add_equals($eq)
**description Adds an equal sign to the calculator and calculates the result.
**parameter eq: Arithmetic problem to solve.
**/
function CALC_add_equals($eq)
{
	$_SESSION["to_show"] = eval("return($eq);");
	$_SESSION["last_button"] = "=";
	$_SESSION["to_compute"] = $_SESSION["to_show"]; 
};





/**
**name CALC_add_dec($dec, $signs)
**description Adds a decimal point.
**parameter dec: The decimal point.
**parameter signs: Array of possible signs.
**/
function CALC_add_dec($dec, $signs)
{
	if (in_array($_SESSION["last_button"], $signs))
	{
		$_SESSION["to_compute"] .= "0".$dec;
		$_SESSION["to_show"] ="0".$dec;
	}
	else
	{
		$_SESSION["to_compute"] .= $dec;
		$_SESSION["to_show"] .= $dec;
	};
	$_SESSION["last_button"] = $dec;
};





/**
**name CALC_showCalculator()
**description Shows a simple calculator.
**/
function CALC_showCalculator()
{
	define ("stylish", "style=\"font-size: large ; font-weight: bold; height: 70px; width: 70px\"");
	define ("stylishx2", "style=\"font-size: large ; font-weight: bold; height: 70px; width: 160px\"");

	if (!isset($_SESSION["to_show"]))
		$_SESSION["to_show"] = "0";
	if (!isset($_SESSION["last_button"]))
		$_SESSION["last_button"] = "no_button";
	if (!isset($_SESSION["to_compute"]))
		$_SESSION["to_compute"] = "0";

	//Possible calculation signs
	$signs = array("+", "-", "*", "/");

	if (HTML_submit("nine","9", stylish))
		CALC_add_number("9", $signs);
	if (HTML_submit("eight","8", stylish))
		CALC_add_number("8", $signs);
	if (HTML_submit("seven","7", stylish))
		CALC_add_number("7", $signs);
	if (HTML_submit("minus","-", stylish))
		CALC_add_sign("-", $signs);
	if (HTML_submit("six","6", stylish))
		CALC_add_number("6", $signs);
	if (HTML_submit("five","5", stylish))
		CALC_add_number("5", $signs);
	if (HTML_submit("four","4", stylish))
		CALC_add_number("4", $signs);
	if (HTML_submit("times","x", stylish))
		CALC_add_sign("*", $signs);
	if (HTML_submit("three","3", stylish))
		CALC_add_number("3", $signs);
	if (HTML_submit("two","2", stylish))
		CALC_add_number("2", $signs);
	if (HTML_submit("one","1", stylish))
		CALC_add_number("1", $signs);
	if (HTML_submit("divide",":", stylish))
		CALC_add_sign("/", $signs);
	if (HTML_submit("zero","0", stylish))
		CALC_add_number("0", $signs);
	if (HTML_submit("dec",",", stylish))
		CALC_add_dec(".", $signs);
	if (HTML_submit("plus","+", stylishx2))
		CALC_add_sign("+", $signs);
	if (HTML_submit("reset","RESET", stylishx2))
	{
		$_SESSION["to_show"] = "0";
		$_SESSION["to_compute"] = "0";
		$_SESSION["last_button"] = "no_button";
	};
	if (HTML_submit("equals","=", stylishx2))
		CALC_add_equals($_SESSION["to_compute"]);

	echo("
		<br><br><br>
		<table id=\"calc_table\">
			<tr>
				<td height=\"20\" colspan=\"4\" style=\"font-size:smaller ; background-color:#d5dfee; border-radius:0px; border:2px  #0a356b; border-style:inset;\">".$_SESSION["to_compute"]."</td>
			</tr>
			<tr>
				<td height=\"70\" colspan=\"4\" style=\"font-size:x-large ; text-align:right ; background-color:#d5dfee; border-radius:0px; border:2px  #0a356b; border-style:inset;\">".$_SESSION["to_show"]."</td>
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
		");
};
?>

