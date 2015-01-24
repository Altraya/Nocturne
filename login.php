<?php 
session_start();

require_once('ModelePrincipale.class.php');
require_once('vueHome.class.php');
require_once('config.php');

$bdd = connexionBDD();

$modelePrincipale = new ModelePrincipale($bdd);
$vue = new vueHome();

	if(isset($_POST['email']) && isset($_POST['password'])) {
		//recupere les données envoyé par le formulaire
		$email = htmlspecialchars($_POST['email']);
		$pwd = sha1(htmlspecialchars($_POST['password']));

		//récupère le mdp en bdd de l'utilisateur
		$pass = $modelePrincipale->getPassword($email);

		//si cest le meme que rentré
		if ($pass==$pwd){

			$_SESSION['id'] = $modelePrincipale->getIdUtilisateur($email);

			//récupère le nom
			$_SESSION['nom'] = $modelePrincipale->getNom($email);

			//récupère le prenom
			$_SESSION['prenom'] = $modelePrincipale->getPrenom($email);

			//redirige vers resultats/home.php
			//header("Location: resultats/home.php");
		}else{ 
			//erreur pas le bon mdp
			$vue->errMdp();
		}

		header("Location: resultats/home.php");
	}


 ?>