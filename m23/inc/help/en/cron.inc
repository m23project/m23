<!--v10.0 new-->The <a href="http://en.wikipedia.org/wiki/Cron">cron</a> daemon executes recurrent jobs at defined points in time and these can be defined with the dialog elements. Points in time for the current job are shown in a table under the heading <i>"$I18N_cronEntries"</i>, if there are any. Waiting jobs are marked with a white dot and running jobs with an orange dot.

<u>Step by step: Adding a new job</u>
<ol>
	<li>Choose the time base you want to schedule the job for at <i>"$I18N_cronTimeBase"</i> first.</li>
	<li>Now click on <i>"$I18N_change"</i> to adjust the next dialog elements.</li>
	<li>You need to insert different values dependent on your previous choice:
		<ul>
			<li><b>$I18N_cronTimeBaseHourly</b>: The job will be executed every hour or every N'th hour at the given minute.
				<ul>
					<li><b>$I18N_startMinute</b>: The minute the job will be started.</li>
					<li><b>$I18N_repeatEveryNHours</b>: The interval between the runs in hours. (E.g. 2: execute every two hours).</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseDayly</b>: The job will be executed every day at the given time.
				<ul>
					<li><b>$I18N_startMinute</b>: The minute the job will be started.</li>
					<li><b>$I18N_startHour</b>: The hour the job will be started.</li>
				</ul>
			</li>
			<li><b>$I18N_cronTimeBaseWeekly</b>: The job will be started on a given day of week at a given time.
				<ul>
					<li><b>$I18N_startMinute</b>: The minute the job will be started.</li>
					<li><b>$I18N_startHour</b>: The hour the job will be started.</li>
					<li><b>$I18N_dayOfWeek</b>: The day of week the job will be started.</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>Click on <i>"$I18N_add"</i> to add the job finally.</li>
</ol>

<u>Deletion of jobs</u>
Choose the entry from the list under <i>"$I18N_cronEntries"</i> and click on <i>"$I18N_delete"</i>.