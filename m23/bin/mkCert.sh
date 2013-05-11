#!/bin/bash
sslalldir="/etc/apache/m23"
m23ssldir="/m23/data+scripts/packages/baseSys/"

. /mdk/bin/serverFunctions.inc

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




if [ $# -gt 0 ]
then
	serverIP=$1
	echo "Certificate will be created for the server \"$serverIP\""
	#Extend the directories for storing the SSL certificate
	sslalldir="$sslalldir/$serverIP"
	m23ssldir="$m23ssldir/$serverIP/"
else
	#get the server IP
	if test `grep address /etc/network/interfaces | wc -l` -gt 0
	then
		serverIP=`grep address /etc/network/interfaces | head -1 | cut -d's' -f3 | cut -d' ' -f2`
	else
		serverIP=`hostname`
	fi
fi

keyBits=4096



#Make the needed SSL cert directories
mkdir -p $sslalldir $m23ssldir


#get Apache user and group
apacheUser=`getApacheUser`
apacheGroup=`getApacheGroup`

#delete old keys and certificates
rm $sslalldir/ca.key $sslalldir/ca.csr $sslalldir/ca.crt $sslalldir/server.key $sslalldir/server.csr $sslalldir/server.crt  2> /dev/null



########Generate the CA

#Get a new serial number
serialNumber=`genSerial`

echo "cn = \"m23-Projekt\"
ca
cert_signing_key
expiration_days = 3650" > /tmp/ca.cfg

certtool --generate-privkey --bits $keyBits --outfile $sslalldir/ca.key
certtool --generate-self-signed --load-privkey $sslalldir/ca.key --outfile $sslalldir/ca.crt --template /tmp/ca.cfg

rm /tmp/ca.cfg





########Generate the server key + certificate

#Get a new serial number
serialNumber=`genSerial`

echo "organization = m23 project
cn = $serverIP
tls_www_server
encryption_key
signing_key
expiration_days = 3650" > /tmp/server.cfg

certtool --generate-privkey --bits $keyBits --outfile $sslalldir/server.key
certtool	--generate-certificate					\
			--load-privkey $sslalldir/server.key	\
			--load-ca-certificate $sslalldir/ca.crt	\
			--load-ca-privkey $sslalldir/ca.key		\
			--template /tmp/server.cfg				\
			--outfile $sslalldir/server.crt

rm /tmp/server.cfg



#build ssl hash and copy files to the m23ssl dir

#Call the old hash routine (on new openssl)
openssl x509 -in $sslalldir/ca.crt -subject_hash_old -noout > $m23ssldir/ca.hash 2> /dev/null
#Call the normal routine (on old openssl)
openssl x509 -in $sslalldir/ca.crt -hash -noout >> $m23ssldir/ca.hash

cp $sslalldir/ca.crt $m23ssldir
chown $apacheUser.$apacheGroup $m23ssldir/ca.crt $m23ssldir/ca.hash
chmod 644 $m23ssldir/ca.crt $m23ssldir/ca.hash