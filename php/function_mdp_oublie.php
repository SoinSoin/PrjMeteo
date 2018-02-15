<?php

$bd = "host=localhost port=5432 dbname=bdd_meteon user=admin password=admin";

$connect = pg_connect($bd);

$mail=$_POST['mail'];

$requeteNom = pg_fetch_array(pg_query("SELECT nom, prenom FROM utilisateur WHERE  mail='".$mail."';"));

var_dump(mail($mail,"Mot de passe oublie","Voici ton mot de passe : $requeteNom[0]$requeteNom[1]"));
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p> <?php echo "$requeteNom[0]$requeteNom[1]";?> </p>
</body>
</html>
