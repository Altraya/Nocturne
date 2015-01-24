<?php 

//Vue de l'acceuil
class vueHome{


    private $_db;

    public function __construct(){
      
    }

    //Affiche les liens vers l'inscription pour les participants et les jury
	public function affichage(){
		$affichage = '<body>
		<h1 style="text-align: center">Bienvenue à la nuit de l\'informatique</h1>
		';
    echo('$affichage');
	}


	function creationCompte(){
	$vue = '
		<div id="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="jumbotron" style="margin-left: 24% ;">
                        <h3 style="text-align: center; margin-top: -20px;">Vous n\'êtes pas encore inscrit</h3>
                        <a href="inscription/inscriptionParticipant.php">S\'inscrire comme participant</a>
                        <a href="inscription/inscriptionJury.php">S\'inscrire comme jury</a>
                    </div>
                </div>  
    ';
	echo($vue);
	}

    //Affiche le formulaire de connection (entrer email et mdp)
	function afficherFormulaireConnection(){
		$vue = '
        <div class="col-md-6">
            <div class="jumbotron" style="margin-right: 24% ;">
                <h3 style="text-align: center; margin-top: -20px;">Connectez-vous</h3>
                <form method="post" action="login.php">
                    Email<br>
                    <input type="text" class="form-control" id="sizing-addon2" name="email">
                    <br>
                    Mot de passe<br>
                    <input type="password" class="form-control" id="sizing-addon2" name="password">
                    <br>
                    <button type="submit" class="btn btn-default" value="Valider">Valider</button>
                </form>
            </div>
        </div>
      </div>
    </div>

        <hr/>
        <div class="container">
            <section class="row">
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="Logos/3R Reseaux.png" alt="logo1">
                    </a>
                </div>

        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="Logos/Allied Telesis.png" alt="logo2">
            </a>
        </div>

        <div class="col-xs-6 col-md-3">
            <a href="#" class="thumbnail">
                <img src="Logos/Focale Info.png" alt="logo2">
            </a>
        </div>

    <div class="col-xs-6 col-md-3">
        <a href="#" class="thumbnail">
            <img src="Logos/Gest Stick.jpg" alt="logo3">
        </a>
    </div>

    </section>

    </div>';

	echo($vue);
	}

	//affiche la banière contenant les sponsorts
	function sponsors(){
		$vue ='
		<div class="sponsors">
		</div>
		';
		echo($vue);
	}


    function errMdp(){
        echo('<script> alert("Mauvais mot de passe, reessayez"); </script>');
        header('Location: http://localhost/Nocturne/home.php');        
    }
};
