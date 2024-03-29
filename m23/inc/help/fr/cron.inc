<!--v10.0 new-->Avec le d�mon <a href="http://fr.wikipedia.org/wiki/Cron">cron</a>, des t�ches se r�p�tant � intervals fixes, peuvent �tre ex�cut�es. Les �l�ments de ce dialogue vous aident � fixer l'heure pour l'ex�cution. Lorsqu'il y a des dates, vous les verrez dans le tableau avec le titre <i>&laquo;$I18N_cronEntries&raquo;</i>. Les t�ches dans la file d'attente sont marqu�es d'un point blanc, les t�ches qui sont en cours d'ex�cution avec un point orange.

<u>Processus �tape par �tape pour ajouter de nouvelles t�ches</u>
<ol>
	<li>S�lectionnez d'abord l'unit� de temps qu'il vous faut pour la t�che sous <i>&laquo;$I18N_cronTimeBase&raquo;</i></li>
	<li>Ensuite, cliquez sur <i>&laquo;$I18N_change&raquo;</i>, pour l'ajustement de l'�l�ment dans le dialogue suivant.</li>
	<li>D�pendamment de l'unit� n�cessaire, entrez vos donn�es:
		<ul>
			<li><b>$I18N_cronTimeBaseHourly:</b> La t�che sera d�marr�e chaque heure ou toutes les N heures � la minute indiqu�e.
				<ul>
					<li><b>$I18N_startMinute:</b> La minute de d�marrage de la t�che.</li>
					<li><b>$I18N_repeatEveryNHours:</b> L'intervalle entre les ex�cutions en heures (p.ex. 2 pour toutes les deux heures).</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseDayly:</b> La t�che sera d�marr�e chaque jour � l'heure indiqu�e.
				<ul>
					<li><b>$I18N_startMinute:</b> La minute de d�marrage de la t�che.</li>
					<li><b>$I18N_startHour:</b> L'heure de d�marrage de la t�che.</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseWeekly:</b> La t�che sera d�marr�e une fois par semaine � l'heure indiqu�e.
				<ul>
					<li><b>$I18N_startMinute:</b> La minute de d�marrage de la t�che.</li>
					<li><b>$I18N_startHour:</b> L'heure de d�marrage de la t�che.</li>
					<li><b>$I18N_dayOfWeek:</b> Le jour de la semaine de d�marrage de la t�che.</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>Enfin, cliquez sur <i>&laquo;$I18N_add&raquo;</i> pour ajouter la t�che.</li>
</ol>

<u>Effacer une t�che</u>
Vous pouvez effacer une t�che de la liste <i>&laquo;$I18N_cronEntries&raquo;</i> en cliquant sur <i>&laquo;$I18N_delete&raquo;</i> derri�re la t�che concern�e.
