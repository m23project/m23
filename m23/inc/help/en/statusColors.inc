<!--V1.5 changed-->If you click on the client name, you get detailed information about the selected client and can enter the control center.

<u>Status description</u>
The color marks the installation status of the client.
<ul><li><b>red</b>: Client is added, but hardware detection is not complete.
<li><b>yellow</b>: Now you can partition and format the client. A base system with graphical user interface is installed automatically.
<li><b>green</b>: The base system is installed, now you can add some additional software packages.
<li><b>blue</b>: Currently the client installs additional software.
<!--V1.5 begin--><li><b>orange</b>: The client is in the <b>critical state</b>. That means there was an error during installation which must be solved by the administrator. The control center gives you some solution proposals to solve the critical state.</li>
<li><b>white</b>: This is a master client for mass installation from whom the settings are transferred to the other clients.</li>
<li><b>bug</b>: The bug indicates that the client is in debug mode.</li>
<!--V1.5 end-->
</ul>

<!--V1.11 begin--><u>$I18N_jobs</u>
In this row you can see the amount of waiting jobs before and the amount of all jobs after the slash.<!--V1.11 end-->

<!--V1.5 begin--><u>Work on multiple clients</u>
Select the clients by checking the boxes in the client lines.

Now you can work on all selected clients::
<ul>
	<LI><b>$I18N_removeFromGroup</b>: Select the group, all clients should be deleted from. Nothing is done, if a client is not in the selected group.</LI>
	<LI><b>$I18N_addToGroup</b>: Select the group, all clients should be added to. Nothing is done, if a client already is in the selected group.</LI>
	<!--V12.3 begin-->
	<LI><b>$I18N_moveToGroup</b>: Moves the clients to another group.</LI>
	<LI><b>$I18N_recover</b>: Completely reinstalls the clients.</LI>
	<!--V12.3 end-->
	<LI><b>$I18N_delete</b>: Deletes the selected clients.</LI>
</ul><!--V1.5 end-->

<!--V1.2 begin--><u>Hint</u>
Use the refresh function of your browser to see the current status of your clients. (e.g. by pressing the F5 key).<!--V1.2 end-->

<!--V1.5 begin--><u>Gimmicks</u>
<ul><li>You can change the status of a client if you click on the according status symbol. You should only change the status if you know what you are doing.</li>
<li>The debug mode can be (de)activated by clicking the bug icon.</li></ul>
<!--V1.5 end-->
