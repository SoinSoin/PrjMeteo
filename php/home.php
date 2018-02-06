<?php 

var_dump($_POST);

//connexion bdd locale
$test = "host=localhost port=5432 dbname=meteon user=philou password=prout";

//connexion a postgres
$connect = pg_connect($test);

$mail=$_POST['mail'];

//requête utilisé 
$foo =pg_query("SELECT prenom, nom FROM utilisateur WHERE mail='".$mail."'");
$resultat =pg_fetch_array($foo);
var_dump($foo);


//Envoi du mail
var_dump(mail($mail, "Mot de passe oublie", "Voici ton mot de passe :$resultat[0]$resultat[1]"));

//bouton deconnexion
pg_close($connect);

?>

<!DOCTYPE html>
<html>
<head>
    
</head>
<body> 
    <p> 
        <?php echo "$resultat[0]$resultat[1]";?> 
    </p>
</body>
</html>