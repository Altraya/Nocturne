<?php 

	/*Permet de suivre l'avancement de chaque groupe au fil de la nuit*/

	function creationTitreAvancement(){
		$heure = date("H:i");
		$vue = '
			<h1 style="text-align:center;"> Résultat d\'Avancement - il est : '.$heure.' </h1>
		';

		echo ($vue);
	}

	function debutLigneAvancementEquipe(){
		$vue = '
			<div class="container">
				<div class="row">
					<ul>
		';

		echo ($vue);
	}

	function finLigneAvancementEquipe(){
		$vue = '
					</ul>
				</div>
			</div>
		';

		echo ($vue);
	}


	function ajouteLigne($nom, $taux)
	{
		$vue =  
		'<li class="list-unstyled">'
			.$nom.'
			<div class="progress" style="margin-left: 0%; margin-right: 95.833%">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow='.$taux.'aria-valuemin="0" aria-valuemax="100" style="width:100%;">'.$taux.'</div>
			</div>
		</li>';

		echo ($vue);	
	}


 ?>