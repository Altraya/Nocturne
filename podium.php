<?php

require_once("VuePrincipale.php");
include_once("ModelePrincipale.class.php");
include_once("config.php");

head();
creationNavbar();



echo "
<div class='jumbotron'>
	<h1>Podium</h1>
	<div>
		<ul>";

$bdd = connexionBDD();
$query1 = $bdd->prepare("SELECT * FROM tm_score_grp_itm_scr JOIN tm_group_grp ON PK_GRP=FK_GRP JOIN ref_item_itm ON PK_ITM=FK_ITM");
$query1->execute();

while ($donnees = $query1->fetch(PDO::FETCH_ASSOC)) {
	$grp = $donnees["GRP_LIB"];
	$itm = $donnees["ITM_LIB"];
	$score = $donnees["SCR_score"];

	$query2 = $bdd->prepare("SELECT *, SUM(SCR_score) as somme FROM tm_score_grp_itm_scr WHERE FK_GRP=:grp GROUP BY FK_GRP");
	$query2->execute(array("grp" => $donnees["FK_GRP"]));

	$score_total_tab = $query2->fetch(PDO::FETCH_ASSOC);
	$score_total = $score_total_tab["somme"];

	echo '<li>Groupe "'.$grp.'", : '.$score_total.'</li>';
}

echo "	
		</ul>
	</div>
</div>";

?>

