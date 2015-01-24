<?php
	
/*	
	Vue principale qui permet l'affichage des balises etc.
*/
	function head(){
		$head = "

		<!DOCTYPE html>
			<html lang='fr'>
				<head>
				    <meta charset='UTF-8'>
				    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
				    <meta name='viewport' content='width=device-width, initial-scale=1'>
				    <title>Accueil</title>

				    <!-- Bootstrap -->
				    <link href='css/bootstrap.css' rel='stylesheet'>
				        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
				    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
				    <!-- Include all compiled plugins (below), or include individual files as needed -->
				    <script src='js/bootstrap.min.js'></script>

				    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
				    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
				    <!--[if lt IE 9]>
				    	<script src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js'></script>
				    	<script src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js'></script>
				    <![endif]-->
				</head>
		<body>
		";
  		echo($head);
	}


//demarre un tableau
function debutTableau(){
	echo('<table>');
}

//ferme un tableau
function finTableau(){
	echo('</table>');
}

function creationNavbar(){
	$heure = date("H:i");
	$vue = '

	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
	    	<div class="navbar-header">
	      		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		        	<span class="sr-only" >Basculer la navigation</os-p></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
	      		</button>
	      <a class="navbar-brand" href="home.php">Projet</a>
	    </div>


	    <div id="navbar" class="collapse navbar-collapse">
	      	<ul class="nav navbar-nav">
		        <li class="active"><a href="home.php">Home</a></li>
			        <li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Jury<span class="caret"></span></a>
			        	<ul class="dropdown-menu" role="menu">
			        	';
		foreach ($data as $key => $value) {
			$vue.='<li><a href="./jury/NoteGroupe.php?id="'.$value["PK_GRP"].'>'.$value["GRP_LIB"].'</a></li>';
		}
			        $vue.='
			        	</ul>

			        </li>
		        <li><a href="#about">Ressources</a></li>
		        <li><a href="resultats/home.php">Resultat</a></li>
		    </ul>
		  
		    <ul class="nav navbar-nav navbar-right">
		        <li>
		          	<a class="btn btn-default" href="#">
		            	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
		          	</a>
		        </li>

		        <li>
		          	<a class="btn btn-default" href="#">
		            	<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
		          	</a>
		        </li>
	      	</ul>

	      <p class="navbar-text navbar-right">Il est :'.$heure.'</p>

	    </div><!--/.nav-collapse -->
	  	</div><!--/.container-->
	</nav>

	';

	echo($vue);
	}

	function errNonConnecte(){
		echo("Erreur : Vous n'êtes pas connecté vous ne pouvez donc pas voir cette page !");
	}

?>