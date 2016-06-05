<?php


/**
**name UCS_getPrefnameByClient($client)
**description Generates the preference name for an UCS client.
**parameter client: Client name.
**returns Preference name for an UCS client
**/
function UCS_getPrefnameByClient($client)
{
	CHECK_FW(CC_clientname, $client);
	return("UCS_$client");
}





/**
**name UCS_addUCSClientTom23ClientPreferences($client, $mac, $ip, $netmask, $gateway, $dns1)
**description Adds an UCS client to the client preferences in m23.
**parameter client: Client name.
**parameter mac: The MAC of the client.
**parameter ip: The client's IP address.
**parameter netmask: The client's netmask.
**parameter gateway: The client's gateway.
**parameter dns1: The client's first DNS server.
**/
function UCS_addUCSClientTom23ClientPreferences($client, $mac, $ip, $netmask, $gateway, $dns1)
{
	CHECK_FW(CC_mac, $mac, CC_ip, $ip, CC_netmask, $netmask, CC_gateway, $gateway, CC_dns1, $dns1);

	$prefName = UCS_getPrefnameByClient($client);
	PREF_putValue($prefName, 'client', $client);
	PREF_putValue($prefName, 'mac', CLIENT_convertMac($mac, ''));
	PREF_putValue($prefName, 'ip', $ip);
	PREF_putValue($prefName, 'netmask', $netmask);
	PREF_putValue($prefName, 'gateway', $gateway);
	PREF_putValue($prefName, 'dns1', $dns1);
}





/**
**name UCS_delUCSClientFromm23ClientPreferences($client)
**description Removes an UCS client from the client preferences in m23.
**parameter client: Client name.
**/
function UCS_delUCSClientFromm23ClientPreferences($client)
{
	PREF_delete(UCS_getPrefnameByClient($client));
}





/**
**name UCS_addClient($client, $mac, $ip)
**description Adds a client to the UCS LDAP.
**parameter client: Client name.
**parameter mac: The MAC of the client.
**parameter ip: The client's IP address.
**/
function UCS_addClient($client, $mac, $ip)
{
	// Thx to the Univention staff: http://forum.univention.de/viewtopic.php?f=68&t=4433
	
	$mac = CLIENT_convertMac($mac, ':');

	$cmds = 'eval "$(ucr shell)"

	udm computers/linux create --position "cn=computers,$ldap_base" \
		--set name="'.$client.'" \
		--set mac="'.$mac.'" \
		--set ip="'.$ip.'" \
		--set network="cn=default,cn=networks,$ldap_base" \
		--set password="ucs_m23_secret" \
		--set dhcpEntryZone="cn=$domainname,cn=dhcp,$ldap_base '.$ip.' '.$mac.'"
';
	SERVER_runInBackground("UCS_addClient$client", $cmds, 'root', false);
}





/**
**name UCS_delClient($client)
**description Removes a client from the UCS LDAP.
**parameter client: Client name.
**/
function UCS_delClient($client)
{
	$cmds = 'eval "$(ucr shell)"

	udm computers/linux remove --dn "cn='.$client.',cn=computers,$ldap_base"
';
	SERVER_runInBackground("UCS_delClient$client", $cmds, 'root', false);
}





/**
**name UCS_enableClientPXEBoot($client, $bootFilename)
**description Activates PXE booting of a client that is in the UCS LDAP via the univention-dhcp.
**parameter client: Client name.
**parameter bootFilename: Image to boot over network (e.g. pxelinux.0).
**/
function UCS_enableClientPXEBoot($client, $bootFilename)
{
	// Thx to the Univention staff: http://forum.univention.de/viewtopic.php?f=68&t=4433
	
	$CClientO = new CClient($client);

	UCS_delClient($client);
	UCS_addClient($client, $CClientO->getMAC(), $CClientO->getIP());

	$boot_server = getServerIP();
	$cmds = 'eval "$(ucr shell)"

	udm policies/dhcp_boot create --position "cn=boot,cn=dhcp,cn=policies,$ldap_base" \
		--set name="'.$client.'" \
		--set boot_server="'.$boot_server.'" \
		--set boot_filename="'.$bootFilename.'"

	udm dhcp/host modify \
		--dn "cn='.$client.',cn=$domainname,cn=dhcp,$ldap_base" \
		--policy-reference "cn='.$client.',cn=boot,cn=dhcp,cn=policies,$ldap_base"
';
/*		--dn "cn=host,cn='.$client.',cn=$domainname,cn=dhcp,$ldap_base" \
		--policy-reference "cn=host,cn='.$client.',cn=boot,cn=dhcp,cn=policies,$ldap_base"*/

	SERVER_runInBackground("UCS_enablePXEBoot$client", $cmds, 'root', false);
}





/**
**name UCS_disableClientPXEBoot($client)
**description Deactivates PXE booting of a client that is in the UCS LDAP via the univention-dhcp.
**parameter client: Client name.
**/
function UCS_disableClientPXEBoot($client)
{
	// Thx to the Univention staff: http://forum.univention.de/viewtopic.php?f=68&t=4433

// 	udm policies/dhcp_boot remove --dn "cn=host,cn='.$client.',cn=boot,cn=dhcp,cn=policies,$ldap_base"
	$cmds = 'eval "$(ucr shell)"

	# Remove dhcp_boot policy from the client. Afterwards the client has no longer a special boot policy (no bootserver ...)
	udm policies/dhcp_boot remove --dn "cn='.$client.',cn=boot,cn=dhcp,cn=policies,$ldap_base"

	# Remove the DHCP host object from the client
	udm dhcp/host remove --superordinate "cn=$domainname,cn=dhcp,$ldap_base" --dn "cn='.$client.',cn=$domainname,cn=dhcp,$ldap_base"
';
	SERVER_runInBackground("UCS_disableClientPXEBoot$client", $cmds, 'root', false);
}





/**
**name UCS_setClientDistrAndRelease($client, $distr, $release)
**description Sets the distribution and the release of a client to the UCS LDAP.
**parameter client: Client name.
**parameter distr: Client's distribution.
**parameter release: Client's distribution release.
**/
function UCS_setClientDistrAndRelease($client, $distr, $release)
{
	$cmds = 'eval "$(ucr shell)"

	udm computers/linux modify --dn "cn='.$client.',cn=computers,$ldap_base" \
		--set operatingSystem="'.$distr.'" \
		--set operatingSystemVersion="'.$release.'"';

	SERVER_runInBackground("UCS_setClientDistr$client", $cmds, 'root', false);
}





/**
**name UCS_openFirewallPort($port, $type = 'tcp')
**description Opens a port on the UCS firewall.
**parameter port: Port number to open.
**parameter type: tcp or udp.
**/
function UCS_openFirewallPort($port, $type = 'tcp')
{
	$cmds = "
	ucr set security/packetfilter/$type/$port/all=ACCEPT
	/etc/init.d/univention-firewall restart
	";
	
	SERVER_runInBackground("UCS_openFirewallPort-$type-$port", $cmds, 'root', false);
}





/**
**name UCS_addLDAPUser($account,$forename,$familyname,$pwd,$uid,$gid)
**description Adds a posix account to the UCS LDAP server.
**parameter account: the login name
**parameter forename: the forename of the user
**parameter familyname: the familyname of the user
**parameter pwd: the unencrypted password
**parameter uid: Linux user ID
**parameter gid: Linux group ID
**returns The output from udm after executing the parameters.
**/
function UCS_addLDAPUser($account,$forename,$familyname,$pwd,$uid)
{

	$cmds = 'eval "$(ucr shell)"

	udm users/user create --position "cn=users,$ldap_base" \
		--set username="'.$account.'" \
		--set firstname="'.$forename.'" \
		--set lastname="'.$familyname.'" \
		--set password="'.$pwd.'" \
		--set gecos="'.$forename.' '.$familyname.'" \
		--set displayName="'.$forename.' '.$familyname.'" \
		--set uidNumber="'.$uid.'" \
		--set description="Created by m23" \
		--option kerberos \
		--option person \
		--option posix \
		--option samba \
		--option mail

	echo $?';

	return(SERVER_runInBackground("UCS_addLDAPUser$account", $cmds, 'root', false));
}





/**
**name UCS_getEtc_ucr_master()
**description Gets the contents for /etc/univention/ucr_master on the client.
**/
function UCS_getEtc_ucr_master()
{
	$out = SERVER_runInBackground(UCS_getEtc_ucr_master, 'ucr shell | grep -v ^hostname=', 'root', false);
	$out .= "master_ip=".getServerIP();
	return($out);
}





/**
**name UCS_enableClientLDAP()
**description Enables LDAP authentification on the client on the UCS.
**/
function UCS_enableClientLDAP()
{
	// Thx to the Univention staff: http://docs.software-univention.de/domain-4.0.html

	echo ('
mkdir /etc/univention

# Get configuration
	cat >/etc/univention/ucr_master << __ucr_master_EOF__
'.UCS_getEtc_ucr_master().'
__ucr_master_EOF__
	chmod 660 /etc/univention/ucr_master
	. /etc/univention/ucr_master

# Insert the UCS server in the hosts file
	echo "'.getServerIP().' ${ldap_master}" >>/etc/hosts

# Download the SSL certificate
	mkdir -p /etc/univention/ssl/ucsCA/
	wget -O /etc/univention/ssl/ucsCA/CAcert.pem http://${ldap_master}/ucs-root-ca.crt

# Save the default LDAP password
	printf \'%s\' "ucs_m23_secret" > /etc/ldap.secret
	chmod 0400 /etc/ldap.secret

# Create ldap.conf
cat >/etc/ldap/ldap.conf <<__EOF__
TLS_CACERT /etc/univention/ssl/ucsCA/CAcert.pem
URI ldap://$ldap_master:7389
BASE $ldap_base
__EOF__

# Install SSSD based configuration
DEBIAN_FRONTEND=noninteractive
apt-get -y install sssd libnss-sss libpam-sss

# Not available under Debian 7
apt-get -y install libsss-sudo

# Create sssd.conf
cat >/etc/sssd/sssd.conf <<__EOF__
[sssd]
config_file_version = 2
reconnection_retries = 3
sbus_timeout = 30
services = nss, pam, sudo
domains = $kerberos_realm

[nss]
reconnection_retries = 3

[pam]
reconnection_retries = 3

[domain/$kerberos_realm]
auth_provider = krb5
krb5_kdcip = ${master_ip}
krb5_realm = ${kerberos_realm}
krb5_server = ${ldap_master}
krb5_kpasswd = ${ldap_master}
id_provider = ldap
ldap_uri = ldap://${ldap_master}:7389
ldap_search_base = ${ldap_base}
ldap_tls_reqcert = never
ldap_tls_cacert = /etc/univention/ssl/ucsCA/CAcert.pem
cache_credentials = true
enumerate = true
ldap_default_bind_dn = cn=$(hostname),cn=computers,${ldap_base}
ldap_default_authtok_type = password
ldap_default_authtok = $(cat /etc/ldap.secret)
__EOF__
chmod 600 /etc/sssd/sssd.conf

# Install auth-client-config
DEBIAN_FRONTEND=noninteractive apt-get -y install auth-client-config

# Create an auth config profile for sssd
cat >/etc/auth-client-config/profile.d/sss <<__EOF__
[sss]
nss_passwd=   passwd:   compat sss
nss_group=    group:    compat sss
nss_shadow=   shadow:   compat
nss_netgroup= netgroup: nis

pam_auth=
	auth [success=3 default=ignore] pam_unix.so nullok_secure try_first_pass
	auth requisite pam_succeed_if.so uid >= 500 quiet
	auth [success=1 default=ignore] pam_sss.so use_first_pass
	auth requisite pam_deny.so
	auth required pam_permit.so

pam_account=
	account required pam_unix.so
	account sufficient pam_localuser.so
	account sufficient pam_succeed_if.so uid < 500 quiet
	account [default=bad success=ok user_unknown=ignore] pam_sss.so
	account required pam_permit.so

pam_password=
	password sufficient pam_unix.so obscure sha512
	password sufficient pam_sss.so use_authtok
	password required pam_deny.so

pam_session=
	session required pam_mkhomedir.so skel=/etc/skel/ umask=0077
	session optional pam_keyinit.so revoke
	session required pam_limits.so
	session [success=1 default=ignore] pam_sss.so
	session required pam_unix.so
__EOF__
auth-client-config -a -p sss

# Restart sssd
restart sssd

cat >/usr/share/pam-configs/ucs_mkhomedir <<__EOF__
Name: activate mkhomedir
Default: yes
Priority: 900
Session-Type: Additional
Session:
    required    pam_mkhomedir.so umask=0022 skel=/etc/skel
__EOF__

DEBIAN_FRONTEND=noninteractive pam-auth-update

echo \'*;*;*;Al0000-2400;audio,cdrom,dialout,floppy,plugdev,adm\' >>/etc/security/group.conf

cat >>/usr/share/pam-configs/local_groups <<__EOF__
Name: activate /etc/security/group.conf
Default: yes
Priority: 900
Auth-Type: Primary
Auth:
    required    pam_group.so use_first_pass
__EOF__

DEBIAN_FRONTEND=noninteractive pam-auth-update

# Add a field for a user name, disable user selection at the login screen
mkdir /etc/lightdm/lightdm.conf.d
cat >>/etc/lightdm/lightdm.conf.d/99-show-manual-userlogin.conf <<__EOF__
[SeatDefaults]
greeter-show-manual-login=true
greeter-hide-users=true
__EOF__

# Install required packages
DEBIAN_FRONTEND=noninteractive apt-get install -y heimdal-clients

# Default krb5.conf
cat >/etc/krb5.conf <<__EOF__
[libdefaults]
    default_realm = $kerberos_realm
    kdc_timesync = 1
    ccache_type = 4
    forwardable = true
    proxiable = true

[realms]
$kerberos_realm = {
   kdc = $master_ip $ldap_master
   admin_server = $master_ip $ldap_master
}
__EOF__

# Stop and disable the avahi daemon
stop avahi-daemon
sed -i \'s|start on (|start on (never and |\' /etc/init/avahi-daemon.conf

# Synchronize the time with the UCS system
ntpdate -bu $ldap_master
');
}





/**
**name UCS_udmSuccessOrErrorMessage($ret, &$errorMessage)
**description Takes the output from an udm command and checks for the return code (must be a single number in the last line). If the return code is non-zero, all lines above the last line are treated as error message and written to $errorMessage.
**parameter ret: The complete message block with return code (must be a single number in the last line)
**parameter errorMessage: The variable, the error message may be written to.
**returns true, if the udm command returned a success return code (0), otherwise false.
**/
function UCS_udmSuccessOrErrorMessage($ret, &$errorMessage)
{
	// Split the lines into an array
	$lines = explode("\n", trim($ret));

	// The return code is in the last line
	$retCode = $lines[count($lines) - 1];

	// Check, if the return code is not 0 (0 = all ok)
	if (is_numeric($retCode) && $retCode != 0)
	{
		$errorMessage = implode("\n", array_slice($lines, 0, count($lines) - 1));
		return(false);
	}
	else
	{
		$errorMessage = '';
		return(true);
	}
}





/**
**name UCS_getUsedIPs()
**description Gets a list with all used IPs managed or known by UCS.
**returns Array with all used IPs managed or known by UCS.
**/
function UCS_getUsedIPs()
{
	// Get the IPs managed by UCS from the LDAP (computers and DHCP settings)
	$cmds = 'eval "$(ucr shell)"

	(udm computers/computer list --superordinate "cn=computers,$ldap_base" --policies 0; udm dhcp/host list --superordinate "cn=$domainname,cn=dhcp,$ldap_base" --policies 0)  | cut -d\'"\' -f2 | sed \'s/.* //g\' | egrep \'[0-9]*\.[0-9]*\.[0-9]*\.[0-9]*\' | sort -u';

	$ipText = SERVER_runInBackground("UCS_getUsedIPs", $cmds, 'root', false);
	
	return(explode("\n", trim($ipText)));
}
?>