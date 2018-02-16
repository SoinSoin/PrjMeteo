<?php
session_start();

$mail = $_POST["adresse"];
$statut = $_POST["statut"];

$bd = "host=localhost port=5432 dbname=bdd_meteon user=admin password=admin";

$connect = pg_connect($bd);

if ($statut == "Formateur") {
	$statut = 1;
	$insertUtil = pg_query("INSERT INTO utilisateur (mail, fk_idstatut) VALUES ('".$mail."', '".$statut."');");
	
}
else {
	$statut = 2;
	$insertUtil = pg_query("INSERT INTO utilisateur (mail, fk_idstatut) VALUES ('".$mail."', '".$statut."');");
	$requetePosition = pg_query("SELECT idposition FROM position ORDER BY 1 DESC LIMIT 1;");	
	$resultat = pg_fetch_array($requetePosition);
	$increment = intval($resultat[0]) + 1;
	$insertPos = pg_query("INSERT INTO position (idposition) VALUES (".$increment.")");


header ('Location: ../page_formateurs.php');

}

?>