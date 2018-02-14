<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>METEON - Modifier votre profil</title>
    <link rel="stylesheet" type="text/css" href="css/style_form_modif.css">
</head>

<body>
    <h1>Modifier votre profil</h1>
    <form id="formulaire" method="post" action="">
        <label>Votre nom :</label>
        <br>
        <br>
        <input type="text" name="NOM" placeholder=" Entrez votre nom" required>
        <br>
        <br>
        <label>Votre prénom :</label>
        <br>
        <br>
        <input type="text" name="Prénom" placeholder=" Entrez votre prénom" required>
        <br>
        <br>
        <label>Ancien mot de passe :</label>
        <br>
        <br>
        <input type="password" name="ancienMDP" placeholder=" Mot de passe actuel">
        <br>
        <br>
        <label>Nouveau mot de passe :</label>
        <br>
        <br>
        <input type="password" name="nouveauMDP" placeholder=" Nouveau mot de passe">
        <br>
        <br>
        <label>Nouveau nom de région :</label>
        <br>
        <br>
        <input type="text" name="nomderegion" placeholder=" Nouveau nom de région">
        <br>
        <br>
        <input id="valider" class="bouton" type="submit" name="Valider" value="Valider" onclick="redirection_modif()">
        <a href="annuler_modif.php"><input type="button" id="annuler" class="bouton" name="Annuler" value="Annuler"></a>
    </form>
    
</body>

</html>