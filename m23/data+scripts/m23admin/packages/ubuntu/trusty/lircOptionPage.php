<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("lirc");

$elem["lirc/remote"]["type"]="select";
$elem["lirc/remote"]["choices"][1]="None";
$elem["lirc/remote"]["description"]="Remote control configuration:
 If you choose a remote or transmitter, but already have a
 configuration file in /etc/lirc/lircd.conf, the existing
 file will be renamed to /etc/lirc/lircd.conf.dpkg-old and
 the community configurations loaded into
 /etc/lirc/lircd.conf.  If you have a
 /etc/lirc/lircd.conf.dpkg-old file already, it will not
 be overwritten and your current /etc/lirc/lircd.conf will
 be lost.

";
$elem["lirc/remote"]["descriptionde"]="";
$elem["lirc/remote"]["descriptionfr"]="";
$elem["lirc/remote"]["default"]="None";
$elem["lirc/transmitter"]["type"]="select";
$elem["lirc/transmitter"]["choices"][1]="None";
$elem["lirc/transmitter"]["description"]="IR transmitter, if present:
 IR transmitters can be used for controlling external devices.  Some
 devices are considered transceivers, with the ability to both send
 and receive.  Other devices require separate hardware to accomplish
 these tasks.

";
$elem["lirc/transmitter"]["descriptionde"]="";
$elem["lirc/transmitter"]["descriptionfr"]="";
$elem["lirc/transmitter"]["default"]="None";
$elem["lirc/dev_input_device"]["type"]="select";
$elem["lirc/dev_input_device"]["description"]="Custom event interface for your dev/input device:
 Many remotes that were previously supported by the lirc_gpio interface now
 need to be set up via the dev/input interface.  You will need to custom
 select your remote's event character device.  This can be determined by
 'cat /proc/bus/input/devices'.

";
$elem["lirc/dev_input_device"]["descriptionde"]="";
$elem["lirc/dev_input_device"]["descriptionfr"]="";
$elem["lirc/dev_input_device"]["default"]="/dev/lirc0";
$elem["lirc/serialport"]["type"]="select";
$elem["lirc/serialport"]["choices"][1]="/dev/ttyS0";
$elem["lirc/serialport"]["description"]="Port your serial device is attached to:
 The UART (serial) driver is a low level driver that takes advantage
 of bit banging a character device.  This means that you can only use it
 with hardware serial devices.  It unfortunately does not work with USB
 serial devices.
";
$elem["lirc/serialport"]["descriptionde"]="";
$elem["lirc/serialport"]["descriptionfr"]="";
$elem["lirc/serialport"]["default"]="/dev/ttyS0";
PKG_OptionPageTail2($elem);
?>
