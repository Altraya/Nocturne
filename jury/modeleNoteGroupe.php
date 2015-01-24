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
/*
function updateData($note,$idGrp,$idItem,$idDesc)
{
	
	$bdd = connexionBDD();
	$query = $bdd->prepare("UPDATE TABLE  FROM  INNER JOIN ref_item_itm ON PK_CAT=FK_CAT WHERE FK_CAT=:idCategorie");
	$query->bindParam(':idCategorie', $idCategorie,PDO::PARAM_INT);
	$query->execute();
	while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
			$data[]=$donnees;
		}
	

}
*/

function insertData($note,$idGrp,$idItem,$idComment)
{

	$bdd = connexionBDD();
	$query = $bdd->prepare("INSERT INTO tm_score_grp_itm_scr(FK_GRP, FK_ITM, SCR_score, SCR_comment) VALUES (:idGrp,:idItem,:idNote,:idComment) ");
	$query->bindValue(':idGrp', $idGrp,PDO::PARAM_INT);
	$query->bindValue(':idItem', $idItem,PDO::PARAM_INT);
	$query->bindValue(':idNote', $note,PDO::PARAM_INT);
	$query->bindValue(':idComment', $idComment,PDO::PARAM_STR);
	$query->execute();
}

function recupererNbLigne()
{
	$data = array();
	$bdd = connexionBDD();
	$query = $bdd->prepare("SELECT COUNT(*) FROM ref_item_itm");
	$query->execute();
	while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
			$data=$donnees;
		}
	return $data;
}

function recupererIdItem()
{
	$data = array();
	$bdd = connexionBDD();
	$query = $bdd->prepare("SELECT PK_ITM FROM ref_item_itm");
	$query->execute();
	while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
			$data=$donnees;
		}
	return $data;	

}



?>