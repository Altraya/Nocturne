<?php

/*
	Modèle de la todoliste :
		Gère les requetes avec la bdd 
*/

	//Récupère l'état, l'item, la priorité, la tache, heure de début/fin planifié puis réel des taches d'une personne précise (connectée) donné en paramètre
	function getTaches($idPersonne){

		$idPersonne = (string) $idPersonne;
		$data = array();

		$sql = "SELECT TSK_state, ITM_LIB, ITM_priority, TSK_LIB, TSK_start_hour_plan, TSK_end_hour_plan, TSK_start_hour_real, TSK_end_hour_real FROM TM_TASK_TSK INNER JOIN REF_ITEM_ITM ON FK_ITM = PK_ITM INNER JOIN TM_USER_USR ON FK_USR = PK_USR WHERE PK_USR = :idPersonne)";
		$req = $this->_db->prepare($sql);
		$req->bindParam(':idPersonne', $idPersonne, PDO::PARAM_STR);
		$req->execute();
		while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
			$data[] = $donnees;
		}
		$req->closeCursor();
		return $data;
	}
	
?>