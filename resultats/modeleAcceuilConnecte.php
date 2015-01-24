<?php

	require_once("../ModelePrincipale.php");

	//Retourne les lignes d'avancement des équipes
	//retourne le nom
	function recupereNomEquipe(){
		$data = array();

		$bdd = connexionBDD();
		$query = $bdd->prepare("SELECT GRP_LIB FROM tm_group_grp;");
		$query->execute();
		while($donne = $query->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $donne;
			}

		return $data;
	}


	function recupereTauxAvancement(){
		$data = array();

		$bdd = connexionBDD();
		$query = $bdd->prepare("SELECT TSK_state,COUNT(PK_TSK) FROM tm_task_tsk ORDER BY FK_ITM;");
		$query->execute();
		while($donne = $query->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $donne;
			}

		return $data;

	}

	function tauxAvancementItem($tauxEquipe)
	{
		$taux = 0;
		$itemTotal = 0;

		$resultat = 0;
		foreach($tauxEquipe as $key => $value)
		{
			switch($value['TSK_state'])
			{
				case(0) :
					$resultat .= 100;
					break;
				case(1) : 
					$resultat .= 50;
					break;
				case(NULL) :
					$resultat .= 0;
					break;
			}

			$itemTotal = $key + 1;		//nombre item
		}

		if($itemTotal!=0){
			$taux = $resultat/$itemTotal;
		}

		return $taux;
	}




?>