<?php
/* 
	Controleur de la page des todolists persos.

RG1 : Les taches sont affichées par heure de début planifié puis par heure de fin planifiée
RG2 : Le bouton commencé n'est disponible que pour les taches non commencées
RG3 : Le bouton terminé n'est disponible que pour les taches en cours
RG4 : Les tâches terminées ne peuvent pas être modifiées
RG5 : Les items sont affichés avec la couleur de fond correspondante à leur catégorie (gestion
de projet : violet, qualité : vert, sécurité : bleu, système et réseau : jaune, développement : orange)
RG6 : Les poiroté MoSCoW doivent être affiches avec les couleurs suivantes : Must en rouge, Should en Orange,
Could en vert et Would en bleu
RG7 : pour chaque un picot peut apparaître : une coche verte pour les taches terminées,
une horloge orange pour les taches en cours, pas de picot sinon
RG8 : au clic sur le bouton commencer ou terminer, les heures réelles de début (pour commencer)
ou de fin (pour terminer) sont mises a jour avec le timestamp correspondant au moment du clic. 

*/
	//include des vues et modèles
	require_once('../ModelePrincipale.php');
	require_once('../VuePrincipale.php');
	require_once('VueTODOListe.php');
	require_once('ModeleTODOListe.class.php');

	connexionBDD();
	$modeleTODOListe = new ModeleTODOListe($bdd);

	//récupération du prenom et du nom du membre depuis la bdd

	$prenom = "jean";
	$nom = "charles";
	/*
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
	*/

	//affichage du titre sur la page
	afficherDebutPage($prenom, $nom);

	debutTableau();
		titreTableauTodoList();
		echo('<td>');
		//debug
		$idUtilisateur = 1;
		//if(isset($_SESSION['id'])){
			//$idUtilisateur = $_SESSION['id'];


			//recupere toutes les taches de l'utilisateur connecté
			$taches = getTaches($idUtilisateur);
			var_dump($taches);
		/*}else{
			errNonConnecte();
		}*/
		
		
		echo('</td>');


	finTableau();

?>