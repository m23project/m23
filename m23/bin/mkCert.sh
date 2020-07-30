#!/bin/bash
sslalldir="/etc/apache/m23"
m23ssldir="/m23/data+scripts/packages/baseSys/"

. /mdk/bin/serverFunctions.inc

# # Disable setting date and time by NTP
# timedatectl set-ntp false
# # Rewind the date by one date
# timedatectl set-time "$(date +"%Y-%m-%d %H:%M:%S" -d 'yesterday')"


# With help of: http://qemu-buch.de/de/index.php/QEMU-KVM-Buch/_Netzwerkoptionen/_Netzwerkdienste

#Generates a random serial number with 16 digits
genSerial()
{
	serialNumber=""

	#generate a "random" number with at least 17 digits
	while [ `echo $serialNumber | wc -m` -lt 18 ]
	do
		RANDOM=`dd if=/dev/urandom bs=1024 count=1 2> /dev/null | md5sum - | sed 's/[^0-9]//g'`
		serialNumber="$serialNumber$RANDOM"
		#echo $serialNumber > /dev/stderr
	done

	#take the first 16 digits and use them as serial number for the certificate
	echo $serialNumber | dd bs=5 count=1 2> /dev/null
}




if [ $1 ] && [ $1 != 'renewServerCert' ]
then
	serverIP=$1
	echo "Certificate will be created for the server \"$serverIP\""
	#Extend the directories for storing the SSL certificate
	sslalldir="$sslalldir/$serverIP"
	m23ssldir="$m23ssldir/$serverIP/"
else
	export serverIP=`/m23/bin/serverInfoIP`
fi

keyBits=4096

#Make the needed SSL cert directories
mkdir -p $sslalldir $m23ssldir


#get Apache user and group
apacheUser=`getApacheUser`
apacheGroup=`getApacheGroup`


#  only, if if should be created
if [ -z $1 ] || [ $1 != 'renewServerCert' ]
then
	# delete old CA files
	rm $sslalldir/ca.key $sslalldir/ca.csr $sslalldir/ca.crt 2> /dev/null

########Generate the CA

#Get a new serial number
serialNumber=`genSerial`

echo "organization=m23 project
cn=$serverIP
unit=self signing
ca
cert_signing_key
activation_date = \"2019-01-01 23:23:23\"
expiration_days = 3650" > /tmp/ca.cfg

	certtool --generate-privkey --bits $keyBits --outfile $sslalldir/ca.key
	certtool --generate-self-signed --load-privkey $sslalldir/ca.key --outfile $sslalldir/ca.crt --template /tmp/ca.cfg

cp /tmp/ca.cfg /m23/log

rm /tmp/ca.cfg

#build ssl hash and copy files to the m23ssl dir

#Call the old hash routine (on new openssl)
	openssl x509 -in $sslalldir/ca.crt -subject_hash_old -noout > $m23ssldir/ca.hash 2> /dev/null

#Call the normal routine (on old openssl)
	openssl x509 -in $sslalldir/ca.crt -hash -noout >> $m23ssldir/ca.hash

	cp $sslalldir/ca.crt $m23ssldir
	chown $apacheUser.$apacheGroup $m23ssldir/ca.crt $m23ssldir/ca.hash
	chmod 644 $m23ssldir/ca.crt $m23ssldir/ca.hash

fi


# delete old server certificates
rm $sslalldir/server.key $sslalldir/server.csr $sslalldir/server.crt 2> /dev/null





########Generate the server key + certificate

# Include IP into the certificate, if it's valid
/m23/bin/checkIP $serverIP 2> /dev/null
serverIPIsIP=$?
/m23/bin/checkFQDN $serverIP 2> /dev/null
serverIPIsFQDN=$?

newIP="$(hostname -I | tr -d '[[:blank:]]')"
/m23/bin/checkIP $newIP 2> /dev/null
newIPIsIP=$?
/m23/bin/checkFQDN $newIP 2> /dev/null
newIPIsFQDN=$?

# FQDN, but no IP reported by serverInfoIP
# and
# IP, but no FQDN reported by hostname -I
# and
# both IPs are not the same
# if [ $serverIPIsIP -ne 0 ] && [ $serverIPIsFQDN -eq 0 ] && [ $newIPIsIP -eq 0 ] && [ $newIPIsFQDN -ne 0 ] && [ $newIP != $serverIP ]
# then
	export ipLine="
ip_address=$newIP"
# else
# 	export ipLine=""
# fi


#Get a new serial number
serialNumber=`genSerial`

echo "organization=m23 project
cn=$serverIP$ipLine
unit=self signing
tls_www_server
encryption_key
signing_key
expiration_days = 3650
activation_date = \"2019-01-01 23:23:23\"" > /tmp/server.cfg

certtool --generate-privkey --bits $keyBits --outfile $sslalldir/server.key
certtool	--generate-certificate					\
			--load-privkey $sslalldir/server.key	\
			--load-ca-certificate $sslalldir/ca.crt	\
			--load-ca-privkey $sslalldir/ca.key		\
			--template /tmp/server.cfg				\
			--outfile $sslalldir/server.crt

cp /tmp/server.cfg /m23/log
rm /tmp/server.cfg