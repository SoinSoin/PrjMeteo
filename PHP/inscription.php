<?php
	 var_dump($_POST);

	 error_reporting(E_ALL);

	 ini_set('display_errors','On');


	$test = "host=localhost port=5432 dbname=nico user=vincent password=1a2b3c4D";


	$connect = pg_connect($test);

	$nomm = $_POST['nom'];
	$prenomm = $_POST['prenom'];
	$maill = $_POST['mail'];
	$pass_hache = password_hash ('motdepasse',PASSWORD_BCRYPT);
	$nomregionn = $_POST ['nomregion'];
	
	//pg_query($pass_hache = password_hash($_POST['motdepassee'], PASSWORD_DEFAULT););

	pg_query("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES ('".$nomm."','".$prenomm."','".$maill."','".$pass_hache."','".$nomregionn."');");

	// pg_query(string crypt ( "string ("$motdepassee"));
	
// pg_query(" SELECT 'password' FROM 'utilisateur' WHERE'mail' = 'motdepasse'");




	 



	pg_close($connect);


?>


