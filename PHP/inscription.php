<?php
	
	 
	 
	 var_dump($_POST);

	 error_reporting(E_ALL);

	 ini_set('display_errors','On');


	$dbh = new PDO ("pgsql: host=localhost port=5432 dbname=nico user=vincent password=1a2b3c4D");


	// $connect = pg_connect($dbh);

	$nomm = $_POST['nom'];
	$prenomm = $_POST['prenom'];
	$maill = $_POST['mail'];
	$motdepassee = $_POST ['motdepasse'];
	$motdepassee2 = $_POST ['motdepasse2'];
	$pass_hache = password_hash ('motdepasse',PASSWORD_BCRYPT);
	$nomregionn = $_POST ['nomregion'];
	$verifmail = $dbh->prepare('SELECT * FROM utilisateur WHERE mail = ? ');
	$inserBDD = ("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES 
		('".$nomm."','".$prenomm."','".$maill."','".$pass_hache."','".$nomregionn."');");

		// foreach (filter_var($maill, FILTER_VALIDATE_EMAIL) ; $maill!==$verifmail ; $motdepassee == $motdepassee2 )  { 

		// 	pg_query("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES ('".$nomm."','".$prenomm."','".$maill."','".$pass_hache."','".$nomregionn."');");

		// 	else{
 	// 		echo  "l'adresse $maill ou le mot de passe n'est pas valide";
 	// 	}
		// }


		if (filter_var($maill, FILTER_VALIDATE_EMAIL)) {
			$verifmail->execute(array($maill));
			$mailexist = $verifmail -> rowCount();
			if ($mailexist==0) {} 	
			else {
			 	 trigger_error("l'adresse: $maill existe déja.", E_USER_ERROR);
			 		}
			if ($motdepassee == $motdepassee2) {
				$inserBDD = $dbh->prepare("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES (?,?,?,?,?)");
				$inserBDD -> execute (array($nomm, $prenomm, $maill, $pass_hache, $nomregionn));
				echo "envoyé";
			 		} 
			
			 else {
			 	 trigger_error("Les mots de passe ne sont pas les mêmes", E_USER_ERROR);
					}
		} 

		else {
			 trigger_error("l'adresse $maill n'est pas valide", E_USER_ERROR);
			}





		


// $verifmail->execute(array($maill));
// $mailexist = $verifmail -> rowCount();
// if ($mailexist==0) {
 	
//  } else {
//  	echo "existe";
//  }
  
	























// 	 if (filter_var($maill, FILTER_VALIDATE_EMAIL)) {
// 	 	else{
// 			echo  "l'adresse $maill ou le mot de passe n'est pas valide";
// 	 		}

	 
		
// 	 if ($maill==$verifmail){

// 	 } 
				
				
	
// 	if ($motdepassee == $motdepassee2) {

// 			pg_query("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES ('".$nomm."','".$prenomm."','".$maill."','".$pass_hache."','".$nomregionn."');");
// 					}	

// 		else{
// 			echo  "l'adresse $maill ou le mot de passe n'est pas valide";
// 		}

			
// 			pg_query("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES ('".$nomm."','".$prenomm."','".$maill."','".$pass_hache."','".$nomregionn."');");
// 			if (pg_num_rows($verifmail == null)){
// 			 echo  "le $maill existe";}
														
		
//  	else {
// 	 echo  "le $maill n'est pas valide"; }


			
// 	pg_query($pass_hache = password_hash($_POST['motdepassee'], PASSWORD_DEFAULT););

// 	pg_query("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES ('".$nomm."','".$prenomm."','".$maill."','".$pass_hache."','".$nomregionn."');");

// 	pg_query(string crypt ( "string ("$motdepassee"));
	
// pg_query(" SELECT 'password' FROM 'utilisateur' WHERE'mail' = 'motdepasse'");



	// 	


?>

