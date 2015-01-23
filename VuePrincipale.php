<?php
	
/*	
	Vue principale qui permet l'affichage des balises etc.
*/

//demarre un tableau
function debutTableau(){
	echo('<table>');
}

//ferme un tableau
function finTableau(){
	echo('</table>');
}

function titreTableauTodoList(){
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

?>