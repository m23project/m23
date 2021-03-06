<!--V1.5 changed-->Lorsque vous cliquez sur le nom d'un client, des informations d�taill�es s'afficheront pour le client s�lectionn�; de plus, vous aurez acc�s au centre de contr�le.

<u>Signification des couleurs des symboles</u>
La couleur du symbole indique l'�tat de l'installation du poste client.
<ul>
<li><b>rouge:</b> Le poste client a �t� ajout� et la d�tection du mat�riel automatique n'est pas encore termin�e.</li>
<li><b>jaune:</b> Vous pouvez formater et partitionner le poste client, le syst�me de base et son interface graphique seront install�s automatiquement.</li>
<li><b>vert:</b> Le syst�me de base du poste client est install� et vous pouvez y ajouter les logiciels suppl�mentaires.</li>
<li><b>bleu:</b> Le poste client est en cours d'installation des logiciels suppl�mentaires.</li>
<!--V1.5 begin--><li><b>orange:</b> Le poste client est dans un <b>�tat critique</b>. Cela signifie qu'une erreur s'est produite pendant l'installation; elle doit �tre r�solue par l'administrateur. Le centre de contr�le, vous propose plusieurs solutions afin de r�soudre cet �tat critique.</li>
<li><b>blanc:</b> Poste client mod�le pour l'installation de masse � partir duquel les configurations seront transmises aux autres postes client.</li>
<li><b>Bogue:</b> Indique que le poste client se trouve en mode de d�bogage.</li>
<!--V1.5 end-->
<!--V12.4 begin--><li><b>gris</b>: Ce client, purement virtuel, permet de sauvegarder les propri�t�s du client (IP, nom du client, MAC), dans le but qu'elles ne soient pas utilis�es accidentellement.</li><!--V12.4 end-->
</ul>

<!--V1.11 begin--><u>$I18N_jobs</u>
Dans cette colonne, s'affiche le nombre des t�ches en attente avant la barre oblique et le nombre total des t�ches apr�s celle-ci.<!--V1.11 end-->

<!--V1.5 begin--><u>Op�rer sur plusieurs postes clients</u>
S�lectionnez plusieurs postes client en les cochant dans la liste correspondante.

Vous pouvez lancer les actions sur les postes client choisis:
<ul>
	<LI><b>$I18N_removeFromGroup:</b> S�lectionnez le groupe duquel les postes client seront � retirer. Si un poste client n'appartient pas dans ce groupe, aucune action ne sera excerc�e sur lui.</LI>
	<LI><b>$I18N_addToGroup:</b> S�lectionnez le groupe auquel seront ajout�s les postes client. Si un poste client est d�j� dans ce groupe, son appartenance au groupe restera inchang�e.</LI>
	<LI><b>$I18N_delete:</b> Efface les postes client s�lectionn�s</LI>
	<!--V12.3 begin-->
	<LI><b>$I18N_moveToGroup</b>: Cette fonction d�place un poste client dans un groupe diff�rent.</LI>
	<LI><b>$I18N_recover</b>: R�installation compl�te des postes clients.</LI>
	<!--V12.3 end-->
        <!--V18.2 begin-->
	<LI><b>$I18N_redo_client_jobs</b>: R�p�te toutes les t�ches ayant d�ja �t� ex�cut�es sur le client m23.
        <!--V18.2 end-->
	<!--V16.4 begin-->
        <LI><b>$I18N_comparePackageStatus</b>: Comparaison de l'�tat des paquets entre deux postes clients.</LI>
        <!--V16.4 end-->
</ul><!--V1.5 end-->

<!--V1.2 begin--><u>Notez:</u>
Pour actualiser l'�tat de vos postes client, utilisez la fonction de rechargement de la page dans votre navigateur web (par exemple en appuyant sur la touche F5)<!--V1.2 end-->

<!--V1.5 begin--><u>Astuces</u>
En cliquant sur le symbole d'�tat d'un poste client, vous actualisez son �tat. Attention, vous ne devriez changer l'�tat d'un poste client que si vous savez exactement ce que vous faites.
Le mode de d�bogage peut �tre (d�s)activ� en cliquant sur l'ic�ne du bogue.
<!--V1.5 end-->
