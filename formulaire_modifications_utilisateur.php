<?php

    session_start();

    $verif_mail=$_COOKIE['e_mail'];

    $connect = pg_connect("host=localhost port=5432 dbname=bdd_meteon user=admin password=admin");

    // on récupère l'ancien mot de passe, le nom le prenom et le nom de région dans la BDD
    $request = pg_fetch_array(pg_query("SELECT motdepasse, nom, prenom, nomregion FROM utilisateur WHERE mail = '".$verif_mail."';"));

    // on compte le nombre d'ocurrence du nom de région:
    $compte = pg_fetch_array(pg_query("SELECT COUNT(nomregion) FROM utilisateur WHERE nomregion = '".$nomregion."';"))[0];

    //Si le champ ancien mot de passe est rempli:
    if (!empty($_POST['ancienMdp']) || !empty($_POST['nouveauMdp']) || !empty($_POST['confirmMdp'])) {

    //Si les mots de passe correspondent (base de données VS ancien mdp)
        if (password_verify($_POST['ancienMdp'], $request[0])){

            //hacher le nouveau mot de passe
            $pass_hache = password_hash ($_POST['nouveauMdp'], PASSWORD_DEFAULT);
            //Modifier le mot de passe
            $updateMdp = pg_query("UPDATE utilisateur SET motdepasse ='".$pass_hache."' WHERE mail = '".$verif_mail."';");
            header('Location: /php/redirection.php');
        } else 
        {        
            echo "Votre mot de passe ne correspond pas à celui enregistré.";
        }
    }
    //Si le nom de région est renseigné
    if (!empty($_POST['nomRegion'])){
    //si le nom de region n'est pas deja pris
        if ($compte == 0){
            //Mise à jour du nom de région
            $updateRegion = pg_query("UPDATE utilisateur SET nomregion = '".$nomregion."' WHERE mail = '".$verif_mail."';");
            header('Location: /php/redirection.php');
        } else 
        {
            echo "ce nom de région est déjà pris par un autre utilisateur.";
        }
    }



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>METEON - Modifier votre profil</title>
    <link rel="stylesheet" type="text/css" href="css/style_form_modif.css">
</head>

<body>
    <h1>Modifier votre profil</h1>
    <form id="formulaire" method="post" action="formulaire_modifications_utilisateur.php">
        <label>Votre nom :</label>
        <br>
        <br>
        <input type="text" name="nom" placeholder=" Entrez votre nom" value="<?php echo "$request[1]" ?>" required>
        <br>
        <br>
        <label>Votre prénom :</label>
        <br>
        <br>
        <input type="text" name="prenom" placeholder=" Entrez votre prénom" value="<?php echo "$request[2]" ?>" required>
        <br>
        <br>
        <label>Ancien mot de passe :</label>
        <br>
        <br>
        <input type="password" name="ancienMdp" placeholder=" Mot de passe actuel">
        <br>
        <br>
        <label>Nouveau mot de passe :</label>
        <br>
        <br>
        <input type="password" name="nouveauMdp" placeholder=" Nouveau mot de passe">
        <br>
        <br>
        <label>Confirmation du mot de passe :</label>
        <br>
        <br>
        <input type="password" name="confirmMdp" placeholder=" Confirmation du mot de passe">
        <br>
        <br>
        <label>Modifier le nom de région :</label>
        <br/>
        <label>Votre nom de région actuel est : <?php echo "$request[3]" ?></label>
        <br>
        <br>
        <input type="text" name="nomRegion" placeholder=" Entrer un nom de région">
        <br>
        <br>
        <input id="valider" class="bouton" type="submit" name="Valider" value="Valider">
        <a href="php/redirection.php"><input type="button" id="annuler" class="bouton" name="Annuler" value="Annuler"></a> 
    </form>
</body>

</html>