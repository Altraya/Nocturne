<?php
require_once("../VuePrincipale.php");

function formInscription($role) {
	head();
	creationNavbar();
	echo "<form method='POST' action='inscriptionModele.php'>
	<hr>
	<div class='form-group'>
		<h4> Inscription : </h4>
		<label>Nom  : </label><input type='text' name='nom' class='form-control' >
		<label>Prenom  : </label><input type='text' name='prenom' class='form-control'>
		<label>Mail : </label><input type='text' name='mail' class='form-control' placeholder='Entrez votre email' >
		<input type='hidden' name='role' value='$role'>
		<label>Mot de passe : </label><input type='password' name='pwd1' class='form-control' placeholder='Votre mot de passe'>
		<label>Confirmation de mot de passe : </label><input type='password' name='pwd2' class='form-control' placeholder='Votre mot de passe, encore une fois !'>
		<input type='hidden' name='token' value='<?php echo $token?>'>
	</div>
	<button class='btn btn-primary' type='submit' name='valider_form'>S'inscrire</button>
	<hr>
</form>";
}

function Ierror($type) {
	head();
	creationNavbar();
	switch ($type) {
		case '1':
				echo "<div class = 'alert alert-success' role = 'alert'>";
				echo 	"Inscription effecuée ! <a href='localhost/Nocturne/inscription/home.php'>Retour à l'accueil</a>";
				echo "</div>";
			break;
		
		case '2':
				echo "<div class = 'alert alert-danger' role = 'alert'>";
				echo 	"Erreur : le mail n'est pas valide ou déja utilisé";
				echo "</div>";
			break;

		case '3': 
				echo "<div class = 'alert alert-danger' role = 'alert'>";
				echo 	"Erreur : les deux mots de passe doivent être identiques.";
				echo "</div>";
			break;

		case '4':
				echo "<div class = 'alert alert-danger' role = 'alert'>";
				echo "Erreur : tous les champs sont obligatoires.";
				echo "</div>";
			break;

	}
}

?>