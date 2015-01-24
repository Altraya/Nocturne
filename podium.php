<?php

require_once("VuePrincipale.php");
include_once("ModelePrincipale.php");

head();
creationNavbar();



echo "
<div class='jumbotron'>
	<h1>Podium</h1>
	<div>
		<ul>";

$bdd = connexionBDD();
$query = $bdd->prepare("SELECT * FROM tm_score_grp_itm_scr JOIN tm_group_grp ON PK_GRP=FK_GRP JOIN ref_item_itm ON PK_ITM=FK_ITM");
$query->execute();
while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
	$grp = $donnees["GRP_LIB"];
	$itm = $donnees["ITM_LIB"];
	$score = $donnees["SCR_score"];

	echo '<li>Groupe "'.$grp.'", item "'.$itm.'" : '.$score.'</li>';
}

echo "	
		</ul>
	</div>
</div>";

?>

