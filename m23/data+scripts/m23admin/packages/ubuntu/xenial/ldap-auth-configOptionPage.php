<?php
include ("/m23/inc/packages.php");
include ("/m23/inc/checks.php");
include ("/m23/inc/client.php");
include ("/m23/inc/capture.php");

$params = PKG_OptionPageHeader2("ldap-auth-config");

$elem["ldap-auth-config/rootbinddn"]["type"]="string";
$elem["ldap-auth-config/rootbinddn"]["description"]="LDAP account for root:
 This account will be used when root changes a password.
 .
 Note: This account has to be a privileged account.

";
$elem["ldap-auth-config/rootbinddn"]["descriptionde"]="";
$elem["ldap-auth-config/rootbinddn"]["descriptionfr"]="";
$elem["ldap-auth-config/rootbinddn"]["default"]="cn=manager,dc=example,dc=net";
$elem["ldap-auth-config/rootbindpw"]["type"]="password";
$elem["ldap-auth-config/rootbindpw"]["description"]="LDAP root account password:
 Please enter the password to use when ${package} tries to login to the
 LDAP directory using the LDAP account for root.
 .
 The password will be stored in a separate file ${filename} which will be
 made readable to root only.
 .
 Entering an empty password will re-use the old password.

";
$elem["ldap-auth-config/rootbindpw"]["descriptionde"]="";
$elem["ldap-auth-config/rootbindpw"]["descriptionfr"]="";
$elem["ldap-auth-config/rootbindpw"]["default"]="";
$elem["ldap-auth-config/dblogin"]["type"]="boolean";
$elem["ldap-auth-config/dblogin"]["description"]="Does the LDAP database require login?
 Choose this option if you are required to login to the database to
 retrieve entries.
 .
 Note: Under a normal setup, this is not needed.

";
$elem["ldap-auth-config/dblogin"]["descriptionde"]="";
$elem["ldap-auth-config/dblogin"]["descriptionfr"]="";
$elem["ldap-auth-config/dblogin"]["default"]="false";
$elem["ldap-auth-config/ldapns/base-dn"]["type"]="string";
$elem["ldap-auth-config/ldapns/base-dn"]["description"]="Distinguished name of the search base:
 Please enter the distinguished name of the LDAP search base. Many sites
 use the components of their domain names for this purpose. For example,
 the domain \"example.net\" would use \"dc=example,dc=net\" as the
 distinguished name of the search base.

";
$elem["ldap-auth-config/ldapns/base-dn"]["descriptionde"]="";
$elem["ldap-auth-config/ldapns/base-dn"]["descriptionfr"]="";
$elem["ldap-auth-config/ldapns/base-dn"]["default"]="dc=example,dc=net";
$elem["ldap-auth-config/pam_password"]["type"]="select";
$elem["ldap-auth-config/pam_password"]["choices"][1]="clear";
$elem["ldap-auth-config/pam_password"]["choices"][2]="crypt";
$elem["ldap-auth-config/pam_password"]["choices"][3]="nds";
$elem["ldap-auth-config/pam_password"]["choices"][4]="ad";
$elem["ldap-auth-config/pam_password"]["choices"][5]="exop";
$elem["ldap-auth-config/pam_password"]["description"]="Local crypt to use when changing passwords:
 The PAM module can set the password crypt locally when changing the
 passwords, which is usually a good choice. Specifying something other than
 clear ensures that the password gets crypted in some way.
 .
 The meanings for selections are:
 .
 clear - Don't set any encryptions. This is useful with servers that
 automatically encrypt userPassword entry.
 .
 crypt - (Default) make userPassword use the same format as the flat
 filesystem. This will work for most configurations.
 .
 nds - Use Novell Directory Services-style updating by first removing the
 old password and then update with a cleartext password.
 .
 ad - Active Directory-style. Create a Unicode password and update the
 unicodePwd attribute.
 .
 exop - Use the OpenLDAP password change extended operation to update the
 password.
 .
 md5 - Use the stronger md5 algorithm instead of standard crypt.

";
$elem["ldap-auth-config/pam_password"]["descriptionde"]="";
$elem["ldap-auth-config/pam_password"]["descriptionfr"]="";
$elem["ldap-auth-config/pam_password"]["default"]="md5";
$elem["ldap-auth-config/ldapns/ldap_version"]["type"]="select";
$elem["ldap-auth-config/ldapns/ldap_version"]["choices"][1]="3";
$elem["ldap-auth-config/ldapns/ldap_version"]["description"]="LDAP version to use:
 Please enter which version of the LDAP protocol should be used by ldapns.
 It is usually a good idea to set this to the highest available version.

";
$elem["ldap-auth-config/ldapns/ldap_version"]["descriptionde"]="";
$elem["ldap-auth-config/ldapns/ldap_version"]["descriptionfr"]="";
$elem["ldap-auth-config/ldapns/ldap_version"]["default"]="3";
$elem["ldap-auth-config/binddn"]["type"]="string";
$elem["ldap-auth-config/binddn"]["description"]="Unprivileged database user:
 Please enter the name of the account that will be used to log in to the
 LDAP database.
 .
 Warning: DO NOT use privileged accounts for logging in, the configuration
 file has to be world readable.

";
$elem["ldap-auth-config/binddn"]["descriptionde"]="";
$elem["ldap-auth-config/binddn"]["descriptionfr"]="";
$elem["ldap-auth-config/binddn"]["default"]="cn=proxyuser,dc=example,dc=net";
$elem["ldap-auth-config/dbrootlogin"]["type"]="boolean";
$elem["ldap-auth-config/dbrootlogin"]["description"]="Make local root Database admin:
 This option will allow you to make password utilities that use pam to
 behave like you would be changing local passwords.
 .
 The password will be stored in a separate file which will be made readable
 to root only.
 .
 If you are using NFS mounted /etc or any other custom setup, you should
 disable this.

";
$elem["ldap-auth-config/dbrootlogin"]["descriptionde"]="";
$elem["ldap-auth-config/dbrootlogin"]["descriptionfr"]="";
$elem["ldap-auth-config/dbrootlogin"]["default"]="true";
$elem["ldap-auth-config/ldapns/ldap-server"]["type"]="string";
$elem["ldap-auth-config/ldapns/ldap-server"]["description"]="LDAP server Uniform Resource Identifier:
 Please enter the URI of the LDAP server to use. This is a string in the
 form of ldap://<hostname or IP>:<port>/. ldaps:// or ldapi:// can also be
 used. The port number is optional.
 .
 Note: It is usually a good idea to use an IP address because it reduces
 risks of failure in the event name service problems.

";
$elem["ldap-auth-config/ldapns/ldap-server"]["descriptionde"]="";
$elem["ldap-auth-config/ldapns/ldap-server"]["descriptionfr"]="";
$elem["ldap-auth-config/ldapns/ldap-server"]["default"]="ldapi:///";
$elem["ldap-auth-config/bindpw"]["type"]="password";
$elem["ldap-auth-config/bindpw"]["description"]="Password for database login account:
 Please enter the password that will be used to log in to the LDAP
 database.

";
$elem["ldap-auth-config/bindpw"]["descriptionde"]="";
$elem["ldap-auth-config/bindpw"]["descriptionfr"]="";
$elem["ldap-auth-config/bindpw"]["default"]="";
$elem["ldap-auth-config/override"]["type"]="boolean";
$elem["ldap-auth-config/override"]["description"]="Should debconf manage LDAP configuration?
 Saying yes will allow future upgrades to use these settings. This is the
 recommended option.

";
$elem["ldap-auth-config/override"]["descriptionde"]="";
$elem["ldap-auth-config/override"]["descriptionfr"]="";
$elem["ldap-auth-config/override"]["default"]="true";
$elem["ldap-auth-config/move-to-debconf"]["type"]="boolean";
$elem["ldap-auth-config/move-to-debconf"]["description"]="Reconfigure LDAP with debconf?
 The LDAP authentication libraries now use the new unified configuration
 file ${newfn}, and no longer use ${pamfn} or ${nssfn}. One or both of
 these old configuration files were found. These files cannot be
 automatically migrated to the new ${newfn}. You MUST either reconfigure
 your settings with debconf, or manually migrate your settings into ${newfn}
 and verify your configuration before logging out.
";
$elem["ldap-auth-config/move-to-debconf"]["descriptionde"]="";
$elem["ldap-auth-config/move-to-debconf"]["descriptionfr"]="";
$elem["ldap-auth-config/move-to-debconf"]["default"]="true";
PKG_OptionPageTail2($elem);
?>
