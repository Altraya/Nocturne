<?php
	require_once ("../VuePrincipale.php");
	require_once ("vueAcceuilConnecte.php");
	require_once ("modeleAcceuilConnecte.php");

	//Head
	head();
	//Creation de la barre de navigation du haut
	creationNavbar();

	//Affiche le titre de la page d'avancement
	creationTitreAvancement();
	//Affiche un tableau avec pour ligne le nom de l'équipe et son taux d'avancement
	ligneAvancementEquipe(recupereNomEquipe(),recupereTauxAvancement());

	//navbar vertical sponsors
	sponsors();



?>