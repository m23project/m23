
<span class="title"><?PHP echo("$I18N_changeJobs: $_GET[client]");?></span>

<br><br>

<?php
CLIENT_showJobs($_GET['client']);

CLIENT_HTMLBackToDetails($_GET['client'],$_GET['id'],"clientInformation");

help_showhelp("client_changejobs");
?>
