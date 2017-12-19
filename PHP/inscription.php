<?php
<<<<<<< HEAD



	 error_reporting(E_ALL);

	 ini_set('display_errors','On');

	 // ici je me connacte à la BDD en indiquant que j'utilise le pilote PDO natif à PHP j'utilise donc:

	$BDD = " host=localhost port=5432 dbname=nico user=vincent password=1a2b3c4D";
	$connect = pg_connect($BDD);


	//ici pas de changement je créé mes variables qui doivent être les même que ceux de l'input name dans le hmtl

=======
	var_dump($_POST);
	error_reporting(E_ALL);
	ini_set('display_errors','On');

	 // ici je me connacte à la BDD en indiquant que j'utilise le pilote PDO natif à PHP j'utilise donc:
	$dbh = new PDO ("pgsql: host=localhost port=5432 dbname=projet_meteon user=thomasp password=elpinus09");


	//ici pas de changement je créé mes variables qui doivent être les même que ceux de l'input name dans le hmtl	
>>>>>>> d22afe9c823e7fffef5c0637bd4e9c0055921cf6
	$nomm = $_POST['nom'];
	$prenomm = $_POST['prenom'];
	$maill = $_POST['mail'];
	$motdepassee = $_POST ['motdepasse'];
	$motdepassee2 = $_POST ['motdepasse2'];
<<<<<<< HEAD
               $nomregionn = $_POST ['nomregion'];
	$pass_hache = password_hash ('motdepasse',PASSWORD_BCRYPT);






if (filter_var($maill, FILTER_VALIDATE_EMAIL)) {
		$verifmail = pg_query("SELECT mail FROM utilisateur WHERE mail = '".$maill."' ; ");
                               $result=pg_fetch_array($verifmail);
                                // print_r( "$result[]");

	if ($result[0] == $maill) {
=======
	$pass_hache = password_hash ('motdepasse',PASSWORD_BCRYPT);//=> j'utilise la fonction pour haché les mots de passe pas grand chose à savoir à part que PASSWORD_BCRYPT est la requete qui determine l'algo de hachage utilisé.
	$nomregionn = $_POST ['nomregion'];
	// $tableau=
	
	//en dessous je créé ma variable qui va me premettre de faire ma verification de mail dans la BDD. Ceci est la méthode prepare elle dit à la BDD attention je vais faire te demander quelque à un certain moment dont le mail est inconnus .  
	$verifmail = $dbh->prepare('SELECT * FROM utilisateur WHERE mail = ? ');
	gettype($verifmail);
	//même méthode qu'au dessus sauf que la je le prépare à recevoir des données dont les valeurs sont indéfinis.
	$inserBDD = $dbh->prepare("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES (?,?,?,?,?)");


			//les conditions en dessous vont permettre la validation pas à pas de l'envoi

		if (filter_var($maill, FILTER_VALIDATE_EMAIL))//==> ici j'utilise une fonction qui permet de dire si un mail est bien au format mail et j'applique la methode avec la requete FILTER_VALIDATE_EMAIL.
		 {
			//ici j'applique l'execution de $verifmail pour qu'il puisse la traité a la condition suivante.

			$verifmail->execute(array($maill));
			echo $verifmail;
			$mailexist = $verifmail -> rowCount();
			echo $mailexist;
			
			// je lui demande par rapport à l'étape suivante suivante si le mail est dans la BDD
			if ($mailexist==0) {
				
				//Ici on vérifie si la région est disponible
				// if in_array($nomregion, utilisateur)
				// ici je lui demande les mdp sont les mêmes
				if ($motdepassee == $motdepassee2) {
				// si toute les condition sont valide je lui demande de l'envoyer dans la BDD
				$inserBDD -> execute (array($nomm, $prenomm, $maill, $pass_hache, $nomregionn));
				echo "envoyé";
			 		} 
			
				 else {
			 	 trigger_error("Les mots de passe ne sont pas les mêmes", E_USER_ERROR);
					}
			} 	
			
			else {
			 	 trigger_error("l'adresse: $maill existe déja.", E_USER_ERROR);
			 		}
			
		} 
>>>>>>> d22afe9c823e7fffef5c0637bd4e9c0055921cf6

		if ($motdepassee == $motdepassee2) {
			$verifregion = pg_query("SELECT 'nomregion' FROM utilisateur WHERE 'nomregion' = '".$nomregionn."'; ");
                                                           $resulltregion = pg_fetch_array($verifregion);


                                                            if ($nomregionn == $resulltregion[0]) {
                                                                           $inserBDD = pg_query("INSERT INTO utilisateur (nom, prenom, mail, motdepasse, nomregion) VALUES ('".$nomm."' ,  '".$prenomm."', '".$maill."', '".$pass_hache."', '".$nomregionn."' )");
                                                            } else {
                                                                           echo "cette region existe déja";
                                                            }

                              }
		else {
			echo "vos mot de passe ne sont pas les mêmes ";
		}

	}
	else {
	echo "votre mail n'est pas pris en compte par nos service";
	}


}
 else {
	echo "votre mail n'est pas un mail";

}



?>
