<?php
require_once('ModelPrincipale.php');
		$bdd = connexionBDD();
function addtache(){
	if (isset($_POST['creation'])) {
		$nom=> $_POST['nomTache'];
		$ressource => $_POST['ressource'];
		$item => $_POST['item'];
		$debut => $_POST['debut'];
		$fin => $_POST['fin']

		$req = $bdd->prepare("INSERT INTO tm_task_tsk SET   ")
		
	}

}



?>