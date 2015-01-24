<?php
	//require_once("VuePrincipale.php");
	require_once("ModelePrincipale.php");
	require_once("inscriptionVue.php");
	$bdd = connexionBDD();
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

	if($form_valide){ 
		$tab = valider($mail, $pwd1, $pwd2); //vérification : les champs sont-ils conformes ?
		
		if($tab["mail"] && $tab["mdp"]){ //tout est valide (pseudo, mdp, mail)

		// DEBUT VALIDE
			try {
				$req = $bdd->prepare("INSERT INTO TM_USER_USR (USR_role,USR_name,USR_firstname,USR_email,USR_PWD) VALUES (:role, :name, :fname, :mail, :mdp)");
				$req->execute(array(
					"name" => $nom,
					"fname" => $prenom,
					"role" => $role,
					"mail" => $mail,
					"mdp" => sha1($pwd1)));
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
			Ierror('1');
		// FIN VALIDE

		} else {

		// DEBUT INVALIDE
			if(!$tab["mail"]){ //mail invalide
				Ierror('2');
			}
			if(!$tab["mdp"]){ //mdp invalide
				Ierror('3');
			}
		}
		// FIN INVALIDE

		unset($_SESSION['token']);	
	}

		else if($submited) { //il manque des champs
				Ierror('4');
}


function valider($mail, $mdp1, $mdp2){ //renvoit un tableau associatif booléen qui valide ou non chaque entrée (mail valide ? etc)

		$bdd = connexionBDD();
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