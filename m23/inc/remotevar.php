<?PHP

/*$mdocInfo
 Author: Hauke Goos-Habermann (HHabermann@pc-kiel.de)
 Description: functions for saving and loading serverside variables.
$*/

/**
**name RMV_exists4IP($var, $ip)
**description checks if a variable exists for a certain IP
**parameter var: name of the variable to store
**parameter ip: ip address to set the variable for
**/
function RMV_exists4IP($var, $ip)
{
	CHECK_FW(CC_remotevarip, $ip, CC_remotevarvar, $var);
	$sql="SELECT count(*) FROM `remotevar` WHERE ip = '$ip' AND var = '$var'";

	$result = db_query($sql); //FW ok

	$line = mysql_fetch_row($result);

	return($line[0]>0);
};





/**
**name RMV_set4IP($var, $value, $ip)
**description creates or updates a variable for a special ip
**parameter var: name of the variable to store
**parameter value: value to set
**parameter ip: ip address to set the variable for
**/
function RMV_set4IP($var, $value, $ip)
{
	CHECK_FW(CC_remotevarip, $ip, CC_remotevarvar, $var);
	if (!RMV_exists4IP($var, $ip))
		$sql="INSERT INTO `remotevar` (`ip` , `var` , `value` , `addtime` ) VALUES ('$ip', '$var', '".CHECK_text2db($value)."', '".time()."');";
	else	 
		$sql="UPDATE `remotevar` SET value = '".CHECK_text2db($value)."' WHERE ip = '$ip' AND var = '$var'";

	db_query($sql); //FW ok
};





/**
**name RMV_get4IP($var,$ip)
**description gets the value of a variable for the given ip
**parameter var: name of the variable to get the value from
**parameter ip: ip you want to get the value for
**/
function RMV_get4IP($var,$ip)
{
	CHECK_FW(CC_remotevarip, $ip, CC_remotevarvar, $var);
	$sql = "SELECT value FROM `remotevar` WHERE ip = '$ip' AND var = '$var'";

	$result = db_query($sql); //FW ok

	$line = mysql_fetch_row($result);

	return(CHECK_db2text($line[0]));
};





/**
**name RMV_set($var, $value)
**description creates or updates a variable for the ip of the calling client
**parameter var: name of the variable to store
**parameter value: value to set
**/
function RMV_set($var, $value)
{
	RMV_set4IP($var, $value, getClientIP());
};





/**
**name RMV_get($var)
**description gets the value of a variable for the ip of the calling client
**parameter var: name of the variable to get the value from
**/
function RMV_get($var)
{
	CHECK_FW(CC_remotevarvar, $var);
	$sql = "SELECT value FROM `remotevar` WHERE ip = '".getClientIP()."' AND var = '$var'";

	$result = db_query($sql); //FW ok

	$line = mysql_fetch_row($result);

	return(CHECK_db2text($line[0]));
};





/**
**name RMV_rm4IP($var,$ip)
**description removes a variable for a slelected ip
**parameter var: name of the variable to get the value from
**parameter ip: ip you want to delete the value from
**/
function RMV_rm4IP($var,$ip)
{
	CHECK_FW(CC_remotevarip, $ip, CC_remotevarvar, $var);
	$sql = "DELETE FROM `remotevar` WHERE ip = '$ip' AND var = '$var'";

	db_query($sql); //FW ok
};





/**
**name RMV_rm($var)
**description removes a variable for the ip of the calling client
**parameter var: name of the variable to get the value from
**/
function RMV_rm($var)
{
	RMV_rm($var,getClientIP());
}





/**
**name RMV_rm_old($time)
**description removes all vars older than $time seconds
**parameter time: time in seconds
**/
function RMV_rm_old($time)
{
	CHECK_FW('i', $time);
	$leastTime = time()-$time;

	$sql = "DELETE FROM `remotevar` WHERE addtime < $leastTime";

	db_query($sql); //FW ok
}
?>
