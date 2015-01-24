<?php

require_once("../VuePrincipale.php");
require_once("./modeleNoteGroupe.php");
require_once("./vueNoteGroupe.php");
head();
creationNavbar();

debutFormulaireJury();
debutTableau();
afficherTitre();



finTableau();
finFormulaireJury();








?>