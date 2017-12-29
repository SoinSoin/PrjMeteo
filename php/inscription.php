<?php
<<<<<<< HEAD

	//  error_reporting(E_ALL);

	//  ini_set('display_errors','On');

	

	$BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
	$connect = pg_connect($BDD);


=======
	$BDD = "host=localhost port=5432 dbname=bdd_meteon user=admin  password=admin";
	$connect = pg_connect($BDD);

>>>>>>> 1bce6947cd540c7337fd377e5247b98a9ccdd35d
	$nomm = $_POST['nom'];
	$prenomm = $_POST['prenom'];
	$maill = $_POST['mail'];
	$motdepassee = $_POST ['motdepasse'];
	$motdepassee2 = $_POST ['motdepasse2'];
    $nomregionn = $_POST ['nomregion'];
	$pass_hache = password_hash ('motdepasse',PASSWORD_BCRYPT);

<<<<<<< HEAD
					if (filter_var($maill, FILTER_VALIDATE_EMAIL))
					{	$verifmail = pg_query("SELECT mail FROM utilisateur WHERE mail = '".$maill."' ; ");
						$result=pg_fetch_array($verifmail);
						//print_r( "$result[]");
							if ($result[0] == $maill)
						{
									if ($motdepassee == $motdepassee2)
							{	$verifregion = pg_query("SELECT nomregion  FROM utilisateur WHERE  mail ; ");
								$resultregion = pg_fetch_array($verifregion);
											if ($nomregionn == $resultregion[0])
								{
									$inserBDD = pg_query("UPDATE utilisateur (nom, prenom,  motdepasse, nomregion) SET ('".$nomm."' ,  '".$prenomm."', '".$pass_hache."', '".$nomregionn."' );");
								} 
								else 
								{
									echo "Cette region existe déja"; 
								}
							} 
							else 
							{
								echo "Vos mots de passe ne sont pas les mêmes ";
							}
						} 
						else 
						{
							echo "Votre mail n'est pas pris en compte par nos services";
						}
					} 
					else 
					{
						echo "Le mail saisi n'est pas conforme";
					}






































// 	if (filter_var($maill, FILTER_VALIDATE_EMAIL)) {
// 		$verifmail = pg_query("SELECT mail FROM utilisateur WHERE mail = '".$maill."' ; ");
//                                $result=pg_fetch_array($verifmail);
//                                 // /print_r( "$result[]");

// 	if ($result[0] == $maill) {

// 		if ($motdepassee == $motdepassee2) 
// 			{
// 			$verifregion = pg_query("SELECT 'nomregion' FROM utilisateur WHERE 'nomregion' = '".$nomregionn."'; ");
// 			$resultregion = pg_fetch_array($verifregion);
		  
// 				if ($nomregionn == $resultregion[0]) 
// 			{
// 				$inserBDD = pg_query("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES ('".$nomm."' ,  '".$prenomm."', '".$maill."', '".$pass_hache."', '".$nomregionn."' )");
// 			} 
		  
// 			else {echo "Cette region existe déja" }
//                               }
// 		else {
// 			echo "Vos mots de passe ne sont pas les mêmes ";
// 		}

// 	}
// 	else {
// 	echo "Votre mail n'est pas pris en compte par nos services";
// 	}
// }
//  else {
// 	echo "Le mail saisi n'est pas conforme";
// }
=======
if (filter_var($maill, FILTER_VALIDATE_EMAIL))
{	
	$verifmail = pg_query("SELECT mail FROM utilisateur WHERE mail = '".$maill."' ; ");
	$result=pg_fetch_array($verifmail);
	//print_r( $result);
	if ($result[0] == $maill)
	{
		if ($motdepassee == $motdepassee2)
		{	
			$verifregion = pg_query("SELECT nomregion  FROM utilisateur WHERE  nomregion = '".$nomregionn."'; ");
			$resultregion = pg_fetch_array($verifregion);
			if ($nomregionn == $resultregion[0])
			{
				// $inserBDD = pg_query("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES ('".$nomm."' ,  '".$prenomm."', '".$maill."', '".$pass_hache."', '".$nomregionn."' );");
				//A tester avec des valeurs bidons pour les VALUES on va rentrer nous meme les champs au lieu de récupérer ceux sur la page
			} 
			else 
			{
				 echo "Cette region existe déja"; 
			}
		} 
		else 
		{
			echo "Vos mots de passe ne sont pas les mêmes ";
		}
	} 
	else 
	{
		echo "Votre mail n'est pas pris en compte par nos services";
	}
} 
else 
{
	echo "Le mail saisi n'est pas conforme";
}
>>>>>>> 1bce6947cd540c7337fd377e5247b98a9ccdd35d

?>

