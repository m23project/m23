<?PHP

/*
#termcapinfo xterm*|linux*|rxvt*|Eterm* OP
#termcapinfo xterm 'is=\E[r\E[m\E[2J\E[H\E[?7h\E[?1;4;6l'
*/

include('/m23/inc/checks.php');
include_once('/m23/inc/client.php');
include_once('/m23/inc/remotevar.php');
include_once('/m23/inc/db.php');
include_once('/m23/inc/capture.php');

dbConnect();

if (CLIENT_isAskingInDebugMode())
	echo ("
rm /etc/screenrc

cat >> /etc/screenrc << \"SCREOF\"
termcap  xterm 'AF=\E[3%dm:AB=\E[4%dm'
terminfo xterm 'AF=\E[3%p1%dm:AB=\E[4%p1%dm'

deflog on
logfile /tmp/screen.%n
logfile flush 2
SCREOF

chmod 644 /etc/screenrc
chown root.root /etc/screenrc

");

?>