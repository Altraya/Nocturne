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
		$prenom = (String) $prenom['USR_firstname'];
		$nom = (String) $nom['USR_name'];

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

/*	public function etat($etat){
		echo('<td>'.$etat.'</td>');
	}

	public function item($item){
		echo('<td>'.$item.'</td>');
	}

	public function priorite($priorite){
		echo('<td>'.$priorite.'</td>');
	}
	
	public function tache($tache){
		echo('<td>'.$tache.'</td>');
	}
*/
	public function ligneTableauTodoList($donnees){
		$vue = '';
		$vue .= '
			<tr>
				<td>'.$donnees["TSK_state"].'</td>
				<td>'.$donnees["ITM_LIB"].'</td>
				<td>'.$donnees["ITM_priority"].'</td>
				<td>'.$donnees["TSK_LIB"].'</td>
				<td>'.$donnees["TSK_start_hour_plan"].'</td>
				<td>'.$donnees["TSK_end_hour_plan"].'</td>
				<td>'.$donnees["TSK_start_hour_real"].'</td>
				<td>'.$donnees["TSK_end_hour_real"].'</td>
			</tr>
		';
		echo($vue);
	}

	public function heureReelDebut($heureDebut){
		echo("<td>'.$heureDebut.'</td>");
	}

	public function todoListSansHeuresReels($donnees){
		$vue = '';
		$vue .= '
			<tr>
				<td>'.$donnees[0]["TSK_state"].'</td>
				<td>'.$donnees[0]["ITM_LIB"].'</td>
				<td>'.$donnees[0]["ITM_priority"].'</td>
				<td>'.$donnees[0]["TSK_LIB"].'</td>
				<td>'.$donnees[0]["TSK_start_hour_plan"].'</td>
				<td>'.$donnees[0]["TSK_end_hour_plan"].'</td>
			</tr>
		';
		echo($vue);
	}
};
?>