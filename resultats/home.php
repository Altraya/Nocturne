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
	//Taux avancement par groupe
	ligneAvancementEquipe(recupereTauxAvancement());



?>