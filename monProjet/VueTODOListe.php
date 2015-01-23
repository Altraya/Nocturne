<?php

/*
	Vue de la todolist
*/


/*
Affiche le titre quand on est sur la page du membre
Exemple : ToDO List de Julien Renard
@param :
	prenom : prenom du membre connecté
	nom : nom du membre connecté
*/
function afficherDebutPage($prenom, $nom){
	$affiche = '';
	$affiche .= '<h1> ToDo List de '.$prenom.' '.$nom.' </h1>
	';
	echo($affiche);
} 
?>