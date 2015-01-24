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

///////////////////////////////// GESTION FORMULAIRE /////////////////////////////
function debutFormulaire()
{
	echo'<form action="./NoteGroupe.php" method="POST"';
}

function finForm()
{
	echo'</form>';
}

////////////////////////////// GESTION TABLEAU ////////////////////////////////
function debutTableau()
{
	echo'<table>';
}

function finTableau()
{
	echo'</table>';
}
?>