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

	$nomEquipe = recupereNomEquipe();
	$tauxEquipe = recupereTauxAvancement();

	//DEBUG
	var_dump($nomEquipe);
	var_dump($tauxEquipe);

	//Affiche une liste avec pour ligne le nom de l'équipe et son taux d'avancement
	debutLigneAvancementEquipe();
	foreach($nomEquipe as $key => $nom)
	{
		$tauxAvancementItem = tauxAvancementItem($tauxEquipe);
		ajouteLigne($nom['GRP_LIB'],$tauxAvancementItem);
	}
	finLigneAvancementEquipe();

	//navbar vertical sponsors
	//sponsors();

?>