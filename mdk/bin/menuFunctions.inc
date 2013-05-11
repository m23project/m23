
#Sets global variables and values stored in /tmp/menuVars. To use these variables put ". /tmp/menuVars" in front of your code.
#$1: name of the variable
#$2: value of the variable
function menuVarAdd()
{
	varName=$1
	varValue=$2
	sed "/^$varName=/d" /tmp/menuVars > /tmp/menuVars.tmp
	echo "$varName=$varValue" >> /tmp/menuVars.tmp
	mv /tmp/menuVars.tmp /tmp/menuVars
	chmod 666 /tmp/menuVars
}





#removes a global variable from /tmp/menuVars.
#$1: name of the variable
function menuVarDel()
{
	varName=$1
	sed "/^$varName=/d" /tmp/menuVars > /tmp/menuVars.tmp
	mv /tmp/menuVars.tmp /tmp/menuVars
	chmod 666 /tmp/menuVars
}



menuVarInit()
{
	if ! test -f /tmp/menuVars
	then
		echo ". /mdk/globalVars" > /tmp/menuVars
		chmod 666 /tmp/menuVars
	fi
}