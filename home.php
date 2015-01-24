<?php 

	require_once"vueHome.php";
	require_once"VuePrincipale.php";
	
	head();

	//Création de compte 		
	creationCompte();
	

	// Connection 
	afficherFormulaireConnection(); 
	

	//Affichage des sponsorts
	sponsors();
?>