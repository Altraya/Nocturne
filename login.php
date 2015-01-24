<?php 

require_once('ModelePrincipale.php');

$bdd = connexionBDD();

if(isset($_POST['email']) && isset($_POST['password'])) {
	$login=login();
}

	// Si il tente de se connecter
if(isset($login)){
	switch ($login) {
			//réussite
		case 1:
			header('Location: resultats/home.php');
			break;

			//echec
		case 2:
			echo "<div class = 'alert alert-success' role = 'alert'>";
			echo "Echec de connexion.";
			echo "</div>";
			break;
	}
}

function login(){

	$bdd = connexionBDD();

	$email = htmlspecialchars($_POST['email']);
	$pwd = sha1(htmlspecialchars($_POST['password']));

		//On requete la BDD pour la vérification du mdp
	$req = $bdd->prepare("SELECT USR_PWD FROM TM_USER_USR WHERE (:email=USR_email)");
	$req->execute(array("email" => $email));
	$pass = "";
	while($data = $req->fetch(PDO::FETCH_ASSOC)){
		$pass=$data['USR_PWD']; //récupération du hash du mot de passe dans la BDD
	}							
	if ($pass==$pwd){
		
			//récupérer l'id
		$req = $bdd->prepare("SELECT PK_USR FROM TM_USER_USR WHERE (:email=USR_email)");
		$req->execute(array("email" => $email));
		$id = $req->fetch(PDO::FETCH_ASSOC);

			//récupérer le nom
		$req = $bdd->prepare("SELECT USR_name FROM TM_USER_USR WHERE (:email=USR_email)");
		$req->execute(array("email" => $email));
		$name = $req->fetch(PDO::FETCH_ASSOC);

			//récupérer le prénom
		$req = $bdd->prepare("SELECT USR_firstname FROM TM_USER_USR WHERE (:email=USR_email)");
		$req->execute(array("email" => $email));
		$firstname = $req->fetch(PDO::FETCH_ASSOC);

		$_SESSION['id'] = $id;
		$_SESSION['name'] = $name;
		$_SESSION['firstname'] = $firstname;

		return 1;
	}
	else
	{ 
		return 2;
	}
}

 ?>