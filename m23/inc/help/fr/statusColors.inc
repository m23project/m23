<!--V1.5 changed-->Lorsque vous cliquez sur le nom d'un client, des informations détaillées s'afficheront pour le client sélectionné; de plus, vous aurez accès au centre de contrôle.

<u>Signification des couleurs des symboles</u>
La couleur du symbole indique l'état de l'installation du poste client.
<ul>
<li><b>rouge:</b> Le poste client a été ajouté et la détection du matériel automatique n'est pas encore terminée.</li>
<li><b>jaune:</b> Vous pouvez formater et partitionner le poste client, le système de base et son interface graphique seront installés automatiquement.</li>
<li><b>vert:</b> Le système de base du poste client est installé et vous pouvez y ajouter les logiciels supplémentaires.</li>
<li><b>bleu:</b> Le poste client est en cours d'installation des logiciels supplémentaires.</li>
<!--V1.5 begin--><li><b>orange:</b> Le poste client est dans un <b>état critique</b>. Cela signifie qu'une erreur s'est produite pendant l'installation; elle doit être résolue par l'administrateur. Le centre de contrôle, vous propose plusieurs solutions afin de résoudre cet état critique.</li>
<li><b>blanc:</b> Poste client modèle pour l'installation de masse à partir duquel les configurations seront transmises aux autres postes client.</li>
<li><b>Bogue:</b> Indique que le poste client se trouve en mode de débogage.</li>
<!--V1.5 end-->
<!--V12.4 begin--><li><b>gris</b>: Ce client, purement virtuel, permet de sauvegarder les propriétés du client (IP, nom du client, MAC), dans le but qu'elles ne soient pas utilisées accidentellement.</li><!--V12.4 end-->
</ul>

<!--V1.11 begin--><u>$I18N_jobs</u>
Dans cette colonne, s'affiche le nombre des tâches en attente avant la barre oblique et le nombre total des tâches après celle-ci.<!--V1.11 end-->

<!--V1.5 begin--><u>Opérer sur plusieurs postes clients</u>
Sélectionnez plusieurs postes client en les cochant dans la liste correspondante.

Vous pouvez lancer les actions sur les postes client choisis:
<ul>
	<LI><b>$I18N_removeFromGroup:</b> Sélectionnez le groupe duquel les postes client seront à retirer. Si un poste client n'appartient pas dans ce groupe, aucune action ne sera excercée sur lui.</LI>
	<LI><b>$I18N_addToGroup:</b> Sélectionnez le groupe auquel seront ajoutés les postes client. Si un poste client est déjà dans ce groupe, son appartenance au groupe restera inchangée.</LI>
	<LI><b>$I18N_delete:</b> Efface les postes client sélectionnés</LI>
	<!--V12.3 begin-->
	<LI><b>$I18N_moveToGroup</b>: Cette fonction déplace un poste client dans un groupe différent.</LI>
	<LI><b>$I18N_recover</b>: Réinstallation complète des postes clients.</LI>
	<!--V12.3 end-->
        <!--V18.2 begin-->
	<LI><b>$I18N_redo_client_jobs</b>: Répète toutes les tâches ayant déja été exécutées sur le client m23.
        <!--V18.2 end-->
	<!--V16.4 begin-->
        <LI><b>$I18N_comparePackageStatus</b>: Comparaison de l'état des paquets entre deux postes clients.</LI>
        <!--V16.4 end-->
</ul><!--V1.5 end-->

<!--V1.2 begin--><u>Notez:</u>
Pour actualiser l'état de vos postes client, utilisez la fonction de rechargement de la page dans votre navigateur web (par exemple en appuyant sur la touche F5)<!--V1.2 end-->

<!--V1.5 begin--><u>Astuces</u>
En cliquant sur le symbole d'état d'un poste client, vous actualisez son état. Attention, vous ne devriez changer l'état d'un poste client que si vous savez exactement ce que vous faites.
Le mode de débogage peut être (dés)activé en cliquant sur l'icône du bogue.
<!--V1.5 end-->
