<?php

/////////////////////////////////// GESTION CATEGORIE ET NOTES //////////////////////
//affiche les categorie selon 
function afficherCategorie($categorie)
{
	echo'<tr><h2>'.$categorie.'</h2></tr>';
}

function afficherLigneCategorie($donneesItem)
{
	echo'';
}

function afficherLigneItem($valeurs)
{
	echo'<tr>
	<td>
	'.$valeurs["ITM_LIB"].'
	</td>
	
	<td>
	N/A
	</td>
	
	<td>
	<input type="text"  id="note'.$valeurs["PK_ITM"].'"\>/
	</td>
	
	<td>
	<input type="text"  id="comment'.$valeurs["PK_ITM"].'"\>
	</td>

	<tr>';
}


function afficherErreur()
{
	echo'<p>Merci de selectionner un groupe </p>';
}

function afficherValidation()
{
	echo'<input type="submit" value="Valider" id="Check"\>';
}

function afficherTitre()
{
	echo '<tr>
	<th>Categorie</th>
	<th>Progression</th>
	<th>Notes</th>
	<th>Commentaires</th>
	</tr>
	';
}

///////////////////////////////// GESTION FORMULAIRE /////////////////////////////
function debutFormulaireJury()
{
	echo'<form action="./NoteGroupe.php" method="POST"';
}

function finFormulaireJury()
{
	echo'</form>';
}

?>