<?php

require_once("../VuePrincipale.php");
require_once("./modeleNoteGroupe.php");
require_once("./vueNoteGroupe.php");

head();
creationNavbar();
if (isset($_POST['Check'])) {
	
	$tableauID = recupererIdItem();
	foreach ($tableauID as $key => $value) {
		insertData($_POST['note'.$value],$_POST['idGrp'],$value,$_POST['comment'.$value]); 
	}
}
elseif(isset($_GET['id']))
{
	
	debutTableau();
	debutFormulaireJury();
	afficherTitre();
	$categories= recuperationCategories();
	foreach ($categories as $key => $value) 
	{
		afficherCategorie($value['CAT_LIB']);
		$items=recuperationItems($value['PK_CAT'],$_GET['id']);
		foreach ($items as $key2 => $value2)
		{
			afficherLigneItem($value2);
			
		}


	}
	cacherIdentifiantGroupe($_GET['id']);
	afficherValidation();
	finTableau();
	finFormulaireJury();
}
else
{
	afficherErreur();
}









?>