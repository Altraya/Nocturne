<?php

/////////////////////////////////// GESTION CATEGORIE ET NOTES //////////////////////
//affiche les categorie selon 
function afficherCategorie($categorie)
{
	echo'<tr><td><h2>'.$categorie.'</h2></td></tr>';
}

function afficherLigneCategorie($donneesItem)
{
	echo'';
}

function gestionAccents()
{
	echo "<meta charset='UTF-8'>";
}


function cacherIdentifiantGroupe($id)
{
	echo'<input type="hidden" value='.$id.' name="idGrp"\>';
	
}

function afficherLigneItem($valeurs)
{
	echo'<tr><td>'.$valeurs["ITM_LIB"].'</td>
	<td>N/A</td>
	<td><input type="text"  name="note'.$valeurs["PK_ITM"].'"\>/</td>
	<td><input type="text"  name="comment'.$valeurs["PK_ITM"].'"\></td>
	</tr>';
}


function afficherErreur()
{
	echo'<p>Merci de selectionner un groupe </p>';
}

function afficherValidation()
{
	echo'<input type="submit" value="Valider" name="Check"\>';
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
	echo'<form action="./NoteGroupe.php" method="POST">';
}

function finFormulaireJury()
{
	echo'</form>';
}

?>