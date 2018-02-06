<?php


	//  error_reporting(E_ALL);

	//  ini_set('display_errors','On');

	

	$BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
	$connect = pg_connect($BDD);





	$nomm = $_POST['nom'];
	$prenomm = $_POST['prenom'];
	$maill = $_POST['mail'];
	$motdepassee = $_POST ['motdepasse'];
	$motdepassee2 = $_POST ['motdepasse2'];
    $nomregionn = $_POST ['nomderegion'];
	$pass_hache = password_hash($motdepassee,PASSWORD_DEFAULT);

if (filter_var($maill, FILTER_VALIDATE_EMAIL)){
	$verifmail = pg_query("SELECT mail FROM utilisateur WHERE mail = '".$maill."' ; ");
	$result=pg_fetch_array($verifmail);
		if ($result[0] == $maill){
			if ($motdepassee == $motdepassee2){
				$verifregion = pg_query("SELECT nomregion  FROM utilisateur WHERE  nomregion = '".$nomregionn."'  ; ");
				$resultregion = pg_fetch_array($verifregion);
				
					if ($nomregionn != $resultregion[0]){
						$inserBDD = pg_query("UPDATE utilisateur  SET nom ='".$nomm."' , prenom ='".$prenomm."', motdepasse ='".$pass_hache."', nomregion ='".$nomregionn."' WHERE mail = '".$maill."';");
						header('Location:accueil.php');
					} 
					else {
						echo "Cette region existe déja"; 
							}
			} 
			else {
				echo "Vos mots de passe ne sont pas les mêmes ";
			}
		} 
	else {
		echo "Votre mail n'est pas pris en compte par nos services";
	}
} 
else {
echo "Le mail saisi n'est pas conforme";
}





?>

