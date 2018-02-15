<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>METEON - Mot de passe oublié</title>
    <link rel="stylesheet" type="text/css" href="css/style_mdpo.css">
</head>

<body>
        <div id="titre">
            <h1>Mot de passe oublié </h1>
            <form action="php/function_mdp_oublie.php" method="post" id="formulaire">
                <p>Veuillez entrer votre adresse mail :</p>
                <input type="email" name="mail" placeholder="jeanbernard@mail.com" id="champ">
                <br>
                <!-- A terminer en php -->
                <input type="submit" name="bouton" value="Envoyer" id="bouton" onclick="redirection()">
            </form>
        </div>
    <script type="text/javascript" src="app.js"></script>
</body>

</html>