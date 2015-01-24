<?php

/*
	Modèle principal qui va servir à faire des requêtes dans tout le site.
*/
class ModelePrincipale{

private $_db;

public function __construct($db){
	$this->setDb($db);
}

public function setDb(PDO $db){
	$this->_db = $db;
}

//Permet d'obtenir le mot de passe d'un utilisateur depuis son email
public function getPassword($email){
	/*$sql = "SELECT USR_PWD FROM TM_USER_USR WHERE USR_email = :email";
	$req = $this->_db->prepare($sql);
	$req->bindParam(':email', $email, PDO::PARAM_STR);
	$req->execute();*/

	$req = $this->_db->prepare("SELECT USR_PWD FROM TM_USER_USR WHERE (:email=USR_email)");
	$req->execute(array("email" => $email));
	$pass = "";
	while($data = $req->fetch(PDO::FETCH_ASSOC)){
		$pass=$data['USR_PWD']; //récupération du hash du mot de passe dans la BDD
	}	

	return $pass;
}

//récupère l'id de l'utilisateur dont on donne le mail
public function getIdUtilisateur($email){
	//récupérer l'id
	$req = $this->_db->prepare("SELECT PK_USR FROM TM_USER_USR WHERE (:email=USR_email)");
	$req->execute(array("email" => $email));
	$id = $req->fetch(PDO::FETCH_ASSOC);
	return $id;
}

//récupère le nom de l'utilisateur dont on donne le mail
public function getNom($email){
	//récupérer le nom
	$req = $this->_db->prepare("SELECT USR_name FROM TM_USER_USR WHERE (:email=USR_email)");
	$req->execute(array("email" => $email));
	$name = $req->fetch(PDO::FETCH_ASSOC);
	return $name;
}

//récupère le prenom de l'utilisateur dont on donne le mail
public function getPrenom($email){

	//récupérer le prénom
	$req = $this->_db->prepare("SELECT USR_firstname FROM TM_USER_USR WHERE (:email=USR_email)");
	$req->execute(array("email" => $email));
	$firstname = $req->fetch(PDO::FETCH_ASSOC);

}

};
?>