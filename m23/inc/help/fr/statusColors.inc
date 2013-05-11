<!--V1.5 changed-->Lorsque vous cliquez sur le nom d'un client, s'afficheront des informations détaillées sur le client sélectionné; de plus, vous aurez accès au centre de contrôle.

<u>Signification des couleurs symboliques</u>
Le couleur du symbol d'état indique l'état de l'installation du poste client.
<ul>
<li><b>rouge:</b> Le poste client a été ajouté et la détection du matériel automatique n'est pas encore terminée.</li>
<li><b>jaune:</b> Vous pouvez formater et partitionner le poste client, le système de base sera assigné automatiquement.</li>
<li><b>vert:</b> Le système de base du poste client est établi et vous pouvez installer les logiciels supplémentaires.</li>
<li><b>bleu:</b> Le poste client est en train d'installer des logiciels supplémentaires.</li>
<!--V1.5 begin--><li><b>orange:</b> Le poste client est dans un <b>état critique</b>. Cela veut dire qu'une erreur s'est produite pendant l'installation; elle doit être inhibée par l'administrateur. Dans le centre de contrôle, plusieures possibilités d'inhiber l'état critique sont offertes.</li>
<li><b>blanc:</b> Poste client modèle pour l'installation de masse dont les configurations seront transmises aux autres postes client.</li>
<li><b>Mouche (bogue):</b> Indique que le poste client se trouve en état de débogage.</li><!--V1.5 end-->
</ul>

<!--V1.11 begin--><u>$I18N_jobs</u>
Dans cette colonne, s'affiche le nombre des tâches en attente avant la barre oblique et le nombre total des tâches après celle-ci.<!--V1.11 end-->

<!--V1.5 begin--><u>Travailler plusieurs postes clients</u>
Vous pouvez choisir plusieurs postes client en mettant une coche dans la colonne des postes clients souhaités.

Puis, vous pouvez exercer des actions différentes sur les postes client choisis:
<ul>
	<LI><b>$I18N_removeFromGroup:</b> Sélectionnez le groupe duquel vous voulez effacer les postes client. Si un poste client n'appartient pas à ce groupe, aucune action sera excercé sur lui.</LI>
	<LI><b>$I18N_addToGroup:</b> Sélectionnez le groupe auquel vous souhaitez ajouter les postes client. Si un poste client appartient déjà à ce groupe, sa dépendance restera inchangée.</LI>
	<!--V12.3 begin-->
	<LI><b>$I18N_moveToGroup</b>: Cette fonction déplace un poste client dans un groupe différent.</LI>
	<LI><b>$I18N_recover</b>: Réinstallation complète du poste client.</LI>
	<!--V12.3 end-->
	<LI><b>$I18N_delete:</b> Efface les postes client sélectionnés</LI>
</ul><!--V1.5 end-->

<!--V1.2 begin--><u>Notez</u>
Pour voir l'état actuel de vos postes client, utilisez la fonction de rechargement de votre navigateur web (par exemple en appuyant sur la touche F5)<!--V1.2 end-->

<!--V1.5 begin--><u>Astuces</u>
En cliquant sur le symbole d'état d'un poste client, vous actualisez son état. Attention, vous devriez seulement changer l'état d'un poste client si vous savez exactement ce que vous faites.
Le mode de débogage peut être (dés)activé par un clic sur l'icône du bogue.
<!--V1.5 end-->
