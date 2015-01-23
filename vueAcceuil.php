<?php 

	//Vue de l'acceuil

		//Affiche les liens vers l'inscription pour les participants et les jury
	function creationCompte(){
		$vue = '
		<div class="creation">
			<p>Vous n\'êtes pas encore inscrit ?</p>
			<a href="inscriptionParticipant.php">S\'inscrire comme participant</a>
			<a href="inscriptionJury.php">S\'inscrire comme jury</a>
		</div>
		';
		echo($vue);
	}

		//Affiche le formulaire de connection (entrer email et mdp)
	function afficherFormulaireConnection(){
		$vue ='
		<div class="connection">
			<form action="config.php" method="">
			
				<label for="pseudo">Votre pseudo :</label>
					<input type="text" name="email" placeholder="Email" />
					<br>

				<label for="pass">Votre mot de passe :</label>
					<input type="password" name="pseudo"  placeholder="Mot de passe"/>
					<input type="submit" value="Valider" />
					<br>

			</form>
		</div>
		';
		echo($vue);
	}

		//affiche la banière contenant les sponsorts
	function sponsorts(){
		$vue ='
		<div class="sponsorts">
		</div>
		';
		echo($vue);
	}

 ?>