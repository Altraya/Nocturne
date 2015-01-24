<?php 

	require_once"vueHome.class.php";
	require_once"VuePrincipale.php";
	require_once"config.php";

	$bdd = connexionBDD();

	
	$vue = new vueHome($bdd);

	head();

	//Création de compte 		
	$vue->creationCompte();
	
	// Connection 
	$vue->afficherFormulaireConnection(); 
	

	//Affichage des sponsorts
	$vue->sponsors();
?>