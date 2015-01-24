<?php
/*config.php connexion a la bdd*/

//Permet de se connecter à la DB avec un PDO
function connexionBDD()
{
	try {

		$bdd = new PDO('mysql:host=localhost;dbname=nuit_du_projet','web','cambart');
			
	}catch (PDOException $e) {
		
		die("Connexion à la base de donnée impossible:".$e->getMessage());
	}
	return $bdd;
}

?>