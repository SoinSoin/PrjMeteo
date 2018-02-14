<?php



    session_start();

        // A supprimer lors avant la mise n ligne   

    setcookie("e_mail","denisdupuy67@gmail.com");

        // A supprimer lors avant la mise n ligne   

    $verif_mail=$_COOKIE['e_mail'];

    $test = "host=localhost port=5432 dbname=bdd_meteon user=admin password=admin";

    $connect = pg_connect($test);

    $nom = $_POST['nom'];

    $prenom = $_POST['prenom'];

    $nomregion = $_POST ['nomRegion'];

    // on récupère l'ancien mot de passe dans la BDD

    $requeteMdp = pg_query("SELECT motdepasse FROM utilisateur WHERE mail = '".$verif_mail."';");

    $mdpBdd = pg_fetch_array($requeteMdp);

    // Récupération nom utilisateur:

    $requeteNom = pg_query("SELECT nom FROM utilisateur WHERE mail = '".$verif_mail."';");

    $nomBdd = pg_fetch_array($requeteNom);

    //Récupération prénom utilisateur:

    $requetePrenom = pg_query("SELECT prenom FROM utilisateur WHERE mail = '".$verif_mail."';");

    $prenomBdd = pg_fetch_array($requetePrenom);

    //Récupération du nom de région

    $requeteRegion = pg_query("SELECT nomregion FROM utilisateur WHERE mail = '".$verif_mail."';");

    $regionBdd = pg_fetch_array($requeteRegion);

    // on compte le nombre de récurrence du nom de région
    $requeteRegion = pg_query("SELECT COUNT(nomregion) FROM utilisateur WHERE nomregion = '".$nomregion."';");

    $compte=pg_fetch_array($requeteRegion)[0];

    //Si le champ ancien mot de passe est rempli

    if (isset($_POST['ancienMdp']) && isset($_POST['nouveauMdp']) && isset($_POST['confirmMdp'])) {

    //Si les mots de passe correspondent (base de données VS ancin mdp)
    if (password_verify($_POST['ancienMdp'], $mdpBdd[0])){

        //hacher le nouveau mot de passe
        $pass_hache = password_hash ($_POST['nouveauMdp'], PASSWORD_DEFAULT);
        //Modifier le mot de passe
        $requeteupdate = pg_query("UPDATE utilisateur SET motdepasse ='".$pass_hache."' WHERE mail = '".$verif_mail."';");
        header('Location: accueil.php');
    }
    else 

    {

        echo "Votre mot de passe ne correspond pas à celui enregistré";

    }
}
    //Si le nom de région n'est pas déjà pris
    if (isset($_POST['nomRegion'])){
    //Mise à jour du nom de région et du mot de passe
        if ($compte == 0){
            //si le nom de region n'est pas deja pris
            $requeteupdate = pg_query("UPDATE utilisateur SET nomregion = '".$nomregion."' WHERE mail = '".$verif_mail."';");
            header('Location: accueil.php');
        }
        else {
            echo "ce nom de région est déjà pris par un autre utilisateur";
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
        <input type="text" name="nom" placeholder=" Entrez votre nom" value="<?php echo "$nomBdd[0]" ?>" required>
        <br>
        <br>
        <label>Votre prénom :</label>
        <br>
        <br>
        <input type="text" name="prenom" placeholder=" Entrez votre prénom" value="<?php echo "$prenomBdd[0]" ?>" required>
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
        <label>Votre nom de région actuel est : <?php echo "$regionBdd[0]" ?></label>
        <br>
        <br>
        <input type="text" name="nomRegion" placeholder=" Entrer un nom de région">
        <br>
        <br>
        <input id="valider" class="bouton" type="submit" name="Valider" value="Valider">
        <input id="annuler" class="bouton" type="submit" name="Annuler" value="Annuler"> 
    </form>
</body>

</html>