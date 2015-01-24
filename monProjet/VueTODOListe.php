<?php

/*
	Vue de la todolist
*/
class VueTODOListe{

	private $_db;

	public function __construct($db){
		$this->setDb($db);
	}

	public function setDb(PDO $db){
		$this->_db = $db;
	}

	/*
	Affiche le titre quand on est sur la page du membre
	Exemple : ToDO List de Julien Renard
	@param :
		prenom : prenom du membre connecté
		nom : nom du membre connecté
	*/
	public function afficherDebutPage($prenom, $nom){
		$affiche = '';
		$affiche .= '<h1> ToDo List de '.$prenom.' '.$nom.' </h1>
		';
		echo($affiche);
	} 

	//affiche les titres du tableau de la todolist
	public function titreTableauTodoList(){
		$vue = '';
		$vue .='
			<tr>
				<th>Etat</th>
				<th>Item</th>
				<th>Priorité</th>
				<th>Tache</th>
				<th>Heure début</th>
				<th>Heure fin</th>
				<th>Heure début</th>
				<th>Heure fin</th>
			</tr>
		';
		echo($vue);
	}
};
?>