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
function recuperationItems($idCategorie,$idGrp)
{
	$data = array();
	$bdd = connexionBDD();
	$query = $bdd->prepare("SELECT PK_ITM,ITM_LIB,ITM_weight,ITM_DESC FROM ref_category_cat INNER JOIN ref_item_itm ON PK_CAT=FK_CAT WHERE FK_CAT=:idCategorie");
	$query->bindParam(':idCategorie', $idCategorie,PDO::PARAM_INT);
	$query->execute();
	while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$donnees;
		}
	return $data;
}




?>