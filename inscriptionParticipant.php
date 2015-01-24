<?php

	require_once("VuePrincipale.php");
	require_once("ModelePrincipale.php");
	head();
	creationNavbar();
	connexionBDD();
	$token = sha1(uniqid('auth',true));
	$_SESSION['token'] = $token;
	
	$submited=isset($_POST["valider_form"]);
	$form_valide=false;

	//formatage des données passée au formulaire
	if($submited){


		if(($_POST['pwd1']!="") && ($_POST['pwd2']!="")){
			$pwd1 = sha1(htmlspecialchars($_POST['pwd1']));
			$pwd2 = sha1(htmlspecialchars($_POST['pwd2']));
		}

		if($_POST['nom']!="")
			$nom = htmlspecialchars($_POST['nom']);

		if($_POST['prenom']!="")
			$prenom = htmlspecialchars($_POST['prenom']);

		if($_POST['mail']!="")
			$mail = htmlspecialchars($_POST['mail']);

		if($_POST['role']!="")
			$role = htmlspecialchars($_POST['role']);


		if(isset($pwd1) && isset($pwd2) && isset($nom) && isset($prenom) && isset($mail) && isset($role))
			$form_valide=true;
	}
	echo "<form method='POST' action='inscriptionParticipant.php'>
	<hr>
	<div class='form-group'>
		<h4> Inscription : </h4>
		<label>Nom  : </label><input type='text' name='nom' class='form-control' >
		<label>Prenom  : </label><input type='text' name='prenom' class='form-control'>
		<label>Mail : </label><input type='text' name='mail' class='form-control' placeholder='Entrez votre email' >
		<label>Role : </label><input type='text' name='role' class='form-control' placeholder='Votre role'>
		<label>Mot de passe : </label><input type='password' name='pwd1' class='form-control' placeholder='Votre mot de passe'>
		<label>Confirmation de mot de passe : </label><input type='password' name='pwd2' class='form-control' placeholder='Votre mot de passe, encore une fois !'>
		<input type='hidden' name='token' value='<?php echo $token?>'>
	</div>
	<button class='btn btn-primary' type='submit' name='valider_form'>S'inscrire</button>
	<hr>
</form>";

if($form_valide){
		$tab = valider($mail, $pwd1, $pwd2, $role); //vérification : les champs sont-ils conformes ?
		
		if($tab["pseudo"] && $tab["mail"] && $tab["mdp"] && $tab["role"]){ //tout est valide (pseudo, mdp, mail)

		// DEBUT VALIDE
			try {
				$req = $bdd->prepare("INSERT INTO TM_USER_USR (USR_role,USR_name,USR_firstname,USR_email,USR_PWD) VALUES (:role, :name, :fname, :mail, :mdp)");
				$req->execute(array(
					"name" => $nom,
					"fname" => $prenom,
					"role" => $role,
					"mail" => $mail,
					"mdp" => $pwd1));
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
			echo "<div class = 'alert alert-success' role = 'alert'>";
			echo 	"Inscription effecuée ! <a href='index.php'>Retour à l'accueil</a>";
			echo "</div>";
		// FIN VALIDE

		} else {

		// DEBUT INVALIDE
			if(!$tab["mail"]){ //mail invalide
				echo "<div class = 'alert alert-danger' role = 'alert'>";
				echo 	"Erreur : le mail n'est pas valide ou déja utilisé";
				echo "</div>";
			}
			if(!$tab["mdp"]){ //mdp invalide
				echo "<div class = 'alert alert-danger' role = 'alert'>";
				echo 	"Erreur : les deux mots de passe doivent être identiques.";
				echo "</div>";
			}
		}
		// FIN INVALIDE

		unset($_SESSION['token']);	
	}

		else if($submited) { //il manque des champs
				echo "<div class = 'alert alert-danger' role = 'alert'>";
				echo "Erreur : tous les champs sont obligatoires.";
				echo "</div>";
		}


	function valider($mail, $mdp1, $mdp2){ //renvoit un tableau associatif booléen qui valide ou non chaque entrée (mail valide ? etc)
		global $bdd;
		connexionBDD();
		$result=array(	"mail"=>"false",
						"mdp"=>"false");

		//pseudo
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //variable créée dans le include.
		$req = $bdd->prepare("SELECT USR_email FROM TM_USER_USR WHERE USR_email=:mail");
		$req->execute(array("mail" => $mail));
		$i=0; //compteur de fois que le pseudo apparait dans la bd (0 ou 1)
		while ($res = $req->fetch(PDO::FETCH_ASSOC)) { 
			$i++;
		}
		$result["mail"]=($i==0);

		//mail
		$result["mail"]=(filter_var($mail, FILTER_VALIDATE_EMAIL));

		//mdp
		$result["mdp"]=($mdp1==$mdp2);

		return $result;
	}

?>