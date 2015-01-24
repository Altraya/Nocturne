<?php 

	require_once"modeleAcceuilConnecte.php";

	/*Permet de suivre l'avancement de chaque groupe au fil de la nuit*/

	function creationTitreAvancement(){
		$vue = '
			<h1 style="text-align:center;"> Résultat d\'Avancement - il est : <!--/DateTime()--> </h1>
		';

		echo ($vue);
	}

	function ligneAvancementEquipe(){
		$vue = '
			<div class="container">
				<div class="row">
					<ul>
					</ul>
				</div>
			</div>

		';

		echo ($vue);
	}



 ?>