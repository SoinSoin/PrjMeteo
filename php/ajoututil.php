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

}

header ('Location: ../page_formateurs.php');

?>
