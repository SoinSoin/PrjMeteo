<?php 
session_start();
$mail = $_COOKIE['e_mail'];
$bd = "host=localhost port=5432 dbname=bdd_meteon user=admin password=admin";
       
$connect = pg_connect($bd);
            
$verif_cookie = pg_fetch_array(pg_query("SELECT fk_idstatut FROM utilisateur WHERE mail = '".$mail."';"));

if($verif_cookie[0]==1) {
    header('Location: page_formateurs.php');
}
else{
    header('Location: page_apprenants.php');
}

?>