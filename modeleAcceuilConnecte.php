<?php

	require_once"vueAcceuilConnecté.php";
	require_once"VuePrincipale.php";

	require_once"ModelePrincipale.php";

	//Retourne les lignes d'avancement des équipes
	//notamment nom + taux d'avancement
	function afficheAvancementEquipe(){
		connexionBDD($bdd);
		$query = $bdd->prepare("")
	}

	//Head
	head();

	//creation de la barre de navigation du haut
	creationNavbar();





?>