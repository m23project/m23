<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("synce-serial");

$elem["synce-serial/tty"]["type"]="string";
$elem["synce-serial/tty"]["description"]="Serial interface:
 Specify the serial interface used to connect your Windows CE device to the
 desktop. Possible serial interfaces are:
    ttyS0: First serial port (COM1: on DOS and Windows)
    ttyS1: Second serial port (COM2: on DOS and Windows)
    ircomm0: First IrDA communication port
    ircomm1: Second IrDA communication port
    ttyUSB0: First USB-Serial port
    ttyUSB1: Second USB-Serial port
";
$elem["synce-serial/tty"]["descriptionde"]="Serielle Schnittstelle:
 Spezifiziert die serielle Schnittstelle, die zum Verbinden Ihres Windows-CE-Gerätes an den Desktop verwendet wird. Mögliche serielle Schnittstellen sind:
    ttyS0: Erster serieller Port (COM1: unter DOS und Windows)
    ttyS1: Zweiter serieller Port (COM2: unter DOS und Windows)
    ircomm0: Erster IrDA-Kommunikations-Port
    ircomm1: Zweiter IrDA-Kommunikations-Port
    ttyUSB0: Erster USB-Seriell Port
    ttyUSB1: Zweiter USB-Seriell Port
";
$elem["synce-serial/tty"]["descriptionfr"]="Interface série :
 Veuillez indiquer l'interface série utilisée pour connecter votre périphérique Windows CE à votre ordinateur. Les interfaces série possibles sont :
  - ttyS0 : premier port série ;
  - ttyS1 : second port série ;
  - ircomm0 : premier port de communication IrDA ;
  - ircomm1 : second port de communication IrDA ;
  - ttyUSB0 : premier port série USB ;
  - ttyUSB1 : second port série USB.
";
$elem["synce-serial/tty"]["default"]="/dev/ttyUSB0";
$elem["synce-serial/localip"]["type"]="string";
$elem["synce-serial/localip"]["description"]="Local IP-Address:
 The local IP-Address to use for the ppp connection to your Windows CE
 device. It is best practice to use the default one (192.168.131.102). If
 you want to specify this address yourself, you may want to read about the
 same option on the man page for pppd.
";
$elem["synce-serial/localip"]["descriptionde"]="Lokale IP-Adresse:
 Die lokale IP-Adresse, die für die PPP-Verbindung zu Ihrem Windows-CE-Gerät verwendet wird. Es ist optimal, den Standardwert (192.168.131.102) zu verwenden. Falls Sie diese Adresse selbst angeben wollen, sollten Sie über die gleiche Option in der Handbuchseite von Pppd (»man pppd«) lesen.
";
$elem["synce-serial/localip"]["descriptionfr"]="Adresse IP locale :
 Veuillez indiquer l'adresse IP locale à utiliser pour la connexion PPP avec votre périphérique Windows CE. La meilleure solution est de conserver l'adresse par défaut (192.168.131.102). Si vous voulez utiliser une autre adresse, vous devriez lire les informations concernant cette option dans la page de manuel de pppd.
";
$elem["synce-serial/localip"]["default"]="192.168.131.102";
$elem["synce-serial/remoteip"]["type"]="string";
$elem["synce-serial/remoteip"]["description"]="Remote IP-Address:
 The remote IP-Address to use for the ppp connection to your Windows CE
 device. It is best practice to use the default one (192.168.131.201). If
 you want to specify this address yourself, you may want to read about the
 same option on the man page for pppd.
";
$elem["synce-serial/remoteip"]["descriptionde"]="Entfernte IP-Adresse:
 Die entfernte IP-Adresse, die für die PPP-Verbindung zu Ihrem Windows-CE-Gerät verwendet wird. Es ist optimal, den Standardwert (192.168.131.201) zu verwenden. Falls Sie diese Adresse selbst angeben wollen, sollten Sie über die gleiche Option in der Handbuchseite von Pppd (»man pppd«) lesen.
";
$elem["synce-serial/remoteip"]["descriptionfr"]="Adresse IP distante :
 Veuillez indiquer l'adresse IP distante utilisée par la connexion PPP avec votre périphérique Windows CE. La meilleure solution est de conserver l'adresse par défaut (192.168.131.201). Si vous voulez utiliser une autre adresse, vous devriez lire les informations concernant cette option dans la page de manuel de pppd.
";
$elem["synce-serial/remoteip"]["default"]="192.168.131.201";
$elem["synce-serial/dnsip"]["type"]="string";
$elem["synce-serial/dnsip"]["description"]="The IP-Address of your Domain Name server:
 Specify the IP-Address of your Domain Name System (DNS) server. If you do 
 not have a DNS server let this field empty. Be aware, if you leave this 
 field empty, name-resolution would not work on your device. Nevertheless,
 synce will work correctly without a DNS server. If your internet connection is
 up you could use the DNS server specified in the /etc/resolv.conf file.
";
$elem["synce-serial/dnsip"]["descriptionde"]="Die IP-Adresse Ihres Domain-Name-Servers:
 Geben Sie die IP-Adresse Ihres Domain Name System- (DNS-)Servers an. Falls Sie keinen DNS-Server haben, lassen Sie dieses Feld leer. Beachten Sie, dass die Namensauflösung auf Ihrem Gerät nicht funktioniert, falls Sie dieses Feld leer lassen. Trotzdem wird Synce ohne DNS-Server korrekt funktionieren. Falls Ihre Internet-Verbindung steht, können Sie den in der Datei /etc/resolv.conf angegebenen DNS-Server verwenden.
";
$elem["synce-serial/dnsip"]["descriptionfr"]="Adresse IP de votre serveur de nom (DNS) :
 Veuillez indiquer l'adresse IP de votre serveur de nom (DNS : « Domain Name System »). Si vous n'en possédez pas, laissez ce champ vide. Prenez garde, si vous laissez ce champ vide, la résolution de nom ne fonctionnera pas pour ce périphérique. Cependant, synce peut fonctionner sans serveur de nom. Si votre connexion internet est activée, vous pouvez utiliser le serveur DNS indiqué dans le fichier /etc/resolv.conf.
";
$elem["synce-serial/dnsip"]["default"]="";
PKG_OptionPageTail2($elem);
?>
