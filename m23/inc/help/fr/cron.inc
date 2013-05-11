<!--v10.0 new-->Avec le démon <a href="http://fr.wikipedia.org/wiki/Cron">cron</a>, des tâches se répètant à intervals fixes, peuvent être exécutées. Les éléments de ce dialogue vous aident à fixer l'heure pour l'exécution. Lorsqu'il y a des dates, vous les verrez dans le tableau avec le titre <i>&laquo;$I18N_cronEntries&raquo;</i>. Les tâches dans la file d'attente sont marquées d'un point blanc, les tâches qui sont en cours d'exécution avec un point orange.

<u>Processus étape par étape pour ajouter de nouvelles tâches</u>
<ol>
	<li>Sélectionnez d'abord l'unité de temps qu'il vous faut pour la tâche sous <i>&laquo;$I18N_cronTimeBase&raquo;</i></li>
	<li>Ensuite, cliquez sur <i>&laquo;$I18N_change&raquo;</i>, pour l'ajustement de l'élément dans le dialogue suivant.</li>
	<li>Dépendamment de l'unité nécessaire, entrez vos données:
		<ul>
			<li><b>$I18N_cronTimeBaseHourly:</b> La tâche sera démarrée chaque heure ou toutes les N heures à la minute indiquée.
				<ul>
					<li><b>$I18N_startMinute:</b> La minute de démarrage de la tâche.</li>
					<li><b>$I18N_repeatEveryNHours:</b> L'intervalle entre les exécutions en heures (p.ex. 2 pour toutes les deux heures).</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseDayly:</b> La tâche sera démarrée chaque jour à l'heure indiquée.
				<ul>
					<li><b>$I18N_startMinute:</b> La minute de démarrage de la tâche.</li>
					<li><b>$I18N_startHour:</b> L'heure de démarrage de la tâche.</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseWeekly:</b> La tâche sera démarrée une fois par semaine à l'heure indiquée.
				<ul>
					<li><b>$I18N_startMinute:</b> La minute de démarrage de la tâche.</li>
					<li><b>$I18N_startHour:</b> L'heure de démarrage de la tâche.</li>
					<li><b>$I18N_dayOfWeek:</b> Le jour de la semaine de démarrage de la tâche.</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>Enfin, cliquez sur <i>&laquo;$I18N_add&raquo;</i> pour ajouter la tâche.</li>
</ol>

<u>Effacer une tâche</u>
Vous pouvez effacer une tâche de la liste <i>&laquo;$I18N_cronEntries&raquo;</i> en cliquant sur <i>&laquo;$I18N_delete&raquo;</i> derrière la tâche concernée.
