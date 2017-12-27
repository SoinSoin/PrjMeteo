<?php 

//var_dump($_POST);

error_reporting(E_ALL);
ini_set('display_errors','On');

//connexion bdd locale

$logIn = "host=localhost port=5432 dbname=deusxmachina user=admin password=admin";//infos de connexion, à remplacer en fonction de la BDD

$connect = pg_connect($logIn);// on utilise les infos de connexion

$mail=$_POST['mail'];//Récupération du champ mail depuis l'HTML (user input)
$password=$_POST['password'];//Récupération du champ password depuis l'HTML (user input)


//Requête SQL : Je vérifie que l'e-mail renseigné est bien dans la base de données et que le mot de passe renseigné lui corresponde.
pg_query("SELECT 'mail', 'motdepasse' FROM utilisateur WHERE  'mail'='".$mail."' AND 'motdepasse'='".$password."' ;");

//Je rentre le requête SQL dans une variable dbidon appelée $foo
$foo = pg_query("SELECT 'mail', 'motdepasse' FROM utilisateur WHERE  'mail'='".$mail."' AND 'motdepasse'='".$password."' ;");

var_dump($foo);//imprimer le résultat de la variable $foo dans le var dump

pg_close($connect);//déconnexion en fin de requête nécessaire pour imprimer le var dump

?>