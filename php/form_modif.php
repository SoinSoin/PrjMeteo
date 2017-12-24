<?php
	var_dump($_POST);
	error_reporting(E_ALL);
	ini_set('display_errors','On');

	$test = "host=localhost port=5432 dbname=deusxmachina user=admin password=admin";

	//On se connecte a la bdd
	$connect = pg_connect($test);

	//On déclare les variables qu'on utilisera en les récupérant avec les name du fichier html 
	$nomm = $_POST['NOM'];
	$prenomm = $_POST['Prénom'];
	//On hash l'ancien mot de passe pour la correspondance avec la bdd
	$ancienmdpp = password_hash('ancienMDP', PASSWORD_BCRYPT);
	//On hash le nouveau mot de passe
	$pass_hache = password_hash ('nouveauMDP',PASSWORD_BCRYPT);
	$nomregionn = $_POST ['nomderegion'];
	
	//Les inputs dans le fichier html ont récupérés les valeurs des id de la personne connecté avec un $_SESSION, on passe donc directement a la query

	if ($ancienmdpp == 'motdepasse') 
	{
		//Pour le where adapter l'id avec un ID SESSION ou faire en sorte que l'id soit celui de la personne connectée
		pg_query("UPDATE utilisateur SET 'nom'='".$nomm."', 'prenom' = '".$prenomm."', 'motdepasse' ='".$pass_hache."', 'nomregion'= '".$nomregionn."'") WHERE 'idutilisateur' = 21 );
		//L'echo sert a indiquer que l'envoi a bien été effectué
		echo "Vos données ont bien été modifiées";
	}
	else 
	{
		echo "Vérifiez vos champs";
	}
	
	//On se déconnecte de la bdd
	pg_close($connect);
?>