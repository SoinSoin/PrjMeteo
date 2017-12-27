<?php

var_dump($_POST);


//connexion bdd locale
$test = "host=localhost port=5432 dbname=deusxmachina user=admin password=admin";

$connect = pg_connect($test);


$mail=$_POST['mail'];

$foo = pg_query("SELECT nom, prenom FROM utilisateur WHERE  mail='".$mail."';");
$resultat = pg_fetch_array($foo);

var_dump($foo);



var_dump(mail($mail,"Mot de passe oublie","Voici ton mot de passe : $resultat[0]$resultat[1]"));

pg_close($connect);
//bouton deconnexion


?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p> <?php echo "$resultat[0]$resultat[1]";?> </p>
</body>
</html>
