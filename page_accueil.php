<?php

    //on utilise la fonction session_start pour démarrer une session et obtenir un numéro de session
    session_start();

    $mail = $_POST['mail'];
    $mdp = $_POST['password'];

    //on créé une fonction php qui nous servira à nous rediriger vers la page principale en fonction du statut
    if(isset($mail)){
    //cette condition me permet de conditionner la création du cookie et ma requête à l'envoie des données de mon formulaire via la méthode post
        setcookie('e_mail',$mail,time()+365*24*3600,null,null,false,true);
       
        $bd = "host=localhost port=5432 dbname=bdd_meteon user=admin password=admin";
       
        $connect = pg_connect($bd);
       
        $verifmdp = pg_fetch_array(pg_query("SELECT motdepasse FROM utilisateur WHERE mail = '".$mail."';"));
       
        $hashe = $verifmdp[0];
        
        if (password_verify($mdp, $hashe)){ 
            
            $requeteId = pg_fetch_array(pg_query("SELECT fk_idstatut FROM utilisateur WHERE mail = '".$mail."';"));

            if($requeteId[0]==1) {
                header('Location: page_formateurs.php');
            }
            else{
                header('Location: page_apprenants.php');
            }
        }
        else{
            echo "Le mot de passe n'est pas valide";       
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_index.css">
    <title>METEON - La météo des humeurs</title>
</head>

<body>
    <h1>Bienvenue sur la météo du jour</h1>
    <form id=formulaire method="post" action="">
        <p>
            <label>Veuillez entrer votre adresse mail :</label>
            <br>
            <br>
            <input type="email" name="mail" placeholder="ex: john-smith@cliché.com">
        </p>
        <br>
        <p>
            <label>Veuillez entrer votre mot de passe :</label>
            <br>
            <br>
            <input type="password" name="password" placeholder="mot de passe">
        </p>
        <input type="submit" name="connexion" value="Connexion" id="connexion">
        <br><br>
        <a href="formulaire_inscription.php">Inscription</a>
        <br>
        <a href="formulaire_mdp_oublie.php">Mot de passe oublié ?</a>
    </form>
    <br>
    <br>
    <div id=citation>
        <script language="javascript" charset="utf-8" src="http://dicocitations.lemonde.fr/citationblog.js"></script>
    </div>

</body>

</html>