<?php

/////////////////////////////////// GESTION CATEGORIE ET NOTES //////////////////////
//affiche les categorie selon 
function afficherCategorie($categorie)
{
	echo'<h2>'.$categorie.'</h2>';
}

function afficherLigneCategorie($nomItem)
{
	echo'';
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