<!--V1.5 changed-->Klicken Sie auf den Clientnamen, erhalten Sie detaillierte Informationen zu dem gewählten Client und haben Zugriff auf das Kontrollzentrum.

<u>Statuserklärung</u>
Die Farbe des Statussymbols gibt an, wie weit die Installation des jeweiligen Clients vorangeschritten ist.
<ul>
<li><b>rot</b>: Client wurde aufgenommen, die automatische Hardwareerkennung ist nicht abgeschlossen.</li>
<li><b>gelb</b>: Sie können den Client formatieren und partitionieren, das Basissystem wird automatisch zugewiesen.</li>
<li><b>grün</b>: Das Basissystem des Clients ist eingerichtet, Sie können zusätzliche Software installieren.</li>
<li><b>blau</b>: Der Client installiert gerade zusätzliche Software.</li>
<!--V1.5 begin--><li><b>orange</b>: Der Client ist im <b>kritischen Zustand</b>. D.h. bei der Installation ist ein Fehler aufgetreten, der vom Administrator behoben werden muß. Im Kontrollzentrum gibt es eine Reihe von Möglichkeiten, den kritischen Zustand zu beheben.</li>
<li><b>weiß</b>: Musterclient für die Masseninstallation, von dem die Einstellungen auf die anderen Clients übertragen werden.</li>
<li><b>Fliege (Bug)</b>: Zeigt an, daß sich ein Client im Debug-Modus befindet.</li><!--V1.5 end-->
<!--V12.4 begin--><li><b>grau</b>: Dieser Client ist rein virtuell und dient zum Sperren von Client-Eigenschaften (IP,Clientname,MAC), damit diese nicht fälschlciherweise verwendet werden.</li><!--V12.4 end-->
</ul>

<!--V1.11 begin--><u>$I18N_jobs</u>
In dieser Spalte steht vor dem Schrägstrich die Anzahl der noch nicht abgearbeiteten Aufträge und die Anzahl aller Aufträge dahinter.<!--V1.11 end-->

<!--V1.5 begin--><u>Mehrere Clients bearbeiten</u>
Wählen Sie mehrere Clients dadurch aus, daß Sie den Haken in den Spalte mit den gewünschten Clients setzen.

Danach können Sie verschiedene Aktionen mit allen gewählten Clients durchführen:
<ul>
	<LI><b>$I18N_removeFromGroup</b>: Wählen Sie hierzu die Gruppe aus, aus der die Clients gelöscht werden sollen. Sollte ein Client nicht in der angegebenen Gruppe sein, so wird mit diesem keine Aktion durchgeführt.</LI>
	<LI><b>$I18N_addToGroup</b>: Wählen Sie hierzu die Gruppe aus, zu der die Clients hinzugefügt werden sollen. Ist ein Client bereits in dieser Gruppe vorhanden, so wird an seiner Gruppenzugehörigkeit nichts geändert.</LI>
	<LI><b>$I18N_delete</b>: Löscht die gewählten Clients</LI>
<!--V12.3 begin-->
	<LI><b>$I18N_moveToGroup</b>: Verschiebt einen Client in eine Gruppe.</LI>
	<LI><b>$I18N_recover</b>: Installiert den Client komplett neu.</LI>
<!--V12.3 end-->
</ul><!--V1.5 end-->

<!--V1.2 begin--><u>Hinweis</u>
Um den aktuellen Client-Status zu erhalten, benutzen Sie die Reload-Funktion Ihres Browsers (z.B. durch Drücken der Taste F5)<!--V1.2 end-->

<!--V1.5 begin--><u>Tricks</u>
<ul><LI>Durch Klicken auf das Statussysmbol kann der aktuelle Status des Clients geändert werden.</LI>
<LI>Allerdings sollten Sie den Client-Status nur ändern, wenn Sie wissen, was Sie tun. Der Debug-Modus kann durch einen Klick auf das Laus-Icon (de)aktiviert werden.</LI></ul>
<!--V1.5 end-->
