<?php

	$bd = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
	$connect = pg_connect($bd);





	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$motdepasse = $_POST ['motdepasse'];
	$motdepasse2 = $_POST ['motdepasse2'];
    $nomregion = $_POST ['nomderegion'];
	$pass_hache = password_hash($motdepasse,PASSWORD_DEFAULT);

if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
	$verifmail=pg_fetch_array(pg_query("SELECT mail FROM utilisateur WHERE mail = '".$mail."' ; "));
		if ($verifmail[0] == $mail){
			if ($motdepasse == $motdepasse2){
				$verifregion = pg_fetch_array(pg_query("SELECT nomregion  FROM utilisateur WHERE  nomregion = '".$nomregion."'  ; "));
					if ($nomregion != $verifregion[0]){
						$inserBDD = pg_query("UPDATE utilisateur  SET nom ='".$nom."' , prenom ='".$prenom."', motdepasse ='".$pass_hache."', nomregion ='".$nomregion."' WHERE mail = '".$mail."';");
						header('Location: ../page_accueil.php');
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
		echo "Votre mail n'est pas dans la base de données";
	}
} 
else {
echo "Le mail saisi n'est pas conforme";
}





?>

