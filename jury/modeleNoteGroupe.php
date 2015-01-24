<?php

require_once('../ModelePrincipale.php');

//récupère les différentes catégories existantes
function recuperationCategories()
{
	$data = array();
	$bdd = connexionBDD();
	$query = $bdd->prepare("SELECT * FROM ref_category_cat");
	$query->execute();
	while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$donnees;
		}
	return $data;
}

//récupère tout les items d'une categorie
function recuperationItems($idCategorie)
{
	$data = array();
	$bdd = connexionBDD();
	$query = $bdd->prepare("SELECT * FROM ref_item_itm INNER JOIN ref_category_cat ON FK_CAT=PK_CAT WHERE FK_CAT = ".$idCategorie);
	$query->execute();
	while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$donnees;
		}
	return $data;
}

function recupererTitre()
{
	
}


?>