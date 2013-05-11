<?PHP

include('clientConfigCommon.php');





/**
**name CLCFG_listDebianReleasesGeneric($distr)
**description Generates an array of the different releases (e.g. sarge, sid, woody, potato) of a distribution.
**parameter selName: the name of the selection
**parameter first: the release to show first
**parameter distr: distribution directory
**returns: Array with release names.
**/
function CLCFG_getDebianReleasesGeneric($distr)
{
	$nr = 0;
	$DIR = opendir ("/m23/data+scripts/distr/$distr/debootstrap/scripts/");

	while (false !== ($file = readdir ($DIR)))
	{
		if (strpos($file,".") === false)
			$out[$nr++] = $file;
	}
	
	sort($out);

	closedir($DIR);
	return($out);
};





/**
**name CLCFG_listDebianReleasesGeneric($selName,$first,$distr)
**description generates a selection of the different releases (e.g. sarge, sid, woody, potato) of a distribution.
**parameter selName: the name of the selection
**parameter first: the release to show first
**parameter distr: distribution directory
**returns: Selection with release names.
**/
function CLCFG_listDebianReleasesGeneric($selName,$first,$distr)
{
	return(HTML_listSelection($selName,CLCFG_getDebianReleasesGeneric($distr),$first));
};





/**
**name CLCFG_listDebianReleases($selName,$first)
**description generates a selection of the different Debian releases (sarge, sid, woody, potato)
**parameter selName: the name of the selection
**parameter first: the release to show first
**/
function CLCFG_listDebianReleases($selName,$first)
{
	return(CLCFG_listDebianReleasesGeneric($selName,$first,"debian"));
}
$CLCFG_listReleases=CLCFG_listDebianReleases;





/**
**name CLCFG_addDistributionSpecificOptions( $options)
**description adds distribution specific settings to an option array and returns the new array
**parameter $options: the options array with some values
**/
function CLCFG_addDistributionSpecificOptions($options)
{
	$options['kernel']=$_POST['SEL_kernel'];

	return($options);
};





/**
**name CLCFG_showDistributionSpecificOptions($options)
**description shows distribution specific options and returns false, if there was an error
**parameter options: options array
**/
function CLCFG_showDistributionSpecificOptions($options)
{
	include_once("/m23/inc/distr/debian/packages.php");

	$options = CLIENT_getSetOption($kernel,"kernel",$options);

	$kernelList = PKG_getKernels("debian",$_POST['SEL_sourcename'],$options['arch']);
	$kernel = HTML_storableSelection("SEL_kernel", "kernel", $kernelList, SELTYPE_selection, true, $options['kernel'], $options['kernel']);

	$options = CLIENT_getSetOption($kernel,"kernel",$options);


	echo("
	<tr>
		<td>Kernel</td>
		<td colspan=\"2\">".SEL_kernel."</td>
	</tr>
	");

	return($options);
};





/**
**name CLIENT_enableLDAP($clientOptions)
**description enables LDAP login for a client.
**parameter clientOptions: the client's options array
**/
function CLCFG_enableLDAPDebian($clientOptions)
{
	//exit the function if LDAP shouldn't used
	if ($clientOptions['ldaptype']=="none")
		return;

	$server=LDAP_loadServer($clientOptions['ldapserver']);

	$LDAPhost=$server[host];
	$baseDN=$server[base];

	//exit the function if LDAP host or base DN is empty
	if (empty($LDAPhost) || empty($baseDN))
		return;

	echo("
		rm /tmp/debconfLDAP 2> /dev/null

		#write debconf data
cat >> /tmp/debconfLDAP << \"EOF\"
libnss-ldap libnss-ldap/binddn string cn=proxyuser,$baseDN
libnss-ldap libnss-ldap/bindpw password
libnss-ldap libnss-ldap/confperm boolean false
libnss-ldap libnss-ldap/dblogin boolean false
libnss-ldap libnss-ldap/dbrootlogin boolean false
libnss-ldap libnss-ldap/nsswitch note
libnss-ldap libnss-ldap/override boolean true
libnss-ldap libnss-ldap/rootbinddn string cn=manager,$baseDN
libnss-ldap libnss-ldap/rootbindpw password
libnss-ldap shared/ldapns/base-dn string $baseDN
libnss-ldap shared/ldapns/ldap-server string ldapi://$LDAPhost
libnss-ldap shared/ldapns/ldap_version select 3
libpam-ldap libpam-ldap/binddn string cn=proxyuser,$baseDN
libpam-ldap libpam-ldap/bindpw password
libpam-ldap libpam-ldap/dblogin boolean false
libpam-ldap libpam-ldap/dbrootlogin boolean false
libpam-ldap libpam-ldap/override boolean true
libpam-ldap libpam-ldap/pam_password select md5
libpam-ldap libpam-ldap/rootbinddn string cn=manager,$baseDN
libpam-ldap libpam-ldap/rootbindpw password
libpam-ldap shared/ldapns/base-dn string $baseDN
libpam-ldap shared/ldapns/ldap-server string ldapi://$LDAPhost
ldap-auth-config ldap-auth-config/ldapns/ldap-server string ldapi://$LDAPhost
libpam-ldap shared/ldapns/ldap_version select 3
portmap portmap/loopback boolean false
EOF

debconf-set-selections /tmp/debconfLDAP

	#Thanks to the howto from: http://www.debuntu.org/ldap-server-and-linux-ldap-clients-p2

	export DEBIAN_FRONTEND=noninteractive

	apt-get -m --force-yes -qq -y install libnss-ldap libpam-ldap nscd	

	echo \"host $LDAPhost
base $baseDN
rootbinddn cn=admin,$baseDN\" > /etc/libnss-ldap.conf

	cat /etc/libnss-ldap.conf > /etc/pam_ldap.conf

pam configuration files need to be modfied a bit like:

	echo \"account sufficient pam_ldap.so
account required pam_unix.so
session required pam_mkhomedir.so umask=0022 skel=/etc/skel/ silent\" > /etc/pam.d/common-account

	echo \"auth sufficient pam_ldap.so
auth required pam_unix.so nullok_secure use_first_pass\" > /etc/pam.d/common-auth

	echo \"password sufficient pam_ldap.so
password required pam_unix.so nullok obscure min=4 md5\" > /etc/pam.d/common-password

	echo \"session sufficient pam_ldap.so
session required pam_unix.so
session optional pam_foreground.so\" > /etc/pam.d/common-session


	echo \"BASE dc=$baseDN
URI ldap://$LDAPhost\" > /etc/ldap/ldap.conf

");

	CLCFG_patchNsswitchForLDAP();
}


?>
