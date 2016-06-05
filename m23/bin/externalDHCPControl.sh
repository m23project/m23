#!/bin/bash

#######################
# This script is called, if an m23 client should boot over the network (add) or if network booting is disabled (remove).
# You should edit the script for your needs, if you have to run an external DHCP server.
#######################


# 'add' for adding an entry to the DHCP server or 'remove' for removing
command="$1"

# The name of the client that should be added to the DHCP server settings
clientName="$2"

# The client IP (e.g. 192.168.1.23)
ip="$3"

# The client netmask (e.g. 255.255.255.0)
netmask="$4"

# The client MAC address (e.g. 00:11:22:33:44:55)
mac="$5"

# The boot type defines the name of the boot file name. The m23 server contains a TFTP server that delivers the needed boot files.
# Set the IP of the m23 server on your DHCP server as boot/TFTP server.
# There are three possible values for "bootType" that are correlating with the boot file names:
#	pxe => pxelinux.0
#	etherboot => the client IP
#	grub2EFIx64 => grubnetx64.efi.signed
bootType="$6"

# The default gateway for the client
gateway="$7"

case $command in
"add")
	# Put your code for adding a client to your DHCP server here
	# Set variables $clientName, $ip, $netmask, $mac, $gateway
;;
"remove")
	# Put your code for removing a client from your DHCP server here
	# Set variable $clientName
;;
esac