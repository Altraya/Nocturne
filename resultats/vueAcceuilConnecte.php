<?php 

	/*Permet de suivre l'avancement de chaque groupe au fil de la nuit*/

	function creationTitreAvancement(){
		$heure = date("H:i");
		$vue = '
			<h1 style="text-align:center;"> Résultat d\'Avancement - il est : '.$heure.' </h1>
		';

		echo ($vue);
	}

	function ligneAvancementEquipe($nom){
		$vue = '
			<div class="container">
				<div class="row">
					<ul>
						<li>'.$nom.'</li>
					</ul>
				</div>
			</div>

		';

		echo ($vue);
	}



 ?>