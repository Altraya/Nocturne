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
	session_start();

	//include des vues et modèles
	require_once('../config.php');
	require_once('../ModelePrincipale.class.php');
	require_once('../VuePrincipale.php');
	require_once('VueTODOListe.php');
	require_once('ModeleTODOListe.class.php');
	head();
	$bdd = connexionBDD();
	$modeleTODOListe = new ModeleTODOListe($bdd);
	$vue = new VueTODOListe($bdd);

	//récupération du prenom et du nom du membre depuis la bdd

	/*$prenom = "jean";
	$nom = "charles";*/

	//si on est bien connecté, on recupere l'id nom prenom du membre co
	if(isset($_SESSION['id'])){
		$idUtilisateur = $_SESSION['id'];
		$prenom = $_SESSION['prenom'];
		$nom = $_SESSION['nom'];
	
		//affichage du titre sur la page
		$vue->afficherDebutPage($prenom, $nom);

		//recupere toutes les taches de l'utilisateur connecté
		$taches = $modeleTODOListe->getTaches($idUtilisateur);
		/*$etat = $taches[0]["TSK_state"];
		$item = $taches[0]["ITM_LIB"];
		$priorite = $taches[0]["ITM_priority"];
		$tache = $taches[0]["TSK_LIB"];*/
		$heureReelDebut = $taches[0]["TSK_start_hour_real"];

		//affichage
		debutTableau();
			$vue->titreTableauTodoList();
			echo('<tr>');
				/*$vue->etat($etat);
				$vue->item($item);
				$vue->priorite($priorite);
				$vue->tache($tache);*/

				$vue->todoListSansHeuresReels($taches);

				//coupe ce qui est donné en bdd pour avoir que l'heure
				$heureExplode = explode(' ', $taches[0]["TSK_start_hour_real"]);
				$heureExplode = $heureExplode[1]; //prend l'heure sous la force 03:00:00 //ceci est un string

				$heureExplode = explode(':', $heureExplode); //divise en 3 => donne 03 00 00

				//met l'heure en min pour qu'on puisse comparer
				/*$heure = (int) $heureExplode[0];
				$min = (int) $heureExplode[1];
				$heureReelCompare =  '';
				$heureReelCompare .= $heure;
				$heureReelCompare .= ',';
				$heureReelCompare .= $min;
				//donne un string avec l'heure genre 3,0 pour pouvoir comparer

				var_dump($heureReelCompare);

				$heureExplode = $heureExplode[0] .'h'.$heureExplode[1].'';

				var_dump($heureExplode);

				//si on a deja commencé la tache donc que l'heure actuelle est apres l'heure de debut de la tache
				//if($heureReelCompare < (string) date("H:i")){


					//$vue->heureReelDebut($heureReelDebut);
					
				}*/
				foreach ($taches as $tacheuh => $tache) {
					$vue->ligneTableauTodoList($tache);
				}

				//$vue->ligneTableauTodoList($taches);
			echo('</tr>');
		finTableau();
	}else{
		errNonConnecte();
	}	
		
	

?>