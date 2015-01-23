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
		<th>Etat<th>
	';
	echo($vue);
}

?>
