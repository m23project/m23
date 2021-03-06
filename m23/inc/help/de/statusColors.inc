<!--V1.5 changed-->Klicken Sie auf den Clientnamen, erhalten Sie detaillierte Informationen zu dem gew�hlten Client und haben Zugriff auf das Kontrollzentrum.

<u>Statuserkl�rung</u>
Die Farbe des Statussymbols gibt an, wie weit die Installation des jeweiligen Clients vorangeschritten ist.
<ul>
<li><b>rot</b>: Client wurde aufgenommen, die automatische Hardwareerkennung ist nicht abgeschlossen.</li>
<li><b>gelb</b>: Sie k�nnen den Client formatieren und partitionieren, das Basissystem wird automatisch zugewiesen.</li>
<li><b>gr�n</b>: Das Basissystem des Clients ist eingerichtet, Sie k�nnen zus�tzliche Software installieren.</li>
<li><b>blau</b>: Der Client installiert gerade zus�tzliche Software.</li>
<!--V1.5 begin--><li><b>orange</b>: Der Client ist im <b>kritischen Zustand</b>. D.h. bei der Installation ist ein Fehler aufgetreten, der vom Administrator behoben werden mu�. Im Kontrollzentrum gibt es eine Reihe von M�glichkeiten, den kritischen Zustand zu beheben.</li>
<li><b>wei�</b>: Musterclient f�r die Masseninstallation, von dem die Einstellungen auf die anderen Clients �bertragen werden.</li>
<li><b>Fliege (Bug)</b>: Zeigt an, da� sich ein Client im Debug-Modus befindet.</li><!--V1.5 end-->
<!--V12.4 begin--><li><b>grau</b>: Dieser Client ist rein virtuell und dient zum Sperren von Client-Eigenschaften (IP, Clientname, MAC), damit diese nicht f�lschlicherweise verwendet werden.</li><!--V12.4 end-->
</ul>

<!--V1.11 begin--><u>$I18N_jobs</u>
In dieser Spalte steht vor dem Schr�gstrich die Anzahl der noch nicht abgearbeiteten Auftr�ge und die Anzahl aller Auftr�ge dahinter.<!--V1.11 end-->

<!--V1.5 begin--><u>Mehrere Clients bearbeiten</u>
W�hlen Sie mehrere Clients dadurch aus, da� Sie den Haken in den Spalte mit den gew�nschten Clients setzen.

Danach k�nnen Sie verschiedene Aktionen mit allen gew�hlten Clients durchf�hren:
<ul>
	<LI><b>$I18N_removeFromGroup</b>: W�hlen Sie hierzu die Gruppe aus, aus der die Clients gel�scht werden sollen. Sollte ein Client nicht in der angegebenen Gruppe sein, so wird mit diesem keine Aktion durchgef�hrt.</LI>
	<LI><b>$I18N_addToGroup</b>: W�hlen Sie hierzu die Gruppe aus, zu der die Clients hinzugef�gt werden sollen. Ist ein Client bereits in dieser Gruppe vorhanden, so wird an seiner Gruppenzugeh�rigkeit nichts ge�ndert.</LI>
	<LI><b>$I18N_delete</b>: L�scht die gew�hlten Clients</LI>
<!--V12.3 begin-->
	<LI><b>$I18N_moveToGroup</b>: Verschiebt einen Client in eine Gruppe.</LI>
	<LI><b>$I18N_recover</b>: Installiert den Client komplett neu.</LI>
<!--V12.3 end-->
<!--V18.2 begin-->
	<LI><b>$I18N_redo_client_jobs</b>: Alle Auftr�ge (inklusive Partitionierung und Formatierung) wiederholen, die jemals auf dem m23-Client ausgef�hrt wurden.
<!--V18.2 end-->
<!--V17.1 begin-->
	<LI><b>$I18N_comparePackageStatus</b>: Vergleicht den Paketstatus von zwei Clients.</LI>
<!--V17.1 end-->
</ul><!--V1.5 end-->

<!--V1.2 begin--><u>Hinweis</u>
Um den aktuellen Client-Status zu erhalten, benutzen Sie die Reload-Funktion Ihres Browsers (z.B. durch Dr�cken der Taste F5)<!--V1.2 end-->

<!--V1.5 begin--><u>Tricks</u>
<ul><LI>Durch Klicken auf das Statussysmbol kann der aktuelle Status des Clients ge�ndert werden.</LI>
<LI>Allerdings sollten Sie den Client-Status nur �ndern, wenn Sie wissen, was Sie tun. Der Debug-Modus kann durch einen Klick auf das Laus-Icon (de)aktiviert werden.</LI></ul>
<!--V1.5 end-->
