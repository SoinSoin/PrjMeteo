<?php



	 error_reporting(E_ALL);

	 ini_set('display_errors','On');

	 // ici je me connacte à la BDD en indiquant que j'utilise le pilote PDO natif à PHP j'utilise donc:

	$BDD = " host=localhost port=5432 dbname=nico user=vincent password=1a2b3c4D";
	$connect = pg_connect($BDD);


	//ici pas de changement je créé mes variables qui doivent être les même que ceux de l'input name dans le hmtl

	$nomm = $_POST['nom'];
	$prenomm = $_POST['prenom'];
	$maill = $_POST['mail'];
	$motdepassee = $_POST ['motdepasse'];
	$motdepassee2 = $_POST ['motdepasse2'];
               $nomregionn = $_POST ['nomregion'];
	$pass_hache = password_hash ('motdepasse',PASSWORD_BCRYPT);






if (filter_var($maill, FILTER_VALIDATE_EMAIL)) {
		$verifmail = pg_query("SELECT mail FROM utilisateur WHERE mail = '".$maill."' ; ");
                               $result=pg_fetch_array($verifmail);
                                // print_r( "$result[]");

	if ($result[0] == $maill) {

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
