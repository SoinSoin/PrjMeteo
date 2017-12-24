<?php

    //on utilise la fonction session_start pour démarrer une session et obtenir un numéro de session
    session_start();

    //on récupère ce qu'on a rentré dans  l'input mail@
    $mail = $_POST['mail@'];

    //on créé un cookie et on y intègre notre variable contenant le mail (on détermine la durée de vie du cookie ainsi que les options de sécurité)
    setcookie('mail',$mail,time()+365*24*3600,null,null,false,true);

    //on fait une requête sql afin de récupérer le statut attaché au mail
    $test = "host=localhost port=5432 dbname=deusxmachina user=admin password=admin";
    
    $connect = pg_connect($test);
    
    $requete = pg_query("SELECT fk_idstatut FROM utilisateur WHERE mail = '".$mail."';");

    $resultat = pg_fetch_array($requete);

    // echo "$resultat[0]";

    //on créé une fonction php qui nous servira à nous rediriger vers la page principale en fonction du statut

    
// if(){
//     }
// else{
//         if ($requete[0] = 1) {
//             header('Location: page_formateurs.php');
//         }
//         else if ($requete[1] = 2) {
//             header('Location: page_apprenants.php');
//         }
//     }
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
    <form id=formulaire method="post" action="page_apprenants.php">
        <p>
            <label>Veuillez entrer votre adresse mail :</label>
            <br>
            <br>
            <input type="email" name="mail@" placeholder="ex: john-smith@cliché.com">
        </p>
        <br>
        <p>
            <label>Veuillez entrer votre mot de passe :</label>
            <br>
            <br>
            <input type="password" name="password" placeholder="mot de passe">
        </p>
        <!-- Lien a définir avec le SQL/PHP afin d'amener sur la page apprenant/formateur en fonction du profil -->
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