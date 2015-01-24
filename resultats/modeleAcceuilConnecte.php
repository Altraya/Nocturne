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
		$query = $bdd->prepare("SELECT GRP_LIB FROM tm_group_grp;");
		$query->execute();
		while($donne = $query->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $donne;
			}

		return $data;

	}






?>