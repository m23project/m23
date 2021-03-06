(mit * gekennzeichnete Felder m�ssen auf jeden Fall korrekt ausgef�llt werden)

<ul>
<li><b>$I18N_preferences:</b> Sie k�nnen bereits gespeicherte Konfigurationen ausw�hlen und anschlie�end laden oder l�schen. M�chten Sie die aktuelle Konfiguration speichern, geben Sie einen aussagekr�ftigen Namen ein und klicken auf <i>"$I18N_save"</i>.</li>
<!-- 1.10 begin--><li><b>$I18N_language:</b>Hier k�nnen Sie die Sprache f�r Ihren m23-Client ausw�hlen. Diese Sprache wird f�r die Tastatur-, Desktop- und Konsolen-Einstellung verwendet.</li>

<li><b>$I18N_login_name:</b> Der Name mit dem sich der Benutzer beim Client anmeldet.</li><!-- 1.10 end-->

<li><b>$I18N_client_name:</b> Ist der einmalige Name Ihres Clients, dieser sollte nicht mehrfach verwendet werden.</li>

<li><b>$I18N_office:</b> Diese Angabe ist freiwillig, hier k�nnen Sie eintragen, wo sich der Rechner befindet (z.B. Raumnummer etc.).</li>

<li><b>$I18N_forename:</b> Vorname des Benutzers, entspricht dem Loginnamen</li>

<li><b>$I18N_familyname:</b> Nachname des Benutzers</li>

<li><b>eMail:</b> eMail-Adresse des Benutzers</li>
<!-- V1.2 --><li><b>$I18N_boottype:</b> Bootstandard f�r das Booten der Clients �ber das Netzwerk <!-- 10.3 begin-->

<!-- 18.1 begin-->
<u>Booten per USB-Stick oder ISO</u>
Falls Ihr m23-Client nicht per PXE gestartet werden kann, k�nnen Sie einen bootf�higen USB-Stick erstellen oder das ISO brennen bzw. in einer virtuellen Maschine verwenden. Weitere Informationen finden Sie im Men� unter <i>"$I18N_makeBootMedia"</i>.
<!-- 18.1 end-->

<!-- 15.1 begin-->
<u>Hinweis: Externer DHCP-Server</u>
<!-- 15.1 end-->Falls Sie m23 mit einem vorhanden DHCP-Server verwenden m�chten, lesen Sie bitte folgende Seite: <m23help>externalDHCP</m23help><!-- 10.3 end-->
<!-- 15.1 begin--><u>Hinweis: UEFI</u>
Falls Sie Ihren Client �ber <a href="http://de.wikipedia.org/wiki/Unified_Extensible_Firmware_Interface">UEFI</a> starten m�chten, w�hlen Sie <i>"UEFI x86_64"</i> aus. Hierbei wird die Rechnerarchitektur automatisch auf 64 Bit gesetzt, da m23 UEFI nur auf 64-Bit-Systemen unterst�tzt. Sollte Ihr Rechner kein Netzwerkbooten im UEFI-Modus unterst�tzen, so k�nnen Sie das 64-Bit-Boot-ISO verwenden (zu finden z.B. im Men� unter <i>"$I18N_makeBootMedia"</i>).<!-- 15.1 end--></li>

<!-- V1.19 begin--><li><b>$I18N_bootloader:</b> W�hlen Sie hier, welchen <a href="http://de.wikipedia.org/wiki/Bootloader" target="_blank">Bootloader/Bootmanager/Urlader</a> Sie zum Starten des Linux-Kernels und evtl. anderen, bereits installierten Betriebssystemen verwenden m�chten.
<!-- V1.20 begin--><u>Hinweis</u><br>
Alle mit m23 0.6.4 oder h�her installierten Clients beinhalten einen Pa�wortschutz, der das Editieren der Bootparameter verhindert. Zum Freischalten der Bootmanager-Editierfunktion ist die Eingabe des Netzwerkbootpa�wortes n�tig. Dies kann im Kontrollzentrum unter <i>"$I18N_client_directConnect"</i> abgefragt werden.<!-- V1.20 end--></li><!-- V1.19 end-->
<!-- V1.16 --><li><b>$I18N_arch:</b> Wahl ob 32- oder 64-bittige Software auf dem Client installiert werden soll.
<u>Hinweis zur Rechnerarchitektur</u>
m23 unterst�tzt nativ 32- und 64-bittige Rechner. Eine 32-Bit Distribution kann auch auf einem 64-Bit Rechner installiert werden. Umgekehrt ist dies allerdings nicht m�glich. Um das volle Potential einer vorhandenen 64-Bit-CPU auszunutzen, sollten Sie <i>"amd64"</i> ausw�hlen. Unter <i>"amd64"</i> fallen nicht nur die CPUs von AMD sondern auch die von Intel. Beispielhaft seien hier die Intel-CPUs Pentium D, Pentium Extreme Edition, Celeron D und Core 2 sowie die AMD-CPUs AMD Sempron, Athlon 64, Athlon X2 und Phenom genannt.</li>

<li><b>$I18N_mac:</b> MAC-Adresse der Client-Netzwerkkarte (z.B. 00D0B723865C)</li>

<li><b>$I18N_ip:</b> gew�nschte IP-Adresse des Clients (z.B. 192.168.1.23)</li>

<li><b>$I18N_netmask:</b> Netzwerkmaske des Netzwerkes (z.B. 255.255.255.0)</li>

<li><b>$I18N_gateway:</b> Gateway-IP f�r Internet- oder andere Verbindungen au�erhalb des Netzwerkes</li>

<li><b>DNS1:</b> IP-Adresse des DNS-Servers zum Aufl�sen der Internetnamen</li>

<li><b>DNS2 (optional):</b> IP des Backup-DNS-Servers</li>

<!-- V1.4 --><li><b>$I18N_packageProxy:</b> Der Client versucht die Softwarepakete von der angegebenen Proxy-Server-IP zu beziehen. Im Standardfall ist dies die IP des m23-Servers, alternativ kann auch ein anderer Proxy-Server angegeben werden. Wenn das Feld leer gelassen wird, so l�dt der Client die Softwarepakete aus dem Internet herunter. Geben Sie bitte auch die Port-Addresse der Proxy-Servers an. Beim m23-Server ist dies der Port 2323. Wird der <i>"$I18N_add_client"</i>-Dialog ge�ffnet, so ist der m23-Server als Proxy voreingestellt.</li>

<li><b>$I18N_group (optional):</b> Angabe der Clientgruppe f�r den Client</li>

<li><b>$I18N_userpassword:</b> Es wird standardm��ig ein 6-stelliges Zufallspa�wort erstellt, das f�r den ersten Login auf dem Client benutzt wird. Sie k�nnen aber auch ein anderes Passwort vorgeben.</li>

<li><b>$I18N_rootpassword:</b> Es wird standardm��ig ein 8-stelliges Zufallspa�wort erstellt, das f�r den Root-Zugang auf dem Client benutzt wird. Sie k�nnen aber auch ein anderes Passwort vorgeben.</li>

<!-- 1.11 begin--><li><b>$I18N_timeZone:</b> Hier k�nnen Sie die Zeitzone festlegen, die von Client benutzt werden soll.</li>

<li><b>$I18N_getSystemtimeByNTP:</b> Setzen Sie diese Option, wenn Sie w�nschen, da� die Uhrzeit des Clients beim Systemstart �ber das Internet abgeglichen werden soll.</li>

<li><b>$I18N_installPrinterDriversAndDetectPrinter:</b> Wenn Sie diese Option w�hlen, werden Druckertreiber auf dem Client installiert sowie angeschlossene Drucker erkannt.</li><!-- 1.11 end--><!-- 1.10 begin-->

<li><b>$I18N_addNewLocalLogin:</b>Setzen Sie hier einen Haken, um die lokale Benutzeranmeldung des Clients zu verwenden.</li>

<li><b>$I18N_dontUseLDAP</b>: Um nur die lokale Benutzeranmeldung des Clients zu verwenden, w�hlen Sie <i>"$I18N_dontUseLDAP"</i>.</LI> 

<li><b>$I18N_readLoginFromLDAP<!-- 16.1 begin--> / $I18N_readLoginFromUCSLDAP<!-- 16.1 end--></b>: W�nschen Sie hingegen, die bereits in einen LDAP-Server <!-- 16.1 begin--> oder UCS-Server<!-- 16.1 end--> eingetragene Benutzerauthentifizierungsdaten zu nutzen, klicken Sie auf <i>"$I18N_readLoginFromLDAP"</i><!-- 16.1 begin--> bzw. <i>"$I18N_readLoginFromUCSLDAP"</i><!-- 16.1 end-->.</LI>

<li><b>$I18N_addNewLoginToLDAP<!-- 16.1 begin--> / $I18N_addNewLoginToUCSLDAP<!-- 16.1 end--></b>: Wollen Sie hingegen die oben angegebenen Benutzerdaten in die LDAP-Datenbank des m23-Servers <!-- 16.1 begin--> oder UCS-Servers<!-- 16.1 end--> eintragen und f�r Clientlogins nutzen, so w�hlen Sie <i>"$I18N_addNewLoginToLDAP"</i><!-- 16.1 begin--> bzw. <i>"$I18N_addNewLoginToUCSLDAP"</i><!-- 16.1 end-->. Bei Auswahl dieser Option ist ein LDAP-Server mit Vollzugriff erforderlich, da die oben angegebenen Benutzerdaten auf dem LDAP geschrieben werden.</LI>

<li><b>$I18N_userID, $I18N_groupID</b>: Zus�tzlich m�ssen Sie die <i>"$I18N_userID"</i> und <i>"$I18N_groupID"</i> f�r den Benutzer ausw�hlen. Dies ist insbesondere wichtig, wenn Sie NFS f�r das Speichern der Heimatverzeichnisse verwenden wollen.</LI>

<li><b>$I18N_LDAPServerName</b>: Zuletzt m�ssen Sie einen LDAP-Server aus der Auswahlliste bei <i>"$I18N_LDAPServerName"</i> ausw�hlen. Sollte der gew�nschte LDAP-Server nicht vorhanden sein, so k�nnen Sie ihn durch einen Klick auf <i>"$I18N_manageLDAPServers"</i> hinzuf�gen. <!-- 16.1 begin-->Falls m23 auf einem UCS-Server installiert wurde, entf�llt diese Option. Es wird stattdessen der UCS-eigene LDAP-Server verwendet.<!-- 16.1 end--></LI>

<li><b>$I18N_homeOnNFS:</b> Diese Option sorgt daf�r, da� die Benutzerdateien auf einem zentralen NFS-Server gespeichert werden, soda� auf diese (in Kombination mit LDAP) von jedem Client aus zugegriffen werden kann. Um NFS zu aktivieren, geben Sie den Rechnernamen bzw. die IP-Adresse und den Pfad zum Speichern der Heimatverzeichnisse an z.B. <code>192.168.1.23:/nfs-homes</code>. <!-- 16.1 begin-->Falls m23 auf einem UCS-Server installiert wurde, entf�llt diese Option.<!-- 16.1 end--></li><!-- 1.10 end-->
</ul>