<!--v10.0 new-->Mit dem <a href="http://de.wikipedia.org/wiki/Cron">cron</a>-D�mon k�nnen zu bestimmten Zeiten wiederkehrende Aufgaben ausgef�hrt werden. Diese Dialogelemente helfen Ihnen, die Zeitpunkte f�r die Ausf�hrung festzulegen. Sollten bereits Zeitpunkte f�r die Ausf�hrung vorliegen, so werden diese in einer Tabelle unter der �berschrift <i>"$I18N_cronEntries"</i> aufgelistet. Wartende Auftr�ge sind mit einem wei�en und laufende mit einem orangen Punkt gekennzeichnet.

<u>Schrittweises Vorgehen zum Hinzuf�gen neuer Auftr�ge</u>
<ol>
	<li>W�hlen Sie unter <i>"$I18N_cronTimeBase"</i> zuerst die Zeitbasis aus, f�r die Sie die Aufgabe planen m�chten.</li>
	<li>Klicken Sie anschlie�end auf <i>"$I18N_change"</i>, um das n�chste Dialogelement anzupassen.</li>
	<li>Machen Sie abh�ngig von der Zeitbasis die n�tigen Angaben:
		<ul>
			<li><b>$I18N_cronTimeBaseHourly</b>: Der Auftrag wird jede Stunde oder alle N Stunden zu der angegebenen Minute gestartet.
				<ul>
					<li><b>$I18N_startMinute</b>: Die Minute, zu der der Auftrag gestartet werden soll.</li>
					<li><b>$I18N_repeatEveryNHours</b>: Der Stundenabstand zwischen den Ausf�hrungen. (Z.B. 2 f�r alle zwei Stunden).</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseDayly</b>: Jeden Tag zu der angegebenen Zeit wird der Auftrag gestartet.
				<ul>
					<li><b>$I18N_startMinute</b>: Die Minute, zu der der Auftrag gestartet werden soll.</li>
					<li><b>$I18N_startHour</b>: Die Stunde, zu der der Auftrag gestartet werden soll.</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseWeekly</b>: Einmal w�chentlich wird der Auftrag zu einer bestimmten Stunde ausgef�hrt.
				<ul>
					<li><b>$I18N_startMinute</b>: Die Minute, zu der der Auftrag gestartet werden soll.</li>
					<li><b>$I18N_startHour</b>: Die Stunde, zu der der Auftrag gestartet werden soll.</li>
					<li><b>$I18N_dayOfWeek</b>: Der Wochentag, an dem der Auftrag gestartet werden soll.</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>Klicken Sie abschlie�end auf <i>"$I18N_add"</i>, um den Auftrag hinzuzuf�gen.</li>
</ol>

<u>L�schen eines Auftrages</u>
Sie l�schen einen Auftrag aus der Liste <i>"$I18N_cronEntries"</i>, indem Sie hinter dem betreffenden Eintrag in der Tabelle auf <i>"$I18N_delete"</i> klicken.