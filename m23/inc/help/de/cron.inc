<!--v10.0 new-->Mit dem <a href="http://de.wikipedia.org/wiki/Cron">cron</a>-Dämon können zu bestimmten Zeiten wiederkehrende Aufgaben ausgeführt werden. Diese Dialogelemente helfen Ihnen, die Zeitpunkte für die Ausführung festzulegen. Sollten bereits Zeitpunkte für die Ausführung vorliegen, so werden diese in einer Tabelle unter der Überschrift <i>"$I18N_cronEntries"</i> aufgelistet. Wartende Aufträge sind mit einem weißen und laufende mit einem orangen Punkt gekennzeichnet.

<u>Schrittweises Vorgehen zum Hinzufügen neuer Aufträge</u>
<ol>
	<li>Wählen Sie unter <i>"$I18N_cronTimeBase"</i> zuerst die Zeitbasis aus, für die Sie die Aufgabe planen möchten.</li>
	<li>Klicken Sie anschließend auf <i>"$I18N_change"</i>, um das nächste Dialogelement anzupassen.</li>
	<li>Machen Sie abhängig von der Zeitbasis die nötigen Angaben:
		<ul>
			<li><b>$I18N_cronTimeBaseHourly</b>: Der Auftrag wird jede Stunde oder alle N Stunden zu der angegebenen Minute gestartet.
				<ul>
					<li><b>$I18N_startMinute</b>: Die Minute, zu der der Auftrag gestartet werden soll.</li>
					<li><b>$I18N_repeatEveryNHours</b>: Der Stundenabstand zwischen den Ausführungen. (Z.B. 2 für alle zwei Stunden).</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseDayly</b>: Jeden Tag zu der angegebenen Zeit wird der Auftrag gestartet.
				<ul>
					<li><b>$I18N_startMinute</b>: Die Minute, zu der der Auftrag gestartet werden soll.</li>
					<li><b>$I18N_startHour</b>: Die Stunde, zu der der Auftrag gestartet werden soll.</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseWeekly</b>: Einmal wöchentlich wird der Auftrag zu einer bestimmten Stunde ausgeführt.
				<ul>
					<li><b>$I18N_startMinute</b>: Die Minute, zu der der Auftrag gestartet werden soll.</li>
					<li><b>$I18N_startHour</b>: Die Stunde, zu der der Auftrag gestartet werden soll.</li>
					<li><b>$I18N_dayOfWeek</b>: Der Wochentag, an dem der Auftrag gestartet werden soll.</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>Klicken Sie abschließend auf <i>"$I18N_add"</i>, um den Auftrag hinzuzufügen.</li>
</ol>

<u>Löschen eines Auftrages</u>
Sie löschen einen Auftrag aus der Liste <i>"$I18N_cronEntries"</i>, indem Sie hinter dem betreffenden Eintrag in der Tabelle auf <i>"$I18N_delete"</i> klicken.