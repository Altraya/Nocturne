<?php

require_once("../VuePrincipale.php");
require_once("./modeleNoteGroupe.php");
require_once("./vueNoteGroupe.php");
head();
creationNavbar();
if(isset($_GET['id']))
{
	debutFormulaireJury();
	debutTableau();
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
	finTableau();
	afficherValidation();
	finFormulaireJury();
}
else
{
	afficherErreur();
}









?>